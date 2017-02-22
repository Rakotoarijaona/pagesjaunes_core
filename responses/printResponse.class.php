<?php
/**
* @package      pagesjaunes
* @subpackage   
* @author       your name
* @copyright    
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/

require_once(jApp::appPath().'response/jResponseNoheader.php');

class printResponse extends jResponseNoheader
{
	public $bodyTpl = 'front_office~print';
    function __construct ()
    {
        parent::__construct();
    }

    protected function doAfterActions()
    {
        $this->body->assignIfNone('CONTENT','<p>no content</p>');
    }
}