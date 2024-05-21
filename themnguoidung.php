
<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $ndk= date('y-m-d');
    $query="insert into nhanvien(tennv,usename,password,diachi,sdt,email,ngaysinh,gioitinh,ngaydangky,phanquyen)
			values('$tennd','$usn','$pw','$diachi','$sodt','$email','$ngaysinh','$gioitinh','$ndk','$pq')";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $query);
    header("Location:dsnguoidung.php");
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
        <title>Thêm người dùng</title>
 <!-- vendor css -->
 <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="./css/azia.css">
    </head>
    <body>
        <div>
            <?php             
                    include ("headerad.php");
            ?>
        </div>

        <div class="noidung">
            <div class="homepage">
                  <h2 style="margin-left: 550px; margin-top:50px; color:#4b914e">THÊM NGƯỜI DÙNG</h2>
            <div class="entry" >
                <form method='POST' enctype="multipart/form-data" style="margin-left: 32%;">
                <div class="form-group ">
                                <br><b>Tên nhân viên:</b><br>
                                <input type='text' name='tennd' style="height:30px; width:500px" class="form-control">
                                <br><br>
                                
                                <b>Username:</b><br>
                                <textarea cols="40" rows="6" name='usn'style="height:30px; width:500px" class="form-control" ></textarea>
                                <br><br>

                                <b>Password:</b><br>
                                <input type='password' name='pw' style="height:30px; width:500px" class="form-control">
                                <br><br>

                                <b>Địa chỉ:</b><br>
                                <input type='text' name='diachi'style="height:30px; width:500px" class="form-control">
                                <br><br>

                                <b>Số điện thoại:</b><br>
                                <input type='text' name='sodt' style="height:30px; width:500px" class="form-control">
                                <br><br>

                                <b>Email:</b><br>
                                <input type='email' name='email'style="height:30px; width:500px" class="form-control">
                                <br><br>


                                <b>Ngày sinh:</b><br>
                                <input type='date' name='ngaysinh' style="height:30px; width:500px" class="form-control">
                                <br><br>

                                <b>Giới tính:</b><br>
                                <select name="gioitinh" style="height:30px; width:500px" class="form-control">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                                <br>
                                
                                <b>Phân quyền:</b><br>
                                <select name="pq" style="height:30px; width:500px" class="form-control">
                                    <option>nvkho</option>
                                    <option>nvgiaohang</option>
                                </select>
<!--                                <input type='text' name='pq' size='40'>
-->                                <br><br>
                                <input  type='submit' name="submit"  value='   Thêm   '  style="width: 200px;
    height: 35px;
    background:green;
    border:none;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;">
                </form>
                </div>    
            
            </div>
        </div>
        <div>
            <?php
                include("footerad.php");
            ?>
        </div>
        <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/ionicons/ionicons.js"></script>
    <script src="./js/jquery.cookie.js" type="text/javascript"></script>

    <script src="./js/azia.js"></script>
    </body>
</html>
