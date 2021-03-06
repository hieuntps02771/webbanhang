<?php
    
    
    include "../model/admin/connect.php";
    include "../model/admin/user.php";
    include "../model/admin/customer.php";
    include "../model/admin/contact.php";
    include "../model/admin/products.php"; 
    include "../model/admin/order.php"; 
    
    // Khởi tạo session
     session_start();
     
    
     
     // Tạo mảng thông tin về giỏ hàng 
     if(!isset($_SESSION['cart']))
         $_SESSION['cart'] = array();
     
     
     if(isset($_GET["action"]))
         $action=$_GET["action"];
     elseif (isset($_POST['action']))
     {
         $action=$_POST["action"];
     }
     else
         $action="login_admin";
    unset($_SESSION['messages']);
     switch($action)
     {
        case "login_admin":
            include "../view/admin/login_admin.php";
            break;
        case "login_cpanel_action":
            $username = $_POST['txtusername'];
            $_SESSION['username'] = $username;
            $password = md5(addslashes($_POST['txtpassword']));
            $_SESSION['password'] = $password;
            $user = new customer();
            
            $result = $user->userid($username, $password);
            $userid = $result[0];
            $cus = new user(); 
                $result = $cus->getInfoByUsernameAndPass($username,$password);
            if ($set = $result )// Duyệt danh sách 
             {  
                $permissions =  $set['Permissions'];
                if ($permissions=='admin')
                {
                    // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                    $_SESSION['Administrator'] = $userid;
                    include "../view/admin/admin_cpanel.php";
                    break;
                }
                else
                {
                    include "../view/admin/header_cpanel.php";
                    echo "<center><h1>Khu vực dành cho người quản trị</h1>";
                    echo "<a href='index.php?action=home'>Trở về trang chủ</a>";
                    echo "</center>";
                    include "../view/admin/footer.php";
                    break;
                }
                
             }
             else
             {
                include "../view/admin/header_login.php";
                    echo "<center><h1>Tên đăng nhập không tồn tại !</h1>";
                    echo "<a href='index.php?action=home'>Trở về trang chủ</a>";
                    echo "</center>";
                    include "../view/admin/footer.php";
                    break;
                
             }
                
            //Tới trang quản trị
        case "cpanel":
            if(isset($_SESSION['Administrator']))
            {
                 include "../view/admin/admin_cpanel.php";
                
            }
            else
            {
                include "../view/admin/login_admin.php";
            }
            break;
            
            //Thoát khỏi trang quản trị
         case "logout_admin":
         include "../view/admin/logout_admin.php";
            break;
         
        //Quản lý danh sách sản phẩm
        case "products_list_manager":
            include "../view/admin/products_list_manager.php";
            break;
        
        //Chỉnh sửa sản phẩm
        case "update_product":
            include "../view/admin/products_update.php";
            break;
        case "update_product_action":
           
            if (isset($_FILES["file"]))
            {
                $productimage = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],"images/products/" . $_FILES["file"]["name"]);
            }
            else
            {
                
                $objQuest = new products();
                $quest = $objQuest->getProductById($_GET['id']);
                $productimage = $quest[2];
            }
            $tensanpham =$_POST['txtTenSP'];
            $id=$_POST['txtIDSP'];
            $price = $_POST['txtGiaSP'];
            $mota = $_POST['txtMotaSP'];
            $mathang = $_POST['LtbProducts'];
            $brand = $_POST['LtbBrand'];
            
            
           
            $edit = new products();
            $edit ->Editproduct($tensanpham, $productimage, $price, $mota, $mathang, $brand,$id);
            header ("Location:../controller/administrator.php?action=products_list_manager");
            
            
            break;
        //Xóa sản phẩm
        case "delete_product":
            $id =$_GET['id'];
            echo "$id";
            $del = new products();
            $del ->Deleteproduct($id);
             header ("Location:../controller/administrator.php?action=products_list_manager");
            break;
         
         //Thêm sản phẩm mới
        case "addproducts_step1":
          include '../view/admin/addproducts_step1.php';   
          break;  
        case "addproducts_step2":
            $_SESSION['product']= $_GET['LoaiSP'];
            $product = $_SESSION['product'];
            include '../view/admin/addproducts_step2.php';
          break;
        case "addproducts_step3":
            $tensanpham = $_POST['txtTenSP'];
            $image = $_FILES["file"]["name"];
            $price = $_POST['txtGiaSP'];
            $mota = $_POST['txtMotaSP'];
            $mathang = $_POST['LoaiMH'];
            $brand = $_POST['LoaiBrand'];
            $product = $_SESSION['product'];
            move_uploaded_file($_FILES["file"]["tmp_name"],"../controller/images/products/" . $_FILES["file"]["name"]);
            $pro = new products();
            $pro ->Addproduct($tensanpham, $image, $price, $mota, $mathang, $brand, $product);
            header ("Location:../controller/administrator.php?action=products_list_manager");
         break;
        
        //Quản lý đơn hàng
         case "orders_manager":
             include '../view/admin/orders_manager.php';   
         break;
        //Xóa đơn hàng
         case "delete_order":
            $id =$_GET['id'];
            $quest=new order();
            $quest -> Deleteorder($id );
            header ("Location:../controller/administrator.php?action=orders_manager");
         break;
      case "orders_view":
          
         include '../view/admin/orders_view.php';
     }
?>
