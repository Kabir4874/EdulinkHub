<?php
require '../config/database.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$active_page = 'add-professor';

// Values to (re)fill the form after an error
$old = $_SESSION['add-professor-data'] ?? [];
unset($_SESSION['add-professor-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Professor - EduLink Hub</title>

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
            <h1 class="page-title"><i class="fa-solid fa-user-plus"></i> Enter Professor Details</h1>

            <!-- Flash messages -->
            <?php if (!empty($_SESSION['add-professor-error'])): ?>
                <div class="alert alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span><?= htmlspecialchars($_SESSION['add-professor-error']) ?></span>
                </div>
                <?php unset($_SESSION['add-professor-error']); ?>
            <?php endif; ?>



            <form class="professor-form" action="logic/add-professor-logic.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Professor Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter professor's name"
                        required
                        value="<?= isset($old['name']) ? htmlspecialchars($old['name']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="researchInterests">Research Interests (comma separated)</label>
                    <input
                        type="text"
                        id="researchInterests"
                        name="researchInterests"
                        placeholder="e.g. AI, Machine Learning, Data Science"
                        value="<?= isset($old['researchInterests']) ? htmlspecialchars($old['researchInterests']) : '' ?>">
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
                            value="<?= isset($old['contact_email']) ? htmlspecialchars($old['contact_email']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_phone">Phone</label>
                        <input
                            type="text"
                            id="contact_phone"
                            name="contact_phone"
                            placeholder="Enter phone number"
                            value="<?= isset($old['contact_phone']) ? htmlspecialchars($old['contact_phone']) : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="profileLink">Profile Link</label>
                    <input
                        type="url"
                        id="profileLink"
                        name="profileLink"
                        placeholder="Enter profile URL"
                        value="<?= isset($old['profileLink']) ? htmlspecialchars($old['profileLink']) : '' ?>">
                </div>

                <div class="form-group checkbox-group">
                    <?php
                    $checked = !isset($old['availability']) || $old['availability'] === 'available' || $old['availability'] === 'on';
                    ?>
                    <input type="checkbox" id="availability" name="availability" <?= $checked ? 'checked' : '' ?>>
                    <label for="availability">Available</label>
                </div>

                <div class="form-group">
                    <label for="image">Profile Image (optional)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <span class="hint">Recommended: JPG/PNG/WEBP, ≤ 2MB.</span>
                </div>

                <button type="submit" name="submit" class="submit-btn">
                    <i class="fa-solid fa-check-circle"></i> Submit
                </button>
            </form>
        </div>
    </main>
</body>

</html>