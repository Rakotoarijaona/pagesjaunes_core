<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CUserExtraField") ;

class CUserExtraFieldSetting
{
    var $iUserExtraFieldSettingId ;
    var $iUserExtraFieldSettingUserTypeId ;
    var $iUserExtraFieldSettingRange ;
    var $zUserExtraFieldSettingName ;
    var $zUserExtraFieldSettingSlug ;
    var $zUserExtraFieldSettingIcon ;
    var $iUserExtraFieldSettingTypeId ;
    var $iUserExtraFieldSettingMultipleStatusId ;
    var $iUserExtraFieldSettingShowInListStatusId ;
    var $iUserExtraFieldSettingSearchableStatusId ;
    var $zUserExtraFieldSettingExtension ;
    var $iUserExtraFieldSettingElementTypeId ;
    var $iUserExtraFieldSettingWysiwygStatusId ;
    var $zUserExtraFieldSettingRule ;
    var $iUserExtraFieldSettingMediaCount ;
    var $iUserExtraFieldSettingSelectSourceElementTypeId ;
    var $iUserExtraFieldSettingSelectSourceTableTypeId ;
    var $iUserExtraFieldSettingSelectLabelStatusId ;
    var $iUserExtraFieldSettingSelectDescriptionStatusId ;
    var $iUserExtraFieldSettingRequiredStatusId ;
    var $iUserExtraFieldSettingActivationStatusId ;
    var $iUserExtraFieldSettingPublicationStatusId ;

    var $iUserExtraFieldSettingTranslatableLocaleId ;
    var $iUserExtraFieldSettingTranslatableParentId ;
    var $zUserExtraFieldSettingTranslatableLabel ;
    var $zUserExtraFieldSettingTranslatableRequiredMessage ;
    var $zUserExtraFieldSettingTranslatableRuleMessage ;
    var $zUserExtraFieldSettingTranslatableSelectDefaultMessage ;

    public function __construct ()
    {
        $this->iUserExtraFieldSettingId                                 = 0 ;
        $this->iUserExtraFieldSettingUserTypeId                         = null ;
        $this->iUserExtraFieldSettingRange                              = null ;
        $this->zUserExtraFieldSettingName                               = "" ;
        $this->zUserExtraFieldSettingSlug                               = "" ;
        $this->zUserExtraFieldSettingIcon                               = "" ;
        $this->iUserExtraFieldSettingTypeId                             = null ;
        $this->iUserExtraFieldSettingMultipleStatusId                   = NO ;
        $this->iUserExtraFieldSettingShowInListStatusId                 = NO ;
        $this->iUserExtraFieldSettingSearchableStatusId                 = NO ;
        $this->zUserExtraFieldSettingExtension                          = null ;
        $this->iUserExtraFieldSettingElementTypeId                      = null ;
        $this->iUserExtraFieldSettingWysiwygStatusId                    = NO ;
        $this->zUserExtraFieldSettingRule                               = "" ;
        $this->iUserExtraFieldSettingMediaCount                         = null ;
        $this->iUserExtraFieldSettingSelectSourceElementTypeId          = null ;
        $this->iUserExtraFieldSettingSelectSourceTableTypeId            = null ;
        $this->iUserExtraFieldSettingSelectLabelStatusId                = NO ;
        $this->iUserExtraFieldSettingSelectDescriptionStatusId          = NO ;
        $this->iUserExtraFieldSettingRequiredStatusId                   = NO ;
        $this->iUserExtraFieldSettingActivationStatusId                 = null ;
        $this->iUserExtraFieldSettingPublicationStatusId                = null ;

        $this->iUserExtraFieldSettingTranslatableLocaleId               = 0 ;
        $this->iUserExtraFieldSettingTranslatableParentId               = 0 ;
        $this->zUserExtraFieldSettingTranslatableLabel                  = "" ;
        $this->zUserExtraFieldSettingTranslatableRequiredMessage        = "" ;
        $this->zUserExtraFieldSettingTranslatableRuleMessage            = "" ;
        $this->zUserExtraFieldSettingTranslatableSelectDefaultMessage   = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iUserExtraFieldSettingId                                 = $_oRecord->userExtraFieldSetting_id ;
        $this->iUserExtraFieldSettingUserTypeId                         = $_oRecord->userExtraFieldSetting_userTypeId ;
        $this->iUserExtraFieldSettingRange                              = $_oRecord->userExtraFieldSetting_range ;
        $this->zUserExtraFieldSettingName                               = $_oRecord->userExtraFieldSetting_name ;
        $this->zUserExtraFieldSettingSlug                               = $_oRecord->userExtraFieldSetting_slug ;
        $this->zUserExtraFieldSettingIcon                               = $_oRecord->userExtraFieldSetting_icon ;
        $this->iUserExtraFieldSettingTypeId                             = $_oRecord->userExtraFieldSetting_typeId ;
        $this->iUserExtraFieldSettingMultipleStatusId                   = $_oRecord->userExtraFieldSetting_multipleStatusId ;
        $this->iUserExtraFieldSettingShowInListStatusId                 = $_oRecord->userExtraFieldSetting_showInListStatusId ;
        $this->iUserExtraFieldSettingSearchableStatusId                 = $_oRecord->userExtraFieldSetting_searchableStatusId ;
        $this->zUserExtraFieldSettingExtension                          = $_oRecord->userExtraFieldSetting_extension ;
        $this->iUserExtraFieldSettingElementTypeId                      = $_oRecord->userExtraFieldSetting_elementTypeId ;
        $this->iUserExtraFieldSettingWysiwygStatusId                    = $_oRecord->userExtraFieldSetting_wysiwygStatusId ;
        $this->zUserExtraFieldSettingRule                               = $_oRecord->userExtraFieldSetting_rule ;
        $this->iUserExtraFieldSettingMediaCount                         = $_oRecord->userExtraFieldSetting_mediaCount ;
        $this->iUserExtraFieldSettingSelectSourceElementTypeId          = $_oRecord->userExtraFieldSetting_selectSourceElementTypeId ;
        $this->iUserExtraFieldSettingSelectSourceTableTypeId            = $_oRecord->userExtraFieldSetting_selectSourceTableTypeId ;
        $this->iUserExtraFieldSettingSelectLabelStatusId                = $_oRecord->userExtraFieldSetting_selectLabelStatusId ;
        $this->iUserExtraFieldSettingSelectDescriptionStatusId          = $_oRecord->userExtraFieldSetting_selectDescriptionStatusId ;
        $this->iUserExtraFieldSettingRequiredStatusId                   = $_oRecord->userExtraFieldSetting_requiredStatusId ;
        $this->iUserExtraFieldSettingActivationStatusId                 = $_oRecord->userExtraFieldSetting_activationStatusId ;
        $this->iUserExtraFieldSettingPublicationStatusId                = $_oRecord->userExtraFieldSetting_publicationStatusId ;

        $this->iUserExtraFieldSettingTranslatableLocaleId               = $_oRecord->userExtraFieldSettingTranslatable_localeId ;
        $this->iUserExtraFieldSettingTranslatableParentId               = $_oRecord->userExtraFieldSettingTranslatable_parentId ;
        $this->zUserExtraFieldSettingTranslatableLabel                  = $_oRecord->userExtraFieldSettingTranslatable_label ;
        $this->zUserExtraFieldSettingTranslatableRequiredMessage        = $_oRecord->userExtraFieldSettingTranslatable_requiredMessage ;
        $this->zUserExtraFieldSettingTranslatableRuleMessage            = $_oRecord->userExtraFieldSettingTranslatable_ruleMessage ;
        $this->zUserExtraFieldSettingTranslatableSelectDefaultMessage   = $_oRecord->userExtraFieldSettingTranslatable_selectDefaultMessage ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->userExtraFieldSetting_id                                 = $this->iUserExtraFieldSettingId ;
        $_oRecord->userExtraFieldSetting_userTypeId                         = $this->iUserExtraFieldSettingUserTypeId ;
        $_oRecord->userExtraFieldSetting_range                              = $this->iUserExtraFieldSettingRange ;
        $_oRecord->userExtraFieldSetting_name                               = $this->zUserExtraFieldSettingName ;
        $_oRecord->userExtraFieldSetting_slug                               = $this->zUserExtraFieldSettingSlug ;
        $_oRecord->userExtraFieldSetting_icon                               = $this->zUserExtraFieldSettingIcon ;
        $_oRecord->userExtraFieldSetting_typeId                             = $this->iUserExtraFieldSettingTypeId ;
        $_oRecord->userExtraFieldSetting_multipleStatusId                   = $this->iUserExtraFieldSettingMultipleStatusId ;
        $_oRecord->userExtraFieldSetting_showInListStatusId                 = $this->iUserExtraFieldSettingShowInListStatusId ;
        $_oRecord->userExtraFieldSetting_searchableStatusId                 = $this->iUserExtraFieldSettingSearchableStatusId ;
        $_oRecord->userExtraFieldSetting_extension                          = $this->zUserExtraFieldSettingExtension ;
        $_oRecord->userExtraFieldSetting_elementTypeId                      = $this->iUserExtraFieldSettingElementTypeId ;
        $_oRecord->userExtraFieldSetting_wysiwygStatusId                    = $this->iUserExtraFieldSettingWysiwygStatusId ;
        $_oRecord->userExtraFieldSetting_rule                               = $this->zUserExtraFieldSettingRule ;
        $_oRecord->userExtraFieldSetting_mediaCount                         = $this->iUserExtraFieldSettingMediaCount ;
        $_oRecord->userExtraFieldSetting_selectSourceElementTypeId          = $this->iUserExtraFieldSettingSelectSourceElementTypeId ;
        $_oRecord->userExtraFieldSetting_selectSourceTableTypeId            = $this->iUserExtraFieldSettingSelectSourceTableTypeId ;
        $_oRecord->userExtraFieldSetting_selectLabelStatusId                = $this->iUserExtraFieldSettingSelectLabelStatusId ;
        $_oRecord->userExtraFieldSetting_selectDescriptionStatusId          = $this->iUserExtraFieldSettingSelectDescriptionStatusId ;
        $_oRecord->userExtraFieldSetting_requiredStatusId                   = $this->iUserExtraFieldSettingRequiredStatusId ;
        $_oRecord->userExtraFieldSetting_activationStatusId                 = $this->iUserExtraFieldSettingActivationStatusId ;
        $_oRecord->userExtraFieldSetting_publicationStatusId                = $this->iUserExtraFieldSettingPublicationStatusId ;

        $_oRecord->userExtraFieldSettingTranslatable_localeId               = $this->iUserExtraFieldSettingTranslatableLocaleId ;
        $_oRecord->userExtraFieldSettingTranslatable_parentId               = $this->iUserExtraFieldSettingTranslatableParentId ;
        $_oRecord->userExtraFieldSettingTranslatable_label                  = $this->zUserExtraFieldSettingTranslatableLabel ;
        $_oRecord->userExtraFieldSettingTranslatable_requiredMessage        = $this->zUserExtraFieldSettingTranslatableRequiredMessage ;
        $_oRecord->userExtraFieldSettingTranslatable_ruleMessage            = $this->zUserExtraFieldSettingTranslatableRuleMessage ;
        $_oRecord->userExtraFieldSettingTranslatable_selectDefaultMessage   = $this->zUserExtraFieldSettingTranslatableSelectDefaultMessage ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iUserExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oUserExtraFieldSetting = new CUserExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_id = " . $_iId . " 
                        AND userExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT userExtraFieldSetting_id FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_id = " . $_iId . " 
                        AND 
                        userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iUserExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oUserExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserExtraFieldSetting) ;
        }

        return $oUserExtraFieldSetting ;
    }

    // get max range
    public static function getMaxRange ($_iUserExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $zQuery = "SELECT MAX(userExtraFieldSetting_range) AS iMaxRange FROM " . $oCnx->prefixTable ("userExtraFieldSetting") ;

        $oRsRange = $oCnx->query ($zQuery) ;
        $oResRange = $oRsRange->fetch () ;

        return $oResRange->iMaxRange ;
    }

    // find by slug
    public static function getBySlug ($_zSlug = "", $_iUserTypeId = null, $_iUserExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oUserExtraFieldSetting = new CUserExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_slug = '" . $_zSlug . "' 
                        AND userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT userExtraFieldSetting_id FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_slug = '" . $_zSlug . "' 
                        AND userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iUserExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oUserExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserExtraFieldSetting) ;
        }

        return $oUserExtraFieldSetting ;
    }

    // test if searching possible
    public static function hasFieldToSearch ($_oToFind = null, $_iUserExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldSettingTranslatableLocaleId . ") > 0, " . $_iUserExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                        AND userExtraFieldSetting_searchableStatusId = " . YES . "
                    " ;

        // filters
        $toConditions = array () ;

        // element type id in
        if (isset ($_oToFind->iUserExtraFieldSettingElementTypeIdIn))
        {
            $toConditions [] = "userExtraFieldSetting_elementTypeId IN(" . $_oToFind->iUserExtraFieldSettingElementTypeIdIn . ")" ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingUserTypeId))
        {
            $toConditions [] = "userExtraFieldSetting_userTypeId = " . $_oToFind->iUserExtraFieldSettingUserTypeId ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingActivationStatusId))
        {
            $toConditions [] = "userExtraFieldSetting_activationStatusId = " . $_oToFind->iUserExtraFieldSettingActivationStatusId ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingPublicationStatusId))
        {
            $toConditions [] = "userExtraFieldSetting_publicationStatusId = " . $_oToFind->iUserExtraFieldSettingPublicationStatusId ;
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
    public static function getList ($_oToFind = null, $_iUserExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldSettingTranslatableLocaleId . ") > 0, " . $_iUserExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->zUserExtraFieldSettingSlugNotIn))
        {
            $toConditions [] = "userExtraFieldSetting_slug NOT IN(" . $_oToFind->zUserExtraFieldSettingSlugNotIn . ")" ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingElementTypeIdIn))
        {
            $toConditions [] = "userExtraFieldSetting_elementTypeId IN(" . $_oToFind->iUserExtraFieldSettingElementTypeIdIn . ")" ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingUserTypeId))
        {
            $toConditions [] = "userExtraFieldSetting_userTypeId = " . $_oToFind->iUserExtraFieldSettingUserTypeId ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingActivationStatusId))
        {
            $toConditions [] = "userExtraFieldSetting_activationStatusId = " . $_oToFind->iUserExtraFieldSettingActivationStatusId ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingPublicationStatusId))
        {
            $toConditions [] = "userExtraFieldSetting_publicationStatusId = " . $_oToFind->iUserExtraFieldSettingPublicationStatusId ;
        }

        if (isset ($_oToFind->iUserExtraFieldSettingSearchableStatusId))
        {
            $toConditions [] = "userExtraFieldSetting_searchableStatusId = " . $_oToFind->iUserExtraFieldSettingSearchableStatusId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        // ORDER
        $zQuery .= " ORDER BY userExtraFieldSetting_range ASC" ;

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oUserExtraFieldSetting = new CUserExtraFieldSetting () ;
            $oUserExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserExtraFieldSetting) ;
            $toRes [] = $oUserExtraFieldSetting ;
        }

        return $toRes ;
    }

    // get select label
    public static function getSelectLabelSlug ($_iUserTypeId = 0, $_iUserExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $tzLabelSlug = array () ;

        $zQuery =   "
                        SELECT userExtraFieldSetting_slug FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSetting_activationStatusId = " . YES . " 
                        AND userExtraFieldSetting_selectLabelStatusId = " . YES . " 
                        AND userExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSetting_activationStatusId = " . YES . " 
                        AND userExtraFieldSetting_selectLabelStatusId = " . YES . " 
                        AND userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldLocaleId . ") > 0, " . $_iUserExtraFieldLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $tzLabelSlug [] = $oRec->userExtraFieldSetting_slug ;
        }

        return $tzLabelSlug ;
    }

    // get select description
    public static function getSelectDescriptionSlug ($_iUserTypeId = 0, $_iUserExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $tzDescriptionSlug = array () ;

        $zQuery =   "
                        SELECT userExtraFieldSetting_slug FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSetting_activationStatusId = " . YES . " 
                        AND userExtraFieldSetting_selectDescriptionStatusId = " . YES . " 
                        AND userExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("userExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userExtraFieldSettingTranslatable") . " 
                        ON userExtraFieldSetting_id = userExtraFieldSettingTranslatable_parentId 
                        WHERE userExtraFieldSetting_userTypeId = " . $_iUserTypeId . " 
                        AND userExtraFieldSetting_activationStatusId = " . YES . " 
                        AND userExtraFieldSetting_selectDescriptionStatusId = " . YES . " 
                        AND userExtraFieldSettingTranslatable_localeId = " . $_iUserExtraFieldLocaleId . ") > 0, " . $_iUserExtraFieldLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $tzDescriptionSlug [] = $oRec->userExtraFieldSetting_slug ;
        }

        return $tzDescriptionSlug ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoUserExtraFieldSetting = jDao::get ('common~userextrafieldsetting') ;

        $oRecUserExtraFieldSetting       = null ;
        $oExistUserExtraFieldSetting     = null ;

        $oRecUserExtraFieldSetting = jDao::createRecord ('common~userextrafieldsetting') ;

        if ($this->iUserExtraFieldSettingId > 0)
        {
            $oExistRecUserExtraFieldSetting = $oDaoUserExtraFieldSetting->get ($this->iUserExtraFieldSettingId) ;

            if (!empty ($oExistRecUserExtraFieldSetting))
            {
                $oRecUserExtraFieldSetting = $oExistRecUserExtraFieldSetting ;
            }
        }

        $this->fetchIntoRecord ($oRecUserExtraFieldSetting) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecUserExtraFieldSetting) ;

        // insert new extra field
        $oCondUserExtraField = new stdClass () ;
        $oCondUserExtraField->iUserExtraFieldUserTypeId = $this->iUserExtraFieldSettingUserTypeId ;
        $toUserExtraField = CUserExtraField::getList ($oCondUserExtraField, LANG_DEFAULT_ID) ;

        if (empty ($oExistRecUserExtraFieldSetting))
        {
            $oDaoUserExtraFieldSetting->insert ($oRecUserExtraFieldSetting) ;
            $this->iUserExtraFieldSettingId = $oRecUserExtraFieldSetting->userExtraFieldSetting_id ;

            foreach ($toUserExtraField as $oExistContExtraField)
            {
                // text
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    switch ($this->iUserExtraFieldSettingTypeId)
                    {
                        case FIELD_TYPE_INTEGER_ID :
                            $oUserExtraField->iIntegerValue = NULL ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_INTEGER_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "integer_value" ;
                        break ;

                        case FIELD_TYPE_SMALLINT_ID :
                            $oUserExtraField->iSmallintValue = NULL ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "smallint_value" ;
                        break ;

                        case FIELD_TYPE_DECIMAL_ID :
                            $oUserExtraField->iDecimalValue = NULL ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DECIMAL_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "decimal_value" ;
                        break ;

                        case FIELD_TYPE_REAL_ID :
                            $oUserExtraField->iRealValue = NULL ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_REAL_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "real_value" ;
                        break ;

                        case FIELD_TYPE_VARCHAR_ID :
                            $oUserExtraField->zVarcharValue = NULL ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;
                        break ;

                        default :
                        break ;
                    }

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // text

                // textarea
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                         = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId        = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                           = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                       = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                     = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zTextValue = NULL ;
                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_TEXT_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "text_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // textarea

                // datetime
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATETIME_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $zUserExtraFieldDatetimeValue = NULL ;
                    $oUserExtraField->zDatetimeValue = (!empty ($zUserExtraFieldDatetimeValue)) ? CCommonTools::dateTimeLocale2Sql ($zUserExtraFieldDatetimeValue . ":00") : $zUserExtraFieldDatetimeValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DATETIME_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "datetime_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // datetime

                // select
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $zSelectUserExtraFieldTranslatableVarcharValue = null ;

                    if ($this->iUserExtraFieldSettingMultipleStatusId == NO)
                    {
                        $zSelectUserExtraFieldTranslatableVarcharValue = NULL ;
                    }
                    else
                    {
                        $zSelectUserExtraFieldTranslatableVarcharValue = NULL ;
                    }

                    $oUserExtraField->zVarcharValue = $zSelectUserExtraFieldTranslatableVarcharValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // select

                // date
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATE_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $zUserExtraFieldDateValue = NULL ;
                    $oUserExtraField->zDateValue = (!empty ($zUserExtraFieldDateValue)) ? CCommonTools::dateLocale2Sql ($zUserExtraFieldDateValue) : $zUserExtraFieldDateValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DATE_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "date_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // date

                // radio
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->iSmallintValue = NULL ;
                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "smallint_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // radio

                // checkbox
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;


                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $tiCheckboxValues = NULL ;

                    $oUserExtraField->zVarcharValue = (!empty ($tiCheckboxValues)) ? implode (",", $tiCheckboxValues) : $tiCheckboxValues ;
                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // radio

                // time
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TIME_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $zUserExtraFieldTimeValue = NULL ;
                    $oUserExtraField->zTimeValue = (!empty ($zUserExtraFieldTimeValue)) ? $zUserExtraFieldTimeValue . ":00" : $zUserExtraFieldTimeValue ;
                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_TIME_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "time_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // time

                // medias
                if (in_array ($this->iUserExtraFieldSettingElementTypeId, array (ELEMENT_TYPE_DOCUMENT_ID, ELEMENT_TYPE_IMAGE_ID, ELEMENT_TYPE_VIDEO_ID, ELEMENT_TYPE_AUDIO_ID)))
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $tiMedias = NULL ;
                    $oUserExtraField->zVarcharValue = (!empty ($tiMedias)) ? implode (",", $tiMedias) : "" ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // medias
            }
            // insert new extra field
        }
        else
        {
            $oDaoUserExtraFieldSetting->update ($oRecUserExtraFieldSetting) ;

            foreach ($toUserExtraField as $oExistContExtraField)
            {
                // text
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    switch ($this->iUserExtraFieldSettingTypeId)
                    {
                        case FIELD_TYPE_INTEGER_ID :
                            $oUserExtraField->iIntegerValue = $oExistContExtraField->iIntegerValue ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_INTEGER_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "integer_value" ;
                        break ;

                        case FIELD_TYPE_SMALLINT_ID :
                            $oUserExtraField->iSmallintValue = $oExistContExtraField->iSmallintValue ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "smallint_value" ;
                        break ;

                        case FIELD_TYPE_DECIMAL_ID :
                            $oUserExtraField->iDecimalValue = $oExistContExtraField->iDecimalValue ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DECIMAL_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "decimal_value" ;
                        break ;

                        case FIELD_TYPE_REAL_ID :
                            $oUserExtraField->iRealValue = $oExistContExtraField->iRealValue ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_REAL_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "real_value" ;
                        break ;

                        case FIELD_TYPE_VARCHAR_ID :
                            $oUserExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;
                            $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                            $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;
                        break ;

                        default :
                        break ;
                    }

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // text

                // textarea
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                         = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId        = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                           = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                       = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                     = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zTextValue                                    = $oExistContExtraField->zTextValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_TEXT_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "text_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // textarea

                // datetime
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATETIME_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $zUserExtraFieldDatetimeValue = $oExistContExtraField->zDatetimeValue ;
                    $oUserExtraField->zDatetimeValue = (!empty ($zUserExtraFieldDatetimeValue)) ? CCommonTools::dateTimeLocale2Sql ($zUserExtraFieldDatetimeValue . ":00") : $zUserExtraFieldDatetimeValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DATETIME_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "datetime_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // datetime

                // select
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // select

                // date
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_DATE_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zDateValue = $oExistContExtraField->zDateValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_DATE_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "date_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // date

                // radio
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->iSmallintValue = $oExistContExtraField->iSmallintValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_SMALLINT_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "smallint_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // radio

                // checkbox
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;


                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // radio

                // time
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TIME_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $oUserExtraField->zTimeValue = $oExistContExtraField->zTimeValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_TIME_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "time_value" ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // time

                // images
                if ($this->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_IMAGE_ID)
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $tiImages = NULL ;
                    $oUserExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // images

                // files
                if (in_array ($this->iUserExtraFieldSettingElementTypeId, array (ELEMENT_TYPE_DOCUMENT_ID, ELEMENT_TYPE_IMAGE_ID, ELEMENT_TYPE_VIDEO_ID, ELEMENT_TYPE_AUDIO_ID)))
                {
                    $oUserExtraField = new CUserExtraField () ;

                    $oUserExtraField->iUserExtraFieldUserId                     = $oExistContExtraField->iUserExtraFieldUserId ;
                    $oUserExtraField->iUserExtraFieldUserExtraFieldSettingId    = $this->iUserExtraFieldSettingId ;
                    $oUserExtraField->zUserExtraFieldSlug                       = $this->zUserExtraFieldSettingSlug ;
                    $oUserExtraField->iUserExtraFieldLocaleId                   = LANG_DEFAULT_ID ;
                    $oUserExtraField->iUserExtraFieldUserTypeId                 = $oExistContExtraField->iUserExtraFieldUserTypeId ;

                    $tiMedias = NULL ;
                    $oUserExtraField->zVarcharValue = $oExistContExtraField->zVarcharValue ;

                    $oUserExtraField->iUserExtraFieldTypeId = FIELD_TYPE_VARCHAR_ID ;
                    $oUserExtraField->zUserExtraFieldFieldName = "varchar_value" ;

                    CCommonTools::decodeDaoRecUtf8 ($oUserExtraField) ;

                    $oUserExtraField->saveIntoDB () ;
                }
                // files
            }
            // insert new extra field
        }

        // eto

        // translatable
        $oDaoUserExtraFieldSettingTranslatable = jDao::get ('common~userextrafieldsettingtranslatable') ;

        $oRecUserExtraFieldSettingTranslatable         = null ;
        $oExistRecUserExtraFieldSettingTranslatable    = null ;

        $oRecUserExtraFieldSettingTranslatable = jDao::createRecord ('common~userextrafieldsettingtranslatable') ;

        $oExistRecUserExtraFieldSettingTranslatable = $oDaoUserExtraFieldSettingTranslatable->get (array ($this->iUserExtraFieldSettingTranslatableLocaleId, $this->iUserExtraFieldSettingId)) ;

        if (!empty ($oExistRecUserExtraFieldSettingTranslatable) && ($oExistRecUserExtraFieldSetting))
        {
            $oRecUserExtraFieldSettingTranslatable = $oExistRecUserExtraFieldSetting ;
        }

        $this->fetchIntoRecord ($oRecUserExtraFieldSettingTranslatable) ;

        $oRecUserExtraFieldSettingTranslatable->userExtraFieldSettingTranslatable_parentId = $this->iUserExtraFieldSettingId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecUserExtraFieldSettingTranslatable) ;

        if (empty ($oExistRecUserExtraFieldSettingTranslatable))
        {
            $oDaoUserExtraFieldSettingTranslatable->insert ($oRecUserExtraFieldSettingTranslatable) ;
        }
        else
        {
            $oDaoUserExtraFieldSettingTranslatable->update ($oRecUserExtraFieldSettingTranslatable) ;
        }
    }
}
?>