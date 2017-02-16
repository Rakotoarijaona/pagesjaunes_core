<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/profile/daos/jacl2group.dao.xml') > 1487238653)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_profile_Jx_jacl2group_Jx_mysqli extends jDaoRecordBase {
 public $id_aclgrp;
 public $name;
 public $namealias;
 public $grouptype;
 public $ownerlogin;
   public function getSelector() { return "profile~jacl2group"; }
   public function getProperties() { return cDao_profile_Jx_jacl2group_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_profile_Jx_jacl2group_Jx_mysqli::$_pkFields; }
}

class cDao_profile_Jx_jacl2group_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'group' => 
  array (
    'name' => 'group',
    'realname' => 'jacl2_group',
    'pk' => 
    array (
      0 => 'id_aclgrp',
    ),
    'fields' => 
    array (
      0 => 'id_aclgrp',
      1 => 'name',
      2 => 'namealias',
      3 => 'grouptype',
      4 => 'ownerlogin',
    ),
  ),
);
   protected $_primaryTable = 'group';
   protected $_selectClause='SELECT `group`.`id_aclgrp`, `group`.`name`, `group`.`namealias`, `group`.`grouptype`, `group`.`ownerlogin`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_profile_Jx_jacl2group_Jx_mysqli';
   protected $_daoSelector = 'profile~jacl2group';
   public static $_properties = array (
  'id_aclgrp' => 
  array (
    'name' => 'id_aclgrp',
    'fieldName' => 'id_aclgrp',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'group',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'name' => 
  array (
    'name' => 'name',
    'fieldName' => 'name',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'group',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'namealias' => 
  array (
    'name' => 'namealias',
    'fieldName' => 'namealias',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'group',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 125,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'grouptype' => 
  array (
    'name' => 'grouptype',
    'fieldName' => 'grouptype',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'group',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'ownerlogin' => 
  array (
    'name' => 'ownerlogin',
    'fieldName' => 'ownerlogin',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'string',
    'unifiedType' => 'varchar',
    'table' => 'group',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
);
   public static $_pkFields = array('id_aclgrp');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('jacl2_group').'` AS `group`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `group`.`id_aclgrp`'.' = '.$this->_conn->quote($id_aclgrp).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id_aclgrp`'.' = '.$this->_conn->quote($id_aclgrp).'';
}
public function insert ($record){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('jacl2_group').'` (
`id_aclgrp`,`name`,`namealias`,`grouptype`,`ownerlogin`
) VALUES (
'.($record->id_aclgrp === null ? 'NULL' : $this->_conn->quote2($record->id_aclgrp,false)).', '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', '.($record->namealias === null ? 'NULL' : $this->_conn->quote2($record->namealias,false)).', '.($record->grouptype === null ? 'NULL' : intval($record->grouptype)).', '.($record->ownerlogin === null ? 'NULL' : $this->_conn->quote2($record->ownerlogin,false)).'
)';
   $result = $this->_conn->exec ($query);
    return $result;
}
public function update ($record){
   $query = 'UPDATE `'.$this->_conn->prefixTable('jacl2_group').'` SET 
 `name`= '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', `namealias`= '.($record->namealias === null ? 'NULL' : $this->_conn->quote2($record->namealias,false)).', `grouptype`= '.($record->grouptype === null ? 'NULL' : intval($record->grouptype)).', `ownerlogin`= '.($record->ownerlogin === null ? 'NULL' : $this->_conn->quote2($record->ownerlogin,false)).'
 where  `id_aclgrp`'.' = '.$this->_conn->quote($record->id_aclgrp).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }
 function getDefaultGroups (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `group`.`grouptype` = 1 AND `group`.`id_aclgrp` <> \'__anonymous\'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function findAllPublicGroup (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `group`.`grouptype` <> 2 AND `group`.`id_aclgrp` <> \'__anonymous\' ORDER BY `group`.`name` asc';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getPrivateGroup ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `group`.`grouptype` = 2 AND `group`.`ownerlogin` '.($login === null ? 'IS NULL' : ' = '.$this->_conn->quote2($login,false)).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function getGroupByCode ($code){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `group`.`id_aclgrp` '.' = '.$this->_conn->quote($code).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function setToDefault ($group){
    $__query = 'UPDATE `'.$this->_conn->prefixTable('jacl2_group').'` SET 
 `grouptype`= 1';
$__query .=' WHERE  `id_aclgrp` '.' = '.$this->_conn->quote($group).' AND `id_aclgrp` <> \'__anonymous\'';
    return $this->_conn->exec ($__query);
}
 function setToNormal ($group){
    $__query = 'UPDATE `'.$this->_conn->prefixTable('jacl2_group').'` SET 
 `grouptype`= 0';
$__query .=' WHERE  `id_aclgrp` '.' = '.$this->_conn->quote($group).' AND `id_aclgrp` <> \'__anonymous\'';
    return $this->_conn->exec ($__query);
}
 function changeName ($group, $name, $namealias){
    $__query = 'UPDATE `'.$this->_conn->prefixTable('jacl2_group').'` SET 
 `name`= '.($name === null ? 'NULL' : $this->_conn->quote2($name,false)).', `namealias`= '.($namealias === null ? 'NULL' : $this->_conn->quote2($namealias,false)).'';
$__query .=' WHERE  `id_aclgrp` '.' = '.$this->_conn->quote($group).' AND `id_aclgrp` <> \'__anonymous\'';
    return $this->_conn->exec ($__query);
}

}
 return true; }