<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href=""/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <style>
        *{
    margin: 0px;
    padding: 0px;
  
}

.noibat{
    margin-top: 40px;
    background:#F2F6F8;
    margin-left:3%;
   
}

.bangspnb{
    width: 95%;
    cellspacing:0;
    height: 400px;
  
    margin-left: 30px;
    background: white;
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
.cotspnoibat:hover img{
	transform: scale(1.5);
	transition: 1s;
}
.cotspnoibat p{
    color:red;
    font-family:times;
    margin-top: 5px;
    font-size: 17px;
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
  max-width: 100%;
  position: relative;
  margin: auto;
  margin-left: 4%;
}

/* The dots/bullets/indicators */
.dot {
  height: 5px;
  width: 5px;
  margin: 0 2px;
  background-color: white;
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
        
      
        <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
        </script>
        
        <div class="noibat">
        <?php
            $link = mysqli_connect("localhost","root","") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $sql="SELECT * FROM sach where noibat='co' and masach<'149'";
            $result = mysqli_query($link,$sql);
            echo '<table class="bangspnb"  width="100%" cellspacing = "0">';
            echo '<h3 class="spnoibat" style="font-family:times; padding-top:10px; color:#0b243b;"> SẢN PHẨM NỔI BẬT</h3>';

            while ($row=  mysqli_fetch_array($result))
            {
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
                    <img src="'.$row['hinhanh'].'" width="210" height="290" style="margin-left: 9px;">
                    <br>
                    <p style="color:black; text-align:center; font-size:18px; font-weight:bold; " >'.$row['tensach'].'</p>
                    <p style="border:1px solid Silver"></p>
                    <p  style="color:red; text-align:center;font-size:18px; font-weight:bold;">'.$row['gia'].'₫</p>
                    <p  style="color:black; text-decoration:line-through; text-align:center;font-size:18px; font-weight:bold;">'.$row['giagoc'].'₫</p>
                </td>';
               
            }
            echo '<input type=button value=""Chi tiết>';
            echo '</table>';
            if(isset($_SESSION['status']))
                            { echo'
                    <a href="spnoibat.php"><input class="btspnoibat" type=button value="Xem thêm"></a>';
                            }
 else {
     echo'
                    <a href="sachnbvl.php"><input class="btspnoibat" type=button value="Xem thêm"  style="margin-left:40%; background:#0b243b;"></a>';
 }
                    mysqli_free_result($result);
                    mysqli_close($link);
        ?>
        </div>
    </body>
</html>
