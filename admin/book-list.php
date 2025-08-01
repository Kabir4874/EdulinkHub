<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'book-list.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/book-list.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Book List</h1>
    </div>
    <!-- Main Content -->
    <div class="content">
        <!-- Loading State -->
        <div class="loading-container" id="loadingIndicator">
            <div class="loading-spinner"></div>
        </div>
        <!-- Book List -->
        <div id="bookList" style="display: none;">
            <!-- Sample Book Card 1 -->
            <div class="book-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Book Cover" class="book-image">
                    <div class="book-info">
                        <div class="book-title">Introduction to Flutter</div>
                        <div class="book-author">John Doe</div>
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
                        <span class="detail-label">Category:</span> Programming
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $29.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> A comprehensive guide to Flutter development for beginners and intermediate developers.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> Developers, Students, Tech Enthusiasts
                    </div>
                </div>
            </div>
            <!-- Sample Book Card 2 -->
            <div class="book-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="book-info">
                        <div class="book-title">Advanced JavaScript</div>
                        <div class="book-author">Jane Smith</div>
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
                        <span class="detail-label">Category:</span> Web Development
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $39.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Deep dive into advanced JavaScript concepts and modern development techniques.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> Web Developers, Programmers
                    </div>
                </div>
            </div>
            <!-- Sample Book Card 3 -->
            <div class="book-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Book Cover" class="book-image">
                    <div class="book-info">
                        <div class="book-title">Data Science Fundamentals</div>
                        <div class="book-author">Robert Johnson</div>
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
                        <span class="detail-label">Category:</span> Data Science
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $49.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Essential concepts and techniques in data science with practical examples.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> Data Analysts, Scientists, Researchers
                    </div>
                </div>
            </div>
            <!-- Sample Book Card 4 -->
            <div class="book-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Book Cover" class="book-image">
                    <div class="book-info">
                        <div class="book-title">UI/UX Design Principles</div>
                        <div class="book-author">Emily Davis</div>
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
                        <span class="detail-label">Category:</span> Design
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $34.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Fundamental principles of user interface and user experience design.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> Designers, Product Managers
                    </div>
                </div>
            </div>
            <!-- Sample Book Card 5 -->
            <div class="book-card">
                <div class="card-header">
                    <div class="image-placeholder">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="book-info">
                        <div class="book-title">Cloud Computing Basics</div>
                        <div class="book-author">Michael Wilson</div>
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
                        <span class="detail-label">Category:</span> Cloud Technology
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $44.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Introduction to cloud computing concepts and major service providers.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> IT Professionals, System Administrators
                    </div>
                </div>
            </div>
            <!-- Sample Book Card 6 -->
            <div class="book-card">
                <div class="card-header">
                    <img src="https://via.placeholder.com/60" alt="Book Cover" class="book-image">
                    <div class="book-info">
                        <div class="book-title">Mobile App Development</div>
                        <div class="book-author">Sarah Thompson</div>
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
                        <span class="detail-label">Category:</span> Mobile Development
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span> $37.99
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Description:</span> Complete guide to building mobile applications for iOS and Android platforms.
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Suggested For:</span> Mobile Developers, App Designers
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty State (hidden by default) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-book"></i>
            </div>
            <h3>No Books Found</h3>
            <p>There are currently no books in the system.</p>
        </div>
    </div>
    <script>
        // Simulate loading data
        setTimeout(() => {
            document.getElementById('loadingIndicator').style.display = 'none';
            document.getElementById('bookList').style.display = 'block';
            // To show empty state instead, you would use:
            // document.getElementById('emptyState').style.display = 'block';
        }, 1500);
    </script>
</body>

</html>