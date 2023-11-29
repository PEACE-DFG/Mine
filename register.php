<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="css/register.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <!-- swal fire -->
  <link rel="stylesheet" href="sweetalert2.min.css">


  <title>eLEARNING_CODEMaster_Register</title>

</head>

<body>
  <?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;
    require 'database/database.php';
      $errors =[];
      $data =array(
          'email'=>'',
          'password'=>'',
          'repeatpassword'=>''
      );
    if(isset($_POST['register'])){
        if(empty($_POST['email'])){
            $errors['emailErr'] = "Your email is required";
        }else{
            $data['email'] = $_POST['email'];
        }
        if (empty($_POST['password'])) {
            $errors['passwordErr'] = "Your password is required";
        } elseif (strlen($_POST['password']) < 8) {
            $errors['passwordErr'] = "Password must be at least 8 characters long";
        } else {
            $data['password'] = $_POST['password'];
        }
        if (empty($_POST['repeatpassword'])) {
            $errors['repeatpasswordErr'] = "Confirm password is required";
        } elseif ($_POST['password'] !== $_POST['repeatpassword']) {
            $errors['repeatpasswordErr'] = "Passwords do not match";
        } else {
            $data['repeatpassword'] = $_POST['repeatpassword'];
        }
        $email = $data['email'];
        $password = md5($data['password']);
        $date = date("Y-m-d h:i:s a");

        if (count($errors) == 0) {
            $sql = "SELECT email FROM lms WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        
            if (mysqli_stmt_num_rows($stmt) == 0) {
                // No matching email found, safe to insert
                $sql_insert = "INSERT INTO lms (email, password, dateregistered) VALUES (?, ?, ?)";
                $stmt_insert = mysqli_prepare($conn, $sql_insert);
                mysqli_stmt_bind_param($stmt_insert, "sss", $email, $password, $date);
                if (mysqli_stmt_execute($stmt_insert)) {
                    // Registration successful, trigger Swal success alert
                    echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            title: "Registration Successful!",
                            text: "You have successfully registered.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(()=>{
                            window.location.href="login.php"
                        });
                    </script>';
        
                    // Sending registration confirmation email
                   
                    
                    require "./PHPMailer/src/Exception.php";
                    require "./PHPMailer/src/PHPMailer.php";
                    require "./PHPMailer/src/SMTP.php";

                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Username = 'awofesobipeace@gmail.com';
                    $mail->Password = 'gbnmkwehbmzlzlth';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->isHTML(true);
                    $mail->setFrom('CODEMaster_lms.com');
                    $mail->addAddress($data['email']);
                    $mail->Subject = 'Registration Verification';
                    $message = "
                    <!DOCTYPE html>
<html lang='en'>
<head>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
   <style>
    *{
        margin: 0;
    }
    .container{
        max-width: 500px;
        margin: auto;
        text-align: center;
        box-shadow: 10px 10px 15px grey;
        border-radius: 5px;
    }
    .header{
        color: rgb(20, 222, 20);
    }
    .core{
        border: 1px solid transparent;
        border-radius: 50%;
        padding: 10px;
        font-weight: 900;
        color: white;
        background-color: rgb(98, 251, 98);
    }
    hr{
        color: rgb(20, 222, 20);

    }
    .all{
        background-color: rgb(191, 255, 191);
        padding: 10px 0px;

    }
    img{
        border-radius: 30px;
        width:490px;
    }
    h2{
        padding: 10px 0px;

    }
    .root{
        font-size: 40px;
        color: white;
        font-family: Verdana, Geneva, Tahoma, sans-serif;

    }
    .rule{
        font-size: 25px;
        color: white;
        padding: 10px 0px;

    }
    .let{
        font-family: 'Courier New', Courier, monospace;
    }
    footer{
        background-color: grey;
        color: white;
        padding: 20px 0px;
    }
    .bot{
        border-bottom: 2px solid white;
        width: fit-content;
        margin: auto;
    }
    i{
        font-size: 30px;
    }
    a{
        text-decoration: none;
        color: white;
    }

   </style>
</head>
<body>

    <div class='container'>
        <div class='header'>
            <h2>
           Registration Successful
            </h2>

            <div class='all'>
            <!-- <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOkMsYeen3GU66Lr8j8a_d8tyEfmqt8Dmpvg&usqp=CAU' width='70px' alt=''> -->

            <section style='margin: 30px 0px;'>
            <img src='https://media.licdn.com/dms/image/D4E16AQHRhTZlXiJSuQ/profile-displaybackgroundimage-shrink_350_1400/0/1700170986961?e=1706745600&v=beta&t=VoaslInkrVx6z1NN0ob-qQa9nG-aOAOzzT2PamA5dJY' class='img-fluid w-25' alt='logo'>
                <h4 class='root'>
                    CODEMaster_lms
                </h4>
                <h5>
                You are ready to embark on your Tech journey with CODEMaster, to move From Zero to Hero.
                </h5>
                <h6 class='rule'>
                    Thank You for Registering
                </h6>
                
            </section>
            </div>
            
        </div>
        <footer>
            <p class='let'>
                If you have any questions, please get in touch with us at awofesobipeace@gmail.com

            </p>
            <br>
          
        </footer>
    </div>
    
</body>
</html>
                    ";
                    $mail->Body = $message;
        
                    if ($mail->send()) {
                        // Email sent successfully
                        // echo "Email sent successfully";
                    } else {
                        // Email sending failed
                        echo "Email sending failed: " . $mail->ErrorInfo;
                    }
                } else {
                    // Something went wrong during registration, trigger Swal error alert
                    echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            title: "Registration Error",
                            text: "Something went wrong during registration: ' . mysqli_error($conn) . '",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    </script>';
                }
            } else {
                // Email already exists in the database, trigger Swal warning alert
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        title: "Email Already Exists",
                        text: "The email address is already registered.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                </script>';
            }
        
            mysqli_stmt_close($stmt);
        } else {
            // Something went wrong, trigger Swal error alert
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            </script>';
        }
        
        
    } 
    
    

    ?>

  <div class="container">

    <div class="login-box">
      <h2>Register </h2>
      <form action="" method="post">
        <div class="input-box">
          <input type="email" name="email" value="<?php echo array_key_exists('email', $data) ? $data['email'] : '' ?>">
          <label for="">Email</label>
          <small style="color:red">
            <?php echo array_key_exists('emailErr', $errors) ? '<div class="alert alert-danger" role="alert">' . $errors['emailErr'] . '</div>' : ''; ?>
          </small>
        </div>
        <div class="input-box">
          <input type="password" name="password"
            value="<?php echo array_key_exists('password', $data) ? $data['password'] : '' ?>">
          <label for="">Password</label>
          <small style="color:red">
            <?php echo array_key_exists('passwordErr', $errors) ? '<div class="alert alert-danger" role="alert">' . $errors['passwordErr'] . '</div>' : ''; ?>
          </small>
        </div>
        <div class="input-box">
          <input type="password" name="repeatpassword"
            value="<?php echo array_key_exists('repeatpassword', $data) ? $data['repeatpassword'] : '' ?>">
          <label for="">Confirm Password</label>
          <small style="color:red">
            <?php echo array_key_exists('repeatpasswordErr', $errors) ? '<div class="alert alert-danger" role="alert">' . $errors['repeatpasswordErr'] . '</div>' : ''; ?>
          </small>
        </div>

        <button type="submit" class="btn" name="register">Register</button>

      </form>
      <div class="signup-link">
        <div class="forgot-pass ">
          <a href="" style="color: white;">OR</a>
        </div>
        <a href="login.php">SignIn</a>
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

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <!-- Include SweetAlert from cdnjs -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>