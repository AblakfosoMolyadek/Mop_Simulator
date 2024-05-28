<?php


/**
 * [Description IMainDB]
 */
interface IDBCFG{
    public function MasterDatabase();
}



/**
 * Database config class
 * 
 * [Description MainDB]
 */
class DBCFG implements IDBCFG{
    

    /**
     * Contain the main database name
     * 
     * @return array
     */
    public function MasterDatabase(){
        $dbArr = array(
            "maindb" => "mopsimulator"
        );

        return $dbArr;
    }
}


?>