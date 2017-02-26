<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Ngoc Huy Pham
 */
class Order {
    public function __construct() {}
    
    
    // Tạo hóa đơn khi người dùng nhấn nút Thanh toán
    public function createOrder($userid)
   {
        $db= new connect();
        $date = new DateTime("now");
        $orderdate = $date->format("Y-m-d");
        $query = "insert into camerashop.orders(OrderID,OrderDate,OrderTotal,UserID) values (Null,'$orderdate',0,'$userid')";
        $db->exec($query); $int = $db->getInstance("select OrderID from camerashop.orders order by OrderID desc limit 1");
        return $int[0];
    }
    
    // Thêm danh sách chi tiết sản phẩm từng hóa đơn
    public function insertOrderDetail($proid,$orderid,$price,$quantity,$total)
    {
        $db = new connect();
        $query = "insert into orderdetails values('$proid','$orderid','$price','$quantity','$total')";
        $db->exec($query);
    }
    
    // Cập nhật tổng hóa đơn
    public function updateOrderTotal($orderid,$total)
    {
        $db = new connect();
        $query = "update orders set OrderTotal='$total' where OrderID=$orderid";
        $db->exec($query);
    }
    
    // Lấy hóa đơn theo ID
    function getOrder($orderid)
    {
        $db = new connect();
        $select = "select OrderID,OrderDate,OrderTotal,c.UserID,c.FullName from camerashop.orders o inner join users c on o.UserID = c.UserID where OrderID='$orderid'";
        $result = $db->getInstance($select);
        return $result;
    }
    
    
    // Lấy chi tiết hóa đơn
    function getOrderDetail($orderid)
    {
        $db = new connect();
        $select = "select m.ProductID,ProductName,Quantity,od.ProductPrice,Totals from orderdetails od inner join products m on od.ProductID = m.ProductID where OrderID='$orderid'";
        $result = $db->getList($select);
        return $result;
    }
    
    function getListOrder_DESC()
    {
         $db = new connect();
         $select = "select * from orderdetails ORDER BY OrderID DESC";
         $result = $db->getList($select);
         return $result;
     }

     
     function getListOrderUser($id)
         {
            $db = new connect();
            $select = "select * from orders where OrderID='$id'";
            $result = $db->getList($select);
            return $result ;
         }  
    function Deleteorder($id)
         {
            $db = new connect();
            $query = "delete from orderdetails where OrderID = '$id'";
            $db->exec($query);
         }
    
}

?>
