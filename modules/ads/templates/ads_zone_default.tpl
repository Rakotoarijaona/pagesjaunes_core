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
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group r-form">
                                            <label>Nombre de pubs</label>
                                            <input type="text" id="nb_pub" name="nb_pub" class="form-control" value="{$oAdsZone->number_ads_default}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group r-form">
                                            <label>Méthode d'affichage</label>
                                            <select class="form-control" name="display_method" id="display_method">
                                                <option value="1" {if ($oAdsZone->ads_display_method == 1)}selected{/if}>Renseigner les éspaces vides</option>
                                                <option value="2" {if ($oAdsZone->ads_display_method == 2)}selected{/if}>Weighted ad rotation</option>
                                                <option value="3" {if ($oAdsZone->ads_display_method == 3)}selected{/if}>Rotate equally with purchases</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{jurl 'ads~ads_zone:index'}" class="btn btn-white">Annuler</a>
                                    <button type="button" onclick="saveConfiguration()" class="btn btn-success btn-save-ad">Executer</button>
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
                                        <div class="alert alert-info">Veuillez choisir un pub à modifier.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Liste des pubs par défauts
                                    </div>
                                    <div class="panel-body">
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
                                                                <td>{$oAdsZoneDefault->rang}</td>
                                                                {if !empty($oAdsZoneDefault->type)}
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
                                                                        <strong>- Sous catégorie:</strong> {$oAdsZoneDefault->getSouscategorie()->name}<br/>
                                                                    {elseif (!empty($oAdsZoneDefault->categorie_id))}
                                                                        <strong>- Catégorie :</strong> {$oAdsZoneDefault->getCategorie()->name}<br/>
                                                                    {/if}
                                                                </td>
                                                                {else}
                                                                <td colspan=3>
                                                                    <span class="text-danger">Aucun contenu</span>
                                                                </td>
                                                                {/if}
                                                                <td>
                                                                    <button type="button" onclick="editAd({$oAdsZoneDefault->id})" class="btn btn-info btn-xs btn-block">Modifier</button>
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
    newAdFormInit()
});

// Initialisation de la form
function newAdFormInit()
{
    if ($('#html_type').length > 0)
    {
        CKEDITOR.replace('html_type');
    }
    if ($('.chosen-select').length > 0)
    {
        $('.chosen-select').chosen({
            no_results_text:'Aucun résultat!'
        });
    }
    validator = $('#adzoneform').validate({
        rules: {
            nb_pub: {
                required: true,
                number: true
            }
        },
        messages: {
            nb_pub: {
                required: "Veuillez renseigner ce champs",
                number: "Veuillez renseigner un nombre"
            }
        }
    });
    toggleHideByType();
}

// Sauvegarde de la configuration
function saveConfiguration()
{
    if (validator.element('#nb_pub'))
    {
        continue_action = true;
        if ($('#nb_pub').val() < $('#ad_list tbody tr').length)
        {
            continue_action = confirm("{/literal}{@ads~ads.confirm.change.number.ad@}{literal}");
        }
        if (continue_action)
        {
            var formdata = new FormData();

            var nb_ad               = $('#nb_pub').val();
            var display             = $('#display_method').val();
            var zone_id             = $('#zone_id').val();

            formdata.append("nb_ad",nb_ad);
            formdata.append("display",display);
            formdata.append("zone_id",zone_id);

            loader('#ad_list');
            $.ajax({
                type: 'POST',
                url: '{/literal}{jfullurl "ads~ads_zone:save_default_config"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#ad_list').html(data);
                },
                error: function() {
                    $('#ad_list').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>');                
                    $('#adsform').load('{/literal}{jfullurl "ads~ads_zone:newAdDefault"}{literal}');
                }
            });
        }
    }
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
    $('#adsform').html('<div class="alert alert-info">Veuillez choisir un pub à modifier.</div>');
}

// Edit ad
function editAd(id)
{
    loader('#adsform');
    var formdata = new FormData();
    formdata.append("id",id);
    $.ajax({
        type: 'POST',
        url: '{/literal}{jfullurl "ads~ads_zone:editAdDefault"}{literal}',
        data: formdata,
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

// Save edit add
function saveEditAd(id)
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
        loader('#ad_list');
        var formdata = new FormData();

        var id                  = id;
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
        var html_type                = CKEDITOR.instances['html_type'].getData();
        var lien_ad             = $('#lien_ad').val();
        var zone_id             = $('#zone_id').val();
        formdata.append("id",id);
        formdata.append("image",image);
        formdata.append("ad_type",ad_type);
        formdata.append("html_type",html_type);
        formdata.append("lien_ad",lien_ad);
        formdata.append("zone_id",zone_id);

        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "ads~ads_zone:save_edit_ad"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                newAd();
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