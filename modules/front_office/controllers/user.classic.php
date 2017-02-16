<?php
/**
* @package   rdextranet_core
* @subpackage rdextranet_core
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

class userCtrl  extends jController
{
    public $pluginParams = array(
        '*' => array('auth.required' => false)
    );

    // login
    function in() {

        $resp = $this->getResponse('redirect');
        $login = $this->param("lg", null, true);
        $password = $this->param("ps", null, true);

        $error = 0;

        $success = jAuth::login($login, $password);

        if ($success) {

            // connected user
            $connectedUser = (jAuth::isConnected()) ? jAuth::getUserSession() : jDao::createRecord('entreprise~entreprise');

            if ($connectedUser->editer_front_active == 1) {
                $resp->action = 'front_office~default:edition';
            } else {
                jAuth::logout();
                $resp->action = 'front_office~default:index';
            }

        } else {

            $resp->action = 'front_office~default:index';
            $error = 2;

        }

        if ($error > 0) {
            $resp->params = array("error" => $error);
        }

        return $resp;

    }

    // logout
    function out() {
        jAuth::logout();
        $resp = $this->getResponse('redirect');
        $resp->action = 'front_office~default:index';
        $resp->params = array();
        return $resp;
    }
}