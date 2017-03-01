<?php
/**
* @package   pagesjaunes_core
* @subpackage profile
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc ("profile~CJacl2Group");

class profileCtrl extends jController {

    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("profile.list") && jAcl2::check("profile.menu") && !jAcl2::check("profile.restrictall")){
            $toList = array ();
            $toList = CJacl2Group::getList();
            $tpl->assign('toList', $toList);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('profile~index'));
        }
        else {
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        $resp->body->assign('selectedMenuItem','profile');
        return $resp;
    }

    /*
    Modal ajout Profile
    */
    function show_modal_add()
    {
        if (jAcl2::check("profile.create") && !jAcl2::check("profile.restrictall")) {
            $resp = $this->getResponse ('htmlfragment') ; 
            $resp->tplname = 'profile~modal_add' ;
            $action = 'profile~profile:new_profile';
            $resp->tpl->assign ('action',$action);
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp ;
    }
    /*
    Create new Profile
    */
    function new_profile()
    {
        $resp = $this->getResponse('htmlfragment') ;
        
        if (jAcl2::check("profile.create") && !jAcl2::check("profile.restrictall")) {
            $zProfileName = $this->param ('nom_profil');
            $zProfileId = CJacl2Group::createGroup($zProfileName);
        }

        $toList = array ();
        $toList = CJacl2Group::getList();
        $resp->tplname = 'profile~list_profile';
        $resp->tpl->assign('toList', $toList);       
        return $resp;
    }
    /*
    Modal remove Profile
    */
    function show_modal_delete()
    {
        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            $resp = $this->getResponse ('htmlfragment') ;
            $zProfileId = $this->param ('id_profile');
            $oProfile = CJacl2Group::getGroupByCode($zProfileId);
            $resp->tplname = 'profile~modal_delete' ;
            $resp->tpl->assign ('oProfile',$oProfile);
            $action = 'profile~profile:delete_profile';
            $resp->tpl->assign ('action',$action);
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp ;
    }
    /*
    remove Profile
    */
    function delete_profile()
    {
        $resp = $this->getResponse('htmlfragment') ;
        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            CJacl2Group::removeGroup($zProfileId);
        }
        $toList = array ();
        $toList = CJacl2Group::getList();
        $resp->tplname = 'profile~list_profile';
        $resp->tpl->assign('toList', $toList); 
        
        return $resp;
    }
    /*
    Modal update Profile
    */
    function show_modal_update()
    {
        $resp = $this->getResponse ('htmlfragment') ;
        if (jAcl2::check("profile.update") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            $oProfile = CJacl2Group::getGroupByCode($zProfileId);
            $resp->tplname = 'profile~modal_update' ;
            $resp->tpl->assign ('oProfile',$oProfile);
            $action = 'profile~profile:update_profile';
            $resp->tpl->assign ('action',$action);
        }
        return $resp ;
    }
    /*
    update Profile
    */
    function update_profile()
    {
        $resp = $this->getResponse('htmlfragment') ;
        if (jAcl2::check("profile.update") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            $name = $this->param ('nom_profil');
            CJacl2Group::updateGroup($zProfileId, $name);
        }
        $toList = array ();
        $toList = CJacl2Group::getList();
        $resp->tplname = 'profile~list_profile';
        $resp->tpl->assign('toList', $toList); 
        
        return $resp;
    }
    /* 
    Action groupés
    */
    function delete_profil_group()
    {
        $resp = $this->getResponse('htmlfragment') ;
        $groupProfil = $this->param ('groupProfil');

        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            foreach ($groupProfil as $id) {
                $oProfile = CJacl2Group::getGroupByCode($id);
                if ($oProfile->hasUser() == 0)
                {
                    CJacl2Group::removeGroup($id);
                }
            }
        }

        $toList = array ();
        $toList = CJacl2Group::getList();
        $resp->tplname = 'profile~list_profile';
        $resp->tpl->assign('toList', $toList);

        return $resp;
    }

    //insert Test Doublons
    function insertNameExist ()
    {
        $resp = $this->getResponse('text');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias ($name,'_');
        $valid = "true";
        if (CJacl2Group::ifNameExist($namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update Test Doublons
    function updateNameExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $name = $this->param('name');
        $namealias = CCommonTools::generateAlias($name,'_');
        $valid = "true";
        if (CJacl2Group::ifUpdateNameExist($id, $namealias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}

