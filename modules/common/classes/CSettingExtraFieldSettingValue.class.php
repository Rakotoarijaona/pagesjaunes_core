<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CSettingExtraFieldSettingValue
{
    var $iSettingExtraFieldSettingValueId ;
    var $iSettingExtraFieldSettingValueSettingExtraFieldSettingId ;
    var $iSettingExtraFieldSettingValueDefaultStatusId ;

    var $iSettingExtraFieldSettingValueTranslatableLocaleId ;
    var $iSettingExtraFieldSettingValueTranslatableParentId ;
    var $zSettingExtraFieldSettingValueTranslatableLabel ;

    public function __construct ()
    {
        $this->iSettingExtraFieldSettingValueId                         = 0 ;
        $this->iSettingExtraFieldSettingValueSettingExtraFieldSettingId = 0 ;
        $this->iSettingExtraFieldSettingValueDefaultStatusId            = NO ;

        $this->iSettingExtraFieldSettingValueTranslatableLocaleId       = 0 ;
        $this->iSettingExtraFieldSettingValueTranslatableParentId       = 0 ;
        $this->zSettingExtraFieldSettingValueTranslatableLabel          = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iSettingExtraFieldSettingValueId                         = $_oRecord->settingExtraFieldSettingValue_id ;
        $this->iSettingExtraFieldSettingValueSettingExtraFieldSettingId = $_oRecord->settingExtraFieldSettingValue_settingExtraFieldSettingId ;
        $this->iSettingExtraFieldSettingValueDefaultStatusId            = $_oRecord->settingExtraFieldSettingValue_defaultStatusId ;

        $this->iSettingExtraFieldSettingValueTranslatableLocaleId       = $_oRecord->settingExtraFieldSettingValueTranslatable_localeId ;
        $this->iSettingExtraFieldSettingValueTranslatableParentId       = $_oRecord->settingExtraFieldSettingValueTranslatable_parentId ;
        $this->zSettingExtraFieldSettingValueTranslatableLabel          = $_oRecord->settingExtraFieldSettingValueTranslatable_label ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->settingExtraFieldSettingValue_id                         = $this->iSettingExtraFieldSettingValueId ;
        $_oRecord->settingExtraFieldSettingValue_settingExtraFieldSettingId = $this->iSettingExtraFieldSettingValueSettingExtraFieldSettingId ;
        $_oRecord->settingExtraFieldSettingValue_defaultStatusId            = $this->iSettingExtraFieldSettingValueDefaultStatusId ;

        $_oRecord->settingExtraFieldSettingValueTranslatable_localeId      = $this->iSettingExtraFieldSettingValueTranslatableLocaleId ;
        $_oRecord->settingExtraFieldSettingValueTranslatable_parentId      = $this->iSettingExtraFieldSettingValueTranslatableParentId ;
        $_oRecord->settingExtraFieldSettingValueTranslatable_label         = $this->zSettingExtraFieldSettingValueTranslatableLabel ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iSettingExtraFieldSettingValueTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oSettingExtraFieldSettingValue = new CSettingExtraFieldSettingValue () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        LEFT JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValue_id = " . $_iId . " 
                        AND settingExtraFieldSettingValueTranslatable_localeId = 
                        IF ((SELECT settingExtraFieldSettingValue_id FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        LEFT JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValue_id = " . $_iId . " 
                        AND 
                        settingExtraFieldSettingValueTranslatable_localeId = " . $_iSettingExtraFieldSettingValueTranslatableLocaleId . ") > 0, 
                        " . $_iSettingExtraFieldSettingValueTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oSettingExtraFieldSettingValue->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraFieldSettingValue) ;
        }

        return $oSettingExtraFieldSettingValue ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iSettingExtraFieldSettingValueTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        // extra field setting
        $zQueryExtraFieldSetting = "" ;
        if (isset ($_oToFind->iSettingExtraFieldSettingValueSettingExtraFieldSettingId))
        {
            $zQueryExtraFieldSetting .= " AND settingExtraFieldSettingValue_settingExtraFieldSettingId = " . $_oToFind->iSettingExtraFieldSettingValueSettingExtraFieldSettingId ;
        }

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValueTranslatable_localeId = 
                        IF ((SELECT COUNT(settingExtraFieldSettingValue_id) FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValueTranslatable_localeId = " . $_iSettingExtraFieldSettingValueTranslatableLocaleId . "" . $zQueryExtraFieldSetting . ") > 0, 
                        " . $_iSettingExtraFieldSettingValueTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // extra field setting
        $zQuery .= $zQueryExtraFieldSetting ;

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
            $oSettingExtraFieldSettingValue = new CSettingExtraFieldSettingValue () ;
            $oSettingExtraFieldSettingValue->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oSettingExtraFieldSettingValue) ;
            $toRes [] = $oSettingExtraFieldSettingValue ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoSettingExtraFieldSettingValue = jDao::get ('common~settingextrafieldsettingvalue') ;

        $oRecSettingExtraFieldSettingValue       = null ;
        $oExistSettingExtraFieldSettingValue     = null ;

        $oRecSettingExtraFieldSettingValue = jDao::createRecord ('common~settingextrafieldsettingvalue') ;

        if ($this->iSettingExtraFieldSettingValueId > 0)
        {
            $oExistRecSettingExtraFieldSettingValue = $oDaoSettingExtraFieldSettingValue->get ($this->iSettingExtraFieldSettingValueId) ;

            if (!empty ($oExistRecSettingExtraFieldSettingValue))
            {
                $oRecSettingExtraFieldSettingValue = $oExistRecSettingExtraFieldSettingValue ;
            }
        }

        $this->fetchIntoRecord ($oRecSettingExtraFieldSettingValue) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraFieldSettingValue) ;

        if (empty ($oExistRecSettingExtraFieldSettingValue))
        {
            $oDaoSettingExtraFieldSettingValue->insert ($oRecSettingExtraFieldSettingValue) ;
            $this->iSettingExtraFieldSettingValueId = $oRecSettingExtraFieldSettingValue->settingExtraFieldSettingValue_id ;
        }
        else
        {
            $oDaoSettingExtraFieldSettingValue->update ($oRecSettingExtraFieldSettingValue) ;
        }

        // translatable
        $oDaoSettingExtraFieldSettingValueTranslatable = jDao::get ('common~settingextrafieldsettingvaluetranslatable') ;

        $oRecSettingExtraFieldSettingValueTranslatable         = null ;
        $oExistRecSettingExtraFieldSettingValueTranslatable    = null ;

        $oRecSettingExtraFieldSettingValueTranslatable = jDao::createRecord ('common~settingextrafieldsettingvaluetranslatable') ;

        $oExistRecSettingExtraFieldSettingValueTranslatable = $oDaoSettingExtraFieldSettingValueTranslatable->get (array ($this->iSettingExtraFieldSettingValueTranslatableLocaleId, $this->iSettingExtraFieldSettingValueId)) ;

        if (!empty ($oExistRecSettingExtraFieldSettingValueTranslatable))
        {
            $oRecSettingExtraFieldSettingValueTranslatable = $oExistRecSettingExtraFieldSettingValueTranslatable ;
        }

        $this->fetchIntoRecord ($oRecSettingExtraFieldSettingValueTranslatable) ;

        $oRecSettingExtraFieldSettingValueTranslatable->settingExtraFieldSettingValueTranslatable_parentId = $this->iSettingExtraFieldSettingValueId ;
        $oRecSettingExtraFieldSettingValueTranslatable->settingExtraFieldSettingValueTranslatable_localeId = $this->iSettingExtraFieldSettingValueTranslatableLocaleId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecSettingExtraFieldSettingValueTranslatable) ;

        if (empty ($oExistRecSettingExtraFieldSettingValueTranslatable))
        {
            $oDaoSettingExtraFieldSettingValueTranslatable->insert ($oRecSettingExtraFieldSettingValueTranslatable) ;
        }
        else
        {
            $oDaoSettingExtraFieldSettingValueTranslatable->update ($oRecSettingExtraFieldSettingValueTranslatable) ;
        }
    }
}
?>