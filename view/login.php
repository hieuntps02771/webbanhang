<?php
echo '<div class="container" style="text-align:center;background-color:#c0c0c0;padding:15px 0;">
    <h2>Bạn phải đăng nhập để thực hiện chức năng này</h2>
   <button class="btn btn-info" href="#mymodal" data-toggle="modal">Đi đến đăng nhập</button>
<div id="mymodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                            <div class="modal-content">
                                <form action="?action=login-process" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Đăng nhập thành viên</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                            <label for="userName">Username:</label>
                                            <input type="text" class="form-control" name="username" id="userName" placeholder="Gõ tên đăng nhập">
                                    </div>
                                    <div class="form-group">
                                            <label for="passWord">Password:</label>
                                            <input type="text" class="form-control" name="password" id="passWord" placeholder="Gõ mật khẩu">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="dangnhap" class="btn btn-default">Đăng nhập</button>
                                </div>
                                </form>
                            </div>

                            </div>
                        </div>
</div>';


