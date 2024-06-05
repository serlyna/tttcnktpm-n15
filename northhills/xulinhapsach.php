<?php session_start();  
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
if(isset($_SESSION['status']))
                            {
    
	if(!empty($_POST['submit']))
	{
            
		$msg=array();
		if(empty($_POST['soluongg']) )
		{
			$msg[]="Please full fill all requirement";
		}

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
                        $nn= date('y-m-d');
                        $mandung=$_SESSION['mnd'];
                        $tensach=$_POST['tensachh'];
                        $soluong=$_POST['soluongg'];
                        $q1="select * from sach where tensach='$tensach'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress=mysqli_query($conn,$q1) or die("wrong query");
                        $row=mysqli_fetch_assoc($ress);
                        $masachh = $row['masach'];
                        $sls = $row['soluong'];
			$query="Update sach set soluong='$soluong' where tensach='$tensach'";
                        mysqli_set_charset($conn, 'UTF8');
			mysqli_query($conn,$query) or die("Can't Connect to Query...");
                        $msach= mysqli_insert_id($conn);
                        $query1="insert into phieunhap(manv,masach,soluongnhap,ngaynhap)
			values('$mandung','$masachh',('$soluong' - '$sls'),'$nn')";
                        mysqli_set_charset($conn, 'UTF8');
			mysqli_query($conn,$query1) or die("Can't Connect to Query...");
			header("location:nhapsach.php");
		}
	}
	else
	{
		header("location:indexnvk.php");
	}
                            }                 
?>
	
	