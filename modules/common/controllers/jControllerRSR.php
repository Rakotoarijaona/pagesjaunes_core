<?php
/**
* @package common
* @subpackage controller
* @version
* @author YSTA
*/

/**
* Controleur de base ajoutant des fonctionalités au controlleur jelix par défaut. 
* Notament pour apporter des éléments de sécurité
* @package NEOV
* @subpackage controller
*/
class jControllerRSR extends jController 
{
    /**
    * same as param(), but do a strip_tags in order to prevent XSS vulnerabilities.
    * If it isn't a string value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param boolean $useDefaultIfEmpty true: says to return the default value the value is ""
    * @return string the request parameter value
    */
    protected function stringParam ($parName, $parDefaultValue=null, $useDefaultIfEmpty=false){
        $value = $this->request->getParam($parName, $parDefaultValue, $useDefaultIfEmpty);
        if(is_string($value))
            return strip_tags(trim($value));
        else
            return null;
    }

    /**
    * same as param(), but do a cleanHTML on the value. If it isn't a string value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param boolean $useDefaultIfEmpty true: says to return the default value the value is ""
    * @return float the request parameter value
    */
    protected function htmlParam ($parName, $parDefaultValue=null, $useDefaultIfEmpty=false){
        $value = $this->request->getParam($parName, $parDefaultValue, $useDefaultIfEmpty);
        if(is_string($value))
            return jFilter::cleanHtml($value);
        else
            return null;
    }

    /**
    * same as htmlParam(), but do not a cleanHTML on the value. If it isn't a string value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param boolean $useDefaultIfEmpty true: says to return the default value the value is ""
    * @return float the request parameter value
    */
    protected function fullHtmlParam ($parName, $parDefaultValue=null, $useDefaultIfEmpty=false){
        $value = $this->request->getParam($parName, $parDefaultValue, $useDefaultIfEmpty);
        return $value;
    }

    /**
    * Gets the value of a request parameter. If not defined, gets it in the session, if dot defined in session return the default value.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return mixed the request parameter value
    */
    protected function persistentParam ($parName, $parDefaultValue=null, $parNamePrefix=''){

        $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }else{
            return $value;
        }
    }
    /**
    * same as persistentParam(), but convert the value to an integer value. If it isn't
    * a numerical value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return integer the request parameter value
    */
    protected function persistentIntParam ($parName, $parDefaultValue=null, $parNamePrefix=''){
        $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }elseif(is_numeric($value)){
            $value = intval($value);
            $_SESSION[$parNamePrefix.'_'.$parName] = $value;
            return $value;
        }else{
            session_unregister($parNamePrefix.'_'.$parName);
            return null;
        }
    }

    /**
    * same as param(), but convert the value to a float value. If it isn't
    * a numerical value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return float the request parameter value
    */
    protected function persistentFloatParam ($parName, $parDefaultValue=null, $parNamePrefix=''){
       $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }elseif(is_numeric($value)){
            $value = floatval($value);
            $_SESSION[$parNamePrefix.'_'.$parName] = $value;
            return $value;
        }else{
            session_unregister($parNamePrefix.'_'.$parName);
            return null;
        }
    }

    /**
    * same as param(), but convert the value to a boolean value. If it isn't
    * a numerical value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return boolean the request parameter value
    */
    protected function persistentBoolParam ($parName, $parDefaultValue=null, $parNamePrefix=''){
       $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }else{
            if($value=="true" || $value == "1" || $value=="on" || $value=="yes"){
                $value = true;
                $_SESSION[$parNamePrefix.'_'.$parName] = $value;
                return $value;
            }elseif($value=="false" || $value == "0" || $value=="off" || $value=="no"){
                $value = false;
                $_SESSION[$parNamePrefix.'_'.$parName] = $value;
                return $value;
            }else{
                session_unregister($parNamePrefix.'_'.$parName);
                return null;
            }
        }
    }

    /**
    * same as persistentParam(), but do a strip_tag on the value. If it isn't a string value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return integer the request parameter value
    */
    protected function persistentStringParam ($parName, $parDefaultValue=null, $parNamePrefix=''){
        $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }elseif(is_string($value)){
            $value = strip_tags($value);
            $_SESSION[$parNamePrefix.'_'.$parName] = $value;
            return $value;
        }else{
            session_unregister($parNamePrefix.'_'.$parName);
            return null;
        }
    }


    /**
    * same as persistentParam(), but do a cleanHtml on the value. If it isn't a string value, return null.
    * @param string  $parName           the name of the request parameter
    * @param mixed   $parDefaultValue   the default returned value if the parameter doesn't exists
    * @param string $parNamePrefix    prefix of the param name in order to prevent variable colission in the session
    * @return integer the request parameter value
    */
    protected function persistentHtmlParam ($parName, $parDefaultValue=null, $parNamePrefix=''){
        $value = $this->request->getParam($parName);
        if(is_null($value)){
            if(isset($_SESSION[$parNamePrefix.'_'.$parName])){
                return $_SESSION[$parNamePrefix.'_'.$parName];
            }else{
                return $parDefaultValue;
            }
        }elseif(is_string($value)){
            $value = jFilter::cleanHtml($value);
            $_SESSION[$parNamePrefix.'_'.$parName] = $value;
            return $value;
        }else{
            session_unregister($parNamePrefix.'_'.$parName);
            return null;
        }
    }
}

