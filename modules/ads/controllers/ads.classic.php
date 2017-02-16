<?php
/**
* @package   pagesjaunes_core
* @subpackage ads
* @author    R
* @copyright R
* @license    All rights reserved
*/
jClasses::inc("entreprise~Entreprise");
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");
jClasses::inc("catalogue~Catalogue");
jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");
jClasses::inc("ads~CAds");
jClasses::inc("ads~CAds_type");

class adsCtrl extends jController {
    /**
    *
    */
    public $pluginParams=array(
        'index'                     =>array('jacl2.right'=>'ads.list'),
        'ajout'                     =>array('jacl2.right'=>'ads.create'),
        'update'                    =>array('jacl2.right'=>'ads.update'),
        'delete'                    =>array('jacl2.right'=>'ads.delete'),
        'ajout_type'                =>array('jacl2.right'=>'ads.type.create'),
        'update_type'               =>array('jacl2.right'=>'ads.type.update'),
        'delete_type'               =>array('jacl2.right'=>'ads.type.delete'),
        'delete_group_type'         =>array('jacl2.right'=>'ads.type.delete'),
        'save_add'                  =>array('jacl2.right'=>'ads.create'),
        'save_update'               =>array('jacl2.right'=>'ads.update'),
        'save_delete'               =>array('jacl2.right'=>'ads.delete'),
        'save_delete_group'         =>array('jacl2.right'=>'ads.delete'),
        'save_add_type'             =>array('jacl2.right'=>'ads.type.create'),                 
        'save_update_type'          =>array('jacl2.right'=>'ads.type.update'),
        'save_delete_type'          =>array('jacl2.right'=>'ads.type.delete'),
        'save_delete_group_type'    =>array('jacl2.right'=>'ads.type.delete')
    );

    // page index
    public function index()
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $toListAds = CAds::getList();
            $tpl->assign("toListAds", $toListAds);
            $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
            $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~index'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    //Page ajout
    public function ajout()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $tpl = new jTpl();        
            $toListAdsType = CAds_type::getList();

            $toListEntreprise = Entreprise::getList();

            $toListCategorie = Categorie::getList();
            $toListCategorieSouscategorie = array();

            $i = 0;
            foreach ($toListCategorie as $categorie) {
                $toListCategorieSouscategorie[$i]['categorie'] = $categorie;
                $toListCategorieSouscategorie[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }
            $tpl->assign("toListCategorieSouscategorie", $toListCategorieSouscategorie);
            $tpl->assign("toListCategorie", $toListCategorie);
            $tpl->assign("toListEntreprise", $toListEntreprise);
            $tpl->assign("toListAdsType", $toListAdsType);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ajout'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement de l'ajout
    public function save_add()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            if (($this->param('name') != '') &&
                ($this->param('adstype') != '') &&
                (isset($_FILES['image'])))
            {
                $oAds = new CAds();
                if ($oAds->uploadImage('image', $this->param('adstype')) == 0)
                {            	
                    $oAds->name = $this->param('name');
                    $namealias = CCommonTools::generateAlias ($oAds->name,"");
                    $oAds->namealias = $namealias;

                    $oAds->type = $this->param('adstype');

                    $oAds->description = $this->param('description');

                    if (($this->param('annonceur') != '') && ($this->param('annonceur') != 0)) {
                        $oAds->annonceur = $this->param('annonceur');
                    }

                    if (($this->param('souscategorie') != ''))
                    {
                        $oAds->souscategorie = $this->param('souscategorie');
                    }

                    $oAds->is_publie = $this->param('ispublie');
                    if ($this->param('isdefault') == 1)
                    {
                        $oAds->is_default = 1;
                        $oAds->setDefault($oAds->type);
                    } else {
                        $oAds->is_default = 0;
                    }

                    $oAds->is_default = $this->param('isdefault');
                    $oAds->insert();
                    jMessage::add(jLocale::get("ads~ads.add.success"), "success");
                } else {
                    jMessage::add(jLocale::get("ads~ads.error"), "danger");
                }
            } else {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page édition
    public function update()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();

                $oAds = CAds::getByid($this->param('id'));
                $tpl->assign("oAds", $oAds);

                $oAdsType = CAds_type::getByid($oAds->type);
                $toListEntreprise = Entreprise::getList();
                $toListCategorie = Categorie::getList();
                $toListCategorieSouscategorie = array();
                $i = 0;
                foreach ($toListCategorie as $categorie) {
                    $toListCategorieSouscategorie[$i]['categorie'] = $categorie;
                    $toListCategorieSouscategorie[$i]['souscategorie'] = $categorie->getChild();
                    $i+=1;
                }
                $souscategoriesJSON = $oAds->souscategoriesJSON();
                $tpl->assign("souscategoriesJSON", $souscategoriesJSON);

                $tpl->assign("toListCategorieSouscategorie", $toListCategorieSouscategorie);
                $tpl->assign("toListCategorie", $toListCategorie);
                $tpl->assign("toListEntreprise", $toListEntreprise);

                $tpl->assign("oAdsType", $oAdsType);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~update'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','ads');
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list_type";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement de l'Edition
    public function save_update()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            if (($this->param('id') != '') && ($this->param('name') != ''))
            {
                $oAds = CAds::getByid($this->param('id'));
                $oAds->name = $this->param('name');
                $namealias = CCommonTools::generateAlias ($oAds->name,"");
                $oAds->namealias = $namealias;

                if (isset($_FILES['image']) && ($_FILES['image']['name'] != ''))
                { 
                    $zExt = strtolower (CCommonTools::getFileNameExtension ($_FILES['image']['name'])) ;
                    if ($zExt != 'jpg' && $zExt != 'png' && $zExt != 'gif')
                    {
                        $resp = $this->getResponse('html');
                        $tpl = new jTpl();			        		
                        $resp->body->assign('MAIN', $tpl->fetchFromString("<div class='alert alert-danger'>
                                            Format de fichier non autorisé</div>"));
                        return $resp;
                    }
                    $oAds->uploadImage('image', $oAds->type);
                }

                $oAds->description = $this->param('description');
                if (($this->param('annonceur') != '') && ($this->param('annonceur') != 0))
                {
                    $oAds->annonceur = $this->param('annonceur');
                }
                else
                {
                    $oAds->annonceur = 0;
                }
                if (($this->param('souscategorie') != ''))
                {
                    $oAds->souscategorie = $this->param('souscategorie');
                }
                
                $oAds->is_publie = $this->param('ispublie');

                if ($this->param('isdefault') == 1)
                {
                    $oAds->is_default = 1;
                    $oAds->setDefault($oAds->type);
                }
                else
                {
                    $oAds->is_default = 0;
                }
                $oAds->update();
                jMessage::add(jLocale::get("ads~ads.update.success"), "success");
            }
            else
            {                
                jMessage::add(jLocale::get("ads~ads.error"), "success");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page Suppréssion
    public function delete() 
    {  
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all     
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $oAds = CAds::getByid($this->param('id'));
                $tpl->assign("oAds", $oAds);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~delete'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','ads');
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement suppréssion
    public function save_delete() 
    {  
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                $oAds = CAds::getByid($this->param('id'));
                $oAds->delete();
                $resp->action = "ads~ads:index";
                jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:index";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page suppréssion groupée
    public function delete_group()
    { 
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all  
            if ($this->param('check') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $toListAds = array();
                foreach ($this->param('check') as $id) {
                    $oListAds = CAds::getByid($id);
                    $toListAds[] = $oListAds;
                }
                $tpl->assign("toListAds", $toListAds);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~delete_group'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','ads');
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement suppréssion groupée
    public function save_delete_group()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                foreach ($this->param('id') as $id) {
                    $oAds = CAds::getByid($id);
                    $oAds->delete();
                }
                
                $resp->action = "ads~ads:index";
                jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:index";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    /**
    ***type de publicité***
    **/

    // page index type de publicité
    public function list_type() {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            $resp = $this->getResponse('html');
            $tpl = new jTpl();        
            
            $toListAdsType = CAds_type::getList();
            $tpl->assign("toListAdsType", $toListAdsType);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~list_type'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','adstype');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page ajout de type de publicité
    public function ajout_type() {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ajout_type'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','adstype');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement ajout
    public function save_add_type()
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if (($this->param('adstypename') != '') && 
                ($this->param('adstypeformatwidth') != '') && 
                ($this->param('adstypeformatheight') != '') && 
                ($this->param('typefichier') != ''))
            {
                $oAds_type = new CAds_type();
                $oAds_type->name = $this->param('adstypename');
                $namealias = CCommonTools::generateAlias ($oAds_type->name,"");
                $oAds_type->namealias = $namealias;
                $oAds_type->format = $this->param('adstypeformatwidth')."x".$this->param('adstypeformatheight');
                $oAds_type->type_fichier = $this->param('typefichier');
                $oAds_type->is_publie = $this->param('ispublie');
                $oAds_type->insert();
                jMessage::add(jLocale::get("ads~ads.add.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:list_type';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page édition
    public function update_type() 
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $oAds_type = CAds_type::getByid($this->param('id'));
                $tpl->assign("oAds_type", $oAds_type);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~update_type'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','adstype');
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list_type";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement de k'édition
    public function save_update_type()
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if (($this->param('id') != '') && 
                ($this->param('adstypename') != '') && 
                ($this->param('adstypeformatwidth') != '') && 
                ($this->param('adstypeformatheight') != '') && 
                ($this->param('typefichier') != ''))
            {
                $oAds_type = CAds_type::getByid($this->param('id'));
                $oAds_type->name = $this->param('adstypename');
                $namealias = CCommonTools::generateAlias ($oAds_type->name,"");
                $oAds_type->namealias = $namealias;
                $oAds_type->format = $this->param('adstypeformatwidth')."x".$this->param('adstypeformatheight');
                $oAds_type->type_fichier = $this->param('typefichier');
                $oAds_type->is_publie = $this->param('ispublie');
                $oAds_type->update();
                jMessage::add(jLocale::get("ads~ads.update.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:list_type';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page suppréssion de type de publicité
    public function delete_type() 
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $oAds_type = CAds_type::getByid($this->param('id'));
                $tpl->assign("oAds_type", $oAds_type);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~delete_type'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','adstype');
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list_type";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement de la suppréssion du type
    public function save_delete_type() 
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                $oAds_type = CAds_type::getByid($this->param('id'));
                $oAds_type->delete();
                $resp->action = "ads~ads:list_type";
                jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list_type";
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Page suppréssion groupée
    public function delete_group_type()
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if ($this->param('check') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $toListAdsType = array();
                foreach ($this->param('check') as $id) {	    		
                    $oAds_type = CAds_type::getByid($id);
                    $toListAdsType[] = $oAds_type;
                }
                $tpl->assign("toListAdsType", $toListAdsType);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~delete_group_type'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','adstype');
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
            
    }

    // Enregistrement de la suppréssion par groupe
    public function save_delete_group_type()
    {
        if (!jAcl2::check("ads.type.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                foreach ($this->param('id') as $id) {
                    $oAds_type = CAds_type::getByid($id);
                    $oAds_type->delete();
                }
                jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
                
                $resp->action = "ads~ads:list_type";
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:list_type";
            }
        return $resp;
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
    }

    //insert ads Test Doublons
    public function insertAdsNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias ($name,"");
        $valid = "true";
        if (CAds::ifNameExist($namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }

    //update ads Test Doublons
    public function updateAdsNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name,"");
        $valid = "true";
        if (CAds::ifUpdateNameExist($id, $namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }

    //insert ads Test Doublons
    public function insertAdsTypeNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias ($name,"");
        $valid = "true";
        if (CAds_type::ifNameExist($namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }

    //update ads Test Doublons
    public function updateAdsTypeNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name,"");
        $valid = "true";
        if (CAds_type::ifUpdateNameExist($id, $namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}
