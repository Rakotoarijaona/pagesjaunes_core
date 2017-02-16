<?php
/**
* @package     pagesjaunes_core
* @subpackage  profile
* @author      R
* @copyright   2016
* @link        http://www.jelix.org
*/

jClasses::inc ("common~CCommonTools");

class CJacl2Group {

    var $iGroupId;
    var $zGroupName;
    var $zGroupNameAlias;
    public function __construct (){ }

     // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord (&$_oRecord)
    {
        $this->iGroupId                 = $_oRecord->id_aclgrp ;
        $this->zGroupName               = $_oRecord->name ;
        $this->zGroupAlias               = $_oRecord->namealias ;
    }

    // Récupération des données à partir d'un objet vers un record (mapping)
    public function fetchIntoRecord (&$_oRecord)
    {
        $_oRecord->id_aclgrp            = $this->iGroupId;
        $_oRecord->name                 = $this->zGroupName;
        $_oRecord->namealias            = $this->zGroupNameAlias;
    }

    /**
     * get group list
     */
     
    public static function getList ()
    {
        $toRes = array () ;
        $groupFactory = jDao::get('profile~jacl2group');
        $res = $groupFactory->findAllPublicGroup();
        $groupList = $res->fetchAll();
        $toResult = array();
        foreach ($groupList as $group)
        {
            $oCJacl2Group = new CJacl2Group ();
            $oCJacl2Group->fetchFromRecord($group);
            $toResult[] = $oCJacl2Group;
        }
        return $toResult ;
    }
    public function hasUser()
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ("jacl2_user_group")." WHERE id_aclgrp ='".$this->iGroupId."'");
        $i = 0;
        foreach ($res as $value) {            
            $i++;
        }
        return $i;
    }
    public static function exist($id_aclgrp)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query("SELECT * FROM ".$cnx->prefixTable ("jacl2_group")." WHERE id_aclgrp ='".$id_aclgrp."'");
        $i = 0;
        foreach ($res as $value) {            
            $i++;
        }
        return $i;
    }

    /**
    * get group by code
    **/
    public static function getGroupByCode($iGroupId)
    {
        $groupFactory = jDao::get('profile~jacl2group');
        $res = $groupFactory->getGroupByCode($iGroupId);
        if ($res == '') {
            return null ;
        }
        else {
            $oCJacl2Group = new CJacl2Group ();
            $oCJacl2Group->fetchFromRecord($res);
            return $oCJacl2Group ;
        }
    }
    /**
     * Indicates if the current user is a member of the given user group
     * @param string $groupid The id of a group
     * @return boolean true if it's ok
     */
    public static function isMemberOfGroup ($groupid){
        return in_array($groupid, self::getGroups());
    }

    protected static $groups = null;

    public static function getGroups(){
        if(!jAuth::isConnected()) {
            self::$groups = null;
            return array();
        }

        // load groups
        if(self::$groups === null){
            $gp = jDao::get('jacl2db~jacl2usergroup', 'jacl2_profile')
                    ->getGroupsUser(jAuth::getUserSession()->login);
            self::$groups = array();
            foreach($gp as $g){
                self::$groups[] = $g->id_aclgrp;
            }

        }
        return self::$groups;
    }

    
    /**
     * Create a new group
     * @param string $name its name
     * @param string $id_aclgrp its id
     * @return string the id of the new group
     */
    public static function createGroup($name, $id_aclgrp = null){
        if ($id_aclgrp === null)
        {
            $id_aclgrp = CCommonTools::generateAlias ($name,'_');
            if (CJacl2Group::exist($id_aclgrp) == 0)
            {
                $group = jDao::createRecord('profile~jacl2group');
                $group->id_aclgrp = $id_aclgrp;
                $group->name = $name;
                $namealias = CCommonTools::generateAlias ($name,'');
                $group->namealias = $namealias;
                $group->grouptype = 0;
                jDao::get('jacl2db~jacl2group','jacl2_profile')->insert($group);
                return $group->id_aclgrp;
            }
        }
    }
    /**
     * Change the name of a group
     * @param string $groupid the group id
     * @param string $name the new name
     */
    public static function updateGroup($groupid, $name){
        if( $groupid == '__anonymous')
            throw new Exception ('jAcl2DbUserGroup::updateGroup : invalid group id');
        $group = jDao::get('jacl2db~jacl2group','jacl2_profile')->changeName($groupid, $name);
    }
    /**
     * delete a group from the acl system
     * @param string $groupid the group id
     */
    public static function removeGroup($groupid){
        if( $groupid == '__anonymous')
            throw new Exception ('jAcl2DbUserGroup::removeGroup : invalid group id');
        // remove all the rights attached to the group
        jDao::get('jacl2db~jacl2rights','jacl2_profile')->deleteByGroup($groupid);
        // remove the users from the group
        jDao::get('jacl2db~jacl2usergroup','jacl2_profile')->deleteByGroup($groupid);
        // remove the group itself
        jDao::get('jacl2db~jacl2group','jacl2_profile')->delete($groupid);
    }


    //test doublons
    public static function ifNameExist($namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jacl2_group").' WHERE id_aclgrp ="'.$namealias.'"' );
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
     //test doublons
    public static function ifUpdateNameExist($id, $namealias)
    {
        $cnx = jDb::getConnection();
        $res = $cnx->query('SELECT * FROM '.$cnx->prefixTable ("jacl2_group").' WHERE id_aclgrp <> "'.$id.'" AND namealias ="'.$namealias.'"');
        $i = 0;
        if (sizeof($res->fetch())>0)
        {
            $i = 1;
        }
        return $i;
    }
 }