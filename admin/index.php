<?php
$active_page = 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />

    <style>
        /* Base Styles */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --gray-color: #adb5bd;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            transition: var(--transition);
        }

        .content {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Styles */
        .welcome-header {
            margin-bottom: 30px;
        }

        .welcome-header h1 {
            font-size: 28px;
            color: var(--dark-color);
            font-weight: 700;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            display: block;
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--box-shadow);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 15px;
        }

        .card-icon {
            font-size: 2.5rem;
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
        }

        /* Card Color Variants */
        .card-blue {
            border-left-color: #4361ee;
        }

        .card-blue .card-icon {
            background-color: #4361ee;
        }

        .card-red {
            border-left-color: #f72585;
        }

        .card-red .card-icon {
            background-color: #f72585;
        }

        .card-cyan {
            border-left-color: #4cc9f0;
        }

        .card-cyan .card-icon {
            background-color: #4cc9f0;
        }

        .card-orange {
            border-left-color: #f8961e;
        }

        .card-orange .card-icon {
            background-color: #f8961e;
        }

        .card-purple {
            border-left-color: #7209b7;
        }

        .card-purple .card-icon {
            background-color: #7209b7;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <header class="welcome-header">
                <h1>Welcome, Admin!</h1>
            </header>

            <section class="dashboard-grid">
                <a class="dashboard-card card-blue" href="university-list.php" title="Manage Admission">
                    <div class="card-content">
                        <i class="fa-solid fa-school card-icon"></i>
                        <div class="card-title">Manage Admission</div>
                    </div>
                </a>

                <a class="dashboard-card card-red" href="scholarship-list.php" title="All Scholarship List">
                    <div class="card-content">
                        <i class="fa-solid fa-list card-icon"></i>
                        <div class="card-title">All Scholarship List</div>
                    </div>
                </a>

                <a class="dashboard-card card-cyan" href="professor-list.php" title="All Professor List">
                    <div class="card-content">
                        <i class="fa-solid fa-user-graduate card-icon"></i>
                        <div class="card-title">All Professor List</div>
                    </div>
                </a>

                <a class="dashboard-card card-orange" href="book-list.php" title="Manage Books">
                    <div class="card-content">
                        <i class="fa-solid fa-book card-icon"></i>
                        <div class="card-title">Manage Books</div>
                    </div>
                </a>

                <a class="dashboard-card card-purple" href="reports.php" title="View Reports">
                    <div class="card-content">
                        <i class="fa-solid fa-chart-line card-icon"></i>
                        <div class="card-title">View Reports</div>
                    </div>
                </a>
            </section>
        </div>
    </main>
</body>

</html>