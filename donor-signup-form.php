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
  <link rel="stylesheet" href="./css/donor-signup.css" />

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

            <form class="row g-4" action="#" method="" id="">
              <input type="hidden" name="_token" value="" />
              <div class="col-md-6">
                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="" />
              </div>
              <div class="col-md-6">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="" />
              </div>

              <div class="col-md-6">
                <input type="text" name="email" class="form-control" placeholder="Email" value="" />
              </div>
              <div class="col-md-6">
                <input type="password" name="password" class="form-control" value="" placeholder="Password" />
              </div>

              <div class="col-md-6">
                <input type="confirmpassword" name="confirmpassword" class="form-control" value=""
                  placeholder="Confirm Password" />
              </div>

              <div class="col-md-6">
                <select name="gender" class="form-select">
                  <option selected>Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="col-md-6">
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value=""
                  placeholder="Date of Birth" max="2005-08-13" />
              </div>

              <div class="col-md-6">
                <select name="" class="form-select">
                  <option value="">Maritial Status</option>
                  <option value="Self">Single</option>
                  <option value="Son">Divorced</option>
                  <option value="Son">separated</option>
                  <option value="Son">Widowed</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="country_id" id="#" class="form-select" style="width: 100%">
                  <option selected>Country</option>
                  <option value="1">Afghanistan</option>
                  <option value="2">Aland Islands</option>
                  <option value="3">Albania</option>
                  <option value="4">Algeria</option>
                  <option value="5">American Samoa</option>
                  <option value="6">Andorra</option>
                  <option value="7">Angola</option>
                  <option value="8">Anguilla</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="state_id" id="#" class="form-select" style="width: 100%">
                  <option value="">State</option>
                  <option value="">punjab</option>
                  <option value="">Sindh</option>
                </select>
              </div>
              <div class="col-md-6">
                <select class="form-select" style="width: 100%">
                  <option selected>City</option>
                  <option value="2">Lahore</option>
                  <option value="3">Karachi</option>
                  <option value="4">Islamabad</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="country_id" id="#" class="form-select" style="width: 100%">
                  <option value="">Caste</option>
                  <option value="1">Jutt</option>
                  <option value="2">Mughal</option>
                  <option value="3">Bhatti</option>
                  <option value="4">Rajpoot</option>
                </select>
              </div>

              <div class="col-md-6">
                <select name="" id="#" class="form-select" style="width: 100%">
                  <option selected>Religion</option>
                  <option value="1">Islam</option>
                  <option value="2">Cristian</option>
                  <option value="3">Hindu</option>
                  <option value="4">Sikh</option>
                </select>
              </div>

              <div class="col-md-6">
                <select name="country_id" id="#" class="form-select" style="width: 100%">
                  <option selected>Education</option>
                  <option value="1">BS</option>
                  <option value="2">MS</option>
                  <option value="3">M phil</option>
                  <option value="4">Inter</option>
                </select>
              </div>
              <div class="col-md-6">
                <input id="phone" name="phone" class="no-arrow form-control" value="" type="number"
                  placeholder="Mobile" />
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="registerCheck" />
                  <label class="form-check-label" for="registerCheck">
                    I agree to the Privacy Policy and T&amp;C. (
                    <a href="./termandConditions.php" target="_blank">Terms &amp; conditions</a>
                    ,
                    <a href="./privacy.php" target="_blank">Privacy Policy</a>)
                  </label>
                </div>
              </div>
              <div class="col-12">
                <input type="hidden" name="utm_source" value="" />
                <input type="hidden" name="utm_campaign" value="" />
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