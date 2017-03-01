<?php
/**
 * @package pagesjaunes_core
 * @subpackage categorie
 * @author R
 * @contributor 
 */

jClasses::inc("common~CCommonTools");

class CContenuhomepage
{
    var $id;
    var $background_parallax;
    var $titre_parallax;
    var $description_parallax;
    var $titre_reference;
    var $description_reference;
    var $image_reference;
    var $position_image_reference;
    var $bloc_marketing;
    var $image_marketing;
    var $position_image_marketing;
    var $is_publie;
    var $date_creation;
    var $date_update;

    // constructor
    public function __construct()
    {
        $this->id = 0;
        $this->background_parallax = "";
        $this->titre_parallax = "";
        $this->description_parallax = "";
        $this->titre_reference = "";
        $this->description_reference= "";
        $this->image_reference = "";
        $this->position_image_reference = 1;
        $this->bloc_marketing = "";
        $this->image_marketing = "";
        $this->position_image_marketing = 1;
        $this->is_publie = 1;
        $this->date_creation = "";
        $this->date_update = "";
    }
    // Récupération des données à partir de record vers un object (mapping)
    protected function fetchFromRecord($record = null)
    {
        $this->id = $record->id;
        $this->background_parallax = $record->background_parallax;
        $this->titre_parallax = $record->titre_parallax;
        $this->description_parallax = $record->description_parallax;
        $this->titre_reference = $record->titre_reference;
        $this->description_reference= $record->description_reference;
        $this->image_reference = $record->image_reference;
        $this->position_image_reference = $record->position_image_reference;
        $this->bloc_marketing = $record->bloc_marketing;
        $this->image_marketing = $record->image_marketing;
        $this->position_image_marketing = $record->position_image_marketing;
        $this->is_publie = $record->is_publie;
        $dt = new jDateTime();
        if ($record->date_creation != '')
        {
            $dt->setFromString($record->date_creation,jDateTime::DB_DFORMAT);
            $this->date_creation = $dt->toString(jDateTime::LANG_DFORMAT);
        }
        else
        {
            $this->date_creation = "";
        }

        if ($record->date_update != '')
        {
            $dt->setFromString($record->date_update,jDateTime::DB_DFORMAT);
            $this->date_update = $dt->toString(jDateTime::LANG_DFORMAT);
        }
        else
        {
            $this->date_update = "";
        }
    }
    protected function fetchIntoRecord($record = null)
    {
        $record->id = $this->id;
        $record->background_parallax = $this->background_parallax;
        $record->titre_parallax = $this->titre_parallax;
        $record->description_parallax = $this->description_parallax;
        $record->titre_reference = $this->titre_reference;
        $record->description_reference= $this->description_reference;
        $record->image_reference = $this->image_reference;
        $record->position_image_reference = $this->position_image_reference;
        $record->bloc_marketing = $this->bloc_marketing;
        $record->image_marketing = $this->image_marketing;
        $record->position_image_marketing = $this->position_image_marketing;
        $record->is_publie = $this->is_publie;
        $dt = new jDateTime();
        if ($this->date_creation != '')
        {
            $dt->setFromString($this->date_creation,jDateTime::LANG_DFORMAT);
            $record->date_creation = $dt->toString(jDateTime::DB_DFORMAT);
        }

        if ($this->date_update != '')
        {
            $dt->setFromString($this->date_update,jDateTime::LANG_DFORMAT);
            $record->date_update = $dt->toString(jDateTime::DB_DFORMAT);
        }
    }

    //recuperation par identifiant
    public static function getById ($Id) {
        $dao = jDao::get('homepage~contenuhomepage');
        $record = $dao->get($Id);
        $contenuhomepage = new CContenuhomepage();
        if ($record)
        {
            $contenuhomepage->fetchFromRecord($record);    
        }        
        return $contenuhomepage;
    }

    //insertion
    public function insert () {

        $dao = jDao::get('homepage~contenuhomepage');
        $record = jDao::createRecord('homepage~contenuhomepage');
        $dt = new jDateTime();
        $dt->now();
        $this->date_creation  = $dt->toString(jDateTime::LANG_DFORMAT);
        $this->fetchIntoRecord($record);
        $dao->insert($record);
    }

    //modification
    public function update () {
        $dao = jDao::get('homepage~contenuhomepage');
        $record = $dao->get($this->id);
        $dt = new jDateTime();
        $dt->now();
        $this->date_update  = $dt->toString(jDateTime::LANG_DFORMAT);
        $this->fetchIntoRecord($record);
        $dao->update($record);
    }
}
?>