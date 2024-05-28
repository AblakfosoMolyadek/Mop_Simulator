
<?php

/**
 * [Description IBaseFunc]
 */
interface IBaseFunc{
    public function LogOut();
    public function addSuccesful();
    public function updateSuccesful();
    public function removeSuccesful();
    public function customMessage(string $p1, string $p2, string $p3);
}

/**
 * [Description BaseFunc]
 */
class BaseFunc implements IBaseFunc {

    /**
     * Destroy current user session
     */
    public function LogOut()
    {
        unset($_SESSION[SiteConfig::USER_SESSION]);
        session_destroy();
        header("Location: ../logincontroll/index.php");
        exit;
    }

    /**
     * Messages
     */

    /**
     * Operation was successful message
     */
    public function addSuccesful()
    {
        return '<script>toastr.success("Item has been added successfully!", "System")</script>';
    }
    

    /**
     * Operation was successful message
     */
    public function updateSuccesful()
    {
        return '<script>toastr.success("Item has been updated successfully!", "System")</script>';
    }


    /**
     * Operation was successful message
     */
    public function removeSuccesful()
    {
        return '<script>toastr.success("Item has been removed successfully!", "System")</script>';
    }


    /**
     * @param string $p1 toastr message style (warning, success, error)
     * @param string $p2 message
     * @param string $p3 toast header text
     * 
     * @return [type]
     */
    public function customMessage(string $p1, string $p2, string $p3)
    {
        return '<script>toastr.'.$p1.'("'.$p2.'", "'.$p3.'")</script>';
    }

}

?>