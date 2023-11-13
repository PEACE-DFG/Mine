<?php
session_start();
require 'database/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>eLEARNING_CODEMaster</title>
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

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
        <a href="register.php" class="nav-link text-success">Join Now</a>

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
        <a href="userdashboard.php"> <i class="fa-solid fa-user"></i></a>

        <?php else: ?>
        <a href="register.php" class="nav-link">Join Now</a>
        <?php endif; ?>
        <!-- You can add more navigation items here for desktop view -->
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->


  <!-- Upper description -->
  <div class="root bg-dark " id="root">
    <br>
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">FullStack Development</li>
        </ol>
      </nav>
      <br>
      <div>
        <h2 class="text-light" style="color:white">FullStack Development Crash Courses - Learn in 160 hours</h2>
        <h4 class="text-light" style="color:white">Learn All you need to know about Full Stack Development </h4>
        <h5 class="text-warning">4.6 <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span class="text-light">(200 ratings)</span>
        </h5>
        <p class="text-primary">Created by CODEMaster</p>
        <p class="text-light"><i class="fa-solid fa-clock me-2"></i><small>Last Updated</small> <span><i
              class="fa-solid fa-globe ms-4 me-2"></i> <small>English</small></span></p>
      </div>

      <br>
    </div>
  </div>
  <br>
  <!-- What you will Learn -->
  <div class="container">
    <div class="container-xxl py-5">
      <div class="container">

        <div class="row g-4 justify-content-center">
          <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="course-item bg-light">
              <div class="position-relative overflow-hidden">
                <!-- <img class="img-fluid" src="img/course-1.jpg" alt=""> -->
                <div class="bod">
                  <div class="class text-center" style="border-bottom:2px solid black;width:fit-content;margin:auto">
                    <h3> What You will Learn</h3>
                  </div>

                </div>

                <div class="lot px-2">
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand HTML</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand CSS</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand BOOTSTRAP</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand VERSION CONTROL</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand JAVASCRIPT</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to understand REACT JS</p>
                  <p class="pt-1"><i class="fa-solid fa-check mx-2"></i>You'll be able to pick one Technology of the
                    Backend to choose which one you want to learn.</p>

                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="course-item bg-light mt-3">
              <img
                src="data:image/png;base64,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"
                alt="" class="img-fluid h-100 w-100">
              <img src="https://www.keycdn.com/img/support/full-stack-development.png" alt=""
                class="img-fluid w-100 h-100">
            </div>
          </div>
        </div>

        <br>
        <div class="row g-4 justify-content-center">
          <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="course-item bg-light">
              <div class="position-relative overflow-hidden">
                <!-- <img class="img-fluid" src="img/course-1.jpg" alt=""> -->


              </div>

            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  <!-- Notice Notifications -->
  <div class="wow fadeInUp text-center mb-3 " style="border-bottom:1px solid black;width:fit-content;margin:auto">
    <h5>
      Contact Us For More Information On this Course Before you register
    </h5>

  </div>
  <div class="col-lg-6 col-md-12 m-auto wow fadeInUp" data-wow-delay="0.5s">
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
                        echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Message sent successfully!",
                                });
                              </script>';
                              $userStatus = 'success';
                    } else {
                        $userMessage = 'Message could not be sent ';
                        echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        
                        <script>
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
  <section>
    <div class="container mt-5">
      <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-success" type="button">Click Here To Register</button>
      </div>
    </div>
  </section>
  <br>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>