<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/common/templates/header.zone.tpl') > 1483822116){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_c0266481700d17a86d2b29b492d41a37($t){

}
function template_c0266481700d17a86d2b29b492d41a37($t){
?><div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">

                <li>
                    <a href="<?php jtpl_function_html_jurl( $t,'jauth~login:out');?>">
                        <i class="fa fa-sign-out"></i> Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
    </div><?php 
}
return true;}
