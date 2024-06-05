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
        <link rel="stylesheet" type="text/css" href="main/sachad.css"/>
    </head>
    <body>
        <div>
            <?php session_start();               
                    include ("headernvk.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                  <h1 style="margin-left: 500px; color: #f46523">Tất cả sách</h1>
                  <a href="themsach.php"><input style="width: 200px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-top: 20px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;" type="button" value="Thêm sách"></a>
                      <table class="dh" border='1' WIDTH='100%'> 
                    <tr>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Mã sách</u></b></TD>
                    <TD style="color:darkgreen; width: 400px;"><b><u>Tên sách</u></b></TD>
                    <TD style="color:darkgreen; width: 150px;"><b><u>Tên tác giả</u></b></TD>
                    <TD style="color:darkgreen; width: 150px;"><b><u>Danh mục</u></b></TD>
                    <TD style="color:darkgreen; width: 100px;"><b><u>Tên nhà xuất bản</u></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Năm xuất bản</u></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Số lượng</u></b></TD>
                    <TD style="color:darkgreen; width: 70px;"><b><u>Giá bán</u></b></TD>
                    <TD style="color:darkgreen; width: 100px;"><b><u>Hình ảnh</u></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Nỗi bật</u></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Cập nhật</u></b></TD>
                    <TD style="color:darkgreen; width: 50px;"><b><u>Xóa</u></b></TD>
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
                                                   <td>'.$row['masach'].'</td>
                                                    <td>'.$row['tensach'].'</td>
                                                    <td>'.$row['tentacgia'].'</td>
                                                    <td>'.$row['tendm'].'</td>
                                                    <td>'.$row['tennxb'].'</td>
                                                    <td>'.$row['namxb'].'</td>
                                                    <td>'.$row['soluong'].'</td>
                                                    <td>'.$row['gia'].'</td>';
                                            echo "<td><img src='$row[hinhanh]' width='100px'/>";
                                            echo'   <td>'.$row['noibat'].'</td>';
                                            echo'   <td><a href=suakho.php?sdm='.$row['madm'].'&sid='.$row['masach'].'&snhaxb='.$row['manxb'].'&sl='.$row['soluong'].'>Sửa</td>';
                                            echo'   <td><a href=xulixoasach.php?sid='.$row['masach'].'>Xóa</td>
                                                    
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
