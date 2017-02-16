<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CContentExtraField
{
    var $iContentExtraFieldContentId ;
    var $iContentExtraFieldContentExtraFieldSettingId ;
    var $iContentExtraFieldLocaleId ;
    var $iContentExtraFieldContentTypeId ;

    var $zContentExtraFieldSlug ;
    var $iContentExtraFieldTypeId ;
    var $zContentExtraFieldFieldName ;

    var $iIntegerValue ;
    var $iSmallintValue ;
    var $iDecimalValue ;
    var $iRealValue ;
    var $zDateValue ;
    var $zDatetimeValue ;
    var $zTimeValue ;
    var $zVarcharValue ;
    var $zTextValue ;

    public function __construct ()
    {
        $this->iContentExtraFieldContentId                  = 0 ;
        $this->iContentExtraFieldContentExtraFieldSettingId = null ;
        $this->iContentExtraFieldLocaleId                   = null ;
        $this->iContentExtraFieldContentTypeId              = null ;

        $this->zContentExtraFieldSlug                       = null ;
        $this->iContentExtraFieldTypeId                     = null ;
        $this->zContentExtraFieldFieldName                  = null ;

        $this->iIntegerValue                                = null ;
        $this->iSmallintValue                               = null ;
        $this->iDecimalValue                                = null ;
        $this->iRealValue                                   = null ;
        $this->zDateValue                                   = null ;
        $this->zDatetimeValue                               = null ;
        $this->zTimeValue                                   = null ;
        $this->zVarcharValue                                = null ;
        $this->zContentTextValue                            = null ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iContentExtraFieldContentId                      = $_oRecord->contentExtraField_contentId ;
        $this->iContentExtraFieldContentExtraFieldSettingId     = $_oRecord->contentExtraField_contentExtraFieldSettingId ;
        $this->iContentExtraFieldLocaleId                       = $_oRecord->contentExtraField_localeId ;
        $this->iContentExtraFieldContentTypeId                  = $_oRecord->contentExtraField_contentTypeId ;

        $this->zContentExtraFieldSlug                           = $_oRecord->contentExtraField_slug ;
        $this->iContentExtraFieldTypeId                         = $_oRecord->contentExtraField_typeId ;
        $this->zContentExtraFieldFieldName                      = $_oRecord->contentExtraField_fieldName ;

        $this->iIntegerValue                                    = $_oRecord->integer_value ;
        $this->iSmallintValue                                   = $_oRecord->smallint_value ;
        $this->iDecimalValue                                    = $_oRecord->decimal_value ;
        $this->iRealValue                                       = $_oRecord->real_value ;
        $this->zDateValue                                       = (!empty ($_oRecord->date_value)) ? CCommonTools::dateSql2Locale ($_oRecord->date_value) : $_oRecord->date_value ;
        $this->zDatetimeValue                                   = (!empty ($_oRecord->datetime_value)) ? CCommonTools::dateTimeSql2Locale ($_oRecord->datetime_value, "Y-m-d H:i") : $_oRecord->datetime_value ;
        $this->zTimeValue                                       = (!empty ($_oRecord->time_value)) ? date ("H:i", strtotime ($_oRecord->time_value)) : $_oRecord->time_value ;
        $this->zVarcharValue                                    = $_oRecord->varchar_value ;
        $this->zTextValue                                       = $_oRecord->text_value ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->contentExtraField_contentId                      = $this->iContentExtraFieldContentId ;
        $_oRecord->contentExtraField_contentExtraFieldSettingId     = $this->iContentExtraFieldContentExtraFieldSettingId ;
        $_oRecord->contentExtraField_localeId                       = $this->iContentExtraFieldLocaleId ;
        $_oRecord->contentExtraField_contentTypeId                  = $this->iContentExtraFieldContentTypeId ;

        $_oRecord->contentExtraField_slug                           = $this->zContentExtraFieldSlug ;
        $_oRecord->contentExtraField_typeId                         = $this->iContentExtraFieldTypeId ;
        $_oRecord->contentExtraField_fieldName                      = $this->zContentExtraFieldFieldName ;

        $_oRecord->integer_value                                    = $this->iIntegerValue ;
        $_oRecord->smallint_value                                   = $this->iSmallintValue ;
        $_oRecord->decimal_value                                    = $this->iDecimalValue ;
        $_oRecord->real_value                                       = $this->iRealValue ;
        $_oRecord->date_value                                       = $this->zDateValue ;
        $_oRecord->datetime_value                                   = $this->zDatetimeValue ;
        $_oRecord->time_value                                       = $this->zTimeValue ;
        $_oRecord->varchar_value                                    = $this->zVarcharValue ;
        $_oRecord->text_value                                       = $this->zTextValue ;
    }

    // get list
    public static function getList ($_oToFind = null, $_iContentExtraFieldLocaleId = LANG_DEFAULT_ID)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("contentExtraField") . " 
                        WHERE contentExtraField_localeId = " . $_iContentExtraFieldLocaleId ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iContentExtraFieldContentTypeId) && !empty ($_oToFind->iContentExtraFieldContentTypeId))
        {
            $toConditions [] = "contentExtraField_contentTypeId = " . $_oToFind->iContentExtraFieldContentTypeId ;
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
            $oContentExtraField = new CContentExtraField () ;
            $oContentExtraField->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oContentExtraField) ;
            $toRes [] = $oContentExtraField ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoContentExtraField = jDao::get ('common~contentextrafield') ;

        $oRecContentExtraField       = null ;
        $oExistContentExtraField     = null ;

        $oRecContentExtraField = jDao::createRecord ('common~contentextrafield') ;

        if ($this->iContentExtraFieldContentId > 0)
        {
            $oExistRecContentExtraField = $oDaoContentExtraField->get ($this->iContentExtraFieldContentId, $this->iContentExtraFieldContentExtraFieldSettingId, $this->iContentExtraFieldLocaleId) ;

            if (!empty ($oExistRecContentExtraField))
            {
                $oRecContentExtraField = $oExistRecContentExtraField ;
            }
        }

        $this->fetchIntoRecord ($oRecContentExtraField) ;

        if (empty ($oExistRecContentExtraField))
        {
            $oDaoContentExtraField->insert ($oRecContentExtraField) ;
            $this->iContentExtraFieldContentId = $oRecContentExtraField->contentExtraField_contentId ;
        }
        else
        {
            $oDaoContentExtraField->update ($oRecContentExtraField) ;
        }
    }
}
?>