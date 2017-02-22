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
jClasses::inc("entreprise~Entreprise");
jClasses::inc("ads~CAdsPurchase");

class dashboardCtrl extends jController {
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("dashboard.menu") && !jAcl2::check("dashboard.restrictall")) { //test jAcl

            $nbTotalEntreprise = Entreprise::countNbTotal();
            // Nombre des entreprises ayant au moins un info payant
            // Visu pres, nos services, qsmns, nos réferences, gallery videos, galerie image, catalogue
            $nbAvecInfoPayant = Entreprise::countNbAvecInfoPayant();
            // Liste des entreprises ayant au moins un info payant
            $toListeAvecInfoPayant = Entreprise::getAvecInfoPayant();

            // Nombre des entreprises ayant au moins info complémentaire
            // services, produits, marques, google map
            $nbAvecInfoComp = Entreprise::countNbAvecInfoComp();
            // Liste des entreprises ayant au moins info complémentaire
            $toListeAvecInfoComp = Entreprise::getAvecInfoComp();

            // Nombre des entreprises ayant seulement info simple
            // not info payant && info complementaire
            $nbAvecInfoSimple = Entreprise::countNbAvecInfoSimple();
            // Liste des entreprises ayant seulement info simple            
            $toListeAvecInfoSimple = Entreprise::getAvecInfoSimple();

            // pourcentage des entreprises ayant au moins un info payant
            $pAvecInfoPayant = number_format((($nbAvecInfoPayant / $nbTotalEntreprise) * 100), 2);
            // pourcentage des entreprises ayant au moins un info comp
            $pAvecInfoComp = number_format((($nbAvecInfoComp / $nbTotalEntreprise) * 100), 2);
            // pourcentage des entreprises ayant au moins un info simple
            $pAvecInfoSimple = number_format((($nbAvecInfoSimple / $nbTotalEntreprise) * 100), 2);

            // Liste des 10 derniers entreprises inscrites validées
            $toLastInserted = Entreprise::getLastInserted(10);

            // Liste des 10 derniers annonceurs
            $toLastAdsPurchase = CAdsPurchase::getLastInserted(10);
            Entreprise::entrepriseInscriptionReport();
            $jSonchartEntreprise = json_encode(Entreprise::entrepriseInscriptionReport());

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

