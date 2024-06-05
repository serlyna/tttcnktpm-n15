<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đơn hàng</title>
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
    background-color:#0b243b;
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
                  <div class="homepage">
                  <h2 style="margin-left: 400px; color: #0b243b; font-family:Playfair Display; font-weight:bold;">ĐƠN HÀNG</h2>
                  <table class="dh" border='1' WIDTH='100%' style=" margin-top: 10px; margin-left: 20px;"> 
                    <tr>
                    <TD style="color:white; text-align:center;width: 60px; height:40px;" ><b>MÃ ĐH</b></TD>
                    <TD style="color:white; text-align:center; width: 300px;" ><b>TÊN SÁCH</b></TD>
                    <TD style="color:white; text-align:center; width: 100px;" ><b>SỐ LƯỢNG</b></TD>
                    <TD style="color:white; text-align:center; width: 110px;" ><b>THÀNH TIỀN</b></TD>
                    <TD style="color:white; text-align:center; width: 120px;" ><b>NGÀY ĐẶT</b></TD>
                     <TD style="color:white; text-align:center;" ><b>TRẠNG THÁI</b></TD>
                    <TD style="color:white; text-align:center;" ><b>GỬI TẶNG</b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    $mnd=$_SESSION['mnd'];
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM donhang inner join chitietdonhang on donhang.madh =  chitietdonhang.madh inner join sach on sach.masach = chitietdonhang.masach where makh =$mnd ORDER BY tinhtrang ASC";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr style="height: 60px;">
                                                    <td style="text-align:center;">'.$row['madh'].'</td>
                                                    <td style="padding-left:10px;">'.$row['tensach'].'</td>
                                                    <td style="text-align:center;">'.$row['soluongdat'].'</td>
                                                    <td style="text-align:center;">'.$row['thanhtien'].'VNĐ</td>
                                                    <td style="text-align:center;">'.$row['ngaydat'].'</td>
                                                    <td style="text-align:center;">';
                                                    if($row['guitang'] == 1){
                                                    echo'    Có';
                                                    }
                                                    echo'    </td>';
                            echo '    <td style="text-align:center;">'.$row['tinhtrang'].'</td>  
                               </tr>'; 
                            }
                            }
                    ?>
            </TABLE>
            </div>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>
