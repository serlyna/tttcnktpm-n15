<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body{
    background-image: url('3160.jpg_wh860.jpg');
    background-size:cover;
}
        </style>
</head>
<body>
    
<p>Liên hệ chúng tôi</p>
 
<table border="1" width="50%" style="border-collapse: collapse;" class="center" >
<form method="POST" action="lienhe_form.php" >

<p>Thông tin liên hê:</p>
<p>Số điện thoại:  0389788787</p>
<p>Địa chỉ: 186 Lê Lợi, Phường 3, Quận Gò Vấp, TP.HCM</p>
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" required  name="username"></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="text" required name="phone"></td>
        
    </tr>
    <tr>
        <td>Email</td>
        <td><input  type="text"required name="email"></td>
    </tr>
    <tr>
        <td>Note</td>
        <td><textarea row="10" style="resize: none" required name="note"></textarea></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="submit" value="Gửi thông tin " ></td>
     </tr>

</form>


</table>
</body>
</html>