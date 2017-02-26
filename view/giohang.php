<?php

include_once "../view/header.php";
$key = array_keys($_SESSION['cart']);
echo '<pre>';
print_r($key);
echo '</pre>';
if (isset($_SESSION['cart'])) {
?>
        <div class="container-fluid"><h2 style="text-align:center;">Danh sách sản phẩm của bạn trong giỏ hàng</h2>
        <table class="table table-bordered"><tr>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Hình ảnh</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td>Xóa</td>
            </tr>
    <?php
    $i = 0;
    foreach ($_SESSION['cart'] as $value) {

    ?>   
            <form action="?action=mua-hang" method="post">
                <tr>
                    <td><?php echo $value["tensp"]; ?></td>
                    <td><?php echo number_format($value["gia"]); ?>VNĐ</td>
                    <td><img class="img-rounded img-responsive" width="20%" src="../control/images/products/<?php echo $value['hinhanh'] ?>"></td>
                    <td><?php echo $value["soluong"]; ?></td>
                    <td><?php echo number_format($value["thanhtien"]) ?>VNĐ</td>
                    <td><a href="../view/deletecart.php?id=<?php echo $key[$i]; ?>">Xóa</a></td>
                    
                </tr>
        <?php
        $i++;
    }


    $thanhtienArray = array();
    foreach ($_SESSION['cart'] as $giatri) {
        $thanhtienArray[] = $giatri['thanhtien'];
    }
        ?>

    <tr>
        <td colspan="3">Tổng tiền:</td>
        <td colspan="3"><?php echo number_format(array_sum($thanhtienArray), 0); ?>VNĐ</td>
    </tr>
   
    </table>
            <?php if($_GET['action']=='them-gio-hang'){ ?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="?action=thanh-toan" class="btn btn-success">Thanh toán</a>
                </div>
                <div class="col-md-4"></div>
            </div>
            <?php } ?>
</form>
    </div><?php
} else {
    echo 'Giỏ hàng của bạn chưa có sản phẩm nào';
}
include_once "../view/footer.php";
        ?>



