<?php
include_once 'DBConnect.php';

class LoginModel extends DBConnect{

    function selectCustomers($email){
        $sql = "SELECT * FROM customers WHERE email='$email'";
       return  $this->loadOneRow($sql);
    }
    function insertCustomers($name,$gender,$email,$address,$phone,$password){      
        $sql = "INSERT INTO customers(id,name,gender,email,address,phone,note,password) VALUES ( '','$name', '$gender', '$email','$address','$phone','','$password')";
        return $this->executeQuery($sql);
    }

    function selectLogin($username,$password){
        $sql = "SELECT * FROM customers WHERE email='$username'AND password='$password'";
       return  $this->loadOneRow($sql);
    }
}

?>