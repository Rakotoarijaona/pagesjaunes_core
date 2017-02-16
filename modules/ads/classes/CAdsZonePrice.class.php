<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");

class CAdsZonePrice
{
    public $id;
    public $zone_id;
    public $price;
    public $number;
    public $unity;

    // constructor
    public function __construct($id = null, $zone_id = null, $price = null, $number = null, $unity = null)
    {
        $this->id                       = $id;
        $this->zone_id                  = $zone_id;
        $this->price                    = $price;
        $this->number                   = $number;
        $this->unity                    = $unity;
    }

    // récupération de tous les listes de prix
    public static function getList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_price');
        $res        = $daoFactory->getList();
        $list       = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $toResult[] = $row;
        }

        return $toResult ;
    }

    // récupération de prix par id
    public static function getById($id = null)
    {
        if ($id != null)
        {
            $daoFactory = jDao::get('ads~ads_zone_price');
            $res        = $factory->get($id);
            $oPrice   = new CAdsZonePrice();
            if ($res) {
                $oPrice->id         = $res->id;
                $oPrice->zone_id    = $res->zone_id;
                $oPrice->price      = $res->price;
                $oPrice->number     = $res->number;
                $oPrice->unity      = $res->unity;
            }
            return $oPrice;
        }
        return null;
    }

    // Ajout de prix
    public function insert()
    {
        $maFactory  = jDao::get('ads~ads_zone_price');
        $record     = jDao::createRecord('ads~ads_zone_price');
        if ($this->zone_id != null && $this->price != null && $this->number != null && $this->unity != null) {
            $record->zone_id    = $this->zone_id;
            $record->price      = $this->price;
            $record->number     = $this->number;
            $record->unity      = $this->unity;
            $maFactory->insert($record);
        }
    }

    // Update price
    public function update()
    {
        $maFactory  = jDao::get('ads~ads_zone_price');
        if ($this->zone_id != null && $this->id != null && $this->price != null && $this->number != null && $this->unity != null) {
            $record     = $maFactory->get($this->id);
            $record->zone_id    = $this->zone_id;
            $record->price      = $this->price;
            $record->number     = $this->number;
            $record->unity      = $this->unity;
            $maFactory->update($record);
        }
    }
   
    // Delete price
    public function delete()
    {
        $maFactory  = jDao::get('ads~ads_zone_price');
        if ($this->id != null && $this->canDelete() == 1) {
            $maFactory->delete($this->id);
        }
    }

    // Test si on peut supprimer
    public function canDelete()
    {
        return 1;
    }
}