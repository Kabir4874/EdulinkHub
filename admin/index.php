<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
    <link rel="stylesheet" href="../admin/styles/navbar.css">


</head>

<body>
    <!-- Sidebar -->
    <?= include './common/sidebar.php' ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <?= include './common/navbar.php' ?>

        <!-- Dashboard Content -->
        <div class="content">
            <div class="welcome-header">
                <h1>Welcome, Admin!</h1>
            </div>

            <div class="dashboard-grid">
                <!-- Card 1 -->
                <div class="dashboard-card card-blue" onclick="window.location.href='#'">
                    <div class="card-content">
                        <i class="fas fa-user-graduate card-icon"></i>
                        <h3 class="card-title">Manage Admission</h3>
                        <p>View and manage student admissions</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="dashboard-card card-red" onclick="window.location.href='#'">
                    <div class="card-content">
                        <i class="fas fa-list-alt card-icon"></i>
                        <h3 class="card-title">All Scholarship List</h3>
                        <p>Manage scholarship applications</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="dashboard-card card-cyan" onclick="window.location.href='#'">
                    <div class="card-content">
                        <i class="fas fa-chalkboard-teacher card-icon"></i>
                        <h3 class="card-title">All Professor List</h3>
                        <p>View and manage professors</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="dashboard-card card-orange" onclick="window.location.href='#'">
                    <div class="card-content">
                        <i class="fas fa-book card-icon"></i>
                        <h3 class="card-title">Manage Books</h3>
                        <p>Library book management</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="dashboard-card card-purple" onclick="window.location.href='#'">
                    <div class="card-content">
                        <i class="fas fa-chart-bar card-icon"></i>
                        <h3 class="card-title">View Reports</h3>
                        <p>Analytics and statistics</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>