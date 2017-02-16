<?php
/**
 * @package pagesjaunes_core
 * @subpackage entreprise
 * @author R      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("categorie~motscles");
jClasses::inc("categorie~souscategorie");
jClasses::inc("categorie~Categorie");

class CSearch
{
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
        $this->login = '';
        $this->password = '';
    }

    function relevanssi_search($args) 
    {

    }
}