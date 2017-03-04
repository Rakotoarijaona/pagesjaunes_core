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
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("ads~CAdsPurchase");
jClasses::inc("ads~CAds_type");

class rightadsZone extends jZone
{
    protected $_tplname = 'front_office~rightads.zone';

    protected function _prepareTpl()
    {
        // Recherche par sous catégorie
        $listType = $this->param('listType','');
        $souscategorie = $this->param('souscategorie','');
        if (($listType == 'souscategorie') && !empty($souscategorie))
        {
            $souscategorieId = $this->param('souscategorie');

            $toListAds = array();

            // liste ads skyscraper
            $toRes = CAdsPurchase::getBySouscategorieFiltered($souscategorieId, 1);
            $bottom_target      = array();
            $bottom_standard    = array();

            if (!empty($toRes)) {
                $bottom_target      = $toRes;
            } else {
                $bottom_target      = CAdsZoneDefault::getByZoneFiltered(1);
            }

            // Liste ads carré
            $toRes = CAdsPurchase::getBySouscategorieFiltered($souscategorieId, 2);
            if (!empty($toRes)) {
                $bottom_standard    = $toRes;
            } else {
                $bottom_standard    = CAdsZoneDefault::getByZoneFiltered(2);
            }

            $this->_tpl->assign('bottom_target', $bottom_target);

            $this->_tpl->assign('bottom_standard', $bottom_standard);

        // Recherche simple
        $toResult = $this->param('toResult','');
        } elseif (($listType == 'search') && (!empty($toResult))) {
            
            $toResult = $this->param('toResult','');
            $bottom_target      = array();
            $bottom_standard    = array();

            foreach ($toResult as $res) {
                // liste ads skyscraper
                $toRes =  CAdsPurchase::getByIdAdvertiserFiltered($res->id, 1);
                if (!empty($toRes))
                {
                    $bottom_target = $toRes;
                }

                // Liste ads carré
                $toRes =  CAdsPurchase::getByIdAdvertiserFiltered($res->id, 2);
                if (!empty($toRes))
                {
                    $bottom_standard = $toRes;
                }
            }

            if (empty($bottom_target)) {
                $bottom_target      = CAdsZoneDefault::getByZoneFiltered(1);
            }

            if (empty($bottom_standard)) {
                $bottom_standard    = CAdsZoneDefault::getByZoneFiltered(2);
            }

            $this->_tpl->assign('bottom_target', $bottom_target);

            $this->_tpl->assign('bottom_standard', $bottom_standard);

        } else {

            $bottom_target      = array();
            $bottom_standard    = array();

            // liste ads skyscraper par défaut
            $bottom_target      = CAdsZoneDefault::getByZoneFiltered(1);

            // Liste ads carré par défaut
            $bottom_standard    = CAdsZoneDefault::getByZoneFiltered(2);

            $this->_tpl->assign('bottom_target', $bottom_target);

            $this->_tpl->assign('bottom_standard', $bottom_standard);
        }
    }
}