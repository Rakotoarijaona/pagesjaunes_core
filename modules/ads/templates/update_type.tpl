<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'ads~ads:list_type'}">Type de publicités</a>
            </li>
            <li class="active">
                <a><strong>{$oAds_type->name}</strong></a>
            </li>
        </ol>       
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adsform" role="form" action="{jurl 'ads~ads:save_update_type'}" method="POST">
                        <input type="hidden" name="id" id="id" value="{$oAds_type->id}"/>
                        <div class="form-group r-form">
                            <label>Nom *</label>
                            <div>
                                <input type="text" id="adstypename" name="adstypename" class="form-control" style="max-width:350px;" value="{$oAds_type->name}" />
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Format *</label>
                            <div>
                                <input type="text" id="adstypeformatwidth" name="adstypeformatwidth" class="form-control" style="max-width:100px;display:inline-block;" value="{$oAds_type->splitFormat()[0]}" />&nbsp; x &nbsp;<input type="text" id="adstypeformatheight" name="adstypeformatheight" class="form-control" style="max-width:100px;display:inline-block;"  value="{$oAds_type->splitFormat()[1]}"/>&nbsp; <strong>pixels</strong>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Types de fichiers *</label> 
                            <textarea id="typefichier" name="typefichier" class="form-control" style="max-width:350px;">{$oAds_type->type_fichier}</textarea>
                            <span class="help-block m-b-none"><em>Séparer les types par des virgules (,) ex: jpg, png, gif</em></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Publié</label>
                            <div class="input-group">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioispublie1" value="1" name="ispublie" {if ($oAds_type->is_publie == '1')}checked{/if} value="1" name="ispublie">
                                    <label for="radioispublie1"> oui </label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioispublie2" value="0" name="ispublie" {if ($oAds_type->is_publie == '0')}checked{/if}>
                                    <label for="radioispublie2"> non </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>           
                              <a href="{jurl 'ads~ads:list_type'}" class="btn btn-white" id="cancel">Annuler</a>
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
    $('#adsform').validate({        
        rules: {
            adstypename: {
                required: true,
                remote: {
                    url: "{/literal}{jurl 'ads~ads:updateAdsTypeNameExist'}{literal}",
                    type: "post",
                    data: {
                        id: function () {
                            return $("#id").val();
                        },
                        name: function () {
                            return $("#adstypename").val();
                        }
                    }
                }
            },
            adstypeformatwidth: {
                required: true
            },
            adstypeformatheight: {
                required: true
            },
            typefichier: {
                required: true
            }
        },
        messages: {
            adstypename: {
                required: "Ce champ est obligatoire",
                remote: "Le nom éxiste déjà"
            },
            adstypeformatwidth: "Ce champ est obligatoire",
            adstypeformatheight: "Ce champ est obligatoire",
            typefichier: "Ce champ est obligatoire"
        }
    });
    
});
</script>
{/literal}