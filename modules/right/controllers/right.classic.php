<?php
/**
* @package   pagesjaunes_core
* @subpackage right
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/
jClasses::inc("right~CRight");
jClasses::inc("user~CUser");
jClasses::inc ("profile~CJacl2Group");
jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");

class rightCtrl extends jController {
    /**
    *
    */
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("right.list") && !jAcl2::check("right.restrictall")){// jAcl test
            if (($this->param('id_profile')) && ($this->param('id_profile') !="superadmin")){
                $zProfileLabel = $this->param ('id_profile');
                // Menu administration
                $oProfile = CJacl2Group::getGroupByCode ($zProfileLabel);
                if ($oProfile != null) {
                    $tpl->assign("oProfile", $oProfile);

                    $right = CRight::getRightsByGroups($zProfileLabel);
                    $tpl->assign("right", $right);
                }
            }
            // Control manager
            $toListProfile = CJacl2Group::getList();
            $tpl->assign('toListProfile', $toListProfile);
            $toListUser = CUser::getList();
            $tpl->assign('toListUser', $toListUser);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('right~index'));
        }    
        else {//else test jacl
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        
        $resp->body->assign('selectedMenuItem','profile');
        return $resp;
    }
    function update_right () {
        if (jAcl2::check("right.update") && !jAcl2::check("right.restrictall")){// jAcl test
            $resp = $this->getResponse ('redirect') ;
            $rights = $this->param('right');
            $group = $this->param('groupId');
            if ($group != 'superadmin')
            {
                CRight::updateRightsOnGroup ($group, $rights);
            }
            
            jMessage::add(jLocale::get("right~right.update.success"), "success");
            $resp->action = "right~right:index";
            $resp->params = array ('id_profile'=>$group);
        }   
        else {//else test jacl
            $resp = $this->getResponse('html');
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    /*
    Modal ajout Profile
    */
    function show_modal_add_profil()
    {
        $resp = $this->getResponse ('htmlfragment') ; 
        if (jAcl2::check("profile.create") && !jAcl2::check("profile.restrictall")) {
            $resp->tplname = 'profile~modal_add' ;
            $action = 'right~right:new_profile';
            $resp->tpl->assign ('action',$action);
        }
        return $resp ;
    }
    /*
    Create new Profile
    */
    function new_profile()
    {
        $resp = $this->getResponse('redirect') ;
        if (jAcl2::check("profile.create") && !jAcl2::check("profile.restrictall")) {
            $zProfileName = $this->param ('nom_profil');
            $zProfileId = CJacl2Group::createGroup($zProfileName);
        }
        $resp->action = "right~right:index";
        $resp->params = array ('id_profile'=>$zProfileId);
        return $resp;
    }
    /*
    Modal update Profile
    */
    function show_modal_update_profil()
    {
        $resp = $this->getResponse ('htmlfragment') ;
        if (jAcl2::check("profile.update") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            $oProfile = CJacl2Group::getGroupByCode($zProfileId);
            $resp->tplname = 'profile~modal_update' ;
            $resp->tpl->assign ('oProfile',$oProfile);
            $action = 'right~right:update_profile';
            $resp->tpl->assign ('action',$action);
        }
        return $resp ;
    }
    /*
    update Profile
    */
    function update_profile()
    {
        $resp = $this->getResponse('redirect') ;
        if (jAcl2::check("profile.update") && !jAcl2::check("profile.restrictall")) {            
            $zProfileId = $this->param ('id_profile');
            $name = $this->param ('nom_profil');
            CJacl2Group::updateGroup($zProfileId, $name);
        }
        $resp->action = "right~right:index";
        $resp->params = array ('id_profile'=>$zProfileId);
        return $resp;
    }
    /*
    Modal remove Profile
    */
    function show_modal_delete_profil()
    {
        $resp = $this->getResponse ('htmlfragment') ;
        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            $oProfile = CJacl2Group::getGroupByCode($zProfileId);
            $resp->tplname = 'profile~modal_delete' ;
            $resp->tpl->assign ('oProfile',$oProfile);
            $action = 'right~right:delete_profile';
            $resp->tpl->assign ('action',$action);
        }
        return $resp ;
    }
    /*
    remove Profile
    */
    function delete_profile()
    {
        $resp = $this->getResponse('redirect') ;
        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            $zProfileId = $this->param ('id_profile');
            CJacl2Group::removeGroup($zProfileId);
        }
        $resp->action = "profile~profile:index";
        return $resp;
    }
    /*
    Grouped action
    */
    function grouped_action_profil()
    {
        if (jAcl2::check("profile.delete") && !jAcl2::check("profile.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $groupProfil = $this->param ('groupProfil');        
            foreach ($groupProfil as $id) {
                $oProfile = CJacl2Group::getGroupByCode($id);
                if ($oProfile->hasUser() == 0)
                {
                    CJacl2Group::removeGroup($id);
                }
            }
            jMessage::add(jLocale::get("profile~profile.delete.group.success"), "success");
            $resp->action = "right~right:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    function grouped_action_user()
    {
        if (jAcl2::check("user.delete") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $oUser = new CUser ();
            //upload des fichiers
            /*$uploaddir = '/var/www/uploads/';
            $uploadTDRfile = $uploaddir . basename($_FILES['userfile']['name']);*/
            $resp->params = array () ;
           
            foreach ($this->param('groupUser') as $usr_login) {
                CUser::delete($usr_login);
            }
            jMessage::add(jLocale::get("user~user.delete.success"), "success");
            $resp->action = "right~right:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }
    /*
    Modal add user
    */
    function show_modal_add_user()
    {
        if (jAcl2::check("user.create") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('htmlfragment') ; 
            $resp->tplname = 'user~modal_add' ;
            $toListProfile = CJacl2Group::getList();
            $action = 'right~right:save_new_user';
            $resp->tpl->assign('action', $action);
            $resp->tpl->assign('toListProfile', $toListProfile);
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
    save a new user
    */
    function save_new_user()
    {
        $resp = $this->getResponse ('redirect') ;
        if (jAcl2::check("user.create") && !jAcl2::check("user.restrictall")) {
            $oUser = new CUser ();
            //upload des fichiers
            /*$uploaddir = '/var/www/uploads/';
            $uploadTDRfile = $uploaddir . basename($_FILES['userfile']['name']);*/
            $resp->params = array () ;

            $oUser->usr_login               = $this->param ('usr_login') ;
            $oUser->usr_name                = strtoupper($this->param ('name')) ;
            $oUser->usr_lastname            = $this->param ('lastname') ;
            $oUser->usr_email               = $this->param ('usr_email') ;
            $oUploader = new CPhotosUpload ('usr_photo') ;
            $uploadResults = $oUploader->doUpload () ;
            if (empty ($uploadResults ["errorcode"]))
            {
                $oUser->usr_photo           = $uploadResults ["filename"] ;
            }
            $oUser->usr_password            = $this->param ('usr_password') ;
            $oUser->usr_typeLabel            = $this->param ('usr_typeLabel') ;
            $oUser->create();
        }
        $resp->action = "right~right:index";
        $resp->params = array ('id_profile'=>$oUser->usr_typeLabel);
        return $resp;
    }
    /*
    Modal update User
    */
    function show_modal_update_user()
    {
        if (jAcl2::check("user.update") && !jAcl2::check("user.restrictall")) {
            $usr_login = $this->param ('usr_login');
            if ($usr_login != '' || $usr_login != null)
            {
                $resp = $this->getResponse ('htmlfragment') ;
                $oUser = CUser::getUserByLogin($usr_login);
                $resp->tplname = 'user~modal_update' ;
                $resp->tpl->assign ('oUser',$oUser);
                $oUserProfile = CUser::get_User_Group($usr_login);
                $resp->tpl->assign('oUserProfile', $oUserProfile);
                $toListProfile = CJacl2Group::getList();
                $resp->tpl->assign('toListProfile', $toListProfile);
                $action = 'right~right:update_user';
                $resp->tpl->assign ('action',$action);
                $resp->tpl->assign ('PHOTOS_FOLDER',PHOTOS_FOLDER);
                $resp->tpl->assign ('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
                return $resp ;
            }
            else
            {
                $resp = $this->getResponse('redirect') ;
                $resp->action = "user~user:index";
                return $resp ;
            }
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }        
    }
    /*
    Update user
    */
    function update_user()
    {
        $resp = $this->getResponse('redirect') ;
        if (jAcl2::check("user.update") && !jAcl2::check("user.restrictall")) {
            $oUser = CUser::getUserByLogin($this->param('usr_login'));
            if ($oUser != null) {
                $oUser->usr_name = $this->param('usr_name');
                $oUser->usr_lastname = $this->param('usr_lastname');
                $oUser->usr_email = $this->param('usr_email');
                $oUploader = new CPhotosUpload ('usr_photo') ;
                if ($_FILES['usr_photo'])
                {
                    $uploadResults = $oUploader->doUpload () ;
                    if (empty ($uploadResults ["errorcode"]))
                    {
                        $oUser->usr_photo = $uploadResults ["filename"] ;
                    }
                }
                if ($this->param('usr_password') != ''){
                    if ($this->param('usr_password') == $this->param('usr_password_confirm')){
                        $oUser->usr_password = $this->param('usr_password');
                    }
                }
                $oUser->usr_typeLabel = $this->param('usr_typeLabel');
                $oUser->update();
                $resp->action = "right~right:index";
                $resp->params = array ('id_profile'=>$oUser->usr_typeLabel);
            }
        }
        $resp->action = "right~right:index";
        return $resp;
    }
}

