<?php


/**
 * [Description IDbc]
 * 
 */
interface IDbc{
    public function DBC(string $D);
}


/**
 * [Description DatabaseClass]
 * Database connection
 */
class db implements IDbc{
    
    /**
     * DBC = Data Base Connection
     * 
     * @param string $D
     * 
     * @return [Obj | Err]
     */
    public function DBC(string $D){
        try {
            $dbConn = new PDO("mysql:host=10.11.11.10;dbname=$D;charset=utf8", "RandomUser", "HatValamiNagy0nEr0sJelsz0csk4");

            // set the PDO error mode to exception
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConn;
        } catch(PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
}


?>