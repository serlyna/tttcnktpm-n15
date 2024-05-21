<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm sách</title>
 <!-- vendor css -->
 <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="./css/azia.css">
    </head>
  
     
    <body>
        <div>
            <?php session_start();               
                    include ("headerad.php");
            ?>
        </div>

        <div class="noidung" >
            <div class="homepage">
                <br>
                  <h1 style="margin-left: 45%; color: #194D33">THÊM SÁCH</h1>
            <div class="entry" >
                <form action='xulinhapkho.php' method='POST' enctype="multipart/form-data" style="margin-left: 300px;">
                <div class="form-group" style="margin-left:15%; ">
                                <br><b>Tên sách:</b><br>
                                <input type='text' name='tnsach'  class="form-control" style="width:500px">
                                <br><br>

                                <b>Mã Danh mục:</b><br>
                                <select  name="dm" style="width: 500px;" class="form-control">
                                                <?php
									
										
			
											$link = mysqli_connect("localhost","root") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"lagezrwa_sach");
                                                                                        $sql="SELECT * FROM danhmuc";
                                                                                        $result = mysqli_query($link,$sql);
											
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '<option value="'.$row['madm'].'">  '.$row['tendm'];
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                                <br><br>
                                <b>Mã NXB:</b><br>
                                <select  name="mnxb" style="width: 500px;" class="form-control">
                                                <?php
									
										
			
											$link = mysqli_connect("localhost","root") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"lagezrwa_sach");
                                                                                        $sql="SELECT * FROM nhaxuatban";
                                                                                        $result = mysqli_query($link,$sql);
											
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '<option value="'.$row['manxb'].'">  '.$row['tennxb'];
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                                <br><br>
                                <b>Tên tác giả:</b><br>
                                <input type='text' name='ttg' style="width: 500px;" class="form-control">
                                <br><br>

                                <b>Năm xuất bản:</b><br>
                                <input type='text' name='nxb' style="width: 500px;" class="form-control">
                                <br><br>

                                <b>Giá giảm:</b><br>
                                <input type='text' name='gia' style="width: 500px;" class="form-control">
                                <br><br>
                                <b>Giá gốc:</b><br>
                                <input type='text' name='giagoc' style="width: 500px;" class="form-control">
                                <br><br>
                                <b>Miêu tả:</b><br>
                                <input type='text' name='mieuta' style="width: 500px;" class="form-control">
                                <br><br>
                                <b>Hình ảnh:</b><br>
                                <input type=file name='image' style="width: 500px;" class="form-control">

                                <br><br>
                                <b>Nỗi bật:</b><br>
                                <input type='text' name='nb'  style="width: 500px;" class="form-control">
                                <br><br>

                                <input  type='submit' name="submit"  value='   Lưu   '  >
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
