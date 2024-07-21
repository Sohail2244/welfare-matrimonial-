<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "./connection.php";

// Check if the token is set in the URL parameters
if (isset($_GET['token'])) {
    // Store the token and type in the session
    $_SESSION['reset_token'] = $_GET['token'];
    $_SESSION['reset_type'] = $_GET['type'];
}

// Check if the token is set in the session
if (isset($_SESSION['reset_token'])) {
    // Retrieve the token and type from the session
    $token = $_SESSION['reset_token'];
    $type = $_SESSION['reset_type'];

    // Query the database to verify the token for the specific type of user
    $query = "SELECT * FROM $type WHERE token = '$token'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Token is valid, allow the user to reset their password
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confpassword = mysqli_real_escape_string($conn, $_POST['Confpassword']);

            if ($password !== $confpassword) {
                $_SESSION['error'] = "Passwords do not match.";
                header("Location: ./changepass.php?error=Passwords do not match.");
                exit();
            } else {
                // Update the password
                $escaped_token = mysqli_real_escape_string($conn, $token);
                $update_password_query = "UPDATE $type SET password = '$password' WHERE token = '$escaped_token'";
                $update_password_result = mysqli_query($conn, $update_password_query);

                if ($update_password_result) {
                    $_SESSION['success'] = "Password updated successfully. You can now login with your new password.";
                    header("Location: ./changepass.php?success=Password updated successfully. You can now login with your new password.");
                    exit();
                } else {
                    $_SESSION['error'] = "Error updating password. Please try again later.";
                    header("Location: ./changepass.php?error=Error updating password. Please try again later.");
                    exit();
                }
            }
        }
    } else {
        // Invalid token
        $_SESSION['error'] = "Invalid or expired token.";
        header("Location: ./changepass.php?error=Invalid or expired token.");
        exit();
    }
}

// Check if there is an error message in the session
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $errorMessage = "";
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
          <div class="login-image-sectioncp">
            <div class="image-section-contentcp">
              <h2>Welfare Matrimonial</h2>
              <p>Find Your Right one here</p>
              <button onclick="window.location='login.php'">
                Login
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-0 login-form-section">
          <div class="form-section-heading">
            <h2>Welcome to Welfare Matrimonial</h2>
          </div>
          <div class="login-section">
            <h4>Change Password</h4>
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
    <div class="mb-4">
        <input type="password" name="password" class="form-control" placeholder="Password" value="" autocomplete="off" />
    </div>
    <div class="mb-4">
        <input type="password" name="Confpassword" class="form-control" placeholder="Confirm Password" autocomplete="off" />
    </div>
    <button type="submit" name="submit">Reset Password</button>
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
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>