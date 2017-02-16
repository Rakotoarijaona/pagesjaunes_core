<?php
/**
* @package      rdextranet_core
* @subpackage   
* @author       your name
* @copyright    
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/

require_once(jApp::appPath().'response/jResponseNoheader.php');

class noheaderHtmlResponse extends jResponseNoheader
{
    function __construct ()
    {
        parent::__construct();
    }

    protected function doAfterActions()
    {
    }
}