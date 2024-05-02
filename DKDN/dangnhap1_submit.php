<?php
session_start();
include 'dangnhap.php';
if(isset($_POST["submit"])  && $_POST["username"] != '' && $_POST["password"] != '' ){

    $username=$_POST["username"];
$password=$_POST["password"];
$password=md5($password);
$sql= "SELECT * FROM user WHERE username= '$username' AND password='$password' ";
$uer= mysqli_query($conn,$sql);
if( mysqli_num_rows($uer) >0){
   $_SESSION["user"] =$username;

   header("location:index.php");
}
else{
    $_SESSION["thongbao"]= "sai ten dang nhap hoac matkhau";
    header("location:dangnhap1.php");
}
}else{
    $_SESSION["thongbao"]="vui long nhap day du thong tin";
    header("location:dangnhap1.php");
}
?>