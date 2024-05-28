<?php

    // Required setup files
    require_once "autoload.inc.php";

    // Password protection check
    if(SiteConfig::PASSWORD_PROTECTED_WEBSITE == 1){
        session_start();
                
        if(!isset($_SESSION[SiteConfig::USER_SESSION])){
            header("location: ".SiteConfig::LOGGED_OFF_PAGE);
            exit;
        }
    }
?>