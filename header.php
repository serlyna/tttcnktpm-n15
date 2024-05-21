<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOK | KLTN</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/cake.css" type="text/css">
  

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header"   style="background:#0b243b">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                            <div class="login-bar">
     
            <div class="choose-login"  style="background-color:white;">
                    <?php 
                            if(isset($_SESSION['status']))
                            {
                                    echo '<a href="updatethongtinnd.php" style="color:#8A0829">ℍ𝔼𝕃𝕃𝕆: '.$_SESSION['tnd'].'</a>'; 
                            }
                    ?>
            </div>
            <div class="choose-registration" style="background-color:white; ">
              <a href="xulidangxuat.php" style="color:black">𝕃𝕆𝔾 𝕆𝕌𝕋</a>       
            </div>
        </div>

                           </div>
                            <div class="header__logo" style="margin-right:50px;">
                                <a href="./index.php"><img src="img/blog/a.jpg" alt="" ></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right">
                                <a href="#" class="search-switch"></a>
                                    <a href="#"></a>
                                </div>
                                <div class="header__top__right__cart" >
                                    <a href="giohang.php"><img src="img/cart.png" alt=""> <span>*</span></a>
                                    <div class="cart__price"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container" >
            <div class="row"  >
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu"   style=" font-family: Playfair Display" >
                        <ul>
                        <li class="active"><a href="./index.php">Trang chủ</a></li>
                    
                            <li><a href="sach.php">Sản phẩm</a></li>
                            <li><a href="index.php#bar3">Sản phẩm nổi bật</a></li>
                             <li><a href="blog.php">Blog</a></li>
                             <li><a href="mainbot.php">ChatBot</a></li> 
                            <li><a href="congdong.php">Discuss</a></li>
                            <li><a href="wiss.php">Wishlist</a>
                               
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
   
    <!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>
