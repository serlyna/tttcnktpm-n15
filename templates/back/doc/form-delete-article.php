<?php
    $kn = mysqli_connect('localhost','root','','book');
    $id = $_GET['id_article'];
    $sql = "delete from article where id_article=".$_GET['id_article'];
    $kq = mysqli_query($kn, $sql) or die("Lỗi truy vấn");
    header("location:table-data-article.php");
?>