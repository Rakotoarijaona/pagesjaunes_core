<?php
/**
 * @package pagesjaunes_core
 * @subpackage entreprise
 * @author R      
 * @contributor 
 */

/*jClasses::inc("common~CCommonTools");
jClasses::inc("categorie~motscles");
jClasses::inc("categorie~souscategorie");
jClasses::inc("categorie~Categorie");*/

class CPages
{
    var $id;
    var $name;
    var $label;
    var $title;
    var $content;
    var $is_publie;
    var $is_removed;
    var $meta_title;
    var $meta_description;
    var $has_pub;

    // constructor
    public function __construct()
    {
        $this->id = 0;
        $this->name = '';
        $this->label = '';
        $this->title = '';
        $this->content = '';
        $this->is_publie = 0;
        $this->is_removed = 0;
        $this->meta_title = '';
        $this->meta_description = '';
        $this->has_pub = NO;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        $this->id = $record->id;
        $this->name = $record->name;
        $this->label = $record->label;
        $this->title = $record->title;
        $this->content = $record->content;
        $this->is_publie = $record->is_publie;
        $this->is_removed = $record->is_removed;
        $this->meta_title = $record->meta_title;
        $this->meta_description = $record->meta_description;
        $this->has_pub = $record->has_pub;
    }
    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id = $this->id;
        $record->name = $this->name;
        $record->label = $this->label;
        $record->title = $this->title;
        $record->content = $this->content;
        $record->is_publie = $this->is_publie;
        $record->is_removed = $this->is_removed;
        $record->meta_title = $this->meta_title;
        $record->meta_description = $this->meta_description;
        $record->has_pub = $this->has_pub;
    }    
    //Récupération à partir du label
    public static function getByLabel($label)
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->getByLabel($label);
        $oPages = new CPages();
        $oPages->fetchFromRecord($record);
        return $oPages;
    } 
    //Récupération à partir du nom
    public static function getByName($name)
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->getByName($name);
        $oPages = new CPages();
        $oPages->fetchFromRecord($record);
        return $oPages;
    }
    //Récupération à partir du titre
    public static function getByTitle($title)
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->getByTitle($title);
        $oPages = new CPages();
        $oPages->fetchFromRecord($record);
        return $oPages;
    }
    //Récupération à partir de l'id
    public static function getById($id)
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->get($id);
        $oPages = new CPages();
        $oPages->fetchFromRecord($record);
        return $oPages;
    }
    //Récupération de la liste
    public static function getList()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("pages").' WHERE is_removed = 0');        
        $toPages = array();

        foreach ($res as $record) {
            $oPages = new CPages();
            $oPages->fetchFromRecord($record);
            $toPages[] = $oPages;
        }
        return $toPages;
    }
    //insertion
    public function insert()
    {
        // instanciation de la factory
        $maFactory = jDao::get("pages~pages");
        // creation d’un record correspondant au dao
        $record = jDao::createRecord("pages~pages");
        // on remplit le record
        $this->fetchIntoRecord($record);
        // on le sauvegarde dans la base
        $maFactory->insert($record);
    }
    //mis à jour du contenus
    public function update()
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->get($this->id);
        
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }
    //suppression
    public function delete()
    {
        $maFactory = jDao::get('pages~pages');
        $record = $maFactory->get($this->id);
        
        $record->is_removed = 1;
        $maFactory->update($record);
    }

    //test doublons
    public static function ifNameExist($alias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("pages").' WHERE label ="'.$alias.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateNameExist($id, $alias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("pages").' WHERE id <> '.$id.' AND label ="'.$alias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
}