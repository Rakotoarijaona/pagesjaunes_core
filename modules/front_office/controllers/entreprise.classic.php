<?php
/**
* @package   pagesjaunes_core
* @subpackage front_office
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("entreprise~Entreprise");
jClasses::inc("catalogue~Catalogue");
jClasses::inc("common~CPhotosUpload");
jClasses::inc ("common~ImageWorkshop") ;
jClasses::inc ("common~CCommonTools") ;

class entrepriseCtrl extends jController {

    //Vidéos youtube

    // getVideos
    public function getVideosYoutube() 
    {
    	$resp = $this->getResponse('json');

        $videosId   = $this->param('id');
        $maFactory  = jDao::get('entreprise~videos');
        $oVideos    = $maFactory->get($videosId);
        $toVideos   = array();
        if ($oVideos->url_youtube != '')
        {
	        $toVideos['id'] = $oVideos->id;
	        $toVideos['url_youtube'] = $oVideos->url_youtube;
	        $toVideos['vignette_video'] = $oVideos->vignette_video;
	    }
        $resp->data = $toVideos;
	    return $resp;
    }
    // updateVideos
    public function updateVideosYoutube() 
    {
    	$resp = $this->getResponse('json');
    	$videosId = $this->param('id');
    	$urlVideo = $this->param('url');
        $entrepriseId = $this->param('entrepriseId');
        $oEntreprise = Entreprise::getById($entrepriseId);
        $resp->data = array('url_youtube'=>'');
        $maFactory = jDao::get('entreprise~videos');
        if ($videosId == '')
        {            
            $vignette = '';
            if ($_FILES['vignette']['name'] != '')
            {
                $vignette = $oEntreprise->uploadVignette('vignette');
            }

            if($vignette != '')
            {
                $id = $oEntreprise->insertVideosYoutube($urlVideo, $vignette);

                $oVideos = $maFactory->get($id);
                $toVideos = array();
                if ($oVideos->url_youtube != '')
                {
                    $toVideos['id'] = $oVideos->id;
                    $toVideos['url_youtube'] = $oVideos->url_youtube;
                    $toVideos['vignette_video'] = $oVideos->vignette_video;
                }
                $resp->data = $toVideos;            
            }
        }
        else
        {
            $videoId = $this->param('id');
            $urlVideo = $this->param('url');
            $vignette = '';
            if (isset($_FILES['vignette']))
            {
                if ($_FILES['vignette']['name'] != '')
                {
                    $vignette = $oEntreprise->uploadVignette('vignette');
                }
            }
            $oEntreprise->updateVideoYoutube($videoId, $urlVideo, $vignette);
            $oVideos = $maFactory->get($videoId);
            $toVideos = array();
            if ($oVideos->url_youtube != '')
            {
                $toVideos['id'] = $oVideos->id;
                $toVideos['url_youtube'] = $oVideos->url_youtube;
                $toVideos['vignette_video'] = $oVideos->vignette_video;
            }
            $resp->data = $toVideos;
        }

	    return $resp;
    }    
    //suppression vidéos youtube
    public function deleteVideosYoutube()
    {
        $resp = $this->getResponse('text');
        $entrepriseId = $this->param('entrepriseId');
        $oEntreprise = Entreprise::getById($entrepriseId);
        $videoId = $this->param('id');
        $oEntreprise->deleteVideoYoutube($videoId);
        $resp->content = 'Suppréssion réussie';
        return $resp;
    }
    //Fin vidéos youtube
    //----------------------------------
    //Galérie image
    function getImageGallery()
    {
        $resp = $this->getResponse('json');
        $imageId = $this->param('id');
        $maFactory = jDao::get('entreprise~images');
        $oImage = $maFactory->get($imageId);
        $toImage = array();
        if ($oImage->image != '')
        {
            $toImage['id'] = $oImage->id;
            $toImage['image'] = $oImage->image;
        }
        $resp->data = $toImage;
        return $resp;

    }
    //add image
    function addImageGallery()
    {
        $resp = $this->getResponse('json');
        $entrepriseId = $this->param('entrepriseId');
        $oEntreprise = Entreprise::getById($entrepriseId);
        $resp->data = array('image'=>'');
        $maFactory = jDao::get('entreprise~images');
        $image = '';
        if (isset($_FILES['image_gallery']))
        {
            if ($_FILES['image_gallery']['name'] != '')
            {
                $oUploader = new CPhotosUpload ('image_gallery') ;
                $uploadResults = $oUploader->doUpload () ;
                if (empty ($uploadResults ["errorcode"]))
                {
                    $target_file = $uploadResults ["filename"] ;
                    $id = $oEntreprise->insertImagesGalerie($target_file);
                    $oImage = $maFactory->get($id);
                    $toImage = array();
                    if ($oImage->image != '')
                    {
                        $toImage['id'] = $oImage->id;
                        $toImage['image'] = $oImage->image;
                    }
                    $resp->data = $toImage; 
                };
            }
        }
        return $resp;
    }
    //Delete image Gallerie
    function deleteImageGallery()
    {
        $resp = $this->getResponse('text');
        $entrepriseId = $this->param('entrepriseId');
        $oEntreprise = Entreprise::getById($entrepriseId);
        $imageId = $this->param('id');
        $oEntreprise->deleteImagesGalerie($imageId);
        $resp->content = 'Suppréssion réussie';
        return $resp;
    }
    //Fin galérie image
    //----------------------------------
    //Catalogue
    // get Produit
    function getProduitCatalogue() 
    {
        $resp = $this->getResponse('json');

        $catalogueId = $this->param('id');

        $maFactory      = jDao::get('entreprise~catalogue');
        $oCatalogue     = $maFactory->get($catalogueId);
        $toCatalogue    = array();

        if ($oCatalogue->nom_produit != '')
        {
            $toCatalogue['id']                  = $oCatalogue->id;
            $toCatalogue['reference_produit']   = $oCatalogue->reference_produit;
            $toCatalogue['image_produit']       = $oCatalogue->image_produit;
            $toCatalogue['nom_produit']         = $oCatalogue->nom_produit;
            $toCatalogue['description_produit'] = $oCatalogue->description_produit;
            $toCatalogue['marque_produit']      = $oCatalogue->marque_produit;
            $toCatalogue['prix_produit']        = $oCatalogue->prix_produit;
        }
        $resp->data = $toCatalogue;
        return $resp;
    }
    // update Produit
    function updateProduitCatalogue() 
    {
        $resp           = $this->getResponse('json');

        $catalogueId        = $this->param('id');

        $catalogueRef       = $this->param('reference_produit');
        $catalogueNom       = $this->param('nom_produit');
        $catalogueDesc      = $this->param('description_produit');
        $catalogueMarque    = $this->param('marque_produit');
        $cataloguePrix      = $this->param('prix_produit');

        $entrepriseId       = $this->param('entrepriseId');

        $oEntreprise    = Entreprise::getById($entrepriseId);

        $resp->data     = array('nom_produit'=>'');

        $maFactory      = jDao::get('entreprise~catalogue');

        //entreprise/produits/$target_file
        
        if ($catalogueId == '')
        {            
            $image_produit = '';

            $oCatalogue = new Catalogue();

            $oCatalogue->reference_produit  = $catalogueRef;
            $oCatalogue->entreprise_id      = $entrepriseId;
            $oCatalogue->nom_produit        = $catalogueNom;

            if (isset($_FILES['img_produit']))
            {
                if ($_FILES['img_produit']['name'] != '')
                {
                    $image_produit = $oEntreprise->uploadCatalogue('img_produit');
                }
            }

            if($image_produit != '')
            {
                $oCatalogue->image_produit = $image_produit;

                $oCatalogue->description_produit    = $catalogueDesc;
                $oCatalogue->marque_produit         = $catalogueMarque;
                $oCatalogue->prix_produit           = $cataloguePrix;

                $id = $oCatalogue->insert();

                $oCatalogue = $maFactory->get($id);

                $toCatalogue = array();

                if ($oCatalogue->nom_produit != '')
                {
                    $toCatalogue['id']                  = $oCatalogue->id;
                    $toCatalogue['reference_produit']   = $oCatalogue->reference_produit;
                    $toCatalogue['nom_produit']         = $oCatalogue->nom_produit;
                    $toCatalogue['image_produit']       = $oCatalogue->image_produit;
                    $toCatalogue['marque_produit']      = $oCatalogue->marque_produit;
                    $toCatalogue['prix_produit']        = $oCatalogue->prix_produit;
                }

                $resp->data = $toCatalogue;            
            }
        }
        else
        {
            $image_produit = '';

            $oCatalogue = Catalogue::getByid($catalogueId);

            $oCatalogue->reference_produit  = $catalogueRef;
            $oCatalogue->entreprise_id      = $entrepriseId;
            $oCatalogue->nom_produit        = $catalogueNom;

            if (isset($_FILES['img_produit']))
            {
                if ($_FILES['img_produit']['name'] != '')
                {
                    $image_produit = $oEntreprise->uploadCatalogue('img_produit');
                    $oCatalogue->image_produit = $image_produit;
                }
            }

            $oCatalogue->description_produit    = $catalogueDesc;
            $oCatalogue->marque_produit         = $catalogueMarque;
            $oCatalogue->prix_produit           = $cataloguePrix;

            $oCatalogue->update();

            $toCatalogue = array();

            if ($oCatalogue->nom_produit != '')
            {
                $toCatalogue['id']                  = $oCatalogue->id;
                $toCatalogue['reference_produit']   = $oCatalogue->reference_produit;
                $toCatalogue['nom_produit']         = $oCatalogue->nom_produit;
                $toCatalogue['image_produit']       = $oCatalogue->image_produit;
                $toCatalogue['marque_produit']      = $oCatalogue->marque_produit;
                $toCatalogue['prix_produit']        = $oCatalogue->prix_produit;
            }
                
            $resp->data = $toCatalogue;
        }

        return $resp;
    }

    //suppression Produit Catalogue
    public function deleteProduitCatalogue()
    {
        $resp = $this->getResponse('text');

        $catalogueId   = $this->param('id');
        $oCatalogue    = Catalogue::getByid($catalogueId);

        $oCatalogue->delete();

        $resp->content = 'Suppréssion réussie';

        return $resp;
    }
    //Fin Catalogue

    //Sauvegarde de l'édition
    public function save_edition()
    {
        $resp = $this->getResponse('redirect');
        $entrepriseId = $this->param('entreprise');

        $oEntreprise = Entreprise::getById($entrepriseId);

        if (($this->param('raisonSociale') != '') && ($this->param('descActivite') != '') && ($this->param('adresse') != ''))
        {
            //Entreprise
            $oEntreprise->raisonsociale = $this->param('raisonSociale');
            $oEntreprise->activite = $this->param('descActivite');
            $oEntreprise->adresse = $this->param('adresse');
            $oEntreprise->region = $this->param('region');

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

            $oEntreprise->contact_interne = $this->param('personneContact');
            $oEntreprise->fonction_contact = $this->param('fonctionPersonneContact');
            $oEntreprise->url_website = $this->param('siteweb');
            $oEntreprise->qui_sommes_nous = $this->param('quisommesnous');
            $oEntreprise->nos_services = $this->param('nos_services');
            $oEntreprise->nos_references = $this->param('reference');
            $oEntreprise->is_publie = 2;

            //Télephone
            if (!empty($this->param('hdn-rmv-telephone')))
            {
                if (sizeof($this->param('hdn-rmv-telephone'))>0)
                {
                    foreach ($this->param('hdn-rmv-telephone') as $rmvdPhone) {
                        $oEntreprise->deleteTelephone($rmvdPhone);
                    }
                }
            }
            $toTelephones = $oEntreprise->getTelephoneByEntrepriseId();
            if (sizeof($toTelephones) > 0)
            {
                foreach ($toTelephones as $telephone) 
                {
                    $key = 'telephones'.$telephone->id;
                    if (!empty($this->param($key)))
                    {
                        $oEntreprise->updateTelephone($telephone->id, $this->param($key));
                    }
                }
            }
            if (!empty($this->param('telephones')))
            {
                if (sizeof($this->param('telephones'))>0)
                {
                    foreach ($this->param('telephones') as $telephone) {
                        if ($telephone != '')
                            $oEntreprise->insertTelephone($telephone);
                    }
                }
            }

            //Email
            if (!empty($this->param('hdn-rmv-email')))
            {
                if (sizeof($this->param('hdn-rmv-email'))>0)
                {
                    foreach ($this->param('hdn-rmv-email') as $rmvdEmail) {
                        $oEntreprise->deleteEmail($rmvdEmail);
                    }
                }
            }
            $toEmails = $oEntreprise->getEmailByEntrepriseId();
            if (sizeof($toEmails) > 0)
            {
                foreach ($toEmails as $email) 
                {
                    $key = 'emails'.$email->id;
                    if (!empty($this->param($key)))
                    {
                        $oEntreprise->updateEmail($email->id, $this->param($key));
                    }
                }
            }
            if (!empty($this->param('emails')))
            {
                if (sizeof($this->param('emails'))>0)
                {
                    foreach ($this->param('emails') as $email) {
                        if ($email != '')
                            $oEntreprise->insertEmail($email);
                    }
                }
            }

            //Services
            if (!empty($this->param('hdn-rmv-service')))
            {
                if (sizeof($this->param('hdn-rmv-service'))>0)
                {
                    foreach ($this->param('hdn-rmv-service') as $rmvdService) {
                        $oEntreprise->deleteService($rmvdService);
                    }
                }
            }
            $toServices = $oEntreprise->getServiceByEntrepriseId();
            if (sizeof($toServices) > 0)
            {
                foreach ($toServices as $service) 
                {
                    $key = 'services'.$service->id;
                    if (!empty($this->param($key)))
                    {
                        $oEntreprise->updateService($service->id, $this->param($key));
                    }
                }
            }
            if (!empty($this->param('services')))
            {
                if (sizeof($this->param('services'))>0)
                {
                    foreach ($this->param('services') as $service) {
                        if ($service != '')
                            $oEntreprise->insertService($service);
                    }
                }
            }

            //Produits
            if (!empty($this->param('hdn-rmv-produit')))
            {
                if (sizeof($this->param('hdn-rmv-produit'))>0)
                {
                    foreach ($this->param('hdn-rmv-produit') as $rmvdProduit) {
                        $oEntreprise->deleteProduit($rmvdProduit);
                    }
                }
            }
            $toProduits = $oEntreprise->getProduitByEntrepriseId();
            if (sizeof($toProduits) > 0)
            {
                foreach ($toProduits as $produit) 
                {
                    $key = 'produits'.$produit->id;
                    if (!empty($this->param($key)))
                    {
                        $oEntreprise->updateProduit($produit->id, $this->param($key));
                    }
                }
            }
            if (!empty($this->param('produits')))
            {
                if (sizeof($this->param('produits'))>0)
                {
                    foreach ($this->param('produits') as $produit) {
                        if ($produit != '')
                            $oEntreprise->insertProduit($produit);
                    }
                }
            }

            //Marques
            if (!empty($this->param('hdn-rmv-marque')))
            {
                if (sizeof($this->param('hdn-rmv-marque'))>0)
                {
                    foreach ($this->param('hdn-rmv-marque') as $rmvdMarque) {
                        $oEntreprise->deleteMarque($rmvdMarque);
                    }
                }
            }
            $toMarques = $oEntreprise->getMarqueByEntreprise();
            if (sizeof($toMarques) > 0)
            {
                foreach ($toMarques as $marques) 
                {
                    $key = 'marques'.$marques->id;
                    if (!empty($this->param($key)))
                    {
                        $oEntreprise->updateMarque($marques->id, $this->param($key));
                    }
                }
            }
            if (!empty($this->param('marques')))
            {
                if (sizeof($this->param('marques'))>0)
                {
                    foreach ($this->param('marques') as $marques) {
                        if ($marques != '')
                            $oEntreprise->insertMarque($marques);
                    }
                }
            }

            $oEntreprise->update();
        }

        $resp->action = "front_office~default:pages";
        $resp->params = array('p' =>'remerciement-edition');
        return $resp;
    }
}