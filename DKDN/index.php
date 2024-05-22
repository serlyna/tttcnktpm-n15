<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap1.php");
}
?>
<h1>Phai dang nhap moi vao duoc</h1>
<a href="dangxuat.php" title="Logout">Logout</a>