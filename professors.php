<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Professors</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../Css/professors.css" /> <!-- Reuse same style -->
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="../images/logo.png" alt="EdUHub Logo" class="logo-img">
    </div>
    <ul class="nav-links">
      <li><a href="../index.html">Home</a></li>

      <li class="dropdown">
        <a href="#">Books ▾</a>
        <ul class="dropdown-content">
          <li><a href="../HTML/web-development.html">Web Development</a></li>
          <li><a href="#">Design</a></li>
          <li><a href="../HTML/ai-ml-books.html">AI & ML</a></li>
          <li><a href="#">Admission (100+ Books)</a></li>
          <li><a href="#">Public & Private Job (100+ Books)</a></li>
          <li><a href="#">BCS (100+ Books)</a></li>
          <li><a href="#">IT & Software (100+ Books)</a></li>
          <li><a href="#">Academic (100+ Books)</a></li>
          <li><a href="#">Language (100+ Books)</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Study Abroad ▾</a>
        <ul class="dropdown-content">
          <li><a href="../HTML/professors.html">Professors</a></li>
          <li><a href="../HTML/scholarship.html">Scholarship</a></li>
        </ul>
      </li>

      <li><a href="../HTML/admission.html" class="btn">Admission</a></li>
      <li><a href="../HTML/about-contact.html">About & Contact</a></li>
    </ul>

    <div class="user-profile" id="userProfile">
      <img src="../images/Profile.jpg" alt="User" class="profile-pic" />
      <div class="user-dropdown">
        <a href="#">Profile</a>
        <a href="../HTML/settings.html">Settings</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Professors Hero Section -->
  <section class="admission-hero">
    <div class="admission-content">
      <h1>Global Professors Network</h1>
      <p>Connect with renowned professors around the world to guide your academic journey.</p>
    </div>
  </section>

  <!-- Professors List -->
  <section class="container" id="professorsList">
    <div class="university-card">
      <img src="../images/John.jpeg" alt="Prof. John Smith" class="prof-pic"/>
      <h2>Prof. John Smith</h2>
      <p><strong>University:</strong> Massachusetts Institute of Technology (MIT), USA</p>
      <p><strong>Department:</strong> Computer Science</p>
      <p><strong>Research:</strong> Artificial Intelligence, Machine Learning</p>
      <p><strong>Email:</strong> jsmith@mit.edu</p>
      <p><strong>Phone:</strong> +1 (617) 253-1000</p>
    </div>

    <div class="university-card">
      <img src="../images/lee.webp" alt="Prof. Emily Lee" class="prof-pic"/>
      <h2>Prof. Emily Lee</h2>
      <p><strong>University:</strong> Stanford University, USA</p>
      <p><strong>Department:</strong> Electrical Engineering</p>
      <p><strong>Research:</strong> Robotics, Embedded Systems</p>
      <p><strong>Email:</strong> emily.lee@stanford.edu</p>
      <p><strong>Phone:</strong> +1 (650) 723-2300</p>
    </div>

    <div class="university-card">
      <img src="../images/Alan Wong.jpg" alt="Prof. Alan Wong" class="prof-pic"/>
      <h2>Prof. Alan Wong</h2>
      <p><strong>University:</strong> National University of Singapore (NUS)</p>
      <p><strong>Department:</strong> Information Systems</p>
      <p><strong>Research:</strong> Cybersecurity, Data Privacy</p>
      <p><strong>Email:</strong> awong@nus.edu.sg</p>
      <p><strong>Phone:</strong> +65 6516 6666</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 Edulink Hub. All rights reserved.</p>
  </footer>

  <!-- JavaScript -->
  <script>
    const profile = document.getElementById('userProfile');
    profile.addEventListener('click', function (e) {
      e.stopPropagation();
      profile.classList.toggle('active');
    });
    document.addEventListener('click', function () {
      profile.classList.remove('active');
    });
  </script>

</body>
</html>
