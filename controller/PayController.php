<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
include_once "controller/CheckoutController.php";
require 'vendor/autoload.php';
class PayController extends Controller{
    function pay(){
        $checkOutController=new CheckoutController();
        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Adl9CAVxM2WeqpXwodog0ZmtVcMkAMJw2eCQNid9HPUGVZONF6oywSL7a2XPJfamJodBDYPZAm9O6WAV',
                'EK4S8u65VmT4Oav9ADwmr-C1MaXY_aG2NPb924uqj43J_02jf2kaDzW7pZ1HGCNXVOxXz0UCsVTF_7xt'
            )
          );
        if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID'])){
            die();
        }
        if((bool)$_GET['success']===false){
            echo "Thanh Toán Không Thành Công";
            die();
        }
        $paymentId=$_GET['paymentId'];
        $payerId=$_GET['PayerID'];
        $payment=Payment::get($paymentId,$paypal);
        $excute=new PaymentExecution();
        $excute->setPayerId($payerId);
        try{
            $result=$payment->execute($excute,$paypal);
        }catch(Exception $e){
            echo $e;
            die();
        }
        $result=$checkOutController->saveOrder();
        if($result){
        $checkOutController->updateQuantity();
        }
    }
    
}

?>