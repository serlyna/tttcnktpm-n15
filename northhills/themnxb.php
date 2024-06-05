
<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $query="insert into nhaxuatban(tennxb,diachinxb,sdtnxb,emailnxb)
			values('$tennxb','$dcnxb','$sdtnxb','$emnxb')";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $query);
    header("Location:dsnxb.php");
}

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
        <title>Thêm nhà xuất bản</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php             
                    include ("headerad.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage" style="width:100%">
                  <h2 style="margin-left: 40%; color: green">THÊM NHÀ XUẤT BẢN</h2>
            <div class="entry" >
                <form method='POST' enctype="multipart/form-data" style="margin-left: 35%;">

                                <br><b>Tên nhà xuất bản:</b><br>
                                <input type='text' name='tennxb' size='60'>
                                <br><br>
                                
                                <b>Địa chỉ NXB:</b><br>
                                <textarea cols="60" rows="6" name='dcnxb' ></textarea>
                                <br><br>

                                <b>Số điện thoại NXB:</b><br>
                                <input type='text' name='sdtnxb' size='60'>
                                <br><br>

                                <b>Email NXB:</b><br>
                                <input type='text' name='emnxb' size='60'>
                                <br><br>

                                <input  type='submit' name="submit"  value='   OK   '  >
                </form>
                </div>    
            
            </div>
        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
    </body>
</html>
