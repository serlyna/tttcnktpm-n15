<?php
 session_start();
 extract($_POST);
 extract($_SESSION);
     $link = mysqli_connect("localhost","root") or die("Khong the ket noi den MySQL");
if(isset($submit)){
    $db_selected = mysqli_select_db($link, "lagezrwa_sach");
    $ms=$_REQUEST['sid'];
    $sql = "Update sach set madm='$mdm', manxb='$manxb', tensach = '$ts', tentacgia='$ttg', namxb='$nxb', gia='$g', noibat='$nb' where masach='$ms'";
    mysqli_set_charset($link, 'UTF8');
    $rs = mysqli_query($link, $sql);
    header("Location:sachad.php");
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
        <title>Edit sách</title>
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
       
                <form method="POST"  >
                <div class="form-group" style="font-family:times; font-size:16px;">
                    <h2 style="margin-left: 40%;margin-top: 20px; margin-bottom: 10px;color: #4caf50">CHỈNH SỬA THÔNG TIN SÁCH</h2>
                    <fieldset style="margin-left:400px;"> 
                    <br><b>Tên sách:</b><br>
                    <input class="form-control" type="text" id="s" style="width:60%; height:40px;" name="ts" value="" placeholder="Tên sách" />
                    <br><b>Tên tác giả</b><br>
                    <input class="form-control" type="text" id="s" style="width:60%; height:40px; ; margin-left: 5px;" name="ttg" value="" placeholder="Tên tác giả"/>
                    <br><b>Danh mục:</b><br>
                    <select  name="mdm" style="width:60%; height:40px;;  "class="form-control">
                                <?php
									
										
			
											$link = mysqli_connect("localhost","lagezrwa_sach","Sach1234567@") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"lagezrwa_sach");
                                                                                        $sql="SELECT * FROM danhmuc";
                                                                                        $result = mysqli_query($link,$sql);
											$dm=$_REQUEST['sdm'];
                                                                                echo'        <option>'.$dm.'</option>';
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '      
                                                                                            <option value="'.$row['madm'].'">  '.$row['tendm'];
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                                <br><b>Nhà xuất bản:</b><br>
                    <select  name="manxb" style="width:60%; height:40px;" class="form-control">
                                <?php
									
										
			
											$link = mysqli_connect("localhost","lagezrwa_sach","Sach1234567@") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"lagezrwa_sach");
                                                                                        $sql="SELECT * FROM nhaxuatban";
                                                                                        $result = mysqli_query($link,$sql);
											$nxbm=$_REQUEST['snhaxb'];
                                                                                echo'        <option>'.$nxbm.'</option>';
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '      
                                                                                            <option value="'.$row['manxb'].'">  '.$row['tennxb'];
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                                <br><b>Năm xuất bản:</b><br>
                    <input class="form-control" type="tell" id="s" style="width:60%; height:40px;" name="nxb" value="" placeholder="Năm xuất bản"/></br></br>
                    <br><b>Giá bán:</b><br>
                    <input class="form-control" type="text" id="s" style="width:60%; height:40px;" name="g" value="" placeholder="Giá bán"/></br></br>
                    <br><b>Nổi bật:</b><br>
                    <input class="form-control" type="text" id="s" style="width:60%; height:40px;" name="nb" value="" placeholder="Nỗi bật"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Lưu" style="width: 200px;
    height: 35px;
    background: green;
    border:none;
    margin-left: 120px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;"/>
                    </fieldset>
            </form>

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
