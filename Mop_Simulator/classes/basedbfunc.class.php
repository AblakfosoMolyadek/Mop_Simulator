<?php

/**
 * Base dynamic function
 */
interface IMainDatabase{
    public function DynInsert(array $insData);
    public function Remove(int $q);
    public function Cnt(string $q);
}


class BaseDbFunc extends db implements IMainDatabase
{

    // Table
    protected $TA = null;
    
    // Connection
    protected $CNN = null;

    /**
     * MySQL remove row by id
     * 
     * @param int $i
     * 
     * @return [none | error]
     */
    public function Remove(int $i)
    {
        try {
            $d = $this->CNN->prepare("DELETE FROM {$this->TA} WHERE id=?");
            $d->bindValue(1, $i, PDO::PARAM_STR);
            $d->execute();
        } catch (Exception $e) {
            throw new Exception("Remove error: " . $e);
        }
    }


    /**
     * Dynamic insert by array
     * 
     * Use example: $a = array("key1"=>"val1", "key2"=>"val2")
     * The key must be same the table column name
     * 
     * @param array $insData
     * 
     * @return [error | restults]
     */
    public function DynInsert(array $insData)
    {
        $prep = array();
    
        foreach($insData as $k => $v ) {
            $prep[':'.$k] = $v;
        }

        try {
            $sth = $this->CNN->prepare("INSERT INTO {$this->TA} ( " . implode(', ',array_keys($insData)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")");
            $sth->execute($prep);
            return true;
        } catch(PDOException $e) {
            throw new Exception("Dynamic insert error: " . $e->getMessage());
            
        }
    }
    




    /**
     * MySQL row count by query
     * 
     * @param string $q
     * 
     * @return [int]
     */
    public function Cnt(string $q)
    {
        $d = $this->CNN->prepare($q);
        $d->execute();
        return (int)$d->rowCount();
    }

}


?>