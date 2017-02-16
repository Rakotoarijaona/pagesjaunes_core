<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CUser") ;
jClasses::inc ("common~CUserType") ;
jClasses::inc ("common~CContentType") ;

class CUserPermission
{
    var $iUserTypeTableTableTypeId ;
    var $iUserTypeTableUserTypeId ;
    var $zUserTypeTableLabel ;

    var $ALLOWED_TYPE_ACCESS ;
    var $HAS_ACTION ;
    var $HIS_CONTENT_ONLY ;

    var $ALLOWED_CREATION_ACTION ;
    var $ALLOWED_EDITION_ACTION ;
    var $ALLOWED_TRADUCTION_ACTION ;
    var $ALLOWED_PUBLICATION_ACTION ;
    var $ALLOWED_ACTIVATION_ACTION ;
    var $ALLOWED_TRASHING_ACTION ;
    var $ALLOWED_RECOVER_ACTION ;
    var $ALLOWED_REMOVE_ACTION ;
    var $ALLOWED_MODIFICATION_ACTION ;
    var $ALLOWED_DOWNLOAD_ACTION ;

    public function __construct ()
    {
        // user
        $oConnectedUser = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;

        $this->iUserTypeTableTableTypeId        = 0 ;
        $this->iUserTypeTableUserTypeId         = 0 ;
        $this->zUserTypeTableLabel              = null ;

        $this->ALLOWED_TYPE_ACCESS              = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->HAS_ACTION                       = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->HIS_CONTENT_ONLY                 = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;

        $this->ALLOWED_CREATION_ACTION          = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_EDITION_ACTION           = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_TRADUCTION_ACTION        = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_PUBLICATION_ACTION       = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_ACTIVATION_ACTION        = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_TRASHING_ACTION          = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_RECOVER_ACTION           = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_REMOVE_ACTION            = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_MODIFICATION_ACTION      = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
        $this->ALLOWED_DOWNLOAD_ACTION          = ($oConnectedUser->typeId == USER_TYPE_SUPER_ADMIN_ID) ? YES : NO ;
    }

    // record into this
    public function fetchFromRecord ($_oRecord)
    {
        $this->iUserTypeTableTableTypeId        = $_oRecord->userTypeTable_tableTypeId ;
        $this->iUserTypeTableUserTypeId         = $_oRecord->userTypeTable_userTypeId ;
    }

    // this into record
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->userTypeTable_tableTypeId    = $this->iUserTypeTableTableTypeId ;
        $_oRecord->userTypeTable_userTypeId     = $this->iUserTypeTableUserTypeId ;
    }

    // find by id
    public static function getById ($_iTableTypeId = null, $_iUserTypeId = null, $_iTypeId = null)
    {
        $oCnx = jDb::getConnection () ;

        // user
        $oConnectedUser = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;

        $oUserPermission = new CUserPermission () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userTypeTable") . " 
                    " ;

        // filters
        $toConditions = array () ;

        // table type
        if (!empty ($_iTableTypeId))
        {
            $toConditions [] = "userTypeTable_tableTypeId = " . $_iTableTypeId ;
        }

        // user type
        if (!empty ($_iUserTypeId))
        {
            $toConditions [] = "userTypeTable_userTypeId = " . $_iUserTypeId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " WHERE " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oUserPermission->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserPermission) ;

            // get relative content type
            $toUserTypeTableContentType = array () ;
            $oDaoUserTypeTableContentType = jDao::get ('common~usertypetablecontenttype') ;

            $toCondUserTypeTableContentType = jDao::createConditions () ;
            $toCondUserTypeTableContentType->addCondition ('userTypeTableContentType_tableTypeId', '=', $oUserPermission->iUserTypeTableTableTypeId) ;
            $toCondUserTypeTableContentType->addCondition ('userTypeTableContentType_userTypeId', '=', $oUserPermission->iUserTypeTableUserTypeId) ;

            if (!empty ($_iTypeId))
            {
                $toCondUserTypeTableContentType->addCondition ('userTypeTableContentType_typeId', '=', $_iTypeId) ;
            }

            $toResUserTypeTableContentType = $oDaoUserTypeTableContentType->findBy ($toCondUserTypeTableContentType) ;
            foreach ($toResUserTypeTableContentType as $oResUserTypeTableContentType)
            {
                $oUserTypeTableContentType = new stdClass () ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeTableTypeId            = $oResUserTypeTableContentType->userTypeTableContentType_tableTypeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeUserTypeId             = $oResUserTypeTableContentType->userTypeTableContentType_userTypeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeTypeId                 = $oResUserTypeTableContentType->userTypeTableContentType_typeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeActionTypeId           = $oResUserTypeTableContentType->userTypeTableContentType_actionTypeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeHisContentOnlyStatusId = $oResUserTypeTableContentType->userTypeTableContentType_hisContentOnlyStatusId ;

                // content,user,media type
                $oType                                                  = new stdClass () ;
                $oType->iElementTypeId                                  = null ;
                $oType->iUserTypeTableContentTypeHisContentOnlyStatusId = $oResUserTypeTableContentType->userTypeTableContentType_hisContentOnlyStatusId ;
                $oType->zElementTypeLabel                               = "" ;

                switch ($oUserTypeTableContentType->iUserTypeTableContentTypeTableTypeId)
                {
                    case USER_TABLE_TYPE_ID :
                        $oUserType                              = CUserType::getById ($oUserTypeTableContentType->iUserTypeTableContentTypeTypeId) ;
                        $oType->iElementTypeId                  = $oUserType->iUserTypeId ;
                        $oType->zElementTypeLabel               = $oUserType->zUserTypeTranslatableLabel ;
                        $oUserPermission->ALLOWED_TYPE_ACCESS   = YES ;
                    break ;

                    case CONTENT_TABLE_TYPE_ID :
                        $oElementType                           = CContentType::getById ($oUserTypeTableContentType->iUserTypeTableContentTypeTypeId) ;
                        $oType->iElementTypeId                  = $oElementType->iContentTypeId ;
                        $oType->zElementTypeLabel               = $oElementType->zContentTypeTranslatableLabel ;
                        $oUserPermission->ALLOWED_TYPE_ACCESS   = YES ;
                    break ;

                    case MEDIA_TABLE_TYPE_ID :
                        $oType->iElementTypeId                  = 1 ;
                        $oType->zElementTypeLabel               = "Tous" ;
                        $oUserPermission->ALLOWED_TYPE_ACCESS   = YES ;
                    break ;

                    default :
                    break ;
                }
                $oUserTypeTableContentType->oType = $oType ;
                // content,user,media type

                // action type
                $toAction = array () ;
                $tiUserTypeTableContentTypeActionTypeId = explode (",", $oUserTypeTableContentType->iUserTypeTableContentTypeActionTypeId) ;

                // has action
                if ($oConnectedUser->typeId != USER_TYPE_SUPER_ADMIN_ID)
                {
                    $oUserPermission->HAS_ACTION = (empty ($oUserTypeTableContentType->iUserTypeTableContentTypeActionTypeId)) ? NO : YES ;
                }

                // his content only
                $oUserPermission->HIS_CONTENT_ONLY = $oUserTypeTableContentType->iUserTypeTableContentTypeHisContentOnlyStatusId ;

                foreach ($tiUserTypeTableContentTypeActionTypeId as $iActionTypeId)
                {
                    $oAction = new stdClass () ;

                    switch ($iActionTypeId)
                    {
                        case CREATION_ACTION_ID :
                            $oAction->iActionId                             = CREATION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Création" ;
                            $oUserPermission->ALLOWED_CREATION_ACTION       = YES ;
                        break ;

                        case EDITION_ACTION_ID :
                            $oAction->iActionId                             = EDITION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Édition" ;
                            $oUserPermission->ALLOWED_EDITION_ACTION        = YES ;
                        break ;

                        case TRADUCTION_ACTION_ID :
                            $oAction->iActionId                             = TRADUCTION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Traduction" ;
                            $oUserPermission->ALLOWED_TRADUCTION_ACTION     = YES ;
                        break ;

                        case PUBLICATION_ACTION_ID :
                            $oAction->iActionId                             = PUBLICATION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Publication" ;
                            $oUserPermission->ALLOWED_PUBLICATION_ACTION    = YES ;
                        break ;

                        case ACTIVATION_ACTION_ID :
                            $oAction->iActionId                             = ACTIVATION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Activation" ;
                            $oUserPermission->ALLOWED_ACTIVATION_ACTION     = YES ;
                        break ;

                        case TRASHING_ACTION_ID :
                            $oAction->iActionId                             = TRASHING_ACTION_ID ;
                            $oAction->zActionLabel                          = "Mise à la corbeille" ;
                            $oUserPermission->ALLOWED_TRASHING_ACTION       = YES ;
                        break ;

                        case RECOVER_ACTION_ID :
                            $oAction->iActionId                             = RECOVER_ACTION_ID ;
                            $oAction->zActionLabel                          = "Récuperation dépuis la corbeille" ;
                            $oUserPermission->ALLOWED_RECOVER_ACTION        = YES ;
                        break ;

                        case REMOVE_ACTION_ID :
                            $oAction->iActionId                             = REMOVE_ACTION_ID ;
                            $oAction->zActionLabel                          = "Supression" ;
                            $oUserPermission->ALLOWED_REMOVE_ACTION         = YES ;
                        break ;

                        case MODIFICATION_ACTION_ID :
                            $oAction->iActionId                             = MODIFICATION_ACTION_ID ;
                            $oAction->zActionLabel                          = "Modification" ;
                            $oUserPermission->ALLOWED_MODIFICATION_ACTION   = YES ;
                        break ;

                        case DOWNLOAD_ACTION_ID :
                            $oAction->iActionId                             = DOWNLOAD_ACTION_ID ;
                            $oAction->zActionLabel                          = "Téléchargement" ;
                            $oUserPermission->ALLOWED_DOWNLOAD_ACTION       = YES ;
                        break ;
                    }
                    $toAction [] = $oAction ;
                }
                $oUserTypeTableContentType->toAction = $toAction ;

                $toUserTypeTableContentType [] = $oUserTypeTableContentType ;
                // action type
            }
            $oUserPermission->toUserTypeTableContentType = $toUserTypeTableContentType ;
            // get relative content type
        }

        return $oUserPermission ;
    }

    // list
    public static function getList ($_iUserTypeId = null)
    {
        $oCnx = jDb::getConnection () ;

        $toUserPermission = array () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userTypeTable") . " 
                    " ;

        // filters
        $toConditions = array () ;

        // user type
        if (!empty ($_iUserTypeId))
        {
            $toConditions [] = "userTypeTable_userTypeId = " . $_iUserTypeId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " WHERE " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oUserPermission = new CUserPermission () ;

            switch ($oRec->userTypeTable_tableTypeId)
            {
                case USER_TABLE_TYPE_ID :
                    $oUserPermission->zUserTypeTableLabel = "Utilisateur" ;
                break ;

                case CONTENT_TABLE_TYPE_ID :
                    $oUserPermission->zUserTypeTableLabel = "Contenu" ;
                break ;

                case MEDIA_TABLE_TYPE_ID :
                    $oUserPermission->zUserTypeTableLabel = "Média" ;
                break ;

                default :
                    $oUserPermission->zUserTypeTableLabel = "" ;
                break ;
            }

            $oUserPermission->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oUserPermission) ;

            // get relative content type
            $toUserTypeTableContentType = array () ;
            $oDaoUserTypeTableContentType = jDao::get ('common~usertypetablecontenttype') ;

            $toCondUserTypeTableContentType = jDao::createConditions () ;
            $toCondUserTypeTableContentType->addCondition ('userTypeTableContentType_tableTypeId', '=', $oUserPermission->iUserTypeTableTableTypeId) ;
            $toCondUserTypeTableContentType->addCondition ('userTypeTableContentType_userTypeId', '=', $oUserPermission->iUserTypeTableUserTypeId) ;
            $toResUserTypeTableContentType = $oDaoUserTypeTableContentType->findBy ($toCondUserTypeTableContentType) ;
            foreach ($toResUserTypeTableContentType as $oResUserTypeTableContentType)
            {
                $oUserTypeTableContentType = new stdClass () ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeTableTypeId    = $oResUserTypeTableContentType->userTypeTableContentType_tableTypeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeUserTypeId     = $oResUserTypeTableContentType->userTypeTableContentType_userTypeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeTypeId         = $oResUserTypeTableContentType->userTypeTableContentType_typeId ;
                $oUserTypeTableContentType->iUserTypeTableContentTypeActionTypeId   = $oResUserTypeTableContentType->userTypeTableContentType_actionTypeId ;

                // content,user,media type
                $oType = new stdClass () ;
                switch ($oUserTypeTableContentType->iUserTypeTableContentTypeTableTypeId)
                {
                    case USER_TABLE_TYPE_ID :
                        $oType = CUserType::getById ($oUserTypeTableContentType->iUserTypeTableContentTypeTypeId) ;
                    break ;

                    case CONTENT_TABLE_TYPE_ID :
                        $oType = CContentType::getById ($oUserTypeTableContentType->iUserTypeTableContentTypeTypeId) ;
                    break ;

                    case MEDIA_TABLE_TYPE_ID :
                    break ;

                    default :
                    break ;
                }
                $oUserTypeTableContentType->oType = $oType ;
                // content,user,media type

                // action type
                $toAction = array () ;
                $tiUserTypeTableContentTypeActionTypeId = explode (",", $oUserTypeTableContentType->iUserTypeTableContentTypeActionTypeId) ;
                foreach ($tiUserTypeTableContentTypeActionTypeId as $iActionTypeId)
                {
                    $oAction = new stdClass () ;
                    switch ($iActionTypeId)
                    {
                        case CREATION_ACTION_ID :
                            $oAction->iActionId     = CREATION_ACTION_ID ;
                            $oAction->zActionLabel  = "Création" ;
                        break ;

                        case EDITION_ACTION_ID :
                            $oAction->iActionId     = EDITION_ACTION_ID ;
                            $oAction->zActionLabel  = "Édition" ;
                        break ;

                        case TRADUCTION_ACTION_ID :
                            $oAction->iActionId     = TRADUCTION_ACTION_ID ;
                            $oAction->zActionLabel  = "Traduction" ;
                        break ;

                        case PUBLICATION_ACTION_ID :
                            $oAction->iActionId     = PUBLICATION_ACTION_ID ;
                            $oAction->zActionLabel  = "Publication" ;
                        break ;

                        case ACTIVATION_ACTION_ID :
                            $oAction->iActionId     = ACTIVATION_ACTION_ID ;
                            $oAction->zActionLabel  = "Activation" ;
                        break ;

                        case TRASHING_ACTION_ID :
                            $oAction->iActionId     = TRASHING_ACTION_ID ;
                            $oAction->zActionLabel  = "Mise à la corbeille" ;
                        break ;

                        case RECOVER_ACTION_ID :
                            $oAction->iActionId     = RECOVER_ACTION_ID ;
                            $oAction->zActionLabel  = "Récuperation dépuis la corbeille" ;
                        break ;

                        case REMOVE_ACTION_ID :
                            $oAction->iActionId     = REMOVE_ACTION_ID ;
                            $oAction->zActionLabel  = "Supression" ;
                        break ;

                        case MODIFICATION_ACTION_ID :
                            $oAction->iActionId     = MODIFICATION_ACTION_ID ;
                            $oAction->zActionLabel  = "Modification" ;
                        break ;

                        case DOWNLOAD_ACTION_ID :
                            $oAction->iActionId     = DOWNLOAD_ACTION_ID ;
                            $oAction->zActionLabel  = "Téléchargement" ;
                        break ;
                    }
                    CCommonTools::encodeDaoRecUtf8 ($oAction) ;
                    $toAction [] = $oAction ;
                }
                $oUserTypeTableContentType->toAction = $toAction ;

                $toUserTypeTableContentType [] = $oUserTypeTableContentType ;
                // action type
            }
            $oUserPermission->toUserTypeTableContentType = $toUserTypeTableContentType ;
            // get relative content type

            $toUserPermission [] = $oUserPermission ;
        }

        return $toUserPermission ;
    }

    // list
    public static function bCanAddNewTable ($_iUserTypeId = null)
    {
        $oCnx = jDb::getConnection () ;

        $tiTableType = array () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("userTypeTable") . " 
                    " ;

        // filters
        $toConditions = array () ;

        // user type
        if (!empty ($_iUserTypeId))
        {
            $toConditions [] = "userTypeTable_userTypeId = " . $_iUserTypeId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " WHERE " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $tiTableType [] = $oRec->userTypeTable_tableTypeId ;
        }

        $tiAllTableType = array 
        (
            USER_TABLE_TYPE_ID,
            CONTENT_TABLE_TYPE_ID,
            MEDIA_TABLE_TYPE_ID
        ) ;

        $bNotAllowAddNew = true ;

        foreach ($tiAllTableType as $iTableType)
        {
            if (!in_array ($iTableType, $tiTableType))
            {
                $bNotAllowAddNew = false ;
            }
        }

        return ($bNotAllowAddNew == true) ? false : true ;
    }

    // check menu permission
    public function isAllowedAccess ($_iTableTypeId = 0, $_iElementTypeId = 0)
    {
        // connected user
        $user = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;
        $oConnectedUser = CUser::getById ($user->id, $user->typeId, LANG_DEFAULT_ID) ;
        if ($oConnectedUser->iUserTypeId != USER_TYPE_SUPER_ADMIN_ID)
        {
            $oDaoUserTypeTableContentType = jDao::get ('common~usertypetablecontenttype') ;
            $oExistRecUserTypeTableContentType = $oDaoUserTypeTableContentType->get ($_iTableTypeId, $oConnectedUser->iUserTypeId, $_iElementTypeId) ;
            if (!empty ($oExistRecUserTypeTableContentType))
            {
                return true ;
            }
            else
            {
                return false ;
            }
        }
        else
        {
            return true ;
        }
    }

    // check menu permission
    public function isAllowedAction ($_iTableTypeId = null, $_iElementTypeId = null, $_iActionId = null)
    {
        // connected user
        $user = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;
        $oConnectedUser = CUser::getById ($user->id, $user->typeId, LANG_DEFAULT_ID) ;
        if ($oConnectedUser->iUserTypeId != USER_TYPE_SUPER_ADMIN_ID)
        {
            $oDaoUserTypeTableContentType = jDao::get ('common~usertypetablecontenttype') ;
            $oExistRecUserTypeTableContentType = $oDaoUserTypeTableContentType->get ($_iTableTypeId, $oConnectedUser->iUserTypeId, $_iElementTypeId) ;
            if (!empty ($oExistRecUserTypeTableContentType) && isset ($oExistRecUserTypeTableContentType->userTypeTableContentType_userTypeId))
            {
                $tiActionId = explode (",", $oExistRecUserTypeTableContentType->userTypeTableContentType_actionTypeId) ;
                return (in_array ($_iActionId, $tiActionId)) ? true : false ;
            }
            else
            {
                return false ;
            }
        }
        else
        {
            return true ;
        }
    }

    // check if all action not allowed
    public function hasAction ($_iTableTypeId = null, $_iElementTypeId = null)
    {
        // connected user
        $user = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;
        $oConnectedUser = CUser::getById ($user->id, $user->typeId, LANG_DEFAULT_ID) ;
        if ($oConnectedUser->iUserTypeId != USER_TYPE_SUPER_ADMIN_ID)
        {
            $oDaoUserTypeTableContentType = jDao::get ('common~usertypetablecontenttype') ;
            $oExistRecUserTypeTableContentType = $oDaoUserTypeTableContentType->get ($_iTableTypeId, $oConnectedUser->iUserTypeId, $_iElementTypeId) ;
            if (!empty ($oExistRecUserTypeTableContentType) && isset ($oExistRecUserTypeTableContentType->userTypeTableContentType_userTypeId))
            {
                return ( empty($oExistRecUserTypeTableContentType->userTypeTableContentType_actionTypeId)) ? false : true ;
            }
            else
            {
                return false ;
            }
        }
        else
        {
            return true ;
        }
    }

    // save
    public function saveIntoDB ()
    {
        // user type table
        $oDaoUserTypeTable = jDao::get ('common~usertypetable') ;

        $oRecUserTypeTable       = null ;
        $oExistUserTypeTable     = null ;

        $oRecUserTypeTable = jDao::createRecord ('common~usertypetable') ;

        if (($this->iUserTypeTableTableTypeId > 0) && ($this->iUserTypeTableUserTypeId > 0))
        {
            $oExistRecUserTypeTable = $oDaoUserTypeTable->get ($this->iUserTypeTableTableTypeId, $this->iUserTypeTableUserTypeId) ;

            if (!empty ($oExistRecUserTypeTable))
            {
                $oRecUserTypeTable = $oExistRecUserTypeTable ;
            }
        }

        $this->fetchIntoRecord ($oRecUserTypeTable) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecUserTypeTable) ;

        if (empty ($oExistRecUserTypeTable))
        {
            $oDaoUserTypeTable->insert ($oRecUserTypeTable) ;
        }
        else
        {
            $oDaoUserTypeTable->update ($oRecUserTypeTable) ;
        }
        // user type table
    }
}
?>