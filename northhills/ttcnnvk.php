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
    <body>
        <div>
            <?php session_start();
                include("headernvk.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                <?php
                if(isset($_SESSION['status']))
                    {
                    echo '
                <h1 style="margin-left: 380px;margin-top: 20px; color: #f46523">THÔNG TIN CÁ NHÂN</h1>
                <form method="POST" action="xuliudnvk.php" style="margin-left: 370px; width: 400px; margin-top: 30px">
                    <fieldset> 
                    <h4>Tên người dùng</h4>
                    <input class="tx" style="width:90%;" type="text" id="s" name="tnd" value="'.$_SESSION['tnd'].'" placeholder="Tên người dùng" /></br></br>
                    <h4>Địa chỉ</h4>
                    <input class="tx" style="width:90%;" type="text" id="s" name="dc" value="'.$_SESSION['dc'].'" placeholder="Địa chỉ"/></br></br>
                    <h4>Số điện thoại</h4>
                    <input class="tx" style="width:90%;" type="tell" id="s" name="sdt" value="'.$_SESSION['sdt'].'" placeholder="Số điện thoại"/></br></br>
                    <h4>Email</h4>
                    <input class="tx" style="width:90%;" type="email" id="s" name="em" value="'.$_SESSION['em'].'" placeholder="Email"/></br></br>
                    <h4>Ngày sinh</h4>
                    <input class="tx" style="width:90%;" type="date" id="s" name="ns" value="'.$_SESSION['ns'].'" placeholder="Ngày sinh"/></br></br>
                    <h4>Giới tính</h4>
                    <input class="tx" style="width:90%;" type="text" id="s" name="gt" value="'.$_SESSION['gt'].'" placeholder="Giới tính"/></br></br>
                    <input class="bt" type="submit" id="x" value="Lưu" style="width: 200px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-left:100px;
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
                include("footerad.php");
            ?>
        </div>
    </body>
</html>

