<?php
$connect = new MySQLi('localhost', 'root', '', 'book');
$queryNumberOfMembers = "select * from customer";
$resultNumberOfMembers = mysqli_num_rows($connect->query($queryNumberOfMembers));
$queryNumberOfProduct = "select * from product";
$resultNumberOfProduct = mysqli_num_rows($connect->query($queryNumberOfProduct));

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

  // Lấy tháng hiện tại
$currentMonth = date('m');

$query = "SELECT c.id_customer, c.fullname, c.phone_number, c.address, c.gender, COUNT(DISTINCT o.id_order) AS total_orders, SUM(od.quantity * od.price) AS total_amount
          FROM customer AS c
          JOIN orders AS o ON c.id_customer = o.id_customer
          JOIN order_detail AS od ON o.id_order = od.id_order
          GROUP BY c.id_customer, c.fullname, c.phone_number, c.address, c.gender
          ORDER BY total_orders DESC
          LIMIT 10";
$result2 = $connect->query($query);

$sql = "SELECT MONTH(datetime_note) AS months, SUM(order_detail.quantity) AS total_sales,SUM(order_detail.quantity*order_detail.price) AS total
        FROM orders
        INNER JOIN order_detail ON orders.id_order = order_detail.id_order
        WHERE datetime_note >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
        GROUP BY MONTH(datetime_note)
        ORDER BY MONTH(datetime_note)";

$result3 = $connect->query($sql);

// Khởi tạo mảng để lưu trữ dữ liệu số sách bán được và nhãn tháng
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
  <title>Quản trị Admin</title>
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
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item active" href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item " href="table-data-author.php"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý tác giả</span></a></li>
      <li><a class="app-menu__item" href="table-data-customer.php"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sách</span></a>
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
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <h4>Tổng khách hàng</h4>
            <p><b><?php echo $resultNumberOfMembers ?> khách hàng</b></p>
            
          </div>
        </div>
      </div>
       <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng sản phẩm</h4>
                <p><b><?php echo $resultNumberOfProduct ?> sản phẩm</b></p>
                
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Tổng đơn hàng</h4>
                <p><b><?php echo $resultNumberOfOrder;?> đơn hàng</b></p>
                <p class="info-tong"><?php echo $resultNumberOfOrder1." đơn hàng trong tháng này" ?></p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
           <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
          <div class="info">
            <h4>Doanh thu</h4>
            <p><b><?php echo $Total ." đồng" ?></b></p>
            
          </div>
        </div>
      </div>
           <!-- col-12 -->
           <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tình trạng đơn hàng</h3>
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID đơn hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AL3947</td>
                      <td>Phạm Thị Ngọc</td>
                      <td>
                        19.770.000 đ
                      </td>
                      <td><span class="badge bg-info">Chờ xử lý</span></td>
                    </tr>
                    <tr>
                      <td>ER3835</td>
                      <td>Nguyễn Thị Mỹ Yến</td>
                      <td>
                        16.770.000 đ	
                      </td>
                      <td><span class="badge bg-warning">Đang vận chuyển</span></td>
                    </tr>
                    <tr>
                      <td>MD0837</td>
                      <td>Triệu Thanh Phú</td>
                      <td>
                        9.400.000 đ	
                      </td>
                      <td><span class="badge bg-success">Đã hoàn thành</span></td>
                    </tr>
                    <tr>
                      <td>MT9835</td>
                      <td>Đặng Hoàng Phúc	</td>
                      <td>
                        40.650.000 đ	
                      </td>
                      <td><span class="badge bg-danger">Đã hủy	</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- / div trống-->
            </div>
           </div>
            <!-- / col-12 -->
             <!-- col-12 -->
            <div class="col-md-12">
                <div class="tile">
                  <h3 class="tile-title">Khách hàng đặt nhiều nhất</h3>
                <div>
                    <?php 
                    if ($result2) {
                      // Bắt đầu bảng HTML
                      echo '<table class="table table-hover">';
                      echo '<thead>';
                      echo '<tr>';
                      echo '<th>ID</th>';
                      echo '<th>Tên khách hàng</th>';
                      echo '<th>Số điện thoại</th>';
                      echo '<th>Địa chỉ</th>';
                      echo '<th>Giới tính</th>';
                      echo '<th>Số đơn hàng đã đặt</th>';
                      echo '<th>Tổng số tiền đã đặt</th>';
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                  
                      // Lặp qua các dòng kết quả
                      while ($row = mysqli_fetch_assoc($result2)) {
                          // Trích xuất các trường
                          $id = $row['id_customer'];
                          $fullname = $row['fullname'];
                          $phone = $row['phone_number'];
                          $address = $row['address'];
                          $gender = $row['gender'];
                          $totalOrders = $row['total_orders'];
                          $totalAmount = $row['total_amount'];
                          // Đổ dữ liệu vào bảng HTML
                          echo '<tr>';
                          echo '<td>#' . $id . '</td>';
                          echo '<td>' . $fullname . '</td>';
                          echo '<td>' . $phone . '</td>';
                          echo '<td>' . $address . '</td>';
                          echo '<td>' . $gender . '</td>';
                          echo '<td>' . $totalOrders . '</td>';
                          echo '<td>' . $totalAmount . '</td>';
                          echo '</tr>';
                      }
                  
                      // Kết thúc bảng HTML
                      echo '</tbody>';
                      echo '</table>';
                  } else {
                      echo "Lỗi trong quá trình thực hiện truy vấn: " . $connect->error;
                  } ?>
                    
                </div>

              </div>
            </div>
             <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê 6 tháng gần đây</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!--END right-->
    </div>


    <div class="text-center" style="font-size: 13px">
      <p><b>Copyright
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Phần mềm quản lý 
        </b></p>
    </div>
  </main>
  <script src="js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <!--===============================================================================================-->
  <script src="js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: <?php echo $monthLabelsJSON; ?>,
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: <?php echo $salesDataJSON; ?>
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: <?php echo $saleJSON; ?>
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>
</body>

</html>