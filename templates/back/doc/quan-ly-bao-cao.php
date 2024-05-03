<?php 
    $connect = new MySQLi('localhost', 'root', '', 'book');
    $queryNumberOfMembers = "select * from customer";
    $resultNumberOfMembers = mysqli_num_rows($connect->query($queryNumberOfMembers));
    $queryNumberOfProduct = "select * from product";
    $resultNumberOfProduct = mysqli_num_rows($connect->query($queryNumberOfProduct));
    //Sap het hang
    $queryNumberOfProduct1 = "select * from product WHERE quantity > 0 and quantity <= 10";
    $resultNumberOfProduct1 = mysqli_num_rows($connect->query($queryNumberOfProduct1));
    $resultOfProduct1 = $connect->query($queryNumberOfProduct1);
    //Het hang
    $queryNumberOfProduct2 = "select * from product WHERE quantity = 0 ";
    $resultNumberOfProduct2 = mysqli_num_rows($connect->query($queryNumberOfProduct2));
    $resultOfProduct2 = $connect->query($queryNumberOfProduct2);


    $queryNumberOfOrder = "SELECT * FROM `orders`";
    $resultNumberOfOrder = mysqli_num_rows($connect->query($queryNumberOfOrder));
    // Lấy ngày đầu tiên và cuối cùng của tháng hiện tại
    $firstDayOfMonth = date('Y-m-01');
    $lastDayOfMonth = date('Y-m-t');
    
    $queryNumberOfOrder1 = "SELECT * FROM `orders` WHERE datetime_note BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";
    $resultNumberOfOrder1 = mysqli_num_rows($connect->query($queryNumberOfOrder));
    
    echo "Số lượng đơn hàng trong tháng này: " . $resultNumberOfOrder;
    $queryRevenue = "SELECT price, quantity FROM order_detail JOIN `orders` ON order_detail.id_order = `orders`.id_order WHERE `orders`.status != 4";
    $resultRevenue = $connect->query($queryRevenue);
    
    if ($resultRevenue && $resultRevenue->num_rows > 0) {
      $total = 0;
      while ($row = $resultRevenue->fetch_assoc()) {
        $price = $row['price'] * $row['quantity'];
        $total += $price;
      }
    } else {
      $total = 0;
    }
      $Total = number_format($total, 0, ',', '.');
      $sql = "SELECT MONTH(datetime_note) AS months, SUM(order_detail.quantity) AS total_sales,SUM(order_detail.quantity*order_detail.price) AS total
      FROM orders
      INNER JOIN order_detail ON orders.id_order = order_detail.id_order
      WHERE datetime_note >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
      GROUP BY MONTH(datetime_note)
      ORDER BY MONTH(datetime_note)";

$result3 = $connect->query($sql);
    $monthLabels = array();
    $salesData = array();
    $sales = array();
    while ($row = $result3->fetch_assoc()) {
    $monthLabels[] = "Tháng " . $row['months'];
    $salesData[] = $row['total_sales'];
    $sales[] = $row['total'];
}

// Chuyển đổi mảng thành chuỗi JSON để sử dụng trong mã JavaScript
$monthLabelsJSON = json_encode($monthLabels);
$salesDataJSON = json_encode($salesData);
$saleJSON = json_encode($sales);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
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
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
            <li><a class="app-menu__item " href="table-data-author.php"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý tác giả</span></a></li>
            <li><a class="app-menu__item" href="table-data-customer.php"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
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
      <li><a class="app-menu__item active" href="quan-ly-bao-cao.php"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="page-calendar.php"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu    </b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
        <div class="row">
            
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x' ></i>
                    <div class="info">
                        <h4>Tổng sản phẩm</h4>
                        <p><b><?php echo $resultNumberOfProduct ?> sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                    <div class="info">
                        <h4>Tổng đơn hàng</h4>
                        <p><b><?php echo $resultNumberOfOrder;?> đơn hàng</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart' ></i>
                    <div class="info">
                        <h4>Tổng thu nhập</h4>
                        <p><b><?php echo $Total ." đồng" ?></b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class='icon fa-3x bx bxs-user-badge' ></i>
                    <div class="info">
                        <h4>Sản phẩm sắp hết hàng</h4>
                        <p><b><?php echo  $resultNumberOfProduct1 ." sản phẩm"?></b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x' ></i>
                    <div class="info">
                        <h4>Hết hàng</h4>
                        <p><b><?php echo $resultNumberOfProduct2." sản phẩm" ?></b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-receipt' ></i>
                    <div class="info">
                        <h4>Đơn hàng mới</h4>
                        <p><b><?php echo $resultNumberOfOrder1." đơn hàng" ?></b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM SẮP HẾT HÀNG</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                        <?php $count = 1; ?>     
                        <thead>
                                <tr>
                                <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row =$resultOfProduct1->fetch_assoc()) { ?>
            <tr>
                <th><?= $count++ ?></th>
                <td><?php echo $row['id_product']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="../../image/<?php echo $row['image1'];?>" alt="" width="150px" height="150px"></td>
                <td><?php echo $row['quantity']; ?></td>
                <!-- <td><span class="badge bg-success">
                  <?php
                    if($row['quantity']>10) echo "Còn hàng";
                    else if($row['quantity']>0) echo "Sắp hết hàng";
                    else echo "Hết hàng";
                  ?>
                  </span>
                </td> -->
                <td>
    <span class="badge <?php
        if ($row['quantity'] > 10) {
            echo 'bg-success'; // Màu xanh lá
        } elseif ($row['quantity'] > 0) {
            echo 'bg-warning text-dark'; // Màu vàng
        } else {
            echo 'bg-danger'; // Màu đỏ
        }
    ?>">
        <?php
        if ($row['quantity'] > 10) {
            echo "Còn hàng";
        } elseif ($row['quantity'] > 0) {
            echo "Sắp hết hàng";
        } else {
            echo "Hết hàng";
        }
        ?>
    </span>
    <td><?php echo $row['price']; ?></td>
    <td><a href="form-delete-product.php?id_product=<?= $row['id_product']?>" class="btn btn-primary btn-sm trash"  
                                            ><i class="fas fa-trash-alt">Xóa</i> 
      </a>
        <a href="form-update-product.php?id_product=<?= $row['id_product']?>" class="btn btn-primary btn-sm edit"  >
        <i class="fas fa-edit">Sửa</i></a>
                                       </td>
      </td>

            </tr>
        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div>
                            <h3 class="tile-title">SẢN PHẨM ĐÃ HẾT HÀNG</h3>
                        </div>
                        <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                        <?php $count = 1; ?>     
                        <thead>
                                <tr>
                                <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row =$resultOfProduct2->fetch_assoc()) { ?>
            <tr>
                <th><?= $count++ ?></th>
                <td><?php echo $row['id_product']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="../../image/<?php echo $row['image1'];?>" alt="" width="150px" height="150px"></td>
                <td><?php echo $row['quantity']; ?></td>
                <!-- <td><span class="badge bg-success">
                  <?php
                    if($row['quantity']>10) echo "Còn hàng";
                    else if($row['quantity']>0) echo "Sắp hết hàng";
                    else echo "Hết hàng";
                  ?>
                  </span>
                </td> -->
                <td>
    <span class="badge <?php
        if ($row['quantity'] > 10) {
            echo 'bg-success'; // Màu xanh lá
        } elseif ($row['quantity'] > 0) {
            echo 'bg-warning text-dark'; // Màu vàng
        } else {
            echo 'bg-danger'; // Màu đỏ
        }
    ?>">
        <?php
        if ($row['quantity'] > 10) {
            echo "Còn hàng";
        } elseif ($row['quantity'] > 0) {
            echo "Sắp hết hàng";
        } else {
            echo "Hết hàng";
        }
        ?>
    </span>
    <td><?php echo $row['price']; ?></td>
    <td><a href="form-delete-product.php?id_product=<?= $row['id_product']?>" class="btn btn-primary btn-sm trash"  
                                            ><i class="fas fa-trash-alt">Xóa</i> 
      </a>
        <a href="form-update-product.php?id_product=<?= $row['id_product']?>" class="btn btn-primary btn-sm edit"  >
        <i class="fas fa-edit">Sửa</i></a>
                                       </td>
      </td>

            </tr>
        <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div>
                            <h3 class="tile-title">DƠN HÀNG MỚI</h3>
                        </div>
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Tình trạng</th>
                                            <th>Giá tiền</th>
                                            <th>Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">DỮ LIỆU HÀNG THÁNG</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">THỐNG KÊ DOANH SỐ</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right" style="font-size: 12px">
            <p><b>Hệ thống quản lý V2.0 | Code by Trường</b></p>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
    var data = {
      labels: <?php echo $monthLabelsJSON; ?>,
      datasets: [{
          label: "Dữ liệu đầu tiên",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "black",
          pointColor: "rgb(220, 64, 59)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data:  <?php echo $salesDataJSON; ?>
        },
        {
          label: "Dữ liệu kế tiếp",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "rgb(220, 64, 59)",
          pointColor: "black",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data: <?php echo $saleJSON; ?>
        }
      ]
    };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>

</html>