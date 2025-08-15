<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Settings</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../CSS/settings.css" />
</head>
<body>

 <?php require 'header.php'; ?>

  <!-- Settings Section -->
  <section class="settings-container">
    <h2>Account Settings</h2>

    <form class="settings-form">
      <label for="username">Username:</label>
      <input type="text" id="username" placeholder="Enter your name" value="John Doe">

      <label for="email">Email:</label>
      <input type="email" id="email" placeholder="Enter your email" value="johndoe@example.com">

      <label for="password">New Password:</label>
      <input type="password" id="password" placeholder="Enter new password">

      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" placeholder="Confirm new password">

      <label for="country">Country:</label>
      <input type="text" id="country" placeholder="Enter your country" value="Bangladesh">

      <label for="interests">Interests:</label>
      <input type="text" id="interests" placeholder="Your interests" value="AI, Software Engineering, Scholarships">

      <button type="submit" class="save-btn">Save Changes</button>
    </form>
  </section>

 <?php require 'footer.php'; ?>

</body>
</html>
