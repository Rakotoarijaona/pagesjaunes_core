<?php
/**
* @package      pagesjaunes_core
* @subpackage   front_office
* @author       R
* @copyright    2016
* @link         http://www.yourwebsite.undefined
* @license      All rights reserved
*/
jClasses::inc("categorie~categorie");
jClasses::inc("categorie~souscategorie");
class header_submenuZone extends jZone
{
    protected $_tplname = 'front_office~header_submenu.zone';

    protected function _prepareTpl()
    {
		$toListCategorie = array();
        $toList = Categorie::getList();
        $i = 0;
        foreach ($toList as $categorie) {
            $toListCategorie[$i]['categorie'] = $categorie;
            $toListCategorie[$i]['souscategorie'] = $categorie->getChild();
            $i+=1;
        }
        $this->_tpl->assign("toListCategorie", $toListCategorie);
    }
}