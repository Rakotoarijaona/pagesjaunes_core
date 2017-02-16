<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/common/templates/nav.zone.tpl') > 1486980344){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_5590bc56a45db3a5b93f303e17b798c1($t){

}
function template_5590bc56a45db3a5b93f303e17b798c1($t){
?><nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" width="48px" class="img-circle" src="<?php echo $t->_vars['j_basepath']; ?>photos/thumbnail/<?php echo $t->_vars['oUser']->usr_photo; ?>" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?php echo $t->_vars['oUser']->usr_name; ?></strong>
                            </span>
                            <span class="text-muted text-xs block"><?php echo $t->_vars['oUser']->get_User_Group_name(); ?></span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    PJ
                </div>
            </li>
            <?php foreach($t->_vars['toMenu'] as $t->_vars['item']):?>
                <?php if((sizeof($t->_vars['item']->childItems) <= 0)):?>
                    <li <?php if($t->_vars['item']->zMenuId == $t->_vars['selectedMenuItem']):?> class="active"<?php endif;?>>
                        <a href="<?php jtpl_function_html_jurl( $t,$t->_vars['item']->zMenuContent);?>">
                            <i class="fa <?php echo $t->_vars['item']->zMenuIcon; ?>"></i><span class="nav-label"><?php echo $t->_vars['item']->zMenuLabel; ?></span>
                        </a>
                    </li>
                <?php else:?>
                    <li <?php if($t->_vars['item']->zMenuId == $t->_vars['selectedMenuItem']):?> class="active"<?php endif;?>>
                        <a href="#"><i class="fa <?php echo $t->_vars['item']->zMenuIcon; ?>"></i> <span class="nav-label"><?php echo $t->_vars['item']->zMenuLabel; ?></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <?php foreach($t->_vars['item']->childItems as $t->_vars['childItems']):?>
                                <li <?php if($t->_vars['childItems']->zMenuId == $t->_vars['selectedMenuChildItem']):?> class="active"<?php endif;?>><a href="<?php jtpl_function_html_jurl( $t,$t->_vars['childItems']->zMenuContent);?>"><?php echo $t->_vars['childItems']->zMenuLabel; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
    </div>
</nav><?php 
}
return true;}
