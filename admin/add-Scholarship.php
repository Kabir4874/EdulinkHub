<?php
$active_page = 'add-scholarship';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Scholarship - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/add-scholarship.css">
</head>

<body>
    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <h1 class="page-title"><i class="fa-solid fa-graduation-cap"></i> Add Scholarship</h1>

            <!-- No backend logic yet; pure form scaffold for the 'scholarships' table -->
            <form class="sch-form" method="post">
                <!-- Row: Title & Type -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Scholarship Title</label>
                        <input type="text" id="title" name="title" placeholder="e.g., Full Tuition Merit Scholarship">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <!-- Two types as per requirement -->
                        <select id="type" name="type">
                            <option value="">Select type</option>
                            <option value="university">University</option>
                            <option value="professor">Professor</option>
                        </select>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label for="link">Official Link</label>
                    <input type="url" id="link" name="link" placeholder="https://example.edu/scholarships/merit-2025">
                </div>

                <!-- Dates -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="applyDate">Application Start Date</label>
                        <input type="date" id="applyDate" name="applyDate">
                    </div>

                    <div class="form-group">
                        <label for="applicationDeadline">Application Deadline</label>
                        <input type="date" id="applicationDeadline" name="applicationDeadline">
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Brief description of the scholarship, benefits, duration, etc."></textarea>
                </div>

                <!-- Eligibility -->
                <div class="form-group">
                    <label for="eligibilityCriteria">Eligibility Criteria</label>
                    <textarea id="eligibilityCriteria" name="eligibilityCriteria" placeholder="Eligibility requirements (e.g., GPA, nationality, discipline)"></textarea>
                </div>

                <!-- UNIVERSITY SECTION (visible when type = university) -->
                <div id="universitySection" class="section" style="display:none;">
                    <div class="section-title"><i class="fa-solid fa-building-columns"></i> University Details</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="university">University</label>
                            <input type="text" id="university" name="university" placeholder="e.g., University of XYZ">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" id="department" name="department" placeholder="e.g., Computer Science">
                        </div>
                    </div>
                    <div class="hint">This section is required for university-type scholarships.</div>
                </div>

                <!-- PROFESSOR SECTION (visible when type = professor) -->
                <div id="professorSection" class="section" style="display:none;">
                    <div class="section-title"><i class="fa-solid fa-user-tie"></i> Select Professor</div>

                    <div class="form-group">
                        <label for="professor_id">Professor</label>
                        <select id="professor_id" name="professor_id">
                            <option value="">Select a professor</option>

                            <?php /* 
                Replace these example options with your real professor list:
                Example:

                <?php foreach ($professors as $p): ?>
                  <option value="<?= (int)$p['id'] ?>">
                    <?= htmlspecialchars($p['name']) ?> — <?= htmlspecialchars($p['contact_email']) ?>
                  </option>
                <?php endforeach; ?>
              */ ?>

                            <!-- Static placeholders for visual testing (remove when wiring to DB) -->
                            <option value="1">Dr. Jane Doe — jane.doe@example.com</option>
                            <option value="2">Dr. John Smith — john.smith@example.com</option>
                        </select>
                        <div class="hint">Pick the supervising/awarding professor for this scholarship.</div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fa-solid fa-check-circle"></i> Submit
                </button>
            </form>
        </div>
    </main>

    <script>
        // Show/Hide sections based on scholarship "type"
        (function() {
            const typeSel = document.getElementById('type');
            const uniSec = document.getElementById('universitySection');
            const profSec = document.getElementById('professorSection');

            const uni = document.getElementById('university');
            const dept = document.getElementById('department');
            const prof = document.getElementById('professor_id');

            function updateVisibility() {
                const v = (typeSel.value || '').toLowerCase();

                if (v === 'university') {
                    uniSec.style.display = '';
                    profSec.style.display = 'none';

                    // required flags
                    uni.required = true;
                    dept.required = true;
                    prof.required = false;
                } else if (v === 'professor') {
                    uniSec.style.display = 'none';
                    profSec.style.display = '';

                    uni.required = false;
                    dept.required = false;
                    prof.required = true;
                } else {
                    uniSec.style.display = 'none';
                    profSec.style.display = 'none';

                    uni.required = false;
                    dept.required = false;
                    prof.required = false;
                }
            }

            typeSel.addEventListener('change', updateVisibility);
            updateVisibility();
        })();
    </script>
</body>

</html>