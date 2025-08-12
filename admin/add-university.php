<?php
$active_page = 'add-university';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add University - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/add-university.css">
</head>

<body>
    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <h1 class="page-title"><i class="fa-solid fa-building-columns"></i> Add University</h1>

            <!-- No logic yet; pure form scaffold for the university/admission table -->
            <form class="uni-form" method="post" enctype="multipart/form-data">
                <!-- Row: Name & Location -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">University Name</label>
                        <input type="text" id="name" name="name" placeholder="e.g., Oxford University">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="City, Country">
                    </div>
                </div>

                <!-- Row: Program Type & Discipline -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="programType">Program Type</label>
                        <select id="programType" name="programType">
                            <option value="">Select program type</option>
                            <option value="undergraduate">Undergraduate</option>
                            <option value="postgraduate">Postgraduate</option>
                            <option value="Ph.D.">Ph.D.</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="discipline">Discipline</label>
                        <input type="text" id="discipline" name="discipline" placeholder="e.g., Computer Science, Economics">
                    </div>
                </div>

                <!-- Admission Link -->
                <div class="form-group">
                    <label for="admissionLink">Admission Link</label>
                    <input type="url" id="admissionLink" name="admissionLink" placeholder="https://example.edu/admissions">
                </div>

                <!-- Row: Application Dates -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="applicationDate">Application Start Date</label>
                        <input type="date" id="applicationDate" name="applicationDate">
                    </div>

                    <div class="form-group">
                        <label for="applicationDeadline">Application Deadline</label>
                        <input type="date" id="applicationDeadline" name="applicationDeadline">
                    </div>
                </div>

                <!-- Admit Card & Image -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="admitCardDownloadDate">Admit Card Download Date</label>
                        <input type="date" id="admitCardDownloadDate" name="admitCardDownloadDate">
                    </div>

                    <div class="form-group">
                        <label for="image">University/Image Banner (optional)</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <span class="hint">Recommended: JPG/PNG, ≤ 2MB.</span>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fa-solid fa-check-circle"></i> Submit
                </button>
            </form>
        </div>
    </main>
</body>

</html>