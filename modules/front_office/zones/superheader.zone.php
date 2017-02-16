<?php
/**
* @package      pagesjaunes_core
* @subpackage   front_office
* @author       R
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/

class superheaderZone extends jZone
{
    protected $_tplname = 'front_office~superheader.zone';

    protected function _prepareTpl()
    {
        $error = jApp::coord()->request->getParam('error');
        $this->_tpl->assign('error', $error);
    }
}