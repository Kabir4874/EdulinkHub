<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission List - Admin</title>
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

        /* Admission Card */
        .admission-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .admission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .university-image {
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

        .university-info {
            flex: 1;
        }

        .university-name {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .university-location {
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