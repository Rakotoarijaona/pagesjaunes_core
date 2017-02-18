<?php
/**
* @package      pagesjaunes_core
* @subpackage   front_office
* @author       R
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/

class searchheaderZone extends jZone
{
    protected $_tplname = 'front_office~searchheader.zone';

    protected function _prepareTpl()
    {
        $params = jApp::coord()->request->params;
        $search = (isset($params["s"])) ? explode(",", $params["s"]) : array();
        $this->_tpl->assign('search', $search);
    }
}