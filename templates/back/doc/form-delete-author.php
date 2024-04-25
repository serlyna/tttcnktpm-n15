<?php
    $kn = mysqli_connect('localhost','root','','book');
    $id = $_GET['id_author'];
    $sql = "delete from author where id_author=".$_GET['id_author'];
    $kq = mysqli_query($kn, $sql) or die("Lỗi truy vấn");
    header("location:table-data-author.php");
?>