<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduLinkHub</title>

   <link rel="icon" href="../images/logo.png" type="image/png">
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
  <header class="hero">
    <nav class="navbar">
      <div class="logo">
  <img src="images/logo.png" alt="EdUHub Logo" class="logo-img">
       </div>
      <ul class="nav-links">
        <li><a href="">Home</a></li>
        <li class="dropdown">
          <a href="">Books ▾</a>
          <ul class="dropdown-content">
  <li><a href="../HTML/web-development.html">Web Development</a></li>
  <li><a href="../HTML/design-books.html">Design</a></li>
  <li><a href="../HTML/ai-ml-books.html">AI & ML</a></li>
  <li><a href="../HTML/admission-books.html">Admission (100+ Books)</a></li>
  <li><a href="../HTML/public-private-job.html">Public & Private Job (100+ Books)</a></li>
  <li><a href="../HTML/bcs-books.html">BCS (100+ Books)</a></li>
  <li><a href="../HTML/it-software-books.html">IT & Software (100+ Books)</a></li>
  <li><a href="../HTML/academic-books.html">Academic (100+ Books)</a></li>
  <li><a href="../HTML/language-books.html">Language (100+ Books)</a></li>
</ul>

        </li>
        <li class="dropdown">
          <a href="#">Study Abroad ▾</a>
          <ul class="dropdown-content">
            <li><a href="../HTML/professors.html">Professors </a></li>
            <li><a href="../HTML/scholarship.html">Scholarship</a></li>
          </ul>
        </li>
        <a href="HTML/admission.html" class="btn">Admission </a>
        <li><a href="../HTML/about-contact.html">About & Contact</a></li>
      </ul>
      <div class="auth-buttons">
        <a href="../HTML/join.html" class="btn join">Join</a>
         <a href="HTML/login.html">Login</a> | <a href="HTML/signup.html">Sign Up</a>
      </div>
    </nav>

    <div class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1>Unlock Your Academic Potential</h1>
    <p>Get instant solutions to study problems, connect with expert tutors, and access affordable learning resources tailored for Bangladeshi students.</p>
    <div class="hero-cta">
      <a href="#" class="btn primary-btn" onclick="showLoginPrompt(event)">Get Study Help Now</a>
      <a href="#" class="btn secondary-btn" onclick="showLoginPrompt(event)">Meet Our Tutors</a>

    </div>
    <div class="hero-stats">
      <div class="stat-item">
        <span class="stat-number">50,000+</span>
        <span class="stat-label">Problems Solved</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">500+</span>
        <span class="stat-label">Expert Tutors</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">24/7</span>
        <span class="stat-label">Support Available</span>
      </div>
    </div>
  </div>
</div>
  </header>
  <section class="course-category">
  <div class="category-header">
    <p class="subtitle">START LEARNING TODAY</p>
    <h2>Academic & Job Oriented Books</h2>
  </div>

  <div class="category-circles">
    <div class="category-item">
      <img src="images/admission.jpg" alt="Admission">
      <div class="category-label"> Admission <br><span>100+ Books</span></div>
    </div>
    <div class="category-item">
      <img src="images/job.jpg" alt="Public & Private Job">
      <div class="category-label">Public & Private Job<br><span>100+ Books</span></div>
    </div>
    <div class="category-item">
      <img src="images/BCS.avif" alt="BCS">
      <div class="category-label">BCS<br><span>100+ Books</span></div>
    </div>
    <div class="category-item">
      <img src="images/software.avif" alt="IT & Software">
      <div class="category-label">IT & Software<br><span>100+ Books</span></div>
    </div>
    <div class="category-item">
      <img src="images/academic.jpg" alt="Academic">
      <div class="category-label">Academic<br><span>100+ Books</span></div>
    </div>
    <div class="category-item">
      <img src="images/language.png" alt="Language">
      <div class="category-label">Language<br><span>100+ Books</span></div>
    </div>
  </div>

  <div class="see-all-btn">
    <a href="#" class="btn-pink" onclick="handleLoginRedirect(event)">See All Books</a>
  </div>
</section>
<section class="professors-section">
    <h2>Renowned International Professors</h2>
    <div class="professors-grid">
        <div class="professor-card">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Professor John Smith" class="professor-img">
            <div class="professor-details">
                <h3>Prof. John Smith</h3>
                <p class="university">Massachusetts Institute of Technology (MIT), USA</p>
                <p class="department">Department of Computer Science</p>
                <p class="research">Research Focus: Artificial Intelligence, Machine Learning</p>
                <p class="contact">jsmith@mit.edu | +1 (617) 253-1000</p>
            </div>
        </div>
        
        <div class="professor-card">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Professor Sarah Johnson" class="professor-img">
            <div class="professor-details">
                <h3>Prof. Sarah Johnson</h3>
                <p class="university">University of Oxford, UK</p>
                <p class="department">Department of Data Science</p>
                <p class="research">Research Focus: Big Data Analytics, Computational Statistics</p>
                <p class="contact">sjohnson@ox.ac.uk | +44 1865 270000</p>
            </div>
        </div>
        
        <div class="professor-card">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Professor David Lee" class="professor-img">
            <div class="professor-details">
                <h3>Prof. David Lee</h3>
                <p class="university">ETH Zurich, Switzerland</p>
                <p class="department">Department of Engineering</p>
                <p class="research">Research Focus: Human-Computer Interaction, UX Design</p>
                <p class="contact">dlee@ethz.ch | +41 44 632 1111</p>
            </div>
        </div>
        
        <div class="professor-card">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Professor Maria Garcia" class="professor-img">
            <div class="professor-details">
                <h3>Prof. Maria Garcia</h3>
                <p class="university">University of Toronto, Canada</p>
                <p class="department">Department of Computer Science</p>
                <p class="research">Research Focus: Distributed Systems, Cloud Computing</p>
                <p class="contact">mgarcia@utoronto.ca | +1 (416) 978-2011</p>
            </div>
        </div>
    </div>
     <div class="see-all-btn">
   <a href="#" class="btn-pink" onclick="handleLoginRedirect(event)">See More</a>

  </div>
</section>
  <section class="scholarships-section">
  <h2>International Government Scholarships</h2>
  
  <div class="scholarships-container">
    <div class="scholarships-scroller">
      <!-- Scholarship Card 1 -->
      <div class="scholarship-card">
        <div class="scholarship-image" style="background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
          <div class="country-flag" style="background-image: url('https://flagcdn.com/w80/gb.png');"></div>
        </div>
        <div class="scholarship-details">
          <h3>Chevening Scholarship</h3>
          <p class="country">United Kingdom</p>
          <p class="amount">Full tuition + £18,000 stipend</p>
          <p class="deadline">Deadline: November 7, 2023</p>
          <a href="#" class="apply-btn">Apply Now</a>
        </div>
      </div>
      
      <!-- Scholarship Card 2 -->
       <div class="scholarship-card">

        <div class="scholarship-image" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
          <div class="country-flag" style="background-image: url('https://flagcdn.com/w80/us.png');"></div>
        </div>
        <div class="scholarship-details">
          <h3>Fulbright Program</h3>
          <p class="country">United States</p>
          <p class="amount">Full funding + living allowance</p>
          <p class="deadline">Deadline: October 10, 2023</p>
          <a href="#" class="apply-btn">Apply Now</a>
        </div>
      </div>
      
      <!-- Scholarship Card 3 -->
      <div class="scholarship-card">
        <div class="scholarship-image" style="background-image: url('https://images.unsplash.com/photo-1526779259212-939e64788e3c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
          <div class="country-flag" style="background-image: url('https://flagcdn.com/w80/au.png');"></div>
        </div>
        <div class="scholarship-details">
          <h3>Australia Awards</h3>
          <p class="country">Australia</p>
          <p class="amount">Full tuition + travel allowance</p>
          <p class="deadline">Deadline: April 30, 2024</p>
          <a href="#" class="apply-btn">Apply Now</a>
        </div>
      </div>
      
      <!-- Scholarship Card 4 -->
      <div class="scholarship-card">
        <div class="scholarship-image" style="background-image: url('https://images.unsplash.com/photo-1499209974431-9dddcece7f88?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
          <div class="country-flag" style="background-image: url('https://flagcdn.com/w80/ca.png');"></div>
        </div>
        <div class="scholarship-details">
          <h3>Vanier Canada</h3>
          <p class="country">Canada</p>
          <p class="amount">$50,000 per year</p>
          <p class="deadline">Deadline: November 1, 2023</p>
          <a href="#" class="apply-btn">Apply Now</a>
        </div>
      </div>
      
      <!-- Scholarship Card 5 -->
      <div class="scholarship-card">
        <div class="scholarship-image" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80');">
          <div class="country-flag" style="background-image: url('https://flagcdn.com/w80/de.png');"></div>
        </div>
        <div class="scholarship-details">
          <h3>DAAD Scholarship</h3>
          <p class="country">Germany</p>
          <p class="amount">€850-1,200 monthly</p>
          <p class="deadline">Deadline: Varies by program</p>
          <a href="#" class="apply-btn">Apply Now</a>
        </div>
      </div>
    </div>
  </div><br><br>
   <div class="see-all-btn">
   <a href="#" class="btn-pink" onclick="redirectToLogin(event)">See More</a>

  </div>
</section>


<section class="value-section">
  <div class="value-container">
    <h2>How EduLinkHub Empowers Your Learning Journey</h2>
    <p class="subtitle">Affordable solutions for everyday study challenges</p>
    
    <div class="value-grid">
      <!-- Feature 1 -->
      <div class="value-card">
        <div class="value-icon">
          <img src="https://cdn-icons-png.flaticon.com/512/3163/3163458.png" alt="Instant Solutions" width="64" height="64">
        </div>
        <div class="value-content">
          <h3>Instant Study Solutions</h3>
          <p>Get step-by-step explanations for problems you're stuck on, available 24/7 at a fraction of tutoring costs.</p>
          <span class="price-badge">From ৳59/solution</span>
        </div>
      </div>
      
      <!-- Feature 2 -->
      <div class="value-card">
        <div class="value-icon">
          <img src="https://cdn-icons-png.flaticon.com/512/1067/1067566.png" alt="Peer Network" width="64" height="64">
        </div>
        <div class="value-content">
          <h3>Peer Learning Network</h3>
          <p>Connect with students who've solved similar problems and share affordable study resources.</p>
          <span class="price-badge">Free access</span>
        </div>
      </div>
      
      <!-- Feature 3 -->
      <div class="value-card">
        <div class="value-icon">
          <img src="https://cdn-icons-png.flaticon.com/512/10334/10334245.png" alt="Study Tools" width="64" height="64">
        </div>
        <div class="value-content">
          <h3>Essential Study Tools</h3>
          <p>Access our budget-friendly toolkit: citation generators, plagiarism checkers, and formula libraries.</p>
          <span class="price-badge">Just ৳149/month</span>
        </div>
      </div>
      
      <!-- Feature 4 -->
      <div class="value-card">
        <div class="value-icon">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135789.png" alt="Expert Help" width="64" height="64">
        </div>
        <div class="value-content">
          <h3>On-Demand Expert Help</h3>
          <p>Get affordable 1:1 sessions with subject specialists when you need deeper explanations.</p>
          <span class="price-badge">From ৳299/hour</span>
        </div>
      </div>
    </div>
    
    <div class="cta-container">
      <p class="cta-text">Start solving your study problems today - no expensive commitments!</p>
      <a href="#" class="cta-button">Get Help Now</a>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

 
</body>
<footer class="footer">
  <div class="footer-container">
    <div class="footer-col brand">
      <img src="images/logo.png" alt="" class="flogo">
      <p>The automated process starts as soon as your clothes go into the machine.</p>
      <!---<div class="social-icons">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
      </div>--->
    </div>

    <div class="footer-col">
      <h4>Our solutions</h4>
      <ul>
        <li><a href="#">Design & creatives</a></li>
        <li><a href="#">Telecommunication</a></li>
        <li><a href="#">Restaurant</a></li>
        <li><a href="#">Programing</a></li>
        <li><a href="#">Architecture</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Design & creatives</a></li>
        <li><a href="#">Telecommunication</a></li>
        <li><a href="#">Restaurant</a></li>
        <li><a href="#">Programing</a></li>
        <li><a href="#">Architecture</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="#">Design & creatives</a></li>
        <li><a href="#">Telecommunication</a></li>
        <li><a href="#">Restaurant</a></li>
        <li><a href="#">Programing</a></li>
        <li><a href="#">Architecture</a></li>
      </ul>
    </div>
  </div>
</footer>

<!-- JavaScript -->

<script>
  function showLoginPrompt(event) {
    event.preventDefault(); // Prevent the default link behavior
    alert("Please login first.");
    window.location.href = "../HTML/login.html"; // Redirect to login page
  }
  function showLoginPrompt(event) {
  event.preventDefault();
  if (confirm("You need to login to continue. Go to login page?")) {
    window.location.href = "../HTML/login.html";
  }
}

</script>
<script>
  function handleLoginRedirect(event) {
    event.preventDefault(); // Prevent default link behavior
    alert("Please login first.");
    window.location.href = "../HTML/login.html"; // Redirect to login page
  }
</script>

<script>
  function handleLoginRedirect(event) {
    event.preventDefault(); // Stop the default anchor link behavior
    alert("Please login first.");
    window.location.href = "../HTML/login.html"; // Change path as needed
  }
</script>
<script>
  function redirectToLogin(event) {
    event.preventDefault(); // Prevent the link from jumping to "#"
    alert("Please login first.");
    window.location.href = "../HTML/login.html"; // Update path if needed
  }
</script>




<!-- Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</html>