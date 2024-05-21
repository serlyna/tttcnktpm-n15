<?php
/* Database connection start */
$servername = "localhost";
$username = "lagezrwa_sach";

$conn = mysqli_connect($servername, $username) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
