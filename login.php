<?php
session_start();
if(isset($_SESSION['email'])){
   header('location:register.php');
}
?>

<?php
require "database/database.php";

if(isset($_POST['login'])){
    if(empty($_POST['email'])){
        $errors['emailErr'] = "Your email is required";
        }else{
            $data['email'] = $_POST['email'];
        }
        if (empty($_POST['password'])) {
          $errors['passwordErr'] = "Your password is required";
        }else{
            $data['password'] = $_POST['password'];

        }
$email = $_POST['email'];
$password = md5($_POST['password']);
 
$sql = "SELECT * FROM lms WHERE email='$email'";
 $select= $conn->query($sql);
 if($select->num_rows > 0){
    $result = $select->fetch_assoc();
    if(strcmp($password, $result['password'])==0){
        $_SESSION['email'] = $result['email'];
        if(isset($_SESSION['email'])){
        //     echo "<div class='alert alert-success' role='alert'>
        //    Working!
        //   </div>";
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                Swal.fire({
                    title: "Logged In",
                    text: "The password entered is incorrect",
                    icon: "success",
                    confirmButtonText: "OK"
                });  
            </script>';
            header('location:index.php');
        }
    }else{
    //     echo "<div class='alert alert-danger' role='alert'>
    //     Invalid Details!
    //   </div>";
        }
 }else{
    // echo "<div class='alert alert-danger' role='alert'>
    //     Invalid Email!
    //   </div>";
 }
   

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <title>eLEARNING_CODEMaster_Login</title>
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">
    
</head>
<body>
    
    <div class="container">
    <?php
require "database/database.php";

$errors = ""; // Initialize the error message variable

if (isset($_POST['login'])) {
    if (empty($_POST['email'])) {
        $errors = "Your email is required";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $errors = "Your password is required";
    } else {
        $password = $_POST['password'];

        $sql = "SELECT * FROM lms WHERE email = '$email'";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("s", $email);
        // $stmt->execute();
        // $result = $stmt->get_result();
        $select = $conn->query($sql);

        if ($select->num_rows > 0) {
            $result = $select->fetch_assoc();
            // print_r($result);
            if (password_verify($password, $result['password'])) {
                $_SESSION['email'] = $result['email'];
                echo "<script>console.log('Working')</script>";
                header('location: index.php');
                exit();
            } else {
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                        Swal.fire({
                            title: "Invalid Details",
                            text: "The password entered is incorrect",
                            icon: "error",
                            confirmButtonText: "OK"
                        });  
                    </script>';
            }
        } else {
            echo '            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                    Swal.fire({
                        title: "Invalid Email",
                        text: "The email entered is not found in our records",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                </script>';
        }
        echo "<script>console.log($password)</script>";

    }
   
}

?>


            
            
        
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" style='color:red;text-align:center;margin:auto;padding-left:50px' role="alert">
                    <?php echo $errors; ?>
                </div>
            <?php endif; ?>
            
        
    <div class="login-box">
        <h2>Login </h2>
       <form action="" method="post">
       <div class="input-box">
            <input type="email" name="email">
            <label for="">Email</label>
        </div>
        <div class="input-box">
            <input type="password" name="password">
            <label for="">Password</label>
        </div>
        <div class="forgot-pass"> 
             <a href="">Forgot your Password?</a>
        </div>
        <a href="">
        <button type="submit" class="btn" name='login'>Login</button>
        </a>
       </form>
        <div class="signup-link">
            <a href="register.php">Signup</a>
        </div>
    </div>
    <span style="--i:0;"></span>
    <span style="--i:1;"></span>
    <span style="--i:2;"></span>
    <span style="--i:3;"></span>
    <span style="--i:4;"></span>
    <span style="--i:5;"></span>
    <span style="--i:6;"></span>
    <span style="--i:7;"></span>
    <span style="--i:8;"></span>
    <span style="--i:9;"></span>
    <span style="--i:10;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:13;"></span>
    <span style="--i:14;"></span>
    <span style="--i:15;"></span>
    <span style="--i:16;"></span>
    <span style="--i:17;"></span>
    <span style="--i:18;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:21;"></span>
    <span style="--i:22;"></span>
    <span style="--i:23;"></span>
    <span style="--i:24;"></span>
    <span style="--i:25;"></span>
    <span style="--i:26;"></span>
    <span style="--i:27;"></span>
    <span style="--i:28;"></span>
    <span style="--i:29;"></span>
    <span style="--i:30;"></span>
    <span style="--i:31;"></span>
    <span style="--i:32;"></span>
    <span style="--i:33;"></span>
    <span style="--i:34;"></span>
    <span style="--i:35;"></span>
    <span style="--i:36;"></span>
    <span style="--i:37;"></span>
    <span style="--i:38;"></span>
    <span style="--i:39;"></span>
    <span style="--i:40;"></span>
    <span style="--i:41;"></span>
    <span style="--i:42;"></span>
    <span style="--i:43;"></span>
    <span style="--i:44;"></span>
    <span style="--i:45;"></span>
    <span style="--i:46;"></span>
    <span style="--i:47;"></span>
    <span style="--i:48;"></span>
    <span style="--i:49;"></span>

</div>
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