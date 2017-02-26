<?php
include_once "../view/header.php";
?>
<div class="container-fluid">
    <h1>Liên hệ với chúng tôi</h1>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post" name="ok">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="hoten" class="form-control" id="name" placeholder="Gõ họ tên">
                </div>
                <div class="form-group">
                    <label for="dc">Địa chỉ:</label>
                    <input type="text" name="diachi" class="form-control" id="dc" placeholder="Gõ địa chỉ">
                </div>
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="email" name="mail" class="form-control" id="mail" placeholder="Gõ email">
                </div>
                <div class="form-group">
                    <label for="dt">Phone:</label>
                    <input type="tel" name="dienthoai" class="form-control" id="dt" placeholder="Gõ số điện thoại">
                </div>
                <div class="form-group">
                    <label for="td">Tiêu đề:</label>
                    <input type="text" name="tieude" class="form-control" id="td" placeholder="Gõ tiêu đề">
                </div>
                <div class="form-group">
                    <label for="comment">Nội dung:</label>
                        <textarea name="noidung" class="form-control" rows="5" id="comment"></textarea>
                </div>
                <button type="submit" name="send" class="btn btn-default">Gửi</button>
                <button type="reset" name="reset" class="btn btn-default">Xóa</button>
            </form>
        </div>
        <div class="col-md-4">
            <br>
            <dl>
              <dt>Văn phòng</dt>
                    <dd>391A Nam Kỳ Khởi Nghĩa, Quận 3,TP. Hồ Chí Minh,0</dd>
                    <dd>Tel: (08) 3 526 8799</dd>
                    <dd>Fax: (08) 3 526 8896</dd><br>
              <dt>Chi nhánh</dt>
                    <dd>164 Phan Chu Trinh,TP. Buôn Ma Thuột, Tỉnh Đắk Lắk</dd>
                    <dd>Tel:(0500) 355 5678</dd>
                    <dd>Fax:(0500) 355 6996</dd><br>
                    <dd>137 Nguyễn Thị Thập,Phường Hòa Minh, Quận Liên Chiểu, Đà Nẵng.</dd>
                    <dd>Tel:0919 708571</dd>
                    <dd>Fax:(0511) 371 0999</dd>
            </dl>
        </div>
    </div><div class="huy"></div><br><br>
    <div class="row">
        
      
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/Olympus-logo.jpg" alt=""/>
          </div>
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/canon.jpg" alt=""/>
          </div>
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/fujifilm.jpg" alt=""/>
          </div>
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/nikon.jpg" alt=""/>
          </div>
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/panasonic.jpg" alt=""/>
          </div>
          <div class="col-md-2 col-xs-2">
              <img class="img-responsive" src="../control/images/brands/pentax.jpg" alt=""/>
          </div>
      
  
    </div>
    <div class="huy"></div>
</div>
<?php include_once "../view/footer.php";?>

