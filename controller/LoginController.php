<?php
    if(!isset($_SESSION)) session_start();
    include_once "Controller.php";
    include_once "model/LoginModel.php";
    class LoginController{

        function dangkiTK($name,$gender,$email,$address,$phone,$password){
           $userModel = new LoginModel();
           $check=$this->selectUse($email);
            if($check==false){
                $userModel->insertCustomers($name,$gender,$email,$address,$phone,$password);
                $_SESSION['success_regis']='Đăng Kí Thành Công';          
                if(isset($_SESSION['error_regis'])){
                    unset($_SESSION['error_regis']);
                }           
                header('location:singup.php');         
            }else{
                $_SESSION['error_regis']='Đăng Kí Không Thành Công';
                // if(isset($_SESSION['error'])){
                //     unset($_SESSION['error']);
                // }  
                header('location:singup.php');
            }
        }
    
        function dangnhapTk($username,$password){
            
            $userModel = new LoginModel();
            $check=$userModel->selectLogin($username,$password);
            if($check==false){
                $_SESSION['error']='Sai email hoặc password';
                header('location:singup.php');
            }else{
                $_SESSION['name']=$username;   
                $_SESSION['customer']=$check;
                if(isset($_SESSION['error'])){
                    unset($_SESSION['error']);
                }                  
                header('location:index.php'); 
            }
        }
    
        function selectUse($email){
            $userModel = new LoginModel();
            $check=$userModel->selectCustomers($email);
            return $check;
        }
    
        function dangXuatTk(){
           unset($_SESSION['name']);
           unset($_SESSION['cart']);
           unset($cart);
            header('location:index.php'); 
        }
    
    }
?>