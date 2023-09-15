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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    background-color: #fff; /* Adjust background color as needed */
}
.dropdown-menu{
    display:grid;
}

/* Add a shadow effect when scrolling */
#myNavbar.sticky {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adjust shadow as needed */
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 10px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
@media(max-width:992px){
    .dropdown-content{
        /* display:block; */
        min-width: 150px;
        padding:12px 5px;
    }
    
}
@media(max-width:991px){
    .dropdown{
        display:block;
    }

}
</style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow   p-0" id="myNavbar">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-danger"><i class="fa fa-book me-3"></i>CODEMaster_LMS</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0 align-items-center">
                <a href="index.php" class="nav-item nav-link ">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="courses.php" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="testimonial.php" class="dropdown-item active">Testimonial</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
    
            </div>
            <?php   
            if(isset($_SESSION['email'])){
                echo '
                <div class="dropdown">
                <span>            
                <a href="#" class="btn btn-success py-3 px-lg-5 d-grid d-lg-block"><i class="fs-5">Menu</i></a>
                </span>
                <div class="dropdown-content">
                <p><a href="#"> <i class="fa-solid fa-book-open mx-2"></i> My Learning</a></p>
                <p><a href=""><i class="fa-solid fa-cart-shopping mx-2"></i>My Cart</a></p>
                <hr>
                <p><a href=""><i class="fa-solid fa-bell mx-2"></i>Notifications</a></p>
                <p><a href=""><i class="fa-solid fa-comment mx-2"></i>Messages</a></p>
                <hr>
                <p><a href="" style="font-size:13px"><i class="fa-solid fa-gear mx-2" ></i>Account Settings</a></p>
                <p><a href=""><i class="fa-solid fa-user mx-2"></i>Edit Profile</a></p>
                <hr>
                <p><a href="logout.php" style="color:red"><i class="fa-solid fa-right-from-bracket mx-2"></i>Log Out</a></p>
                </div>
                </div>
            ';
            }else{
                echo'
            <a href="register.php" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
            ';
            }
       ?>
        
       
            </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-danger text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Learn all you need with us at CODEMaster Academy,Get Certified</p>
                                <a href="" class="btn btn-danger py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <?php   
            if(isset($_SESSION['email'])){
                echo'
                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Start Learning</a>

                ';
                        }else{
                            echo'
                            <a href="register.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>

                        ';
                        }
                   ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-danger text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Learn all you need with us at CODEMaster Academy,Get Certified</p>
                                <a href="" class="btn btn-danger py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <?php   
            if(isset($_SESSION['email'])){
                echo'
                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Start Learning</a>

                ';
                        }else{
                            echo'
                            <a href="register.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>

                        ';
                        }
                   ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-danger mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p style="font-size: 12px;">At CODEMasters Academy, We specialised in tutoring you to the top</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-danger mb-4 mx-3 px-3"></i>
                            <h5 class="mb-3 mt-1">Online Classes</h5>
                            <p style="font-size: 12px;">We offer online classes globally all over the world, Not only in Nigeria </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-danger mb-4 mt-2"></i>
                            <h5 class="mb-3">Home Projects</h5>
                            <p style="font-size: 12px;">We can serve as a guide and counsel to all your home projects</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-2">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-danger mb-4 mt-2"></i>
                            <h5 class="mb-1">Book Library</h5>
                            <p style="font-size: 12px;">We also offer a wide range of documents on topics concerning web development</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to CODEMaster eLEARNING</h1>
                    <p class="mb-4">At CODEMaster Academy we Offer Fullstack Web Development Training</p>
                    <p class="mb-4">We offer the following courses</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Front End Courses</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Back End Courses</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Full Stack Development</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Machine Learning</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>UI/UX Training</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" ><i class="fa fa-arrow-right text-primary me-2"></i>Python Programming</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Front-End Development</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Back-End Development</h5>
                                    <small class="text-primary">20 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Full Stack Development</h5>
                                    <small class="text-primary">69 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Machine Learning</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/course-1.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="readmore.php" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="register.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"><i class="fa-solid fa-naira-sign"></i> ****</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Front-End Web development Full Course</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Awofesobi Peace</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>20 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/course-2.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="backend.php" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="register.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"><i class="fa-solid fa-naira-sign"></i>****</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Back-End Web development Full Course</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Awofesobi Peace</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>19 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/course-3.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="register.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0"><i class="fa-solid fa-naira-sign"></i> **** </h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Fullstack Web Development Courses.</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Awofesobi Peace</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>30 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid w-100 h-75 " src="img/seem.png" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-1 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center pt-2 p-4">
                            <h6 class="mb-0">Instructor Name</h6>
                            <small>CODEMaster</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="data:image/jpeg;base64,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" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="data:image/jpeg;base64,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" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="data:image/jpeg;base64,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" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="students/desmond.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Desmond </h5>
                    <p>Web developer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">To my tutor.CODEMaster
Boss you make a bigger impact than you can realize  and I just love the way you bring out the best in people.
U know that our country could have be more better if we have someone like u around us   because ur teaching is topnotch (first class) and you inspires me to work more on myself..

Thank you for being an excellent friend , I appreciate our friendship Sir</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="students/Namesake.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Peace George</h5>
                    <p>Web developer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Dear esteemed instructor, CODEMaster,

I wish to convey my deep appreciation for the substantial influence you exert, which may transcend your own awareness. I profoundly admire the manner in which you elicit the utmost potential from individuals.

It is my belief that our nation could experience greater advancement if individuals of your caliber were more prevalent in our midst. </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="students/ba.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Lucia Franca</h5>
                    <p>Investor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Your pedagogical prowess is of the highest order, and your capacity to motivate me to further cultivate my skills is truly remarkable.I express my gratitude for your outstanding companionship, Sir. Our friendship holds immense value in my esteem.CODEMaster  web development courses offer flexibility, cost-effectiveness,  empowering students to learn, connect, and advance careers.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="students/engr.bada.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Engr.Bada</h5>
                    <p>Electrical Electronic Engineer</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">CODEMaster  courses provide flexible, cost-effective access to current industry knowledge.Students value interactive, practical learning, networking opportunities, and community support. With up-to-date resources and a global reach, these courses empower individuals to gain skills, build portfolios, and enhance career prospects in the ever-evolving web development field.</p>
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