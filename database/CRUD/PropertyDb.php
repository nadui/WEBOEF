<?php
include_once 'Data/Property.php';
include_once 'Database/Verbinding/DatabaseFactory.php';

class PropertyDb {

    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }
    
    public static function getAll() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM properties");
        
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }
    
    public static function getFiltered($type, $price, $propertytype) {
        $filter = "";
        if($type != "" && $type !== "0") {
            $filter .= " and type = '" . $type . "'";
        }
        if($propertytype != "" && $propertytype !== "0") {
            $filter .= " and propertytype = '" . $propertytype . "'";
        }
        if($price != "" && $price !== "0") {
            if($price != 300000) { 
                $filter .= " and price >= " . $price . " and price < " . ($price + 50000) ;
            } else {
                $filter .= " and price >= " . $price;
            }
        }
        
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM properties where 1=1" . $filter);
        
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function getSlider() {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM properties where featured=1 limit 5");
        
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function getCheapest($limit) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM properties order by price asc limit " . $limit);
        
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }
    
    
    public static function getById($id) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM properties WHERE id=?", array($id));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            //Er is waarschijnlijk iets mis gegaan
            return false;
        }
    }


    protected static function converteerRijNaarObject($databaseRij) {
        return new Property($databaseRij['id'], $databaseRij['title'], $databaseRij['description'], $databaseRij['images'], $databaseRij['price'], $databaseRij['street'], $databaseRij['number'], $databaseRij['zipcode'], $databaseRij['city'], $databaseRij['country'], $databaseRij['bedrooms'], $databaseRij['livingrooms'], $databaseRij['parking'], $databaseRij['kitchen'], $databaseRij['type'], $databaseRij['propertytype'], $databaseRij['featured'], $databaseRij['sold']);
    }

}
