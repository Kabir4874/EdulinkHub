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

    <style>
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
            --box-shadow: 0 4px 6px rgba(0, 0, 0, .1);
            --transition: .3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            color: var(--dark-color);
            min-height: 100vh;
            display: flex;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            /* align with your sidebar width */
            min-height: 100vh;
        }

        .content {
            padding: 24px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 8px 0 18px;
        }

        .page-title {
            font-size: 24px;
            color: var(--primary-color);
            font-weight: 700;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .toolbar {
            display: grid;
            grid-template-columns: 220px 220px 1fr auto;
            gap: 10px;
            background: #fff;
            padding: 12px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 16px;
        }

        .input,
        .select,
        .btn {
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            outline: none;
            font-size: 14px;
        }

        .input,
        .select {
            padding: 10px 12px;
            background: var(--light-color)
        }

        .input:focus,
        .select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(72, 149, 239, .15);
            background: #fff
        }

        .btn {
            background: var(--primary-color);
            color: #fff;
            font-weight: 600;
            padding: 10px 14px;
            border: none;
            cursor: pointer;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-1px);
            background: var(--secondary-color)
        }

        .btn.secondary {
            background: #fff;
            color: var(--dark-color);
            border: 1px solid #e5e7eb
        }

        .btn.secondary:hover {
            border-color: var(--accent-color);
            color: var(--secondary-color)
        }

        /* KPI Cards */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .kpi {
            background: #fff;
            border-radius: 14px;
            box-shadow: var(--box-shadow);
            padding: 16px;
            position: relative;
            overflow: hidden;
        }

        .kpi h3 {
            font-size: 12px;
            color: #6b7280;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-bottom: 8px
        }

        .kpi .value {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a
        }

        .kpi .sub {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px
        }

        .kpi .icon {
            position: absolute;
            right: 10px;
            top: 10px;
            opacity: .12;
            font-size: 42px;
            color: #000
        }

        .kpi.accent-1 {
            border-top: 3px solid var(--primary-color)
        }

        .kpi.accent-2 {
            border-top: 3px solid var(--success-color)
        }

        .kpi.accent-3 {
            border-top: 3px solid var(--warning-color)
        }

        .kpi.accent-4 {
            border-top: 3px solid #0ea5e9
        }

        .kpi.accent-5 {
            border-top: 3px solid #22c55e
        }

        .kpi.accent-6 {
            border-top: 3px solid #f59e0b
        }

        /* Cards */
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 16px;
        }

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            border-bottom: 1px solid #eef2f7;
        }

        .card-title {
            font-weight: 700;
            color: #0f172a
        }

        .card-body {
            padding: 14px
        }

        .chart-wrap {
            height: 320px
        }

        /* Tables */
        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1000px
        }

        thead th {
            background: #f8fafc;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: left;
            font-size: 13px;
            color: #334155;
            padding: 10px 12px;
            border-bottom: 1px solid #eef2f7;
            white-space: nowrap;
        }

        tbody td {
            padding: 10px 12px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px
        }

        tbody tr:hover {
            background: #fafafa
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid transparent
        }

        .badge.ok {
            background: rgba(76, 201, 240, .15);
            color: #0b7285;
            border-color: rgba(76, 201, 240, .35)
        }

        .badge.warn {
            background: rgba(247, 37, 133, .12);
            color: #7a073d;
            border-color: rgba(247, 37, 133, .3)
        }

        /* Simple grid for 2-column section under KPIs */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }
    </style>
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