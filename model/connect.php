<?php
class connect{
    public $db = null;
    public $dns = "mysql:host=localhost;dbname=camerashop";
    public $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    function __construct(){
        $result=$this->db=new PDO($this->dns,'root','',$this->options);
        return $result;
    }
    public function getList($select)
        {
            $results = $this->db->query($select);
            return $results;
        }
    //Tạo phương thức lấy 1 kết quả của bảng
            
    public function getInstance($select)
        { 
            $results = $this->db->query($select);
            $result = $results->fetch();
            return $result;
        }
}
?>


