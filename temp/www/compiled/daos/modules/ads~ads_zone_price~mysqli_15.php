<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/ads/daos/ads_zone_price.dao.xml') > 1487087058)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_ads_Jx_ads_zone_price_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $zone_id;
 public $price;
 public $number;
 public $unity;
   public function getSelector() { return "ads~ads_zone_price"; }
   public function getProperties() { return cDao_ads_Jx_ads_zone_price_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_ads_Jx_ads_zone_price_Jx_mysqli::$_pkFields; }
}

class cDao_ads_Jx_ads_zone_price_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'ads_zone_price' => 
  array (
    'name' => 'ads_zone_price',
    'realname' => 'ads_zone_price',
    'pk' => 
    array (
      0 => 'id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'zone_id',
      2 => 'price',
      3 => 'number',
      4 => 'unity',
    ),
  ),
);
   protected $_primaryTable = 'ads_zone_price';
   protected $_selectClause='SELECT `ads_zone_price`.`id`, `ads_zone_price`.`zone_id`, `ads_zone_price`.`price`, `ads_zone_price`.`number`, `ads_zone_price`.`unity`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_ads_Jx_ads_zone_price_Jx_mysqli';
   protected $_daoSelector = 'ads~ads_zone_price';
   public static $_properties = array (
  'id' => 
  array (
    'name' => 'id',
    'fieldName' => 'id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_price',
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
  'zone_id' => 
  array (
    'name' => 'zone_id',
    'fieldName' => 'zone_id',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_price',
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
  'price' => 
  array (
    'name' => 'price',
    'fieldName' => 'price',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_price',
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
  'number' => 
  array (
    'name' => 'number',
    'fieldName' => 'number',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_price',
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
  'unity' => 
  array (
    'name' => 'unity',
    'fieldName' => 'unity',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone_price',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 20,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
);
   public static $_pkFields = array('id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('ads_zone_price').'` AS `ads_zone_price`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `ads_zone_price`.`id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone_price').'` (
`id`,`zone_id`,`price`,`number`,`unity`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', '.($record->price === null ? 'NULL' : intval($record->price)).', '.($record->number === null ? 'NULL' : intval($record->number)).', '.($record->unity === null ? 'NULL' : $this->_conn->quote2($record->unity,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone_price').'` (
`zone_id`,`price`,`number`,`unity`
) VALUES (
'.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', '.($record->price === null ? 'NULL' : intval($record->price)).', '.($record->number === null ? 'NULL' : intval($record->number)).', '.($record->unity === null ? 'NULL' : $this->_conn->quote2($record->unity,false)).'
)';
}
   $result = $this->_conn->exec ($query);
   if(!$result)
       return false;
   if($record->id < 1 ) 
       $record->id= $this->_conn->lastInsertId();
    return $result;
}
public function update ($record){
   $query = 'UPDATE `'.$this->_conn->prefixTable('ads_zone_price').'` SET 
 `zone_id`= '.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', `price`= '.($record->price === null ? 'NULL' : intval($record->price)).', `number`= '.($record->number === null ? 'NULL' : intval($record->number)).', `unity`= '.($record->unity === null ? 'NULL' : $this->_conn->quote2($record->unity,false)).'
 where  `id`'.' = '.intval($record->id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }
 function getList (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getListByZone ($zone){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone_price`.`zone_id` '.' = '.intval($zone).'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}

}
 return true; }