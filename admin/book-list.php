<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ef9a9a;
            /* Red shade similar to Flutter */
            --text-color: #333;
            --border-color: #ddd;
            --background-color: #f5f5f5;
            --card-bg: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* App Bar */
        .app-bar {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .app-bar h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Main Content */
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Loading Indicator */
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(239, 154, 154, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Book Card */
        .book-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .book-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
        }

        .image-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #999;
        }

        .book-info {
            flex: 1;
        }

        .book-title {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .book-author {
            color: #666;
            font-size: 0.9rem;
        }

        .action-buttons {
            display: flex;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 10px;
            padding: 5px;
        }

        .edit-btn {
            color: #4285f4;
        }

        .delete-btn {
            color: #f44336;
        }

        .card-details {
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .detail-row {
            margin-bottom: 5px;
        }

        .detail-label {
            font-weight: 500;
            color: #555;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ccc;
        }
    </style>
</head>

<body>
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