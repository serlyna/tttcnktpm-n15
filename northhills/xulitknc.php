<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
mysqli_select_db($conn,"lagezrwa_sach");
 session_start();
        $query ="";
	$search=$_GET['s'];
        $searchn=$_GET['sn'];
        $searche=$_GET['se'];
        mysqli_set_charset($conn, 'UTF8');
        if(isset($searchn)){
            $query="select *from sach where tensach like '%$searchn%'";
            if(isset($search)){
                $query .="AND tentacgia like '%$search%'";
            }
            if(isset($searche)){
                $query .="AND namxb like '%$searche%'";
            }
        }
        else if(isset ($search)){
            $query="select *from sach where tentacgia like '%$search%'";  
        }
        if(isset($searche)){
                $query .="AND namxb like '%$searche%'";
        }
        else if(isset ($searche)){
            $query="select *from sach where namsxb like '%$searche%'";
        }
	$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
        $num = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tất cả sách</title>
        <link rel="stylesheet" type="text/css" href="main/tkiemsach.css"/>
    </head>
    <body>
        <div>
            <?php 
                if(isset($_SESSION['status']))
                {
                       include("header.php");
                }
                else {
                    include ("header-kh.php");
                }
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
                        <?php
                        if($num > 0){
                        echo '<table class="bangspnb" border = "0" width="100%" cellspacing = "0">';
                        echo '<h2 style="color:green; font-family:times"class="spnoibat">KẾT QUẢ TRẢ VỀ</h2>';
                                $count=0;
                                while($row=mysqli_fetch_assoc($res))
                                {
                                        if($count==0)
                                        {
                                                echo '<tr>';
                                        }

                                        echo '<td class="cotspnoibat">
                                        <a href="chitietsach.php?id='.$row['masach'].'">
                                        <img src="'.$row['hinhanh'].'" width="220" height="320">
                                        <p style="color:blue; text-align:center; border-bottom:2px solid gray">'.$row['tensach'].'</p>
                                        <p style="text-align:center">'.$row['gia'].'VNĐ</p>
                                        </td>';
                                        $count++;							

                                        if($count==3)
                                        {
                                                echo '</tr>';
                                                $count=0;
                                        }
                                }
                                echo '</table>';
                        }
                        else{
                            echo '<h2 style="color:green" class="kcokq">Không có kết quả trả về</h2>';
                        }
                        ?>

            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>