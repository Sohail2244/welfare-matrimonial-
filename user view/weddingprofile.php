<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: ../weddingprofile.php'); // Redirect to weddingprofile page if not logged in
    exit();
}

include "../connection.php";
$email = mysqli_real_escape_string($conn, $_SESSION['email']);

$puname = ''; // Initialize with an empty string
$pcontact = ''; // Initialize with an empty string
$page = ''; // Initialize with an empty string
$gender = ''; // Initialize with an empty string
$status = ''; // Initialize with an empty string
$country = '';
$city=''; // Initialize with an empty string
$education = ''; // Initialize with an empty string
$caste = ''; // Initialize with an empty string
$religion = ''; // Initialize with an empty string
$image = '';

    $query = "SELECT * FROM weddingprof WHERE email = '$email'";
    $rs = mysqli_query($conn, $query);
    $nums = mysqli_num_rows($rs);

    if ($nums > 0) {
        $row = mysqli_fetch_array($rs);
        $puname = $row['name'];
        $pcontact = $row['phone'];
        $page = $row['age'];
        $gender = $row['gender'];
        $status = $row['status'];
        $country = $row['country'];
        $city = $row['city'];
        $education = $row['education'];
        $caste = $row['caste'];
        $religion = $row['religion'];
        $image = $row['image'];
// Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $epuname = $_POST['puname'];
            $epcontact = $_POST['pcontact'];
            $epage = $_POST['age'];
            $egender = $_POST['gender'];
            $estatus = $_POST['status'];
            $ecountry = $_POST['country'];
            $ecity = $_POST['city'];
            $eeducation = $_POST['education'];
            $ecaste = $_POST['caste'];
            $ereligion = $_POST['religion'];

            // Prepare SQL query
            $query = "UPDATE `weddingprof` SET
        `name`='$epuname',
        `phone`='$epcontact',
        `age`='$epage',
        `gender`='$egender',
        `status`='$estatus',
        `country`='$ecountry',
        `city`='$ecity',
        `education`='$eeducation',
        `caste`='$ecaste',
        `religion`='$ereligion'
        WHERE email='$email'";


    // Execute query
    $rs = mysqli_query($conn, $query);
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../upload/{$email}/";
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
                    $query = "UPDATE `weddingprof` SET `image`='$unique_filename' WHERE email='$email'";
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
                header("location: ./weddingprofile.php");
                exit;
            } else {
                // Handle update failure
                echo "Error updating record: " . mysqli_error($conn);
            }
        }}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    
    <!-- carasoul cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="./css/demo.css" /> -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/weddingprofile.css" />

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
        <div class="container main-weddingprofile-section">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="weddingprofile-image-section">
                        <?php // Fetch wedding profiles from the database in descending order of ID
$query_profiles = mysqli_query($conn, "SELECT * FROM `weddingprof` WHERE `email`='$email'") or die(mysqli_error($conn));
$fetch = mysqli_fetch_array($query_profiles);
echo "<img src='../upload/{$email}/{$fetch['image']}'  alt='...'>
"?>
                </div>
                </div>
                <div class="col-lg-6 p-0 weddingprofile-form-section">
                    <div class="form-section-heading">
                        <h2>Wedding Profile </h2>
                    </div>
                    <div class="weddingprofile-section">
                    <?php
// Fetch wedding profiles from the database in descending order of ID
$query_profiles = mysqli_query($conn, "SELECT * FROM `weddingprof` WHERE `email`='$email'") or die(mysqli_error($conn));
$fetch = mysqli_fetch_array($query_profiles);
?>
                        <p>
                        <table><tr><td>Name: <br> Email: <br> Phone: <br> Age: <br> Gender: <br>
                        Status: <br> Country: <br> City: <br>Education: <br> Caste: <br> Religion: </td>

                            <?php
                            echo"<td><strong> " . $fetch['name'] . "</strong> <br> <strong> " . $fetch['email'] . "</strong> <br><strong> " . $fetch['phone'] . "</strong> <br> <strong> " . $fetch['age'] . "</strong>
                            <br> <strong> " . $fetch['gender'] . "</strong> <br>
                            <strong> " . $fetch['status'] . "</strong> <br> <strong> " . $fetch['country'] . "</strong> <br> 
                            <strong> " . $fetch['city'] . "</strong> <br><strong> " . $fetch['education'] . "</strong> <br>
                            <strong> " . $fetch['caste'] . "</strong> <br> <strong> " . $fetch['religion'] . "</strong> </td> ";
?></tr></table> <br> <br> <br>
                                <button type=" button" class="createprof"
                                onclick="document.getElementById('id01').style.display='block'">
                                <strong>Edit</strong></button>
</p>
<br>

                    </div>
                    <!-- ////////////////////////////////////////////////////// -->


                    <div id="id01" class="modal">

                    <form class="modal-content" method="post" name="weddingProfileForm" enctype="multipart/form-data">


<div class="feedform">
    <div class="col-md-12">
        <input class="form-control" type="text" placeholder="Enter Username" name="puname" value="<?php echo $puname; ?>"
        required>
    </div>
    <br>

    <!-- <div class="col-md-12">
        <input class="form-control" type="email" placeholder="Enter email" name="pemail" value="<?php echo $email; ?>"
        required>
    </div>
    <br> -->

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
<option value="male" <?php if ($gender === 'male') {
echo 'selected';
}
?>>male</option>
<option value="female" <?php if ($gender === 'female') {
echo 'selected';
}
?>>female</option>
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
<option value="separated" <?php if ($status === 'separated') {
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

<option value="Afghanistan" <?php if ($country === 'Afghanistan') {
echo 'selected';
}
?>>Afghanistan</option>
<option value="Aland Islands" <?php if ($country === 'Aland Islands') {
echo 'selected';
}
?>>Aland Islands</option>
<option value="Albania" <?php if ($country === 'Albania') {
echo 'selected';
}
?>>Albania</option>
<option value="Algeria" <?php if ($country === 'Algeria') {
echo 'selected';
}
?>>Algeria</option>
<option value="American Samoa" <?php if ($country === 'American Samoa') {
echo 'selected';
}
?>>American Samoa</option>
<option value="Andorra" <?php if ($country === 'Andorra') {
echo 'selected';
}
?>>Andorra</option>
<option value="Angola" <?php if ($country === 'Angola') {
echo 'selected';
}
?>>Angola</option>
<option value="Anguilla" <?php if ($country === 'Anguilla') {
echo 'selected';
}
?>>Anguilla</option>

</select>
</div>
<br>
<div class="col-md-12">
<select name="city" id="#" class="form-select" style="width: 100%">
<option value="" selected disabled>Select City</option>
<option value="Lahore" <?php if ($city === 'Lahore') {
echo 'selected';
}
?>>Lahore</option>
<option value="Karachi" <?php if ($city === 'Karachi') {
echo 'selected';
}
?>>Karachi</option>
<option value="Islamabad" <?php if ($city === 'Islamabad') {
echo 'selected';
}
?>>Islamabad</option>
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
<option value="Mphil" <?php if ($education === 'Mphil') {
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
<input type="file" name="image" accept="image/*">

    <br>


    <button class="psubmit" type="submit" name="upd" id="profilesubmit">Edit</button>

</div>
<button type="button" class="psubmit" onclick="document.getElementById('id01').style.display='none'">
    Close
</button>
</form>

</div>




<!-- /////////////////////////////////////////////////////// -->

                </div>
            </div>
        </div>
    </div>
    <!-- main section end-->

<img src="" alt="">

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
