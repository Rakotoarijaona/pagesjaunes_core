<?php

/**
 * @package		common
 * @subpackage	common
 * @version		
 * @author		YSTA
 */

// hack for old version only
if (!function_exists ('boolval')) 
{
    function boolval ($val) 
    {
            return (bool) $val ;
    }
}
// hack for old version only

/**
 * Classe content les méthodes utilitaires
 *
 * Classe content les mthodes utilitaires
 * Toutes les mthodes de cette classes sont statiques
 */
final class CCommonTools
{

    /**
    * Date SQL vers Date Locale
    *
    * - Format local de date FR ! JJ/MM/AAAA
    * - Format local de date EN ! MM/JJ/AAAA
    *
    * @param    string      $_sDateSql      Date au format SQL
    * @return   string                      Date au format LOCALE
    */
    public static function dateSql2Locale ($_zDateSql = "", $_zFormat = "Y-m-d")
    {
        $zRes = $_zDateSql ;
        $zDateIn = date ($_zFormat, strtotime (str_replace ("/","-", $_zDateSql))) ;
        $zRes = preg_replace ('#^([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})$#', '\3/\2/\1' , $zDateIn) ;
        return $zRes ;
    }

    // Date time
    public static function dateTimeSql2Locale ($_zDateSql = "", $_zFormat = "Y-m-d H:i:s")
    {
        $zDateIn = date ($_zFormat, strtotime (str_replace ("/","-", $_zDateSql))) ;
        $zRes = preg_replace ('#^([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2}) (.*)?$#', '\3/\2/\1 \4' , $zDateIn) ;
        return $zRes ;
    }

    /**
    * Date locale vers SQL
    *
    * - Format local de date FR ! JJ/MM/AAAA
    * - Format local de date EN ! MM/JJ/AAAA
    *
    * @param    string      $_sDateLocale   Date au format LOCALE
    * @return   string                      Date au format SQL
    */
    public static function dateLocale2Sql ($_zDateLocale = "")
    {
        $zDateIn = date ("Y-m-d", strtotime (str_replace ("/","-", $_zDateLocale . " 00:00:00"))) ;
        $zRes = preg_replace ('#^([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})$#','\3-\2-\1' , $zDateIn) ;
        return $zRes ;
    }

    // Date time locale vers SQL
    public static function dateTimeLocale2Sql ($_zDateLocale = "")
    {
        $zRes = $_zDateLocale ;
        $zDateIn = date ("Y-m-d H:i:s", strtotime (str_replace ("/","-", $_zDateLocale))) ;
        $zRes = preg_replace ('#^([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4}) (.*)?$#','\3-\2-\1 \4' , $zDateIn) ;
        return $zRes ;
    }

    /**
    * Conversion personnalisée -> MAJUSCULE
    *
    * @param    string      $_sInputStr     Chaîne à traiter
    * @return   string                      Chaîne résultante
    */
    public static function strtoupper2 ($_sInputStr) 
    {
        if (!defined ("UC_CHARS"))
        {
            define ("UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖŒØŠÙÚÛÜÝŽÞ") ;
            define ("LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöœøšùúûüýžþ") ;
        }
        return (strtoupper (strtr ($_sInputStr, LC_CHARS, UC_CHARS))) ;
    }

    /**
    * Conversion personnalisée -> MINUSCULE
    *
    * @param    string      $_sInputStr     Chaîne à traiter
    * @return   string                      Chaîne résultante
    */
    public static function strtolower2 ($_sInputStr) 
    {
        if (!defined ("UC_CHARS"))
        {
            define ("UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖŒØŠÙÚÛÜÝŽÞ") ;
            define ("LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöœøšùúûüýžþ") ;
        }
        return (strtolower (strtr ($_sInputStr, UC_CHARS, LC_CHARS))) ;
    }

    /**
    * Epuration de tout caractère accentué
    *
    * @param    string      $_sInputStr     Chaîne à traiter
    * @return   string                      Chaîne résultante
    */
    public static function removeAccents ($_sInputStr) 
    {
        return strtr   (
                                utf8_decode ($_sInputStr), 
                                "ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy"
                        ) ;
    }

    // comparaison des clés pour 'array_diff_ukey'
    public static function keyCompare ($_iKeyOne, $_iKeyTwo)
    {
        if ($_iKeyOne == $_iKeyTwo)
        {
            return 0 ;
        }
        else if ($_iKeyOne > $_iKeyTwo)
        {
            return 1 ;
        }
        else
        {
            return -1 ;
        }
    }

    // Mettre en majuscle la première lettre
    public static function mb_ucfirst ($_sInputStr, $_sEncoding = 'UTF-8') 
    {
        
		$sRes = $_sInputStr ;
        
        if (!is_null ($_sInputStr) && ($_sInputStr != "")) 
        {
            $sRes = mb_strtoupper (mb_substr ($_sInputStr, 0, 1, $_sEncoding), $_sEncoding) . mb_substr ($_sInputStr, 1, mb_strlen ($_sInputStr, $_sEncoding) - 1, $_sEncoding) ;
        } 
            
        return $sRes ;

    }

    /**
    * Récupère l'extension d'un fichier
    *
    * @param    string      $_sFieldName     Nom de fichier à traiter
    * @return   string                      Extension
    */
    public static function getFileNameExtension ($_sFieldName)
    {
        if (preg_match ("/.+[\.](.*)$/", $_sFieldName, $tsMatches))
        {
            if (strlen ($tsMatches[1]) > 0)
            {
                return $tsMatches[1] ;
            }
        }
        return '' ;
    }

    /**
    * Générer un ALIAS pour un nom de fichier
    *
    * @param    string      $_sFieldName     Nom de fichier à traiter
    * @return   string                      Extension
    */
    public static function generateAliasFromFileName ($_sFieldName)
    {
        $sFileName = $_sFieldName ;
        $sExt = self::getFileNameExtension ($sFileName) ;
        $sNameSansExt = preg_replace ("/[.]" . $sExt . "$/", "", $sFileName) ;
        $sAliasSansExt = self::generateAlias ($sNameSansExt) ;
        $sAlias = $sAliasSansExt . '.' . $sExt ;

        return $sAlias ;
    }

    // redimensionnement et deplacement d'une image
    public static function resizePicture ($_sImagePath, $_sImageResPath, $_iMaxWidth = 0, $_iMaxHeight = 0)
	{

        @ini_set ("memory_limit", -1) ;

		$tsImageInfos = getimagesize ($_sImagePath) ;

		$sImageMimeType = $tsImageInfos["mime"] ;
		$tsTokens = explode ("/", $sImageMimeType) ;
		$sImageType = strtoupper (trim ($tsTokens[1])) ;

		$createImageFromXXX = "imageCreateFrom" . $sImageType ;
		$imageXXX = "image" . $sImageType ;

		$oImgSrc = $createImageFromXXX ($_sImagePath) ;
		$iWidth = $tsImageInfos[0] ;
		$iHeight = $tsImageInfos[1] ;
		$iOrigWidth = $iWidth ;
		$iOrigHeight = $iHeight ;

		if (($iWidth < $_iMaxWidth) && ($iHeight < $_iMaxHeight))
		{
			@copy ($_sImagePath, $_sImageResPath) ;
		}
		elseif (($iWidth >= $_iMaxWidth) && ($iHeight >= $_iMaxHeight))
		{

            $rRatioWidth = $_iMaxWidth / $iWidth ;
            $rRationHeight = $_iMaxHeight / $iHeight ;

            $rRatio = ($rRatioWidth < $rRationHeight)  ? $rRatioWidth : $rRationHeight ;

            $iWidth = ceil ($iWidth * $rRatio) ;
            $iHeight = ceil ($iHeight * $rRatio) ;

			$oNewImg = imageCreateTrueColor ($iWidth, $iHeight) ;
			imageCopyResampled ($oNewImg, $oImgSrc, 0, 0, 0, 0, $iWidth, $iHeight, $iOrigWidth, $iOrigHeight) ;
			$imageXXX ($oNewImg, $_sImageResPath) ;

		}
		elseif ($iWidth >= $_iMaxWidth)
		{
			
            $rRatioWidth = $_iMaxWidth / $iWidth ;

            $iWidth = ceil ($iWidth * $rRatioWidth) ;
            $iHeight = ceil ($iHeight * $rRatioWidth) ;

			$oNewImg = imageCreateTrueColor ($iWidth, $iHeight) ;
			imageCopyResampled ($oNewImg, $oImgSrc, 0, 0, 0, 0, $iWidth, $iHeight, $iOrigWidth, $iOrigHeight) ;
			$imageXXX ($oNewImg, $_sImageResPath) ;

		}
		else
		{
            
            $rRationHeight = $_iMaxHeight / $iHeight ;
			
            $iWidth = ceil ($iWidth * $rRationHeight) ;
            $iHeight = ceil ($iHeight * $rRationHeight) ;

			$oNewImg = imageCreateTrueColor ($iWidth, $iHeight) ;
			imageCopyResampled ($oNewImg, $oImgSrc, 0, 0, 0, 0, $iWidth, $iHeight, $iOrigWidth, $iOrigHeight) ;
			$imageXXX ($oNewImg, $_sImageResPath) ;

		}
		
        @chmod ($_sImageResPath, 0666) ;

	}


    /**
     * Récupération de la taille resizé d'une image
     *
     * @param		string		$_sImagePath
     * @param		int			$_iMaxWidth
     * @param		int			$_iMaxHeight
     * @return		array						[0] : width / [1] : height
     */
    public static function getResizedDimension ($_sImagePath, $_iMaxWidth, $_iMaxHeight)
    {
        $tiSize = getimagesize ($_sImagePath) ;
        $iWidth = $tiSize[0] ;
        $iHeight = $tiSize[1] ;
        if (($iWidth < $_iMaxWidth) && ($iHeight < $_iMaxHeight))
        {
        }
        elseif (($iWidth >= $_iMaxWidth) && ($iHeight >= $_iMaxHeight))
        {
            if (($iWidth / $_iMaxWidth) > ($iHeight / $_iMaxHeight))
            {
                while ($iWidth > $_iMaxWidth)
                {
                    $iWidth = intval ($iWidth * 0.95) ;
                    $iHeight = intval ($iHeight * 0.95) ;
                }
            }
            else
            {
                while ($iHeight > $_iMaxHeight)
                {
                    $iWidth = intval ($iWidth * 0.95) ;
                    $iHeight = intval ($iHeight * 0.95) ;
                }
            }
        }
        elseif ($iWidth >= $_iMaxWidth)
        {
            $iHeight = intval ($iHeight * round (($_iMaxWidth / $iWidth), 2)) ;
            $iWidth = intval ($_iMaxWidth) ;
        }
        else
        {
            $iWidth = intval ($iWidth * ($_iMaxHeight / $iHeight)) ;
            $iHeight = intval ($_iMaxHeight) ;
        }
        return array ($iWidth, $iHeight) ;
    }

    // upload standard
    public static function uploadImage_ ($_zFileName = "", $_zDestBasePath = "", $_zOrigFolderName = "", $_tzValidExt = array (), $_toFolderNameAndSize = array (), $_zMethodName = 'RESIZE')
    {
        $iErrorCode = 0 ;
        $zStoreName = "" ;
        $zFileType = "" ;
        $iFileSize = 0 ;

        if (isset ($_FILES[$_zFileName]["tmp_name"]) && is_uploaded_file ($_FILES[$_zFileName]["tmp_name"]))
        {
            $zFileName = $_FILES[$_zFileName]["name"] ;
            $zFileType = $_FILES[$_zFileName]["type"] ;
            $iFileSize = intval ($_FILES[$_zFileName]["size"]) ;
            $zDirTempName = $_FILES[$_zFileName]["tmp_name"] ;

            $zStoreName = strtotime (date ("Y-m-d H:i:s")) . "_" . self::generateAliasFromFileName ($zFileName) ;
            $zExt       = self::getFileNameExtension ($zFileName) ;

            $zOrigPath = (!empty ($_zOrigFolderName)) ? $_zDestBasePath . $_zOrigFolderName . "/" :  $_zDestBasePath ;

            if (!empty ($_tzValidExt))
            {
                if (in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                if ($iFileSize <= MAX_IMAGE_SIZE)
                {
                    if (@move_uploaded_file ($zDirTempName, $zOrigPath . $zStoreName))
                    {
                        if (!empty ($_toFolderNameAndSize))
                        {
                            foreach ($_toFolderNameAndSize as $zFolderName => $toFolderNameAndSize)
                            {
                                if (array_key_exists ("iWidth", $toFolderNameAndSize) && array_key_exists ("iHeight", $toFolderNameAndSize))
                                {
                                    self::resizePicture ($zOrigPath . $zStoreName, $_zDestBasePath . $zFolderName . "/" . $zStoreName, $toFolderNameAndSize ['iWidth'], $toFolderNameAndSize ['iHeight']) ;
                                }
                                else
                                {
                                    $iErrorCode = 5 ;
                                }
                            }
                        }
                    }
                    else
                    {
                        $iErrorCode = 4 ;
                    }
                }
                else
                {
                    $iErrorCode = 3 ;
                }
            }
        }
        else
        {
            $iErrorCode = 2 ;
        }

        return array ($zStoreName, $zFileType, $iFileSize, $iErrorCode) ;
    }

    //suppression standard
    public static function removeFile ($_zFileName = "", $_tzFilePath = array ())
    {
        // image principale
        foreach ($_tzFilePath as $_zFilePath)
        {
            if (is_file ($_zFilePath . $_zFileName))
            {
                unlink ($_zFilePath . $_zFileName) ;
            }
        }

        return true ;
    }

    // tester si fichier
    public static function isFile ($_zFileName = "", $_zFilePath = "")
    {
        $bIsFile = false ;

        if (is_file ($_zFilePath . $_zFileName))
        {
            $bIsFile = true ;
        }

        return $bIsFile ;
    }

    // strip tags
    public static function stripTags ($_string = "", $_filter = "")
    {
        $res = "" ;

        if ($_string != "")
        {
            $res = ($_filter != "" && is_string ($_filter)) ? strip_tags ($_string, $_filter) : strip_tags ($_string) ;
        }

        return $res ;
    }

    // --- tester si une valeur est vide
    public static function isVoidString ($_sString)
    {
        $bVoid = true ;

        $noSpaceStr = self::removeAllSpaceRetChar ($_sString) ;

        if (strlen ($noSpaceStr) > 0)
        {
            $bVoid = false ;
        }

        return $bVoid ;
    }

    // --- supprimer les espaces et les sauts des lignes
    public static function removeAllSpaceRetChar ($_value)
    {

        $val = strtolower (preg_replace ("/\s\s+/", "", $_value)) ;
        $val = htmlentities ($val) ;
        $val = str_replace (array ("&nbsp;", "&acirc;"), array ("", ""), $val) ;
        $val = preg_replace ("/\t\t+/", "", $val) ;
        $val = preg_replace ("/\n\n+/", "", $val) ;
        $val = preg_replace ("/\r\r+/", "", $val) ;

        return $val ;
    }

    // formatage d'une valeur string en float/double (2 chiffres après virgule)
    public static function formatIntoFloat ($_iValue = 0, $_iNbrAftComma = 2)
    {
        $sFormatedVal = false ;

        if (!empty ($_iValue))
        {

            if (preg_match ("/([0-9]+)((.|,)([0-9]+))?/", $_iValue))
            {
                $_iValue = trim ($_iValue) ;
                $_iValue = str_replace (",", ".", $_iValue) ;
                $sFormatedVal = number_format ($_iValue, $_iNbrAftComma, '.', '') ;

                if (preg_match ("/^([0-9]+).([0]+)$/", $sFormatedVal))
                {
                    $sFormatedVal = preg_replace ("/.([0]+)$/", "", $sFormatedVal) ;
                }
            }
        }
        
        return $sFormatedVal ;
    }

    //Troncature d'une chaîne
    public static function quietTruncate ($_sInputStr, $_iMaxLen, $_zLastStr = " . . . ")
    {
        $sRes = strip_tags ($_sInputStr) ;
        if (strlen ($sRes) > $_iMaxLen)
        {
            $sRes = mb_substr ($_sInputStr, 0, $_iMaxLen, "UTF-8") ;
            $sRes .= $_zLastStr ;
        }

        return $sRes ;
    }

    // Epuration de tout caractère spécial et ponctuation
    public static function removeSpecialChars ($_sInputStr) 
    {
        return strtr	(
                            $_sInputStr, 
                            "?,;.:/!§&#{[(|\\@)]=+}\$£*%><\"'©®™«»-_", 
                            "                                      "
                        ) ;
    }

    // Génération d'un alias pour les rewriting d'URL
    public static function generateAlias ($_sInputStr, $_zSeparator = "-")
    {
        $sAlias = mb_strtolower ($_sInputStr, "UTF-8") ;
        $sAlias = self::removeAccents ($sAlias) ;
        $sAlias = self::removeSpecialChars ($sAlias) ;
        $sAlias = str_replace ($_zSeparator, " ", $sAlias) ;
        $sAlias = trim ($sAlias) ;
        $sAlias = str_replace (" ", $_zSeparator, $sAlias) ;

        $sAlias2 = $sAlias ;
        do 
        {
            $sAlias = $sAlias2 ;
            $sAlias2 = str_replace ("--", "-", $sAlias2) ;
        } while ($sAlias2 != $sAlias) ;

        return $sAlias ;
    }

    // récupération de time à partir d'une datetime en us
    public static function getTime ($_sDateSql)
    {
        $sTime = "" ;

        if (preg_match ('#^([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2}) (.*)$#', $_sDateSql))
        {
            $toDates = explode (" ", $_sDateSql) ;
            $sTime = $toDates[count ($toDates) - 1] ;
        }

        return $sTime ;
    }

    // Génération d'une chaine aléatoire
    public static function getRandString ($iNbChar = 8, $sStr = 'azertyuiopqsdfghjklmwxcvbn123456789;?@+_!')
    {
        $iNbLetters = strlen($sStr) - 1 ;
        $sGeneration = '' ;

        for($i=0; $i < $iNbChar; $i++)
        {
            $iPos = mt_rand (0, $iNbLetters) ;
            $sChar = $sStr[$iPos] ;
            $sGeneration .= $sChar ;
        }

        return $sGeneration ;
    }

    // Envoi d'un email
    public static function sendEmail ($_zSender, $_zFromAddr, $_zFromName, $_toToAddrs, $_zSubject, $_zHtmlBody = "", $_tzAttachments = array (), $_toCcAddrs = array (), $_toBCcAddrs = array (), $_zCharset = "utf-8")
    {

        $oMailer = new jMailer () ;

        // create folder
        CCommonTools::createFolder (jApp::varPath () . 'mails', 0777) ;
        // create folder

        if ($_zHtmlBody != "")
        {
            $oMailer->isHTML (true) ;
        }
        
        $oMailer->Charset = $_zCharset ;
        $oMailer->Subject = $_zSubject ;

        $oMailer->ClearAllRecipients () ;

        $oMailer->From = $_zFromAddr ;
        $oMailer->FromName = $_zFromName ;

        $oMailer->Sender = $_zSender ;

        foreach ($_toToAddrs as $oToAddr)
        {
            $oMailer->AddAddress ($oToAddr) ;
        }

        foreach ($_toBCcAddrs as $oBCcAddr)
        {
            $oMailer->AddCC ($oBCcAddr) ;
        }

        $oMailer->Body = $_zHtmlBody ;

        // attachement
        foreach ($_tzAttachments as $zAttachment)
        {
            $oMailer->AddAttachment (jApp::varPath () . 'mails/' . $zAttachment, $zAttachment) ;
        }
        // attachement

        return $oMailer->Send () ;

    }

    // formater une date en chaîne de caractères
    public static function dateToStr ($_zDate = "", $_zFormat = "%A %d %B %Y")
    {
        setlocale (LC_TIME, 'fr_FR.utf8', 'fra') ;
        $zDate = str_replace ("/", "-", $_zDate . " 00:00:00") ;
        return strftime ($_zFormat, strtotime ($zDate)) ;
    }

    // Récupérer les informations concernant une image
    public static function getImageInfos ($_sImagePath = "", $_sImageName = "")
    {
        $sImage = $_sImagePath . $_sImageName ;
        if (file_exists ($sImage))
        {
            return getimagesize ($sImage) ;
        }
        else
        {
            return false ;
        }
    }

    // sql serialize
    public static function sqlSerialize ($_toValues = array ())
    {
        $sRes = "" ;
        if (!empty ($_toValues))
        {
            $toToReplace    = array ("{", "}") ;
            $toReplace      = array ("[", "]") ;
            $sRes           = str_replace ($toToReplace, $toReplace, serialize ($_toValues)) ;
        }

        return $sRes ;
    }

    // sql serialize
    public static function sqlUnserialize ($_sValue = "")
    {
        $toRes = array () ;
        if (!empty ($_sValue))
        {
            $toToReplace    = array ("[", "]") ;
            $toReplace      = array ("{", "}") ;
            $toRes          = unserialize (str_replace ($toToReplace, $toReplace, $_sValue)) ;
        }

        return $toRes ;
    }

    // Lire les tables contenu et noeud
    public static function getXmlContentsNodesTables ()
    {
        $oRes = null ;

        $sPath = jApp::configPath () . "tables.contents.nodes.xml" ;

        if (file_exists ($sPath))
        {
            $oXml = simplexml_load_file ($sPath) ;

            foreach ($oXml->{'table-node-content'} as $oTableNodeContent)
            {
                $oContentNode                   = new stdClass () ;
                $oContentNode->sTableName       = strval ($oTableNodeContent ["content"]) ;
                $oContentNode->sTableNodeName   = strval ($oTableNodeContent ["node"]) ;
                $oRes []                        = $oContentNode ;
            }
        }

        return $oRes ;
    }

    // pagination
    public static function getPagination ($_zAction = "", $_iDataCount = 0, $_iCurrPage = 1, $_iDataPerPage = NB_DATA_PER_PAGE, $_iLinkToDisplay = NB_LINK_TO_DISPLAY, $_toParams = array (), $_bUrlLink = true, $_zFunctionName = "paginate")
    {
        $zPagination = '' ;

        if (!empty ($_iDataCount))
        {
            $pagCount = ceil ($_iDataCount / $_iDataPerPage) ;

            $toTempPagination = array () ;
            for ($iTempPage = 1; $iTempPage <= $pagCount; $iTempPage++)
            {
                $toTempPagination [] = $iTempPage ;
            }

            $iMaxBorn = max ($toTempPagination) ;

            if ($pagCount > 1)
            {
                $tpagCount        = array_chunk ($toTempPagination, $_iLinkToDisplay) ;
                $iCurrPosition      = 0 ;

                $bShowLinkTruncPrev = false ;
                $bShowLinkTruncNext = false ;

                $iTruncPrevPage     = 0 ;
                $iTruncNextPage     = 0 ;

                foreach ($tpagCount as $iKey => $pagCount)
                {
                    if (in_array ($_iCurrPage, $tpagCount [$iKey]))
                    {
                        if (isset ($tpagCount [$iKey-1]))
                        {
                            $bShowLinkTruncPrev = true ;
                        }

                        if (isset ($tpagCount [$iKey+1]))
                        {
                            $bShowLinkTruncNext = true ;
                        }

                        $iTruncPrevPage = min ($tpagCount [$iKey]) - 1 ;
                        $iTruncNextPage = max ($tpagCount [$iKey]) + 1 ;

                        $iCurrPosition = $iKey ;
                    }
                }
                $tiCurrFragPagination = $tpagCount [$iCurrPosition] ;

                // bornes précédentes et suivantes
                $iPrevPosition = $iCurrPosition - 1 ;
                $iNextPosition = $iCurrPosition + 1 ;

                // bornes courantes
                $iCurrBornInf = min ($tiCurrFragPagination) ;
                $iCurrBornSup = max ($tiCurrFragPagination) ;

                $tiChunkBornSup = array () ;

                // bornes précédentes
                $iPrevBornInf = ($iPrevPosition >= 0) ? min ($tpagCount [$iPrevPosition]) : 0 ;
                $iPrevBornSup = ($iPrevPosition >= 0) ? max ($tpagCount [$iPrevPosition]) : 0 ;

                // bornes suivantes
                $iNextBornInf = (($iNextPosition >= 0) && isset ($tpagCount [$iNextPosition])) ? min ($tpagCount [$iNextPosition]) : 0 ;
                $iNextBornSup = (($iNextPosition >= 0) && isset ($tpagCount [$iNextPosition])) ? max ($tpagCount [$iNextPosition]) : 0 ;

                $zPrevClass = 'class="prev disabled"' ;
                $zPrevAction = "javascript:void(0);" ;
                $page = $_iCurrPage - 1 ;
                if ($page > 0)
                {
                    $_toParams ['page'] = $page ;
                    $zPrevAction = jUrl::get ($_zAction, $_toParams) ;
                    $zPrevClass = 'class="prev"' ;

                    if (!$_bUrlLink)
                    {
                        $zPrevAction = "javascript:" . $_zFunctionName . "($page);" ;
                    }
                }

                $zPagination .= '<li ' . $zPrevClass . '><a href="' . $zPrevAction . '" onclick="loadingShow();"><i class="fa fa-angle-double-left"></i></a></li>' ;

                if ($bShowLinkTruncPrev)
                {
                    $_toParams ['page'] = $iTruncPrevPage ;
                    $zPrevActionTrunc = jUrl::get ($_zAction, $_toParams) ;
                    if (!$_bUrlLink)
                    {
                        $zPrevActionTrunc = "javascript:" . $_zFunctionName . "($iTruncPrevPage);" ;
                    }

                    $zPagination .= '<li><a href="' . $zPrevActionTrunc . '" onclick="loadingShow();"> ... </a></li>' ;
                }

                // pagination centre
                for ($page = $iCurrBornInf; $page <= $iCurrBornSup; $page++)
                {
                    $_toParams ['page'] = $page ;
                    $zUrl = jUrl::get ($_zAction, $_toParams) ;
                    if (!$_bUrlLink)
                    {
                        $zUrl = "javascript:" . $_zFunctionName . "($page);" ;
                    }

                    $zClass = ($page == $_iCurrPage) ? 'class="active"' : '' ;
                    $zPagination .= '<li ' . $zClass . '><a href="' . $zUrl . '" onclick="loadingShow();">' . $page . '</a></li>' ;
                }
                // pagination centre

                $zNextClass = '' ;
                $page = $_iCurrPage + 1 ;
                $_toParams ['page'] = $page ;
                $zNextAction = jUrl::get ($_zAction, $_toParams) ;
                if (!$_bUrlLink)
                {
                    $zNextAction = "javascript:" . $_zFunctionName . "($page);" ;
                }

                if ($_iCurrPage == (max (array_keys ($toTempPagination)) + 1))
                {
                    $zNextClass = 'class="next disabled"' ;
                    $zNextAction = "javascript:void(0);" ;
                }
                else
                {
                    $zNextClass = 'class="next"' ;
                }

                if ($bShowLinkTruncNext)
                {
                    $_toParams ['page'] = $iTruncNextPage ;
                    $zNextActionTrunc = jUrl::get ($_zAction, $_toParams) ;
                    if (!$_bUrlLink)
                    {
                        $zNextActionTrunc = "javascript:" . $_zFunctionName . "($iTruncNextPage);" ;
                    }

                    $zPagination .= '<li><a href="' . $zNextActionTrunc . '" onclick="loadingShow();"> ... </a></li>' ;
                }

                $zPagination .= '<li ' . $zNextClass . '><a href="' . $zNextAction . '" onclick="loadingShow();"><i class="fa fa-angle-double-right"></i></a></li>' ;

            }
        }

        return $zPagination ;
    }

    // media ajax pagination
    public static function getMediaPagination ($_iDataCount = 0, $_iCurrPage = 1, $_iDataPerPage = NB_MEDIA_PER_PAGE_BO, $_iLinkToDisplay = NB_LINK_TO_DISPLAY)
    {
        $zPagination = '' ;

        if (!empty ($_iDataCount))
        {
            $pagCount = ceil ($_iDataCount / $_iDataPerPage) ;

            $toTempPagination = array () ;
            for ($iTempPage = 1; $iTempPage <= $pagCount; $iTempPage++)
            {
                $toTempPagination [] = $iTempPage ;
            }

            $iMaxBorn = max ($toTempPagination) ;

            if ($pagCount > 1)
            {
                $tpagCount        = array_chunk ($toTempPagination, $_iLinkToDisplay) ;
                $iCurrPosition      = 0 ;

                $bShowLinkTruncPrev = false ;
                $bShowLinkTruncNext = false ;

                $iTruncPrevPage     = 0 ;
                $iTruncNextPage     = 0 ;

                foreach ($tpagCount as $iKey => $pagCount)
                {
                    if (in_array ($_iCurrPage, $tpagCount [$iKey]))
                    {
                        if (isset ($tpagCount [$iKey-1]))
                        {
                            $bShowLinkTruncPrev = true ;
                        }

                        if (isset ($tpagCount [$iKey+1]))
                        {
                            $bShowLinkTruncNext = true ;
                        }

                        $iTruncPrevPage = min ($tpagCount [$iKey]) - 1 ;
                        $iTruncNextPage = max ($tpagCount [$iKey]) + 1 ;

                        $iCurrPosition = $iKey ;
                    }
                }
                $tiCurrFragPagination = $tpagCount [$iCurrPosition] ;

                // bornes précédentes et suivantes
                $iPrevPosition = $iCurrPosition - 1 ;
                $iNextPosition = $iCurrPosition + 1 ;

                // bornes courantes
                $iCurrBornInf = min ($tiCurrFragPagination) ;
                $iCurrBornSup = max ($tiCurrFragPagination) ;

                $tiChunkBornSup = array () ;

                // bornes précédentes
                $iPrevBornInf = ($iPrevPosition >= 0) ? min ($tpagCount [$iPrevPosition]) : 0 ;
                $iPrevBornSup = ($iPrevPosition >= 0) ? max ($tpagCount [$iPrevPosition]) : 0 ;

                // bornes suivantes
                $iNextBornInf = (($iNextPosition >= 0) && isset ($tpagCount [$iNextPosition])) ? min ($tpagCount [$iNextPosition]) : 0 ;
                $iNextBornSup = (($iNextPosition >= 0) && isset ($tpagCount [$iNextPosition])) ? max ($tpagCount [$iNextPosition]) : 0 ;

                $zPrevClass = 'class="prev disabled"' ;
                $zPrevAction = "javascript:void(0);" ;
                $page = $_iCurrPage - 1 ;
                if ($page > 0)
                {
                    $_toParams ['page'] = $page ;
                    $zPrevClass = 'class="prev"' ;
                    $zPrevAction = "javascript:paginate($page);" ;
                }

                $zPagination .= '<li ' . $zPrevClass . '><a href="' . $zPrevAction . '" onclick="loadingShow();"><i class="fa fa-angle-double-left"></i></a></li>' ;

                if ($bShowLinkTruncPrev)
                {
                    $_toParams ['page'] = $iTruncPrevPage ;
                    $zPrevActionTrunc = "javascript:paginate($iTruncPrevPage);" ;

                    $zPagination .= '<li><a href="' . $zPrevActionTrunc . '" onclick="loadingShow();"> ... </a></li>' ;
                }

                // pagination centre
                for ($page = $iCurrBornInf; $page <= $iCurrBornSup; $page++)
                {
                    $_toParams ['page'] = $page ;
                    $zUrl = "javascript:paginate($page);" ;

                    $zClass = ($page == $_iCurrPage) ? 'class="active"' : '' ;
                    $zPagination .= '<li ' . $zClass . '><a href="' . $zUrl . '" onclick="loadingShow();">' . $page . '</a></li>' ;
                }
                // pagination centre

                $zNextClass = '' ;
                $page = $_iCurrPage + 1 ;
                $_toParams ['page'] = $page ;
                $zNextAction = "javascript:paginate($page);" ;

                if ($_iCurrPage == (max (array_keys ($toTempPagination)) + 1))
                {
                    $zNextClass = 'class="next disabled"' ;
                    $zNextAction = "javascript:void(0);" ;
                }
                else
                {
                    $zNextClass = 'class="next"' ;
                }

                if ($bShowLinkTruncNext)
                {
                    $_toParams ['page'] = $iTruncNextPage ;
                    $zNextActionTrunc = "javascript:paginate($iTruncNextPage);" ;

                    $zPagination .= '<li><a href="' . $zNextActionTrunc . '" onclick="loadingShow();"> ... </a></li>' ;
                }

                $zPagination .= '<li ' . $zNextClass . '><a href="' . $zNextAction . '" onclick="loadingShow();"><i class="fa fa-angle-double-right"></i></a></li>' ;
            }
        }

        return $zPagination ;
    }

    // créer un dossier
    public static function createFolder ($_zPathAndFolder = "", $_iChmod = 0755, $_bRecursive = true)
    {
        $zPathAndFolder = false ;

        if (!empty ($_zPathAndFolder) && !is_dir ($_zPathAndFolder))
        {
            $oOld = umask (0) ;
            $bMkdir = mkdir ($_zPathAndFolder, $_iChmod, $_bRecursive) ;
            umask ($oOld) ;

            if ($bMkdir)
            {
                $zPathAndFolder = $_zPathAndFolder ;
            }
        }
        else
        {
            $zPathAndFolder = $_zPathAndFolder ;
        }

        return $zPathAndFolder ;
    }

    // upload image
    public static function uploadImage ($_zFileName = "", $_zPathAndFolder = "", $_tzValidExt = array (), $_bCreateFolderRecursive = true, $_iFoldersChmod = 0755, $_iFilesChmod = 0755, $_zNewName = "")
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;
        $zFinalName         = "" ;

        if (isset ($_FILES[$_zFileName]["tmp_name"]) && is_uploaded_file ($_FILES[$_zFileName]["tmp_name"]))
        {
            $zFileName = $_FILES[$_zFileName]["name"] ;
            $zFileType = $_FILES[$_zFileName]["type"] ;
            $iFileSize = intval ($_FILES[$_zFileName]["size"]) ;
            $zDirTempName = $_FILES[$_zFileName]["tmp_name"] ;

            $zStoreName = strtotime (date ("Y-m-d H:i:s")) . "_" . self::generateAliasFromFileName ($zFileName) ;
            $zExt       = strtolower (self::getFileNameExtension ($zFileName)) ;

            $zFinalName = (!empty ($_zNewName)) ? $_zNewName . "." . $zExt :  $zStoreName ;

            if (!empty ($_tzValidExt))
            {
                if (!in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                if ($iFileSize <= MAX_IMAGE_SIZE)
                {
                    $zPathAndFolder = self::createFolder ($_zPathAndFolder, $_iFoldersChmod, $_bCreateFolderRecursive) ;

                    if ($zPathAndFolder)
                    {
                        if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                        {
                            $oOld = umask (0) ;
                            chmod ($zPathAndFolder . "/" . $zFinalName, $_iFilesChmod) ;
                            umask ($oOld) ;
                        }
                        else
                        {
                            $iErrorCode = 4 ;
                        }
                    }
                    else
                    {
                        $iErrorCode = 3 ;
                    }
                }
                else
                {
                    $iErrorCode = 2 ;
                }
            }
        }

        return array ($zFinalName, $zPathAndFolder, $zFileType, $iFileSize, $iErrorCode) ;
    }

    // upload for multiple image
    public static function uploadForMultipleImage ($_tzFileInfos = array ("tmp_name" => "", "name" => "", "type" => "", "size" => ""), $_zPathAndFolder = "", $_tzValidExt = array (), $_bCreateFolderRecursive = true, $_iFoldersChmod = 0755, $_iFilesChmod = 0755, $_zNewName = "")
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;

        if (isset ($_tzFileInfos ["tmp_name"]) && is_uploaded_file ($_tzFileInfos ["tmp_name"]))
        {
            $zFileName = $_tzFileInfos ["name"] ;
            $zFileType = $_tzFileInfos ["type"] ;
            $iFileSize = intval ($_tzFileInfos ["size"]) ;
            $zDirTempName = $_tzFileInfos ["tmp_name"] ;

            $zStoreName = strtotime (date ("Y-m-d H:i:s")) . "_" . self::generateAliasFromFileName ($zFileName) ;
            $zExt       = strtolower (self::getFileNameExtension ($zFileName)) ;

            $zFinalName = (!empty ($_zNewName)) ? $_zNewName . "." . $zExt :  $zStoreName ;

            if (!empty ($_tzValidExt))
            {
                if (!in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                if ($iFileSize <= MAX_IMAGE_SIZE)
                {
                    $zPathAndFolder = self::createFolder ($_zPathAndFolder, $_iFoldersChmod, $_bCreateFolderRecursive) ;

                    if ($zPathAndFolder)
                    {
                        if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                        {
                            $oOld = umask (0) ;
                            chmod ($zPathAndFolder . "/" . $zFinalName, $_iFilesChmod) ;
                            umask ($oOld) ;
                        }
                        else
                        {
                            $iErrorCode = 4 ;
                        }
                    }
                    else
                    {
                        $iErrorCode = 3 ;
                    }
                }
                else
                {
                    $iErrorCode = 2 ;
                }
            }
        }

        return array ($zFinalName, $zPathAndFolder, $zFileType, $iFileSize, $iErrorCode) ;
    }

    // upload for multiple files
    public static function uploadForMultipleFile ($_tzFileInfos = array ("tmp_name" => "", "name" => "", "type" => "", "size" => ""), $_zPathAndFolder = "", $_tzValidExt = array (), $_bCreateFolderRecursive = true, $_iFoldersChmod = 0755, $_iFilesChmod = 0755, $_zNewName = "")
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;
        $zFinalName         = "" ;

        if (isset ($_tzFileInfos ["tmp_name"]) && is_uploaded_file ($_tzFileInfos ["tmp_name"]))
        {
            $zFileName = $_tzFileInfos ["name"] ;
            $zFileType = $_tzFileInfos ["type"] ;
            $iFileSize = intval ($_tzFileInfos ["size"]) ;
            $zDirTempName = $_tzFileInfos ["tmp_name"] ;

            $zStoreName = strtotime (date ("Y-m-d H:i:s")) . "_" . self::generateAliasFromFileName ($zFileName) ;
            $zExt       = strtolower (self::getFileNameExtension ($zFileName)) ;

            $zFinalName = (!empty ($_zNewName)) ? $_zNewName . "." . $zExt :  $zStoreName ;

            if (!empty ($_tzValidExt))
            {
                if (!in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                $zPathAndFolder = self::createFolder ($_zPathAndFolder, $_iFoldersChmod, $_bCreateFolderRecursive) ;

                if ($zPathAndFolder)
                {
                    if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                    {
                        $oOld = umask (0) ;
                        chmod ($zPathAndFolder . "/" . $zFinalName, $_iFilesChmod) ;
                        umask ($oOld) ;
                    }
                    else
                    {
                        $iErrorCode = 4 ;
                    }
                }
                else
                {
                    $iErrorCode = 3 ;
                }
            }
        }

        return array ($zFinalName, $zPathAndFolder, $zFileType, $iFileSize, $iErrorCode) ;
    }

    // upload video
    public static function uploadVideo ($_zFileName = "", $_zPathAndFolder = "", $_tzValidExt = array (), $_bCreateFolderRecursive = true, $_iFoldersChmod = 0755, $_iFilesChmod = 0755, $_zNewName = "")
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;

        if (isset ($_FILES[$_zFileName]["tmp_name"]) && is_uploaded_file ($_FILES[$_zFileName]["tmp_name"]))
        {
            $zFileName = $_FILES[$_zFileName]["name"] ;
            $zFileType = $_FILES[$_zFileName]["type"] ;
            $iFileSize = intval ($_FILES[$_zFileName]["size"]) ;
            $zDirTempName = $_FILES[$_zFileName]["tmp_name"] ;

            $zStoreName = self::generateAliasFromFileName ($zFileName) ;
            $zExt       = strtolower (self::getFileNameExtension ($zFileName)) ;
            $zFinalName = $zStoreName ;

            if (!empty ($_tzValidExt))
            {
                if (!in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                $zPathAndFolder = self::createFolder ($_zPathAndFolder, $_iFoldersChmod, $_bCreateFolderRecursive) ;

                if ($zPathAndFolder)
                {
                    if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                    {
                        $oOld = umask (0) ;
                        chmod ($zPathAndFolder . "/" . $zFinalName, $_iFilesChmod) ;
                        umask ($oOld) ;
                    }
                    else
                    {
                        $iErrorCode = 3 ;
                    }
                }
                else
                {
                    $iErrorCode = 2 ;
                }
            }
        }

        return array ($zFinalName, $zPathAndFolder, $zFileType, $iFileSize, $iErrorCode) ;
    }

    // upload fichier
    public static function uploadFile ($_zFileName = "", $_zPathAndFolder = "", $_tzValidExt = array (), $_bCreateFolderRecursive = true, $_iFoldersChmod = 0755, $_iFilesChmod = 0755)
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;
        $zExt               = "" ;
        $zFinalName         = "" ;

        if (isset ($_FILES[$_zFileName]["tmp_name"]) && is_uploaded_file ($_FILES[$_zFileName]["tmp_name"]))
        {
            $zFileName = $_FILES[$_zFileName]["name"] ;
            $zFileType = $_FILES[$_zFileName]["type"] ;
            $iFileSize = intval ($_FILES[$_zFileName]["size"]) ;
            $zDirTempName = $_FILES[$_zFileName]["tmp_name"] ;

            $zStoreName = self::generateAliasFromFileName ($zFileName, "-") ;
            $zExt       = strtolower (self::getFileNameExtension ($zFileName)) ;
            $zFinalName = $zStoreName ;

            $zPathAndFolder = self::createFolder ($_zPathAndFolder, $_iFoldersChmod, $_bCreateFolderRecursive) ;

            // rename file if already exists
            if (file_exists ($zPathAndFolder . "/" . $zFinalName))
            {
                $iExistFileCount = 1 ;
                while (file_exists ($zPathAndFolder . "/" . $zStoreName . "-" . $iExistFileCount . "." . $zExt))
                {
                    $iExistFileCount++ ;
                }

                 $zFinalName = $zStoreName . "-" . $iExistFileCount . "." . $zExt ;
            }

            if (!empty ($_tzValidExt))
            {
                if (!in_array ($zExt, $_tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (empty ($iErrorCode))
            {
                if ($zPathAndFolder)
                {
                    if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                    {
                        $oOld = umask (0) ;
                        chmod ($zPathAndFolder . "/" . $zFinalName, $_iFilesChmod) ;
                        umask ($oOld) ;
                    }
                    else
                    {
                        $iErrorCode = 3 ;
                    }
                }
                else
                {
                    $iErrorCode = 2 ;
                }
            }
        }

        return array ($zFinalName, $zPathAndFolder, $zFileType, $iFileSize, $iErrorCode, $zExt) ;
    }

    // pagination 2
    public static function getPagination_ ($_zNomPage = '', $_iNbPage = 1, $_pag = 1, $_zFieldOrder = '', $_zSortSens = '')
    {
        $zPagination = '' ;

        if ($_iNbPage > 1 && !empty ($_zNomPage))
        {
            $tpag = array () ;

            $iNbPageTotal = $_iNbPage ;

            for ($iNumeroPage = 1; $iNumeroPage <= $_iNbPage; $iNumeroPage++)
            {
                $tpag [] = $iNumeroPage ;
            }

            $tpag = array_chunk ($tpag, NB_PAGINATION) ;

            $iPaginationDivision = sizeof ($tpag) ;

            $_iNbPage = ($iPaginationDivision > 1) ? NB_PAGINATION : $_iNbPage ;

            $iCurrPosition = 0 ;

            if ($iPaginationDivision > 1)
            {
                foreach ($tpag as $iKey => $tiSubFraction)
                {
                    if (in_array ($_pag, $tiSubFraction))
                    {
                        $iCurrPosition = $iKey ;
                    }
                }
            }

            $iMinPosition = min (array_keys ($tpag)) ;
            $iMaxPosition = max (array_keys ($tpag)) ;

            $iCurrBornInf = min ($tpag [$iCurrPosition]) ;
            $iCurrBornMax = max ($tpag [$iCurrPosition]) ;

            $iNextBornInf = ($iCurrPosition < $iMaxPosition) ? min ($tpag [$iCurrPosition + 1]) : min ($tpag [$iCurrPosition]) ;
            $iNextBornMax = ($iCurrPosition < $iMaxPosition) ? max ($tpag [$iCurrPosition + 1]) : max ($tpag [$iCurrPosition]) ;

            $iPrevBornInf = ($iCurrPosition > $iMinPosition) ? min ($tpag [$iCurrPosition - 1]) : min ($tpag [$iCurrPosition]) ;
            $iPrevBornMax = ($iCurrPosition > $iMinPosition) ? max ($tpag [$iCurrPosition - 1]) : max ($tpag [$iCurrPosition]) ;

            $zPagination .= '<div class="pagination" align="center">' ;
            $zPagination .= '<ul>' ;

            $pagPrec = $_pag - 1 ;

            $zPagination .= '<li ' ;
            if ($_pag <= 1)
            {
                $zPagination .= 'class="disabled"' ;
            }
            $zPagination .= ' >' ;
            
            $zPagination .= '<a href="' ;
            if ($iNbPageTotal > 1)
            {
                $zPagination .= 'index.php?nompage=' . $_zNomPage  . '&page=' ;
                $zPagination .= $pagPrec ;
                $zPagination .= '&sens=' ;
                $zPagination .= $_zSortSens ;
                $zPagination .= '&field=' ;
                $zPagination .= $_zFieldOrder ;
            }
            else
            {
                $zPagination .= 'javascript:void(0);' ;
            }
            $zPagination .= '" >' ;
            $zPagination .= '<</a></li>';

            if ($iCurrPosition > $iMinPosition)
            {
                $zPagination .= '<li><span>' ;
                $zPagination .= '...' ;
                $zPagination .= '</span></li>' ;
            }

            for ($iNumPage = $iCurrBornInf; $iNumPage <= $iCurrBornMax; $iNumPage++)
            {
                if ($iNumPage == $_pag)
                {
                    $zPagination .= '<li ' ;
                    if ($_pag == $iNumPage) 
                    {
                        $zPagination .= 'class="active"' ;
                    }
                    $zPagination .= ' >' ;

                    $zPagination .= '<span' ;
                    $zPagination .= $iNumPage ;
                    $zPagination .= '</span></li>' ;
                }
                else
                {
                    $zPagination .= '<li><a href="index.php?nompage=' . $_zNomPage  . '&page=' ;
                    $zPagination .= $iNumPage ;
                    $zPagination .= '&sens=' ;
                    $zPagination .= $_zSortSens ;
                    $zPagination .= '&field=' ;
                    $zPagination .= $_zFieldOrder ;
                    $zPagination .= '">' ;
                    $zPagination .= $iNumPage ;
                    $zPagination .= '</a></li>' ;
                }

            }

            if ($iMaxPosition > $iCurrPosition)
            {
                $zPagination .= '<li><span>' ;
                $zPagination .= '...' ;
                $zPagination .= '</span></li>' ;
            }

            $pagSuiv  = $_pag + 1 ;
            $zPagination .= '<li ' ;
            if ($iNbPageTotal == $_pag)
            {
                $zPagination .= 'class="disabled"' ;
            }
            $zPagination .= '>' ;
            $zPagination .= '<a href="' ;

            if ($iNbPageTotal != $_pag)
            {
                $zPagination .= 'index.php?nompage=' . $_zNomPage  . '&page=' ;
                $zPagination .= $pagSuiv ;
                $zPagination .= '&sens=' ;
                $zPagination .= $_zSortSens ;
                $zPagination .= '&field=' ;
                $zPagination .= $_zFieldOrder ;
            }
            else
            {
                $zPagination .= 'javascript:void(0);' ;
            }

            $zPagination .= '">></a></li>';

            $zPagination .= '</ul>' ;
            $zPagination .= '</div>' ;
        }

        return $zPagination ;
    }

    // set message session
    public static function setMessageSession ($_zMessageName = "", $_zMessageValue = "")
    {
        $_SESSION [$_zMessageName] = $_zMessageValue ;
    }

    // set message session
    public static function getMessageSession ($_zMessageName = "")
    {
        return isset ($_SESSION [$_zMessageName]) ? $_SESSION [$_zMessageName] : "" ;
    }

    // remove message session
    public static function unsetMessageSession ($_zMessageName = "")
    {
        if (isset ($_SESSION [$_zMessageName]))
        {
            unset ($_SESSION [$_zMessageName]) ;
        }
    }

    public static function truncateFilename ($_zInputStr, $_iMaxLen = 25)
    {
        $zRes = $_zInputStr ;
        $zExt = "" ;
        $tzMatches = array () ;

        if (strlen ($zRes) > $_iMaxLen)
        {
            $zRes = mb_substr ($_zInputStr, 0, $_iMaxLen, "UTF-8") ;

            // extension
            if (preg_match ("/.+[\.](.*)$/", $_zInputStr, $tzMatches))
            {
                if (strlen ($tzMatches [1]) > 0)
                {
                    $zExt = $tzMatches [1] ;
                }
            }

            $zRes .= "[...]." . $zExt ;
        }

        return $zRes ;
    }

    // pagination
    public static function getPaginationAjax ($_pag = 1, $_iDatacount = 0, $_iNbPerPage = NB_DATA_PER_PAGE)
    {
        $zPagination = '' ;

        $iNbPage = ceil ($_iDatacount / $_iNbPerPage) ;

        if ($iNbPage > 1)
        {
            $tpag = array () ;

            $iNbPageTotal = $iNbPage ;

            for ($iNumeroPage = 1; $iNumeroPage <= $iNbPage; $iNumeroPage++)
            {
                $tpag [] = $iNumeroPage ;
            }

            $tpag = array_chunk ($tpag, NB_LINK_TO_DISPLAY) ;

            $iPaginationDivision = sizeof ($tpag) ;

            $iNbPage = ($iPaginationDivision > 1) ? NB_LINK_TO_DISPLAY : $iNbPage ;

            $iCurrPosition = 0 ;

            if ($iPaginationDivision > 1)
            {
                foreach ($tpag as $iKey => $tiSubFraction)
                {
                    if (in_array ($_pag, $tiSubFraction))
                    {
                        $iCurrPosition = $iKey ;
                    }
                }
            }

            $iMinPosition = min (array_keys ($tpag)) ;
            $iMaxPosition = max (array_keys ($tpag)) ;

            $iCurrBornInf = min ($tpag [$iCurrPosition]) ;
            $iCurrBornMax = max ($tpag [$iCurrPosition]) ;

            $iNextBornInf = ($iCurrPosition < $iMaxPosition) ? min ($tpag [$iCurrPosition + 1]) : min ($tpag [$iCurrPosition]) ;
            $iNextBornMax = ($iCurrPosition < $iMaxPosition) ? max ($tpag [$iCurrPosition + 1]) : max ($tpag [$iCurrPosition]) ;

            $iPrevBornInf = ($iCurrPosition > $iMinPosition) ? min ($tpag [$iCurrPosition - 1]) : min ($tpag [$iCurrPosition]) ;
            $iPrevBornMax = ($iCurrPosition > $iMinPosition) ? max ($tpag [$iCurrPosition - 1]) : max ($tpag [$iCurrPosition]) ;

            $zPagination .= '<div class="pagination" align="center">' ;
            $zPagination .= '<ul>' ;

            $pagPrec = $_pag - 1 ;

            $zPagination .= '<li ' ;
            if ($_pag <= 1)
            {
                $zPagination .= 'class="disabled"' ;
            }
            $zPagination .= ' >' ;
            
            $zPagination .= '<a href="' ;
            if ($iNbPageTotal > 1)
            {
                $zPagination .= 'javascript:paginate(' . $pagPrec . '); ' ;
            }
            else
            {
                $zPagination .= 'javascript:void(0);' ;
            }
            $zPagination .= '">' ;
            $zPagination .= '<i class="glyphicon glyphicon-chevron-left"></i></a></li>';

            if ($iCurrPosition > $iMinPosition)
            {
                $zPagination .= '<li><a href="javascript:paginate(' . $iPrevBornMax . ')" title="' . $iPrevBornMax . '"><span>' ;
                $zPagination .= '...' ;
                $zPagination .= '</span></a></li>' ;
            }

            for ($iNumPage = $iCurrBornInf; $iNumPage <= $iCurrBornMax; $iNumPage++)
            {
                if ($iNumPage == $_pag)
                {
                    $zPagination .= '<li ' ;
                    if ($_pag == $iNumPage) 
                    {
                        $zPagination .= 'class="active"' ;
                    }
                    $zPagination .= ' >' ;

                    $zPagination .= '<span>' ;
                    $zPagination .= $iNumPage ;
                    $zPagination .= '</span></li>' ;
                }
                else
                {
                    $zPagination .= '<li><a href="javascript:paginate(' . $iNumPage . '); ' ;
                    $zPagination .= '" title="' . $iNumPage . '">' ;
                    $zPagination .= $iNumPage ;
                    $zPagination .= '</a></li>' ;
                }

            }

            if ($iMaxPosition > $iCurrPosition)
            {
                $zPagination .= '<li><a href="javascript:paginate(' . $iNextBornInf . ')" title="' . $iNextBornInf . '"><span>' ;
                $zPagination .= '...' ;
                $zPagination .= '</span></a></li>' ;
            }

            $pagSuiv  = $_pag + 1 ;
            $zPagination .= '<li ' ;
            if ($iNbPageTotal == $_pag)
            {
                $zPagination .= 'class="disabled"' ;
            }
            $zPagination .= '>' ;
            $zPagination .= '<a href="' ;

            if ($iNbPageTotal != $_pag)
            {
                $zPagination .= 'javascript:paginate(' . $pagSuiv . '); ' ;
            }
            else
            {
                $zPagination .= 'javascript:void(0);' ;
            }

            $zPagination .= '"><i class="glyphicon glyphicon-chevron-right"></i></a></li>';

            $zPagination .= '</ul>' ;
            $zPagination .= '</div>' ;
        }

        return $zPagination ;
    }

    // met une valeur dans une session
    public static function setSession ($_zSessName = "", $_oSessionValue = "")
    {
        $_SESSION [$_zSessName] = $_oSessionValue ;
    }

    // met une valeur dans une session
    public static function getSession ($_zSessName = "", $_oDefaultValue = "", $_bUnset = false)
    {
        $oRes = $_oDefaultValue ; 
        
        if (isset ($_SESSION [$_zSessName]))
        {
            $oRes = $_SESSION [$_zSessName] ;
        }

        if ($_bUnset)
        {
            unset ($_SESSION [$_zSessName]) ;
        }

        return $oRes ;
    }

    // suppprimer une session
    public static function unsetSession ($_zSessName = "")
    {
        if (isset ($_SESSION [$_zSessName]))
        {
            unset ($_SESSION [$_zSessName]) ;
        }
    }

    // setting
    public static function initSetting ()
    {
        $oFact = jDao::get ('common~setting') ;
        $toRes = $oFact->findAll () ;

        $toFetchedRes = $toRes->fetchAll () ;

        foreach ($toFetchedRes as $oSetting)
        {
            switch ($oSetting->setting_type)
            {
                case 'integer' :
                    DEFINE ($oSetting->setting_constant, intval ($oSetting->setting_value)) ;
                    break ;
                case 'float' :
                    DEFINE ($oSetting->setting_constant, floatval ($oSetting->setting_value)) ;
                    break ;
                case 'double' :
                    DEFINE ($oSetting->setting_constant, doubleval ($oSetting->setting_value)) ;
                    break ;
                case 'string' :
                default :
                    DEFINE ($oSetting->setting_constant, $oSetting->setting_value) ;
                    break ;
            }
        }
    }

    // table
    public static function getTableConcerned ($_zTableName = "", $_zTableId = "")
    {
        return $zTable = array  (
                                    "iUserId"       => $_zTableName . "_userId",
                                    "iConcernedId"  => $_zTableName . "_" . $_zTableId,
                                    "zDate"         => $_zTableName . "_date"
                                ) ;
    }

    // génération de mot de passe
    public static function randomString ($_iLen = 6)
    {
        $zAlphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789" ;

        $zPass = '' ;

        $iAlphaLength = strlen ($zAlphabet) - 1 ;

        for ($i = 0 ; $i < $_iLen ; $i++)
        {
            $n = mt_rand (0, $iAlphaLength) ;
            $zPass = $zPass.$zAlphabet [$n] ;
        }

        return $zPass ;
    }

    // génération de mot de passe
    public static function randomCaptcha ($_iLen = 5)
    {
        $zAlphabet = "abcdefghijklmnopqrstuwxy0123456789" ;

        $zPass = '' ;

        $iAlphaLength = strlen ($zAlphabet) - 1 ;

        for ($i = 0 ; $i < $_iLen ; $i++)
        {
            $n = mt_rand (0, $iAlphaLength) ;
            $zPass = $zPass.$zAlphabet [$n] ;
        }

        return $zPass ;
    }

    // random d'un tableau
    public static function randomArray ($_toTab = array ())
    {
        return $_toTab [array_rand ($_toTab)] ;
    }

    // test if is uploaded file
    public static function isUploadedFile ($_oFile = null, $_bIsMultiple = false)
    {
        $bExist = false ;

        if ($_bIsMultiple)
        {
            if (isset ($_oFile ["tmp_name"]) && is_uploaded_file ($_oFile ["tmp_name"]))
            {
                $bExist = true ;
            }
        }
        else
        {
            if (isset ($_FILES[$_oFile]["tmp_name"]) && is_uploaded_file ($_FILES[$_oFile]["tmp_name"]))
            {
                $bExist = true ;
            }
        }

        return $bExist ;
    }

    // post ou get value
    public static function postGetValue ($_zName = "", $_zDefaultValue = null)
    {
        $oRes = $_zDefaultValue ;

        if (isset ($_GET [$_zName]))
        {
            $oRes = $_GET [$_zName] ;
        }
        elseif (isset ($_POST [$_zName]))
        {
            $oRes = $_POST [$_zName] ;
        }

        return $oRes ;
    }

    // test if post ou get isset value
    public static function isIsset ($_zName = "")
    {
        $bIsIsset = false ;

        if (isset ($_GET [$_zName]))
        {
            $bIsIsset = true ;
        }
        elseif (isset ($_POST [$_zName]))
        {
            $bIsIsset = true ;
        }

        return $bIsIsset ;
    }


    // get file name without extension
    public static function getNoExtFileName ($_zFileName = "")
    {
       return preg_replace ('#^(.*)[.](.*)$#', '\1' , $_zFileName) ;
    }

    // doc thumbnail
    function setDocImage ($_toFileUploadInfos = array ())
    {
        if (sizeof ($_toFileUploadInfos) == 6)
        {
            $tzAllowedDoc = array ("pdf","jpeg","jpg","gif","tiff","png") ;
            if (in_array ($_toFileUploadInfos [5], $tzAllowedDoc))
            {
                // upload path
                $zOriginalPathAndFolder = IMG_DOC_UPLOAD_PATH . "/" . IMG_FOLDER_ORIGINAL ;
                $zThumbPathAndFolder    = IMG_DOC_UPLOAD_PATH . "/" . IMG_FOLDER_THUMB ;
                $zMediumPathAndFolder   = IMG_DOC_UPLOAD_PATH . "/" . IMG_FOLDER_MEDIUM ;

                // create folders
                CCommonTools::createFolder ($zOriginalPathAndFolder, 0777, true) ;
                CCommonTools::createFolder ($zThumbPathAndFolder, 0777, true) ;
                CCommonTools::createFolder ($zMediumPathAndFolder, 0777, true) ;

                // sizes
                $zThumbWidth    = THUMB_WIDTH_DOCIMAGE ;
                $zThumbHeight   = THUMB_HEIGHT_DOCIMAGE ;

                $zMediumWidth    = MEDIUM_WIDTH_DOCIMAGE ;
                $zMediumHeight   = MEDIUM_HEIGHT_DOCIMAGE ;

                $zDocNameAndPath = DOC_UPLOAD_PATH . "/" . $_toFileUploadInfos [0] ;

                $zDesNameAndPath = $zOriginalPathAndFolder . "/" . CCommonTools::getNoExtFileName ($_toFileUploadInfos [0]) . ".jpg" ;

                if ($_toFileUploadInfos [5] == "pdf")
                {
                    exec ("convert -density 100x100 {$zDocNameAndPath}[0] -quality 100 {$zDesNameAndPath}") ;
                }
                else
                {
                    exec ("convert -density 100x100 {$zDocNameAndPath} -quality 100 {$zDesNameAndPath}") ;
                }

                $zDesNameAndPathThumb = $zThumbPathAndFolder . "/" . CCommonTools::getNoExtFileName ($_toFileUploadInfos [0]) . ".jpg" ;

                 $zDesNameAndPathMedium = $zMediumPathAndFolder . "/" . CCommonTools::getNoExtFileName ($_toFileUploadInfos [0]) . ".jpg" ;

                 exec ("convert -density 100x100 {$zDesNameAndPath} -resize {$zThumbWidth} -quality 100 {$zDesNameAndPathThumb}") ;

                exec ("convert -density 100x100 {$zDesNameAndPath} -resize {$zMediumWidth} -quality 100 {$zDesNameAndPathMedium}") ;
            }
        }
    }

    // nom de domaine et protocole de transfert
    public static function getDomainAndScheme ()
    {
        $zScheme = "http" ;
        if (isset ($_SERVER ["HTTPS"]) && !empty ($_SERVER ["HTTPS"]) && ($_SERVER ["HTTPS"] != 'off'))
        {
            $zScheme = "https" ;
        }
        return $zScheme . "://" . $_SERVER ["HTTP_HOST"] ;

    }

    // set session
    public static function initCaptchaSession ()
    {
        $zChaptcha = CCommonTools::randomCaptcha (5) ;
        $_SESSION [session_id ()] ["SESS_CAPTCHA"] = md5 ($zChaptcha) ;

        return $zChaptcha ;
    }

    // check if correct captcha
    public static function isCorrectCaptcha ($_zCaptcha = "")
    {
        return ($_SESSION [session_id ()] ["SESS_CAPTCHA"] == trim (md5 ($_zCaptcha))) ? true : false ;
    }

    // remove session captcha
    public static function removeCaptcha ()
    {
        if (isset ($_SESSION [session_id ()] ["SESS_CAPTCHA"]))
        {
            unset ($_SESSION [session_id ()] ["SESS_CAPTCHA"]) ;
        }
    }

    // assign defined constants
    public static function assignDefinedConstants ($_oTpl = null)
    {
        $toConstants = get_defined_constants (true) ;
        $toConstants = $toConstants ["user"] ;

        foreach ($toConstants as $zConstantName => $oValue)
        {
            $oType = gettype ($oValue) ;

            switch ($oType)
            {
                case 'boolean' :
                    $_oTpl->assign ($zConstantName, boolval ($oValue)) ;
                    break ;
                case 'integer' :
                    $_oTpl->assign ($zConstantName, intval ($oValue)) ;
                    break ;
                case 'double' :
                    $_oTpl->assign ($zConstantName, doubleval ($oValue)) ;
                    break ;
                case 'string' :
                    $_oTpl->assign ($zConstantName, strval ($oValue)) ;
                break ;
                case 'array' :
                case 'object' :
                case 'resource' :
                case NULL :
                case "unknown type" :
                    $_oTpl->assign ($zConstantName, $oValue) ;
                break ;
                default :
                    $_oTpl->assign ($zConstantName, $oValue) ;
                break ;
            }
        }
    }

    // unset array
    // remove session captcha
    public static function unsetArrayValue (&$_toArray = array () , $_oIndex = null)
    {
        if (is_array ($_toArray) && !empty ($_oIndex))
        {
            if (isset ($_toArray [$_oIndex]))
            {
                unset ($_toArray [$_oIndex]) ;
            }
        }
    }

    // encodage dao rec
    public static function encodeDaoRecUtf8 (&$_oRec)
    {
        foreach ($_oRec as $oKey => $oValue)
        {
            if (is_string ($oValue))
            {
                $_oRec->$oKey = utf8_encode ($oValue) ;
            }
        }
    }

    // decodate dao rec
    public static function decodeDaoRecUtf8 (&$_oRec)
    {
        foreach ($_oRec as $oKey => $oValue)
        {
            if (is_string ($oValue))
            {
                $_oRec->$oKey = utf8_decode ($oValue) ;
            }
        }
    }

    // generate select2 json curr year
    public static function select2DataCurrYears ()
    {
        $tzCurYears = array () ;
        $zYear = date ('Y', strtotime ('+1 year')) ;
        while ($zYear > 1910)
        {
            $zYear = $zYear - 1 ;
            $tzCurYears [] = array ("id" => "$zYear", "text" => "$zYear") ;
        }
        return json_encode ($tzCurYears) ;
    }

    // htmlentities
    public static function entitiesDecode ($_zText = "")
    {
        return html_entity_decode ($_zText) ;
    }

    // get uploaded file infos
    public static function getUploadedFileExt ($_zFileName = "")
    {
        $zExtension = array () ;

        if (isset ($_FILES [$_zFileName]["tmp_name"]) && is_uploaded_file ($_FILES [$_zFileName]["tmp_name"]))
        {
            $zExtension = pathinfo ($_FILES[$_zFileName]['name'], PATHINFO_EXTENSION) ;
        }

        return strtolower ($zExtension) ;
    }

    // get nestable menu depth
    public function getNestableDepth ($oNestable, &$_iLen)
    {
        if (isset ($oNestable->children) && sizeof ($oNestable->children) > 0)
        {
            $_iLen += 1 ;
            foreach ($oNestable->children as $oNest)
            {
                self::getNestableDepth ($oNest, $_iLen) ;
            }
        }
    }

    // convert file size
    function convertFileSize ($_iSize, $_iAccuracy = 2)
    {
        $tzUnits = array ('b','Kb','Mb','Gb') ;
        $zOutput = "" ;

        foreach($tzUnits as $iIndex => $zUnit)
        {
            $iDiv = pow (1024, $iIndex) ;
            if ($_iSize > $iDiv) $zOutput = number_format ($_iSize/$iDiv, $_iAccuracy) . $zUnit ;
        }

        return $zOutput ;
    }

    // clean temp
    public static function cleanCurrentFile ($_zFilePath, $_bToRemove = false)
    {
        if (filetype ($_zFilePath) == "dir")
        {
            $oDir = opendir ($_zFilePath) ;
            while (($zCurrEntry = readdir ($oDir)) !== false)
            {
                if ($zCurrEntry != "." && $zCurrEntry != "..")
                {
                    CCommonTools::cleanCurrentFile ($_zFilePath . "/" . $zCurrEntry, true) ;
                }
            }
            if ($_bToRemove)
            {
                rmdir ($_zFilePath) ;
            }
        }
        elseif (filetype ($_zFilePath) == "file")
        {
            if ($_bToRemove)
            {
                unlink ($_zFilePath) ;
            }
        }
    }

    // change en datetime into string
    public static  function dateTimeToString ($_zDate, $_zFormat = "%A %d %B %Y - %I:%M")
    {
        $zLang = jApp::config ()->locale ;
        if ($zLang == 'fr_FR')
        {
            setlocale (LC_TIME, 'fr_FR.utf8', 'fra') ;
        }

        $zFormat = "%A %d %B %Y - %I:%M" ;
        if (!empty ($_zFormat))
        {
            $zFormat = $_zFormat ;
        }
        else
        {
            if ($zLang == 'fr_FR')
            {
                $zFormat = "%A %d %B %Y - %I:%M" ;
            }
            elseif ($zLang == 'en_US')
            {
                $zFormat = "%b %d, %Y - %H:%M %p" ;
            }
        }

        $zDate = str_replace ("/", "-", $_zDate) ;
        return utf8_encode (strftime ($zFormat, strtotime ($zDate))) ;
    }

    // change en datetime into string
    public static function dateTime ($_zDate, $zFormat = "Y-m-d")
    {
        $zDate = str_replace ("/", "-", $_zDate) ;
        return date ($zFormat, strtotime ($zDate)) ;
    }

    /**
     * Date SQL vers Date Locale (dynamic)
     */
    public static function dynDateSql2Locale($dateSql = "")
    {
        $lang = jApp::config()->locale;
        $res = $dateSql;
        switch($lang) {
            case "en_EN" :
            case "en_US" :
                $res = date("Y-m-d", strtotime(str_replace("/","-", $dateSql)));
            break;
            case "fr_FR" :
                $res = date("d/m/Y", strtotime(str_replace("/","-", $dateSql)));
            break;
            default:
            break;
        }
        return $res;
    }

    // get days num from now
    public static function getDaysNumFromNow($date = "", $step = 0, $inFormat = "Y-m-d H:i:s")
    {
        if (!empty($date)) {
            $date = ($step > 1) ? date($inFormat, strtotime($date . " +" . $step . "days")) : $date;
            $dateTimeOne = new DateTime($date);
            $dateTimeTwo = new DateTime('now');
            $interval = $dateTimeTwo->diff($dateTimeOne);
            return (int)$interval->format('%R%a');
        } else {
            return false;
        }
    }

    // get nex date from a given date
    public static function getNextDate($date = "", $step = 0, $outputFormat = "Y-m-d H:i:s")
    {
        if (!empty($date)) {
            return ($step > 1) ? date($outputFormat, strtotime($date . " +" . $step . "days")) : $date;
        } else {
            return false;
        }
    }

    // get days from now
    public static function getDateFromNow($date = "", $step = 0, $outFormat = 'Y-m-d H:i:s', $inFormat = "Y-m-d H:i:s")
    {
        if (!empty($date)) {
            $date = ($step > 1) ? date($inFormat, strtotime($date . " +" . $step . "days")) : $date;
            $dateTimeOne = new DateTime($date);
            $dateTimeTwo = new DateTime('now');
            $interval = $dateTimeTwo->diff($dateTimeOne);
            $dayDiff = (int)$interval->format('%R%a');
            if ($dayDiff > 0) {
                $strDiff = ($dayDiff == 1) ? "day" : "days";
                return date($outFormat, strtotime("now +" . $dayDiff . $strDiff));
            } elseif($dayDiff == 0) {
                return date($outFormat, strtotime("now"));
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // calculer les nombres de jour entre deux dates
    public static function getDatesDelay($dateOne = "", $dateTwo = "", $outputFormat = "%R%a")
    {
        $dateStart = new DateTime($dateOne);
        $dateEnd = new DateTime($dateTwo);
        $dateDiff = $dateStart->diff($dateEnd);
        return $dateDiff->format($outputFormat);
    }

    //------------------//
    // R Datetimes fonctions
    //------------------//
    // Uses jelix JDateTime class
    // All method return string value

    // Get date now in SQL Format
    public static function RgetDateNowSQL()
    {
        $dt = new jDateTime();
        $dt->now();
        return $dt->toString(jDateTime::DB_DTFORMAT);
    }

    // Get date now in LANG Format
    public static function RgetDateNowLANG()
    {
        $dt = new jDateTime();
        $dt->now();
        return $dt->toString(jDateTime::LANG_DTFORMAT);
    }

    // Change LANG Format to SQL Format
    public static function RDateLANGtoSQL($date)
    {
        $dt = new jDateTime();
        $dt->setFromString($date, jDateTime::LANG_DTFORMAT);
        return $dt->toString(jDateTime::DB_DTFORMAT);
    }

    // Change SQL Format to LANG Format
    public static function RDateSQLtoLANG($date)
    {
        $dt = new jDateTime();
        $dt->setFromString($date, jDateTime::DB_DTFORMAT);
        return $dt->toString(jDateTime::LANG_DTFORMAT);
    }

    // Get User Session Name
    public static function getUserInSessionName()
    {
        $user   = jAuth::getUserSession();
        return $user->name;
    }
}
?>