<?php
/**
* @package   pagesjaunes_core
* @subpackage 
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

jClasses::inc("common~CCommonTools");

require_once (JELIX_LIB_CORE_PATH.'response/jResponseHtml.class.php');

class adminLoginHtmlResponse extends jResponseHtml {

    function __construct() {

        parent::__construct();

        // body class
        $this->bodyTagAttributes = array('class' => 'gray-bg');

        // header metas
        $this->addHeadContent('<meta charset="utf-8">');
        $this->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');

        // global paths
        $this->addJSCode('j_schemedomain = "'.CCommonTools::getDomainAndScheme().'"');
        $this->addJSCode('j_basepath = "'.jApp::config()->urlengine['basePath'].'"');

        // styles
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/bootstrap.min.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/font-awesome/css/font-awesome.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/iCheck/custom.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/animate.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/style.css');
    }

    protected function doAfterActions() {
        $this->bodyTpl = 'master_admin~index_login';
        // Include all process in common for all actions, like the settings of the
        // main template, the settings of the response etc..
       $this->title .= ($this->title !=''?' - ':'').'Administration';
       $this->body->assignIfNone('MAIN','');
    }
}
