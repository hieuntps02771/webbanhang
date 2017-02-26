<?php include "../view/admin/header_login.php";?>
 <div class="main_content">
    	<div class="showtext">
        <center><h2>Đăng nhập</h2></center>
    	<div  class="login_box">
                <form method="post" name="contact" action="?action=login_cpanel_action">
                    <div class="login_field">
                        <label for="name">UserName</label>
                        <input name="txtusername" type="text" class="input_field" id="txtusername" />
                    </div>
                    <div class="login_field">
                        <label for="pass">Password</label>
                        <input name="txtpassword" type="password" class="input_field" id="txtpasword"/>
                    </div>
                    <div class="login_field">
                    <input type="submit" name="login" value="Đăng nhập" class="submit_btn " />
                    </div>
                </form>
            </div> 
            
    </div>
        <div class="clear"></div>
    </div><!--End #main_content-->
    <?php include "../view/admin/footer.php";?>