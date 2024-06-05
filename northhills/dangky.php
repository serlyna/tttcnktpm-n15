<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ĐĂNG KÍ</title>

    <!-- vendor css -->
    <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="./css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signup-wrapper" style=" background-color: #DDF3E8">
      <div class="az-column-signup-left" style="padding-top:180px; height:500px; background-color: #DDF3E8">
        <div>
          <i class="typcn typcn-chart-bar-outline"></i>
          <h1 style="font-size:28px;   font-weight:bold; color:blue">  𝕎𝕒𝕣 𝕋𝕙𝕦𝕟𝕕𝕖𝕣</h1>
          <h5>Your Passion is our Satisfaction</h5>
          <p>“Một ngày nào đó, nếu nghĩ đến chuyện kết hôn, hãy chọn một người mà trong mắt họ, con là duy nhất.</p>

<p>Ta đọc sách để biết mình không cô đơn. Ta đọc vì cô đơn. Ta đọc và không còn cô đơn. Ta không cô đơn nữa.</p>

<p>Có thể biết mọi điều cần thiết về một người chỉ bằng câu hỏi nhỏ: Cuốn sách yêu thích của anh là gì?</p>

<p>Đôi khi phải chờ tới thời điểm thích hợp, một cuốn sách nào đó mới tìm đến chúng ta.</p>

<p>Sau tất cả, bìa sách phải đẹp. Dẫu nội dung có hay đến mấy, tôi cũng không thừa thời gian cho mấy thứ xấu xí.”</p>
          <a href="https://listsach.com/blog/nhung-cau-noi-hay-nhat-ve-sach/" class="btn btn-outline-indigo">Learn More</a>
        </div>
      </div><!-- az-column-signup-left -->
      <div class="az-column-signup" >
        <h1 style="font-size:28px;   font-weight:bold; color:blue">  𝕎𝕒𝕣 𝕋𝕙𝕦𝕟𝕕𝕖𝕣</h1>
        <div class="az-signup-header">
        <form action="xulidangky.php" name="f1" method="post">
        <div class="form-group">
                <div class="textbox">
                <label>Tên tài khoản</label>
                    <input type="text" id="usn" class="form-control" size="20" name="tk" placeholder="Username" ></br>
                <label>Mật khẩu</label>
                    <input type="password" id="pw"  class="form-control" size="20" name="mk" placeholder="Password"> </br>
                <label>Nhập lại mật khẩu</label>
                    <input type="password" id="pwa"  class="form-control" size="20" name="nlmk" placeholder="Password"> </br>
                <label>Tên người dùng</label>
                <input type="text" id="tnd" size="20"  class="form-control" name="tnd" placeholder="Tên người dùng"></br>
                <label>Số điện thoại</label>
                    <input type="tell" id="sdt" size="20"  class="form-control" name="sdt" placeholder="Số điện thoại"></br>
                <label>Địa chỉ</label>
                    <input type="text" id="dc" size="20"class="form-control"  name="dc" placeholder="Địa chỉ" ></br>
                <label>Email</label>
                    <input type="email" id="em" size="20" class="form-control" name="em" placeholder="Email"></br>
                <label>Ngày sinh</label>
                    <input type="date" id="ns" size="20" class="form-control" name="ns"></br>
                
                </div>
                <input class="btn" tabindex="7" type="submit" name="s1" value="ĐĂNG KÝ" onclick="saveInfo()">
                <label id="errorMessage"></label>
                </div>
                <div class="row row-xs">
              <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button></div>
              <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><a href="<?= $authUrl ?>"><i class="fab fa-twitter"></i> Signup with Google</a></button></div>
            </div><!-- row -->
        </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
          <p>Already have an account? <a href="trangdangnhap.php">Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-column-signup -->
    </div><!-- az-signup-wrapper -->

    <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/ionicons/ionicons.js"></script>
    <script src="./js/jquery.cookie.js" type="text/javascript"></script>

    <script src="./js/azia.js"></script>
   
  </body>
</html>