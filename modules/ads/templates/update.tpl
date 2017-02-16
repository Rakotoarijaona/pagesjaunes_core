<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'ads~ads:index'}">Publicités</a>
            </li>
            <li class="active">
                <a><strong>Ajouter</strong></a>
            </li>
        </ol>       
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adsform" role="form" action="{jurl 'ads~ads:save_update'}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="{$oAds->id}"/>
                        <div class="form-group r-form">
                            <label>Nom *</label>
                            <div>
                                <input type="text" id="name" name="name" class="form-control" style="max-width:350px;" value="{$oAds->name}"/>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Type *</label>
                            <div>
                                <div class="form-control disabled" style="max-width:350px;">{$oAdsType->name} </div>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Image *</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-heught: 300px;">
                                    <img src="{$j_basepath}publicites/big/{$oAds->images}" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 400px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                    <input type="file" class="default" id="image" name="image"/>
                                    </span>&nbsp;
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Durée * (en secondes)</label>
                            <div>
                                <input type="text" id="duree" name="duree" class="form-control" style="max-width:70px; text-align:right;" value="{$oAds->duree}"/>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Annonceur</label>
                            <div>
                                <select id="annonceur" name="annonceur" class="form-control chosen-select" style="max-width:350px;" tabindex="2">
                                    <option value=''>Selection...</option>
                                    {if (sizeof($toListEntreprise)>0)}
                                    {foreach ($toListEntreprise as $rowAnnonceur)}
                                    <option value='{$rowAnnonceur->id}' {if ($rowAnnonceur->id == $oAds->annonceur)} selected {/if}>{$rowAnnonceur->raisonsociale} </option>
                                    {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Catégorie / Sous-catégorie</label>
                            <div>
                                <select id="souscategorie" name="souscategorie[]" data-placeholder="Selection..." style="max-width:350px;" class="souscategorie chosen-select form-control" multiple style="width:100%;" tabindex="4">
                                    <option value=''>Selection...</option>
                                    {if (sizeof($toListCategorieSouscategorie)>0)}
                                    {foreach ($toListCategorieSouscategorie as $rowCategorie)}
                                    <optgroup label="{$rowCategorie['categorie']->name}">
                                        {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                        <option value='{$souscategorie->id}'>{$souscategorie->name} </option>
                                        {/foreach}
                                    </optgroup>
                                    {/foreach}
                                    {/if}
                                </select>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Description</label> 
                            <textarea id="description" name="description" class="form-control description" style="max-width:350px;">{$oAds->description}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Par défaut</label>
                            <div class="input-group">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioisdefault1" value="1" name="isdefault" {if ($oAds->is_default == '1')}checked{/if}>
                                    <label for="radioisdefault1"> oui </label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioisdefault2" value="0" name="isdefault" {if ($oAds->is_default == '0')}checked{/if}>
                                    <label for="radioisdefault2"> non </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Publié</label>
                            <div class="input-group">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioispublie1" value="1" name="ispublie" {if ($oAds->is_publie == '1')}checked{/if}>
                                    <label for="radioispublie1"> oui </label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioispublie2" value="0" name="ispublie" {if ($oAds->is_publie == '0')}checked{/if}>
                                    <label for="radioispublie2"> non </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>           
                              <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
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
    // init chosen
    var souscategoriesJSON = {/literal}{$souscategoriesJSON}{literal};
    $("#souscategorie option").each(function(){
        for (i=0; i<souscategoriesJSON.length; i++)
        {
            if ($(this).val() == souscategoriesJSON[i].id)
            {
                $(this).attr('selected', 'selected');
            }
        }
    });
    var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Aucun resultat'},
            '.chosen-select-width'     : {width:"95%"}
            }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    $('#adsform').validate({        
        rules: {
            name: {
                required: true,
                remote: {
                    url: "{/literal}{jurl 'ads~ads:updateAdsNameExist'}{literal}",
                    type: "post",
                    data: {
                        id: function () {
                            return $("#id").val();
                        },
                        name: function () {
                            return $("#name").val();
                        }
                    }
                }
            },
            annonceur: {
             required: true
            }
        },
        messages: {
            name: {
                required: "Ce champ est obligatoire",
                remote: "Le nom éxiste déjà"
            },
            annonceur: "Ce champ est obligatoire"
        }
    });
});
</script>
{/literal}