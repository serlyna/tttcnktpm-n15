<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tất cả đơn hàng</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php session_start();               
                    include ("headernvgh.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage" style="height: 400px;">
                  <h1 style="margin-left: 500px; color: #f46523">Chi tiết đơn hàng</h1>
                  <table border='1' WIDTH='100%' style="margin-left: 200px; margin-top: 10px;"> 
                    <tr>
                    <TD style="color:darkgreen" WIDTH='5%'><b><u>Mã chi tiết đơn hàng</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='5%'><b><u>Mã đơn hàng</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>Mã sách</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='5%'><b><u>Tên sách</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='10%'><b><u>Số lượng</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='10%'><b><u>Giá</u></b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $mdh=$_REQUEST['id'];
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM chitietdonhang where madh='$mdh'";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr>
                                                    <td>'.$row['mactdh'].'</td>
                                                    <td>'.$row['madh'].'</td>
                                                    <td>'.$row['masach'].'</td>
                                                    <td>'.$row['tensach'].'</td>
                                                    <td>'.$row['soluong'].'</td>
                                                    <td>'.$row['gia'].'</td>              
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
