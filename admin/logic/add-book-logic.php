<?php
// admin/logic/add-book-logic.php
require '../../config/database.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . 'admin/add-book.php');
    exit;
}

/* ---------------- Collect & sanitize ---------------- */
$title         = trim(filter_var($_POST['title']  ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$author        = trim(filter_var($_POST['author'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$category      = trim((string)($_POST['category'] ?? ''));
$description   = trim((string)($_POST['description'] ?? ''));
$suggestedRaw  = trim((string)($_POST['suggestedFor'] ?? ''));   // REQUIRED (will be saved as JSON)
$pdfLink       = trim((string)($_POST['pdfLink'] ?? ''));        // URL stored in column pdfLink (nullable)
$isPaid        = isset($_POST['isPaid']) ? 1 : 0;
$priceInput    = trim((string)($_POST['price'] ?? ''));
$image         = $_FILES['image'] ?? null;

/* Preserve for re-fill on error */
$_SESSION['add-book-data'] = [
    'title'        => $title,
    'author'       => $author,
    'category'     => $category,
    'description'  => $description,
    'suggestedFor' => $suggestedRaw,
    'pdfLink'      => $pdfLink,
    'isPaid'       => $isPaid,
    'price'        => $priceInput,
];

/* ---------------- Validation ---------------- */
if ($title === '') {
    $_SESSION['add-book-error'] = 'Please enter the book title.';
} elseif ($author === '') {
    $_SESSION['add-book-error'] = 'Please enter the author name.';
} elseif (!in_array($category, ['Admission', 'Job Exam', 'Skill-Based'], true)) {
    $_SESSION['add-book-error'] = 'Please select a valid category.';
} elseif ($pdfLink !== '' && !filter_var($pdfLink, FILTER_VALIDATE_URL)) {
    $_SESSION['add-book-error'] = 'Please provide a valid PDF link (URL).';
} elseif ($isPaid && ($priceInput === '' || !is_numeric($priceInput) || (float)$priceInput <= 0)) {
    $_SESSION['add-book-error'] = 'Please provide a valid price for paid books.';
}

/* ---------------- suggestedFor (REQUIRED) -> JSON array ---------------- */
$suggestedForJson = null;
if (empty($_SESSION['add-book-error'])) {
    if ($suggestedRaw === '') {
        $_SESSION['add-book-error'] = '“Suggested For” is required. Enter a comma-separated list or a JSON array.';
    } else {
        $list = [];

        if (preg_match('/^\s*\[.*\]\s*$/s', $suggestedRaw)) {
            // JSON array path
            $decoded = json_decode($suggestedRaw, true);
            if (is_array($decoded)) {
                foreach ($decoded as $it) {
                    if (is_string($it)) {
                        $t = trim($it);
                        if ($t !== '') $list[] = $t;
                    }
                }
            } else {
                $_SESSION['add-book-error'] = 'Invalid JSON in “Suggested For”. Use an array of strings.';
            }
        } else {
            // CSV / newline path
            $parts = preg_split('/[\r\n,]+/', $suggestedRaw);
            foreach ($parts as $p) {
                $t = trim($p, " \t\n\r\0\x0B\"'");
                if ($t !== '') $list[] = $t;
            }
        }

        if (empty($_SESSION['add-book-error'])) {
            $list = array_values(array_unique($list, SORT_STRING));
            if (count($list) === 0) {
                $_SESSION['add-book-error'] = '“Suggested For” must include at least one item.';
            } else {
                $suggestedForJson = json_encode($list, JSON_UNESCAPED_UNICODE);
                if ($suggestedForJson === false) {
                    $_SESSION['add-book-error'] = 'Failed to encode “Suggested For”.';
                }
            }
        }
    }
}

/* ---------------- Image upload (optional) ---------------- */
$imageFileName = ''; // store just the filename in DB
$uploadsDir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

if (empty($_SESSION['add-book-error']) && $image && !empty($image['name'])) {
    $allowedImg = ['png', 'jpg', 'jpeg', 'webp'];
    $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedImg, true)) {
        $_SESSION['add-book-error'] = 'Image must be PNG, JPG, JPEG, or WEBP.';
    } elseif (!is_uploaded_file($image['tmp_name'])) {
        $_SESSION['add-book-error'] = 'Invalid image upload.';
    } elseif ($image['size'] > 2_000_000) {
        $_SESSION['add-book-error'] = 'Image too large. Max size is 2MB.';
    } else {
        if (!is_dir($uploadsDir)) {
            @mkdir($uploadsDir, 0775, true);
        }
        $time = time();
        $safe = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($image['name']));
        $imageFileName = $time . '_' . $safe;
        if (!move_uploaded_file($image['tmp_name'], $uploadsDir . $imageFileName)) {
            $_SESSION['add-book-error'] = 'Failed to save cover image.';
            $imageFileName = '';
        }
    }
}

/* On any validation/upload error */
if (!empty($_SESSION['add-book-error'])) {
    if ($imageFileName && is_file($uploadsDir . $imageFileName)) @unlink($uploadsDir . $imageFileName);
    header('location: ' . ROOT_URL . 'admin/add-book.php');
    exit;
}

/* ---------------- Normalize price ---------------- */
$price = null;
if ($isPaid) {
    $price = (float)$priceInput;
} else {
    $isPaid = 0; // force-off if not checked
}

/* Treat empty pdfLink as NULL (in case of a NOT EMPTY constraint later) */
$pdfLinkForDb = ($pdfLink === '') ? null : $pdfLink;

/* ---------------- Build dynamic INSERT (handle NULLs correctly) ---------------- */
$cols   = ['title', 'image', 'author', 'category', 'description', 'suggestedFor', 'isPaid'];
$place  = ['?', '?', '?', '?', '?', '?', '?'];
$types  = 'ssssssi';
$params = [$title, $imageFileName, $author, $category, $description, $suggestedForJson, $isPaid];

// pdfLink (nullable)
$cols[] = 'pdfLink';
if ($pdfLinkForDb === null) {
    $place[] = 'NULL';
} else {
    $place[]  = '?';
    $types   .= 's';
    $params[] = $pdfLinkForDb;
}

// price (nullable if free)
$cols[] = 'price';
if ($price === null) {
    $place[] = 'NULL';
} else {
    $place[]  = '?';
    $types   .= 'd';
    $params[] = $price;
}

$sql = "INSERT INTO books (" . implode(',', $cols) . ") VALUES (" . implode(',', $place) . ")";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    if ($imageFileName && is_file($uploadsDir . $imageFileName)) @unlink($uploadsDir . $imageFileName);
    $_SESSION['add-book-error'] = 'Database error (prepare failed).';
    header('location: ' . ROOT_URL . 'admin/add-book.php');
    exit;
}

if ($types !== '') {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

$ok = mysqli_stmt_execute($stmt);
if (!$ok) {
    if ($imageFileName && is_file($uploadsDir . $imageFileName)) @unlink($uploadsDir . $imageFileName);
    $_SESSION['add-book-error'] = 'Failed to add book. (' . mysqli_error($conn) . ')';
    mysqli_stmt_close($stmt);
    header('location: ' . ROOT_URL . 'admin/add-book.php');
    exit;
}

mysqli_stmt_close($stmt);

/* ---------------- Success ---------------- */
unset($_SESSION['add-book-data']);
$_SESSION['add-book-success'] = 'Book added successfully.';
header('location: ' . ROOT_URL . 'admin/book-list.php');
exit;
