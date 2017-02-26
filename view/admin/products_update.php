<?php include "../view/admin/header_cpanel.php";
$objQuest = null;
$objQuest = new products();
$quest = $objQuest->getProductById($_GET['id']);
$productid = $quest[0];
$productname = $quest[1];
$productimage = $quest[2];
$productprice = $quest[3];
$productdes = $quest[4];
$productcategoty = $quest[5];
$productbrand = $quest[6];
$productgroup = $quest[7];
?>
 <div class="main_content">
    	<center><h1 style=" margin: 20px; color: #900; font-size: 24px;">Chỉnh sửa sản phẩm</h1></center>
        <form action="administrator.php?action=update_product_action" method="post" enctype="multipart/form-data">
              
        <center><table>
            <tr><td colspan="2" align="center"><img src="../control/images/products/<?php echo "$productimage" ?>" width="400px"/></td></tr>
            <tr>
                <tr>
                <td>
                    <label for="LtbBrand">Chọn loại sản phẩm</label></td>
                </td>
                
            </tr>
                <td><label for="LtbProducts">Chọn mặt hàng</label></td>
                <td align="left">
                    <?php
                    switch($productgroup)
                    {
                        case "Máy ảnh":?>
                            <select name="LtbProducts" id="LtbProducts">
                            <?php echo'<option>'."$productcategoty".'</option>' ?>
                            <option>Máy ảnh canon</option>
                            <option>Máy ảnh Nikon</option>
                            <option>Các loại máy ảnh khác</option>
                            </select>
                        <?php break;

                        case "Phụ kiện máy ảnh":?>
                            <select name="LtbProducts" id="LtbProducts">
                            <?php echo'<option>'."$productcategoty".'</option>' ?>
                            <option>Đèn flash</option>
                            <option>Lens</option>
                            <option>Đồ chơi tổng hợp</option>
                            </select>
                        <?php break;
                        
                    }?>
                    
                    
                    
                </td>
            </tr>
            <tr>
                <td>
                    <label for="LtbBrand">Chọ hãng sản xuất</label></td>
                </td>
                <td align="left">
                    <select name="LtbBrand" id="LtbBrand">
                        <?php echo'<option>'."$productbrand".'</option>' ?>
                            <option>Nikon</option>
                            <option>Canon</option>
                            <option>Sony</option>
                            <option>Tamron</option>
                            <option>Sigma</option>
                            <option>Panasonic</option>
                            <option>Khác</option>
                            </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="txtTenSP">Tên sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input style="width: 330px" type="text" name="txtTenSP"  value="<?php echo"$productname" ?>">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="file">Chọn hình ảnh sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input type="file" name="file" id="file">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="txtGiaSP">Giá sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <input type="text" name="txtGiaSP" value="<?php echo"$productprice" ?>">
                 </td>
            </tr>
            
            <tr>
                <td>
                    <label for="txtMotaSP">Mô tả sản phẩm</label></td>
                 </td>
                 <td align="left">
                     <textarea name="txtMotaSP" id="txtGioithieu" cols="40" rows="15"  ><?php echo"$productdes"?></textarea>
                 </td>
            </tr>
            
            <tr>
                
                 <td align="left">
                     <input type="hidden" name="txtIDSP" value="<?php echo"$productid" ?>">
                 </td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="submit" value="Chỉnh sửa sản phẩm"/>
                
            </tr>
            
        </table></center>
        </form>
        <div class="clear"></div>
    </div><!--End #main_content-->
   <?php include "../view/admin/footer.php";?>

