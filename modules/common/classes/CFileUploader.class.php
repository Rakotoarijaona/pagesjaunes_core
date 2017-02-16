<?php

/**
 * @package     common
 * @subpackage  common
 * @version     1.0
 * @author      YWA
 */

jClasses::inc ("common~CCommonTools") ;

class CFileUploader
{

    var $zFileName ;
    var $zPathAndFolderFile ;
    var $zPathAndFolderOriginal ;
    var $tzValidExt ;
    var $bCreateFolderRecursive ;
    var $iFoldersChmod ;
    var $iFilesChmod ;
    var $zNewName ;
    var $zExt ;
    var $zDocImageName ;

    var $zFileOld ;
    var $zFileExist ;

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
        $this->zPathAndFolderFile       = "" ;
        $this->zPathAndFolderOriginal   = "" ;
        $this->tzValidExt               = array () ;
        $this->bCreateFolderRecursive   = true ;
        $this->iFoldersChmod            = 0755 ;
        $this->iFilesChmod              = 0755 ;
        $this->zNewName                 = "" ;
        $this->zExt                     = "" ;
        $this->zDocImageName            = "" ;

        $this->zFileOld                 = "" ;
        $this->zFileExist               = "" ;

        $this->toPathFolderSize         = array () ;

        $this->iErrorCode               = 0 ;
        $this->zFileType                = "" ;
        $this->iFileSize                = 0 ;
        $this->zPathAndFolder           = "" ;
        $this->zStoreName               = "" ;

        $this->zStoreNameSeparator      = "-" ;
    }

    // upload image
    public function uploadFile ()
    {
        $iErrorCode         = 0 ;
        $zStoreName         = "" ;
        $zFileType          = "" ;
        $iFileSize          = 0 ;
        $zPathAndFolder     = false ;
        $zFinalName         = "" ;

        $tzFileFolder      = array () ;

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

            if (empty ($iErrorCode))
            {
                $zPathAndFolder = CCommonTools::createFolder ($this->zPathAndFolderFile, $this->iFoldersChmod, $this->bCreateFolderRecursive) ;

                if ($zPathAndFolder)
                {
                    if (@move_uploaded_file ($zDirTempName, $zPathAndFolder . "/" . $zFinalName))
                    {
                        $oOld = umask (0) ;
                        chmod ($zPathAndFolder . "/" . $zFinalName, $this->iFilesChmod) ;
                        umask ($oOld) ;

                        $this->zPathAndFolder   = $zPathAndFolder ;
                        $this->zStoreName       = $zFinalName ;

                        $tzImageFolder []   = $this->zPathAndFolderOriginal . "/" ;

                        foreach ($this->toPathFolderSize as $oPathFolderSize)
                        {
                            if (isset ($oPathFolderSize->zFolderName) && !empty ($oPathFolderSize->zFolderName))
                            {
                                $tzImageFolder [] = $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/" ;
                            }
                        }

                        // pdf thumb
                        if ($this->zExt == "pdf")
                        {
                            $zDocThumbPathAndFolder = CCommonTools::createFolder ($this->zPathAndFolderOriginal, $this->iFoldersChmod, $this->bCreateFolderRecursive) ;

                            if ($zDocThumbPathAndFolder)
                            {
                                $zDocThumbDesNameAndPath = $zDocThumbPathAndFolder . "/" . CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg" ;

                                $zDocNameAndPath = $zPathAndFolder . "/" . $this->zStoreName ;

                                exec ("convert -density 100x100 {$zDocNameAndPath}[0] -quality 100 {$zDocThumbDesNameAndPath}") ;

                                $oOld = umask (0) ;

                                chmod ($zDocThumbDesNameAndPath, $this->iFilesChmod) ;

                                // risize and crop
                                foreach ($this->toPathFolderSize as $oPathFolderSize)
                                {
                                    $iWidth     = (isset ($oPathFolderSize->iWidth)) ? $oPathFolderSize->iWidth : null ;
                                    $iHeight    = (isset ($oPathFolderSize->iHeight)) ? $oPathFolderSize->iHeight : null ;
                                    $zRedimType = (isset ($oPathFolderSize->zRedimType)) ? $oPathFolderSize->zRedimType : null ;

                                    $oImageLayer = new CCustomImageWorkshop (array ("imageFromPath" => $this->zPathAndFolderOriginal . "/" . CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg")) ;

                                    if (!empty ($iWidth) || !empty ($iHeight))
                                    {
                                        if ($zRedimType == "crop")
                                        {
                                            $oImageLayer->customCrop ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg") ;
                                        }
                                        elseif ($zRedimType == "resize")
                                        {
                                            $oImageLayer->customResize ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg") ;
                                        }
                                        else
                                        {
                                            $oImageLayer->customCrop ($iWidth, $iHeight, $oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/", CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg") ;
                                        }
                                    }

                                    chmod ($oPathFolderSize->zPath . "/" . $oPathFolderSize->zFolderName . "/" . CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg", $this->iFilesChmod) ;
                                }
                                // risize and crop

                                umask ($oOld) ;

                                $this->zDocImageName = CCommonTools::getNoExtFileName ($this->zStoreName) . ".jpg" ;
                            }
                        }

                        if (isset ($this->zFileExist))
                        {
                            if (!empty ($this->zFileExist) && ($this->zFileExist != $this->zStoreName))
                            {
                                CCommonTools::removeFile ($this->zFileExist, $tzFileFolder) ;

                                CCommonTools::removeFile (CCommonTools::getNoExtFileName ($this->zFileExist) . ".jpg", $tzImageFolder) ;
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
            if (isset ($this->zFileExist) && isset ($this->zFileOld))
            {
                if (empty ($this->zFileOld))
                {
                    CCommonTools::removeFile ($this->zFileExist, $tzFileFolder) ;
                }

                $this->zStoreName = $this->zFileOld ;
            }
        }

        $this->iErrorCode = $iErrorCode ;
    }
}

?>