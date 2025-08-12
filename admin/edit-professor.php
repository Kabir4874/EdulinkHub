<?php
require '../config/database.php';

$active_page = 'professors';

// ---- Validate & fetch the professor ----
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    $_SESSION['professor-error'] = 'Invalid professor ID.';
    header('Location: professor-list.php');
    exit;
}

$prof = null;
if ($stmt = mysqli_prepare($conn, "SELECT id, name, image, researchInterests, contact_email, contact_phone, availability, profileLink FROM professors WHERE id = ?")) {
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $prof = $res ? mysqli_fetch_assoc($res) : null;
    mysqli_stmt_close($stmt);
}

if (!$prof) {
    $_SESSION['professor-error'] = 'Professor not found.';
    header('Location: professor-list.php');
    exit;
}

// If we just came back from a validation error, refill with session data
$old = $_SESSION['edit-professor-data'] ?? [];
unset($_SESSION['edit-professor-data']);

// Build defaults from DB (used if no $old value)
function old_or($key, $fallback)
{
    global $old;
    return isset($old[$key]) ? $old[$key] : $fallback;
}

// Research interests: DB stores JSON array; show as CSV string
$riCsvFromDb = '';
if (!empty($prof['researchInterests'])) {
    $decoded = json_decode($prof['researchInterests'], true);
    if (is_array($decoded)) {
        $clean = array_values(array_filter(array_map(fn($s) => is_string($s) ? trim($s) : '', $decoded), fn($v) => $v !== ''));
        $riCsvFromDb = implode(', ', $clean);
    } else {
        // if somehow not JSON, just show raw
        $riCsvFromDb = $prof['researchInterests'];
    }
}

$imgFile = trim((string)$prof['image']); // DB keeps just filename
$imgUrl  = $imgFile !== '' ? "../uploads/" . rawurlencode($imgFile) : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Professor - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Page styles + shared message styles -->
    <link rel="stylesheet" href="styles/add-professor.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <h1 class="page-title"><i class="fa-solid fa-user-pen"></i> Edit Professor</h1>

            <!-- Flash messages -->
            <?php if (!empty($_SESSION['edit-professor-error'])): ?>
                <div class="alert alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span><?= htmlspecialchars($_SESSION['edit-professor-error']) ?></span>
                </div>
                <?php unset($_SESSION['edit-professor-error']); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION['edit-professor-success'])): ?>
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span><?= htmlspecialchars($_SESSION['edit-professor-success']) ?></span>
                </div>
                <?php unset($_SESSION['edit-professor-success']); ?>
            <?php endif; ?>

            <form class="professor-form" action="logic/edit-professor-logic.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= (int)$prof['id'] ?>">
                <input type="hidden" name="existing_image" value="<?= htmlspecialchars($imgFile) ?>">

                <div class="form-group">
                    <label for="name">Professor Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter professor's name"
                        required
                        value="<?= htmlspecialchars(old_or('name', $prof['name'])) ?>">
                </div>

                <div class="form-group">
                    <label for="researchInterests">Research Interests (comma separated OR JSON array)</label>
                    <input
                        type="text"
                        id="researchInterests"
                        name="researchInterests"
                        placeholder='e.g. Artificial Intelligence, Machine Learning  OR  ["Artificial Intelligence","Machine Learning"]'
                        value="<?= htmlspecialchars(old_or('researchInterests', $riCsvFromDb)) ?>">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email">Email</label>
                        <input
                            type="email"
                            id="contact_email"
                            name="contact_email"
                            placeholder="Enter email address"
                            required
                            value="<?= htmlspecialchars(old_or('contact_email', $prof['contact_email'])) ?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_phone">Phone</label>
                        <input
                            type="text"
                            id="contact_phone"
                            name="contact_phone"
                            placeholder="Enter phone number"
                            value="<?= htmlspecialchars(old_or('contact_phone', $prof['contact_phone'])) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="profileLink">Profile Link</label>
                    <input
                        type="url"
                        id="profileLink"
                        name="profileLink"
                        placeholder="Enter profile URL"
                        value="<?= htmlspecialchars(old_or('profileLink', $prof['profileLink'])) ?>">
                </div>

                <div class="form-group checkbox-group">
                    <?php
                    $dbAvail = strtolower(trim((string)$prof['availability'])) === 'available';
                    $oldAvail = isset($old['availability']) ? (strtolower($old['availability']) === 'available' || $old['availability'] === 'on') : null;
                    $checked = is_null($oldAvail) ? $dbAvail : $oldAvail;
                    ?>
                    <input type="checkbox" id="availability" name="availability" <?= $checked ? 'checked' : '' ?>>
                    <label for="availability">Available</label>
                </div>

                <div class="form-group">
                    <label for="image">Replace Profile Image (optional)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <span class="hint">Recommended: JPG/PNG/WEBP, ≤ 2MB.</span>

                    <?php if ($imgUrl): ?>
                        <div style="margin-top:10px; display:flex; align-items:center; gap:12px;">
                            <img src="<?= htmlspecialchars($imgUrl) ?>" alt="Current Image" style="width:72px; height:72px; object-fit:cover; border-radius:8px; border:1px solid #e5e7eb;">
                            <span class="hint">Current: <?= htmlspecialchars($imgFile) ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" name="submit" class="submit-btn">
                    <i class="fa-solid fa-floppy-disk"></i> Save Changes
                </button>
            </form>
        </div>
    </main>
</body>

</html>