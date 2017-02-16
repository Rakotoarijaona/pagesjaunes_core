<?php
/**
* @package   pagesjaunes_core
* @subpackage user
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("user~CUser");
jClasses::inc("profile~CJacl2Group");
jClasses::inc("common~CCommonTools");
jClasses::inc("common~CPhotosUpload");

class userCtrl extends jController {
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("user.list") && jAcl2::check("user.menu") && !jAcl2::check("user.restrictall")){
            $toList = User::getList();
            $tpl->assign('toList', $toList);
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $tpl->assign('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
            $resp->body->assign('MAIN', $tpl->fetch('user~index'));
        }    
        else {
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        $resp->body->assign('selectedMenuItem','user');
        return $resp;
    }
    function ajout()
    {
        if (jAcl2::check("user.create") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('html') ; 
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $toListProfile = CJacl2Group::getList();
            $tpl->assign('toListProfile', $toListProfile);
            $resp->body->assign('MAIN', $tpl->fetch('user~add_form'));
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }

        $resp->body->assign('selectedMenuItem','user');
        return $resp ;
    }
    /*
    save a new user
    */
    function save_ajout()
    {
        if (jAcl2::check("user.create") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $oUser = new User ();
            //upload des fichiers
            /*$uploaddir = '/var/www/uploads/';
            $uploadTDRfile = $uploaddir . basename($_FILES['userfile']['name']);*/
            $resp->params = array () ;

            if (($this->param('usr_login')!='')&&($this->param('usr_email'))&&($this->param('usr_password')!='')&&($this->param('usr_typeLabel')!=''))
            {
                $oUser->usr_login               = $this->param ('usr_login') ;
                $oUser->usr_name                = strtoupper($this->param ('name')) ;
                $oUser->usr_lastname            = $this->param ('lastname') ;
                $oUser->usr_email               = $this->param ('usr_email') ;
                $loginalias = CCommonTools::generateAlias ($oUser->usr_login);
                $oUser->usr_loginalias = $loginalias;
                if ((User::ifEmailExist($oUser->usr_email) == 0) && (User::ifLoginExist($loginalias) == 0))
                {
                    $oUploader = new CPhotosUpload ('usr_photo') ;
                    $uploadResults = $oUploader->doUpload () ;
                    if (empty ($uploadResults ["errorcode"]))
                    {
                        $oUser->usr_photo           = $uploadResults ["filename"] ;
                    }
                    $oUser->usr_password            = $this->param ('usr_password') ;
                    $oUser->usr_typeLabel            = $this->param ('usr_typeLabel') ;
                    $oUser->create();
                    jMessage::add(jLocale::get("user~user.add.success"), "success");
                }
                else
                {
                    jMessage::add(jLocale::get("user~user.exist"), "danger");
                }
                
            }
            else
            {
                jMessage::add(jLocale::get("user~user.error"), "danger");
            }
            $resp->action = "user~user:index";
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
    Grouped action
    */
    function grouped_action()
    {
        if (jAcl2::check("user.delete") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $action = $this->param('actionGroup');
            if (sizeof($this->param('checked'))>0 && $action=='delete') {
                foreach ($this->param('checked') as $user)
                {
                    User::delete($user);
                    jMessage::add(jLocale::get("user~user.delete.success"), "success");
                }
            }
            $resp->action = "user~user:index";
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
    Modal update User
    */
    function edition()
    {
        if (jAcl2::check("user.update") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('html') ; 
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));

            $usr_login = $this->param ('usr_login');
            $oUser = User::getUserByLogin($usr_login);
            $tpl->assign ('oUser',$oUser);
            $oUserProfile = User::get_User_Group($usr_login);
            $tpl->assign('oUserProfile', $oUserProfile);
            $toListProfile = CJacl2Group::getList();
            $tpl->assign('toListProfile', $toListProfile);
            $tpl->assign ('PHOTOS_FOLDER',PHOTOS_FOLDER);
            $tpl->assign ('PHOTOS_THUMBNAIL_FOLDER',PHOTOS_THUMBNAIL_FOLDER);
            $resp->body->assign('MAIN', $tpl->fetch('user~update.form'));
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }

        $resp->body->assign('selectedMenuItem','user');
        return $resp ;
    }
    /*
    Update user
    */
    function save_edition()
    {
        $resp = $this->getResponse('redirect') ;

        if (jAcl2::check("user.update") && !jAcl2::check("user.restrictall")) {
            $oUser = User::getUserByLogin($this->param('usr_login'));
            if ($oUser != null) {
                if (($this->param('new_usr_login')!='')&&($this->param('usr_email'))&&($this->param('usr_typeLabel')!=''))
                {
                    $oUser->usr_login = $this->param('new_usr_login');
                    $oUser->usr_name = $this->param('usr_name');
                    $oUser->usr_lastname = $this->param('usr_lastname');
                    $oUser->usr_email = $this->param('usr_email');
                    $loginalias = CCommonTools::generateAlias($oUser->usr_login);
                    $oUser->usr_loginalias = $loginalias;
                    if ((User::ifUpdateLoginExist($oUser->usr_id, $loginalias) == 0) && (User::ifUpdateEmailExist($oUser->usr_id, $oUser->usr_email) == 0))
                    {
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
                        $oUser->update($this->param('usr_login'));
                        jMessage::add(jLocale::get("user~user.update.success"), "success");
                    }
                }
            }
            $resp->action = "user~user:index";
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
    delete
    */
    function delete_user()
    {
        if (jAcl2::check("user.delete") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $oUser = new User ();
            //upload des fichiers
            /*$uploaddir = '/var/www/uploads/';
            $uploadTDRfile = $uploaddir . basename($_FILES['userfile']['name']);*/
            $resp->params = array () ;

            if (($this->param('usr_login')!=''))
            {
                User::delete($this->param('usr_login'));
                jMessage::add(jLocale::get("user~user.delete.success"), "success");
            }
            $resp->action = "user~user:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }/*
    delete
    */
    function delete_user_group()
    {
        if (jAcl2::check("user.delete") && !jAcl2::check("user.restrictall")) {
            $resp = $this->getResponse ('redirect') ;
            $oUser = new User ();
            //upload des fichiers
            /*$uploaddir = '/var/www/uploads/';
            $uploadTDRfile = $uploaddir . basename($_FILES['userfile']['name']);*/
            $resp->params = array () ;
           
            foreach ($this->param('groupUser') as $usr_login) {
                User::delete($usr_login);
                jMessage::add(jLocale::get("user~user.delete.success"), "success");
            }
            $resp->action = "user~user:index";
        }
        else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    //insert Test Doublons
    function insertLoginExist ()
    {
        $resp = $this->getResponse('text');
        $login = $this->param('login');
        $loginalias = CCommonTools::generateAlias ($login);
        $valid = "true";
        if (User::ifLoginExist($loginalias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //update Test Doublons
    function updateLoginExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $login = $this->param('login');
        $loginalias = CCommonTools::generateAlias($login);
        $valid = "true";
        if (User::ifUpdateLoginExist($id, $loginalias) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
    //Test insert email doublons
    function insertEmailExist()
    {
        $resp = $this->getResponse('text');
        $email = $this->param('email');
        $valid = "true";
        if (User::ifEmailExist($email) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;

    }
    //update Test Doublons
    function updateEmailExist ()
    {
        $resp = $this->getResponse('text');
        $id = $this->param('id');
        $email = $this->param('email');
        $valid = "true";
        if (User::ifUpdateEmailExist($id, $email) == 1)
        {
            $valid = "false";
        }
        $resp->content = $valid;
        return $resp;
    }
}

