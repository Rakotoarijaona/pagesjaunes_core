<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc ("common~ImageWorkshop") ;
jClasses::inc("common~CCommonTools");
jClasses::inc("entreprise~Entreprise");
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");

class CAds
{
	var $id;
    var $name;
    var $namealias;
    var $type;
    var $description;
    var $annonceur;
    var $images;
    var $duree;
    var $souscategorie;
    var $is_default;
    var $is_publie;
    var $date_publication;
    var $date_creation;
    var $date_modification;
    var $is_removed;
    var $creator_id;
    var $modificator_id;

	// constructor
    public function __construct()
    {
        $this->id                   = 0;
        $this->name                 = '';
        $this->namealias            = '';
        $this->type                 = 0;
        $this->description          = '';
        $this->annonceur            = 0;
        $this->images               = '';
        $this->duree                = 2;
        $this->categorie            = 0;
        $this->souscategorie        = array();
        $this->is_default           = 0;
        $this->is_publie            = 0;
        $this->date_publication     = '';
        $this->date_creation        = '';
        $this->date_modification    = '';
        $this->is_removed           = 0;
        $this->creator_id           = 0;
        $this->modificator_id       = 0;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
    	if (!empty($record)) {
            $this->id               = $record->id;
            $this->name             = $record->name;
            $this->namealias        = $record->namealias;
            $this->type             = $record->type;
            $this->description      = $record->description;
            $this->annonceur        = $record->annonceur;
            $this->images           = $record->images;
            $this->duree            = $record->duree;
            $this->souscategorie    = $this->getSouscategorie();
            $this->is_default       = $record->is_default;
            $this->is_publie        = $record->is_publie;

            $dt = new jDateTime();

            if(($record->date_publication != '') && ($record->date_publication != null)) {
                $dt->setFromString($record->date_publication,jDateTime::DB_DTFORMAT);
                $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
            } else {
                $this->date_publication = '';
            }

            $dt->setFromString($record->date_creation,jDateTime::DB_DTFORMAT);
            $this->date_creation    = $dt->toString(jDateTime::LANG_DTFORMAT);

            if(($record->date_modification != '') &&  ($record->date_modification != null)) {
                $dt->setFromString($record->date_modification,jDateTime::DB_DTFORMAT);
                $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);
            } else {
                $this->date_modification = '';
            }

            $this->is_removed       = $record->is_removed;
            $this->creator_id       = $record->creator_id;
            $this->modificator_id   = $record->modificator_id;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
    	if (!empty($record)) {
            $record->id             = $this->id;
            $record->name           = $this->name;
            $record->namealias      = $this->namealias;
            $record->type           = $this->type;
            $record->description    = $this->description;
            $record->annonceur      = $this->annonceur;
            $record->images         = $this->images;
            $record->duree          = $this->duree;
            $record->is_default     = $this->is_default;
            $record->is_publie      = $this->is_publie;

            $dt = new jDateTime();
            if(($this->date_publication != '')) {
                $dt->setFromString($this->date_publication,jDateTime::LANG_DTFORMAT);
                $record->date_publication = $dt->toString(jDateTime::DB_DTFORMAT);
            }

            $dt->setFromString($this->date_creation,jDateTime::LANG_DTFORMAT);
            $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);

            if(($this->date_modification != '')) {
                $dt->setFromString($this->date_modification,jDateTime::LANG_DTFORMAT);
                $record->date_modification = $dt->toString(jDateTime::DB_DTFORMAT);
            }

            $record->is_removed     = $this->is_removed;
            $record->creator_id     = $this->creator_id;
            $record->modificator_id = $this->modificator_id;
        }
    }

    // Récupération par ID
    public static function getByid($id)
    {
        $factory    = jDao::get('ads~ads');
        $res        = $factory->get($id);
        $oAds       = new CAds();
        if ($res) {
            $oAds->fetchFromRecord($res);
        }
        return $oAds;
    }

    //Récupération de tous les enregistrements
    public static function getList() 
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads');
        $res        = $daoFactory->getList();
        $adsList    = $res->fetchAll();
        $toResult   = array();

        foreach ($adsList as $row) {
            $oAds = new CAds();
            $oAds->fetchFromRecord($row);
            $toResult[] = $oAds;
        }

        return $toResult ;
    }

    // Récupération de tous les enregistrements ayant un format == $zFormat
    public static function getListByFormat($zFormat) 
    {
        $cnx    = jDb::getConnection();
        $res    = '';
        $res    = $cnx->query('SELECT ad.id FROM '.$cnx->prefixTable ("ads").' as ad 
                            INNER JOIN '.$cnx->prefixTable ("ads_type").' as adt ON ad.type = adt.id 
                            WHERE adt.format ="'.$zFormat.'" AND ad.is_removed = 0 AND ad.is_publie = 1');
        $toAds  = array();
        foreach ($res as $record) {
            $toAds[] = CAds::getByid($record->id);
        }
        return $toAds;
    }

    // Récupération de tous les enregistrements par souscatégorie
    public static function getListBySouscategorie($iSouscategorieId) 
    {
        $cnx        = jDb::getConnection();
        $querySc    = 'SELECT ad.id, ad.type FROM '.$cnx->prefixTable ("ads").' as ad 
                        INNER JOIN '.$cnx->prefixTable ("ads_souscategorie").' as adsc 
                        ON ad.id = adsc.ads_id 
                        WHERE adsc.souscategorie_id ="'.$iSouscategorieId.'" 
                        AND ad.is_removed = 0 
                        AND ad.is_publie = 1';
        $res        = $cnx->query($querySc);
        $toAds      = array();
        foreach ($res as $record) {
            $toAds[] = CAds::getByid($record->id);
        }
        return $toAds;
    }

    // Rendre un publicité par défaut
    public function setDefault($iTypeId)
    {
        $cnx        = jDb::getConnection();
        $cnx->exec('UPDATE '.$cnx->prefixTable ("ads").' SET is_default=0 WHERE type = '.$iTypeId);
        $maFactory  = jDao::get('ads~ads');
        $record     = $maFactory->get($this->id);
        $record->is_default = 0;
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Récupérer les pubs par défauts par format
    public static function getDefault($zFormat)
    {
        $cnx = jDb::getConnection();
        $res = '';
        $res = $cnx->query('SELECT ad.id FROM '.$cnx->prefixTable ("ads").' as ad 
                            INNER JOIN '.$cnx->prefixTable ("ads_type").' as adt ON ad.type = adt.id 
                            WHERE ad.is_default = 1 AND adt.format ="'.$zFormat.'"');
        $oAds = '';
        foreach ($res as $record) {
            $oAds = CAds::getByid($record->id);
        }
        return $oAds;
    }

    // Fonction upload des images publicitaires
    public function uploadImage($file, $iAds_type)
    {
        $iErrorCode = 0 ;

        $oAds_type = CAds_type::getByid($iAds_type);

        //Format
        if ($oAds_type->format != '') {
            $toFormat = explode("x", $oAds_type->format);
            $toFormat[0] = trim($toFormat[0]);
            $toFormat[1] = trim($toFormat[1]);
            if (sizeof($toFormat)<=1)
            {
                return 1;
            }
            else
            {
                $width = abs(intval($toFormat[0]));
                $height = abs(intval($toFormat[1]));
                $iErrorCode         = 0 ;
            }
        }

        //File type
        if ($oAds_type->type_fichier != '') {
            $toTypeFichier = explode(",", $oAds_type->type_fichier);
        } else {
            return 1;
        }

        if ($iErrorCode == 0) {
            $zFileName          = $_FILES[$file]["name"] ;
            $zFileType          = $_FILES[$file]["type"] ;
            $iFileSize          = intval ($_FILES[$file]["size"]) ;
            $zDirTempName       = $_FILES[$file]["tmp_name"] ;

            $bCreateFolders     = true ;
            $zBackgroundColor   = null ;
            $iImageQuality      = IMAGE_QUALITY ;

            // rename file if already exists
            if (file_exists ("publicites/big/" . $zFileName)) {
                $iExistFileCount = 1 ;

                $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
                $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;

                while (file_exists ("publicites/big" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
                {
                    $iExistFileCount++ ;
                }
                $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
            }
            // big 
            $oLayerBig    = ImageWorkshop::initFromPath ($_FILES [$file]['tmp_name']) ;
            $iExpectedWidth     = $width ;
            $iExpectedHeight    = $height ;
            ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

            $oLayerBig->resizeInPixel ($iExpectedWidth, $iExpectedHeight) ;
            $oLayerBig->save ("publicites/big", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;

            // thumbnail (must)
            $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES [$file]['tmp_name']) ;
            $iExpectedWidth     = 96 ;
            $iExpectedHeight    = 96 ;

            ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

            $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
            $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
            $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
            $oLayerThumbnail->save ("publicites/thumbnail", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
            // rename file if already exists

            if ($iErrorCode == 0) {
                $this->images = $zFileName;
            }
            return $iErrorCode;
        }
    }

    // Récupération du type de la publicité
    public function getAdd_type()
    {
        $oAds_type = CAds_type::getByid($this->type);
        return $oAds_type; 
    }

    // Récupération de l'Annonceur
    public function getAnnonceur()
    {
        $oAnnonceur = Entreprise::getById($this->annonceur);
        return $oAnnonceur; 
    }

    // Insertion
    public function insert()
    {
        $maFactory  = jDao::get('ads~ads');
        $record     = jDao::createRecord('ads~ads');
        $dt         = new jDateTime();
        $dt->now();

        $user               = jAuth::getUserSession();
        $this->creator_id   = $user->id;

        $this->date_creation = $dt->toString(jDateTime::LANG_DTFORMAT);
        if ($this->is_publie == 1) {
            $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
        }
        $this->fetchIntoRecord($record);
        $maFactory->insert($record);
        $this->id = $record->id;
        foreach ($this->souscategorie as $souscategorie) {
            $this->insertSouscategories($souscategorie);
        }
    }

    // Update
    public function update()
    {
        $maFactory  = jDao::get('ads~ads');
        $record     = $maFactory->get($this->id);
        $dt         = new jDateTime();
        $dt->now();
        $user       = jAuth::getUserSession();
        $this->modificator_id = $user->id;
        $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);

        if ($this->is_publie != $record->is_publie) {
            $this->date_publication = $dt->toString(jDateTime::LANG_DTFORMAT);
        }
        $this->fetchIntoRecord($record);

        if (sizeof($this->souscategorie) > 0) {
            $this->updateSouscategories($this->souscategorie);
        }
        $maFactory->update($record);
    }

    // Delete
    public function delete()
    {
        $maFactory = jDao::get('ads~ads');
        $record = $maFactory->get($this->id);
        $dt = new jDateTime();
        $dt->now();
        $user = jAuth::getUserSession();
        $this->modificator_id = $user->id;
        $this->is_removed = 1;
        $this->date_modification = $dt->toString(jDateTime::LANG_DTFORMAT);
        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Insértion des sous catégories
    public function insertSouscategories($souscategorie)
    {
        $factory = jDao::get('ads~ads_souscategorie');
        $record = jDao::createRecord('ads~ads_souscategorie');
        $record->ads_id = $this->id;
        $record->souscategorie_id = $souscategorie;
        $dt = new jDateTime();
        $dt->now();
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
        $factory->insert($record);
    }

    // Mis à jour des sous catégories
    public function updateSouscategories($toSouscategories)
    {
        $oldSousCategorie = $this->getSouscategorie();
        $newSousCategorie = $toSouscategories;
        $cnx = jDb::getConnection();
        foreach ($newSousCategorie as $new) {
            $oNewSC = Souscategorie::getById($new);
            $exist = 0;
            $position = 0;
            for ($i=0; $i < sizeof($oldSousCategorie); $i++) {
                if (($oldSousCategorie[$i] != null) && 
                    ($oldSousCategorie[$i]->souscategorie_id == $oNewSC->id)) {
                    $exist = 1;
                    $position = $i;
                }
            }

            if ($exist == 0) {
                $this->insertSouscategories($new);
            } else {
                $dt = new jDateTime();
                $dt->now();
                $dateupdate = $dt->toString(jDateTime::DB_DTFORMAT);
                $oldSousCategorie[$position] = null;
            }
        }

        foreach ($oldSousCategorie as $old) {
            if ($old != null) {
                $cnx->exec("DELETE FROM ".$cnx->prefixTable ('ads_souscategorie')." 
                            WHERE ads_id =".$this->id." AND souscategorie_id =".$old->souscategorie_id);
            }
        }
    }

    // Récupération de la souscatégorie
    public function getSouscategorie()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads_souscategorie").' as adssc 
                            INNER JOIN '.$cnx->prefixTable ("souscategorie").' as sc 
                            ON adssc.souscategorie_id = sc.souscategorie_id 
                            WHERE adssc.ads_id ='.$this->id);
        $souscategories = array();

        foreach ($res as $record) {
           $souscategories[] = $record;
        }
        return $souscategories;
    }

    // Récupération des souscatégorie formatée en un seul String
    public function getSouscategorieString()
    {
        $toSouscategories = $this->getSouscategorie();
        $zSouscategories = '';
        $i=0;
        foreach ($toSouscategories as $record) {
           $zSouscategories .= $record->souscategorie_name;
           if($i<(sizeof($toSouscategories)-1)) {
                $i++;
                $zSouscategories .= ', ';
           }
        }
        return $zSouscategories; 
    }

    // Récupération des souscatégorie formatée en JSON
    public function souscategoriesJSON()
    {
        $jsonText = '[';
        $i = 0;
        foreach ($this->getSouscategorie() as $souscategorie) {
            if ($i >= 1) {
                $jsonText .= ',';
            }
            $jsonText .= '{"id":"'.$souscategorie->souscategorie_id.'", "name":"'.$souscategorie->souscategorie_name.'"}';
            $i++;
        }
        $jsonText .= ']';
        return $jsonText;
    }   

    //test doublons pour l'insertion
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads").' WHERE namealias ="'.$namealias.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0) {
            $i = 1;
        }
        return $i;
    }

     //test doublons pour l'update
    public static function ifUpdateNameExist($id, $namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("ads").' WHERE id <> '.$id.' AND namealias ="'.$namealias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0) {
            $i = 1;
        }
        return $i;
    }

}