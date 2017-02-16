<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/categorie/daos/souscategorie.dao.xml') > 1485975200)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_categorie_Jx_souscategorie_Jx_mysqli extends jDaoRecordBase {
 public $souscategorie_id;
 public $souscategorie_categorieid;
 public $souscategorie_name;
 public $souscategorie_namealias;
 public $souscategorie_ispublie;
 public $souscategorie_datecreation;
 public $souscategorie_dateupdate;
 public $souscategorie_datepublie;
   public function getSelector() { return "categorie~souscategorie"; }
   public function getProperties() { return cDao_categorie_Jx_souscategorie_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_categorie_Jx_souscategorie_Jx_mysqli::$_pkFields; }
}

class cDao_categorie_Jx_souscategorie_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'souscategorie' => 
  array (
    'name' => 'souscategorie',
    'realname' => 'souscategorie',
    'pk' => 
    array (
      0 => 'souscategorie_id',
    ),
    'fields' => 
    array (
      0 => 'souscategorie_id',
      1 => 'souscategorie_categorieid',
      2 => 'souscategorie_name',
      3 => 'souscategorie_namealias',
      4 => 'souscategorie_ispublie',
      5 => 'souscategorie_datecreation',
      6 => 'souscategorie_dateupdate',
      7 => 'souscategorie_datepublie',
    ),
  ),
);
   protected $_primaryTable = 'souscategorie';
   protected $_selectClause='SELECT `souscategorie`.`souscategorie_id`, `souscategorie`.`souscategorie_categorieid`, `souscategorie`.`souscategorie_name`, `souscategorie`.`souscategorie_namealias`, `souscategorie`.`souscategorie_ispublie`, `souscategorie`.`souscategorie_datecreation`, `souscategorie`.`souscategorie_dateupdate`, `souscategorie`.`souscategorie_datepublie`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_categorie_Jx_souscategorie_Jx_mysqli';
   protected $_daoSelector = 'categorie~souscategorie';
   public static $_properties = array (
  'souscategorie_id' => 
  array (
    'name' => 'souscategorie_id',
    'fieldName' => 'souscategorie_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'souscategorie',
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
  'souscategorie_categorieid' => 
  array (
    'name' => 'souscategorie_categorieid',
    'fieldName' => 'souscategorie_categorieid',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'souscategorie',
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
  'souscategorie_name' => 
  array (
    'name' => 'souscategorie_name',
    'fieldName' => 'souscategorie_name',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'souscategorie',
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
  'souscategorie_namealias' => 
  array (
    'name' => 'souscategorie_namealias',
    'fieldName' => 'souscategorie_namealias',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'souscategorie',
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
  'souscategorie_ispublie' => 
  array (
    'name' => 'souscategorie_ispublie',
    'fieldName' => 'souscategorie_ispublie',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'souscategorie',
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
  'souscategorie_datecreation' => 
  array (
    'name' => 'souscategorie_datecreation',
    'fieldName' => 'souscategorie_datecreation',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'souscategorie',
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
  'souscategorie_dateupdate' => 
  array (
    'name' => 'souscategorie_dateupdate',
    'fieldName' => 'souscategorie_dateupdate',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'souscategorie',
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
  'souscategorie_datepublie' => 
  array (
    'name' => 'souscategorie_datepublie',
    'fieldName' => 'souscategorie_datepublie',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'souscategorie',
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
   public static $_pkFields = array('souscategorie_id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('souscategorie').'` AS `souscategorie`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `souscategorie`.`souscategorie_id`'.' = '.intval($souscategorie_id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `souscategorie_id`'.' = '.intval($souscategorie_id).'';
}
public function insert ($record){
 if($record->souscategorie_id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('souscategorie').'` (
`souscategorie_id`,`souscategorie_categorieid`,`souscategorie_name`,`souscategorie_namealias`,`souscategorie_ispublie`,`souscategorie_datecreation`,`souscategorie_dateupdate`,`souscategorie_datepublie`
) VALUES (
'.($record->souscategorie_id === null ? 'NULL' : intval($record->souscategorie_id)).', '.($record->souscategorie_categorieid === null ? 'NULL' : intval($record->souscategorie_categorieid)).', '.($record->souscategorie_name === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_name,false)).', '.($record->souscategorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_namealias,false)).', '.($record->souscategorie_ispublie === null ? 'NULL' : intval($record->souscategorie_ispublie)).', '.($record->souscategorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datecreation,false)).', '.($record->souscategorie_dateupdate === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_dateupdate,false)).', '.($record->souscategorie_datepublie === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datepublie,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('souscategorie').'` (
`souscategorie_categorieid`,`souscategorie_name`,`souscategorie_namealias`,`souscategorie_ispublie`,`souscategorie_datecreation`,`souscategorie_dateupdate`,`souscategorie_datepublie`
) VALUES (
'.($record->souscategorie_categorieid === null ? 'NULL' : intval($record->souscategorie_categorieid)).', '.($record->souscategorie_name === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_name,false)).', '.($record->souscategorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_namealias,false)).', '.($record->souscategorie_ispublie === null ? 'NULL' : intval($record->souscategorie_ispublie)).', '.($record->souscategorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datecreation,false)).', '.($record->souscategorie_dateupdate === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_dateupdate,false)).', '.($record->souscategorie_datepublie === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datepublie,false)).'
)';
}
   $result = $this->_conn->exec ($query);
   if(!$result)
       return false;
   if($record->souscategorie_id < 1 ) 
       $record->souscategorie_id= $this->_conn->lastInsertId();
    return $result;
}
public function update ($record){
   $query = 'UPDATE `'.$this->_conn->prefixTable('souscategorie').'` SET 
 `souscategorie_categorieid`= '.($record->souscategorie_categorieid === null ? 'NULL' : intval($record->souscategorie_categorieid)).', `souscategorie_name`= '.($record->souscategorie_name === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_name,false)).', `souscategorie_namealias`= '.($record->souscategorie_namealias === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_namealias,false)).', `souscategorie_ispublie`= '.($record->souscategorie_ispublie === null ? 'NULL' : intval($record->souscategorie_ispublie)).', `souscategorie_datecreation`= '.($record->souscategorie_datecreation === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datecreation,false)).', `souscategorie_dateupdate`= '.($record->souscategorie_dateupdate === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_dateupdate,false)).', `souscategorie_datepublie`= '.($record->souscategorie_datepublie === null ? 'NULL' : $this->_conn->quote2($record->souscategorie_datepublie,false)).'
 where  `souscategorie_id`'.' = '.intval($record->souscategorie_id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }


}
 return true; }