<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Profile</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../CSS/profile.css" />
</head>
<body>
  
<?php require 'header 1.php'; ?>

  <!-- Profile Section -->
  <div class="profile-page">
    <!-- Sidebar -->
    <aside class="profile-sidebar">
      <img src="../images/Profile.jpg" alt="User Profile" class="sidebar-profile-pic">
      <h2>John Doe</h2>
      <p><strong>Email:</strong><br> johndoe@example.com</p>
      <p><strong>Country:</strong><br> Bangladesh</p>
      <p><strong>Interests:</strong><br> AI, Software Engineering, Scholarships</p>

      <div class="sidebar-links">
        <a href="../HTML_Cient/settings.php" class="sidebar-btn">⚙️ Settings</a>
        <a href="../HTML_Cient/login.php" class="sidebar-btn logout">🚪 Logout</a>
      </div>
    </aside>

    <!-- Main Profile Content -->
    <section class="profile-main">
      <div class="card">
        <h3>Saved Scholarships</h3>
        <ul class="saved-list">
          <li>✅ Chevening Scholarship</li>
          <li>✅ Fulbright Foreign Student Program</li>
          <li>✅ Erasmus Mundus Joint Masters</li>
        </ul>
      </div>

      <div class="card">
        <h3>Recent Activity</h3>
        <ul class="activity-list">
          <li>📘 Enrolled in “AI for Beginners”</li>
          <li>✉️ Contacted Prof. Emma Wilson</li>
          <li>📥 Downloaded Web Dev Book Pack</li>
        </ul>
      </div>
    </section>
  </div>

  <?php require 'footer 1.php'; ?>
</body>
</html>
