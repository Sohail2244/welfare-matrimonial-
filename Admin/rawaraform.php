<?php
session_start();

include "../connection.php";

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
    $puname = mysqli_real_escape_string($conn, $_POST['puname']);
    $pemail = mysqli_real_escape_string($conn, $_POST['pemail']);

    // Check if the user profile already exists
    $check_profile_query = mysqli_query($conn, "SELECT * FROM `weddingprof` WHERE `name`='$puname' AND `email`='$pemail'") or die(mysqli_error($conn));
    if (mysqli_num_rows($check_profile_query) > 0) {
        // Profile already exists, show error message using JavaScript alert
        echo "<script>alert('You already have a profile with the name: " . htmlspecialchars($puname) . " and email: " . htmlspecialchars($pemail) . "');</script>";
    } else {
        // Profile doesn't exist, continue with processing
        $puname = mysqli_real_escape_string($conn, $_POST['puname']);
        $pemail = mysqli_real_escape_string($conn, $_POST['pemail']);
        $pcontact = mysqli_real_escape_string($conn, $_POST['pcontact']);
        $page = mysqli_real_escape_string($conn, $_POST['age']); // Fixed variable name
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $education = mysqli_real_escape_string($conn, $_POST['education']);
        $caste = mysqli_real_escape_string($conn, $_POST['caste']);
        $religion = mysqli_real_escape_string($conn, $_POST['religion']);

        // Validate email format
        if (!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
            $em = "Invalid email format";
            echo "<script>alert('$em');</script>";
            // You might want to handle this error in a way that makes sense for your application
        } else {
            // Email is valid, continue with processing

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
                    $user_folder = '../upload/' . $pemail . '/';
                    if (!file_exists($user_folder)) {
                        mkdir($user_folder, 0755, true);
                    }

                    $new_img_name = uniqid('', true) . '.' . $img_ex_to_lc; // Removed $email from uniqid
                    $img_upload_path = $user_folder . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert data into the database
                    $insert_sql = "INSERT INTO rawara_profile (username, email, age, gender, status, country, education, caste, religion, profile_image, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt_insert = $conn->prepare($insert_sql);

// Check if the prepare statement was successful
                    if ($stmt_insert) {
                        $stmt_insert->bind_param("sssssssssss", $puname, $pemail, $page, $gender, $status, $country, $education, $caste, $religion, $new_img_name, $pcontact);

                        $stmt_insert->execute();

                        // Check if the query was successful
                        if ($stmt_insert->affected_rows > 0) {
                            $_SESSION['success'] = "Thank you for registering! You can now log in.";
                            header("Location: rawaraform.php?success=Rawara Profile Registered Successfully.");
                            exit();
                        } else {
                            $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
                        }
                    } else {
                        // Handle prepare error
                        echo "Error preparing the SQL statement: " . $conn->error;
                    }}}

        }
    }
    // ...
    $query_check_data = mysqli_query($conn, "SELECT * FROM `rawara_profile` WHERE `email`='$pemail'");
    if (mysqli_num_rows($query_check_data) == 0) {
        // No data found, delete the image file folder
        $user_folder = '../upload/' . $pemail . '/';
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
// Check if there is an error message in the session
    if (isset($_SESSION['error'])) {
        $errorMessage = $_SESSION['error'];
        unset($_SESSION['error']);
    } else {
        $errorMessage = "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welfare Matrimonial</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only ">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar  navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text" style="color: white;">Welfare <br> Matrimonial</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0" style="color: white;">Bint-e-Adam</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Rawara</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="./rawaraform.php" class="dropdown-item">Add Rawara Profile</a>
                            <a href="./rawaradata.php" class="dropdown-item">Rawara Data</a>
                        </div>
                    </div>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="404.php" class="dropdown-item">404 Error</a>
                            <a href="blank.php" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h3 class="text" style="color: white;">Welfare <br> Matrimonial</h3>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form> -->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">


                            <a href="../user view/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid">
                <div class="container main-login-section">
                  <div class="row rprow">
                    <div class="col-lg-6 p-0 login-form-section">
                      <div class="form-section-heading">
                        <h2> Welfare Matrimonial</h2>
                      </div>
                      <div class="login-section register">
                        <h4>Create Rawara Profile</h4>
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
                                <form class="modal-content" method="post" name="weddingProfileForm"
                                    enctype="multipart/form-data">

                                    <div class="feedform">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Enter Username" name="puname"
                                            required>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <input class="form-control" type="email" placeholder="Enter email" name="pemail"
                                            required>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <input class="form-control" id="#" name="age" type="text" required
                                            placeholder="Enter Age"></input>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <input class="form-control" id="#" name="pcontact" type="text" required
                                            placeholder="Enter Phone Number"></input>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <select name="gender" class="form-select">
                                                <option value="" selected disabled>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <br>


                                        <div class="col-md-12">
                                            <select name="country" id="#" class="form-select" style="width: 100%">
                                                <option value="" selected disabled>Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <select name="education" id="#" class="form-select" style="width: 100%">
                                                <option value="" selected disabled>Education</option>
                                                <option value="BS">BS</option>
                                                <option value="MS">MS</option>
                                                <option value="M phil">M phil</option>
                                                <option value="Inter">Inter</option>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <select name="caste" id="#" class="form-select" style="width: 100%">
                                                <option value="" selected disabled>Caste</option>
                                                <option value="Jutt">Jutt</option>
                                                <option value="Mughal">Mughal</option>
                                                <option value="Bhatti">Bhatti</option>
                                                <option value="Rajpoot">Rajpoot</option>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <select name="religion" id="#" class="form-select" style="width: 100%">
                                                <option value="" selected disabled>Religion</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Cristian">Cristian</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Sikh">Sikh</option>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col-lg-12">
                                            <br>
                                            <input type="file" class="form-control" name="wp" id="wp" required
                                                onchange="wedingImage()">
                                        </div>

                                        <br>


                                        <button class="psubmit" type="submit" name="profilesubmit" id="profilesubmit">Submit</button>



                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Table End -->


                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">Welfare Matrimonial</a>, All Right Reserved.
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                <a class="border-bottom" href="#">Info@welfarematrimonial.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>