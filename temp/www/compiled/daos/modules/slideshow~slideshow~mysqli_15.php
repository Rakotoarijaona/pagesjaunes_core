<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/slideshow/daos/slideshow.dao.xml') > 1486006854)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_slideshow_Jx_slideshow_Jx_mysqli extends jDaoRecordBase {
 public $slideshow_id;
 public $slideshow_identifiant;
 public $slideshow_namealias;
 public $slideshow_entrepriseId;
 public $slideshow_imageonly;
 public $slideshow_publicationstatus;
 public $slideshow_titre;
 public $slideshow_introductiontext;
 public $slideshow_visuelbackground;
 public $slideshow_buttontitle;
 public $slideshow_contentposition;
 public $slideshow_urlpage;
 public $slideshow_creationdate;
 public $slideshow_updatedate;
 public $slideshow_publicationdate;
   public function getSelector() { return "slideshow~slideshow"; }
   public function getProperties() { return cDao_slideshow_Jx_slideshow_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_slideshow_Jx_slideshow_Jx_mysqli::$_pkFields; }
}

class cDao_slideshow_Jx_slideshow_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'slideshow' => 
  array (
    'name' => 'slideshow',
    'realname' => 'slideshow',
    'pk' => 
    array (
      0 => 'slideshow_id',
    ),
    'fields' => 
    array (
      0 => 'slideshow_id',
      1 => 'slideshow_identifiant',
      2 => 'slideshow_namealias',
      3 => 'slideshow_entrepriseId',
      4 => 'slideshow_imageonly',
      5 => 'slideshow_publicationstatus',
      6 => 'slideshow_titre',
      7 => 'slideshow_introductiontext',
      8 => 'slideshow_visuelbackground',
      9 => 'slideshow_buttontitle',
      10 => 'slideshow_contentposition',
      11 => 'slideshow_urlpage',
      12 => 'slideshow_creationdate',
      13 => 'slideshow_updatedate',
      14 => 'slideshow_publicationdate',
    ),
  ),
);
   protected $_primaryTable = 'slideshow';
   protected $_selectClause='SELECT `slideshow`.`slideshow_id`, `slideshow`.`slideshow_identifiant`, `slideshow`.`slideshow_namealias`, `slideshow`.`slideshow_entrepriseId`, `slideshow`.`slideshow_imageonly`, `slideshow`.`slideshow_publicationstatus`, `slideshow`.`slideshow_titre`, `slideshow`.`slideshow_introductiontext`, `slideshow`.`slideshow_visuelbackground`, `slideshow`.`slideshow_buttontitle`, `slideshow`.`slideshow_contentposition`, `slideshow`.`slideshow_urlpage`, `slideshow`.`slideshow_creationdate`, `slideshow`.`slideshow_updatedate`, `slideshow`.`slideshow_publicationdate`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_slideshow_Jx_slideshow_Jx_mysqli';
   protected $_daoSelector = 'slideshow~slideshow';
   public static $_properties = array (
  'slideshow_id' => 
  array (
    'name' => 'slideshow_id',
    'fieldName' => 'slideshow_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'slideshow',
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
  'slideshow_identifiant' => 
  array (
    'name' => 'slideshow_identifiant',
    'fieldName' => 'slideshow_identifiant',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_namealias' => 
  array (
    'name' => 'slideshow_namealias',
    'fieldName' => 'slideshow_namealias',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_entrepriseId' => 
  array (
    'name' => 'slideshow_entrepriseId',
    'fieldName' => 'slideshow_entrepriseId',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'slideshow',
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
  'slideshow_imageonly' => 
  array (
    'name' => 'slideshow_imageonly',
    'fieldName' => 'slideshow_imageonly',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'slideshow',
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
  'slideshow_publicationstatus' => 
  array (
    'name' => 'slideshow_publicationstatus',
    'fieldName' => 'slideshow_publicationstatus',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'slideshow',
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
  'slideshow_titre' => 
  array (
    'name' => 'slideshow_titre',
    'fieldName' => 'slideshow_titre',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_introductiontext' => 
  array (
    'name' => 'slideshow_introductiontext',
    'fieldName' => 'slideshow_introductiontext',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'text',
    'unifiedType' => 'text',
    'table' => 'slideshow',
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
  'slideshow_visuelbackground' => 
  array (
    'name' => 'slideshow_visuelbackground',
    'fieldName' => 'slideshow_visuelbackground',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_buttontitle' => 
  array (
    'name' => 'slideshow_buttontitle',
    'fieldName' => 'slideshow_buttontitle',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_contentposition' => 
  array (
    'name' => 'slideshow_contentposition',
    'fieldName' => 'slideshow_contentposition',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
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
  'slideshow_urlpage' => 
  array (
    'name' => 'slideshow_urlpage',
    'fieldName' => 'slideshow_urlpage',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'slideshow',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 100,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'slideshow_creationdate' => 
  array (
    'name' => 'slideshow_creationdate',
    'fieldName' => 'slideshow_creationdate',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'slideshow',
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
  'slideshow_updatedate' => 
  array (
    'name' => 'slideshow_updatedate',
    'fieldName' => 'slideshow_updatedate',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'slideshow',
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
  'slideshow_publicationdate' => 
  array (
    'name' => 'slideshow_publicationdate',
    'fieldName' => 'slideshow_publicationdate',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'slideshow',
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
   public static $_pkFields = array('slideshow_id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('slideshow').'` AS `slideshow`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `slideshow`.`slideshow_id`'.' = '.intval($slideshow_id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `slideshow_id`'.' = '.intval($slideshow_id).'';
}
public function insert ($record){
 if($record->slideshow_id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('slideshow').'` (
`slideshow_id`,`slideshow_identifiant`,`slideshow_namealias`,`slideshow_entrepriseId`,`slideshow_imageonly`,`slideshow_publicationstatus`,`slideshow_titre`,`slideshow_introductiontext`,`slideshow_visuelbackground`,`slideshow_buttontitle`,`slideshow_contentposition`,`slideshow_urlpage`,`slideshow_creationdate`,`slideshow_updatedate`,`slideshow_publicationdate`
) VALUES (
'.($record->slideshow_id === null ? 'NULL' : intval($record->slideshow_id)).', '.($record->slideshow_identifiant === null ? 'NULL' : $this->_conn->quote2($record->slideshow_identifiant,false)).', '.($record->slideshow_namealias === null ? 'NULL' : $this->_conn->quote2($record->slideshow_namealias,false)).', '.($record->slideshow_entrepriseId === null ? 'NULL' : intval($record->slideshow_entrepriseId)).', '.($record->slideshow_imageonly === null ? 'NULL' : intval($record->slideshow_imageonly)).', '.($record->slideshow_publicationstatus === null ? 'NULL' : intval($record->slideshow_publicationstatus)).', '.($record->slideshow_titre === null ? 'NULL' : $this->_conn->quote2($record->slideshow_titre,false)).', '.($record->slideshow_introductiontext === null ? 'NULL' : $this->_conn->quote2($record->slideshow_introductiontext,false)).', '.($record->slideshow_visuelbackground === null ? 'NULL' : $this->_conn->quote2($record->slideshow_visuelbackground,false)).', '.($record->slideshow_buttontitle === null ? 'NULL' : $this->_conn->quote2($record->slideshow_buttontitle,false)).', '.($record->slideshow_contentposition === null ? 'NULL' : $this->_conn->quote2($record->slideshow_contentposition,false)).', '.($record->slideshow_urlpage === null ? 'NULL' : $this->_conn->quote2($record->slideshow_urlpage,false)).', '.($record->slideshow_creationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_creationdate,false)).', '.($record->slideshow_updatedate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_updatedate,false)).', '.($record->slideshow_publicationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_publicationdate,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('slideshow').'` (
`slideshow_identifiant`,`slideshow_namealias`,`slideshow_entrepriseId`,`slideshow_imageonly`,`slideshow_publicationstatus`,`slideshow_titre`,`slideshow_introductiontext`,`slideshow_visuelbackground`,`slideshow_buttontitle`,`slideshow_contentposition`,`slideshow_urlpage`,`slideshow_creationdate`,`slideshow_updatedate`,`slideshow_publicationdate`
) VALUES (
'.($record->slideshow_identifiant === null ? 'NULL' : $this->_conn->quote2($record->slideshow_identifiant,false)).', '.($record->slideshow_namealias === null ? 'NULL' : $this->_conn->quote2($record->slideshow_namealias,false)).', '.($record->slideshow_entrepriseId === null ? 'NULL' : intval($record->slideshow_entrepriseId)).', '.($record->slideshow_imageonly === null ? 'NULL' : intval($record->slideshow_imageonly)).', '.($record->slideshow_publicationstatus === null ? 'NULL' : intval($record->slideshow_publicationstatus)).', '.($record->slideshow_titre === null ? 'NULL' : $this->_conn->quote2($record->slideshow_titre,false)).', '.($record->slideshow_introductiontext === null ? 'NULL' : $this->_conn->quote2($record->slideshow_introductiontext,false)).', '.($record->slideshow_visuelbackground === null ? 'NULL' : $this->_conn->quote2($record->slideshow_visuelbackground,false)).', '.($record->slideshow_buttontitle === null ? 'NULL' : $this->_conn->quote2($record->slideshow_buttontitle,false)).', '.($record->slideshow_contentposition === null ? 'NULL' : $this->_conn->quote2($record->slideshow_contentposition,false)).', '.($record->slideshow_urlpage === null ? 'NULL' : $this->_conn->quote2($record->slideshow_urlpage,false)).', '.($record->slideshow_creationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_creationdate,false)).', '.($record->slideshow_updatedate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_updatedate,false)).', '.($record->slideshow_publicationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_publicationdate,false)).'
)';
}
   $result = $this->_conn->exec ($query);
   if(!$result)
       return false;
   if($record->slideshow_id < 1 ) 
       $record->slideshow_id= $this->_conn->lastInsertId();
    return $result;
}
public function update ($record){
   $query = 'UPDATE `'.$this->_conn->prefixTable('slideshow').'` SET 
 `slideshow_identifiant`= '.($record->slideshow_identifiant === null ? 'NULL' : $this->_conn->quote2($record->slideshow_identifiant,false)).', `slideshow_namealias`= '.($record->slideshow_namealias === null ? 'NULL' : $this->_conn->quote2($record->slideshow_namealias,false)).', `slideshow_entrepriseId`= '.($record->slideshow_entrepriseId === null ? 'NULL' : intval($record->slideshow_entrepriseId)).', `slideshow_imageonly`= '.($record->slideshow_imageonly === null ? 'NULL' : intval($record->slideshow_imageonly)).', `slideshow_publicationstatus`= '.($record->slideshow_publicationstatus === null ? 'NULL' : intval($record->slideshow_publicationstatus)).', `slideshow_titre`= '.($record->slideshow_titre === null ? 'NULL' : $this->_conn->quote2($record->slideshow_titre,false)).', `slideshow_introductiontext`= '.($record->slideshow_introductiontext === null ? 'NULL' : $this->_conn->quote2($record->slideshow_introductiontext,false)).', `slideshow_visuelbackground`= '.($record->slideshow_visuelbackground === null ? 'NULL' : $this->_conn->quote2($record->slideshow_visuelbackground,false)).', `slideshow_buttontitle`= '.($record->slideshow_buttontitle === null ? 'NULL' : $this->_conn->quote2($record->slideshow_buttontitle,false)).', `slideshow_contentposition`= '.($record->slideshow_contentposition === null ? 'NULL' : $this->_conn->quote2($record->slideshow_contentposition,false)).', `slideshow_urlpage`= '.($record->slideshow_urlpage === null ? 'NULL' : $this->_conn->quote2($record->slideshow_urlpage,false)).', `slideshow_creationdate`= '.($record->slideshow_creationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_creationdate,false)).', `slideshow_updatedate`= '.($record->slideshow_updatedate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_updatedate,false)).', `slideshow_publicationdate`= '.($record->slideshow_publicationdate === null ? 'NULL' : $this->_conn->quote2($record->slideshow_publicationdate,false)).'
 where  `slideshow_id`'.' = '.intval($record->slideshow_id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }
 function getByIdentifiant ($Identifiant){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `slideshow`.`slideshow_identifiant` = \'$Identifiant\'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}

}
 return true; }