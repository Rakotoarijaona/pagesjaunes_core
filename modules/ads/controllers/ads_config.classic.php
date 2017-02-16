<?php
/**
* @package   pagesjaunes_core
* @subpackage ads
* @author    R
* @copyright R
* @license    All rights reserved
*/

jClasses::inc("ads~CAdsConfig");

class ads_configCtrl extends jController {
    /**
    *
    */
    public $pluginParams=array(
        'index' =>array('jacl2.right'=>'ads.list')
    );

    // page index
    public function index()
    {
        $resp = $this->getResponse('html');
        if (!jAcl2::check("ads.restrictall")) { //Test droit restrict all
            $tpl = new jTpl();
            $oAdsConfig = CAdsConfig::getConfig();
            $tpl->assign("oAdsConfig", $oAdsConfig);

            //Payment methods
            $tpl->assign("CASH", CASH);
            $tpl->assign("CHEQUE", CHEQUE);
            $tpl->assign("MOBILE", MOBILE);
            $tpl->assign("PAYPAL", PAYPAL);

            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('ads~ads_config'));
            $resp->body->assign('selectedMenuItem','ads');
            $resp->body->assign('selectedMenuChildItem','ads_config');
        } else {
            $resp = $this->getResponse('html');
            $tpl = new jTpl();
            $tpl->assign("SCRIPT", jZone::get('common~script'));
            $resp->body->assign('MAIN', $tpl->fetch('common~accessdenied'));
        }
        return $resp;
    }

    // Update config
    public function save_config()
    {
        $resp = $this->getResponse('redirect');

        $oAdsConfig = new CAdsConfig();
        $oAdsConfig->website_name           = $this->param('website_name','');
        $oAdsConfig->contact_mail           = $this->param('contact_mail','');
        $oAdsConfig->payment_methods        = $this->param('payment_methods',CASH);
        $oAdsConfig->edit_ads               = $this->param('edit_ads',0);
        $oAdsConfig->payment_after_moderate = $this->param('payment_after_moderate',0);
        $oAdsConfig->new_window             = $this->param('new_window',0);
        $oAdsConfig->upload_image           = $this->param('upload_image',0);
        $oAdsConfig->security_question      = $this->param('security_question',0);

        $oAdsConfig->update();

        jMessage::add(jLocale::get("ads~ads.config.update"), "success");
        $resp->action = "ads~ads_config:index";
        return $resp;
    }
}