<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admission</title>
  <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="../CSS/admission.css" />
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
        <a href="../HTML/profile.html">Profile</a>
        <a href="../HTML/settings.html">Settings</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Admission Hero Section -->
  <section class="admission-hero">
    <div class="admission-content">
      <h1>Bangladesh Public University Admission</h1>
      <p>Explore public universities, stay updated with admission dates, and find the perfect fit for your future.</p>
      <div class="admission-buttons">
        <a href="#" class="btn btn-primary">View Admission Info</a>
       
        <!-- Search Bar -->
      <div class="search-bar"> 
     <input type="text" id="searchInput" placeholder="Search university...">
    <button id="searchButton">Search</button>
     </div>
      </div>
    </div>

  </section>
  <!-- University Cards -->
  <section class="container" id="universityList">
    <div class="university-card">
      <img src="../images/du.jpeg" alt="University of Dhaka" class="university-img" />
      <h2>University of Dhaka (DU)</h2>
      <p><strong>Deadline:</strong> July 15, 2025</p>
      <a href="https://admission.eis.du.ac.bd/" target="_blank">Apply Now</a>
    </div>

    <div class="university-card">
      <img src="../images/buet.jpg" alt="BUET" class="university-img" />
      <h2>Bangladesh University of Engineering and Technology (BUET)</h2>
      <p><strong>Deadline:</strong> June 30, 2025</p>
      <a href="https://ugadmission.buet.ac.bd/" target="_blank">Apply Now</a>
    </div>

    <div class="university-card">
      <img src="../images/ru.jpg" alt="University of Rajshahi" class="university-img" />
      <h2>University of Rajshahi (RU)</h2>
      <p><strong>Deadline:</strong> July 12, 2025</p>
      <a href="https://admission.ru.ac.bd/" target="_blank">Apply Now</a>
    </div>

    <div class="university-card">
      <img src="../images/JU.webp" alt="Jahangirnagar University" class="university-img" />
      <h2>Jahangirnagar University (JU)</h2>
      <p><strong>Deadline:</strong> July 10, 2025</p>
      <a href="https://admission.juniv.edu/" target="_blank">Apply Now</a>
    </div>

    <div class="university-card">
      <img src="../images/CU.png" alt="Chittagong University" class="university-img" />
      <h2>Chittagong University (CU)</h2>
      <p><strong>Deadline:</strong> July 14, 2025</p>
      <a href="https://admission.cu.ac.bd/" target="_blank">Apply Now</a>
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
      e.stopPropagation(); // Prevent bubbling
      profile.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function () {
      profile.classList.remove('active');
    });
  </script>

  <!-- Search Filter Script -->
  <script>
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    const cards = document.querySelectorAll(".university-card");

    searchButton.addEventListener("click", function () {
      const query = searchInput.value.toLowerCase().trim();

      cards.forEach(card => {
        const title = card.querySelector("h2").textContent.toLowerCase();
        card.style.display = title.includes(query) ? "block" : "none";
      });
    });

    // Allow pressing Enter to trigger search
    searchInput.addEventListener("keyup", function (event) {
      if (event.key === "Enter") {
        searchButton.click();
      }
    });
  </script>
</body>
</html>
