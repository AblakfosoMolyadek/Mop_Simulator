<?php

    /**
     * Required setup files
     */
    spl_autoload_register('myAutoloader');

    function myAutoloader($className)
    {
        $path = __DIR__."/../classes/";
        $className = strtolower($className);

        $fullPath = $path.$className.'.class.php';

        if (!file_exists($fullPath)) {
            return false;
        }

        require_once $fullPath;
    }


    // For debug
    if (SiteConfig::PHP_ERR_SET == 1) {
        $dbg = new Debug();
        $dbg->PhpDbg();
    }

?>