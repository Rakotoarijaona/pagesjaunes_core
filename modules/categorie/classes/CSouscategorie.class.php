<?php
/**
 * @package pagesjaunes_core
 * @subpackage categorie
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("categorie~CCategorie");
jClasses::inc("categorie~CMotscles");

class CSouscategorie
{
    var $id;
    var $categorieid;
    var $name;
    var $namealias;
    var $ispublie;
    var $datepublication;
    var $datecreation;
    var $datemodification;

    // constructor
    public function __construct()
    {
        $this->id;
        $this->categorieid;
        $this->name;
        $this->namealias;
        $this->ispublie;
        $this->datepublication;
        $this->datecreation;
        $this->datemodification;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {

        $this->id = $record->souscategorie_id;
        $this->categorieid = $record->souscategorie_categorieid;
        $this->name = $record->souscategorie_name;
        $this->namealias = $record->souscategorie_namealias;
        $this->ispublie = $record->souscategorie_ispublie;
        $this->datepublication = $record->souscategorie_datepublie;
        $this->datecreation = $record->souscategorie_datecreation;
        $this->datemodification = $record->souscategorie_dateupdate;

    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->souscategorie_id = $this->id;
        $record->souscategorie_categorieid = $this->categorieid;
        $record->souscategorie_name = $this->name;
        $record->souscategorie_namealias = $this->namealias;
        $record->souscategorie_ispublie = $this->ispublie;
        $record->souscategorie_datepublie = $this->datepublication;
        $record->souscategorie_datecreation = $this->datecreation;
        $record->souscategorie_dateupdate = $this->datemodification;
    }

    // Récupération de tous les enregistrements
    public static function getList ()
    {
        $toRes = array () ;
        $daoFactory = jDao::get('categorie~souscategorie');
        $res = $daoFactory->findAll();
        $souscategorieList = $res->fetchAll();
        $toResult = array();
        foreach ($souscategorieList as $row)
        {
            $oSouscategorie = new CSouscategorie();
            $oSouscategorie->fetchFromRecord($row);
            $toResult[] = $oSouscategorie;
        }
        return $toResult ;
    }

    //Récupération par l'Id
    public static function getById ($id)
    {
        $daoFactory = jDao::get('categorie~souscategorie');
        $res = $daoFactory->get($id);
        $oSouscategorie = new CSouscategorie();
        if ($res)
        {
            $oSouscategorie->fetchFromRecord($res);
        }
        return $oSouscategorie ;
    }

    //récupération de du parent en objet
    public function getParent ()
    {
        $ocategorie = CCategorie::getById ($this->categorieid);
        return $ocategorie ;
    }

    //test doublons
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' WHERE souscategorie_namealias ="'.$namealias.'"' );
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
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' WHERE souscategorie_id <> '.$id.' AND souscategorie_namealias ="'.$namealias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }

    //insertion
    public function insert()
    {
        $daoFactory = jDao::get('categorie~souscategorie');
        $record = jDao::createRecord('categorie~souscategorie');
        
        if (($this->name!='') && ($this->categorieid!=''))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            if ($this->ispublie == 1)
            {
                $this->datepublication = $dt->toString(jDateTime::DB_DFORMAT);
            }
            $this->fetchIntoRecord($record);
            $daoFactory->insert($record);
            return $record->souscategorie_id;
        } 
        return 0;      
    }

    //mis à jour
    public function update()
    {
        $daoFactory = jDao::get('categorie~souscategorie');
        $record = $daoFactory->get($this->id);

        if (($this->name!='') && ($this->categorieid!=''))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            if ($record->souscategorie_ispublie == 0 && $this->ispublie == 1)
            {
                $this->datepublication = $dt->toString(jDateTime::DB_DFORMAT);
            }  
            $this->datemodification = $dt->toString(jDateTime::DB_DFORMAT);
            $this->fetchIntoRecord($record);
            $daoFactory->update($record);
        }
    }

    //suppression
    public function delete()
    {
        $daoFactory = jDao::get('categorie~souscategorie');
        $res = 0;
        if (CSouscategorie::can_delete($this->id)) {
            $daoFactory->delete($this->id);
            $res = 1;
        }
        return $res;
    }

    public static function deleteById($id)
    {
        $daoFactory = jDao::get('categorie~souscategorie');
        $res = 0;
        if (CSouscategorie::can_delete($id) != 0) {
            $daoFactory->delete($id);
            $res = 1;
        }
        return $res;
    }

    //can delete
    public static function can_delete($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise_souscategorie").' WHERE souscategorie_id ='.$id );
        $i = 1;
        if (sizeof($res->fetch())>0)
        {
            $i = 0;
        }
        return $i;
    }
    //can delete
    public function can_delete2()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise_souscategorie").' WHERE souscategorie_id ='.$this->id );
        $i = 1;
        if (sizeof($res->fetchAll())>0)
        {
            $i = 0;
        }
        return $i;
    }
    public function updateMotsCles($listMotsCles)
    {
        $toMotsCles = explode(",", $listMotsCles);
        $cnx = jDb::getConnection();
        $cnx->exec("DELETE FROM ".$cnx->prefixTable ('motscles_souscategorie')." WHERE souscategorie_id =".$this->id);
        foreach ($toMotsCles as $mot) {
            $mot = trim ($mot);
            if ($mot != '')
            {
                $id = Motscles::insert($mot);
                $dt = new jDateTime();
                $dt->now();
                $datecreation = $dt->toString(jDateTime::DB_DFORMAT);

                $cnx->exec("INSERT INTO ".$cnx->prefixTable ("motscles_souscategorie")." (motscles_id, souscategorie_id, date_creation) VALUES (".$id.", ".$this->id.", '".$datecreation."')" );
            }
            else
            {
                continue;
            }
        } 
    }

    public function getMotsCles()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ("motscles_souscategorie")." as mc INNER JOIN ".$cnx->prefixTable ("motscles")." as m ON mc.motscles_id = m.id WHERE souscategorie_id =".$this->id);
        $motscles = "";
        $i = 0;
        foreach ($res as $value) {
            if ($i > 0)
            {
                $motscles .=", ";
            }
            $motscles .= $value->mot;
            $i++;
        }
        return $motscles;
    }
}
?>