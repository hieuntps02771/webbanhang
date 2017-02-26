<?php

class user{
    public $Username= null;
    public $Password = null;
    public $Fullname = null;
    public $Email = null;
    
    function getInfoUserById($username)
         {
            $db = new connect();
            $select = "select * from users where Username='$username'";
            $result = $db->getList($select);
            $quest = $result->fetch();
            return $quest;
         }  
    
}