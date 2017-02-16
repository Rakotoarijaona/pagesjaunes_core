<?php
/**
* @package   pagesjaunes_core
* @subpackage front_office
* @author    R
* @copyright 2016 
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

class fiche_detailsCtrl extends jController {
    /**
    *
    */
    function index() {
        $resp = $this->getResponse('html');
        $tpl = new jTpl();
        $resp->body->assign('MAIN', $tpl->fetch('front_office~fiche_details'));
        return $resp;
    }
}

