<?php
include"../model/connect.php";
$errors = array(
    'error' => 0
); 

$username   = isset($_POST['username']) ? trim($_POST['username']) : '';
$password   = isset($_POST['password']) ? trim($_POST['password']) : '';
$email      = isset($_POST['email'])    ? trim($_POST['email'])    : '';
$fullname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$address   = isset($_POST['address']) ? trim($_POST['address']) : '';
$telephone   = isset($_POST['telephone']) ? trim($_POST['telephone']) : ''; 

if (empty($username)){
    $errors['username'] = 'Bạn chưa nhập tên đăng nhập';
}
 
if (empty($password)){
    $errors['password'] = 'Bạn chưa nhập mật khẩu';
}
 
if (empty($email)){
    $errors['email'] = 'Bạn chưa nhập Email';
}
if (empty($address)){
    $errors['diachi'] = 'Bạn chưa nhập địa chỉ';
}
if (empty($telephone)){
    $errors['email'] = 'Bạn chưa nhập số điện thoại';
}
if (empty($fullname)){
    $errors['fullname'] = 'Bạn chưa nhập họ tên';
}
if(preg_match("/^[0-9]|[[:punct]]/",$email))$errors['email']= 'Email không được có số hoặc kí tự đặc biệt đầu tiên';
if(preg_match("/^[[:alpha:]]+[[:word:]]*\.[[:alpha:]]*\.?[[:alpha:]]*/",$email)) $errors['email']='Email phải có kí tự @ và không có kí tự đặc biệt';
if(preg_match("/[^0-9]/",$telephone)) $errors['telephone']='Telephone phải là kí tự số'; 
 

if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
} 

$dk_form = new connect();
 
$username = addslashes($username);
$email = addslashes($email);
 
$sql = "SELECT * "
        . "FROM users "
        . "WHERE Username='".addslashes($username)."' "
                . "OR Email='".addslashes($email)."'";
 
$result = $dk_form->db->query($sql);
 
if (!$result){
    $errors['sql_db'] = 'Lỗi câu truy vấn SQL';
}
 
if ($result->rowCount() > 0)
{
    $row = $result->fetch();
    if ($row[1] == $username){
        $errors['username'] = 'Tên đăng nhập đã tồn tại';
    }
    if ($row[4] == $email){
        $errors['email'] = 'Email đã tồn tại';
    }
}
 

if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}
 

$sql = "INSERT INTO users(Username, Password, Email, FullName)".
        " VALUES('".addslashes($username)."','".md5(addslashes($password))."','".addslashes($email)."','".addslashes($fullname)."')";
if (!$dk_form->db->exec($sql)){
    $errors['error'] = 1;
    $errors['sql_db'] = 'Lỗi câu truy vấn SQL';
}
 

die (json_encode($errors));

?>

