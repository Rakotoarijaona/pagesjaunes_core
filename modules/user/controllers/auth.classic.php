<?php
/**
* @package   pagesjaunes_core
* @subpackage user
* @author    R
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("user~CUser");
jClasses::inc("common~CCommonTools");

class authCtrl extends jController {

    public $pluginParams = array(  
                    'forgot_password'=>array('auth.required'=>false),
                    'reset_password'=>array('auth.required'=>false),
                    'send_email'=>array('auth.required'=>false),
                    'save_new_password'=>array('auth.required'=>false),
                    'index'=>array('auth.required'=>false));

    public function index()
    {
        $resp = $this->getResponse('htmlauth');

        return $resp;
    }

    // Mot de passe oublié
    public function forgot_password()
    {
    	$resp = $this->getResponse('htmlforgotpassword');
        $tpl = new jTpl();
        $resp->bodyTagAttributes = array('class' => 'gray-bg');
        $resp->body->assign('MAIN', $tpl->fetch('user~forgot_password_send_email_form'));
        return $resp;
        
    }

    // envoi de mail
    public function send_email()
    {
        $resp = $this->getResponse('redirect');
        $email = $this->param('email', '');
        if (!empty($email))
        {
            $cnx = jDb::getConnection();
            $query = "
                        SELECT * FROM ".$cnx->prefixTable ('jlx_user')." WHERE usr_email = '".$email."'
                    ";
            $res = $cnx->query($query);
            $row = $res->fetch();
            if (!empty($row) && !empty($row->usr_id))
            {
                $user = CUser::getUserByLogin($row->usr_login);
                $user->createToken();
                jMessage::add(jLocale::get("user~user.password.confirm.email.send"), "success");
            }
            else
            {
                jMessage::add(jLocale::get("user~user.password.confirm.email.not.valid"), "danger");
            }
        }
        else
        {
            jMessage::add(jLocale::get("user~user.password.confirm.email.not.valid"), "danger");
        }
        $resp->action = 'jauth~login:form';
        return $resp;
    }

    // form réinitialisation de mot de passe
    public function reset_password()
    {
        $token = $this->param('token', '');
        if (!empty($token))
        {
            $cnx = jDb::getConnection();
            $query = "
                        SELECT * FROM ".$cnx->prefixTable ('jlx_user')." 
                        WHERE usr_token = '".$token."'
                        AND usr_date_token > DATE_SUB(NOW(),INTERVAL 1 DAY)
                    ";
            $res = $cnx->query($query);
            $row = $res->fetch();
            if (!empty($row) && !empty($row->usr_id))
            {
                $user = CUser::getUserByLogin($row->usr_login);

                $resp = $this->getResponse('htmlforgotpassword');
                $tpl = new jTpl();
                $tpl->assign('token', $token);
                $tpl->assign("SCRIPT", jZone::get('common~script'));
                $resp->bodyTagAttributes = array('class' => 'gray-bg');
                $resp->body->assign('MAIN', $tpl->fetch('user~forgot_password_reset_form'));
                return $resp;
            }
            else
            {
                jMessage::add(jLocale::get("user~user.link.not.valid"), "danger");
            }
        }
        else
        {
            jMessage::add(jLocale::get("user~user.access.denied"), "danger");
        }
        $resp = $this->getResponse('redirect');
        $resp->action = 'jauth~login:form';
        return $resp;
    }

    // Réinitialisation de mot de passe
    public function save_new_password()
    {
        $resp = $this->getResponse('redirect');
        $password = $this->param('password', '');
        $confirm_password = $this->param('confirm_password', '');
        $token = $this->param('token', '');
        if (!empty($password) && !empty($confirm_password) && !empty($token))
        {
            if ($password == $confirm_password)
            {
                $cnx = jDb::getConnection();
                $query = "
                            SELECT * FROM ".$cnx->prefixTable ('jlx_user')." 
                            WHERE usr_token = '".$token."'
                            AND usr_date_token > DATE_SUB(NOW(),INTERVAL 1 DAY)
                        ";
                $res = $cnx->query($query);
                $row = $res->fetch();
                if (!empty($row) && !empty($row->usr_id))
                {
                    jAuth::changePassword($row->usr_login, $password);
                    CUser::destroyToken($row->usr_login);
                    jMessage::add(jLocale::get("user~user.password.update"), "success");
                    $resp = $this->getResponse('redirect');
                    $resp->action = 'jauth~login:form';
                    return $resp;
                }
                else
                {
                    jMessage::add(jLocale::get("user~user.access.denied"), "danger");
                    $resp = $this->getResponse('redirect');
                    $resp->action = 'jauth~login:form';
                    return $resp;
                }
            }
            else
            {
                jMessage::add(jLocale::get("user~user.password.reset.input.not.valid"), "danger");
            }
        }
        else
        {
            jMessage::add(jLocale::get("user~user.password.reset.input.empty"), "danger");
        }
        $resp = $this->getResponse('redirect');
        $resp->action = 'user~auth:reset_password';
        $resp->params = array('token'=>$token);
        return $resp;
    }
}