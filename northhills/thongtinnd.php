<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
        <div>
            <?php session_start();
                include("header.php");
            ?>
        </div>

        <div class="noidung">
            <div class="left-menu">
                <div class="menu">
                    <?php
                        include("menu.php");
                    ?>
                </div>
                <div>
                    <?php
                        include ("tknc.php");
                    ?>
                </div>
            </div>
            <div class="homepage">	
                <h1 style="margin-left: 300px; color: #f46523">THÔNG TIN CÁ NHÂN</h1>
                <table border='1' WIDTH='100%'>                   
                    <tr>
                    <TD style="color:darkgreen" WIDTH='50%'><b><u>TÊN NGƯỜI DÙNG</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='20%'><b><u>USENAME</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='20%'><b><u>PASSWORD</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>ĐỊA CHỈ</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>SỐ ĐIỆN THOẠI</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>EMAIL</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>NGÀY SINH</u></b></TD>
                    <TD style="color:darkgreen" WIDTH='25%'><b><u>GIỚI TÍNH</u></b></TD>
                    </tr>
                    
                    <?php     
                    if(isset($_SESSION['status']))
                    {
                    $conn = mysqli_connect("localhost","root") or die ("khong the ket noi");
                    mysqli_set_charset($conn, 'UTF8');
                    mysqli_select_db($conn,"lagezrwa_sach");
                    $sql="SELECT * FROM nhanvien";
                    $result = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            {
                            echo '<tr>
                                                    <td>'.$_SESSION['tnd'].'
                                                    <td>'.$_SESSION['unm'].'
                                                    <td>'.$_SESSION['uid'].'
                                                    <td>'.$_SESSION['dc'].'
                                                    <td>'.$_SESSION['sdt'].'
                                                    <td>'.$_SESSION['em'].'
                                                    <td>'.$_SESSION['ns'].'
                                                    <td>'.$_SESSION['gt'];'
                                            </tr>';
                            }
                            }
                    ?>
                    <tr>
                        <td colspan="9"><a href="updatethongtinnd.php"><input style="width: 200px;
    height: 35px;
    background: #f46523;
    border:none;
    margin-left: 400px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 15px;
    color: #FAFAFA;" type="button" value="Chỉnh sửa thông tin cá nhân"</a></td>
                    </tr>
            </TABLE>
            </div>
        </div>
        <div>
            <?php
                include("footer.php");
            ?>
        </div>
    </body>
</html>
