<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CUserType
{
    var $iUserTypeId ;
    var $iUserTypeDisplayInLeft ;
    var $zUserTypeIcon ;
    var $iUserTypeActivationStatusId ;
    var $iUserTypePublicationStatusId ;
    var $iUserTypeRemoveStatusId ;

    var $iUserTypeTranslatableLocaleId ;
    var $iUserTypeTranslatableParentId ;
    var $zUserTypeTranslatableLabel ;
    var $zUserTypeTranslatableDescription ;

    public function __construct ()
    {
        $this->iUserTypeId                          = null ;
        $this->iUserTypeDisplayInLeft               = NO ;
        $this->zUserTypeIcon                        = "" ;
        $this->iUserTypeActivationStatusId          = YES ;
        $this->iUserTypePublicationStatusId         = YES ;
        $this->iUserTypeRemoveStatusId              = NO ;

        $this->iUserTypeTranslatableLocaleId        = 0 ;
        $this->iUserTypeTranslatableParentId        = 0 ;
        $this->zUserTypeTranslatableLabel           = "" ;
        $this->zUserTypeTranslatableDescription     = "" ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iUserTypeId                          = $_oRecord->userType_id ;
        $this->iUserTypeDisplayInLeft               = $_oRecord->userType_displayInLeft ;
        $this->zUserTypeIcon                        = $_oRecord->userType_icon ;
        $this->iUserTypeActivationStatusId          = $_oRecord->userType_activationStatusId ;
        $this->iUserTypePublicationStatusId         = $_oRecord->userType_publicationStatusId ;
        $this->iUserTypeRemoveStatusId              = $_oRecord->userType_removeStatusId ;

        $this->iUserTypeTranslatableLocaleId        = $_oRecord->userTypeTranslatable_localeId ;
        $this->iUserTypeTranslatableParentId        = $_oRecord->userTypeTranslatable_parentId ;
        $this->zUserTypeTranslatableLabel           = $_oRecord->userTypeTranslatable_label ;
        $this->zUserTypeTranslatableDescription     = $_oRecord->userTypeTranslatable_description ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->userType_id                          = $this->iUserTypeId ;
        $_oRecord->userType_displayInLeft               = $this->iUserTypeDisplayInLeft ;
        $_oRecord->userType_icon                        = $this->zUserTypeIcon ;
        $_oRecord->userType_activationStatusId          = $this->iUserTypeActivationStatusId ;
        $_oRecord->userType_publicationStatusId         = $this->iUserTypePublicationStatusId ;
        $_oRecord->userType_removeStatusId              = $this->iUserTypeRemoveStatusId ;

        $_oRecord->userTypeTranslatable_localeId        = $this->iUserTypeTranslatableLocaleId ;
        $_oRecord->userTypeTranslatable_parentId        = $this->iUserTypeTranslatableParentId ;
        $_oRecord->userTypeTranslatable_label           = $this->zUserTypeTranslatableLabel ;
        $_oRecord->userTypeTranslatable_description     = $this->zUserTypeTranslatableDescription ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iUserTypeTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oUserType = new CUserType () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userTypeTranslatable") . " 
                        ON userType_id = userTypeTranslatable_parentId 
                        WHERE userType_id = " . $_iId . " 
                        AND userTypeTranslatable_localeId = 
                        IF ((SELECT userType_id FROM " . $oCnx->prefixTable ("userType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userTypeTranslatable") . " 
                        ON userType_id = userTypeTranslatable_parentId 
                        WHERE userType_id = " . $_iId . " 
                        AND 
                        userTypeTranslatable_localeId = " . $_iUserTypeTranslatableLocaleId . ") > 0, 
                        " . $_iUserTypeTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oUserType->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserType) ;
        }

        return $oUserType ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iUserTypeTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("userType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userTypeTranslatable") . " 
                        ON userType_id = userTypeTranslatable_parentId 
                        WHERE userTypeTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("userType") . " 
                        INNER JOIN " . $oCnx->prefixTable ("userTypeTranslatable") . " 
                        ON userType_id = userTypeTranslatable_parentId 
                        WHERE userTypeTranslatable_localeId = " . $_iUserTypeTranslatableLocaleId . ") > 0, " . $_iUserTypeTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->zUserTypeIdNotIn) && !empty ($_oToFind->zUserTypeIdNotIn))
        {
            $toConditions [] = "userType_id NOT IN(" . $_oToFind->zUserTypeIdNotIn . ")" ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        // order
        $zQuery .= "ORDER BY userType_range ASC" ;
        // order

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oUserType = new CUserType () ;
            $oUserType->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserType) ;
            $toRes [] = $oUserType ;
        }

        return $toRes ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoUserType = jDao::get ('common~usertype') ;

        $oRecUserType       = null ;
        $oExistUserType     = null ;

        $oRecUserType = jDao::createRecord ('common~usertype') ;

        if ($this->iUserTypeId > 0)
        {
            $oExistRecUserType = $oDaoUserType->get ($this->iUserTypeId) ;

            if (!empty ($oExistRecUserType))
            {
                $oRecUserType = $oExistRecUserType ;
            }
        }

        $this->fetchIntoRecord ($oRecUserType) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecUserType) ;

        if (empty ($oExistRecUserType))
        {
            $oDaoUserType->insert ($oRecUserType) ;
            $this->iUserTypeId = $oRecUserType->userType_id ;
        }
        else
        {
            $oDaoUserType->update ($oRecUserType) ;
        }

        // translatable
        $oDaoUserTypeTranslatable = jDao::get ('common~usertypetranslatable') ;

        $oRecUserTypeTranslatable         = null ;
        $oExistRecUserTypeTranslatable    = null ;

        $oRecUserTypeTranslatable = jDao::createRecord ('common~usertypetranslatable') ;

        $oExistRecUserTypeTranslatable = $oDaoUserTypeTranslatable->get (array ($this->iUserTypeTranslatableLocaleId, $this->iUserTypeId)) ;

        if (!empty ($oExistRecUserTypeTranslatable))
        {
            $oRecUserTypeTranslatable = $oExistRecUserType ;
        }

        $this->fetchIntoRecord ($oRecUserTypeTranslatable) ;

        $oRecUserTypeTranslatable->userTypeTranslatable_parentId = $this->iUserTypeId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecUserTypeTranslatable) ;

        if (empty ($oExistRecUserTypeTranslatable))
        {
            $oDaoUserTypeTranslatable->insert ($oRecUserTypeTranslatable) ;
        }
        else
        {
            $oDaoUserTypeTranslatable->update ($oRecUserTypeTranslatable) ;
        }
    }
}
?>