<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xử lí đơn hàng</title>
        <link rel="stylesheet" type="text/css" href=""/>
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
    font-family:times;
    font-size:16px;
    color:black;
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
    background-color:#7ddd81;
}
        </style>
    <body>
        <div>
            <?php session_start();               
                    include ("headerad.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage" >
                  <h2 style="margin-left: 500px; color: #319635">DANH SÁCH ĐƠN HÀNG</h2>
                  
                  <table class="dh" border='1' WIDTH='100%' style=" margin-top: 10px;"> 
                    <tr>
                    <TD style="color:black;text-align:center; width: 20px;" ><b>MÃ ĐH</b></TD>
                    <TD style="color:black; width: 170px;"><b>TÊN KHÁCH HÀNG</b></TD>
                    <TD style="color:black; width: 150px;"><b>ĐỊA CHỈ</b></TD>
                    <TD style="color:black; width: 100px;"><b>SĐT</b></TD>
                    <TD style="color:black; width: 170px;" ><b>EMAIL</b></TD>
                    <TD style="color:black"><b>TỔNG TIỀN</b></TD>
                    <TD style="color:black"><b>NGÀY ĐẶT HÀNG</b></TD>
                    <TD style="color:black" ><b>TRẠNG THÁI</b></TD>
                    <TD style="color:black;width: 120px;"><b>NGƯỜI GH</b></TD>
                    <TD style="color:black;width: 40px;"></TD>
                    <TD style="color:black;width: 60px;"></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM khachhang inner join donhang on khachhang.makh=donhang.makh  where tinhtrang ='Chờ duyệt' ORDER BY ngaydat DESC";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                                $madd = $row['madh'];
                                
                            echo '<tr>
                                <form action="luunvgh.php" method="POST">
                                                    <td style="height:70px;"><input type="text" name="madon" value="'.$row['madh'].'" style="width:50px;border:none;background:none;"></td>
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
                                                    <td>'.$row['ngaydat'].'</td>
                                                    <td>'.$row['tinhtrang'].'</td>
                                                        
                                                    <td>
                                    <select name="tennvgh">';
                            $sql1="SELECT * FROM nhanvien where phanquyen='nvgiaohang'";
                                $result1 = mysqli_query($conn,$sql1);
                                echo'    <option>.........</option>';
                                    while($row12=mysqli_fetch_array($result1))
                            { 
                                        
                                echo'    <option>'.$row12['tennv'].'</option>';
                                         
                                    
                            }
                                
                                echo'    </select>
                                    
                                    </td>
                                    <td style="width:100px; text-align:center;">
                            <a href="luunvgh.php?id='.$row['madh'].'& sid='.$row12['manv'].'"><input type="submit" value="Lưu"  style=" width: 40px;height: 35px;background: #0b243b;border:none;margin-top: 10px;color: #FAFAFA;"></a>
                                        </td>  
                                         <td><a href="chitietad.php?mdh='.$madd.'">Chi tiết</a></td>
                                        </form>';
                                        
                                        echo'    </tr>';
                                            
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
