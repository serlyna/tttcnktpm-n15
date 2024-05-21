<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
 
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");	
	//echo $uid;
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
                        
	$query="insert into donhang(manv,makh,ngaydat,tinhtrang, guitang, tongtien) values('1','$mnd','$ndh','Chờ duyệt','1', $tot)"; 
	mysqli_set_charset($conn, 'UTF8');
	$res=mysqli_query($conn,$query) or die("Can't Execute Query...");  
        $mdh= mysqli_insert_id($conn);
        $query3="insert into guitang(madh,diachigt,sdtgt,emailgt, tennn) values('$mdh','$dccs','$sdtcs','$emcs','$tndcs')"; 
        mysqli_set_charset($conn, 'UTF8');
        $res3=mysqli_query($conn,$query3) or die("Can't Execute Query..");
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
                <h2 style="margin-left: 35%;margin-top: 10px; color: #0b243b; font-family:Playfair Display">THÔNG TIN NGƯỜI NHẬN</h2>
                <form method="POST" style="margin-left: 230px; width: 500px; margin-top: 30px; font-family: Playfair Display ">
                    <fieldset style="height:430px; border:1px solid #0b243b"> 
                    <h4 style="padding-left:20px; padding-top:20px;padding-bottom:10px; font-family:times">Tên người nhận</h4>
                    <input class="tx" type="text" id="snd" name="tndcs" value="" placeholder="Tên người nhận" style="width:90%;height:30px; margin-left:30px;"  /></br>
                    <h4 style="padding-left:20px; padding-top:20px;padding-bottom:10px; font-family:times">Địa chỉ người nhận</h4>
                    <input class="tx" type="text" id="sdc" name="dccs" value="" placeholder="Địa chỉ người nhận" style="width:90%;height:30px;margin-left:30px;" /></br></br>
                    <h4 style="padding-left:20px; padding-top:20px;padding-bottom:10px; font-family:times">SĐT người nhận</h4>
                    <input class="tx" type="tell" id="sdt" name="sdtcs" value="" placeholder="Số điện thoại người nhận" style="width:90%;height:30px;margin-left:30px;" /></br>
                    <h4 style="padding-left:20px; padding-top:20px;padding-bottom:10px; font-family:times">Email người nhận</h4>
                    <input class="tx" type="email" id="sem" name="emcs" value="" placeholder="Email người nhận" style="width:90%;height:30px;margin-left:30px;" /></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Gửi tặng" style="width: 140px;
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
