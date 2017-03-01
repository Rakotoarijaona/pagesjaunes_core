<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'ads~ads:liste_annonce'}">Annonceur</a>
            </li>
            <li class="active">
                <a><strong>Editer</strong></a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adform" role="form" action="{jurl 'ads~ads:save_edit_annonceur'}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="annonce_id" value="{$oAdsPurchase->id}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label>Référence</label>
                                    <div class="form-control" disabled>{$oAdsPurchase->reference}</div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Nom annonceur (*)</label>
                                    <select name="advertiser_id" id="advertiser_id" class="form-control required" data-msg-required="Veuillez choisir une entreprise">
                                        {if !empty($oAdsPurchase->advertiser_id)}
                                            <option value="{$oAdsPurchase->getEntreprise()->id}" selected>{$oAdsPurchase->getEntreprise()->raisonsociale}</option>
                                        {/if}
                                    </select>
                                </div>
                                <div class="form-group r-form">
                                    <label>Type zone (*)</label>
                                    <select class="form-control" name="type_zone" id="type_zone">
                                        <option value="">Sélection...</option>
                                        {foreach $toListAdsType as $oAdsZone}
                                            <option value="{$oAdsZone->id}" {if ($oAdsZone->id == $oAdsPurchase->zone_type)}selected{/if}>{$oAdsZone->name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group r-form">
                                    <label>Statut (*)</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Sélection...</option>
                                        {foreach $toStatus as $status}
                                            <option value="{$status[0]}" {if ($status[0] == $oAdsPurchase->status)}selected{/if}>{$status[1]}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No follow</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radionofollow1" value="1" name="no_follow" {if ($oAdsPurchase->no_follow) == 1}checked{/if}>
                                            <label for="radionofollow1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radionofollow2" value="0" name="no_follow" {if ($oAdsPurchase->no_follow) == 0}checked{/if}>
                                            <label for="radionofollow2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Stats tracking</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiostattrack1" value="1" name="stats_tracking" {if ($oAdsPurchase->stats_tracking) == 1}checked{/if}>
                                            <label for="radiostattrack1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiostattrack2"  checked value="0" name="stats_tracking" {if ($oAdsPurchase->stats_tracking) == 0}checked{/if}>
                                            <label for="radiostattrack2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Prix (*)</label>
                                    <input type="text" id="price" name="price" class="form-control" value="{$oAdsPurchase->price}">
                                </div>
                                <div class="form-group r-form">
                                    <label>Devise (*)</label>
                                    <input type="text" id="currency" name="currency" class="form-control" value="{$oAdsPurchase->currency}">
                                </div>
                                <div class="form-group r-form">
                                    <label>Méthode de paiement (*)</label>
                                    <select class="form-control" name="payment_method" id="payment_method">
                                        <option value="">Sélection...</option>
                                        {foreach $toPaymentMethod as $paymentMethod}
                                            <option value="{$paymentMethod[0]}" {if ($paymentMethod[0] == $oAdsPurchase->payment_method)}selected{/if}>{$paymentMethod[1]}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group r-form">
                                    <label>Statut de paiement (*)</label>
                                    <select class="form-control" name="payment_status" id="payment_status">
                                        <option value="">Sélection...</option>
                                        {foreach $toPaymentStatus as $paymentStatus}
                                            <option value="{$paymentStatus[0]}" {if ($paymentStatus[0] == $oAdsPurchase->payment_status)}selected{/if}>{$paymentStatus[1]}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Inscription</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioinscription1" value="1" name="inscription" {if ($oAdsPurchase->subscription) == 1}checked{/if}>
                                            <label for="radioinscription1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioinscription2"  checked value="0" name="inscription" {if ($oAdsPurchase->subscription) == 0}checked{/if}>
                                            <label for="radioinscription2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Modèle de prix (*)</label>
                                    <select class="form-control" name="cost_model" id="cost_model">
                                        <option value="">Selection...</option>
                                        {foreach $toCostModel as $toCostModel}
                                            <option value="{$toCostModel[0]}" {if ($toCostModel[0] == $oAdsPurchase->charging_model)}selected{/if}>{$toCostModel[1]}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label>Début publication (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" id="publication_start" name="publication_start" value="{$oAdsPurchase->getPublicationStart()}">
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Durée de publication (*)</label>
                                    <input type="text" id="publication_day" name="publication_day" class="form-control" value="{$oAdsPurchase->publication_day}">
                                </div>
                                <div class="form-group r-form">
                                    <label>Upload banner (*)</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail lightBoxGallery">   
                                            <div class="item">
                                                <a href="{$j_basepath}publicites/big/{$oAdsPurchase->banner}" title="{$oAdsPurchase->banner}" data-gallery=""><img src="{$j_basepath}publicites/thumbnail/{$oAdsPurchase->banner}" style="max-width: 300px; max-height: 400px; line-height: 20px;" alt=""></a>
                                            </div>                                            
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 400px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                            <input type="file" class="default" id="image" name="image" accept="image/*"/>
                                            </span>&nbsp;
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Url site</label>
                                    <input type="text" id="website_url" name="website_url" class="form-control" value="{$oAdsPurchase->website_url}">
                                </div>
                                <div class="form-group r-form">
                                    <label>Alt texte</label> 
                                    <textarea class="form-control" name="alt_text" id="alt_text">{$oAdsPurchase->alt_text}</textarea>
                                </div>
                                <div class="form-group r-form">
                                    <div>
                                        <label>Catégorie / sous-catégorie</label>
                                        <select class="form-control m-b chosen-select" tabindex="2" name="categorie_filtre">
                                            <option value="">Selection :</option>
                                            {foreach ($oListCategorie as $rowCategorie)}
                                            <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;" {if ($rowCategorie['categorie']->id == $oAdsPurchase->categorie_id)}selected{/if}>{$rowCategorie['categorie']->name}</option>
                                                {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                                <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}' {if ($souscategorie->id == $oAdsPurchase->souscategorie_id)}selected{/if}>{$souscategorie->name} </option>
                                                {/foreach}
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>SubID</label>
                                    <input type="text" id="sub_id" name="sub_id" class="form-control" value="{$oAdsPurchase->subscription_id}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="{jurl 'ads~ads:liste_annonce'}" class="btn btn-white" id="cancel">Annuler</a>
                                <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
{$SCRIPT}
{literal}
<script type="text/javascript">
$(document).ready(function()
{
    var validator = $('#adform').validate({
        rules: {
            advertiser_id: {
                required: true
            },
            type_zone: {
                required: true
            },
            status: {
                required: true
            },
            price: {
                required: true,
                number: true
            },
            currency: {
                required: true
            },
            payment_method: {
                required: true
            },
            payment_status: {
                required: true
            },
            cost_model: {
                required: true
            }
        },
        messages: {
            advertiser_id: {
                required: "Veuillez renseigner ce champ"
            },
            type_zone: {
                required: "Veuillez renseigner ce champ"
            },
            status: {
                required: "Veuillez renseigner ce champ"
            },
            price: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un prix valide"
            },
            currency: {
                required: "Veuillez renseigner ce champ"
            },
            payment_method: {
                required: "Veuillez renseigner ce champ"
            },
            payment_status: {
                required: "Veuillez renseigner ce champ"
            },
            cost_model: {
                required: "Veuillez renseigner ce champ"
            },
            website_url: {
                url: "Veuillez renseigner un url valide"
            },
            sub_id: {
                required: "Veuillez renseigner ce champ"
            }
        },
        errorPlacement: function(error, element) 
        {
            if ( element.is(".input-group > .form-control") ) 
            {
                error.insertAfter(element.parent());
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
        }
    });

    if ($('.chosen-select').length > 0)
    {
        $('.chosen-select').chosen({
            no_results_text:'Aucun résultat!'
        });
    }
 
    // entreprise list
    $("#advertiser_id").select2({
        allowClear: true,
        placeholder: "Veuillez taper içi le nom d'une entreprise",
        ajax: {
            url: {/literal}{urljsstring 'ads~ads:autoCompletEntreprise'}{literal},
            minimumInputLength: 3,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {q: params.term};
            },
            processResults: function (data) {
            return {
              results: data
            };
        },
        cache: true
      }
    });

    $('input[name=inscription]').change(function(){
        /*if ($('input[name=inscription]:checked').val() == 1)
        {
            $('#sub_id').rules('add',{
                required: true
            });
        }
        else
        {
           $('#sub_id').rules('remove');
        }*/
    });

    $('#publication_start').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: true,
        calendarWeeks: true,
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
});
</script>
{/literal}