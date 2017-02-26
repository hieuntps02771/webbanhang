<?php
include"header.php";
?>
<div class="container">
<?php
    
        
        $result = $order->getOrder($_SESSION['order_id']);
        $orderid = $result[0];
        $datecreate= $result[1];
        $customerid = $result[3];
        $customername=$result[4];
        $d = new DateTime($datecreate);
        echo '<center>';
        echo '<h1>Mã hóa đơn: '.$orderid.'</h1>';
        echo '<h4>Khách hàng: ['.$customerid.'] '.$customername.'</h4>';
        echo '<h4>Ngày lập: '.$d->format('d/m/Y').'</h4>';
        echo '</center>';
?>
        <br/>
        <table class="table table-bordered" >
            
            <tr>
                <td>Mã hàng</td>
                <td>Tên</td>
                <td>Số lượng</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>
            </tr>
        <?php $result1 = $order->getOrderDetail($_SESSION['order_id']);
        
        while($set = $result1 -> fetch()){ ?>
            <tr>
                <td><?php echo $set[0]; ?></td>
                <td><?php echo $set[1]; ?></td>
                <td><?php echo $set[2]; ?></td>
                <td><?php echo $set[3]; ?></td>
                <td><?php echo number_format($set[4]); ?></td>
            </tr>
        <?php } ?>
            <tr>
                <td colspan="4">Tổng hóa đơn</td>
                <td><?php echo number_format($result['OrderTotal']); ?></td>
            </tr> </table><br/><br/>
    
        
    </div><!--End #main_content-->
<?php include "../view/footer.php";?>
        
?>
