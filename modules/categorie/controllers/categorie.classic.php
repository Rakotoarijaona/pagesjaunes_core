<?php
/**
* @package   pagesjaunes_core
* @subpackage categorie
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc("categorie~CCategorie");
jClasses::inc("categorie~CSouscategorie");
jClasses::inc ("common~ImageWorkshop") ;
jClasses::inc ("common~CCommonTools") ;

class categorieCtrl extends jController {

    public $pluginParams=array(
        'index'             =>array('jacl2.right'=>'categorie.list'),
        'edition'           =>array('jacl2.right'=>'categorie.update'),
        'deleteCategorie'   =>array('jacl2.right'=>'categorie.delete'),
        'deleteCategorie'   =>array('jacl2.right'=>'categorie.delete'),
        'deleteSouscategorie' =>array('jacl2.right'=>'categorie.delete'),
        'save_ajout'         =>array('jacl2.right'=>'categorie.create'),
        'enregistrer_modif' =>array('jacl2.right'=>'categorie.update'),
        'gestion_mots_cles'  =>array('jacl2.right'=>'keywords.update')
    );

    function index() 
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();        
            $tpl->assign("SCRIPT", jZone::get('common~script'));

            //Liste de tous les categories
            $oList = array();
            $oListCategorie = CCategorie::getList();
            $i = 0;
            foreach ($oListCategorie as $categorie) {
                $oList[$i]['categorie'] = $categorie;
                $oList[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }
            $tpl->assign("oList", $oList);
            $tpl->assign("oListCategorie", $oListCategorie);

            //jMessage

            $resp->body->assign('MAIN', $tpl->fetch('categorie~index'));
            $tpl->assign("SCRIPT", jZone::get('common~script'));
        
            $resp->body->assign('selectedMenuItem','categorie');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function edition() 
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));

            //Liste de tous les categories
            $oList = array();
            $oListCategorie = CCategorie::getList();
            $i = 0;
            foreach ($oListCategorie as $categorie) {
                $oList[$i]['categorie'] = $categorie;
                $oList[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }
            $tpl->assign("oList", $oList);
            $tpl->assign("oListCategorie", $oListCategorie);

            if ($this->param('categorieid', '') != '')
            {
                $id = $this->param('categorieid');
                $oRecord = CCategorie::getById($id); 
                $iscategorie = 1;
                $tpl->assign('oRecord', $oRecord);
                $tpl->assign('iscategorie', $iscategorie);
            }
            elseif ($this->param('souscategorieid', '') != '')
            {
                $id = $this->param('souscategorieid');
                $oRecord = CSouscategorie::getById($id); 
                $iscategorie = 0;
                $tpl->assign('oRecord', $oRecord);
                $tpl->assign('iscategorie', $iscategorie);
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = 'categorie~categorie:index';
                return $resp;
            }

            $resp->body->assign('MAIN', $tpl->fetch('categorie~edition'));
            $resp->body->assign('selectedMenuItem','categorie');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp ;
    }
    function deleteCategorie()
    {
        $resp = $this->getResponse('redirect');
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            if ($this->param('categorieid') != '')
            {
                $success = CCategorie::deleteById($this->param('categorieid'));
                if ($success == 1)
                {
                    jMessage::add(jLocale::get("categorie~categorie.delete.alert.success"), "success");
                }
                else
                {
                    jMessage::add(jLocale::get("categorie~categorie.delete.alert.error"), "error");
                }
            }
            $resp->action = 'categorie~categorie:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function deleteSouscategorie()
    {
        $resp = $this->getResponse('redirect');
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            if ($this->param('souscategorieid') != '')
            {
                $success = CSouscategorie::deleteById($this->param('souscategorieid'));
                if ($success == 1)
                {
                    jMessage::add(jLocale::get("categorie~souscategorie.delete.alert.success"), "success");
                }
                else
                {
                    jMessage::add(jLocale::get("categorie~souscategorie.delete.alert.error"), "error");
                }
            }
            $resp->action = 'categorie~categorie:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function save_ajout() 
    {
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            if (($this->param('nom')!='')&&($this->param('ispublie')!=''))
            {
                if (($this->param('categorie_parent')==''|| $this->param('categorie_parent')==0) && ($_FILES["vignette"]['name']!=''))
                {                
                    $oCategorie = new CCategorie();
                    $oCategorie->name = $this->param('nom');
                    $namealias = CCommonTools::generateAlias ($oCategorie->name);
                    $oCategorie->namealias = $namealias;
                    if ((categorie::ifNameExist($namealias) == 0)&&(souscategorie::ifNameExist($namealias) == 0))
                    {
                        //icone catégorie
                        $iErrorCode         = 0 ;
                        $zFileName          = $_FILES["vignette"]["name"] ;
                        $zFileType          = $_FILES["vignette"]["type"] ;
                        $iFileSize          = intval ($_FILES["vignette"]["size"]) ;
                        $zDirTempName       = $_FILES["vignette"]["tmp_name"] ;

                        $bCreateFolders     = true ;
                        $zBackgroundColor   = null ;
                        $iImageQuality      = IMAGE_QUALITY ;

                        $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
                        $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;
                        $zNoExtName     = CCommonTools::generateAlias ($zNoExtName);
                        $zFileName      =  $zNoExtName ."." . $zExt ;

                        // rename file if already exists
                        if (file_exists ("icones" . "/" . $zFileName))
                        {
                            $iExistFileCount = 1 ;

                            while (file_exists ("icones" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
                            {
                                $iExistFileCount++ ;
                            }

                            $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
                        }
                        // thumbnail (must)
                        $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES ["vignette"]['tmp_name']) ;
                        $iExpectedWidth     = 96 ;
                        $iExpectedHeight    = 96 ;

                        ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

                        $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
                        $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
                        $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
                        $oLayerThumbnail->save ("icones", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
                        // rename file if already exists
                        $oCategorie->vignette = $zFileName;

                        $oCategorie->ispublie = $this->param('ispublie');
                        $oCategorie->insert();
                        jMessage::add(jLocale::get("categorie~categorie.add.alert.success"),'success');
                    }
                    else
                    {     
                        jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                    }                
                }
                else
                {
                    $osouscategorie = new CSouscategorie();
                    $osouscategorie->name = $this->param('nom');
                    $namealias = CCommonTools::generateAlias ($osouscategorie->name);
                    if ((categorie::ifNameExist($namealias) == 0)&&(souscategorie::ifNameExist($namealias) == 0))
                    {
                        $osouscategorie->namealias = $namealias;
                        $osouscategorie->categorieid = $this->param('categorie_parent');
                        $osouscategorie->ispublie = $this->param('ispublie');
                        $osouscategorie->insert(); 
                        jMessage::add(jLocale::get("categorie~souscategorie.add.alert.success"),'success');
                    }
                    else
                    {
                        jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                    }
                }
            }
            $resp = $this->getResponse('redirect');
            $resp->action = "categorie~categorie:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;        
    }

    // Sauvegarde de la modification
    public function enregistrer_modif()
    {        
        $resp = $this->getResponse('redirect');
        if (!jAcl2::check("categorie.restrictall")) { //Test droit restrict all
            if ($this->intParam('parent') == '')
            {
                if ($this->intParam('iscategorie') == 1)
                {
                    $oCategorie = CCategorie::getById($this->intParam('id'));
                    if (($this->param('name')!='')&&($this->param('ispublie')!=''))
                    {
                        $oCategorie->name = $this->param('name');
                        $namealias = CCommonTools::generateAlias ($oCategorie->name);
                        $oCategorie->namealias = $namealias;
                        if ((categorie::ifUpdateNameExist($this->intParam('id'), $namealias) == 0)&&(souscategorie::ifNameExist($namealias) == 0))
                        {
                            if (!empty($_FILES["vignette"]['name']))
                            {
                                //icone catégorie
                                $iErrorCode = 0 ;
                                $zFileName          = $_FILES["vignette"]["name"] ;
                                $zFileType          = $_FILES["vignette"]["type"] ;
                                $iFileSize          = intval ($_FILES["vignette"]["size"]) ;
                                $zDirTempName       = $_FILES["vignette"]["tmp_name"] ;

                                $bCreateFolders     = true ;
                                $zBackgroundColor   = null ;
                                $iImageQuality      = IMAGE_QUALITY ;

                                $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
                                $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;
                                $zNoExtName     = CCommonTools::generateAlias ($zNoExtName);
                                $zFileName      =  $zNoExtName . "." . $zExt ;

                                // rename file if already exists
                                if (file_exists ("icones" . "/" . $zFileName))
                                {
                                    $iExistFileCount = 1 ;

                                    while (file_exists ("icones" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
                                    {
                                        $iExistFileCount++ ;
                                    }

                                    $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
                                }
                                // thumbnail (must)
                                $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES ["vignette"]['tmp_name']) ;
                                $iExpectedWidth     = 96 ;
                                $iExpectedHeight    = 96 ;

                                ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

                                $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
                                $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
                                $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
                                $oLayerThumbnail->save ("icones", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
                                //end-rename file if already exists

                                //delete old file
                                unlink("icones/".$oCategorie->vignette);
                                //end-delete old file
                                $oCategorie->vignette = $zFileName;
                            }                 
                            $oCategorie->ispublie = $this->intParam('ispublie');
                            $oCategorie->update();
                            $resp->params = array('categorieid' => $oCategorie->id);
                            jMessage::add(jLocale::get("categorie~categorie.update.alert.success"),'success');
                        }
                        else
                        {
                            jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                        }
                    }   
                }
                else
                {
                    $oCategorie = new CCategorie();
                    if (($this->param('name')!='')&&($this->param('ispublie')!=''))
                    {
                        $oCategorie->id = $this->intParam('id');
                        $oCategorie->name = $this->param('name');
                        $namealias = CCommonTools::generateAlias ($oCategorie->name);
                        $oCategorie->namealias = $namealias;
                        if (categorie::ifNameExist($namealias) == 0)
                        {
                            if (isset($_FILES["vignette"]))
                            {
                                //icone catégorie
                                $iErrorCode = 0 ;
                                $zFileName          = $_FILES["vignette"]["name"] ;
                                $zFileType          = $_FILES["vignette"]["type"] ;
                                $iFileSize          = intval ($_FILES["vignette"]["size"]) ;
                                $zDirTempName       = $_FILES["vignette"]["tmp_name"] ;

                                $bCreateFolders     = true ;
                                $zBackgroundColor   = null ;
                                $iImageQuality      = IMAGE_QUALITY ;

                                $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
                                $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;
                                $zNoExtName     = CCommonTools::generateAlias ($zNoExtName);
                                $zFileName      =  $zNoExtName . "." . $zExt ;

                                // rename file if already exists
                                if (file_exists ("icones" . "/" . $zFileName))
                                {
                                    $iExistFileCount = 1 ;

                                    while (file_exists ("icones" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
                                    {
                                        $iExistFileCount++ ;
                                    }

                                    $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
                                }
                                // thumbnail (must)
                                $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES ["vignette"]['tmp_name']) ;
                                $iExpectedWidth     = 96 ;
                                $iExpectedHeight    = 96 ;

                                ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

                                $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
                                $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
                                $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
                                $oLayerThumbnail->save ("icones", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
                                //end-rename file if already exists

                                $oCategorie->vignette = $zFileName;  
                            }
                            CSouscategorie::deleteById($this->intParam('id'));
                            $oCategorie->ispublie = $this->intParam('ispublie');
                            $newId = $oCategorie->insert();
                            $resp->params = array('categorieid' => $newId);
                            jMessage::add(jLocale::get("categorie~categorie.add.alert.success"),'success');
                        }
                        else
                        {
                            jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                        }
                    } 
                }
            }
            elseif ($this->intParam('parent') != '')
            {
                if ($this->intParam('iscategorie') == 1)
                {
                    $oSouscategorie = new CSouscategorie();
                    if (($this->param('name')!='') && ($this->param('ispublie')!=''))
                    {
                        $oSouscategorie->name = $this->param('name');
                        $namealias = CCommonTools::generateAlias ($oSouscategorie->name);
                        if (souscategorie::ifNameExist($namealias) == 0)
                        {
                            $oSouscategorie->namealias = $namealias;
                            $oSouscategorie->categorieid = $this->intParam('parent');
                            $oSouscategorie->ispublie = $this->intParam('ispublie');
                            $newId = $oSouscategorie->insert();
                            $resp->params = array('souscategorieid' => $newId);
                            $oCategorie = CCategorie::deleteById($this->intParam('id'));
                            jMessage::add(jLocale::get("categorie~souscategorie.add.alert.success"),'success');
                        }
                        else
                        {
                            jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                        }
                    }
                }
                else
                {
                    $oSouscategorie = new CSouscategorie();
                    if (($this->param('name')!='')&&($this->param('ispublie')!=''))
                    {
                        $oSouscategorie->id = $this->intParam('id');
                        $oSouscategorie->name = $this->param('name');
                        $namealias = CCommonTools::generateAlias ($oSouscategorie->name);
                        if ((souscategorie::ifUpdateNameExist($this->intParam('id'), $namealias) == 0)&&(categorie::ifNameExist($namealias) == 0))
                        {
                            $oSouscategorie->namealias = $namealias;
                            $oSouscategorie->categorieid = $this->intParam('parent');
                            $oSouscategorie->ispublie = $this->intParam('ispublie');
                            $oSouscategorie->update();
                            $resp->params = array('souscategorieid' => $oSouscategorie->id);
                            jMessage::add(jLocale::get("categorie~souscategorie.update.alert.success"),'success');
                        }
                        else
                        {
                            jMessage::add(jLocale::get('categorie~categorie.name.exist.alert.error'),'danger');
                        }
                    }
                }                 
            }
            
            $resp->action = "categorie~categorie:edition";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;  
    }
    /*
    gestion des mots clés
    */
    function gestion_mots_cles()
    {     
        if (!jAcl2::check("keywords.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('categorie~page_mots_cles'));
            $resp->body->assign('selectedMenuItem','keywords');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    //insert Test Doublons
    function insertNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('nom');
        $namealias = CCommonTools::generateAlias ($name);
        $exist = 0;
        if (categorie::ifNameExist($namealias) == 1)
        {
            $exist = 1;
        }
        if (souscategorie::ifNameExist($namealias) == 1)
        {
            $exist = 1;
        }
        $resp->content = $exist;
        return $resp;
    }
    //categorie update Test Doublons
    function categorieUpdateNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('nom');
        $namealias = CCommonTools::generateAlias ($name);
        $exist = 0;
        if (categorie::ifUpdateNameExist($id, $namealias) == 1)
        {
            $exist = 1;
        }
        if (souscategorie::ifNameExist($namealias) == 1)
        {
            $exist = 1;
        }
        $resp->content = $exist;
        return $resp;
    }
    //sous-categorie update Test Doublons
    function souscategorieUpdateNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('nom');
        $namealias = CCommonTools::generateAlias ($name);
        $exist = 0;
        if (souscategorie::ifUpdateNameExist($id, $namealias) == 1)
        {
            $exist = 1;
        }
        if (categorie::ifNameExist($namealias) == 1)
        {
            $exist = 1;
        }
        $resp->content = $exist;
        return $resp;
    }
}

