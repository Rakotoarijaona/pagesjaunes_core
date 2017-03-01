<?php
/**
* @package      pagesjaunes_core
* @subpackage   front_office
* @author       R
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/
jClasses::inc("categorie~CCategorie");
jClasses::inc("categorie~CSouscategorie");
class header_submenuZone extends jZone
{
    protected $_tplname = 'front_office~header_submenu.zone';

    protected function _prepareTpl()
    {
		$toListCategorie = array();
        $toList = CCategorie::getList(1);
        $i = 0;
        foreach ($toList as $categorie) {
            $toChild    = $categorie->getChild(1);
            if (sizeof($toChild) > 0)
            {                
                $toListCategorie[$i]['categorie'] = $categorie;
                $toListCategorie[$i]['souscategorie'] = $toChild ;
                $i+=1;
            }
        }
        $this->_tpl->assign("toListCategorie", $toListCategorie);
    }
}