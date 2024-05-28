<?php

interface IMyAccount{
    /**
     */
    public function __construct();
    public function __destruct();
    public function LoginCheckUnique(string $u, string $p);
    public function Register(string $u, string $p);
}


/**
 * [Description MyAccount]
 */
class MyAccount extends BaseDbFunc implements IMyAccount
{
    
    // Do not change this
    protected $T = "Users";

    // Current Connection
    protected $TblCon = null;


    public function __construct()
    {
        // Global db config
        $DBCFG = new DBCFG();

        // App Database
        $D = $DBCFG->MasterDatabase()["maindb"];

        // Create Connection Object
        $this->TblCon = parent::DBC($D);

        // Set Connection Object To Parent Class 
        $this->CNN = $this->TblCon;

        // Set Table Value To Parent Class 
        $this->TA = $this->T;
    }


    public function __destruct()
    {
        $this->TblCon = null;
    }


    /**
     * @param int $score
     * @param int $uId
     * 
     * @return none
     */
    public function updateMaxScore(int $score, int $uId)
    {
        try {
            $d = $this->TblCon->prepare("UPDATE {$this->TA} SET MaxScore = ? WHERE id = ?");
            $d->bindValue(1, $score, PDO::PARAM_INT);
            $d->bindValue(2, $uId, PDO::PARAM_INT);
            $d->execute();
        } catch (Exception $e) {
            throw new Exception("updateMaxScore error: " . $e);
        }
    }


    /**
     * @param int $uId UserId
     * @return string MaxScore
     */
    public function getCurrUserMaxScore(int $uId)
    {
        try {
            $d = $this->TblCon->prepare("SELECT MaxScore FROM {$this->T} WHERE id = ?");
            $d->bindValue(1, $uId, PDO::PARAM_INT);
            $d->execute();
            return $d->fetchAll(PDO::FETCH_ASSOC)[0]['MaxScore'];

        } catch (Exception $e) {
            throw new Exception("getCurrUserMaxScore error: " . $e);
        }
    }


    /**
     * @return array
     */
    public function getAllUsersMaxScore()
    {
        try {
            $d = $this->TblCon->prepare("SELECT UserName, MaxScore FROM {$this->T} ORDER BY MaxScore DESC");
            $d->execute();
            return $d->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            throw new Exception("getAllUsersMaxScore: " . $e);
        }
    }


    public function Register(string $u, string $p)
    {

        try {
            $d = $this->TblCon->prepare("SELECT * FROM {$this->T} WHERE UserName = ?");
            $d->bindValue(1, $u, PDO::PARAM_STR);
            $d->execute();
            
            $uCheck = $d->fetchAll(PDO::FETCH_ASSOC)[0]['UserName'] ?? "none";
            
            if ($uCheck == "none") {
                $d = $this->TblCon->prepare("INSERT INTO {$this->TA} (UserName, Pwd) VALUES (?, ?)");
                $d->bindValue(1, $u, PDO::PARAM_STR);
                $d->bindValue(2, md5($p), PDO::PARAM_STR);
                $d->execute();
                return true;
            }else{
                return false;
            }


        } catch (Exception $e) {
            throw new Exception("Register error: " . $e);
        }
    }

    
    /**
     * @param string $u - Username
     * @param string $p - Password
     * 
     * @return true=bool|error=array
     */
    public function LoginCheckUnique(string $u, string $p)
    {
        // Err
        $err = array();

        // 1st check user acces to db. If ok check pwd, else, message to user
        $d = $this->TblCon->prepare("SELECT id, UserName, Pwd FROM {$this->T} WHERE UserName = ? LIMIT 1");
        $d->bindValue(1, $u, PDO::PARAM_STR);

        $d->execute();
        
        $cAccessCnt = $d->rowCount();

        // Check user acces to database
        if ($cAccessCnt == 1) {
            $vAccess = $d->fetchAll(PDO::FETCH_ASSOC);

            if ($vAccess[0]["Pwd"] == md5($p)) {
                $_SESSION[SiteConfig::USER_SESSION]  = $u;
                $_SESSION['MaxScore'] = $vAccess[0]["MaxScore"];
                $_SESSION['uid']      = $vAccess[0]["id"];
                $_SESSION['Username'] = $vAccess[0]["UserName"];
            }else{
                array_push($err, '<script>toastr.error("Username or Password is invalid.", "System")</script>');
            }

        }else{
            array_push($err, '<script>toastr.error("<b>'.$u.'</b>  You do not have acces to this site!", "System")</script>');
        }

        // Return OK or error array
        if (count($err) == 0) {
            return 1;
        }else{
            return $err;
        }

    }

}

?>