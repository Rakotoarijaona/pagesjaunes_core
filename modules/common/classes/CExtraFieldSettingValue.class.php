<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CExtraFieldSettingValue
{
    var $iExtraFieldSettingValueId ;
    var $iExtraFieldSettingValueSettingExtraFieldSettingId ;
    var $iExtraFieldSettingValueDefaultStatusId ;

    var $iExtraFieldSettingValueTranslatableLocaleId ;
    var $iExtraFieldSettingValueTranslatableParentId ;
    var $zExtraFieldSettingValueTranslatableLabel ;

    public function __construct ()
    {
        $this->iExtraFieldSettingValueId                         = 0 ;
        $this->iExtraFieldSettingValueSettingExtraFieldSettingId = 0 ;
        $this->iExtraFieldSettingValueDefaultStatusId            = NO ;

        $this->iExtraFieldSettingValueTranslatableLocaleId       = 0 ;
        $this->iExtraFieldSettingValueTranslatableParentId       = 0 ;
        $this->zExtraFieldSettingValueTranslatableLabel          = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iExtraFieldSettingValueId                         = $_oRecord->settingExtraFieldSettingValue_id ;
        $this->iExtraFieldSettingValueSettingExtraFieldSettingId = $_oRecord->settingExtraFieldSettingValue_settingExtraFieldSettingId ;
        $this->iExtraFieldSettingValueDefaultStatusId            = $_oRecord->settingExtraFieldSettingValue_defaultStatusId ;

        $this->iExtraFieldSettingValueTranslatableLocaleId       = $_oRecord->settingExtraFieldSettingValueTranslatable_localeId ;
        $this->iExtraFieldSettingValueTranslatableParentId       = $_oRecord->settingExtraFieldSettingValueTranslatable_parentId ;
        $this->zExtraFieldSettingValueTranslatableLabel          = $_oRecord->settingExtraFieldSettingValueTranslatable_label ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->settingExtraFieldSettingValue_id                         = $this->iExtraFieldSettingValueId ;
        $_oRecord->settingExtraFieldSettingValue_settingExtraFieldSettingId = $this->iExtraFieldSettingValueSettingExtraFieldSettingId ;
        $_oRecord->settingExtraFieldSettingValue_defaultStatusId            = $this->iExtraFieldSettingValueDefaultStatusId ;

        $_oRecord->settingExtraFieldSettingValueTranslatable_localeId      = $this->iExtraFieldSettingValueTranslatableLocaleId ;
        $_oRecord->settingExtraFieldSettingValueTranslatable_parentId      = $this->iExtraFieldSettingValueTranslatableParentId ;
        $_oRecord->settingExtraFieldSettingValueTranslatable_label         = $this->zExtraFieldSettingValueTranslatableLabel ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iExtraFieldSettingValueTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oExtraFieldSettingValue = new CExtraFieldSettingValue () ;

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
                        settingExtraFieldSettingValueTranslatable_localeId = " . $_iExtraFieldSettingValueTranslatableLocaleId . ") > 0, 
                        " . $_iExtraFieldSettingValueTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oExtraFieldSettingValue->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oExtraFieldSettingValue) ;
        }

        return $oExtraFieldSettingValue ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iExtraFieldSettingValueTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        // extra field setting
        $zQueryExtraFieldSetting = "" ;
        if (isset ($_oToFind->iExtraFieldSettingValueSettingExtraFieldSettingId))
        {
            $zQueryExtraFieldSetting .= " AND settingExtraFieldSettingValue_settingExtraFieldSettingId = " . $_oToFind->iExtraFieldSettingValueSettingExtraFieldSettingId ;
        }

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValueTranslatable_localeId = 
                        IF ((SELECT COUNT(settingExtraFieldSettingValue_id) FROM " . $oCnx->prefixTable ("settingExtraFieldSettingValue") . " 
                        INNER JOIN " . $oCnx->prefixTable ("settingExtraFieldSettingValueTranslatable") . " 
                        ON settingExtraFieldSettingValue_id = settingExtraFieldSettingValueTranslatable_parentId 
                        WHERE settingExtraFieldSettingValueTranslatable_localeId = " . $_iExtraFieldSettingValueTranslatableLocaleId . "" . $zQueryExtraFieldSetting . ") > 0, 
                        " . $_iExtraFieldSettingValueTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
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
            $oExtraFieldSettingValue = new CExtraFieldSettingValue () ;
            $oExtraFieldSettingValue->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oExtraFieldSettingValue) ;
            $toRes [] = $oExtraFieldSettingValue ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoExtraFieldSettingValue = jDao::get ('common~settingextrafieldsettingvalue') ;

        $oRecExtraFieldSettingValue       = null ;
        $oExistExtraFieldSettingValue     = null ;

        $oRecExtraFieldSettingValue = jDao::createRecord ('common~settingextrafieldsettingvalue') ;

        if ($this->iExtraFieldSettingValueId > 0)
        {
            $oExistRecExtraFieldSettingValue = $oDaoExtraFieldSettingValue->get ($this->iExtraFieldSettingValueId) ;

            if (!empty ($oExistRecExtraFieldSettingValue))
            {
                $oRecExtraFieldSettingValue = $oExistRecExtraFieldSettingValue ;
            }
        }

        $this->fetchIntoRecord ($oRecExtraFieldSettingValue) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecExtraFieldSettingValue) ;

        if (empty ($oExistRecExtraFieldSettingValue))
        {
            $oDaoExtraFieldSettingValue->insert ($oRecExtraFieldSettingValue) ;
            $this->iExtraFieldSettingValueId = $oRecExtraFieldSettingValue->settingExtraFieldSettingValue_id ;
        }
        else
        {
            $oDaoExtraFieldSettingValue->update ($oRecExtraFieldSettingValue) ;
        }

        // translatable
        $oDaoExtraFieldSettingValueTranslatable = jDao::get ('common~settingextrafieldsettingvaluetranslatable') ;

        $oRecExtraFieldSettingValueTranslatable         = null ;
        $oExistRecExtraFieldSettingValueTranslatable    = null ;

        $oRecExtraFieldSettingValueTranslatable = jDao::createRecord ('common~settingextrafieldsettingvaluetranslatable') ;

        $oExistRecExtraFieldSettingValueTranslatable = $oDaoExtraFieldSettingValueTranslatable->get (array ($this->iExtraFieldSettingValueTranslatableLocaleId, $this->iExtraFieldSettingValueId)) ;

        if (!empty ($oExistRecExtraFieldSettingValueTranslatable))
        {
            $oRecExtraFieldSettingValueTranslatable = $oExistRecExtraFieldSettingValueTranslatable ;
        }

        $this->fetchIntoRecord ($oRecExtraFieldSettingValueTranslatable) ;

        $oRecExtraFieldSettingValueTranslatable->settingExtraFieldSettingValueTranslatable_parentId = $this->iExtraFieldSettingValueId ;
        $oRecExtraFieldSettingValueTranslatable->settingExtraFieldSettingValueTranslatable_localeId = $this->iExtraFieldSettingValueTranslatableLocaleId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecExtraFieldSettingValueTranslatable) ;

        if (empty ($oExistRecExtraFieldSettingValueTranslatable))
        {
            $oDaoExtraFieldSettingValueTranslatable->insert ($oRecExtraFieldSettingValueTranslatable) ;
        }
        else
        {
            $oDaoExtraFieldSettingValueTranslatable->update ($oRecExtraFieldSettingValueTranslatable) ;
        }
    }
}
?>