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
            <?php session_start();
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
                <h3 style="color: #0b243b; margin-left: 100px; font-family:Playfair Display; ">--Đặt hàng thành công!! Chúng tôi sẽ giao cho bạn ngay đây--</h3>
                <img style="width:30%; margin-left:35%; margin-top:5%" src="./img/gh.gif">
                <a href="test.php"><input type="button" value="Thanh toán - Cập nhật đơn hàng" style="width: 250px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 37%;
    margin-top: 20px;
    border-radius: 15px;
    color: #FAFAFA;"></a>
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
