<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/catalogue/daos/catalogue.dao.xml') > 1483546956)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_catalogue_Jx_catalogue_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $entreprise_id;
 public $reference_produit;
 public $nom_produit;
 public $image_produit;
 public $description_produit;
 public $marque_produit;
 public $prix_produit;
 public $is_publie;
 public $date_creation;
 public $date_update;
   public function getSelector() { return "catalogue~catalogue"; }
   public function getProperties() { return cDao_catalogue_Jx_catalogue_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_catalogue_Jx_catalogue_Jx_mysqli::$_pkFields; }
}

class cDao_catalogue_Jx_catalogue_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'catalogue' => 
  array (
    'name' => 'catalogue',
    'realname' => 'catalogue',
    'pk' => 
    array (
      0 => 'id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'entreprise_id',
      2 => 'reference_produit',
      3 => 'nom_produit',
      4 => 'image_produit',
      5 => 'description_produit',
      6 => 'marque_produit',
      7 => 'prix_produit',
      8 => 'is_publie',
      9 => 'date_creation',
      10 => 'date_update',
    ),
  ),
);
   protected $_primaryTable = 'catalogue';
   protected $_selectClause='SELECT `catalogue`.`id`, `catalogue`.`entreprise_id`, `catalogue`.`reference_produit`, `catalogue`.`nom_produit`, `catalogue`.`image_produit`, `catalogue`.`description_produit`, `catalogue`.`marque_produit`, `catalogue`.`prix_produit`, `catalogue`.`is_publie`, `catalogue`.`date_creation`, `catalogue`.`date_update`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_catalogue_Jx_catalogue_Jx_mysqli';
   protected $_daoSelector = 'catalogue~catalogue';
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
    'table' => 'catalogue',
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
  'entreprise_id' => 
  array (
    'name' => 'entreprise_id',
    'fieldName' => 'entreprise_id',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'catalogue',
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
  'reference_produit' => 
  array (
    'name' => 'reference_produit',
    'fieldName' => 'reference_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'catalogue',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 25,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'nom_produit' => 
  array (
    'name' => 'nom_produit',
    'fieldName' => 'nom_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'catalogue',
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
  'image_produit' => 
  array (
    'name' => 'image_produit',
    'fieldName' => 'image_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'catalogue',
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
  'description_produit' => 
  array (
    'name' => 'description_produit',
    'fieldName' => 'description_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'mediumtext',
    'unifiedType' => 'text',
    'table' => 'catalogue',
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
  'marque_produit' => 
  array (
    'name' => 'marque_produit',
    'fieldName' => 'marque_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'catalogue',
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
  'prix_produit' => 
  array (
    'name' => 'prix_produit',
    'fieldName' => 'prix_produit',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'catalogue',
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
    'table' => 'catalogue',
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
    'table' => 'catalogue',
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
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'catalogue',
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
   public static $_pkFields = array('id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('catalogue').'` AS `catalogue`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `catalogue`.`id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('catalogue').'` (
`id`,`entreprise_id`,`reference_produit`,`nom_produit`,`image_produit`,`description_produit`,`marque_produit`,`prix_produit`,`is_publie`,`date_creation`,`date_update`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->entreprise_id === null ? 'NULL' : intval($record->entreprise_id)).', '.($record->reference_produit === null ? 'NULL' : $this->_conn->quote2($record->reference_produit,false)).', '.($record->nom_produit === null ? 'NULL' : $this->_conn->quote2($record->nom_produit,false)).', '.($record->image_produit === null ? 'NULL' : $this->_conn->quote2($record->image_produit,false)).', '.($record->description_produit === null ? 'NULL' : $this->_conn->quote2($record->description_produit,false)).', '.($record->marque_produit === null ? 'NULL' : $this->_conn->quote2($record->marque_produit,false)).', '.($record->prix_produit === null ? 'NULL' : intval($record->prix_produit)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('catalogue').'` (
`entreprise_id`,`reference_produit`,`nom_produit`,`image_produit`,`description_produit`,`marque_produit`,`prix_produit`,`is_publie`,`date_creation`,`date_update`
) VALUES (
'.($record->entreprise_id === null ? 'NULL' : intval($record->entreprise_id)).', '.($record->reference_produit === null ? 'NULL' : $this->_conn->quote2($record->reference_produit,false)).', '.($record->nom_produit === null ? 'NULL' : $this->_conn->quote2($record->nom_produit,false)).', '.($record->image_produit === null ? 'NULL' : $this->_conn->quote2($record->image_produit,false)).', '.($record->description_produit === null ? 'NULL' : $this->_conn->quote2($record->description_produit,false)).', '.($record->marque_produit === null ? 'NULL' : $this->_conn->quote2($record->marque_produit,false)).', '.($record->prix_produit === null ? 'NULL' : intval($record->prix_produit)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).'
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
   $query = 'UPDATE `'.$this->_conn->prefixTable('catalogue').'` SET 
 `entreprise_id`= '.($record->entreprise_id === null ? 'NULL' : intval($record->entreprise_id)).', `reference_produit`= '.($record->reference_produit === null ? 'NULL' : $this->_conn->quote2($record->reference_produit,false)).', `nom_produit`= '.($record->nom_produit === null ? 'NULL' : $this->_conn->quote2($record->nom_produit,false)).', `image_produit`= '.($record->image_produit === null ? 'NULL' : $this->_conn->quote2($record->image_produit,false)).', `description_produit`= '.($record->description_produit === null ? 'NULL' : $this->_conn->quote2($record->description_produit,false)).', `marque_produit`= '.($record->marque_produit === null ? 'NULL' : $this->_conn->quote2($record->marque_produit,false)).', `prix_produit`= '.($record->prix_produit === null ? 'NULL' : intval($record->prix_produit)).', `is_publie`= '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', `date_creation`= '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', `date_update`= '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).'
 where  `id`'.' = '.intval($record->id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }


}
 return true; }