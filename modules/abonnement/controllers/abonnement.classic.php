<?php
/**
* @package      pagesjaunes_core
* @subpackage   abonnement
* @author
* @copyright    2017
* @link
* @license      All rights reserved
*/

require_once(jApp::appPath().'modules/common/controllers/jControllerRSR.php');

jClasses::inc("entreprise~Entreprise");
jClasses::inc("abonnement~CAbonnement");

class abonnementCtrl extends jControllerRSR
{
    // index
    function index()
    {
        // check if request is ajax
        $isAjax = jApp::coord()->request->isAjax();

        // response
        $resp = ($isAjax) ? $this->getResponse('htmlfragment') : $this->getResponse('html');

        // template object
        $tpl = new jTpl();

        if (jAcl2::check("abonnement.list")) {

            $page = $this->intParam("page", 1, true);
            $sortSens = $this->stringParam("sortsens", "DESC", true);
            $sortField = $this->stringParam("sortfield", "abonnement_id", true);
            $listStatus = $this->intParam("ls", LIST_ACTIVE, true);
            $search = utf8_encode($this->stringParam("s", "", true));

            //pagination parameters
            $paginationParams = array();

            //and filters
            $andFilters = array();
            if ($listStatus == LIST_ACTIVE) {
                $andFilters[] = "abonnement_removalstatus = " . NO;
                $paginationParams["ls"] = NO;
            } else {
                $andFilters[] = "abonnement_removalstatus = " . YES;
                $paginationParams["ls"] = YES;
            }

            //or filters
            $orFilters = array();
            if (!empty($search)) {
                $orFilters[] = "raisonsociale LIKE'%" . $search . "%'";
                $orFilters[] = "abonnement_nomoffre LIKE '%" . $search . "%'";
                $orFilters[] = "abonnement_datedebut LIKE '%" . $search . "%'";
                $orFilters[] = "abonnement_datefin LIKE '%" . $search . "%'";
                $orFilters[] = "abonnement_dureeval LIKE '%" . $search . "%'";
                $orFilters[] = "abonnement_montant LIKE '%" . $search . "%'";
                $paginationParams["s"] = $search;
            }

            // list
            $nbRecs = 0;
            $list = CAbonnement::read($andFilters, false, true, $orFilters, $nbRecs, $page, $sortField, $sortSens);

            // pagination
            $pagination = CCommonTools::getPagination("entreprise~abonnement:all", $nbRecs, $page, NB_DATA_PER_PAGE, NB_LINK_TO_DISPLAY, array(), false);

            //counts
            $nbTrashRecs = CAbonnement::count($andFilters, $orFilters);
            $nbActiveRecs = CAbonnement::count($andFilters, $orFilters);

            if ($isAjax) {

                $resp->tplname = 'abonnement~index.fragment';
                CCommonTools::assignDefinedConstants ($resp->tpl);
                $resp->tpl->assign("list", $list);
                $resp->tpl->assign("page", $page);
                $resp->tpl->assign("nbRecs", $nbRecs);
                $resp->tpl->assign("pagination", $pagination);
                $resp->tpl->assign("nbTrashRecs", $nbTrashRecs);
                $resp->tpl->assign("nbActiveRecs", $nbActiveRecs);
                $resp->tpl->assign("sortsens", $sortSens);
                $resp->tpl->assign("sortfield", $sortField);

            } else {

                CCommonTools::assignDefinedConstants($tpl);
                $tpl->assign("list", $list);
                $tpl->assign("page", $page);
                $tpl->assign("nbRecs", $nbRecs);
                $tpl->assign("pagination", $pagination);
                $tpl->assign("nbTrashRecs", $nbTrashRecs);
                $tpl->assign("nbActiveRecs", $nbActiveRecs);
                $tpl->assign("sortsens", $sortSens);
                $tpl->assign("sortfield", $sortField);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('abonnement~index'));
                $resp->body->assign('selectedMenuItem','entreprise');

            }

        } else {

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));

        }
        return $resp;
    }

    // add
    function add()
    {
        // response
        $resp = $this->getResponse('html');

        // template object
        $tpl = new jTpl();

        if (jAcl2::check("abonnement.create")) {

            // entreprise
            $entreprises = Entreprise::getList();

            // abonnement
            $abonnement = new CAbonnement();

            // template object
            $tpl = new jTpl();

            CCommonTools::assignDefinedConstants($tpl);
            $tpl->assign("abonnement", $abonnement);
            $tpl->assign("entreprises", $entreprises);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('abonnement~edit'));

        } else {

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));

        }

        return $resp;
    }

    // edit
    function edit()
    {
        // response
        $resp = $this->getResponse('html');

        // template object
        $tpl = new jTpl();

        if (jAcl2::check("abonnement.update")) {

            // parameter
            $abonnement_id = $this->intParam("id", null, true);

            // entreprise
            $entreprises = Entreprise::getList();

            // abonnement
            $filter = array();
            $filter[] = "abonnement_id = " . $abonnement_id;
            $abonnement = CAbonnement::read($filter);
            $abonnement->abonnement_datedebut = CCommonTools::dateSql2Locale($abonnement->abonnement_datedebut);
            $abonnement->abonnement_datefin = CCommonTools::dateSql2Locale($abonnement->abonnement_datefin);

            // template object
            $tpl = new jTpl();

            CCommonTools::assignDefinedConstants($tpl);
            $tpl->assign("abonnement", $abonnement);
            $tpl->assign("entreprises", $entreprises);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('abonnement~edit'));

        } else {

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));

        }

        return $resp;
    }

    // create
    public function create()
    {
        // response
        $resp = $this->getResponse('redirect');

        if (jAcl2::check("abonnement.create"))
        {
            // parameters
            $abonnement_id = $this->intParam("abonnement_id", null, true);
            $abonnement_entrepriseid = $this->intParam("abonnement_entrepriseid", null, true);
            $abonnement_nomoffre = $this->stringParam("abonnement_nomoffre", null, true);
            $abonnement_datedebut = $this->stringParam("abonnement_datedebut", null, true);
            $abonnement_datefin = $this->stringParam("abonnement_datefin", null, true);
            $abonnement_dureeval = $this->stringParam("abonnement_dureeval", null, true);
            $abonnement_dureetype = $this->intParam("abonnement_dureetype", null, true);
            $abonnement_montant = $this->stringParam("abonnement_montant", null, true);

            // error
            $hasError = false;

            // abonnement
            $abonnement = new CAbonnement();
            $abonnement->abonnement_entrepriseid = $abonnement_entrepriseid;
            $abonnement->abonnement_nomoffre = $abonnement_nomoffre;
            $abonnement->abonnement_datedebut = CCommonTools::dateLocale2Sql($abonnement_datedebut);
            $abonnement->abonnement_datefin = CCommonTools::dateLocale2Sql($abonnement_datefin);
            $abonnement->abonnement_dureeval = $abonnement_dureeval;
            $abonnement->abonnement_dureetype = $abonnement_dureetype;
            $abonnement->abonnement_montant = $abonnement_montant;
            $abonnement->abonnement_removalstatus = NO;
            $abonnement->create();

            jMessage::add(jLocale::get("common~common.alert.success"), "success");

            $resp->action = 'abonnement~abonnement:index';

        } else {

            $resp = $this->getResponse('redirect');
            $resp->action = "common~common:badright";

        }

        return $resp;
    }

    // update
    public function update()
    {
        $resp = $this->getResponse('redirect');

        if (jAcl2::check("abonnement.update"))
        {
            $abonnement_id = $this->intParam("id", null, true);
            $abonnement_entrepriseid = $this->intParam("abonnement_entrepriseid", null, true);
            $abonnement_nomoffre = $this->stringParam("abonnement_nomoffre", null, true);
            $abonnement_datedebut = $this->stringParam("abonnement_datedebut", null, true);
            $abonnement_datefin = $this->stringParam("abonnement_datefin", null, true);
            $abonnement_dureeval = $this->stringParam("abonnement_dureeval", null, true);
            $abonnement_dureetype = $this->intParam("abonnement_dureetype", null, true);
            $abonnement_montant = $this->stringParam("abonnement_montant", null, true);

            // error
            $hasError = false;

            // abonnement
            $filter = array();
            $filter[] = "abonnement_id = " . $abonnement_id;
            $abonnement = CAbonnement::read($filter);

            // assign
            $abonnement->abonnement_entrepriseid = $abonnement_entrepriseid;
            $abonnement->abonnement_nomoffre = $abonnement_nomoffre;
            $abonnement->abonnement_datedebut = CCommonTools::dateLocale2Sql($abonnement_datedebut);
            $abonnement->abonnement_datefin = CCommonTools::dateLocale2Sql($abonnement_datefin);
            $abonnement->abonnement_dureeval = $abonnement_dureeval;
            $abonnement->abonnement_dureetype = $abonnement_dureetype;
            $abonnement->abonnement_montant = $abonnement_montant;
            $abonnement->update();

            jMessage::add(jLocale::get("common~common.alert.success"), "success");

            $resp->action = 'abonnement~abonnement:index';

        } else {

            $resp = $this->getResponse('redirect');
            $resp->action = "common~common:badright";

        }

        return $resp;
    }

    // remove admin human ressource
    public function remove()
    {
        // response
        $resp = $this->getResponse('json');

        $success = NO;

        if (jAcl2::check("abonnement.delete")) {

            $abonnement_id = $this->stringParam("id", null, true);
            $ids = explode(",", $abonnement_id);

            if (!empty($ids)) {

                foreach ($ids as $id) {
                    CAbonnement::delete($id);
                }

                $success = YES;
            }
        }

        $resp->data = array("success" => $success);

        return $resp;
    }
}