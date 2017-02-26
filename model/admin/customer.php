<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer
 *
 * @author Ngoc Huy Pham
 */
class customer 
{
    var $id = null; 
    var $username = null; 
    var $password = null;
    var $name = null; 
    var $email = null;
    
    public function __construct() {} 
    
    public function checkUser($username,$password) 
    { 
        $db = new connect();               
        $select="select * from users where UserName='$username' and Password='$password'"; 
        $result = $db->getInstance($select); 
        //echo $select; 
        if($result!=null) 
            return true; 
        else 
            return false; 
    }
    
    public function userid($username,$password) 
    { 
        $db = new connect();               
        $select="select UserID from users where UserName='$username' and Password='$password'"; 
        $result = $db->getInstance($select);
        return $result;
    }
    
    public function permision($username,$password) 
    { 
        $db = new connect(); 
        $select = "select * from users where UserName='$username' and Password='$password' "; 
        return $db->getList($select); 
       
    }
    
   
    
    public function checkPassword($username,$email) 
    { 
        $db = new connect();               
        $select="select * from users where UserName='$username' or Email='$email'"; 
        $result = $db->getInstance($select); 
        //echo $select; 
        if($result!=null) 
            return true; 
        else 
            return false; 
    }
    
    
    public function getPassword(){ 
        $pass_length = 8;         
        $symbol = "~!@#$%^&*(){}[];?><,./"; 
        $symbol_count = strlen($symbol); 
        $index = mt_rand(0,$symbol_count); 
        $this->password = substr($symbol,$index,1); 
        $this->password .= chr(mt_rand(48,57)); 
        $this->password .= chr(mt_rand(65,90));
        while(strlen($this->password) < $pass_length) 
        { 
            $this->password .= chr(mt_rand(97,122)); 
        }                
        $this->password = str_shuffle($this->password);         
        return $this->password; 
    }
    
    public function checkInfo($username,$email)
     {
        $db = new connect(); 
        $select="select * from users where UserName='$username' and Email='$email'";
        $result = $db->getInstance($select);
        // echo $select;
        if($result!=null)
        return true;
        else
        return false;
    }
        
        
        
        
}
    


?>