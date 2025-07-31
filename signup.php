<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup Page</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
      <header class="hero">
     <nav class="navbar">
      <div class="logo">
      <a href="../index.html" class="logo">
    <img src="../images/logo.png" alt="EdUHub Logo" class="logo-img" />
    </a>

      </div>
  <div class="signup-container">
    <form class="signup-form" id="signupForm">
      <h2>Create Account</h2>

      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" placeholder="Enter your name" required />
        <small class="error-message" id="nameError"></small>
      </div>

      <div class="input-group">
        <label>Gender</label>
        <div class="gender-options">
          <label><input type="radio" name="gender" value="Male" /> Male</label>
          <label><input type="radio" name="gender" value="Female" /> Female</label>
          <label><input type="radio" name="gender" value="Other" /> Other</label>
        </div>
        <small class="error-message" id="genderError"></small>
      </div>

      <div class="input-group">
        <label for="education">Education Qualification</label>
        <select id="education">
          <option value="">Select qualification</option>
          <option value="SSC">SSC</option>
          <option value="HSC">HSC</option>
          <option value="Diploma">Diploma</option>
          <option value="Undergraduate">Undergraduate</option>
          <option value="Postgraduate">Postgraduate</option>
        </select>
        <small class="error-message" id="educationError"></small>
      </div>

      <div class="input-group">
        <label for="institute">Educational Institute</label>
        <input type="text" id="institute" placeholder="Enter your institute name" required />
        <small class="error-message" id="instituteError"></small>
      </div>

      <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email" required />
        <small class="error-message" id="emailError"></small>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter password" required />
        <small class="error-message" id="passwordError"></small>
      </div>

      <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" placeholder="Confirm password" required />
        <small class="error-message" id="confirmPasswordError"></small>
      </div>

      <button type="submit" class="signup-btn">Sign Up</button>
      <p class="signin-link">Already have an account? <a href="../HTML/login.html">Log in</a></p>
    </form>
  </div>

  <script>
    document.getElementById("signupForm").addEventListener("submit", function (e) {
      e.preventDefault();

      // Input values
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const education = document.getElementById("education").value;
      const institute = document.getElementById("institute").value.trim();
      const gender = document.querySelector('input[name="gender"]:checked');

      // Error containers
      const nameError = document.getElementById("nameError");
      const emailError = document.getElementById("emailError");
      const passwordError = document.getElementById("passwordError");
      const confirmPasswordError = document.getElementById("confirmPasswordError");
      const educationError = document.getElementById("educationError");
      const instituteError = document.getElementById("instituteError");
      const genderError = document.getElementById("genderError");

      // Reset errors
      nameError.textContent = "";
      emailError.textContent = "";
      passwordError.textContent = "";
      confirmPasswordError.textContent = "";
      educationError.textContent = "";
      instituteError.textContent = "";
      genderError.textContent = "";

      let isValid = true;

      if (name === "") {
        nameError.textContent = "Full name is required.";
        isValid = false;
      }

      if (!gender) {
        genderError.textContent = "Please select your gender.";
        isValid = false;
      }

      if (education === "") {
        educationError.textContent = "Please select a qualification.";
        isValid = false;
      }

      if (institute === "") {
        instituteError.textContent = "Institute name is required.";
        isValid = false;
      }

      const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
      if (email === "") {
        emailError.textContent = "Email is required.";
        isValid = false;
      } else if (!emailRegex.test(email)) {
        emailError.textContent = "Enter a valid email.";
        isValid = false;
      }

      if (password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters.";
        isValid = false;
      }

      if (confirmPassword !== password) {
        confirmPasswordError.textContent = "Passwords do not match.";
        isValid = false;
      }

      if (isValid) {
        alert("Signup successful!");
        window.location.href = "../HTML/login.html";
      }
    });
  </script>
</body>
</html>
