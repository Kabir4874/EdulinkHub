<?php
require '../config/database.php';
// Set the active page for the sidebar
$active_page = 'reports.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../admin/styles/reports.css">
    <link rel="stylesheet" href="../admin/styles/sidebar.css">
</head>

<body>
    <?php
include("../admin/common/sidebar.php");
?>

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