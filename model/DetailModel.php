<?php
include_once 'DBConnect.php';

class DetailModel extends DBConnect{

    function getDetailProduct($id,$date){
        $sql = "SELECT * 
                FROM sale s 
                INNER JOIN sale_detail sd 
                ON s.id=sd.id_sale 
                RIGHT JOIN products p 
                ON sd.id_product=p.product_code
                AND '$date' >= s.date_start AND '$date' <=s.date_end 
                WHERE p.product_code='$id'";
        return $this->loadOneRow($sql);
    }

    function selectProductByType($idType,$id,$date){
        $sql = "SELECT * 
                FROM sale s 
                INNER JOIN sale_detail sd 
                ON s.id=sd.id_sale 
                RIGHT JOIN products p 
                ON sd.id_product=p.product_code
                AND '$date' >= s.date_start AND '$date' <=s.date_end 
                WHERE p.id_categories = '$idType'
                AND p.product_code != '$id' AND p.deleted='0'";
        return $this->loadMoreRows($sql);
    }

    function selectProductById($id,$date){
        $sql = "SELECT * 
                FROM sale s 
                INNER JOIN sale_detail sd 
                ON s.id=sd.id_sale 
                RIGHT JOIN products p 
                ON sd.id_product=p.product_code
                AND '$date' >= s.date_start AND '$date' <=s.date_end
                WHERE product_code='$id'";
        return $this->loadOneRow($sql);
    }

}

?>