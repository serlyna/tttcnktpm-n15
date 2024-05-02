<?php

session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="uft-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
</head>
<body>
    <h3>Đăng nhập</h3>
    <p>
<?php
if(isset($_SESSION["thongbao"])){
    echo $_SESSION["thongbao"];
    unset($_SESSION['thongbao']);
}
?>

    </p>
    <form  action="dangnhap1_submit.php" method="POST" >

<table>
<tr>

<td>Username:</td>
<td><input type="text" name="username"></td>

</tr>
<tr>
    <td>Passowrd:</td>
    <td><input type="password" name="password"></td>
</tr>
<tr>
    <td colspan="2">
        <button type="submit" name="submit">login </button>
        <button type="reset"> reset</button>


    </td>
</tr>
</table>


    </form>
</body>
</html>