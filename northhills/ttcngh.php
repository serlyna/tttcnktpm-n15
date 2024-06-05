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
        p{
            font-family:times;
            font-size:20px;
        }
        </style>
    <body>
        <div>
            <?php session_start();
                include("headernvgh.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                <?php
                if(isset($_SESSION['status']))
                    {
                    echo '
                <h2 style="margin-left: 60%;margin-top: 20px; color: blue">THÔNG TIN CÁ NHÂN</h2>
                <form method="POST" action="xuliupgh.php" style="margin-left: 370px; width: 400px; margin-top: 30px">
                    <fieldset> 
                    <p>Tên người dùng</p>
                    <input class="tx" style="width:100%;" type="text" id="s" name="tnd" value="'.$_SESSION['tnd'].'" placeholder="Tên người dùng" /></br></br>
                    <p>Địa chỉ</p>
                    <input class="tx" style="width:100%;" type="text" id="s" name="dc" value="'.$_SESSION['dc'].'" placeholder="Địa chỉ"/></br></br>
                    <p>Số điện thoại</p>
                    <input class="tx" style="width:100%;" type="tell" id="s" name="sdt" value="'.$_SESSION['sdt'].'" placeholder="Số điện thoại"/></br></br>
                    <p>Email</p>
                    <input class="tx" style="width:100%;" type="email" id="s" name="em" value="'.$_SESSION['em'].'" placeholder="Email"/></br></br>
                    <p>Ngày sinh</p>
                    <input class="tx" style="width:100%;" type="date" id="s" name="ns" value="'.$_SESSION['ns'].'" placeholder="Ngày sinh"/></br></br>
                    <p>Giới tính</p>
                    <input class="tx" style="width:100%;" type="text" id="s" name="gt" value="'.$_SESSION['gt'].'" placeholder="Giới tính"/></br></br>
                    <input class="bt" type="submit" id="x" value="Lưu" style="width: 150px;
    height: 35px;
    background: #7070F7;
    border:none;
    margin-left:35%;
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

