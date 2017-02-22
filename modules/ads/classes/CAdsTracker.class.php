<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("ads~CAdsPurchase");

class CAdsTracker
{
    public $id;
    public $ads_id;
    public $date;
    public $time;
    public $ip;
    public $is_default;
    public $type;

    // constructor
    public function __construct()
    {
        $this->id           = null;
        $this->ads_id       = null;
        $this->date         = null;
        $this->time         = null;
        $this->ip           = null;
        $this->is_default   = null;
        $this->type         = null;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->id           = $record->id;
            $this->ads_id       = $record->ads_id;
            $this->date         = $record->date;
            $this->time         = $record->time;
            $this->ip           = $record->ip;
            $this->is_default   = $record->is_default;
            $this->type         = $record->type;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id           = $this->id;
        $record->ads_id       = $this->ads_id;
        $record->date         = $this->date;
        $record->time         = $this->time;
        $record->ip           = $this->ip;
        $record->is_default   = $this->is_default;
        $record->type         = $this->type;
    }

    // Récupération de tous les trakers
    public static function getList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_tracker');
        $res        = $daoFactory->getList();
        $list       = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsTracker = new CAdsTracker();
            $oAdsTracker->fetchFromRecord($row);
            $toResult[] = $oAdsTracker;
        }

        return $toResult ;
    }

    // insertion
    public function insert()
    {        
        $maFactory  = jDao::get('ads~ads_tracker');
        $record     = jDao::createRecord('ads~ads_tracker');
        $record->ads_id     = $this->ads_id;
        $this->date         = CCommonTools::RgetDateOnlyNowSQL();
        $record->date       = $this->date;
        $this->time         = time();
        $record->time       = $this->time;
        $record->ip         = $this->ip;
        $record->is_default = $this->is_default;
        $record->type       = $this->type;
        $maFactory->insert($record);

        return $record->id;
    }
}