<?php
require 'database/database.php';
// require 'update.php';
session_start();

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>eLEARNING_CODEMaster_userdashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <link href="css/style.css" rel="stylesheet">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Customized Bootstrap Stylesheet -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


  <!-- Template Stylesheet -->
  <style>
  .box {
    text-align: center;
    border: 1px solid transparent;
    border-radius: 3px;
    padding: 10px 0px;
    font-weight: 700;
    font-size: 25px;
    background-color: black;
    color: white;
  }

  .boxd {
    text-align: center;
    border: 1px solid transparent;
    border-radius: 3px;
    padding: 5px 5px;
    font-weight: 500;
    font-size: 20px;
    color: white;
    width: fit-content;
    background-color: green;
    margin: auto;

  }

  .boxd:hover {
    cursor: pointer;
    background-color: aqua;
  }

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


  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-0" id="myNavbar" style="z-index: -1;">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-danger"><i class="fa fa-book me-3"></i>CODEMaster_LMS</h2>
    </a>


  </nav>

  <!-- Navbar End -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a> -->
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fa-solid fa-bell"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
      </a>





      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <div class="image">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
              <div class="image text-center">
                <img src="https://cdn0.iconfinder.com/data/icons/student-2/100/student-1-512.png"
                  class="img-circle elevation-2" alt="User Image">
                <span style="letter-spacing: 5px;font-size:20px;font-weight:900;color:aliceblue"
                  class="ms-3">Student</span>
              </div>

            </div>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <div class="input-group-append">

            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav " data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <ul class="navbar-nav mx-auto p-4 p-lg-0 align-items-center">
              <li class="nav-item  d-lg-block">
                <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item  d-lg-block">
                <a href="about.php" class="nav-link">About</a>
              </li>
              <li class="nav-item  d-lg-block">
                <a href="courses.php" class="nav-link">Courses</a>
              </li>
              <li class="nav-item  d-lg-block">
                <a href="team.php" class="nav-link">Our Team</a>
              </li>
              <li class="nav-item  d-lg-block">
                <a href="testimonial.php" class="nav-link">Testimonial</a>
              </li>
              <li class="nav-item  d-lg-block">
                <a href="contact.php" class="nav-link">Contact</a>
              </li>
              <?php if(isset($_SESSION['email'])): ?>
              <a href="logout.php" class="nav-link text-danger"><i class="fa-solid fa-right-from-bracket mx-2"></i>
                Log
                Out</a>
              <a href="userdashboard.php"> <i class="fa-solid fa-user"></i></a>
              <?php else: ?>
              <a href="register.php" class="nav-link text-success">Join Now</a>
              <?php endif; ?>
              <!-- You can add more navigation items here for desktop view -->
            </ul>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Student Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item mx-3"><a href="#">Student</a></li>
                <!-- <li class="breadcrumb-item active">DataTables</li> -->
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section>
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-clock"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Time</span>
                  <span class="info-box-number" id="date"></span>



                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Lovely Courses</span>
                  <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chevron-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Learning is Power</span>
                  <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <!-- <span class="info-box-text">Date Joined</span> -->
                  <?php
                 // Check if the email is set in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // SQL query to select dateregistered for a specific email
  $sql = "SELECT dateregistered FROM lms WHERE email = '$email'";
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result->num_rows > 0) {
      // Output Date Registered for each row
      while ($row = $result->fetch_assoc()) {
          echo "<span class='info-box-number'>Date Registered: " . $row["dateregistered"]. "<br></span>";
      }
  } else {
      echo "No results for the specified email.";
  }
} else {
  echo "Email not set in the session.";
}

                  ?>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="container-fluid">
          <div class="header">
            <div class="box">
              Details
            </div>
          </div>
        </div>
        <div class="row container-fluid">
          <div class="card card-primary mt-3">

            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <?php
                 // Check if the email is set in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // SQL query to select dateregistered for a specific email
  $sql = "SELECT email FROM lms WHERE email = '$email'";
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result->num_rows > 0) {
      // Output Date Registered for each row
      while ($row = $result->fetch_assoc()) {
        echo "<input type='email' class='form-control' id='exampleInputEmail1' placeholder='" . $row["email"] . "' readonly>";
      }
  } else {
      echo "No results for the specified email.";
  }
} else {
  echo "Email not set in the session.";
}
?>

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Date Registered</label>
                  <?php
                 // Check if the email is set in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // SQL query to select dateregistered for a specific email
  $sql = "SELECT dateregistered FROM lms WHERE email = '$email'";
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result->num_rows > 0) {
      // Output Date Registered for each row
      while ($row = $result->fetch_assoc()) {
        echo "<input type='password' class='form-control' id='exampleInputEmail1' placeholder='" . $row["dateregistered"] . "' readonly>";
      }
  } else {
      echo "No results for the specified Dateregistered.";
  }
} else {
  echo "Email not set in the session.";
}
?>

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <?php
                 // Check if the email is set in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // SQL query to select dateregistered for a specific email
  $sql = "SELECT password FROM lms WHERE email = '$email'";
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result->num_rows > 0) {
      // Output Date Registered for each row
      while ($row = $result->fetch_assoc()) {
        echo "<input type='password' class='form-control' id='exampleInputEmail1' placeholder='" . $row["password"] . "' readonly>";
      }
  } else {
      echo "No results for the specified Password.";
  }
} else {
  echo "Password not set in the session.";
}
?>

                </div>

              </div>

          </div>
          <!-- /.card-body -->
          </form>
          <div class="container-fluid">
            <button type="button" class="btn btn-default boxd " data-toggle="modal" data-target="#modal-default">
              Update Details
            </button>
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Update These Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                    require 'update.php';
                echo '
                    <form method="post" enctype="multipart/form-data" action="userdashboard.php">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="exampleInputPassword1"
                          placeholder="Enter New Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Profile Picture</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile_picture" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                          </div>
                        </div>
                      </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                    </div>
                    </form>
                    '

                    ?>

                  </div>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

          </div>

        </div>


        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">

          </div>
          <strong>Copyright &copy; 2023 <a
              href="https://peace-dfg.github.io/CODEMaster_Portfolio/">CODEMaster</a>.</strong>
          All rights reserved.
        </footer>

    </div>
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>










  <!--time-->
  <script>
  function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Add leading zeros if needed
    hours = (hours < 10 ? "0" : "") + hours;
    minutes = (minutes < 10 ? "0" : "") + minutes;
    seconds = (seconds < 10 ? "0" : "") + seconds;

    // Display the time in the specified format
    var timeString = hours + ":" + minutes + ":" + seconds;
    document.getElementById('date').innerHTML = timeString;
  }

  // Update the clock every second (1000 milliseconds)
  setInterval(updateClock, 1000);

  // Initial call to display the time immediately
  updateClock();
  </script>
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>