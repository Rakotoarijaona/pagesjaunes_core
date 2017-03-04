<?php
/**
 * @package     pagesjaunes_core
 * @subpackage  user
 * @author      
 * @contributor 
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("profile~CJacl2Group");

class CUser
{
    public $usr_id;
    public $usr_login;
    public $usr_loginalias;
    public $usr_password;
    public $usr_password_clear;
    public $usr_email;
    public $usr_name;
    public $usr_firstname;
    public $usr_lastname;
    public $usr_photo;
    public $usr_token;
    public $usr_date_token;
    public $usr_date_creation;
    public $usr_date_update;
    public $usr_date_lastlogin;
    public $usr_publication_status;
    public $usr_activation_status;
    public $usr_typeLabel;

    // constructor
    public function __construct($user_typeId = null, $user_typeLabel = "")
    {
        $this->usr_id = null;
        $this->usr_login = null;
        $this->usr_loginalias = null;
        $this->usr_password;
        $this->usr_password_clear;
        $this->usr_email;
        $this->usr_name;
        $this->usr_firstname;
        $this->usr_lastname;
        $this->usr_photo;
        $this->usr_token;
        $this->usr_date_token;
        $this->usr_date_creation;
        $this->usr_date_update;
        $this->usr_date_lastlogin;
        $this->usr_publication_status;
        $this->usr_activation_status;
        $this->usr_typeLabel = CUser::get_Group_label($this->usr_login);
    }

    // Récupération des données à partir de record vers un object (mapping)
    protected function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->usr_id = $record->id;
            $this->usr_login = $record->login;
            $this->usr_loginalias = $record->loginalias;
            $this->usr_password = $record->password;
            $this->usr_email = $record->email;
            $this->usr_name = $record->name;
            $this->usr_firstname = $record->firstname;
            $this->usr_lastname = $record->lastname;
            $this->usr_photo = $record->photo;
            $this->usr_datecreation = $record->date_creation;
            $this->usr_dateupdate = $record->date_update;
            $this->usr_publicationstatus = $record->publication_status;
            $this->usr_activationstatus = $record->activation_status;
            $this->usr_typeLabel = CUser::get_Group_label($this->usr_login);
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    protected function fetchIntoRecord(&$record)
    {
        $record->id = $this->usr_id;

        if (isset($this->usr_login)) {
            $record->login = (!empty($this->usr_login)) ? $this->usr_login : null;
        }
        if (isset($this->usr_loginalias)) {
            $record->loginalias = (!empty($this->usr_loginalias)) ? $this->usr_loginalias : null;
        }
        if (isset($this->usr_password)) {
            $record->password = (!empty($this->usr_password)) ? $this->usr_password : null;
        }
        if (isset($this->usr_email)) {
            $record->email = (!empty($this->usr_email)) ? $this->usr_email : null;
        }
        if (isset($this->usr_name)) {
            $record->name = (!empty($this->usr_name)) ? $this->usr_name : null;
        }
        if (isset($this->usr_firstname)) {
            $record->firstname = (!empty($this->usr_firstname)) ? $this->usr_firstname : null;
        }
        if (isset($this->usr_lastname)) {
            $record->lastname = (!empty($this->usr_lastname)) ? $this->usr_lastname : null;
        }
        if (isset($this->usr_photo)) {
            $record->photo = (!empty($this->usr_photo)) ? $this->usr_photo : null;
        }
        if (isset($this->usr_datecreation)) {
            $record->datecreation = (!empty($this->usr_datecreation)) ? $this->usr_datecreation : null;
        }
        if (isset($this->usr_dateupdate)) {
            $record->dateupdate = (!empty($this->usr_dateupdate)) ? $this->usr_dateupdate : null;
        }
        if (isset($this->usr_publicationstatus)) {
            $record->publicationstatus = (!empty($this->usr_publicationstatus)) ? $this->usr_publicationstatus : null;
        }
        if (isset($this->usr_activationstatus)) {
            $record->activationstatus = (!empty($this->usr_activationstatus)) ? $this->usr_activationstatus : null;
        }
    }

    // Get List
    public static function getList ()
    {
        $toRes = array () ;
        $userFactory = jDao::get('user~jelixuser');
        $res = $userFactory->findAll();
        $userList = $res->fetchAll();
        $toResult = array();
        foreach ($userList as $user)
        {
            $oUser = new CUser();
            $oUser->fetchFromRecord($user);
            $toResult[] = $oUser;
        }
        return $toResult ;
    }


    //test doublons
    public static function ifLoginExist($loginalias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jlx_user").' WHERE usr_loginalias ="'.$loginalias.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateLoginExist($id, $loginalias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jlx_user").' WHERE usr_id <> '.$id.' AND usr_loginalias ="'.$loginalias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }

    //test doublons email
    public static function ifEmailExist($email)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jlx_user").' WHERE usr_email ="'.$email.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons email
    public static function ifUpdateEmailExist($id, $email)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jlx_user").' WHERE usr_id <> '.$id.' AND usr_email ="'.$email.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }

    //get user by his login
    public static function getUserByLogin ($login)
    {
        $userFactory = jDao::get('user~jelixuser');
        $res = $userFactory->getByLogin($login);
        $oUser = new CUser();
        if ($res)
        {
            $oUser->fetchFromRecord($res);
        }
        return $oUser ;
    }

    //Get group Label
    public static function get_Group_label($login)
    {
        $userFactory = jDao::get('common~jacl2_user_group');
        $res = $userFactory->getGroupsUser($login);
        foreach ($res as $row)
            return $row->id_aclgrp;
    }

    //Get group
    public static function get_User_Group($usr_login)
    {
        $userFactory = jDao::get('common~jacl2_user_group');
        $res = $userFactory->getGroupsUser($usr_login);
        foreach ($res as $row)
        {
            $oGroup = CJacl2Group::getGroupByCode($row->id_aclgrp);
            return $oGroup;
        }
        return false;
    }

    //Get group
    public function get_User_Group_name()
    {
        $userFactory = jDao::get('profile~jacl2group');
        $res = $userFactory->get($this->usr_typeLabel);
        return $res->name;
    }

    // create
    public function create()
    {
        if (empty($this->defaultUser_id)) {

            $connectedUser  = (jAuth::isConnected()) ? jAuth::getUserSession() : jDao::createRecord('user~jelixuser');
            $daoDefaultUser = jDao::get('user~jelixuser');
            $recDefaultUser = jDao::createRecord('user~jelixuser');

            if (!empty($this->usr_password)) {
                $userObject = jAuth::createUserObject($this->usr_login, $this->usr_password);
                $this->usr_password = $userObject->password;
            }

            $this->usr_adminId = $connectedUser->id;
            $this->fetchIntoRecord($recDefaultUser);
            $daoDefaultUser->insert($recDefaultUser);
            $this->usr_id = $recDefaultUser->id;

            // acl2
            jAcl2DbUserGroup::createUser($this->usr_login);
            jAcl2DbUserGroup::addUserToGroup($this->usr_login, $this->usr_typeLabel);
        }
    }

    // read
    public function read(&$nbRecs = 0, $filters = array(), $localeId = LANG_DEFAULT_ID, $oneRecord = true, $hasPagination = false, $currentPage = 1, $sortField = "user_id", $sortSens = "DESC", $numValPerPage = NB_DATA_PER_PAGE_BO)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query = "SELECT SQL_CALC_FOUND_ROWS * FROM " . $cnx->prefixTable("jlx_user");

        // filters
        if (!empty($filters)) {
            $query .= " WHERE ";
            $query .= (sizeof($filters) > 1) ? implode(" AND ", $filters) : $filters[0];
        }

        // tri
        if (!empty($sortField) && !empty($sortSens)) {
            $query .= " ORDER BY " . $sortField . " " . $sortSens;
        }

        // pagination
        if ($hasPagination) {
            $query .= " LIMIT " . ($currentPage - 1) * $numValPerPage . ", " . $numValPerPage;
        }

        $res = $cnx->query($query);

        if (!is_null($nbRecs)) {
            // --- nombre des lignes pour la pagination
            $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
            $rsCount = $cnx->query($queryDataCount);
            $resCount = $rsCount->fetch();
            $nbRecs = $resCount->numRows;
        }

        foreach ($res as $row) {
            $user = new CUser();
            $user->fetchFromRecord($row);
            CCommonTools::encodeDaoRecUtf8($user);
            $results[] = $user;
        }

        if ($oneRecord) {
            return (isset($results[0])) ? $results[0] : new CUser();
        } else {
            return $results;
        }
    }

    // update
    public function update($usr_login)
    {
        $jAuthUserRecords = jAuth::getUser($usr_login);
        if ($this->usr_login != $jAuthUserRecords->login) {
            $jAuthUserRecords->login = $this->usr_login;
        }
        if ($this->usr_password != $jAuthUserRecords->password) {
            jAuth::changePassword($usr_login, $this->usr_password);
        }
        if ($this->usr_email != $jAuthUserRecords->email) {
            $jAuthUserRecords->email = $this->usr_email;
        }
        if (strtoupper($this->usr_name) != strtoupper($jAuthUserRecords->name)) {
            $jAuthUserRecords->name = strtoupper($this->usr_name);    
        }
        if ($this->usr_lastname != $jAuthUserRecords->lastname) {
            $jAuthUserRecords->lastname = $this->usr_lastname;
        }
        if ($this->usr_photo != $jAuthUserRecords->photo) {
            $jAuthUserRecords->photo = $this->usr_photo;
        }
        if ($this->usr_photo != $jAuthUserRecords->photo) {
            $jAuthUserRecords->photo = $this->usr_photo;
        }
        if ($this->usr_typeLabel != CUser::get_Group_label($this->usr_login)) {
            CUser::update_user_group($this->usr_login,$this->usr_typeLabel);
        }
        jAuth::updateUser($jAuthUserRecords);
    }

    // Changer mot de passe
    public function changePassword($usr_login)
    {
        jAuth::changePassword($usr_login, $this->usr_password);
    }

    // generate token
    public function createToken()
    {
        $jAuthUserRecords = jAuth::getUser($this->usr_login);
        if ($jAuthUserRecords->login) {
            $jAuthUserRecords->token = CCommonTools::getRandString(60, '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $jAuthUserRecords->date_token = CCommonTools::RgetDateNowSQL();
            jAuth::updateUser($jAuthUserRecords);
        }
    }

    // Remove token
    public static function destroyToken($usr_login)
    {
        $jAuthUserRecords = jAuth::getUser($usr_login);
        if ($jAuthUserRecords->login) {
            $jAuthUserRecords->token = '';
            $jAuthUserRecords->date_token = '';
            jAuth::updateUser($jAuthUserRecords);
        }
    }

    // delete
    public static function delete($user_id = 0)
    {
        $groupLabel = CUser::get_Group_label($user_id);
        if ($groupLabel != 'superadmin')
        {
            jAcl2DbUserGroup::removeUser($user_id);
            jAuth::removeUser($user_id);
        }
    }

    // Update group
    public static function update_user_group($login,$newgroupid)
    {
        $oldgroupid = CUser::get_Group_label($login);
        jAcl2DbUserGroup::removeUserFromGroup($login,$oldgroupid);
        jAcl2DbUserGroup::addUserToGroup($login, $newgroupid);
    }

    // get locales
    public static function getLanguages($language_localeId = LANG_DEFAULT_ID) 
    {
        $languagesJson = array();
        $daoLanguage = jDao::get('common~language');
        $languages = $daoLanguage->findAll(array('language_localeId' => $language_localeId));
        foreach ($languages as $language) {
            $languagesJson[] = array(
                "id" => $language->language_contentId,
                "text" => $language->language_name
            );
        }
        return (!empty($languagesJson)) ? json_encode($languagesJson) : "''";
    }

    // get countries
    public static function getCountries($country_localeId = LANG_DEFAULT_ID)
    {
        $countriesJson = array();
        $countries = CCountry::getList(null, $country_localeId);
        foreach ($countries as $country) {
            $countriesJson[] = array(
                "id" => $country->iCountryId,
                "text" => $country->zCountryTranslatableName
            );
        }
        return (!empty($countriesJson)) ? json_encode($countriesJson) : "''";
    }

    // get civilities
    public static function getCivilities($civility_localeId = LANG_DEFAULT_ID)
    {
        $civilitiesJson = array();
        $daoCivility = jDao::get('common~civility');

        $conditions = jDao::createConditions();
        $conditions->addCondition('civility_localeId', '=', $civility_localeId);
        $conditions->addItemOrder('civility_id','desc');
        $civilities = $daoCivility->findBy($conditions);

        foreach ($civilities as $civility) {
            $civilitiesJson[] = array(
                "id" => $civility->civility_id,
                "text" => $civility->civility_label
            );
        }
        return (!empty($civilitiesJson)) ? json_encode($civilitiesJson) : "''";
    }

    // can remove
    public function canremove()
    {
        $eventresp = jEvent::notify ('AuthCanRemoveUser', array('login'=>$this->usr_login));
        foreach($eventresp->getResponse() as $rep){
            if(!isset($rep['canremove']) || $rep['canremove'] === false)
                return false;
        }
        return true;
    }
}
?>