<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/var/themes/default/master_admin/index_login.tpl') > 1474521478){ return false;
} else {
function template_meta_f22a05d51ef5a6517fb51a5f0b0c18f8($t){

}
function template_f22a05d51ef5a6517fb51a5f0b0c18f8($t){
?>

<div id="login-content">

<?php echo $t->_vars['MAIN']; ?>


</div><?php 
}
return true;}
