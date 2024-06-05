<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
 
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");	
	mysqli_select_db($conn,"lagezrwa_sach");
    if(isset($submit))
	{
            foreach($_SESSION['cart'] as $id=>$x)
            {	
                $tot = 0;
                $masach=$x['id'];
                $tsach= $x['ts'];
                $sl=$x['qty'];
                $gia=$x['gia'] * $x['qty'] ;
                $tot = $_GET['tong'];
            }
            $mnd=$_SESSION['mnd'];
            $ndh= date('y-m-d');       
            $q1="select * from sach where masach='$masach'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress=mysqli_query($conn,$q1) or die("wrong query");
                        $row=mysqli_fetch_assoc($ress);
                        if(!empty($row))
			{
                            if($sl>$row['soluong'])
				{
                                $msg.="Số lượng đặt vượt quá số lượng còn"; 
                            header("location:giohang.php?error=".$msg);
                                
                            }
                        
                        if($sl<=$row['soluong']){
	$query="insert into donhang(manv,makh,ngaydat,tinhtrang, tongtien) values('1','$mnd','$ndh','Chờ duyệt', $tot)"; 
	mysqli_set_charset($conn, 'UTF8');
	$res=mysqli_query($conn,$query) or die("Can't Execute Query...");  
        $mdh= mysqli_insert_id($conn);

            foreach($_SESSION['cart'] as $id=>$x)
            {	

                $masach=$x['id'];
                $tsach= $x['ts'];
                $sl=$x['qty'];
                $gia=$x['gia'] * $x['qty'] ;
            
                $query1="insert into chitietdonhang(madh,masach,soluongdat,thanhtien) values('$mdh','$masach','$sl','$gia')";                           
                mysqli_set_charset($conn, 'UTF8');
                $res1=mysqli_query($conn,$query1) or die("Can't Execute Query..");   
            
                $sql = "Update sach set soluong = soluong - '$sl' where masach='$masach'";
                $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
            }
        header("location:chitietdonhang.php");   
                        }
                        }
            
        }
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thông tin cá nhân</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php 
                include("header.php");
            ?>
        </div>

        <div class="noidung">
            <div class="left-menu">
                <div>
                    <?php
                        include("cnkh.php");
                    ?>
                </div>
                <div class="menu">
                    <?php
                        include("menu.php");
                    ?>
                </div>
                
            </div>
            <div class="homepage">
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        if(isset($_SESSION['ctdh']))
                            {
                        if(isset($_POST['ts']) and isset($_POST['sl']) and isset($_POST['id']) and isset($_POST['gia']))
	{
                        $tensach=$_POST['ts'];
                        $masach=$_POST['id'];
                        $soluong=$_POST['sl'];
                        $gia=$_POST['gia'];
        }
                        }
                        
                    echo '
                <h2 style="margin-left: 350px;margin-top: 20px; color: #0b243b; font-family:times">THÔNG TIN CÁ NHÂN</h2>
                <form method="POST" style="margin-left: 280px; width: 500px; margin-top: 30px">
                    <fieldset style="height:430px; border:1px solid #0b243b"> 
                    <h5 style="padding-left:30px; padding-top:15px; padding-bottom:7px; font-family:times">Tên người dùng</h5>
                    <input class="tx" type="text" id="snd" name="tndcs" value="'.$_SESSION['tnd'].'" placeholder="Tên người dùng" style="width:90%;height:30px; margin-left:30px;" disabled /></br></br>
                    <h5 style="padding-left:30px;  font-family:times;">Địa chỉ</h5>
                    <input class="tx" type="text" id="sdc" name="dccs" value="'.$_SESSION['dc'].'" placeholder="Địa chỉ" style="width:90%;height:30px;  margin-left:30px;" disabled /></br></br>
                    <h5 style="padding-left:30px;  font-family:times;">Số điện thoại</h5>
                    <input class="tx" type="tell" id="sdt" name="sdtcs" value="'.$_SESSION['sdt'].'" placeholder="Số điện thoại" style="width:90%;height:30px;  margin-left:30px;" disabled/></br></br>
                    <h5 style="padding-left:30px;  font-family:times;">Email</h5>
                    <input class="tx" type="email" id="sem" name="emcs" value="'.$_SESSION['em'].'" placeholder="Email" style="width:90%;height:30px;  margin-left:30px;" disabled/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Đặt hàng" style="width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 180px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>
                    ';
                    }
                        ?>
                    
            </div>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>
