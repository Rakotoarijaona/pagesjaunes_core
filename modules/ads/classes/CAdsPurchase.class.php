<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("ads~CAdsZone");
jClasses::inc("ads~CAdsZoneDefault");

class CAdsPurchase
{
    public $id;
	public $reference;
	public $advertiser_name;
	public $advertiser_mail;
	public $zone_type;
	public $status;
	public $no_follow;
	public $stats_tracking;
	public $price;
	public $currency;
	public $payment_method;
	public $payment_status;
	public $subscription;
	public $charging_model;
	public $publication_start;
	public $publication_day;
	public $banner;
	public $website_url;
	public $alt_text;
	public $categorie_id;
	public $souscategorie_id;
	public $date_creation;
	public $date_update;
	public $creator;

    // constructor
    public function __construct()
    {
        $this->id 					= null;
		$this->reference 			= null;
		$this->advertiser_name 		= null;
		$this->advertiser_mail 		= null;
		$this->zone_type 			= null;
		$this->status 				= null;
		$this->no_follow 			= null;
		$this->stats_tracking 		= null;
		$this->price 				= null;
		$this->currency 			= null;
		$this->payment_method 		= null;
		$this->payment_status 		= null;
		$this->subscription 		= null;
		$this->charging_model 		= null;
		$this->publication_start 	= null;
		$this->publication_day 		= null;
		$this->banner 				= null;
		$this->website_url 			= null;
		$this->alt_text 			= null;
		$this->categorie_id 		= null;
		$this->souscategorie_id 	= null;
		$this->date_creation 		= null;
		$this->date_update 			= null;
		$this->creator 				= null;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->id 					= $record->id;
			$this->reference 			= $record->reference;
			$this->advertiser_name 		= $record->advertiser_name;
			$this->advertiser_mail 		= $record->advertiser_mail;
			$this->zone_type 			= $record->zone_type;
			$this->status 				= $record->status;
			$this->no_follow 			= $record->no_follow;
			$this->stats_tracking 		= $record->stats_tracking;
			$this->price 				= $record->price;
			$this->currency 			= $record->currency;
			$this->payment_method 		= $record->payment_method;
			$this->payment_status 		= $record->payment_status;
			$this->subscription 		= $record->subscription;
			$this->charging_model 		= $record->charging_model;
			$this->publication_start 	= $record->publication_start;
			$this->publication_day 		= $record->publication_day;
			$this->banner 				= $record->banner;
			$this->website_url 			= $record->website_url;
			$this->alt_text 			= $record->alt_text;
			$this->categorie_id 		= $record->categorie_id;
			$this->souscategorie_id 	= $record->souscategorie_id;
            $this->date_creation            = CCommonTools::RDateSQLtoLANG($record->date_creation);
            if (!empty($record->date_update)) {
                $this->date_update                = CCommonTools::RDateSQLtoLANG($record->date_update);
            }
            $this->creator                = $record->creator;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id                       = $this->id;
        if (!empty($this->reference)) {
            $record->reference            		= $this->reference;
        }
        if (!empty($this->advertiser_name)) {
            $record->advertiser_name            = $this->advertiser_name;
        }
        if (!empty($this->advertiser_mail)) {
            $record->advertiser_mail            = $this->advertiser_mail;
        }
        if (!empty($this->zone_type)) {
            $record->zone_type            		= $this->zone_type;
        }
        if (!empty($this->status)) {
            $record->status            			= $this->status;
        }
        if ($this->no_follow != '') {
            $record->no_follow            		= $this->no_follow;
        }
        if ($this->stats_tracking  != '') {
            $record->stats_tracking        		= $this->stats_tracking;
        }
        if (!empty($this->price)) {
            $record->price        				= $this->price;
        }
        if (!empty($this->currency)) {
            $record->currency        			= $this->currency;
        }
        if (!empty($this->payment_method)) {
            $record->payment_method        		= $this->payment_method;
        }
        if (!empty($this->payment_status)) {
            $record->payment_status        		= $this->payment_status;
        }
        if ($this->subscription  != '') {
            $record->subscription        		= $this->subscription;
        }
        if (!empty($this->charging_model)) {
            $record->charging_model        		= $this->charging_model;
        }
        if (!empty($this->publication_start)) {
            $record->publication_start       	= $this->publication_start;
        }
        if ($this->publication_day  != '') {
            $record->publication_day       		= $this->publication_day;
        }
        if (!empty($this->banner)) {
            $record->banner       				= $this->banner;
        }
        if (!empty($this->website_url)) {
            $record->website_url       			= $this->website_url;
        }
        if (!empty($this->alt_text)) {
            $record->alt_text       			= $this->alt_text;
        }
        if (!empty($this->categorie_id)) {
            $record->categorie_id       		= $this->categorie_id;
        }
        if (!empty($this->souscategorie_id)) {
            $record->souscategorie_id       	= $this->souscategorie_id;
        }
        if (!empty($this->date_creation)) {
            $record->date_creation            	= $this->date_creation;
        }
        if (!empty($this->date_update)) {
	            $record->date_update            = $this->date_update;
	        }
        if (!empty($this->creator)) {
            $record->creator                  	= $this->creator;
        }
    }

    // Récupération de tous les enregistrements
    public static function getList()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->findAll();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements
    public static function getNbAll()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countAll();
        return $res;
    }

    // Récupération de tous les enregistrements En attente
    public static function getListEnAttente()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->getListEnAttente();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements En attente
    public static function getNbEnAttente()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countEnAttente();
        return $res;
    }

    // Récupération de tous les enregistrements approuvés
    public static function getListApprove()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->getListApprove();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements approuvés
    public static function getNbApprove()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countApprove();
        return $res;
    }

    // Récupération de tous les enregistrements rejeté
    public static function getListRejete()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->getListRejete();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements rejeté
    public static function getNbRejete()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countRejete();
        return $res;
    }

    // Récupération de tous les enregistrements expiré
    public static function getListExpire()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->getListExpire();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements expiré
    public static function getNbExpire()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countExpire();
        return $res;
    }

    // Récupération de tous les enregistrements réservé
    public static function getListReserve()
    {
        $toRes      = array () ;
        $daoFactory = jDao::get('ads~ads_purchase');
        $list        = $daoFactory->getListReserve();
        $toResult   = array();

        foreach ($list as $row) {
            $oAdsPurchase = new CAdsPurchase();
            $oAdsPurchase->fetchFromRecord($row);
            $toResult[] = $oAdsPurchase;
        }

        return $toResult ;
    }

    // Récupération nombres de tous les enregistrements réservé
    public static function getNbReserve()
    {
        $daoFactory = jDao::get('ads~ads_purchase');
        $res        = $daoFactory->countReserve();
        return $res;
    }

    // Insertion
    public function insert()
    {
        $maFactory  = jDao::get('ads~ads_purchase');
        $record     = jDao::createRecord('ads~ads_purchase');

        $this->creator          = CCommonTools::getUserInSessionName();
        $this->date_creation    = CCommonTools::RgetDateNowSQL();
        $this->fetchIntoRecord($record);
        $maFactory->insert($record);

        return $record->id;
    }

    // Update
    public function update()
    {
        $maFactory  = jDao::get('ads~ads_zone');
        $record     = $maFactory->get($this->id);
        $this->date_update = CCommonTools::RgetDateNowSQL();

        $this->fetchIntoRecord($record);
        $maFactory->update($record);
    }

    // Delete
    public function delete()
    {
        $maFactory = jDao::get('ads~ads_zone');
        if ($this->canDelete() == 1) {
            $maFactory->delete($this->id);
        }
    }

    // Test si on peut supprimer
    public function canDelete()
    {
        return 1;
    }

    // Fonction upload des images publicitaires
    public function uploadImage($file, $zone)
    {
        $iErrorCode = 0 ;

        $oAdsZone = CAdsZone::getById($zone);

        //Format
        $width = abs(intval($oAdsZone->width));
        $height = abs(intval($oAdsZone->height));

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
                $this->banner = $zFileName;
            }
            return $iErrorCode;
        }
    }
}