<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CUserExtraField
{
    var $iUserExtraFieldUserId ;
    var $iUserExtraFieldUserExtraFieldSettingId ;
    var $iUserExtraFieldLocaleId ;
    var $iUserExtraFieldUserTypeId ;

    var $zUserExtraFieldSlug ;
    var $iUserExtraFieldTypeId ;
    var $zUserExtraFieldFieldName ;

    var $iIntegerValue ;
    var $iSmallintValue ;
    var $iDecimalValue ;
    var $iRealValue ;
    var $zDateValue ;
    var $zDatetimeValue ;
    var $zTimeValue ;
    var $zVarcharValue ;
    var $zTextValue ;

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iUserExtraFieldUserId                        = $_oRecord->userExtraField_userId ;
        $this->iUserExtraFieldUserExtraFieldSettingId       = $_oRecord->userExtraField_userExtraFieldSettingId ;
        $this->iUserExtraFieldLocaleId                      = $_oRecord->userExtraField_localeId ;
        $this->iUserExtraFieldUserTypeId                    = $_oRecord->userExtraField_userTypeId ;

        $this->zUserExtraFieldSlug                          = $_oRecord->userExtraField_slug ;
        $this->iUserExtraFieldTypeId                        = $_oRecord->userExtraField_typeId ;
        $this->zUserExtraFieldFieldName                     = $_oRecord->userExtraField_fieldName ;

        $this->iIntegerValue                                = $_oRecord->integer_value ;
        $this->iSmallintValue                               = $_oRecord->smallint_value ;
        $this->iDecimalValue                                = $_oRecord->decimal_value ;
        $this->iRealValue                                   = $_oRecord->real_value ;
        $this->zDateValue                                   = (!empty ($_oRecord->date_value)) ? CCommonTools::dateSql2Locale ($_oRecord->date_value) : $_oRecord->date_value ;
        $this->zDatetimeValue                               = (!empty ($_oRecord->datetime_value)) ? CCommonTools::dateTimeSql2Locale ($_oRecord->datetime_value, "Y-m-d H:i") : $_oRecord->datetime_value ;
        $this->zTimeValue                                   = (!empty ($_oRecord->time_value)) ? date ("H:i", strtotime ($_oRecord->time_value)) : $_oRecord->time_value ;
        $this->zVarcharValue                                = $_oRecord->varchar_value ;
        $this->zTextValue                                   = $_oRecord->text_value ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->userExtraField_userId                    = $this->iUserExtraFieldUserId ;
        $_oRecord->userExtraField_userExtraFieldSettingId   = $this->iUserExtraFieldUserExtraFieldSettingId ;
        $_oRecord->userExtraField_localeId                  = $this->iUserExtraFieldLocaleId ;
        $_oRecord->userExtraField_userTypeId                = $this->iUserExtraFieldUserTypeId ;

        $_oRecord->userExtraField_slug                      = $this->zUserExtraFieldSlug ;
        $_oRecord->userExtraField_typeId                    = $this->iUserExtraFieldTypeId ;
        $_oRecord->userExtraField_fieldName                 = $this->zUserExtraFieldFieldName ;

        $_oRecord->integer_value                            = $this->iIntegerValue ;
        $_oRecord->smallint_value                           = $this->iSmallintValue ;
        $_oRecord->decimal_value                            = $this->iDecimalValue ;
        $_oRecord->real_value                               = $this->iRealValue ;
        $_oRecord->date_value                               = $this->zDateValue ;
        $_oRecord->datetime_value                           = $this->zDatetimeValue ;
        $_oRecord->time_value                               = $this->zTimeValue ;
        $_oRecord->varchar_value                            = $this->zVarcharValue ;
        $_oRecord->text_value                               = $this->zTextValue ;
    }

    // get list
    public static function getList ($_oToFind = null, $_iUserExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("userExtraField") . " 
                        WHERE userExtraField_localeId = " . $_iUserExtraFieldLocaleId ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iUserExtraFieldUserTypeId) && !empty ($_oToFind->iUserExtraFieldUserTypeId))
        {
            $toConditions [] = "userExtraField_userTypeId = " . $_oToFind->iUserExtraFieldUserTypeId ;
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
            $oUserExtraField = new CUserExtraField () ;
            $oUserExtraField->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserExtraField) ;
            $toRes [] = $oUserExtraField ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoUserExtraField = jDao::get ('common~userextrafield') ;

        $oRecUserExtraField       = null ;
        $oExistUserExtraField     = null ;

        $oRecUserExtraField = jDao::createRecord ('common~userextrafield') ;

        if ($this->iUserExtraFieldUserId > 0)
        {
            $oExistRecUserExtraField = $oDaoUserExtraField->get ($this->iUserExtraFieldUserId, $this->iUserExtraFieldUserExtraFieldSettingId, $this->iUserExtraFieldLocaleId) ;

            if (!empty ($oExistRecUserExtraField))
            {
                $oRecUserExtraField = $oExistRecUserExtraField ;
            }
        }

        $this->fetchIntoRecord ($oRecUserExtraField) ;

        if (empty ($oExistRecUserExtraField))
        {
            $oDaoUserExtraField->insert ($oRecUserExtraField) ;
            $this->iUserExtraFieldUserId = $oRecUserExtraField->userExtraField_userId ;
        }
        else
        {
            $oDaoUserExtraField->update ($oRecUserExtraField) ;
        }
    }
}
?>