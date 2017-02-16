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

    public $pluginParams = array('forgot_password'=>array('auth.required'=>false),
                                'index'=>array('auth.required'=>true));

    function index() {
        $resp = $this->getResponse('htmlauth');
        
        return $resp;
    }
    public function forgot_password() {
    	$resp = $this->getResponse('htmlforgotpassword');
        $resp->bodyTagAttributes = array('class' => 'gray-bg');
        return $resp;
        
    }
}