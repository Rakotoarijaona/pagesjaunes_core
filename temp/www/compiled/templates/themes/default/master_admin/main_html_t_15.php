<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/var/themes/default/master_admin/main.tpl') > 1487238659){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/meta.html.php');
function template_meta_4fe55c8f9265a8f7dce6a80ac827762e($t){
jtpl_meta_html_html( $t,'bodyattr',array('class'=>''));

}
function template_4fe55c8f9265a8f7dce6a80ac827762e($t){
?>
<div id="wrapper">
    <?php echo $t->_vars['NAV']; ?>
    <?php echo $t->_vars['HEADER']; ?>
    <?php echo $t->_vars['MAIN']; ?>
</div>
<div class="modal inmodal" id="remoteModal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="remoteModal">
</div>
<?php 
}
return true;}
