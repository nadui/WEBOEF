<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once 'database/CRUD/NewsletterDb.php';
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $error = "";
        $success = "";
        
        if(empty($email)) {
            $error = "Gelieve je e-mailadres in te vullen";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Gelieve een geldig e-mailadres in te vullen";
        } elseif(NewsletterDb::exist($email)) {
            $error = "Je bent al in geschreven voor de nieuwsbrief";
        } else {
            if(NewsletterDb::insert($email)) {
                $success = "Je bent ingeschreven voor de nieuwsbrief";
            } else {
                $error = "Er is iets misgelopen, probeer het later opnieuw";
            }
        }
        
        echo "{\"success\": \"$success\", \"error\": \"$error\"}";
    }

?>
