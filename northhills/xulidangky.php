<?php
        $conn=mysqli_connect("localhost","root")or die("Can't Connect...");
	mysqli_select_db($conn,"lagezrwa_sach");
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['tnd']) || empty($_POST['tk']) || empty($_POST['mk']) || empty($_POST['nlmk']) || empty($_POST['sdt']) || empty($_POST['dc']) || empty($_POST['em'])||empty($_POST['ns']) )
		{
			$msg.="<li>Vui lòng nhập đầy đủ thông tin ";
			
		}
		
		if($_POST['mk']!=$_POST['nlmk'])
		{
			$msg.="<li>Vui lòng nhập lại đúng mật khẩu";
		}
		
		
		if(strlen($_POST['mk'])>10)
		{
			$msg.="<li>Vui lòng nhập đúng giới hạn của mật khẩu";
		}
                
                if(strlen($_POST['mk'])<6)
		{
			$msg.="<li>Vui lòng nhập đúng giới hạn của mật khẩu";
		}
		
		if(is_numeric($_POST['tnd']))
		{
			$msg.="<li>Vui lòng nhập đúng tên người dùng";
		}
		
		if($msg!="")
		{
			header("location:trangdangky.php?error=".$msg);
		}
		else
		{
                        $ngaydk = date('y-m-d');
			$tnd=$_POST['tnd'];
			$tk=$_POST['tk'];
			$mk=$_POST['mk'];
			$sdt=$_POST['sdt'];
			$dc=$_POST['dc'];
			$em=$_POST['em'];
			$ns=$_POST['ns'];
                        $gt=$_POST['gt'];
                        $q1="select * from khachhang where usename='$tk'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress=mysqli_query($conn,$q1) or die("wrong query");
                        $row=mysqli_fetch_assoc($ress);
                        if(!empty($row))
			{
                            if($_POST['tk']==$row['usename'])
				{
                                $msg.="Tài khoản đã tồn tại";
                            header("location:trangdangky.php?error=".$msg);
                                
                            }
                        }
                        else{
                            $query="insert into khachhang(tenkh,usename,password,diachikh,sdtkh,emailkh,ngaysinh,ngaydangky)
                                values('$tnd','$tk','$mk','$dc','$sdt','$em','$ns','$ngaydk')";
                                mysqli_set_charset($conn, 'UTF8');
                                mysqli_query($conn,$query) or die("Can't Execute Query...");
                                header("location:dktc.php?ok=1");
                        }
		}
	}
	else
	{
		header("location:index.php");
	}
?>