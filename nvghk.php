<?php
           session_start();    
                        $maadhh= $_REQUEST['madonk'];
                        $link = mysqli_connect("localhost","root") or die ("khong the ket noi");
            mysqli_set_charset($link, 'UTF8');
            mysqli_select_db($link,"lagezrwa_sach");
            $tragthai=$_POST['trangthai'];  
            $sql5 = "SELECT * FROM chitietdonhang where madh=$maadhh";
            $result10 = mysqli_query($link,$sql5);
            $row10=mysqli_fetch_array($result10);
            $sld= $row10['soluongdat'];
            $mssachh=$row10['masach'];
                $sql = "Update donhang set tinhtrang='$tragthai' where madh='$maadhh'";
                mysqli_set_charset($link, 'UTF8');
                $res2=mysqli_query($link,$sql) or die("Can't Execute Query.."); 
                if($tragthai== "Không nhận hàng - Hoàn tất đơn hàng"){
                $sq5 = "Update sach set soluong=soluong + '$sld' where masach='$mssachh'";
                mysqli_set_charset($link, 'UTF8');
                $res5=mysqli_query($link,$sq5) or die("Can't Execute Query..");
            }
                header("location:dsdonhangduyet.php");
                  
//                       $sql = "Update donhang set mand ='$maand', trangthai='Gói hàng' where madh='$maadh'";
//                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
//			header("location:dsdonhang.php");
?>
