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
<br>
        <div class="noidung">

            <div class="homepage" style="margin-bottom: 100px;">
                  <h2 style="margin-left: 500px; color: blue">TẤT CẢ ĐƠN HÀNG</h2>
                  <table class="dh"> 
                    <tr>
                    <TD style=" width: 50px;" ><b>MÃ ĐH</b></TD>
                    <TD style=" width: 150px;"><b>TÊN KH</b></TD>
                    <TD style=" width: 150px;"><b>ĐỊA CHỈ</b></TD>
                    <TD style=" width: 100px;"><b>SĐT</b></TD>
                    <TD style=" width: 200px;" ><b>EMAIL</b></TD>
                    <TD style="width: 80px;"><b>TỔNG TIỀN</b></TD>
                    <TD style=" width: 50px; text-align:center;" ><b>GỬI</b></TD>
                    <TD style="width: 100px;"><b>NGÀY ĐẶT</b></TD>
                    <TD style="width: 100px;"><b>TRẠNG THÁI</b></TD>
                    <TD style=""><b>SỬA TRẠNG THÁI</b></TD>
                    <TD style=" width:70px;"><b></b></TD>
                    <TD style=" width:70px;"><b></b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $mandd=$_SESSION['mnd'];
                    $sql="SELECT * FROM khachhang inner join donhang on khachhang.makh=donhang.makh inner join nhanvien on donhang.manv=nhanvien.manv where donhang.manv =$mandd and tinhtrang='Đang vận chuyển'";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $madd = $row['madh'];
                            echo '<tr>
                                <form action="luunvghtt.php" method="POST">';
                                             echo'       <td style="height:70px;"><input type="text" name="madonk" value="'.$row['madh'].'" style="width:50px;border:none;background:none;"></td>
                                                    <td>';
                                                    $sql10="SELECT * FROM  guitang where madh =$madd ";
                                $result10 = mysqli_query($conn,$sql10);
                                                    if($row['guitang'] == 1){
                                                        while($row10=mysqli_fetch_array($result10))
                                { 
                                                echo'    '.$row10['tennn'].' ';
                                }
                                                    }
                                                    
                                                    if($row['guitang'] == 0){
                                                        
                                                echo'    '.$row['tenkh'].' ';
                                                    }
                                
                                                    echo'    </td>
                                                    <td>';
                                                    $sql10="SELECT * FROM  guitang where madh =$madd ";
                                $result10 = mysqli_query($conn,$sql10);
                                                    if($row['guitang'] == 1){
                                                        while($row10=mysqli_fetch_array($result10))
                                { 
                                                echo'    '.$row10['diachigt'].' ';
                                }
                                                    }
                                                    
                                                    if($row['guitang'] == 0){
                                                        
                                                echo'    '.$row['diachikh'].' ';
                                                    }
                                                    echo'    </td>
                                                    <td>';
                                                    $sql10="SELECT * FROM  guitang where madh =$madd ";
                                $result10 = mysqli_query($conn,$sql10);
                                                    if($row['guitang'] == 1){
                                                        while($row10=mysqli_fetch_array($result10))
                                { 
                                                echo'    '.$row10['sdtgt'].' ';
                                }
                                                    }
                                                    
                                                    if($row['guitang'] == 0){
                                                        
                                                echo'    '.$row['sdtkh'].' ';
                                                    }
                                                    echo'    </td>
                                                    <td>';
                                                    $sql10="SELECT * FROM  guitang where madh =$madd ";
                                $result10 = mysqli_query($conn,$sql10);
                                                    if($row['guitang'] == 1){
                                                        while($row10=mysqli_fetch_array($result10))
                                { 
                                                echo'    '.$row10['emailgt'].' ';
                                }
                                                    }
                                                    
                                                    if($row['guitang'] == 0){
                                                        
                                                echo'    '.$row['emailkh'].' ';
                                                    }
                                                    echo'    </td>
                                                    <td>'.$row['tongtien'].'VNĐ</td>
                                                    <td style="text-align:center;">';
                                                    if($row['guitang'] == 1){
                                                    echo'    Có';
                                                    }
                                                    echo'    </td>
                                                    <td>'.$row['ngaydat'].'</td>
                                                    <td>'.$row['tinhtrang'].'</td>
                                                    <td>
                                                    <select name="trangthai">
                                                    <option>
                                                    '.$row['tinhtrang'].'
                                                        <option>Giao hàng thành công</option>
                                                        <option>Không nhận hàng</option>
                                                        </select>
                                                        </td>
                                                    
                                             <td style="text-align: center;"><a href="luunvgh.php?"><input type="submit" value="Lưu"  style=" width: 40px;height: 30px;background: #f46523;border:none;margin-top: 10px;color: #FAFAFA;"></a></td>
                                              <td><a href="chitietgh.php?mdh='.$madd.'">Chi tiết</a></td>
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
