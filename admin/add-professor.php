<?php
$active_page = 'add-professor';
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

    <style>
        /* Base Styles */
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

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            /* keep in sync with your sidebar width */
            min-height: 100vh;
        }

        .content {
            background-color: #fff;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
            max-width: 900px;
            margin: 24px auto;
            /* fixed: remove giant top gap, center nicely */
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 24px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        /* Form */
        .professor-form {
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
        .form-group input[type="email"],
        .form-group input[type="url"],
        .form-group input[type="file"] {
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            /* clearer, lighter border */
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
            background: #fff;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
        }

        .form-group input::placeholder {
            color: var(--gray-color);
        }

        /* Fixed: this needs display:flex to actually align horizontally */
        .checkbox-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
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
            margin-top: 4px;
            width: 180px;
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
            <h1 class="page-title"><i class="fa-solid fa-user-plus"></i> Enter Professor Details</h1>

            <form class="professor-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Professor Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter professor's name">
                </div>

                <div class="form-group">
                    <label for="researchInterests">Research Interests (comma separated)</label>
                    <input type="text" id="researchInterests" name="researchInterests" placeholder="e.g. AI, Machine Learning, Data Science">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email">Email</label>
                        <input type="email" id="contact_email" name="contact_email" placeholder="Enter email address">
                    </div>

                    <div class="form-group">
                        <label for="contact_phone">Phone</label>
                        <input type="text" id="contact_phone" name="contact_phone" placeholder="Enter phone number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="profileLink">Profile Link</label>
                    <input type="url" id="profileLink" name="profileLink" placeholder="Enter profile URL">
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="availability" name="availability" checked>
                    <label for="availability">Available</label>
                </div>

                <div class="form-group">
                    <label for="image">Profile Image (optional)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <span class="hint">Recommended: JPG/PNG, ≤ 2MB.</span>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fa-solid fa-check-circle"></i> Submit
                </button>
            </form>
        </div>
    </main>
</body>

</html>