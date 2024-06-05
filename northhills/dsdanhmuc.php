<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cập nhật danh mục</title>
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
    font-family: times;
    font-size:18px;
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
    background-color:#42b67c;

}
        </style>
    <body>
        <div>
            <?php session_start();               
                    include ("headerad.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                  <h2 style="margin-left: 500px; color: #35895f">TẤT CẢ DANH MỤC</h2>
                  <a href="themdm.php"><input style="width: 100px;
    height: 35px;
    background:#56a67e;
    border:none;
    margin-left: 250px;
    margin-top: 20px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;" type="button" value="ADD"></a>
                  <table class="dh" border='1' WIDTH='100%' style="margin-left: 250px;"> 
                    <tr>
                    <TD style="color:black; height:40px;" WIDTH='5%'><b>MÃ DANH MỤC</b></TD>
                    <TD style="color:black" WIDTH='5%'><b>TÊN DANH MỤC</b></TD>
                    <TD style="color:black" WIDTH='5%'><b></b></TD>
                    <TD style="color:black" WIDTH='5%'><b></b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM danhmuc";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr>
                                                    <td>'.$row['madm'].'</td>
                                                    <td>'.$row['tendm'].'</td>
                                                    <td><a href=suadanhmuc.php?sid='.$row['madm'].'>Sửa</td>
                                                    <td><a href=xulixoadm.php?sid='.$row['madm'].'>Xóa</td>                 
                                            </tr>';
                            }
                            }
                    ?>
            </TABLE>
            </div>
        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
    </body>
</html>
