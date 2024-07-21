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
    <link rel="stylesheet" href="./css/style.css" />
    <!-- carasoul cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

        <title>Matrimonial | Home Page</title>    


</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light navbar-bg bg-dark p-0">
                    <div class="container-fluid navabar-logo">
                        <a class="navbar-brand text-white" href="index.php">
                            <img src="./images/logo2-removebg-preview.png" alt="" width="90" height="90"
                                class="d-inline-block" />
                        </a>
                        <a class="navbar-brand text-white" href="index.php"><span>WELFARE</span> MATRIMONIAL</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
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
                                    <a class="nav-link text-white" href="login.php" tabindex="-1"
                                        aria-disabled="true">Login
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

    <!-- slider section start -->
    <div class="container-fluid">
        <!-- <div class="container">  -->
        <div class="row">
            <div class="col-md-12 p-0">
                <!-- slider -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/sli.jpg" class="d-block w-100 img-fluid" alt="..." />
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Welcome Welfare Matrimonial</h1>
                                <h5>Find Your Dream</h5>
                                <p>
                                    Love Online Totally Free Matrimonial
                                    Platform
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/wedding-event-banner-1024x512.jpg" class="d-block w-100 img-fluid"
                                alt="..." />
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Welcome Welfare Matrimonial</h1>
                                <h5>Find Your Dream Soulmate</h5>
                                <p>
                                    Love Online Totally Free Matrimonial
                                    Platform
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/slid.jpg" class="d-block w-100 img-fluid" alt="..." />
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Welcome Welfare Matrimonial</h1>
                                <h5>Find Your Perfect Match</h5>
                                <p>
                                    Love Online Totally Free Matrimonial
                                    Platform
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- slider section end -->

    <!-- featured profile section -->

    <div class="conatiner-fluid">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 d-flex justify-content-center align-items-center create-profile-section">
                    <h1>Find Spouse For Your Life With Us!</h1>
                    <!-- <h3>Find Spouse For Your Life With Us!</h3> -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!--  -->
                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card-wrapper container-sm d-flex justify-content-around">
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a3.jpeg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Dania Javed
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>22 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Lahore</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal6" class="btn">
                                                    <!-- <i
                                                            class="fa-solid fa-image"
                                                        ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a8.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Ali Abbas
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>25 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Gujranwala</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal5" class="btn">
                                                    <!-- <i
                                                          class="fa-solid fa-image"
                                                      ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a6.jpeg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Hira Zafar
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>24 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Lahore</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal4" class="btn">
                                                    <!-- <i
                                                        class="fa-solid fa-image"
                                                    ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-wrapper container-sm d-flex justify-content-around">
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a2.jpeg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Arfa Mushtaq
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>23 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Farooqabad</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal3" class="btn">
                                                    <!-- <i
                                                      class="fa-solid fa-image"
                                                  ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a4.jpg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Danish Ali
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>24 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Multan</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal2" class="btn">
                                                    <!-- <i
                                                    class="fa-solid fa-image"
                                                ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 18rem">
                                        <img src="./images/a5.jpeg" class="card-img-top" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Mahnoor Waqar
                                            </h5>
                                            <table class="">
                                                <tbody>
                                                    <tr>
                                                        <td>Age</td>
                                                        <td>23 year</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>Single</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>Lahore</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="profile_btn_div text-center mt-3">
                                                <a href="javascript:void(0)" onclick="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1" class="btn">
                                                    <!-- <i
                                                  class="fa-solid fa-image"
                                              ></i> -->
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured profile section ends  -->
    <!-- create profile section  start-->
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 create-profile-section">
                    <h1>FIND MATCH EASILY, SPEND LIFE HAPPILY</h1>
                    <h3>Find Spouse For Your Life With Us!</h3>
                    <p>
                        We Are Corporate Matrimonial And Events Management
                        Service Provider, We Help You To Find Best Rishta
                        And Plan Your Day The Way You Want!
                    </p>
                </div>
            </div>

            <!-- <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3 card-section">
            <div class="card-content">
              <div class="card-img hover01">
                <a href="./signup.php">
                  <img src="./images/bride-icon.png" alt="" />
                </a>
              </div>
              <div class="card-data">
                <a href="./signup.php">
                  <h3>Bride</h3>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-3 card-section-2">
            <div class="card-content-2">
              <div class="card-img-2 hover01">
                <a href="./signup.php">
                  <img src="./images/user male.jpg" alt="" />
                </a>
              </div>
              <div class="card-data-2">
                <a href="./signup.php">
                  <h3>Groom</h3>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div> -->
        </div>
    </div>
    <!-- create profile section  end-->

    <!-- -------------why choose us section start------------------------------------------>

    <div class="container-fluid choose-us-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="choose-us-section hover1">
                        <div class="choose-us-section-card">
                            <h3>International Pakistani matrimonial</h3>
                            <p>
                                Welfare Matrimonial is a remarkable creation
                                of innovative “Logic Creator” team and
                                proudly we stood as the top Pakistani
                                matrimonial site. We aim at providing you
                                the most, reliable, secured and trustable
                                interpretation of online shadi experience.
                                We undertook the responsibility of helping
                                you in finding the perfect match.
                            </p>
                            <a href="./choose-us-detail.php">Learn More
                                <i class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
                        </div>

                        <!-- <button onclick="window.location='choose-us-detail.php'">
                Learn More
              </button> -->
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="choose-us-section">
                        <h3>International Pakistani matrimonial</h3>
                        <p>
                            Welfare Matrimonial is a remarkable creation of
                            innovative “Logic Creator” team and proudly we
                            stood as the top Pakistani matrimonial site. We
                            aim at providing you the most, reliable, secured
                            and trustable interpretation of online shadi
                            experience. We undertook the responsibility of
                            helping you in finding the perfect match.
                        </p>
                        <a href="./choose-us-detail.php">Learn More
                            <i class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="choose-us-section">
                        <h3>International Pakistani matrimonial</h3>
                        <p>
                            Welfare Matrimonial is a remarkable creation of
                            innovative “Logic Creator” team and proudly we
                            stood as the top Pakistani matrimonial site. We
                            aim at providing you the most, reliable, secured
                            and trustable interpretation of online shadi
                            experience. We undertook the responsibility of
                            helping you in finding the perfect match.
                        </p>
                        <a href="./choose-us-detail.php">Learn More
                            <i class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------why choose us section end------------------------------------>



    <!-- TESTIMONIAL SECTION STARTS -->
    <div class="container-fluid pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials">
                        <h3 class="pb-3">Matrimonial's Happy Clients</h3>
                        <div class="test-body">
                            <div class="item">
                                <img src="./images/21.jpg" />
                                <div class="name">Ahmed and Fatima</div>
                                <!-- <small class="desig">Photographer</small> -->
                                <div class="share">
                                    <i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i
                                        class="fa fa-instagram"></i>
                                </div>
                                <p>
                                    I have worked with Repair & Fix for
                                    several years. They re-built a computer
                                    for me and later upgraded it and now it
                                    feels just like a new one. The value,
                                    quality, and follow-up are outstanding.
                                </p>
                            </div>
                            <div class="item">
                                <img src="./images/26.jpg" />
                                <div class="name">Naseem and Tyiba</div>
                                <!-- <small class="desig">Photographer</small> -->
                                <div class="share">
                                    <i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i
                                        class="fa fa-instagram"></i>
                                </div>
                                <p>
                                    I have worked with Repair & Fix for
                                    several years. They re-built a computer
                                    for me and later upgraded it and now it
                                    feels just like a new one. The value,
                                    quality, and follow-up are outstanding.
                                </p>
                            </div>
                            <div class="item">
                                <img src="./images/37.jpg" />
                                <div class="name">Haris And Fareeha</div>
                                <!-- <small class="desig">Photographer</small> -->
                                <div class="share">
                                    <i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i
                                        class="fa fa-instagram"></i>
                                </div>
                                <p>
                                    I have worked with Repair & Fix for
                                    several years. They re-built a computer
                                    for me and later upgraded it and now it
                                    feels just like a new one. The value,
                                    quality, and follow-up are outstanding.
                                </p>
                            </div>
                        </div>
                        <button onclick="window.location='testimonial.php'">
                            View All Testimonials
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL SECTION ENDS -->
    <!-- footer -->



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

<!-- carasoul cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $("#news-slider").owlCarousel({
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [980, 2],
            itemsMobile: [600, 1],
            navigation: true,
            navigationText: ["", ""],
            pagination: true,
            autoPlay: true,
        });
    });
</script>


<!-- model -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a5.jpeg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Mahnoor Waqar</h2>
                        <h4>Age: 23 Year</h4>
                        <h4>Caste: Rajpoot</h4>
                        <h4>Education: MS</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Lahore</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>

                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- model -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a4.jpg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Danish Ali</h2>
                        <h4>Age: 24 Year</h4>
                        <h4>Caste: Mughal</h4>
                        <h4>Education: BS</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Multan</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>
                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!-- model -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a2.jpeg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Arfa Mushtaq</h2>
                        <h4>Age: 23 Year</h4>
                        <h4>Caste: Jutt</h4>
                        <h4>Education: BS</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Farooqabad</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>

                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!-- model -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a6.jpeg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Hira Zafar</h2>
                        <h4>Age: 24 Year</h4>
                        <h4>Caste: Bhatti</h4>
                        <h4>Education: M phil</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Lahore</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>

                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!-- model -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a8.jpg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Ali Abbas</h2>
                        <h4>Age: 25 Year</h4>
                        <h4>Caste: Rajpoot</h4>
                        <h4>Education: M phil</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Gujranwala</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>

                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


<!-- model -->
<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Profile Detail
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <div class="row model-body-content">
                    <div class="col-4">
                        <img src="./images/a3.jpeg" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2>Dania Javed</h2>
                        <h4>Age: 22 Year</h4>
                        <h4>Caste: Mughal</h4>
                        <h4>Education: MS</h4>
                        <h4>Status: Single</h4>
                        <h4>City: Lahore</h4>
                        <h4>Email: *****@gmail.com</h4>
                        <h4>Phone: 03** *******</h4>


                        <div class="d-flex mode-body-main-button">
                            <button class="me-1" href="" onclick="profilealert()">I'm Interested</button>
                            <script>
                                function profilealert() {
                                    alert("You Need To First Signup/Login !");
                                }
                            </script>

                            <a href="./rawara-basic-services.php">
                                <button class="ms-1" href="">
                                    Visit Profile With Rawara
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>