<?php
// professor-list.php
$active_page = 'professors';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Professor List - EduLink Hub</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

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
            /* keep in sync with sidebar width */
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
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .btn {
            appearance: none;
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 10px 14px;
            font-weight: 600;
            background: var(--primary-color);
            color: #fff;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-1px);
            background: var(--secondary-color);
        }

        .btn.secondary {
            background: #fff;
            color: var(--dark-color);
            border-color: #e5e7eb;
        }

        .btn.secondary:hover {
            border-color: var(--accent-color);
            color: var(--secondary-color);
        }

        .btn.small {
            padding: 6px 10px;
            font-size: 12px;
            border-radius: 8px;
            box-shadow: none;
        }

        .btn.danger {
            background: var(--warning-color);
        }

        /* Toolbar */
        .toolbar {
            display: grid;
            grid-template-columns: 1fr 220px 160px;
            gap: 10px;
            background: #fff;
            padding: 12px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 14px;
        }

        .input,
        .select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            outline: none;
            transition: var(--transition);
            background: var(--light-color);
            font-size: 14px;
        }

        .input:focus,
        .select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(72, 149, 239, 0.15);
            background: #fff;
        }

        /* Card & Table */
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1100px;
        }

        thead th {
            background: #f8fafc;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align: left;
            font-size: 13px;
            color: #334155;
            letter-spacing: .2px;
            padding: 12px 14px;
            border-bottom: 1px solid #eef2f7;
            white-space: nowrap;
        }

        tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        /* Avatar */
        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .06);
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .3px;
            border: 1px solid transparent;
        }

        .badge.available {
            background: rgba(76, 201, 240, .15);
            color: #0b7285;
            border-color: rgba(76, 201, 240, .35);
        }

        .badge.not {
            background: rgba(247, 37, 133, .12);
            color: #7a073d;
            border-color: rgba(247, 37, 133, .3);
        }

        .link {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .link:hover {
            text-decoration: underline;
        }

        /* Footer / Pagination */
        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px;
            border-top: 1px solid #eef2f7;
            background: #fff;
            flex-wrap: wrap;
        }

        .rows-meta {
            color: #475569;
            font-size: 14px;
        }

        .pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .page-btn {
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e5e7eb;
            background: #fff;
            color: #111827;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
        }

        .page-btn:hover {
            border-color: var(--accent-color);
            color: var(--secondary-color);
        }

        .page-btn.active {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
        }

        .page-btn:disabled {
            opacity: .5;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/common/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/common/navbar.php'; ?>

        <div class="content">
            <div class="page-header">
                <h1 class="page-title"><i class="fa-solid fa-user-graduate"></i> Professor List</h1>
                <div class="header-actions" style="display:flex; gap:10px; flex-wrap:wrap;">
                    <a href="add-professor.php" class="btn" style="text-decoration: none;"><i class="fa-solid fa-plus"></i> Add Professor</a>
                </div>
            </div>

            <div class="toolbar">
                <input id="search" class="input" type="search" placeholder="Search by name, email, phone, or interests…" />
                <select id="availabilityFilter" class="select">
                    <option value="">All Availability</option>
                    <option value="available">Available</option>
                    <option value="not available">Not Available</option>
                </select>
                <select id="pageSize" class="select">
                    <option value="10" selected>10 / page</option>
                    <option value="20">20 / page</option>
                    <option value="50">50 / page</option>
                    <option value="100">100 / page</option>
                </select>
            </div>

            <div class="card">
                <div class="table-wrap">
                    <table id="profTable">
                        <thead>
                            <tr>
                                <th style="width:72px;">ID</th>
                                <th style="width:72px;">Image</th>
                                <th>Name</th>
                                <th>Research Interests</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="width:140px;">Availability</th>
                                <th>Profile Link</th>
                                <th style="width:150px;">Created At</th>
                                <th style="width:150px;">Updated At</th>
                                <th style="width:180px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="profTbody">
                            <?php /* 
                PHP LOOP PLACEHOLDER — add real rows later:

                <?php foreach ($professors as $prof): ?>
                  <tr>
                    <td><?= $prof['id'] ?></td>
                    <td><img class="avatar" src="<?= htmlspecialchars($prof['image']) ?>" alt="<?= htmlspecialchars($prof['name']) ?>"></td>
                    <td><?= htmlspecialchars($prof['name']) ?></td>
                    <td><?= htmlspecialchars($prof['researchInterests']) ?></td>
                    <td><?= htmlspecialchars($prof['contact_email']) ?></td>
                    <td><?= htmlspecialchars($prof['contact_phone']) ?></td>
                    <td>
                      <?php $avail = strtolower($prof['availability']); ?>
                      <span class="badge <?= $avail === 'available' ? 'available' : 'not' ?>">
                        <?= htmlspecialchars($prof['availability']) ?>
                      </span>
                    </td>
                    <td>
                      <?php if (!empty($prof['profileLink'])): ?>
                        <a class="link" href="<?= htmlspecialchars($prof['profileLink']) ?>" target="_blank" rel="noopener">Open Profile</a>
                      <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($prof['createdAt']) ?></td>
                    <td><?= htmlspecialchars($prof['updatedAt']) ?></td>
                    <td>
                      <button class="btn small secondary" type="button"><i class="fa-regular fa-eye"></i> View</button>
                      <button class="btn small" type="button"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                      <button class="btn small danger" type="button"><i class="fa-regular fa-trash-can"></i> Delete</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              */ ?>

                            <!-- Empty state (remove when real rows are rendered) -->
                            <tr class="empty-row">
                                <td colspan="11" style="text-align:center; color:#64748b; padding:24px;">
                                    No professors found yet. Add a new professor to see rows here.
                                </td>
                            </tr>

                            <!-- Optional sample static row for visual testing (comment out if not needed) -->
                            <!--
              <tr>
                <td>1</td>
                <td><img class="avatar" src="https://via.placeholder.com/88" alt="Jane Doe"></td>
                <td>Dr. Jane Doe</td>
                <td>AI, Machine Learning, NLP</td>
                <td>jane.doe@example.com</td>
                <td>+1 555 123 4567</td>
                <td><span class="badge available">available</span></td>
                <td><a class="link" href="#" target="_blank" rel="noopener">Open Profile</a></td>
                <td>2025-08-01 10:22:10</td>
                <td>2025-08-01 10:22:10</td>
                <td>
                  <button class="btn small secondary"><i class="fa-regular fa-eye"></i> View</button>
                  <button class="btn small"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                  <button class="btn small danger"><i class="fa-regular fa-trash-can"></i> Delete</button>
                </td>
              </tr>
              -->
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div class="rows-meta" id="rowsMeta">0–0 of 0</div>
                    <div class="pagination" id="pagination"></div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Lightweight client-side pagination & filtering (no backend logic yet)
        (function() {
            const tbody = document.getElementById('profTbody');
            const search = document.getElementById('search');
            const availabilityFilter = document.getElementById('availabilityFilter');
            const pageSizeSel = document.getElementById('pageSize');
            const pagination = document.getElementById('pagination');
            const rowsMeta = document.getElementById('rowsMeta');

            let rows = [];
            let filtered = [];
            let page = 1;
            let pageSize = parseInt(pageSizeSel.value, 10) || 10;

            function collectRows() {
                rows = Array.from(tbody.querySelectorAll('tr')).filter(tr => !tr.classList.contains('empty-row'));
            }

            function applyFilters() {
                const q = search.value.trim().toLowerCase();
                const av = availabilityFilter.value; // "", "available", "not available"

                filtered = rows.filter(tr => {
                    const tds = tr.querySelectorAll('td');
                    if (!tds.length) return false;

                    // Searchable columns: name (2), interests (3), email (4), phone (5)
                    const hay = [
                        tds[2]?.textContent || '',
                        tds[3]?.textContent || '',
                        tds[4]?.textContent || '',
                        tds[5]?.textContent || ''
                    ].join(' ').toLowerCase();

                    const availabilityText = (tds[6]?.textContent || '').trim().toLowerCase();

                    const matchQ = q === '' || hay.includes(q);
                    const matchA = av === '' || availabilityText === av;

                    return matchQ && matchA;
                });

                // Toggle empty-state visibility
                const emptyRow = tbody.querySelector('.empty-row');
                if (emptyRow) emptyRow.style.display = filtered.length ? 'none' : '';

                // Clamp page
                const totalPages = Math.max(1, Math.ceil(filtered.length / pageSize));
                if (page > totalPages) page = 1;
            }

            function render() {
                rows.forEach(tr => tr.style.display = 'none');

                const total = filtered.length;
                const totalPages = Math.max(1, Math.ceil(total / pageSize));
                page = Math.min(Math.max(1, page), totalPages);

                const startIdx = (page - 1) * pageSize;
                const endIdx = Math.min(startIdx + pageSize, total);

                for (let i = startIdx; i < endIdx; i++) {
                    if (filtered[i]) filtered[i].style.display = '';
                }

                rowsMeta.textContent = total ? `${startIdx + 1}–${endIdx} of ${total}` : '0–0 of 0';
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                pagination.innerHTML = '';

                function makeBtn(label, disabled, onClick, isActive = false) {
                    const b = document.createElement('button');
                    b.className = 'page-btn' + (isActive ? ' active' : '');
                    b.textContent = label;
                    b.disabled = !!disabled;
                    b.addEventListener('click', onClick);
                    pagination.appendChild(b);
                }

                makeBtn('First', page === 1, () => {
                    page = 1;
                    render();
                });
                makeBtn('Prev', page === 1, () => {
                    page -= 1;
                    render();
                });

                const windowSize = 5;
                let start = Math.max(1, page - Math.floor(windowSize / 2));
                let end = Math.min(totalPages, start + windowSize - 1);
                start = Math.max(1, end - windowSize + 1);

                for (let p = start; p <= end; p++) {
                    makeBtn(String(p), false, () => {
                        page = p;
                        render();
                    }, p === page);
                }

                makeBtn('Next', page === totalPages, () => {
                    page += 1;
                    render();
                });
                makeBtn('Last', page === totalPages, () => {
                    page = totalPages;
                    render();
                });
            }

            // Event listeners
            search.addEventListener('input', () => {
                applyFilters();
                render();
            });
            availabilityFilter.addEventListener('change', () => {
                applyFilters();
                render();
            });
            pageSizeSel.addEventListener('change', () => {
                pageSize = parseInt(pageSizeSel.value, 10) || 10;
                applyFilters();
                render();
            });

            // Init
            collectRows();
            applyFilters();
            render();

            // If rows are injected by PHP later, call collectRows() + applyFilters() + render() afterward.
        })();
    </script>
</body>

</html>