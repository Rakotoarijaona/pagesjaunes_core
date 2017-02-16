<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/common/daos/jacl2_user_group.dao.xml') > 1487238650)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_common_Jx_jacl2_user_group_Jx_mysqli extends jDaoRecordBase {
 public $login;
 public $id_aclgrp;
   public function getSelector() { return "common~jacl2_user_group"; }
   public function getProperties() { return cDao_common_Jx_jacl2_user_group_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_common_Jx_jacl2_user_group_Jx_mysqli::$_pkFields; }
}

class cDao_common_Jx_jacl2_user_group_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'jacl2_user_group' => 
  array (
    'name' => 'jacl2_user_group',
    'realname' => 'jacl2_user_group',
    'pk' => 
    array (
      0 => 'login',
      1 => 'id_aclgrp',
    ),
    'fields' => 
    array (
      0 => 'login',
      1 => 'id_aclgrp',
    ),
  ),
);
   protected $_primaryTable = 'jacl2_user_group';
   protected $_selectClause='SELECT `jacl2_user_group`.`login`, `jacl2_user_group`.`id_aclgrp`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_common_Jx_jacl2_user_group_Jx_mysqli';
   protected $_daoSelector = 'common~jacl2_user_group';
   public static $_properties = array (
  'login' => 
  array (
    'name' => 'login',
    'fieldName' => 'login',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'jacl2_user_group',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 50,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'id_aclgrp' => 
  array (
    'name' => 'id_aclgrp',
    'fieldName' => 'id_aclgrp',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'jacl2_user_group',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 50,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
);
   public static $_pkFields = array('login','id_aclgrp');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('jacl2_user_group').'` AS `jacl2_user_group`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `jacl2_user_group`.`login`'.' = '.$this->_conn->quote($login).' AND `jacl2_user_group`.`id_aclgrp`'.' = '.$this->_conn->quote($id_aclgrp).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `login`'.' = '.$this->_conn->quote($login).' AND `id_aclgrp`'.' = '.$this->_conn->quote($id_aclgrp).'';
}
public function insert ($record){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('jacl2_user_group').'` (
`login`,`id_aclgrp`
) VALUES (
'.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->id_aclgrp === null ? 'NULL' : $this->_conn->quote2($record->id_aclgrp,false)).'
)';
   $result = $this->_conn->exec ($query);
    return $result;
}
public function update ($record){
     throw new jException('jelix~dao.error.update.impossible',array('common~jacl2_user_group','G:\wamp\pagesjaunes_core/modules/common/daos/jacl2_user_group.dao.xml'));
 }
 function getGroupsUser ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `jacl2_user_group`.`login` '.' = '.$this->_conn->quote($login).'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getUsersGroup ( $grp, $ordre='asc'){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `jacl2_user_group`.`id_aclgrp` '.' = '.$this->_conn->quote($grp).' ORDER BY `jacl2_user_group`.`login` '.( strtolower($ordre) =='asc'?'asc':'desc').'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getUsersGroupLimit ( $grp, $offset, $count, $ordre='asc'){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `jacl2_user_group`.`id_aclgrp` '.' = '.$this->_conn->quote($grp).' ORDER BY `jacl2_user_group`.`login` '.( strtolower($ordre) =='asc'?'asc':'desc').'';
    $__rs = $this->_conn->limitQuery($__query, $offset, $count);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getUsersGroupCount ($grp){
    $__query = 'SELECT COUNT(*) as c '.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `jacl2_user_group`.`id_aclgrp` '.' = '.$this->_conn->quote($grp).'';
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}
 function deleteByUser ($login){
    $__query = 'DELETE FROM `'.$this->_conn->prefixTable('jacl2_user_group').'` ';
$__query .=' WHERE  `login` '.' = '.$this->_conn->quote($login).'';
    return $this->_conn->exec ($__query);
}
 function deleteByGroup ($grp){
    $__query = 'DELETE FROM `'.$this->_conn->prefixTable('jacl2_user_group').'` ';
$__query .=' WHERE  `id_aclgrp` '.' = '.$this->_conn->quote($grp).'';
    return $this->_conn->exec ($__query);
}

}
 return true; }