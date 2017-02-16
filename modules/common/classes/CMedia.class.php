<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;

class CMedia
{
    var $iMediaId ;
    var $zMediaDateCreation ;
    var $zMediaDateActivation ;
    var $zMediaDatePublication ;
    var $zMediaDateRemoval ;
    var $zMediaMediaTypeId ;
    var $zMediaMediaCategoryId ;
    var $zMediaAuthor ;
    var $iMediaAuthorTypeId ;
    var $zMediaModerator ;
    var $iMediaModeratorTypeId ;
    var $iMediaActivationStatusId ;
    var $iMediaPublicationStatusId ;
    var $iMediaRemoveStatusId ;

    var $iMediaTranslatableLocaleId ;
    var $iMediaTranslatableParentId ;
    var $zMediaTranslatableTitle ;
    var $zMediaTranslatableFile ;
    var $zMediaTranslatableAlt ;
    var $zMediaTranslatableDescription ;

    var $zFileName ;
    var $zFileDate ;
    var $zFileSize ;
    var $zFileExtension ;
    var $iMediaType ;

    public function __construct ()
    {
        $this->iMediaId                         = 0 ;
        $this->zMediaDateCreation               = NULL ;
        $this->zMediaDateActivation             = NULL ;
        $this->zMediaDateRemoval                = NULL ;
        $this->zMediaDatePublication            = NULL ;
        $this->zMediaMediaTypeId                = NULL ;
        $this->zMediaMediaCategoryId            = NULL ;
        $this->zMediaAuthor                     = NULL ;
        $this->iMediaAuthorTypeId               = NULL ;
        $this->zMediaModerator                  = NULL ;
        $this->iMediaModeratorTypeId            = NULL ;
        $this->iMediaActivationStatusId         = NULL ;
        $this->iMediaPublicationStatusId        = NULL ;
        $this->iMediaRemoveStatusId             = NULL ;

        $this->iMediaTranslatableLocaleId       = NULL ;
        $this->iMediaTranslatableParentId       = NULL ;
        $this->zMediaTranslatableTitle          = NULL ;
        $this->zMediaTranslatableFile           = NULL ;
        $this->zMediaTranslatableAlt            = NULL ;
        $this->zMediaTranslatableDescription    = NULL ;

        $this->zFileName                        = NULL ;
        $this->zFileDate                        = NULL ;
        $this->zFileSize                        = NULL ;
        $this->zFileExtension                   = NULL ;
        $this->iMediaType                       = NULL ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iMediaId                         = $_oRecord->media_id ;
        $this->zMediaDateCreation               = $_oRecord->media_dateCreation ;
        $this->zMediaDateActivation             = $_oRecord->media_dateActivation ;
        $this->zMediaDatePublication            = $_oRecord->media_datePublication ;
        $this->zMediaDateRemoval                = $_oRecord->media_dateRemoval ;
        $this->zMediaMediaTypeId                = $_oRecord->media_mediaTypeId ;
        $this->zMediaMediaCategoryId            = $_oRecord->media_mediaCategoryId ;
        $this->zMediaAuthor                     = $_oRecord->media_author ;
        $this->iMediaAuthorTypeId               = $_oRecord->media_authorTypeId ;
        $this->zMediaModerator                  = $_oRecord->media_moderator ;
        $this->iMediaModeratorTypeId            = $_oRecord->media_moderatorTypeId ;
        $this->iMediaActivationStatusId         = $_oRecord->media_activationStatusId ;
        $this->iMediaPublicationStatusId        = $_oRecord->media_publicationStatusId ;
        $this->iMediaRemoveStatusId             = $_oRecord->media_removeStatusId ;

        $this->iMediaTranslatableLocaleId       = $_oRecord->mediaTranslatable_localeId ;
        $this->iMediaTranslatableParentId       = $_oRecord->mediaTranslatable_parentId ;
        $this->zMediaTranslatableTitle          = $_oRecord->mediaTranslatable_title ;
        $this->zMediaTranslatableFile           = $_oRecord->mediaTranslatable_file ;
        $this->zMediaTranslatableAlt            = $_oRecord->mediaTranslatable_alt ;
        $this->zMediaTranslatableDescription    = $_oRecord->mediaTranslatable_description ;

        if (!empty ($this->zMediaTranslatableFile))
        {
            $zExtension = strtolower (CCommonTools::getFileNameExtension ($this->zMediaTranslatableFile)) ;
            $zPath = MEDIA_FOLDER . "/" ;
            if (in_array ($zExtension, explode (",", MEDIA_TYPE_IMAGE_EXT)))
            {
                $zPath = MEDIA_FOLDER . "/" . BIG_FOLDER . "/" ;
            }

            $this->zFileName                    = $this->zMediaTranslatableFile ;
            $zFileDate                          = filemtime ($zPath . $this->zFileName) ;
            $this->zFileDate                    = date ("Y-m-d H:i:s", $zFileDate) ;
            $iSize                              = filesize ($zPath . $this->zFileName) ;
            $this->zFileSize                    = CCommonTools::convertFileSize ($iSize) ;
            $this->zFileExtension               = strtolower (CCommonTools::getFileNameExtension ($this->zMediaTranslatableFile)) ;

            if (in_array ($this->zFileExtension, explode (",", MEDIA_TYPE_IMAGE_EXT)))
            {
                 $this->iMediaType              = MEDIA_TYPE_IMAGE ;
            }
            else if (in_array ($this->zFileExtension, explode (",", MEDIA_TYPE_VIDEO_EXT)))
            {
                 $this->iMediaType              = MEDIA_TYPE_VIDEO ;
            }
            else if (in_array ($this->zFileExtension, explode (",", MEDIA_TYPE_DOCUMENT_EXT)))
            {
                 $this->iMediaType              = MEDIA_TYPE_DOCUMENT ;
            }
            else if (in_array ($this->zFileExtension, explode (",", MEDIA_TYPE_AUDIO_EXT)))
            {
                 $this->iMediaType              = MEDIA_TYPE_AUDIO ;
            }
        }
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->media_id                         = $this->iMediaId ;
        $_oRecord->media_dateCreation               = $this->zMediaDateCreation ;
        $_oRecord->media_dateActivation             = $this->zMediaDateActivation ;
        $_oRecord->media_datePublication            = $this->zMediaDatePublication ;
        $_oRecord->media_dateRemoval                = $this->zMediaDateRemoval ;
        $_oRecord->media_mediaTypeId                = $this->zMediaMediaTypeId ;
        $_oRecord->media_mediaCategoryId            = $this->zMediaMediaCategoryId ;
        $_oRecord->media_author                     = $this->zMediaAuthor ;
        $_oRecord->media_authorTypeId               = $this->iMediaAuthorTypeId ;
        $_oRecord->media_moderator                  = $this->zMediaModerator ;
        $_oRecord->media_moderatorTypeId            = $this->iMediaModeratorTypeId ;
        $_oRecord->media_activationStatusId         = $this->iMediaActivationStatusId ;
        $_oRecord->media_publicationStatusId        = $this->iMediaPublicationStatusId ;
        $_oRecord->media_removeStatusId             = $this->iMediaRemoveStatusId ;

        $_oRecord->mediaTranslatable_localeId       = $this->iMediaTranslatableLocaleId ;
        $_oRecord->mediaTranslatable_parentId       = $this->iMediaTranslatableParentId ;
        $_oRecord->mediaTranslatable_title          = $this->zMediaTranslatableTitle ;
        $_oRecord->mediaTranslatable_file           = $this->zMediaTranslatableFile ;
        $_oRecord->mediaTranslatable_alt            = $this->zMediaTranslatableAlt ;
        $_oRecord->mediaTranslatable_description    = $this->zMediaTranslatableDescription ;
    }

    // find by id
    public static function getById ($_iId = 0, $_iMediaTranslatableLocaleId = LANG_DEFAULT_ID)
    {
        $oCnx = jDb::getConnection () ;

        $oMedia = new CMedia () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE media_id = " . $_iId . " 
                        AND mediaTranslatable_localeId = 
                        IF ((SELECT media_id FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE media_id = " . $_iId . " 
                        AND 
                        mediaTranslatable_localeId = " . $_iMediaTranslatableLocaleId . ") > 0, 
                        " . $_iMediaTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oMedia->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oMedia) ;
        }

        return $oMedia ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null, $_iMediaTranslatableLocaleId = LANG_DEFAULT_ID, &$_iDataCount = 0, $_bHasPagination = false, $_iPage = 1, $_zSortField = "media_activationStatusId", $_zSortSens = "DESC", $_iNumValPerPage = NB_DATA_PER_PAGE_BO)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE mediaTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE mediaTranslatable_localeId = " . $_iMediaTranslatableLocaleId . ") > 0, " . $_iMediaTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->zMediaIdIn) && !empty ($_oToFind->zMediaIdIn))
        {
            $toConditions [] = "media_id IN(" . $_oToFind->zMediaIdIn . ")" ;
        }

        if (isset ($_oToFind->iMediaActivationStatusId))
        {
            $toConditions [] = "media_activationStatusId = " . $_oToFind->iMediaActivationStatusId ;
        }

        if (isset ($_oToFind->iMediaPublicationStatusId))
        {
            $toConditions [] = "media_publicationStatusId = " . $_oToFind->iMediaPublicationStatusId ;
        }

        if (isset ($_oToFind->iMediaRemoveStatusId))
        {
            $toConditions [] = "media_removeStatusId = " . $_oToFind->iMediaRemoveStatusId ;
        }

        // media type id
        if (isset ($_oToFind->zMediaMediaTypeIdIn) && !empty ($_oToFind->zMediaMediaTypeIdIn))
        {
            $toConditions [] = "media_mediaTypeId IN(" .  $_oToFind->zMediaMediaTypeIdIn . ")" ;
        }

        // search
        if (!empty ($_oToFind->zToSearch))
        {
            $toConditions [] = "(mediaTranslatable_title LIKE '%" . $_oToFind->zToSearch . "%' OR mediaTranslatable_file LIKE '%" . $_oToFind->zToSearch . "%' OR mediaTranslatable_alt LIKE '%" . $_oToFind->zToSearch . "%' OR mediaTranslatable_description LIKE '%" . $_oToFind->zToSearch . "%')" ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " AND " ;
            $zQuery .= (sizeof ($toConditions) == 1) ? $toConditions [0] : implode (" AND ", $toConditions) ;
        }
        // filters

        $zQuery .= " ORDER BY " . $_zSortField . " " . $_zSortSens ;

        if ($_bHasPagination)
        {
            $zQuery .= " LIMIT " . ($_iPage - 1) * $_iNumValPerPage . ", " . $_iNumValPerPage ;
        }

        $toResults = $oCnx->query ($zQuery) ;

        // --- nombre des lignes pour la pagination
        $zQueryDataCount = "SELECT FOUND_ROWS() AS iNumRows" ;
        $oRsCount = $oCnx->query ($zQueryDataCount) ;
        $oResCount = $oRsCount->fetch () ;
        $_iDataCount = $oResCount->iNumRows ;

        foreach ($toResults as $oRec)
        {
            $oMedia = new CMedia () ;
            $oMedia->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oMedia) ;
            $toRes [] = $oMedia ;
        }

        return $toRes ;
    }

    // récupération dépuis la base de données
    public static function getCount ($_oToFind = null, $_iMediaTranslatableLocaleId = LANG_DEFAULT_ID)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE mediaTranslatable_localeId = 
                        IF ((SELECT COUNT(*) FROM " . $oCnx->prefixTable ("media") . " 
                        INNER JOIN " . $oCnx->prefixTable ("mediaTranslatable") . " 
                        ON media_id = mediaTranslatable_parentId 
                        WHERE mediaTranslatable_localeId = " . $_iMediaTranslatableLocaleId . ") > 0, " . $_iMediaTranslatableLocaleId . ", " . LANG_DEFAULT_ID . ") 
                    " ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iMediaActivationStatusId))
        {
            $toConditions [] = "media_activationStatusId = " . $_oToFind->iMediaActivationStatusId ;
        }

        if (isset ($_oToFind->iMediaPublicationStatusId))
        {
            $toConditions [] = "media_publicationStatusId = " . $_oToFind->iMediaPublicationStatusId ;
        }

        if (isset ($_oToFind->iMediaRemoveStatusId))
        {
            $toConditions [] = "media_removeStatusId = " . $_oToFind->iMediaRemoveStatusId ;
        }

        if (isset ($_oToFind->zMediaTranslatableFile))
        {
            $toConditions [] = "mediaTranslatable_file = '" . $_oToFind->zMediaTranslatableFile . "'" ;
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

        return $oResCount->iNumRows ;
    }

    // save
    public function saveIntoDB ()
    {
        // locale
        $oDaoMedia = jDao::get ('common~media') ;

        $oRecMedia       = null ;
        $oExistMedia     = null ;

        $oRecMedia = jDao::createRecord ('common~media') ;

        if ($this->iMediaId > 0)
        {
            $oExistRecMedia = $oDaoMedia->get ($this->iMediaId) ;

            if (!empty ($oExistRecMedia))
            {
                $oRecMedia = $oExistRecMedia ;
            }
        }

        $this->fetchIntoRecord ($oRecMedia) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecMedia) ;

        if (empty ($oExistRecMedia))
        {
            $oDaoMedia->insert ($oRecMedia) ;
            $this->iMediaId = $oRecMedia->media_id ;
        }
        else
        {
            $oDaoMedia->update ($oRecMedia) ;
        }

        // translatable
        $oDaoMediaTranslatable = jDao::get ('common~mediatranslatable') ;

        $oRecMediaTranslatable         = null ;
        $oExistRecMediaTranslatable    = null ;

        $oRecMediaTranslatable = jDao::createRecord ('common~mediatranslatable') ;

        $oExistRecMediaTranslatable = $oDaoMediaTranslatable->get (array ($this->iMediaTranslatableLocaleId, $this->iMediaId)) ;

        if (!empty ($oExistRecMediaTranslatable))
        {
            $oRecMediaTranslatable = $oExistRecMedia ;
        }

        $this->fetchIntoRecord ($oRecMediaTranslatable) ;

        $oRecMediaTranslatable->mediaTranslatable_parentId = $this->iMediaId ;

        CCommonTools::decodeDaoRecUtf8 ($oRecMediaTranslatable) ;

        if (empty ($oExistRecMediaTranslatable))
        {
            $oDaoMediaTranslatable->insert ($oRecMediaTranslatable) ;
        }
        else
        {
            $oDaoMediaTranslatable->update ($oRecMediaTranslatable) ;
        }
    }
}
?>