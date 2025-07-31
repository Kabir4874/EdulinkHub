<!-- HTML/login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../CSS/login.css" />
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Welcome Back</h2>
      <p>Please login to your account</p>
      <form action="#">
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" required />
        </div>
        <button type="submit" class="login-btn">Login</button>
        <p class="signup-link">Don't have an account? <a href="../HTML/signup.html">Sign up</a></p>
      </form>
    </div>
  </div>
</body>


</html>
