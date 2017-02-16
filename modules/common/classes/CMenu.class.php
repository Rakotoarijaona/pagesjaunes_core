<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CContent") ;

class CMenu
{
    var $iMenuId ;
    var $zMenuLabel ;
    var $zMenuContent ;
    var $iMenuPublicationStatusId ;

    public function __construct ($iMenuId=0, $zMenuLabel="", $zMenuContent="",$iMenuPublicationStatusId=0)
    {
        $this->iMenuId                  = $iMenuId;
        $this->zMenuLabel               = $zMenuLabel ;
        $this->zMenuContent             = $zMenuContent ;
        $this->iMenuPublicationStatusId = $iMenuPublicationStatusId ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord ($_oRecord)
    {
        $this->iMenuId                  = $_oRecord->menu_id ;
        $this->zMenuLabel               = $_oRecord->menu_label ;
        $this->zMenuContent             = $_oRecord->menu_content ;
        $this->iMenuPublicationStatusId = $_oRecord->menu_publicationStatusId ;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->menu_id                  = $this->iMenuId ;
        $_oRecord->menu_label               = $this->zMenuLabel ;
        $_oRecord->menu_content             = $this->zMenuContent ;
        $_oRecord->menu_publicationStatusId = $this->iMenuPublicationStatusId ;
    }

    // find by id
    public static function getById ($_iId = 0)
    {
        $oCnx = jDb::getConnection () ;

        $oMenu = new CMenu () ;

        $zQuery =   "
                        SELECT * FROM " . $oCnx->prefixTable ("menu") . " 
                        WHERE menu_id = " . $_iId ;

        $toResults = $oCnx->query ($zQuery) ;

        foreach ($toResults as $oRec)
        {
            $oMenu->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oMenu) ;
        }

        return $oMenu ;
    }

    // récupération dépuis la base de données
    public static function getList ($_oToFind = null)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery = "SELECT * FROM " . $oCnx->prefixTable ("menu") ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iMenuPublicationStatusId))
        {
            $toConditions [] = "menu_publicationStatusId = " . $_oToFind->iMenuPublicationStatusId ;
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
            $oMenu = new CMenu () ;
            $oMenu->fetchFromRecord ($oRec) ;
            CCommonTools::encodeDaoRecUtf8 ($oMenu) ;
            $toRes [] = $oMenu ;
        }

        return $toRes ;
    }

    // récupération dépuis la base de données
    public static function getCount ($_oToFind = null)
    {
       $oCnx = jDb::getConnection () ;

        $toRes = array () ;

        $zQuery = "SELECT SQL_CALC_FOUND_ROWS * FROM " . $oCnx->prefixTable ("menu") ;

        // filters
        $toConditions = array () ;

        if (isset ($_oToFind->iMenuPublicationStatusId))
        {
            $toConditions [] = "menu_publicationStatusId = " . $_oToFind->iMenuPublicationStatusId ;
        }

        if (sizeof ($toConditions) > 0)
        {
            $zQuery .= " WHERE " ;
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
        $oDaoMenu = jDao::get ('common~menu') ;

        $oRecMenu       = null ;
        $oExistMenu     = null ;

        $oRecMenu = jDao::createRecord ('common~menu') ;

        if ($this->iMenuId > 0)
        {
            $oExistRecMenu = $oDaoMenu->get ($this->iMenuId) ;

            if (!empty ($oExistRecMenu))
            {
                $oRecMenu = $oExistRecMenu ;
            }
        }

        $this->fetchIntoRecord ($oRecMenu) ;

        CCommonTools::decodeDaoRecUtf8 ($oRecMenu) ;

        if (empty ($oExistRecMenu))
        {
            $oDaoMenu->insert ($oRecMenu) ;
            $this->iMenuId = $oRecMenu->menu_id ;
        }
        else
        {
            $oDaoMenu->update ($oRecMenu) ;
        }
    }

    // generate nestable menu
    function generateHtmlNestableMenu ($_zMenuContentJson = "", &$_zMenu, &$tiExistPageId, &$tiExistContentTypeId)
    {
        if (!empty ($_zMenuContentJson))
        {
            $toMenuContent = json_decode ($_zMenuContentJson) ;

            foreach ($toMenuContent as $oMenuContent)
            {
               self::walkMenuAndChildren ($oMenuContent, $_zMenu, $tiExistPageId, $tiExistContentTypeId) ;
            }
        }
    }

    // recursive walker
    function walkMenuAndChildren ($oMenuJson, &$_zHtml, &$_tiExistPageId, &$_tiExistContentTypeId)
    {
        if (isset ($oMenuJson->id))
        {
            $tiContentId    = (!empty ($oMenuJson->id)) ? explode ("-", $oMenuJson->id) : array () ;

            $iContentId     = 0 ;
            $iTypeId        = 0 ;

            if (sizeof ($tiContentId) == 2)
            {
                $iContentId     = (isset ($tiContentId [0])) ? $tiContentId [0] : 0 ;
                $iTypeId        = (isset ($tiContentId [1])) ? $tiContentId [1] : 0 ;
            }
            else
            {
                $iTypeId = $oMenuJson->id ;
            }

            if (!empty ($iContentId) || !empty ($iTypeId))
            {
                $zTitle = "" ;
                $zIcon  = "" ;

                $oContentTypePage = CContentType::getById (CONTENT_TYPE_PAGE_ID) ;

                if ($iTypeId == CONTENT_TYPE_PAGE_ID)
                {
                    $oContent           = CContent::getById ($iContentId, $iTypeId) ;
                    $zTitle             = $oContent->titre ;
                    $zIcon              = $oContentTypePage->zContentTypeIcon ;
                    $_tiExistPageId []  = $iContentId ;

                    $_zHtml .= '<li class="dd-item dd-selection" data-id="' . $iContentId . '-' . $iTypeId . '">' ;
                }
                else
                {
                    $oContentType               = CContentType::getById ($iTypeId) ;
                    $zTitle                     = $oContentType->zContentTypeTranslatableLabel ;
                    $zIcon                      = $oContentType->zContentTypeIcon ;
                    $_tiExistContentTypeId []   = $iTypeId ;

                    $_zHtml .= '<li class="dd-item dd-selection" data-id="' . $iTypeId . '">' ;
                }

                $_zHtml .= '<div class="dd-handle">' ;
                $_zHtml .= '<i class="fa ' . $zIcon . '"></i>' ;
                $_zHtml .= $zTitle ;
                $_zHtml .= '</div>' ;

                if (isset ($oMenuJson->children) && (!empty ($oMenuJson->children)))
                {
                    $_zHtml .= '<ol class="dd-list">' ;

                    foreach ($oMenuJson->children as $oMenuDecChildren)
                    {
                       self::walkMenuAndChildren ($oMenuDecChildren, $_zHtml, $_tiExistPageId, $_tiExistContentTypeId) ;
                    }

                    $_zHtml .= '</ol>' ;
                }

                $_zHtml .= '</li>' ;
            }
        }
    }

    // generate top menu
    function generateHtmlTopMenu ($_zMenuContentJson = "", &$_zMenu, $_iPageId = 0, $_iTypeId = 0)
    {
        $toMenuContent = json_decode ($_zMenuContentJson) ;

        foreach ($toMenuContent as $oMenuContent)
        {
           self::walkTopMenuAndChildren ($oMenuContent, $_zMenu, $_iPageId, $_iTypeId) ;
        }
    }

    // recursive walker top menu
    function walkTopMenuAndChildren ($oMenuJson, &$_zHtml, $_iPageId, $_iTypeId)
    {
        $oMenuDec           = new stdClass () ;
        $zClass             = "" ;
        $iContentId         = 0 ;
        $iContentTypeId     = 0 ;

        $tiContentId = (!empty ($oMenuJson->id)) ? explode ("-", $oMenuJson->id) : array () ;

        if (sizeof ($tiContentId) == 2)
        {
            $iContentId     = (isset ($tiContentId [0])) ? $tiContentId [0] : 0 ;
            $iContentTypeId = (isset ($tiContentId [1])) ? $tiContentId [1] : 0 ;
        }
        else
        {
            $iContentTypeId = $oMenuJson->id ;
        }

        if (!empty ($iContentId) || !empty ($iContentTypeId))
        {
             $oContentTypePage = CContentType::getById (CONTENT_TYPE_PAGE_ID) ;

            if ($iContentTypeId == CONTENT_TYPE_PAGE_ID)
            {
                $oContent  = CContent::getById ($iContentId, $iContentTypeId) ;

                $oMenuDec->iContentId           = $iContentId ;
                $oMenuDec->iContentTypeId       = CONTENT_TYPE_PAGE_ID ;
                $oMenuDec->zContentLabel        = $oContent->titre ;
                $oMenuDec->zUrl                 = jUrl::get ("frontoffice~front:content", array ('type' => $iContentTypeId, 'content' => $iContentId)) ;

                $zClass = ($_iPageId == $iContentId) ? "class='active'" : "" ;
            }
            else
            {
                $oContentType               = CContentType::getById ($iContentTypeId, LANG_DEFAULT_ID) ;
                $oMenuDec->iContentTypeId   = $iContentTypeId ;
                $oMenuDec->zContentLabel    = $oContentType->zContentTypeTranslatableLabel ;
                $oMenuDec->zUrl             = jUrl::get ("frontoffice~front:type", array ('type' => $iContentTypeId)) ;

                $zClass = ($_iTypeId == $iContentTypeId) ? "class='active'" : "" ;
            }

            if (isset ($oMenuJson->children) && (!empty ($oMenuJson->children)))
            {
                $_zHtml .= '<li class="dropdown">' ;
                $_zHtml .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $oMenuDec->zContentLabel . ' <span class="caret"></span></a>' ;
                $_zHtml .= '<ul class="dropdown-menu" role="menu">' ;

                foreach ($oMenuJson->children as $oMenuDecChildren)
                {
                   self::walkTopMenuAndChildren ($oMenuDecChildren, $_zHtml, $_iPageId, $_iTypeId) ;
                }

                $_zHtml .= '</ul>' ;
                $_zHtml .= '</li>' ;
            }
            else
            {
                $_zHtml .= '<li ' . $zClass . '>' ;
                $_zHtml .= '<a href="' . $oMenuDec->zUrl . '" title="' . $oMenuDec->zContentLabel . '">' . $oMenuDec->zContentLabel . '</a>' ;
            }

            $_zHtml .= '</li>' ;
        }
    }

    // generate top menu
    function generateHtmlFooterMenu ($_zMenuContentJson = "", &$_zMenu, $_iPageId = 0, $_iTypeId = 0)
    {
        $toMenuContent = json_decode ($_zMenuContentJson) ;

        foreach ($toMenuContent as $oMenuContent)
        {
           self::walkFooterMenuAndChildren ($oMenuContent, $_zMenu, $_iPageId, $_iTypeId) ;
        }
    }

    // recursive walker top menu
    function walkFooterMenuAndChildren ($oMenuJson, &$_zHtml, $_iPageId, $_iTypeId)
    {
        $oMenuDec           = new stdClass () ;
        $zClass             = "" ;
        $iContentId         = 0 ;
        $iContentTypeId     = 0 ;

        $tiContentId = (!empty ($oMenuJson->id)) ? explode ("-", $oMenuJson->id) : array () ;

        if (sizeof ($tiContentId) == 2)
        {
            $iContentId     = (isset ($tiContentId [0])) ? $tiContentId [0] : 0 ;
            $iContentTypeId = (isset ($tiContentId [1])) ? $tiContentId [1] : 0 ;
        }
        else
        {
            $iContentTypeId = $oMenuJson->id ;
        }

        if (!empty ($iContentId) || !empty ($iContentTypeId))
        {
             $oContentTypePage = CContentType::getById (CONTENT_TYPE_PAGE_ID) ;

            if ($iContentTypeId == CONTENT_TYPE_PAGE_ID)
            {
                $oContent  = CContent::getById ($iContentId, $iContentTypeId) ;

                $oMenuDec->iContentId           = $iContentId ;
                $oMenuDec->iContentTypeId       = CONTENT_TYPE_PAGE_ID ;
                $oMenuDec->zContentLabel        = $oContent->titre ;
                $oMenuDec->zUrl                 = jUrl::get ("frontoffice~front:content", array ('type' => $iContentTypeId, 'content' => $iContentId)) ;

                $zClass = ($_iPageId == $iContentId) ? "class='active'" : "" ;
            }
            else
            {
                $oContentType               = CContentType::getById ($iContentTypeId, LANG_DEFAULT_ID) ;
                $oMenuDec->iContentTypeId   = $iContentTypeId ;
                $oMenuDec->zContentLabel    = $oContentType->zContentTypeTranslatableLabel ;
                $oMenuDec->zUrl             = jUrl::get ("frontoffice~front:type", array ('type' => $iContentTypeId)) ;

                $zClass = ($_iTypeId == $iContentTypeId) ? "class='active'" : "" ;
            }

           if (isset ($oMenuJson->children) && (!empty ($oMenuJson->children)))
            {
                $_zHtml .= '<a href="' . $oMenuDec->zUrl . '" title="' . $oMenuDec->zContentLabel . '">' . $oMenuDec->zContentLabel . '</a>' ;

                foreach ($oMenuJson->children as $oMenuDecChildren)
                {
                   self::walkTopMenuAndChildren ($oMenuDecChildren, $_zHtml) ;
                }
            }
            else
            {
                $_zHtml .= '<a href="' . $oMenuDec->zUrl . '" "' . $zClass . '" title="' . $oMenuDec->zContentLabel . '">' . $oMenuDec->zContentLabel . '</a>' ;
            }
        }
    }
}
?>