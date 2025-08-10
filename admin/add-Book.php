<?php
$active_page = 'add-book';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Book - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        /* Base Styles (same palette) */
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

        /* Main Content Styles (same as add-professor.php) */
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
        .book-form {
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
        .form-group input[type="file"],
        .form-group input[type="date"],
        .form-group input[type="number"],
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

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
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
            width: 180px;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .hint {
            font-size: 13px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <h1 class="page-title"><i class="fa-solid fa-book"></i> Add Book</h1>

            <!-- No logic yet; pure form scaffold for the 'books' table -->
            <form class="book-form" method="post" enctype="multipart/form-data">
                <!-- Row: Title & Author -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Book Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter book title">
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" placeholder="Enter author name">
                    </div>
                </div>

                <!-- Row: Category & Upload Date -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="">Select category</option>
                            <option value="Admission">Admission</option>
                            <option value="Job Exam">Job Exam</option>
                            <option value="Skill-Based">Skill-Based</option>
                        </select>
                    </div>
                </div>

                <!-- Row: Image & PDF -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="image">Cover Image</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <span class="hint">Recommended: JPG/PNG, ≤ 2MB.</span>
                    </div>

                    <div class="form-group">
                        <label for="pdf">Book PDF</label>
                        <input type="file" id="pdf" name="pdf" accept="application/pdf">
                        <span class="hint">PDF file to upload.</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Short summary or key details about the book"></textarea>
                </div>

                <!-- Suggested For -->
                <div class="form-group">
                    <label for="suggestedFor">Suggested For</label>
                    <textarea id="suggestedFor" name="suggestedFor" placeholder="Who is this book most useful for? (e.g., SSC candidates, beginners, etc.)"></textarea>
                </div>

                <!-- Row: Paid & Price -->
                <div class="form-row">
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="isPaid" name="isPaid">
                        <label for="isPaid">This is a paid book</label>
                    </div>

                    <div class="form-group">
                        <label for="price">Price (USD)</label>
                        <input type="number" id="price" name="price" placeholder="0.00" step="0.01" min="0">
                        <span class="hint">Leave blank or 0 for free books.</span>
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