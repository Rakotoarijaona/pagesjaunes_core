<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CSettingExtraFieldSetting
{
    var $iSettingExtraFieldSettingId ;
    var $iSettingExtraFieldSettingRange ;
    var $zSettingExtraFieldSettingName ;
    var $zSettingExtraFieldSettingSlug ;
    var $zSettingExtraFieldSettingIcon ;
    var $iSettingExtraFieldSettingIntDefaultValue ;
    var $iSettingExtraFieldSettingSmallintDefaultValue ;
    var $iSettingExtraFieldSettingDecimalDefaultValue ;
    var $iSettingExtraFieldSettingRealDefaultValue ;
    var $iSettingExtraFieldSettingTypeId ;
    var $iSettingExtraFieldSettingMultipleStatusId ;
    var $zSettingExtraFieldSettingExtension ;
    var $iSettingExtraFieldSettingElementTypeId ;
    var $iSettingExtraFieldSettingWysiwygStatusId ;
    var $zSettingExtraFieldSettingRule ;
    var $iSettingExtraFieldSettingRequiredStatusId ;
    var $iSettingExtraFieldSettingActivationStatusId ;
    var $iSettingExtraFieldSettingPublicationStatusId ;
    var $iSettingExtraFieldSettingAdminShowStatusId ;

    var $iSettingExtraFieldSettingTranslatableLocaleId ;
    var $iSettingExtraFieldSettingTranslatableParentId ;
    var $zSettingExtraFieldSettingTranslatableLabel ;
    var $zSettingExtraFieldSettingTranslatableRequiredMessage ;
    var $zSettingExtraFieldSettingTranslatableRuleMessage ;
    var $zSettingExtraFieldSettingTranslatableSelectDefaultMessage ;

    public function __construct ()
    {
        $this->iSettingExtraFieldSettingId                                  = 0 ;
        $this->iSettingExtraFieldSettingRange                               = null ;
        $this->zSettingExtraFieldSettingName                                = "" ;
        $this->zSettingExtraFieldSettingSlug                                = "" ;
        $this->zSettingExtraFieldSettingIcon                                = "" ;
        $this->iSettingExtraFieldSettingIntDefaultValue                     = null ;
        $this->iSettingExtraFieldSettingSmallintDefaultValue                = null ;
        $this->iSettingExtraFieldSettingDecimalDefaultValue                 = null ;
        $this->iSettingExtraFieldSettingRealDefaultValue                    = null ;
        $this->iSettingExtraFieldSettingTypeId                              = null ;
        $this->iSettingExtraFieldSettingMultipleStatusId                    = NO ;
        $this->zSettingExtraFieldSettingExtension                           = null ;
        $this->iSettingExtraFieldSettingElementTypeId                       = null ;
        $this->iSettingExtraFieldSettingWysiwygStatusId                     = NO ;
        $this->zSettingExtraFieldSettingRule                                = "" ;
        $this->iSettingExtraFieldSettingRequiredStatusId                    = NO ;
        $this->iSettingExtraFieldSettingActivationStatusId                  = null ;
        $this->iSettingExtraFieldSettingPublicationStatusId                 = null ;
        $this->iSettingExtraFieldSettingAdminShowStatusId                   = YES ;

        $this->iSettingExtraFieldSettingTranslatableLocaleId                = 0 ;
        $this->iSettingExtraFieldSettingTranslatableParentId                = 0 ;
        $this->zSettingExtraFieldSettingTranslatableLabel                   = "" ;
        $this->zSettingExtraFieldSettingTranslatableRequiredMessage         = "" ;
        $this->zSettingExtraFieldSettingTranslatableRuleMessage             = "" ;
        $this->zSettingExtraFieldSettingTranslatableSelectDefaultMessage    = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iSettingExtraFieldSettingId                                  = $_oRecord->settingExtraFieldSetting_id ;
        $this->iSettingExtraFieldSettingRange                               = $_oRecord->settingExtraFieldSetting_range ;
        $this->zSettingExtraFieldSettingName                                = $_oRecord->settingExtraFieldSetting_name ;
        $this->zSettingExtraFieldSettingSlug                                = $_oRecord->settingExtraFieldSetting_slug ;
        $this->zSettingExtraFieldSettingIcon                                = $_oRecord->settingExtraFieldSetting_icon ;
        $this->iSettingExtraFieldSettingIntDefaultValue                     = $_oRecord->settingExtraFieldSetting_intDefaultValue ;
        $this->iSettingExtraFieldSettingSmallintDefaultValue                = $_oRecord->settingExtraFieldSetting_smallintDefaultValue ;
        $this->iSettingExtraFieldSettingDecimalDefaultValue                 = $_oRecord->settingExtraFieldSetting_decimalDefaultValue ;
        $this->iSettingExtraFieldSettingRealDefaultValue                    = $_oRecord->settingExtraFieldSetting_realDefaultValue ;
        $this->iSettingExtraFieldSettingTypeId                              = $_oRecord->settingExtraFieldSetting_typeId ;
        $this->iSettingExtraFieldSettingMultipleStatusId                    = $_oRecord->settingExtraFieldSetting_multipleStatusId ;
        $this->zSettingExtraFieldSettingExtension                           = $_oRecord->settingExtraFieldSetting_extension ;
        $this->iSettingExtraFieldSettingElementTypeId                       = $_oRecord->settingExtraFieldSetting_elementTypeId ;
        $this->iSettingExtraFieldSettingWysiwygStatusId                     = $_oRecord->settingExtraFieldSetting_wysiwygStatusId ;
        $this->zSettingExtraFieldSettingRule                                = $_oRecord->settingExtraFieldSetting_rule ;
        $this->iSettingExtraFieldSettingRequiredStatusId                    = $_oRecord->settingExtraFieldSetting_requiredStatusId ;
        $this->iSettingExtraFieldSettingActivationStatusId                  = $_oRecord->settingExtraFieldSetting_activationStatusId ;
        $this->iSettingExtraFieldSettingPublicationStatusId                 = $_oRecord->settingExtraFieldSetting_publicationStatusId ;
        $this->iSettingExtraFieldSettingAdminShowStatusId                   = $_oRecord->settingExtraFieldSetting_adminShowStatusId ;

        $this->iSettingExtraFieldSettingTranslatableLocaleId                = $_oRecord->settingExtraFieldSettingTranslatable_localeId ;
        $this->iSettingExtraFieldSettingTranslatableParentId                = $_oRecord->settingExtraFieldSettingTranslatable_parentId ;
        $this->zSettingExtraFieldSettingTranslatableLabel                   = $_oRecord->settingExtraFieldSettingTranslatable_label ;
        $this->zSettingExtraFieldSettingTranslatableRequiredMessage         = $_oRecord->settingExtraFieldSettingTranslatable_requiredMessage ;
        $this->zSettingExtraFieldSettingTranslatableRuleMessage             = $_oRecord->settingExtraFieldSettingTranslatable_ruleMessage ;
        $this->zSettingExtraFieldSettingTranslatableSelectDefaultMessage    = $_oRecord->settingExtraFieldSettingTranslatable_selectDefaultMessage ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->settingExtraFieldSetting_id                                  = $this->iSettingExtraFieldSettingId ;
        $_oRecord->settingExtraFieldSetting_range                               = $this->iSettingExtraFieldSettingRange ;
        $_oRecord->settingExtraFieldSetting_name                                = $this->zSettingExtraFieldSettingName ;
        $_oRecord->settingExtraFieldSetting_slug                                = $this->zSettingExtraFieldSettingSlug ;
        $_oRecord->settingExtraFieldSetting_icon                                = $this->zSettingExtraFieldSettingIcon ;
        $_oRecord->settingExtraFieldSetting_intDefaultValue                     = $this->iSettingExtraFieldSettingIntDefaultValue ;
        $_oRecord->settingExtraFieldSetting_smallintDefaultValue                = $this->iSettingExtraFieldSettingSmallintDefaultValue ;
        $_oRecord->settingExtraFieldSetting_decimalDefaultValue                 = $this->iSettingExtraFieldSettingDecimalDefaultValue ;
        $_oRecord->settingExtraFieldSetting_realDefaultValue                    = $this->iSettingExtraFieldSettingRealDefaultValue ;
        $_oRecord->settingExtraFieldSetting_typeId                              = $this->iSettingExtraFieldSettingTypeId ;
        $_oRecord->settingExtraFieldSetting_multipleStatusId                    = $this->iSettingExtraFieldSettingMultipleStatusId ;
        $_oRecord->settingExtraFieldSetting_extension                           = $this->zSettingExtraFieldSettingExtension ;
        $_oRecord->settingExtraFieldSetting_elementTypeId                       = $this->iSettingExtraFieldSettingElementTypeId ;
        $_oRecord->settingExtraFieldSetting_wysiwygStatusId                     = $this->iSettingExtraFieldSettingWysiwygStatusId ;
        $_oRecord->settingExtraFieldSetting_rule                                = $this->zSettingExtraFieldSettingRule ;
        $_oRecord->settingExtraFieldSetting_requiredStatusId                    = $this->iSettingExtraFieldSettingRequiredStatusId ;
        $_oRecord->settingExtraFieldSetting_activationStatusId                  = $this->iSettingExtraFieldSettingActivationStatusId ;
        $_oRecord->settingExtraFieldSetting_publicationStatusId                 = $this->iSettingExtraFieldSettingPublicationStatusId ;
        $_oRecord->settingExtraFieldSetting_adminShowStatusId                   = $this->iSettingExtraFieldSettingAdminShowStatusId ;

        $_oRecord->settingExtraFieldSettingTranslatable_localeId                = $this->iSettingExtraFieldSettingTranslatableLocaleId ;
        $_oRecord->settingExtraFieldSettingTranslatable_parentId                = $this->iSettingExtraFieldSettingTranslatableParentId ;
        $_oRecord->settingExtraFieldSettingTranslatable_label                   = $this->zSettingExtraFieldSettingTranslatableLabel ;
        $_oRecord->settingExtraFieldSettingTranslatable_requiredMessage         = $this->zSettingExtraFieldSettingTranslatableRequiredMessage ;
        $_oRecord->settingExtraFieldSettingTranslatable_ruleMessage             = $this->zSettingExtraFieldSettingTranslatableRuleMessage ;
        $_oRecord->settingExtraFieldSettingTranslatable_selectDefaultMessage    = $this->zSettingExtraFieldSettingTranslatableSelectDefaultMessage ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iSettingExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oSettingExtraFieldSetting = new CSettingExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSetting_id = " . $_iId . " 
                        AND settingExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT settingExtraFieldSetting_id FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSetting_id = " . $_iId . " 
                        AND 
                        settingExtraFieldSettingTranslatable_localeId = " . $_iSettingExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iSettingExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oSettingExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraFieldSetting) ;
        }

        return $oSettingExtraFieldSetting ;
    }

    // find by slug
    public static function getBySlug ($_zSlug = "", $_iSettingExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oSettingExtraFieldSetting = new CSettingExtraFieldSetting () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSetting_id = " . $_iId . " 
                        AND settingExtraFieldSettingTranslatable_localeId = 
                        IF ((SELECT settingExtraFieldSetting_id FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSetting_slug = " . $_zSlug . " 
                        AND 
                        settingExtraFieldSettingTranslatable_localeId = " . $_iSettingExtraFieldSettingTranslatableLocaleId . ") > 0, 
                        " . $_iSettingExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oSettingExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraFieldSetting) ;
        }

        return $oSettingExtraFieldSetting ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iSettingExtraFieldSettingTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSettingTranslatable_localeId = 
                        if ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("settingExtraFieldSetting") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingTranslatable") . " 
                        ON settingExtraFieldSetting_id = settingExtraFieldSettingTranslatable_parentId 
                        WHERE settingExtraFieldSettingTranslatable_localeId = " . $_iSettingExtraFieldSettingTranslatableLocaleId . ") > 0, " . $_iSettingExtraFieldSettingTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iSettingExtraFieldSettingActivationStatusId))
        {
            $toConditions [] = "settingExtraFieldSetting_activationStatusId = " . $_oToFind->iSettingExtraFieldSettingActivationStatusId ;
        }

        if (isset ($_oToFind->iSettingExtraFieldSettingPublicationStatusId))
        {
            $toConditions [] = "settingExtraFieldSetting_publicationStatusId = " . $_oToFind->iSettingExtraFieldSettingPublicationStatusId ;
        }

        if (isset ($_oToFind->iSettingExtraFieldSettingAdminShowStatusId))
        {
            $toConditions [] = "settingExtraFieldSetting_adminShowStatusId = " . $_oToFind->iSettingExtraFieldSettingAdminShowStatusId ;
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
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oSettingExtraFieldSetting = new CSettingExtraFieldSetting () ;
            $oSettingExtraFieldSetting->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraFieldSetting) ;
            $toRes [] = $oSettingExtraFieldSetting ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoSettingExtraFieldSetting = jDao::get ('common~settingextrafieldsetting') ;

        $oRecSettingExtraFieldSetting       = null ;
        $oExistSettingExtraFieldSetting     = null ;

        $oRecSettingExtraFieldSetting = jDao::createRecord ('common~settingextrafieldsetting') ;

        if ($this->iSettingExtraFieldSettingId > 0)
        {
            $oExistRecSettingExtraFieldSetting = $oDaoSettingExtraFieldSetting->get ($this->iSettingExtraFieldSettingId) ;

            if (!empty ($oExistRecSettingExtraFieldSetting))
            {
                $oRecSettingExtraFieldSetting = $oExistRecSettingExtraFieldSetting ;
            }
        }

        $this->fetchIntoRecord ($oRecSettingExtraFieldSetting) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraFieldSetting) ;

        if (empty ($oExistRecSettingExtraFieldSetting))
        {
            $oDaoSettingExtraFieldSetting->insert ($oRecSettingExtraFieldSetting) ;
            $this->iSettingExtraFieldSettingId = $oRecSettingExtraFieldSetting->settingExtraFieldSetting_id ;
        }
        else
        {
            $oDaoSettingExtraFieldSetting->update ($oRecSettingExtraFieldSetting) ;
        }

        // translatable
        $oDaoSettingExtraFieldSettingTranslatable = jDao::get ('common~settingextrafieldsettingtranslatable') ;

        $oRecSettingExtraFieldSettingTranslatable         = null ;
        $oExistRecSettingExtraFieldSettingTranslatable    = null ;

        $oRecSettingExtraFieldSettingTranslatable = jDao::createRecord ('common~settingextrafieldsettingtranslatable') ;

        $oExistRecSettingExtraFieldSettingTranslatable = $oDaoSettingExtraFieldSettingTranslatable->get (array ($this->iSettingExtraFieldSettingTranslatableLocaleId, $this->iSettingExtraFieldSettingId)) ;

        if (!empty ($oExistRecSettingExtraFieldSettingTranslatable))
        {
            $oRecSettingExtraFieldSettingTranslatable = $oExistRecSettingExtraFieldSetting ;
        }

        $this->fetchIntoRecord ($oRecSettingExtraFieldSettingTranslatable) ;

        $oRecSettingExtraFieldSettingTranslatable->settingExtraFieldSettingTranslatable_parentId = $this->iSettingExtraFieldSettingId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraFieldSettingTranslatable) ;

        if (empty ($oExistRecSettingExtraFieldSettingTranslatable))
        {
            $oDaoSettingExtraFieldSettingTranslatable->insert ($oRecSettingExtraFieldSettingTranslatable) ;
        }
        else
        {
            $oDaoSettingExtraFieldSettingTranslatable->update ($oRecSettingExtraFieldSettingTranslatable) ;
        }
    }
}
?>