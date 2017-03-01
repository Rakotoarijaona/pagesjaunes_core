<?php
/**
* @package   pagesjaunes_core
* @subpackage pages
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc("pages~CPages");
jClasses::inc("common~CCommonTools");

class pagesCtrl extends jController {

    public $pluginParams=array(
        'index'             =>array('jacl2.right'=>'pages.list'),
        'edition'           =>array('jacl2.right'=>'pages.update'),
        'ajout'             =>array('jacl2.right'=>'pages.create'),
        'save_add'          =>array('jacl2.right'=>'pages.create'),
        'save_update'       =>array('jacl2.right'=>'pages.update'),
        'delete'            =>array('jacl2.right'=>'pages.delete'),
        'save_delete'       =>array('jacl2.right'=>'pages.delete'),
        'delete_group'      =>array('jacl2.right'=>'pages.delete'),
        'save_delete_group' =>array('jacl2.right'=>'pages.delete')
    );


    function index() {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            
            $toPages = CPages::getList();

            $tpl->assign("toPages", $toPages);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('pages~index'));
            $resp->body->assign('selectedMenuItem','pages');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function ajout() {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();        

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('pages~ajout'));
            $resp->body->assign('selectedMenuItem','pages');
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function save_add() 
    {
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if (($this->param('title') != ''))
            {
                $oPages = new CPages();
                $oPages->name = $this->param('name');
                $oPages->label = CCommonTools::generateAlias($this->param('name'));
                if (CPages::ifNameExist($oPages->label) == 0)
                {
                    $oPages->title = $this->param('title');
                    $oPages->content = $this->param('pagescontent');
                    $oPages->is_publie = $this->param('ispublie');
                    $oPages->meta_title = $this->param('titleseo');
                    $oPages->meta_description = $this->param('metadescription');
                    $oPages->has_pub = $this->param('has_pub');

                    $resp = $this->getResponse('redirect');
                    $oPages->insert();
                    jMessage::add(jLocale::get("pages~pages.add.success"), "success");
                }
                else
                {                
                    jMessage::add(jLocale::get("pages~pages.name.exist"), "danger");
                }            
            }
            else
            {             
                jMessage::add(jLocale::get("pages~pages.error"), "danger");
            }
            $resp = $this->getResponse ('redirect');
            $resp->action = 'pages~pages:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    function edition() {
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '') {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $id = $this->param('id');
                $oPages = CPages::getById($id);

                $tpl->assign("oPages", $oPages);
                CCommonTools::assignDefinedConstants($tpl);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('pages~edition'));
                $resp->body->assign('selectedMenuItem','pages');
            } else {
                $resp = $this->getResponse ('redirect');
                $resp->action = 'pages~pages:index';
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

    function save_update() {
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                $id = $this->param('id');
                $oPages = CPages::getById($id);
                $oPages->name = $this->param('name');
                $oPages->title = $this->param('title');
                $oPages->label = CCommonTools::generateAlias($this->param('name'));
                if (CPages::ifUpdateNameExist($id, $oPages->label) == 0)
                {
                    $oPages->content = $this->param('pagescontent');
                    $oPages->is_publie = $this->param('ispublie');
                    $oPages->meta_title = $this->param('titleseo');
                    $oPages->meta_description = $this->param('metadescription');
                    $oPages->has_pub = $this->param('has_pub');
                    $oPages->update();
                    jMessage::add(jLocale::get("pages~pages.update.success"), "success");
                }
                else
                {
                    jMessage::add(jLocale::get("pages~pages.name.exist"), "danger");
                }            
            }
            else
            {             
                jMessage::add(jLocale::get("pages~pages.error"), "danger");
            }

            $resp = $this->getResponse ('redirect');
            $resp->action = 'pages~pages:index';
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    //Suppréssion    
    function delete() 
    {    
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $oPages = CPages::getByid($this->param('id'));
                $tpl->assign("oPages", $oPages);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('pages~delete'));
                $resp->body->assign('selectedMenuItem','pages');
            }
            else
            {
                $resp = $this->getResponse('redirect');
                $resp->action = "pages~pages:list";
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

    function save_delete() 
    {          
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                $oPages = CPages::getByid($this->param('id'));
                $oPages->delete();
                $resp->action = "pages~pages:index";
                jMessage::add(jLocale::get("pages~pages.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("pages~pages.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "pages~pages:index";
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


    function delete_group()
    {
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('check') != '')
            {
                $resp = $this->getResponse('html');
                $tpl = new jTpl();
                $toListAds = array();
                foreach ($this->param('check') as $id) {                
                    $oListPages = CPages::getByid($id);
                    $toListPages[] = $oListPages;
                }
                $tpl->assign("toListPages", $toListPages);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->body->assign('MAIN', $tpl->fetch('pages~delete_group'));
                $resp->body->assign('selectedMenuItem','pages');
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
    
    function save_delete_group()
    {
        if (!jAcl2::check("pages.restrictall")) { //Test droit restrict all
            if ($this->param('id') != '')
            {
                $resp = $this->getResponse('redirect');
                foreach ($this->param('id') as $id) {
                    $oPages = CPages::getByid($id);
                    $oPages->delete();
                }
                
                $resp->action = "pages~pages:index";
                jMessage::add(jLocale::get("pages~pages.delete.success"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("pages~pages.error"), "danger");
                $resp = $this->getResponse('redirect');
                $resp->action = "ads~ads:index";
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

    //insert ads Test Doublons
    function insertNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name);
        $valid = "true";
        if (CPages::ifNameExist($namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update ads Test Doublons
    function updateNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name);
        $valid = "true";
        if (CPages::ifUpdateNameExist($id, $namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}