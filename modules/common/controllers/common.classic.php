<?php
/**
* @package   pagesjaunes_core
* @subpackage common
* @author    your name
* @copyright 2011 your name
* @link      http://www.yourwebsite.undefined
* @license    All rights reserved
*/

require_once (jApp::appPath().'modules/common/controllers/jControllerRSR.php');

jClasses::inc("common~CCommonTools");

class commonCtrl extends jControllerRSR
{
    public $pluginParams = array(
        '*' => array('auth.required' => false)
    );

    // generate captcha
    function generateCaptcha()
    {
        $resp = $this->getResponse('noheader');
        $resp->addHttpHeader('Content-Type', 'image/png');

        $code = CCommonTools::initCaptchaSession();

        $char1 = substr($code,0, 1);
        $char2 = substr($code,1, 1);
        $char3 = substr($code,2, 1);
        $char4 = substr($code,3, 1);
        $char5 = substr($code,4, 1);

        $font = 'frontlibraries/fonts/leelawadee/leelawad-webfont.ttf';
        $image = imagecreatefrompng('frontlibraries/images/captcha.png');

        $colors = array(
            imagecolorallocate($image, 131, 154, 255),
            imagecolorallocate($image,  89, 186, 255),
            imagecolorallocate($image, 155, 190, 214),
            imagecolorallocate($image, 255, 128, 234),
            imagecolorallocate($image, 255, 123, 123)
        );

        imagettftext($image, 18, -10, 20, 25, CCommonTools::randomArray($colors), $font, $char1);
        imagettftext($image, 18, 20, 57, 25, CCommonTools::randomArray($colors), $font, $char2);
        imagettftext($image, 18, -35, 75, 25, CCommonTools::randomArray($colors), $font, $char3);
        imagettftext($image, 18, 25, 120, 25, CCommonTools::randomArray($colors), $font, $char4);
        imagettftext($image, 18, -15, 140, 25, CCommonTools::randomArray($colors), $font, $char5);

        imagepng($image);
        imagedestroy($image);

        return $resp;
    }

    // test if captcha code is correct
    public function isValidCaptcha()
    {
        $resp = $this->getResponse("text");
        $resp->content = $_SESSION [session_id()]["SESS_CAPTCHA"] == md5($this->param('code'))? "true" : "false";
        return $resp;
    }

    /**
    * 404 error page
    */
    public function notfound() {
        $resp = $this->getResponse('html');
        $resp->setHttpStatus('404', 'Forbidden');
        $tpl = new jTpl();
        $resp->body->assign('MAIN', $tpl->fetch('common~404'));

        return $resp;
    }

    /**
    * 403 error page
    * @since 1.0.1
    */
    public function badright() {
        $resp = $this->getResponse('html');
        $resp->setHttpStatus('403', 'Forbidden');
        $tpl = new jTpl();
        $resp->body->assign('MAIN', $tpl->fetch('common~403'));

        return $resp;
    }
}

