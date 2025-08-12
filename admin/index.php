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

    <link rel="stylesheet" href="styles/dashboard.css">
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