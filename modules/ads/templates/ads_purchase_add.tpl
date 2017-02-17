<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'ads~ads:index'}">Annonceur</a>
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
                    <form id="adform" role="form" action="{jurl 'ads~ads:save_add_annonceur'}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label>Référence</label>
                                    <div class="form-control" disabled>N/A</div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Nom annonceur (*)</label>
                                    <input type="text" id="advertiser_name" name="advertiser_name" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>E-mail annonceur (*)</label>
                                    <input type="text" id="advertiser_mail" name="advertiser_mail" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>Type zone (*)</label>
                                    <select class="form-control" name="type_zone" id="type_zone">
                                        <option value="">Sélection...</option>
                                        {foreach $toListAdsType as $oAdsZone}
                                            <option value="{$oAdsZone->id}">{$oAdsZone->name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group r-form">
                                    <label>Statut (*)</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Sélection...</option>
                                        <option value="1">En attente</option>
                                        <option value="2">Approuvé</option>
                                        <option value="3">Rejeté</option>
                                        <option value="4">Expiré</option>
                                        <option value="5">Réservé</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No follow</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radionofollow1" value="1" name="no_follow">
                                            <label for="radionofollow1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radionofollow2"  checked value="0" name="no_follow">
                                            <label for="radionofollow2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Stats tracking</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiostattrack1" value="1" name="stats_tracking">
                                            <label for="radiostattrack1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiostattrack2"  checked value="0" name="stats_tracking">
                                            <label for="radiostattrack2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Prix (*)</label>
                                    <input type="text" id="price" name="price" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>Devise (*)</label>
                                    <input type="text" id="currency" name="currency" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>Méthode de paiement (*)</label>
                                    <select class="form-control" name="payment_method" id="payment_method">
                                        <option value="">Sélection...</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Par chèque</option>
                                        <option value="3">Paypal</option>
                                        <option value="4">Par mobile</option>
                                    </select>
                                </div>
                                <div class="form-group r-form">
                                    <label>Statut de paiement (*)</label>
                                    <select class="form-control" name="payment_status" id="payment_status">
                                        <option value="">Sélection...</option>
                                        <option value="1">Payé</option>
                                        <option value="2">Non payé</option>
                                        <option value="3">Invalide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Inscription</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioinscription1" value="1" name="inscription">
                                            <label for="radioinscription1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioinscription2"  checked value="0" name="inscription">
                                            <label for="radioinscription2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Modèle de prix (*)</label>
                                    <select class="form-control" name="cost_model" id="cost_model">
                                        <option value="">Selection...</option>
                                        <option value="1">Coût journalier</option>
                                        <option value="2">Coût par clic</option>
                                        <option value="3">Coût par impression</option>
                                    </select>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label>Début publication (*)</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" id="publication_start" name="publication_start" value="">
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Durée de publication (*)</label>
                                    <input type="text" id="publication_day" name="publication_day" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>Upload banner (*)</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
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
                                    <input type="text" id="website_url" name="website_url" class="form-control" name="row">
                                </div>
                                <div class="form-group r-form">
                                    <label>Alt texte</label> 
                                    <textarea class="form-control" name="alt_text" id="alt_text"></textarea>
                                </div>
                                <div class="form-group r-form">
                                    <div>
                                        <label>Catégorie / sous-catégorie</label>
                                        <select class="form-control m-b chosen-select" tabindex="2" name="categorie_filtre">
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
                                <div class="form-group r-form">
                                    <label>SubID</label>
                                    <input type="text" id="sub_id" name="sub_id" class="form-control" name="row">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
                                <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
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
    var validator = $('#adform').validate({
        rules: {
            advertiser_name: {
                required: true
            },
            advertiser_mail: {
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
            },
            publication_start: {
                required: true,
                date: true
            },
            publication_day: {
                required: true,
                number: true
            },
            image: {
                required: true
            },
            website_url: {
                url: true
            }
        },
        messages: {
            advertiser_name: {
                required: "Veuillez renseigner ce champ"
            },
            advertiser_mail: {
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
            publication_start: {
                required: "Veuillez renseigner ce champ",
                date: "Veuillez renseigner une date valide"
            },
            publication_day: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre"
            },
            image: {
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

    $('input[name=inscription]').change(function(){
        if ($('input[name=inscription]:checked').val() == 1)
        {
            $('#sub_id').rules('add',{
                required: true
            });
        }
        else
        {
           $('#sub_id').rules('remove');
        }
    });

    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'dd-mm-yy'
    });
});
</script>
{/literal}