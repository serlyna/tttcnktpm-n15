<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sản phẩm nỗi bật</title>
        <link rel="stylesheet" type="text/css" href="">
    </head>
    <style>
    .cotspnoibat:hover img{
	transform: scale(1.5);
	transition: 1s;
    }
    *{
    margin: 0px;
    padding: 0px;
}

.noibat{
    margin-top: 40px;
    background: #F2F2F2;
}

.bangspnb{
    width: 95%;
    cellspacing:0;
    height: 400px;
  
    margin-left: 30px;
    background: #FAFAFA;
}

.spnoibat{
    margin-bottom: 10px;
    text-align: center;
    color: red;
    
    font-size: 30px;
}

.cotspnoibat{
    valign: top;
    width:350px;
    padding:5px;
}

.cotspnoibat a{
    text-decoration: none;
    color: #5f0afc;
    font-family:times;
  
  
}

.cotspnoibat a:hover{
    color: #0101DF;
}

.cotspnoibat img{
    margin-left: 2px;
    margin-bottom: 5px;
}

.cotspnoibat p{
    color:red;
    font-family:times;
    margin-top: 5px;
    font-size: 18px;
}

.btspnoibat{
    width: 200px;
    height: 35px;
    background: #3cb1d4;
    border:none;
    margin-left: 425px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.active {
  background-color: #717171;
}
    </style>

       
    <body>
            <?php
            $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:15;
            $current_page = !empty($_GET['page'])?$_GET['page']:1;
            $offset = ($current_page - 1) * $item_per_page;
            $sql="SELECT * FROM sach where noibat='co' order by masach asc LIMIT ".$item_per_page." OFFSET ".$offset."";
            $totalRecords = mysqli_query($link, "SELECT * FROM sach where noibat='co'");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
            $result = mysqli_query($link,$sql);
            echo '<table class="bangspnb" border = "0" width="100%" cellspacing = "0">';
            echo '<h2 class="spnoibat" style="color:#212529; font-family: Playfair Display; margin-top:20px;font-weight:bold"> SÁCH NỔI BẬT </h2>';
            $count=0;
            while ($row= mysqli_fetch_array($result))
            {
                if($count==0)
                {
                        echo '<tr>';
                }
                echo 
                '<td class="cotspnoibat">';
                if(isset($_SESSION['status']))
                    { echo'
                    <a href="chitietsach.php?id='.$row['masach'].'">';
                            }
 else {
     echo'
                    <a href="chitietsachvl.php?id='.$row['masach'].'">';
 }
                    echo'
                    <img src="'.$row['hinhanh'].'" width="200" height="280" style="margin-left:10px">
                    <p style="text-align:center; color:black; font-weight:bold; font-family: Playfair Display;">'.$row['tensach'].'</p>
                    <p style="border:1px solid #D8D8D8"></p>
                    <p style="text-align:center;  color:red; font-weight:bold; font-family: times;">'.$row['gia'].'₫</p>
                    <p style="text-align:center;  color:black;  font-family: times;  text-decoration: line-through;">'.$row['giagoc'].'₫</p>
            </td>';
                $count++;																		
                if($count==5)
                {
                        echo '</tr>';
                        $count=0;
                }
            }
            echo '</table>';
            include ("pagination.php");
                    mysqli_free_result($result);
                    mysqli_close($link);
        ?>
    </body>
</html>

