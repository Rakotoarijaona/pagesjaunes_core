<?php
/**
* @package   pagesjaunes_core
* @subpackage front_office
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

require_once(jApp::appPath().'modules/common/controllers/jControllerRSR.php');

jClasses::inc("slideshow~CSlideshow");
jClasses::inc("entreprise~Entreprise");
jClasses::inc("homepage~Contenuhomepage");
jClasses::inc("categorie~categorie");
jClasses::inc("catalogue~Catalogue");
jClasses::inc("categorie~souscategorie");
jClasses::inc("front_office~CPagination");
jClasses::inc("catalogue~Catalogue");
jClasses::inc("pages~CPages");
jClasses::inc("common~CPhotosUpload");
jClasses::inc("common~ImageWorkshop");
jClasses::inc("common~CCommonTools");
jClasses::inc("ads~CAdsTracker");
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("ads~CAdsPurchase");

class defaultCtrl extends jControllerRSR
{
    public $pluginParams = array(
        '*' => array('auth.required' => false),
        'edition' => array('auth.required' => true)
    );

    // index
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();

        // slider show
        $toListSlideshow = Slideshow::getPublie();
        $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
        $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
        $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
        $tpl->assign("toListSlideshow", $toListSlideshow);

        //section plus consulté
        $stickycolor = array('#ff0000','#ff9900','#2200cc','#00CC00','#8800cc','#0099cc');
        $stickyrandom1 = array_rand($stickycolor, 3);
        $toEntreprisePlusConsulte = Entreprise::getMostVisited(3);
        $tpl->assign('toEntreprisePlusConsulte', $toEntreprisePlusConsulte);
        $tpl->assign('stickyrandom1', $stickyrandom1);
        $tpl->assign('stickycolor', $stickycolor);

        //section derniers ajouts
        $stickyrandom2 = array_rand($stickycolor, 3);
        $toEntrepriseDernierAjoute= Entreprise::getLastInserted(3);
        $tpl->assign('toEntrepriseDernierAjoute', $toEntrepriseDernierAjoute);
        $tpl->assign('stickyrandom2', $stickyrandom2);

        //Section contenus homepage
        $oHomepageContent = Contenuhomepage::getById(1);
        $tpl->assign('oHomepageContent', $oHomepageContent);

        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~index'));

        return $resp;
    }

    // fiche detail
    function fiche_details() {
        $resp = $this->getResponse('html');
        $id = $this->param('entreprise');
        $tpl = new jTpl();
        $oEntreprise = Entreprise::getById($id);

        // comptage de consultation de l'entreprise
        if ($oEntreprise != "")
        {
            if(!isset($_SESSION['compteur_visite_entreprise'][$id]))
            {
                $_SESSION['compteur_visite_entreprise'][$id] = 'visite';                    
                $oEntreprise->incrementeNombreVisite();
            }
        }
        $tpl->assign('oEntreprise', $oEntreprise);
        $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
        $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
        $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);

        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~fiche_details'));

        return $resp;
    }

    // list by sub-category
    function liste() 
    {
        $resp = $this->getResponse('html');

        $sousCategorie_id = $this->param('soucategorie');

        $tpl = new jTpl();

        //recherche par categorie
        if (!empty($sousCategorie_id))
        {
            $oSouscategorie = Souscategorie::getById($sousCategorie_id);

            $toSortedEntreprise = Entreprise::searchBySouscategorie($sousCategorie_id);  

            //pagination
            $iNbTotalResult = 0;
            $toResult = array();
            foreach ($toSortedEntreprise as $to) {
                foreach ($to as $oEntreprise) 
                {                            
                    $toResult[] = $oEntreprise;
                }
            }

            $iNbTotalResult     += count($toResult);//nb de resultats trouvés
            $iNbRecordParPage   = 18;//nb de résultat par page
            $inbPagination      = ceil($iNbTotalResult/$iNbRecordParPage);//nb de pagination
            $iCurrentPage       = 1; //La page courante

            if ((null !== $this->param('page')) && is_numeric($this->param('page')))
            {
                $page = intval($this->param('page'));
                if ($page >= 1 && $page <= $inbPagination) {
                    // cas normal
                    $iCurrentPage=$page;
                } else if ($page < 1) {
                    // cas où le numéro de page est inférieure 1 : on affecte 1 à la page courante
                    $iCurrentPage=1;
                } else {
                    //cas où le numéro de page est supérieur au nombre total de pages : on affecte le numéro de la dernière page à la page courante
                    $iCurrentPage = $inbPagination;
                }
            }
            $iStartIndex = $iNbRecordParPage * $iCurrentPage - $iNbRecordParPage;
            $iStopIndex = ($iNbTotalResult<($iNbRecordParPage*$iCurrentPage))?($iNbTotalResult):($iStartIndex + $iNbRecordParPage);
            $toEntreprise = array();
            for ($i=$iStartIndex; $i<$iStopIndex; $i++)
            {
                $toEntreprise[] = $toResult[$i];
            }
            $url = jUrl::get("front_office~default:search", array("soucategorie"=>$sousCategorie_id));
            $pagination = CPagination::paginate($url, $inbPagination, $iCurrentPage);

            $tpl->assign('pagination', $pagination);
            $tpl->assign('iNbTotalResult', $iNbTotalResult);  
            $tpl->assign('inbPagination', $inbPagination);

            $tpl->assign('oSouscategorie', $oSouscategorie);
            $tpl->assign('toEntreprise', $toEntreprise);
            //publicité                
            $tpl->assignZone('ADS_ZONE','front_office~rightads', array('listType'=>'souscategorie', 'souscategorie'=>$sousCategorie_id));

            // common script
            $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
            $resp->body->assign('MAIN', $tpl->fetch('front_office~search_by_category_result'));
        }

        return $resp;
    }

    // recherche
    function search()
    {
        $resp = $this->getResponse('redirect');

        // parameter
        $search = $this->param('s');

        // build query params
        $to_find = "";

        if (!empty($search)) {
            $to_find = implode(",", $search);
        }

        $resp->action = "front_office~default:recherche";
        if (!empty($to_find)) {
            $resp->params = array("s" => $to_find);
        }

        return $resp;
    }

    // recherche list
    function recherche()
    {
        $resp = $this->getResponse('html');

        // parameters
        $search = $this->param('s');

        // pagination
        $nbRecs = 0;
        $currentPage = $this->param("page", 1, true);
        $sortField = $this->param("sortfield", "weight", true);
        $sortSens = $this->param("sortsens", "DESC", true);

        $tpl = new jTpl();

        $toEntreprise = array();
        $paginationParams = array();
        $to_find = "";

        if (!empty($search)) {
            $search = explode(",", $search);
            $to_find = implode(" +", $search);
        }

        $toEntreprise = Entreprise::search($to_find, true, $nbRecs, $currentPage, $sortField, $sortSens);

        $pagination = CCommonTools::getPagination("front_office~default:search", $nbRecs, $currentPage, NB_DATA_PER_PAGE, NB_LINK_TO_DISPLAY, $paginationParams);

        // defined constant
        CCommonTools::assignDefinedConstants($tpl);

        $tpl->assign('toEntreprise', $toEntreprise);
        $tpl->assign('nbRecs', $nbRecs);
        $tpl->assign('pagination', $pagination);

        //publicité
        $tpl->assignZone('ADS_ZONE','front_office~rightads', array('listType'=>'search', 'toResult'=>$toEntreprise));

        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~search_result'));

        return $resp;
    }

    function autoComplSearch() 
    {
        $resp = $this->getResponse('json');
        // datas
        $datas = array();
        $term = $this->param("q");
        $selected = $this->param("selected");
        if (!empty($term) && strlen($term) > 3) {
            $datas = Entreprise::frontAutoComplet($term, $selected);
        }
        $resp->data = $datas;
        return $resp;
    }

    //catalogue
    public function catalogue()
    {
        $resp = $this->getResponse('html');
        $id = $this->param('entreprise');
        $tpl = new jTpl();
        $oEntreprise = Entreprise::getById($id);

        $tpl->assign('oEntreprise', $oEntreprise);
        $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
        $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
        $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~page_catalogue'));
        return $resp;
    } 

    // inscription
    public function inscription()
    {
        $resp = $this->getResponse('html');

        $tpl = new jTpl();
        $oCatalogue = Catalogue::getByid($this->param('id'));

        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~formulaire_inscription'));

        return $resp;
    }

    // save inscription
    public function save_insription()
    {
        $resp = $this->getResponse('redirect');

        if (($this->param('raisonsociale') != '') && ($this->param('activite') != '') && ($this->param('adresse') != '') && ($this->param('email') != '') && ($this->param('phone1') != ''))
        {
            $oEntreprise = new Entreprise();

            $oEntreprise->raisonsociale = $this->param('raisonsociale');
            $oEntreprise->activite = $this->param('activite');
            $oEntreprise->adresse = $this->param('adresse');

            //$entreprise->logo
            if (isset($_FILES["filelogo"]))
            {
                $iErrorCode = 0 ;
                $zFileName          = $_FILES["filelogo"]["name"] ;
                $zFileType          = $_FILES["filelogo"]["type"] ;
                $iFileSize          = intval ($_FILES["filelogo"]["size"]) ;
                $zDirTempName       = $_FILES["filelogo"]["tmp_name"] ;

                $bCreateFolders     = true ;
                $zBackgroundColor   = null ;
                $iImageQuality      = IMAGE_QUALITY ;

                // rename file if already exists
                if (file_exists ("entreprise/images" . "/" . $zFileName))
                {
                    $iExistFileCount = 1 ;

                    $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
                    $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;

                    while (file_exists ("entreprise/images" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
                    {
                        $iExistFileCount++ ;
                    }
                    $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
                }
                // thumbnail (must)
                $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES ["filelogo"]['tmp_name']) ;
                $iExpectedWidth     = 200 ;
                $iExpectedHeight    = 200 ;

                ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

                $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
                $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
                $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
                $oLayerThumbnail->save ("entreprise/images", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
                $oEntreprise->logo = $zFileName;
            }
            $oEntreprise->url_website = $this->param('website');

            $oEntreprise->emails[] = $this->param('email');
            //telephone
            $oEntreprise->telephones[0] = $this->param('phone1'); 
            if ($this->param('phone2') != '')
            {
                $oEntreprise->telephones[1] = $this->param('phone2'); 
            }
            if ($this->param('phone3') != '')
            {
                $oEntreprise->telephones[2] = $this->param('phone3'); 
            }
            //services
            if ($this->param('service1') != '')
            {
                $oEntreprise->services[] = $this->param('service1'); 
            }
            if ($this->param('service2') != '')
            {
                $oEntreprise->services[] = $this->param('service2'); 
            }
            if ($this->param('service3') != '')
            {
                $oEntreprise->services[] = $this->param('service3'); 
            }
            if ($this->param('service4') != '')
            {
                $oEntreprise->services[] = $this->param('service4'); 
            }
            if ($this->param('service5') != '')
            {
                $oEntreprise->services[] = $this->param('service5'); 
            }
            //produits
            if ($this->param('product1') != '')
            {
                $oEntreprise->produits[] = $this->param('product1'); 
            }
            if ($this->param('product2') != '')
            {
                $oEntreprise->produits[] = $this->param('product2'); 
            }
            if ($this->param('product3') != '')
            {
                $oEntreprise->produits[] = $this->param('product3'); 
            }
            if ($this->param('product4') != '')
            {
                $oEntreprise->produits[] = $this->param('product4'); 
            }
            if ($this->param('product5') != '')
            {
                $oEntreprise->produits[] = $this->param('product5'); 
            }
            //marques
            if ($this->param('marque1') != '')
            {
                $oEntreprise->marques[] = $this->param('marque1'); 
            }
            if ($this->param('marque2') != '')
            {
                $oEntreprise->marques[] = $this->param('marque2'); 
            }
            if ($this->param('marque3') != '')
            {
                $oEntreprise->marques[] = $this->param('marque3'); 
            }
            if ($this->param('marque4') != '')
            {
                $oEntreprise->marques[] = $this->param('marque4'); 
            }
            if ($this->param('marque5') != '')
            {
                $oEntreprise->marques[] = $this->param('marque5'); 
            }
            //statut en attente
            $oEntreprise->is_publie = 2;

            $oEntreprise->insert_from_inscription();
            $resp->action = "front_office~default:pages";
            $resp->params = array('p'=>'remerciement_edition');
            return $resp;
        }
        $resp->action = "front_office~default:inscription";

        return $resp;
    }

    // contact
    public function contact()
    {
        $resp = $this->getResponse('html');

        $tpl = new jTpl();

        $oCatalogue = Catalogue::getByid($this->param('id'));

        //publicités
        $resp->body->assign('listType','default');
        $tpl->assignZone('ADS_ZONE','front_office~rightads');

        // common script
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~formulaire_contact'));

        return $resp;
    }

    // edition
    public function edition()
    {
        $resp = $this->getResponse('html');

        $tpl = new jTpl();

        // connected user
        $connectedUser = (jAuth::isConnected()) ? jAuth::getUserSession() : jDao::createRecord('entreprise~entreprise');

        if ($connectedUser->id > 0) {

            $oCatalogue = Catalogue::getByid($this->param('id'));

            $id = $connectedUser->id;

            $oEntreprise = Entreprise::getById($id);

            if ($oEntreprise->raisonsociale != '')
            {
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
                $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
                $tpl->assign('PHOTOS_BIG_FOLDER',PHOTOS_BIG_FOLDER);
                $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);

                // common script
                $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
                $resp->body->assign('MAIN', $tpl->fetch('front_office~formulaire_edition'));
            }

        } else {

            $resp = $this->getResponse('redirect');
            $resp->action = "front_office~default:index";

        }

        return $resp;
    }

    // enregistrer edition
    public function enregistrer_edition()
    {
        $resp = $this->getResponse('redirect');

        if (!empty($this->param('entreprise')) && !empty($this->param('raisonsociale')) && !empty($this->param('activite')) && !empty($this->param('adresse')) && (sizeof($this->param('tel_phone')) > 0) && ($this->param('email') != ''))
        {
            $oEntreprise = Entreprise::getById(($this->intParam('entreprise')/137));
            if (!empty($oEntreprise))
            {
                //Raison sociale
                $oEntreprise->raisonsociale = $this->param('raisonsociale');

                //Activité
                $oEntreprise->activite = $this->param('activite');

                //Adresse
                $oEntreprise->adresse = $this->param('adresse');

                //Région
                $oEntreprise->region = $this->param('region');

                //Numéro
                $oEntreprise->deleteAllTelephones();
                if (!empty($toTelephones = $this->param('tel_phone')))
                {
                    foreach ($toTelephones as $numero) {
                        $oEntreprise->insertTelephone($numero);
                    }
                }

                //Email
                $oEntreprise->deleteAllEmails();
                if (!empty($toEmails = $this->param('email')))
                {
                    foreach ($toEmails as $email) {
                        $oEntreprise->insertEmail($email);
                    }
                }

                //logo
                if ($this->param('hdnlogo') == 0 )
                {
                    $oEntreprise->logo = '';        
                    if(isset($_FILES['filelogo']))
                    {
                        if(!empty($_FILES['filelogo']))
                        {
                            $fileName = $_FILES["filelogo"]["name"]; // The file name
                            $fileTmpLoc = $_FILES["filelogo"]["tmp_name"]; // File in the PHP tmp folder
                            $fileType = $_FILES["filelogo"]["type"]; // The type of file it is
                            $fileSize = $_FILES["filelogo"]["size"]; // File size in bytes
                            $fileErrorMsg = $_FILES["filelogo"]["error"]; // 0 for false... and 1 for true
                            $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                            $target_file = str_replace(' ', '', $oEntreprise->raisonsociale)."logo.".$imageFileType;
                            $uploadOk = 1;        
                            if (!$fileTmpLoc) { // if file not chosen
                                $uploadOk = 0;
                            }
                            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                $uploadOk = 0;
                            }
                            elseif(move_uploaded_file($fileTmpLoc, "entreprise/images/$target_file")){
                                $oEntreprise->logo = $target_file;
                            }
                        }
                    }
                }

                //Site web
                $oEntreprise->url_website = $this->param('website');

                //Services
                $toServices = $this->param('hdnServices');
                if (!empty($this->param('rmvdservices')))
                {
                    $paramRemovedServices = $this->param('rmvdservices');
                    foreach ($paramRemovedServices as $paramId) {
                        $oEntreprise->deleteService($paramId / 137);
                    }
                }
                if (!empty($toServices))
                {
                    foreach ($toServices as $paramName) {
                        $oEntreprise->insertService($paramName);
                    }
                }

                //Produits
                $toProduits = $this->param('hdnProduits');
                if (!empty($this->param('rmvdproduits')))
                {
                    $paramRemovedProduits = $this->param('rmvdproduits');
                    foreach ($paramRemovedProduits as $paramId) {
                        $oEntreprise->deleteProduit($paramId / 137);
                    }
                }
                if (!empty($toProduits))
                {
                    foreach ($toProduits as $paramName) {
                        $oEntreprise->insertProduit($paramName);
                    }
                }

                //Marques
                $toMarques = $this->param('hdnMarques');
                if (!empty($this->param('rmvdmarques')))
                {
                    $paramRemovedMarques = $this->param('rmvdmarques');
                    foreach ($paramRemovedMarques as $paramId) {
                        $oEntreprise->deleteMarque($paramId / 137);
                    }
                }
                if (!empty($toMarques))
                {
                    foreach ($toMarques as $paramName) {
                        $oEntreprise->insertMarque($paramName);
                    }
                }
                // Qui-sommes-nous
                $this->qui_sommes_nous = $this->param('quisommesnous');

                // Nos services
                $this->nos_services = $this->param('nos_services');

                // Reférence
                $this->nos_references = $this->param('reference');

                //vidéos youtube
                $toNewVideos = $this->param('video_youtube');
                $toOldVideos = $this->param('old-video');
                if (!empty($this->param('rmvdvideos')))
                {
                    $paramRemovedVideos = $this->param('rmvdvideos');
                    foreach ($paramRemovedVideos as $paramId) {
                        $oEntreprise->deleteVideoYoutube($paramId / 137);
                    }
                }
                if (!empty($toNewVideos))
                {
                    foreach ($toNewVideos as $index) 
                    {
                        $zVignetteName = 'video-thumb_'.$index;
                        $zUrlName = 'url-video_'.$index;
                        if (!empty($this->param($zUrlName)) && isset($_FILES[$zVignetteName]))
                        {
                            if(!empty($_FILES[$zVignetteName])) {
                                $urlVideo = $this->param($zUrlName);
                                $fileName = $_FILES[$zVignetteName]["name"];
                                $fileTmpLoc = $_FILES[$zVignetteName]["tmp_name"];
                                $fileType = $_FILES[$zVignetteName]["type"];
                                $fileSize = $_FILES[$zVignetteName]["size"];
                                $fileErrorMsg = $_FILES[$zVignetteName]["error"];
                                $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                                $target_file = str_replace(' ', '', $oEntreprise->raisonsociale).$fileName;
                                $uploadOk = 1;        
                                if (!$fileTmpLoc) { // if file not chosen
                                    return $resp; 
                                }
                                // Allow certain file formats
                                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                    return $resp;
                                }
                                if(move_uploaded_file($fileTmpLoc, "entreprise/vignetteYoutube/$target_file")){
                                    $oEntreprise->insertVideosYoutube($urlVideo, $target_file);
                                }
                            }
                        }
                    }
                }
                if (!empty($toOldVideos))
                {
                    
                    foreach ($toOldVideos as $index) 
                    {
                        $zVignetteName = 'old-video-vignette_'.$index;
                        $zUrlName = 'old-video-url_video_'.$index;
                        if (!empty($this->param($zUrlName)))
                        {
                            $videoId = $index / 137;
                            $urlVideo = $this->param($zUrlName);
                            $vignette = '';
                            if ((!empty($_FILES[$zVignetteName])) && ($_FILES[$zVignetteName]["name"] != ''))
                            {
                                $fileName = $_FILES[$zVignetteName]["name"];
                                $fileTmpLoc = $_FILES[$zVignetteName]["tmp_name"];
                                $fileType = $_FILES[$zVignetteName]["type"];
                                $fileSize = $_FILES[$zVignetteName]["size"];
                                $fileErrorMsg = $_FILES[$zVignetteName]["error"];
                                $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                                $target_file = str_replace(' ', '', $oEntreprise->raisonsociale).$fileName;
                                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                $uploadOk = 1;        
                                if (!$fileTmpLoc) {
                                    return $resp;
                                }
                                elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                    return $resp;
                                }
                                elseif(move_uploaded_file($fileTmpLoc, "entreprise/vignetteYoutube/$target_file")){
                                    $vignette = $target_file;
                                } 
                            }
                            $oEntreprise->updateVideoYoutube($videoId, $urlVideo, $vignette);
                        }
                    }
                }

                //images                
                if (!empty($this->param('rmvdimage')))
                {
                    $paramRemovedImages = $this->param('rmvdimage');
                    foreach ($paramRemovedImages as $paramId) {
                        $oEntreprise->deleteImagesGalerie($paramId / 137);
                    }
                }
                if (!empty($_FILES['inputgallerynew']))
                {
                    for ($i=0; $i<sizeof($_FILES['inputgallerynew']['name']) ;$i++)
                    {
                        $imagefile = $_FILES['inputgallerynew']['name'][$i];
                        if (!empty($imagefile))
                        {
                            $filename = $imagefile;
                            $oUploader = new CPhotosUpload ('inputgallerynew') ;
                            $uploadResults = $oUploader->doUploadInArray ($i) ;
                            if (empty ($uploadResults ["errorcode"]))
                            {
                                $target_file = $uploadResults ["filename"] ;
                                $oEntreprise->insertImagesGalerie($target_file);
                            }
                        }                        
                    }
                }

                //Catalogue de produit
                $toNewCatalogue = $this->param('catalogue');
                $toOldCatalogue = $this->param('oldcatalogue');
                if (!empty($this->param('rmvdcatalogue')))
                {
                    $paramRemovedCatalogue = $this->param('rmvdcatalogue');
                    foreach ($paramRemovedCatalogue as $paramId) {
                        $oCatalogue = Catalogue::getByid($paramId / 137);
                        $oCatalogue->delete();
                    }
                }
                if (!empty($toNewCatalogue))
                {
                    foreach ($toNewCatalogue as $index) 
                    {
                        $zInputImageName = 'catalogue-image-'.$index;
                        $zInputNomProduitName = 'catalogue-nomproduit-'.$index;
                        $zInputMarqueProduitName = 'catalogue-marque-'.$index;
                        $zInputReferenceProduitName = 'catalogue-reference-'.$index;
                        $zInputDescriptionProduitName = 'catalogue-description-'.$index;
                        $zInputPrixProduitName = 'catalogue-prix-'.$index;
                        if (!empty($this->param($zInputNomProduitName)) && !empty($this->param($zInputMarqueProduitName)) && !empty($this->param($zInputReferenceProduitName)) && !empty($this->param($zInputDescriptionProduitName)) && !empty($this->param($zInputPrixProduitName)) && isset($_FILES[$zInputImageName]))
                        {
                            if(!empty($_FILES[$zInputImageName])) {
                                $oCatalogue = new Catalogue();
                                $oCatalogue->reference_produit = $this->param($zInputReferenceProduitName);
                                $oCatalogue->entreprise_id = $oEntreprise->id;
                                $oCatalogue->nom_produit = $this->param($zInputNomProduitName);
                                $oCatalogue->description_produit = $this->param($zInputDescriptionProduitName);
                                $oCatalogue->marque_produit = $this->param($zInputMarqueProduitName);
                                $oCatalogue->prix_produit = $this->param($zInputPrixProduitName);

                                if ($_FILES[$zInputImageName]["name"] != '')
                                {
                                    $fileName = $_FILES[$zInputImageName]["name"];
                                    $fileTmpLoc = $_FILES[$zInputImageName]["tmp_name"];
                                    $fileType = $_FILES[$zInputImageName]["type"];
                                    $fileSize = $_FILES[$zInputImageName]["size"];
                                    $fileErrorMsg = $_FILES[$zInputImageName]["error"];
                                    $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                                    $target_file = str_replace(' ', '', $oCatalogue->reference_produit).".".$imageFileType;
                                    $uploadOk = 1;        
                                    if (!$fileTmpLoc) {
                                        $uploadOk = 0;
                                    }        
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                        $uploadOk = 0;
                                    }
                                    if(move_uploaded_file($fileTmpLoc, "entreprise/produits/$target_file")){
                                        $oCatalogue->image_produit = $target_file;
                                        $oCatalogue->insert();
                                    } 
                                }
                            }
                        }
                    }
                }
                if (!empty($toOldCatalogue))
                {
                    foreach ($toOldCatalogue as $index) 
                    {
                        $zInputImageName = 'oldcatalogue-image-'.$index;
                        $zInputNomProduitName = 'oldcatalogue-nomproduit-'.$index;
                        $zInputMarqueProduitName = 'oldcatalogue-marque-'.$index;
                        $zInputReferenceProduitName = 'oldcatalogue-reference-'.$index;
                        $zInputDescriptionProduitName = 'oldcatalogue-description-'.$index;
                        $zInputPrixProduitName = 'oldcatalogue-prix-'.$index;
                        if (!empty($this->param($zInputNomProduitName)) && !empty($this->param($zInputMarqueProduitName)) && !empty($this->param($zInputReferenceProduitName)) && !empty($this->param($zInputDescriptionProduitName)) && !empty($this->param($zInputPrixProduitName)))
                        {
                            $oCatalogue = Catalogue::getByid($index / 137);
                            $oCatalogue->reference_produit = $this->param($zInputReferenceProduitName);
                            $oCatalogue->nom_produit = $this->param($zInputNomProduitName);
                            $oCatalogue->description_produit = $this->param($zInputDescriptionProduitName);
                            $oCatalogue->marque_produit = $this->param($zInputMarqueProduitName);
                            $oCatalogue->prix_produit = $this->param($zInputPrixProduitName);

                            if (!empty($_FILES[$zInputImageName]))
                            {
                                $fileName = $_FILES[$zInputImageName]["name"];
                                $fileTmpLoc = $_FILES[$zInputImageName]["tmp_name"];
                                $fileType = $_FILES[$zInputImageName]["type"];
                                $fileSize = $_FILES[$zInputImageName]["size"];
                                $fileErrorMsg = $_FILES[$zInputImageName]["error"];
                                $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
                                $target_file = str_replace(' ', '', $oCatalogue->reference_produit).".".$imageFileType;
                                $uploadOk = 1;        
                                if (!$fileTmpLoc) {
                                    $uploadOk = 0;
                                }        
                                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                    $uploadOk = 0;
                                }
                                if(move_uploaded_file($fileTmpLoc, "entreprise/produits/$target_file")){
                                    $oCatalogue->image_produit = $target_file;
                                }
                            }
                            $oCatalogue->update();
                        }
                    }
                }                        
            }
            $oEntreprise->update();

            $resp->action = "front_office~default:pages";
            $resp->params = array('p'=>'remerciement_edition');
            return $resp;
        }
        $resp->action = "front_office~default:index";
        return $resp;

    }
    // delete image
    public function deleteImage()
    {
        if (jApp::coord()->request->isAjax())
        {
            $resp = $this->getResponse('json');
            $arr = array();
            $resp->data = $arr;
            return $resp;
        } 
        else
        {
            $resp = $this->getResponse('redirect');
            $resp->action = "jelix~error:notfound";
            return $resp;
        }
    }

    // delete video
    public function deleteVideo()
    {
        if (jApp::coord()->request->isAjax())
        {
            $resp = $this->getResponse('json');
            $toListEntreprise = Entreprise::getList();
            $videoId = $this->param('id');
            if ($videoId != '')
            {
                $maFactory = jDao::get('entreprise~videos');
                $maFactory->delete($videoId);
            }
            $arr = array();
            $resp->data = $arr;
            return $resp;
        } 
        else
        {
            $resp = $this->getResponse('redirect');
            $resp->action = "jelix~error:notfound";
            return $resp;
        }
    }

    // page
    public function pages()
    {
        if (!empty($this->param('p'))) {

            $resp = $this->getResponse('html');

            $tpl = new jTpl();
            $label = $this->param('p');
            $page = CPages::getByLabel($label);

            if (!empty($page->id)) {
                $resp->body->assign('listType','default');
                if ($page->has_pub == YES) {
                    $tpl->assign("RIGHTPANEL", jZone::get('front_office~rightads'));
                }
                $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
                $tpl->assign("page", $page);
                CCommonTools::assignDefinedConstants($tpl);
                $resp->body->assign('MAIN', $tpl->fetch('front_office~page'));

                // seo
                $resp->title = (!empty($page->meta_title)) ? $page->meta_title : $page->title;
                $meta_description = (!empty($page->meta_description)) ? $page->meta_description : $resp->title;
                $resp->addMetaDescription($meta_description);

                return $resp;

            } else {

                $resp = $this->getResponse('redirect');
                $resp->action = "front_office~default:notfound";

                return $resp;
            }

        } else {

            $resp = $this->getResponse('redirect');
            $resp->action = "front_office~default:notfound";

            return $resp;
        }
    }

    // not found
    public function notfound() {
        $resp = $this->getResponse('html');
        $resp->setHttpStatus('404', 'Forbidden');
        $tpl = new jTpl();
        $tpl->assign("COMMONSCRIPT", jZone::get('front_office~commonscript'));
        $resp->body->assign('MAIN', $tpl->fetch('front_office~404'));

        return $resp;
    }

    // pub tracker
    public function tracker()
    {        
        $resp = $this->getResponse('redirect');
        $adId = $this->param('click', '');
        $isdefault = $this->param('default', '');
        $error = 0;
        $url = '';
        if ($adId != '' && $isdefault != '')
        {
            $ip = ip2long($_SERVER['REMOTE_ADDR']);
            $type = 1;
            $tracker = new CAdsTracker();
            $tracker->ads_id = $adId;
            $tracker->ip = $ip;
            $tracker->type = 1;
            if ($isdefault == 0)
            {
                $oAds = CAdsPurchase::getById($adId);
                if (!empty($oAds))
                {
                    $url = $oAds->website_url;
                    if ($url == '')
                    {
                        $resp = $this->getResponse('redirect');
                        $resp->action = 'front_office~default:fiche_details';
                        $resp->params = array('entreprise' => $oAds->advertiser_id);
                    } else {
                        $resp = $this->getResponse('redirectUrl');
                        $resp->action = 'about:blank';
                    }
                    $tracker->is_default = $isdefault;
                    $tracker->insert();
                } else {
                    $error = 1;
                }
            } elseif ($isdefault == 1) {
                $oAds = CAdsZoneDefault::getById($adId);
                if (!empty($oAds))
                {
                    $url = $oAds->link;
                    if ($url == '')
                    {
                        $resp = $this->getResponse('redirect');
                        $resp->action = 'front_office~default:index';
                    } else {
                        $resp = $this->getResponse('redirectUrl');
                        $resp->action = $url;
                    }
                    $tracker->is_default = $isdefault;
                    $tracker->insert();
                } else {
                    $error = 1;
                }
            } else {
                $error = 1;
            }
        }
        else {
            $error = 1;
        }

        if ($error == 1)
        {
            $resp = $this->getResponse('redirect');
            $resp->action = 'front_office~default:index';
        }
        return $resp;
    }

    // pub print action
    /*public function adsprint()
    {
        $resp = $this->getResponse('print');
        $adsId = $this->param('print', '');
        $isdefault = $this->param('default', '');
        $error = 0;
        $content;
        $tpl = new jTpl();
        if ($adsId != '' && $isdefault != '') {
            $ip = '';
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $tracker = new CAdsTracker();
            $tracker->ads_id = $adsId;
            $tracker->ip = $ip;
            $tracker->type = 2;
            if ($isdefault == 0) {
                $oAds = CAdsPurchase::getById($adsId);
                if (!empty($oAds))
                {
                    $content = '<img src="{$j_basepath}publicites/big/'.$oAds->banner.'"/>';
                    $tracker->is_default = $isdefault;
                    $tracker->insert();
                } else {
                    $error = 1;
                }
            } elseif ($isdefault == 1) {
                $oAds = CAdsZoneDefault::getById($adsId);
                if (!empty($oAds)) {
                    $url = $oAds->link;
                    if ($oAds->type == 2) {
                        $content = $oAds->html;
                        $tracker->is_default = $isdefault;
                        $tracker->insert();
                    } else {
                        $content = '<img src="{$j_basepath}publicites/big/'.$oAds->image.'"/>';
                        $tracker->is_default = $isdefault;
                        $tracker->insert();
                    }
                } else {
                    $error = 1;
                }
            } else {
                $error = 1;
            }
        } else {
            $error = 1;
        }
        if ($error == 0) {
            $resp->body->assign('CONTENT', $tpl->fetchFromString($content));
        }
        return $resp;
    }*/

    // View tracker
    public function track_view()
    {
        $resp = $this->getResponse('htmlfragment');
        $id = $this->param('id','');
        $isdefault = $this->param('default','');
        if ($id != '' && $isdefault != '') {
            $ip = $_SERVER['REMOTE_ADDR'];
            $tracker = new CAdsTracker();
            $tracker->ads_id = $id;
            $tracker->ip = $ip;
            $tracker->type = 3;
            $tracker->is_default = $isdefault;
            $tracker->insert();
        }  

        return $resp;
    }
}

