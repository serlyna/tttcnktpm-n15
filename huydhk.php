<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
           session_start();          
                        $sld= $_REQUEST['sl'];
                        $mssachh=$_REQUEST['mas'];
                        $sql = "Update sach set soluong = soluong + '$sld' where masach='$mssachh'";
                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
			mysqli_query($conn,$query) or die("can't Execute...");
			mysqli_query($conn,$query1) or die("can't Execute...");
			header("location:dsdonhangduyet.php");

?>
