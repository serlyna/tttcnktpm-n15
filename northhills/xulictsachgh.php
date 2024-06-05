<?php session_start();

	if(isset($_GET['ts']) and isset($_GET['ttg']) and isset($_GET['id']) and isset($_GET['gia']))
	{
		
		$_SESSION['cart'][] = array("id"=>$_GET['id'],"ts"=>$_GET['ts'],"ttg"=>$_GET['ttg'],"gia"=>$_GET['gia'],"qty"=>"1");
		header("location: giohang.php");
	}
	else if(isset($_GET['id']))
	{
		
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		header("location: giohang.php");
	}
	else if(!empty($_POST))
	{
		
		foreach($_POST as $id=>$val)
		{
			$_SESSION['cart'][$id]['qty']=$val;
			header("location: giohang.php");
		}
	}


?>