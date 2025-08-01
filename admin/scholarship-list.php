
<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'scholarship-list.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/scholarship-list.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Scholarship List</h1>
    </div>
    <!-- Main Content -->
    <div class="content">
        <!-- Search and Filter Section -->
        <div class="search-filter-container">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Scholarships...">
            </div>
            <select class="filter-dropdown">
                <option value="all">All Types</option>
                <option value="scholarship">Scholarship</option>
                <option value="professor">Professor</option>
            </select>
        </div>

        <!-- Loading State -->
        <div class="loading-container" id="loadingIndicator">
            <div class="loading-spinner"></div>
        </div>

        <!-- Scholarship List -->
        <div id="scholarshipList" style="display: none;">
            <!-- Sample Scholarship Card 1 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            Merit Scholarship Program
                            <span class="type-badge scholarship-badge">Scholarship</span>
                        </div>
                        <div class="scholarship-university">Harvard University</div>
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
                        <span class="detail-label">Department:</span> Computer Science
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 10/15/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 12/01/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Full tuition scholarship for outstanding students in Computer Science.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> Minimum GPA of 3.8, demonstrated leadership skills.
                    </div>
                </div>
            </div>

            <!-- Sample Scholarship Card 2 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            Research Assistant Position
                            <span class="type-badge professor-badge">Professor</span>
                        </div>
                        <div class="scholarship-university">Stanford University</div>
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
                        <span class="detail-label">Department:</span> Artificial Intelligence
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 11/01/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 01/15/2024
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Research assistant position for AI research projects with monthly stipend.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> Graduate students with background in Machine Learning.
                    </div>
                </div>
            </div>

            <!-- Sample Scholarship Card 3 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            International Student Scholarship
                            <span class="type-badge scholarship-badge">Scholarship</span>
                        </div>
                        <div class="scholarship-university">MIT</div>
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
                        <span class="detail-label">Department:</span> Engineering
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 09/15/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 11/30/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Partial scholarship for international students pursuing graduate degrees.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> Non-US citizens with strong academic record.
                    </div>
                </div>
            </div>

            <!-- Sample Scholarship Card 4 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            Teaching Assistant Position
                            <span class="type-badge professor-badge">Professor</span>
                        </div>
                        <div class="scholarship-university">University of California, Berkeley</div>
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
                        <span class="detail-label">Department:</span> Business Administration
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 10/01/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 12/15/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Teaching assistant position for undergraduate business courses with tuition waiver.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> MBA students with excellent communication skills.
                    </div>
                </div>
            </div>

            <!-- Sample Scholarship Card 5 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            Women in STEM Scholarship
                            <span class="type-badge scholarship-badge">Scholarship</span>
                        </div>
                        <div class="scholarship-university">Carnegie Mellon University</div>
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
                        <span class="detail-label">Department:</span> Robotics
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 11/15/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 01/31/2024
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Full scholarship for women pursuing degrees in Robotics and related fields.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> Female students with strong academic background in STEM.
                    </div>
                </div>
            </div>

            <!-- Sample Scholarship Card 6 -->
            <div class="scholarship-card">
                <div class="card-header">
                    <div class="scholarship-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="scholarship-info">
                        <div class="scholarship-title">
                            Postdoctoral Research Fellowship
                            <span class="type-badge professor-badge">Professor</span>
                        </div>
                        <div class="scholarship-university">Princeton University</div>
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
                        <span class="detail-label">Department:</span> Physics
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Apply Date:</span> 09/01/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Deadline:</span> 11/01/2023
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Two-year postdoctoral fellowship with competitive salary and research funding.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Eligibility:</span> Recent PhD graduates in Physics or related fields.
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (hidden by default) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h3>No Scholarships Found</h3>
            <p>There are currently no scholarships listed in the system.</p>
        </div>
    </div>

    <script>
        // Simulate loading data
        setTimeout(() => {
            document.getElementById('loadingIndicator').style.display = 'none';
            document.getElementById('scholarshipList').style.display = 'block';
            // To show empty state instead, you would use:
            // document.getElementById('emptyState').style.display = 'block';
        }, 1500);
    </script>
</body>

</html>