<?php
class product{
    public $productID = null;
    public $productCategory=null;
    
   public function pagination($category){
        $pagination = new connect();
        $sql = "SELECT * FROM products WHERE ProductCategory='$category'";
        $list=$pagination->db->query($sql);
        $tongsosp=$list->rowCount();
        $sosp1trang = 6;
        $sotrang = ceil($tongsosp/$sosp1trang);
        if(isset($_GET['page'])){
            $tranghienhanh= $_GET['page'];            
        }else{
            $tranghienhanh = 1;
        }
        
        $from = ($tranghienhanh-1)*$sosp1trang;
        $sql_phantrang = "SELECT * FROM products WHERE ProductCategory = '$category' LIMIT $from,$sosp1trang";
        $list_pagination=$pagination->db->query($sql_phantrang);
        return $list_pagination;
        
}
    public function List_Page($category){
        $pagination = new connect();
        $sql = "SELECT * FROM products WHERE ProductCategory='$category'";
        $list=$pagination->db->query($sql);
        $tongsosp=$list->rowCount();
        $sosp1trang = 6;
        $sotrang = ceil($tongsosp/$sosp1trang);
        return $sotrang;
    }
}   
?>

