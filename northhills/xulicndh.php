<?php
           session_start();    
                        $madhang= $_REQUEST['madonhang'];
                        $massach= $_REQUEST['msa'];
                        $slg= $_REQUEST['sooluong'];
                        $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $sql="SELECT * FROM chitietdonhang where madh='$madhang'";
            $result = mysqli_query($link,$sql);
            while ($row= mysqli_fetch_array($result))
            {     
                $slcu=$row['soluongnhap'];
                $sql = "Update sach set soluong =soluong+('$slcu'-'$slg') where masach='$massach'";
                 mysqli_set_charset($link, 'UTF8');
                $res2=mysqli_query($link,$sql) or die("Can't Execute Query.."); 
                 $sq2 = "Update chitietdonhang set soluongdat ='$slg' where madh='$madhang'";
                 mysqli_set_charset($link, 'UTF8');
                $res3=mysqli_query($link,$sql2) or die("Can't Execute Query.."); 
                header("location:dsdonhang.php");
            }         
//                        $sql = "Update donhang set mand ='$maand', trangthai='Gói hàng' where madh='$maadh'";
//                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
//			header("location:dsdonhang.php");
?>
