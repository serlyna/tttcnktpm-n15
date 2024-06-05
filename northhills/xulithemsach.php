<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");

	if(!empty($_POST['submit']))
	{
		$msg=array();
		if(empty($_POST['ts']) || empty($_POST['sl']) || empty($_POST['dm']) || empty($_POST['mnxb']) || empty($_POST['ttg']) || empty($_POST['nxb']) || empty($_POST['gia']) || empty($_POST['image']))
		{
			$msg[]="Please full fill all requirement";
		}
			$b_img = $_POST['image'];	
                        $manxb=$_POST['mnxb'];
                        $mdmuc=$_POST['dm'];
			$tensach=$_POST['ts'];
                        $ttgia=$_POST['ttg'];
                        $namxb=$_POST['nxb'];
			$sluong=$_POST['sl'];
                        $ggia=$_POST['gia'];
                        $noibat=$_POST['nb'];
			$query="insert into sach(madm,manxb,tensach,tentacgia,namxb,soluong,gia,hinhanh,noibat)
			values('$mdmuc','$manxb','$tensach','$ttgia',$namxb,$sluong,$ggia,'$b_img','$noibat')";
                        mysqli_set_charset($conn, 'UTF8');
			mysqli_query($conn,$query) or die("Can't Connect to Query...");
			header("location:sachad.php");

	}
	else
	{
		header("location:indexad.php");
	}
?>
	
	