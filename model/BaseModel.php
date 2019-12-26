<?php
require_once 'DBConnect.php';
class BaseModel extends DBConnect{

    function selectMenu(){
        $sql = "SELECT *
        FROM categories c
        WHERE c.deleted = '0'
        AND c.id IN( SELECT p.id_categories FROM products p)";
        return $this->loadMoreRows($sql);
    }

}


?>