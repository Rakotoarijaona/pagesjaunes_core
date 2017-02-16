<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/var/themes/default/jauth/login.form.tpl') > 1481611172){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.formurl.php');
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.formurlparam.php');
function template_meta_e867509d90cdadf5aa77293af075f3f6($t){

}
function template_e867509d90cdadf5aa77293af075f3f6($t){
?><div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top:15%;">
    <div>
        <div>
            <h1 class="logo-name">
                <a href="">
                    <img src="<?php echo $t->_vars['j_basepath']; ?>commonlibraries/images/logo_pagesjaunes.mg.svg" class="img-responsive" />
                </a>
            </h1>
        </div>
        <?php if($t->_vars['failed']):?>

            <div class="alert alert-danger"><?php echo jLocale::get('jauth~auth.failedToLogin'); ?></div>
        <?php endif;?>

        <?php if(! $t->_vars['isLogged']):?>
            <form class="m-t" role="form" action="<?php jtpl_function_html_formurl( $t,'jauth~login:in');?>" method="post" autocomplete="off">
                <div class="form-group">
                    <input autocomplete="off" type="text" class="form-control" placeholder="<?php echo jLocale::get('jauth~auth.login'); ?>" required="" name="login" id="login" maxlength="25">
                </div>
                <div class="form-group">
                    <input autocomplete="off" type="password" class="form-control" placeholder="<?php echo jLocale::get('jauth~auth.password'); ?>" required="" name="password" id="password" maxlength="25">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" value="<?php echo jLocale::get('common~common.login'); ?>" />
                <div class="form-group">
                    <a href="<?php jtpl_function_html_jurl( $t,'user~auth:forgot_password');?>">mot de passe oublié?</a>
                </div>
                <?php if($t->_vars['showRememberMe']):?>
                    <input type="checkbox" class="i-checks" name="rememberMe" id="rememberMe" value="1"> <span><?php echo jLocale::get('jauth~auth.rememberMe'); ?></span>
                <?php endif;?>

                <?php jtpl_function_html_formurlparam( $t,'jauth~login:in');?>
                <?php if(!empty($t->_vars['auth_url_return'])):?>
                    <input type="hidden" name="auth_url_return" value="<?php echo htmlspecialchars($t->_vars['auth_url_return']); ?>" />
                <?php endif;?>

            </form>
        <?php else:?>
            <p><?php echo $t->_vars['user']->login; ?> | <a href="<?php jtpl_function_html_jurl( $t,'jauth~login:out');?>" ><?php echo jLocale::get('jauth~auth.buttons.logout'); ?></a></p>
        <?php endif;?>

    </div>
</div>
<script src="<?php echo $t->_vars['j_basepath']; ?>adminlibraries/js/jquery-2.1.1.js"></script>
<script src="<?php echo $t->_vars['j_basepath']; ?>adminlibraries/js/bootstrap.min.js"></script>
<script src="<?php echo $t->_vars['j_basepath']; ?>adminlibraries/js/plugins/iCheck/icheck.min.js"></script>
<script>
    
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    

</script><?php 
}
return true;}
