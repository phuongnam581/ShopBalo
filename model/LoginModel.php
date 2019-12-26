<?php
include_once 'DBConnect.php';

class LoginModel extends DBConnect{

    function selectCustomers($email){
        $sql = "SELECT * FROM customers WHERE email='$email'";
       return  $this->loadOneRow($sql);
    }
    function insertCustomers($name,$gender,$email,$address,$phone,$password){      
        $sql = "INSERT INTO customers(id,name,gender,email,address,phone,note,password,active) VALUES ( '','$name', '$gender', '$email','$address','$phone','','$password','0')";
        return $this->executeQuery($sql);
    }

    function selectLogin($username,$password){
        $sql = "SELECT * FROM customers WHERE email='$username'AND password='$password' AND active ='1'";
       return  $this->loadOneRow($sql);
    }
    function updateActive($token){
        $sql = "UPDATE customers SET active='1' WHERE email='$token'";
        return $this->executeQuery($sql);
    }
}

?>