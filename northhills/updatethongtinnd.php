<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thông tin cá nhân</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <style>
        h5{
            font-family: times;
        }
        </style>
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
                <h2 style="margin-left: 320px;margin-top: 20px; color: #0b243b;font-family:Playfair Display;">THÔNG TIN CÁ NHÂN</h2>
                <form method="POST" action="xuliupdatethongtinnd.php" style="margin-left: 250px; width: 500px; margin-top: 30px; font-family:Playfair Display; ">
                    <fieldset style="height:610px; border:1px solid #0b243b"> 
                    <h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Tên người dùng</h5>
                    <input  class="tx" type="text" id="s" name="tnd" value="'.$_SESSION['tnd'].'" placeholder="Tên người dùng" style="width:90%;height:30px; margin-left:15px";/></br>
                    <br><h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Địa chỉ</h5>
                    <input class="tx" type="text" id="s" name="dc" value="'.$_SESSION['dc'].'" placeholder="Địa chỉ" style="width:90%;height:30px; margin-left:15px"/></br>
                    </br><h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Số điện thoại</h5>
                    <input class="tx" type="tell" id="s" name="sdt" value="'.$_SESSION['sdt'].'" placeholder="Số điện thoại" style="width:90%;height:30px; margin-left:15px"/></br></br>
                    <h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Email</h5>
                    <input class="tx" type="email" id="s" name="em" value="'.$_SESSION['em'].'" placeholder="Email" style="width:90%;height:30px; margin-left:15px"/></br></br>
                    <h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Ngày sinh</h5>
                    <input class="tx" type="date" id="s" name="ns" value="'.$_SESSION['ns'].'" placeholder="Ngày sinh" style="height:30px; margin-left:15px"/></br></br>
                    <h5 style="padding-left:12px; padding-top:10px; padding-bottom:5px; font-family:Playfair Display;">Giới tính</h5>
                    <input class="tx" type="text" id="s" name="gt" value="'.$_SESSION['gt'].'" placeholder="Giới tính" style="width:90%;height:30px; margin-left:15px"/></br></br>
                    <input class="bt" type="submit" id="x" value="Lưu" style="width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 180px;
    margin-top: 10px;
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

