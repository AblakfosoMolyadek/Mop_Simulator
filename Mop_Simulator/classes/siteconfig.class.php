<?php


/**
 * [Description ISiteConfig]
 */
interface ISiteConfig
{
    public function LoginLinks($p);
    public function MainLinks($p);
}


/**
 * [Description SiteConfig]
 */
class SiteConfig implements ISiteConfig
{
    /**
     * SYSTEM CONFIGURATION
     */

    // 0 = Disabled - 1 = Enabled
    // ---------------------------------------------
        const PASSWORD_PROTECTED_WEBSITE = 1; 
    // ---------------------------------------------
    
    // Resubmission Protect | 0 = Disabled - 1 = Enabled
    // ---------------------------------------------
        const RESUB_PROTECT              = 1;  
    // ---------------------------------------------
    
    // Show All Php Errors & Warnings | 0 = Disabled - 1 = Enabled
    // TODO : Before move project to prod, disable this option
    // ---------------------------------------------
        const PHP_ERR_SET                = 1;  
    // ---------------------------------------------

    // Show Php Info | 0 = Disabled - 1 = Enabled
    // ---------------------------------------------
        const SHOW_PHP_INFO              = 0;  
    // ---------------------------------------------

    /**
     * WEBSITE CONFIG
     */
    // Current year
    const CURR_YEAR              = '<span id="year"></span><script> var d = new Date(); var n = d.getFullYear(); document.getElementById("year").innerHTML = n;</script>';

    // App active years
    const YEAR                   = self::CURR_YEAR;

    // Website name
    const WEBSITE_NAME           = 'Kitchen mop simulator';

    // Company logo
    const LOGO                   = '<img src="../images/logo.png" width="20">';



    /**
     * WEBSITE MAIN & LOGOFF PAGE
     * This is the first page.
     */
    const LOGGED_IN_PAGE         = '../TheGame/game.php';

    /**
     * Return you to login page if enabled.
     * [DO NOT CHANGE THIS]
     */
    const LOGGED_OFF_PAGE        = '../index.php';
    
    /**
     * sessiong variable ($_SESSION['login_user'];)
     */
    // TODO: Change this
    const USER_SESSION           = 'CHANGE_THIS';



    /**
     * USER GROUP CONFIG
     */

    // ACCESS ENABLE
    const SITE_ENABLE_ACCESS     = 'F7bw4jHwKuzCedEjzZ93Jh73VoGMLAGGRTxNTPcRfB7';
    
    const STYLE_SET = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">';

    
    /**
     * Return login page links
     * 
     * @param mixed $p
     * 
     * @return string
     */
    public function LoginLinks($p)
    {
        $loginLinks = '
            <!-- CSS -->
            <link rel="stylesheet" href="'.$p.'css/all.min.css">
            <link rel="stylesheet" href="'.$p.'css/bootstrap.min.css">
            <link rel="stylesheet" href="'.$p.'css/login.css">
            <link rel="stylesheet" href="'.$p.'css/toastr.min.css">

            <!-- JS -->
            <script src="'.$p.'js/jquery.min.js"></script>
            <script src="'.$p.'js/bootstrap.bundle.min.js" defer></script>
            <script src="'.$p.'js/toastr.js"></script>
            <script src="'.$p.'js/toastrOpt.js"></script>
        ';

        return $loginLinks;
    }


    /**
     * Return normal page links
     * 
     * @param mixed $p Folder up eg.: '../' or '../../' etc...
     * 
     * @return string
     */
    public function MainLinks($p)
    {
        $lnk = '
        <!-- CSS -->
        <link rel="stylesheet" href="'.$p.'css/bootstrap.min.css">
        <link rel="stylesheet" href="'.$p.'css/all.min.css">
        
        <link rel="stylesheet" href="'.$p.'css/main.css">
        <link rel="stylesheet" href="'.$p.'css/bootstrap_overwrite.css">

        <link rel="stylesheet" href="'.$p.'css/toastr.min.css">
        
        <!-- JS -->
        <script src="'.$p.'js/jquery.min.js"></script>
        
        <script src="'.$p.'js/bootstrap.bundle.min.js" defer></script>
        <script src="'.$p.'js/functions.js"></script>

        <script src="'.$p.'js/toastr.js"></script>
        <script src="'.$p.'js/toastrOpt.js"></script>

        <link rel="stylesheet" href="'.$p.'css/slimselect.min.css">
        <script src="'.$p.'js/slimselect.min.js"></script>
            ';

            if (self::RESUB_PROTECT == 1) {
                $lnk .= '<script src="'.$p.'js/ResubmissionProtect.js"></script>';
            }

        return $lnk;
    }

}

?>