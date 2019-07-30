<?php
require_once 'DBConnect.php';
class BaseModel extends DBConnect{

    function selectMenu(){
        $sql = "SELECT c.*
        FROM `categories` c";
        return $this->loadMoreRows($sql);
    }

}


?>