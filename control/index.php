
<?php
include_once "../model/connect.php";
include_once "../model/user.php";
include_once "../model/products.php";
include_once"../model/order.php";

session_start();
if (isset($_GET['action'])){
    $action = $_GET['action'];
}elseif(isset($_POST['action'])){
    $action = $_POST['action'];
}else{
$action = 'home';
}
switch ($action) {
    case 'home':
        $title = 'Camerashop-Shop chuyên bán Camera chuyên nghiệp,Camera bán chuyên nghiệp';
        $meta_keywords = 'Mua Online nhanh chóng,giao hàng tận nơi';
        $meta_description="Mua online nhanh chóng hàng chính hãng, khuyến mãi hấp dẫn, giao hàng tận nơi,đổi trả sản phẩm miễn phí";
        include_once "../view/home.php";
        break;
    case 'gioithieu':
        include_once "../view/gioithieu.php";
        break;
    
    case 'login-process':
        if(isset($_POST['dangnhap'])){
            $name = $_POST['username'];
            $pass = md5(addslashes(($_POST['password'])));
        }
        $select = "SELECT Username,Password FROM users WHERE Username='$name'&& Password='$pass'";
        $dangnhap = new connect();
        $row = $dangnhap->db->query($select);
        if($row->rowCount()==1){
            $_SESSION['username']=$name;
            $_SESSION['password']=$pass;
            header('Location:index.php');
            $row->closeCursor();
        }else{
            echo '<script>
            alert("Đăng nhập thất bại");
                </script>';
        }
    case 'may-anh-canon':
        $canon = new product();
        $category = 'Máy ảnh canon';
        $actionfirst = 'may-anh-canon';        
        $result=$canon->pagination($category);
        $sotrang=$canon->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'may-anh-nikon':
        $nikon = new product();
        $actionfirst = 'may-anh-nikon';
        $category = "Máy ảnh Nikon";
        $result=$nikon->pagination($category);
        $sotrang=$nikon->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'may-anh-khac':
        $other = new product();
        $category = 'Các loại máy ảnh khác';
        $actionfirst='may-anh-khac';
        $result=$other->pagination($category);
        $sotrang=$other->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'ong-kinh':
        $len = new product();
        $category = 'Lens';
        $actionfirst = 'ong-kinh';
        $result=$len->pagination($category);
        $sotrang=$len->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'den-flash':
        $flash = new product();
        $category = 'Đèn flash';
        $actionfirst ='den-flash';
        $result=$flash->pagination($category);
        $sotrang=$flash->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'phu-kien-khac':
        $phukien = new product();
        $category ='Đồ chơi tổng hợp';
        $actionfirst='phu-kien-khac';
        $result=$phukien ->pagination($category);
        $sotrang=$phukien->List_Page($category);
        include_once"../view/listproduct.php";
        $result->closeCursor(); 
        include_once "../view/footer.php";
        break;
    case 'chi-tiet-san-pham':
        if(isset($_GET['id'])){        
        $productdetail = new connect();
        $maID = $_GET['id'];
        $getProduct = "SELECT * FROM products WHERE ProductID='$maID'";
        $data = $productdetail->db->query($getProduct);
        $result = $data->fetch();
        $title = $result[1];
        $meta_keywords = "mua online máy chụp hình kỹ thuật số";
        $meta_description=$result[4];
        include "../view/chitietsp.php";
        $data->closeCursor();
        include "../view/footer.php";
        
        break;
        }
    case 'xem-gio-hang':
        if(!isset($_SESSION['username'])){
            include_once "../view/header.php";            
            include_once "../view/login.php";
            include_once "../view/footer.php";
        }else{
            include_once "../view/header.php";
            if(!isset($_SESSION['cart'])|| $_SESSION['cart']== null){
                echo '<h2 style="text-align:center;">Bạn chưa có sản phẩm nào trong giỏ hàng</h2>';
            }else{
                include "../view/giohang.php";
            }
            
        }
        break;
    case 'them-gio-hang':
        if(isset($_SESSION['username'])){
            $id = $_GET['id'];
            $sl = $_POST['sl'];
            
            $cart = new connect();
            $sql = "SELECT ProductID,ProductName,ProductImage,ProductPrice FROM products WHERE ProductID = $id";
            $rowCart = $cart->db->query($sql);
            $result = $rowCart->fetch();
            $_SESSION['cart'][$id]=array(
                'tensp'=>$result[1],
                'gia' =>$result[3],
                'hinhanh'=>$result[2],
                'soluong'=>$sl,
                'thanhtien'=>$sl*$result[3]
            ); 
            
            
            include "../view/giohang.php";
            echo '<pre>';
            echo print_r($_SESSION['cart']);
        echo '</pre>';}else{
            include"../view/header.php";
            include"../view/login.php";
            include"../view/footer.php";
        }
            break;
    
    case 'thanh-toan':
            $username = $_SESSION['username'];
        //lay id cua user
            $USER = new user();
            $result = $USER->getInfoUserById($username);
            $userid = $result[0];
         //lay id cua order   
            $order = new order();
            $orderid= $order->createOrder($userid);
            $_SESSION['order_id']= $orderid;
            
            $total = 0; 
            foreach($_SESSION['cart'] as $key => $item)
                 {
                 $order->insertOrderDetail($orderid,$key,$item['gia'], $item['soluong'], $item['thanhtien']);
                 $total += $item['thanhtien'];
                 }
                 $order->updateOrderTotal($orderid, $total);
           include "../view/payments.php";
            break;
    
    case 'lienhe':
        $thongbao = "Bạn đã gửi thành công";
        $ok = "";
        if(isset($_POST['send'])){
        include '../model/mail/PHPMailerAutoload.php';

        $mail = new PHPMailer;//khởi tạo đối tượng php mailer

        $mail->isSMTP();                                      // chứng thực phương thức gửi bằng phương thức smtp
        $mail->Host = 'tls://smtp.gmail.com:587';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'spkfpt@gmail.com';                 // SMTP username
        $mail->Password = 'Hieu341429481OK';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->isHTML(true);
        $mail->SMTPDebug =0;
        $mail->CharSet="utf-8";
        $mail->setFrom($_POST['mail']);
        $mail->Subject = $_POST['tieude'];
        $mail->Body = "<strong>Người gửi:</strong> ".$_POST['mail']." < ".$_POST['hoten']." > <br><strong>Số điện thoại:</strong> ".$_POST['dienthoai']."<br><strong>Nội dung: ".$_POST['noidung'];
        $mail->addAddress("spkfpt@gmail.com");     // Add a recipient
        
        if (!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo $ok = $thongbao;
        }
        }
        include"../view/lienhe.php";
}
?>

       

