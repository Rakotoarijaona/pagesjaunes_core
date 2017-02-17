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

class adminHtmlResponse extends jResponseHtml {

    public $bodyTpl = 'master_admin~main';

    function __construct() {

        parent::__construct();

        // header metas
        $this->addHeadContent('<meta charset="utf-8">');
        $this->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');

        // global paths
        $this->addJSCode('j_schemedomain = "'.CCommonTools::getDomainAndScheme().'"');
        $this->addJSCode('j_basepath = "'.jApp::config()->urlengine['basePath'].'"');

        // bootstrap and font
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/bootstrap.min.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/font-awesome/css/font-awesome.css');

        // Toastr style
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/toastr/toastr.min.css');

        //Gritter
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/gritter/jquery.gritter.css');

        //File upload
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css');
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/fileinput.css');

        //awesome-bootstrap-checkbox
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');

        //chosen
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/chosen/chosen.css');

        // select2
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/select2/dist/css/select2.min.css');

        // FooTable
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/footable/footable.core.css');

        // pickers
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/datapicker/datepicker3.css', array('rel' => 'stylesheet'));
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/ionRangeSlider/ion.rangeSlider.css', array('rel' => 'stylesheet'));
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css', array('rel' => 'stylesheet'));
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css', array('rel' => 'stylesheet'));
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/clockpicker/clockpicker.css', array('rel' => 'stylesheet'));
        $this->addCssLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/daterangepicker/daterangepicker-bs3.css', array('rel' => 'stylesheet'));

        // general
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/iCheck/custom.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/animate.css');
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/style.css');

        //image cropper
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/cropper/cropper.min.css');

        //steps
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/steps/jquery.steps.css');

        //tags input
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/jquery-tags-input/jquery.tagsinput.css');
    
        //tags input
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/js/plugins/r-video-upload/jquery.r-video-upload.css');
    
        // Sweet Alert
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/sweetalert/sweetalert.css');

        //awessome checkbox
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');

        //blueimp-gallery
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/plugins/blueimp/css/blueimp-gallery.min.css');

        // jquery ui
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/jquery-ui-1.10.3.css');

        // custom
        $this->addCSSLink(jApp::config()->urlengine['basePath'].'adminlibraries/css/custom.css');
    }

    protected function doAfterActions() {
        // Include all process in common for all actions, like the settings of the
        // main template, the settings of the response etc..
        $this->title .= ($this->title !=''?' - ':'').' Administration';
        $this->body->assignIfNone('selectedMenuItem','');
        $this->body->assignZone('MENU','master_admin~admin_menu', array('selectedMenuItem'=>$this->body->get('selectedMenuItem')));
        $this->body->assignZone('INFOBOX','master_admin~admin_infobox');
        $this->body->assignIfNone('MAIN','');
        $this->body->assignIfNone('adminTitle','');
        $this->body->assign('user', jAuth::getUserSession());

        $this->body->assignZone('NAV','common~nav', array('selectedMenuItem'=>$this->body->get('selectedMenuItem'), 'selectedMenuChildItem'=>$this->body->get('selectedMenuChildItem')));
        $this->body->assignZone('HEADER','common~header');

    }

}
