<?php
require_once 'DBConnect.php';

class CheckoutModel extends DBConnect{
    function selectCustomer($name){
        $sql = "SELECT id
                FROM customers 
                WHERE email='$name'";
        return $this->loadOneRow($sql);
    }

    function saveOrder($created_at, $id_customer,$address,$name,$total){
        
        $sql = "INSERT INTO `order_cus`(`id`, `id_employ`, `created_at`, `id_customer`, `address`,`username`,`id_shipper`,`status`,`total`) VALUES ('',null,'$created_at','$id_customer','$address','$name',null,'0','$total')";
        $result = $this->executeQuery($sql);
        return $result ? $this->getLastId() : false;
    }

    function saveOrderDetail($idOrder,$idProduct, $qty, $price){
        $sql = "INSERT INTO order_detail (id_product,value,quanlity_out,id_order)
                VALUES('$idProduct','$price', '$qty', '$idOrder')";
        return $this->executeQuery($sql); 
    }

    function deleteCustomer($id){
        $sql = "DELETE FROM customers WHERE id='$id'";
        return $this->executeQuery($sql);
    }
    function deleteOrder($id){
        $sql = "DELETE FROM order_cus WHERE id='$id'";
        return $this->executeQuery($sql);
    }
    function deleteOrderDetail($idOrder){
        $sql = "DELETE FROM order_detail WHERE id_order='$idOrder'";
        return $this->executeQuery($sql);
        
    }

    function updateQualityProduct($idProduct,$quanlityProductOut){
        $sql = "UPDATE products SET quanlity_exist='$quanlityProductOut' WHERE product_code='$idProduct'";
        return $this->executeQuery($sql);
    }

    function countProduct($idProduct){
        $sql = "SELECT quanlity_exist FROM products WHERE product_code='$idProduct'";
        return $this->loadOneRow($sql);
    }
}
?>