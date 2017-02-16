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

        $search_one = (isset($params["search_one"])) ? $params["search_one"] : "";
        $search_two = (isset($params["search_two"])) ? $params["search_two"] : "";
        $search_three = (isset($params["search_three"])) ? $params["search_three"] : "";

        $this->_tpl->assign('search_one', $search_one);
        $this->_tpl->assign('search_two', $search_two);
        $this->_tpl->assign('search_three', $search_three);
    }
}