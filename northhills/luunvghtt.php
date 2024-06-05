<?php
           session_start();    
                        $maadhh= $_REQUEST['madonk'];
                        $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $tragthai=$_POST['trangthai'];  
                $sql = "Update donhang set tinhtrang='$tragthai' where madh='$maadhh'";
                 mysqli_set_charset($link, 'UTF8');
                $res2=mysqli_query($link,$sql) or die("Can't Execute Query.."); 
                header("location:dsdonhanggiao.php");
                  
//                       $sql = "Update donhang set mand ='$maand', trangthai='Gói hàng' where madh='$maadh'";
//                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
//			header("location:dsdonhang.php");
?>
