<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CSettingExtraField
{
    var $iSettingExtraFieldSettingExtraFieldSettingId ;
    var $iSettingExtraFieldIntValue ;
    var $iSettingExtraFieldSmallintValue ;
    var $iSettingExtraFieldDecimalValue ;
    var $iSettingExtraFieldRealValue ;
    var $zSettingExtraFieldDateValue ;
    var $zSettingExtraFieldDatetimeValue ;
    var $zSettingExtraFieldTimeValue ;

    var $iSettingExtraFieldTranslatableLocaleId ;
    var $iSettingExtraFieldTranslatableParentId ;
    var $zSettingExtraFieldTranslatableVarcharValue ;
    var $zSettingExtraFieldTranslatableTextValue ;

    public function __construct ()
    {
        $this->iSettingExtraFieldSettingExtraFieldSettingId = 0 ;
        $this->iSettingExtraFieldIntValue                   = null ;
        $this->iSettingExtraFieldSmallintValue              = null ;
        $this->iSettingExtraFieldDecimalValue               = null ;
        $this->iSettingExtraFieldRealValue                  = null ;
        $this->zSettingExtraFieldDateValue                  = null ;
        $this->zSettingExtraFieldDatetimeValue              = null ;
        $this->zSettingExtraFieldTimeValue                  = null ;

        $this->iSettingExtraFieldTranslatableLocaleId       = 0 ;
        $this->iSettingExtraFieldTranslatableParentId       = 0 ;
        $this->zSettingExtraFieldTranslatableVarcharValue   = "" ;
        $this->zSettingExtraFieldTranslatableTextValue      = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iSettingExtraFieldSettingExtraFieldSettingId = $_oRecord->settingExtraField_settingExtraFieldSettingId ;
        $this->iSettingExtraFieldIntValue                   = $_oRecord->settingExtraField_intValue ;
        $this->iSettingExtraFieldSmallintValue              = $_oRecord->settingExtraField_smallintValue ;
        $this->iSettingExtraFieldDecimalValue               = $_oRecord->settingExtraField_decimalValue ;
        $this->iSettingExtraFieldRealValue                  = $_oRecord->settingExtraField_realValue ;
        $this->zSettingExtraFieldDateValue                  = (!empty ($_oRecord->settingExtraField_dateValue)) ? CCommonTools::dateSql2Locale ($_oRecord->settingExtraField_dateValue) : $_oRecord->settingExtraField_dateValue ;
        $this->zSettingExtraFieldDatetimeValue              = (!empty ($_oRecord->settingExtraField_datetimeValue)) ? CCommonTools::dateTimeSql2Locale ($_oRecord->settingExtraField_datetimeValue, "Y-m-d H:i") : $_oRecord->settingExtraField_datetimeValue ;
        $this->zSettingExtraFieldTimeValue                  = (!empty ($_oRecord->settingExtraField_timeValue)) ? date ("H:i", strtotime ($_oRecord->settingExtraField_timeValue)) : $_oRecord->settingExtraField_timeValue ;
        $this->iSettingExtraFieldTranslatableLocaleId       = $_oRecord->settingExtraFieldTranslatable_localeId ;
        $this->iSettingExtraFieldTranslatableParentId       = $_oRecord->settingExtraFieldTranslatable_parentId ;
        $this->zSettingExtraFieldTranslatableVarcharValue   = $_oRecord->settingExtraFieldTranslatable_varcharValue ;
        $this->zSettingExtraFieldTranslatableTextValue      = $_oRecord->settingExtraFieldTranslatable_textValue ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->settingExtraField_settingExtraFieldSettingId     = $this->iSettingExtraFieldSettingExtraFieldSettingId ;
        $_oRecord->settingExtraField_intValue                       = $this->iSettingExtraFieldIntValue ;
        $_oRecord->settingExtraField_smallintValue                  = $this->iSettingExtraFieldSmallintValue ;
        $_oRecord->settingExtraField_decimalValue                   = $this->iSettingExtraFieldDecimalValue ;
        $_oRecord->settingExtraField_realValue                      = $this->iSettingExtraFieldRealValue ;
        $_oRecord->settingExtraField_dateValue                      = $this->zSettingExtraFieldDateValue ;
        $_oRecord->settingExtraField_datetimeValue                  = $this->zSettingExtraFieldDatetimeValue ;
        $_oRecord->settingExtraField_timeValue                      = $this->zSettingExtraFieldTimeValue ;

        $_oRecord->settingExtraFieldTranslatable_localeId           = $this->iSettingExtraFieldTranslatableLocaleId ;
        $_oRecord->settingExtraFieldTranslatable_parentId           = $this->iSettingExtraFieldTranslatableParentId ;
        $_oRecord->settingExtraFieldTranslatable_varcharValue       = $this->zSettingExtraFieldTranslatableVarcharValue ;
        $_oRecord->settingExtraFieldTranslatable_textValue          = $this->zSettingExtraFieldTranslatableTextValue ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iSettingExtraFieldTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oSettingExtraField = new CSettingExtraField () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("settingExtraField") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldTranslatable") . " 
                        ON settingExtraField_settingExtraFieldSettingId = settingExtraFieldTranslatable_parentId 
                        WHERE settingExtraField_settingExtraFieldSettingId = " . $_iId . " 
                        AND settingExtraFieldTranslatable_localeId = 
                        IF ((SELECT settingExtraField_settingExtraFieldSettingId FROM " . $oCnx->prefixTable ("settingExtraField") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldTranslatable") . " 
                        ON settingExtraField_settingExtraFieldSettingId = settingExtraFieldTranslatable_parentId 
                        WHERE settingExtraField_settingExtraFieldSettingId = " . $_iId . " 
                        AND 
                        settingExtraFieldTranslatable_localeId = " . $_iSettingExtraFieldTranslatableLocaleId . ") > 0, 
                        " . $_iSettingExtraFieldTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oSettingExtraField->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraField) ;
        }

        return $oSettingExtraField ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iSettingExtraFieldTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("settingExtraField") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldTranslatable") . " 
                        ON settingExtraField_settingExtraFieldSettingId = settingExtraFieldTranslatable_parentId 
                        WHERE settingExtraFieldTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("settingExtraField") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldTranslatable") . " 
                        ON settingExtraField_settingExtraFieldSettingId = settingExtraFieldTranslatable_parentId 
                        WHERE settingExtraFieldTranslatable_localeId = " . $_iSettingExtraFieldTranslatableLocaleId . ") > 0, " . $_iSettingExtraFieldTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
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
            $oSettingExtraField = new CSettingExtraField () ;
            $oSettingExtraField->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraField) ;
            $toRes [] = $oSettingExtraField ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoSettingExtraField = jDao::get ('common~settingextrafield') ;

        $oRecSettingExtraField       = null ;
        $oExistSettingExtraField     = null ;

        $oRecSettingExtraField = jDao::createRecord ('common~settingextrafield') ;

        if ($this->iSettingExtraFieldSettingExtraFieldSettingId > 0)
        {
            $oExistRecSettingExtraField = $oDaoSettingExtraField->get ($this->iSettingExtraFieldSettingExtraFieldSettingId) ;

            if (!empty ($oExistRecSettingExtraField))
            {
                $oRecSettingExtraField = $oExistRecSettingExtraField ;
            }
        }

        $this->fetchIntoRecord ($oRecSettingExtraField) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraField) ;

        if (empty ($oExistRecSettingExtraField))
        {
            $oDaoSettingExtraField->insert ($oRecSettingExtraField) ;
            $this->iSettingExtraFieldSettingExtraFieldSettingId = $oRecSettingExtraField->settingExtraField_settingExtraFieldSettingId ;
        }
        else
        {
            $oDaoSettingExtraField->update ($oRecSettingExtraField) ;
        }

        // translatable
        $oDaoSettingExtraFieldTranslatable = jDao::get ('common~settingextrafieldtranslatable') ;

        $oRecSettingExtraFieldTranslatable         = null ;
        $oExistRecSettingExtraFieldTranslatable    = null ;

        $oRecSettingExtraFieldTranslatable = jDao::createRecord ('common~settingextrafieldtranslatable') ;

        $oExistRecSettingExtraFieldTranslatable = $oDaoSettingExtraFieldTranslatable->get (array ($this->iSettingExtraFieldTranslatableLocaleId, $this->iSettingExtraFieldSettingExtraFieldSettingId)) ;

        if (!empty ($oExistRecSettingExtraFieldTranslatable))
        {
            $oRecSettingExtraFieldTranslatable = $oExistRecSettingExtraField ;
        }

        $this->fetchIntoRecord ($oRecSettingExtraFieldTranslatable) ;

        $oRecSettingExtraFieldTranslatable->settingExtraFieldTranslatable_parentId = $this->iSettingExtraFieldSettingExtraFieldSettingId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraFieldTranslatable) ;

        if (empty ($oExistRecSettingExtraFieldTranslatable))
        {
            $oDaoSettingExtraFieldTranslatable->insert ($oRecSettingExtraFieldTranslatable) ;
        }
        else
        {
            $oDaoSettingExtraFieldTranslatable->update ($oRecSettingExtraFieldTranslatable) ;
        }
    }
}
?>