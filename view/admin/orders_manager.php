<?php include "../view/admin/header_cpanel.php";?>
 <div class="main_content">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Danh sách đơn hàng</h1></center>
        <center><table border="0" class="products_list_manager">
        <tr>
         <th>STT</th>
         <th>Thông tin đơn hàng</th>
         <th>Giá tiền</th>
         <th>Số lượng</th>
         <th>Tổng tiền</th>
         <th>Delete</th>
        </tr>
        
        <?php
        
        $quest = new order();
         $get = new products();
        $result = $quest->getListOrder_DESC();
        // Goi phuong thuc lay danh sach = vong lap while
         while($set = $result->fetch())
         {
           
            $name = $get -> getProductById($set['ProductID']);
          
            echo "<tr>";
            echo "<th>$set[OrderID]</th>";
            echo "<th>";?><a href="?action=orders_view&id=<?php echo $set['OrderID'] ?>"><?php echo $name['ProductName'];?> </a></td>
   <?php    echo "<th>"; echo number_format($set['ProductPrice']);echo"</th>";
            echo "<th>$set[Quantity]</th>";
            echo "<th>";echo number_format($set['Totals']);echo"</th>";
            echo "<th>"; ?><a href="?action=delete_order&id=<?php echo $set['OrderID'] ?>"><img src="../control/images/delete-icon.png" width="35px"/></a></th>
       
            </tr>
          <?php } ?>
        
        </table></center>
        <br/>
        <div class="clear"></div>
    </div><!--End #main_content-->
   <?php include "../view/admin/footer.php";?>

