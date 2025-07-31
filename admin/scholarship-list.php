<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship List - Admin</title>
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

        /* Search and Filter Section */
        .search-filter-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 20px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .filter-dropdown {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
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

        /* Scholarship Card */
        .scholarship-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .scholarship-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .scholarship-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .scholarship-info {
            flex: 1;
        }

        .scholarship-title {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .scholarship-university {
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

        .type-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 8px;
        }

        .scholarship-badge {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .professor-badge {
            background-color: #e3f2fd;
            color: #1565c0;
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

        /* Responsive */
        @media (min-width: 768px) {
            .search-filter-container {
                flex-direction: row;
                gap: 16px;
            }

            .search-box {
                flex: 3;
            }

            .filter-dropdown {
                flex: 1;
            }
        }
    </style>
</head>

<body>
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