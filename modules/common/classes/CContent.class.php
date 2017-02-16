<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CContentExtraFieldSetting") ;
jClasses::inc ("common~CMedia") ;
jClasses::inc ("common~CUser") ;
jClasses::inc ("common~CUserPermission") ;

class CContent
{
    var $iContentId ;
    var $iContentTypeId ;
    var $iContentAuthorId ;
    var $iContentAuthorTypeId ;
    var $iContentModeratorId ;
    var $iContentModeratorTypeId ;
    var $zContentForm ;
    var $zContentDatePublication ;
    var $zContentDateActivation ;
    var $zContentDateCreation ;
    var $zContentDateRemoval ;
    var $iContentActivationStatusId ;
    var $iContentPublicationStatusId ;
    var $iContentRemoveStatusId ;

    public function __construct ()
    {
        $this->iContentId                   = 0 ;
        $this->iContentTypeId               = NULL ;
        $this->iContentAuthorId             = NULL ;
        $this->iContentAuthorTypeId         = NULL ;
        $this->iContentModeratorId          = NULL ;
        $this->iContentModeratorTypeId      = NULL ;
        $this->zContentForm                 = NULL ;
        $this->zContentDatePublication      = NULL ;
        $this->zContentDateActivation       = NULL ;
        $this->zContentDateCreation         = NULL ;
        $this->zContentDateRemoval          = NULL ;
        $this->iContentActivationStatusId   = YES ;
        $this->iContentPublicationStatusId  = YES ;
        $this->iContentRemoveStatusId       = NO ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iContentId                           = $_oRecord->content_id ;
        $this->iContentTypeId                       = $_oRecord->content_typeId ;
        $this->iContentAuthorId                     = $_oRecord->content_authorId ;
        $this->iContentAuthorTypeId                 = $_oRecord->content_authorTypeId ;
        $this->iContentModeratorId                  = $_oRecord->content_moderatorId ;
        $this->iContentModeratorTypeId              = $_oRecord->content_moderatorTypeId ;
        $this->zContentForm                         = $_oRecord->content_form ;
        $this->zContentDatePublication              = $_oRecord->content_datePublication ;
        $this->zContentDateActivation               = $_oRecord->content_dateActivation ;
        $this->zContentDateCreation                 = $_oRecord->content_dateCreation ;
        $this->zContentDateRemoval                  = $_oRecord->content_dateRemoval ;
        $this->iContentActivationStatusId           = $_oRecord->content_activationStatusId ;
        $this->iContentPublicationStatusId          = $_oRecord->content_publicationStatusId ;
        $this->iContentRemoveStatusId               = $_oRecord->content_removeStatusId ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->content_id                       = $this->iContentId ;
        $_oRecord->content_typeId                   = $this->iContentTypeId ;
        $_oRecord->content_authorId                 = $this->iContentAuthorId ;
        $_oRecord->content_authorTypeId             = $this->iContentAuthorTypeId ;
        $_oRecord->content_moderatorId              = $this->iContentModeratorId ;
        $_oRecord->content_moderatorTypeId          = $this->iContentModeratorTypeId ;
        $_oRecord->content_form                     = $this->zContentForm ;
        $_oRecord->content_datePublication          = $this->zContentDatePublication ;
        $_oRecord->content_dateActivation           = $this->zContentDateActivation ;
        $_oRecord->content_dateCreation             = $this->zContentDateCreation ;
        $_oRecord->content_dateRemoval              = $this->zContentDateRemoval ;
        $_oRecord->content_activationStatusId       = $this->iContentActivationStatusId ;
        $_oRecord->content_publicationStatusId      = $this->iContentPublicationStatusId ;
        $_oRecord->content_removeStatusId           = $this->iContentRemoveStatusId ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iContentTypeId = null, $_iLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oResult = new CContent () ;

        try
        {
            if ($_iId > 0)
            {
                $zQuery = "CALL SP_GET_CONTENT(" . $_iId . "," . $_iContentTypeId . "," . $_iLocaleId . ")" ;
                $oRes = $oCnx->querySP ($zQuery) ;
                if (is_object ($oRes))
                {
                    while ($oContent = $oRes->fetch ())
                    {
                        // author
                        if (!empty ($oContent->iContentAuthorId) && !empty ($oContent->iContentAuthorTypeId))
                        {
                            $oContent->oAuthor = CUser::getById ($oContent->iContentAuthorId, $oContent->iContentAuthorTypeId) ;
                            unset ($oContent->oAuthor->zUserLogin) ;
                            unset ($oContent->oAuthor->zUserPassword) ;
                            unset ($oContent->oAuthor->zUserClearPassword) ;
                        }
                        // author

                        // moderator
                        if (!empty ($oContent->iContentModeratorId) && !empty ($oContent->iContentModeratorTypeId))
                        {
                            $oContent->oModerator = CUser::getById ($oContent->iContentModeratorId, $oContent->iContentModeratorTypeId) ;
                            unset ($oContent->oModerator->zUserLogin) ;
                            unset ($oContent->oModerator->zUserPassword) ;
                            unset ($oContent->oModerator->zUserClearPassword) ;
                        }
                        // moderator

                        CCommonTools::encodeDaoRecUtf8 ($oContent) ;
                        $oResult = $oContent ;
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
    public static function getList ($_RecToFind = null, $_iContentTypeId = "NULL", $_iCurrentPage = 1, $_zSortField = "iContentPublicationStatusId", $_zSortSens = "DESC", $_iLocaleId = LANG_DEFAULT_ID, &$_iNbRecs = 0, $_iDataPerPage = NB_DATA_PER_PAGE_BO)
    {
        $oCnx = jDb::getConnection () ;

        $toResults = array () ;

        // content status
        $iContentActivationStatusId    = (isset ($_RecToFind->iContentActivationStatusId)) ? $_RecToFind->iContentActivationStatusId : 0 ;
        $iContentPublicationStatusId   = (isset ($_RecToFind->iContentPublicationStatusId)) ? $_RecToFind->iContentPublicationStatusId : 0 ;
        $iContentRemoveStatusId        = (isset ($_RecToFind->iContentRemoveStatusId)) ? $_RecToFind->iContentRemoveStatusId : 0 ;

        // content setting id
        $tiContentExtraFieldSettingId = array () ;

        // field
        $tzSlug = array 
        (
            "iContentId",
            "iContentTypeId",
            "iContentAuthorId",
            "iContentAuthorTypeId",
            "iContentModeratorId",
            "iContentModeratorTypeId",
            "zContentForm",
            "zContentDatePublication",
            "zContentDateActivation",
            "zContentDateCreation",
            "zContentDateRemoval",
            "iContentActivationStatusId",
            "iContentPublicationStatusId",
            "iContentRemoveStatusId"
        ) ;

        // extra field selectable
        $tzExtraFieldSelectableSlug = array () ;

        // extra field media
        $tzExtraFieldMediaSlug = array () ;

        $oContentExtraFieldSettingToFind = new stdClass () ;
        $oContentExtraFieldSettingToFind->iContentExtraFieldSettingContentTypeId = $_iContentTypeId ;
        $oContentExtraFieldSettingToFind->iContentExtraFieldSettingActivationStatusId = YES ;
        $toContentExtraFieldSetting = CContentExtraFieldSetting::getList ($oContentExtraFieldSettingToFind) ;

        $tzStringSearchableField = array () ;
        $tzSelectableSearchField = array () ;

        foreach ($toContentExtraFieldSetting as $oContentExtraFieldSetting)
        {
            $tzSlug [] = $oContentExtraFieldSetting->zContentExtraFieldSettingSlug ;

            if ($oContentExtraFieldSetting->iContentExtraFieldSettingSearchableStatusId == YES)
            {
                if (($oContentExtraFieldSetting->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXT_ID) || ($oContentExtraFieldSetting->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_TEXTAREA_ID))
                {
                    $tzStringSearchableField [] = $oContentExtraFieldSetting->zContentExtraFieldSettingSlug ;
                }

                if (($oContentExtraFieldSetting->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_SELECT_ID) || ($oContentExtraFieldSetting->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_CHECKBOX_ID) || ($oContentExtraFieldSetting->iContentExtraFieldSettingElementTypeId == ELEMENT_TYPE_RADIO_ID))
                {
                    $tzSelectableSearchField [] = $oContentExtraFieldSetting->zContentExtraFieldSettingSlug ;
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

        // in in
        if (isset ($_RecToFind->zContentIdIn) && !empty ($_RecToFind->zContentIdIn))
        {
            $tzSearchQuery [] = "content_id IN(" . $_RecToFind->zContentIdIn . ")" ;
        }

        // in not in
        if (isset ($_RecToFind->zContentIdNotIn) && !empty ($_RecToFind->zContentIdNotIn))
        {
            $tzSearchQuery [] = "content_id NOT IN(" . $_RecToFind->zContentIdNotIn . ")" ;
        }

        $zSearchQuery = implode (" AND ", $tzSearchQuery) ;

        try
        {
            if (!empty ($zSearchQuery))
            {
                $zQuery = 'CALL SP_LIST_CONTENT(
                ' . $_iContentTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                "' . $zSearchQuery . '",
                ' . $iContentActivationStatusId . ',
                ' . $iContentPublicationStatusId . ',
                ' . $iContentRemoveStatusId . ',
                @iNbRec)' ;
            }
            else
            {
                $zQuery = 'CALL SP_LIST_CONTENT(
                ' . $_iContentTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                NULL,
                ' . $iContentActivationStatusId . ',
                ' . $iContentPublicationStatusId . ',
                ' . $iContentRemoveStatusId . ',
                @iNbRec)' ;
            }

            $oRes = $oCnx->querySP ($zQuery) ;

            if (!empty ($oRes))
            {
                while ($oContent = $oRes->fetch ())
                {
                    // author
                    if (!empty ($oContent->iContentAuthorId) && !empty ($oContent->iContentAuthorTypeId))
                    {
                        $oContent->oAuthor = CUser::getById ($oContent->iContentAuthorId, $oContent->iContentAuthorTypeId) ;
                        unset ($oContent->oAuthor->zUserLogin) ;
                        unset ($oContent->oAuthor->zUserPassword) ;
                        unset ($oContent->oAuthor->zUserClearPassword) ;
                    }
                    // author

                    // moderator
                    if (!empty ($oContent->iContentModeratorId) && !empty ($oContent->iContentModeratorTypeId))
                    {
                        $oContent->oModerator = CUser::getById ($oContent->iContentModeratorId, $oContent->iContentModeratorTypeId) ;
                        unset ($oContent->oModerator->zUserLogin) ;
                        unset ($oContent->oModerator->zUserPassword) ;
                        unset ($oContent->oModerator->zUserClearPassword) ;
                    }
                    // moderator

                    CCommonTools::encodeDaoRecUtf8 ($oContent) ;

                    $toResults [] = $oContent ;
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
    public static function getSelectableList ($_RecToFind = null, $_iContentTypeId = "NULL", $_iCurrentPage = 1, $_zSortField = "iContentPublicationStatusId", $_zSortSens = "DESC", $_iLocaleId = LANG_DEFAULT_ID, &$_iNbRecs = 0, $_iDataPerPage = NB_DATA_PER_PAGE_BO)
    {
        $oCnx = jDb::getConnection () ;

        $toResults = array () ;

        // content status
        $iContentActivationStatusId    = (isset ($_RecToFind->iContentActivationStatusId)) ? $_RecToFind->iContentActivationStatusId : 0 ;
        $iContentPublicationStatusId   = (isset ($_RecToFind->iContentPublicationStatusId)) ? $_RecToFind->iContentPublicationStatusId : 0 ;
        $iContentRemoveStatusId        = (isset ($_RecToFind->iContentRemoveStatusId)) ? $_RecToFind->iContentRemoveStatusId : 0 ;

        // search
        $zSearchQuery = NULL ;
        $tzSearchQuery = array () ;

        // id in
        if (isset ($_RecToFind->zContentIdIn))
        {
            $tzSearchQuery [] = "iContentId IN(" . $_RecToFind->zContentIdIn . ")" ;
        }

        // id not in
        if (isset ($_RecToFind->zContentIdNotIn))
        {
            $tzSearchQuery [] = "iContentId NOT IN(" . $_RecToFind->zContentIdNotIn . ")" ;
        }

        $zSearchQuery = implode (" AND ", $tzSearchQuery) ;

        try
        {
            if (!empty ($zSearchQuery))
            {
                $zQuery = 'CALL SP_LIST_CONTENT(
                ' . $_iContentTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                "' . $zSearchQuery . '",
                ' . $iContentActivationStatusId . ',
                ' . $iContentPublicationStatusId . ',
                ' . $iContentRemoveStatusId . ',
                @iNbRec)' ;
            }
            else
            {
                $zQuery = 'CALL SP_LIST_CONTENT(
                ' . $_iContentTypeId . ',
                "' . $_zSortField . '", 
                "' . $_zSortSens . '", 
                ' . $_iCurrentPage . ', 
                ' . $_iDataPerPage . ',
                ' . $_iLocaleId . ',
                NULL,
                ' . $iContentActivationStatusId . ',
                ' . $iContentPublicationStatusId . ',
                ' . $iContentRemoveStatusId . ',
                @iNbRec)' ;
            }

            $oRes = $oCnx->querySP ($zQuery) ;

            if (!empty ($oRes))
            {
                while ($oContent = $oRes->fetch ())
                {
                    CCommonTools::encodeDaoRecUtf8 ($oContent) ;
                    $toResults [] = $oContent ;
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

    // get content count
    public static function getCount ($_RecToFind = null, $_iContentTypeId = null, $_iLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $iNbRecords = 0 ;

        $toResults = array () ;

        // content status
        $iContentActivationStatusId    = (isset ($_RecToFind->iContentActivationStatusId)) ? $_RecToFind->iContentActivationStatusId : 0 ;
        $iContentPublicationStatusId   = (isset ($_RecToFind->iContentPublicationStatusId)) ? $_RecToFind->iContentPublicationStatusId : 0 ;
        $iContentRemoveStatusId        = (isset ($_RecToFind->iContentRemoveStatusId)) ? $_RecToFind->iContentRemoveStatusId : 0 ;

        $zQuery = 'CALL SP_COUNT_CONTENT(' . $_iContentTypeId . ',' . $_iLocaleId . ',' . $iContentActivationStatusId . ',' . $iContentPublicationStatusId . ',' . $iContentRemoveStatusId . ',@iNbRec)' ;

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
        // content
        $oDaoContent = jDao::get ('common~content') ;

        $oRecContent       = null ;
        $oExistContent     = null ;

        $oRecContent = jDao::createRecord ('common~content') ;

        if ($this->iContentId > 0)
        {
            $oExistRecContent = $oDaoContent->get ($this->iContentId) ;

            if (!empty ($oExistRecContent))
            {
                $oRecContent = $oExistRecContent ;
            }
        }

        $this->fetchIntoRecord ($oRecContent) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecContent) ;

        if (empty ($oExistRecContent))
        {
            $oDaoContent->insert ($oRecContent) ;
            $this->iContentId = $oRecContent->content_id ;
        }
        else
        {
            $oDaoContent->update ($oRecContent) ;
        }
    }
}
?>