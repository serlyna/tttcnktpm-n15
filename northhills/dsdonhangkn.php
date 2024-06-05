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
            <div class="homepage" >
                <br>
                <h2 style="margin-left: 450px; color: #1c3e64">DANH SÁCH ĐƠN HÀNG KHÔNG NHẬN</h2>
                
                  <table class="dh" border='1' WIDTH='100%' style=" margin-top: 10px;"> 
                    <tr>
                    <TD style=" width: 20px;" ><b>MÃ ĐH</b></TD>
                    <TD style=" width: 150px;"><b>TÊN KH</b></TD>
                    <TD style=" width: 150px;"><b>ĐỊA CHỈ</b></TD>
                    <TD style=" width: 100px;"><b>SDT</b></TD>
                    <TD style=" width: 200px;" ><b>EMAIL</b></TD>
                    <TD style=" width: 100px"><b>TỔNG</b></TD>
                    <TD style="  width: 50px;text-align:center;" ><b>GỬI</b></TD>
                    <TD style=" width: 100px"><b>NGÀY ĐẶT</b></TD>
                    <TD style="" ><b>NGƯỜI GIAO</b></TD>
                    <TD style=""><b>TT</b></TD>
                    <TD style=" width: 50px"><b></b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","lagezrwa_sach","Sach1234567@") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM khachhang inner join donhang on khachhang.makh=donhang.makh inner join nhanvien on donhang.manv=nhanvien.manv where tinhtrang ='Không nhận hàng - Hoàn tất đơn hàng' ORDER BY tinhtrang ASC";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $madd = $row['madh'];
                            echo '<tr>
                                <form action="nvghk.php" method="POST">';
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
                                                    <td>'.$row['tennv'].'</td>
                                                    <td>'.$row['tinhtrang'].'</td>  
                                                    <td><a href="chitiet.php?mdh='.$madd.'">CT</a></td>
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
                include("footernvk.php");
            ?>
        </div>
    </body>
</html>
