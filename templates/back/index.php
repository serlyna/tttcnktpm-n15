
<?php
session_start();
?>
<?php
$connect = new MySQLi('localhost', 'root', '', 'book');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['current-password'];
    echo $username;
    echo $password;
    $query = "select * from `admin` where `user`='$username' and `password`='$password'";
    $result = $connect->query($query);
    if (mysqli_num_rows($result) == 0)
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
    else {
        $result = mysqli_fetch_array($result);
        if ($result['status'] == 0) {
            echo "<script>alert('Tài khoản bị khóa')</script>";
        } else {
            $_SESSION['admin'] = $username;
            if(isset($_SESSION['admin'])) {
                header("Location: ./doc/index.php");
                exit();
            }
        }
    }

}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Đăng nhập quản trị</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/team.jpg" alt="IMG">
                </div>
                <!--=====TIÊU ĐỀ======-->
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP QUẢN TRỊ</b>
                    </span>
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form action="">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Tài khoản quản trị" name="username"
                                id="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu"
                                name="current-password" id="password-field">
                            <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>

                        <!--=====ĐĂNG NHẬP======-->
                        <div class="container-login100-form-btn">
                            <input type="submit" name="signin"  value="Đăng nhập" onclick="validate()"   />
                        </div>
                        <!--=====LINK TÌM MẬT KHẨU======-->
                        <div class="text-right p-t-12">
                            <a class="txt2" href="./forgot.php">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                    </form>
                    <!--=====FOOTER======-->
                    <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán sách nhóm 15 - IT6041001 </i>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Javascript-->
    <script src="/js/main.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        //show - hide mật khẩu
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password";
            }
        }
        $(".click-eye").click(function () {
            $(this).toggleClass("bx-show bx-hide");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
   
</body>

</html>
<?php
ob_end_flush()
?>
<script>
ClassicEditor
    .create(document.querySelector('#contact'))
    .catch(error => {
        console.error(error);
    });
</script>
<?php

// Kiểm tra xem session có tồn tại hay không
if(isset($_SESSION['username'])) {
    // Chuyển hướng đến trang index
    header("Location: index.html");
    exit();
}
?>