<?php
// reports.php
$active_page = 'reports';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="styles/reports.css">
</head>

<body>

    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <div class="page-header">
                <h1 class="page-title"><i class="fa-solid fa-chart-line"></i> Reports</h1>
                <div style="display:flex;gap:10px;flex-wrap:wrap;">

                    <button class="btn" type="button"><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                </div>
            </div>

            <!-- Filters -->
            <div class="toolbar">
                <input type="date" class="input" id="fromDate" />
                <input type="date" class="input" id="toDate" />
                <select id="moduleFilter" class="select">
                    <option value="">All Modules</option>
                    <option value="books">Books</option>
                    <option value="professors">Professors</option>
                    <option value="scholarships">Scholarships</option>
                    <option value="universities">Universities</option>
                </select>
                <div style="display:flex;gap:10px;justify-content:flex-end;">
                    <button class="btn secondary" type="button" id="clearFilters"><i class="fa-regular fa-circle-xmark"></i> Clear</button>
                    <button class="btn" type="button" id="applyFilters"><i class="fa-solid fa-sliders"></i> Apply</button>
                </div>
            </div>

            <!-- KPI Cards -->
            <div class="kpi-grid">
                <div class="kpi accent-1">
                    <i class="fa-solid fa-book icon"></i>
                    <h3>Total Books</h3>
                    <div class="value" id="kpiBooks">0</div>
                    <div class="sub">All categories</div>
                </div>
                <div class="kpi accent-2">
                    <i class="fa-solid fa-sack-dollar icon"></i>
                    <h3>Paid Books</h3>
                    <div class="value" id="kpiPaidBooks">0</div>
                    <div class="sub">Count of paid titles</div>
                </div>
                <div class="kpi accent-3">
                    <i class="fa-solid fa-user-graduate icon"></i>
                    <h3>Professors</h3>
                    <div class="value" id="kpiProfessors">0</div>
                    <div class="sub">Active profiles</div>
                </div>
                <div class="kpi accent-4">
                    <i class="fa-solid fa-graduation-cap icon"></i>
                    <h3>Scholarships</h3>
                    <div class="value" id="kpiScholarships">0</div>
                    <div class="sub">University + Professor</div>
                </div>
                <div class="kpi accent-5">
                    <i class="fa-solid fa-building-columns icon"></i>
                    <h3>Universities</h3>
                    <div class="value" id="kpiUniversities">0</div>
                    <div class="sub">Tracked entries</div>
                </div>
                <div class="kpi accent-6">
                    <i class="fa-solid fa-hourglass-half icon"></i>
                    <h3>Upcoming Deadlines</h3>
                    <div class="value" id="kpiDeadlines">0</div>
                    <div class="sub">Next 30 days</div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid-2">
                <div class="card">
                    <div class="card-head">
                        <div class="card-title">Books by Category</div>

                    </div>
                    <div class="card-body">
                        <div class="chart-wrap"><canvas id="booksByCategory"></canvas></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-head">
                        <div class="card-title">Scholarships by Type</div>

                    </div>
                    <div class="card-body">
                        <div class="chart-wrap"><canvas id="scholarshipsByType"></canvas></div>
                    </div>
                </div>
            </div>

            <!-- Tables -->
            <div class="card">
                <div class="card-head">
                    <div class="card-title">Upcoming Deadlines (Scholarships & Admissions)</div>
                </div>
                <div class="card-body table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Organization</th>
                                <th>Department</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody id="deadlineTbody">
                            <!-- Placeholder rows — replace with PHP loop later -->
                            <tr class="empty-row">
                                <td colspan="7" style="text-align:center;color:#64748b;padding:18px;">
                                    No deadlines found for the selected range.
                                </td>
                            </tr>
                            <!--
              <tr>
                <td>Scholarship</td>
                <td>Merit Excellence Scholarship</td>
                <td>Sample University</td>
                <td>Computer Science</td>
                <td>2025-03-15</td>
                <td><span class="badge warn">Due soon</span></td>
                <td><a class="btn small secondary" href="#" target="_blank">Open</a></td>
              </tr>
              -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <div class="card-title">Recent Activity</div>
                </div>
                <div class="card-body table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>When</th>
                                <th>Module</th>
                                <th>Action</th>
                                <th>Title/Name</th>
                                <th>Actor</th>
                            </tr>
                        </thead>
                        <tbody id="activityTbody">
                            <tr class="empty-row">
                                <td colspan="5" style="text-align:center;color:#64748b;padding:18px;">
                                    No recent activity to show.
                                </td>
                            </tr>
                            <!-- Example static row (remove when wiring to DB)
              <tr>
                <td>2025-08-10 10:10</td>
                <td>Book</td>
                <td>Created</td>
                <td>Intro to Algorithms</td>
                <td>Admin</td>
              </tr>
              -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script>
        // NOTE: No backend logic yet; this script only seeds placeholders so the UI looks complete.

        // ---- KPI PLACEHOLDERS (replace with PHP echoes later) ----
        document.getElementById('kpiBooks').textContent = '128';
        document.getElementById('kpiPaidBooks').textContent = '46';
        document.getElementById('kpiProfessors').textContent = '72';
        document.getElementById('kpiScholarships').textContent = '34';
        document.getElementById('kpiUniversities').textContent = '19';
        document.getElementById('kpiDeadlines').textContent = '7';

        // ---- CHARTS (static demo data) ----
        const brand = getComputedStyle(document.documentElement).getPropertyValue('--primary-color').trim();
        const accent = getComputedStyle(document.documentElement).getPropertyValue('--accent-color').trim();
        const warn = getComputedStyle(document.documentElement).getPropertyValue('--warning-color').trim();
        const ok = getComputedStyle(document.documentElement).getPropertyValue('--success-color').trim();

        const ctxBooks = document.getElementById('booksByCategory').getContext('2d');
        new Chart(ctxBooks, {
            type: 'bar',
            data: {
                labels: ['Admission', 'Job Exam', 'Skill-Based'],
                datasets: [{
                    label: 'Books',
                    data: [52, 38, 38], // replace with dynamic counts
                    backgroundColor: [brand, ok, warn]
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxSch = document.getElementById('scholarshipsByType').getContext('2d');
        new Chart(ctxSch, {
            type: 'doughnut',
            data: {
                labels: ['University', 'Professor'],
                datasets: [{
                    data: [21, 13], // replace with dynamic counts
                    backgroundColor: [accent, brand]
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // ---- Filters (no logic yet) ----
        document.getElementById('clearFilters').addEventListener('click', () => {
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            document.getElementById('moduleFilter').value = '';
        });
        document.getElementById('applyFilters').addEventListener('click', () => {
            // Hook up to backend later
            alert('Filters applied (placeholder).');
        });
    </script>
</body>

</html>