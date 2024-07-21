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

                <!-- <li class="nav-item dropdown">
                    <a
                      class="nav-link text-white"
                      data-bs-toggle="dropdown"
                      href="index.php"
                      >Profile
                      <i
                        class="fa fa-angle-down"
                        aria-hidden="true"
                        style="color: white"
                      ></i
                    ></a>
                    <div class="dropdown-menu">
                      <a href="./signup.php" class="dropdown-item">Bride</a>
                      <a href="./signup.php" class="dropdown-item">Groom</a>
                      <a href="./rawara-signup-form.php" class="dropdown-item">Rawara</a>
                    </div>
                  </li> -->

                <!-- <li class="nav-item">
                    <a
                      class="nav-link text-white"
                      href="#"
                      tabindex="-1"
                      aria-disabled="true"
                      >Donor</a
                    >
                  </li> -->


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
          <div class="login-image-section13">
            <div class="image-section-content13">
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
          <div class="wrapper bg-white rounded shadow">
            <div class="h2 text-center fw-bold">FAQ's</div><br>
            <div class="d-flex justify-content-center">
            </div>
            <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                    aria-controls="flush-collapseOne">Q: How do I create an account on the marriage website? </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> To create an account, click on the "Sign Up" button, fill in the required information, and
                        follow the on-screen instructions. It's a simple process that takes only a few minutes.
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                    aria-controls="flush-collapseTwo"> Q: Is it free to use the marriage website? </button> </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> Yes, basic membership is free. However, we offer premium subscription plans with additional
                        features for those looking for an enhanced experience.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                    aria-controls="flush-collapseThree"> Q: How can I search for potential matches on the website?
                  </button> </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> Navigate to the "Search" tab, where you can use filters such as age, location, and interests
                        to find compatible matches.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false"
                    aria-controls="flush-collapseFour"> Q: Are there any success stories on the marriage website?
                  </button> </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> Yes, we are proud of the many success stories shared by our users. You can find inspiring
                        testimonials in the "Success Stories" section.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false"
                    aria-controls="flush-collapseFive"> Q: What information should I include in my profile? </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> Make your profile stand out by including details about your hobbies, interests, values, and
                        what you're looking for in a partner. A well-crafted profile increases your chances of finding a
                        compatible match.
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false"
                    aria-controls="flush-collapseSix"> Q: How can I provide feedback or report a bug on the website?
                  </button> </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse border-0"
                  aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                  <div class="accordion-body p-0">
                    <ul class="list-unstyled m-0">
                      <li> Your feedback is valuable to us. Use the "Contact Us" page to report bugs, suggest
                        improvements, or share any concerns you may have. We appreciate your input!
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
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