<?php

include 'lienhe_form11.php';
if(isset($_POST['submit'])  && $_POST["username"]!=''&&  $_POST["phone"]!=''&& $_POST["email"]!=''&& $_POST["note"]!=''){
$username=$_POST["username"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$note=$_POST["note"];
$status_liennhe=0;

$sql="INSERT INTO tbl_thongbaolienhe (email,username,phone,status_lienhe,note) VALUES ('$email','$username','$phone','$status_liennhe','$note') ";
mysqli_query($conn,$sql);
header("location:login.php");
}else{
    header("location:lienhe.php");
}


?>
