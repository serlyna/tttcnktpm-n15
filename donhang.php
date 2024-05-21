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
                  <div class="homepage" >
                  <h2 style="margin-left: 400px; color: #0b243b; font-family:Playfair Display; font-weight:bold">ĐƠN HÀNG</h2>
                  <table class="dh" border='1' WIDTH='100%' style=" margin-top: 10px; margin-left: 20px;"> 
                    <tr>
                    <TD style="color:white; text-align:center;width: 60px; height:50px;" ><b>Mã ĐH</b></TD>
                    <TD style="color:white; text-align:center; width: 300px;" ><b>Tên sách</b></TD>
                    <TD style="color:white; text-align:center; width: 80px;" ><b>Số lượng</b></TD>
                    <TD style="color:white; text-align:center; width: 100px;" ><b>Tổng tiền</b></TD>
                    <TD style="color:white; text-align:center; width: 100px;" ><b>Ngày đặt</b></TD>
                    <TD style="color:white; text-align:center;" ><b>Thanh toán</b></TD>
                    <TD style="color:white; text-align:center;" ><b>Gửi tặng</b></TD>
                    <TD style="color:white; text-align:center;" ><b>Trạng thái</b></TD>
                    <TD style="color:white; text-align:center; width: 70px;" ><b>Edit</b></TD>
                    <TD style="color:white; text-align:center;" ><b>Hủy </b></TD>
                     
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    $mnd=$_SESSION['mnd'];
                    mysqli_select_db($conn,"lagezrwa_sach");
                        $sql="SELECT * FROM donhang inner join chitietdonhang on donhang.madh =  chitietdonhang.madh inner join sach on sach.masach = chitietdonhang.masach where makh =$mnd and tinhtrang='Chờ duyệt' ORDER BY ngaydat DESC";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr style="height: 60px;">
                                                    <td style="text-align:center;">'.$row['madh'].'</td>
                                                    <td style="padding-left:10px">'.$row['tensach'].'</td>
                                                    <td style="text-align:center;">'.$row['soluongdat'].'</td>
                                                    <td style="text-align:center;">'.$row['thanhtien'].'VNĐ</td>
                                                    <td style="text-align:center;">'.$row['ngaydat'].'</td>
                                                    <td style="text-align:center;"><a href="./vnpay_php/index.php" style="color:black; ">Thanh toán VN PAY</td>
                                                    <td style="text-align:center;">';
                                                    if($row['guitang'] == 1){
                                                    echo'    Có';
                                                    }
                                                    echo'    </td>
                                                    <td style="text-align:center;">'.$row['tinhtrang'].'</td>
                                                    <td style="text-align:center;"><a href=suadh.php?sid='.$row['madh'].'&sld='.$row['soluongdat'].'&mas='.$row['masach'].'&mactdh='.$row['mactdh'].'><input type="button" value="Sửa" style= "width: 50px;height: 30px;background: #0b243b;border:none;border-radius: 5px;color: #FAFAFA;"></td>
                             <td style="text-align:center;">';
                                                    if($row['tinhtrang']=='Chờ duyệt'){
                            echo'                       <a href=huydh.php?sid='.$row['madh'].'&sld='.$row['soluongdat'].'&mas='.$row['masach'].'&mactdh='.$row['mactdh'].'><input type="button" value="Hủy" style= "width: 50px;height: 30px;background: #0b243b;border:none;border-radius: 5px;color: #FAFAFA;"></td>';       
                                            }
                        echo'        </tr>';
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
