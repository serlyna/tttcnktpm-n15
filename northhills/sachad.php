
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cập nhật sách</title>
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
    margin-left: 20px;
}

.dh th, td{
    border:1px solid #868585;
    text-decoration: none;
    font-family:times;
    font-size:16px;
}
.dh{
    border-collapse:collapse;
    margin-bottom: 10px;
}
.dh tr:nth-child(odd){
    background-color:#eee;
}
.dh tr:nth-child(even){
    background-color:white;
}
.dh tr:nth-child(1){
    background-color:#88ec8c;
}

.page{
    display: flex;
    height: 40px;
    justify-content:center;
}

.page-item{
    display: flex;
    align-items: center;
    justify-content:center;
    min-width: 40px;
    font-size: 20px;
    text-decoration: none;
    color: #000;
    border: 1px solid #BDBDBD;
}

.page-item:hover{
    background: #f46523;
}

.curren-page{
    display: flex;
    align-items: center;
    justify-content:center;
    min-width: 40px;
    font-size: 20px;
    text-decoration: none;
    color: #fff;
    border: 1px solid #BDBDBD;
    background: #000;
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
                  <h1 style="margin-left: 500px; color: #30875C; font-family:times;" >TẤT CẢ SÁCH</h1>
                  <a href="themsach.php"><input style="width: 150px;
    height: 35px;
    background: #3fbd7e;
    border:none;
    margin-top: 20px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;" type="button" value="ADD"></a>
                      <table class="dh" border='1' WIDTH='100%'> 
                    <tr>
                    <TD style="color:black; text-align:center; width: 50px; height:50px"><b>MÃ</b></TD>
                    <TD style="color:black; text-align:center; width: 250px;"><b>TÊN SÁCH</b></TD>
                    <TD style="color:black; text-align:center; width: 130px;"><b>TÊN TÁC GIẢ</b></TD>
                    <TD style="color:black; text-align:center; width: 120px;"><b>DANH MỤC</b></TD>
                    <TD style="color:black; text-align:center; width: 150px;"><b>TÊN NXB</b></TD>
                    <TD style="color:black; text-align:center; width: 50px;"><b>NXB</b></TD>
                    <TD style="color:black; text-align:center; width: 70px;"><b>SL</b></TD>
                    <TD style="color:black; text-align:center; width: 85px;"><b>GIÁ </b></TD>
                    <TD style="color:black; text-align:center; width: 120px;"><b>IMAGE</b></TD>
                    <TD style="color:black; text-align:center; width: 80px;"><b>NỔI BẬT</b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b</b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:5;
                    $current_page = !empty($_GET['page'])?$_GET['page']:1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $sql="SELECT * FROM sach inner join danhmuc on sach.madm=danhmuc.madm inner join nhaxuatban on sach.manxb=nhaxuatban.manxb order by tensach asc LIMIT ".$item_per_page." OFFSET ".$offset."";
                    $totalRecords = mysqli_query($conn, "SELECT * FROM sach inner join danhmuc on sach.madm=danhmuc.madm inner join nhaxuatban on sach.manxb=nhaxuatban.manxb");
                    $totalRecords = $totalRecords->num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr>
                                                   <td style="text-align:center">'.$row['masach'].'</td>
                                                    <td style="text-align:center">'.$row['tensach'].'</td>
                                                    <td style="text-align:center">'.$row['tentacgia'].'</td>
                                                    <td style="text-align:center">'.$row['tendm'].'</td>
                                                    <td style="text-align:center">'.$row['tennxb'].'</td>
                                                    <td style="text-align:center">'.$row['namxb'].'</td>
                                                    <td style="text-align:center">'.$row['soluong'].'cuốn</td>
                                                    <td style="text-align:center">'.$row['gia'].'VNĐ</td>';
                                            echo "<td><img src='$row[hinhanh]' width='100px'/>";
                                            echo'   <td style="text-align:center">'.$row['noibat'].'</td>';
                                            echo'   <td style="text-align:center"><a href=suasach.php?sdm='.$row['madm'].'&sid='.$row['masach'].'&snhaxb='.$row['manxb'].'>Sửa</td>';
                                            echo'   <td style="text-align:center"><a href=xulixoasach.php?sid='.$row['masach'].'>Xóa</td>
                                                    
                                            </tr>';
                            }
                            }
                    ?>
            </TABLE>
                  <?php
                    include ("pagination.php");
                  ?>
            </div>
        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
    </body>
</html>
