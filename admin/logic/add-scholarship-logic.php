<?php
require '../../config/database.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . 'admin/add-scholarship.php');
    exit;
}

/* ---------------- Collect & sanitize ---------------- */
$type         = strtolower(trim((string)($_POST['type'] ?? '')));
$title        = trim(filter_var($_POST['title'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$description  = trim(filter_var($_POST['description'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$link         = trim((string)($_POST['link'] ?? ''));
$eligibility  = trim(filter_var($_POST['eligibilityCriteria'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$applyDate    = trim((string)($_POST['applyDate'] ?? ''));
$deadline     = trim((string)($_POST['applicationDeadline'] ?? ''));

// Conditional fields
$university   = trim(filter_var($_POST['university'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$department   = trim(filter_var($_POST['department'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$professor_id = isset($_POST['professor_id']) && $_POST['professor_id'] !== '' ? (int)$_POST['professor_id'] : null;

/* Preserve for re-fill on error */
$_SESSION['add-scholarship-data'] = [
    'type' => $type,
    'title' => $title,
    'description' => $description,
    'link' => $link,
    'eligibilityCriteria' => $eligibility,
    'applyDate' => $applyDate,
    'applicationDeadline' => $deadline,
    'university' => $university,
    'department' => $department,
    'professor_id' => $professor_id
];

/* ---------------- Validation ---------------- */
if (!in_array($type, ['university', 'professor'], true)) {
    $_SESSION['add-scholarship-error'] = 'Please select a valid type (University or Professor).';
} elseif ($title === '') {
    $_SESSION['add-scholarship-error'] = 'Please enter a title.';
} elseif ($link === '' || !filter_var($link, FILTER_VALIDATE_URL)) {
    $_SESSION['add-scholarship-error'] = 'Please provide a valid official link (URL).';
} else {
    if ($type === 'university') {
        if ($university === '' || $department === '') {
            $_SESSION['add-scholarship-error'] = 'University and Department are required for University-type scholarships.';
        }
        $professor_id = null; // ensure null for DB
    } else { // professor
        if (!$professor_id || $professor_id <= 0) {
            $_SESSION['add-scholarship-error'] = 'Please select a valid professor.';
        }
        $university = '';
        $department = '';
    }
}

/* Date format checks (optional fields) */
$validDate = function ($d) {
    if ($d === '') return true;
    $dt = DateTime::createFromFormat('Y-m-d', $d);
    return $dt && $dt->format('Y-m-d') === $d;
};
if (empty($_SESSION['add-scholarship-error'])) {
    if (!$validDate($applyDate) || !$validDate($deadline)) {
        $_SESSION['add-scholarship-error'] = 'Dates must be valid in YYYY-MM-DD format.';
    }
}

if (!empty($_SESSION['add-scholarship-error'])) {
    header('location: ' . ROOT_URL . 'admin/add-scholarship.php');
    exit;
}

/* ---------------- Build dynamic INSERT with NULLs ---------------- */
$cols   = ['type', 'title', 'description', 'link', 'eligibilityCriteria'];
$place  = ['?', '?', '?', '?', '?'];
$types  = 'sssss';
$params = [$type, $title, $description, $link, $eligibility];

// applyDate
$cols[] = 'applyDate';
if ($applyDate === '') {
    $place[] = 'NULL';
} else {
    $place[] = '?';
    $types .= 's';
    $params[] = $applyDate;
}

// applicationDeadline
$cols[] = 'applicationDeadline';
if ($deadline === '') {
    $place[] = 'NULL';
} else {
    $place[] = '?';
    $types .= 's';
    $params[] = $deadline;
}

// university
$cols[] = 'university';
if ($university === '') {
    $place[] = 'NULL';
} else {
    $place[] = '?';
    $types .= 's';
    $params[] = $university;
}

// department
$cols[] = 'department';
if ($department === '') {
    $place[] = 'NULL';
} else {
    $place[] = '?';
    $types .= 's';
    $params[] = $department;
}

// professor_id
$cols[] = 'professor_id';
if (empty($professor_id)) {
    $place[] = 'NULL';
} else {
    $place[] = '?';
    $types .= 'i';
    $params[] = $professor_id;
}

$sql = "INSERT INTO fundings (" . implode(',', $cols) . ") VALUES (" . implode(',', $place) . ")";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    $_SESSION['add-scholarship-error'] = 'Database error (prepare failed).';
    header('location: ' . ROOT_URL . 'admin/add-scholarship.php');
    exit;
}

if ($types !== '') {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

$ok = mysqli_stmt_execute($stmt);
if (!$ok) {
    $_SESSION['add-scholarship-error'] = 'Failed to add scholarship. (' . mysqli_error($conn) . ')';
    mysqli_stmt_close($stmt);
    header('location: ' . ROOT_URL . 'admin/add-scholarship.php');
    exit;
}

mysqli_stmt_close($stmt);

/* ---------------- Success ---------------- */
unset($_SESSION['add-scholarship-data']);
$_SESSION['add-scholarship-success'] = 'Scholarship added successfully.';
header('location: ' . ROOT_URL . 'admin/scholarship-list.php');
exit;
