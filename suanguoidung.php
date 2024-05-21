<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $mnd=$_REQUEST['sid'];
    $sql = "Update nhanvien set tennv = '$tndung', diachi='$dcchi', sdt='$sdthoai', email='$eml', ngaysinh='$nsinh', gioitinh='$gtinh' where manv='$mnd'";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $sql);
    header("Location:dsnguoidung.php");
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
        <title>chỉnh sửa</title>
 <!-- vendor css -->
 <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="./css/azia.css">
    </head>
    <body>
        <div>
            <?php 
                include("headerad.php");
            ?>
        </div>

        <div class="noidung" style="font-family:times; font-size:16px;">
                
                <form method="POST" >
               
                    <h2 style="margin-left:35%;margin-top: 25px; margin-bottom: 10px;color: #357e38">CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h2>
                    <fieldset style="margin-left:330px;"> 
                    <b>Tên nhân viên:</b><br>
                    <input class="tx" type="text" id="s" style="width:70%; height:40px;" name="tndung" value="" placeholder="Tên người dùng" /></br></br>
                    <b>Địa chỉ:</b><br>
                    <input class="tx" type="text" id="s" style="width:70%; height:40px;" name="dcchi" value="" placeholder="Địa chỉ"/></br></br>
                    <b>Số điện thoại:</b><br>
                    <input class="tx" type="tell" id="s"style="width:70%; height:40px;" name="sdthoai" value="" placeholder="Số điện thoại"/></br></br>
                    <b>Email:</b><br>
                    <input class="tx" type="email" id="s" style="width:70%; height:40px;" name="eml" value="" placeholder="Email"/></br></br>
                    <b>Ngày sinh:</b><br>
                    <input class="tx" type="date" id="s" style="width:70%; height:40px;" name="nsinh" value="" placeholder="Ngày sinh"/></br></br>
                    <b>Giới tính:</b><br>
                    <input class="tx" type="text" id="s" style="width:70%; height:40px;" name="gtinh" value="" placeholder="Giới tính"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Cập nhật" style="width: 200px;
    height: 35px;
    background: green;
    border:none;
    margin-left: 25%;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>
                    ';

        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
        <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/ionicons/ionicons.js"></script>
    <script src="./js/jquery.cookie.js" type="text/javascript"></script>

    <script src="./js/azia.js"></script>
    </body>
    </body>
</html>
