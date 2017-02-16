<?php
/**
* @package   pagesjaunes_core
* @subpackage homepage
* @author    R
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");
jClasses::inc("homepage~homepage");

class homepageCtrl extends jController {
    /**
    *
    */
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();      
        if (jAcl2::check("homepage.menu") && !jAcl2::check("homepage.restrictall")) {
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign('PHOTOS_MEDIUM_FOLDER',PHOTOS_MEDIUM_FOLDER);

            $oHomepage = Contenuhomepage::getById(1);
            $tpl->assign('oHomepage', $oHomepage);

            $resp->body->assign('MAIN', $tpl->fetch('homepage~index'));
        }
        else {//else jAcl test
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        $resp->body->assign('selectedMenuItem','homepage');
        return $resp;
    }

    function edit_homepage()
    {
        if (jApp::coord()->request->isAjax())
        {
            $resp = $this->getResponse('htmlfragment');
            
            $resp->tplname='homepage~edit_homepage.form';
            $oHomepage = Contenuhomepage::getById(1);
            $resp->tpl->assign('oHomepage', $oHomepage);
            $resp->tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $resp->tpl->assign('PHOTOS_MEDIUM_FOLDER',PHOTOS_MEDIUM_FOLDER);

            return $resp;
        }
        else
        {
            die();
        }
    }

    function save_edit()
    {
        $resp = $this->getResponse('redirect');
            
        if (jAcl2::check("homepage.update") && !jAcl2::check("homepage.restrictall")) {
            $oHomepage = Contenuhomepage::getById(1);
            //background_parallax
            if (isset($_FILES['background_parallax']))
            {
                $oUploader = new CPhotosUpload ('background_parallax') ;
                $uploadResults = $oUploader->doUpload () ;
                if (empty ($uploadResults ["errorcode"]))
                {
                    $oHomepage->background_parallax = $uploadResults ["filename"] ;
                }
            }
            $oHomepage->titre_parallax = $this->param('titre_parallax');
            $oHomepage->description_parallax = $this->param('description_parallax');
            $oHomepage->titre_reference = $this->param('titre_reference');
            $oHomepage->description_reference = $this->param('description_reference');
            //image_reference
            if (isset($_FILES['image_reference']))
            {
                $oUploader = new CPhotosUpload ('image_reference') ;
                $uploadResults = $oUploader->doUpload () ;
                if (empty ($uploadResults ["errorcode"]))
                {
                    $oHomepage->image_reference = $uploadResults ["filename"] ;
                }
            }
            $oHomepage->position_image_reference = $this->intParam('position_image_reference');
            $oHomepage->bloc_marketing = $this->param('description_marketing');
            //image_marketing
            if (isset($_FILES['image_marketing']))
            {
                $oUploader = new CPhotosUpload ('image_marketing') ;
                $uploadResults = $oUploader->doUpload () ;
                if (empty ($uploadResults ["errorcode"]))
                {
                    $oHomepage->image_marketing = $uploadResults ["filename"] ;
                }
            }
            $oHomepage->position_image_marketing = $this->intParam('position_image_marketing');
            $oHomepage->update();
            $resp->action = "homepage~homepage:index";
        }
        else {//else jAcl test
            $resp = $this->getResponse('html');
            $tpl = new jTpl();      
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
}

