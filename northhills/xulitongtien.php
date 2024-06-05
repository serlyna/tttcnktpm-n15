<?php
$conn=mysqli_connect("localhost","root","","vietbook")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
           session_start();          
			$query="SELECT sum(tongtien) as 'tong so tien' from donhang where tinhtrang='Nhận hàng - Hoàn tất đơn hàng";
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:dsdonhangduyet.php");

?>
