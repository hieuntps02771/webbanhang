<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author Ngoc Huy Pham
 */
class contact {
    //Khởi tạo thuộc tính cho lớp users
        var $id = null;
        var $name = null;
        var $email = null;
        var $phone = null;
        var $desc = null;
        
  
     //Khởi tạo phương thức lấy danh sách từ form liên hệ
        function getContactlist() 
        { 
            $db = new connect();
            $select = "select * from contact";
            return $db->getList($select);
        }       
        
     //Lấy thông tin từ contact theo ID
        function getListById($id)
         {
            $db = new connect();
            $select = "select * from contact where ContactID='$id'";
            $result = $db->getList($select);
            $quest = $result->fetch();
            return$quest;
         }  
         
      //Khai báo phương thức thêm thông tin từ form liên hệ
         function addContact($tmpName,$tmpEmail,$tmpPhone,$tmpDesc)
          { 
            $db = new connect();
            $query = "INSERT INTO contact(ContectName,ContactEmail,ContactPhone,ContactDesc) VALUES ('$tmpName','$tmpEmail','$tmpPhone','$tmpDesc')";
            $db->exec($query);
          }   
         
 
          
          //Khai báo phương thức xoá thông tin liên hệ
        function deleteContact($id)
         {
            $db = new connect();
            $query = "delete from contact where ContactID = $id";
            $db->exec($query);
         }
}

?>
