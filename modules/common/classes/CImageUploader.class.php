<?php

/**
 * @package     common
 * @subpackage  common
 * @version     1.0
 * @author      YWA
 */

jClasses::inc ("common~CCommonTools") ;

class CImageUploader
{

    var $zFileName ;
    var $zPathAndFolderOriginal ;
    var $tzValidExt ;
    var $bCreateFolderRecursive ;
    var $iFoldersChmod ;
    var $iFilesChmod ;
    var $zNewName ;
    var $zExt ;

    var $zPhotoOld ;
    var $zPhotoExist ;

    var $toPathFolderSize ;

    var $iErrorCode ;
    var $zFileType ;
    var $iFileSize ;
    var $zPathAndFolder ;
    var $zStoreName ;

    var $zStoreNameSeparator ;

    // constructeur
    public function __construct ()
    {
        $this->zFileName                = "" ;
        $this->zPathAndFolderOriginal   = "" ;
        $this->tzValidExt               = array () ;
        $this->bCreateFolderRecursive   = true ;
        $this->iFoldersChmod            = 0755 ;
        $this->iFilesChmod              = 0755 ;
        $this->zNewName                 = "" ;
        $this->zExt                     = "" ;

        $this->zPhotoOld                = "" ;
        $this->zPhotoExist              = "" ;

        $this->toPathFolderSize         = array () ;

        $this->iErrorCode               = 0 ;
        $this->zFileType                = "" ;
        $this->iFileSize                = 0 ;
        $this->zPathAndFolder           = "" ;
        $this->zStoreName               = "" ;

        $this->zStoreNameSeparator      = "-" ;
    }

    // upload image
    public function uploadImage ()
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;
        $zFinalName         = "" ;

        $tzImageFolder      = array () ;
        $tzImageFolder []   = $this->zPathAndFolderOriginal . "/" ;

        // paths and folders
        foreach ($this->toPathFolderSize as $oPathFolderSize)
        {
            if (isset ($oPathFolderSize->zFolderName) && !empty ($oPathFolderSize->zFolderName))
            {
                $tzImageFolder [] = $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/" ;
            }
        }
        // paths and folders

        if (isset ($_FILES [$this->zFileName]["tmp_name"]) && is_uploaded_file ($_FILES [$this->zFileName]["tmp_name"]))
        {
            $zFileName          = $_FILES [$this->zFileName]["name"] ;
            $this->zFileType    = $_FILES [$this->zFileName]["type"] ;
            $this->iFileSize    = intval ($_FILES [$this->zFileName]["size"]) ;
            $zDirTempName       = $_FILES [$this->zFileName]["tmp_name"] ;

            $zStoreName         = date ("YmdHis") . $this->zStoreNameSeparator . strtolower (CCommonTools::generateAliasFromFileName ($zFileName, $this->zStoreNameSeparator)) ;
            $zExt               = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;

            $this->zExt         = $zExt ;

            $zFinalName = (!empty ($this->zNewName)) ? $this->zNewName . "." . $zExt :  $zStoreName ;

            if (!empty ($this->tzValidExt))
            {
                if (!in_array ($zExt, $this->tzValidExt))
                {
                    $iErrorCode = 1 ;
                }
            }

            if (in_array ($zExt, explode (",", IMG_EXT)))
            {
                if ($this->iFileSize >= MAX_IMAGE_SIZE)
                {
                    $iErrorCode = 2 ;
                }
            }

            if (empty ($iErrorCode))
            {
                $zPathAndFolder = CCommonTools::createFolder ($this->zPathAndFolderOriginal, $this->iFoldersChmod, $this->bCreateFolderRecursive) ;

                if ($zPathAndFolder)
                {
                    if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                    {
                        $oOld = umask (0) ;
                        chmod ($zPathAndFolder . "/" . $zFinalName, $this->iFilesChmod) ;
                        umask ($oOld) ;

                        $this->zPathAndFolder   = $zPathAndFolder ;
                        $this->zStoreName       = $zFinalName ;

                        // risize and crop
                        foreach ($this->toPathFolderSize as $oPathFolderSize)
                        {
                            $iWidth         = (isset ($oPathFolderSize->iWidth)) ? $oPathFolderSize->iWidth : null ;
                            $iHeight        = (isset ($oPathFolderSize->iHeight)) ? $oPathFolderSize->iHeight : null ;
                            $zRedimType     = (isset ($oPathFolderSize->zRedimType)) ? $oPathFolderSize->zRedimType : null ;

                            $oImageLayer = new CCustomImageWorkshop (array ("imageFromPath" => $this->zPathAndFolderOriginal . "/" . $this->zStoreName)) ;

                            if (!empty ($iWidth) || !empty ($iHeight))
                            {
                                if ($zRedimType == "crop")
                                {
                                    $oImageLayer->customCrop ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", $this->zStoreName) ;
                                }
                                elseif ($zRedimType == "resize")
                                {
                                    $oImageLayer->customResize ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", $this->zStoreName) ;
                                }
                                else
                                {
                                    $oImageLayer->customCrop ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", $this->zStoreName) ;
                                }
                            }
                        }
                        // risize and crop

                        if (isset ($this->zPhotoExist))
                        {
                            if (!empty ($this->zPhotoExist) && ($this->zPhotoExist != $this->zStoreName))
                            {
                                CCommonTools::removeFile ($this->zPhotoExist, $tzImageFolder) ;
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
            if (isset ($this->zPhotoExist) && isset ($this->zPhotoOld))
            {
                if (empty ($this->zPhotoOld))
                {
                    CCommonTools::removeFile ($this->zPhotoExist, $tzImageFolder) ;
                }

                $this->zStoreName = $this->zPhotoOld ;
            }
        }

        $this->iErrorCode = $iErrorCode ;
    }
}

?>