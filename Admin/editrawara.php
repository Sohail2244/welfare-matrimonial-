<?php
include "../connection.php";
$puname = ''; // Initialize with an empty string
$pemail = ''; // Initialize with an empty string
$pcontact = ''; // Initialize with an empty string
$page = ''; // Initialize with an empty string
$gender = ''; // Initialize with an empty string
$status = ''; // Initialize with an empty string
$country = ''; // Initialize with an empty string
$education = ''; // Initialize with an empty string
$caste = ''; // Initialize with an empty string
$religion = ''; // Initialize with an empty string
$image = '';
if (isset($_GET['updateid'])) {
    $ide = $_GET['updateid'];
    $query = "SELECT * FROM rawara_profile WHERE id = '$ide'";
    $rs = mysqli_query($conn, $query);
    $nums = mysqli_num_rows($rs);

    if ($nums > 0) {
        $row = mysqli_fetch_array($rs);
        $puname = $row['username'];
        $pemail = $row['email'];
        $pcontact = $row['contact'];
        $page = $row['age'];
        $gender = $row['gender'];
        $status = $row['status'];
        $country = $row['country'];
        $education = $row['education'];
        $caste = $row['caste'];
        $religion = $row['religion'];
        $image = $row['profile_image'];
// Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $epuname = $_POST['puname'];
            $epemail = $_POST['pemail'];
            $epcontact = $_POST['pcontact'];
            $epage = $_POST['age'];
            $egender = $_POST['gender'];
            $estatus = $_POST['status'];
            $ecountry = $_POST['country'];
            $eeducation = $_POST['education'];
            $ecaste = $_POST['caste'];
            $ereligion = $_POST['religion'];

            // Prepare SQL query
            $query = "UPDATE `rawara_profile` SET
        `username`='$epuname',
        `email`='$epemail',
        `age`='$epage',
        `gender`='$egender',
        `status`='$estatus',
        `country`='$ecountry',
        `education`='$eeducation',
        `caste`='$ecaste',
        `religion`='$ereligion',
        `contact`='$epcontact'
        WHERE id='$ide'";

            // Execute query
            $rs = mysqli_query($conn, $query);
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "../upload/{$pemail}/";
                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $unique_filename = uniqid() . '.' . $imageFileType; // Generate a unique file name
            
                    // Delete other images in the folder
            $files = glob($target_dir . "*"); // Get all files in the folder
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); // Delete the file
                }
            }
                // Check if the file is an actual image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    // Allow only certain file formats
                    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                        // Create the directory if it doesn't exist
                        if (!file_exists($target_dir)) {
                            mkdir($target_dir, 0777, true);
                        }
            
                        $target_file = $target_dir . $unique_filename;
            
                        // Move the uploaded file to the specified directory
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            // Update the image field in the database with the unique file name
                            $query = "UPDATE `rawara_profile` SET `profile_image`='$unique_filename' WHERE email='$pemail'";
                            $rs = mysqli_query($conn, $query);
                            if (!$rs) {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                    }
                } else {
                    echo "File is not an image.";
                }
            }
            
        
        

            if ($rs) {
                // Redirect to the desired page after successful update
                header("location: rawaradata.php");
                exit;
            } else {
                // Handle update failure
                echo "Error updating record: " . mysqli_error($conn);
            }
        }}}
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
                        <form class="modal-content" method="post" name="weddingProfileForm" enctype="multipart/form-data">


                                    <div class="feedform">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" placeholder="Enter Username" name="puname" value="<?php echo $puname; ?>"
                                            required>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <input class="form-control" type="email" placeholder="Enter email" name="pemail" value="<?php echo $pemail; ?>"
                                            required>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <input class="form-control" id="#" name="age" type="text" required value="<?php echo $page; ?>"
                                            placeholder="Enter Age"></input>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <input class="form-control" id="#" name="pcontact" type="text" required value="<?php echo $pcontact; ?>"
                                            placeholder="Enter Phone Number"></input>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
    <select name="gender" class="form-select">
        <option value="" selected disabled>Select Gender</option>
        <option value="Male" <?php if ($gender === 'Male') {
    echo 'selected';
}
?>>Male</option>
        <option value="Female" <?php if ($gender === 'Female') {
    echo 'selected';
}
?>>Female</option>
    </select>
</div>
<br>

<div class="col-md-12">
    <select name="status" class="form-select">
        <option value="" selected disabled>Select Status</option>
        <option value="Single" <?php if ($status === 'Single') {
    echo 'selected';
}
?>>Single</option>
        <option value="Divorced" <?php if ($status === 'Divorced') {
    echo 'selected';
}
?>>Divorced</option>
        <option value="Separated" <?php if ($status === 'Separated') {
    echo 'selected';
}
?>>Separated</option>
        <option value="Widowed" <?php if ($status === 'Widowed') {
    echo 'selected';
}
?>>Widowed</option>
    </select>
</div>
<br>

<div class="col-md-12">
    <select name="country" id="#" class="form-select" style="width: 100%">
        <option value="" selected disabled>Select Country</option>
        <?php
$countries = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla");
foreach ($countries as $country_option) {
    echo '<option value="' . $country_option . '"';
    if ($country === $country_option) {
        echo 'selected';
    }

    echo '>' . $country_option . '</option>';
}
?>
    </select>
</div>
<br>

<div class="col-md-12">
    <select name="education" id="#" class="form-select" style="width: 100%">
        <option value="" selected disabled>Select Education</option>
        <option value="BS" <?php if ($education === 'BS') {
    echo 'selected';
}
?>>BS</option>
        <option value="MS" <?php if ($education === 'MS') {
    echo 'selected';
}
?>>MS</option>
        <option value="M phil" <?php if ($education === 'M phil') {
    echo 'selected';
}
?>>M phil</option>
        <option value="Inter" <?php if ($education === 'Inter') {
    echo 'selected';
}
?>>Inter</option>
    </select>
</div>
<br>

<div class="col-md-12">
    <select name="caste" id="#" class="form-select" style="width: 100%">
        <option value="" selected disabled>Select Caste</option>
        <option value="Jutt" <?php if ($caste === 'Jutt') {
    echo 'selected';
}
?>>Jutt</option>
        <option value="Mughal" <?php if ($caste === 'Mughal') {
    echo 'selected';
}
?>>Mughal</option>
        <option value="Bhatti" <?php if ($caste === 'Bhatti') {
    echo 'selected';
}
?>>Bhatti</option>
        <option value="Rajpoot" <?php if ($caste === 'Rajpoot') {
    echo 'selected';
}
?>>Rajpoot</option>
    </select>
</div>
<br>

<div class="col-md-12">
    <select name="religion" id="#" class="form-select" style="width: 100%">
        <option value="" selected disabled>Select Religion</option>
        <option value="Islam" <?php if ($religion === 'Islam') {
    echo 'selected';
}
?>>Islam</option>
        <option value="Christian" <?php if ($religion === 'Christian') {
    echo 'selected';
}
?>>Christian</option>
        <option value="Hindu" <?php if ($religion === 'Hindu') {
    echo 'selected';
}
?>>Hindu</option>
        <option value="Sikh" <?php if ($religion === 'Sikh') {
    echo 'selected';
}
?>>Sikh</option>
    </select>
</div>
<br>

<input type="file" name="image" accept="image/*" style="margin-bottom:20px">
                                        <br>


                                        <button class="psubmit" type="submit" name="upd" id="profilesubmit">Edit</button>



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