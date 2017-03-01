<?php
/**
 * @package pagesjaunes_core
 * @subpackage entreprise
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("categorie~CMotscles");
jClasses::inc("categorie~CSouscategorie");
jClasses::inc("categorie~CCategorie");

class CEntreprise
{
    var $id;
    var $raisonsociale;
    var $activite;
    var $adresse;
    var $region;
    var $logo;
    var $contact_interne;
    var $fonction_contact;
    var $url_website;
    var $video_presentation_active;
    var $video_presentation;
    var $qui_sommes_nous_active;
    var $qui_sommes_nous;
    var $nos_services_active;
    var $nos_services;
    var $nos_references_active;
    var $nos_references;
    var $videos_active;
    var $galerie_image_active;
    var $latitude;
    var $longitude;
    var $position_recherche;
    var $nombre_visite;
    var $is_publie;
    var $date_creation;
    var $date_update;
    var $emails;
    var $telephones;
    var $souscategories;
    var $motscles;
    var $services;
    var $produits;
    var $marques;
    var $videos_youtube;
    var $galerie_image;
    var $catalogue_active;
    var $editer_front_active;
    var $login;
    var $password;
    var $clear_password;

    // constructor
    public function __construct()
    {
        $this->id = 0;
        $this->raisonsociale = '';
        $this->activite = '';
        $this->adresse = '';
        $this->region = '';
        $this->logo = '';
        $this->contact_interne = '';
        $this->fonction_contact = '';
        $this->url_website = '';
        $this->video_presentation_active = 0;
        $this->video_presentation = '';
        $this->qui_sommes_nous_active = 0;
        $this->qui_sommes_nous = '';
        $this->nos_services_active = 0;
        $this->nos_services = '';
        $this->nos_references_active = 0;
        $this->nos_references = '';
        $this->videos_active = 0;
        $this->galerie_image_active = 0;
        $this->latitude = '';
        $this->longitude = '';
        $this->position_recherche = 0;
        $this->nombre_visite = 0;
        $this->is_publie = 0;
        $this->date_creation = '';
        $this->date_update = '';
        $this->emails = array();
        $this->telephones = array();
        $this->souscategories = array();
        $this->motscles = '';
        $this->services = array();
        $this->produits = array();
        $this->marques = array();
        $this->videos_youtube = array();
        $this->galerie_image = array();
        $this->catalogue_active = 0;
        $this->editer_front_active = 0;
        $this->weight = 0;
        $this->login = CCommonTools::randomString(8);
        $this->password = '';
        $this->clear_password = jAuth::getRandomPassword(8);
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        $this->id = $record->id;
        $this->raisonsociale = $record->raisonsociale;
        $this->activite = $record->activite;
        $this->adresse = $record->adresse;
        $this->region = $record->region;
        $this->logo = $record->logo;
        $this->contact_interne = $record->contact_interne;
        $this->fonction_contact = $record->fonction_contact;
        $this->url_website = $record->url_website;
        $this->video_presentation_active = $record->video_presentation_active;
        $this->video_presentation = $record->video_presentation;
        $this->qui_sommes_nous_active = $record->qui_sommes_nous_active;
        $this->qui_sommes_nous = $record->qui_sommes_nous;
        $this->nos_services_active = $record->nos_services_active;
        $this->nos_services = $record->nos_services;
        $this->nos_references_active = $record->nos_references_active;
        $this->nos_references = $record->nos_references;
        $this->videos_active = $record->videos_active;
        $this->galerie_image_active = $record->galerie_image_active;
        $this->latitude = $record->latitude;
        $this->longitude = $record->longitude;
        $this->position_recherche = $record->position_recherche;
        $this->nombre_visite = $record->nombre_visite;
        $this->is_publie = $record->is_publie;
        $this->date_creation = $record->date_creation;
        $this->date_update = $record->date_update;
        $this->catalogue_active = $record->catalogue_active;
        $this->editer_front_active = $record->editer_front_active;
        $this->weight = $record->weight;
        if (!empty($record->login)) {
            $this->login = $record->login;
        }
        $this->password = $record->password;
        if (!empty($record->clear_password)) {
            $this->clear_password = $record->clear_password;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id = $this->id;
        if (isset($this->raisonsociale)) {
            $record->raisonsociale = (!empty($this->raisonsociale)) ? $this->raisonsociale : null;
        }
        if (isset($this->activite)) {
            $record->activite = (!empty($this->activite)) ? $this->activite : null;
        }
        if (isset($this->adresse)) {
            $record->adresse = (!empty($this->adresse)) ? $this->adresse : null;
        }
        if (isset($this->region)) {
            $record->region = (!empty($this->region)) ? $this->region : null;
        }
        if (isset($this->logo)) {
            $record->logo = (!empty($this->logo)) ? $this->logo : null;
        }
        if (isset($this->contact_interne)) {
            $record->contact_interne = (!empty($this->contact_interne)) ? $this->contact_interne : '';
        }
        if (isset($this->fonction_contact)) {
            $record->fonction_contact = (!empty($this->fonction_contact)) ? $this->fonction_contact : '';
        }
        if (isset($this->url_website)) {
            $record->url_website = (!empty($this->url_website)) ? $this->url_website : null;
        }
        if (isset($this->video_presentation_active)) {
            $record->video_presentation_active = (!empty($this->video_presentation_active)) ? $this->video_presentation_active : 0;
        }
        if (isset($this->video_presentation)) {
            $record->video_presentation = (!empty($this->video_presentation)) ? $this->video_presentation : null;
        }
        if (isset($this->qui_sommes_nous_active)) {
            $record->qui_sommes_nous_active = (!empty($this->qui_sommes_nous_active)) ? $this->qui_sommes_nous_active : 0;
        }
        if (isset($this->qui_sommes_nous)) {
            $record->qui_sommes_nous = (!empty($this->qui_sommes_nous)) ? $this->qui_sommes_nous : null;
        }
        if (isset($this->nos_services_active)) {
            $record->nos_services_active = (!empty($this->nos_services_active)) ? $this->nos_services_active : 0;
        }
        if (isset($this->nos_services)) {
            $record->nos_services = (!empty($this->nos_services)) ? $this->nos_services : null;
        }
        if (isset($this->nos_references_active)) {
            $record->nos_references_active = (!empty($this->nos_references_active)) ? $this->nos_references_active : 0;
        }
        if (isset($this->nos_references)) {
            $record->nos_references = (!empty($this->nos_references)) ? $this->nos_references : null;
        }
        if (isset($this->videos_active)) {
            $record->videos_active = (!empty($this->videos_active)) ? $this->videos_active : 0;
        }
        if (isset($this->galerie_image_active)) {
            $record->galerie_image_active = (!empty($this->galerie_image_active)) ? $this->galerie_image_active : 0;
        }
        if (isset($this->latitude)) {
            $record->latitude = (!empty($this->latitude)) ? $this->latitude : null;
        }
        if (isset($this->longitude)) {
            $record->longitude = (!empty($this->longitude)) ? $this->longitude : null;
        }
        if (isset($this->position_recherche)) {
            $record->position_recherche = (!empty($this->position_recherche)) ? $this->position_recherche : 0;
        }
        if (isset($this->nombre_visite)) {
            $record->nombre_visite = (!empty($this->nombre_visite)) ? $this->nombre_visite : 0;
        }
        if (isset($this->is_publie)) {
            $record->is_publie = (!empty($this->is_publie)) ? $this->is_publie : 0;
        }
        if (isset($this->date_creation)) {
            $record->date_creation = (!empty($this->date_creation)) ? $this->date_creation : null;
        }
        if (isset($this->date_update)) {
            $record->date_update = (!empty($this->date_update)) ? $this->date_update : null;
        }
        if (isset($this->catalogue_active)) {
            $record->catalogue_active = (!empty($this->catalogue_active)) ? $this->catalogue_active : 0;
        }
        if (isset($this->editer_front_active)) {
            $record->editer_front_active = (!empty($this->editer_front_active)) ? $this->editer_front_active : 0;
        }
        if (isset($this->weight)) {
            $record->weight = (!empty($this->weight)) ? $this->weight : 0;
        }
        if (isset($this->login)) {
            $record->login = (!empty($this->login)) ? $this->login : null;
        }
        if (isset($this->clear_password)) {
                $userObject = jAuth::createUserObject($this->login, $this->clear_password);
                $record->password = $userObject->password;
        }
        if (isset($this->clear_password)) {
            $record->clear_password = (!empty($this->clear_password)) ? $this->clear_password : null;
        }
    }

    // Récupère la date de création
    public function getDateCreation()
    {
        $dt = new jDateTime();
        $dt->setFromString($this->date_creation,jDateTime::DB_DTFORMAT);;
        return $dt->toString(jDateTime::LANG_DTFORMAT);
    }

    // Liste des mots clés
    public function getMotsCles()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ("motscles_entreprise")." as mc INNER JOIN ".$cnx->prefixTable ("motscles")." as m ON mc.motscles_id = m.id WHERE entreprise_id =".$this->id);
        $motscles = "";
        $i = 0;
        foreach ($res as $value) {
            if ($i > 0)
            {
                $motscles .=", ";
            }
            $motscles .= $value->mot;
            $i++;
        }
        return $motscles;
    }

    // Liste des mots clés en texte
    public  function getMotsClesText() //Séparé par des éspaces
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ("motscles_entreprise")." as mc INNER JOIN ".$cnx->prefixTable ("motscles")." as m ON mc.motscles_id = m.id WHERE entreprise_id =".$this->id);
        $motscles = "";
        $i = 0;
        foreach ($res as $value) {
            if ($i > 0)
            {
                $motscles .=" ";
            }
            $motscles .= $value->mot;
            $i++;
        }
        return $motscles;
    }

    // Liste des sous catégories en forme de texte
    public function souscategoriesListToString()
    {
        $str = "";
        $i = 0;
        foreach ($this->getSouscategories() as $souscategorie) {
            if ($i >= 1)
            {
                $str .= ", ";
            }
            $str .= $souscategorie->souscategorie_name;
            $i++;
        }
        return $str;
    }

    // Liste des sous catégories en forme de texte - accueil
    public function souscategoriesListToStringHome()
    {
        $str = "";
        $i = 0;
        foreach ($this->getSouscategories() as $souscategorie) {
            if ($i >= 1)
            {
                $str .= ", ";
            }
            $str .= $souscategorie->souscategorie_name;
            $i++;
        }
        return (!empty($str)) ? CCommonTools::quietTruncate($str, 55) . " : <br/>" : "";
    }

    // Liste des sous catégories en forme de texte - fiche
    public function souscategoriesListToStringFiche()
    {
        $str = "";
        $i = 0;
        foreach ($this->getSouscategories() as $souscategorie) {
            if ($i >= 1)
            {
                $str .= ", ";
            }
            $str .= $souscategorie->souscategorie_name;
            $i++;
        }
        return (!empty($str)) ? $str . "." : "";
    }

    // Liste des sous catégories en format JSON
    public function souscategoriesJSON()
    {
        $jsonText = '[';
        $i = 0;
        foreach ($this->getSouscategories() as $souscategorie) {
            if ($i >= 1)
            {
                $jsonText .= ',';
            }
            $jsonText .= '{"id":"'.$souscategorie->souscategorie_id.'", "name":"'.$souscategorie->souscategorie_name.'"}';
            $i++;
        }
        $jsonText .= ']';
        return $jsonText;
    }

    // Récuperation de tous les entreprises
    public static function getList() 
    {
        $toRes = array () ;
        $daoFactory = jDao::get('entreprise~entreprise');
        $res = $daoFactory->findAll();
        $entrepriseList = $res->fetchAll();
        $toResult = array();
        foreach ($entrepriseList as $row)
        {
            $oEntreprise = new CEntreprise();
            $oEntreprise->fetchFromRecord($row);
            $toResult[] = $oEntreprise;
        }
        return $toResult ;
    }

    // Récupération des filtres avec filtres
    public static function getListFiltered( $filtreStatus = array(), $filtreInfo = '', 
                                            $filtreCategorie = '', $filtreRecherche = '', 
                                            $hasPagination = false, &$nbRecs = 0, 
                                            $currentPage = 1, $numValPerPage = NB_DATA_PER_PAGE, 
                                            $sortField = "raisonsociale", $sortSens = "DESC")
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT SQL_CALC_FOUND_ROWS * FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        if (sizeof($filtreStatus)>0)
        {
            $query .= " AND ";
            $query .= "(" . implode(" OR ", $filtreStatus) . ")";
        }
        if ($filtreInfo != '' || $filtreInfo != 0)
        {
            if ($filtreInfo == '3')
            {
                $filtersInfoPayant      = array();
                $filtersInfoPayant[]    = "video_presentation_active = 1";
                $filtersInfoPayant[]    = "qui_sommes_nous_active = 1";
                $filtersInfoPayant[]    = "nos_services_active = 1";
                $filtersInfoPayant[]    = "nos_references_active = 1";
                $filtersInfoPayant[]    = "videos_active = 1";
                $filtersInfoPayant[]    = "galerie_image_active = 1";
                $filtersInfoPayant[]    = "catalogue_active = 1";
                // build filter query
                $query .= " AND ";
                $query .= "(" . implode(" OR ", $filtersInfoPayant) . ")";
            }
            elseif ($filtreInfo == '2')
            {
                $andNbAvecInfoCompFilters = array();
                $andNbAvecInfoCompFilters[] = "video_presentation_active = 0";
                $andNbAvecInfoCompFilters[] = "qui_sommes_nous_active = 0";
                $andNbAvecInfoCompFilters[] = "nos_services_active = 0";
                $andNbAvecInfoCompFilters[] = "nos_references_active = 0";
                $andNbAvecInfoCompFilters[] = "videos_active = 0";
                $andNbAvecInfoCompFilters[] = "galerie_image_active = 0";
                $andNbAvecInfoCompFilters[] = "catalogue_active = 0";
                $entrepriseWithServiceIds = CEntreprise::getEntrepriseWithServiceIds();
                $entrepriseWithMarqueIds = CEntreprise::getEntrepriseWithMarqueIds();
                $entrepriseWithProduitIds = CEntreprise::getEntrepriseWithProduitIds();
                $entrepriseWithInfosCompIds = array_merge($entrepriseWithServiceIds, $entrepriseWithMarqueIds, $entrepriseWithProduitIds);
                $entrepriseWithInfosCompIds = array_unique($entrepriseWithInfosCompIds);
                $andNbAvecInfoCompFilters[] = "id IN(" . implode(",", $entrepriseWithInfosCompIds) . ")";

                // build filter query
                $query .= " AND ";
                $query .= implode(" AND ", $andNbAvecInfoCompFilters);
            }
            elseif ($filtreInfo == '1')
            {
                $andNbAvecInfoCompFilters = array();
                $andNbAvecInfoCompFilters[] = "video_presentation_active = 0";
                $andNbAvecInfoCompFilters[] = "qui_sommes_nous_active = 0";
                $andNbAvecInfoCompFilters[] = "nos_services_active = 0";
                $andNbAvecInfoCompFilters[] = "nos_references_active = 0";
                $andNbAvecInfoCompFilters[] = "videos_active = 0";
                $andNbAvecInfoCompFilters[] = "galerie_image_active = 0";
                $andNbAvecInfoCompFilters[] = "catalogue_active = 0";
                $entrepriseWithServiceIds = CEntreprise::getEntrepriseWithServiceIds();
                $entrepriseWithMarqueIds = CEntreprise::getEntrepriseWithMarqueIds();
                $entrepriseWithProduitIds = CEntreprise::getEntrepriseWithProduitIds();
                $entrepriseWithInfosCompIds = array_merge($entrepriseWithServiceIds, $entrepriseWithMarqueIds, $entrepriseWithProduitIds);
                $entrepriseWithInfosCompIds = array_unique($entrepriseWithInfosCompIds);
                $andNbAvecInfoCompFilters[] = "id NOT IN(" . implode(",", $entrepriseWithInfosCompIds) . ")";

                // build filter query
                $query .= " AND ";
                $query .= implode(" AND ", $andNbAvecInfoCompFilters);
            }
        }
        if ($filtreCategorie != '')
        {
            $filtre = explode(',', $filtreCategorie);
            $typeCategorie = trim($filtre[0]);
            $categorieId = trim($filtre[1]);
            $filtersCategorie = "1";

            if ($typeCategorie == 'categorie')
            {
                $filtersCategorie = "id IN (SELECT DISTINCT entreprise_id FROM ".$cnx->prefixTable ('souscategorie')." as sc 
                                            INNER JOIN ".$cnx->prefixTable ('entreprise_souscategorie')." as q 
                                            ON sc.souscategorie_id = q.souscategorie_id 
                                            WHERE sc.souscategorie_categorieid =".$categorieId.")";
            }
            elseif ($typeCategorie == 'souscategorie')
            {
                $filtersCategorie = "id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("entreprise_souscategorie") . " WHERE souscategorie_id = ".$categorieId.")";
            }
            $query .= " AND ";
            $query .= "(" .$filtersCategorie. ")";
        }
        if ($filtreRecherche != '')
        {
            $filtreRecherche = trim($filtreRecherche);
            $query .= " AND ";
            $query .= "( raisonsociale LIKE '%" .$filtreRecherche. "%')";
        }

        // tri
        if (!empty($sortField) && !empty($sortSens)) {
            $query .= " ORDER BY " . $sortField . " " . $sortSens;
        }

        // pagination
        if ($hasPagination) {
            $query .= " LIMIT " . ($currentPage - 1) * $numValPerPage . ", " . $numValPerPage;
        }

        $res = $cnx->query($query);

        if (!is_null($nbRecs)) {
            // --- nombre des lignes pour la pagination
            $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
            $rsCount = $cnx->query($queryDataCount);
            $resCount = $rsCount->fetch();
            $nbRecs = $resCount->numRows;
        }

        $toEntreprise = array();

        foreach ($res as $row) {
            $oEntreprise = new CEntreprise();
            $oEntreprise->fetchFromRecord($row);
            $toEntreprise[] = $oEntreprise;
        }

        return $toEntreprise;
    }

    // Filtre par catégorie
    public static function filterByCategorie($categorieId)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT DISTINCT entreprise_id FROM '.$cnx->prefixTable ("souscategorie").' as sc INNER JOIN '.$cnx->prefixTable ("entreprise_souscategorie").' as q ON sc.souscategorie_id = q.souscategorie_id WHERE sc.souscategorie_categorieid ='.$categorieId);
        $toEntreprise = array();
        foreach ($res as $record)
        {
           $oEntreprise = CEntreprise::getById($record->entreprise_id);
           $toEntreprise[] = $oEntreprise;
        }
        return $toEntreprise;        
    }

    // Filtre par sous catégorie
    public static function filterBySouscategorie($souscategorieId)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT DISTINCT entreprise_id FROM '.$cnx->prefixTable ("entreprise_souscategorie").' WHERE souscategorie_id ='.$souscategorieId);
        $toEntreprise = array();
        foreach ($res as $record)
        {
           $oEntreprise = CEntreprise::getById($record->entreprise_id);
           $toEntreprise[] = $oEntreprise;
        }
        return $toEntreprise;
    }

    // Récupération par Id
    public static function getById($id)
    {
        $factory = jDao::get('entreprise~entreprise');
        $res = $factory->get($id);
        $oEntreprise = new CEntreprise();
        if ($res)
        {
            $oEntreprise->fetchFromRecord($res);
        }
        return $oEntreprise;
    }

    // Insertion
    public function insert() 
    {
        $entrepriseFactory = jDao::get('entreprise~entreprise');
        $record = jDao::createRecord('entreprise~entreprise');
        if (($this->raisonsociale!='') && ($this->adresse!='') && ($this->activite!='') && (sizeof($this->emails) > 0) && (sizeof($this->telephones) > 0) && (sizeof($this->souscategories) > 0))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
            $this->fetchIntoRecord($record);
            $entrepriseFactory->insert($record);
            $this->id = $record->id;
            foreach ($this->emails as $email) {
                $this->insertEmail($email);
            }
            foreach ($this->telephones as $numero) {
                $this->insertTelephone($numero);
            }
            foreach ($this->souscategories as $souscategorie) {
                $this->insertSouscategories($souscategorie);
            }
            $this->updateMotsCles($this->motscles);
            $this->updateSearchTable();
        }
    }

    // Insertion depuis le front office
    public function insert_from_inscription() 
    {
        $entrepriseFactory = jDao::get('entreprise~entreprise');
        $record = jDao::createRecord('entreprise~entreprise');
        if (($this->raisonsociale!='') && ($this->adresse!='') && ($this->activite!='') && (sizeof($this->emails) > 0) && (sizeof($this->telephones) > 0))
        {
            $dt = new jDateTime();
            $dt->now();
            $this->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
            $this->fetchIntoRecord($record);
            $entrepriseFactory->insert($record);
            $this->id = $record->id;
            foreach ($this->emails as $email) {
                $this->insertEmail($email);
            }
            foreach ($this->telephones as $numero) {
                $this->insertTelephone($numero);
            }
            foreach ($this->services as $service) {
                $this->insertService($service);
            }
            foreach ($this->produits as $produit) {
                $this->insertProduit($produit);
            }
            foreach ($this->marques as $marque) {
                $this->insertMarque($marque);
            }
        }
    }

    // update enterprise
    public function update() 
    {
        $entrepriseFactory = jDao::get('entreprise~entreprise');
        $existRec = $entrepriseFactory->get($this->id);

        $dt = new jDateTime();
        $dt->now();
        $this->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
        
        $this->fetchIntoRecord($existRec);
        $this->updateSouscategories();
        $this->updateMotsCles($this->motscles);

        $entrepriseFactory->update($existRec);
        $this->updateSearchTable();
    }

    // set enterprise weight
    public function setWeight($entreprise_id = 0)
    {
        // weight
        $weight = 0;

        // entreprise
        $entreprise = CEntreprise::getById($entreprise_id);

        if (sizeof($entreprise->getImagesGalerieList()) > 0) {
            $weight += 1;
        }
        if (sizeof($entreprise->getVideosYoutubeList()) > 0) {
            $weight += 1;
        }
        if (sizeof($entreprise->getCataloguesList()) > 0) {
            $weight += 1;
        }
        if (!empty($entreprise->logo)) {
            $weight += 1;
        }
        //infos enrichies, payantes
        if ($entreprise->video_presentation_active == 1) {
            $weight += 4;
        }
        if ($entreprise->qui_sommes_nous_active == 1) {
            $weight += 4;
        }
        if ($entreprise->nos_services_active == 1) {
            $weight += 4;
        }
        if ($entreprise->nos_references_active == 1) {
            $weight += 4;
        }

        // update enterprise weight
        $entrepriseFactory = jDao::get('entreprise~entreprise');
        $existRec = $entrepriseFactory->get($entreprise_id);
        $existRec->weight = $weight;
        $entrepriseFactory->update($existRec);
    }

    // Récupération des emails par Id
    public static function getEmailsById($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("email").' WHERE entreprise_id ='.$id);
        $emails = array();

        foreach ($res as $record)
        {
           $emails[] = $record;
        }
        return $emails;
    }

    // Liste des emails
    public function getEmails()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT email FROM '.$cnx->prefixTable ("email").' WHERE entreprise_id ='.$this->id);
        $emails = array();

        foreach ($res as $record)
        {
           $emails[] = $record->email;
        }
        return $emails;
    }

    // Récupération des emails par entreprise
    public function getEmailByEntrepriseId()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("email").' WHERE entreprise_id ='.$this->id);
        $emails = array();

        foreach ($res as $record)
        {
           $emails[] = $record;
        }
        return $emails;
    }

    // Insertion des emails
    public function insertEmail($email)
    {
        $emailFactory = jDao::get('entreprise~email');
        // test if email exist
        $cnx = jDb::getConnection();
        $testRes = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("email").' WHERE email ="'.$email.'"');
        $exist = 0;
        foreach ($testRes as $row)
        {
           if($row->email == $email)
           {
                $exist = 1;
           }
        }
        if($exist == 0)
        {    
            $record = jDao::createRecord('entreprise~email');
            $record->entreprise_id = $this->id;
            $record->email = $email;
            $record->is_publie = 1;
            $dt = new jDateTime();
            $dt->now();
            $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
            $emailFactory->insert($record);
        }
    }
    public function updateEmail($emailId, $email)
    {
        $emailFactory = jDao::get('entreprise~email');
        $record = $emailFactory->get($emailId);
        $record->email = $email;
        $dt = new jDateTime();
        $dt->now();
        $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
        $emailFactory->update($record);
    }
    public function deleteEmail($emailId)
    {
        $telephoneFactory = jDao::get('entreprise~email');
        if (sizeof(CEntreprise::getEmails($this->id))>1)
        {
            $telephoneFactory->delete($emailId);
        }
    }
    public function deleteAllEmails()
    {
        $cnx = jDb::getConnection();
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("email").' WHERE entreprise_id ='.$this->id);
    }

    //CRUD Telephone
    public static function getTelephonesById($id) //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$id);
        $telephones = array();

        foreach ($res as $record)
        {
           $telephones[] = $record;
        }
        return $telephones;
    }
    public function getTelephones() //get telephones
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT numero FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$this->id);
        $telephones = array();

        foreach ($res as $record)
        {
           $telephones[] = $record->numero;
        }
        return $telephones;
    }
    public function getTelephoneByEntrepriseId() //get telephones
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$this->id);
        $telephones = array();

        foreach ($res as $record)
        {
           $telephones[] = $record;
        }
        return $telephones;
    }
    public function getTelephoneListText() //get telephones
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT numero FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$this->id);
        $telephones = '';

        foreach ($res as $record)
        {
           $telephones .= ' '.$record->numero;
        }
        return $telephones;
    }
    public function insertTelephone($numero)
    {
        $telephoneFactory = jDao::get('entreprise~telephone');
        // test if email exist
        $cnx = jDb::getConnection();
        $testRes = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("telephone").' WHERE numero ="'.$numero.'"');
        $exist = 0;
        foreach ($testRes as $row)
        {
           if($row->numero == $numero)
           {
                $exist = 1;
           }
        }
        if($exist == 0)
        {    
            $record = jDao::createRecord('entreprise~telephone');
            $record->entreprise_id = $this->id;
            $record->numero = $numero;
            $record->is_publie = 1;
            $dt = new jDateTime();
            $dt->now();
            $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
            $telephoneFactory->insert($record);
        }
    }
    public function updateTelephone($numeroId, $numero)
    {
        $telephoneFactory = jDao::get('entreprise~telephone');
        $record = $telephoneFactory->get($numeroId);
        $record->numero = $numero;
        $record->is_publie = 1;
        $dt = new jDateTime();
        $dt->now();
        $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
        $telephoneFactory->update($record);
    }
    public function deleteTelephone($numeroId)
    {
        $telephoneFactory = jDao::get('entreprise~telephone');
        if (sizeof(CEntreprise::getTelephones($this->id))>1)
        {
            $telephoneFactory->delete($numeroId);
        }
    }
    public function deleteAllTelephones()
    {
        $cnx = jDb::getConnection();
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$this->id);
    }

    //CRUD Services
    public static function getServices($id) //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("service").' WHERE entreprise_id ='.$id);
        $services = array();

        foreach ($res as $record)
        {
           $services[] = $record;
        }
        return $services;
    }
    public function getServiceList() //get entreprise Service
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("service").' WHERE entreprise_id ='.$this->id);
        $services = array();

        foreach ($res as $record)
        {
           $services[] = $record->name;
        }
        return $services;
    }
    public function getServiceListText($separator = ' ') //get text from all entreprise Service 
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("service").' WHERE entreprise_id ='.$this->id);
        $services = '';
        $i = 0;
        foreach ($res as $record)
        {
           if ($i > 0){
                $services .= $separator;
           }
           $services .= $record->name;
           $i++;
        }
        return $services;
    }
    public function getServiceByEntrepriseId() //get entreprise Service
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("service").' WHERE entreprise_id ='.$this->id);
        $services = array();

        foreach ($res as $record)
        {
           $services[] = $record;
        }
        return $services;
    }
    public function insertService($name)
    {
        if ($name != '')
        {
            $serviceFactory = jDao::get('entreprise~service');
            // test if service exist
            $cnx = jDb::getConnection();
            $testRes = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("service").' WHERE name ="'.$name.'"');
            $exist = 0;
            foreach ($testRes as $row)
            {
               if($row->name == $name)
               {
                    $exist = 1;
               }
            }
            if($exist == 0)
            {    
                $record = jDao::createRecord('entreprise~service');
                $record->entreprise_id = $this->id;
                $record->name = $name;
                $record->is_publie = 1;
                $dt = new jDateTime();
                $dt->now();
                $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
                $serviceFactory->insert($record);
            }
        }
    }
    public function updateService($serviceId, $name)
    {
        if ($name!='')
        {
            $serviceFactory = jDao::get('entreprise~service');
            $record = $serviceFactory->get($serviceId);
            $record->name = $name;
            $record->is_publie = 1;
            $dt = new jDateTime();
            $dt->now();
            $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
            $serviceFactory->update($record);
        }
    }
    public function deleteService($serviceId)
    {
        $serviceFactory = jDao::get('entreprise~service');
        $serviceFactory->delete($serviceId);
    }

    //CRUD Produit
    public static function getProduits($id) //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("produit").' WHERE entreprise_id ='.$id);
        $produits = array();

        foreach ($res as $record)
        {
           $produits[] = $record;
        }
        return $produits;
    }

    public function getProduitList() //get Produit list
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("produit").' WHERE entreprise_id ='.$this->id);
        $produits = array();

        foreach ($res as $record)
        {
           $produits[] = $record->name;
        }
        return $produits;
    }

    public function getProduitListText($separator = ' ') //get text of produit list
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("produit").' WHERE entreprise_id ='.$this->id);
        $produits = '';
        $i = 0;
        foreach ($res as $record)
        {
           if ($i > 0){
                $produits .= $separator;
           }
           $produits .= $record->name;
           $i++;
        }
        return $produits;
    }

    public function getProduitByEntrepriseId()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("produit").' WHERE entreprise_id ='.$this->id);
        $produits = array();

        foreach ($res as $record)
        {
           $produits[] = $record;
        }
        return $produits;
    }
    public function insertProduit($name)
    {
        if ($name!='')
        {
            $produitFactory = jDao::get('entreprise~produit');
            // test if produit exist
            $cnx = jDb::getConnection();
            $testRes = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("produit").' WHERE name ="'.$name.'"');
            $exist = 0;
            foreach ($testRes as $row)
            {
               if($row->name == $name)
               {
                    $exist = 1;
               }
            }
            if($exist == 0)
            {    
                $record = jDao::createRecord('entreprise~produit');
                $record->entreprise_id = $this->id;
                $record->name = $name;
                $record->is_publie = 1;
                $dt = new jDateTime();
                $dt->now();
                $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
                $produitFactory->insert($record);
            }
        }
    }
    public function updateProduit($produitId, $name)
    {
        if ($name!='')
        {
            $produitFactory = jDao::get('entreprise~produit');
            $record = $produitFactory->get($produitId);
            $record->name = $name;
            $record->is_publie = 1;
            $dt = new jDateTime();
            $dt->now();
            $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
            $produitFactory->update($record);
        }
    }
    public function deleteProduit($produitId)
    {
        $produitFactory = jDao::get('entreprise~produit');
        $produitFactory->delete($produitId);
    }

    //CRUD Marque
    public static function getMarques($id) //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("marque").' WHERE entreprise_id ='.$id);
        $marques = array();

        foreach ($res as $record)
        {
           $marques[] = $record;
        }
        return $marques;
    }
    public function getMarqueList() //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("marque").' WHERE entreprise_id ='.$this->id);
        $marques = array();

        foreach ($res as $record)
        {
           $marques[] = $record->name;
        }
        return $marques;
    }

    public function getMarqueListText() //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT name FROM '.$cnx->prefixTable ("marque").' WHERE entreprise_id ='.$this->id);
        $marques = '';

        foreach ($res as $record)
        {
           $marques .= ' '.$record->name;
        }
        return $marques;
    }

    public function getMarqueByEntreprise() //get by entreprise id
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("marque").' WHERE entreprise_id ='.$this->id);
        $marques = array();

        foreach ($res as $record)
        {
           $marques[] = $record;
        }
        return $marques;
    }
    public function insertMarque($name)
    {
        if ($name!='')
        {
            $marqueFactory = jDao::get('entreprise~marque');
            // test if marque exist
            $cnx = jDb::getConnection();
            $testRes = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("marque").' WHERE name ="'.$name.'"');
            $exist = 0;
            foreach ($testRes as $row)
            {
               if($row->name == $name)
               {
                    $exist = 1;
               }
            }
            if($exist == 0)
            {    
                $record = jDao::createRecord('entreprise~marque');
                $record->entreprise_id = $this->id;
                $record->name = $name;
                $record->is_publie = 1;
                $dt = new jDateTime();
                $dt->now();
                $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
                $marqueFactory->insert($record);
            }
        }
    }
    public function updateMarque($marqueId, $name)
    {
        if ($name!='')
        {
            $marqueFactory = jDao::get('entreprise~marque');
            $record = $marqueFactory->get($marqueId);
            $record->name = $name;
            $record->is_publie = 1;
            $dt = new jDateTime();
            $dt->now();
            $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
            $marqueFactory->update($record);
        }
    }
    public function deleteMarque($marqueId)
    {
        $marqueFactory = jDao::get('entreprise~marque');
        $marqueFactory->delete($marqueId);
    }

    public function getSouscategories()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise_souscategorie").' as esc INNER JOIN '.$cnx->prefixTable ("souscategorie").' as sc ON esc.souscategorie_id = sc.souscategorie_id WHERE esc.entreprise_id ='.$this->id);
        $souscategories = array();

        foreach ($res as $record)
        {
           $souscategories[] = $record;
        }
        return $souscategories;
    }

    public function getSouscategoriesListText()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT souscategorie_name FROM '.$cnx->prefixTable ("entreprise_souscategorie").' as esc INNER JOIN '.$cnx->prefixTable ("souscategorie").' as sc ON esc.souscategorie_id = sc.souscategorie_id WHERE esc.entreprise_id ='.$this->id);
        $souscategories = '';

        foreach ($res as $record)
        {
           $souscategories .= ' '.$record->souscategorie_name;
        }
        return $souscategories;
    }

    public function insertSouscategories($souscategorie)
    {
        $factory = jDao::get('entreprise~entreprise_souscategorie');
        $record = jDao::createRecord('entreprise~entreprise_souscategorie');
        $record->entreprise_id = $this->id;
        $record->souscategorie_id = $souscategorie;
        $dt = new jDateTime();
        $dt->now();
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
        $factory->insert($record);
    }
    public function updateSouscategories()
    {
        $oldSousCategorie = $this->getSouscategories();
        $newSousCategorie = $this->souscategories;
        $cnx = jDb::getConnection();
        foreach ($newSousCategorie as $new) 
        {
            $oNewSC = CSouscategorie::getById($new);
            $exist = 0;
            $position = 0;
            for ($i=0; $i < sizeof($oldSousCategorie); $i++)
            {
                if(($oldSousCategorie[$i] != null) && ($oldSousCategorie[$i]->souscategorie_id == $oNewSC->id))
                {
                    $exist = 1;
                    $position = $i;
                }
            }

            if ($exist == 0)
            {
                $this->insertSouscategories($new);
            }
            else
            {
                $dt = new jDateTime();
                $dt->now();
                $dateupdate = $dt->toString(jDateTime::DB_DTFORMAT);
                $cnx->exec("UPDATE ".$cnx->prefixTable ("entreprise_souscategorie")." SET date_update = '".$dateupdate."' WHERE id =".$oldSousCategorie[$position]->id);
                $oldSousCategorie[$position] = null;
            }            
        }

        foreach ($oldSousCategorie as $old) 
        {
            if ($old != null)
            {
                $cnx->exec("DELETE FROM ".$cnx->prefixTable ('entreprise_souscategorie')." WHERE entreprise_id =".$this->id." AND souscategorie_id =".$old->souscategorie_id);
            }
        }
    }

    public function updateMotsCles($listMotsCles)
    {
        $toMotsCles = explode(",", $listMotsCles);
        $cnx = jDb::getConnection();
        $cnx->exec("DELETE FROM ".$cnx->prefixTable ('motscles_entreprise')." WHERE entreprise_id =".$this->id);
        foreach ($toMotsCles as $mot) {
            $mot = trim ($mot);
            if ($mot != '')
            {
                $id = CMotscles::insert($mot);
                $dt = new jDateTime();
                $dt->now();
                $datecreation = $dt->toString(jDateTime::DB_DTFORMAT);

                $cnx->exec("INSERT INTO ".$cnx->prefixTable ("motscles_entreprise")." (motscles_id, entreprise_id, date_creation) VALUES (".$id.", ".$this->id.", '".$datecreation."')" );
            }
            else
            {
                continue;
            }
        } 
    }

    //Upload de vidéos présentation

    public static function uploadVideos($file) {
        $fileName = $_FILES[$file]["name"]; // The file name
        $fileTmpLoc = $_FILES[$file]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES[$file]["type"]; // The type of file it is
        $fileSize = $_FILES[$file]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES[$file]["error"]; // 0 for false... and 1 for true
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

    //
    //Section vidéos youtube
    //

    public static function getVideosYoutube($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("videos").' WHERE entreprise_id ='.$id);
        $videos = array();

        foreach ($res as $record)
        {
           $videos[] = $record;
        }
        return $videos; 
    }
    public function getVideosYoutubeList()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT url_youtube, vignette_video FROM '.$cnx->prefixTable ("videos").' WHERE entreprise_id ='.$this->id);
        $videos = array();

        foreach ($res as $record)
        {
           $videos[] = $record;
        }
        return $videos; 
    }
    
    //fonction upload vignette youtube
    public function uploadVignette($file)
    {
        $zFileName          = $_FILES[$file]["name"] ;
        $zFileType          = $_FILES[$file]["type"] ;
        $iFileSize          = intval ($_FILES[$file]["size"]) ;
        $zDirTempName       = $_FILES[$file]["tmp_name"] ;

        $bCreateFolders     = true ;
        $zBackgroundColor   = null ;
        $iImageQuality      = IMAGE_QUALITY ;

        $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
        $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;


        $zNoExtName = CCommonTools::generateAlias($zNoExtName,"");
        $zFileName = $zNoExtName . "." . $zExt ;
        // rename file if already exists
        if (file_exists ("entreprise/vignetteYoutube/" . $zFileName))
        {
            $iExistFileCount = 1 ;

            while (file_exists ("entreprise/vignetteYoutube" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
            {
                $iExistFileCount++ ;
            }
            $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
        }
        // big 
        $oLayerBig    = ImageWorkshop::initFromPath ($_FILES [$file]['tmp_name']) ;
        $iExpectedWidth     = 189 ;
        $iExpectedHeight    = 137 ;
        ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

        $oLayerBig->resizeInPixel ($iExpectedWidth, $iExpectedHeight) ;
        $oLayerBig->save ("entreprise/vignetteYoutube", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;

        // thumbnail (must)
        $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES [$file]['tmp_name']) ;
        $iExpectedWidth     = 96 ;
        $iExpectedHeight    = 96 ;

        ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

        $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
        $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
        $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
        $oLayerThumbnail->save ("entreprise/vignetteYoutube/thumbnail", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
        // rename file if already exists
        $vignette = $zFileName;
        return $vignette;
    }

    public function insertVideosYoutube($urlVideo, $target_file)
    {
        $maFactory = jDao::get('entreprise~videos');
        $record = jDao::createRecord('entreprise~videos');
        $record->entreprise_id = $this->id;
        $record->url_youtube = $urlVideo;
        $record->vignette_video = $target_file;
        $record->is_publie = 1;
        $dt = new jDateTime();
        $dt->now();
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
        $maFactory->insert($record);
        return $record->id;
    }
    public function updateVideoYoutube($videoId, $urlVideo, $vignette)
    {
        $maFactory = jDao::get('entreprise~videos');
        $record = $maFactory->get($videoId);
        if ($urlVideo != '')
        {
            $record->url_youtube = $urlVideo; 
        }
        if ($vignette != '')
        {
           $record->vignette_video = $vignette; 
        }
        $dt = new jDateTime();
        $dt->now();
        $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
        $maFactory->update($record);
        return '';
    }
    public function deleteVideoYoutube($videoId)
    {
        $maFactory = jDao::get('entreprise~videos');
        $maFactory->delete($videoId);
    }

    //
    // Section image gallery
    //
    public static function getImagesGalerie($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("images").' WHERE entreprise_id ='.$id);
        $images = array();

        foreach ($res as $record)
        {
           $images[] = $record;
        }
        return $images; 
    }
    public function getImagesGalerieList()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("images").' WHERE entreprise_id ='.$this->id);
        $images = array();

        foreach ($res as $record)
        {
           $images[] = $record;
        }
        return $images; 
    }
    public function insertImagesGalerie($image)
    {
        $maFactory = jDao::get('entreprise~images');
        $record = jDao::createRecord('entreprise~images');
        $record->entreprise_id = $this->id;
        $record->image = $image;
        $record->is_publie = 1;
        $dt = new jDateTime();
        $dt->now();
        $record->date_creation = $dt->toString(jDateTime::DB_DTFORMAT);
        $maFactory->insert($record);
        return $record->id;
    }
    public function updateImagesGalerie($id, $image)
    {
        $maFactory = jDao::get('entreprise~images');
        $record = $maFactory->get($id);
        $image->url_youtube = $image;
        $dt = new jDateTime();
        $dt->now();
        $record->date_update = $dt->toString(jDateTime::DB_DTFORMAT);
        $maFactory->update($record);
    }
    public function deleteImagesGalerie($id)
    {
        $maFactory = jDao::get('entreprise~images');
        $maFactory->delete($id);
    }

    //Fin section gallérie

    //Section catalogue
    //fonction upload catalogue
    public function uploadCatalogue($file)
    {
        $zFileName          = $_FILES[$file]["name"] ;
        $zFileType          = $_FILES[$file]["type"] ;
        $iFileSize          = intval ($_FILES[$file]["size"]) ;
        $zDirTempName       = $_FILES[$file]["tmp_name"] ;

        $bCreateFolders     = true ;
        $zBackgroundColor   = null ;
        $iImageQuality      = IMAGE_QUALITY ;

        $zExt           = strtolower (CCommonTools::getFileNameExtension ($zFileName)) ;
        $zNoExtName     = preg_replace ("/[.]" . $zExt . "$/", "", $zFileName) ;


        $zNoExtName     = CCommonTools::generateAlias($zNoExtName,"");
        $zFileName      = $zNoExtName . "." . $zExt ;

        // rename file if already exists
        if (file_exists ("entreprise/produits/" . $zFileName))
        {
            $iExistFileCount = 1 ;

            while (file_exists ("entreprise/produits" . "/" . $zNoExtName . "-" . $iExistFileCount . "." . $zExt))
            {
                $iExistFileCount++ ;
            }

            $zFileName = $zNoExtName . "-" . $iExistFileCount . "." . $zExt ;
        }

        // big 
        $oLayerBig    = ImageWorkshop::initFromPath ($_FILES[$file]['tmp_name']) ;
        $oLayerBig->save ("entreprise/produits", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;

        // thumbnail (must)
        $oLayerThumbnail    = ImageWorkshop::initFromPath ($_FILES[$file]['tmp_name']) ;
        $iExpectedWidth     = 96 ;
        $iExpectedHeight    = 96 ;

        ($iExpectedWidth > $iExpectedHeight) ? $iLargestSide = $iExpectedWidth : $iLargestSide = $iExpectedHeight;

        $oLayerThumbnail->cropMaximumInPixel (0, 0, "MM") ;
        $oLayerThumbnail->resizeInPixel ($iLargestSide, $iLargestSide) ;
        $oLayerThumbnail->cropInPixel ($iExpectedWidth, $iExpectedHeight, 0, 0, 'MM') ;
        $oLayerThumbnail->save ("entreprise/produits/thumbnail", $zFileName, $bCreateFolders, $zBackgroundColor, $iImageQuality) ;
        
        $image = $zFileName;

        return $image;
    }

    public static function getCatalogues($id)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("catalogue").' WHERE entreprise_id ='.$id);
        $catalogues = array();

        foreach ($res as $record)
        {
           $catalogues[] = $record;
        }
        return $catalogues;
    }

    public function getAllCataloguesList()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("catalogue").' WHERE entreprise_id ='.$this->id);
        $catalogues = array();

        foreach ($res as $record)
        {
           $catalogues[] = $record;
        }
        return $catalogues;
    }

    public function getCataloguesListText()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT nom_produit FROM '.$cnx->prefixTable ("catalogue").' WHERE entreprise_id ='.$this->id);
        $catalogues = '';

        foreach ($res as $record)
        {
           $catalogues .= ' '.$record->nom_produit;
        }
        return $catalogues;
    }

    public function getCataloguesList()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("catalogue").' WHERE is_publie = 1 AND entreprise_id ='.$this->id);
        $catalogues = array();

        foreach ($res as $record)
        {
           $catalogues[] = $record;
        }
        return $catalogues;
    }

    public function getCataloguesListLast($nb)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("catalogue").' WHERE is_publie = 1 AND entreprise_id ='.$this->id.' ORDER BY date_creation DESC');
        $catalogues = array();
        $i = 0;
        foreach ($res as $record)
        {
            if ($i<$nb)
            {
                $toCatalogues[$i] = $record;
                $i++;
            }
            else
            {
                return $toCatalogues;
            }    
        }
        return $toCatalogues;
    }

    public static function deleteEntreprise($id)
    {
        $cnx = jDb::getConnection();
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("email").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("telephone").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("entreprise_souscategorie").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("motscles_entreprise").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("service").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("produit").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("marque").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("videos").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("images").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("catalogue").' WHERE entreprise_id ='.$id);
        $cnx->exec('DELETE FROM '.$cnx->prefixTable ("entreprise").' WHERE id ='.$id);
    }

    public static function filterBySouscategorieNameDesc($souscategorieId)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT DISTINCT entreprise_id FROM '.$cnx->prefixTable ("entreprise_souscategorie").' as esc INNER JOIN '.$cnx->prefixTable ("entreprise").' as e ON esc.entreprise_id = e.id WHERE souscategorie_id ='.$souscategorieId.' ORDER BY raisonsociale ASC');
        $toEntreprise = array();
        foreach ($res as $record)
        {
           $oEntreprise = CEntreprise::getById($record->entreprise_id);
           $toEntreprise[] = $oEntreprise;
        }
        return $toEntreprise;
    }

    public static function searchByKeywords($motscles, $region, $product)
    {
        if ($motscles != '')
        {
            //$toMotsCles = implode(" ", $motscles);
            //$queryKey = 'SELECT * FROM '
        }
    } 

    // search by sub-category
    public static function searchBySouscategorie($souscategorieId = 0)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise_souscategorie").' AS esc INNER JOIN '.$cnx->prefixTable ("entreprise").' AS e ON esc.entreprise_id = e.id WHERE e.is_publie = 1 AND souscategorie_id ='.$souscategorieId);
        $toEntreprise = array();
        $toSearchEntreprise = array();

        //Liste de top recherche
        $entreprise_id_top1 = '';
        $entreprise_id_top2 = '';
        $entreprise_id_top3 = '';
        $toprecherche = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("toprecherche").' WHERE souscategorie_id ='.$souscategorieId);
        while($record = $toprecherche->fetch()){
            $entreprise_id_top1 = $record->entreprise_id_top1;
            $entreprise_id_top2 = $record->entreprise_id_top2;
            $entreprise_id_top3 = $record->entreprise_id_top3;
        }

        //traitement des resultats
        foreach ($res as $record)
        {
            $oEntreprise = CEntreprise::getById($record->entreprise_id);
            $rang = 1;
            if (($entreprise_id_top1 != '') && ($entreprise_id_top1 == $oEntreprise->id))
            {
                $rang += 100;
            }           
            elseif (($entreprise_id_top2 != '') && ($entreprise_id_top2 == $oEntreprise->id))
            {
                $rang += 60;
            }        
            elseif (($entreprise_id_top3 != '') && ($entreprise_id_top3 == $oEntreprise->id))
            {
                $rang += 30;
            }

            //infos complémentaires 
            $rang += $oEntreprise->weight;

            if (array_key_exists($rang, $toSearchEntreprise))
            {
                array_push($toSearchEntreprise[$rang],$oEntreprise);
            }
            else
            {
                $toSearchEntreprise[$rang] = array($oEntreprise);
            }

        }
        krsort($toSearchEntreprise);
        return $toSearchEntreprise;
    }

    public function incrementeNombreVisite()
    {
        $entrepriseFactory = jDao::get('entreprise~entreprise');
        $record = $entrepriseFactory->get($this->id);
        $record->nombre_visite += 1;        
        $entrepriseFactory->update($record);
    }

    public static function getMostVisited($n)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE is_publie = 1 ORDER BY nombre_visite DESC');
        $toEntreprise = array();
        $i=0;
        foreach ($res as $record)
        {
            if ($i<$n)
            {
                $oEntreprise = CEntreprise::getById($record->id);
                $toEntreprise[$i] = $oEntreprise;
                $i++;
            }
            else
            {
                return $toEntreprise;
            }           
        }
    }

    public static function getLastInserted($n)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->limitQuery('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE is_publie = 1 ORDER BY date_creation DESC', 0,$n);
        $toEntreprise = array();
        foreach ($res as $record)
        {
            $oEntreprise = CEntreprise::getById($record->id);
            $toEntreprise[] = $oEntreprise;
        }
        return $toEntreprise;
    }

    public function getCategorieIcon()
    {
        $oSousCategorie = $this->getSouscategories()[0];
        $oCategorie = CCategorie::getById($oSousCategorie->souscategorie_categorieid);
        return $oCategorie->vignette;
    }

    //test doublons
    public static function ifRaisonsocialeExist($raisonsociale)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE raisonsociale ="'.$raisonsociale.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateRaisonsocialeExist($id, $raisonsociale)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE id <> '.$id.' AND raisonsociale ="'.$raisonsociale.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
    //test doublons
    public static function ifLoginExist($login)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE login ="'.$login.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateLoginExist($id, $login)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("entreprise").' WHERE id <> '.$id.' AND login ="'.$login.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }

    // updating Full text search table
    public function updateSearchTable()
    {
        $maFactory = jDao::get('entreprise~entreprise_search');

        $record = $maFactory->getByEntrepriseId($this->id);
        if (empty($record)) {
            $record = jDao::createRecord('entreprise~entreprise_search');   
        }

        $record->entreprise_id  = $this->id;
        $record->raisonsociale  = $this->raisonsociale;
        $record->activite       = $this->activite;
        $record->adresse        = $this->adresse;
        $record->region         = $this->region;
        $record->services       = $this->getServiceListText();
        $record->produits       = $this->getProduitListText();
        $record->marques        = $this->getMarqueListText();
        $record->catalogues     = $this->getCataloguesListText();
        $record->souscategories = $this->getSouscategoriesListText();
        $record->motscles       = $this->getMotsClesText();
        $record->telephones     = $this->getTelephoneListText();
        $record->is_publie      = $this->is_publie;

        if (!empty($record->id)) {
            $maFactory->update($record);
        } else {
            $maFactory->insert($record);
        }
    }

    // search
    public static function search($to_find = null, $hasPagination = true, &$nbRecs = 0, $currentPage = 1, $sortField = "weight", $sortSens = "DESC", $numValPerPage = NB_DATA_PER_PAGE)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $entreprise_ids = array();

        $to_find = '+' . $to_find;

        $query_search = "SELECT entreprise_id, MATCH (raisonsociale, produits, marques, region, adresse, telephones) AGAINST (" . $cnx->quote($to_find) . " IN BOOLEAN MODE) AS cpt FROM " . $cnx->prefixTable("entreprise_search") . " WHERE MATCH (raisonsociale, produits, marques, region, adresse, telephones) AGAINST (" . $cnx->quote($to_find) . " IN BOOLEAN MODE) ORDER BY cpt DESC";

        $res_search = $cnx->query($query_search);

        foreach ($res_search as $row_search) {
            $entreprise_ids[] = $row_search->entreprise_id;
        }

        if (!empty($entreprise_ids)) {

            $query_entreprise = "
                                    SELECT SQL_CALC_FOUND_ROWS * FROM " . $cnx->prefixTable("entreprise") . " 
                                    WHERE is_publie = 1 AND id IN(". implode(",", $entreprise_ids) .") 
                                    ORDER BY " . $sortField . " " . $sortSens . "
                                ";

            // pagination
            if ($hasPagination) {
                $query_entreprise .= " LIMIT " . ($currentPage - 1) * $numValPerPage . ", " . $numValPerPage;
            }

            $res_entreprise = $cnx->query($query_entreprise);

            if (!is_null($nbRecs)) {
                // --- nombre des lignes pour la pagination
                $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
                $rsCount = $cnx->query($queryDataCount);
                $resCount = $rsCount->fetch();
                $nbRecs = $resCount->numRows;
            }

            foreach ($res_entreprise as $entreprise_row) {
                $results[] = CEntreprise::getById($entreprise_row->id);
            }

        }
        return $results;
    }

    //auto complete
    public static function autoComplet($term = "")
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT id,raisonsociale,region FROM " . $cnx->prefixTable("entreprise") . " 
                        WHERE 1
                    ";

        $filters = array();
        $filters[] = "raisonsociale LIKE '%" . $term . "%'";
        $filters[] = "region LIKE '%" . $term . "%'";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" OR ", $filters) . ")";

        // tri
        if (!empty($sortField) && !empty($sortSens)) {
            $query .= " ORDER BY raisonsociale ASC";
        }

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $libelle = $row->raisonsociale;
            if (!empty($row->region)) {
                $libelle .= " (" . $row->region . ")";
            }
            $results[] = array("id" => $row->id, "text" => $libelle);
        }

        return $results;
    }

    //auto complete front
    public static function frontAutoComplet($term = "", $selected = array())
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query_raisonsociale = "SELECT raisonsociale FROM " . $cnx->prefixTable("entreprise") . " WHERE raisonsociale LIKE '%" . $term . "%' AND is_publie = 1";

        $query_produits = "SELECT name, entreprise_id FROM " . $cnx->prefixTable("produit") . " AS p INNER JOIN " . $cnx->prefixTable("entreprise") . " e ON p.entreprise_id = e.id WHERE p.name LIKE '%" . $term . "%' AND e.is_publie = 1";

        $query_marques = "SELECT name FROM " . $cnx->prefixTable("marque") . " AS m INNER JOIN " . $cnx->prefixTable("entreprise") . " e ON m.entreprise_id = e.id WHERE m.name LIKE '%" . $term . "%' AND e.is_publie = 1";

        $query_region = "SELECT region FROM " . $cnx->prefixTable("entreprise") . " WHERE region LIKE '%" . $term . "%' AND is_publie = 1";

        $query_adresse = "SELECT adresse FROM " . $cnx->prefixTable("entreprise") . " WHERE adresse LIKE '%" . $term . "%' AND is_publie = 1";

        $query_telephones = "SELECT numero FROM " . $cnx->prefixTable("telephone") . " AS tel INNER JOIN " . $cnx->prefixTable("entreprise") . " e ON tel.entreprise_id = e.id WHERE alias LIKE '%" . $term . "%' AND e.is_publie = 1";

        // libellés
        $libelles = array();

        $res_raisonsociale = $cnx->query($query_raisonsociale);
        foreach ($res_raisonsociale as $raisonsociale_row) {
            $libelles[] = $raisonsociale_row->raisonsociale;
        }

        $res_produits = $cnx->query($query_produits);
        foreach ($res_produits as $produit_row) {
            $libelles[] = $produit_row->name;
        }

        $res_marques = $cnx->query($query_marques);
        foreach ($res_marques as $marque_row) {
            $libelles[] = $marque_row->name;
        }

        $res_region = $cnx->query($query_region);
        foreach ($res_region as $region_row) {
            $libelles[] = $region_row->region;
        }

        $res_adresse = $cnx->query($query_adresse);
        foreach ($res_adresse as $adresse_row) {
            $libelles[] = $adresse_row->adresse;
        }

        $res_telephones = $cnx->query($query_telephones);
        foreach ($res_telephones as $telephone_row) {
            $libelles[] = $telephone_row->numero;
        }

        if (!empty($libelles)) {
            $libelles = array_unique($libelles);
        }

        foreach ($libelles as $libelle) {
            if (!empty($selected)) {
                if (!in_array($libelle, $selected)) {
                    $results[] = array("id" => $libelle, "text" => mb_strtolower($libelle, "UTF-8"));
                }
            } else {
                $results[] = array("id" => $libelle, "text" => mb_strtolower($libelle, "UTF-8"));
            }
        }

        return $results;
    }

    // Récupération de nombre des entreprises ayant au moin des infos payant
    public static function countNbAvecInfoPayant()
    {
        // Nombre des entreprises ayant au moins un info payant
        // Visu pres, nos services, qsmns, nos réferences, gallery videos, galerie image, catalogue
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT count(id) as nb FROM " . $cnx->prefixTable("entreprise") . " 
                        WHERE 1
                    ";

        $filters = array();
        $filters[] = "(video_presentation_active = 1 AND video_presentation <> '' )";
        $filters[] = "(qui_sommes_nous_active = 1 AND qui_sommes_nous <> '' )";
        $filters[] = "(nos_services_active = 1 AND nos_services <> '' )";
        $filters[] = "(nos_references_active = 1 AND nos_services <> '' )";
        $filters[] = "(videos_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("videos"). "))";
        $filters[] = "(galerie_image_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("images"). "))";
        $filters[] = "(catalogue_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("catalogue"). "))";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" OR ", $filters) . ")";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $nbResult = $row->nb;
        }

        return $nbResult;
    }

    // Récupération des entreprises ayant au moin des infos payants
    public static function getAvecInfoPayant()
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT * FROM " . $cnx->prefixTable("entreprise") . " 
                        WHERE 1
                    ";

        $filters = array();
        $filters[] = "(video_presentation_active = 1 AND video_presentation <> '' )";
        $filters[] = "(qui_sommes_nous_active = 1 AND qui_sommes_nous <> '' )";
        $filters[] = "(nos_services_active = 1 AND nos_services <> '' )";
        $filters[] = "(nos_references_active = 1 AND nos_services <> '' )";
        $filters[] = "(videos_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("videos"). "))";
        $filters[] = "(galerie_image_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("images"). "))";
        $filters[] = "(catalogue_active = 1 AND id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("catalogue"). "))";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" OR ", $filters) . ")";

        $res = $cnx->query($query);
        $toEntreprise = array();
        foreach ($res as $row) {
            $oEntreprise = new CEntreprise();
            $oEntreprise->fetchFromRecord($row);
            $toEntreprise[] = $oEntreprise;
        }

        return $toEntreprise;
    }

    // Récupération de nombre des entreprises ayant au moin des infos complementaires
    public static function countNbAvecInfoComp()
    {
        // Nombre des entreprises ayant au moins un info complémentaire
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT count(id) as nb FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        $filtersInfoPayant  = array();
        $filtersInfoPayant[] = "(video_presentation_active = 0 OR video_presentation = '' )";
        $filtersInfoPayant[] = "(qui_sommes_nous_active = 0 OR qui_sommes_nous = '' )";
        $filtersInfoPayant[] = "(nos_services_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(nos_references_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(videos_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("videos"). "))";
        $filtersInfoPayant[] = "(galerie_image_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("images"). "))";
        $filtersInfoPayant[] = "(catalogue_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("catalogue"). "))";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoPayant) . ")";

        $filtersInfoComp  = array();
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("service") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("marque") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("produit") . " WHERE entreprise_id = e.id)";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" OR ", $filtersInfoComp) . ")";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $nbResult = $row->nb;
        }

        return $nbResult;
    }

    // Récupération des entreprises ayant au moins des infos complémentaires
    public static function getAvecInfoComp()
    {
        // Nombre des entreprises ayant au moins un info payant
        // Visu pres, nos services, qsmns, nos réferences, gallery videos, galerie image, catalogue
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT * FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        $filtersInfoPayant  = array();
        $filtersInfoPayant[] = "(video_presentation_active = 0 OR video_presentation = '' )";
        $filtersInfoPayant[] = "(qui_sommes_nous_active = 0 OR qui_sommes_nous = '' )";
        $filtersInfoPayant[] = "(nos_services_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(nos_references_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(videos_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("videos"). "))";
        $filtersInfoPayant[] = "(galerie_image_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("images"). "))";
        $filtersInfoPayant[] = "(catalogue_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("catalogue"). "))";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoPayant) . ")";

        $filtersInfoComp  = array();
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("service") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("marque") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "e.id IN (SELECT entreprise_id FROM " . $cnx->prefixTable("produit") . " WHERE entreprise_id = e.id)";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" OR ", $filtersInfoComp) . ")";

        $res = $cnx->query($query);
        $toEntreprise = array();
        foreach ($res as $row) {
            $oEntreprise = new CEntreprise();
            $oEntreprise->fetchFromRecord($row);
            $toEntreprise[] = $oEntreprise;
        }

        return $toEntreprise;
    }

    // Récupération de nombre des entreprises ayant au moin des infos simple
    public static function countNbAvecInfoSimple()
    {
        // Nombre des entreprises ayant au moins un info simple
        // not info payant && info complementaire
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT count(id) as nb FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        $filtersInfoPayant  = array();
        $filtersInfoPayant[] = "(video_presentation_active = 0 OR video_presentation = '' )";
        $filtersInfoPayant[] = "(qui_sommes_nous_active = 0 OR qui_sommes_nous = '' )";
        $filtersInfoPayant[] = "(nos_services_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(nos_references_active = 0 OR nos_services = '' )";
        $filtersInfoPayant[] = "(videos_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("videos"). "))";
        $filtersInfoPayant[] = "(galerie_image_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("images"). "))";
        $filtersInfoPayant[] = "(catalogue_active = 0 OR id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("catalogue"). "))";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoPayant) . ")";

        $filtersInfoComp  = array();
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("service") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("marque") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("produit") . " WHERE entreprise_id = e.id)";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoComp) . ")";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $nbResult = $row->nb;
        }

        return $nbResult;
    }
    // Récupération de nombre des entreprises
    public static function countNbTotal()
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT count(id) as nb FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $nbResult = $row->nb;
        }

        return $nbResult;
    }

    public static function getAvecInfoSimple()
    {
        // not info payant && info complementaire
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT * FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1
                    ";

        $filtersInfoPayant  = array();
        $filtersInfoPayant[] = "video_presentation_active = 0";
        $filtersInfoPayant[] = "qui_sommes_nous_active = 0";
        $filtersInfoPayant[] = "nos_services_active = 0";
        $filtersInfoPayant[] = "nos_references_active = 0";
        $filtersInfoPayant[] = "videos_active = 0";
        $filtersInfoPayant[] = "galerie_image_active = 0";
        $filtersInfoPayant[] = "catalogue_active = 0";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoPayant) . ")";

        $filtersInfoComp  = array();
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("service") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("marque") . " WHERE entreprise_id = e.id)";
        $filtersInfoComp[] = "id NOT IN (SELECT entreprise_id FROM " . $cnx->prefixTable("produit") . " WHERE entreprise_id = e.id)";

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filtersInfoComp) . ")";

        $res = $cnx->query($query);
        $toEntreprise = array();
        foreach ($res as $row) {
            $oEntreprise = new CEntreprise();
            $oEntreprise->fetchFromRecord($row);
            $toEntreprise[] = $oEntreprise;
        }

        return $toEntreprise;
    }

    public static function entrepriseInscriptionReport()
    {
        $results = array();

        $cnx = jDb::getConnection();

        $query =   "
                        SELECT COUNT(id) as value, EXTRACT(YEAR FROM date_creation) AS year, EXTRACT(MONTH FROM date_creation) AS month, EXTRACT(DAY FROM date_creation) AS day FROM " . $cnx->prefixTable("entreprise") . " as e
                        WHERE 1 AND EXTRACT(YEAR FROM date_creation) = EXTRACT(YEAR FROM CURDATE()) GROUP BY year, month, day
                    ";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            $results[] = $row;
        }

        return $results;
    }

    // count
    public function countEntreprise($andFilters = array(), $orFilters = array())
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query =    "
                        SELECT SQL_CALC_FOUND_ROWS id 
                        FROM " . $cnx->prefixTable("entreprise") . " 
                        WHERE 1
                    ";

        // and filters
        if (!empty($andFilters)) {
            $query .= " AND ";
            $query .= (sizeof($andFilters) > 1) ? implode(" AND ", $andFilters) : $andFilters[0];
        }

        // or filters
        if (!empty($orFilters)) {
            $query .= " AND ";
            $query .= (sizeof($orFilters) > 1) ? "(" . implode(" OR ", $orFilters) . ")" : $orFilters[0];
        }

        $query .= " LIMIT 0, 1";

        $cnx->exec($query);

        // --- nombre des lignes pour la pagination
        $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
        $rsCount = $cnx->query($queryDataCount);
        $resCount = $rsCount->fetch();
        return (isset($resCount->numRows)) ? $resCount->numRows : 0;
    }

    // entreprise with service ids
    public function getEntrepriseWithServiceIds()
    {
        $ids = array();
        $cnx = jDb::getConnection();
        $query = "SELECT entreprise_id FROM " . $cnx->prefixTable("service") . " WHERE 1";
        $results = $cnx->query($query);
        foreach ($results as $row) {
            $ids[] = $row->entreprise_id;
        }
        return $ids;
    }

    // entreprise with marque ids
    public function getEntrepriseWithMarqueIds()
    {
        $ids = array();
        $cnx = jDb::getConnection();
        $query = "SELECT entreprise_id FROM " . $cnx->prefixTable("marque") . " WHERE 1";
        $results = $cnx->query($query);
        foreach ($results as $row) {
            $ids[] = $row->entreprise_id;
        }
        return $ids;
    }

    // entreprise with produit ids
    public function getEntrepriseWithProduitIds()
    {
        $ids = array();
        $cnx = jDb::getConnection();
        $query = "SELECT entreprise_id FROM " . $cnx->prefixTable("produit") . " WHERE 1";
        $results = $cnx->query($query);
        foreach ($results as $row) {
            $ids[] = $row->entreprise_id;
        }
        return $ids;
    }
}
?>