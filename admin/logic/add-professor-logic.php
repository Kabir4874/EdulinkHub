<?php
require '../../config/database.php';

if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . 'admin/add-professor.php');
    exit;
}

$name                   = trim(filter_var($_POST['name'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$researchInterestsInput = trim((string)($_POST['researchInterests'] ?? ''));
$emailRaw               = trim((string)($_POST['contact_email'] ?? ''));
$contact_phone          = trim(filter_var($_POST['contact_phone'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$profileLinkRaw         = trim((string)($_POST['profileLink'] ?? ''));
$availability           = isset($_POST['availability']) ? 'available' : 'not available';
$image                  = $_FILES['image'] ?? null;

$_SESSION['add-professor-data'] = [
    'name'              => $name,
    'researchInterests' => $researchInterestsInput,
    'contact_email'     => $emailRaw,
    'contact_phone'     => $contact_phone,
    'profileLink'       => $profileLinkRaw,
    'availability'      => $availability
];

if ($name === '') {
    $_SESSION['add-professor-error'] = 'Please enter professor name.';
} elseif (!filter_var($emailRaw, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['add-professor-error'] = 'Please enter a valid email address.';
} elseif ($profileLinkRaw !== '' && !filter_var($profileLinkRaw, FILTER_VALIDATE_URL)) {
    $_SESSION['add-professor-error'] = 'Profile link must be a valid URL.';
}

$terms = [];

if ($researchInterestsInput !== '' && preg_match('/^\s*\[.*\]\s*$/s', $researchInterestsInput)) {
    $decoded = json_decode($researchInterestsInput, true);
    if (is_array($decoded)) {
        foreach ($decoded as $it) {
            if (is_string($it)) {
                $t = trim($it);
                if ($t !== '') $terms[] = $t;
            }
        }
    } else {
        $_SESSION['add-professor-error'] = 'Invalid JSON format for research interests.';
    }
} else {
    $parts = preg_split('/,/', $researchInterestsInput);
    if (is_array($parts)) {
        foreach ($parts as $p) {
            $t = trim($p, " \t\n\r\0\x0B\"'");
            if ($t !== '') $terms[] = $t;
        }
    }
}

if (empty($_SESSION['add-professor-error'])) {
    $terms = array_values(array_unique($terms, SORT_STRING));
    if (count($terms) === 0) {
        $_SESSION['add-professor-error'] = 'Please enter at least one research interest.';
    }
}

$researchInterestsJson = '';
if (empty($_SESSION['add-professor-error'])) {
    $researchInterestsJson = json_encode($terms, JSON_UNESCAPED_UNICODE);
    if ($researchInterestsJson === false) {
        $_SESSION['add-professor-error'] = 'Failed to encode research interests.';
    }
}

$imageRelPath = '';
$imageAbsPath = '';

if (empty($_SESSION['add-professor-error']) && $image && !empty($image['name'])) {
    if (!is_array($image) || !isset($image['name'], $image['tmp_name'])) {
        $_SESSION['add-professor-error'] = 'Invalid image upload.';
    } else {
        $allowed = ['png', 'jpg', 'jpeg', 'webp'];
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed, true)) {
            $_SESSION['add-professor-error'] = 'Image must be PNG, JPG, JPEG, or WEBP.';
        } elseif (!is_uploaded_file($image['tmp_name'])) {
            $_SESSION['add-professor-error'] = 'Invalid image upload.';
        } elseif ($image['size'] > 2_000_000) {
            $_SESSION['add-professor-error'] = 'Image too large. Max size is 2MB.';
        } else {
            $uploadDirAbs = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
            if (!is_dir($uploadDirAbs)) {
                @mkdir($uploadDirAbs, 0775, true);
            }

            $time     = time();
            $safeBase = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($image['name']));
            $fileName = $time . '_' . $safeBase;

            $imageAbsPath = $uploadDirAbs . $fileName;
            $imageRelPath = $fileName;

            if (!move_uploaded_file($image['tmp_name'], $imageAbsPath)) {
                $_SESSION['add-professor-error'] = 'Failed to save uploaded image.';
                $imageRelPath = '';
                $imageAbsPath = '';
            }
        }
    }
}

if (!empty($_SESSION['add-professor-error'])) {
    header('location: ' . ROOT_URL . 'admin/add-professor.php');
    exit;
}

$email       = $emailRaw;
$profileLink = $profileLinkRaw === '' ? '' : $profileLinkRaw;

$sql = "INSERT INTO professors
        (name, image, researchInterests, contact_email, contact_phone, availability, profileLink)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    if ($imageAbsPath && file_exists($imageAbsPath)) {
        @unlink($imageAbsPath);
    }
    $_SESSION['add-professor-error'] = 'Database error (prepare failed).';
    header('location: ' . ROOT_URL . 'admin/add-professor.php');
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    'sssssss',
    $name,
    $imageRelPath,
    $researchInterestsJson,
    $email,
    $contact_phone,
    $availability,
    $profileLink
);

$ok = mysqli_stmt_execute($stmt);
if (!$ok) {
    if ($imageAbsPath && file_exists($imageAbsPath)) {
        @unlink($imageAbsPath);
    }
    $_SESSION['add-professor-error'] = 'Failed to add professor. (' . mysqli_error($conn) . ')';
    mysqli_stmt_close($stmt);
    header('location: ' . ROOT_URL . 'admin/add-professor.php');
    exit;
}

mysqli_stmt_close($stmt);

// success
unset($_SESSION['add-professor-data']);
$_SESSION['add-professor-success'] = 'Professor added successfully.';
header('location: ' . ROOT_URL . 'admin/professor-list.php');
exit;
