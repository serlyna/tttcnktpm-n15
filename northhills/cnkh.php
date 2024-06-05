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
        <link rel="stylesheet" type="text/css">
    </head>
    <style>
        *{
    margin: 0px;
    padding: 0px;
    font-family: Playfair Display;
    
}

.cnkh{
    height: 245px;
  
    margin-bottom: 30px;
    
    margin-top: 20px;
    border-bottom: 1px solid gray;
}

.cnkh a{
    text-decoration: none;
    color: #000;
    font-size: 16px;
    color:#0b243b;
    font-weight:bold;
   
}

.cnkh-item{
    height: 40px;
   padding-left:10px;
    border-top:1px solid gray;
    border-left:1px solid gray;
    border-right:1px solid gray;
    list-style: none;
    line-height: 40px;
}

.cnkh-item:hover{
    background: #0b243b;
    color: #fff;
}


        </style>
    <body>
   
        <ul class="cnkh">
                
                <a href="giohang.php"><li class="cnkh-item">Cập nhật giỏ hàng</li></a>
                <a href="dh.php"><li class="cnkh-item">Đặt hàng</li></a>
                <a href="updatethongtinnd.php"><li class="cnkh-item">Cập nhật thông tin cá nhân</li></a>
                <a href="xemdh.php"><li class="cnkh-item">Xem đơn hàng</li></a>
                <a href="donhang.php"><li class="cnkh-item">Cập nhật đơn hàng</li></a>
                <a href="doimk.php"><li class="cnkh-item">Đổi mật khẩu</li></a>
            </ul>
    </body>
</html>
