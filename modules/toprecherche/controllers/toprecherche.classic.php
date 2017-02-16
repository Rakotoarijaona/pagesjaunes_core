<?php
/**
* @package   pagesjaunes_core
* @subpackage toprecherche
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("entreprise~Entreprise");
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");
jClasses::inc("toprecherche~Toprecherche");
class toprechercheCtrl extends jController {
    public $pluginParams    =array(
        'index'                     =>array('jacl2.right'=>'topsrecherche.list'),
        'addTopRecherche'           =>array('jacl2.right'=>'topsrecherche.create'),
        'edition'                   =>array('jacl2.right'=>'topsrecherche.update'),
        'suppression'               =>array('jacl2.right'=>'topsrecherche.delete'),
        'deleteGroupTopRecherche'   =>array('jacl2.right'=>'topsrecherche.delete'),
        'getTopRechercheForm'       =>array('jacl2.right.and'=>array('topsrecherche.update','topsrecherche.create')),
    );
    /**
    *
    */
    function index() 
    {
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
            $resp = $this->getResponse('html');
            $toToprecherche = Toprecherche::getList();
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $tpl->assign('toToprecherche', $toToprecherche);
            $resp->body->assign('MAIN', $tpl->fetch('toprecherche~index'));
            $resp->body->assign('selectedMenuItem','toprecherche');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    function edition()
    {
    	$resp = $this->getResponse('html');
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
        	$selected = $this->param('id');
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
            $tpl->assign("selected", $selected);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('toprecherche~edition'));
            $resp->body->assign('selectedMenuItem','toprecherche');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }       
        return $resp;
    }
    function suppression()
    {
    	$resp = $this->getResponse('redirect');
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
        	$selected = $this->param('id');
            $oToprecherche = Toprecherche::getByid($selected);
            $oToprecherche->delete();
            jMessage::add(jLocale::get("toprecherche~toprecherche.delete.success"), "success");
            $resp->action = 'toprecherche~toprecherche:index';        
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }       
        return $resp;
    }
    function deleteGroupTopRecherche()
    {
    	$resp = $this->getResponse('redirect');
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
        	$topGroup = $this->param('topGroup');
        	foreach ($topGroup as $id) {    		
    	        $oToprecherche = Toprecherche::getByid($id);
    	        $oToprecherche->delete();
        	}
            $resp->action = "toprecherche~toprecherche:index";
            jMessage::add(jLocale::get("toprecherche~toprecherche.delete.success"), "success");
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        } 
        return $resp;
    }
    function getTopRechercheForm()
    {
    	$resp = $this->getResponse('htmlfragment');
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
        	$souscategorieId = $this->param('souscategorieId');
        	$toEntreprise = Entreprise::filterBySouscategorieNameDesc($souscategorieId);
        	$oToprecherche = Toprecherche::getBySouscategorieId($souscategorieId);
        	
        	$resp->tpl->assign('oToprecherche', $oToprecherche);
        	$resp->tpl->assign('toEntreprise', $toEntreprise);
        	$resp->tplname = 'toprecherche~toprecherche_form';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
    	return $resp;
    }
    function addTopRecherche()
    {
    	$resp = $this->getResponse('text');
        if (!jAcl2::check("topsrecherche.restrictall")) { //Test droit restrict all
        	if($this->param('souscategorieId') != '')
        	{
                if ($this->param('toprecherche1') != '')
                {
            		$oToprecherche = Toprecherche::checkIfExist($this->param('souscategorieId'));
            		if ($oToprecherche == '')
            		{
        	    		$oToprecherche = new Toprecherche();
        	    		$oToprecherche->souscategorie_id = $this->param('souscategorieId');
        		    	$oToprecherche->entreprise_id_top1 = $this->param('toprecherche1');
        		    	$oToprecherche->entreprise_id_top2 = $this->param('toprecherche2');
        		    	$oToprecherche->entreprise_id_top3 = $this->param('toprecherche3');
        	    		$oToprecherche->insert();
                        $resp->content = jLocale::get("toprecherche~toprecherche.add.success");
                        return $resp;
        	    	}
        	    	else
            		{
        	    		$oToprecherche->souscategorie_id = $this->param('souscategorieId');
        		    	$oToprecherche->entreprise_id_top1 = $this->param('toprecherche1');
        		    	$oToprecherche->entreprise_id_top2 = $this->param('toprecherche2');
        		    	$oToprecherche->entreprise_id_top3 = $this->param('toprecherche3');
        	    		$oToprecherche->update();
                        $resp->content = jLocale::get("toprecherche~toprecherche.add.success");
                        return $resp;
        	    	}
                }
                else
                {
                    $resp->content = jLocale::get("toprecherche~toprecherche.toprecherche1.vide");
                    return $resp;
                }
        	}
            else
            {
                $resp->content = jLocale::get("toprecherche~toprecherche.aucun.souscategorie");
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
}

