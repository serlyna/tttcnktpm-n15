<?php
session_start();
include 'dangnhap.php';
if(isset($_POST['submit'])  && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"]!= ''){
$username=$_POST["username"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$level=0;
if($password != $repassword){
$_SESSION["thongbao"]  ="password nhap lai khong chinh xac";
    header("location:dangky.php");
    die();
}
$sql= "SELECT * FROM user WHERE username= '$username' ";
$old= mysqli_query($conn,$sql);
$password=md5($password);
if(mysqli_num_rows($old) >0){
    $_SESSION["thongbao"] ="username da ton tai";
    header("location:dangky.php");
    die();
}
$sql= " INSERT INTO user (username, password, level) VALUES ('$username','$password','$level')";
mysqli_query($conn,$sql);
$_SESSION["thongbao"] ="da dang ky thanh cong";
header("location:dangnhap1.php");


}else{
    $_SESSION["thongbao"]="Vui long nhap day du thong tin";
    header("location:dangky.php");
}


?>