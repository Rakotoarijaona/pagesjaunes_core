<?php
/**
* @package   pagesjaunes_core
* @subpackage front_office
* @author    R
* @copyright R
* @license    All rights reserved
*/
jClasses::inc("common~CCommonTools");
jClasses::inc("ads~CAdsTracker");
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("ads~CAdsPurchase");

class adsCtrl extends jController {
    /**
    *
    */
    // tracker
    public function tracker()
    {
        $resp = $this->getResponse('redirect');
        $adId = $this->param('click', '');
        $isdefault = $this->param('default', '');
        $error = 0;
        $url = '';
        if (!empty($adId) && !empty($isdefault))
        {
            $ip = $_SERVER['REMOTE_ADDR'];
            $type = 1;
            $tracker = new CAdsTracker();
            $tracker->ads_id = $adId;
            $oAds;
            if ($isdefault == 0)
            {
                $oAds = CAdsPurchase::getById($adId);
                if (!empty($oAds))
                {
                    $url = $oAds->website_url;
                    if ($url == '')
                    {
                        $resp = $this->getResponse('redirect');
                        $resp->action = 'front_office~default:fiche_details';
                        $resp->params = array('entreprise' => $oAds->advertiser_id);
                    } else {
                        $resp = $this->getResponse('redirectUrl');
                        $resp->action = $url;
                    }
                    $tracker->insert();
                } else {
                    $error = 1;
                }
            } elseif ($isdefault == 0){
                $oAds = CAdsZoneDefault::getById($adId);
                if (!empty($oAds))
                {
                    $url = $oAds->link;
                    $resp = $this->getResponse('redirectUrl');
                    $resp->action = $url;
                    $tracker->insert();
                } else {
                    $error = 1;
                }
            } else {
                $error = 1;
            }
        }
        else {
            $error = 1;
        }

        if ($error == 1)
        {
            $resp = $this->getResponse('redirect');
            $resp->action = 'front_office~default:index';
        }
        return $resp;
    }
}