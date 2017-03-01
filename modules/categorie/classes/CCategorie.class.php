<?php
/**
 * @package pagesjaunes_core
 * @subpackage categorie
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("categorie~CSouscategorie");

class CCategorie
{
    var $id;
    var $name;
    var $namealias;
    var $vignette;
    var $ispublie;
    var $datepublication;
    var $datecreation;
    var $datemodification;

    // constructor
    public function __construct()
    {
        $this->id;
        $this->name;
        $this->namealias;
        $this->vignette;
        $this->ispublie;
        $this->datepublication;
        $this->datecreation;
        $this->datemodification;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        $this->id = $record->categorie_id;
        $this->name = $record->categorie_name;
        $this->namealias = $record->categorie_namealias;
        $this->vignette = $record->categorie_vignette;
        $this->ispublie = $record->categorie_ispublie;
        $this->datepublication = $record->categorie_datepublication;
        $this->datecreation = $record->categorie_datecreation;
        $this->datemodification = $record->categorie_datemodification;

    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->categorie_id = $this->id;
        $record->categorie_name = $this->name;
        $record->categorie_namealias = $this->namealias;
        $record->categorie_vignette = $this->vignette;
        $record->categorie_ispublie = $this->ispublie;
        $record->categorie_datepublication = $this->datepublication;
        $record->categorie_datecreation = $this->datecreation;
        $record->categorie_datemodification = $this->datemodification;
    }

    // Récupération de tous les enregistrements
    public static function getList ($is_publie = '')
    {
        $toRes = array () ;
        $daoFactory = jDao::get('categorie~categorie');
        if ($is_publie === '')
        {            
            $res = $daoFactory->findAll();
        }
        else
        {
            $res = $daoFactory->getListByStatus($is_publie);
        }
        $categorieList = $res->fetchAll();
        $toResult = array();
        foreach ($categorieList as $row)
        {
            $oCategorie = new CCategorie();
            $oCategorie->fetchFromRecord($row);
            $toResult[] = $oCategorie;
        }
        return $toResult ;
    }

    //Récupération par l'Id
    public static function getById ($id)
    {
        $categorieFactory = jDao::get('categorie~categorie');
        $res = $categorieFactory->get($id);
        $ocategorie = new CCategorie();
        if ($res)
        {
            $ocategorie->fetchFromRecord($res);
        }
        return $ocategorie ;
    }

    //Récupération de tous les enfants
    public function getChild($is_publie = '')
    {
        $cnx = jDb::getConnection();
        if ($is_publie === '')
        { 
            $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' WHERE souscategorie_categorieid ='.$this->id );
        }
        else
        {
            $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' WHERE souscategorie_categorieid ='.$this->id.' AND souscategorie_ispublie ='.$is_publie);
        }
        $listChild = array();

        foreach ($res as $record)
        {
            $souscategorie = new CSouscategorie();
            $souscategorie->fetchFromRecord($record);
            $listChild[] = $souscategorie;
        }
        return $listChild;
    }

    //test doublons
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("categorie").' WHERE categorie_namealias ="'.$namealias.'"' );
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
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("categorie").' WHERE categorie_id <> '.$id.' AND categorie_namealias ="'.$namealias.'"');
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
        $categorieFactory = jDao::get('categorie~categorie');
        $record = jDao::createRecord('categorie~categorie');
        
        if (($this->name!='') && ($this->vignette!=''))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            if ($this->ispublie == 1)
            {
                $this->datepublication = $dt->toString(jDateTime::DB_DFORMAT);
            }

                    
            $this->fetchIntoRecord($record);
            $categorieFactory->insert($record);
            return $record->categorie_id;
        }
        return 0;
    }

    //mis à jour
    public function update()
    {
        $categorieFactory = jDao::get('categorie~categorie');
        $record = $categorieFactory->get($this->id);

        if (($this->name!=''))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            if ($record->categorie_ispublie == 0 && $this->ispublie == 1)
            {
                $this->datepublication = $dt->toString(jDateTime::DB_DFORMAT);
            }
            if ($record->categorie_ispublie == 1 && $this->ispublie == 0)
            {
                $listChild = $this->getChild();
                foreach ($listChild as $child) {
                    $child->ispublie = 0;
                    $child->update();
                }
            }
            $this->datemodification = $dt->toString(jDateTime::DB_DFORMAT);
            $record->categorie_name = $this->name;
            $record->categorie_namealias = $this->namealias;
            if($this->vignette != '')
            {
                $record->categorie_vignette = $this->vignette;
            }
            $record->categorie_ispublie = $this->ispublie;
            $record->categorie_datepublication = $this->datepublication;
            $record->categorie_datecreation = $this->datecreation;
            $record->categorie_datemodification = $this->datemodification;
            $categorieFactory->update($record);
        }
    }

    //suppression
    public function delete()
    {
        $categorieFactory = jDao::get('categorie~categorie');
        $res = 0;
        if ($this->can_delete2()) {
            $ocategorie = CCategorie::getById($this->id);
            if (!empty($ocategorie))
            {
                //delete old file
                unlink("icones/".$oCategorie->vignette);
                //end-delete old file
                $categorieFactory->delete($this->id);
                $cnx = jDb::getConnection();
                $cnx->exec('DELETE FROM '.$cnx->prefixTable('souscategorie').' WHERE souscategorie_categorieid ='.$this->id);
                $res = 1;
            }
        }
        return $res;
    }
    public static function deleteById($id)
    {
        $categorieFactory = jDao::get('categorie~categorie');
        $res = 0;
        if (CCategorie::can_delete($id) != 0) {
            $ocategorie = CCategorie::getById($id);
            if (!empty($ocategorie))
            {
                //delete old file
                unlink("icones/".$ocategorie->vignette);
                //end-delete old file
                $categorieFactory->delete($id);
                $cnx = jDb::getConnection();
                $cnx->exec('DELETE FROM '.$cnx->prefixTable('souscategorie').' WHERE souscategorie_categorieid ='.$id);
                $res = 1;
            }
        }
        return $res;
    }

    //can delete static
    public function can_delete2()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' as sc INNER JOIN '.$cnx->prefixTable ("entreprise_souscategorie").' as esc ON sc.souscategorie_id = esc.souscategorie_id WHERE souscategorie_categorieid ='.$this->id );
        $i = 1;
        if (sizeof($res->fetch())>0)
        {
            $i = 0;
        }
        return $i;
    }
    //can delete
    public static function can_delete($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' as sc INNER JOIN '.$cnx->prefixTable ("entreprise_souscategorie").' as esc ON sc.souscategorie_id = esc.souscategorie_id WHERE souscategorie_categorieid ='.$id );
        $i = 1;
        if (sizeof($res->fetch())>0)
        {
            $i = 0;
        }
        return $i;
    }

    //test enfants    
    public function has_child()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("souscategorie").' WHERE souscategorie_categorieid ='.$this->id );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
}
?>