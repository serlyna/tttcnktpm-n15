<?php
	
	class Mclass {

		// function connect đến CSDL
		function connDB(){
			// $conn = mysqli_connect("sql208.epizy.com", "epiz_25843573", 'nta69yDeGO', "epiz_25843573_medihome");
			$conn = mysqli_connect("localhost", "root", '', "vietbook");
			$conn -> set_charset("utf8");
			if(!$conn):
				echo 'lỗi không kết nối'.mysqli_error();
			else:
				return $conn;
			endif;
		}

		function exist_user($usename){
			$conn = $this->connDB();
			$sql = "select * from khachhang where username = '$usename'";
			$result = mysqli_query($conn ,$sql);
			$existUser = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existUser; 	
		}

		// function exist_doctor($username){
		// 	$conn = $this->connDB();
		// 	$sql = "select * from doctor where username = '$username'";
		// 	$result = mysqli_query($conn ,$sql);
		// 	$existDoctor = mysqli_fetch_assoc($result);
		// 	mysqli_free_result($result);
		// 	mysqli_close($conn);
		// 	return $existDoctor;
		// }

		function exist_email($emailkh){
			$conn = $this->connDB();
			$sql = "select * from khachhang where emailkh = '$emailkh'";
			$result = mysqli_query($conn ,$sql);
			$existEmail = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existEmail;
		}

		//function multipleFunc($sql){
		//	$conn = $this->connDB();
		//	$result = mysqli_query($conn, $sql);
		///	mysqli_close($conn);
		//	return $result;
		//}

		function show_info($usename){
			$conn = $this->connDB();
			$sql = "select * from khachhang where usename = '$usename'";
			$result = mysqli_query($conn ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $user; 
		}
		function show_info_byid($makh){
			$conn = $this->connDB();
			$sql = "select * from khachhang where makh = '$makh'";
			$result = mysqli_query($conn ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $user; 
		}

		

		
 	}	
?>
