<?php
include_once "Controller.php";
include_once 'model/CheckoutModel.php';
include_once 'helper/Cart.php';
include_once 'helper/functions.php';
include_once 'helper/phpmailer/mailer.php';
session_start();

class CheckoutController extends Controller{

    function loadCheckoutPage(){
        return $this->loadView('checkout',[],"Đặt hàng");
    }

    function checkOut(){
        $address = $_POST['address'];
        $model = new CheckoutModel();
           
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            if($cart==null){
                header('location:index.php'); 
                return;
            }
            // print_r($cart);
            // die;
            $idCustomer=$model->selectCustomer($_SESSION['name']);
            $array = get_object_vars($idCustomer);
            $dateOrder = date('Y-m-d',time());
            $promtPrice = $cart->promtPrice;
            $total = $cart->totalPrice;
            $idOrder=$model->saveOrder($dateOrder,$array['id'],$address); //lưu order
            if($idOrder){
                //lưu order detail  
                foreach($cart->items as $id=>$sp){
                    $idProduct = $id;
                    $qty = $sp['qty'];
                    $price = $sp['discountPrice'];
                    $check = $model->saveOrderDetail($idOrder,$idProduct, $qty, $price);
                    if(!$check){                        
                        //delete order,
                        $model->deleteOrder($idOrder);                
                        $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                        header('location:checkout.php');
                        return;
                    }else{                 
                            $countProduct=$model->countProduct($idProduct);
                            $arrayCount=get_object_vars($countProduct);
                            $quanlityProducNow=$arrayCount['quanlity_exist'];
                            $qualityExist=$quanlityProducNow-$qty;       
                            $checkUpdateQuality=$model->updateQualityProduct($idProduct,$qualityExist);  
                            if($checkUpdateQuality){
                                $_SESSION['success'] = "Đặt hàng thành công";
                                unset($_SESSION['cart']);
                                unset($cart);
                                header('location:checkout.php');
                                return;
                            }else{
                                $_SESSION['error'] = "Có lỗi xảy ra,vui lòng thử lại";
                                header('location:checkout.php');
                                return;
                            }   
                    }
                }
            }
            else{
                $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                header('location:checkout.php');
                return;
            }
        // }
        // else{
            // $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
            // header('location:checkout.php');
            // return;
        // }
    }
}
?>