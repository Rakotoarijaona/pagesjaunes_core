<?php
/**
* @package   pagesjaunes_core
* @subpackage 
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/


require_once (JELIX_LIB_CORE_PATH.'response/jResponseHtml.class.php');

class myHtmlResponse extends jResponseHtml {

    public $bodyTpl = 'front_office~main';

    function __construct($attributes = array ()) {

        parent::__construct($attributes);

        // global paths
        $this->addJSCode('j_schemedomain = "'.CCommonTools::getDomainAndScheme().'"');
        $this->addJSCode('j_basepath = "'.jApp::config()->urlengine['basePath'].'"');

        // Include your common CSS and JS files here
        $this->addHeadContent('<meta charset="utf-8">');
        $this->addHeadContent('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
        $this->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        $this->addHeadContent('<link rel="icon" type="image/png" href="'.jApp::config()->urlengine['basePath'].'/favicon.png" />');

        // styles and font
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/font-awesome.min.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/bootstrap.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/bootstrap-select.min.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/owl.carousel.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/owl.theme.default.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/jquery.fancybox.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/styles-old.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/styles_pagesjaunes.css');
        //File upload
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css');
        //$this->addCssLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/fileinput.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/stylesheets/sweetalert/sweetalert.css');
        $this->body->bodyTagAttributes = array('class'=>'skin-2');

        // select2
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'frontlibraries/javascripts/select2/dist/css/select2.min.css');
    }

    protected function doAfterActions() {
        // Include all process in common for all actions, like the settings of the
        // main template, the settings of the response etc..
        $this->title = (!empty($this->title) ? $this->title . ' - ' : '') . 'Pages jaunes Madagascar';
        $this->body->assignZone('SUPER_HEADER','front_office~superheader');
        $this->body->assignZone('SEARCH_HEADER','front_office~searchheader');
        $this->body->assignZone('HEADER_SUBMENU','front_office~header_submenu');
        $this->body->assignZone('FOOTER','front_office~footer');
        $this->body->assignIfNone('MAIN','<p>no content</p>');
    }
}
