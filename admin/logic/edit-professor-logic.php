<?php
require '../../config/database.php';

if (!isset($_POST['submit'])) {
    header('location: ' . ROOT_URL . 'admin/professor-list.php');
    exit;
}

// Collect
$id                     = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$name                   = trim(filter_var($_POST['name'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$researchInterestsInput = trim((string)($_POST['researchInterests'] ?? ''));
$emailRaw               = trim((string)($_POST['contact_email'] ?? ''));
$contact_phone          = trim(filter_var($_POST['contact_phone'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$profileLinkRaw         = trim((string)($_POST['profileLink'] ?? ''));
$availability           = isset($_POST['availability']) ? 'available' : 'not available';
$existingImage          = trim((string)($_POST['existing_image'] ?? ''));
$image                  = $_FILES['image'] ?? null;

// Preserve for re-fill on error
$_SESSION['edit-professor-data'] = [
    'name'              => $name,
    'researchInterests' => $researchInterestsInput,
    'contact_email'     => $emailRaw,
    'contact_phone'     => $contact_phone,
    'profileLink'       => $profileLinkRaw,
    'availability'      => $availability
];

// Guard
if ($id <= 0) {
    $_SESSION['edit-professor-error'] = 'Invalid professor ID.';
    header('location: ' . ROOT_URL . 'admin/professor-list.php');
    exit;
}

// Validate
if ($name === '') {
    $_SESSION['edit-professor-error'] = 'Please enter professor name.';
} elseif (!filter_var($emailRaw, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['edit-professor-error'] = 'Please enter a valid email address.';
} elseif ($profileLinkRaw !== '' && !filter_var($profileLinkRaw, FILTER_VALIDATE_URL)) {
    $_SESSION['edit-professor-error'] = 'Profile link must be a valid URL.';
}

// researchInterests -> JSON array of strings
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
        $_SESSION['edit-professor-error'] = 'Invalid JSON format for research interests.';
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
if (empty($_SESSION['edit-professor-error'])) {
    $terms = array_values(array_unique($terms, SORT_STRING));
    if (count($terms) === 0) {
        $_SESSION['edit-professor-error'] = 'Please enter at least one research interest.';
    }
}

$researchInterestsJson = '';
if (empty($_SESSION['edit-professor-error'])) {
    $researchInterestsJson = json_encode($terms, JSON_UNESCAPED_UNICODE);
    if ($researchInterestsJson === false) {
        $_SESSION['edit-professor-error'] = 'Failed to encode research interests.';
    }
}

// Handle image (optional replace). uploads: ../uploads (DB stores just filename)
$newImageFile = $existingImage; // default keep old
$imageAbsToDelete = '';         // if replaced successfully, delete old

if (empty($_SESSION['edit-professor-error']) && $image && !empty($image['name'])) {
    if (!is_array($image) || !isset($image['name'], $image['tmp_name'])) {
        $_SESSION['edit-professor-error'] = 'Invalid image upload.';
    } else {
        $allowed = ['png', 'jpg', 'jpeg', 'webp'];
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed, true)) {
            $_SESSION['edit-professor-error'] = 'Image must be PNG, JPG, JPEG, or WEBP.';
        } elseif (!is_uploaded_file($image['tmp_name'])) {
            $_SESSION['edit-professor-error'] = 'Invalid image upload.';
        } elseif ($image['size'] > 2_000_000) {
            $_SESSION['edit-professor-error'] = 'Image too large. Max size is 2MB.';
        } else {
            $uploadDirAbs = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
            if (!is_dir($uploadDirAbs)) {
                @mkdir($uploadDirAbs, 0775, true);
            }

            $time     = time();
            $safeBase = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($image['name']));
            $fileName = $time . '_' . $safeBase;

            $destAbs = $uploadDirAbs . $fileName;
            if (!move_uploaded_file($image['tmp_name'], $destAbs)) {
                $_SESSION['edit-professor-error'] = 'Failed to save uploaded image.';
            } else {
                // success: mark old image for deletion after DB update
                $imageAbsToDelete = $existingImage ? ($uploadDirAbs . $existingImage) : '';
                $newImageFile = $fileName; // DB stores just filename
            }
        }
    }
}

// If any error so far -> back to edit page
if (!empty($_SESSION['edit-professor-error'])) {
    header('location: ' . ROOT_URL . 'admin/edit-professor.php?id=' . $id);
    exit;
}

$email       = $emailRaw;
$profileLink = $profileLinkRaw === '' ? '' : $profileLinkRaw;

// Update row
$sql = "UPDATE professors
        SET name = ?, image = ?, researchInterests = ?, contact_email = ?, contact_phone = ?, availability = ?, profileLink = ?
        WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    // If we uploaded a new image and prepare fails, try to remove it to avoid orphan
    if ($newImageFile !== $existingImage && $newImageFile !== '') {
        $uploadDirAbs = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
        $newAbs = $uploadDirAbs . $newImageFile;
        if (is_file($newAbs)) {
            @unlink($newAbs);
        }
    }
    $_SESSION['edit-professor-error'] = 'Database error (prepare failed).';
    header('location: ' . ROOT_URL . 'admin/edit-professor.php?id=' . $id);
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    'sssssssi',
    $name,
    $newImageFile,          // just the filename ('' allowed)
    $researchInterestsJson, // JSON array string
    $email,
    $contact_phone,
    $availability,
    $profileLink,
    $id
);

$ok = mysqli_stmt_execute($stmt);
if (!$ok) {
    // Rollback new file if DB failed
    if ($newImageFile !== $existingImage && $newImageFile !== '') {
        $uploadDirAbs = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
        $newAbs = $uploadDirAbs . $newImageFile;
        if (is_file($newAbs)) {
            @unlink($newAbs);
        }
    }
    $_SESSION['edit-professor-error'] = 'Failed to update professor. (' . mysqli_error($conn) . ')';
    mysqli_stmt_close($stmt);
    header('location: ' . ROOT_URL . 'admin/edit-professor.php?id=' . $id);
    exit;
}

mysqli_stmt_close($stmt);

// Delete old image if we replaced it and file exists
if ($imageAbsToDelete && is_file($imageAbsToDelete)) {
    @unlink($imageAbsToDelete);
}

// Success
unset($_SESSION['edit-professor-data']);
$_SESSION['edit-professor-success'] = 'Professor updated successfully.';
header('location: ' . ROOT_URL . 'admin/edit-professor.php?id=' . $id);
exit;
