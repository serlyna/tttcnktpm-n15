<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
           session_start();          
			$query="delete from chitietdonhang where madh =".$_REQUEST['sid'];
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:dsdonhang.php");

?>
