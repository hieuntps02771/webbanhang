<?php include "../view/admin/header_login.php";?>
 <div class="main_content">
    	<div class="showtext">
        <?php
        if (isset($_SESSION['Administrator'])){
        $_SESSION = array();
        session_destroy();
        echo "<br/><br/>";
        echo "<center>";
        echo "<h3>Chúc mừng bạn đã đăng xuất khỏi <br/> khu vực quản trị thành công</h3>";
        echo "<br/>";
        echo "<a href=index.php>Trở về trang chủ</a>";
        echo "<br/><br/>";
        echo "<br/><br/>";
        
        }
        else {
            echo "<br/><br/>";
            echo "
            <center>
            
            <h3>Bạn chưa đăng nhập.</h3>
            <br/>
              <p><a href='?action=login_admin'>Đăng nhập</a> </p>
            </center>
              ";
        }
        echo "</center>";
        echo "<br/><br/>";
        echo "<br/><br/>";
        echo "<br/><br/>";
        echo "<br/><br/>";
        echo "<br/><br/>";
?>
            
    </div>
        <div class="clear"></div>
    </div><!--End #main_content-->
    <?php include "../view/admin/footer.php";?>
