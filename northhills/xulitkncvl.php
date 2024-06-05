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

.noidung{
    display: flex;
    margin: 0px 50px;
    margin-bottom: 20px;
}

.homepage{
    margin-top: 20px;
}

.menu{
    margin-bottom: 50px;
}

.bangspnb{
    width: 100%;
    cellspacing:0;
    height: 200px;
    margin-left: 50px;
    background: #FAFAFA;
}

.spnoibat{
    margin-bottom: 10px;
    text-align: center;
    color: #f46523;
    font-size: 30px;
}

.cotspnoibat{
    valign: top;
    width:20%;
}

.cotspnoibat a{
    text-decoration: none;
    color: #2E2E2E;
}

.cotspnoibat a:hover{
    color: #0101DF;
}

.cotspnoibat img{
    margin-left: 55px;
    margin-top: 10px;
    margin-bottom: 20px;
}

.cotspnoibat p{
    color:#f46523;
    margin-top: 5px;
    font-size: 18px;
}

.btspnoibat{
    width: 140px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-left: 450px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;
}

.kcokq{
    margin-bottom: 10px;
    text-align: center;
    color: #f46523;
    font-size: 30px;
    margin-left: 250px;
}
        </style>
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
                <div class="menu">
                    <?php
                        include("menu.php");
                    ?>
                </div>
                <div>
                    <?php
                        include ("tkncid.php");
                    ?>
                </div>
            </div>
            <div class="hhomepage">
                        <?php
                        if($num > 0){
                        echo '<table class="bangspnb" border = "0" width="100%" cellspacing = "0">';
                        echo '<h2 style="color:green; font-family:times; margin-top:20px; font-family:Playfair Display;" class="spnoibat">Kết quả trả về </h2>';
                                $count=0;
                                while($row=mysqli_fetch_assoc($res))
                                {
                                        if($count==0)
                                        {
                                                echo '<tr>';
                                        }

                                        echo '<td class="cotspnoibat">';
                if(isset($_SESSION['status']))
                    { echo'
                    <a href="chitietsach.php?id='.$row['masach'].'">';
                            }
 else {
     echo'
                    <a href="chitietsachvl.php?id='.$row['masach'].'">';
 }
                    echo'
                    <img src="'.$row['hinhanh'].'" width="200" height="280"; style="margin-left:10px" >
                    <p style="text-align:center; color:black; font-size:18px; font-weight:bold;   font-family: Playfair Display;">'.$row['tensach'].'</p>
                    <p style="border:1px solid gray"></p>
                    <p style="text-align:center; font-family: times; font-weight:bold; color:red">'.$row['gia'].'₫</p>
                    <p style="text-align:center; font-size:13px;  color:black; font-family: times;  text-decoration: line-through;">'.$row['giagoc'].'₫</p>
                                        </td>';
                                        $count++;							

                                        if($count==4)
                                        {
                                                echo '</tr>';
                                                $count=0;
                                        }
                                }
                                echo '</table>';
                        }
                        else{
                            echo '<h2 class="kcokq" style="font-family: display; color:green; margin-top:50px">Không có kết quả trả về</h2>';
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