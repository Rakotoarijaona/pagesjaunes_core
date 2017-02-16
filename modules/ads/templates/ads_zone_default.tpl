<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'ads~ads_zone:index'}">Zone de publicité</a>
            </li>
            <li class="active">
                <a><strong>Pubs par défaut</strong></a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>Zone: {$oAdsZone->name}</h2>
                    <form id="adzoneform" role="form" action="{jurl 'ads~ads_zone:save_ajout'}" method="POST">
                        <input type="hidden" name="zone_id" id="zone_id" value="{$oAdsZone->id}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group r-form">
                                    <label>Nombre de pubs</label>
                                    <input type="text" id="nb_pub" name="nb_pub" class="form-control" style="width:200px" value=""/>
                                </div>
                                <div class="form-group r-form">
                                    <label>Méthode d'affichage</label>
                                    <select class="form-control" name="cost_model" id="cost_model" style="width:200px">
                                        <option value="1">Renseigner les éspaces vides</option>
                                        <option value="2">Weighted ad rotation</option>
                                        <option value="3">Rotate equally with purchases</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Formulaire
                                    </div>
                                    <div class="panel-body" id="adsform">
                                        <div class="form-group r-form">
                                            <label>Type</label>
                                            <select class="form-control" name="ad_type" id="ad_type" style="width:300px">
                                                <option value="1">Image</option>
                                                <option value="2">Html</option>
                                            </select>
                                        </div>
                                        <div class="form-group r-form">
                                            <div style="width:300px">
                                                <label>Catégorie / sous-catégorie</label>
                                                <select class="form-control m-b" name="categorie_filtre">
                                                    <option value="">Selection :</option>
                                                    {foreach ($oListCategorie as $rowCategorie)}
                                                    <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;">{$rowCategorie['categorie']->name}</option>
                                                        {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                                        <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}'>{$souscategorie->name} </option>
                                                        {/foreach}
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group r-form" id="ad_image">
                                            <label>Image</label>
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
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
                                        <div class="form-group r-form" id="ad_html">
                                            <label class="control-label">Html</label> 
                                            <textarea class="form-control ckeditor" name="html" id="html"></textarea>
                                        </div>
                                        <div class="form-group r-form">
                                            <label>Lien ad</label>
                                            <input type="text" id="lien_ad" name="lien_ad" class="form-control" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
                                            <button type="button" onclick="saveNewAd()" class="btn btn-success btn-save-ad">Enregistrer le pub par défaut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Liste des pubs par défauts
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <button type="button" onclick="newAd()" class="btn btn-white"><i class="fa fa-plus"></i> Nouveau</button>
                                        </div>
                                        <div id="ad_list">
                                            <table class="table table-hover table-responsive">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Contenu</th>
                                                    <th>Info</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                    {if (sizeof($toAdsZoneDefault)>0)}
                                                        {foreach ($toAdsZoneDefault as $oAdsZoneDefault)}
                                                            <tr>
                                                                <td>#{$i++}</td>
                                                                <td>
                                                                    {if ($oAdsZoneDefault->type == 1)}
                                                                    image
                                                                    {elseif ($oAdsZoneDefault->type == 2)}
                                                                    html
                                                                    {/if}
                                                                </td>
                                                                <td>
                                                                    {if ($oAdsZoneDefault->type == 1)}
                                                                        <img src="{$j_basepath}publicites/thumbnail/{$oAdsZoneDefault->image}" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image">
                                                                    {elseif ($oAdsZoneDefault->type == 2)}
                                                                        <i class="fa fa-file-code-o"></i>
                                                                    {/if}
                                                                </td>
                                                                <td>
                                                                    {if (!empty($oAdsZoneDefault->souscategorie_id))}
                                                                        Sous catégorie: {$oAdsZoneDefault->getSouscategorie()->name}
                                                                    {elseif (!empty($oAdsZoneDefault->categorie))}
                                                                        Catégorie : {$oAdsZoneDefault->getCategorie()->name}
                                                                    {/if}
                                                                </td>
                                                            </tr>
                                                        {/foreach}
                                                    {else}
                                                        <tr>
                                                            <td colspan="5"><div class="alert alert-info">Aucunne donnée</div></td>
                                                        </tr>
                                                    {/if}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
                                <button type="submit" class="btn btn-success btn-save">Enregistrer tous</button>
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
    newAdFormInit();
});

// Initialisation de la form
function newAdFormInit()
{
    CKEDITOR.replace('html');
    validator = $('#adzoneform').validate();
    toggleHideByType();
}

// gestion des affichages d'input par rapport au type choisi
function toggleHideByType()
{    
    if ($('select[name="ad_type"]').val() == '1')
    {
        $('#ad_html').addClass('hide');
        $('#ad_image').removeClass('hide');
    }
    else
    {
        $('#ad_html').removeClass('hide');
        $('#ad_image').addClass('hide');
    }
    $('select[name="ad_type"]').change(function()
    {
        toggleHideByType();
    });
}

function loader(el)
{
    $(el).html('<div class="sk-spinner sk-spinner-fading-circle">'+
                    '<div class="sk-circle1 sk-circle"></div>'+
                    '<div class="sk-circle2 sk-circle"></div>'+
                    '<div class="sk-circle3 sk-circle"></div>'+
                    '<div class="sk-circle4 sk-circle"></div>'+
                    '<div class="sk-circle5 sk-circle"></div>'+
                    '<div class="sk-circle6 sk-circle"></div>'+
                    '<div class="sk-circle7 sk-circle"></div>'+
                    '<div class="sk-circle8 sk-circle"></div>'+
                    '<div class="sk-circle9 sk-circle"></div>'+
                    '<div class="sk-circle10 sk-circle"></div>'+
                    '<div class="sk-circle11 sk-circle"></div>'+
                    '<div class="sk-circle12 sk-circle"></div>'+
                '</div>');
}

// Load a newAd form
function newAd()
{    
    loader('#adsform');
    $.ajax({
        type: 'POST',
        url: '{/literal}{jfullurl "ads~ads_zone:newAdDefault"}{literal}',
        processData: false,
        contentType: false,
        success: function(data) {
            $('#adsform').html(data);
            newAdFormInit();
        },
        error: function() {
          $('#adsform').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); 
        }   // tell jQuery not to set contentType
    });
}

// Save new add
function saveNewAd()
{
    if ($('select[name="ad_type"]').val() == 1)
    {
        $('#image').rules('add',{
            required: true
        });
    }
    else if ($('select[name="ad_type"]').val() == 2)
    {
        $('#image').rules('remove');
    }

    if (validator.element('#image'))
    {
        var formdata = new FormData();

        var image               = $('#image')[0].files[0];
        var ad_type             = $('select[name="ad_type"]').val();
        var filtre              = $('select[name="categorie_filtre"]').val().split(",");
        if (filtre[0] == 'categorie')
        {
            formdata.append("categorie",filtre[1]);
        }
        else if (filtre[0] == 'souscategorie')
        {
            formdata.append("souscategorie",filtre[1]);
        }
        var html                = $('#html').val();
        var lien_ad             = $('#lien_ad').val();
        var zone_id             = $('#zone_id').val();
        formdata.append("image",image);
        formdata.append("ad_type",ad_type);
        formdata.append("html",html);
        formdata.append("lien_ad",lien_ad);
        formdata.append("zone_id",zone_id);

        loader('#adsform');

        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "ads~ads_zone:save_new_ad"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#adsform').load('{/literal}{jfullurl "ads~ads_zone:newAdDefault"}{literal}');
                $('#ad_list').html(data);
            },
            error: function() {
                $('#ad_list').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>');                
                $('#adsform').load('{/literal}{jfullurl "ads~ads_zone:newAdDefault"}{literal}');
            }   // tell jQuery not to set contentType
        });
    }
}

</script>
{/literal}