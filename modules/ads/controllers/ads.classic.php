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
jClasses::inc("ads~CAdsZone");
jClasses::inc("ads~CAdsPurchase");

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

    // page liste annonces
    public function liste_annonce()
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $filtre_status = $this->param('status','');
            $tpl->assign("status", $filtre_status);

            if ($filtre_status == 'en_attente')
            {
                $toListAds = CAdsPurchase::getListEnAttente();
            }
            elseif ($filtre_status == 'approuve')
            {
                $toListAds = CAdsPurchase::getListApprove();
            }
            elseif ($filtre_status == 'rejete')
            {
                $toListAds = CAdsPurchase::getListRejete();
            }
            elseif ($filtre_status == 'expire')
            {
                $toListAds = CAdsPurchase::getListExpire();
            }
            elseif ($filtre_status == 'reserve')
            {
                $toListAds = CAdsPurchase::getListReserve();
            }
            else
            {
                $toListAds = CAdsPurchase::getList();
            }

            $nbAll          = CAdsPurchase::getNbAll();
            $nbEnAttente    = CAdsPurchase::getNbEnAttente();
            $nbApprouve     = CAdsPurchase::getNbApprove();
            $nbRejete       = CAdsPurchase::getNbRejete();
            $nbExpire       = CAdsPurchase::getNbExpire();
            $nbReserve      = CAdsPurchase::getNbReserve();
            $tpl->assign("nbAll", $nbAll);
            $tpl->assign("nbEnAttente", $nbEnAttente);
            $tpl->assign("nbApprouve", $nbApprouve);
            $tpl->assign("nbRejete", $nbRejete);
            $tpl->assign("nbExpire", $nbExpire);
            $tpl->assign("nbReserve", $nbReserve);

            $tpl->assign("toListAds", $toListAds);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_purchase_list'));
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

    //Page ajout annonceur
    public function ajout_annonceur()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $tpl = new jTpl();

            // Liste des zones            
            $toListAdsType = CAdsZone::getList();
            $tpl->assign("toListAdsType", $toListAdsType);

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

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_purchase_add'));
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
    public function save_add_annonceur()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $advertiser_name    = $this->param('advertiser_name','');
            $advertiser_mail    = $this->param('advertiser_mail','');
            $type_zone          = $this->param('type_zone','');
            $status             = $this->param('status','');
            $no_follow          = $this->param('no_follow','');
            $stats_tracking     = $this->param('stats_tracking','');
            $price              = $this->param('price','');
            $currency           = $this->param('currency','');
            $payment_method     = $this->param('payment_method','');
            $payment_status     = $this->param('payment_status','');
            $inscription        = $this->param('inscription','');
            $cost_model         = $this->param('cost_model','');
            $publication_start  = $this->param('publication_start','');
            $publication_day    = $this->param('publication_day','');
            $image              = $this->param('image','');
            $website_url        = $this->param('website_url','');
            $alt_text           = $this->param('alt_text','');
            $categorie_filtre   = $this->param('categorie_filtre','');
            $sub_id             = $this->param('sub_id','');

        
            if (($advertiser_name != '') && ($advertiser_mail != '') && ($type_zone != '') && 
                ($status != '') && ($price != '') && ($currency != '') && 
                ($payment_method != '') && ($payment_status != '') && 
                (($inscription == 1 && $sub_id != '') || $inscription == 0) && ($cost_model != '') && 
                ($publication_start != '') && ($publication_day != '') && (isset($_FILES['image'])))
            {

                $oAdsPurchase = new CAdsPurchase();
                if ($_FILES['image']['name'] != '')
                {          	
                    $oAdsPurchase->reference            = CCommonTools::randomString(8);
                    $oAdsPurchase->advertiser_name      = $advertiser_name;
                    $oAdsPurchase->advertiser_mail      = $advertiser_mail;
                    $oAdsPurchase->zone_type            = $type_zone;
                    $oAdsPurchase->status               = $status;
                    $oAdsPurchase->no_follow            = $no_follow;
                    $oAdsPurchase->stats_tracking       = $stats_tracking;
                    $oAdsPurchase->price                = $price;
                    $oAdsPurchase->currency             = $currency;
                    $oAdsPurchase->payment_method       = $payment_method;
                    $oAdsPurchase->payment_status       = $payment_status;
                    $oAdsPurchase->subscription         = $inscription;
                    $oAdsPurchase->subscription_id      = $sub_id;
                    $oAdsPurchase->charging_model       = $cost_model;

                    $dt = new jDateTime();
                    $dt->setFromString($publication_start, jDateTime::LANG_DFORMAT);
                    $oAdsPurchase->publication_start    = $dt->toString(jDateTime::DB_DFORMAT);

                    $oAdsPurchase->publication_day      = $publication_day;
                    $oAdsPurchase->uploadImage('image', $type_zone);
                    $oAdsPurchase->website_url          = $website_url;
                    $oAdsPurchase->alt_text             = $alt_text;

                    if ($categorie_filtre != '')
                    {
                        $filtre = explode(',', $categorie_filtre);

                        if (trim($filtre[0]) == 'categorie')
                        {
                            $oAdsPurchase->categorie_id     = trim($filtre[1]);
                        }
                        elseif (trim($filtre[0]) == 'souscategorie')
                        {
                            $oAdsPurchase->souscategorie_id = trim($filtre[1]);
                        } 
                    }

                    $oAdsPurchase->insert();
                    jMessage::add(jLocale::get("ads~ads.add.success"), "success");
                } else {
                    jMessage::add(jLocale::get("ads~ads.error"), "danger");
                }
            } else {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:liste_annonce';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Change status to expired
    public function set_expired()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $id = $this->param('id','');
            if ($id != '') {
                $oAdsPurchase = CAdsPurchase::getById($id);
                $oAdsPurchase->changeStatus(4);
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:liste_annonce';
            jMessage::add(jLocale::get("ads~ads.status.change.expired"), "success");
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Edition d'un annonce
    public function editer_annonceur()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $tpl = new jTpl();

            if ($this->param('id','') != '')
            {
                $id = $this->param('id','');
                $oAdsPurchase = CAdsPurchase::getById($id);
                $tpl->assign("oAdsPurchase", $oAdsPurchase);

                // Liste des zones            
                $toListAdsType = CAdsZone::getList();
                $tpl->assign("toListAdsType", $toListAdsType);

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

                // liste choix status
                $toStatus = array(
                                    array(1, 'En attente'), 
                                    array(2, 'Approuvé'), 
                                    array(3, 'Rejeté'), 
                                    array(4, 'Expiré') , 
                                    array(5, 'Réservé')
                                );
                $tpl->assign("toStatus", $toStatus);

                // liste payment method
                $toPaymentMethod = array(
                                    array(1, 'Cash'), 
                                    array(2, 'Par chèque'), 
                                    array(3, 'Paypal'), 
                                    array(3, 'Par mobile')
                                );
                $tpl->assign("toPaymentMethod", $toPaymentMethod);

                // liste payment status
                $toPaymentStatus = array(
                                    array(1, 'Payé'), 
                                    array(2, 'Non payé'), 
                                    array(3, 'Invalide')
                                );
                $tpl->assign("toPaymentStatus", $toPaymentStatus);

                // liste cost model
                $toCostModel = array(
                                    array(1, 'Coût journalier'), 
                                    array(2, 'Coût par clic'), 
                                    array(3, 'Coût par impression')
                                );
                $tpl->assign("toCostModel", $toCostModel);

                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~ads_purchase_edit'));
                $resp->body->assign('selectedMenuItem','ads');
                $resp->body->assign('selectedMenuChildItem','ads');

            }
            else
            {
                $resp = $this->getResponse ('redirect');
                $resp->action = 'ads~ads:liste_annonce';
                jMessage::add(jLocale::get("ads~ads.aucun.annonce.choisi"), "danger");               
            }
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;        
    }


    // Enregistrement de l'édition
    public function save_edit_annonceur()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $id                 = $this->param('annonce_id','');
            $advertiser_name    = $this->param('advertiser_name','');
            $advertiser_mail    = $this->param('advertiser_mail','');
            $type_zone          = $this->param('type_zone','');
            $status             = $this->param('status','');
            $no_follow          = $this->param('no_follow','');
            $stats_tracking     = $this->param('stats_tracking','');
            $price              = $this->param('price','');
            $currency           = $this->param('currency','');
            $payment_method     = $this->param('payment_method','');
            $payment_status     = $this->param('payment_status','');
            $inscription        = $this->param('inscription','');
            $cost_model         = $this->param('cost_model','');
            $publication_start  = $this->param('publication_start','');
            $publication_day    = $this->param('publication_day','');
            $image              = $this->param('image','');
            $website_url        = $this->param('website_url','');
            $alt_text           = $this->param('alt_text','');
            $categorie_filtre   = $this->param('categorie_filtre','');
            $sub_id             = $this->param('sub_id','');

        
            if (($id != '') && ($advertiser_name != '') && ($advertiser_mail != '') && ($type_zone != '') && 
                ($status != '') && ($price != '') && ($currency != '') && 
                ($payment_method != '') && ($payment_status != '') && 
                (($inscription == 1 && $sub_id != '') || $inscription == 0) && ($cost_model != '') && 
                ($publication_start != '') && ($publication_day != ''))
            {

                $oAdsPurchase = CAdsPurchase::getById($id);
                $oAdsPurchase->advertiser_name      = $advertiser_name;
                $oAdsPurchase->advertiser_mail      = $advertiser_mail;
                $oAdsPurchase->zone_type            = $type_zone;
                $oAdsPurchase->status               = $status;
                $oAdsPurchase->no_follow            = $no_follow;
                $oAdsPurchase->stats_tracking       = $stats_tracking;
                $oAdsPurchase->price                = $price;
                $oAdsPurchase->currency             = $currency;
                $oAdsPurchase->payment_method       = $payment_method;
                $oAdsPurchase->payment_status       = $payment_status;
                $oAdsPurchase->subscription         = $inscription;
                $oAdsPurchase->subscription_id      = $sub_id;
                $oAdsPurchase->charging_model       = $cost_model;

                $dt = new jDateTime();
                $dt->setFromString($publication_start, jDateTime::LANG_DFORMAT);
                $oAdsPurchase->publication_start    = $dt->toString(jDateTime::DB_DFORMAT);

                $oAdsPurchase->publication_day      = $publication_day;
                if ($_FILES['image']['name'] != '')
                {
                    $oAdsPurchase->uploadImage('image', $type_zone);
                }
                $oAdsPurchase->website_url          = $website_url;
                $oAdsPurchase->alt_text             = $alt_text;

                if ($categorie_filtre != '')
                {
                    $filtre = explode(',', $categorie_filtre);

                    if (trim($filtre[0]) == 'categorie')
                    {
                        $oAdsPurchase->categorie_id     = trim($filtre[1]);
                    }
                    elseif (trim($filtre[0]) == 'souscategorie')
                    {
                        $oAdsPurchase->souscategorie_id = trim($filtre[1]);
                    } 
                }

                $oAdsPurchase->update();
                jMessage::add(jLocale::get("ads~ads.update.success").' (id = '.$id.')', "success");
            } else {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:liste_annonce';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // copie
    public function copier_annonceur()
    {
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all     
            if ($this->param('id','') != '')
            {
                $id = $this->param('id','');
                $oAdsPurchase = CAdsPurchase::getById($id);
                $newId = $oAdsPurchase->copy();
                jMessage::add(jLocale::get("ads~ads.copy.success").' (nouveau id = '.$newId.')', "success");
            } else {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'ads~ads:liste_annonce';
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
    public function supprimer_annonce() 
    {  
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all     
            if ($this->param('id','') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $oAdsPurchase = CAdsPurchase::getById($this->param('id'));
                $tpl->assign("oAdsPurchase", $oAdsPurchase);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('ads~ads_purchase_delete'));
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
    public function save_delete_annonceur() 
    {  
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all  
            if ($this->param('id','') != '')
            {
                $resp = $this->getResponse('redirect');
                $oAds = CAdsPurchase::getByid($this->param('id'));
                $oAds->delete();
                $resp->action = "ads~ads:liste_annonce";
                jMessage::add(jLocale::get("ads~ads.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("ads~ads.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:liste_annonce";
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

    // page statistiques
    public function statistiques()
    {        
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            /*$filtre_status = $this->param('status','');
            $tpl->assign("status", $filtre_status);

            if ($filtre_status == 'en_attente')
            {
                $toListAds = CAdsPurchase::getListEnAttente();
            }
            elseif ($filtre_status == 'approuve')
            {
                $toListAds = CAdsPurchase::getListApprove();
            }
            elseif ($filtre_status == 'rejete')
            {
                $toListAds = CAdsPurchase::getListRejete();
            }
            elseif ($filtre_status == 'expire')
            {
                $toListAds = CAdsPurchase::getListExpire();
            }
            elseif ($filtre_status == 'reserve')
            {
                $toListAds = CAdsPurchase::getListReserve();
            }
            else
            {
                $toListAds = CAdsPurchase::getList();
            }

            $nbAll          = CAdsPurchase::getNbAll();
            $nbEnAttente    = CAdsPurchase::getNbEnAttente();
            $nbApprouve     = CAdsPurchase::getNbApprove();
            $nbRejete       = CAdsPurchase::getNbRejete();
            $nbExpire       = CAdsPurchase::getNbExpire();
            $nbReserve      = CAdsPurchase::getNbReserve();
            $tpl->assign("nbAll", $nbAll);
            $tpl->assign("nbEnAttente", $nbEnAttente);
            $tpl->assign("nbApprouve", $nbApprouve);
            $tpl->assign("nbRejete", $nbRejete);
            $tpl->assign("nbExpire", $nbExpire);
            $tpl->assign("nbReserve", $nbReserve);

            $tpl->assign("toListAds", $toListAds);*/
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_stats'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_stat');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Filtre d'annonce ID auto complète
    public function autoCompletIdAnnonce()
    {
        $resp = $this->getResponse('json');

        // datas
        $datas = array();

        $term = $this->param("q");
        if (!empty($term)) {
            $datas = CAdsPurchase::autoComplet($term);
        }
        $resp->data = $datas;

        return $resp;
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
