<?php
/**
* @package   pagesjaunes_core
* @subpackage categorie
* @author    R
* @copyright 2016
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");

class motsclesCtrl extends jController {

    public $pluginParams=array(
        'index'             =>array('jacl2.right'=>'keywords.list'),
        'updateTags'           =>array('jacl2.right'=>'keywords.update')
    );

    function index() {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("keywords.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();      
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $oList = array();
            $oListCategorie = Categorie::getList();
            $i = 0;
            $iCategorieParent = 0;
            foreach ($oListCategorie as $categorie) {
                $oList[$i]['categorie'] = $categorie;
                $oList[$i]['souscategorie'] = $categorie->getChild();
                $i+=1;
            }
            if (!empty($this->param('souscategorieId')))
            {
                $oSouscategorie = Souscategorie::getById($this->intParam('souscategorieId'));
                $iCategorieParent = $oSouscategorie->getParent()->id;
                $tpl->assign("oSouscategorie", $oSouscategorie);
            }
            $tpl->assign("iCategorieParent", $iCategorieParent);
            $tpl->assign("oList", $oList);
            $tpl->assign("oListCategorie", $oListCategorie);
            $resp->body->assign('MAIN', $tpl->fetch('categorie~page_mots_cles'));

            $resp->body->assign('selectedMenuItem','keywords');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function updateTags()
    {
        $resp = $this->getResponse('redirect');
        if (!jAcl2::check("keywords.restrictall")) { //Test droit restrict all
            if (!empty($this->param('id')))
            {
                $oSouscategorie = Souscategorie::getById($this->intParam('id'));
                $oSouscategorie->updateMotsCles($this->param('tags'));
                $resp->params = array('souscategorieId'=>$oSouscategorie->id);
            }
            $resp->action = "categorie~motscles:index";
            jMessage::add(jLocale::get('categorie~motscles.update.alert.success'),'success');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
}

