<?php
$conn=mysqli_connect("localhost","root")or die("Can't Connect...");
           session_start();          
			$query="delete from chitietdonhang where mactdh =".$_REQUEST['mactdh'];
                        $query6="select * from chitietdonhang where madh =".$_REQUEST['sid'];
                        $result10 = mysqli_query($conn,$query6);
                        $row11=mysqli_fetch_array($result10);
                        $mactdhcon = $row11['mactdh'];
                        $sld= $_REQUEST['sld'];
                        $mssach=$_REQUEST['mas'];
                        $sql = "Update sach set soluong = soluong + '$sld' where masach='$mssach'";
                        $res2=mysqli_query($conn,$sql) or die("Can't Execute Query.."); 
			mysqli_query($conn,$query) or die("can't Execute...");
                        if($mactdhcon != $_REQUEST['sid']){
                        $query2="delete from guitang where madh =".$_REQUEST['sid'];
                        mysqli_query($conn,$query2);
                        $query1="delete from donhang where madh =".$_REQUEST['sid'];
                        mysqli_query($conn,$query1);
                        }
			header("location:donhang.php");

?>
