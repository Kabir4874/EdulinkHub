<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>
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
            align-items: center;
            color: white;
        }

        .card-icon {
            font-size: 2.5rem;
            margin-right: 20px;
            transition: transform 0.3s;
        }

        .dashboard-card:hover .card-icon {
            transform: scale(1.1);
        }

        .card-info {
            flex: 1;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: bold;
        }

        /* Card Colors */
        .card-blue {
            background: linear-gradient(135deg, #4285f4, #2a56c6);
        }

        .card-green {
            background: linear-gradient(135deg, #34a853, #0f8a3c);
        }

        .card-orange {
            background: linear-gradient(135deg, #fbbc05, #e37400);
        }

        .card-teal {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
        }

        .card-purple {
            background: linear-gradient(135deg, #9c27b0, #7b1fa2);
        }

        .card-deep-orange {
            background: linear-gradient(135deg, #ff5722, #e64a19);
        }

        .card-deep-purple {
            background: linear-gradient(135deg, #673ab7, #512da8);
        }

        .card-red {
            background: linear-gradient(135deg, #ea4335, #c5221f);
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Dashboard Content -->
        <div class="content">
            <div class="welcome-header">
                <h1>See Edulink Reports!</h1>
            </div>
            <div class="dashboard-grid">
                <!-- Card 1: Total Users -->
                <div class="dashboard-card card-blue">
                    <div class="card-content">
                        <i class="fas fa-users card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Total Users</h3>
                            <p class="card-value" id="total-users">0</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Books Purchased -->
                <div class="dashboard-card card-green">
                    <div class="card-content">
                        <i class="fas fa-book card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Books Purchased</h3>
                            <p class="card-value" id="books-purchased">0</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Premium Revenue -->
                <div class="dashboard-card card-orange">
                    <div class="card-content">
                        <i class="fas fa-money-bill card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Premium Revenue</h3>
                            <p class="card-value" id="premium-revenue">$0.00</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Selling Revenue -->
                <div class="dashboard-card card-teal">
                    <div class="card-content">
                        <i class="fas fa-money-bill-wave card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Selling Revenue</h3>
                            <p class="card-value" id="selling-revenue">$0.00</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Active Professors -->
                <div class="dashboard-card card-purple">
                    <div class="card-content">
                        <i class="fas fa-chalkboard-teacher card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Active Professors</h3>
                            <p class="card-value" id="active-professors">0</p>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Total Scholarship -->
                <div class="dashboard-card card-deep-orange">
                    <div class="card-content">
                        <i class="fas fa-hand-holding-dollar card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Total Scholarship</h3>
                            <p class="card-value" id="total-scholarship">$0.00</p>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Universities -->
                <div class="dashboard-card card-deep-purple">
                    <div class="card-content">
                        <i class="fas fa-building-columns card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Universities</h3>
                            <p class="card-value" id="universities">0</p>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Total Books -->
                <div class="dashboard-card card-red">
                    <div class="card-content">
                        <i class="fas fa-book-open card-icon"></i>
                        <div class="card-info">
                            <h3 class="card-title">Total Books</h3>
                            <p class="card-value" id="total-books">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to fetch statistics from the API
        async function fetchStatistics() {
            const url = 'https://edulink-hub-backend.onrender.com/user/statistics';

            try {
                const response = await fetch(url);

                if (response.ok) {
                    const data = await response.json();

                    // Update the UI with the fetched data
                    document.getElementById('total-users').textContent = data.totalUsers || 0;
                    document.getElementById('books-purchased').textContent = data.totalBooksPurchased || 0;
                    document.getElementById('premium-revenue').textContent = `$${(data.premiumRevenue || 0).toFixed(2)}`;
                    document.getElementById('selling-revenue').textContent = `$${(data.sellingRevenue || 0).toFixed(2)}`;
                    document.getElementById('active-professors').textContent = data.totalProfessors || 0;
                    document.getElementById('total-scholarship').textContent = `$${(data.totalFunding || 0).toFixed(2)}`;
                    document.getElementById('universities').textContent = data.totalUniversities || 0;
                    document.getElementById('total-books').textContent = data.totalBooks || 0;
                } else {
                    console.error('Failed to load statistics');
                }
            } catch (error) {
                console.error('Error fetching statistics:', error);
            }
        }

        // Fetch statistics when the page loads
        document.addEventListener('DOMContentLoaded', fetchStatistics);
    </script>
</body>

</html>