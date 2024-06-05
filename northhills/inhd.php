<html>
    <head>
        <meta charset="UTF-8">
        <title>Giỏ hàng</title>
        <style>
            body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}

.logo img{
    width: 200px;
    height: 100px;
}

.company {
    padding-top:40px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#000;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
        </style>
    </head>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="img/blog/a.jpg"/></div>
        <div class="company">Nhà sách North Hills</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <?php session_start();
  $conn=mysqli_connect("localhost","root")or die("Can't Connect...");
  $tenkh = $_GET['tenkh'];
$dchi = $_GET['dc'];
$sdth = $_GET['sdt'];
$ema = $_GET['em'];
$tenndd = $_GET['tnd'];
$madh = $_GET['mdh'];
$tongsotien = 0;
$pos = 1;
$q2="select * from donhang where madh='$madh'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress2=mysqli_query($conn,$q2) or die("wrong queryádas");
                        $row2=mysqli_fetch_array($ress2);
                        
$q1="select * from chitietdonhang inner join sach on chitietdonhang.masach = sach.masach where madh='$madh'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress=mysqli_query($conn,$q1) or die("wrong query");
                        if($row2['guitang'] == 0){
                        echo '
  <p>Tên người nhận:  '.$tenkh.'</p>
  <p>Số điện thoại:  '.$sdth.'</p>
  <p>Địa chỉ:  '.$dchi.'</p>
  <p>Email:  '.$ema.'</p></br>';
      }
      if($row2['guitang'] == 1){
          $q3="select * from guitang where madh='$madh'";
                        mysqli_set_charset($conn, 'UTF8');
			$ress3=mysqli_query($conn,$q3) or die("wrong queryádas");
                        $row3=mysqli_fetch_array($ress3);
 echo' <p>Tên người nhận:  '.$row3['tennn'].'</p>
  <p>Số điện thoại:  '.$row3['sdtgt'].'</p>
  <p>Địa chỉ:  '.$row3['diachigt'].'</p>
  <p>Email:  '.$row3['emailgt'].'</p></br>';
      }
  echo'<table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên sách</th>
      <th>Số lượng</th>
      <th>Thành tiền</th>
    </tr> ';
        while($row=mysqli_fetch_array($ress))
        {
        $tt = $row['thanhtien']; 
        echo "<tr>";
        echo "<td class=\"cotSTT\">".$pos++."</td>";
        echo "<td class=\"cotTenSanPham\">".$row['tensach']."</td>";
        echo "<td class=\"cotSoLuong\" align='center'>".$row['soluongdat']."</td>";
        echo "<td class=\"cotSo\">".$tt."</td>";
        echo "</tr> "; 
        $tongsotien = $tongsotien + $tt;
        }
        ?>
    <tr> 
      <td colspan="3" class=\"tong\">Tổng cộng</td> 
      <td class="cotSo"><?php echo number_format(($tongsotien),0,",",".")?></td>
       
      
    </tr>
  </table>
  <div class="footer-right"> Tp.HCM, ngày ..... tháng ..... năm .....<br/></br>
      Người giao hàng</br></br></br></br>
      <?php echo $tenndd ?> </div>
</div>
</body>
</html>