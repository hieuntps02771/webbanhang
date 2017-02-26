<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Ngoc Huy Pham
 */
class user

 {
    //Khởi tạo thuộc tính cho lớp users
       
        var $Username = null;
        var $Password = null;
        var $Name = null;
        var $Email = null;
        var $images = null;
        
  
     //Khai báo phương thức lấy danh sách user
        function getUser() 
        { 
            $db = new connect();
            $select = "select * from users";
            return $db->getList($select);
        }   
        
     //Khai báo phương thức lấy danh sách liên hệ
        function getContact() 
        { 
            $db = new connect();
            $select = "select * from contact";
            return $db->getList($select);
        }     
        
     //Khai báo phương thức lấy thông tin tài khoản đăng nhập
        function getInfoById($username)
         {
            $db = new connect();
            $select = "select * from users where Username='$username'";
            $result = $db->getList($select);
            $quest = $result->fetch();
            return $quest;
         }
	    function getInfoByUsernameAndPass($username,$password){
			$db = new connect();
			$select = "select * from users where Username='$username' and Password='$password'";
			$result = $db->getList($select);
            $quest = $result->fetch();
            return $quest;
		}
         
      //Khai báo phương thức đăng ký tài khoản
         function insertUser($tmpUsername,$tmpPassword,$tmpName,$tmpEmail,$tmpPermisions)
          { 
            $db = new connect();
            $query = "INSERT INTO users(Username,Password,FullName,Email,Permisions) VALUES ('$tmpUsername','$tmpPassword','$tmpName','$tmpEmail','$tmpPermisions')";
            $db->exec($query);
          }   
         
       //Khai báo phương thức chỉnh sửa tài khoản
        function updateUser($tmpUsername,$tmpPassword,$tmpName,$tmpEmail)
         { 
         $db = new connect();
         $query = "update users set Password='$tmpPassword',Username='$tmpName',Email='$tmpEmail' where Username='$tmpUsername'";
         $db->exec($query);
         }
         
           
          
          //Khai báo phương thức xoá tài khoản
        function deleteUser($id)
         {
            $db = new connect();
            $query = "delete from users where UserName = '$id'";
            $db->exec($query);
         }
         
         //Khai báo phương thức chỉnh sửa thông tin đăng nhập
        function updatePassword($tmpUsername,$tmpPassword)
         { 
         $db = new connect();
         $query = "update users set Password='$tmpPassword' where UserName='$tmpUsername'";
         $db->exec($query);
         }
         //Khai báo phương thức cập nhật avatar
       function Change_avatar($Username, $avatar)
       {
           $db=new connect();
           $query = "update users set avatar='$avatar' where UserName='$Username'";
           $db->exec($query);
       }
       //Khai báo phương thức thay đổi thông tin user
       function Change_info($tmpUsername,$tmpFullName,$tmpEmail,$tmpAddress,$tmpPhone)
         { 
         $db = new connect();
         $query = "update users set FullName='$tmpFullName',Email='$tmpEmail',Address='$tmpAddress',Phone='$tmpPhone' where UserName='$tmpUsername'";
         $db->exec($query);
         }
}

?>
