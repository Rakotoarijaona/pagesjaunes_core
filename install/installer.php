<?php
/**
* @package   pagesjaunes_core
* @author    R
* @copyright 2017 R
* @link      http://www.pagesjaunes.mg
* @license    All rights reserved
*/

require_once (__DIR__.'/../application.init.php');

jApp::setEnv('install');

$installer = new jInstaller(new textInstallReporter());

$installer->installApplication();

try {
    jAppManager::clearTemp();    
}
catch(Exception $e) {
    echo "WARNING: temporary files cannot be deleted because of this error: ".$e->getMessage().".\nWARNING: Delete temp files by hand immediately!\n";
}
