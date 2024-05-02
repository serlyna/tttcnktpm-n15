<?php
session_start();
unset($_SESSION['user']);

header("location:dangnhap1.php");
?>