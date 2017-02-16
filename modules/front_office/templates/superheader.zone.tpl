<div class="container">
    <nav class="list-inline">
        <li class="dropdown">
            {ifuserconnected}
                <a href="{jurl 'front_office~user:out'}" title="Se déconnecter">
                    <i class="fa fa-sign-out"></i> <span>Se déconnecter</span>
                </a>
            {else}
                <a href="#" title="Se connecter" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="fa fa-power-off"></i> <span>Se connecter</span>
                </a>
            {/ifuserconnected}
            <div class="login-wrapper dropdown-menu">
                <form name="loginform-wplfta" id="loginform-wplfta"  role="search" action="{jurl 'front_office~user:in'}" method="post">
                    <input type="password" name="password" id="password" value="" style="display:none;" />
                    <div class="form-group">
                        <input autocomplete="off" type="text" name="lg" id="lg" class="form-control search-text" placeholder="Votre identifiant">
                    </div>
                    <div class="form-group">
                        <input autocomplete="off" type="password" name="ps" id="ps" class="form-control search-text" placeholder="Votre mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="wp-submit" id="wp-submit" class="button-primary btn btn-default " value="Se connecter" />
                        <input type="reset" id="searchsubmit" class="btn btn-default btn-reset" value="Annuler" />
                        <input type="hidden" name="redirect_to" value="http://www.pagesjaunes.mg/page-edition-entreprise/">
                    </div>
                </form>
            </div>
        </li>
        <li><a href="{jurl 'front_office~inscription'}" title="S'inscrire"><i class="fa fa-pencil"></i> <span>S'inscrire</span></a></li>
        <li><i class="fa fa-hand-o-right"></i><a href="{jurl 'front_office~contact'}" title="Nous contacter"><span>Nous contacter</span></a></li>
        <div class="clearfix"></div>
        {ifusernotconnected}
            {if isset($error) && ($error == 2)}
                <span class="label label-danger">Login et/ou mot de passe incorrect !</span>
            {/if}
        {/ifusernotconnected}
    </nav>
    <p class="logo"><a href="{jurl 'front_office~default:index'}" title="Pages Jaunes Madagascar"><img src="{$j_basepath}frontlibraries/images/logo_pagesjaunes.png"></a></p>
</div>