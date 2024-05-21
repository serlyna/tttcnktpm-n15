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
    header("Location:nhapkho.php");
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
        <title>Sửa sách</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php 
                include("headernvk.php");
            ?>
        </div>

        <div class="noidung">
                
                <form method="POST" >
                    <h1 style="margin-left: 380px;margin-top: 20px; margin-bottom: 10px;color: #f46523">CHỈNH SỬA THÔNG TIN SÁCH</h1>
                    <fieldset style="margin-left:400px;"> 
                    <h4>Tên sách</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px; margin-left: 5px;" name="ts" value="" placeholder="Tên sách" />
                    <h4>Tên tác giả</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="ttg" value="" placeholder="Tên tác giả"/>
                    <h4>Danh mục</h4>
                    <select  name="mdm" style="width:90%; height:50px; margin-left: 5px;">
                                <?php
									
										
			
											$link = mysqli_connect("localhost","root","") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"vietbook");
                                                                                        $sql="SELECT * FROM danhmuc";
                                                                                        $result = mysqli_query($link,$sql);
											$dm=$_REQUEST['sdm'];
                                                                                echo'        <option>'.$dm.'</option>';
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '      
                                                                                            <option>'.$row['madm'].'</option> ';
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                    <h4>Nhà xuất bản</h4>
                    <select  name="manxb" style="width:90%; height:50px; margin-left: 5px;">
                                <?php
									
										
			
											$link = mysqli_connect("localhost","root","") or die ("khong the ket noi");
                                                                                        mysqli_set_charset($link, 'UTF8');
                                                                                        mysqli_select_db($link,"vietbook");
                                                                                        $sql="SELECT * FROM nhaxuatban";
                                                                                        $result = mysqli_query($link,$sql);
											$nxbm=$_REQUEST['snhaxb'];
                                                                                echo'        <option>'.$nxbm.'</option>';
											while ($row=  mysqli_fetch_array($result))
                                                                                        {
												
												
										echo '      
                                                                                            <option>'.$row['manxb'].'</option> ';
												
													
												}
												
											
											mysqli_free_result($result);
                                                                                        mysqli_close($link);
								?>
                                </select>
                    <h4>Năm xuất bản</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="nxb" value="" placeholder="Năm xuất bản"/></br></br>
                    <h4>Giá bán</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="g" value="" placeholder="Giá bán"/></br></br>
                    <h4>Nỗi bật</h4>
                    <input class="tx" type="text" id="s" style="width:90%; height:50px ; margin-left: 5px;" name="nb" value="" placeholder="Nỗi bật"/></br></br>
                    <input class="bt" type="submit" name="submit" id="x" value="Lưu" style="width: 200px;
    height: 35px;
    background: #f46523;
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
    </body>
</html>
