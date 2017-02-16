<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/user/daos/jelixuser.dao.xml') > 1486027318)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_user_Jx_jelixuser_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $login;
 public $loginalias;
 public $password;
 public $password_clear;
 public $email;
 public $name;
 public $firstname;
 public $lastname;
 public $photo;
 public $token;
 public $date_token;
 public $date_creation;
 public $date_update;
 public $date_lastlogin;
 public $publication_status=2;
 public $activation_status=2;
   public function getSelector() { return "user~jelixuser"; }
   public function getProperties() { return cDao_user_Jx_jelixuser_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_user_Jx_jelixuser_Jx_mysqli::$_pkFields; }
}

class cDao_user_Jx_jelixuser_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'usr' => 
  array (
    'name' => 'usr',
    'realname' => 'jlx_user',
    'pk' => 
    array (
      0 => 'usr_id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'login',
      2 => 'loginalias',
      3 => 'password',
      4 => 'password_clear',
      5 => 'email',
      6 => 'name',
      7 => 'firstname',
      8 => 'lastname',
      9 => 'photo',
      10 => 'token',
      11 => 'date_token',
      12 => 'date_creation',
      13 => 'date_update',
      14 => 'date_lastlogin',
      15 => 'publication_status',
      16 => 'activation_status',
    ),
  ),
);
   protected $_primaryTable = 'usr';
   protected $_selectClause='SELECT `usr`.`usr_id` as `id`, `usr`.`usr_login` as `login`, `usr`.`usr_loginalias` as `loginalias`, `usr`.`usr_password` as `password`, `usr`.`usr_password_clear` as `password_clear`, `usr`.`usr_email` as `email`, `usr`.`usr_name` as `name`, `usr`.`usr_firstname` as `firstname`, `usr`.`usr_lastname` as `lastname`, `usr`.`usr_photo` as `photo`, `usr`.`usr_token` as `token`, `usr`.`usr_date_token` as `date_token`, `usr`.`usr_date_creation` as `date_creation`, `usr`.`usr_date_update` as `date_update`, `usr`.`usr_date_lastlogin` as `date_lastlogin`, `usr`.`usr_publication_status` as `publication_status`, `usr`.`usr_activation_status` as `activation_status`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_user_Jx_jelixuser_Jx_mysqli';
   protected $_daoSelector = 'user~jelixuser';
   public static $_properties = array (
  'id' => 
  array (
    'name' => 'id',
    'fieldName' => 'usr_id',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => true,
    'isPK' => true,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'usr',
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
  'login' => 
  array (
    'name' => 'login',
    'fieldName' => 'usr_login',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
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
  'loginalias' => 
  array (
    'name' => 'loginalias',
    'fieldName' => 'usr_loginalias',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
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
  'password' => 
  array (
    'name' => 'password',
    'fieldName' => 'usr_password',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 120,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'password_clear' => 
  array (
    'name' => 'password_clear',
    'fieldName' => 'usr_password_clear',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 120,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'email' => 
  array (
    'name' => 'email',
    'fieldName' => 'usr_email',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
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
  'name' => 
  array (
    'name' => 'name',
    'fieldName' => 'usr_name',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 60,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'firstname' => 
  array (
    'name' => 'firstname',
    'fieldName' => 'usr_firstname',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 60,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'lastname' => 
  array (
    'name' => 'lastname',
    'fieldName' => 'usr_lastname',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 60,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'photo' => 
  array (
    'name' => 'photo',
    'fieldName' => 'usr_photo',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
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
  'token' => 
  array (
    'name' => 'token',
    'fieldName' => 'usr_token',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 250,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'date_token' => 
  array (
    'name' => 'date_token',
    'fieldName' => 'usr_date_token',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'usr',
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
    'fieldName' => 'usr_date_creation',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'usr',
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
    'fieldName' => 'usr_date_update',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'usr',
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
  'date_lastlogin' => 
  array (
    'name' => 'date_lastlogin',
    'fieldName' => 'usr_date_lastlogin',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'datetime',
    'unifiedType' => 'datetime',
    'table' => 'usr',
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
  'publication_status' => 
  array (
    'name' => 'publication_status',
    'fieldName' => 'usr_publication_status',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => 2,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'activation_status' => 
  array (
    'name' => 'activation_status',
    'fieldName' => 'usr_activation_status',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'usr',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => 2,
    'autoIncrement' => false,
    'comment' => '',
  ),
);
   public static $_pkFields = array('id');
 
public function __construct($conn){
   parent::__construct($conn);
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('jlx_user').'` AS `usr`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `usr`.`usr_id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `usr_id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('jlx_user').'` (
`usr_id`,`usr_login`,`usr_loginalias`,`usr_password`,`usr_password_clear`,`usr_email`,`usr_name`,`usr_firstname`,`usr_lastname`,`usr_photo`,`usr_token`,`usr_date_token`,`usr_date_creation`,`usr_date_update`,`usr_date_lastlogin`,`usr_publication_status`,`usr_activation_status`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->loginalias === null ? 'NULL' : $this->_conn->quote2($record->loginalias,false)).', '.($record->password === null ? 'NULL' : $this->_conn->quote2($record->password,false)).', '.($record->password_clear === null ? 'NULL' : $this->_conn->quote2($record->password_clear,false)).', '.($record->email === null ? 'NULL' : $this->_conn->quote2($record->email,false)).', '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', '.($record->firstname === null ? 'NULL' : $this->_conn->quote2($record->firstname,false)).', '.($record->lastname === null ? 'NULL' : $this->_conn->quote2($record->lastname,false)).', '.($record->photo === null ? 'NULL' : $this->_conn->quote2($record->photo,false)).', '.($record->token === null ? 'NULL' : $this->_conn->quote2($record->token,false)).', '.($record->date_token === null ? 'NULL' : $this->_conn->quote2($record->date_token,false)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->date_lastlogin === null ? 'NULL' : $this->_conn->quote2($record->date_lastlogin,false)).', '.($record->publication_status === null ? 'NULL' : intval($record->publication_status)).', '.($record->activation_status === null ? 'NULL' : intval($record->activation_status)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('jlx_user').'` (
`usr_login`,`usr_loginalias`,`usr_password`,`usr_password_clear`,`usr_email`,`usr_name`,`usr_firstname`,`usr_lastname`,`usr_photo`,`usr_token`,`usr_date_token`,`usr_date_creation`,`usr_date_update`,`usr_date_lastlogin`,`usr_publication_status`,`usr_activation_status`
) VALUES (
'.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->loginalias === null ? 'NULL' : $this->_conn->quote2($record->loginalias,false)).', '.($record->password === null ? 'NULL' : $this->_conn->quote2($record->password,false)).', '.($record->password_clear === null ? 'NULL' : $this->_conn->quote2($record->password_clear,false)).', '.($record->email === null ? 'NULL' : $this->_conn->quote2($record->email,false)).', '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', '.($record->firstname === null ? 'NULL' : $this->_conn->quote2($record->firstname,false)).', '.($record->lastname === null ? 'NULL' : $this->_conn->quote2($record->lastname,false)).', '.($record->photo === null ? 'NULL' : $this->_conn->quote2($record->photo,false)).', '.($record->token === null ? 'NULL' : $this->_conn->quote2($record->token,false)).', '.($record->date_token === null ? 'NULL' : $this->_conn->quote2($record->date_token,false)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->date_lastlogin === null ? 'NULL' : $this->_conn->quote2($record->date_lastlogin,false)).', '.($record->publication_status === null ? 'NULL' : intval($record->publication_status)).', '.($record->activation_status === null ? 'NULL' : intval($record->activation_status)).'
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
   $query = 'UPDATE `'.$this->_conn->prefixTable('jlx_user').'` SET 
 `usr_login`= '.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', `usr_loginalias`= '.($record->loginalias === null ? 'NULL' : $this->_conn->quote2($record->loginalias,false)).', `usr_password_clear`= '.($record->password_clear === null ? 'NULL' : $this->_conn->quote2($record->password_clear,false)).', `usr_email`= '.($record->email === null ? 'NULL' : $this->_conn->quote2($record->email,false)).', `usr_name`= '.($record->name === null ? 'NULL' : $this->_conn->quote2($record->name,false)).', `usr_firstname`= '.($record->firstname === null ? 'NULL' : $this->_conn->quote2($record->firstname,false)).', `usr_lastname`= '.($record->lastname === null ? 'NULL' : $this->_conn->quote2($record->lastname,false)).', `usr_photo`= '.($record->photo === null ? 'NULL' : $this->_conn->quote2($record->photo,false)).', `usr_token`= '.($record->token === null ? 'NULL' : $this->_conn->quote2($record->token,false)).', `usr_date_token`= '.($record->date_token === null ? 'NULL' : $this->_conn->quote2($record->date_token,false)).', `usr_date_creation`= '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', `usr_date_update`= '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', `usr_date_lastlogin`= '.($record->date_lastlogin === null ? 'NULL' : $this->_conn->quote2($record->date_lastlogin,false)).', `usr_publication_status`= '.($record->publication_status === null ? 'NULL' : intval($record->publication_status)).', `usr_activation_status`= '.($record->activation_status === null ? 'NULL' : intval($record->activation_status)).'
 where  `usr_id`'.' = '.intval($record->id).'
';
   $result = $this->_conn->exec ($query);
  $query ='SELECT `usr_password` as `password` FROM `'.$this->_conn->prefixTable('jlx_user').'` WHERE  `usr_id`'.' = '.intval($record->id).'';
  $rs  =  $this->_conn->query ($query, jDbConnection::FETCH_INTO, $record);
  $record =  $rs->fetch ();
   return $result;
 }
 function getByLoginPassword ($login, $password){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `usr`.`usr_login` '.' = '.$this->_conn->quote($login).' AND `usr`.`usr_password` '.' = '.$this->_conn->quote($password).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function getByLogin ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `usr`.`usr_login` '.' = '.$this->_conn->quote($login).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function updatePassword ($login, $password){
    $__query = 'UPDATE `'.$this->_conn->prefixTable('jlx_user').'` SET 
 `usr_password`= '.($password === null ? 'NULL' : $this->_conn->quote2($password,false)).'';
$__query .=' WHERE  `usr_login` '.' = '.$this->_conn->quote($login).'';
    return $this->_conn->exec ($__query);
}
 function deleteByLogin ($login){
    $__query = 'DELETE FROM `'.$this->_conn->prefixTable('jlx_user').'` ';
$__query .=' WHERE  `usr_login` '.' = '.$this->_conn->quote($login).'';
    return $this->_conn->exec ($__query);
}
 function findByLogin ($pattern){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `usr`.`usr_login` '.' LIKE '.$this->_conn->quote($pattern).' ORDER BY `usr`.`usr_login` asc';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function findAll (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  1=1  ORDER BY `usr`.`usr_login` asc';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}

}
 return true; }