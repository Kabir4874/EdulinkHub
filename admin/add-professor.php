
<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'add-professor';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Professor - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/add-professor.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Add Professor</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Professor Details</h2>
            </div>

            <!-- Professor Form -->
            <form id="professorForm">
                <!-- Professor Name -->
                <div class="form-group">
                    <label for="professorName">Professor Name</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="professorName" class="text-input" required>
                    </div>
                </div>

                <!-- Research Interests -->
                <div class="form-group">
                    <label for="researchInterests">Research Interests (comma separated)</label>
                    <div class="input-container">
                        <i class="fas fa-book input-icon"></i>
                        <input type="text" id="researchInterests" class="text-input" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" class="text-input" required>
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <div class="input-container">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" id="phone" class="text-input" required>
                    </div>
                </div>

                <!-- Profile Link -->
                <div class="form-group">
                    <label for="profileLink">Profile Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="profileLink" class="text-input" required>
                    </div>
                </div>

                <!-- Availability Checkbox -->
                <div class="checkbox-container">
                    <input type="checkbox" id="isAvailable" class="checkbox-input" checked>
                    <label for="isAvailable" class="checkbox-label">Available</label>
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