<?php
session_start();
require 'database/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>eLEARNING_CODEMaster_Contact</title>

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

  <!-- dropdown css -->

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
          <h1 class="display-3 text-white animated slideInDown">Contact</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
              <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->


  <!-- Contact Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
        <h1 class="mb-5">Contact For Any Query</h1>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <h5>Get In Touch</h5>
          <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax &
            PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a
              href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
              style="width: 50px; height: 50px;">
              <i class="fa fa-map-marker-alt text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-primary">Office</h5>
              <p class="mb-0">Works Remotely</p>
            </div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
              style="width: 50px; height: 50px;">
              <i class="fa fa-phone-alt text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-primary">Mobile</h5>
              <p class="mb-0">+234 811 640 5518</p>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
              style="width: 50px; height: 50px;">
              <i class="fa fa-envelope-open text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-primary">Email</h5>
              <p class="mb-0">awofesobipeace@gmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <iframe class="position-relative rounded w-100 h-100"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2654096682136!2d4.598641674072431!3d7.761652207540071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103827489a44ee03%3A0xc8d59bcaa8bfd123!2sOsun%20State%20University!5e0!3m2!1sen!2sng!4v1693866413108!5m2!1sen!2sng"
            frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
        </div>
        <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
          <?php
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                
                require "./PHPMailer/src/Exception.php";
                require "./PHPMailer/src/PHPMailer.php";
                require "./PHPMailer/src/SMTP.php";


                // Configure your SMTP settings
                $smtpHost = 'smtp.gmail.com'; // Your SMTP server host
                $smtpUsername = 'awofesobipeace@gmail.com'; // Your SMTP username (email)
                $smtpPassword = 'gbnmkwehbmzlzlth'; // Your SMTP password
                $smtpPort = 465; // Port number, typically 587 for TLS

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST["email"];
                    $message = $_POST["message"];
                    $name=$_POST['name'];
                    $subject=$_POST['subject'];
                
                    // Create a new PHPMailer instance for sending to user
                    $userMail = new PHPMailer();
                    $userMail->isSMTP();
                    $userMail->SMTPAuth = true;
                    $userMail->Host = $smtpHost;
                    $userMail->Username = $smtpUsername;
                    $userMail->Password = $smtpPassword;
                    $userMail->SMTPSecure = 'ssl';
                    $userMail->Port = $smtpPort;
                
                    // Set sender and recipient for user's email
                    $userMail->setFrom('awofesobipeace@gmail.com', 'CODEMaster_LMS');
                    $userMail->addAddress($email, $email); // Use the user's entered email
                
                    // Email content for user
                    $userMail->isHTML(true);
                    $userMail->Subject = 'Thanks for contacting us';
                    // $userMail->Body = 'Thank you for contacting us. We have received your message and will get back to you shortly.';
                    $userMail->Body = '<html>
                        <head>
                            <style>
                                /* Add your CSS styles here */
                                body {
                                    font-family: Arial, sans-serif;
                                    background-color: #f2f2f2;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    padding: 20px;
                                    background-color: #ffffff;
                                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                }
                                .logo {
                                    display: block;
                                    margin: 0 auto;
                                    max-width: 200px;
                                }
                                .message {
                                    text-align: center;
                                    margin-top: 20px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="container">
                                <img src="https://thumbs.dreamstime.com/b/delivered-stamp-delivered-rubber-stamp-illustration-isolated-white-background-124828965.jpg" width="200px" alt="Your Logo" class="logo">
                                <div class="message">
                                    Thank you for contacting us. We have received your message and will get back to you shortly.
                                </div>
                            </div>
                        </body>
                        </html>';

                    // Send email to user
                    if ($userMail->send()) {
                        $userMessage = 'Message sent successfully !';
                        echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Message sent successfully!",
                                });
                              </script>';
                              $userStatus = 'success';
                    } else {
                        $userMessage = 'Message could not be sent ';
                        echo '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Message could not be sent .",
                                });
                              </script>';
                              $userStatus = 'error';
                    }
                    
                
                    // Create a new PHPMailer instance for sending to your email
                    $yourMail = new PHPMailer();
                    $yourMail->isSMTP();
                    $yourMail->SMTPAuth = true;
                    $yourMail->Host = $smtpHost;
                    $yourMail->Username = $smtpUsername;
                    $yourMail->Password = $smtpPassword;
                    $yourMail->SMTPSecure = 'ssl';
                    $yourMail->Port = $smtpPort;
                    // Set sender and recipient for your email
                    $yourMail->setFrom($email, 'User');
                    $yourMail->addAddress('awofesobipeace@gmail.com', 'CODEMaster'); // Your email address
                
                    // Email content for your email
                    $yourMail->isHTML(true);
                    $yourMail->Subject = 'New Contact Message from User';
                    $yourMail->Body = "Message from: $email <br><br>$message";
                
                    // Send email to your address
                    if ($yourMail->send()) {
                        $yourMessage = 'Message sent successfully to your email!';
                    } else {
                        $yourMessage = 'Message could not be sent to your email.';
                    }
                }
                ?>
          <form method="post">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                  <label for="name">Your Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required>
                  <label for="email">Your Email</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" required>
                  <label for="subject">Subject</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"
                    name="message" required></textarea>
                  <label for="message">Message</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->


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
          <form action="" method="post">
            <div class="position-relative mx-auto" style="max-width: 400px;">
              <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" name="email"
                placeholder="Your email">
              <button type="button" class="btn btn-danger py-2 position-absolute top-0 end-0 mt-2 me-2"
                type="submit">SignUp</button>
            </div>
          </form>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script>
  <?php if (isset($userStatus)) : ?>
  <?php if ($userStatus === 'success') : ?>
  Swal.fire({
    icon: "success",
    title: "Success",
    text: "<?= $userMessage ?>",
  });
  <?php else : ?>
  Swal.fire({
    icon: "error",
    title: "Error",
    text: "<?= $userMessage ?>",
  });
  <?php endif; ?>
  <?php endif; ?>
  </script>
</body>

</html>