<?php
$active_page = isset($active_page) ? $active_page : 'dashboard';
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>EduLink Hub</h3>
    </div>
    <div class="sidebar-menu">
        <a href="../admin/index.php" class="<?php echo $active_page === 'index' ? 'active' : ''; ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="../admin/add-professor.php" class="<?php echo $active_page === 'add-professors' ? 'active' : ''; ?>">
            <i class="fas fa-user-graduate"></i> Add Professors
        </a>
        <a href="../admin/professor-list.php" class="<?php echo $active_page === 'professors' ? 'active' : ''; ?>">
            <i class="fas fa-chalkboard-teacher"></i> Professors
        </a>
        <a href="../admin/add-Book.php" class="<?php echo $active_page === 'add-Book' ? 'active' : ''; ?>">
            <i class="fas fa-book"></i> Add Book
        </a>
        <a href="../admin/book-list.php" class="<?php echo $active_page === 'book-list' ? 'active' : ''; ?>">
            <i class="fas fa-book-open"></i> Book List
        </a>
        <a href="../admin/add-university.php" class="<?php echo $active_page === 'add-university' ? 'active' : ''; ?>">
            <i class="fa-solid fa-building-columns"></i> Add University
        </a>
        <a href="../admin/university-list.php" class="<?php echo $active_page === 'unicersity-list' ? 'active' : ''; ?>">
            <i class="fa-solid fa-building-columns"></i> Universities
        </a>
        <a href="../admin/add-Scholarship.php" class="<?php echo $active_page === 'add-scholarship' ? 'active' : ''; ?>">
            <i class="fas fa-money-bill-wave"></i> Add Scholarships
        </a>
        <a href="../admin/scholarship-list.php" class="<?php echo $active_page === 'scholarship-list' ? 'active' : ''; ?>">
            <i class="fas fa-money-bill-wave"></i> Scholarships
        </a>
        <a href="../admin/reports.php" class="<?php echo $active_page === 'reports' ? 'active' : ''; ?>">
            <i class="fas fa-chart-bar"></i> Reports
        </a>

        <a href="<?= ROOT_URL ?>admin/logic/logout-logic.php" class="<?php echo $active_page === 'signin' ? 'active' : ''; ?>">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
    </div>
</div>