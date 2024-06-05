
<?php
include 'fc.php';
$p = new fc;
?>
<?php session_start();

$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['tk']))
		{
			$msg.="Vui lòng nhập tên tài khoản";
		}
		
		if(empty($_POST['mk']))
		{
			$msg.="Vui lòng nhập mật khẩu";
		}
		
		if($msg!="")
		{
			header("location:trangdangnhap.php?error=".$msg);
		}
		else
		{

			$unm=$_POST['tk'];

			$q="select * from nhanvien where usename='$unm'";
			$q1="select * from khachhang where usename='$unm'";
                        mysqli_set_charset($conn, 'UTF8');
			$res=mysqli_query($conn,$q) or die("wrong query");
                        mysqli_set_charset($conn, 'UTF8');
                        $res1=mysqli_query($conn,$q1) or die("wrong query");
			$row=mysqli_fetch_assoc($res);
			$row1=mysqli_fetch_assoc($res1);
			
			if(!empty($row))
			{
				if($_POST['mk']==$row['password'] )
				{
					$_SESSION=array();
					$_SESSION['unm']=$row['usename'];
					$_SESSION['uid']=$row['password'];
                                        $_SESSION['mnd']=$row['manv'];
                                        $_SESSION['tnd']=$row['tennv'];
                                        $_SESSION['dc']=$row['diachi'];
                                        $_SESSION['sdt']=$row['sdt'];
                                        $_SESSION['em']=$row['email'];
                                        $_SESSION['ns']=$row['ngaysinh'];
                                        $_SESSION['gt']=$row['gioitinh'];
					$_SESSION['status']=true;
					

					if( $row['user_status']== "Inactive")
					
						{
                             header("location:trangdangnhap.php");
                            
						}
						else
						{
					
					if($row['phanquyen']=="admin")
					{
						header("location:indexad.php");
					}
					else if($row['phanquyen']=="nvkho")
					{
						header("location:indexnvk.php");
					}
                                        else if($row['phanquyen']=="nvgiaohang")
					{
						header("location:indexnvgh.php");
					}
                                        
				}
				
			
			}
		}
                        elseif (!empty($row1)) {
                            if($_POST['mk']==$row1['password'])
				{
					$_SESSION=array();
					$_SESSION['unm']=$row1['usename'];
					$_SESSION['uid']=$row1['password'];
                                        $_SESSION['mnd']=$row1['makh'];
                                        $_SESSION['tnd']=$row1['tenkh'];
                                        $_SESSION['dc']=$row1['diachikh'];
                                        $_SESSION['sdt']=$row1['sdtkh'];
                                        $_SESSION['em']=$row1['emailkh'];
                                        $_SESSION['ns']=$row1['ngaysinh'];
                                        $_SESSION['gt']=$row1['gioitinh'];
					$_SESSION['status']=true;
					

                                        header("location:indexkh.php");
                    }
                    else
				{
					header("location:trangdangnhap.php?error=".$msg);
				}
                        
                        
		}
                else{
                    $msg.="Tài khoản hoặc mật khẩu không đúng";
                    header("location:trangdangnhap.php?error=".$msg);
                }
                }
	}
	else
	{
		header("location:index.php");
	}
			
include('data.php');

$message = '';
if(isset($_POST["btn"]))
{
 if(empty($_POST["unm"]) || empty($_POST["uid"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  SELECT * FROM nhanvien
  WHERE usename = :usename
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'usename' => $_POST["usename"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($row["user_status"] == 'Active')
    {
     if(password_verify($_POST["password"], $row["password"]))
     {
      header("location: index.php");
     }
     else
     {
      $message = '<div class="alert alert-danger">Wrong Password</div>';
     }
    }
    else
    {
     $message = '<div class="alert alert-danger">Your Account has been disabled, please contact admin</div>';
    }
   }
  }
  else
  {
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }
}
?>