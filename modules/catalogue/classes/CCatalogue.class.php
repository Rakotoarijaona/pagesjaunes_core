<?php
/**
 * @package pagesjaunes_core
 * @subpackage entreprise
 * @author R
 * @contributor
 */

jClasses::inc("common~CCommonTools");

class CCatalogue
{
    var $id;
    var $reference_produit;
    var $entreprise_id;
    var $nom_produit;
    var $image_produit;
    var $description_produit;
    var $marque_produit;
    var $prix_produit;
    var $is_publie;
    var $date_creation;
    var $date_update;

    // constructor
    public function __construct()
    {
        $this->id                   = 0;
        $this->reference_produit    = '';
        $this->entreprise_id        = 0;
        $this->nom_produit          = '';
        $this->image_produit        = '';
        $this->description_produit  = '';
        $this->marque_produit       = '';
        $this->prix_produit         = 0;
        $this->is_publie            = 0;
        $this->date_creation        = '';
        $this->date_update          = '';
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
    	$this->id                   = $record->id;
    	$this->reference_produit    = $record->reference_produit;
    	$this->entreprise_id        = $record->entreprise_id;
    	$this->nom_produit          = $record->nom_produit;
    	$this->image_produit        = $record->image_produit;
    	$this->description_produit  = $record->description_produit;
    	$this->marque_produit       = $record->marque_produit;
    	$this->prix_produit         = $record->prix_produit;
    	$this->is_publie            = $record->is_publie;
    	$this->date_creation        = $record->date_creation;
    	$this->date_update          = $record->date_update;
    }   

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
    	$record->id                     = $this->id;
    	$record->reference_produit      = $this->reference_produit;
    	$record->entreprise_id          = $this->entreprise_id;
    	$record->nom_produit            = $this->nom_produit;
    	$record->image_produit          = $this->image_produit;
    	$record->description_produit    = $this->description_produit;
    	$record->marque_produit         = $this->marque_produit;
    	$record->prix_produit           = $this->prix_produit;
    	$record->is_publie              = $this->is_publie;
    	$record->date_creation          = $this->date_creation;
    	$record->date_update            = $this->date_update;
    }

    public static function getByid($id)
    {
    	$factory = jDao::get('catalogue~catalogue');
        $res = $factory->get($id);
        $oCatalogue = new CCatalogue();
        if ($res)
        {
            $oCatalogue->fetchFromRecord($res);
        }
        return $oCatalogue;
    }

    public function insert()
    {
    	$maFactory = jDao::get('catalogue~catalogue');
		$record = jDao::createRecord('catalogue~catalogue');
        $this->date_creation = date("Y-m-d H:i:s");
		$this->fetchIntoRecord($record);
		$maFactory->insert($record);
        return $record->id;
    }

    public function update()
    {
    	$maFactory = jDao::get('catalogue~catalogue');
		$record = $maFactory->get($this->id);
		$dt = new jDateTime();
        $dt->now();
        $this->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
		$this->fetchIntoRecord($record);
		$maFactory->update($record);
    }

    public function delete()
    {
    	$maFactory = jDao::get('catalogue~catalogue');
		$maFactory->delete($this->id);
    }
}