<?php
include_once "DBConnect.php";
class HomeModel extends DBConnect{
    function selectFeaturedProduct($date){
        $sql = "SELECT *
        FROM sale s
        INNER JOIN sale_detail sd
            ON s.id= sd.id_sale
        INNER JOIN products p
            ON sd.id_product = p.product_code
        AND '$date' >= s.date_start AND '$date' <=s.date_end
        WHERE p.new=1 AND sd.percent_sale<>'null' AND p.deleted='0'";
        return $this->loadMoreRows($sql);   
    }
    function selectBestSeller($date){
        $sql = "SELECT *
        FROM sale s
        INNER JOIN sale_detail sd
            ON s.id= sd.id_sale
        INNER JOIN products p
            ON sd.id_product = p.product_code
        AND '$date' >= s.date_start AND '$date' <=s.date_end
        WHERE  p.new <>1 AND p.deleted='0'";           
        return $this->loadMoreRows($sql);   
            
    }
    function selectNewProduct(){
        $sql = "SELECT * FROM products 
        WHERE new =1 AND deleted='0' AND product_code NOT IN(
        SELECT p.product_code
                        FROM products p
                        INNER JOIN sale_detail sd
                        ON sd.id_product = p.product_code
                        WHERE p.new=1)";
        return $this->loadMoreRows($sql);   
            
    }
}


?>