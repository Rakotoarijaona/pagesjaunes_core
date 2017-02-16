<?php
/**
 * @package     pagesjaunes_core
 * @subpackage  user
 * @author   R    
 * @contributor  Y
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("entreprise~Entreprise");

class Slideshow
{
	var $iSlideshow_id ;
	var $zSlideshow_identifiant;
    var $zSlideshow_namealias;
	var $iSlideshow_entrepriseId ;
	var $iSlideshow_imageonly ;
	var $iSlideshow_publicationstatus ;
	var $zSlideshow_titre ;
	var $zSlideshow_introductiontext ;
	var $zSlideshow_visuelbackground ;
	var $zSlideshow_buttontitle ;
	var $zSlideshow_contentposition ;
 	var $zSlideshow_urlpage ;
 	var $dSlideshow_creationdate ;
 	var $dSlideshow_updatedate ;
 	var $dSlideshow_publicationdate ;

 	public function __construct () {
 		$this->iSlideshow_id = 0;
		$this->zSlideshow_identifiant = "";
        $this->zSlideshow_namealias = "";
		$this->iSlideshow_entrepriseId = 0;
		$this->iSlideshow_imageonly = 0;
		$this->iSlideshow_publicationstatus = 0;
		$this->zSlideshow_titre = '';
		$this->zSlideshow_introductiontext = "";
		$this->zSlideshow_visuelbackground = "";
		$this->zSlideshow_buttontitle = "";
		$this->zSlideshow_contentposition = "left";
		$this->zSlideshow_urlpage = "";
		$this->dSlideshow_creationdate = "";
		$this->dSlideshow_updatedate = "";
		$this->dSlideshow_publicationdate = "";
 	}

 	// Récupération des données à partir de record vers un object (mapping)
    protected function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
        	$this->iSlideshow_id = $record->slideshow_id;
        	$this->zSlideshow_identifiant = $record->slideshow_identifiant;
            $this->zSlideshow_namealias = $record->slideshow_namealias;
			$this->iSlideshow_entrepriseId = $record->slideshow_entrepriseId;
			$this->iSlideshow_imageonly = $record->slideshow_imageonly;;
			$this->iSlideshow_publicationstatus = $record->slideshow_publicationstatus;
			$this->zSlideshow_titre = $record->slideshow_titre;
			$this->zSlideshow_introductiontext = $record->slideshow_introductiontext;
			$this->zSlideshow_visuelbackground = $record->slideshow_visuelbackground;
			$this->zSlideshow_buttontitle = $record->slideshow_buttontitle;
			$this->zSlideshow_contentposition = $record->slideshow_contentposition;
			$this->zSlideshow_urlpage = $record->slideshow_urlpage;
			$this->dSlideshow_creationdate = $record->slideshow_creationdate;
			$dt = new jDateTime();
        	$dt->setFromString($record->slideshow_creationdate,jDateTime::DB_DTFORMAT);
			$this->dSlideshow_creationdate = $dt->toString(jDateTime::LANG_DTFORMAT);
        	$dt->setFromString($record->slideshow_updatedate,jDateTime::DB_DTFORMAT);
			$this->dSlideshow_updatedate = $dt->toString(jDateTime::LANG_DTFORMAT);
        	$dt->setFromString($record->slideshow_publicationdate,jDateTime::DB_DTFORMAT);
			$this->dSlideshow_publicationdate = $dt->toString(jDateTime::LANG_DTFORMAT);
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    protected function fetchIntoRecord(&$record)
    {
    	$record->slideshow_id = $this->iSlideshow_id;
		$record->slideshow_identifiant = $this->zSlideshow_identifiant;
        $record->slideshow_namealias = $this->zSlideshow_namealias;
		$record->slideshow_entrepriseId = $this->iSlideshow_entrepriseId;
		$record->slideshow_imageonly = $this->iSlideshow_imageonly;
		$record->slideshow_publicationstatus = $this->iSlideshow_publicationstatus;
		$record->slideshow_titre = $this->zSlideshow_titre ;
		$record->slideshow_introductiontext = $this->zSlideshow_introductiontext ;
		$record->slideshow_visuelbackground = $this->zSlideshow_visuelbackground;
		$record->slideshow_buttontitle = $this->zSlideshow_buttontitle;
		$record->slideshow_contentposition = $this->zSlideshow_contentposition;
		$record->slideshow_urlpage = $this->zSlideshow_urlpage;
		$dt = new jDateTime();
    	$dt->setFromString($this->dSlideshow_creationdate,jDateTime::LANG_DTFORMAT);
		$record->slideshow_creationdate = $dt->toString(jDateTime::DB_DTFORMAT);
    	$dt->setFromString($this->dSlideshow_updatedate,jDateTime::LANG_DTFORMAT);
		$record->slideshow_updatedate = $dt->toString(jDateTime::DB_DTFORMAT);
    	$dt->setFromString($this->dSlideshow_publicationdate,jDateTime::LANG_DTFORMAT);
		$record->slideshow_publicationdate = $dt->toString(jDateTime::DB_DTFORMAT);
    }

    public function insert () {

        $dao = jDao::get('slideshow~slideshow');
    	$record = jDao::createRecord('slideshow~slideshow');
    	$dt = new jDateTime();
		$dt->now();
		$this->dSlideshow_creationdate  = $dt->toString(jDateTime::LANG_DTFORMAT);
    	$this->fetchIntoRecord($record);
    	$dao->insert($record);
    }

    public function update () {
    	$dao = jDao::get('slideshow~slideshow');
    	$record = $dao->get($this->iSlideshow_id);
    	$this->fetchIntoRecord($record);
    	$dao->update($record);
    }

    public static function delete ($iSlideshow_id) {
    	$dao = jDao::get('slideshow~slideshow');
    	$dao->delete($iSlideshow_id);
    }

    public static function getById ($Id) {
    	$dao = jDao::get('slideshow~slideshow');
    	$record = $dao->get($Id);
    	$slideshow = new Slideshow();
    	$slideshow->fetchFromRecord($record);
    	return $slideshow;
    }

    public static function getByIdentifiant ($Identifiant) {
    	$dao = jDao::get('slideshow~slideshow');
    	$record = $dao->getByIdentifiant($Identifiant);
    	$slideshow = new Slideshow();
    	$slideshow->fetchFromRecord($record);
    	return $slideshow;
    }

    public static function getList() {
    	$dao = jDao::get('slideshow~slideshow');
    	$record = $dao->findAll();
    	$list = array();
    	foreach ($record as $row) {
    		$slideshow = new Slideshow();
    		$slideshow->fetchFromRecord($row);
    		$list[] = $slideshow;
    	}
    	return $list;
    }

    public function getEntreprise() {
    	$oEntreprise = Entreprise::getById($this->iSlideshow_entrepriseId);
    	return $oEntreprise;
    }

    public static function getPublie()
    {
    	$cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("slideshow").' WHERE slideshow_publicationstatus = 1 ORDER BY slideshow_publicationdate');
        $listslideshow = array();

        foreach ($res as $record)
        {
            $slideshow = new Slideshow();
            $slideshow->fetchFromRecord($record);
            $listslideshow[] = $slideshow;
        }
        return $listslideshow;
    }

    //test doublons
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("slideshow").' WHERE slideshow_namealias ="'.$namealias.'"' );
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
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("slideshow").' WHERE slideshow_id <> '.$id.' AND slideshow_namealias ="'.$namealias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
}