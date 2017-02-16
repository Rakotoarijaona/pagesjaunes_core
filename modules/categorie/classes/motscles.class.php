<?php
/**
 * @package pagesjaunes_core
 * @subpackage categorie
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");

class Motscles
{
    var $id;
    var $mot;
    var $is_publie;
    var $date_creation;
    var $date_update;

    // constructor
    public function __construct()
    {
        $this->id;
        $this->mot;
        $this->is_publie;
        $this->date_creation;
        $this->date_update;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        $this->id = $record->id;
        $this->mot = $record->mot;
        $this->is_publie = $record->is_publie;
        $this->date_creation = $record->date_creation;
        $this->date_update = $record->date_update;
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id = $this->id;
        $record->mot = $this->mot;
        $record->is_publie = $this->is_publie;
        $record->date_creation = $this->date_creation;
        $record->date_update = $this->date_update;
    }

    // insertion
    public static function insert($mot) {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ('motscles')." WHERE mot ='".$mot."'");
        $toRes = $res->fetchAll();
        if (sizeof($toRes) > 0)
        {
            foreach ($toRes as $value) {
                return $value->id;
            }
        }
        else
        {
            $dt = new jDateTime();
            $dt->now();
            $datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            $res = $cnx->exec("INSERT INTO ".$cnx->prefixTable ("motscles")." (mot, is_publie, date_creation) VALUES ('".$mot."', 1, '".$datecreation."')" );
            $last_id = $cnx->lastInsertId();
            return $last_id;
        }        
    }
}
?>