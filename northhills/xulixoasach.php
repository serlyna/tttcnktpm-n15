<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
           session_start();          
			$query="delete from sach where masach =".$_REQUEST['sid'];
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:sachad.php");

?>
	