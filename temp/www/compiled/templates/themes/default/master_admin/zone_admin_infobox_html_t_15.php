<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/var/themes/default/master_admin/zone_admin_infobox.tpl') > 1474521478){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_6c6559916a79d12f5d54d59e4a342ab1($t){

}
function template_6c6559916a79d12f5d54d59e4a342ab1($t){
?><ul>
        <li id="info-user">
            
            <span id="info-user-login"><?php echo htmlspecialchars($t->_vars['user']->login); ?></span>
            <?php  if(jAcl2::check('auth.user.view')):?>

            | <a href="<?php jtpl_function_html_jurl( $t,'jauthdb_admin~user:index', array('j_user_login'=>$t->_vars['user']->login));?>"><?php echo jLocale::get('master_admin~gui.header.your.account'); ?></a>
            <?php  endif; ?>
            | <a href="<?php jtpl_function_html_jurl( $t,'jauth~login:out');?>" id="info-user-logout"><?php echo jLocale::get('master_admin~gui.header.disconnect'); ?></a>
        </li>
        <?php foreach($t->_vars['infoboxitems'] as $t->_vars['item']):?>
            <li <?php if($t->_vars['item']->icon):?> style="background-image:url(<?php echo $t->_vars['item']->icon; ?>);"<?php endif;?>>
                <?php if($t->_vars['item']->type == 'url'):?><a href="<?php echo htmlspecialchars($t->_vars['item']->content); ?>"><?php echo htmlspecialchars($t->_vars['item']->label); ?></a>
                <?php else:?><?php echo $t->_vars['item']->content; ?><?php endif;?>
            </li>
        <?php endforeach;?>
</ul><?php 
}
return true;}
