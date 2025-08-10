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

    <style>
        /* Base Styles (same palette as add-book.php) */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --gray-color: #adb5bd;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }

        /* Main Content (same structure as add-book.php) */
        .main-content {
            flex: 1;
            margin-left: 250px;
            /* keep aligned with sidebar width */
        }

        .content {
            background-color: #fff;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
            max-width: 900px;
            margin: 24px auto;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 30px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        /* Form Styles */
        .uni-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-group input[type="text"],
        .form-group input[type="url"],
        .form-group input[type="file"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            padding: 12px 15px;
            border: 1px solid var(--gray-color);
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
            background: #fff;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--gray-color);
        }

        .hint {
            font-size: 13px;
            color: #6c757d;
        }

        /* Submit Button */
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 6px;
            width: 200px;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
    </style>
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