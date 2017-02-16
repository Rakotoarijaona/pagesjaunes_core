<?php
/**
* @package     pagesjaunes_core
* @subpackage  right
* @author      R
*/
/**
 * This class is used to manage rights. Works only with db driver of jAcl2.
 * @package     jelix
 * @subpackage  acl
 * @static
 */
class CRight {

    /**
     * @internal The constructor is private, because all methods are static
     */
    private function __construct (){ }

    /**
     * add a right on the given subject/group/resource
     * @param string    $group the group id.
     * @param string $subject the key of the subject
     * @param string $resource the id of a resource
     * @return boolean  true if the right is set
     */
    public static function addRight($group, $subject, $resource='-'){
        $sbj = jDao::get('jacl2db~jacl2subject', 'jacl2_profile')->get($subject);
        if(!$sbj) return false;

        if(empty($resource))
            $resource = '-';

        //  add the new value
        $daoright = jDao::get('jacl2db~jacl2rights', 'jacl2_profile');
        $right = $daoright->get($subject,$group,$resource);
        if(!$right){
            $right = jDao::createRecord('jacl2db~jacl2rights', 'jacl2_profile');
            $right->id_aclsbj = $subject;
            $right->id_aclgrp = $group;
            $right->id_aclres = $resource;
            $right->canceled = 0;
            $daoright->insert($right);
        }
        else if ($right->canceled) {
            $right->canceled = false;
            $daoright->update($right);
        }
        jAcl2::clearCache();
        return true;
    }
    /**
     * remove a right on the given subject/group/resource. The given right for this group will then
     * inherit from other groups if the user is in multiple groups of users.
     * @param string    $group the group id.
     * @param string $subject the key of the subject
     * @param string $resource the id of a resource
     * @param boolean $canceled true if the removing is to cancel a right, instead of an inheritance
     */
    public static function removeRight($group, $subject, $resource='-', $canceled = false){
        if(empty($resource))
            $resource = '-';

        $daoright = jDao::get('jacl2db~jacl2rights', 'jacl2_profile');
        if ($canceled) {
            $right = $daoright->get($subject,$group,$resource);
            if(!$right){
                $right = jDao::createRecord('jacl2db~jacl2rights', 'jacl2_profile');
                $right->id_aclsbj = $subject;
                $right->id_aclgrp = $group;
                $right->id_aclres = $resource;
                $right->canceled = $canceled;
                $daoright->insert($right);
            }
            else if ($right->canceled != $canceled) {
                $right->canceled = $canceled;
                $daoright->update($right);
            }
        }
        else {
            $daoright->delete($subject,$group,$resource);
        }
        jAcl2::clearCache();
    }

    /**
     * update rights on the given group. Select all right of the given group, remove all unchecked right
     * Rights with resources are not changed.
     * @param string    $group the group id.
     * @param array  $rights list of rights key=subject, value=true or non empty string
     */
    public static function updateRightsOnGroup ($group, $rights){
        $dao = jDao::get('jacl2db~jacl2rights', 'jacl2_profile');

        // retrieve old rights.
        $oldrights = array();
        $rs = $dao->getRightsByGroup($group);
        foreach($rs as $rec){
            $oldrights [$rec->id_aclsbj] = ($rec->canceled?'n':'y');
        }

        // set new rights.  we modify $oldrights in order to have
        // only deprecated rights in $oldrights
        foreach($rights as $sbj=>$val) {
            self::addRight($group, $sbj);
            unset($oldrights[$sbj]);
        }

        if (count($oldrights)) {
            // $oldrights contains now rights to remove
            $dao->deleteByGroupAndSubjects($group, array_keys($oldrights));
        }

        jAcl2::clearCache();
    }

    /**
     * set rights on the given group. Only rights on given subjects are changed.
     * Rights with resources are not changed.
     * @param string    $group the group id.
     * @param array  $rights list of rights key=subject, value=true or non empty string
     */
    public static function setRightsOnGroup($group, $rights){
        $dao = jDao::get('jacl2db~jacl2rights', 'jacl2_profile');

        // retrieve old rights.
        $oldrights = array();
        $rs = $dao->getRightsByGroup($group);
        foreach($rs as $rec){
            $oldrights [$rec->id_aclsbj] = ($rec->canceled?'n':'y');
        }

        // set new rights.  we modify $oldrights in order to have
        // only deprecated rights in $oldrights
        foreach($rights as $sbj=>$val) {
            if ($val === '' || $val == false) {
                // remove
            }
            else if ($val === true || $val == 'y') {
                self::addRight($group, $sbj);
                unset($oldrights[$sbj]);
            }
            else if ($val == 'n') {
                // cancel
                if (isset($oldrights[$sbj]))
                    unset($oldrights[$sbj]);
                self::removeRight($group, $sbj, '', true);
            }
        }

        if (count($oldrights)) {
            // $oldrights contains now rights to remove
            $dao->deleteByGroupAndSubjects($group, array_keys($oldrights));
        }

        jAcl2::clearCache();
    }

    public static function getRightsByGroups($group){
        $dao = jDao::get('jacl2db~jacl2rights', 'jacl2_profile');
        $rs = $dao->getRightsByGroup($group);
        $rights = array ();
        foreach($rs as $rec){
            if ($rec->canceled)
                continue;
            $rights [$rec->id_aclsbj] = "checked";
        }
        return $rights;
    }
}