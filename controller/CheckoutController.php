<?php
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'vendor/autoload.php';
include_once "Controller.php";
include_once 'model/CheckoutModel.php';
include_once 'helper/Cart.php';
include_once 'helper/functions.php';
include_once 'helper/phpmailer/mailer.php';
include_once 'LoginController.php';
define('SITE_URL','http://localhost:8888/shop_balo');

class CheckoutController extends Controller{

    function loadCheckoutPage(){
        return $this->loadView('checkout',[],"Đặt hàng");
    }

    function checkOut(){
        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Adl9CAVxM2WeqpXwodog0ZmtVcMkAMJw2eCQNid9HPUGVZONF6oywSL7a2XPJfamJodBDYPZAm9O6WAV',
                'EK4S8u65VmT4Oav9ADwmr-C1MaXY_aG2NPb924uqj43J_02jf2kaDzW7pZ1HGCNXVOxXz0UCsVTF_7xt'
            )
          );
        $address = trim($_POST['address']);
        $name=trim($_POST['name']);
        $names=explode(" ",$name);
        // print_r($name);
        // die;
        if(isset($name) === true && $name === ''){
            // print_r('aab');
            // die;
            $_SESSION['addresserror']='Tên không hợp lệ';
            header('location:checkout.php');
            return;
        }
        elseif(isset($address) === true && $address === ''){
            // print_r('aaa');
            // die;
            $_SESSION['addresserror']='Địa chỉ không hợp lệ';
            header('location:checkout.php');
            return;
        }
       
        $_SESSION['nameCustomer']=$name;
        $_SESSION['addressCustomer']=$address;
        $model = new CheckoutModel();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            if($cart==null){
                header('location:index.php'); 
                return;
            }
        // construct paypal payment API
        
            $payer=new Payer();
            $itemList=new ItemList();
            $details=new Details();
            $amount=new Amount();
            $transaction=new Transaction();
            $redirectUrls=new RedirectUrls();
            $payment=new Payment();


            $idCustomer=$model->selectCustomer($_SESSION['name']);
            $array = get_object_vars($idCustomer);
            $dateOrder = date('Y-m-d',time());
            $promtPrice = $cart->promtPrice;
            $total = $promtPrice;
         //   $idOrder=$model->saveOrder($dateOrder,$array['id'],$address,$name,$total); //lưu order

      //      if($idOrder){
                //lưu order detail  
                $itemss=array();
                $i=0;
                foreach($cart->items as $id=>$sp){
                  //  print_r($cart);
                    $idProduct = $id;
                    $qty = $sp['qty'];
                    $price = $sp['discountPrice'];
                    $name=$sp['item']->name;
                    $subTotal=$price*$qty;              
                    // $check = $model->saveOrderDetail($idOrder,$idProduct, $qty, $price);
                    // if(!$check){                        
                    //     $model->deleteOrder($idOrder);                
                    //     $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                    //     header('location:checkout.php');
                    //     return;
                    // }else{  
                            $payer->setPaymentMethod('paypal');
                            $itemss[$i]=new Item();
                            $itemss[$i]->setName($name)
                                 ->setCurrency('USD')
                                 ->setQuantity($qty)
                                 ->setPrice($price);   
                            $i++;
                        
                          
                    // }
                }
                $itemList->setItems($itemss);    
                
                $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($promtPrice);  
                                                 
                $amount->setCurrency('USD')
                ->setTotal($promtPrice)
                ->setDetails($details);
               
                $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription('Pay s/t')
                ->setInvoiceNumber(uniqid());
               
                $redirectUrls->setReturnUrl(SITE_URL . '/pay.php?success=true')
                ->setCancelUrl(SITE_URL . '/pay.php?success=false');

                $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
                try {
                        $payment->create($paypal);
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                        echo $ex->getCode(); // Prints the Error Code
                        echo "<br>";
                        echo $ex->getData(); // Prints the detailed error message 
                        echo "<br>";
                        die($ex);
                } catch (Exception $ex) {
                            die($ex);
                }
                $approvalUrl=$payment->getApprovalLink();
                header("Location: {$approvalUrl}"); 
            // }
            // else{
            //     $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
            //     header('location:checkout.php');
            //     return;
            // }
    }
    function updateQuantity(){
        $cart=$_SESSION['cart'];
        $modelUpdate=new CheckoutModel();
        foreach($cart->items as $id=>$sp){
            $idProduct = $id;
            $qty = $sp['qty'];
            $countProduct=$modelUpdate->countProduct($idProduct);
            $arrayCount=get_object_vars($countProduct);
            $quanlityProducNow=$arrayCount['quanlity_exist'];
            $qualityExist=$quanlityProducNow-$qty;                              
            $checkUpdateQuality=$modelUpdate->updateQualityProduct($idProduct,$qualityExist);  
            if(!$checkUpdateQuality){
                $modelUpdate->deleteOrder($idOrder);
                $modelUpdate->deleteOrderDetail($idOrder);
                $_SESSION['error'] = "Cập Nhật Số Lượng Tồn Thất Bại";
                header('location:checkout.php');
                return;
            }
        }
      
        unset($_SESSION['cart']);
        header('location:index.php');
    }

    function saveOrder(){
        $model = new CheckoutModel();
        $cart = $_SESSION['cart'];
        $idCustomer=$model->selectCustomer($_SESSION['name']);
        $array = get_object_vars($idCustomer);
        $dateOrder = date('Y-m-d',time());
        $total = $cart->promtPrice;
        $address=$_SESSION['addressCustomer'];
        $name=$_SESSION['nameCustomer'];
        $email=$_SESSION['name'];
        $idOrder=$model->saveOrder($dateOrder,$array['id'],$address,$name,$total);
        if($idOrder){
            
            foreach($cart->items as $id=>$sp){
                $idProduct = $id;
                $qty = $sp['qty'];
                $price = $sp['discountPrice'];
                $check = $model->saveOrderDetail($idOrder,$idProduct, $qty, $price);
                    if(!$check){                        
                        $model->deleteOrder($idOrder);                
                        $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                        header('location:checkout.php');
                        return false;
                    }     
            }
            $subject = "Trạng Thái đơn hàng DH".$idOrder;
            $content = "
                           Chào bạn $name,<br/>
                           Cảm ơn bạn đã đặt hàng tại website của chúng tôi.<br/>
                           Đơn Hàng của bạn đã được xác nhận.<br/>
                           Vui lòng thường xuyên cập nhật email để biết thêm trạng thái đơn hàng <br/>                              
                           Thanks and Best Regard.
                       ";
           $check=maill($name,$email,$subject,$content);
        }else{
                $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                header('location:checkout.php');
                return false;
            }
            
            return true;
    }
}
?>