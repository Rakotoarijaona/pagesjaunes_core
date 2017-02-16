<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");

class CAdsZone
{
    public $id;
    public $name;
    public $cost_model;
    public $width;
    public $height;
    public $slots_columns;
    public $slots_row;
    public $number_rotation;
    public $number_client;
    public $line_height;
    public $number_ads_default;
    public $ads_display_methodw;
    public $is_publie;
    public $date_creation;
    public $date_update;
    public $date_publication;
    public $creator;
    public $toPrice;

    // constructor
    public function __construct($id = null, $name = null, $cost_model = null, 
                                $width = null, $height = null, $slots_columns = null, 
                                $slots_row = null, $number_rotation = null, $number_client = null, 
                                $line_height = null, $is_publie = null, $date_creation = null, 
                                $date_update = null, $date_publication = null, $creator = null, $toPrice = null)
    {
        $this->id                       = $id;
        $this->name                     = $name;
        $this->cost_model               = $cost_model;
        $this->width                    = $width;
        $this->height                   = $height;
        $this->slots_columns            = $slots_columns;
        $this->slots_row                = $slots_row;
        $this->number_rotation          = $number_rotation;
        $this->number_client            = $number_client;
        $this->line_height              = $line_height;
        $this->is_publie                = $is_publie;
        $this->date_creation            = $date_creation;
        $this->date_update              = $date_update;
        $this->date_publication         = $date_publication;
        $this->creator                  = $creator;
        $this->toPrice                  = $toPrice;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->id                       = $record->id;
            $this->name                     = $record->name;
            $this->cost_model               = $record->cost_model;
            $this->width                    = $record->width;
            $this->height                   = $record->height;
            $this->slots_columns            = $record->slots_columns;
            $this->slots_row                = $record->slots_row;
            $this->number_rotation          = $record->number_rotation;
            $this->number_client            = $record->number_client;
            $this->line_height              = $record->line_height;
            $this->number_ads_default       = $record->number_ads_default;
            $this->ads_display_method       = $record->ads_display_method;
            $this->is_publie                = $record->is_publie;
            $this->date_creation            = CCommonTools::RDateSQLtoLANG($record->date_creation);
            if (!empty($record->date_update)) {
                $this->date_update                = CCommonTools::RDateSQLtoLANG($record->date_update);
            }
            if (!empty($record->date_publication)) {
                $this->date_publication           = CCommonTools::RDateSQLtoLANG($record->date_publication);
            }
            $this->creator                = $record->creator;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id                       = $this->id;
        if (!empty($this->cost_model)) {
            $record->cost_model               = $this->cost_model;
        }
        if (!empty($this->name)) {
            $record->name                     = $this->name;
        }
        if (!empty($this->width)) {
            $record->width                    = abs($this->width);
        }
        if (!empty($this->height)) {
            $record->height                   = abs($this->height);
        }
        if (!empty($this->slots_columns)) {
            $record->slots_columns            = abs($this->slots_columns);
        }
        if (!empty($this->slots_row)) {
            $record->slots_row                = abs($this->slots_row);
        }
        if ($this->number_rotation != '') {
            $record->number_rotation          = abs($this->number_rotation);
        }
        if ($this->number_client != '') {
            $record->number_client            = abs($this->number_client);
        }
        if (!empty($this->line_height)) {
            $record->line_height              = abs($this->line_height);
        }
        if (!empty($this->number_ads_default)) {
            $record->number_ads_default       = $this->number_ads_default;
        }
        if (!empty($this->ads_display_method)) {
            $record->ads_display_method       = $this->ads_display_method;
        }
        if ($this->is_publie != '') {
            $record->is_publie                = $this->is_publie;
        }
        if (!empty($this->date_creation)) {
            $record->date_creation            = $this->date_creation;
        }
        if (!empty($this->date_update)) {
            $record->date_update              = $this->date_update;
        }
        if (!empty($this->date_publication)) {
            $record->date_publication         = $this->date_publication;
        }
        if (!empty($this->creator)) {
            $record->creator                  = $this->creator;
        }
    }

    // Récupération de tous les zones
    public static function getList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->getList();
        $list       = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZone = new CAdsZone();
            $oAdsZone->fetchFromRecord($row);
            $toResult[] = $oAdsZone;
        }

        return $toResult ;
    }

    // Récupération de tous les zones publiés
    public static function getListPublie()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->getListPublie();
        $list    = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZone = new CAdsZone();
            $oAdsZone->fetchFromRecord($row);
            $toResult[] = $oAdsZone;
        }

        return $toResult ;
    }

    // Récupération de tous les zones non publiés
    public static function getListNotPublie()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->getListNotPublie();
        $list    = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZone = new CAdsZone();
            $oAdsZone->fetchFromRecord($row);
            $toResult[] = $oAdsZone;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements
    public static function getNbAll()
    {
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->countAll();
        return $res;
    }

    // Récupération nombres de tous les publiés
    public static function getNbPublie()
    {
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->countPublie();
        return $res;
    }

    // Récupération nombres de tous les publiés
    public static function getNbNotPublie()
    {
        $daoFactory = jDao::get('ads~ads_zone');
        $res        = $daoFactory->countNotPublie();
        return $res;
    }

    // Récupération d'une zone par id
    public static function getById($id)
    {
        $factory    = jDao::get('ads~ads_zone');
        $res        = $factory->get($id);
        $oAdsZone   = new CAdsZone();
        if ($res) {
            $oAdsZone->fetchFromRecord($res);
        }
        return $oAdsZone;
    }

    // Récupération de tous les prix associés
    public function getPriceList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_price');
        $res        = $daoFactory->getListByZone($this->id);
        $list       = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $toResult[] = $row;
        }

        return $toResult ;
    }

    // Insertion
    public function insert()
    {
        $maFactory  = jDao::get('ads~ads_zone');
        $record     = jDao::createRecord('ads~ads_zone');
        $this->creator   = CCommonTools::getUserInSessionName();
        $this->date_creation = CCommonTools::RgetDateNowSQL();
        if ($this->is_publie == 1) {
            $this->date_publication = CCommonTools::RgetDateNowSQL();
        }
        if (sizeof($this->toPrice) > 0) {
            $this->fetchIntoRecord($record);
            $maFactory->insert($record);
            foreach ($this->toPrice as $oPrice)
            {
                $oPrice->zone_id = $record->id;
                $oPrice->insert();
            }
            jMessage::add(jLocale::get("ads~ads.add.success"), "success");
        }
        return $record->id;
    }

    // Update
    public function update()
    {
        $maFactory  = jDao::get('ads~ads_zone');
        $record     = $maFactory->get($this->id);
        $this->date_update = CCommonTools::RgetDateNowSQL();

        if (($this->is_publie != $record->is_publie) && ($this->is_publie == 1)) {
            $this->date_publication = CCommonTools::RgetDateNowSQL();
        }
        if (sizeof($this->toPrice) > 0) {
            foreach ($this->toPrice as $oPrice)
            {
                $oPrice->zone_id = $record->id;
                $oPrice->insert();
            }
            jMessage::add(jLocale::get("ads~ads.update.success"), "success");
        }
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Delete
    public function delete()
    {
        $maFactory = jDao::get('ads~ads_zone');
        if ($this->canDelete() == 1) {
            $maFactory->delete($this->id);
            jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
        }
        else
        {
            jMessage::add(jLocale::get("ads~ads.error"), "danger");
        }
    }

    // Test si on peut supprimer
    public function canDelete()
    {
        return 1;
    }
}