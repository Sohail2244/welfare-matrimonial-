<?php
session_start();
include "./connection.php";
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['uslog']) || isset($_POST['rdsign']) || isset($_POST['adminsign'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? $_POST['rdemail'] ?? $_POST['adminemail'] ?? '');

    if (isset($_POST['uslog'])) {
        $table = 'signup';
        $type = 'signup';
        $redirect = 'forgotpass.php';
    } elseif (isset($_POST['rdsign'])) {
        $table = 'rdsignup';
        $type = 'rdsignup';
        $redirect = 'forgotpass.php';
    } elseif (isset($_POST['adminsign'])) {
        $table = 'admin';
        $type = 'admin';
        $redirect = 'forgotpass.php';
    }

    $emailquery = "SELECT * FROM $table WHERE email = '$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);

    $userdata = mysqli_fetch_array($query);
    $name = $userdata['first_name'];
    $token = $userdata['token'];

    if ($emailcount) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'sohailemi52@gmail.com'; //SMTP username
            $mail->Password = 'qzuv lmrr dmbk bgvs'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('sohailemi52@gmail.com', 'Forgot email');
            $mail->addAddress($email, 'Joe User'); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Reset Email Password';
            $mail->Body = 'Hi, ' . $name . '. Click <a href="http://localhost/welfare/changepass.php?token=' . $token . '&type=' . $type . '">here</a> to reset your password';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['success'] = 'Message has been sent';
            header("Location: $redirect?success=Message has been sent. Please Check your Email");

        } catch (Exception $e) {
            $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: $redirect?error=Message could not be sent. Mailer Error: {$mail->ErrorInfo}");

        }
    } else {
        $_SESSION['error'] = 'Error updating token in the database';
        header("Location: $redirect?error=Error updating token in the database");

    }
    unset($_POST['uslog']);
    unset($_POST['rdsign']);
    unset($_POST['adminsign']);
    unset($_SESSION['success']);
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- font awesome -->
  <link rel="stylesheet" href="./css/font-awesome.min.css" />
  <!-- <link rel="stylesheet" href="./css/demo.css" /> -->
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/login.css" />

      <title>Matrimonial | Home Page</title>


</head>

<style>
  .error{
    color: red;
}
 </style>
<body class="d-flex flex-column min-vh-100">
  <!-- navbar area start -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0">
        <nav class="navbar navbar-expand-lg navbar-light navbar-bg bg-dark p-0">
          <div class="container-fluid navabar-logo">
            <a class="navbar-brand text-white" href="index.php">
              <img src="./images/logo2-removebg-preview.png" alt="" width="90" height="90" class="d-inline-block" />
            </a>
            <a class="navbar-brand text-white" href="index.php"><span>WELFARE</span> MATRIMONIAL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./about.php">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./contact.php">Conatct Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./donor.php">Donor</a>
                </li>


                <li class="nav-item dropdown">
                  <a class="nav-link text-white" data-bs-toggle="dropdown" href="">Sign Up
                    <i class="fa fa-angle-down" aria-hidden="true" style="color: white"></i></a>
                  <div class="dropdown-menu">
                    <a href="./signup.php" class="dropdown-item">Bride</a>
                    <a href="./signup.php" class="dropdown-item">Groom</a>

                    <a href="./rawara-signup-form.php" class="dropdown-item">Rawara</a>
                    <a href="./signup.php" class="dropdown-item">Donor</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-white" data-bs-toggle="dropdown" href="">Rawara Services
                    <i class="fa fa-angle-down" aria-hidden="true" style="color: white"></i></a>
                  <div class="dropdown-menu">
                    <a href="rawara-basic-services.php" class="dropdown-item">Standard Services</a>
                    <a href="rawara-basic-services.php" class="dropdown-item">VIP Services</a>

                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="login.php" tabindex="-1" aria-disabled="true">Login
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- navbar area end -->

  <!-- main section start-->
  <div class="container-fluid">
    <div class="container main-login-section">
      <div class="row">
        <div class="col-lg-6 p-0">
          <div class="login-image-section">
            <div class="image-section-content">
              <h2>Welfare Matrimonial</h2>
              <p>Find Your Right one here</p>
              <button onclick="window.location='signup.php'">
                Register Now
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-0 login-form-section">
          <div class="form-section-heading">
            <h2>Welcome to Welfare Matrimonial</h2>
          </div>
          <div class="login-section">
            <h4>Recover Your Account</h4>
            <p>To Change Your Password Please Provide Your Email.</p>
              <!-- // Display success message if set -->
              <?php if (isset($_GET['success'])) {?>
                <div class="success" id="success">
                  <?php echo $_GET['success']; ?>
                </div>
              <script>
                  // Show the success message on page load
                  document.addEventListener('DOMContentLoaded', function () {
                      document.getElementById('success').style.display = 'block';
                      // Hide the success message after 5 seconds (adjust as needed)
                      setTimeout(function () {
                          document.getElementById('success').style.display = 'none';
                      }, 5000);
                  });
              </script>
          <?php }?>
        <!-- // Display error message if set -->
              <?php
if (!empty($errorMessage)) {
    echo '<p class="error">' . $errorMessage . '</p>';
}
?>
            <!-- <form action=""></form> -->
            <form action="" method="post">
            <label for="rd" style="color:#9b2c47"><strong>User, </strong>Enter Email for Reset Password </label>
            <div style="display:inline-flex">
              <div class="mb-4">
                <input type="email" name="email" class="form-control" placeholder="Email" value="" autocomplete="off" style="width:112%; padding: 13px 5px 13px 5px "/>
              </div>
              <button name="uslog" style="width:30%; margin-left:32px">Send</button>
              </div>
            </form>


            <form action="" method="post">
            <label for="rd" style="color:#9b2c47"><strong>Rawara, </strong>Enter Email for Reset Password </label>
            <div style="display:inline-flex">
              <div class="mb-4">
                <input type="email" name="rdemail" class="form-control" placeholder="Email" value="" autocomplete="off" style="width:112%; padding: 13px 5px 13px 5px " />
              </div>
              <button name="rdsign" style="width:30%; margin-left:32px">Send</button>
              </div>
            </form>

            <form action="" method="post">
  <label for="adminemail" style="color:#9b2c47"><strong>Admin, </strong>Enter Email for Reset Password </label>
  <div style="display:inline-flex">
    <div class="mb-4">
      <input type="email" name="adminemail" class="form-control" placeholder="Email" value="" autocomplete="off" style="width:112%; padding: 13px 5px 13px 5px " />
    </div>
    <button type="submit" name="adminsign" style="width:30%; margin-left:32px">Send</button>
  </div>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main section end-->

  <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
  </footer>
  <!-- footer section start-->
  <div class="container-fluid footer-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <h1><span>WELFARE</span>MATRIMONIAL</h1>
          <p>
            Find Your Perfect Match. <br>
            Love Online Totally Free Matrimonial Platform.
          </p>
          <div class="social-icons">
            <i class="fa fa-twitter" style="color: #ffffff"></i>
            <i class="fa fa-facebook" style="color: #ffffff"></i>
            <i class="fa fa-youtube" style="color: #ffffff"></i>
            <i class="fa fa-paper-plane" style="color: #ffffff"></i>
          </div>
          <div class="subscribe-form">
            <form action="#">
              <input type="text" placeholder="Enter Your Email...." />
              <button><a class="navsignb" href="./signup.php">Sign up</a></button>
            </form>
          </div>
        </div>
        <div class="col-lg-9 footer-content-section">
          <div class="row shop-row mt-3">
            <div class="col-md-4">
              <ul>
                <h2>Matrimonial</h2>
                <a href="./index.php">
                  <li>Home</li>
                </a>
                <a href="./about.php">
                  <li>About Us</li>
                </a>
                </a>
                <a href="./contact.php">
                  <li>Contact Us</li>
                </a>
              </ul>
            </div>
            <div class="col-md-4">
              <ul>
                <h2>Contact Us</h2>
                <a href="./contact.php">
                  <li>00-1111-222-3333</li>
                </a>
                <a href="./contact.php">
                  <li>00-222-555-7777</li>
                </a>
                <a href="./contact.php">
                  <li>000-22221-44221-211</li>
                </a>
                <a href="./contact.php">
                  <li>welfare@gmail.com</li>
                </a>
                <a href="./contact.php">
                  <li>info@welfarematrimonial.com</li>
                </a>
              </ul>
            </div>
            <div class="col-md-4">
              <ul>
                <h2>Information</h2>
                <a href="./privacy.php">
                  <li>Privacy Policy</li>
                </a>
                <a href="./faqs.php">
                  <li>FAQ's</li>
                </a>
                <a href="./termandConditions.php">
                  <li>Terms & Conditions</li>
                </a>
                <a href="./disclaimer.php">
                  <li>Disclaimers</li>
                </a>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <hr style="background: #2b3f41; height: 2px; margin: 0px" />
      <div class="row copyright-sec">
        <div class="col-md-12">
          <h6>© 2024 welfarematrimonial. All Rights Reserved.</h6>
        </div>
      </div>
    </div>
  </div>
  <!-- footer section ends-->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></scrip>
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>


</body>

</html>