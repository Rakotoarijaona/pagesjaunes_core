<?php
/**
* @package   pagesjaunes_core
* @subpackage ads
* @author    R
* @copyright R
* @license    All rights reserved
*/

jClasses::inc("ads~CAdsZone");
jClasses::inc("ads~CAdsZonePrice");
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");

class ads_zoneCtrl extends jController {
    /**
    *
    */
    public $pluginParams=array(
        'index' =>array('jacl2.right'=>'ads.list')
    );

    // page index
    public function index()
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();

            // Filtre
            if ($this->param('status','') == 'publie') {
                $toAdsZones = CAdsZone::getListPublie();
                $tpl->assign("status", 'publie');
            } elseif ($this->param('status','') == 'notpublie') {
                $toAdsZones = CAdsZone::getListNotPublie();
                $tpl->assign("status", 'notpublie');
            } else {
                $toAdsZones = CAdsZone::getList();
                $tpl->assign("status", 'all');
            }
            $tpl->assign("toAdsZones", $toAdsZones);
            $tpl->assign("nbAll", CAdsZone::getNbAll());
            $tpl->assign("nbPublie", CAdsZone::getNbPublie());
            $tpl->assign("nbNotPublie", CAdsZone::getNbNotPublie());

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_list'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_zone');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Ajout
    public function ajout()
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_add'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_zone');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Enregistrement de l'ajout
    public function save_ajout()
    {
        $resp               = $this->getResponse('redirect');

        $zone_name          = $this->param('zone_name','');
        $cost_model         = $this->param('cost_model','');
        $width              = $this->param('width','');
        $height             = $this->param('height','');
        $slots_columns      = $this->param('column','');
        $slots_row          = $this->param('row','');
        $number_rotation    = $this->param('number_rotation','');
        $number_client      = $this->param('number_client');
        $line_height        = $this->intParam('line_height','');
        $row                = $this->intParam('row','');
        $is_publie          = $this->param('is_publie','');
        $toPrice            = $this->param('hdnprice','');

        if ($zone_name != '' && $cost_model != '' && $width != '' && $height != '' && $slots_columns != '' && $slots_row != '' &&
            $number_rotation != '' && $number_client != '' && $line_height != '' && $row != '' && $toPrice != '' && $is_publie != '')
        {

            $oAdsZone = new CAdsZone(null, $zone_name, $cost_model, $width, $height, $slots_columns, $slots_row, $number_rotation, 
                                    $number_client, $line_height, $is_publie, null, null, null, null, null);

            foreach ($toPrice as $price) {
                $oPrice = new CAdsZonePrice(null, null, $price['price'], $price['number'], $price['unity']);
                $oAdsZone->toPrice[] = $oPrice;
            }
            $oAdsZone->insert();
        }
        $resp->action = "ads~ads_zone:index";
        return $resp;
    }

    // Edition
    public function edition()
    {
        $resp = $this->getResponse('html');
        $id = $this->param('id');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $oAdsZone = CAdsZone::getById($id);
            $tpl->assign('oAdsZone', $oAdsZone);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_update'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_zone');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Sauvegarde édition
    public function save_edit()
    {
        $resp               = $this->getResponse('redirect');

        $id                 = $this->param('id','');
        $zone_name          = $this->param('zone_name','');
        $cost_model         = $this->param('cost_model','');
        $width              = $this->param('width','');
        $height             = $this->param('height','');
        $slots_columns      = $this->param('column','');
        $slots_row          = $this->param('row','');
        $number_rotation    = $this->param('number_rotation','');
        $number_client      = $this->param('number_client');
        $line_height        = $this->intParam('line_height','');
        $row                = $this->intParam('row','');
        $is_publie          = $this->param('is_publie','');
        $toPrice            = $this->param('hdnprice','');

        if ($this->param('rmprice','') != ''){
            $oPrice = new CAdsZonePrice($this->param('rmprice',''));
            $oPrice->delete();
        }

        if ($id != '' && $zone_name != '' && $cost_model != '' && $width != '' && $height != '' && $slots_columns != '' && $slots_row != '' &&
            $number_rotation != '' && $number_client != '' && $line_height != '' && $row != '' && $is_publie != '')
        {

            $oAdsZone = new CAdsZone($id, $zone_name, $cost_model, $width, $height, $slots_columns, $slots_row, $number_rotation, 
                                    $number_client, $line_height, $is_publie, null, null, null, null, null);

            if (!empty($toPrice)) {
                foreach ($toPrice as $price) {
                    $oPrice = new CAdsZonePrice(null, $id, $price['price'], $price['number'], $price['unity']);
                    $oAdsZone->toPrice[] = $oPrice;
                }
            }
            $oAdsZone->update();
        }
        $resp->action = "ads~ads_zone:index";
        return $resp;
    }

    // Suppression
    public function suppression ()
    {
        $resp = $this->getResponse('html');
        $id = $this->param('id');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $oAdsZone = CAdsZone::getById($id);
            $tpl->assign('oAdsZone', $oAdsZone);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_delete'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_zone');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Sauvegarder la suppression
    public function save_delete ()
    {
        $resp = $this->getResponse('redirect');
        $id = $this->param('id');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $oAdsZone = CAdsZone::getById($id);
            $oAdsZone->delete();
            $resp->action = "ads~ads_zone:index";
        } else {
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
                $toListAdsZone = array();
                foreach ($this->param('check') as $id) {
                    $oAdsZone = CAdsZone::getById($id);
                    $toListAdsZone[] = $oAdsZone;
                }
                $tpl->assign("toListAdsZone", $toListAdsZone);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_delete_group'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','ads_zone');
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
    public function save_delete_group()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all  
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                foreach ($this->param('id') as $id) {
                    $oAdsZone = CAdsZone::getById($id);
                    $oAdsZone->delete();
                }
                $resp->action = "ads~ads_zone:index";
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads_zone:index";
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

    // Pub par défaut
    public function pubs_par_defaut()
    {
        $resp = $this->getResponse('html');
        $id = $this->param('id');

        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $oAdsZone = CAdsZone::getById($id);
            $tpl->assign('oAdsZone', $oAdsZone);
            
            // Liste des categories
            $oListCategorie = array();
            $oList = Categorie::getList();
            $i = 0;
            foreach ($oList as $categorie) {
                $oListCategorie[$i]['categorie'] = $categorie;
                $oListCategorie[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }
            $tpl->assign("oListCategorie", $oListCategorie);
            $toAdsZoneDefault = CAdsZoneDefault::getByZoneId($id);
            $i = 1;
            $tpl->assign("i", $i);
            $tpl->assign('toAdsZoneDefault', $toAdsZoneDefault);

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_zone_default'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_zone');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Sauvegarde de la configuration choisie et rafraichissement de la liste
    public function save_default_config()
    {
        $resp = $this->getResponse ('htmlfragment');

        $nb_ad      = $this->param('nb_ad','');
        $display    = $this->param('display',1);
        $zone_id    = $this->param('zone_id');

        $oAdsZone   = CAdsZone::getById($zone_id);

        if ($nb_ad != '') {
            $oAdsZone->save_new_config($nb_ad, $display);
        }

        $toAdsZoneDefault = CAdsZoneDefault::getByZoneId($zone_id);
        $resp->tpl->assign('toAdsZoneDefault', $toAdsZoneDefault);

        $resp->tplname = 'ads~ads_zone_default_list';
        return $resp;
    }

    // get ad form for edit
    public function editAdDefault()
    {
        $resp = $this->getResponse ('htmlfragment');

        $id = $this->param('id');
        $oAdsZoneDefault   = CAdsZoneDefault::getById($id);
        $resp->tpl->assign("oAdsZoneDefault", $oAdsZoneDefault);

        // Liste des categories
        $oListCategorie = array();
        $oList = Categorie::getList();
        $i = 0;
        foreach ($oList as $categorie) {
            $oListCategorie[$i]['categorie'] = $categorie;
            $oListCategorie[$i]['souscategorie'] = $categorie->getChild();
            $i+=1;
        }
        $resp->tpl->assign("oListCategorie", $oListCategorie);

        $resp->tplname = 'ads~ads_zone_default_form';
        return $resp;
    }

    // save edit ad
    public function save_edit_ad()
    {
        $resp = $this->getResponse ('htmlfragment');

        $id    = $this->param('id');
        $ad_type = $this->param('ad_type','');
        $lien_ad    = $this->param('lien_ad');
        $zone_id    = $this->param('zone_id');
        $oAdsZoneDefault = CAdsZoneDefault::getById($id);
        if ($ad_type != '' && $ad_type == 1) {
            if ($_FILES['image']['name'] != '')
            {
                $oAdsZoneDefault->uploadImage('image');
            }
        } elseif ($ad_type != '' && $ad_type == 2) {
            $oAdsZoneDefault->html = $this->param('html_type','');
        }
        $oAdsZoneDefault->zone_id  = $zone_id;
        $oAdsZoneDefault->type     = $ad_type;
        $oAdsZoneDefault->is_publie     = 1;

        if ($this->param('categorie','') != '') {
            $oAdsZoneDefault->categorie_id      = $this->param('categorie');
        }

        if ($this->param('souscategorie','') != '') {
            $oAdsZoneDefault->souscategorie_id  = $this->param('souscategorie');
        }
        $oAdsZoneDefault->link = $lien_ad;

        $oAdsZoneDefault->update();

        $toAdsZoneDefault = CAdsZoneDefault::getByZoneId($zone_id);
        $resp->tpl->assign('toAdsZoneDefault', $toAdsZoneDefault);

        $resp->tplname = 'ads~ads_zone_default_list';
        return $resp;
    }
}

