<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'add-university.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage University Admission</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="../admin/styles/add-university.css">
   <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Manage University Admission</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Admission Details</h2>
            </div>

            <!-- Admission Form -->
            <form id="admissionForm">
                <!-- University Name -->
                <div class="form-group">
                    <label for="universityName">University Name</label>
                    <div class="input-container">
                        <i class="fas fa-school input-icon"></i>
                        <input type="text" id="universityName" class="text-input" required>
                    </div>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <div class="input-container">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <input type="text" id="location" class="text-input" required>
                    </div>
                </div>

                <!-- Program Type -->
                <div class="form-group">
                    <label for="programType">Program Type</label>
                    <div class="input-container">
                        <i class="fas fa-graduation-cap input-icon"></i>
                        <select id="programType" class="dropdown" required>
                            <option value="" disabled selected>Select Program Type</option>
                            <option value="undergraduate">Undergraduate</option>
                            <option value="postgraduate">Postgraduate</option>
                            <option value="Ph.D.">Ph.D.</option>
                        </select>
                    </div>
                </div>

                <!-- Discipline -->
                <div class="form-group">
                    <label for="discipline">Discipline</label>
                    <div class="input-container">
                        <i class="fas fa-book-open input-icon"></i>
                        <textarea id="discipline" class="text-input" required></textarea>
                    </div>
                </div>

                <!-- Application Date -->
                <div class="form-group">
                    <label for="applyDate">Application Date</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-day input-icon"></i>
                        <input type="text" id="applyDate" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Deadline -->
                <div class="form-group">
                    <label for="deadline">Application Deadline</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-times input-icon"></i>
                        <input type="text" id="deadline" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Link -->
                <div class="form-group">
                    <label for="applyLink">Application Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="applyLink" class="text-input" required>
                    </div>
                </div>

                <!-- Admit Card Download Date -->
                <div class="form-group">
                    <label for="admitCardDate">Admit Card Download Date</label>
                    <div class="input-container">
                        <i class="fas fa-download input-icon"></i>
                        <input type="text" id="admitCardDate" class="text-input" required readonly>
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

                <!-- Exam Units Section -->
                <div class="section-header">Exam Units</div>
                <div id="examUnitsContainer">
                    <!-- Exam units will be added here dynamically -->
                </div>

                <!-- Add Exam Unit Button -->
                <button type="button" class="btn btn-success" id="addExamUnitBtn">
                    <i class="fas fa-plus"></i>
                    <span>Add Exam Unit</span>
                </button>

                <!-- Submit Button -->
                <div class="mb-20"></div>
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-check-circle"></i>
                    <span>Submit</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>