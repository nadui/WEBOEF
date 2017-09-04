<?php
include_once 'Database/Verbinding/DatabaseFactory.php';

class NewsletterDb {

    private static function getVerbinding() {
        return DatabaseFactory::getDatabase();
    }
    
    public static function insert($email) {

        return self::getVerbinding()->voerSqlQueryUit("INSERT INTO newsletter (email) VALUES ('$email')");
    }
    
    public static function exist($email) {
        $resultaat = self::getVerbinding()->voerSqlQueryUit("SELECT * FROM newsletter where email='" . $email . "'");

        if($resultaat->num_rows > 0) {
            return true;
        }
        
        return false;
    }
}
