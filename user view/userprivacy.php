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
    <link rel="stylesheet" href="../css/about.css" />

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
                    <div class="login-image-section1">
                        <div class="image-section-content">
                            <h2>Welfare Matrimonial</h2>
                            <p>Find Your Right one here</p>
                            <button onclick="window.location='userabout.php'">
                                About US
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0 login-form-section">
                    <div class="form-section-heading">
                        <h2>Welcome to Welfare Matrimonial</h2>
                    </div>
                    <div class="login-section">
                        <h4>Privacy Policies</h4>
                        <p>This Privacy Policy describes how Welfare Matrimonial ("we," "us," or "our") collects, uses,
                            and shares your personal information when you use our website and services. By accessing or
                            using Welfare Matrimonial, you agree to the terms outlined in this Privacy Policy.</p>
                        <p> When you register, you willingly provide details such as your name, email address, and date
                            of birth, while our optional profile features allow you to share preferences, interests, and
                            photographs. Communication data, including messages and chats, is collected to enhance your
                            experience on our platform.</p>
                        <p> We utilize this information for personalized matchmaking, recommending potential matches
                            based on your profile and preferences. To facilitate connections, certain details may be
                            shared with other users expressing mutual interest. Additionally, for service improvement,
                            we may engage third-party providers while adhering to legal requirements. Your data security
                            is our concern, and we implement measures to protect against unauthorized access. Users
                            maintain control over profile visibility and communication preferences, ensuring a tailored
                            and secure experience.</p>
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