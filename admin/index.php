<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ef5350;
            --sidebar-width: 250px;
            --navbar-height: 60px;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            transition: all var(--transition-speed) ease;
            z-index: 100;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-header h3 {
            color: white;
            font-size: 1.3rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 15px 25px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary-color);
            color: white;
        }

        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary-color);
            color: white;
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all var(--transition-speed) ease;
        }

        /* Navbar Styles */
        .navbar {
            height: var(--navbar-height);
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .navbar-left h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info h4 {
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .user-info p {
            font-size: 0.7rem;
            color: #7f8c8d;
        }

        /* Dashboard Content */
        .content {
            padding: 20px;
        }

        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome-header h1 {
            color: #2c3e50;
            font-size: 2rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .dashboard-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            position: relative;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: white;
            text-align: center;
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }

        .dashboard-card:hover .card-icon {
            transform: scale(1.1);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Card Colors */
        .card-blue {
            background: linear-gradient(135deg, #4285f4, #2a56c6);
        }

        .card-red {
            background: linear-gradient(135deg, #ef5350, #d32f2f);
        }

        .card-cyan {
            background: linear-gradient(135deg, #26c6da, #0097a7);
        }

        .card-orange {
            background: linear-gradient(135deg, #ffa726, #fb8c00);
        }

        .card-purple {
            background: linear-gradient(135deg, #ab47bc, #8e24aa);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>EduLink Hub</h3>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-user-graduate"></i> Students</a>
            <a href="#"><i class="fas fa-chalkboard-teacher"></i> Professors</a>
            <a href="#"><i class="fas fa-book"></i> Courses</a>
            <a href="#"><i class="fas fa-book-open"></i> Library</a>
            <a href="#"><i class="fas fa-money-bill-wave"></i> Scholarships</a>
            <a href="#"><i class="fas fa-chart-bar"></i> Reports</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-left">
                <button class="toggle-btn" id="toggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <h2>Admin Dashboard</h2>
            </div>
            <div class="navbar-right">
                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin">
                    <div class="user-info">
                        <h4>Admin User</h4>
                        <p>Super Admin</p>
                    </div>
                </div>
            </div>
        </nav>

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