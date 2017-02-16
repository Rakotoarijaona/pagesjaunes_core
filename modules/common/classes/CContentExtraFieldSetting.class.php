<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CContentExtraField") ;

class CContentExtraFieldSetting
{
    var $iContentExtraFieldSettingId ;
    var $iContentExtraFieldSettingContentTypeId ;
    var $iContentExtraFieldSettingRange ;
    var $zContentExtraFieldSettingName ;
    var $zContentExtraFieldSettingSlug ;
    var $zContentExtraFieldSettingIcon ;
    var $iContentExtraFieldSettingTypeId ;
    var $iContentExtraFieldSettingMultipleStatusId ;
    var $iContentExtraFieldSettingShowInListStatusId ;
    var $iContentExtraFieldSettingSearchableStatusId ;
    var $zContentExtraFieldSettingExtension ;
    var $iContentExtraFieldSettingElementTypeId ;
    var $iContentExtraFieldSettingWysiwygStatusId ;
    var $zContentExtraFieldSettingRule ;
    var $iContentExtraFieldSettingMediaCount ;
    var $iContentExtraFieldSettingSelectSourceElementTypeId ;
    var $iContentExtraFieldSettingSelectSourceTableTypeId ;
    var $iContentExtraFieldSettingSelectLabelStatusId ;
    var $iContentExtraFieldSettingSelectDescriptionStatusId ;

    var $iContentExtraFieldSettingRequiredStatusId ;
    var $iContentExtraFieldSettingActivationStatusId ;
    var $iContentExtraFieldSettingPublicationStatusId ;

    var $iContentExtraFieldSettingTranslatableLocaleId ;
    var $iContentExtraFieldSettingTranslatableParentId ;
    var $zContentExtraFieldSettingTranslatableLabel ;
    var $zContentExtraFieldSettingTranslatableRequiredMessage ;
    var $zContentExtraFieldSettingTranslatableRuleMessage ;
    var $zContentExtraFieldSettingTranslatableSelectDefaultMessage ;

    public function __construct ()
    {
        $this->iContentExtraFieldSettingId                                  = 0 ;
        $this->iContentExtraFieldSettingContentTypeId                       = null ;
        $this->iContentExtraFieldSettingRange                               = null ;
        $this->zContentExtraFieldSettingName                                = "" ;
        $this->zContentExtraFieldSettingSlug                                = "" ;
        $this->zContentExtraFieldSettingIcon                                = "" ;
        $this->iContentExtraFieldSettingTypeId                              = null ;
        $this->iContentExtraFieldSettingMultipleStatusId                    = NO ;
        $this->iContentExtraFieldSettingShowInListStatusId                  = NO ;
        $this->iContentExtraFieldSettingSearchableStatusId                  = NO ;
        $this->zContentExtraFieldSettingExtension                           = null ;
        $this->iContentExtraFieldSettingElementTypeId                       = null ;
        $this->iContentExtraFieldSettingWysiwygStatusId                     = NO ;
        $this->zContentExtraFieldSettingRule                                = "" ;
        $this->iContentExtraFieldSettingMediaCount                          = null ;
        $this->iContentExtraFieldSettingSelectSourceElementTypeId           = null ;
        $this->iContentExtraFieldSettingSelectSourceTableTypeId             = null ;
        $this->iContentExtraFieldSettingSelectLabelStatusId                 = NO ;
        $this->iContentExtraFieldSettingSelectDescriptionStatusId           = NO ;

        $this->iContentExtraFieldSettingRequiredStatusId                    = NO ;
        $this->iContentExtraFieldSettingActivationStatusId                  = null ;
        $this->iContentExtraFieldSettingPublicationStatusId                 = null ;

        $this->iContentExtraFieldSettingTranslatableLocaleId                = 0 ;
        $this->iContentExtraFieldSettingTranslatableParentId                = 0 ;
        $this->zContentExtraFieldSettingTranslatableLabel                   = "" ;
        $this->zContentExtraFieldSettingTranslatableRequiredMessage         = "" ;
        $this->zContentExtraFieldSettingTranslatableRuleMessage             = "" ;
        $this->zContentExtraFieldSettingTranslatableSelectDefaultMessage    = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iContentExtraFieldSettingId                                  = $_oRecord->contentExtraFieldSetting_id ;
        $this->iContentExtraFieldSettingContentTypeId                       = $_oRecord->contentExtraFieldSetting_contentTypeId ;
        $this->iContentExtraFieldSettingRange                               = $_oRecord->contentExtraFieldSetting_range ;
        $this->zContentExtraFieldSettingName                                = $_oRecord->contentExtraFieldSetting_name ;
        $this->zContentExtraFieldSettingSlug                                = $_oRecord->contentExtraFieldSetting_slug ;
        $this->zContentExtraFieldSettingIcon                                = $_oRecord->contentExtraFieldSetting_icon ;
        $this->iContentExtraFieldSettingTypeId                              = $_oRecord->contentExtraFieldSetting_typeId ;
        $this->iContentExtraFieldSettingMultipleStatusId                    = $_oRecord->contentExtraFieldSetting_multipleStatusId ;
        $this->iContentExtraFieldSettingShowInListStatusId                  = $_oRecord->contentExtraFieldSetting_showInListStatusId ;
        $this->iContentExtraFieldSettingSearchableStatusId                  = $_oRecord->contentExtraFieldSetting_searchableStatusId ;
        $this->zContentExtraFieldSettingExtension                           = $_oRecord->contentExtraFieldSetting_extension ;
        $this->iContentExtraFieldSettingElementTypeId                       = $_oRecord->contentExtraFieldSetting_elementTypeId ;
        $this->iContentExtraFieldSettingWysiwygStatusId                     = $_oRecord->contentExtraFieldSetting_wysiwygStatusId ;
        $this->zContentExtraFieldSettingRule                                = $_oRecord->contentExtraFieldSetting_rule ;
        $this->iContentExtraFieldSettingMediaCount                          = $_oRecord->contentExtraFieldSetting_mediaCount ;
        $this->iContentExtraFieldSettingSelectSourceElementTypeId           = $_oRecord->contentExtraFieldSetting_selectSourceElementTypeId ;
        $this->iContentExtraFieldSettingSelectSourceTableTypeId             = $_oRecord->contentExtraFieldSetting_selectSourceTableTypeId ;
        $this->iContentExtraFieldSettingSelectLabelStatusId                 = $_oRecord->contentExtraFieldSetting_selectLabelStatusId ;
        $this->iContentExtraFieldSettingSelectDescriptionStatusId           = $_oRecord->contentExtraFieldSetting_selectDescriptionStatusId ;
        $this->iContentExtraFieldSettingRequiredStatusId                    = $_oRecord->contentExtraFieldSetting_requiredStatusId ;
        $this->iContentExtraFieldSettingActivationStatusId                  = $_oRecord->contentExtraFieldSetting_activationStatusId ;
        $this->iContentExtraFieldSettingPublicationStatusId                 = $_oRecord->contentExtraFieldSetting_publicationStatusId ;

        $this->iContentExtraFieldSettingTranslatableLocaleId                = $_oRecord->contentExtraFieldSettingTranslatable_localeId ;
        $this->iContentExtraFieldSettingTranslatableParentId                = $_oRecord->contentExtraFieldSettingTranslatable_parentId ;
        $this->zContentExtraFieldSettingTranslatableLabel                   = $_oRecord->contentExtraFieldSettingTranslatable_label ;
        $this->zContentExtraFieldSettingTranslatableRequiredMessage         = $_oRecord->contentExtraFieldSettingTranslatable_requiredMessage ;
        $this->zContentExtraFieldSettingTranslatableRuleMessage             = $_oRecord->contentExtraFieldSettingTranslatable_ruleMessage ;
        $this->zContentExtraFieldSettingTranslatableSelectDefaultMessage    = $_oRecord->contentExtraFieldSettingTranslatable_selectDefaultMessage ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->contentExtraFieldSetting_id                                  = $this->iContentExtraFieldSettingId ;
        $_oRecord->contentExtraFieldSetting_contentTypeId                       = $this->iContentExtraFieldSettingContentTypeId ;
        $_oRecord->contentExtraFieldSetting_range                               = $this->iContentExtraFieldSettingRange ;
        $_oRecord->contentExtraFieldSetting_name                                = $this->zContentExtraFieldSettingName ;
        $_oRecord->contentExtraFieldSetting_slug                                = $this->zContentExtraFieldSettingSlug ;
        $_oRecord->contentExtraFieldSetting_icon                                = $this->zContentExtraFieldSettingIcon ;
        $_oRecord->contentExtraFieldSetting_typeId                              = $this->iContentExtraFieldSettingTypeId ;
        $_oRecord->contentExtraFieldSetting_multipleStatusId                    = $this->iContentExtraFieldSettingMultipleStatusId ;
        $_oRecord->contentExtraFieldSetting_showInListStatusId                  = $this->iContentExtraFieldSettingShowInListStatusId ;
        $_oRecord->contentExtraFieldSetting_searchableStatusId                  = $this->iContentExtraFieldSettingSearchableStatusId ;
        $_oRecord->contentExtraFieldSetting_extension                           = $this->zContentExtraFieldSettingExtension ;
        $_oRecord->contentExtraFieldSetting_elementTypeId                       = $this->iContentExtraFieldSettingElementTypeId ;
        $_oRecord->contentExtraFieldSetting_wysiwygStatusId                     = $this->iContentExtraFieldSettingWysiwygStatusId ;
        $_oRecord->contentExtraFieldSetting_rule                                = $this->zContentExtraFieldSettingRule ;
        $_oRecord->contentExtraFieldSetting_mediaCount                          = $this->iContentExtraFieldSettingMediaCount ;
        $_oRecord->contentExtraFieldSetting_selectSourceElementTypeId           = $this->iContentExtraFieldSettingSelectSourceElementTypeId ;
        $_oRecord->contentExtraFieldSetting_selectSourceTableTypeId             = $this->iContentExtraFieldSettingSelectSourceTableTypeId ;
        $_oRecord->contentExtraFieldSetting_selectLabelStatusId                 = $this->iContentExtraFieldSettingSelectLabelStatusId ;
        $_oRecord->contentExtraFieldSetting_selectDescriptionStatusId           = $this->iContentExtraFieldSettingSelectDescriptionStatusId ;
        $_oRecord->contentExtraFieldSetting_requiredStatusId                    = $this->iContentExtraFieldSettingRequiredStatusId ;
        $_oRecord->contentExtraFieldSetting_activationStatusId                  = $this->iContentExtraFieldSettingActivationStatusId ;
        $_oRecord->contentExtraFieldSetting_publicationStatusId                 = $this->iContentExtraFieldSettingPublicationStatusId ;

        $_oRecord->contentExtraFieldSettingTranslatable_localeId                = $this->iContentExtraFieldSettingTranslatableLocaleId ;
        $_oRecord->contentExtraFieldSettingTranslatable_parentId                = $this->iContentExtraFieldSettingTranslatableParentId ;
        $_oRecord->contentExtraFieldSettingTranslatable_label                   = $this->zContentExtraFieldSettingTranslatableLabel ;
        $_oRecord->contentExtraFieldSettingTranslatable_requiredMessage         = $this->zContentExtraFieldSettingTranslatableRequiredMessage ;
        $_oRecord->contentExtraFieldSettingTranslatable_ruleMessage             = $this->zContentExtraFieldSettingTranslatableRuleMessage ;
        $_oRecord->contentExtraFieldSettingTranslatable_selectDefaultMessage    = $this->zContentExtraFieldSettingTranslatableSelectDefaultMessage ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iContentExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oContentExtraFieldSetting = new CContentExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_id = " . $_iId . " 
                        AND contentExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT contentExtraFieldSetting_id FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_id = " . $_iId . " 
                        AND 
                        contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iContentExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oContentExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentExtraFieldSetting) ;
        }

        return $oContentExtraFieldSetting ;
    }

    // get max range
    public static function getMaxRange ($_iContentExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $zQuery = "SELECT MAX(contentExtraFieldSetting_range) AS iMaxRange FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") ;

        $oRsRange = $oCnx->query ($zQuery) ;
        $oResRange = $oRsRange->fetch () ;

        return $oResRange->iMaxRange ;
    }

    // find by slug
    public static function getBySlug ($_zSlug = "", $_iContentExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oContentExtraFieldSetting = new CContentExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_slug = '" . $_zSlug . "' 
                        AND contentExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT COUNT(contentExtraFieldSetting_id) FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_slug = '" . $_zSlug . "' 
                        AND 
                        contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iContentExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oContentExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentExtraFieldSetting) ;
        }

        return $oContentExtraFieldSetting ;
    }

    // test if searching possible
    public static function hasFieldToSearch ($_oToFind = null, $_iContentExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldSettingTranslatableLocaleId . ") > 0, " . $_iContentExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                        AND contentExtraFieldSetting_searchableStatusId = " . YES . "
                    " ;

        // filters
        $toConditions = array () ;

        // element type id in
        if (isset ($_oToFind->iContentExtraFieldSettingElementTypeIdIn))
        {
            $toConditions [] = "contentExtraFieldSetting_elementTypeId IN(" . $_oToFind->iContentExtraFieldSettingElementTypeIdIn . ")" ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingContentTypeId))
        {
            $toConditions [] = "contentExtraFieldSetting_contentTypeId = " . $_oToFind->iContentExtraFieldSettingContentTypeId ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingActivationStatusId))
        {
            $toConditions [] = "contentExtraFieldSetting_activationStatusId = " . $_oToFind->iContentExtraFieldSettingActivationStatusId ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingPublicationStatusId))
        {
            $toConditions [] = "contentExtraFieldSetting_publicationStatusId = " . $_oToFind->iContentExtraFieldSettingPublicationStatusId ;
        }

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

        return ($oResCount->iNumRows > 0) ? true : false ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iContentExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldSettingTranslatableLocaleId . ") > 0, " . $_iContentExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        // element type id in
        if (isset ($_oToFind->iContentExtraFieldSettingElementTypeIdIn))
        {
            $toConditions [] = "contentExtraFieldSetting_elementTypeId IN(" . $_oToFind->iContentExtraFieldSettingElementTypeIdIn . ")" ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingContentTypeId))
        {
            $toConditions [] = "contentExtraFieldSetting_contentTypeId = " . $_oToFind->iContentExtraFieldSettingContentTypeId ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingActivationStatusId))
        {
            $toConditions [] = "contentExtraFieldSetting_activationStatusId = " . $_oToFind->iContentExtraFieldSettingActivationStatusId ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingPublicationStatusId))
        {
            $toConditions [] = "contentExtraFieldSetting_publicationStatusId = " . $_oToFind->iContentExtraFieldSettingPublicationStatusId ;
        }

        if (isset ($_oToFind->iContentExtraFieldSettingSearchableStatusId))
        {
            $toConditions [] = "contentExtraFieldSetting_searchableStatusId = " . $_oToFind->iContentExtraFieldSettingSearchableStatusId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        // ORDER
        $zQuery .= " ORDER BY contentExtraFieldSetting_range ASC" ;

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oContentExtraFieldSetting = new CContentExtraFieldSetting () ;
            $oContentExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentExtraFieldSetting) ;
            $toRes [] = $oContentExtraFieldSetting ;
        }

        return $toRes ;
    }

    // get select label
    public static function getSelectLabelSlug ($_iContentTypeId = 0, $_iContentExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $tzLabelSlug = array () ;

        $zQuery =   "
                        SELECT contentExtraFieldSetting_slug FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_contentTypeId = " . $_iContentTypeId . " 
                        AND contentExtraFieldSetting_activationStatusId = " . YES . " 
                        AND contentExtraFieldSetting_selectLabelStatusId = " . YES . " 
                        AND contentExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT contentExtraFieldSetting_id FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_contentTypeId = " . $_iContentTypeId . " 
                        AND contentExtraFieldSetting_activationStatusId = " . YES . " 
                        AND contentExtraFieldSetting_selectLabelStatusId = " . YES . " 
                        AND contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldLocaleId . ") > 0, 
                        " . $_iContentExtraFieldLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $tzLabelSlug [] = $oRec->contentExtraFieldSetting_slug ;
        }

        return $tzLabelSlug ;
    }

    // get select description
    public static function getSelectDescriptionSlug ($_iContentTypeId = 0, $_iContentExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $tzDescriptionSlug = array () ;

        $zQuery =   "
                        SELECT contentExtraFieldSetting_slug FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_contentTypeId = " . $_iContentTypeId . " 
                        AND contentExtraFieldSetting_activationStatusId = " . YES . " 
                        AND contentExtraFieldSetting_selectDescriptionStatusId = " . YES . " 
                        AND contentExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT contentExtraFieldSetting_id FROM " . $oCnx->prefixTable ("contentExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("contentExtraFieldSettingTranslatable") . " 
                        ON contentExtraFieldSetting_id = contentExtraFieldSettingTranslatable_parentId 
                        WHERE contentExtraFieldSetting_contentTypeId = " . $_iContentTypeId . " 
                        AND contentExtraFieldSetting_activationStatusId = " . YES . " 
                        AND contentExtraFieldSetting_selectDescriptionStatusId = " . YES . " 
                        AND contentExtraFieldSettingTranslatable_localeId = " . $_iContentExtraFieldLocaleId . ") > 0, 
                        " . $_iContentExtraFieldLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $tzDescriptionSlug [] = $oRec->contentExtraFieldSetting_slug ;
        }

        return $tzDescriptionSlug ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoContentExtraFieldSetting = jDao::get ('common~contentextrafieldsetting') ;

        $oRecContentExtraFieldSetting       = null ;
        $oExistContentExtraFieldSetting     = null ;

        $oRecContentExtraFieldSetting = jDao::createRecord ('common~contentextrafieldsetting') ;

        if ($this->iContentExtraFieldSettingId > 0)
        {
            $oExistRecContentExtraFieldSetting = $oDaoContentExtraFieldSetting->get ($this->iContentExtraFieldSettingId) ;

            if (!empty ($oExistRecContentExtraFieldSetting))
            {
                $oRecContentExtraFieldSetting = $oExistRecContentExtraFieldSetting ;
            }
        }

        $this->fetchIntoRecord ($oRecContentExtraFieldSetting) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecContentExtraFieldSetting) ;

        // insert new extra field
        $oCondContentExtraField = new stdClass () ;
        $oCondContentExtraField->iContentExtraFieldContentTypeId = $this->iContentExtraFieldSettingContentTypeId ;
        $toContentExtraField = CContentExtraField::getList ($oCondContentExtraField, LANG_DEFAULT_ID) ;

        if (empty ($oExistRecContentExtraFieldSetting))
        {
            $oDaoContentExtraFieldSetting->insert ($oRecContentExtraFieldSetting) ;
            $this->iContentExtraFieldSettingId = $oRecContentExtraFieldSetting->contentExtraFieldSetting_id ;

            foreach ($toContentExtraField as $oExistContExtraField)
            {
                // text
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    switch ($this->iContentExtraFieldSettingTypeId)
                    {
                        case FIELD_TYPE_INTEGER_ID :
                            $oContentExtraField->iIntegerValue = NULL ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_INTEGER_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "integer_value" ;
                        break ;

                        case FIELD_TYPE_SMALLINT_ID :
                            $oContentExtraField->iSmallintValue = NULL ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "smallint_value" ;
                        break ;

                        case FIELD_TYPE_DECIMAL_ID :
                            $oContentExtraField->iDecimalValue = NULL ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DECIMAL_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "decimal_value" ;
                        break ;

                        case FIELD_TYPE_REAL_ID :
                            $oContentExtraField->iRealValue = NULL ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_REAL_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "real_value" ;
                        break ;

                        case FIELD_TYPE_VARCHAR_ID :
                            $oContentExtraField->zVarcharValue = NULL ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;
                        break ;

                        default :
                        break ;
                    }

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // text

                // textarea
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                        = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId       = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                             = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                         = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                    = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zTextValue                                         = NULL ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_TEXT_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "text_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // textarea

                // datetime
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATETIME_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $zContentExtraFieldDatetimeValue = NULL ;
                    $oContentExtraField->zDatetimeValue = (!empty ($zContentExtraFieldDatetimeValue)) ? CCommonTools::dateTimeLocale2Sql ($zContentExtraFieldDatetimeValue . ":00") : $zContentExtraFieldDatetimeValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DATETIME_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "datetime_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // datetime

                // select
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $zSelectContentExtraFieldTranslatableVarcharValue = null ;

                    if ($this->iContentExtraFieldSettingMultipleStatusId == NO)
                    {
                        $zSelectContentExtraFieldTranslatableVarcharValue = NULL ;
                    }
                    else
                    {
                        $zSelectContentExtraFieldTranslatableVarcharValue = NULL ;
                    }

                    $oContentExtraField->zVarcharValue = $zSelectContentExtraFieldTranslatableVarcharValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // select

                // date
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATE_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $zContentExtraFieldDateValue = NULL ;
                    $oContentExtraField->zDateValue = (!empty ($zContentExtraFieldDateValue)) ? CCommonTools::dateLocale2Sql ($zContentExtraFieldDateValue) : $zContentExtraFieldDateValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DATE_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "date_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // date

                // radio
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->iSmallintValue = NULL ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "smallint_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // radio

                // checkbox
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;


                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $tiCheckboxValues = NULL ;

                    $oContentExtraField->zVarcharValue = (!empty ($tiCheckboxValues)) ? implode (",", $tiCheckboxValues) : $tiCheckboxValues ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // radio

                // time
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TIME_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $zContentExtraFieldTimeValue = NULL ;
                    $oContentExtraField->zTimeValue = (!empty ($zContentExtraFieldTimeValue)) ? $zContentExtraFieldTimeValue . ":00" : $zContentExtraFieldTimeValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_TIME_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "time_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // time

                // medias
                if (in_array ($this->iContentExtraFieldSettingElementTypeId, array (ELEMENT_TYPE_DOCUMENT_ID, ELEMENT_TYPE_IMAGE_ID, ELEMENT_TYPE_VIDEO_ID, ELEMENT_TYPE_AUDIO_ID)))
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $tiMedias = NULL ;
                    $oContentExtraField->zVarcharValue = (!empty ($tiMedias)) ? implode (",", $tiMedias) : "" ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // medias
            }
            // insert new extra field
        }
        else
        {
            $oDaoContentExtraFieldSetting->update ($oRecContentExtraFieldSetting) ;

            foreach ($toContentExtraField as $oExistContExtraField)
            {
                // text
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    switch ($this->iContentExtraFieldSettingTypeId)
                    {
                        case FIELD_TYPE_INTEGER_ID :
                            $oContentExtraField->iIntegerValue = $oExistContExtraField->iIntegerValue ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_INTEGER_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "integer_value" ;
                        break ;

                        case FIELD_TYPE_SMALLINT_ID :
                            $oContentExtraField->iSmallintValue = $oExistContExtraField->iSmallintValue ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "smallint_value" ;
                        break ;

                        case FIELD_TYPE_DECIMAL_ID :
                            $oContentExtraField->iDecimalValue = $oExistContExtraField->iDecimalValue ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DECIMAL_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "decimal_value" ;
                        break ;

                        case FIELD_TYPE_REAL_ID :
                            $oContentExtraField->iRealValue = $oExistContExtraField->iRealValue ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_REAL_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "real_value" ;
                        break ;

                        case FIELD_TYPE_VARCHAR_ID :
                            $oContentExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;
                            $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                            $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;
                        break ;

                        default :
                        break ;
                    }

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // text

                // textarea
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                        = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId       = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                             = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                         = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                    = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zTextValue = $oExistContExtraField->zTextValue ;
                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_TEXT_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "text_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // textarea

                // datetime
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATETIME_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $zContentExtraFieldDatetimeValue = $oExistContExtraField->zDatetimeValue ;
                    $oContentExtraField->zDatetimeValue = (!empty ($zContentExtraFieldDatetimeValue)) ? CCommonTools::dateTimeLocale2Sql ($zContentExtraFieldDatetimeValue . ":00") : $zContentExtraFieldDatetimeValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DATETIME_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "datetime_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // datetime

                // select
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // select

                // date
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATE_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zDateValue = $oExistContExtraField->zDateValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_DATE_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "date_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // date

                // radio
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->iSmallintValue = $oExistContExtraField->iSmallintValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "smallint_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // radio

                // checkbox
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;


                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // radio

                // time
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TIME_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $oContentExtraField->zTimeValue = $oExistContExtraField->zTimeValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_TIME_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "time_value" ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // time

                // images
                if ($this->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_IMAGE_ID)
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $tiImages = NULL ;
                    $oContentExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // images

                // files
                if (in_array ($this->iContentExtraFieldSettingElementTypeId, array (ELEMENT_TYPE_DOCUMENT_ID, ELEMENT_TYPE_IMAGE_ID, ELEMENT_TYPE_VIDEO_ID, ELEMENT_TYPE_AUDIO_ID)))
                {
                    $oContentExtraField = new CContentExtraField () ;

                    $oContentExtraField->iContentExtraFieldContentId                    = $oExistContExtraField->iContentExtraFieldContentId ;
                    $oContentExtraField->iContentExtraFieldContentExtraFieldSettingId   = $this->iContentExtraFieldSettingId ;
                    $oContentExtraField->zContentExtraFieldSlug                         = $this->zContentExtraFieldSettingSlug ;
                    $oContentExtraField->iContentExtraFieldLocaleId                     = LANG_DEFAULT_ID ;
                    $oContentExtraField->iContentExtraFieldContentTypeId                = $oExistContExtraField->iContentExtraFieldContentTypeId ;

                    $tiMedias = NULL ;
                    $oContentExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oContentExtraField->iContentExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oContentExtraField->zContentExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oContentExtraField) ;

                    $oContentExtraField->saveIntoDB () ;
                }
                // files
            }
        }
        // insert new extra field

        // translatable
        $oDaoContentExtraFieldSettingTranslatable = jDao::get ('common~contentextrafieldsettingtranslatable') ;

        $oRecContentExtraFieldSettingTranslatable         = null ;
        $oExistRecContentExtraFieldSettingTranslatable    = null ;

        $oRecContentExtraFieldSettingTranslatable = jDao::createRecord ('common~contentextrafieldsettingtranslatable') ;

        $oExistRecContentExtraFieldSettingTranslatable = $oDaoContentExtraFieldSettingTranslatable->get (array ($this->iContentExtraFieldSettingTranslatableLocaleId, $this->iContentExtraFieldSettingId)) ;

        if (!empty ($oExistRecContentExtraFieldSettingTranslatable) && ($oExistRecContentExtraFieldSetting))
        {
            $oRecContentExtraFieldSettingTranslatable = $oExistRecContentExtraFieldSetting ;
        }

        $this->fetchIntoRecord ($oRecContentExtraFieldSettingTranslatable) ;

        $oRecContentExtraFieldSettingTranslatable->contentExtraFieldSettingTranslatable_parentId = $this->iContentExtraFieldSettingId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecContentExtraFieldSettingTranslatable) ;

        if (empty ($oExistRecContentExtraFieldSettingTranslatable))
        {
            $oDaoContentExtraFieldSettingTranslatable->insert ($oRecContentExtraFieldSettingTranslatable) ;
        }
        else
        {
            $oDaoContentExtraFieldSettingTranslatable->update ($oRecContentExtraFieldSettingTranslatable) ;
        }
    }
}
?>