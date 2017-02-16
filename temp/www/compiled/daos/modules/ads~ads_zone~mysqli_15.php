<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/ads/daos/ads_zone.dao.xml') > 1487238647)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_ads_Jx_ads_zone_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $name;
 public $cost_model;
 public $width;
 public $height;
 public $slots_columns;
 public $slots_row;
 public $number_rotation;
 public $number_client;
 public $line_height;
 public $number_ads_default;
 public $ads_display_method;
 public $is_publie;
 public $date_creation;
 public $date_update;
 public $date_publication;
 public $creator;
   public function getSelector() { return "ads~ads_zone"; }
   public function getProperties() { return cDao_ads_Jx_ads_zone_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_ads_Jx_ads_zone_Jx_mysqli::$_pkFields; }
}

class cDao_ads_Jx_ads_zone_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'ads_zone' => 
  array (
    'name' => 'ads_zone',
    'realname' => 'ads_zone',
    'pk' => 
    array (
      0 => 'id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'name',
      2 => 'cost_model',
      3 => 'width',
      4 => 'height',
      5 => 'slots_columns',
      6 => 'slots_row',
      7 => 'number_rotation',
      8 => 'number_client',
      9 => 'line_height',
      10 => 'number_ads_default',
      11 => 'ads_display_method',
      12 => 'is_publie',
      13 => 'date_creation',
      14 => 'date_update',
      15 => 'date_publication',
      16 => 'creator',
    ),
  ),
);
   protected $_primaryTable = 'ads_zone';
   protected $_selectClause='SELECT `ads_zone`.`id`, `ads_zone`.`name`, `ads_zone`.`cost_model`, `ads_zone`.`width`, `ads_zone`.`height`, `ads_zone`.`slots_columns`, `ads_zone`.`slots_row`, `ads_zone`.`number_rotation`, `ads_zone`.`number_client`, `ads_zone`.`line_height`, `ads_zone`.`number_ads_default`, `ads_zone`.`ads_display_method`, `ads_zone`.`is_publie`, `ads_zone`.`date_creation`, `ads_zone`.`date_update`, `ads_zone`.`date_publication`, `ads_zone`.`creator`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_ads_Jx_ads_zone_Jx_mysqli';
   protected $_daoSelector = 'ads~ads_zone';
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
    'table' => 'ads_zone',
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
  'name' => 
  array (
    'name' => 'name',
    'fieldName' => 'name',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone',
    'updatePattern' => '%s',
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
  'cost_model' => 
  array (
    'name' => 'cost_model',
    'fieldName' => 'cost_model',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 10,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'width' => 
  array (
    'name' => 'width',
    'fieldName' => 'width',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'height' => 
  array (
    'name' => 'height',
    'fieldName' => 'height',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'slots_columns' => 
  array (
    'name' => 'slots_columns',
    'fieldName' => 'slots_columns',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'slots_row' => 
  array (
    'name' => 'slots_row',
    'fieldName' => 'slots_row',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'number_rotation' => 
  array (
    'name' => 'number_rotation',
    'fieldName' => 'number_rotation',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'number_client' => 
  array (
    'name' => 'number_client',
    'fieldName' => 'number_client',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'line_height' => 
  array (
    'name' => 'line_height',
    'fieldName' => 'line_height',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'number_ads_default' => 
  array (
    'name' => 'number_ads_default',
    'fieldName' => 'number_ads_default',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'ads_display_method' => 
  array (
    'name' => 'ads_display_method',
    'fieldName' => 'ads_display_method',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'is_publie' => 
  array (
    'name' => 'is_publie',
    'fieldName' => 'is_publie',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'ads_zone',
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
  'date_creation' => 
  array (
    'name' => 'date_creation',
    'fieldName' => 'date_creation',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'ads_zone',
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
  'date_update' => 
  array (
    'name' => 'date_update',
    'fieldName' => 'date_update',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'ads_zone',
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
  'date_publication' => 
  array (
    'name' => 'date_publication',
    'fieldName' => 'date_publication',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'ads_zone',
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
  'creator' => 
  array (
    'name' => 'creator',
    'fieldName' => 'creator',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone',
    'updatePattern' => '%s',
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
   public static $_pkFields = array('id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('ads_zone').'` AS `ads_zone`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `ads_zone`.`id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone').'` (
`id`,`name`,`cost_model`,`width`,`height`,`slots_columns`,`slots_row`,`number_rotation`,`number_client`,`line_height`,`number_ads_default`,`ads_display_method`,`is_publie`,`date_creation`,`date_update`,`date_publication`,`creator`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', '.($record->cost_model === null ? 'NULL' : $this->_conn->quote2($record->cost_model,false)).', '.($record->width === null ? 'NULL' : intval($record->width)).', '.($record->height === null ? 'NULL' : intval($record->height)).', '.($record->slots_columns === null ? 'NULL' : intval($record->slots_columns)).', '.($record->slots_row === null ? 'NULL' : intval($record->slots_row)).', '.($record->number_rotation === null ? 'NULL' : intval($record->number_rotation)).', '.($record->number_client === null ? 'NULL' : intval($record->number_client)).', '.($record->line_height === null ? 'NULL' : intval($record->line_height)).', '.($record->number_ads_default === null ? 'NULL' : intval($record->number_ads_default)).', '.($record->ads_display_method === null ? 'NULL' : intval($record->ads_display_method)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone').'` (
`name`,`cost_model`,`width`,`height`,`slots_columns`,`slots_row`,`number_rotation`,`number_client`,`line_height`,`number_ads_default`,`ads_display_method`,`is_publie`,`date_creation`,`date_update`,`date_publication`,`creator`
) VALUES (
'.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', '.($record->cost_model === null ? 'NULL' : $this->_conn->quote2($record->cost_model,false)).', '.($record->width === null ? 'NULL' : intval($record->width)).', '.($record->height === null ? 'NULL' : intval($record->height)).', '.($record->slots_columns === null ? 'NULL' : intval($record->slots_columns)).', '.($record->slots_row === null ? 'NULL' : intval($record->slots_row)).', '.($record->number_rotation === null ? 'NULL' : intval($record->number_rotation)).', '.($record->number_client === null ? 'NULL' : intval($record->number_client)).', '.($record->line_height === null ? 'NULL' : intval($record->line_height)).', '.($record->number_ads_default === null ? 'NULL' : intval($record->number_ads_default)).', '.($record->ads_display_method === null ? 'NULL' : intval($record->ads_display_method)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
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
   $query = 'UPDATE `'.$this->_conn->prefixTable('ads_zone').'` SET 
 `name`= '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', `cost_model`= '.($record->cost_model === null ? 'NULL' : $this->_conn->quote2($record->cost_model,false)).', `width`= '.($record->width === null ? 'NULL' : intval($record->width)).', `height`= '.($record->height === null ? 'NULL' : intval($record->height)).', `slots_columns`= '.($record->slots_columns === null ? 'NULL' : intval($record->slots_columns)).', `slots_row`= '.($record->slots_row === null ? 'NULL' : intval($record->slots_row)).', `number_rotation`= '.($record->number_rotation === null ? 'NULL' : intval($record->number_rotation)).', `number_client`= '.($record->number_client === null ? 'NULL' : intval($record->number_client)).', `line_height`= '.($record->line_height === null ? 'NULL' : intval($record->line_height)).', `number_ads_default`= '.($record->number_ads_default === null ? 'NULL' : intval($record->number_ads_default)).', `ads_display_method`= '.($record->ads_display_method === null ? 'NULL' : intval($record->ads_display_method)).', `is_publie`= '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', `date_creation`= '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', `date_update`= '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', `date_publication`= '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', `creator`= '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
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
 function getListPublie (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone`.`is_publie` = 1';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getListNotPublie (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone`.`is_publie` = 0';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function countAll (){
    $__query = 'SELECT COUNT(*) as c '.$this->_fromClause.$this->_whereClause;
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}
 function countPublie (){
    $__query = 'SELECT COUNT(*) as c '.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone`.`is_publie` = 1';
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}
 function countNotPublie (){
    $__query = 'SELECT COUNT(*) as c '.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone`.`is_publie` = 0';
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}

}
 return true; }