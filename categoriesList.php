<?php

include 'categories.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $danhmuc = new danhmuc();
    if (isset($_POST['block'])) {
        $result = $danhmuc->block($_POST['madm']);
        if ($result) {
            echo '<script type="text/javascript">alert("Khóa danh mục thành công!");</script>';
        } else {
            echo '<script type="text/javascript">alert("Khóa danh mục thất bại!");</script>';
        }
    } else if (isset($_POST['active'])) {
        $result = $danhmuc->active($_POST['madm']);
        if ($result) {
            echo '<script type="text/javascript">alert("Kích hoạt danh mục thành công!");</script>';
        } else {
            echo '<script type="text/javascript">alert("Kích hoạt danh mục thất bại!");</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Có lỗi xảy ra!");</script>';
        die();
    }
}

$danhmuc = new danhmuc();
$list = $danhmuc->getAllAdmin((isset($_GET['page']) ? $_GET['page'] : 1));
$pageCount = $danhmuc->getCountPaging();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wmadmth=device-wmadmth, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Danh sách danh mục</title>
</head>

<body>
    <nav>
        <input type="checkbox" madm="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="productlist.php" >Quản lý Sản phẩm</a></li>
            <li><a href="danhmucList.php" class="active">Quản lý danh mục</a></li>
            <li><a href="orderlist.php" madm="order">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Danh sách danh mục</h1>
    </div>
    <div class="addNew">
        <a href="add_category.php">Thêm mới</a>
    </div>
    <div class="container">
        <?php $count = 1;
        if ($list) { ?>
            <table class="list">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ($list as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['tendm'] ?></td>
                        <td><?= ($value['status']) ? "Active" : "Block" ?></td>
                        <td>
                            <a href="edit_category.php?madm=<?= $value['madm'] ?>">Xem/Sửa</a>
                            <?php
                            if ($value['status']) { ?>
                                <form action="categoriesList.php" method="post">
                                    <input type="text" name="madm" hmadmden value="<?= $value['madm'] ?>" style="display: none;">
                                    <input type="submit" value="Khóa" name="block">
                                </form>
                            <?php } else { ?>
                                <form action="categoriesList.php" method="post">
                                    <input type="text" name="madm" hmadmden value="<?= $value['madm'] ?>" style="display: none;">
                                    <input type="submit" value="Mở" name="active">
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h3>Chưa có danh mục nào...</h3>
        <?php } ?>
        <div class="pagination">
            <a href="categoriesList.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>">&laquo;</a>
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                if (isset($_GET['page'])) {
                    if ($i == $_GET['page']) { ?>
                        <a class="active" href="categoriesList.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php } else { ?>
                        <a href="categoriesList.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  }
                } else { ?>
                    <a href="categoriesList.php?page=<?= $i ?>"><?= $i ?></a>
                <?php  } ?>
            <?php }
            ?>
            <a href="categoriesList.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>">&raquo;</a>
        </div>
    </div>
    </div>
    
    <footer>
        <p class="copyright">STORENOW @ 2021</p>
    </footer>
</body>

</html>