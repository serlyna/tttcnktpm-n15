<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chi tiết đơn hàng</title>
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
    font-size:16px;
    font-family: times;
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
}
</STYLE>
    <body>
        <div>
            <?php session_start();               
                    include ("headernvgh.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage" >
                  <h2 style="margin-left: 500px; color: BLUE">TẤT CẢ ĐƠN HÀNG</h2>
                  <table class="dh" border='1' WIDTH='100%' style=" margin-top: 10px; margin-left: 200px;margin-bottom: 100px;"> 
                    <tr>
                    <TD style=" width: 120px;height:40px;" ><b>MÃ ĐH</b></TD>
                    <TD style=" width: 120px;" ><b>MÃ CTDH</b></TD>
                    <TD style=" width: 250px;"><b>TÊN SÁCH</b></TD>
                    <TD style=""><b>SỐ LƯỢNG</b></TD>
                    <TD style=""><b>THÀNH TIỀN</b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $madhg=$_REQUEST['mdh'];
                    $sql="SELECT * FROM chitietdonhang inner join sach on sach.masach = chitietdonhang.masach where madh = $madhg";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {

                            echo '<tr>
                                <form action="nvghk.php" method="POST">';
                                             echo'       <td style="height:70px;"><input type="text" name="madonk" value="'.$row['madh'].'" style="width:50px;border:none;background:none;"></td>
                                                    <td style="height:70px;"><input type="text" name="madonk" value="'.$row['mactdh'].'" style="width:50px;border:none;background:none;"></td>
                                                    <td>'.$row['tensach'].'</td>
                                                    <td>'.$row['soluongdat'].'</td>
                                                    <td>'.$row['thanhtien'].'VNĐ</td>
                                             </form>
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
