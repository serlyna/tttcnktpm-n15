<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đổi mật khẩu</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
        <script src="js/dmk.js"></script>
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
                <?php
                if(isset($_SESSION['status']))
                    {
                    echo '
                <h2 style="margin-left: 340px;margin-top: 20px; color: #0b243b;padding-left:12px; padding-top:10px;  font-family:Playfair Display;">ĐỔI MẬT KHẨU</h2>
                <form method="POST" action="xulidoimk.php" style="margin-left: 280px; width: 500px; margin-top: 20px">
                    <fieldset style="height:500px; border: 1px solid white;"> 
                    <h4 style="margin-top: 20px; color: #0b243b; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;" >Nhập mật khẩu mới</h4>
                    <input class="tx" id="mkm" type="password"  name="mkm" value="" placeholder="Nhập mật khẩu mới" style="width:90%;height:30px;" /></br>
                    </br><h4 style="margin-top: 20px; color: #0b243b; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Nhập lại mật khẩu mới</h4>
                    <input class="tx" id="mkmnl" type="password"  name="mkmnl" value="" placeholder="Nhập lại mật khẩu mới" style="width:90%;height:30px;"/></br>
                    <input class="bt" type="submit" id="x" value="Đổi mật khẩu" onclick="doimk()" style="width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 150px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>
            
                    ';
                    }
                        ?>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>

