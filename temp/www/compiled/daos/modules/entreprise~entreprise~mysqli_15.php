<?php 
if (jApp::config()->compilation['checkCacheFiletime']&&(

 filemtime('G:\wamp\pagesjaunes_core/modules/entreprise/daos/entreprise.dao.xml') > 1486792007)){ return false;
}
else {
 require_once ( JELIX_LIB_PATH .'dao/jDaoRecordBase.class.php');
 require_once ( JELIX_LIB_PATH .'dao/jDaoFactoryBase.class.php');

class cDaoRecord_entreprise_Jx_entreprise_Jx_mysqli extends jDaoRecordBase {
 public $id;
 public $raisonsociale;
 public $activite;
 public $adresse;
 public $region;
 public $logo;
 public $contact_interne;
 public $fonction_contact;
 public $url_website;
 public $video_presentation_active;
 public $video_presentation;
 public $qui_sommes_nous_active;
 public $qui_sommes_nous;
 public $nos_services_active;
 public $nos_services;
 public $nos_references_active;
 public $nos_references;
 public $videos_active;
 public $galerie_image_active;
 public $latitude;
 public $longitude;
 public $position_recherche;
 public $nombre_visite;
 public $is_publie;
 public $date_creation;
 public $date_update;
 public $catalogue_active=0;
 public $editer_front_active=0;
 public $weight=0;
 public $login;
 public $password;
 public $clear_password;
   public function getSelector() { return "entreprise~entreprise"; }
   public function getProperties() { return cDao_entreprise_Jx_entreprise_Jx_mysqli::$_properties; }
   public function getPrimaryKeyNames() { return cDao_entreprise_Jx_entreprise_Jx_mysqli::$_pkFields; }
}

class cDao_entreprise_Jx_entreprise_Jx_mysqli extends jDaoFactoryBase {
   protected $_tables = array (
  'entreprise' => 
  array (
    'name' => 'entreprise',
    'realname' => 'entreprise',
    'pk' => 
    array (
      0 => 'id',
    ),
    'fields' => 
    array (
      0 => 'id',
      1 => 'raisonsociale',
      2 => 'activite',
      3 => 'adresse',
      4 => 'region',
      5 => 'logo',
      6 => 'contact_interne',
      7 => 'fonction_contact',
      8 => 'url_website',
      9 => 'video_presentation_active',
      10 => 'video_presentation',
      11 => 'qui_sommes_nous_active',
      12 => 'qui_sommes_nous',
      13 => 'nos_services_active',
      14 => 'nos_services',
      15 => 'nos_references_active',
      16 => 'nos_references',
      17 => 'videos_active',
      18 => 'galerie_image_active',
      19 => 'latitude',
      20 => 'longitude',
      21 => 'position_recherche',
      22 => 'nombre_visite',
      23 => 'is_publie',
      24 => 'date_creation',
      25 => 'date_update',
      26 => 'catalogue_active',
      27 => 'editer_front_active',
      28 => 'weight',
      29 => 'login',
      30 => 'password',
      31 => 'clear_password',
    ),
  ),
);
   protected $_primaryTable = 'entreprise';
   protected $_selectClause='SELECT `entreprise`.`id`, `entreprise`.`raisonsociale`, `entreprise`.`activite`, `entreprise`.`adresse`, `entreprise`.`region`, `entreprise`.`logo`, `entreprise`.`contact_interne`, `entreprise`.`fonction_contact`, `entreprise`.`url_website`, `entreprise`.`video_presentation_active`, `entreprise`.`video_presentation`, `entreprise`.`qui_sommes_nous_active`, `entreprise`.`qui_sommes_nous`, `entreprise`.`nos_services_active`, `entreprise`.`nos_services`, `entreprise`.`nos_references_active`, `entreprise`.`nos_references`, `entreprise`.`videos_active`, `entreprise`.`galerie_image_active`, `entreprise`.`latitude`, `entreprise`.`longitude`, `entreprise`.`position_recherche`, `entreprise`.`nombre_visite`, `entreprise`.`is_publie`, `entreprise`.`date_creation`, `entreprise`.`date_update`, `entreprise`.`catalogue_active`, `entreprise`.`editer_front_active`, `entreprise`.`weight`, `entreprise`.`login`, `entreprise`.`password`, `entreprise`.`clear_password`';
   protected $_fromClause;
   protected $_whereClause='';
   protected $_DaoRecordClassName='cDaoRecord_entreprise_Jx_entreprise_Jx_mysqli';
   protected $_daoSelector = 'entreprise~entreprise';
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
    'table' => 'entreprise',
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
  'raisonsociale' => 
  array (
    'name' => 'raisonsociale',
    'fieldName' => 'raisonsociale',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'activite' => 
  array (
    'name' => 'activite',
    'fieldName' => 'activite',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'adresse' => 
  array (
    'name' => 'adresse',
    'fieldName' => 'adresse',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'mediumtext',
    'unifiedType' => 'text',
    'table' => 'entreprise',
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
  'region' => 
  array (
    'name' => 'region',
    'fieldName' => 'region',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'logo' => 
  array (
    'name' => 'logo',
    'fieldName' => 'logo',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'contact_interne' => 
  array (
    'name' => 'contact_interne',
    'fieldName' => 'contact_interne',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'fonction_contact' => 
  array (
    'name' => 'fonction_contact',
    'fieldName' => 'fonction_contact',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'url_website' => 
  array (
    'name' => 'url_website',
    'fieldName' => 'url_website',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'video_presentation_active' => 
  array (
    'name' => 'video_presentation_active',
    'fieldName' => 'video_presentation_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'video_presentation' => 
  array (
    'name' => 'video_presentation',
    'fieldName' => 'video_presentation',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'qui_sommes_nous_active' => 
  array (
    'name' => 'qui_sommes_nous_active',
    'fieldName' => 'qui_sommes_nous_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'qui_sommes_nous' => 
  array (
    'name' => 'qui_sommes_nous',
    'fieldName' => 'qui_sommes_nous',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'longtext',
    'unifiedType' => 'text',
    'table' => 'entreprise',
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
  'nos_services_active' => 
  array (
    'name' => 'nos_services_active',
    'fieldName' => 'nos_services_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'nos_services' => 
  array (
    'name' => 'nos_services',
    'fieldName' => 'nos_services',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'longtext',
    'unifiedType' => 'text',
    'table' => 'entreprise',
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
  'nos_references_active' => 
  array (
    'name' => 'nos_references_active',
    'fieldName' => 'nos_references_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'nos_references' => 
  array (
    'name' => 'nos_references',
    'fieldName' => 'nos_references',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'longtext',
    'unifiedType' => 'text',
    'table' => 'entreprise',
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
  'videos_active' => 
  array (
    'name' => 'videos_active',
    'fieldName' => 'videos_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'galerie_image_active' => 
  array (
    'name' => 'galerie_image_active',
    'fieldName' => 'galerie_image_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'latitude' => 
  array (
    'name' => 'latitude',
    'fieldName' => 'latitude',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'longitude' => 
  array (
    'name' => 'longitude',
    'fieldName' => 'longitude',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
  'position_recherche' => 
  array (
    'name' => 'position_recherche',
    'fieldName' => 'position_recherche',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
  'nombre_visite' => 
  array (
    'name' => 'nombre_visite',
    'fieldName' => 'nombre_visite',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
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
    'table' => 'entreprise',
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
    'table' => 'entreprise',
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
    'table' => 'entreprise',
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
  'catalogue_active' => 
  array (
    'name' => 'catalogue_active',
    'fieldName' => 'catalogue_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => 0,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'editer_front_active' => 
  array (
    'name' => 'editer_front_active',
    'fieldName' => 'editer_front_active',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'tinyint',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => 0,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'weight' => 
  array (
    'name' => 'weight',
    'fieldName' => 'weight',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'int',
    'unifiedType' => 'integer',
    'table' => 'entreprise',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => NULL,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => 0,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'login' => 
  array (
    'name' => 'login',
    'fieldName' => 'login',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
    'fieldName' => 'password',
    'regExp' => NULL,
    'required' => true,
    'requiredInConditions' => true,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
    'updatePattern' => '%s',
    'insertPattern' => '%s',
    'selectPattern' => '%s',
    'sequenceName' => '',
    'maxlength' => 200,
    'minlength' => NULL,
    'ofPrimaryTable' => true,
    'defaultValue' => NULL,
    'autoIncrement' => false,
    'comment' => '',
  ),
  'clear_password' => 
  array (
    'name' => 'clear_password',
    'fieldName' => 'clear_password',
    'regExp' => NULL,
    'required' => false,
    'requiredInConditions' => false,
    'isPK' => false,
    'isFK' => false,
    'datatype' => 'varchar',
    'unifiedType' => 'varchar',
    'table' => 'entreprise',
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
   $this->_fromClause = ' FROM `'.$this->_conn->prefixTable('entreprise').'` AS `entreprise`';
}
 
 protected function _getPkWhereClauseForSelect($pk){
   extract($pk);
 return ' WHERE  `entreprise`.`id`'.' = '.intval($id).'';
}
 
protected function _getPkWhereClauseForNonSelect($pk){
   extract($pk);
   return ' where  `id`'.' = '.intval($id).'';
}
public function insert ($record){
 if($record->id > 0 ){
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('entreprise').'` (
`id`,`raisonsociale`,`activite`,`adresse`,`region`,`logo`,`contact_interne`,`fonction_contact`,`url_website`,`video_presentation_active`,`video_presentation`,`qui_sommes_nous_active`,`qui_sommes_nous`,`nos_services_active`,`nos_services`,`nos_references_active`,`nos_references`,`videos_active`,`galerie_image_active`,`latitude`,`longitude`,`position_recherche`,`nombre_visite`,`is_publie`,`date_creation`,`date_update`,`catalogue_active`,`editer_front_active`,`weight`,`login`,`password`,`clear_password`
) VALUES (
'.($record->id === null ? 'NULL' : intval($record->id)).', '.($record->raisonsociale === null ? 'NULL' : $this->_conn->quote2($record->raisonsociale,false)).', '.($record->activite === null ? 'NULL' : $this->_conn->quote2($record->activite,false)).', '.($record->adresse === null ? 'NULL' : $this->_conn->quote2($record->adresse,false)).', '.($record->region === null ? 'NULL' : $this->_conn->quote2($record->region,false)).', '.($record->logo === null ? 'NULL' : $this->_conn->quote2($record->logo,false)).', '.($record->contact_interne === null ? 'NULL' : $this->_conn->quote2($record->contact_interne,false)).', '.($record->fonction_contact === null ? 'NULL' : $this->_conn->quote2($record->fonction_contact,false)).', '.($record->url_website === null ? 'NULL' : $this->_conn->quote2($record->url_website,false)).', '.($record->video_presentation_active === null ? 'NULL' : intval($record->video_presentation_active)).', '.($record->video_presentation === null ? 'NULL' : $this->_conn->quote2($record->video_presentation,false)).', '.($record->qui_sommes_nous_active === null ? 'NULL' : intval($record->qui_sommes_nous_active)).', '.($record->qui_sommes_nous === null ? 'NULL' : $this->_conn->quote2($record->qui_sommes_nous,false)).', '.($record->nos_services_active === null ? 'NULL' : intval($record->nos_services_active)).', '.($record->nos_services === null ? 'NULL' : $this->_conn->quote2($record->nos_services,false)).', '.($record->nos_references_active === null ? 'NULL' : intval($record->nos_references_active)).', '.($record->nos_references === null ? 'NULL' : $this->_conn->quote2($record->nos_references,false)).', '.($record->videos_active === null ? 'NULL' : intval($record->videos_active)).', '.($record->galerie_image_active === null ? 'NULL' : intval($record->galerie_image_active)).', '.($record->latitude === null ? 'NULL' : $this->_conn->quote2($record->latitude,false)).', '.($record->longitude === null ? 'NULL' : $this->_conn->quote2($record->longitude,false)).', '.($record->position_recherche === null ? 'NULL' : intval($record->position_recherche)).', '.($record->nombre_visite === null ? 'NULL' : intval($record->nombre_visite)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->catalogue_active === null ? 'NULL' : intval($record->catalogue_active)).', '.($record->editer_front_active === null ? 'NULL' : intval($record->editer_front_active)).', '.($record->weight === null ? 'NULL' : intval($record->weight)).', '.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->password === null ? 'NULL' : $this->_conn->quote2($record->password,false)).', '.($record->clear_password === null ? 'NULL' : $this->_conn->quote2($record->clear_password,false)).'
)';
}else{
    $query = 'INSERT INTO `'.$this->_conn->prefixTable('entreprise').'` (
`raisonsociale`,`activite`,`adresse`,`region`,`logo`,`contact_interne`,`fonction_contact`,`url_website`,`video_presentation_active`,`video_presentation`,`qui_sommes_nous_active`,`qui_sommes_nous`,`nos_services_active`,`nos_services`,`nos_references_active`,`nos_references`,`videos_active`,`galerie_image_active`,`latitude`,`longitude`,`position_recherche`,`nombre_visite`,`is_publie`,`date_creation`,`date_update`,`catalogue_active`,`editer_front_active`,`weight`,`login`,`password`,`clear_password`
) VALUES (
'.($record->raisonsociale === null ? 'NULL' : $this->_conn->quote2($record->raisonsociale,false)).', '.($record->activite === null ? 'NULL' : $this->_conn->quote2($record->activite,false)).', '.($record->adresse === null ? 'NULL' : $this->_conn->quote2($record->adresse,false)).', '.($record->region === null ? 'NULL' : $this->_conn->quote2($record->region,false)).', '.($record->logo === null ? 'NULL' : $this->_conn->quote2($record->logo,false)).', '.($record->contact_interne === null ? 'NULL' : $this->_conn->quote2($record->contact_interne,false)).', '.($record->fonction_contact === null ? 'NULL' : $this->_conn->quote2($record->fonction_contact,false)).', '.($record->url_website === null ? 'NULL' : $this->_conn->quote2($record->url_website,false)).', '.($record->video_presentation_active === null ? 'NULL' : intval($record->video_presentation_active)).', '.($record->video_presentation === null ? 'NULL' : $this->_conn->quote2($record->video_presentation,false)).', '.($record->qui_sommes_nous_active === null ? 'NULL' : intval($record->qui_sommes_nous_active)).', '.($record->qui_sommes_nous === null ? 'NULL' : $this->_conn->quote2($record->qui_sommes_nous,false)).', '.($record->nos_services_active === null ? 'NULL' : intval($record->nos_services_active)).', '.($record->nos_services === null ? 'NULL' : $this->_conn->quote2($record->nos_services,false)).', '.($record->nos_references_active === null ? 'NULL' : intval($record->nos_references_active)).', '.($record->nos_references === null ? 'NULL' : $this->_conn->quote2($record->nos_references,false)).', '.($record->videos_active === null ? 'NULL' : intval($record->videos_active)).', '.($record->galerie_image_active === null ? 'NULL' : intval($record->galerie_image_active)).', '.($record->latitude === null ? 'NULL' : $this->_conn->quote2($record->latitude,false)).', '.($record->longitude === null ? 'NULL' : $this->_conn->quote2($record->longitude,false)).', '.($record->position_recherche === null ? 'NULL' : intval($record->position_recherche)).', '.($record->nombre_visite === null ? 'NULL' : intval($record->nombre_visite)).', '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', '.($record->catalogue_active === null ? 'NULL' : intval($record->catalogue_active)).', '.($record->editer_front_active === null ? 'NULL' : intval($record->editer_front_active)).', '.($record->weight === null ? 'NULL' : intval($record->weight)).', '.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', '.($record->password === null ? 'NULL' : $this->_conn->quote2($record->password,false)).', '.($record->clear_password === null ? 'NULL' : $this->_conn->quote2($record->clear_password,false)).'
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
   $query = 'UPDATE `'.$this->_conn->prefixTable('entreprise').'` SET 
 `raisonsociale`= '.($record->raisonsociale === null ? 'NULL' : $this->_conn->quote2($record->raisonsociale,false)).', `activite`= '.($record->activite === null ? 'NULL' : $this->_conn->quote2($record->activite,false)).', `adresse`= '.($record->adresse === null ? 'NULL' : $this->_conn->quote2($record->adresse,false)).', `region`= '.($record->region === null ? 'NULL' : $this->_conn->quote2($record->region,false)).', `logo`= '.($record->logo === null ? 'NULL' : $this->_conn->quote2($record->logo,false)).', `contact_interne`= '.($record->contact_interne === null ? 'NULL' : $this->_conn->quote2($record->contact_interne,false)).', `fonction_contact`= '.($record->fonction_contact === null ? 'NULL' : $this->_conn->quote2($record->fonction_contact,false)).', `url_website`= '.($record->url_website === null ? 'NULL' : $this->_conn->quote2($record->url_website,false)).', `video_presentation_active`= '.($record->video_presentation_active === null ? 'NULL' : intval($record->video_presentation_active)).', `video_presentation`= '.($record->video_presentation === null ? 'NULL' : $this->_conn->quote2($record->video_presentation,false)).', `qui_sommes_nous_active`= '.($record->qui_sommes_nous_active === null ? 'NULL' : intval($record->qui_sommes_nous_active)).', `qui_sommes_nous`= '.($record->qui_sommes_nous === null ? 'NULL' : $this->_conn->quote2($record->qui_sommes_nous,false)).', `nos_services_active`= '.($record->nos_services_active === null ? 'NULL' : intval($record->nos_services_active)).', `nos_services`= '.($record->nos_services === null ? 'NULL' : $this->_conn->quote2($record->nos_services,false)).', `nos_references_active`= '.($record->nos_references_active === null ? 'NULL' : intval($record->nos_references_active)).', `nos_references`= '.($record->nos_references === null ? 'NULL' : $this->_conn->quote2($record->nos_references,false)).', `videos_active`= '.($record->videos_active === null ? 'NULL' : intval($record->videos_active)).', `galerie_image_active`= '.($record->galerie_image_active === null ? 'NULL' : intval($record->galerie_image_active)).', `latitude`= '.($record->latitude === null ? 'NULL' : $this->_conn->quote2($record->latitude,false)).', `longitude`= '.($record->longitude === null ? 'NULL' : $this->_conn->quote2($record->longitude,false)).', `position_recherche`= '.($record->position_recherche === null ? 'NULL' : intval($record->position_recherche)).', `nombre_visite`= '.($record->nombre_visite === null ? 'NULL' : intval($record->nombre_visite)).', `is_publie`= '.($record->is_publie === null ? 'NULL' : intval($record->is_publie)).', `date_creation`= '.($record->date_creation === null ? 'NULL' : $this->_conn->quote2($record->date_creation,false)).', `date_update`= '.($record->date_update === null ? 'NULL' : $this->_conn->quote2($record->date_update,false)).', `catalogue_active`= '.($record->catalogue_active === null ? 'NULL' : intval($record->catalogue_active)).', `editer_front_active`= '.($record->editer_front_active === null ? 'NULL' : intval($record->editer_front_active)).', `weight`= '.($record->weight === null ? 'NULL' : intval($record->weight)).', `login`= '.($record->login === null ? 'NULL' : $this->_conn->quote2($record->login,false)).', `password`= '.($record->password === null ? 'NULL' : $this->_conn->quote2($record->password,false)).', `clear_password`= '.($record->clear_password === null ? 'NULL' : $this->_conn->quote2($record->clear_password,false)).'
 where  `id`'.' = '.intval($record->id).'
';
   $result = $this->_conn->exec ($query);
   return $result;
 }
 function getByLoginPassword ($login, $password){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `entreprise`.`login` '.' = '.$this->_conn->quote($login).' AND `entreprise`.`password` '.' = '.$this->_conn->quote($password).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function getByLogin ($login){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `entreprise`.`login` '.' = '.$this->_conn->quote($login).'';
    $__rs = $this->_conn->limitQuery($__query,0,1);
    $this->finishInitResultSet($__rs);
    return $__rs->fetch();
}
 function updatePassword ($login, $password){
    $__query = 'UPDATE `'.$this->_conn->prefixTable('entreprise').'` SET 
 `password`= '.($password === null ? 'NULL' : $this->_conn->quote2($password,false)).'';
$__query .=' WHERE  `login` '.' = '.$this->_conn->quote($login).'';
    return $this->_conn->exec ($__query);
}
 function deleteByLogin ($login){
    $__query = 'DELETE FROM `'.$this->_conn->prefixTable('entreprise').'` ';
$__query .=' WHERE  `login` '.' = '.$this->_conn->quote($login).'';
    return $this->_conn->exec ($__query);
}
 function findByLogin ($pattern){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  `entreprise`.`login` '.' LIKE '.$this->_conn->quote($pattern).' ORDER BY `entreprise`.`login` asc';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}
 function findAll (){
    $__query =  $this->_selectClause.$this->_fromClause.$this->_whereClause;
$__query .=' WHERE  1=1  ORDER BY `entreprise`.`date_creation` desc';
    $__rs = $this->_conn->query($__query);
    $this->finishInitResultSet($__rs);
    return $__rs;
}

}
 return true; }