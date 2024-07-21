<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "welfare";

$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn) {
    # code...
    //echo "connection Succesful";
} else {
    echo "not succesfull";
}
