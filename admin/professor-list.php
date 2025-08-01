<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'professor-list.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/professor-list.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Professor List</h1>
    </div>
    <!-- Main Content -->
    <div class="content">
        <!-- Loading State -->
        <div class="loading-container" id="loadingIndicator">
            <div class="loading-spinner"></div>
        </div>
        <!-- Professor List -->
        <div id="professorList" style="display: none;">
            <!-- Sample Professor Card 1 -->
            <div class="professor-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Professor" class="professor-image">
                    <div class="professor-info">
                        <div class="professor-name">Dr. Robert Johnson</div>
                        <div class="professor-title">Computer Science Department</div>
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
                        <span class="detail-label">Research Interests:</span> Artificial Intelligence, Machine Learning, Data Science
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> robert.johnson@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 123-4567
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge available">Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
            <!-- Sample Professor Card 2 -->
            <div class="professor-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="professor-info">
                        <div class="professor-name">Dr. Emily Davis</div>
                        <div class="professor-title">Business Administration Department</div>
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
                        <span class="detail-label">Research Interests:</span> Marketing, Consumer Behavior, Brand Management
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> emily.davis@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 987-6543
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge not-available">Not Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
            <!-- Sample Professor Card 3 -->
            <div class="professor-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Professor" class="professor-image">
                    <div class="professor-info">
                        <div class="professor-name">Dr. Michael Wilson</div>
                        <div class="professor-title">Engineering Department</div>
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
                        <span class="detail-label">Research Interests:</span> Renewable Energy, Sustainable Design, Environmental Engineering
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> michael.wilson@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 456-7890
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge available">Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
            <!-- Sample Professor Card 4 -->
            <div class="professor-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="professor-info">
                        <div class="professor-name">Dr. Sarah Thompson</div>
                        <div class="professor-title">Psychology Department</div>
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
                        <span class="detail-label">Research Interests:</span> Cognitive Psychology, Behavioral Neuroscience, Mental Health
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> sarah.thompson@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 234-5678
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge available">Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
            <!-- Sample Professor Card 5 -->
            <div class="professor-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Professor" class="professor-image">
                    <div class="professor-info">
                        <div class="professor-name">Dr. James Anderson</div>
                        <div class="professor-title">History Department</div>
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
                        <span class="detail-label">Research Interests:</span> Ancient Civilizations, Medieval History, Cultural Anthropology
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> james.anderson@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 345-6789
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge not-available">Not Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
            <!-- Sample Professor Card 6 -->
            <div class="professor-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="professor-info">
                        <div class="professor-name">Dr. Lisa Chen</div>
                        <div class="professor-title">Mathematics Department</div>
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
                        <span class="detail-label">Research Interests:</span> Applied Mathematics, Statistical Analysis, Computational Modeling
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span> lisa.chen@university.edu
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span> (555) 567-8901
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Availability:</span>
                        <span class="availability-badge available">Available</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Profile:</span>
                        <a href="#" style="color: #4285f4;">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty State (hidden by default) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <h3>No Professors Found</h3>
            <p>There are currently no professors in the system.</p>
        </div>
    </div>
    <script>
        // Simulate loading data
        setTimeout(() => {
            document.getElementById('loadingIndicator').style.display = 'none';
            document.getElementById('professorList').style.display = 'block';
            // To show empty state instead, you would use:
            // document.getElementById('emptyState').style.display = 'block';
        }, 1500);
    </script>
</body>

</html>