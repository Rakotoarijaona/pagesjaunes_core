<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");

class CAds_type
{
    var $id;
    var $name;
    var $namealias;
    var $format;
    var $type_fichier;
    var $is_publie;
    var $date_publication;
    var $date_creation;
    var $date_modification;
    var $is_removed;
    var $creator_id;
    var $modificator_id;

    // constructor
    public function __construct()
    {
        $this->id = 0;
        $this->name = '';
        $this->namealias = '';
        $this->format = '';
        $this->type_fichier = '';
        $this->is_publie = 0;
        $this->date_publication = '';
        $this->date_creation = '';
        $this->date_modification = '';
        $this->is_removed = 0;
        $this->creator_id = 0;
        $this->modificator_id = 0;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        $this->id = $record->id;
        $this->name = $record->name;
        $this->namealias = $record->namealias;
        $this->format = $record->format;
        $this->type_fichier = $record->type_fichier;
        $this->is_publie = $record->is_publie;
        $dt = new jDateTime();

        if(($record->date_publication != '') &&  ($record->date_publication != null)) {
            $dt->setFromString($record->date_publication,jDateTime::DB_DTFORMAT);
            $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
        } else {
            $this->date_publication = '';
        }

        $dt->setFromString($record->date_creation,jDateTime::DB_DTFORMAT);
        $this->date_creation = $dt->toString(jDateTime::LANG_DTFORMAT);

        if(($record->date_modification != '') &&  ($record->date_modification != null)) {
            $dt->setFromString($record->date_modification,jDateTime::DB_DTFORMAT);
            $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);
        } else {
            $this->date_modification = '';
        } 

        $this->is_removed = $record->is_removed;
        $this->creator_id = $record->creator_id;
        $this->modificator_id = $record->modificator_id;
    }   

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id = $this->id;
        $record->name = $this->name;
        $record->namealias = $this->namealias;
        $record->format = $this->format;
        $record->type_fichier = $this->type_fichier;
        $record->is_publie = $this->is_publie;
        $dt = new jDateTime();
        if(($this->date_publication != '')) {
            $dt->setFromString($this->date_publication,jDateTime::LANG_DTFORMAT);
            $record->date_publication = $dt->toString(jDateTime::DB_DTFORMAT);
        }

        $dt->setFromString($this->date_creation,jDateTime::LANG_DTFORMAT);
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);

        if(($this->date_modification != '')) {
            $dt->setFromString($this->date_modification,jDateTime::LANG_DTFORMAT);
            $record->date_modification = $dt->toString(jDateTime::DB_DTFORMAT);
        }
        $record->is_removed = $this->is_removed;
        $record->creator_id = $this->creator_id;
        $record->modificator_id = $this->modificator_id;
    }

    // Récupération par id
    public static function getByid($id)
    {
    	$factory = jDao::get('ads~ads_type');
        $res = $factory->get($id);
        $oAds_type = new CAds_type();
        if ($res)
        {
            $oAds_type->fetchFromRecord($res);
        }
        return $oAds_type;
    }

    // Récupération de la liste
    public static function getList() 
    {
        $toRes = array () ;
        $daoFactory = jDao::get('ads~ads_type');
        $res = $daoFactory->getList();
        $ads_typeList = $res->fetchAll();
        $toResult = array();
        foreach ($ads_typeList as $row) {
            $oAds_type = new CAds_type();
            $oAds_type->fetchFromRecord($row);
            $toResult[] = $oAds_type;
        }
        return $toResult ;
    }

    // Insertion
    public function insert()
    {
        $maFactory = jDao::get('ads~ads_type');
        $record = jDao::createRecord('ads~ads_type');
        $dt = new jDateTime();
        $dt->now();
        $user = jAuth::getUserSession();
        $this->creator_id = $user->id;
        $this->date_creation = $dt->toString(jDateTime::LANG_DTFORMAT);
        if ($this->is_publie == 1) {
            $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
        }
        $this->fetchIntoRecord($record);
        $maFactory->insert($record);
    }

    // Update
    public function update()
    {
        $maFactory = jDao::get('ads~ads_type');
        $record = $maFactory->get($this->id);
        $dt = new jDateTime();
        $dt->now();
        $user = jAuth::getUserSession();
        $this->modificator_id = $user->id;
        $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);
        if ($this->is_publie != $record->is_publie) {
            $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
        }
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Suppréssion
    public function delete()
    {
    	$maFactory = jDao::get('ads~ads_type');
        $record = $maFactory->get($this->id);
        $dt = new jDateTime();
        $dt->now();
        $user = jAuth::getUserSession();
        $this->modificator_id = $user->id;
        $this->is_removed = 1;
        $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Récupération du format en tableau de int
    public function splitFormat()
    {
        $toFormat = explode("x", $this->format);
        $toFormat[0] = trim($toFormat[0]);
        $toFormat[1] = trim($toFormat[1]);
        $toFormat[0]  = abs(intval($toFormat[0]));
        $toFormat[1] = abs(intval($toFormat[1]));
        return $toFormat;
    }
    
    //test doublons
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads_type").' 
                            WHERE namealias ="'.$namealias.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateNameExist($id, $namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads_type").' 
                            WHERE id <> '.$id.' AND namealias ="'.$namealias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }

}