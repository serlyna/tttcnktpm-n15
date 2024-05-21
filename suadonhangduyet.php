<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $mdh=$_REQUEST['sid'];
    $sql = "Update donhang set tinhtrang = '$trangthai', hoten='$ten', diachi='$dici', sdt='$sdto', email='$emaill' where madh='$mdh'";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $sql);
    header("Location:dsdonhangduyet.php");
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
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php 
                include("headernvk.php");
            ?>
        </div>

        <div class="noidung" >
                
            <form method="POST" style="margin-left: 200px;">
                    <h1 style="margin-left: 330px;margin-top: 30px; margin-bottom: 10px;color: #f46523">Xử lí đơn hàng</h1>
                    <fieldset style="margin-left:330px; margin-top: 20px;"> 
                        <h4 style="margin-bottom: 10px;">Tên người dùng</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="ten" value="" placeholder="Tên người dùng"/></br></br>
                    <h4 style="margin-bottom: 10px;">Địa chỉ</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="dici" value="" placeholder="Địa chỉ"/></br></br>
                    <h4 style="margin-bottom: 10px;">Số điện thoại</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="sdto" value="" placeholder="Số điện thoại"/></br></br>
                    <h4 style="margin-bottom: 10px;">Email</h4>
                    <input class="tx" type="email" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="emaill" value="" placeholder="Email"/></br></br>
                        <h4 style="margin-bottom: 10px;">Trạng thái</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="trangthai" value="" placeholder="Trạng thái"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Cập nhật" style="width: 200px;
    height: 35px;
    background: #f46523;
    border:none;
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
