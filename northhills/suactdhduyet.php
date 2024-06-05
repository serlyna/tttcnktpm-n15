<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost", "root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $mctdh=$_REQUEST['id'];
    $sql = "Update chitietdonhang set tensach = '$tensach', soluong='$soluong', gia='$gia' where mactdh='$mctdh'";
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
        <title>Sửa chi tiết đơn hàng</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php 
                include("headernvk.php");
            ?>
        </div>

        <div class="noidung" style="height: 500px;">
                
                <form method="POST" >
                    <h1 style="margin-left: 310px;margin-top: 30px; margin-bottom: 10px;color: #f46523">CHỈNH SỬA CHI TIẾT ĐƠN HÀNG</h1>
                    <fieldset style="margin-left:330px; margin-top: 20px;"> 
                    <h4 style="margin-bottom: 10px;">Tên sách</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="tensach" value="" placeholder="Tên sách"/></br></br>
                    <h4 style="margin-bottom: 10px;">Số lượng</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="soluong" value="" placeholder="Số lượng"/></br></br>
                    <h4 style="margin-bottom: 10px;">Giá</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="gia" value="" placeholder="Giá"/></br></br>
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

        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
    </body>
</html>
