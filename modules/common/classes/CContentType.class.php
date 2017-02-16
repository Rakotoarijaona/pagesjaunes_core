<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CContentType
{
    var $iContentTypeId ;
    var $iContentTypeMultipleStatusId ;
    var $iContentTypeRange ;
    var $zContentTypeSlug ;
    var $iContentTypeDisplayInLeft ;
    var $zContentTypeIcon ;
    var $iContentTypeActivationStatusId ;
    var $iContentTypePublicationStatusId ;
    var $iContentTypeRemoveStatusId ;

    var $iContentTypeTranslatableLocaleId ;
    var $iContentTypeTranslatableParentId ;
    var $zContentTypeTranslatableLabel ;
    var $zContentTypeTranslatableDescription ;
    var $zContentTypeTranslatableMetaDescription ;
    var $zContentTypeTranslatableMetaKeyword ;

    public function __construct ()
    {
        $this->iContentTypeId                           = NULL ;
        $this->iContentTypeMultipleStatusId             = YES ;
        $this->iContentTypeRange                        = NULL ;
        $this->zContentTypeSlug                         = NULL ;
        $this->iContentTypeDisplayInLeft                = NO ;
        $this->zContentTypeIcon                         = NULL ;
        $this->iContentTypeActivationStatusId           = YES ;
        $this->iContentTypePublicationStatusId          = YES ;
        $this->iContentTypeRemoveStatusId               = NO ;

        $this->iContentTypeTranslatableLocaleId         = NULL ;
        $this->iContentTypeTranslatableParentId         = NULL ;
        $this->zContentTypeTranslatableLabel            = NULL ;
        $this->zContentTypeTranslatableDescription      = NULL ;
        $this->zContentTypeTranslatableMetaDescription  = NULL ;
        $this->zContentTypeTranslatableMetaKeyword      = NULL ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iContentTypeId                           = $_oRecord->contentType_id ;
        $this->iContentTypeMultipleStatusId             = $_oRecord->contentType_multipleStatusId ;
        $this->iContentTypeRange                        = $_oRecord->contentType_range ;
        $this->zContentTypeSlug                         = $_oRecord->contentType_slug ;
        $this->iContentTypeDisplayInLeft                = $_oRecord->contentType_displayInLeft ;
        $this->zContentTypeIcon                         = $_oRecord->contentType_icon ;
        $this->iContentTypeActivationStatusId           = $_oRecord->contentType_activationStatusId ;
        $this->iContentTypePublicationStatusId          = $_oRecord->contentType_publicationStatusId ;
        $this->iContentTypeRemoveStatusId               = $_oRecord->contentType_removeStatusId ;

        $this->iContentTypeTranslatableLocaleId         = $_oRecord->contentTypeTranslatable_localeId ;
        $this->iContentTypeTranslatableParentId         = $_oRecord->contentTypeTranslatable_parentId ;
        $this->zContentTypeTranslatableLabel            = $_oRecord->contentTypeTranslatable_label ;
        $this->zContentTypeTranslatableDescription      = $_oRecord->contentTypeTranslatable_description ;
        $this->zContentTypeTranslatableMetaDescription  = $_oRecord->contentTypeTranslatable_metaDescription ;
        $this->zContentTypeTranslatableMetaKeyword      = $_oRecord->contentTypeTranslatable_metaKeyword ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->contentType_id                           = $this->iContentTypeId ;
        $_oRecord->contentType_multipleStatusId             = $this->iContentTypeMultipleStatusId ;
        $_oRecord->contentType_range                        = $this->iContentTypeRange ;
        $_oRecord->contentType_slug                         = $this->zContentTypeSlug ;
        $_oRecord->contentType_displayInLeft                = $this->iContentTypeDisplayInLeft ;
        $_oRecord->contentType_icon                         = $this->zContentTypeIcon ;
        $_oRecord->contentType_activationStatusId           = $this->iContentTypeActivationStatusId ;
        $_oRecord->contentType_publicationStatusId          = $this->iContentTypePublicationStatusId ;
        $_oRecord->contentType_removeStatusId               = $this->iContentTypeRemoveStatusId ;

        $_oRecord->contentTypeTranslatable_localeId         = $this->iContentTypeTranslatableLocaleId ;
        $_oRecord->contentTypeTranslatable_parentId         = $this->iContentTypeTranslatableParentId ;
        $_oRecord->contentTypeTranslatable_label            = $this->zContentTypeTranslatableLabel ;
        $_oRecord->contentTypeTranslatable_description      = $this->zContentTypeTranslatableDescription ;
        $_oRecord->contentTypeTranslatable_metaDescription  = $this->zContentTypeTranslatableMetaDescription ;
        $_oRecord->contentTypeTranslatable_metaKeyword      = $this->zContentTypeTranslatableMetaKeyword ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iContentTypeTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oContentType = new CContentType () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("contentType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentTypeTranslatable") . " 
                        ON contentType_id = contentTypeTranslatable_parentId 
                        WHERE contentType_id = " . $_iId . " 
                        AND contentTypeTranslatable_localeId = 
                        IF ((SELECT contentType_id FROM " . $oCnx->prefixTable ("contentType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentTypeTranslatable") . " 
                        ON contentType_id = contentTypeTranslatable_parentId 
                        WHERE contentType_id = " . $_iId . " 
                        AND 
                        contentTypeTranslatable_localeId = " . $_iContentTypeTranslatableLocaleId . ") > 0, 
                        " . $_iContentTypeTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oContentType->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentType) ;
        }

        return $oContentType ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iContentTypeTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("contentType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentTypeTranslatable") . " 
                        ON contentType_id = contentTypeTranslatable_parentId 
                        WHERE contentTypeTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("contentType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentTypeTranslatable") . " 
                        ON contentType_id = contentTypeTranslatable_parentId 
                        WHERE contentTypeTranslatable_localeId = " . $_iContentTypeTranslatableLocaleId . ") > 0, " . $_iContentTypeTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->zContentTypeIdNotIn) && !empty ($_oToFind->zContentTypeIdNotIn))
        {
            $toConditions [] = "contentType_id NOT IN(" . $_oToFind->zContentTypeIdNotIn . ")" ;
        }

        if (isset ($_oToFind->zContentTypeIdIn) && !empty ($_oToFind->zContentTypeIdIn))
        {
            $toConditions [] = "contentType_id IN(" . $_oToFind->zContentTypeIdIn . ")" ;
        }

        if (isset ($_oToFind->iContentTypeActivationStatusId) && !empty ($_oToFind->iContentTypeActivationStatusId))
        {
            $toConditions [] = "contentType_activationStatusId = " . $_oToFind->iContentTypeActivationStatusId ;
        }

        if (isset ($_oToFind->iContentTypePublicationStatusId) && !empty ($_oToFind->iContentTypePublicationStatusId))
        {
            $toConditions [] = "contentType_publicationStatusId = " . $_oToFind->iContentTypePublicationStatusId ;
        }

        if (isset ($_oToFind->iContentTypeRemoveStatusId) && !empty ($_oToFind->iContentTypeRemoveStatusId))
        {
            $toConditions [] = "contentType_removeStatusId = " . $_oToFind->iContentTypeRemoveStatusId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        // ORDER
        $zQuery .= " ORDER BY contentType_range ASC" ;

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oContentType = new CContentType () ;
            $oContentType->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentType) ;
            $toRes [] = $oContentType ;
        }

        return $toRes ;
    }

    // get max range
    public static function getMaxRange ()
    {
        $oCnx = jDb::getConnection () ;

        $zQuery = "SELECT MAX(contentType_range) AS iMaxRange FROM " . $oCnx->prefixTable ("contentType") ;

        $oRsRange = $oCnx->query ($zQuery) ;
        $oResRange = $oRsRange->fetch () ;

        return $oResRange->iMaxRange ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoContentType = jDao::get ('common~contenttype') ;

        $oRecContentType       = null ;
        $oExistContentType     = null ;

        $oRecContentType = jDao::createRecord ('common~contenttype') ;

        if ($this->iContentTypeId > 0)
        {
            $oExistRecContentType = $oDaoContentType->get ($this->iContentTypeId) ;

            if (!empty ($oExistRecContentType))
            {
                $oRecContentType = $oExistRecContentType ;
            }
        }

        $this->fetchIntoRecord ($oRecContentType) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecContentType) ;

        if (empty ($oExistRecContentType))
        {
            $oDaoContentType->insert ($oRecContentType) ;
            $this->iContentTypeId = $oRecContentType->contentType_id ;
        }
        else
        {
            $oDaoContentType->update ($oRecContentType) ;
        }

        // translatable
        $oDaoContentTypeTranslatable = jDao::get ('common~contenttypetranslatable') ;

        $oRecContentTypeTranslatable         = null ;
        $oExistRecContentTypeTranslatable    = null ;

        $oRecContentTypeTranslatable = jDao::createRecord ('common~contenttypetranslatable') ;

        $oExistRecContentTypeTranslatable = $oDaoContentTypeTranslatable->get (array ($this->iContentTypeTranslatableLocaleId, $this->iContentTypeId)) ;

        if (!empty ($oExistRecContentTypeTranslatable))
        {
            $oRecContentTypeTranslatable = $oExistRecContentType ;
        }

        $this->fetchIntoRecord ($oRecContentTypeTranslatable) ;

        $oRecContentTypeTranslatable->contentTypeTranslatable_parentId = $this->iContentTypeId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecContentTypeTranslatable) ;

        if (empty ($oExistRecContentTypeTranslatable))
        {
            $oDaoContentTypeTranslatable->insert ($oRecContentTypeTranslatable) ;
        }
        else
        {
            $oDaoContentTypeTranslatable->update ($oRecContentTypeTranslatable) ;
        }
    }
}
?>