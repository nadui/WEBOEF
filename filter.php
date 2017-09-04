<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include_once 'database/CRUD/PropertyDB.php';
        include_once 'include/functions.php';
        $type = isset($_GET["type"]) ? $_GET["type"] : "";
        $price = isset($_GET["price"]) ? $_GET["price"] : "";
        $propertytype = isset($_GET["propertytype"]) ? $_GET["propertytype"] : "";
        $properties = PropertyDB::getFiltered($type, $price, $propertytype, true);
        
        include "include/properties.php";
    }
?>