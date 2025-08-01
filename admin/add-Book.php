<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'add-Book';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/add-Book.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">

</head>

<body>

<?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Add Book</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📚 Enter Book Details</h2>
            </div>

            <!-- Book Form -->
            <form id="bookForm">
                <!-- Book Name -->
                <div class="form-group">
                    <label for="bookName">Book Name</label>
                    <div class="input-container">
                        <i class="fas fa-book input-icon"></i>
                        <input type="text" id="bookName" class="text-input" required>
                    </div>
                </div>

                <!-- Author Name -->
                <div class="form-group">
                    <label for="authorName">Author Name</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="authorName" class="text-input" required>
                    </div>
                </div>

                <!-- Image URL -->
                <div class="form-group">
                    <label for="imageUrl">Image URL</label>
                    <div class="input-container">
                        <i class="fas fa-image input-icon"></i>
                        <input type="url" id="imageUrl" class="text-input" required>
                    </div>
                </div>

                <!-- Category Dropdown -->
                <div class="form-group">
                    <label for="category">Category</label>
                    <div class="input-container">
                        <i class="fas fa-tag input-icon"></i>
                        <select id="category" class="dropdown" required>
                            <option value="Admission">Admission</option>
                            <option value="Job Exam">Job Exam</option>
                            <option value="Skill-Based">Skill-Based</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="input-container">
                        <i class="fas fa-align-left input-icon"></i>
                        <input type="text" id="description" class="text-input" required>
                    </div>
                </div>

                <!-- PDF Link -->
                <div class="form-group">
                    <label for="pdfLink">PDF Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="pdfLink" class="text-input" required>
                    </div>
                </div>

                <!-- Suggested For -->
                <div class="form-group">
                    <label for="suggestedFor">Suggested For (comma-separated)</label>
                    <div class="input-container">
                        <i class="fas fa-graduation-cap input-icon"></i>
                        <input type="text" id="suggestedFor" class="text-input" required>
                    </div>
                </div>

                <!-- Is Paid Toggle -->
                <div class="toggle-container">
                    <span class="toggle-label">Is Paid?</span>
                    <label class="toggle-switch">
                        <input type="checkbox" id="isPaid">
                        <span class="slider"></span>
                    </label>
                </div>

                <!-- Price Field (hidden by default) -->
                <div class="form-group" id="priceField" style="display: none;">
                    <label for="price">Price</label>
                    <div class="input-container">
                        <i class="fas fa-dollar-sign input-icon"></i>
                        <input type="number" id="price" class="text-input" step="0.01">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-check-circle"></i>
                    <span>Add Book</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>