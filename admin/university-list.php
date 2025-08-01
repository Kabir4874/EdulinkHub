<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'university-list.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/university-list.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>University List</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Loading State -->
        <div class="loading-container" id="loadingIndicator">
            <div class="loading-spinner"></div>
        </div>

        <!-- Admission List -->
        <div id="admissionList" style="display: none;">
            <!-- Sample Admission Card 1 -->
            <div class="admission-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="University" class="university-image">
                    <div class="university-info">
                        <div class="university-name">Harvard University</div>
                        <div class="university-location">Cambridge, MA, USA</div>
                    </div>
                    <div class="action-buttons">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Program:</span> Undergraduate
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Discipline:</span> Computer Science, Engineering
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 15 Oct 2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 01 Dec 2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Exam Units:</span> Unit A (15 Jan 2024), Unit B (20 Jan 2024)
                    </div>
                </div>
            </div>

            <!-- Sample Admission Card 2 -->
            <div class="admission-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="university-info">
                        <div class="university-name">Stanford University</div>
                        <div class="university-location">Stanford, CA, USA</div>
                    </div>
                    <div class="action-buttons">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Program:</span> Postgraduate
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Discipline:</span> Business Administration
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 01 Nov 2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 15 Jan 2024
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Exam Units:</span> GMAT (10 Feb 2024)
                    </div>
                </div>
            </div>

            <!-- Sample Admission Card 3 -->
            <div class="admission-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="University" class="university-image">
                    <div class="university-info">
                        <div class="university-name">MIT</div>
                        <div class="university-location">Cambridge, MA, USA</div>
                    </div>
                    <div class="action-buttons">
                        <button class="action-btn edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-btn delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Program:</span> Ph.D.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Discipline:</span> Artificial Intelligence
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 01 Sep 2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 15 Dec 2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Exam Units:</span> Research Proposal (20 Jan 2024), Interview (10 Feb 2024)
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (hidden by default) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-university"></i>
            </div>
            <h3>No Admissions Found</h3>
            <p>There are currently no university admissions listed.</p>
        </div>
    </div>

    <script>
        // This would be replaced with actual data fetching in a real implementation
        setTimeout(() => {
            document.getElementById('loadingIndicator').style.display = 'none';
            document.getElementById('admissionList').style.display = 'block';
            // To show empty state instead, you would use:
            // document.getElementById('emptyState').style.display = 'block';
        }, 1500);
    </script>
</body>

</html>