<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sản phẩm nỗi bật</title>
        <link rel="stylesheet" type="text/css" href="main/home.css"/>
    </head>
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
       
                    <?php
                       
                    ?>
                </div>
                <div>
                    <?php
                        
                    ?>
                </div>
            </div>
            <div class="hhomepage">
                  <?php
                    include("allspnoibat.php");
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
