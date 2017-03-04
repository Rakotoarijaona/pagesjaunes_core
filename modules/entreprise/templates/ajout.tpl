<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><strong>Ajouter une nouvelle Entreprise</strong></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a href="{jurl 'entreprise~entreprise:index'}">Entreprise</a>
            </li>
            <li class="active">
                <a><strong>Ajout</strong></a>
            </li>
        </ol>     
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="info-generale" role="form" action="{jurl 'entreprise~entreprise:insertInfoGenerale'}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group r-form">
                                    <label>Raison sociale *</label>
                                    <input id="raisonSociale" name="raisonSociale" type="text" class="form-control" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Description courte activité *</label>
                                    <input id="descActivite" name="descActivite" type="text" class="form-control" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Logo :</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 230px; height: 220px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paperclip"></i>&nbsp;Parcourir</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i>&nbsp;Changer</span>
                                            <input type="file" class="default" name="logo" id="logo" accept="image/*"/>
                                            </span>&nbsp;
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>&nbsp;Supprimer</a>
                                        </div>
                                    </div>
                                </div>                           
                                <div class="form-group">
                                    <label class="control-label">Publié</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie1" value="1" name="radioIsPublie">
                                            <label for="radioIsPublie1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie2" value="0" name="radioIsPublie" checked >
                                            <label for="radioIsPublie2"> non </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie3" value="2" name="radioIsPublie" >
                                            <label for="radioIsPublie3"> en attente </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Région *</label>
                                    <input id="region" name="region" type="text" class="form-control" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Adresse *</label>
                                    <textarea id="adresse" name="adresse" type="text" class="form-control" required></textarea>
                                </div>
                                <div class="form-group r-form">
                                    <label>Site web </label>
                                    <input id="siteweb" name="siteweb" type="text" class="form-control">
                                </div>
                                <div class="form-group r-form">
                                    <div class="soucategorie-chosen">
                                        <label>Catégorie / sous-catégorie *</label>
                                        <select id="souscategorie" name="souscategorie[]" data-placeholder="Selection..." class="souscategorie chosen-select form-control" multiple style="width:100%;" tabindex="4">
                                            <option value=''>Selection...</option>
                                            {if (sizeof($oListCategorie)>0)}
                                            {foreach ($oListCategorie as $rowCategorie)}
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
                                    <label>Personne à contacter </label>
                                    <input id="personneContact" name="personneContact" type="text" class="form-control">
                                </div>                                    
                                <div class="form-group r-form">
                                    <label>Fonction personne à contacter </label>
                                    <input id="fonctionPersonneContact" name="fonctionPersonneContact" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Contacts e-mails *</label>
                                    <div class="r-multi-text" id="email-list-form">
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="input-text form-control"> 
                                            <span class="input-group-btn"> 
                                                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                            </span>
                                        </div>
                                        <div class="table-responsive">
                                            <input type="hidden" name="emails[]">
                                            <table class="table table-striped">
                                                <thead>
                                                    <th>email</th>
                                                    <th width="50px"></th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Numéros téléphones *</label>
                                    <div class="r-multi-text" id="num-list-form">
                                       <div class="input-group">
                                            <input type="text" name="telephone" id="telephone" class="input-text form-control"> 
                                            <span class="input-group-btn"> 
                                                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                            </span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <th>Telephone</th>
                                                    <th width="50px"></th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Mots clés / tags</label>
                                    <p>Les mots clés sont séparés de comma ou virgule (,)</p>
                                    <input type="hidden" name="id" value="">
                                    <textarea id="motscles" class="form-control" name="motscles" id="motscles" style="min-height:150px"></textarea>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Front-office
                                    </div>
                                    <div class="panel-body">                
                                        <div class="form-group">
                                            <label class="control-label">Editer information</label>
                                            <div class="input-group">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioEdit1" value="1" name="radioEdit">
                                                    <label for="radioVisuelPres1"> oui </label>
                                                </div>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioEdit2" value="0" name="radioEdit" checked >
                                                    <label for="radioVisuelPres2"> non </label>
                                                </div>
                                            </div>
                                        </div>.
                                        <div class="form-group r-form">
                                            <label>Login </label>
                                            <input id="loginEntreprise" name="loginEntreprise" type="text" class="form-control">
                                        </div>
                                        <div class="form-group r-form">
                                            <label>Mot de passe </label>
                                            <input id="pwdEntreprise" name="pwdEntreprise" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                              <button type="button" class="btn btn-primary btn-save">Enregistrer</button>            
                              <button type="button" class="btn btn-white" id="cancel">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
<style type="text/css">
    .chosen-error {
        color: #cc5965;
        display: inline-block;
        margin-left: 5px;
    }
    .chosen-choices.error {
        border: 1px dotted #cc5965;
    }
</style>
{/literal}

{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $('#info-generale').validate({
        rules: {
            raisonSociale: {
                required: true,
                minlength: 5,
                remote: {
                    url: "{/literal}{jurl 'entreprise~entreprise:ifRaisonsocialeExist'}{literal}",
                    type: "post",
                    data: {
                        raisonsociale: function () {
                            return $("#raisonSociale").val();
                        }
                    }
                }
            },
            descActivite: {
                required: true,
                minlength: 10
            },
            siteweb: {
                url: true
            },
            email: {
                email: true
            },
            region: {
                required: true
            },
            adresse: {
                 required: true,
                 minlength: 10
            },
            telephone: {
                phone: true
            },
            souscategorie: {
                required: true
            },
            loginEntreprise:{
                remote: {
                    url: "{/literal}{jurl 'entreprise~entreprise:ifLoginExist'}{literal}",
                    type: "post",
                    data: {
                        login: function () {
                            return $("#loginEntreprise").val();
                        }
                    }
                }
            }
        },
        messages: {
            raisonSociale: {
                required: "Champs obligatoire",
                minlength: "Veuillez entrer au moins 5 caractères",
                remote: "Ce nom est déjà utilisé"
            },
            descActivite: {
                 required: "Champs obligatoire",
                 minlength: "Veuillez entrer au moins 10 caractères"
            },
            siteweb: {
                url: "Veuillez entrer un Url valide"
            },
            adresse: {
                 required: "Champs obligatoire",
                 minlength: "Veuillez entrer au moins 10 caractères"
            },
            region: {
                required: "Champs obligatoire"
            },
            email: {
                 required: "Veuillez entrer au moins un email",
                 email: "Veuillez entrer un email valide"
            },
            telephone: {
                required: "Veuillez entrer au moins un numéro"
            },
            loginEntreprise:{
                remote: "Ce login est déjà utilisé"
            }
        },        
        errorPlacement: function(error, element) 
        {
            if (element.is("#email") ) 
            {
                element.parents("[class='input-group']").after(error);
            }
            else if( element.is("#telephone") ) 
            {
                element.parents("[class='input-group']").after(error);
            }
            else if( element.is("#souscategorie") )
            {
                error.insertAfter( element );
            }
            else 
            {
                error.insertAfter( element );
            }
        }
    });
    
    
    $('.r-multi-text').RMultiSelect();
    $('.r-fileupload').RFileUploader();
    $('.r-fileupload').find('.btn-file-upload').click(function()
    {
        var file = $('#inputvideopresentation')[0].files[0];
        var formdata = new FormData();
        formdata.append("videosfile", file);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "entreprise~entreprise:uploadVideo"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              $('#videopresentationplayer').html(data) },
            error: function() {
              $('#videopresentationplayer').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); }   // tell jQuery not to set contentType
        });
    });

    // init chosen
    /*var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Aucun resultat'},
            '.chosen-select-width'     : {width:"95%"}
            }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }*/
    $('.chosen-select').chosen ({
        no_results_text:'Aucun resultat',

    });
    $('.soucategorie-chosen').find('.chosen-container').click(function()
    {
        $('#soucategorie-chosen-error').remove();
        $(this).find('.chosen-choices').removeClass('error');
    })
    $('#info-generale .btn-save').click(function()
    {
        if ($('#email-list-form').find('.rMultiItem').length <= 0)
        {
            $('#email').rules('add',
            {
                required: true
            });
        }
        else
        {
            $('#email').rules('remove');
        }

        if ($('#num-list-form').find('.rMultiItem').length <= 0)
        {
            $('#telephone').rules('add',
            {
                required: true
            });
        }
        else
        {
            $('#telephone').rules('remove');
        }
        var chosen_valid = true;
        if ($('.soucategorie-chosen').find('.search-choice').length <= 0)
        {
            if ($('#soucategorie-chosen-error').length<=0)
            {
                $('.soucategorie-chosen').after('<label id="soucategorie-chosen-error" class="chosen-error" for="soucategorie-chosen">Champs obligatoire</label>');
            }
            $('.soucategorie-chosen').find('.chosen-container').find('.chosen-choices').addClass('error');
            chosen_valid = false;
        }
        
        if ($('#info-generale').valid() && chosen_valid)
        {
            $('#info-generale').submit();
        }       
    });

});
</script>
<!-- rubrique table-list -->
<script src="{/literal}{$j_basepath}adminlibraries/js/rubrique.js{literal}"></script>
<script src="{/literal}{$j_basepath}adminlibraries/js/plugins/entreprise.js{literal}"></script>
<script type="text/javascript">
    function initMap() {
        // Create the Google Map using elements
        var mapOptions1 = {
            zoom: 11,
            center: new google.maps.LatLng(40.6700, -73.9400),
            // Style for Google Maps
            styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
        };
        var mapElement1 = document.getElementById('map1');
        var map1 = new google.maps.Map(mapElement1, mapOptions1);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGufa7f5AmTVVgdiEiwWclJzry3CYKw_k&callback=initMap"></script>
{/literal}