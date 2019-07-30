<?php
include_once 'Controller.php';
include_once 'model/DetailModel.php';
include_once 'helper/Cart.php';
session_start();

class CartController extends Controller{

    function loadShoppingCart(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        return $this->loadView('shopping-cart',$cart,"Giỏ hàng của bạn");
    }

    function addToCart(){
        $id = $_POST['id'];
        $qty =  isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
        $date=date("Y-m-d");
        $model = new DetailModel;
        $product = $model->selectProductById($id,$date);
        
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$qty);
        $_SESSION['cart'] = $cart;
        echo $cart->items[$id]['item']->name;
    }

    function deleteCart(){
        $id = $_POST['id'];

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        $_SESSION['cart'] = $cart;

        echo json_encode([
            'totalPrice'=>number_format($cart->totalPrice),
            'promtPrice'=>number_format($cart->promtPrice)
        ]);

        //print_r($_SESSION['cart']);
    }
    function updateCart(){
        $id = $_POST['id'];
        $qty = $_POST['qty'];

        $model = new DetailModel;
        $product = $model->selectProductById($id);

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;        
        $cart = new Cart($oldCart);
        $cart->update($product, $qty);

        $_SESSION['cart'] = $cart;
        
        echo json_encode([
            'discountPrice' => number_format($cart->items[$id]['discountPrice']),
            'totalPrice'=>number_format($cart->totalPrice),
            'promtPrice'=>number_format($cart->promtPrice)
        ]);
        //print_r($_SESSION['cart']);

    }
}



?>