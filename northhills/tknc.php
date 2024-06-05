<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main/tknc.css"/>
    </head>
    <body>
        
    </body>
    <style>
        *{
    margin: 0px;
    padding: 0px;
}

.left-menu{
    width: 250px;
}

.noidung{
    display: flex;
    margin: 0px 50px;
    margin-bottom: 20px;
}

.homepage{
    width: 800px;
    margin-top: 40px;
    margin-left: 100px;
}

.name{
    color: #f46523;
    margin-left: 120px;
    font-size: 30px;
    margin-bottom: 20px;
}

.menu{
    margin-bottom: 50px;
}

.btgh{
    width: 140px;
    height: 35px;
    background: #0b243b;
    border:none;
    margin-left: 330px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;
}
.tk{
    color:#0b243b;
    font-family:times;
    font-size:17px;
}
p{
    font-family:times;
    color:black;
    font-size:18px;
    margin-left:10px;
}
        </style>
</html>
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
        <link rel="stylesheet" type="text/css" href="main/chitietsach.css"/>
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
                <div class="tknc" id="tk" style="margin-left:25%; margin-top:70px;">
            <h5 class="tk">TÌM KIẾM NHANH</h5>
            <form method="GET" action="xulitkncvl.php">
                    <fieldset>
                    <p>Tên sách</p>
                    <input class="tx" type="text" id="s" name="sn" value="" placeholder="Tên sách"/>
                    <p>Tác giả</p>
                    <input class="tx" type="text" id="s" name="s" value="" placeholder="Tác giả"/>
                    <p>Năm xuất bản</p>
                    <input class="tx" type="text" id="s" name="se" value="" placeholder="Năm xuất bản"/></br></br>
                    <input style="background-color: #0b243b;" class="bt" type="submit" id="x" value="Tìm kiếm" />
                    </fieldset>
            </form>
        </div>
    </body>
</html>
