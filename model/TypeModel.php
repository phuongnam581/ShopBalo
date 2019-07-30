<?php
require_once 'DBConnect.php';

class TypeModel extends DBConnect{

    function selectProductByCategories($id,$date){
        $sql = "SELECT * 
                FROM sale s 
                INNER JOIN sale_detail sd 
                ON s.id=sd.id_sale 
                RIGHT JOIN products p 
                ON sd.id_product=p.product_code
                AND '$date' >= s.date_start AND '$date' <=s.date_end 
                WHERE p.id_categories ='$id'";
        return $this->loadMoreRows($sql);
    }

    function countProduct($id){
        $sql = "SELECT COUNT(p.product_code)
        FROM products p 
         WHERE p.id_categories ='$id'";
        return $this->loadOneRow($sql);
    }

    function getNameType($id){
        $sql = "SELECT c.name
                FROM categories c 
                WHERE c.id = '$id'";
        return $this->loadOneRow($sql);
    }

    function selectAllType(){
        $sql = "SELECT count(p.product_code) as soluong , c.name
                FROM products p
                INNER JOIN categories c 
                ON p.id_categories = c.id 
                GROUP BY c.id";
        return $this->loadMoreRows($sql);
    }
}



?>