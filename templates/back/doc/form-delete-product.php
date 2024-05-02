<?php
    $kn = mysqli_connect('localhost','root','','book');
    $id = $_GET['id_product'];
    $sql = "delete from product where id_product=".$_GET['id_product'];
    $kq = mysqli_query($kn, $sql) or die("Lỗi truy vấn");
    header("location:table-data-product.php");
?>