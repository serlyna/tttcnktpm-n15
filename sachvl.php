<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tất cả sách</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php session_start();
                if(isset($_SESSION['status']))
                {
                       include("header-kh.php");
                }
                else {
                    include ("header-kh.php");
                }
            ?>
        </div>
        <br>

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
            <div class="hhomepage">
                  <?php
                    include("allsach.php");
//                ?>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>
