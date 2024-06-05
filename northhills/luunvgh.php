<?php
           session_start();    
                        $maadh= $_REQUEST['madon'];

                 
                       
                        
                       
                        $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $tengh=$_POST['tennvgh'];
            $sql="SELECT * FROM nhanvien where tennv='$tengh'";
            $result = mysqli_query($link,$sql);
            while ($row= mysqli_fetch_array($result))
            {
                   
                $mand=$row['manv'];

                $sql = "Update donhang set manv ='$mand', tinhtrang='Gói hàng' where madh='$maadh'";
                 mysqli_set_charset($link, 'UTF8');
                $res2=mysqli_query($link,$sql) or die("Can't Execute Query.."); 
                header("location:dsdonhang.php");
            }         
//                        $sql = "Update donhang set mand ='$maand', trangthai='Gói hàng' where madh='$maadh'";
//                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
//			header("location:dsdonhang.php");
?>
