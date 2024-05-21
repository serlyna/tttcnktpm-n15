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
        <link rel="stylesheet" type="text/css"/>
    </head>
    <style>
        *{
    margin: 0px;
    padding: 0px;
}

.bangspnb{
    width: 100%;
    cellspacing:0;
    height: 200px;
    margin-left: 10px;
    background: white;
    margin-bottom: 20px;
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
    margin-left: 22px;
    margin-bottom: 20px;
}
    .cotspnoibat:hover img{
	transform: scale(1.5);
	transition: 1s;
    
       
    }


.cotspnoibat p{
    color:#f46523;
    margin-top: 5px;
    font-size: 18px;
}

.btspnoibat{
    width: 120px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-left: 400px;
    margin-top: 10px;
    border-radius: 15px;
    color: #FAFAFA;
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
        <?php
            $link = mysqli_connect("localhost","root","") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:15;
            $current_page = !empty($_GET['page'])?$_GET['page']:1;
            $offset = ($current_page - 1) * $item_per_page;
            $sql="SELECT * FROM sach order by masach asc LIMIT ".$item_per_page." OFFSET ".$offset." ";
            $totalRecords = mysqli_query($link, "SELECT * FROM sach");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
            $result = mysqli_query($link,$sql);
            echo '<table class="bangspnb" border = "0" width="100%" cellspacing = "0">';
            echo '<h2 class="spnoibat" style=" font-family: Playfair Display; font-weight:bold; color:#0b243b; margin-bottom:50px""> TẤT CẢ SÁCH</h2>';
            
            $count=0;
            while ($row=  mysqli_fetch_array($result))
            {
                if($count==0)
                {
                        echo '<tr>';
                }
                echo 
//                '<TR><TD>'.$row['hinhanh'].'</TD><TD>'.$row['tensach'].'</TD></TR>';     
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
                    <img src="'.$row['hinhanh'].'" width="210" height="290">
                    
                    <p style="text-align:center; color:black; font-size:18px; font-weight:bold;   font-family: Playfair Display;">'.$row['tensach'].'</p>
                    <p style="border:1px solid #D8D8D8"></p>
                 
                   <p style="text-align:center; font-family: times; margin-bottom:5px;font-weight:bold; color:red">'.$row['gia'].'₫</p>
                    <p style="text-align:center; font-size:14px;  color:black; font-family: times;  text-decoration: line-through;">'.$row['giagoc'].'₫</p>
                   
            </td>';
                $count++;																		
                if($count==4)
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
