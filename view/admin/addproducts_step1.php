<?php include "../view/admin/header_cpanel.php";?>
 <div class="main_content">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Thêm sản phẩm mới</h1></center>
        <br/><br/>
        <form action="../control/administrator.php"  method="get" enctype="multipart/form-data">
            <input type="hidden"  name="action" value="addproducts_step2" action="addproducts_step2" />
        <center><table>
            <tr>
                <td><label for="LoaiSP">Chọn loại sản phẩm</label></td>
                <td>
                    <select name="LoaiSP" id="LoaiSP">
                    <option>Máy ảnh</option>
                    <option>Phụ kiện máy ảnh</option>
                    </select>
                </td>
                <td><input type="submit"  value="Next" action="action" class="admin_submit_btn"/></td>
            </tr>
        </table></center>
            <br/><br/>
            <center><p>* Nhấn "Next" để tiếp tục</p></center>
        </form>
        <br/><br/><br/><br/>
        <div class="clear"></div>
    </div><!--End #main_content-->
   <?php include "../view/admin/footer.php";?>
