<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phiếu nhập</title>
        <link rel="stylesheet" type="text/css" href="main/donhang.css"/>
    </head>
    <style>
        *{
    margin: 0px;
    padding: 0px;
}

.left-menu{
    width: 250px;
}

.menu{
    margin-bottom: 50px;
}

.noidung{
    display: flex;
    margin: 0px 50px;
    margin-bottom: 20px;
}

.homepage{
    margin-top: 20px;
    margin-left: 10px;
}

.dh th, td{
    border:1px solid #868585;
    text-decoration: none;
    font-size: 16px;
    font-family:times;
    text-align:center;
}
.dh{
    border-collapse:collapse;
}
.dh tr:nth-child(odd){
    background-color:#eee;
}
.dh tr:nth-child(even){
    background-color:white;
}
.dh tr:nth-child(1){
    background-color:skyblue;
    color:black;
}
        </style>
    <body>
        <div>
            <?php session_start();               
                    include ("headernvk.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                  <h2 style="margin-left: 500px; color: #2D46B4">TẤT CẢ PHIẾU NHẬP</h2>
                  <table class="dh" border='1' WIDTH='100%'style="margin-left: 80px;"> 
                    <tr>
                    <TD style=" width: 90px;height:40px;"><b>MÃ PHIẾU </b></TD>
                    <TD style=" width: 200px;" ><b>TÊN NGƯỜI NHẬN</b></TD>
                    <TD style=" width: 400px;" ><b>TÊN SÁCH</b></TD>
                    <TD style="width: 150px;" ><b>SỐ LƯỢNG NHẬP</b></TD>
                    <TD style=" width: 150px;" ><b>NGÀY NHẬP</b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM phieunhap inner join sach on sach.masach=phieunhap.masach inner join nhanvien on nhanvien.manv=phieunhap.manv";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr>
                                                    <td style="height:50px;">'.$row['manhap'].'</td>
                                                    <td>'.$row['tennv'].'</td>
                                                    <td>'.$row['tensach'].'</td>
                                                    <td>'.$row['soluongnhap'].'</td>
                                                    <td>'.$row['ngaynhap'].'</td>
                                            </tr>';
                            }
                            }
                    ?>
            </TABLE>
            </div>
        </div>
        <div>
            <br>
            <br>
            <?php
                include("footernvk.php");
            ?>
        </div>
    </body>
</html>
