<?php
/**
* @package   pagesjaunes_core
* @subpackage slideshow
* @author    R
* @copyright 2011 your name
* @link      http://www.ywa.mg
* @license    All rights reserved
*/
jClasses::inc("slideshow~CSlideshow");
jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");
jClasses::inc("entreprise~CEntreprise");
class slideshowCtrl extends jController {
    
    public function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();

        if (jAcl2::check("slideshow.list") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $list = CSlideshow::getList();

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $tpl->assign('list', $list);
            $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);

            $resp->body->assign('MAIN', $tpl->fetch('slideshow~index'));
        }
        else { //else test jAcl            
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        $resp->body->assign('selectedMenuItem','slideshow');

        return $resp;
    }

    public function add() {
        if (jAcl2::check("slideshow.create") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $toEntreprise = CEntreprise::getList();
            $tpl->assign('toEntreprise', $toEntreprise);
            $resp->body->assign('MAIN', $tpl->fetch('slideshow~add.form'));
        }
        else { //else test jAcl            
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        $resp->body->assign('selectedMenuItem','slideshow');
        return $resp;
    }

    public function save_add() {        
        if (jAcl2::check("slideshow.create") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $resp = $this->getResponse('redirect');
            $slideshow = new CSlideshow();
            $error = 0;
            if ($this->param('slidename') != '' && $this->param('radioimageseul') != '' && isset ($_FILES) && $this->param('radiopublie') != '')
            {
                $slideshow->zSlideshow_identifiant = $this->param('slidename');
                $namealias = CCommonTools::generateAlias ($slideshow->zSlideshow_identifiant);
                if (CSlideshow::ifNameExist($namealias) == 0)
                {
                    $slideshow->zSlideshow_namealias = $namealias;
                            
                    //iSlideshow_imageonly
                    if ($this->param('radioimageseul') == 0) {
                        if ($this->param('introduction_text') != '' && $this->param('titrebouton') != '' && $this->param('urlpage') != '' && $this->param('radioposition') != '') 
                        {
                            $slideshow->iSlideshow_imageonly = 0;
                            $slideshow->zSlideshow_titre = $this->param('titre');
                            $slideshow->zSlideshow_introductiontext = $this->param('introduction_text');
                            $slideshow->zSlideshow_buttontitle = $this->param('titrebouton');
                            $slideshow->zSlideshow_contentposition = $this->param('radioposition');
                        }
                        else
                        {
                            $error = 1;
                        }
                    }
                    else
                    {
                        $slideshow->iSlideshow_imageonly = 1;
                    }
                    $slideshow->zSlideshow_urlpage = $this->param('urlpage');
                    $slideshow->iSlideshow_entrepriseId = $this->param('entrepriseId');
                    //iSlideshow_publicationstatus
                    $slideshow->iSlideshow_publicationstatus = $this->param('radiopublie') ;
                    if ($slideshow->iSlideshow_publicationstatus == 1)
                    {
                        $dt = new jDateTime();
                        $dt->now();
                        $slideshow->dSlideshow_publicationdate = $dt->toString(jDateTime::LANG_DTFORMAT);
                    }
                    //zSlideshow_visuelbackground
                    $oUploader = new CPhotosUpload ('imageToUpload') ;
                    $uploadResults = $oUploader->doUpload () ;
                    if (empty ($uploadResults ["errorcode"]))
                    {
                        $slideshow->zSlideshow_visuelbackground = $uploadResults ["filename"] ;
                    }
                    else
                    {
                        $error = 1;
                    }
                    if ($error == 0)
                    {   
                        $slideshow->insert();
                        jMessage::add(jLocale::get("slideshow~slideshow.add.success"), "success");
                    }
                }
                else
                {
                    jMessage::add(jLocale::get("slideshow~slideshow.name.exist"), "danger");
                }
            }
            $resp->action = "slideshow~slideshow:index";
            return $resp;
        }
        else { //else test jAcl  
            $resp = $this->getResponse('html');
            $tpl = new jTpl();          
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
            $resp->body->assign('selectedMenuItem','slideshow');
            return $resp;
        }
    }

    public function delete() {
        if (jAcl2::check("slideshow.delete") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $resp = $this->getResponse('redirect');
            if ($this->param('slideshowId') != '')
            {
                $slideshow = CSlideshow::getById($this->param('slideshowId'));
                //delete old file
                unlink(PHOTOS_FOLDER."/".PHOTOS_MEDIUM_FOLDER."/".$slideshow->zSlideshow_visuelbackground);
                unlink(PHOTOS_FOLDER."/".PHOTOS_BIG_FOLDER."/".$slideshow->zSlideshow_visuelbackground);
                unlink(PHOTOS_FOLDER."/".PHOTOS_THUMBNAIL_FOLDER."/".$slideshow->zSlideshow_visuelbackground);
                CSlideshow::delete($this->param('slideshowId'));
                jMessage::add(jLocale::get("slideshow~slideshow.delete.success"), "danger");
            }
            $resp->action = 'slideshow~slideshow:index';
            return $resp;
        }
        else { //else test jAcl  
            $resp = $this->getResponse('html');
            $tpl = new jTpl();          
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
            $resp->body->assign('selectedMenuItem','slideshow');
            return $resp;
        }
    }

    public function edit() {
        $slideshowId = $this->param('slideshowId');
        if (jAcl2::check("slideshow.update") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            if ($slideshowId != '')
            {
                $slideshow = CSlideshow::getById($slideshowId);
                if ($slideshow != null) {
                    $resp = $this->getResponse('html');
                    $tpl = new jTpl();
                    $tpl->assign("SCRIPT", jZone::get('common~script'));
                    $photosFolderPath = PHOTOS_FOLDER.'/'.PHOTOS_MEDIUM_FOLDER.'/';
                    $toEntreprise = CEntreprise::getList();
                    $tpl->assign('toEntreprise', $toEntreprise);
                    $tpl->assign('photosFolderPath',$photosFolderPath);
                    $tpl->assign('slideshow', $slideshow);
                    $resp->body->assign('MAIN', $tpl->fetch('slideshow~edit.form'));
                    $resp->body->assign('selectedMenuItem','slideshow');
                    return $resp;
                }
                else {
                    $resp = $this->getResponse('redirect');
                    jMessage::add('Veuillez choisir un Slideshow à éditer','error');
                    $resp->action = 'slideshow~slideshow:index';
                    return $resp;
                }
            }
            else
            {
                $resp = $this->getResponse('redirect');
                jMessage::add('Veuillez choisir un Slideshow à éditer','error');
                $resp->action = 'slideshow~slideshow:index';
                return $resp;
            } 
        }
        else { //else test jAcl 
            $resp = $this->getResponse('html');
            $tpl = new jTpl();           
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
            return $resp;
        }       
    }

    public function save_edit()
    {        
        if (jAcl2::check("slideshow.update") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $resp = $this->getResponse('redirect');
            $slideshowId = $this->param('slideshowId');
            $errors = 0;
            if (!empty($slideshowId) && !empty($this->param('slidename')))
            {
                $oldSlideshow = CSlideshow::getById($slideshowId);
                if (!empty($oldSlideshow->iSlideshow_id))
                {
                    $oldSlideshow->zSlideshow_identifiant = $this->param('slidename');

                    $namealias = CCommonTools::generateAlias ($oldSlideshow->zSlideshow_identifiant);

                    if (CSlideshow::ifUpdateNameExist($oldSlideshow->iSlideshow_id, $namealias) == 0)
                    {
                        $oldSlideshow->zSlideshow_namealias = $namealias;

                        if ($this->param('radioimageseul') == 0) 
                        {
                            if ($this->param('introduction_text') != '' && $this->param('titrebouton') != '' && $this->param('urlpage') != '' && $this->param('radioposition') != '') 
                            {
                                $oldSlideshow->iSlideshow_imageonly = 0;
                                $oldSlideshow->zSlideshow_titre = $this->param('titre');
                                $oldSlideshow->zSlideshow_introductiontext = $this->param('introduction_text');
                                $oldSlideshow->zSlideshow_buttontitle = $this->param('titrebouton');
                                $oldSlideshow->zSlideshow_contentposition = $this->param('radioposition');
                            }
                            else
                            {
                                $errors += 1;
                                jMessage::add(jLocale::get("slideshow~slideshow.error"),'danger');
                            }
                        }

                        $oldSlideshow->zSlideshow_urlpage = $this->param('urlpage');

                        $oldSlideshow->iSlideshow_entrepriseId = $this->param('entrepriseId');
                        //iSlideshow_publicationstatus
                        if ($oldSlideshow->iSlideshow_publicationstatus == 0 && $this->param('radiopublie') == 1)
                        {
                            $dt = new jDateTime();
                            $dt->now();
                            $oldSlideshow->dSlideshow_publicationdate = $dt->toString(jDateTime::LANG_DTFORMAT);
                        }
                        $oldSlideshow->iSlideshow_publicationstatus  = $this->param('radiopublie');
                        $dt = new jDateTime();
                        $dt->now();
                        $oldSlideshow->dSlideshow_updatedate = $dt->toString(jDateTime::LANG_DTFORMAT);
                        
                        //zSlideshow_visuelbackground
                        if ($_FILES['imageToUpload']['name'] != '')
                        {
                            $oUploader = new CPhotosUpload ('imageToUpload') ;
                            $uploadResults = $oUploader->doUpload () ;
                            if (empty ($uploadResults ["errorcode"]))
                            {
                                $oldSlideshow->zSlideshow_visuelbackground = $uploadResults ["filename"] ;
                            }
                            else
                            {
                                $errors += 1;
                            }
                        }
                        
                        if ($errors == 0)
                        {   
                            $oldSlideshow->update();
                            $resp->action = "slideshow~slideshow:index";
                            jMessage::add(jLocale::get("slideshow~slideshow.update.success"),'success');
                            return $resp;
                        }
                    }
                    else
                    {
                        jMessage::add(jLocale::get("slideshow~slideshow.name.exist"), "danger");
                    }
                }
                else
                {
                    jMessage::add(jLocale::get("slideshow~slideshow.error"), "danger");
                }
            }
            else
            {
                jMessage::add(jLocale::get("slideshow~slideshow.error"), "danger");
            }
            
            $resp->action = "slideshow~slideshow:index";
            return $resp;
        }
        else { //else test jAcl 
            $resp = $this->getResponse('html');
            $tpl = new jTpl();           
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
            return $resp;
        }     
    }

    public function grouped_action() {
        if (jAcl2::check("slideshow.delete") && !(jAcl2::check("slideshow.restrictall"))) { //test jAcl
            $resp = $this->getResponse('redirect');
            if (sizeof ($actionGroup = $this->param('actionGroup')) > 0)
            {
                $action = $this->param ('todo');
                if ($action == "delete")
                {
                    $count = 0;
                    foreach ($actionGroup as $slideshowId) {
                        CSlideshow::delete($slideshowId);
                        $count += 1; 
                    }
                    if ($count<1) jMessage::add('aucun Slideshow supprimé','delete');
                    elseif ($count==1) jMessage::add('Un Slideshow supprimé','delete');
                    else jMessage::add($count.' Slideshow supprimés','delete');
                }  
            }
            else {
                jMessage::add(jLocale::get("slideshow~slideshow.not.exist"), "danger");
            }
            $resp->action = 'slideshow~slideshow:index';
            return $resp;
        }
        else { //else test jAcl 
            $resp = $this->getResponse('html');
            $tpl = new jTpl();           
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
            return $resp;
        }  
    }


    //insert Test Doublons
    function insertNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias ($name);
        $valid = "true";
        if (CSlideshow::ifNameExist($namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update Test Doublons
    function updateNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name);
        $valid = "true";
        if (CSlideshow::ifUpdateNameExist($id, $namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}

