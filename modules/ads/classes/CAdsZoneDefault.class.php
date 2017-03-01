<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");
jClasses::inc ("common~ImageWorkshop") ;
jClasses::inc("categorie~CCategorie");
jClasses::inc("categorie~CSouscategorie");

class CAdsZoneDefault
{
    public $id;
    public $zone_id;
    public $rang;
    public $type;
    public $categorie_id;
    public $souscategorie_id;
    public $image;
    public $html;
    public $link;
    public $is_publie;
    public $date_creation;
    public $date_update;
    public $date_publication;
    public $creator;

    // constructor
    public function __construct($id = null, $zone_id = null, $rang = null, $type = null, 
                                $categorie_id = null, $souscategorie_id = null, $image = null, 
                                $html = null, $link = null, $is_publie = null, $date_creation = null, 
                                $date_update = null, $date_publication = null, $creator = null)
    {
        $this->id                       = $id;
        $this->zone_id                  = $zone_id;
        $this->rang                     = $rang; 
        $this->type                     = $type; 
        $this->categorie_id             = $categorie_id; 
        $this->souscategorie_id         = $souscategorie_id; 
        $this->image                    = $image; 
        $this->html                     = $html; 
        $this->link                     = $link; 
        $this->is_publie                = $is_publie;
        $this->date_creation            = $date_creation;
        $this->date_update              = $date_update;
        $this->date_publication         = $date_publication;
        $this->creator                  = $creator;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->id                       = $record->id;
            $this->zone_id                  = $record->zone_id;
            $this->rang                     = $record->rang; 
            $this->type                     = $record->type; 
            $this->categorie_id             = $record->categorie_id; 
            $this->souscategorie_id         = $record->souscategorie_id; 
            $this->image                    = $record->image; 
            $this->html                     = $record->html; 
            $this->link                     = $record->link; 
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
        if (!empty($this->zone_id)) {
            $record->zone_id                    = $this->zone_id;
        }
        if (!empty($this->rang)) {
            $record->rang                       = $this->rang;
        }
        if (!empty($this->type)) {
            $record->type                       = $this->type;
        }
        if (!empty($this->categorie_id)) {
            $record->categorie_id               = $this->categorie_id;
        }
        if (!empty($this->souscategorie_id)) {
            $record->souscategorie_id           = $this->souscategorie_id;
        }
        if (!empty($this->image)) {
            $record->image                      = $this->image;
        }
        if (!empty($this->html)) {
            $record->html                       = $this->html;
        }
        if (!empty($this->link)) {
            $record->link                       = $this->link;
        }
        if ($this->is_publie != '') {
            $record->is_publie                  = $this->is_publie;
        }
        if (!empty($this->date_creation)) {
            $record->date_creation              = $this->date_creation;
        }
        if (!empty($this->date_update)) {
            $record->date_update                = $this->date_update;
        }
        if (!empty($this->date_publication)) {
            $record->date_publication           = $this->date_publication;
        }
        if (!empty($this->creator)) {
            $record->creator                    = $this->creator;
        }
    }

    // Récupération de tous les zones
    public static function getList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->getList();
        $list       = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZoneDefault = new CAdsZoneDefault();
            $oAdsZoneDefault->fetchFromRecord($row);
            $toResult[] = $oAdsZone;
        }

        return $toResult ;
    }

    // Récupération de tous les zones publiés
    public static function getListPublie()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->getListPublie();
        $list    = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZoneDefault = new CAdsZoneDefault();
            $oAdsZoneDefault->fetchFromRecord($row);
            $toResult[] = $oAdsZoneDefault;
        }

        return $toResult ;
    }

    // Récupération de tous les zones non publiés
    public static function getListNotPublie()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->getListNotPublie();
        $list    = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZoneDefault = new CAdsZoneDefault();
            $oAdsZoneDefault->fetchFromRecord($row);
            $toResult[] = $oAdsZoneDefault;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements
    public static function getNbAll()
    {
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->countAll();
        return $res;
    }

    // Récupération nombres de tous les publiés
    public static function getNbPublie()
    {
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->countPublie();
        return $res;
    }

    // Récupération nombres de tous les publiés
    public static function getNbNotPublie()
    {
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->countNotPublie();
        return $res;
    }

    // Récupération d'un pub par id
    public static function getById($id)
    {
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->get($id);
        $oAdsZoneDefault   = new CAdsZoneDefault();
        if ($res) {
            $oAdsZoneDefault->fetchFromRecord($res);
        }
        return $oAdsZoneDefault;
    }

    // Récupération des pubs par zone
    public static function getByZoneId($id)
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_zone_default');
        $res        = $daoFactory->getListByZone($id);
        $list    = $res->fetchAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsZoneDefault = new CAdsZoneDefault();
            $oAdsZoneDefault->fetchFromRecord($row);
            $toResult[] = $oAdsZoneDefault;
        }

        return $toResult ;
    }

    // Récupération des pubs par zone (filtré)
    public static function getByZoneFiltered($zoneId, $souscategorieId = null)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query =   "
                        SELECT * FROM " . $cnx->prefixTable("ads_zone_default") . " 
                        WHERE 1
                    ";

        $filters = array();
        $filters[] = "type <> ''";
        $filters[] = "zone_id = ".$zoneId;

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filters) . ")";

        // tri
        $query .= " ORDER BY date_creation DESC";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            if (!empty($row))
            {
                $oAdsZoneDefault = new CAdsZoneDefault();
                $oAdsZoneDefault->fetchFromRecord($row);
                $results[] = $oAdsZoneDefault;
            }
        }

        return $results;
    }


    // Insertion
    public function insert()
    {
        $maFactory  = jDao::get('ads~ads_zone_default');
        $record     = jDao::createRecord('ads~ads_zone_default');
        $this->creator   = CCommonTools::getUserInSessionName();
        $this->date_creation = CCommonTools::RgetDateNowSQL();
        if ($this->is_publie == 1) {
            $this->date_publication = CCommonTools::RgetDateNowSQL();
        }
        $this->fetchIntoRecord($record);
        $maFactory->insert($record);

        return $record->id;
    }

    // Update
    public function update()
    {
        $maFactory  = jDao::get('ads~ads_zone_default');
        $record     = $maFactory->get($this->id);
        $this->date_update = CCommonTools::RgetDateNowSQL();

        if (($this->is_publie != $record->is_publie) && ($this->is_publie == 1)) {
            $this->date_publication = CCommonTools::RgetDateNowSQL();
        }

        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Delete
    public function delete()
    {
        $maFactory = jDao::get('ads~ads_zone_default');
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


    // Fonction upload des images publicitaires
    public function uploadImage($file)
    {
        $iErrorCode         = 0 ;

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
                $this->image = $zFileName;
            }
            return $iErrorCode;
        }
    }

    // Get souscategorie object by id
    public function getSouscategorie()
    {
        $oSouscategorie = CSouscategorie::getById($this->souscategorie_id);
        return $oSouscategorie;
    }

    // Get categorie object by id
    public function getCategorie()
    {
        $oCategorie = CCategorie::getById($this->categorie_id);
        return $oCategorie;
    }

}