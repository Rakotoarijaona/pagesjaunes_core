<?php
/**
* @package   pagesjaunes_core
* @subpackage dashboard
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

class dashboardCtrl extends jController {
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        if (jAcl2::check("dashboard.menu") && !jAcl2::check("dashboard.restrictall")) { //test jAcl
	        $tpl->assign("SCRIPT", jZone::get('common~script'));
	        $resp->body->assign('MAIN', $tpl->fetch('dashboard~index'));	
	    }       
        else { //else test jAcl            
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~welcome_page'));
        }
        $resp->body->assign('selectedMenuItem','dashboard');
        return $resp;
    }
}

