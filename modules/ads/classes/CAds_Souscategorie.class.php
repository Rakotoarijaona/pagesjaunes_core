<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");

class CAds_Souscategorie
{
	var $id;
    var $ads_id;
    var $souscategorie_id;
    var $date_creation;

	// constructor
    public function __construct()
    {
    	$this->id = 0;
        $this->ads_id = 0;
        $this->souscategorie_id = 0
        $this->date_creation = '';
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
    	$this->id = $record->id;
        $this->ads_id = $record->ads_id;
        $this->souscategorie_id = $record->souscategorie_id;
        $dt = new jDateTime();

        $dt->setFromString($record->date_creation,jDateTime::DB_DTFORMAT);
        $this->date_creation = $dt->toString(jDateTime::LANG_DTFORMAT);
    }   

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
    	$record->id = $this->id;
        $record->ads_id = $this->ads_id;
        $record->souscategorie_id = $this->souscategorie_id;
        $dt = new jDateTime();
        
        $dt->setFromString($this->date_creation,jDateTime::LANG_DTFORMAT);
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
    }

    // Récupération par id d'un pub
    public function getByAds($id)
    {
        // instanciation de la factory
        $maFactory = jDao::get("ads~ads_souscategorie");
        $liste = $maFactory->getByAds($id);
        $toList = $liste->fetchAll();
        $toResult = array();.

        foreach ($toList as $row)
        {
            $oAdsSc = new CAds_Souscategorieliste();
            $oAdsSc->fetchFromRecord($row);
            $toResult[] = $oAdsSc;
        }
        return $toResult ;
    }

    // Récupération des sous catégories
    public function getSouscategories()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads_souscategorie").' as adssc 
                            INNER JOIN '.$cnx->prefixTable ("souscategorie").' as sc 
                            ON adssc.souscategorie_id = sc.souscategorie_id 
                            WHERE adssc.ads_id ='.$this->ads_id);
        $souscategories = array();

        foreach ($res as $record) {
           $souscategories[] = $record;
        }
        return $souscategories;
    }

    // Récupération des publicités par sous catégorie
    public static function getAdsBySouscategorie($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads_souscategorie").' as adssc 
                            INNER JOIN '.$cnx->prefixTable ("ads").' as ad 
                            ON adssc.ads_id = ad.id 
                            WHERE adssc.souscategorie_id ='.$id);
        $ads = array();

        foreach ($res as $record) {
           $ads[] = $record;
        }
        return $ads;
    }

    // Suppréssion
    function delete()
    {
        $maFactory = jDao::get('ads~ads_souscategorie');
        $maFactory->delete($this->id);
    }
}