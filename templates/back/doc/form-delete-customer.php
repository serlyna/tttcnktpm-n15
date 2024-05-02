<?php
    $kn = mysqli_connect('localhost','root','','book');
    $id = $_GET['id_customer'];
    $sql = "delete from customer where id_customer=".$_GET['id_customer'];
    $kq = mysqli_query($kn, $sql) or die("Lỗi truy vấn");
    header("location:table-data-customer.php");
?>