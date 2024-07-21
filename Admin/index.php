
<?php
// Start session
session_start();
include "../connection.php";

// Handle adding task to the to-do list
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["todotask"];
    date_default_timezone_set('Asia/Karachi');
    $currentTimestamp = date('Y-m-d H:i:s');
    $insert_sql = "INSERT INTO tasktodo (task, Time) VALUES ('$name', '$currentTimestamp')";
    $query_run = mysqli_query($conn, $insert_sql);

    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
$sql = "SELECT COUNT(*) AS total_users FROM signup";
$result = $conn->query($sql);

$sql = "SELECT COUNT(*) AS total_feed FROM feedback";
$feed = $conn->query($sql);

$sql = "SELECT COUNT(*) AS total_Uprofile FROM weddingprof";
$Uprofile = $conn->query($sql);

$sql = "SELECT COUNT(*) AS total_rawara FROM rawara_profile";
$rawaraprofile = $conn->query($sql);

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
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <hr class="dropdown-divider">

                            <?php

// Handle message click
if (isset($_GET['id'])) {
    // Get profile ID from the URL
    $profileId = $_GET['id'];

    // Store the clicked message ID in session
    $_SESSION['clicked_messages'][] = $profileId;

    // Redirect to the same page to remove the query parameter from the URL
    header("Location: index.php");
    exit;
}

// Fetch message profiles from the database in descending order of ID
$query_profiles = mysqli_query($conn, "SELECT * FROM `contactus` ORDER BY id DESC LIMIT 5") or die(mysqli_error($conn));
if (!$query_profiles) {
    die("Error fetching profiles: " . mysqli_error($conn));
}
// Array to store clicked message IDs
$clickedMessages = isset($_SESSION['clicked_messages']) ? $_SESSION['clicked_messages'] : [];
?>

<!-- Loop through the results and display each profile as a Bootstrap card -->
<?php while ($profile = mysqli_fetch_array($query_profiles)): ?>
    <?php $profileId = $profile['id']; // Get the profile ID ?>
    <?php if (!in_array($profileId, $clickedMessages)): ?>
        <a href="./contactusdata.php?profileId=<?php echo $profileId; ?>" class="dropdown-item">
            <div class="d-flex align-items-center">
                <div class="ms-2">
                    <h6 class="fw-normal mb-0"><?php echo $profile['name']; ?> sent you a message</h6>
                    <small><?php echo date('F j, Y, g:i a', strtotime($profile['timestamp'])); ?></small>
                </div>
            </div>
        </a>
        <hr class="dropdown-divider">
    <?php endif;?>
<?php endwhile;?>




                            <a href="./contactusdata.php" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="navbar-nav align-items-center ms-auto">
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div> -->
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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total User</p>
                                <?php
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h6 class='mb-0'> " . $row["total_users"] . "</h6>";
} else {
    echo "0 users found";
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Feedback</p>
                                <?php
if ($feed->num_rows > 0) {
    $row = $feed->fetch_assoc();
    echo "<h6 class='mb-0'> " . $row["total_feed"] . "</h6>";
} else {
    echo "0 users found";
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Rawara</p>
                                <?php
if ($rawaraprofile->num_rows > 0) {
    $row = $rawaraprofile->fetch_assoc();
    echo "<h6 class='mb-0'> " . $row["total_rawara"] . "</h6>";
} else {
    echo "0 users found";
}
?>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total User Profile</p>
                                <?php
if ($Uprofile->num_rows > 0) {
    $row = $Uprofile->fetch_assoc();
    echo "<h6 class='mb-0'> " . $row["total_Uprofile"] . "</h6>";
} else {
    echo "0 users found";
}
?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Welfare Matrimonial Bride / Groom Data</h6>
                        <a href="./userallprofdata.php">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <!-- <th scope="col">Date</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Education</th>
                                    <th scope="col">Caste</th>
                                    <th scope="col">religion</th>
                                </tr>
                            </thead>
                            <tbody>

<?php $query_profiles = mysqli_query($conn, "SELECT * FROM `weddingprof` ORDER BY ID DESC") or die(mysqli_error($conn));

while ($profile = mysqli_fetch_array($query_profiles)) {
    ?>
                                <tr>
                                    <!-- <td>01 Jan 2045</td> -->
                                    <!-- <td></td> -->
                                    <td><?php echo $profile['name']; ?></td>
                                    <td><?php echo $profile['email']; ?></td>
                                    <td><?php echo $profile['phone']; ?></td>
                                    <td><?php echo $profile['gender']; ?></td>
                                    <td><?php echo $profile['age']; ?></td>
                                    <td><?php echo $profile['status']; ?></td>
                                    <td><?php echo $profile['country']; ?></td>
                                    <td><?php echo $profile['city']; ?></td>
                                    <td><?php echo $profile['education']; ?></td>
                                    <td><?php echo $profile['caste']; ?></td>
                                    <td><?php echo $profile['religion']; ?></td>
                                </tr>
    <?php
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="./contactusdata.php">Show All</a>
                            </div>

                            <?php

// Fetch message profiles from the database in descending order of ID
$query_profiles = mysqli_query($conn, "SELECT * FROM `contactus` ORDER BY id DESC LIMIT 4") or die(mysqli_error($conn));
if (!$query_profiles) {
    die("Error fetching profiles: " . mysqli_error($conn));
}
?>

<!-- Loop through the results and display each profile as a Bootstrap card -->
<?php while ($profile = mysqli_fetch_array($query_profiles)): ?>
        <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?php echo $profile['name']; ?> </h6>
                                        <small><?php echo date('F j, Y, g:i a', strtotime($profile['timestamp'])); ?></small>
                                    </div>
                                    <span><?php echo $profile['reason']; ?> </span>
                                </div>
                            </div>

<?php endwhile;?>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4 ">
                        <div class=" bg-light rounded p-4 tasktodo">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="./taskdata.php">Show All</a>
                            </div>
                            <form method="post" enctype="multipart/form-data">
            <div class="d-flex mb-2">
                <input class="form-control bg-transparent" type="text" name="todotask" placeholder="Enter task">
                <button  name="task" class="btn btn-primary ms-2">Add</button>
            </div>
        </form>

        <?php $query_profiles = mysqli_query($conn, "SELECT * FROM `tasktodo` ORDER BY id DESC limit 5") or die(mysqli_error($conn));

while ($profile = mysqli_fetch_array($query_profiles)) {
    ?>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span><td><?php echo $profile['Task']; ?></td>
                                        </span>
                                    </div>
                                </div>
                            </div>

    <?php
}
?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Welfare Matrimonial</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                             <a href="#">00-111-222-333</a>
                            </br>
                             <a class="border-bottom" href="#"
                                >Info@welfarematrimonial.com</a>
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