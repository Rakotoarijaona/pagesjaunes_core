<?php
/**
* @package   pagesjaunes_core
* @subpackage right
* @author    R
* @copyright 2017 R
* @license    All rights reserved
*/

class errorCtrl extends jController {
    
    function badright() {
    	$resp = $this->getResponse('html');
        $tpl = new jTpl();
    	$tpl->assign("SCRIPT", jZone::get('common~script'));
        $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        return $resp;
    }
}