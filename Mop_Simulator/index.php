<?php
    // Setup
    require_once "includes/autoload.inc.php";


    session_start();
    

    // Cut one DOT from loggen in page url
    $LOGGED_IN_PAGE = substr(SiteConfig::LOGGED_IN_PAGE, 1);

    /**
     * Password protection check
     */
    if(SiteConfig::PASSWORD_PROTECTED_WEBSITE == 1){

        if(isset($_SESSION[SiteConfig::USER_SESSION])){
            header("location: ".$LOGGED_IN_PAGE);
            exit;
        }else{
            header("Location: logincontroll/index.php"); 
        }

    }else{
        
        // Redirect to main page
        header("Location: $LOGGED_IN_PAGE");
        exit();
    }
?>