<?php
/**
 * @package pagesjaunes_core
 * @subpackage toprecherche
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("entreprise~CEntreprise");
jClasses::inc("categorie~CSouscategorie");

class CToprecherche
{
	var $id;
    var $souscategorie_id;
    var $entreprise_id_top1;
    var $entreprise_id_top2;
    var $entreprise_id_top3;
    var $date_creation;
    var $date_update;

	// constructor
    public function __construct()
    {
    	$this->id = 0;
        $this->souscategorie_id = 0;
        $this->entreprise_id_top1 = 0;
        $this->entreprise_id_top2 = 0;
        $this->entreprise_id_top3 = 0;
        $this->date_creation = '';
        $this->date_update = '';
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
    	$this->id = $record->id;
        $this->souscategorie_id = $record->souscategorie_id;
        $this->entreprise_id_top1 = $record->entreprise_id_top1;
        $this->entreprise_id_top2 = $record->entreprise_id_top2;
        $this->entreprise_id_top3 = $record->entreprise_id_top3;
        $this->date_creation = $record->date_creation;
        $this->date_update = $record->date_update;
    }   

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
    	$record->id = $this->id;
        $record->souscategorie_id = $this->souscategorie_id;
        $record->entreprise_id_top1 = $this->entreprise_id_top1;
        $record->entreprise_id_top2 = $this->entreprise_id_top2;
        $record->entreprise_id_top3 = $this->entreprise_id_top3;
        $record->date_creation = $this->date_creation;
        $record->date_update = $this->date_update;
    }
    public static function getList()
    {
        $toRes = array () ;
        $daoFactory = jDao::get('toprecherche~toprecherche');
        $res = $daoFactory->findAll();
        $toprechercheList = array();
        foreach ($res as $row)
        {
            $oToprecherche = new CToprecherche();
            $oToprecherche->fetchFromRecord($row);
            $toprechercheList[] = $oToprecherche;
        }
        return $toprechercheList ;
    }
    public function getTitle()
    {
        $oSc = CSouscategorie::getById($this->souscategorie_id);
        $title = $oSc ->name;
        return $title;
    }
    public function getTop1()
    {
        $oEntreprise = CEntreprise::getById($this->entreprise_id_top1);
        return $oEntreprise;
    }
    public function getTop2()
    {
        $oEntreprise = CEntreprise::getById($this->entreprise_id_top2);
        return $oEntreprise;
    }
    public function getTop3()
    {
        $oEntreprise = CEntreprise::getById($this->entreprise_id_top3);
        return $oEntreprise;
    }
    public static function getByid($id)
    {
    	$factory = jDao::get('toprecherche~toprecherche');
        $res = $factory->get($id);
        $oToprecherche = new CToprecherche();
        if ($res)
        {
            $oToprecherche->fetchFromRecord($res);
        }
        return $oToprecherche;
    }
    public static function getBySouscategorieId($souscategorieId)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("toprecherche").' WHERE souscategorie_id ='.$souscategorieId);
        $oToprecherche = null;
        foreach ($res as $record)
        {
           $oToprecherche = new CToprecherche();        
           $oToprecherche->fetchFromRecord($record);
        }
        return $oToprecherche;        
    }
    public function getEntrepriseListString()
    {
        $oEntreprise1 = CEntreprise::getByid($this->entreprise_id_top1);
        $oEntreprise2 = CEntreprise::getByid($this->entreprise_id_top2);
        $oEntreprise3 = CEntreprise::getByid($this->entreprise_id_top3);
        $str = $oEntreprise1->raisonsociale;
        if ($oEntreprise2 != '')
        {
            $str .= ', '.$oEntreprise2->raisonsociale;     
            if ($this->entreprise_id_top3 != 0)
            {
                $str .= ', '.$oEntreprise3->raisonsociale;
            }
        }
        return $str;
    }
    public static function checkIfExist($souscategorieId)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("toprecherche").' WHERE souscategorie_id ='.$souscategorieId);
        $oToprecherche = null;
        foreach ($res as $record)
        {
           $oToprecherche = new CToprecherche();
           $oToprecherche->fetchFromRecord($record);
        }
        return $oToprecherche;
    }
    public function getSoucategorie()
    {
        return CSouscategorie::getById($this->souscategorie_id);
    }
    public function getDateCreation()
    {
        $dt = new jDateTime();
        $dt->setFromString($this->date_creation,jDateTime::DB_DFORMAT);
        return $dt->toString(jDateTime::LANG_DFORMAT);
    }

    public function insert()
    {
    	$maFactory = jDao::get('toprecherche~toprecherche');
        $record = jDao::createRecord('toprecherche~toprecherche');
        $dt = new jDateTime();
        $dt->now();
        $this->date_creation = $dt->toString(jDateTime::DB_DFORMAT);
        $this->fetchIntoRecord($record);
        $maFactory->insert($record);
    }

    public function update()
    {
    	$maFactory = jDao::get('toprecherche~toprecherche');
        $record = $maFactory->get($this->id);
        $dt = new jDateTime();
        $dt->now();
        $this->date_update = $dt->toString(jDateTime::DB_DFORMAT);
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    public function delete()
    {
        $maFactory = jDao::get('toprecherche~toprecherche');
        $maFactory->delete($this->id);
    }
}