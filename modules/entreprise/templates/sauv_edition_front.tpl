{$COMMONSCRIPT}
<script src="{$j_basepath}adminlibraries/js/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/jquery.validate.min.js"></script>

<!-- contenus -->
<main>
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-8"><h1>Formulaire d’édition</h1></div>
            </div>
        </div>
    </div>
    <div class="form-wrapper">
        <div role="form">
            <div class="screen-reader-response" style="display:none;"></div>
            <form action="{jurl 'front_office~default:enregistrer_edition'}" id="form-edition" method="post" class="form" enctype="multipart/form-data">
                <input type="hidden" name="entreprise" value="{$oEntreprise->id * 137}">
                <div class="container">
                    <div class="row">
                        <p>Veuillez remplir les champs ci-dessous, les champs marqués par (*) sont obligatoires</p>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Nom ou raison sociale (*)</label>
                                        <span>
                                            <input type="text" class="form-control" name="raisonsociale" size="40" maxlength="200" value="{$oEntreprise->raisonsociale}"/>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Description courte de votre activité (*)</label>
                                        <span class="your-activite">
                                            <input type="text" class="form-control" name="activite" size="40" maxlength="200" value="{$oEntreprise->activite}"/>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse (*)</label>
                                        <span class="your-adresse">
                                            <textarea name="adresse" class="form-control" cols="40" rows="3" maxlength="500" minlength="10">{$oEntreprise->adresse}</textarea>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Region </label>
                                        <span class="your-region">
                                            <input type="text" class="form-control" name="region" size="40" value="{$oEntreprise->region}"/>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Site web </label>
                                        <span class="your-website">
                                            <input type="text" class="form-control" name="website" size="40" value="{$oEntreprise->url_website}"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">

                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="hidden" class="logo" name="hdnlogo" id="hdnlogo" value="1"/>
                                        <div class="fileupload fileupload-new videoUpload" data-provides="fileupload">
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                    <span class="fileupload-exists">Changer</span>
                                                    <input type="file" class="default" accept="image/*" id="vignette-video-youtube" name="vignette-video-youtube"/>
                                                </span>&nbsp;
                                                <a href="#" data-dismiss="fileupload" >
                                                    <span class="btn btn-default fileupload-exists"><i class="fa fa-trash"></i></span>
                                                </a>
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Contacts téléphoniques au format international <b>261(0)...</b> (*) <br/>
                                            Veuillez remplir au moins le premier champ
                                        </label><br />
                                        {for ($i = 0; $i<sizeof($oEntreprise->telephones);$i++)}
                                        <span class="tel-phone">
                                            <input type="tel" class="telephone" name="tel_phone[]" value="{$oEntreprise->telephones[$i]->numero}" size="40" maxlength="15"/>
                                        </span><br />
                                        {/for}
                                        <span class="tel-phone">
                                            <input type="tel" class="telephone" name="tel_phone[]" value="" size="40" maxlength="15"/>
                                        </span><br />
                                        <span class="tel-phone">
                                            <input type="tel" class="telephone" name="tel_phone[]" value="" size="40" maxlength="15"/>
                                        </span><br />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact email (*)</label>
                                        {for ($i = 0; $i<sizeof($oEntreprise->emails);$i++)}
                                        <span class="your-email">
                                            <input type="email" name="email[]" value="{$oEntreprise->emails[$i]->email}" size="40" maxlength="255"/>
                                        </span>
                                        {/for}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">                        
                        <div class="col-sm-4">
                            <h3>Services</h3>
                            <p class="info">Vos offres de services</p>
                            <div class="item-wrapper" id="divservice"><p class="item-add-wrapper">
                                <span class="form-control-wrap">
                                    <input type="text" name="txtservice" value="" size="40" class="form-control wpcf7-text input-add-item"/>
                                    <button type="button" id="servicesbtn" class="btn btn-default btn-add-item" disabled="disabled"><i class="fa fa-plus-circle"></i> Ajouter</button>
                                </span>
                                </p>
                                <ul>
                                    {for ($i = 0; $i<sizeof($oEntreprise->services);$i++)}
                                        <li>
                                            {$oEntreprise->services[$i]->name}
                                            <a href="#" title="Supprimer" class="btn-remove-service" style="float:right">   <i class="fa fa-times"></i>
                                            </a>
                                            <input type="hidden" class="hdnServices" name="oldhdnServices[]" value="{$oEntreprise->services[$i]->id * 137}"/>
                                        </li>
                                    {/for}
                                </ul>   
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h3>Produits</h3>
                            <p class="info">Vos produits</p>
                            <div class="item-wrapper" id="divproduit">
                                <p class="item-add-wrapper">
                                    <span class="form-control-wrap">
                                        <input type="text" name="txtproduit" value="" size="40" class="text input-add-item"/>
                                        <button type="button" id="produitsbtn" class="btn btn-default btn-add-item" disabled="disabled">
                                            <i class="fa fa-plus-circle"></i> Ajouter
                                        </button>
                                    </span>
                                </p>
                                <ul>
                                {for ($i = 0; $i<sizeof($oEntreprise->produits);$i++)}
                                    <li>
                                        {$oEntreprise->produits[$i]->name}
                                        <a href="#" title="Supprimer" class="btn-remove-produit" style="float:right">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <input type="hidden" class="hdnProduits" name="oldhdnProduits[]" value="{$oEntreprise->produits[$i]->id * 137}"/></li>
                                {/for}
                                </ul>    
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h3>Marques</h3>
                            <p class="info">Les marques que vous representez</p>
                            <div class="item-wrapper" id="divmarque">
                                <p class="item-add-wrapper">
                                    <span class="form-control-wrap">
                                        <input type="text" name="txtmarque" value="" size="40" class="text input-add-item"/>
                                        <button type="button"  id="marquesbtn" class="btn btn-default btn-add-item" disabled="disabled"><i class="fa fa-plus-circle"></i> Ajouter</button>
                                    </span>
                                </p>
                                <ul>
                                {for ($i = 0; $i<sizeof($oEntreprise->marques);$i++)}
                                    <li>
                                        {$oEntreprise->marques[$i]->name}
                                        <a href="#" title="Supprimer" class="btn-remove-marque" style="float:right">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <input type="hidden" class="hdnMarques" name="oldhdnMarques[]" value="{$oEntreprise->marques[$i]->id * 137}"/></li>
                                {/for}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {if ($oEntreprise->qui_sommes_nous_active == 1)}
                <div class="container">                    
                    <hr>
                    <h2 class="m-b">Qui sommes-nous?</h2><br/>
                    <div class="form-group">    
                        <textarea class="tinyMce" name="quisommesnous" style="height:500px">{$oEntreprise->qui_sommes_nous}</textarea>
                    </div>
                </div>
                {/if}
                {if ($oEntreprise->nos_references_active == 1)}
                <div class="container">                    
                    <hr>
                    <h2>Référence</h2><br/> 
                    <div class="form-group">    
                        <textarea class="tinyMce" name="reference"  style="height:500px">{$oEntreprise->nos_references}</textarea>
                    </div>
                </div>
                {/if}
                {if ($oEntreprise->nos_services_active == 1)}
                <div class="container">                    
                    <hr>
                    <h2>Nos services</h2><br/> 
                    <div class="form-group">    
                        <textarea class="tinyMce" name="nos_services"  style="height:500px">{$oEntreprise->nos_services}</textarea>
                    </div>
                </div>
                {/if}
                {if ($oEntreprise->videos_active == 1)}
                <div class="container">
                    <hr>
                    <h2>Vidéos Youtube</h2>
                    <br/>                   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="video-form" id="video-form">
                                <div class="form-group">  
                                    <label>Vignette</label>                        
                                    <div class="fileupload fileupload-new videoUpload" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 250px; height: 170px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 250px; height: 170px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                <span class="fileupload-exists">Changer</span>
                                                <input type="file" class="default" accept="image/*" id="vignette-video-youtube" name="vignette-video-youtube"/>
                                            </span>&nbsp;
                                            <a href="#" data-dismiss="fileupload" >
                                                <span class="btn btn-default fileupload-exists"><i class="fa fa-trash"></i></span>
                                            </a>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <textarea class="form-control" name="urlVideo" style="width: 250px; height: 100px;">file:///G:/Asa/page%20jaune/docs/Static_Full_Version/Static_Full_Version/calendar.html</textarea>
                                </div>
                                <button type="button" class="btn btn-default btn-add-video" title="Ajouter une vidéo">
                                        <i class="fa fa-youtube"></i> Ajouter une vidéo 
                                </button>
                            </div>
                        </div>
                    </div>                  
                </div>
                {/if}
                <div class="container">
                </div>
                {if ($oEntreprise->catalogue_active == 1)}
                <div class="container">
                    <hr>
                    <h3>Catalogues</h3>                    
                    <div class="row">
                        <div class="catalogue-list">
                            {if (sizeof($oEntreprise->getAllCataloguesList())>0)}
                            {foreach ($oEntreprise->getAllCataloguesList() as $oCatalogue)}
                            <div class="col-md-4 col-sm-6 media-item">
                                <button type="button" class="oldcatalogue-remove"><i class="fa fa-trash"></i> </button>
                                <div class="catalogue-edit-wrapper">
                                    <input type="hidden" name="oldcatalogue[]" class="oldcatalogue" value="{$oCatalogue->id * 137}"/>
                                    <input type="hidden" name="oldcatalogue-id-{$oCatalogue->id * 137}" value="{$oCatalogue->id * 137}"/>
                                    <input type="file" name="oldcatalogue-image-{$oCatalogue->id * 137}" id="oldcatalogue-image_{$oCatalogue->id * 137}" value="{$oCatalogue->id * 137}" size="40" class="form-control" />
                                    <p>
                                        <label>Nom produit</label>
                                        <span class="form-control-wrap">
                                            <input value="{$oCatalogue->nom_produit}" type="text" id="oldcatalogue-nomproduit-{$oCatalogue->id * 137}" name="oldcatalogue-nomproduit-{$oCatalogue->id * 137}" />
                                        </span>
                                        <label>Marque</label>
                                        <span class="form-control-wrap">
                                            <input value="{$oCatalogue->marque_produit}" type="text" id="oldcatalogue-marque-{$oCatalogue->id * 137}" name="oldcatalogue-marque-{$oCatalogue->id * 137}" />
                                        </span>
                                        <label>Prix (Ar)</label>
                                        <span class="form-control-wrap">
                                            <input value="{$oCatalogue->prix_produit}" type="text" id="oldcatalogue-prix-{$oCatalogue->id * 137}" name="oldcatalogue-prix-{$oCatalogue->id * 137}" />
                                        </span>
                                        <label>Référence</label>
                                        <span class="form-control-wrap">
                                            <input value="{$oCatalogue->reference_produit}" type="text" id="oldcatalogue-reference-{$oCatalogue->id * 137}" name="oldcatalogue-reference-{$oCatalogue->id * 137}" />
                                        </span>
                                        <label>Déscription</label>
                                        <span class="form-control-wrap">
                                            <input value="{$oCatalogue->description_produit}" type="text" id="oldcatalogue-description-{$oCatalogue->id * 137}" name="oldcatalogue-description-{$oCatalogue->id * 137}" />
                                        </span>
                                    </p>
                                </div>
                            </div>
                            {/foreach}
                            {/if}
                        </div>
                    </div>
                    <p class="btn-add-catalogue"><button type="button" class="btn btn-default btn-add-catalogue" title="Ajouter un produit au catalogue">Ajouter un produit au catalogue </button> </p>                    
                </div>
                {/if}
                <div class="btn-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="col-sm-6 btn-wrapper">
                                <input type="button" onclick="validForm()" class="submit" value="ENVOYER"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>   
        </div>
    </div>
</main>

{literal}
<script type="text/javascript">
$(document).ready(function(){
    $('.btn-remove-gallery').click(function()
    {
        $el = $(this).parents('.gallery-image');
        swal({
            title: '',
            text: "Êtes-vous  sure de vouloir supprimer cette photos?",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "oui",
            cancelButtonText: "non",
            closeOnConfirm: true
        }, function () {
            $el.fadeOut("slow",
                function (){
                    var id = $el.find('.gallerylastimage').val();
                    $el.parents('.images-list').append('<input type="hidden" name="rmvdimage[]" value="'+id+'"/>');
                    $el.remove();
                });
        });
    });
    $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            padding : 0
        });

    $('#form-edition').validate({
        rules: {
            raisonsociale: {
             required: true
            },
            activite: {
             required: true
            },
            adresse: {
             required: true
            },
            email: {
             required: true,
             email:true
            }
        },
            messages: {
                raisonsociale: "Ce champ est obligatoire",
                activite: "Ce champ est obligatoire",
                adresse: {
                    required:"Ce champ est obligatoire",
                    minlength:"Veuillez entrer une adresse valide"
                },
                email: {
                    required:"Ce champ est obligatoire",
                    email:"Veuillez entrer un email valide"
                } 
                }});
    // Services, Products, Vendor Manager
    $('.input-add-item').on ('keydown', function (){
        if ( $(this).val().trim() != '' )
            $(this).next('button').get(0).disabled = false;
        else
            $(this).next('button').get(0).disabled = true;
    });

    $('.btn-add-item').on ('click', function (){
        var $inputAdd = $(this).prev('input');
        var divnom = $(this).parents('div').attr('id');

        if (divnom == 'divservice') {
            var inputhidden = '<input type="hidden" class="hdnServices" name="hdnServices[]" value="'+$inputAdd.val()+'"/>';
            if ( $inputAdd.val().trim() != '' ) {
                var $ulWrapper = $(this).parents('.item-wrapper').find('ul');
                $ulWrapper.append( '<li>'+ $inputAdd.val() + ' <a href="#" title="Supprimer" class="btn-remove" style="float:right"><i class="fa fa-times"></i></a>'+inputhidden+'</li>' );
                $inputAdd.val('');
                $(this).get(0).disabled = true;
            }
        }

        if (divnom == 'divproduit') {
            var inputhidden = '<input type="hidden" class="hdnProduits" name="hdnProduits[]" value="'+$inputAdd.val()+'"/>';
            if ( $inputAdd.val().trim() != '' ) {
                var $ulWrapper = $(this).parents('.item-wrapper').find('ul');
                $ulWrapper.append( '<li>'+ $inputAdd.val() + ' <a href="#" title="Supprimer" class="btn-remove" style="float:right"><i class="fa fa-times"></i></a>'+inputhidden+'</li>' );
                $inputAdd.val('');
                $(this).get(0).disabled = true;
            }
        }


        if (divnom == 'divmarque') {
            var inputhidden = '<input type="hidden" class="hdnMarques" name="hdnMarques[]" value="'+$inputAdd.val()+'"/>';
            if ( $inputAdd.val().trim() != '' ) {
                var $ulWrapper = $(this).parents('.item-wrapper').find('ul');
                $ulWrapper.append( '<li>'+ $inputAdd.val() + ' <a href="#" title="Supprimer" class="btn-remove" style="float:right"><i class="fa fa-times"></i></a>'+inputhidden+'</li>' );
                $inputAdd.val('');
                $(this).get(0).disabled = true;
            }
        }
    });

    $('body').on ('click', '.btn-remove', function () {
        $(this).parent('li').eq(0).remove();
        return false;
    });

    //Removing
    //services
    $('body').on ('click', '.btn-remove-service', function () {
        var id = $(this).siblings('.hdnServices').val();
        $(this).parents('ul').append('<input type="hidden" name="rmvdservices[]" value="'+id+'"/>');
        $(this).parent('li').eq(0).remove();
        return false;
    });
    //produits
    $('body').on ('click', '.btn-remove-produit', function () {
        var id = $(this).siblings('.hdnProduits').val();
        $(this).parents('ul').append('<input type="hidden" name="rmvdproduits[]" value="'+id+'"/>');
        $(this).parent('li').eq(0).remove();
        return false;
    });
    //marques
    $('body').on ('click', '.btn-remove-marque', function () {
        var id = $(this).siblings('.hdnMarques').val();
        $(this).parents('ul').append('<input type="hidden" name="rmvdmarques[]" value="'+id+'"/>');
        $(this).parent('li').eq(0).remove();
        return false;
    });
    //Removing
});
</script>
{/literal}