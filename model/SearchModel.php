<?php

include_once 'DBConnect.php';

class SearchModel extends DBConnect{
    function findProducts($keyword,$date){
        $sql = "SELECT * 
                FROM sale s 
                INNER JOIN sale_detail sd 
                ON s.id=sd.id_sale 
                RIGHT JOIN products p 
                ON sd.id_product=p.product_code
                AND '$date' >= s.date_start AND '$date' <=s.date_end 
                WHERE name LIKE '%$keyword%'
                OR value = '$keyword'";
        return $this->loadMoreRows($sql);
    }
}

?>