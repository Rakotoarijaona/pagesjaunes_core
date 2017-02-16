<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/categorie/daos/categorie.dao.xml') > 1485975184)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_categorie_Jx_categorie_Jx_mysqli extends jDaoRecordBase {
 public $categorie_id;
 public $categorie_name;
 public $categorie_namealias;
 public $categorie_vignette;
 public $categorie_ispublie;
 public $categorie_datepublication;
 public $categorie_datecreation;
 public $categorie_datemodification;
   public function getSelector() { return "categorie~categorie"; }
   public function getProperties() { return cDao_categorie_Jx_categorie_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_categorie_Jx_categorie_Jx_mysqli::$_pkFields; }
}

class cDao_categorie_Jx_categorie_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'categorie' => 
  array (
    'name' => 'categorie',
    'realname' => 'categorie',
    'pk' => 
    array (
      0 => 'categorie_id',
    ),
    'fields' => 
    array (
      0 => 'categorie_id',
      1 => 'categorie_name',
      2 => 'categorie_namealias',
      3 => 'categorie_vignette',
      4 => 'categorie_ispublie',
      5 => 'categorie_datepublication',
      6 => 'categorie_datecreation',
      7 => 'categorie_datemodification',
    ),
  ),
);
   protected $_primaryTable = 'categorie';
   protected $_selectClause='SELECT `categorie`.`categorie_id`, `categorie`.`categorie_name`, `categorie`.`categorie_namealias`, `categorie`.`categorie_vignette`, `categorie`.`categorie_ispublie`, `categorie`.`categorie_datepublication`, `categorie`.`categorie_datecreation`, `categorie`.`categorie_datemodification`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_categorie_Jx_categorie_Jx_mysqli';
   protected $_daoSelector = 'categorie~categorie';
   public static $_properties = array (
  'categorie_id' => 
  array (
    'name' => 'categorie_id',
    'fieldName' => 'categorie_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'categorie',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => true,
    'comment' => '',
  ),
  'categorie_name' => 
  array (
    'name' => 'categorie_name',
    'fieldName' => 'categorie_name',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'categorie',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 150,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'categorie_namealias' => 
  array (
    'name' => 'categorie_namealias',
    'fieldName' => 'categorie_namealias',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'categorie',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 255,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'categorie_vignette' => 
  array (
    'name' => 'categorie_vignette',
    'fieldName' => 'categorie_vignette',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'categorie',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 255,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'categorie_ispublie' => 
  array (
    'name' => 'categorie_ispublie',
    'fieldName' => 'categorie_ispublie',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'categorie',
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
  'categorie_datepublication' => 
  array (
    'name' => 'categorie_datepublication',
    'fieldName' => 'categorie_datepublication',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'categorie',
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
  'categorie_datecreation' => 
  array (
    'name' => 'categorie_datecreation',
    'fieldName' => 'categorie_datecreation',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'categorie',
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
  'categorie_datemodification' => 
  array (
    'name' => 'categorie_datemodification',
    'fieldName' => 'categorie_datemodification',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'categorie',
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
   public static $_pkFields = array('categorie_id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('categorie').'` AS `categorie`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `categorie`.`categorie_id`'.' = '.intval($categorie_id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `categorie_id`'.' = '.intval($categorie_id).'';
}
public function insert ($record){
 if($record->categorie_id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('categorie').'` (
`categorie_id`,`categorie_name`,`categorie_namealias`,`categorie_vignette`,`categorie_ispublie`,`categorie_datepublication`,`categorie_datecreation`,`categorie_datemodification`
) VALUES (
'.($record->categorie_id === null ? 'NULL' : intval($record->categorie_id)).', '.($record->categorie_name === null ? 'NULL' : $this->_conn->quote2($record->categorie_name,false)).', '.($record->categorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->categorie_namealias,false)).', '.($record->categorie_vignette === null ? 'NULL' : $this->_conn->quote2($record->categorie_vignette,false)).', '.($record->categorie_ispublie === null ? 'NULL' : intval($record->categorie_ispublie)).', '.($record->categorie_datepublication === null ? 'NULL' : $this->_conn->quote2($record->categorie_datepublication,false)).', '.($record->categorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->categorie_datecreation,false)).', '.($record->categorie_datemodification === null ? 'NULL' : $this->_conn->quote2($record->categorie_datemodification,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('categorie').'` (
`categorie_name`,`categorie_namealias`,`categorie_vignette`,`categorie_ispublie`,`categorie_datepublication`,`categorie_datecreation`,`categorie_datemodification`
) VALUES (
'.($record->categorie_name === null ? 'NULL' : $this->_conn->quote2($record->categorie_name,false)).', '.($record->categorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->categorie_namealias,false)).', '.($record->categorie_vignette === null ? 'NULL' : $this->_conn->quote2($record->categorie_vignette,false)).', '.($record->categorie_ispublie === null ? 'NULL' : intval($record->categorie_ispublie)).', '.($record->categorie_datepublication === null ? 'NULL' : $this->_conn->quote2($record->categorie_datepublication,false)).', '.($record->categorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->categorie_datecreation,false)).', '.($record->categorie_datemodification === null ? 'NULL' : $this->_conn->quote2($record->categorie_datemodification,false)).'
)';
}
   $result = $this->_conn->exec ($query);
   if(!$result)
       return false;
   if($record->categorie_id < 1 ) 
       $record->categorie_id= $this->_conn->lastInsertId();
    return $result;
}
public function update ($record){
   $query = 'UPDATE `'.$this->_conn->prefixTable('categorie').'` SET 
 `categorie_name`= '.($record->categorie_name === null ? 'NULL' : $this->_conn->quote2($record->categorie_name,false)).', `categorie_namealias`= '.($record->categorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->categorie_namealias,false)).', `categorie_vignette`= '.($record->categorie_vignette === null ? 'NULL' : $this->_conn->quote2($record->categorie_vignette,false)).', `categorie_ispublie`= '.($record->categorie_ispublie === null ? 'NULL' : intval($record->categorie_ispublie)).', `categorie_datepublication`= '.($record->categorie_datepublication === null ? 'NULL' : $this->_conn->quote2($record->categorie_datepublication,false)).', `categorie_datecreation`= '.($record->categorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->categorie_datecreation,false)).', `categorie_datemodification`= '.($record->categorie_datemodification === null ? 'NULL' : $this->_conn->quote2($record->categorie_datemodification,false)).'
 where  `categorie_id`'.' = '.intval($record->categorie_id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }


}
 return true; }