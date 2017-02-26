
<?php
    include_once "../view/header.php";    
?>
<div class="container-fluid">
        <div class="row">
        <div class="col-md-5 col-xs-3">
            <img class="img-responsive" src="../control/images/products/<?php echo $result[2]; ?>" alt=""/>
        </div>
        <div class="col-md-7 col-xs-9">
            <h2>Tên sản phẩm:</h2><h1 style="font-weight:bold;text-align:center;"><?php echo $result[1]; ?></h1>
            <p><span style="font-weight:bold;">Loại phụ kiện:</span><?php echo $result[5]; ?></p>
            <p><span style="font-weight:bold;">Giá sản phẩm:</span><?php echo number_format($result[3],0); ?>VNĐ</p>
            <br>            
            <p><span style="font-weight:bold;">Mô tả sản phẩm:</span><?php echo $result[4]; ?></p>
            
            <form action="?action=them-gio-hang&id=<?php echo $maID; ?>" method="post">
            
            <select class="form-inline" name="sl">';
            <?php 
            
                    for($i=1;$i<=10;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
            
            ?>                  
            </select>
           
            <input class="btn" name="add" type="submit" value="Đặt hàng">
            </form>
        </div>
    </div>
</div>



