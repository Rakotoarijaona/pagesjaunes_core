<?php
/**
 * @package     common
 * @subpackage  common
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc ("common~CCommonTools") ;
jClasses::inc ("common~CContent") ;
jClasses::inc ("common~CContentExtraFieldSetting") ;
jClasses::inc ("common~CUser") ;
jClasses::inc ("common~CUserExtraFieldSetting") ;

class CSelectable
{
    var $iContentTypeId ;
    var $iTableTypeId ;

    public function __construct ($_iContentTypeId = null, $_iTableTypeId = null)
    {
        $this->iContentTypeId       = $_iContentTypeId ;
        $this->iTableTypeId         = $_iTableTypeId ;
    }

    // get list
    public function getList ($_oRecToFind = null, $_iTraductionLocaleId = LANG_DEFAULT_ID)
    {
        $toRes = array () ;

        switch ($this->iTableTypeId)
        {
            case CONTENT_TABLE_TYPE_ID :

                $iContentCount                              = 0 ;
                $oContentToFind                             = new stdClass () ;
                $oContentToFind->iContentRemoveStatusId     = NO ;
                $oContentToFind->iContentActivationStatusId = YES ;

                $toSelectContent = CContent::getSelectableList ($oContentToFind, $this->iContentTypeId, 0, "zContentDateActivation", "DESC", $_iTraductionLocaleId, $iContentCount, 0) ;
                // slugs
                $tzSelectLabelSlug = CContentExtraFieldSetting::getSelectLabelSlug ($this->iContentTypeId, $_iTraductionLocaleId) ;

                $tzSelectDescriptionSlug = CContentExtraFieldSetting::getSelectDescriptionSlug ($this->iContentTypeId, $_iTraductionLocaleId) ;

                foreach ($toSelectContent as $oSelectContent)
                {
                    $zSelectLabel = "" ;

                    // label default
                    $tzLabel = array () ;
                    foreach ($tzSelectLabelSlug as $zSelectLabelSlug)
                    {
                        $tzLabel [] = $oSelectContent->$zSelectLabelSlug ;
                    }
                    $zSelectLabel .= implode (" ", $tzLabel) ;
                    // label default

                    // description default
                    if (sizeof ($tzSelectDescriptionSlug) > 0)
                    {
                        $tzDescription = array () ;
                        foreach ($tzSelectDescriptionSlug as $zSelectDescriptionSlug)
                        {
                            $tzDescription [] = $oSelectContent->$zSelectDescriptionSlug ;
                        }
                        $zSelectLabel .= " (" . implode (" ", $tzDescription) . ")" ;
                    }
                    // description default

                    $oSelectable                    = new stdClass () ;
                    $oSelectable->iSelectableId     = $oSelectContent->iContentId ;
                    $oSelectable->zSelectableLabel  = $zSelectLabel ;

                    $toRes [] = $oSelectable ;
                }

            break ;
        }

        return $toRes ;
    }
}
?>