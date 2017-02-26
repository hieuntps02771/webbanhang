<?php
class order{
    // tao hoa don khi nguoi dung nhan nut thanh toan
     public function createOrder($userid)
   {
        $db= new connect();
        $date = new DateTime("now");
        $orderdate = $date->format("Y-m-d");
        $query = "insert into camerashop.orders(OrderID,OrderDate,OrderTotal,UserID) values (Null,'$orderdate',0,'$userid')";
        $db->db->exec($query); $int = $db->getInstance("select OrderID from camerashop.orders order by OrderID desc limit 1");
        return $int[0];
    }
    // Thêm danh sách chi tiết sản phẩm từng hóa đơn
    public function insertOrderDetail($proid,$orderid,$price,$quantity,$total)
    {
        $db = new connect();
        $query = "insert into orderdetails values('$proid','$orderid','$price','$quantity','$total')";
        $db->db->exec($query);
    }
     // Cập nhật tổng hóa đơn
    public function updateOrderTotal($orderid,$total)
    {
        $db = new connect();
        $query = "update orders set OrderTotal='$total' where OrderID=$orderid";
        $db->db->exec($query);
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
        $select = "select orderdetails.ProductID,ProductName,orderdetails.Quantity,orderdetails.ProductPrice,Totals from orderdetails  inner join products  on orderdetails.ProductID = products.ProductID where OrderID='$orderid'";
        $result = $db->getList($select);
        return $result;
    }
}


