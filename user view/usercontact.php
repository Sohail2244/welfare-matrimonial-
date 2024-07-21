<?php
include "../connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $reason = $_POST["reason"];
    $message = $_POST["message"];
    date_default_timezone_set('Asia/Karachi');
    $currentTimestamp = date('Y-m-d H:i:s');

    if (empty($name) || empty($email) || empty($reason)) {
        $_SESSION['error'] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format. Please use a valid email address.";
    } else {
        // Get the current timestamp

// Insert the message and the current timestamp into the database
        $sql = "INSERT INTO Contactus (name, email, phone, reason, message, timestamp) VALUES ('$name', '$email', '$phone', '$reason', '$message', NOW())";
        $query_run = mysqli_query($conn, $sql);

        if ($query_run) {
            $to_admin = "bcsm-s20-066@superior.edu.pk";
            $subject_admin = "New Contact Form Submission";
            $message_admin = "A new contact form submission has been received:\n\nName: $name\nEmail: $email\nPhone: $phone\nreason: $reason\n message: $message";
            $headers_admin = "From: $email"; // Set the sender's email as the "From" address
            mail($to_admin, $subject_admin, $message_admin, $headers_admin);

            $_SESSION['success'] = "Thank you for contacting us! We will get back to you shortly.";
            header("Location: usercontact.php?success=Thank you for contacting us! We will get back to you shortly.");
            exit();
        } else {
            $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
        }
    }

    $conn->close();
    header("Location: usercontact.php");
    exit();
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
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="./css/demo.css" /> -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />

        <title>Matrimonial | Home Page</title>    


</head>



<body class="d-flex flex-column min-vh-100">
    <!-- navbar area start -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light navbar-bg bg-dark p-0">
                    <div class="container-fluid navabar-logo">
                        <a class="navbar-brand text-white" href="userindex.php">
                            <img src="../images/logo2-removebg-preview.png" alt="" width="90" height="90"
                                class="d-inline-block" />
                        </a>
                        <a class="navbar-brand text-white" href="userindex.php"><span>WELFARE</span> MATRIMONIAL</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active text-white" aria-current="page"
                                        href="userindex.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./userabout.php">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./usercontact.php">Conatct Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./feedback.php">Feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./userdonor.php">Donor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./userrawara.php">Rawara
                                        </a>
                                <li class="nav-item dropdown">
                  <a class="nav-link text-white" data-bs-toggle="dropdown" href="">Logout
                    <i class="fa fa-angle-down" aria-hidden="true" style="color: white"></i></a>
                  <div class="dropdown-menu">
                    <a href="./weddingprofile.php" class="dropdown-item">My Wedding Profile</a>
                    <a href="./logout.php" class="dropdown-item" onclick="return confirm('Are you sure you want to logout?');">logout</a>
                  </div>
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
                    <div class="login-image-section3">
                        <div class="image-section-content3">
                            <h2>Get In Touch</h2>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                            <div class="sideflex">
                                <div class="button">
                                    <img src="../images/icons8-phone-64.png" alt="">
                                </div>
                                <div class="sideflexp">
                                    <p>Phone Number</p>
                                    <h6>(319) 555-0115</h6>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="sideflex">
                                <div class="button">
                                    <img src="../images/icons8-email-80.png" alt="">
                                </div>
                                <div class="sideflexp">
                                    <p>Email</p>
                                    <div class="share">
                                        <a href="#">welfarematrimonial@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="sideflex">
                                <div class="button">
                                    <img src="../images/icons8-link-48.png" alt="">
                                </div>
                                <div class="sideflexp">
                                    <p>Follow us</p>
                                    <div class="share">
                                        <a href=""><i class="fa fa-facebook"></a></i><a href=""><i
                                                class="fa fa-twitter"></i></a><a href=""><i
                                                class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0 login-form-section">
                    <!-- <div class="form-section-heading">
                        <h2>Welcome to Welfare Matrimonial</h2>
                    </div> -->
                    <div class="login-section">
                        <!-- <form action=""></form> -->
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
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="contform">
                            <label for="name">Name</label>
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value=""
                                    required autocomplete="off"/>
                            </div>
                            <label for="email">Email</label>
                            <div class="mb-4">
                                <input  name="email" class="form-control" placeholder="Enter Email"
                                    required autocomplete="off"/>
                            </div>
                            <label for="phone">Phone Number</label>
                            <div class="mb-4">
                                <input type="contact" name="phone" class="form-control" placeholder="Enter Phone Number"
                                    value="" required autocomplete="off"/>
                            </div>
                            <label for="reason">Reason</label>
                            <div class="mb-4">
                                <input type="text" name="reason" class="form-control" placeholder="Enter Reason"
                                    required autocomplete="off"/>
                            </div>
                            <label for="message">Message</label>
                            <div class="mb-4">
                                <textarea type="text" name="message" class="form-control" placeholder="Enter Message"
                                    required autocomplete="off"></textarea>
                            </div>
                            <button type="submit" class="conbtn">Send Inquiry</button>

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

                </div>
                <div class="col-lg-9 footer-content-section">
                    <div class="row shop-row mt-3">
                        <div class="col-md-4">
                            <ul>
                                <h2>Matrimonial</h2>
                                <a href="userindex.php">
                                    <li>Home</li>
                                </a>
                                <a href="./userabout.php">
                                    <li>About Us</li>
                                </a>
                                <a href="./usercontact.php">
                                    <li>Contact Us</li>
                                </a>

                                <a href="./logout.php">
                                    <li>Logout</li>
                                </a>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <h2>Contact Us</h2>
                                <a href="./usercontact.php">
                                    <li>00-1111-222-3333</li>
                                </a>
                                <a href="./usercontact.php">
                                    <li>00-222-555-7777</li>
                                </a>
                                <a href="./usercontact.php">
                                    <li>000-22221-44221-211</li>
                                </a>
                                <a href="./usercontact.php">
                                    <li>welfare@gmail.com</li>
                                </a>
                                <a href="./usercontact.php">
                                    <li>info@welfarematrimonial.com</li>
                                </a>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <h2>Information</h2>
                                <a href="./userprivacy.php">
                                    <li>Privacy Policy</li>
                                </a>
                                <a href="./userfaqs.php">
                                    <li>FAQ's</li>
                                </a>
                                <a href="./usertermandConditions.php">
                                    <li>Terms & Conditions</li>
                                </a>
                                <a href="./userdisclaimer.php">
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