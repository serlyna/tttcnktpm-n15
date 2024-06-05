<?php
	class fc{

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

		function exist_doctor($usename){
			$conn = $this->connDB();
			$sql = "select * from nhanvien where usename = '$usename' and user_status ='active' ";
			$result = mysqli_query($conn ,$sql);
			$existDoctor = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			return $existDoctor;
		}
    }