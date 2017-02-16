<?php
/**
* @package   pagesjaunes_core
* @subpackage entreprise
* @author    R
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc("entreprise~Entreprise");
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");
jClasses::inc("catalogue~Catalogue");
jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");

class entrepriseCtrl extends jController {
    
    public $pluginParams = array(
        'index'             => array('jacl2.right'=>'entreprise.list'),
        'getEntrepriseList' => array('jacl2.right'=>'entreprise.list'),
        'ajout'             => array('jacl2.right'=>'entreprise.create'),
        'edition'           => array('jacl2.right'=>'entreprise.update'),
    );

    public function index() 
    {
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $tpl = new jTpl();        
            
            $toListEntreprise = Entreprise::getList();

            $oListCategorie = array();
            $oList = Categorie::getList();
            $i = 0;
            foreach ($oList as $categorie) {
                $oListCategorie[$i]['categorie'] = $categorie;
                $oListCategorie[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }

            $tpl->assign("toListEntreprise", $toListEntreprise);
            $tpl->assign("oListCategorie", $oListCategorie);
            $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
            $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('entreprise~index'));
            $resp->body->assign('selectedMenuItem','entreprise');
        }else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function getEntrepriseList() 
    {
        $resp = $this->getResponse('htmlfragment');

        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $toListEntreprise = Entreprise::getList();
            $resp->tpl->assign("toListEntreprise", $toListEntreprise);
            $resp->tplname = "entreprise~entreprise_list";
        }else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }

        return $resp;
    }

    public function filterByCategorieEntreprise() 
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $categorieId = $this->param('categorieId');
            $toListEntreprise = Entreprise::filterByCategorie($categorieId);
            $resp->tpl->assign("toListEntreprise", $toListEntreprise);
            $resp->tplname = "entreprise~entreprise_list"; 
        }      
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function filterBySouscategorieEntreprise() 
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $souscategorieId = $this->param('souscategorieId');
            $toListEntreprise = Entreprise::filterBySouscategorie($souscategorieId);
            $resp->tpl->assign("toListEntreprise", $toListEntreprise);
            $resp->tplname = "entreprise~entreprise_list";
        }      
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function ajout() 
    {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();

        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
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
            $resp->body->assign('MAIN', $tpl->fetch('entreprise~ajout'));
            $resp->body->assign('selectedMenuItem','entreprise');
        }else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }

        return $resp;
    }

    public function uploadVideo() 
    {
        $resp = $this->getResponse('htmlfragment');        
        
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $fileName = $_FILES["videosfile"]["name"]; // The file name
            $fileTmpLoc = $_FILES["videosfile"]["tmp_name"]; // File in the PHP tmp folder
            $fileType = $_FILES["videosfile"]["type"]; // The type of file it is
            $fileSize = $_FILES["videosfile"]["size"]; // File size in bytes
            $fileErrorMsg = $_FILES["videosfile"]["error"]; // 0 for false... and 1 for true
            $target_file = jApp::config()->urlengine['basePath'].'entreprise/videos/'.$fileName;
            $uploadOk = 1;
            $dt = new jDateTime();
            $dt->now();
            $datecreation = $dt->toString(jDateTime::DB_DFORMAT);
            $newName = "entreprisepresentation".$datecreation.$dt->hour.$dt->minute.$dt->second.'.mp4';
            
            if (!$fileTmpLoc) { // if file not chosen
                $resp->addContent('<div class="alert alert-warning">ERROR: Please browse for a file before clicking the upload button</div>');
                return $resp; 
            }

            // Allow certain file formats
            if($fileType != "video/mp4") {
                $resp->addContent('<div class="alert alert-warning">Sorry, only .mp4 video are allowed</div>');
                return $resp;
            }
            if(move_uploaded_file($fileTmpLoc, "entreprise/videos/$newName")){
                $resp->addContent($newName);
                return $resp;
            } else {
                $resp->addContent('<div class="alert alert-warning">move_uploaded_file function failed</div>');
                return $resp;
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
    function updateVignetteYoutube()
    {
        $resp = $this->getResponse('htmlfragment');
        
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            if ($operation == 'insert'){            
                $urlVideo = $this->param('urlVideo');
                if ($_FILES['videosfile']['name'] != ''){
                    $vignette = $oEntreprise->uploadVignette('videosfile');
                }

                if($vignette != '')
                {
                    $id = $oEntreprise->insertVideosYoutube($urlVideo, $vignette);
                }

            } elseif ($operation == 'update') {
                $videoId = $this->param('videoId');
                $urlVideo = $this->param('urlVideo');
                $vignette = '';

                if (isset($_FILES['videosfile'])){
                    if ($_FILES['videosfile']['name'] != ''){
                        $vignette = $oEntreprise->uploadVignette('videosfile');
                    }
                }
                $oEntreprise->updateVideoYoutube($videoId, $urlVideo, $vignette);
            } elseif ($operation == 'delete'){
                $videoId = $this->param('id');
                $oEntreprise->deleteVideoYoutube($videoId);
            }

            // update weight
            Entreprise::setWeight($entrepriseId);

            $oEntreprise->videos_youtube =  Entreprise::getVideosYoutube($this->param('entrepriseId'));
            $resp->tpl->assign("oEntreprise", $oEntreprise);
            $resp->tplname = "entreprise~videos_list";
        }      
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function getUpdateVideosForm()
    {
        $resp = $this->getResponse('htmlfragment');
        
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $videosId = $this->param('id');
            $maFactory = jDao::get('entreprise~videos');
            $oVideos = $maFactory->get($videosId); 
            $resp->tpl->assign("oVideos", $oVideos);
            $resp->tplname = "entreprise~update_videos_form";
        }      
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    public function getAddVideosForm()
    {
        $resp = $this->getResponse('htmlfragment');   
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $resp->tplname = "entreprise~add_videos_form";
        }     
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    function updateGalerieImage()
    {
        $resp = $this->getResponse('htmlfragment');  
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            if ($operation == 'insert')
            {            
                if (isset($_FILES['imagefile']))
                {
                    if ($_FILES['imagefile']['name'] != '')
                    {
                        $oUploader = new CPhotosUpload ('imagefile') ;
                        $uploadResults = $oUploader->doUpload () ;
                        if (empty ($uploadResults ["errorcode"]))
                        {
                            $target_file = $uploadResults ["filename"] ;
                            $id = $oEntreprise->insertImagesGalerie($target_file);
                        };
                    }
                }

            }
            elseif ($operation == 'delete') 
            {
                $imageId = $this->param('id');;
                $oEntreprise->deleteImagesGalerie($imageId);
            }     
            
            $oEntreprise->galerie_image =  Entreprise::getImagesGalerie($this->param('entrepriseId'));
            $resp->tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $resp->tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
            $resp->tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
            $resp->tpl->assign("oEntreprise", $oEntreprise);
            $resp->tplname = "entreprise~galerie_image_list";
        }     
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    public function insertInfoGenerale()
    {
        $resp = $this->getResponse('redirect');

        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entreprise = new Entreprise();
            $entreprise->raisonsociale = $this->param("raisonSociale");
            $entreprise->activite = $this->param("descActivite");
            $entreprise->adresse = $this->param("adresse");
            $entreprise->souscategories = $this->param("souscategorie");
            //$entreprise->logo
            $logo = $this->param('logo');
            $fileName = $_FILES["logo"]["name"]; // The file name
            $fileTmpLoc = $_FILES["logo"]["tmp_name"]; // File in the PHP tmp folder
            $fileType = $_FILES["logo"]["type"]; // The type of file it is
            $fileSize = $_FILES["logo"]["size"]; // File size in bytes
            $fileErrorMsg = $_FILES["logo"]["error"]; // 0 for false... and 1 for true
            $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
            $target_file = str_replace(' ', '', $entreprise->raisonsociale)."logo.".$imageFileType;
            $uploadOk = 1;        
            if (!$fileTmpLoc) { // if file not chosen
                $uploadOk = 0;
            }        
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadOk = 0;
            }
            if(move_uploaded_file($fileTmpLoc, "entreprise/images/$target_file")){
                $entreprise->logo = $target_file;
            } else {
                $uploadOk = 0;
            }

            $entreprise->contact_interne = $this->param("personneContact");
            $entreprise->fonction_contact = $this->param("fonctionPersonneContact");
            $entreprise->url_website = $this->param("siteweb");
            $entreprise->emails = $this->param("email_list");
            $entreprise->telephones = $this->param("telephones");
            $entreprise->motscles = $this->param("motscles");
            $entreprise->is_publie = $this->param('radioIsPublie');
            $entreprise->region = $this->param('region');
            $entreprise->editer_front_active = $this->param('radioEdit');
            $entreprise->login = $this->param('loginEntreprise');
            $entreprise->clear_password = $this->param('pwdEntreprise');
            $entreprise->insert();            
            jMessage::add(jLocale::get("entreprise~entreprise.insert.informations.generales.success"), "success");
            $resp->action = "entreprise~entreprise:edition";
            $resp->params = array('id'=>$entreprise->id);

            // update weight
            Entreprise::setWeight($entreprise->id);
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    public function edition()
    {
        $id = $this->param("id");

        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $oEntreprise = Entreprise::getById($id);
            if ($oEntreprise->raisonsociale != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
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
                
                $oEntreprise->emails = Entreprise::getEmailsById($id);
                $oEntreprise->telephones = Entreprise::getTelephonesById($id);
                $oEntreprise->services = Entreprise::getServices($id);
                $oEntreprise->produits = Entreprise::getProduits($id);
                $oEntreprise->marques = Entreprise::getMarques($id);


                $oCatalogueList = Entreprise::getCatalogues($id);
                $tpl->assign ("oCatalogueList", $oCatalogueList);
                $oEntreprise->videos_youtube =  Entreprise::getVideosYoutube($id);
                $oEntreprise->galerie_image =  Entreprise::getImagesGalerie($id);
            
                $tpl->assign("oEntreprise", $oEntreprise);
                $souscategoriesJSON = $oEntreprise->souscategoriesJSON();
                $tpl->assign("souscategoriesJSON", $souscategoriesJSON);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
                $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
                $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
                $resp->body->assign('MAIN', $tpl->fetch('entreprise~edition'));
                $resp->body->assign('selectedMenuItem','entreprise');
                return $resp;
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "entreprise~entreprise:index";
                return $resp;
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

    public function updateEmails()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            $id = $this->intParam('emailId');
            if ($operation == 'insert')
            {            
                $oEntreprise->insertEmail($this->param('emailText'));
            }
            elseif ($operation == 'update')
            {
                $emailText = $this->param('emailText');
                $oEntreprise->updateEmail($id, $emailText);
            }
            elseif ($operation == 'delete') 
            {
                $oEntreprise->deleteEmail($id);
            }

            $oEntreprise->emails = Entreprise::getEmailsById($entrepriseId);
            $resp->tpl->assign ("oEntreprise", $oEntreprise);

            $resp->tplname = 'entreprise~email_list';
        }     
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    public function getUpdateEmailForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->intParam('entrepriseId');
            $emailId = $this->intParam('emailId');
            $emailFactory = jDao::get('entreprise~email');
            $oEmail = $emailFactory->get($emailId);
            $resp->tpl->assign ("entrepriseId", $entrepriseId);
            $resp->tpl->assign ("oEmail", $oEmail);
            $resp->tplname = 'entreprise~update_email_form';
        }     
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    public function updateTelephones()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            $id = $this->intParam('telephoneId');
            if ($operation == 'insert')
            {            
                $oEntreprise->insertTelephone($this->param('numero'));
            }
            elseif ($operation == 'update')
            {
                $numero = $this->param('numero');
                $oEntreprise->updateTelephone($id, $numero);
            }
            elseif ($operation == 'delete') 
            {
                $oEntreprise->deleteTelephone($id);
            }

            $oEntreprise->telephones = Entreprise::getTelephonesById($entrepriseId);
            $resp->tpl->assign ("oEntreprise", $oEntreprise);

            $resp->tplname = 'entreprise~telephone_list';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    public function getUpdateTelephoneForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->intParam('entrepriseId');
            $telephoneId = $this->intParam('telephoneId');
            $telFactory = jDao::get('entreprise~telephone');
            $oTelephone = $telFactory->get($telephoneId);
            $resp->tpl->assign ("entrepriseId", $entrepriseId);
            $resp->tpl->assign ("oTelephone", $oTelephone);
            $resp->tplname = 'entreprise~update_telephone_form';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }


    public function updateServices()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            $id = $this->intParam('serviceId');
            if ($operation == 'insert')
            {            
                $oEntreprise->insertService($this->param('name'));
            }
            elseif ($operation == 'update')
            {
                $name = $this->param('name');
                $oEntreprise->updateService($id, $name);
            }
            elseif ($operation == 'delete') 
            {
                $oEntreprise->deleteService($id);
            }

            $oEntreprise->services = Entreprise::getServices($entrepriseId);
            $resp->tpl->assign ("oEntreprise", $oEntreprise);

            $resp->tplname = 'entreprise~service_list';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    public function getUpdateServiceForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->intParam('entrepriseId');
            $serviceId = $this->intParam('serviceId');
            $factory = jDao::get('entreprise~service');
            $oService = $factory->get($serviceId);
            $resp->tpl->assign ("entrepriseId", $entrepriseId);
            $resp->tpl->assign ("oService", $oService);
            $resp->tplname = 'entreprise~update_service_form';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }

    public function updateProduits()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            $id = $this->intParam('produitId');
            if ($operation == 'insert')
            {            
                $oEntreprise->insertProduit($this->param('name'));
            }
            elseif ($operation == 'update')
            {
                $name = $this->param('name');
                $oEntreprise->updateProduit($id, $name);
            }
            elseif ($operation == 'delete') 
            {
                $oEntreprise->deleteProduit($id);
            }

            $oEntreprise->produits = Entreprise::getProduits($entrepriseId);
            $resp->tpl->assign ("oEntreprise", $oEntreprise);

            $resp->tplname = 'entreprise~produit_list';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    public function getUpdateProduitForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->intParam('entrepriseId');
            $produitId = $this->intParam('produitId');
            $factory = jDao::get('entreprise~produit');
            $oProduit = $factory->get($produitId);
            $resp->tpl->assign ("entrepriseId", $entrepriseId);
            $resp->tpl->assign ("oProduit", $oProduit);
            $resp->tplname = 'entreprise~update_produit_form';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }


    public function updateMarques()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);
            $id = $this->intParam('marqueId');
            if ($operation == 'insert')
            {            
                $oEntreprise->insertMarque($this->param('name'));
            }
            elseif ($operation == 'update')
            {
                $name = $this->param('name');
                $oEntreprise->updateMarque($id, $name);
            }
            elseif ($operation == 'delete') 
            {
                $oEntreprise->deleteMarque($id);
            }

            $oEntreprise->marques = Entreprise::getMarques($entrepriseId);
            $resp->tpl->assign ("oEntreprise", $oEntreprise);

            $resp->tplname = 'entreprise~marque_list';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }

    public function getUpdateMarqueForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->intParam('entrepriseId');
            $marqueId = $this->intParam('marqueId');
            $factory = jDao::get('entreprise~marque');
            $oMarque = $factory->get($marqueId);
            $resp->tpl->assign ("entrepriseId", $entrepriseId);
            $resp->tpl->assign ("oMarque", $oMarque);
            $resp->tplname = 'entreprise~update_marque_form';
        }            
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }

    //update all info
    public function updateEntreprise()
    {        
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $raisonSociale = $this->param('raisonSociale');
            $descActivite = $this->param('descActivite');
            $adresse = $this->param('adresse');
            $siteweb = $this->param('siteweb');
            $souscategorie = $this->param('souscategorie');
            $personnecontact = $this->param('personnecontact');
            $fonctionPersonneContact = $this->param('fonctionPersonneContact');
            $motscles = $this->param('motscles');

            $radioActivVideo = $this->param('radioActivVideo');
            $radioGalerieImage = $this->param('radioActivVideo');
            $radioActivCatalogue = $this->param('radioActivCatalogue');

            $oEntreprise = Entreprise::getById($entrepriseId);
            if (($raisonSociale != '') && ($oEntreprise->raisonsociale != $raisonSociale))
            {
                $oEntreprise->raisonsociale = $raisonSociale;
            }
            if (($descActivite != '') && ($oEntreprise->activite != $descActivite))
            {
                $oEntreprise->activite = $descActivite;
            }

            if ($_FILES["logo"]["name"] != '')
            {
                $fileName = $_FILES["logo"]["name"]; // The file name
                $fileTmpLoc = $_FILES["logo"]["tmp_name"]; // File in the PHP tmp folder
                $fileType = $_FILES["logo"]["type"]; // The type of file it is
                $fileSize = $_FILES["logo"]["size"]; // File size in bytes
                $fileErrorMsg = $_FILES["logo"]["error"]; // 0 for false... and 1 for true
                $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                $target_file = str_replace(' ', '', $oEntreprise->raisonsociale)."logo.".$imageFileType;
                $uploadOk = 1;        
                if (!$fileTmpLoc) { // if file not chosen
                    $uploadOk = 0;
                }        
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadOk = 0;
                }
                if(move_uploaded_file($fileTmpLoc, "entreprise/images/$target_file")){
                    $oEntreprise->logo = $target_file;
                }
            }        

            if (($adresse != '') && ($oEntreprise->adresse != $adresse))
            {
                $oEntreprise->adresse = $adresse;
            }
            $oEntreprise->url_website = $siteweb;
            if (sizeof($souscategorie) > 0)
            {
                $oEntreprise->souscategories = $souscategorie;
            }
            if (($personnecontact != '') && ($oEntreprise->contact_interne != $personnecontact))
            {
                $oEntreprise->contact_interne = $personnecontact;
            }
            if (($fonctionPersonneContact != '') && ($oEntreprise->fonction_contact != $fonctionPersonneContact))
            {
                $oEntreprise->contact_interne = $fonctionPersonneContact;
            }
            if (($motscles != '') && ($oEntreprise->motscles != $motscles))
            {
                $oEntreprise->motscles = $motscles;
            }
            $oEntreprise->is_publie = $this->param('radioIsPublie');
            $oEntreprise->region = $this->param('region');
            $oEntreprise->editer_front_active = $this->param('radioEdit');
            $oEntreprise->login = $this->param('loginEntreprise');
            $oEntreprise->clear_password = $this->param('pwdEntreprise');

            $oEntreprise->videos_active = $radioActivVideo;
            $oEntreprise->galerie_image_active = $radioGalerieImage;
            $googleMapLatitude = $this->param('googleMapLatitude');
            $googleMapLongitude = $this->param('googleMapLongitude');
            $radioVisuelPres = $this->param('radioVisuelPres');
            $videopresentationUrl = $this->param('videopresentationUrl');
            $radioNosServices = $this->param('radioNosServices');
            $nosServices = $this->param('nosServices');
            $radioQuiSomNs = $this->param('radioQuiSomNs');
            $quiSommesNous = $this->param('quiSommesNous');
            $radioNosRef = $this->param('radioNosRef');
            $nosRef = $this->param('nosRef');

            $oEntreprise->latitude = $googleMapLatitude;
            $oEntreprise->longitude = $googleMapLongitude;
            $oEntreprise->video_presentation_active = $radioVisuelPres;
            if ($videopresentationUrl != '')
            {
               $oEntreprise->video_presentation =  $videopresentationUrl;
            }
            $oEntreprise->nos_services_active = $radioNosServices;
            $oEntreprise->nos_services = $nosServices;
            $oEntreprise->qui_sommes_nous_active = $radioQuiSomNs;
            $oEntreprise->qui_sommes_nous = $quiSommesNous;
            $oEntreprise->nos_references_active = $radioNosRef;
            $oEntreprise->nos_references = $nosRef;
            $oEntreprise->catalogue_active = $radioActivCatalogue;
            $oEntreprise->update();

            // update weight
            Entreprise::setWeight($entrepriseId);

            jMessage::add(jLocale::get("common~common.alert.success"), "success");

            $resp = $this->getResponse('redirect');
            $resp->action = "entreprise~entreprise:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function deleteEntreprise()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('id');

            Entreprise::deleteEntreprise($entrepriseId);

            $toListEntreprise = Entreprise::getList();
            $resp->tpl->assign("toListEntreprise", $toListEntreprise);
            $resp->tplname = 'entreprise~entreprise_list';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function deleteGroupEntreprise()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $toEntrepriseId = $this->param('entrepriseGroup');
            foreach ($toEntrepriseId as $entrepriseId) {
                Entreprise::deleteEntreprise($entrepriseId);
            }
            
            $toListEntreprise = Entreprise::getList();
            $resp->tpl->assign("toListEntreprise", $toListEntreprise);
            $resp->tplname = 'entreprise~entreprise_list';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function updateCatalogueProduit()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $entrepriseId = $this->param('entrepriseId');
            $operation = $this->param('operation');
            $oEntreprise = Entreprise::getById($entrepriseId);

            
            if ($operation == 'insert'){            
                $oCatalogue = new Catalogue();
                if (isset($_FILES['img_produit']))
                {
                    if ($_FILES['img_produit']['name'] != '')
                    {
                        $image_produit = $oEntreprise->uploadCatalogue('img_produit');
                    }
                }

                if(!empty($this->param('refProduit')) && !empty($this->param('nomProduit')) && 
                    !empty($this->param('descProduit')) && ($image_produit != '') &&
                    !empty($this->param('marqueProduit')) && !empty($this->param('prixProduit')))
                {
                    $oCatalogue->reference_produit = $this->param('refProduit');
                    $oCatalogue->entreprise_id = $entrepriseId;
                    $oCatalogue->nom_produit = $this->param('nomProduit');
                    $oCatalogue->image_produit = $image_produit;
                    $oCatalogue->description_produit = $this->param('descProduit');
                    $oCatalogue->marque_produit = $this->param('marqueProduit');
                    $oCatalogue->prix_produit = $this->param('prixProduit');
                    $oCatalogue->is_publie = $this->param('radioCatalogueIsPublie');
                    //$oCatalogue->is_publie
                    $oCatalogue->insert();
                }
            }
            elseif ($operation == 'update')
            {
                $oCatalogue = Catalogue::getById($this->param('id_produit'));
                $oCatalogue->reference_produit = $this->param('refProduit');
                $oCatalogue->nom_produit = $this->param('nomProduit');
                if (isset($_FILES['img_produit']))
                {
                    if ($_FILES['img_produit']['name'] != '')
                    {
                        $image_produit = $oEntreprise->uploadCatalogue('img_produit');
                        $oCatalogue->image_produit = $image_produit;
                    }
                }
                $oCatalogue->description_produit = $this->param('descProduit');
                $oCatalogue->marque_produit = $this->param('marqueProduit');
                $oCatalogue->prix_produit = $this->param('prixProduit');
                $oCatalogue->is_publie = $this->param('radioCatalogueIsPublie');
                //$oCatalogue->is_publie
                $oCatalogue->update();
            }
            elseif ($operation == 'delete') 
            {
                $oCatalogue = Catalogue::getById($this->param('id'));
                $entrepriseId = $oCatalogue->entreprise_id;
                $oCatalogue->delete();
            }
            elseif ($operation == 'deleteGroup') 
            {
                $group = $this->param('catalogueGroup');
                foreach ($group as $id_produit) {
                    $oCatalogue = Catalogue::getById($id_produit);
                    $oCatalogue->delete();
                }            
            }

            // update weight
            Entreprise::setWeight($entrepriseId);

            $oCatalogueList = Entreprise::getCatalogues($entrepriseId);
            $resp->tpl->assign ("oCatalogueList", $oCatalogueList);
            $resp->tplname = 'entreprise~catalogue_list';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function getAddCatalogueForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $resp->tplname = 'entreprise~add_catalogue_form';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    public function getUpdateCatalogueForm()
    {
        $resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("entreprise.restrictall")) { //Test droit restrict all
            $oCatalogue = Catalogue::getById($this->param('id'));
            $resp->tpl->assign ("oCatalogue", $oCatalogue);
            $resp->tplname = 'entreprise~update_catalogue_form';
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
    function ifRaisonsocialeExist ()
    {
        $resp = $this->getResponse('text');
        $raisonsociale = $this->param('raisonsociale');
        $valid = "true";
        if (Entreprise::ifRaisonsocialeExist($raisonsociale) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update Test Doublons
    function ifUpdateRaisonsocialeExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $raisonsociale = $this->param('raisonsociale');
        $valid = "true";
        if (Entreprise::ifUpdateRaisonsocialeExist($id, $raisonsociale) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //insert Test Doublons
    function ifLoginExist ()
    {
        $resp = $this->getResponse('text');
        $login = $this->param('login');
        $valid = "true";
        if (Entreprise::ifLoginExist($login) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update Test Doublons
    function ifUpdateLoginExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $login = $this->param('login');
        $valid = "true";
        if (Entreprise::ifUpdateLoginExist($id, $login) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}

