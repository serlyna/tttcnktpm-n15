<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $mdh=$_REQUEST['sid'];
    $sql = "Update donhang set tinhtrang = '$trangthai' where madh='$mdh'";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $sql);
    header("Location:dsdonhang.php");
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
        <title>Sửa đơn hàng</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php 
                include("headerad.php");
            ?>
        </div>

        <div class="noidung" style="height: 400px;">
                
                <form method="POST" >
                    <h1 style="margin-left: 310px;margin-top: 30px; margin-bottom: 10px;color: #f46523">Xử lí đơn hàng</h1>
                    <fieldset style="margin-left:330px; margin-top: 20px;"> 
                        <h4 style="margin-bottom: 10px;">Trạng thái</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="trangthai" value="" placeholder="Trạng thái"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Cập nhật" style="width: 200px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-left: 150px;
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
    </body>
</html>
