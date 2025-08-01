<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'add-Scholarship';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Scholarship - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/add-Scholarship.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Add Scholarship</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Scholarship Details</h2>
            </div>

            <!-- Scholarship Form -->
            <form id="scholarshipForm">
                <!-- Type Dropdown -->
                <div class="form-group">
                    <label for="type">Type</label>
                    <div class="input-container">
                        <i class="fas fa-tag input-icon"></i>
                        <select id="type" class="dropdown" required>
                            <option value="" disabled selected>Select type</option>
                            <option value="scholarship">Scholarship</option>
                            <option value="professor">Professor</option>
                        </select>
                    </div>
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <div class="input-container">
                        <i class="fas fa-heading input-icon"></i>
                        <input type="text" id="title" class="text-input" required>
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

                <!-- Link -->
                <div class="form-group">
                    <label for="link">Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="link" class="text-input" required>
                    </div>
                </div>

                <!-- Eligibility Criteria -->
                <div class="form-group">
                    <label for="eligibility">Eligibility Criteria</label>
                    <div class="input-container">
                        <i class="fas fa-clipboard-check input-icon"></i>
                        <input type="text" id="eligibility" class="text-input" required>
                    </div>
                </div>

                <!-- Apply Date -->
                <div class="form-group">
                    <label for="applyDate">Apply Date (MM/DD/YYYY)</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-day input-icon"></i>
                        <input type="text" id="applyDate" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Deadline -->
                <div class="form-group">
                    <label for="deadline">Application Deadline (MM/DD/YYYY)</label>
                    <div class="input-container">
                        <i class="fas fa-calendar input-icon"></i>
                        <input type="text" id="deadline" class="text-input" required readonly>
                    </div>
                </div>

                <!-- University -->
                <div class="form-group">
                    <label for="university">University</label>
                    <div class="input-container">
                        <i class="fas fa-university input-icon"></i>
                        <input type="text" id="university" class="text-input" required>
                    </div>
                </div>

                <!-- Department -->
                <div class="form-group">
                    <label for="department">Department</label>
                    <div class="input-container">
                        <i class="fas fa-building input-icon"></i>
                        <input type="text" id="department" class="text-input" required>
                    </div>
                </div>

                <!-- Professor Dropdown (Conditional) -->
                <div class="form-group" id="professorGroup" style="display: none;">
                    <label for="professor">Professor</label>
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                        <span>Loading professors...</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-check-circle"></i>
                    <span>Submit</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>