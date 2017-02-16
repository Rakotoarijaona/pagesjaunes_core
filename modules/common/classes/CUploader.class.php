<?php

/**
 * @package     common
 * @subpackage  common
 * @version     1.0
 * @author      YWA
 */

jClasses::inc ("common~ImageWorkshop") ;
jClasses::inc ("common~CCommonTools") ;

class CUploader
{
    var $zFileName ;
    var $zSeparator ;

    public function __construct ($_zFileName = "", $_zSeparator = "-")
    {
        $this->zFileName    = $_zFileName ;
        $this->zSeparator   = $_zSeparator ;
    }

    // upload image
    public function doUpload ()
    {
        $iErrorCode = 0 ;

        $zFileName          = $_FILES [$this->zFileName]["name"] ;
        $zFileType          = $_FILES [$this->zFileName]["type"] ;
        $iFileSize          = intval ($_FILES[$this->zFileName]["size"]) ;
        $zDirTempName       = $_FILES [$this->zFileName]["tmp_name"] ;

        $zFinalName         = CCommonTools::generateAliasFromFileName ($zFileName, $this->zSeparator) ;
        $zExt               = strtolower (CCommonTools::getFileNameExtension ($zFinalName)) ;
        $zNoExtName         = preg_replace ("/[.]" . $zExt . "$/", "", $zFinalName) ;

        $bCreateFolders     = true ;
        $zBackgroundColor   = null ;
        $iImageQuality      = IMAGE_QUALITY ;

        if (in_array (strtolower ($zExt), explode (",", MEDIA_TYPE_IMAGE_EXT)))
        {
            // rename file if already exists
            if (file_exists (MEDIA_FOLDER . "/" . THUMBNAIL_FOLDER . "/" . $zFinalName))
            {
                $iExistFileCount = 1 ;
                while (file_exists (MEDIA_FOLDER . "/" . THUMBNAIL_FOLDER . "/" . $zNoExtName . $this->zSeparator . $iExistFileCount . "." . $zExt))
                {
                    $iExistFileCount++ ;
                }
                $zFinalName = $zNoExtName . $this->zSeparator . $iExistFileCount . "." . $zExt ;
            }
            // rename file if already exists

            // thumbnail (must)
            $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES [$this->zFileName]['tmp_name']) ;
            $iExpectedWidth     = THUMBNAIL_WIDTH ;
            $iExpectedHeight    = THUMBNAIL_HEIGHT ;

            ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

            $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
            $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
            $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
            $oLayerThumbnail->save (MEDIA_FOLDER . "/" . THUMBNAIL_FOLDER, $zFinalName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
            // thumbnail (must)

            // medium
            $oLayerMedium = ImageWorkshop::initFromPath ($_FILES [$this->zFileName]['tmp_name']) ;
            $oLayerMedium->resizeInPixel (MEDIUM_WIDTH, null, true) ;
            $oLayerMedium->save (MEDIA_FOLDER . "/" . MEDIUM_FOLDER, $zFinalName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
            // medium

            // big
            $oLayerBig = ImageWorkshop::initFromPath ($_FILES [$this->zFileName]['tmp_name']) ;
            $oLayerBig->resizeInPixel (BIG_WIDTH, null, true) ;
            $oLayerBig->save (MEDIA_FOLDER . "/" . BIG_FOLDER, $zFinalName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
            // big
        }
        else
        {
            $zPathAndFolder = CCommonTools::createFolder (MEDIA_FOLDER, 0777, true) ;

            // rename file if already exists
            if (file_exists ($zPathAndFolder . "/" . $zFinalName))
            {
                $iExistFileCount = 1 ;
                while (file_exists ($zPathAndFolder . "/" . $zNoExtName . $this->zSeparator . $iExistFileCount . "." . $zExt))
                {
                    $iExistFileCount++ ;
                }

                 $zFinalName = $zNoExtName . $this->zSeparator . $iExistFileCount . "." . $zExt ;
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
                        chmod ($zPathAndFolder . "/" . $zFinalName, 0777) ;
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

        return array ("errorcode" => $iErrorCode, "filename" => $zFinalName) ;
    }
}

?>