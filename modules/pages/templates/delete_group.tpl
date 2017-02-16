<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pages</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'pages~pages:index'}">Pages</a>
            </li>
            <li class="active">
                <a><strong>Supprimer</strong></a>
            </li>
        </ol>       
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adsform" role="form" action="{jurl 'pages~pages:save_delete_group'}" method="POST">
                        <div class="form-group r-form">
                            <p>Êtes-vous sure de vouloir supprimer le(s) page(s): <br />
                                <div class="row">
                                {foreach $toListPages as $oPages}
                                    <div>
                                        - {$oPages->name}
                                        <input type="hidden" name="id[]" value="{$oPages->id}"/>
                                    </div>
                                {/foreach}
                                </div>
                            </p>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <button type="submit" class="btn btn-primary btn-save">Oui</button>              
                              <a href="{jurl 'pages~pages:index'}" class="btn btn-white" id="cancel">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{$SCRIPT}
{literal}
<script type="text/javascript">
$(document).ready(function()
{
    
    
});
</script>
{/literal}