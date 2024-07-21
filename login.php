<?php
include "connection.php";

session_start();
// Check if there is an error message in the session
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    // Clear the error message from the session
    unset($_SESSION['error']);
} else {
    $errorMessage = ""; // No error by default
}

if (isset($_POST['uslog'])) {
    // Check if 'email' and 'password' are set in $_POST
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM signup WHERE email=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                // Check if the login is successful in 'signup' table
                if ($row && $row['email'] === $email && $row['password'] === $pass) {
                    // Continue with the rest of your code or redirect as needed
                    // ...

                    // Clear any previous error message in the session
                    unset($_SESSION['error']);
                    $_SESSION['email'] = $email; // Store user email in the session

                    // Open user view in a new tab
                    echo '<script>window.open("./user view/userindex.php", "_blank");</script>';
                    exit();
                } else {
                    // If not found in 'signup' table, check in 'rdsignup' table
                    $sqlRD = "SELECT * FROM rdsignup WHERE email=? AND password=?";
                    $stmtRD = mysqli_prepare($conn, $sqlRD);

                    if ($stmtRD) {
                        mysqli_stmt_bind_param($stmtRD, "ss", $email, $pass);
                        mysqli_stmt_execute($stmtRD);

                        // Get the result from 'rdsignup' table
                        $resultRD = mysqli_stmt_get_result($stmtRD);

                        if ($resultRD) {
                            $rowRD = mysqli_fetch_assoc($resultRD);

                            // Check if the login is successful in 'rdsignup' table
                            if ($rowRD && $rowRD['email'] === $email && $rowRD['password'] === $pass) {
                                // Continue with the rest of your code or redirect as needed
                                // ...

                                // Clear any previous error message in the session
                                unset($_SESSION['error']);
                                $_SESSION['email'] = $email; // Store user email in the session

                                // Open user view in a new tab
                                echo '<script>window.open("./user view/userindex.php", "_blank");</script>';
                                exit();
                            } else {
                                // If not found in 'rdsignup' table, check in 'admin_signup' table
                                $sqlAdmin = "SELECT * FROM admin WHERE email=? AND password=?";
                                $stmtAdmin = mysqli_prepare($conn, $sqlAdmin);

                                if ($stmtAdmin) {
                                    mysqli_stmt_bind_param($stmtAdmin, "ss", $email, $pass);
                                    mysqli_stmt_execute($stmtAdmin);

                                    // Get the result from 'admin_signup' table
                                    $resultAdmin = mysqli_stmt_get_result($stmtAdmin);

                                    if ($resultAdmin) {
                                        $rowAdmin = mysqli_fetch_assoc($resultAdmin);

                                        // Check if the login is successful in 'admin_signup' table
                                        if ($rowAdmin && $rowAdmin['email'] === $email && $rowAdmin['password'] === $pass) {
                                            // Continue with the rest of your code or redirect as needed for admin
                                            // ...

                                            // Clear any previous error message in the session
                                            unset($_SESSION['error']);
                                            $_SESSION['email'] = $email; // Store user email in the session

                                            // Open admin view in a new tab
                                            echo '<script>window.open("./Admin/index.php", "_blank");</script>';
                                            exit();
                                        }
                                    }

                                    // Close the statement for 'admin_signup' table
                                    mysqli_stmt_close($stmtAdmin);
                                }
                            }
                        }

                        // Close the statement for 'rdsignup' table
                        mysqli_stmt_close($stmtRD);
                    }

                    // Set the error message in the session
                    $_SESSION['error'] = "Incorrect email or password";
                    // Redirect with the error message
                    header("Location: login.php");
                    exit();
                }
            }
        }

        // Close the statement for 'signup' table
        mysqli_stmt_close($stmt);
    } else {
        // Set the error message in the session
        $_SESSION['error'] = "Email and password are required";
        // Redirect with the error message
        header("Location: login.php");
        exit();
    }
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
            <h4>Login</h4>
            <?php if (!empty($errorMessage)): ?>
    <p class="error"><?php echo $errorMessage; ?></p>
<?php endif;?>
            <!-- <form action=""></form> -->
            <form  action="login.php" method="post">
              <div class="mb-4">
                <input type="email" name="email" class="form-control" placeholder="Email" value="" autocomplete="off" />
              </div>
              <div class="mb-4">
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" />
              </div>
              <!-- <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="checkme" name="remember" Required />
                <label class="form-check-label" for="checkme">Remember me
                </label>
              </div> -->
              <p class="my-4">
              <a href="./forgotpass.php">
                                              Forgot password</a>
              </p>
              <button name="uslog">Submit</button>
              <p>
                Signing in mean you agree to our
                <a href="./termandConditions.php" >Terms &amp; conditions</a>
                and
                <a href="./privacy.php" >privacy policy</a>
              </p>
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