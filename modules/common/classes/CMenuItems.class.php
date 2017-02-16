<?php
/**
* @package   pagesjaunes
* @subpackage common
* @author    R
* @copyright 2016
*/

class CMenuItems
{
    public $zMenuId = '';
    public $zMenuParentId = '';
    public $zMenuLabel = '';
    public $zMenuIcon = '';
    public $zMenuContent = '';
    public $zMenuType = 'url';
    public $childItems = array();
    
    public function __construct($zMenuId, $zMenuLabel, $zMenuContent, $zMenuIcon="fa-th-large", $zMenuParentId='', $zMenuType = 'url') {
        $this->zMenuId = $zMenuId;
        $this->zMenuParentId = $zMenuParentId;
        $this->zMenuLabel = $zMenuLabel;
        $this->zMenuIcon = $zMenuIcon;
        $this->zMenuContent = $zMenuContent;
        $this->zMenuType = $zMenuType;
    }
}