<?php
session_start();
require 'database/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>eLEARNING_CODEMaster_Testimonials</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <style>
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Add custom CSS to make the navbar sticky */
  #myNavbar {
    position: sticky;
    top: 0;
    z-index: 100;
    background-color: #fff;
    /* Adjust background color as needed */
  }

  .dropdown-menu {
    display: grid;
  }

  /* Add a shadow effect when scrolling */
  #myNavbar.sticky {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* Adjust shadow as needed */
  }


  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 12px 10px;
    z-index: 1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  @media(max-width:992px) {
    .dropdown-content {
      /* display:block; */
      min-width: 150px;
      padding: 12px 5px;
    }

  }

  @media(max-width:991px) {
    .dropdown {
      display: block;
    }

  }
  </style>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-0" id="myNavbar">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-danger"><i class="fa fa-book me-3"></i>CODEMaster_LMS</h2>
    </a>
    <!-- Show the off-canvas button on mobile -->
    <div class="d-lg-none">
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
        aria-controls="offcanvasMenu">
        <!-- Custom menu icon using FontAwesome -->
        <span class="navbar-toggler-icon">
          <i class="fa-solid fa-bars"></i>
        </span>
      </button>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <a href="index.php" class="nav-link">Home</a>
        <a href="about.php" class="nav-link">About</a>
        <a href="courses.php" class="nav-link">Courses</a>
        <a href="team.php" class="nav-link">Our Team</a>
        <a href="testimonial.php" class="nav-link">Testimonial</a>
        <a href="contact.php" class="nav-link">Contact</a>
        <?php if(isset($_SESSION['email'])): ?>
        <a href="logout.php" class="nav-link text-danger"><i class="fa-solid fa-right-from-bracket mx-2"></i> Log
          Out</a>
        <?php else: ?>
        <a href="register.php" class="nav-link">Join Now</a>
        <?php endif; ?>
        <!-- You can add more menu items here for the off-canvas menu -->
      </div>
    </div>
    <!-- Show the navigation items on desktop -->
    <div class="navbar-collapse d-lg-block">
      <ul class="navbar-nav mx-auto p-4 p-lg-0 align-items-center">
        <li class="nav-item d-none d-lg-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a href="about.php" class="nav-link">About</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a href="courses.php" class="nav-link">Courses</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a href="team.php" class="nav-link">Our Team</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a href="testimonial.php" class="nav-link">Testimonial</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
        <?php if(isset($_SESSION['email'])): ?>
        <a href="logout.php" class="nav-link text-danger"><i class="fa-solid fa-right-from-bracket mx-2"></i> Log
          Out</a>
        <?php else: ?>
        <a href="register.php" class="nav-link">Join Now</a>
        <?php endif; ?>
        <!-- You can add more navigation items here for desktop view -->
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->


  <!-- Header Start -->
  <div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10 text-center">
          <h1 class="display-3 text-white animated slideInDown">Testimonial</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
              <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->



  <!-- Testimonial Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="text-center">
        <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
        <h1 class="mb-5">Our Students Say!</h1>
      </div>
      <div class="owl-carousel testimonial-carousel position-relative">
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="students/desmond.jpg"
            style="width: 80px; height: 80px;">
          <h5 class="mb-0">Desmond </h5>
          <p>Web developer</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">To my tutor.CODEMaster
              Boss you make a bigger impact than you can realize and I just love the way you bring out the best in
              people.
              U know that our country could have be more better if we have someone like u around us because ur teaching
              is topnotch (first class) and you inspires me to work more on myself..

              Thank you for being an excellent friend , I appreciate our friendship Sir</p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="students/Namesake.jpg"
            style="width: 80px; height: 80px;">
          <h5 class="mb-0">Peace George</h5>
          <p>Web developer</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Dear esteemed instructor, CODEMaster,

              I wish to convey my deep appreciation for the substantial influence you exert, which may transcend your
              own awareness. I profoundly admire the manner in which you elicit the utmost potential from individuals.

              It is my belief that our nation could experience greater advancement if individuals of your caliber were
              more prevalent in our midst. </p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="students/ba.jpg" style="width: 80px; height: 80px;">
          <h5 class="mb-0">Lucia Franca</h5>
          <p>Investor</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">Your pedagogical prowess is of the highest order, and your capacity to motivate me to
              further cultivate my skills is truly remarkable.I express my gratitude for your outstanding companionship,
              Sir. Our friendship holds immense value in my esteem.CODEMaster web development courses offer flexibility,
              cost-effectiveness, empowering students to learn, connect, and advance careers.</p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img class="border rounded-circle p-2 mx-auto mb-3" src="students/engr.bada.jpg"
            style="width: 80px; height: 80px;">
          <h5 class="mb-0">Engr.Bada</h5>
          <p>Electrical Electronic Engineer</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">CODEMaster courses provide flexible, cost-effective access to current industry
              knowledge.Students value interactive, practical learning, networking opportunities, and community support.
              With up-to-date resources and a global reach, these courses empower individuals to gain skills, build
              portfolios, and enhance career prospects in the ever-evolving web development field.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->



  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Quick Link</h4>
          <a class="btn btn-link" href="">About Us</a>
          <a class="btn btn-link" href="">Contact Us</a>
          <a class="btn btn-link" href="">Privacy Policy</a>
          <a class="btn btn-link" href="">Terms & Condition</a>
          <a class="btn btn-link" href="">FAQs & Help</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Contact</h4>
          <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><small>School Road Osun State University</small></p>
          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><small>+234 811 640 5518</small></p>
          <p class="mb-2"><i class="fa fa-envelope me-3"></i><small>awofesobipeace@gmail</small></p>
          <div class="d-flex pt-2">
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Gallery</h4>
          <div class="row g-2 pt-2">
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/me1.jpg" alt="">
            </div>
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/me-2.jpg" alt="">
            </div>
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/me-3.jpg" alt="">
            </div>
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/my_picture.png" alt="">
            </div>
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
            </div>
            <div class="col-4">
              <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Newsletter</h4>
          <p>Get Updates On Our Courses.</p>
          <div class="position-relative mx-auto" style="max-width: 400px;">
            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
            <button type="button" class="btn btn-danger py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="border-bottom" href="#">CODEMaster</a>, All Right Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
            <div class="footer-menu">
              <a href="">Home</a>
              <a href="">Cookies</a>
              <a href="">Help</a>
              <a href="">FQAs</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>