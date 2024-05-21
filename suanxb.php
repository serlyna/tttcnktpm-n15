<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $mnxb=$_REQUEST['sid'];
    $sql = "Update nhaxuatban set tennxb = '$tnxb', diachinxb='$dcnxb', sdtnxb='$sdthoainxb', emailnxb='$emnxb' where manxb='$mnxb'";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $sql);
    header("Location:dsnxb.php");
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
        <title>Sửa nhà xuất bản</title>
        <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="./css/azia.css">
    <body>
        <div>
            <?php 
                include("headerad.php");
            ?>
        </div>

        <div class="noidung">
                
                <form method="POST" >
                    <div class="form-group">
                    <h2 style="margin-left: 30%;margin-top: 20px; margin-bottom: 10px;color:#1E9235">CHỈNH SỬA THÔNG TIN NHÀ XUẤT BẢN</h2>
                    <fieldset style="margin-left:350px;"> 
                    <b>Tên nhà xuất bản:</b><br>
                    <input class="tx" type="text" id="s" style="width:60%; height:40px; " name="tnxb" value="" placeholder="Tên nhà xuất bản" /><br><br>
                    <b>Địa chỉ nhà xuất bản:</b><br>
                    <input class="tx" type="text" id="s" style="width:60%; height:40px ;" name="dcnxb" value="" placeholder="Địa chỉ"/><br><br>
                    <b>Số điện thoại nhà xuất bản:</b><br>
                    <input class="tx" type="tell" id="s" style="width:60%; height:40px ;" name="sdthoainxb" value="" placeholder="Số điện thoại"/></br></br>
                    <b>Email nhà xuất bản:</b><br>
                    <input class="tx" type="email" id="s" style="width:60%; height:40px ; " name="emnxb" value="" placeholder="Email"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Lưu" style="width: 150px;
    height: 35px;
    background: green;
    border:none;
    margin-left: 180px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>

        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
    </body>
</html>
