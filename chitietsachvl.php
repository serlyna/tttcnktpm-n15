<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="main/chitietsach.css"/>
    </head>
    <style>
            *{
    margin: 0px;
    padding: 0px;
    font-family:Playfair Display;
}

.left-menu{
    width: 250px;
}

.noidung{
    display: flex;
    margin: 0px 50px;
    margin-bottom: 20px;
}

.homepage{
    width: 890px;
    margin-top: 40px;
    margin-left: 100px;
}

.name{
    color: #f46523;
    margin-left: 120px;
    font-size: 30px;
    margin-bottom: 20px;
}

.menu{
    margin-bottom: 50px;
}

.btgh{
    width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 330px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;
}
            </style>
    <body>
    <body>
        <div>
            <?php session_start();
                if(isset($_SESSION['status']))
                {
                       include("header.php");
                }
                else {
                    include ("header-kh.php");
                }
            ?>
        </div>

        <div class="noidung">
            <div class="left-menu">
                <div class="menu">
                    <?php
                        include("menu.php");
                    ?>
                </div>
                <div>
                    <?php
                        include ("tkncid.php");
                    ?>
                </div>
            </div>
            <div class="homepage" style="margin-left:90px;">
                <?php 
                    $conn=mysqli_connect("localhost","root")or die("Can't Connect...");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $id=$_GET['id'];
                    $q="select * from sach where masach=$id";
                    $res=mysqli_query($conn,$q) or die("Can't Execute Query..");
                    $row=mysqli_fetch_assoc($res);
                    echo '<h2 class="name" style="margin-left:25%; color:#0b243b;font-family:Courier New
                    Courier;" >'.$row['tensach'].'</h2>';
                    echo '	<table border="0" width="100%">
                                    <tr>
                                         
                                   </tr>
                                    <tr align="center" bgcolor="#0b243b">
                                            <td style="color:white; font-size:20px;">Thông tin sách</td>
                                   </tr>
                                   <tr>
                                           <td><hr color="#088A08"></td>
                                   </tr>
                            </table>

                           <table border="0"  width="100%" bgcolor="#e9f8e9">
                                   <tr> 

                                           <td width="28%" rowspan="3">
                                                   <img src="'.$row['hinhanh'].'" width="250px">

                                           </td>
                                   </tr>

                                   <tr > 
                                           <td width="100%" height="100%" >
                                                   <table border="0"  width="100%" height="100%">
                                                           <tr valign="top" height="20px">
                                                                   <td align="right" width="20%" margin-left="10px" style="font-weight:bold; font-family:monospace;font-size:18px;">Tên sách</td>
                                                                   <td width="4%"></td>
                                                                   <td style="font-family:monospace; font-size:18px; ">'.$row['tensach'].'</td>
                                                           </tr>


                                                           <tr height="20px">
                                                                   <td align="right"  style="font-weight:bold; font-family:monospace;font-size:18px;">Tác giả</td>
                                                                   <td>: </td>
                                                                   <td style="font-family:monospace; font-size:18px; ">'.$row['tentacgia'].'</td>

                                                           </tr>


                                                           <tr height="20px">
                                                                   <td align="right"  style="font-weight:bold; font-family:monospace;font-size:18px;">NXB </td>
                                                                   <td>: </td>
                                                                   <td align="left" style="font-family:monospace; font-size:18px; ">'.$row['namxb'].'</td>

                                                           </tr>

                                                           <tr height="20px"> 
                                                                   <td align="right"  style="font-weight:bold; font-family:monospace;font-size:18px;">Số lượng </td>
                                                                   <td>: </td>
                                                                   <td align="left" style="font-family:monospace; font-size:18px; ">'.$row['soluong'].' cuốn</td>

                                                           </tr>

                                                           <tr height="20px">
                                                                   <td align="right"  style="font-weight:bold; font-family:monospace;font-size:18px;">Giá</td>
                                                                   <td>: </td>
                                                                   <td align="left" style="font-family:monospace; font-size:18px; ">'.$row['gia'].'₫</td>

                                                           </tr>
                                                           <tr valign="top" height="20px">
                                                           <td align="right" style="font-weight:bold; font-family:monospace;font-size:18px;">Thông tin</td>
                                                           <td>: </td>
                                                           <td align="left"  style="font-family:monospace; font-size:16px; font-style:italic; text-align:justify; padding-right:8px;" >'.$row['mieuta'].'</td>

                                                   </tr>
                                                   </table>


                                           </td>
                                   </tr>
                           </table>
                           <table border="0" width="100%">
                                    <tr>
                                           <td><hr color="#0b243b"></td>
                                   </tr>
                                    <tr align="center" bgcolor="#0b243b">
                                            <td style="color:white; font-size:17px">Lựa chọn sách này!!</td>
                                   </tr>
                                   <tr>
                                           <td><hr color="#0b243b""></td>
                                   </tr>

                            </table>

                          

                           <table border="0" width="100%">
                                    <tr align="center" bgcolor="#0b243b">';

                                    if(isset($_SESSION['status']))
                                    {
                                           echo ' <a href="xulictsachgh.php?ts='.$row['tensach'].'&id='.$row['masach'].'&ttg='.$row['tentacgia'].'&gia='.$row['gia'].'">
                                                   <input class="btgh" type="button" value="Thêm vào giỏ hàng" style="background-color:#0b243b">
                                                   
                                           </a></td>';
                                   }
                                   else
                                   {
                                           echo '<td><a href="trangdangnhap.php"> <h5 style="color:white;font-family:Playfair Display;">Vui lòng đăng nhập</h5></a></td>';
                                   }
                                   echo '</tr>
                                   <br>
                                
                           </table>';
                           
                ?>
                <br>
                 <br>
                 <div class="fb-comments" data-href="http://tuyenlinh-th01.tk/" data-width="850" data-numposts="3" style="margin-left:0%; "></div>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery.wm-zoom-1.0.min.js"></script>
<!--<script type="text/javascript">
	$(document).ready(function()
		{
			$('.my-zoom-1').WMZoom();
		});
</script>-->

<script src="js/jquery-3.2.1.slim.js"></script>
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>

<script>
	//initiate the plugin and pass the id of the div containing gallery images
$("#img_01").elevateZoom({constrainType:"height", constrainSize:360, zoomType: "lens", containLensZoom: true, gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active"}); 

//pass the images to Fancybox
$("#gallery_01").bind("click", function(e) {  
  var ez =   $('#gallery_01').data('elevateZoom');	
	$.fancybox(ez.getGalleryList());
  return false;
});
</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1623591834368593';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!---------Số lượng------------->

<script language="javascript">

	function hamcong()
	{
		var t = document.getElementById("textBox").value;
		document.getElementById("textBox").value=parseInt(t)+1;
	}
	function hamtru()
	{
		t =document.getElementById("textBox").value;
		if(t>1)
		{
			document.getElementById("textBox").value=parseInt(t)-1;
		}	
	}
	</script>
</html>
