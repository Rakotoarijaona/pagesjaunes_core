<?php
/**
* @package   pagesjaunes_core
* @subpackage dashboard
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("common~CCommonTools");
jClasses::inc("entreprise~CEntreprise");
jClasses::inc("ads~CAdsPurchase");

class dashboardCtrl extends jController {
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("dashboard.menu") && !jAcl2::check("dashboard.restrictall")) { //test jAcl

            $nbTotalEntreprise = CEntreprise::countEntreprise();

            // Nombre des entreprises ayant au moins un info payant
            // Visu pres, nos services, qsmns, nos réferences, gallery videos, galerie image, catalogue
            $infosPayantesFilters = array();
            $infosPayantesFilters[] = "video_presentation_active = 1";
            $infosPayantesFilters[] = "qui_sommes_nous_active = 1";
            $infosPayantesFilters[] = "nos_services_active = 1";
            $infosPayantesFilters[] = "nos_references_active = 1";
            $infosPayantesFilters[] = "videos_active = 1";
            $infosPayantesFilters[] = "galerie_image_active = 1";
            $infosPayantesFilters[] = "catalogue_active = 1";
            $nbAvecInfoPayant = CEntreprise::countEntreprise(array(), $infosPayantesFilters);

            // Nombre des entreprises ayant au moins info complémentaire
            // services, produits, marques, google map
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
            $nbAvecInfoComp = CEntreprise::countEntreprise($andNbAvecInfoCompFilters);

            // Nombre des entreprises ayant seulement info simple
            // not info payant && info complementaire
            $andNbAvecInfoSimpleFilters = array();
            $andNbAvecInfoSimpleFilters[] = "video_presentation_active = 0";
            $andNbAvecInfoSimpleFilters[] = "qui_sommes_nous_active = 0";
            $andNbAvecInfoSimpleFilters[] = "nos_services_active = 0";
            $andNbAvecInfoSimpleFilters[] = "nos_references_active = 0";
            $andNbAvecInfoSimpleFilters[] = "videos_active = 0";
            $andNbAvecInfoSimpleFilters[] = "galerie_image_active = 0";
            $andNbAvecInfoSimpleFilters[] = "catalogue_active = 0";
            $entrepriseWithServiceIds = CEntreprise::getEntrepriseWithServiceIds();
            $entrepriseWithMarqueIds = CEntreprise::getEntrepriseWithMarqueIds();
            $entrepriseWithProduitIds = CEntreprise::getEntrepriseWithProduitIds();
            $entrepriseWithInfosCompIds = array_merge($entrepriseWithServiceIds, $entrepriseWithMarqueIds, $entrepriseWithProduitIds);
            $entrepriseWithInfosCompIds = array_unique($entrepriseWithInfosCompIds);
            $andNbAvecInfoSimpleFilters[] = "id NOT IN(" . implode(",", $entrepriseWithInfosCompIds) . ")";
            $nbAvecInfoSimple = CEntreprise::countEntreprise($andNbAvecInfoSimpleFilters);

            // pourcentage des entreprises ayant au moins un info payant
            $pAvecInfoPayant = number_format((($nbAvecInfoPayant / $nbTotalEntreprise) * 100), 2);

            // pourcentage des entreprises ayant au moins un info comp
            $pAvecInfoComp = number_format((($nbAvecInfoComp / $nbTotalEntreprise) * 100), 2);

            // pourcentage des entreprises ayant au moins un info simple
            $pAvecInfoSimple = number_format((($nbAvecInfoSimple / $nbTotalEntreprise) * 100), 2);

            // Liste des 10 derniers entreprises inscrites validées
            $toLastInserted = CEntreprise::getLastInserted(10);

            // Liste des 10 derniers annonceurs
            $toLastAdsPurchase = CAdsPurchase::getLastInserted(10);

            // graph
            $jSonchartEntreprise = json_encode(CEntreprise::entrepriseInscriptionReport());

            $tpl->assign('nbTotalEntreprise',$nbTotalEntreprise);
            $tpl->assign('nbAvecInfoPayant',$nbAvecInfoPayant);
            $tpl->assign('nbAvecInfoComp',$nbAvecInfoComp);
            $tpl->assign('nbAvecInfoSimple',$nbAvecInfoSimple);
            $tpl->assign('pAvecInfoPayant',$pAvecInfoPayant);
            $tpl->assign('pAvecInfoComp',$pAvecInfoComp);
            $tpl->assign('pAvecInfoSimple',$pAvecInfoSimple);
            $tpl->assign('jSonchartEntreprise',$jSonchartEntreprise);
            $tpl->assign('toLastInserted',$toLastInserted);
            $tpl->assign('toLastAdsPurchase',$toLastAdsPurchase);

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('dashboard~index'));


        } else { //else test jAcl 
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~welcome_page'));
        }
        $resp->body->assign('selectedMenuItem','dashboard');
        return $resp;
    }
}

