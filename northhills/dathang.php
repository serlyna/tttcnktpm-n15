<?php session_start();
$conn=mysqli_connect("localhost","root",)or die("Can't Connect...");
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
                <h1 class="title" style="margin-bottom: 10px;
    text-align: center;
    color: #f46523;
    margin-left: 50px;
    font-size: 30px;">Đặt hàng thành công</h1>
                
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>
