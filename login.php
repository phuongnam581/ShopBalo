<?php
require_once 'controller/LoginController.php';
$c = new LoginController;
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
     $c->dangnhapTk($email,$pass);
}else{
    $fullname_regis=$_POST['fullname_regis'];
    $gender_regis=$_POST['gender'];
    $email_regis=$_POST['email_regis'];
    $address_regis=$_POST['address_regis'];
    $phone_regis=$_POST['phone_regis'];
    $pass_regis=$_POST['pass_regis'];
     $c->dangkiTK($fullname_regis,$gender_regis,$email_regis,$address_regis,$phone_regis,$pass_regis);
}
?>