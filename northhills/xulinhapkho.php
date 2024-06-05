<?php session_start();  
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
if(isset($_SESSION['status']))
                            {
    
	if(!empty($_POST['submit']))
	{
            
		$msg=array();
		if(empty($_POST['tnsach']) || empty($_POST['ttg']) || empty($_POST['nxb']) || empty($_POST['gia'])  || empty($_POST['giagoc']) || empty($_POST['mieuta'])  )
		{
			$msg[]="Please full fill all requirement";
		}
		
		if(empty($_FILES['image']['name']))
		$msg[] = "Please provide a file";
	
		if($_FILES['image']['error']>0)
		$msg[] = "Error uploading file";
		
				
		if(!(strtoupper(substr($_FILES['image']['name'],-4))==".JPG" || strtoupper(substr($_FILES['image']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['image']['name'],-4))==".PNG"))
			$msg[] = "wrong file  type";
			
		if(file_exists("../image_book/".$_FILES['image']['name']))
			$msg[] = "File already uploaded. Please do not updated with same name";

		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			move_uploaded_file($_FILES['image']['tmp_name'],"image_book/".$_FILES['image']['name']);
			$b_img = "image_book/".$_FILES['image']['name'];		
			$tensach=$_POST['tnsach'];
                        $tentg=$_POST['ttg'];
                        $namxban=$_POST['nxb'];
                        $giaa=$_POST['gia'];
						$giagoc=$_POST['giagoc'];
						$mieuta=$_POST['mieuta'];
                        $noi=$_POST['nb'];
                        $mdmucc=$_POST['dm'];
                        $mnxban=$_POST['mnxb'];
                        $nn= date('y-m-d');
                        $mandung=$_SESSION['mnd'];
                        $q1="select * from sach where tensach='$tensach'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress=mysqli_query($conn,$q1) or die("wrong query");
                        $row=mysqli_fetch_assoc($ress);
                        if(!empty($row))
			{
                            if($_POST['tnsach']==$row['tensach'])
				{
                                $msg.="Sách này đã tồn tại";
                            header("location:themsach.php?error=".$msg);
                                
                            }
                        }
                        else{
			$query="insert into sach(madm,manxb,tensach,tentacgia,namxb,gia,giagoc,mieuta,hinhanh,noibat)
			values('$mdmucc','$mnxban','$tensach','$tentg','$namxban','$giaa','$giagoc','$mieuta','$b_img','$noi')";
                        mysqli_set_charset($conn, 'UTF8');
			mysqli_query($conn,$query) or die("Can't Connect to Query...");
                        $msach= mysqli_insert_id($conn);
                        mysqli_set_charset($conn, 'UTF8');
			header("location:sachad.php");
                        }
		}
	}
	else
	{
		header("location:indexad.php");
	}
                            }                 
?>
	
		
	
	