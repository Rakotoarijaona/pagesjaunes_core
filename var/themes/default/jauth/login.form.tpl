<div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top:15%;">
    <div>
        <div>
            <h1 class="logo-name">
                <a href="">
                    <img src="{$j_basepath}commonlibraries/images/logo_pagesjaunes.mg.svg" class="img-responsive" />
                </a>
            </h1>
        </div>
        {if $failed}
            <div class="alert alert-danger">{@jauth~auth.failedToLogin@}</div>
        {/if}
        {if ! $isLogged}
            <div class="m-t">
            {jmessage 'success'}
            {jmessage 'danger'}
            </div>
            <form class="m-t" role="form" action="{formurl 'jauth~login:in'}" method="post" autocomplete="off">
                <div class="form-group">
                    <input autocomplete="off" type="text" class="form-control" placeholder="{@jauth~auth.login@}" required="" name="login" id="login" maxlength="25">
                </div>
                <div class="form-group">
                    <input autocomplete="off" type="password" class="form-control" placeholder="{@jauth~auth.password@}" required="" name="password" id="password" maxlength="25">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" value="{@common~common.login@}" />
                <div class="form-group">
                    <a href="{jurl 'user~auth:forgot_password'}">mot de passe oublié?</a>
                </div>
                {if $showRememberMe}
                    <input type="checkbox" class="i-checks" name="rememberMe" id="rememberMe" value="1"> <span>{@jauth~auth.rememberMe@}</span>
                {/if}
                {formurlparam 'jauth~login:in'}
                {if !empty($auth_url_return)}
                    <input type="hidden" name="auth_url_return" value="{$auth_url_return|eschtml}" />
                {/if}
            </form>
        {else}
            <p>{$user->login} | <a href="{jurl 'jauth~login:out'}" >{@jauth~auth.buttons.logout@}</a></p>
        {/if}
    </div>
</div>
<script src="{$j_basepath}adminlibraries/js/jquery-2.1.1.js"></script>
<script src="{$j_basepath}adminlibraries/js/bootstrap.min.js"></script>
<script src="{$j_basepath}adminlibraries/js/plugins/iCheck/icheck.min.js"></script>
<script>
    {literal}
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    {/literal}
</script>