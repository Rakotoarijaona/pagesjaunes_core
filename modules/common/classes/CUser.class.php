<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CUserExtraFieldSetting") ;
jClasses::inc ("common~CMedia") ;

class CUser
{
    var $iUserId ;
    var $iUserAdminId ;
    var $iUserAdminTypeId ;
    var $iUserModeratorId ;
    var $iUserModeratorTypeId ;
    var $zUserLogin ;
    var $zUserPassword ;
    var $zUserClearPassword ;
    var $iUserTypeId ;
    var $zUserDateLastLogin ;
    var $zUserDatePublication ;
    var $zUserDateActivation ;
    var $zUserDateCreation ;
    var $zUserDateRemoval ;
    var $iUserAlreadyMemberStatusId ;
    var $iUserActivationStatusId ;
    var $iUserPublicationStatusId ;
    var $iUserRemoveStatusId ;

    public function __construct ()
    {
        $this->iUserId                      = 0 ;
        $this->iUserAdminId                 = NULL ;
        $this->iUserAdminTypeId             = NULL ;
        $this->iUserModeratorId             = NULL ;
        $this->iUserModeratorTypeId         = NULL ;
        $this->zUserLogin                   = null ;
        $this->zUserPassword                = null ;
        $this->zUserClearPassword           = null ;
        $this->iUserTypeId                  = null ;
        $this->zUserDateLastLogin           = null ;
        $this->zUserDatePublication         = null ;
        $this->zUserDateActivation          = null ;
        $this->zUserDateCreation            = null ;
        $this->zUserDateRemoval             = null ;
        $this->iUserAlreadyMemberStatusId   = NO ;
        $this->iUserActivationStatusId      = YES ;
        $this->iUserPublicationStatusId     = YES ;
        $this->iUserRemoveStatusId          = NO ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iUserTypeId = null, $_iLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oResult = new CUser () ;

        try
        {
            if (!empty ($_iId))
            {
                $zQuery = "CALL SP_GET_USER(" . $_iId . "," . $_iUserTypeId . "," . $_iLocaleId . ")" ;
                $oRes = $oCnx->querySP ($zQuery) ;

                if (!empty ($oRes))
                {
                    while ($oUser = $oRes->fetch ())
                    {
                        // admin
                        if (!empty ($oUser->iUserAdminId) && !empty ($oUser->iUserAdminTypeId))
                        {
                            $oUser->oAdmin = self::selfGetById ($oUser->iUserAdminId, $oUser->iUserAdminTypeId) ;
                            unset ($oUser->oAdmin->zUserLogin) ;
                            unset ($oUser->oAdmin->zUserPassword) ;
                            unset ($oUser->oAdmin->zUserClearPassword) ;
                        }
                        // admin

                        // moderator
                        if (!empty ($oUser->iUserModeratorId) && !empty ($oUser->iUserModeratorTypeId))
                        {
                            $oUser->oModerator = CUser::selfGetById ($oUser->iUserModeratorId, $oUser->iUserModeratorTypeId) ;
                            unset ($oUser->oModerator->zUserLogin) ;
                            unset ($oUser->oModerator->zUserPassword) ;
                            unset ($oUser->oModerator->zUserClearPassword) ;
                        }
                        // moderator

                        foreach (get_object_vars ($oUser) as $oIndex => $oVar)
                        {
                            $oResult->$oIndex = $oVar ;
                        }

                        CCommonTools::encodeDaoRecUtf8 ($oResult) ;
                    }
                }
            }
        }
        catch (Exception $oExc)
        {
            print_r ($oExc->getMessage ()) ;
        }

        return $oResult ;
    }

    // find by id self
    public static function selfGetById ($_iId = 0, $_iUserTypeId = null, $_iLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oResult = new CUser () ;

        try
        {
            if (!empty ($_iId))
            {
                $zQuery = "CALL SP_GET_USER(" . $_iId . "," . $_iUserTypeId . "," . $_iLocaleId . ")" ;
                $oRes = $oCnx->querySP ($zQuery) ;

                if (!empty ($oRes))
                {
                    while ($oUser = $oRes->fetch ())
                    {
                        foreach (get_object_vars ($oUser) as $oIndex => $oVar)
                        {
                            $oResult->$oIndex = $oVar ;
                        }

                        CCommonTools::encodeDaoRecUtf8 ($oResult) ;
                    }
                }
            }
        }
        catch (Exception $oExc)
        {
            print_r ($oExc->getMessage ()) ;
        }

        return $oResult ;
    }

    // list
    public static function getList ($_RecToFind = null, $_iUserTypeId = null, $_iCurrentPage = 1, $_zSortField = "", $_zSortSens = "", $_iLocaleId = LANG_DEFAULT_ID, &$_iNbRecs = 0)
    {
        $oCnx = jDb::getConnection () ;

        $toResults = array () ;

        // user status
        $iUserActivationStatusId    = (isset ($_RecToFind->iUserActivationStatusId)) ? $_RecToFind->iUserActivationStatusId : 0 ;
        $iUserPublicationStatusId   = (isset ($_RecToFind->iUserPublicationStatusId)) ? $_RecToFind->iUserPublicationStatusId : 0 ;
        $iUserRemoveStatusId        = (isset ($_RecToFind->iUserRemoveStatusId)) ? $_RecToFind->iUserRemoveStatusId : 0 ;

        // user setting id
        $tiUserExtraFieldSettingId = array () ;

        // field
        $tzSlug = array 
        (
            "iUserId",
            "iUserAdminId",
            "iUserAdminTypeId",
            "iUserModeratorId",
            "iUserModeratorTypeId",
            "zUserLogin",
            "zUserPassword",
            "zUserClearPassword",
            "iUserTypeId",
            "zUserDateLastLogin",
            "zUserDatePublication",
            "zUserDateActivation",
            "zUserDateCreation",
            "zUserDateRemoval",
            "iUserAlreadyMemberStatusId",
            "iUserActivationStatusId",
            "iUserPublicationStatusId",
            "iUserRemoveStatusId"
        ) ;

        // extra field selectable
        $tzExtraFieldSelectableSlug = array () ;

        // extra field media
        $tzExtraFieldMediaSlug = array () ;

        $oUserExtraFieldSettingToFind = new stdClass () ;
        $oUserExtraFieldSettingToFind->iUserExtraFieldSettingUserTypeId = $_iUserTypeId ;
        $oUserExtraFieldSettingToFind->iUserExtraFieldSettingActivationStatusId = YES ;
        $toUserExtraFieldSetting = CUserExtraFieldSetting::getList ($oUserExtraFieldSettingToFind) ;

        $tzStringSearchableField = array () ;
        $tzSelectableSearchField = array () ;

        foreach ($toUserExtraFieldSetting as $oUserExtraFieldSetting)
        {
            $tzSlug [] = $oUserExtraFieldSetting->zUserExtraFieldSettingSlug ;

            if ($oUserExtraFieldSetting->iUserExtraFieldSettingSearchableStatusId == YES)
            {
                if (($oUserExtraFieldSetting->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID) || ($oUserExtraFieldSetting->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID))
                {
                    $tzStringSearchableField [] = $oUserExtraFieldSetting->zUserExtraFieldSettingSlug ;
                }

                if (($oUserExtraFieldSetting->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID) || ($oUserExtraFieldSetting->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID) || ($oUserExtraFieldSetting->iUserExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID))
                {
                    $tzSelectableSearchField [] = $oUserExtraFieldSetting->zUserExtraFieldSettingSlug ;
                }
            }
        }

        // search
        $zSearchQuery = NULL ;
        $tzSearchQuery = array () ;
        $tzConditions = array () ;

        if (!empty($_RecToFind->zToSearch))
        {
            foreach ($tzStringSearchableField as $zStringSearchableField)
            {
                $tzConditions [] = $zStringSearchableField . " LIKE '%" . $_RecToFind->zToSearch . "%'" ;
            }
            $tzSearchQuery [] = "(" . implode (" OR ",  $tzConditions) . ")" ;
        }

        // find in set query
        $tzConditions = array () ;
        $tzFindInSetConditions = array () ;

        foreach ($tzSelectableSearchField as $zSelectableSearchField)
        {
            if (isset ($_RecToFind->$zSelectableSearchField))
            {
                if (!empty ($_RecToFind->$zSelectableSearchField))
                {
                    $tzFindInSetItemConditions  = array () ;

                    $tiSelectableSearchField = explode (",", $_RecToFind->$zSelectableSearchField) ;

                    foreach ($tiSelectableSearchField as $iSelectableSearchField)
                    {
                        $tzFindInSetItemConditions [] = "(FIND_IN_SET(" . $iSelectableSearchField . "," . $zSelectableSearchField . ")>0)" ;
                    }

                    if (!empty ($tzFindInSetItemConditions))
                    {
                       $tzFindInSetConditions [] = "(" . implode (" OR ",  $tzFindInSetItemConditions) . ")" ;
                    }
                }
            }
        }

        if (!empty ($tzFindInSetConditions))
        {
           $tzConditions [] = "(" . implode (" AND ",  $tzFindInSetConditions) . ")" ;
        }
        // find in set query

        if (!empty ($tzConditions))
        {
           $tzSearchQuery [] = "(" . implode (" AND ",  $tzConditions) . ")" ;
        }

        // type in
        if (isset ($_RecToFind->zUserTypeIdIn))
        {
            $tzSearchQuery [] = "iUserTypeId IN(" . $_RecToFind->zUserTypeIdIn . ")" ;
        }

        if (isset ($_RecToFind->zUserTypeIdNotIn))
        {
            $tzSearchQuery [] = "iUserTypeId NOT IN(" . $_RecToFind->zUserTypeIdNotIn . ")" ;
        }
        // user type

        // login
        if (isset ($_RecToFind->isUserLoginNull) && ($_RecToFind->isUserLoginNull == YES))
        {
            $tzSearchQuery [] = "zUserLogin IS NULL" ;
        }
        // login

        // password
        if (isset ($_RecToFind->isUserPasswordNull) && ($_RecToFind->isUserPasswordNull == YES))
        {
            $tzSearchQuery [] = "zUserPassword IS NULL" ;
        }
        // password

        // already a member
        if (isset ($_RecToFind->iUserAlreadyMemberStatusId))
        {
            $tzSearchQuery [] = "iUserAlreadyMemberStatusId = " . $_RecToFind->iUserAlreadyMemberStatusId ;
        }
        // already a member

        $zSearchQuery = implode (" AND ", $tzSearchQuery) ;

        try
        {
            if (!empty ($zSearchQuery))
            {
                $zQuery = 'CALL SP_LIST_USER(
                ' . $_iUserTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . NB_DATA_PER_PAGE_BO . ',
                ' . $_iLocaleId . ',
                "' . $zSearchQuery . '",
                ' . $iUserActivationStatusId . ',
                ' . $iUserPublicationStatusId . ',
                ' . $iUserRemoveStatusId . ',
                @iNbRec)' ;
            }
            else
            {
                $zQuery = 'CALL SP_LIST_USER(
                ' . $_iUserTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . NB_DATA_PER_PAGE_BO . ',
                ' . $_iLocaleId . ',
                NULL,
                ' . $iUserActivationStatusId . ',
                ' . $iUserPublicationStatusId . ',
                ' . $iUserRemoveStatusId . ',
                @iNbRec)' ;
            }

            $oRes = $oCnx->querySP ($zQuery) ;

            if (!empty ($oRes))
            {
                while ($oUser = $oRes->fetch ())
                {
                    // admin
                    if (!empty ($oUser->iUserAdminId) && !empty ($oUser->iUserAdminTypeId))
                    {
                        $oUser->oAdmin = CUser::selfGetById ($oUser->iUserAdminId, $oUser->iUserAdminTypeId) ;
                        unset ($oUser->oAdmin->zUserLogin) ;
                        unset ($oUser->oAdmin->zUserPassword) ;
                        unset ($oUser->oAdmin->zUserClearPassword) ;
                    }
                    // admin

                    // moderator
                    if (!empty ($oUser->iUserModeratorId) && !empty ($oUser->iUserModeratorTypeId))
                    {
                        $oUser->oModerator = CUser::selfGetById ($oUser->iUserModeratorId, $oUser->iUserModeratorTypeId) ;
                        unset ($oUser->oModerator->zUserLogin) ;
                        unset ($oUser->oModerator->zUserPassword) ;
                        unset ($oUser->oModerator->zUserClearPassword) ;
                    }
                    // moderator

                    CCommonTools::encodeDaoRecUtf8 ($oUser) ;

                    $toResults [] = $oUser ;
                }
            }

            // records number
            $oResNbRec = $oCnx->query ("SELECT @iNbRec AS iNbRec") ;
            $oRecNbRec = $oResNbRec->fetch () ;
            $_iNbRecs = $oRecNbRec->iNbRec ;
        }
        catch (Exception $oExc)
        {
            print_r ($oExc->getMessage ()) ;
        }

        return $toResults ;
    }

    // list selectable
    public static function getSelectableList ($_RecToFind = null, $_iUserTypeId = "NULL", $_iCurrentPage = 1, $_zSortField = "iUserPublicationStatusId", $_zSortSens = "DESC", $_iLocaleId = LANG_DEFAULT_ID, &$_iNbRecs = 0, $_iDataPerPage = NB_DATA_PER_PAGE_BO)
    {
        $oCnx = jDb::getConnection () ;

        $toResults = array () ;

        // user status
        $iUserActivationStatusId    = (isset ($_RecToFind->iUserActivationStatusId)) ? $_RecToFind->iUserActivationStatusId : 0 ;
        $iUserPublicationStatusId   = (isset ($_RecToFind->iUserPublicationStatusId)) ? $_RecToFind->iUserPublicationStatusId : 0 ;
        $iUserRemoveStatusId        = (isset ($_RecToFind->iUserRemoveStatusId)) ? $_RecToFind->iUserRemoveStatusId : 0 ;

        // search
        $zSearchQuery = NULL ;
        $tzSearchQuery = array () ;

        // id in
        if (isset ($_RecToFind->zUserIdIn))
        {
            $tzSearchQuery [] = "iUserId IN(" . $_RecToFind->zUserIdIn . ")" ;
        }

        // id not in
        if (isset ($_RecToFind->zUserIdNotIn))
        {
            $tzSearchQuery [] = "iUserId NOT IN(" . $_RecToFind->zUserIdNotIn . ")" ;
        }

        $zSearchQuery = implode (" AND ", $tzSearchQuery) ;

        try
        {
            if (!empty ($zSearchQuery))
            {
                $zQuery = 'CALL SP_LIST_USER(
                ' . $_iUserTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                "' . $zSearchQuery . '",
                ' . $iUserActivationStatusId . ',
                ' . $iUserPublicationStatusId . ',
                ' . $iUserRemoveStatusId . ',
                @iNbRec)' ;
            }
            else
            {
                $zQuery = 'CALL SP_LIST_USER(
                ' . $_iUserTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                NULL,
                ' . $iUserActivationStatusId . ',
                ' . $iUserPublicationStatusId . ',
                ' . $iUserRemoveStatusId . ',
                @iNbRec)' ;
            }

            $oRes = $oCnx->querySP ($zQuery) ;

            if (!empty ($oRes))
            {
                while ($oUser = $oRes->fetch ())
                {
                    CCommonTools::encodeDaoRecUtf8 ($oUser) ;
                    $toResults [] = $oUser ;
                }
            }

            // records number
            $oResNbRec = $oCnx->query ("SELECT @iNbRec AS iNbRec") ;
            $oRecNbRec = $oResNbRec->fetch () ;
            $_iNbRecs = $oRecNbRec->iNbRec ;
        }
        catch (Exception $oExc)
        {
            print_r ($oExc->getMessage ()) ;
        }

        return $toResults ;
    }

    // get user count
    public static function getCount ($_RecToFind = null, $_iUserTypeId = null, $_iLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $iNbRecords = 0 ;

        $toResults = array () ;

        // user status
        $iUserActivationStatusId    = (isset ($_RecToFind->iUserActivationStatusId)) ? $_RecToFind->iUserActivationStatusId : 0 ;
        $iUserPublicationStatusId   = (isset ($_RecToFind->iUserPublicationStatusId)) ? $_RecToFind->iUserPublicationStatusId : 0 ;
        $iUserRemoveStatusId        = (isset ($_RecToFind->iUserRemoveStatusId)) ? $_RecToFind->iUserRemoveStatusId : 0 ;

        $zQuery = 'CALL SP_COUNT_USER(' . $_iUserTypeId . ',' . $_iLocaleId . ',' . $iUserActivationStatusId . ',' . $iUserPublicationStatusId . ',' . $iUserRemoveStatusId . ',@iNbRec)' ;

        try
        {
            $oRes = $oCnx->querySP ($zQuery) ;

            // records number
            $oResNbRec = $oCnx->query ("SELECT @iNbRec AS iNbRec") ;
            $oRecNbRec = $oResNbRec->fetch () ;
            $iNbRecords = $oRecNbRec->iNbRec ;
        }
        catch (Exception $oExc)
        {
            print_r ($oExc->getMessage ()) ;
        }

        return $iNbRecords ;
    }

    // sauvegarde
    public function save ()
    {
        $oDaoUser = jDao::get ("common~user") ;

        $oUser = jDao::createRecord ('common~user') ;

        if (!empty ($this->zUserClearPassword))
        {
            $oUser = jAuth::createUserObject ($this->zUserLogin, $this->zUserClearPassword) ;
        }

        $oUser->typeId                      = $this->iUserTypeId ;
        $oUser->dateLastLogin               = $this->zUserDateLastLogin ;

        $oUser->dateActivation              = ($this->iUserId > 0) ? $this->zUserDateActivation : date ("Y-m-d H:i:s") ;
        $oUser->dateCreation                = ($this->iUserId > 0) ? $this->zUserDateCreation : date ("Y-m-d H:i:s") ;
        $oUser->dateRemoval                 = $this->zUserDateRemoval ;

        $oUser->alreadyMemberStatusId       = $this->iUserAlreadyMemberStatusId ;
        $oUser->activationStatusId          = $this->iUserActivationStatusId ;
        $oUser->publicationStatusId         = $this->iUserPublicationStatusId ;
        $oUser->removeStatusId              = $this->iUserRemoveStatusId ;

        $oUser->login                       = $this->zUserLogin ;
        $oUser->clearPassword               = $this->zUserClearPassword ;
        $oUser->password                    = $oUser->password ;

        if ($this->iUserId > 0)
        {
            $oUser->id = $this->iUserId ;
            $oDaoUser->update ($oUser) ;

            $oConnectedUser = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;

            if ($this->iUserId == $oConnectedUser->id)
            {
                $oNewUser                       = jAuth::createUserObject ($this->zUserLogin, $this->zUserClearPassword) ;

                jAuth::changePassword ($oConnectedUser->login, $this->zUserClearPassword) ;

                $oConnectedUser->password       = $oNewUser->password ;
                $oConnectedUser->login          = $this->zUserLogin ;
                $oConnectedUser->clearPassword  = $this->zUserClearPassword ;

                jAuth::updateUser ($oConnectedUser) ;
            }
        }
        else
        {
            $oDaoUser->insert ($oUser) ;
            $this->iUserId = $oUser->id ;
        }
    }
}
?>