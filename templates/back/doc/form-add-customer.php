<?php
$connect = mysqli_connect('localhost','root','','book');
    if (isset($_POST['them'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = "select * from customer where user='$user' && password='$password'";
        if (mysqli_num_rows($connect->query($query))!=0){
            $alert = "Khách hàng đã tồn tại";
        } else {
            $name= $_POST['name'];
            $phone_number= $_POST['phone_number'];
            $address= $_POST['address'];
            $email= $_POST['email'];
            if ($_POST['gender']=="male") $gender = 0;
            else if ($_POST['gender']=="female") $gender=1;
            else $gender = 2;
            $connect->query("insert customer(user,password, fullname,gender,phone_number,address,email) values ('$user','$password', '$name',$gender,'$phone_number','$address','$email')");
            header("Location: table-data-customer.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm khách hàng mới</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../../image/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item active" href="table-data-table.php"><i class='app-menu__icon bx bx-id-card'></i>
          <span class="app-menu__label">Quản lý nhân viên</span></a></li>
          <li><a class="app-menu__item" href="table-data-customer.php"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item " href="table-data-author.php"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý tác giả</span></a></li>
      <li><a class="app-menu__item" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="table-data-banned.php"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý nội bộ
          </span></a></li>
      <li><a class="app-menu__item" href="table-data-money.php"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Bảng kê lương</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-bao-cao.php"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="page-calendar.php"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách khách hàng</li>
        <li class="breadcrumb-item"><a href="#">Thêm khách hàng mới</a></li>
      </ul>
    </div>
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">

        <div class="tile">

          <h3 class="tile-title">Tạo khách hàng</h3>
          <div class="tile-body">
            
            <form class="row">
            <div class="form-group col-md-4">
                <label class="control-label">User</label>
                <input class="form-control" type="text" name="user">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Password</label>
                <input class="form-control" type="password" name="password">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Tên khách hàng</label>
                <input class="form-control" type="text" name="name">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Giới tính</label>
                <br>
                    <label>
                        <input type="radio" name="gender" value="male"> Nam
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female"> Nữ
                    </label>
                    <label>
                        <input type="radio" name="gender" value="other"> Khác
                    </label>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Số điện thoại</label>
                <input class="form-control" type="text" name="phone_number">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ</label>
                <input class="form-control" type="text" name="address">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" name="email">
              </div>
              
            </div>
          </div>
          <input class="btn btn-save" type="submit" value="Lưu lại" name="them"></input>
          <a class="btn btn-cancel" href="table-data-customer.php">Hủy bỏ</a>
        </div>
  </form>
  </main>


 


  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>

</body>

</html>