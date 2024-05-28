<?php

/**
 * Debug functions
 */
interface IDebug
{
    public function PrePrint(array $a);
    public function NiceTable(array $arr);
}


class Debug implements IDebug
{
    /**
     * Enable display errors
     */
    public function PhpDbg()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }


    /**
     * Print easy readable
     * 
     * @param array $a
     * 
     */
    public function PrePrint(array $a)
    {
        echo '<pre>';
        print_r($a);
        echo '</pre>';
    }
    

    /**
     * Create table from array
     * @param array $arr
     * 
     */
    public function NiceTable(array $arr)
    {
        $k=array_keys($arr);
        $keys=array_keys($arr[$k[0]]);
        print "<br>";
        print '<table class="table table-sm" style="width:960px; margin:auto;">';

        print '<tr>';
        foreach ($keys as $cell){
            print  '<th>'.$cell.'</th>';
        }
        print '</tr>';

        foreach ($arr as $row){

            print '<tr>';
                foreach ($row as $cell){
                    print '<td>'.$cell.'</td>';
                }
            print '</tr>';
        }
                
        print '</table>';
    }


}

?>