<?php
// Include database connection and start session
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = ($_POST["password"]); // Hash the password
    $password_confirmation = $_POST["password_confirmation"];
    $date_of_birth = $_POST["date_of_birth"];
    $city_id = $_POST["city_id"]; // Adjusted name to match the HTML form
    $phone = $_POST["phone"];

    $token = bin2hex(random_bytes(15));

    // Perform form validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format. Please use a valid email address.";
    } elseif (strtotime($date_of_birth) > time()) {
        $_SESSION['error'] = "Invalid date of birth.";
    } elseif ($password !== $password_confirmation) {
        $_SESSION['error'] = "Password and Confirm Password do not match.";
    } else { // Check if email already exists
        $check_email_sql = "SELECT * FROM rdsignup WHERE email = ?";
        $stmt_check_email = $conn->prepare($check_email_sql);
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 1) {
            $_SESSION['error'] = "Email already exists. Please use a different email address.";
            $stmt_check_email->close();
        } else {
            // Use prepared statement to prevent SQL injection
            $sql = "INSERT INTO rdsignup (first_name, last_name, email, password, Cpassword, date_of_birth, city_id, phone,token)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("sssssssss", $first_name, $last_name, $email, $password, $password_confirmation, $date_of_birth, $city_id, $phone, $token);

                // Execute the statement
                $stmt->execute();

                // Check if the query was successful
                if ($stmt->affected_rows > 0) {
                    $_SESSION['success'] = "Thank you for registering! You can now log in.";
                    header("Location: rawara-signup-form.php?success=Thank you for registering! You can now log in.");
                    exit();
                } else {
                    $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
                    header("Location: rawara-signup-form.php?error=Oops! Something went wrong. Please try again later.");
                    exit();
                }

                // Close the statement
                $stmt->close();
            }
        }
    }
}

// Close the database connection
$conn->close();

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
  <link rel="stylesheet" href="./css/signup.css" />

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
                  <a class="nav-link text-white" href="#">About Us</a>
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
              <button onclick="window.location='login.php'">
                Login Now
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 p-0 login-form-section">
          <div class="form-section-heading">
            <h2>Welcome to Welfare Matrimonial</h2>
          </div>
          <div class="login-section register">
            <h4>Create an Account</h4>

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


            <form class="row g-4" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="">
              <input type="hidden" name="_token" value="" />
              <div class="col-md-6">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" value=""  autocomplete="off"/>
              </div>
              <div class="col-md-6">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="" autocomplete="off"/>
              </div>

              <div class="col-md-6">
                <input type="text" name="email" class="form-control" placeholder="Email" value="" autocomplete="off"/>
              </div>
              <div class="col-md-6">
                <input type="password" name="password" class="form-control" value="" placeholder="Password" autocomplete="off"/>
              </div>
              <div class="col-md-6">
                <input type="password" name="password_confirmation" class="form-control" value=""
                  placeholder="Confirm Password" autocomplete="off"/>
              </div>


              <div class="col-md-6">
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value=""
                  placeholder="Date of Birth"  />
              </div>



              <div class="col-md-6">
                <select name="city_id" class="form-select" style="width: 100%">
                  <option value="">City</option>
                  <option value="Lahore">Lahore</option>
                  <option value="Karachi">Karachi</option>
                  <option value="Islamabad">Islamabad</option>
                </select>
              </div>




              <div class="col-md-6">
                <input id="phone" name="phone" class="no-arrow form-control" value="" type="number"
                  placeholder="Mobile" />
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="registerCheck" Required />
                  <label class="form-check-label" for="registerCheck">
                    I agree to the Privacy Policy and T&amp;C. (
                    <a href="./termandConditions.php" target="_blank">Terms &amp; conditions</a>
                    ,
                    <a href="./privacy.php" target="_blank">Privacy Policy</a>)
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit">Register</button>
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
                <a href="/index.php">
                  <li>Home</li>
                </a>
                <a href="./about.php">
                  <li>About Us</li>
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