
<!DOCTYPE html>
<?php
    $title = (isset($title)?$title:'');
    $meta_keywords = (isset($meta_keywords))?$meta_keywords:'';
    $meta_description = (isset($meta_description))?$meta_description:'';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo $meta_keywords; ?>">
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="author" content="hieuntps02771.tk" />
        <meta property="article:author" content="https://www.facebook.com/NGUYENTANHIEUFPTPOLYTECHNIC" />        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../control/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../control/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../control/css/style1.css" rel="stylesheet" type="text/css"/>
        <script src="../control/bootstrap/js/jquery-3.0.0.js" type="text/javascript"></script>
        <script src="../control/bootstrap/js/jquery-migrate-1.4.1.min.js" type="text/javascript"></script>
        <a href="fonts/glyphicons-halflings-regular.svg"></a>
        <script src="../control/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script>
                $('#myModal').on('hidden.bs.modal', function () {
                    $('.alert-danger').addClass('hide');
                    $('.alert-success').addClass('hide');
                });
         </script>
        <script>
                    $(document).ready(function(){
                 
                    // Khi người dùng click Đăng ký
                    $('#register-btn').click(function(){
                 
                        // Lấy dữ liệu
                        var data = {
                            username    : $('#username').val(),
                            password    : $('#password').val(),
                            email       : $('#email').val(),
                            fullname    : $('#fullname').val(),
                            address     : $('#address').val(),
                            telephone   : $('#telephone').val()
                        };
                 
                        // Gửi ajax
                        $.ajax({
                            type : "post",
                            dataType : "JSON",
                            url : "../model/register.php",
                            data : data,
                            success : function(result)
                            {
                                // Có lỗi, tức là key error = 1
                                if (result.hasOwnProperty('error') && result.error == '1'){
                                    var html = '';
                 
                                    // Lặp qua các key và xử lý nối lỗi
                                    $.each(result, function(key, item){
                                        // Tránh key error ra vì nó là key thông báo trạng thái
                                        if (key != 'error'){ 
                                            html += '<li>'+item+'</li>';
                                        }
                                    });
                                    $('.alert-danger').html(html).removeClass('hide');
                                    $('.alert-success').addClass('hide');
                                }
                                else{ // Thành công
                                    $('.alert-success').html('Đăng ký thành công!').removeClass('hide');
                                    $('.alert-danger').addClass('hide');
                 
                                    // 4 giay sau sẽ tắt popup
                                    setTimeout(function(){
                                        $('#myModal').modal('hide');
                                        // Ẩn thông báo lỗi
                                        $('.alert-danger').addClass('hide');
                                        $('.alert-success').addClass('hide');
                                    }, 4000);
                                }
                            }
                        });
                    });
                });
                </script>
                
                    
    </head>
    <body>
        
            <div class="jumbotron maunenheader">
                <div class="row">
                    <div class="col-md-8">
                        <img class="img-responsive" src="../control/images/logo.png">
                    </div>
                    <div class="col-md-4">
                        Wellcome <?php if(isset($_SESSION['username'])){echo  $_SESSION['username'].'!'. '<a href="../view/thoat.php">Thoat</a>';}else{echo 'Guest!';} ?> 
                        <?php if(!isset($_SESSION['username'])){
                          ?><a href="#mymodal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a>
                       
                        <!--MODAL DANG NHAP-->
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
                                    <div class="alert alert-danger hide">

                                    </div>
                                    <div class="alert alert-success hide">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="login-btn" name="dangnhap" class="btn btn-default">Đăng nhập</button>
                                </div>
                                </form>
                            </div>

                            </div>
                        </div>
                        |<a href="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-user" ></span> Đăng ký</a>
                        
                       
            
            <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-5">Username</div>
                                    <div class="col-md-7">
                                        <input type="text" id="username"   />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">Password</div>
                                    <div class="col-md-7">
                                        <input type="text" id="password"  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">Email</div>
                                    <div class="col-md-7">
                                        <input type="text" id="email"  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">Fullname</div>
                                    <div class="col-md-7">
                                        <input type="text" id="fullname"  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">Địa chỉ</div>
                                    <div class="col-md-7">
                                        <input type="text" id="address"  />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">Số điện thoại</div>
                                    <div class="col-md-7">
                                        <input type="text" id="telephone"  />
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger hide">
                                
                            </div>
                            <div class="alert alert-success hide">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="register-btn">Đăng ký</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            
               
                
                        <?php } ?>
                        
                        <br><br>
                        
                    </div>
                </div>
            </div>
        <div class="container-fluid" style="margin-top:-25px;" >
                <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="10">
                    <div class="navbar-header">
                        <button class="navbar-toggle"data-toggle="collapse" href='#mynavbar'>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <p>Camerashop</p>
                        </div>
                    </div>
                        <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="nav navbar-nav navbar-right">                            
                            <li><a href="?action=home">Trang chủ</a></li>
                            <li><a href="?action=gioithieu">Giới thiệu</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Máy ảnh
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=may-anh-canon">Máy ảnh Canon</a></li>
                                    <li><a href="?action=may-anh-nikon">Máy ảnh Nikon</a></li>
                                    <li><a href="?action=may-anh-khac">Máy ảnh khác</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Phụ kiện
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=ong-kinh">Ống kính</a></li>
                                    <li><a href="?action=den-flash">Đèn Flash</a></li>
                                    <li><a href="?action=phu-kien-khac">Phụ kiện khác</a></li>
                                </ul>
                            </li>                            
                            <li><a href="?action=lienhe">Liên hệ</a></li>
                            <li><a href="?action=xem-gio-hang"><span class="glyphicon glyphicon-shopping-cart"></span> Xem giỏ hàng</a></li>
                            
                        </ul>
                        </div>
                    
                </nav>
            </div>
        

       
  

