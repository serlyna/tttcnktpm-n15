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
        <link rel="stylesheet" type="" >
       

    </head>
    <style>
        *{
    margin: 0px;
    padding: 0px;
}

.table{
    width: 250px;
   margin-top:15%;
   
    border:1px solid  #BDBDBD;
   
   
}

.danhmuc{
     height: 20px;
     background: #0b243b;
     color: #fff;
    
}

.tendm{
  
   color:#0b243b;
    
    font-size:17px;
}

.tendm:hover{
    background:#0b243b;
}

.tendm a{
    text-decoration: none;
    color: #0b243b;
    margin-left:10px;
    
    
  
    
}

.tendm a:hover{
    color: white;
    
	
}



        </style>
    <body >

     

        <?php
        $link = mysqli_connect("localhost","root","") or die ("khong the ket noi");
        mysqli_set_charset($link, 'UTF8');
        mysqli_select_db($link,"lagezrwa_sach");
        $sql="SELECT * FROM danhmuc";
        $result = mysqli_query($link,$sql);
        echo '<table class=table >';
        echo '<TR><TH class="danhmuc" style="font-family:Playfair Display; font-size:17px;">DANH MỤC SẢN PHẨM</TH></TR>';
//        echo '<TH background="#f46523" color="#fff">';
        while ($row=  mysqli_fetch_array($result))
        {
            if(isset($_SESSION['status']))
                            {
                                    echo 
            '<TR><TD class="tendm " style="font-family: Playfair Display;"><a href="sachdm.php?madm='.$row['madm'].'">'.$row['tendm'].'</a></TD></TR>';
                            }
            else{
                echo 
            '<TR  style="font-family: Playfair Display; text-align:left;  font-size:17px;"><TD class="tendm"><a href="sachdmvl.php?madm='.$row['madm'].'">'.$row['tendm'].'</a></TD></TR>';  
            }
                      
        }
        echo '</table>';
        mysqli_free_result($result);
        mysqli_close($link);
        ?>
    </body>
</html>
