<?php
/**
* @package      pagesjaunes_core
* @subpackage   front_office
* @author       R
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/

jClasses::inc("ads~CAds");
jClasses::inc("ads~CAds_type");

class rightadsZone extends jZone
{
    protected $_tplname = 'front_office~rightads.zone';

    protected function _prepareTpl()
    {
        if (($this->param('listType','') == 'souscategorie') && (!empty ($this->param('souscategorie',''))))
        {
            $toListAds = CAds::getListBySouscategorie($this->param('souscategorie',''));
            $toAds = array();
            foreach ($toListAds as $oAds) {
                $type = CAds_type::getByid($oAds->type);
                $toAds[$type->format][] = $oAds;
            }
            $this->_tpl->assign('toAds', $toAds);  
            $toAdsDefault = array();
            $toAdsDefault['300x600'] = CAds::getDefault('300x600');
            $toAdsDefault['300x300'] = CAds::getDefault('300x300');
            $this->_tpl->assign('toAdsDefault', $toAdsDefault);    		
        }
        else
        {
            $toAdsDefault = array();
            $toAdsDefault['300x600'] = CAds::getDefault('300x600');
            $toAdsDefault['300x300'] = CAds::getDefault('300x300');
            $this->_tpl->assign('toAdsDefault', $toAdsDefault);
        }
    }
}