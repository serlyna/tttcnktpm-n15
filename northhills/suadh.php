<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
 	
	//echo $uid;
	if(isset($submit))
	{ 
            $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $madonhang=$_REQUEST['sid'];
            $tens=$_REQUEST['tens'];
            $msa=$_REQUEST['mas'];
            $mactdh = $_REQUEST['mactdh'];
            $sql="SELECT * FROM chitietdonhang where mactdh='$mactdh'";
            $result = mysqli_query($link,$sql);
            while ($row= mysqli_fetch_array($result))
            {   
                $sql4="SELECT * FROM sach where masach='$msa'";
            $result4 = mysqli_query($link,$sql4);
            while ($row4= mysqli_fetch_array($result4))
            {  
                $giaa=$row4['gia'];
                $slcu=$row['soluongdat'];
                if(!empty($row4))
			{
                            if($sooluong>$row4['soluong'])
				{
                                $msg.="Số lượng đặt vượt quá số lượng còn"; 
                            header("location:donhang.php?error=".$msg);
                                
                            }
                            if($sooluong<=$row4['soluong']){
                $sql = "Update sach set soluong =soluong+('$slcu'-'$sooluong') where masach='$msa'";
                 mysqli_set_charset($link, 'UTF8');
                $res2=mysqli_query($link,$sql) or die("Can't Execute Query.."); 
                 $sql2 = "Update chitietdonhang set soluongdat ='$sooluong', thanhtien=(soluongdat *  '$giaa')where mactdh='$mactdh'";
                 mysqli_set_charset($link, 'UTF8');
                $res3=mysqli_query($link,$sql2) or die("Can't Execute Query.."); 
                header("location:donhang.php");
            }}
            }
            }         
//                        $sql = "Update donhang set mand ='$maand', trangthai='Gói hàng' where madh='$maadh'";
//                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
//			header("location:dsdonhang.php");
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
        <title>Đơn hàng</title>
        <link rel="stylesheet" type="text/css" href="main/donhang.css"/>
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
                    
                    echo '
                <h3 style="margin-left: 380px;margin-top: 20px; color: #0b243b; font-family:times">SỬA ĐƠN HÀNG</h2>
                <form method="POST" style="margin-left: 280px; width: 500px; margin-top: 30px">';
                    
                    $slda=$_REQUEST['sld'];
                    
                echo'    <fieldset tyle="height:500px; "style="border: 1px solid white"> 
                    
                    </br><h4 style="font-family:times">Số lượng</h4></br>
                    <input  class="tx" id="mkmnl" type="text"  name="sooluong" value="'.$slda.'" placeholder="Số lượng" style="width:90%;height:30px;"/></br>
                    <input class="bt" type="submit" id="x" name="submit" value="Lưu"  style="width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 180px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>
            
                    ';
                    }
                  ?>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>