<?php
include "../connection.php";

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    //die($id);

    $sql = "DELETE FROM `weddingprof` WHERE  ID='$id' ";
    $re = mysqli_query($conn, $sql);
    if ($re) {
        header("location:userallprofdata.php");
    } else {
        echo "error";
    }
}
