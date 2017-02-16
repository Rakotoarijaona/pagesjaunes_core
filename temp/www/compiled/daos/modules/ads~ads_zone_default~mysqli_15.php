<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/ads/daos/ads_zone_default.dao.xml') > 1487170656)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_ads_Jx_ads_zone_default_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $zone_id;
 public $rang;
 public $type;
 public $categorie_id;
 public $souscategorie_id;
 public $image;
 public $html;
 public $link;
 public $is_publie;
 public $date_creation;
 public $date_publication;
 public $date_update;
 public $creator;
   public function getSelector() { return "ads~ads_zone_default"; }
   public function getProperties() { return cDao_ads_Jx_ads_zone_default_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_ads_Jx_ads_zone_default_Jx_mysqli::$_pkFields; }
}

class cDao_ads_Jx_ads_zone_default_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'ads_zone_default' => 
  array (
    'name' => 'ads_zone_default',
    'realname' => 'ads_zone_default',
    'pk' => 
    array (
      0 => 'id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'zone_id',
      2 => 'rang',
      3 => 'type',
      4 => 'categorie_id',
      5 => 'souscategorie_id',
      6 => 'image',
      7 => 'html',
      8 => 'link',
      9 => 'is_publie',
      10 => 'date_creation',
      11 => 'date_publication',
      12 => 'date_update',
      13 => 'creator',
    ),
  ),
);
   protected $_primaryTable = 'ads_zone_default';
   protected $_selectClause='SELECT `ads_zone_default`.`id`, `ads_zone_default`.`zone_id`, `ads_zone_default`.`rang`, `ads_zone_default`.`type`, `ads_zone_default`.`categorie_id`, `ads_zone_default`.`souscategorie_id`, `ads_zone_default`.`image`, `ads_zone_default`.`html`, `ads_zone_default`.`link`, `ads_zone_default`.`is_publie`, `ads_zone_default`.`date_creation`, `ads_zone_default`.`date_publication`, `ads_zone_default`.`date_update`, `ads_zone_default`.`creator`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_ads_Jx_ads_zone_default_Jx_mysqli';
   protected $_daoSelector = 'ads~ads_zone_default';
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
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
  'rang' => 
  array (
    'name' => 'rang',
    'fieldName' => 'rang',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_default',
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
  'type' => 
  array (
    'name' => 'type',
    'fieldName' => 'type',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_default',
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
  'categorie_id' => 
  array (
    'name' => 'categorie_id',
    'fieldName' => 'categorie_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_default',
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
  'souscategorie_id' => 
  array (
    'name' => 'souscategorie_id',
    'fieldName' => 'souscategorie_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'ads_zone_default',
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
  'image' => 
  array (
    'name' => 'image',
    'fieldName' => 'image',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone_default',
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
  'html' => 
  array (
    'name' => 'html',
    'fieldName' => 'html',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'text',
    'unifiedType' => 'text',
    'table' => 'ads_zone_default',
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
  'link' => 
  array (
    'name' => 'link',
    'fieldName' => 'link',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
    'table' => 'ads_zone_default',
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
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('ads_zone_default').'` AS `ads_zone_default`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `ads_zone_default`.`id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone_default').'` (
`id`,`zone_id`,`rang`,`type`,`categorie_id`,`souscategorie_id`,`image`,`html`,`link`,`is_publie`,`date_creation`,`date_publication`,`date_update`,`creator`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', '.($record->rang === null ? 'NULL' : intval($record->rang)).', '.($record->type === null ? 'NULL' : intval($record->type)).', '.($record->categorie_id === null ? 'NULL' : intval($record->categorie_id)).', '.($record->souscategorie_id === null ? 'NULL' : intval($record->souscategorie_id)).', '.($record->image === null ? 'NULL' : $this->_conn->quote2($record->image,false)).', '.($record->html === null ? 'NULL' : $this->_conn->quote2($record->html,false)).', '.($record->link === null ? 'NULL' : $this->_conn->quote2($record->link,false)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('ads_zone_default').'` (
`zone_id`,`rang`,`type`,`categorie_id`,`souscategorie_id`,`image`,`html`,`link`,`is_publie`,`date_creation`,`date_publication`,`date_update`,`creator`
) VALUES (
'.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', '.($record->rang === null ? 'NULL' : intval($record->rang)).', '.($record->type === null ? 'NULL' : intval($record->type)).', '.($record->categorie_id === null ? 'NULL' : intval($record->categorie_id)).', '.($record->souscategorie_id === null ? 'NULL' : intval($record->souscategorie_id)).', '.($record->image === null ? 'NULL' : $this->_conn->quote2($record->image,false)).', '.($record->html === null ? 'NULL' : $this->_conn->quote2($record->html,false)).', '.($record->link === null ? 'NULL' : $this->_conn->quote2($record->link,false)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
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
   $query = 'UPDATE `'.$this->_conn->prefixTable('ads_zone_default').'` SET 
 `zone_id`= '.($record->zone_id === null ? 'NULL' : intval($record->zone_id)).', `rang`= '.($record->rang === null ? 'NULL' : intval($record->rang)).', `type`= '.($record->type === null ? 'NULL' : intval($record->type)).', `categorie_id`= '.($record->categorie_id === null ? 'NULL' : intval($record->categorie_id)).', `souscategorie_id`= '.($record->souscategorie_id === null ? 'NULL' : intval($record->souscategorie_id)).', `image`= '.($record->image === null ? 'NULL' : $this->_conn->quote2($record->image,false)).', `html`= '.($record->html === null ? 'NULL' : $this->_conn->quote2($record->html,false)).', `link`= '.($record->link === null ? 'NULL' : $this->_conn->quote2($record->link,false)).', `is_publie`= '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', `date_creation`= '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', `date_publication`= '.($record->date_publication === null ? 'NULL' : $this->_conn->quote2($record->date_publication,false)).', `date_update`= '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', `creator`= '.($record->creator === null ? 'NULL' : $this->_conn->quote2($record->creator,false)).'
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
 function getListByZone ($id){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone_default`.`zone_id` '.' = '.intval($id).'';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getListPublie (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone_default`.`is_publie` = 1';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function getListNotPublie (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone_default`.`is_publie` = 0';
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
$__query .=' WHERE  `ads_zone_default`.`is_publie` = 1';
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}
 function countNotPublie (){
    $__query = 'SELECT COUNT(*) as c '.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `ads_zone_default`.`is_publie` = 0';
    $__rs = $this->_conn->query($__query);
    $__res = $__rs->fetch();
    return intval($__res->c);
}

}
 return true; }