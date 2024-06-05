<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
           session_start();          
			$query="delete from chitietdonhang where madh =".$_REQUEST['id'];
                        $query1="delete from donhang where madh =".$_REQUEST['id'];
			mysqli_query($conn,$query) or die("can't Execute...");
			mysqli_query($conn,$query1) or die("can't Execute...");
			header("location:dsdonhangduyet.php");

?>
