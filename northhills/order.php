
<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'vietbook');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='order.php'</script>";

}
 


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Sách</title>

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
</head>

<body>
   <!-- Page Preloder -->
   <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                <a href="#"><img src="img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/x1.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header"   style="background:#0b243b">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                            <div class="choose-login" style="background-color:white">
                <a href="trangdangnhap.php" style="color:black">ⓁⓄⒼⒾⓃ</a>
            </div>
            <div class="choose-registration"style="background-color:white">
              
            </div>
                            </div>
                            <div class="header__logo" style="margin-right:50px;">
                                <a href="./index.php"><img src="img/blog/a.png" alt="" ></a>
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
                    <nav class="header__menu mobile-menu"  style=" font-family: Playfair Display">
                    <ul>
                        <li class="active"><a href="./index.php">Trang chủ</a></li>
                    
                            <li><a href="sach.php">Sản phẩm</a></li>
                            <li><a href="index.php#bar3">Sản phẩm nổi bật</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="#">wisslist</a>
                               
                            </li>
                          
                            <li><a href="index.php#lienhe">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Order Sách</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Class Section Begin -->
    <section class="class-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/dg.jpg">
                                 
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">BẠN ĐẮT GIÁ BAO NHIÊU</a></h5>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/khi.jpg">
                                
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">KHI MỌI ĐIỂM TỰA ĐỀU MẤT</a></h5>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/sachcuoi.jpg">
                                   
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">SÁCH CƯỜI VÀ LÃNG QUÊN</a></h5>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/thang6.jpg">
                                   
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">THÁNG 6 TRỜI XANH NHẠT</a></h5>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/tt.jpg">
                                  
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">THẤT TỊCH KHÔNG MƯA</a></h5>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/pari.jpg">
                                   
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">PARI 55 NGÀY CẤM TÚC</a></h5>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop__pagination">
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="class__sidebar">
                        <h5>Bạn muốn sách gì? North Hills order giúp bạn</h5>
                      
                       
                        <div class="contact-form">
				  
					    <form name="contactus" method="post">
					    	<div>
						    	<span><label style="color:black">Họ $ Tên</label></span>
						    	<span><input type="text" name="fullname" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label >E-MAIL</label></span>
						    	<span><input type="email" name="emailid" required="ture" value=""></span>
						    </div>
						    <div>
						     	<span><label > Số điện thoại</label></span>
						    	<span><input type="text" name="mobileno" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label >Tên sách bạn muốn</label></span><br>
						    	<span><textarea name="description" required="true" style="width:100%"> </textarea></span>
						    </div>
						   <div>
						   		<span ><input type="submit" name="submit" value="Gửi cho North Hills" style=""></span>
						  </div>
					    </form>
				    </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- Footer Section Begin -->
    <?php
    include("footer.php")
    ?>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
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