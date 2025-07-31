<?php
$active_page = isset($active_page) ? $active_page : 'dashboard';
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>EduLink Hub</h3>
    </div>
    <div class="sidebar-menu">
        <a href="dashboard.php" class="<?php echo $active_page === 'dashboard' ? 'active' : ''; ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="students.php" class="<?php echo $active_page === 'students' ? 'active' : ''; ?>">
            <i class="fas fa-user-graduate"></i> Students
        </a>
        <a href="professors.php" class="<?php echo $active_page === 'professors' ? 'active' : ''; ?>">
            <i class="fas fa-chalkboard-teacher"></i> Professors
        </a>
        <a href="courses.php" class="<?php echo $active_page === 'courses' ? 'active' : ''; ?>">
            <i class="fas fa-book"></i> Courses
        </a>
        <a href="library.php" class="<?php echo $active_page === 'library' ? 'active' : ''; ?>">
            <i class="fas fa-book-open"></i> Library
        </a>
        <a href="scholarships.php" class="<?php echo $active_page === 'scholarships' ? 'active' : ''; ?>">
            <i class="fas fa-money-bill-wave"></i> Scholarships
        </a>
        <a href="reports.php" class="<?php echo $active_page === 'reports' ? 'active' : ''; ?>">
            <i class="fas fa-chart-bar"></i> Reports
        </a>
        <a href="settings.php" class="<?php echo $active_page === 'settings' ? 'active' : ''; ?>">
            <i class="fas fa-cog"></i> Settings
        </a>
    </div>
</div>