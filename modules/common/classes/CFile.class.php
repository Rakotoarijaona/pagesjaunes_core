<?php

/**
 * @package     common
 * @subpackage  common
 * @version     1.0
 * @author      YWA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CMedia") ;

class CFile
{
    var $zFilePathFolder ;
    var $zFileName ;
    var $zFileDate ;
    var $zFileSize ;
    var $zFileExtension ;
    var $iMediaType ;
    var $iRemovable ;
    var $zFilePath ;

    // constructeur
    public function __construct ($_zFilePathFolder = "")
    {
        $this->zFilePathFolder  = $_zFilePathFolder ;
        $this->zFileName        = NULL ;
        $this->zFileDate        = NULL ;
        $this->zFileSize        = NULL ;
        $this->zFileExtension   = NULL ;
        $this->iMediaType       = NULL ;
        $this->iRemovable       = NULL ;
        $this->zFilePath        = NULL ;
    }

    // browse file path
    function browse (&$_iFileCount, $_iCurrentPage = 1, $_zSortingField = "name", $_zSortingSens = "asc", $_iFileType = null)
    {
        $toResults      = array () ;
        $toImage        = scandir ($this->zFilePathFolder . "/" . BIG_FOLDER . "/") ;

        $toFileWithFolder   = scandir ($this->zFilePathFolder . "/") ;
        $toFile             = array () ;
        foreach ($toFileWithFolder as $oFileWithFolder)
        {
            if (is_file ($this->zFilePathFolder . "/" . $oFileWithFolder))
            {
                $toFile [] = $oFileWithFolder ;
            }
        }
        $toFiles = array_merge ($toImage, $toFile) ;

        $toSortedFiles  = array () ;

        $iFileCount = 0 ;

        // user files
        $tzUserFile = array () ;

        $oConnectedUser = (jAuth::isConnected ()) ? jAuth::getUserSession () : jDao::createRecord ('common~user') ;

        if ($oConnectedUser->typeId != USER_TYPE_SUPER_ADMIN_ID)
        {
            $oDaoUserMedia  = jDao::get ("common~usermedia") ;
            $toCondMedia = jDao::createConditions () ;
            $toCondMedia->addCondition ('userMedia_userId', '=', $oConnectedUser->id) ;
            $toUserMedia = $oDaoUserMedia->findBy ($toCondMedia) ;
            foreach ($toUserMedia as $oUserMedia)
            {
                $tzUserFile [] = $oUserMedia->userMedia_mediaFile ;
            }
            // user files
        }

        foreach ($toFiles as $iIndex => $oFile)
        {
            if ($oFile != "." && $oFile != ".." && !empty ($oFile))
            {
                $bAddFile = true ;

                if ($oConnectedUser->typeId != USER_TYPE_SUPER_ADMIN_ID)
                {
                    $bAddFile = in_array ($oFile, $tzUserFile) ;
                }

                if ($bAddFile)
                {
                    $zExtension = strtolower (CCommonTools::getFileNameExtension ($oFile)) ;
                    $zPath = $this->zFilePathFolder . "/" ;
                    if (in_array ($zExtension, explode (",", MEDIA_TYPE_IMAGE_EXT)))
                    {
                        $zPath = $this->zFilePathFolder . "/" . BIG_FOLDER . "/" ;
                    }

                    $zFileDate = filemtime ($zPath . $oFile) ;
                    $zFileDate = date ("Y-m-d H:i:s", $zFileDate) ;
                    $iSize = filesize ($zPath . $oFile) ;

                    if (!empty ($_iFileType))
                    {
                        $tzExtensionFilter = array () ;

                        switch ($_iFileType)
                        {
                            case MEDIA_TYPE_IMAGE :
                                $tzExtensionFilter = explode (",", MEDIA_TYPE_IMAGE_EXT) ;
                            break ;

                            case MEDIA_TYPE_VIDEO :
                                $tzExtensionFilter = explode (",", MEDIA_TYPE_VIDEO_EXT) ;
                            break ;

                            case MEDIA_TYPE_DOCUMENT :
                                $tzExtensionFilter = explode (",", MEDIA_TYPE_DOCUMENT_EXT) ;
                            break ;

                            case MEDIA_TYPE_AUDIO :
                                $tzExtensionFilter = explode (",", MEDIA_TYPE_AUDIO_EXT) ;
                            break ;

                            default :
                            break ;
                        }

                        if (in_array ($zExtension, $tzExtensionFilter))
                        {
                            $iFileCount ++ ;

                            $toSortedFiles [$iIndex] = array 
                            (
                                'file'          => strtolower ($oFile),
                                'date'          => $zFileDate,
                                'size'          => CCommonTools::convertFileSize ($iSize),
                                'extension'     => strtolower (CCommonTools::getFileNameExtension ($oFile))
                            ) ;
                        }
                    }
                    else
                    {
                        $iFileCount ++ ;

                        $toSortedFiles [$iIndex] = array 
                        (
                            'file'          => strtolower ($oFile),
                            'date'          => $zFileDate,
                            'size'          => $iSize,
                            'extension'     => strtolower (CCommonTools::getFileNameExtension ($oFile))
                        ) ;
                    }
                }
            }
        }

        $_iFileCount = $iFileCount ;

        // sorting
        $zFunctionTri = ($_zSortingSens == "desc") ? "Inf" : "Sup" ;
        switch ($_zSortingField)
        {
            case 'name' :
                usort ($toSortedFiles, "filenameSort" . $zFunctionTri) ;
            break ;

            case 'date' :
                usort ($toSortedFiles, "dateSort" . $zFunctionTri) ;
                break ;

            case 'size' :
                usort ($toSortedFiles, "sizeSort" . $zFunctionTri) ;
            break ;

            case 'extension' :
                usort ($toSortedFiles, "extensionSort" . $zFunctionTri) ;
            break ;

            default :
                usort ($toSortedFiles, "filenameSort" . $zFunctionTri) ;
            break ;
        }

        // pagination
        $toSortedFiles = array_chunk ($toSortedFiles, NB_MEDIA_PER_PAGE_BO) ;
        $toSortedFiles = (isset ($toSortedFiles [$_iCurrentPage-1])) ? $toSortedFiles [$_iCurrentPage-1] : array () ;

        //  get ordered files
        foreach ($toSortedFiles as $toSortedFile)
        {
            $oFile = new stdClass () ;

            $oFile->zFileName   = $toSortedFile ["file"] ;
            $oFile->zFileDate   = $toSortedFile ["date"] ;
            $oFile->zFileSize   = CCommonTools::convertFileSize ($toSortedFile ["size"]) ;
            $oFile->zFileExtension  = $toSortedFile ["extension"] ;

            if (in_array ($oFile->zFileExtension, explode (",", MEDIA_TYPE_IMAGE_EXT)))
            {
                $oFile->iMediaType = MEDIA_TYPE_IMAGE ;
            }
            else if (in_array ($oFile->zFileExtension, explode (",", MEDIA_TYPE_VIDEO_EXT)))
            {
                $oFile->iMediaType = MEDIA_TYPE_VIDEO ;
            }
            else if (in_array ($oFile->zFileExtension, explode (",", MEDIA_TYPE_DOCUMENT_EXT)))
            {
                $oFile->iMediaType = MEDIA_TYPE_DOCUMENT ;
            }
            else if (in_array ($oFile->zFileExtension, explode (",", MEDIA_TYPE_AUDIO_EXT)))
            {
                $oFile->iMediaType = MEDIA_TYPE_AUDIO ;
            }

            $oMediaToFind                           = new stdClass () ;
            $oMediaToFind->iMediaActivationStatusId = YES ;
            $oMediaToFind->iMediaRemoveStatusId     = NO ;
            $oMediaToFind->zMediaTranslatableFile   = $oFile->zFileName ;
            $iUsedMediaCount                        = CMedia::getCount ($oMediaToFind, LANG_DEFAULT_ID) ;
            $oFile->iRemovable                      = ($iUsedMediaCount > 0) ? NO : YES ;

            $toResults [] = $oFile ;
        }

        return $toResults ;
    }
}

// tri filename
function filenameSortInf ($x, $y)
{
    return $x['file'] < $y['file'] ;
}
function filenameSortSup ($x, $y)
{
    return $x['file'] > $y['file'] ;
}

// tri date
function dateSortInf ($x, $y)
{
    return $x['date'] < $y['date'] ;
}
function dateSortSup ($x, $y)
{
    return $x['date'] > $y['date'] ;
}

// tri size
function sizeSortInf ($x, $y)
{
    return $x['size'] < $y['size'] ;
}
function sizeSortSup ($x, $y)
{
    return $x['size'] > $y['size'] ;
}

// tri extension
function extensionSortInf ($x, $y)
{
    return $x['extension'] < $y['extension'] ;
}
function extensionSortSup ($x, $y)
{
    return $x['extension'] > $y['extension'] ;
}

?>