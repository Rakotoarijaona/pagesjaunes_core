<?php
/**
* @package      pagesjaunes_core
* @subpackage   common
* @author       YSTA
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/
jClasses::inc ("common~CMenuItems") ;
jClasses::inc ("user~CUser") ;
class navZone extends jZone
{
    protected $_tplname = 'common~nav.zone';

    protected function _prepareTpl()
    {
        $coord = jApp::coord();
        $toMenu = array();
        //Menu dashboard
        if( jAcl2::check("dashboard.menu")) {
            $toMenu['dashboard'] = new CMenuItems ('dashboard', 'Tableau de bords', 'dashboard~dashboard:index','fa-th-large');
        }
        //Menu Gestion des categories
        if( !(jAcl2::check("categorie.restrictall")) && jAcl2::check("categorie.list")) {
            $toMenu['categorie'] = new CMenuItems ('categorie', 'Catégorie', 'categorie~categorie:index', 'fa-tasks');
        }
        //Menu Gestion Entreprises
        if( !(jAcl2::check("entreprise.restrictall")) && jAcl2::check("entreprise.list")) {
            $toMenu['entreprise'] = new CMenuItems ('entreprise', 'Entreprises', 'entreprise~entreprise:index', 'fa-flag');
        }
        //Menu Gestion des mots clés
        if( !(jAcl2::check("keywords.restrictall")) && jAcl2::check("keywords.list")) {
            $toMenu['keywords'] = new CMenuItems ('keywords', 'Mots clés', 'categorie~motscles:index', 'fa-key');
        }
        //Menu Gestion des slideshow
        if( !(jAcl2::check("slideshow.restrictall")) && jAcl2::check("slideshow.list") ) {
            $toMenu['slideshow'] = new CMenuItems ('slideshow', 'Slideshow', 'slideshow~slideshow:index', 'fa-picture-o');
        }
        //Menu Gestion Homepage
        if(jAcl2::check("homepage.menu") && !jAcl2::check("homepage.restrictall")) {
            $toMenu['homepage'] = new CMenuItems ('homepage', 'Homepage', 'homepage~homepage:index', 'fa-home');
        }
        //Menu Gestion des profiles
        if( jAcl2::check("profile.menu") && jAcl2::check("profile.list") && !jAcl2::check("profile.restrictall")) {
            $toMenu['profile'] = new CMenuItems ('profile', 'Profils', 'profile~profile:index', 'fa-group');
        }
        //Menu Gestion des utilisateurs
        if( jAcl2::check("user.menu") && jAcl2::check("user.list") && !jAcl2::check("user.restrictall")) {
            $toMenu['user'] = new CMenuItems ('user', 'Utilisateurs', 'user~user:index', 'fa-user');
        }
        //Menu Gestion des tops recherche
        if( jAcl2::check("topsrecherche.list") && !jAcl2::check("topsrecherche.restrictall")) {
            $toMenu['toprecherche'] = new CMenuItems ('toprecherche', 'Tops recherche', 'toprecherche~toprecherche:index', 'fa-search');
        }
        //Menu Gestion des pages statiques
        if( jAcl2::check("pages.list") && !jAcl2::check("pages.restrictall")) {
            $toMenu['pages'] = new CMenuItems ('pages', 'Pages', 'pages~pages:index', 'fa-file-o');
        }
        //Menu Gestion des publicités
        if( jAcl2::check("ads.list") && !jAcl2::check("ads.restrictall")) {
            $toMenu['ads'] = new CMenuItems ('ads', 'Publicités', 'ads~ads:index', 'fa-bullhorn');
            $toMenu['ads']->childItems = array(
                new CMenuItems ('ads', 'Annonceurs', 'ads~ads:index', 'fa-bullhorn'),
                new CMenuItems ('ads_zone', 'Zone de pub', 'ads~ads_zone:index', 'fa-bullhorn'),
                new CMenuItems ('ads_config', 'Configuration', 'ads~ads_config:index', 'fa-bullhorn')
            );
        }
        //Menu Gestion des abonnements
        if( jAcl2::check("abonnement.list") && !jAcl2::check("abonnement.restrictall")) {
            $toMenu['abonnement'] = new CMenuItems ('abonnement', 'Abonnements', 'abonnement~abonnement:index', 'fa-credit-card');
        }
        $this->_tpl->assign('toMenu',$toMenu);
        $this->_tpl->assign('selectedMenuItem', $this->param('selectedMenuItem',''));
        $this->_tpl->assign('selectedMenuChildItem', $this->param('selectedMenuChildItem',''));

        $module = $coord->request->module;
        $action = $coord->request->action;

        $user = jAuth::getUserSession();
        $oUser = User::getUserByLogin($user->login);
        $this->_tpl->assign('oUser', $oUser);
        $this->_tpl->assign ('PHOTOS_FOLDER',PHOTOS_FOLDER);
        $this->_tpl->assign ('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
        $this->_tpl->assign('module', $module);
        $this->_tpl->assign('action', $action);
        $this->_tpl->assign('moduleAndAction', $module.'~'.$action);
    }
}