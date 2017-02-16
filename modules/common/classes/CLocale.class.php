<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CLocale
{
    var $iLocaleId ;
    var $zLocaleCode ;
    var $zLocaleCharset ;
    var $zLocaleIcon ;
    var $iLocaleDefault ;
    var $iLocalePublicationStatusId ;
    var $iLocaleActivationStatusId ;

    var $iLocaleTranslatableLocaleId ;
    var $iLocaleTranslatableParentId ;
    var $zLocaleTranslatableLabel ;
    var $zLocaleTranslatableDescription ;

    public function __construct ()
    {
        $iLocaleId                      = 0 ;
        $zLocaleCode                    = "" ;
        $zLocaleCharset                 = "UTF-8" ;
        $zLocaleIcon                    = "" ;
        $iLocaleDefault                 = NO ;
        $iLocalePublicationStatusId     = YES ;
        $iLocaleActivationStatusId      = YES ;

        $iLocaleTranslatableLocaleId    = null ;
        $iLocaleTranslatableParentId    = null ;
        $zLocaleTranslatableLabel       = "" ;
        $zLocaleTranslatableDescription = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iLocaleId                      = $_oRecord->locale_id ;
        $this->zLocaleCode                    = $_oRecord->locale_code ;
        $this->zLocaleCharset                 = $_oRecord->locale_charset ;
        $this->zLocaleIcon                    = $_oRecord->locale_icon ;
        $this->iLocaleDefault                 = $_oRecord->locale_default ;
        $this->iLocalePublicationStatusId     = $_oRecord->locale_publicationStatusId ;
        $this->iLocaleActivationStatusId      = $_oRecord->locale_activationStatusId ;

        $this->iLocaleTranslatableLocaleId    = $_oRecord->localeTranslatable_localeId ;
        $this->iLocaleTranslatableParentId    = $_oRecord->localeTranslatable_parentId ;
        $this->zLocaleTranslatableLabel       = $_oRecord->localeTranslatable_label ;
        $this->zLocaleTranslatableDescription = $_oRecord->localeTranslatable_description ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->locale_id                        = $this->iLocaleId ;
        $_oRecord->locale_code                      = $this->zLocaleCode ;
        $_oRecord->locale_charset                   = $this->zLocaleCharset ;
        $_oRecord->locale_icon                      = $this->zLocaleIcon ;
        $_oRecord->locale_default                   = $this->iLocaleDefault ;
        $_oRecord->locale_publicationStatusId       = $this->iLocalePublicationStatusId ;
        $_oRecord->locale_activationStatusId        = $this->iLocaleActivationStatusId ;

        $_oRecord->localeTranslatable_localeId      = $this->iLocaleTranslatableLocaleId ;
        $_oRecord->localeTranslatable_parentId      = $this->iLocaleTranslatableParentId ;
        $_oRecord->localeTranslatable_label         = $this->zLocaleTranslatableLabel ;
        $_oRecord->localeTranslatable_description   = $this->zLocaleTranslatableDescription ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iLocaleTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oLocale = new CLocale () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("locale") . " 
                        INNER JOIN " . $oCnx->prefixTable ("localeTranslatable") . " 
                        ON locale_id = localeTranslatable_parentId 
                        WHERE locale_id = " . $_iId . " 
                        AND localeTranslatable_localeId = 
                        IF ((SELECT locale_id FROM " . $oCnx->prefixTable ("locale") . " 
                        INNER JOIN " . $oCnx->prefixTable ("localeTranslatable") . " 
                        ON locale_id = localeTranslatable_parentId 
                        WHERE locale_id = " . $_iId . " 
                        AND 
                        localeTranslatable_localeId = " . $_iLocaleTranslatableLocaleId . ") > 0, 
                        " . $_iLocaleTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oLocale->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oLocale) ;
        }

        return $oLocale ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iLocaleTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
        $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("locale") . " 
                        INNER JOIN " . $oCnx->prefixTable ("localeTranslatable") . " 
                        ON locale_id = localeTranslatable_parentId 
                        WHERE localeTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("locale") . " 
                        INNER JOIN " . $oCnx->prefixTable ("localeTranslatable") . " 
                        ON locale_id = localeTranslatable_parentId 
                        WHERE localeTranslatable_localeId = " . $_iLocaleTranslatableLocaleId . ") > 0, 
                        " . $_iLocaleTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oLocale = new CLocale () ;
            $oLocale->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oLocale) ;
            $toRes [] = $oLocale ;
        }

        return $toRes ;
    }

    // récupération de la langue par défaut dépuis la base de données
    public static function findDefaultLang ($_iLocaleTranslatableParentId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("locale") . " 
                        LEFT JOIN " . $oCnx->prefixTable ("localeTranslatable") . " 
                        ON locale_id = localeTranslatable_parentId 
                        WHERE locale_default = " . YES . " 
                        AND localeTranslatable_localeId = " . $_iLocaleTranslatableParentId . "
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oLocale = new CLocale () ;
            $oLocale->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oLocale) ;
            $toRes [] = $oLocale ;
        }

        return (isset ($toRes [0])) ? $toRes [0] : new CLocale () ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoLocale = jDao::get ('common~locale') ;

        $oRecLocale         = null ;
        $oExistRecLocale    = null ;

        $oRecLocale = jDao::createRecord ('common~locale') ;

        if ($this->iLocaleId > 0)
        {
            $oExistRecLocale = $oDaoLocale->get ($this->iLocaleId) ;

            if (!empty ($oExistRecLocale))
            {
                $oRecLocale = $oExistRecLocale ;
            }
        }

        $this->fetchIntoRecord ($oRecLocale) ;

        if (empty ($oExistRecLocale))
        {
            $oDaoLocale->insert ($oRecLocale) ;
            $this->iLocaleId = $oRecLocale->locale_id ;
        }
        else
        {
            $oDaoLocale->update ($oRecLocale) ;
        }

        // translatable
        $oDaoLocaleTranslatable = jDao::get ('common~localetranslatable') ;

        $oRecLocaleTranslatable         = null ;
        $oExistRecLocaleTranslatable    = null ;

        $oRecLocaleTranslatable = jDao::createRecord ('common~localetranslatable') ;

        $oExistRecLocaleTranslatable = $oDaoLocaleTranslatable->get (array ($this->iLocaleTranslatableLocaleId, $this->iLocaleId)) ;

        if (!empty ($oExistRecLocaleTranslatable))
        {
            $oRecLocaleTranslatable = $oExistRecLocale ;
        }

        $this->fetchIntoRecord ($oRecLocaleTranslatable) ;

        $oRecLocaleTranslatable->localeTranslatable_parentId = $this->iLocaleId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecLocaleTranslatable) ;

        if (empty ($oExistRecLocaleTranslatable))
        {
            $oDaoLocaleTranslatable->insert ($oRecLocaleTranslatable) ;
        }
        else
        {
            $oDaoLocaleTranslatable->update ($oRecLocaleTranslatable) ;
        }
    }
}
?>