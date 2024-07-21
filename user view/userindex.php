<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php'); // Redirect to login page if not logged in
    exit();
}

include "../connection.php";
$email = mysqli_real_escape_string($conn, $_SESSION['email']);

// Fetch user information
$query = mysqli_query($conn, "SELECT * FROM `signup` WHERE `email`='$email'") or die(mysqli_error($conn));
$fetch = mysqli_fetch_array($query);

// If email not found in signup table, fetch from rawarasignup table

if (!$fetch) {
    $query_rawara = mysqli_query($conn, "SELECT * FROM `rdsignup` WHERE `email`='$email'") or die(mysqli_error($conn));
    $fetch = mysqli_fetch_array($query_rawara);
}

// Handle adding image to the user's profile on file input change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            // Create a folder named with the user's email (if not exist)
            $user_folder = '../upload/' . $email . '/';
            if (!file_exists($user_folder)) {
                mkdir($user_folder, 0755, true);
            }

            $new_img_name = uniqid('', true) . '.' . $img_ex_to_lc; // Removed $email from uniqid
            $img_upload_path = $user_folder . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Reload the page or redirect as needed
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        } else {
            $em = "You can't upload files of this type";
            echo "<script>alert('$em');</script>";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profilesubmit'])) {
    // Fetch form data

    // Check if the user profile already exists
    $check_profile_query = mysqli_query($conn, "SELECT * FROM `weddingprof` WHERE `email`='$email'") or die(mysqli_error($conn));
    if (mysqli_num_rows($check_profile_query) > 0) {
        // Profile already exists, show error message using JavaScript alert
        echo "<script>alert('You already have create a Wedding profile with the email: " . htmlspecialchars($email) . "');</script>";
    } else {
        // Profile doesn't exist, continue with processing
        $puname = mysqli_real_escape_string($conn, $_POST['puname']);
        $pcontact = mysqli_real_escape_string($conn, $_POST['pcontact']);
        $page = mysqli_real_escape_string($conn, $_POST['age']); // Fixed variable name
        $pcity = mysqli_real_escape_string($conn, $_POST['city']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $education = mysqli_real_escape_string($conn, $_POST['education']);
        $caste = mysqli_real_escape_string($conn, $_POST['caste']);
        $religion = mysqli_real_escape_string($conn, $_POST['religion']);

        // Upload image
        $img_name = $_FILES['wp']['name'];
        $tmp_name = $_FILES['wp']['tmp_name'];
        $error = $_FILES['wp']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_to_lc, $allowed_exs)) {
                // Create a folder named with the user's email (if not exist)
                $user_folder = '../upload/' . $email . '/';
                if (!file_exists($user_folder)) {
                    mkdir($user_folder, 0755, true);
                }

                $new_img_name = uniqid('', true) . '.' . $img_ex_to_lc; // Removed $email from uniqid
                $img_upload_path = $user_folder . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert data into the database
                $insert_sql = "INSERT INTO weddingprof (name, email, phone, age, gender, status, country, city, education, caste, religion, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt_insert = $conn->prepare($insert_sql);

                // Check if the prepare statement was successful
                if ($stmt_insert) {
                    $stmt_insert->bind_param("ssssssssssss", $puname, $email, $pcontact, $page, $gender, $status, $country, $pcity, $education, $caste, $religion, $new_img_name);
                    $stmt_insert->execute();

                    // Redirect or reload the page as needed
                    header("Location: {$_SERVER['PHP_SELF']}");
                    exit;
                } else {
                    // Print an error myself and/or log the error
                    echo "Error preparing the SQL statement: " . $conn->error;
                }
            } else {
                $em = "Error uploading image";
                echo "<script>alert('$em');</script>";
            }
        }
    }
}
// ...
$query_check_data = mysqli_query($conn, "SELECT * FROM `weddingprof` WHERE `email`='$email'");
if (mysqli_num_rows($query_check_data) == 0) {
    // No data found, delete the image file folder
    $user_folder = '../upload/' . $email . '/';
    if (file_exists($user_folder)) {
        // Check if the folder exists before attempting to delete it
        $files = glob($user_folder . '*'); // Get all file names
        foreach ($files as $file) { // Iterate files
            if (is_file($file)) {
                unlink($file); // Delete each file
            }
        }
        // After deleting files, remove the folder
        rmdir($user_folder);
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
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="./css/style.css" />

    <!-- carasoul cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    <title>Matrimonial | Home Page</title>



</head>
<Style>
    .btn{
    background-color: #9b2c47;
    color: white;
}
.tex{
    margin-left:20px;
    margin-top:20px;
    color:#9b2c47;
}

</Style>
<body>

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

    <!-- Hero Start -->
    <div class="container-fluid1  py-6 my-6 mt-0">
        <div class="backcolor">
        </div>
        <div class="container">

            <div class="row g-5 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">
                        <?php
echo "<a class='tex'>  Welcome --&nbsp;&nbsp; <strong> " . $fetch['first_name'] . "&nbsp;" . $fetch['last_name'] . "</strong></a>";
?></small>
                    <h1 class="display-2 mb-4 animated bounceInDown"> Welfare Matrimonial</h1>
                    <p class="dinlinep"><strong>Welcome</strong> to your personalized User Dashboard at <strong>Welfare
                            Matrimonial</strong>, where the journey to your
                        perfect marriage begins. Explore a world of possibilities, manage your profile with ease, and
                        discover potential life partners tailored to your preferences. Your happiness is our priority,
                        and your journey to a blissful matrimony starts right here on your user dashboard. </p>
                    <a href="./usercontact.php"
                        class="btn btn-danger border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Contact
                        Us If You Face Any Issue</a>
                </div>
                <div class="dinlineimage col-lg-5 col-md-12">
                    <img src="./images/7-removebg-preview.png" class="img-fluid rounded animated zoomIn" alt="">
                    <!-- <img src="./images/7-removebg.png" class="img-fluid rounded animated zoomIn" alt=""> -->

                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

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
                <div class="col-12 ">
                    <div class="searchnav" id="myTopnav">
                        <form class="form-search" method="get" id="s" action="">
                            <div class="input-append">
                                <input type="text" class="input-medium search-query"  placeholder="Search" autocomplete="off" id="searchInput"
                                    value="">
                            </div>
                        </form>
                        <div class="col-6" style="margin-left: 200px;"> <button type=" button" class="createprof"
                                onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                                <strong>Create Your Wedding Profile</strong></button>
                        </div>
                    </div>

                </div>
            </div>


            <div id="id01" class="modal">

                <form class="modal-content" method="post" name="weddingProfileForm" enctype="multipart/form-data">

                    <div class="feedform">

                        <label for="uname"><b>Enter Name</b></label>
                        <input class="profile" type="text" placeholder="Enter Your Full Name" name="puname" required autocomplete="false">

                        <label for="uname"><b>Enter Contact No</b></label>
                        <input class="profile" type="text" placeholder="Enter Phone" name="pcontact" required>

                        <label for="subject"><b>Age</b></label>
                        <input class="profile" id="age" name="age" type="text" required placeholder="Enter Age">
                        </input>

                        <label for="uname"><b>Gender</b></label>
                        <div class="col-md-12">
                            <select name="gender" class="form-select">
                                <option value="" selected disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <label for="uname"><b>Status</b></label>
                        <div class="col-md-12">
                            <select name="status" class="form-select">
                                <option value="" selected disabled>Maritial Status</option>
                                <option value="Single">Single</option>
                                <option value="Divorced">Divorced</option>
                                <option value="separated">separated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>

                        <label for="uname"><b>Country</b></label>
                        <div class="col-md-12">
                            <select name="country" id="#" class="form-select" style="width: 100%">
                              <option value="" selected disabled>Country</option>
                              <option value="Afghanistan">Afghanistan</option>
                              <option value="Aland Islands">Aland Islands</option>
                              <option value="Albania3">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Andorra">Andorra</option>
                              <option value="Angola">Angola</option>
                              <option value="Anguilla">Anguilla</option>
                            </select>
                          </div>

                        <label for="uname"><b>City</b></label>
                        <div class="col-md-12">
                        <select name="city" id="city" class="form-select" style="width: 100%">
                                <option value="" selected disabled>City</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Karachi">Karachi</option>
                                <option value="Islamabad">Islamabad</option>
                        </select>
                        </div>

                          <label for="uname"><b>Education</b></label>
                          <div class="col-md-12">
                            <select name="education" id="#" class="form-select" style="width: 100%">
                              <option value="" selected disabled>Education</option>
                              <option value="BS">BS</option>
                              <option value="MS">MS</option>
                              <option value="Mphil">M phil</option>
                              <option value="Inter">Inter</option>
                            </select>
                          </div>

                          <label for="uname"><b>Caste</b></label>
                          <div class="col-md-12">
                            <select name="caste" id="#" class="form-select" style="width: 100%">
                              <option value="" selected disabled>Caste</option>
                              <option value="Jutt">Jutt</option>
                              <option value="Mughal">Mughal</option>
                              <option value="Bhatti">Bhatti</option>
                              <option value="Rajpoot">Rajpoot</option>
                            </select>
                          </div>

                          <label for="uname"><b>Religion</b></label>
                          <div class="col-md-12">
                            <select name="religion" id="#" class="form-select" style="width: 100%">
                              <option value="" selected disabled>Religion</option>
                              <option value="Islam">Islam</option>
                              <option value="Cristian">Cristian</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Sikh">Sikh</option>
                            </select>
                          </div>

                        <div class="col-lg-12">
                            <br>
                            <label for="wp"><strong>Please provide your perfect image:</strong></label>
                            <input type="file" class="form-control" name="wp" id="wp" onchange="wedingImage()" required>
                        </div>

                        <br>


                        <button class="psubmit" type="profilesubmit" name="profilesubmit"
                            id="profilesubmit" onclick="return confirm('Are you sure you want to publish this profile, If yes then you can not make any changes. If you want to change something contact Admin!');">Submit</button>

                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>

                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById('imagefile').addEventListener('change', function () {
                            document.forms['weddingProfileForm'].submit();
                        });

                        document.getElementById('profilesubmit').addEventListener('click', function (e) {
                            e.preventDefault(); // Prevent the default form submission
                            document.forms['weddingProfileForm'].submit();
                        });
                    });
                </script>
            </div>



       <div class="row  cardsdata" >
                    <!--  -->


<?php
// Fetch wedding profiles from the database in descending order of ID
$query_profiles = mysqli_query($conn, "SELECT * FROM `weddingprof` ORDER BY ID DESC") or die(mysqli_error($conn));

// Loop through the results and display each profile as a Bootstrap card
while ($profile = mysqli_fetch_array($query_profiles)) {
    $profileId = $profile['ID']; // Get the profile ID
    ?>
<div class="col-lg-4 col-md-4 mb-4" style="display: inline-flex;">
    <div class="card">
        <!-- Card Image -->
        <img src="../upload/<?php echo $profile['email']; ?>/<?php echo $profile['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <!-- Card Title -->
            <h5 class="card-title"><?php echo $profile['name']; ?></h5>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $profile['age']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo $profile['status']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $profile['city']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <!-- Button to trigger modal -->
                <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $profileId; ?>">
                    View Profile
                </button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="exampleModal<?php echo $profileId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <img src="../upload/<?php echo $profile['email']; ?>/<?php echo $profile['image']; ?>" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-8 model-body-text">
                        <h2><?php echo $profile['name']; ?></h2>
                        <h4>Age: <?php echo $profile['age']; ?></h4>
                        <h4>Caste: <?php echo $profile['caste']; ?></h4>
                        <h4>Education: <?php echo $profile['education']; ?></h4>
                        <h4>Status: <?php echo $profile['status']; ?></h4>
                        <h4>City: <?php echo $profile['city']; ?></h4>
                        <h4>Email:<?php echo $profile['email']; ?></h4>
                        <h4>Phone: <?php echo $profile['phone']; ?></h4>
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
</div>    <?php
}
?>
            <?php
// }
?>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function() {
        var searchText = searchInput.value.toLowerCase();
        console.log('Search Text:', searchText);
        var profileItems = document.querySelectorAll('.cardsdata .card');

        profileItems.forEach(function(item) {
            var name = item.querySelector('.card-body h5').textContent.toLowerCase();
            console.log('Name:', name);
            if (name.includes(searchText)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

    </script>


                </div>
            </div>
        </div>
    </div>
    <!-- featured profile section ends  -->

    </div>



    <footer class="footer1">
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
                        <i class="fa fa-twitter"style="color: #ffffff" ></i>
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
