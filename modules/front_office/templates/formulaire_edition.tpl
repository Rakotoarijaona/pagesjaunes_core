{$COMMONSCRIPT}
<script src="{$j_basepath}adminlibraries/js/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
{literal}
<script type="text/javascript">
    $('.owl-carousel', '.bloc-video').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        dots:true,
        responsive : {
            0 : {
                items:1
            },

            640 : {
                items:2
            },

            768 : {
                items:3
            },

            1024 : {
                items:4
            }
        }
    });

    if ( $('.video-th').length > 0 ) {
        $(".video-th").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            padding : 0,
            autoHeight : true,
            helpers : {
                media : {}
            }
        });
    }

    if ( $('.fancybox').length > 0 ) {
        $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            padding : 0,
            autoHeight : true
        });
    }
</script>
{/literal}
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
            <form action="{jurl 'front_office~entreprise:save_edition'}" id="form-edition" method="post" class="form" enctype="multipart/form-data">
                <input type="hidden" name="entreprise" value="{$oEntreprise->id}">
                <div class="container">

                    <p>Veuillez remplir les champs ci-dessous, les champs marqués par (*) sont obligatoires</p>                   
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- Informations générales -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    INFORMATIONS GENERALES
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#infoGenerale" aria-expanded="true" aria-controls="infoGenerale">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="infoGenerale" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>Raison sociale (*)</label>
                                                <input id="raisonSociale" name="raisonSociale" type="text" value="{$oEntreprise->raisonsociale}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description courte activité (*)</label>
                                                <input id="descActivite" name="descActivite" type="text" class="form-control" value="{$oEntreprise->activite}" required>
                                            </div>
                                            <div class="form-group r-form">
                                                <label>Logo :</label>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    {if ($oEntreprise->logo != '')}
                                                    <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                                        <img src="{$j_basepath}entreprise/images/{$oEntreprise->logo}" alt="" />
                                                    </div>
                                                    {/if}
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 250px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i>Changer</span>
                                                            <input type="file" class="default" name="logo" id="logo" accept="image/*"/>
                                                        </span>&nbsp;
                                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i>Supprimer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Adresse (*)</label>
                                                <textarea id="adresse" name="adresse" class="form-control" value="">{$oEntreprise->adresse}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Région</label>
                                                <input id="region" name="region" type="text" class="form-control" value="{$oEntreprise->region}">
                                            </div>
                                            <div class="form-group">
                                                <label>Site web</label>
                                                <input id="siteweb" name="siteweb" type="text" class="form-control" value="{$oEntreprise->url_website}">
                                            </div>
                                            <div class="form-group r-form">
                                                <label>Personne à contacter </label>
                                                <input id="personneContact" name="personneContact" type="text" class="form-control" value="{$oEntreprise->contact_interne}">
                                            </div>
                                            <div class="form-group r-form">
                                                <label>Fonction personne à contacter </label>
                                                <input id="fonctionPersonneContact" name="fonctionPersonneContact" type="text" class="form-control" value="{$oEntreprise->fonction_contact}">
                                            </div>             
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>
                                                    Contacts téléphoniques au format international <b>261(0)...</b> (*) <br/>
                                                </label><br />
                                                <div class="input-list">
                                                    {if (sizeof($oEntreprise->telephones) > 0)}
                                                    {foreach $oEntreprise->telephones as $telephone}
                                                    <div class="telephone removable-input">
                                                        <button onclick="remove_phone(this)" type="button" class="btn btn-default btn-remove btn-remove-telephone"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="input-telephone form-control" name="telephones{$telephone->id}" value="{$telephone->numero}" size="40"/>
                                                        <input type="hidden" value="{$telephone->id}">
                                                    </div>
                                                    {/foreach}
                                                    {else}
                                                    <div class="telephone removable-input">
                                                        <button onclick="remove_phone(this)" type="button" class="btn btn-default btn-remove btn-remove-telephone"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="telephones[]" value="" size="40"/>
                                                    </div>
                                                    {/if}
                                                </div>
                                                <button type="button" id="" class="btn btn-default btn-add-telephone">
                                                    <i class="fa fa-plus-circle"></i> Ajouter
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact email (*)</label>
                                                <div class="input-list">
                                                    {if (sizeof($oEntreprise->emails) > 0)}
                                                    {foreach $oEntreprise->emails as $email}
                                                    <div class="email removable-input">
                                                        <button onclick="remove_email(this)" type="button" class="btn btn-default btn-remove btn-remove-email"><i class="fa fa-trash"></i></button>
                                                        <input type="email" class="form-control" name="emails{$email->id}" value="{$email->email}" size="40" maxlength="255"/>
                                                        <input type="hidden" value="{$email->id}">
                                                    </div>
                                                    {/foreach}
                                                    {else}
                                                    <div class="email removable-input">
                                                        <button onclick="remove_email(this)" type="button" class="btn btn-default btn-remove btn-remove-email"><i class="fa fa-trash"></i></button>
                                                        <input type="email" class="form-control" name="emails[]" value="" size="40" maxlength="255"/>
                                                    </div>
                                                    {/if}
                                                </div>
                                                <button type="button" id="" class="btn btn-default btn-add-email">
                                                    <i class="fa fa-plus-circle"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Informations complémentaire -->
                        <div class="panel panel-default in">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    INFORMATIONS COMPLEMENTAIRES
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#infoComplementaire" aria-expanded="true" aria-controls="infoComplementaire">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="infoComplementaire" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>
                                                    Services
                                                </label>
                                                <div class="input-list">
                                                    {if (sizeof($oEntreprise->services) > 0)}
                                                    {foreach $oEntreprise->services as $service}
                                                    <div class="service removable-input">
                                                        <button onclick="remove_service(this)" type="button" class="btn btn-default btn-remove btn-remove-service"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="services{$service->id}" value="{$service->name}" size="40" maxlength="50"/>
                                                        <input type="hidden" value="{$service->id}">
                                                    </div>
                                                    {/foreach}
                                                    {else}
                                                    <div class="service removable-input">
                                                        <button onclick="remove_service(this)" type="button" class="btn btn-default btn-remove btn-remove-service"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="services[]" value="" size="40" maxlength="50"/>
                                                    </div>
                                                    {/if}
                                                </div>
                                                <button type="button" id="" class="btn btn-default btn-add-service">
                                                    <i class="fa fa-plus-circle"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>
                                                    Produits
                                                </label>
                                                <div class="input-list">
                                                    {if (sizeof($oEntreprise->produits) > 0)}
                                                    {foreach $oEntreprise->produits as $produits}
                                                    <div class="produit removable-input">
                                                        <button onclick="remove_produit(this)" type="button" class="btn btn-default btn-remove btn-remove-produit"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="produits{$produits->id}" value="{$produits->name}" size="40" maxlength="50"/>
                                                        <input type="hidden" value="{$produits->id}">
                                                    </div>
                                                    {/foreach}
                                                    {else}
                                                    <div class="produit removable-input">
                                                        <button onclick="remove_produit(this)" type="button" class="btn btn-default btn-remove btn-remove-produit"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="produits[]" value="" size="40" maxlength="50"/>
                                                    </div>
                                                    {/if}
                                                </div>
                                                <button type="button" id="" class="btn btn-default btn-add-produit">
                                                    <i class="fa fa-plus-circle"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>
                                                    Marques
                                                </label>
                                                <div class="input-list">
                                                    {if (sizeof($oEntreprise->marques) > 0)}
                                                    {foreach $oEntreprise->marques as $marques}
                                                    <div class="marque removable-input">
                                                        <button onclick="remove_marque(this)" type="button" class="btn btn-default btn-remove btn-remove-marque"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="marques{$marques->id}" value="{$marques->name}" size="40" maxlength="50"/>
                                                        <input type="hidden" value="{$marques->id}">
                                                    </div>
                                                    {/foreach}
                                                    {else}
                                                    <div class="marque removable-input">
                                                        <button onclick="remove_marque(this)" type="button" class="btn btn-default btn-remove btn-remove-marque"><i class="fa fa-trash"></i></button>
                                                        <input type="text" class="form-control" name="marques[]" value="" size="40" maxlength="50"/>
                                                    </div>
                                                    {/if}
                                                </div>
                                                <button type="button" id="" class="btn btn-default btn-add-marque">
                                                    <i class="fa fa-plus-circle"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Informations payantes -->
                        {if (($oEntreprise->qui_sommes_nous_active == 1)||($oEntreprise->nos_references_active == 1)||($oEntreprise->nos_services_active == 1))}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    INFORMATIONS PAYANTES
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#infoPayantes" aria-expanded="true" aria-controls="infoPayantes">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="infoPayantes" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        {if ($oEntreprise->qui_sommes_nous_active == 1)}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Rubrique Qui sommes nous?</label>
                                                <textarea class="tinyMce" name="quisommesnous" style="height:350px">{$oEntreprise->qui_sommes_nous}</textarea>
                                            </div>
                                        </div>
                                        {/if}
                                        {if ($oEntreprise->nos_references_active == 1)}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Rubrique Références</label>
                                                <textarea class="tinyMce" name="reference"  style="height:350px">{$oEntreprise->nos_references}</textarea>
                                            </div>
                                        </div>
                                        {/if}
                                        {if ($oEntreprise->nos_services_active == 1)}
                                        <div class="col-lg-12">
                                            <div class="form-group">  
                                                <label class="control-label">Rubrique Nos services</label>  
                                                <textarea class="tinyMce" name="nos_services"  style="height:350px">{$oEntreprise->nos_services}</textarea>
                                            </div>
                                        </div>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                        {if ($oEntreprise->videos_active == 1)}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    GALLERIE VIDEOS YOUTUBE
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#galleryVideosPayants" aria-expanded="true" aria-controls="galleryVideosPayants">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="galleryVideosPayants" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="video-form">
                                                <div class="form-group">
                                                    <label>Url youtube</label>
                                                    <input type="url" name="url-youtube" id="url-youtube" class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Vignette youtube</label>
                                                    <div class="fileupload fileupload-new vignette-fileupload" data-provides="fileupload">
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 189px; max-height: 137px; line-height: 10px"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer</span>
                                                            <input type="file" class="default" name="vignette" id="vignette" accept="image/*"/>
                                                            </span>
                                                            <a href="#" class="fileupload-exists" data-dismiss="fileupload"><button class="btn btn-default"><i class="fa fa-trash"></i> Supprimer</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <button type="button" onclick="updateVideoYoutube();" class="btn btn-default btn-add-video" title="Enregistrer une vidéo">
                                                        Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                        {literal}
                                        <style type="text/css">
                                        .video-list .desc
                                        {
                                            word-wrap: break-word;
                                            max-width: 350px;
                                        }
                                        </style>
                                        {/literal}
                                        <div class="col-md-8 bloc-media">
                                            <div class="row m-b-5">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="clearVideoForm();" class="btn btn-default">
                                                        Ajouter
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="video-list">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <th width="150px">Vignette</th>
                                                        <th>Url</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        {if (sizeof ($oEntreprise->videos_youtube) > 0)}
                                                        {foreach ($oEntreprise->videos_youtube as $videos)}
                                                        <tr id="{$videos->id}">
                                                            <td width="150px">
                                                                <a href="{$videos->url_youtube}" class="video-th">
                                                                    <img src="{$j_basepath}entreprise/vignetteYoutube/{$videos->vignette_video}" height="75px">
                                                                </a>
                                                            </td>
                                                            <td class="desc">{$videos->url_youtube}
                                                            </td>
                                                            <td>
                                                                <button onclick="getVideosYoutube({$videos->id});" type="button" class="btn btn-default btn-xs btn-block">Editer</button>
                                                                <button onclick="deleteVideoYoutube({$videos->id});" type="button" class="btn btn-default btn-xs btn-block">Supprimer</button>
                                                            </td>
                                                        </tr>
                                                        {/foreach}
                                                        {/if}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                        {if ($oEntreprise->galerie_image_active == 1)}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    GALLERIE IMAGES
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#galleryImagesPayants" aria-expanded="true" aria-controls="galleryImagesPayants">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="galleryImagesPayants" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="images-form">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="fileupload fileupload-new gallery-file" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 100%; height: 150px">
                                                            <img src="" alt="" />
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; height: 150px; line-height: 10px"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                            <input type="file" class="default" name="image_gallery" id="image_gallery" accept="image/*"/>
                                                            </span>
                                                            <a href="#" class="fileupload-exists" data-dismiss="fileupload"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
                                                            <button type="button" class="btn btn-default btn-add-video fileupload-exists" title="Ajouter une vidéo" onclick="addImageGallery();">
                                                                Upload
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {literal}
                                        <style type="text/css">
                                            .image-list {
                                                padding-top: 27px;
                                            }
                                            .bt-remove-image {
                                                color: #ffdd00;
                                                background: #000;
                                                height: 25px;
                                                width: 25px;
                                                position: absolute;
                                                right: 0px;
                                                top: 0px;
                                                text-align: center;
                                                cursor: pointer;
                                            }
                                            .bt-remove-image:hover {
                                                color: #000;
                                                background: #ffdd00;                                                
                                            }
                                            .image-list
                                            {
                                                text-align: center;                                                
                                            }
                                            .item {
                                                text-align: center;
                                                display: inline-block;
                                                margin: 5px;
                                                position: relative;
                                            }
                                        </style>
                                        {/literal}
                                        <div class="col-md-9 bloc-media"> 
                                            <div class="image-list">
                                                {foreach($oEntreprise->getImagesGalerieList() as  $image)}             
                                                    <div class="item {$image->id}">
                                                        <a class="fancybox" rel="gallery1" href="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$image->image}">
                                                            <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$image->image}" width="100px" height="100px">
                                                        </a>
                                                        <span class="bt-remove-image" onclick="deleteImageGallery({$image->id})"><i class="fa fa-trash"></i></span>
                                                        
                                                    </div>
                                                {/foreach}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                        {if ($oEntreprise->catalogue_active == 1)}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    CATALOGUE
                                    <a role="button" class="button-collapse" style="float:right" data-toggle="collapse" data-parent="#accordion" href="#catalogue" aria-expanded="true" aria-controls="catalogue">
                                        <i class="fa fa-plus-square"></i>
                                        <i class="fa fa-minus-square"></i>
                                    </a>
                                </h3>
                            </div>
                            <div id="catalogue" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-5 r-form" id="catalogue-form">
                                            <div class="form-group">
                                                <label>Référence produit (*)</label>
                                                <input id="refProduit" name="refProduit" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Nom produit (*)</label>
                                                <input id="nomProduit" name="nomProduit" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Image produit (*):</label>
                                                <div class="fileupload fileupload-new catalogue-file" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail catalogue_image" style="max-height: 150px; line-height: 20px">
                                                        <img src="" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-default btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                        <input type="file" class="default" id="img_produit" name="img_produit"/>
                                                        </span>&nbsp;
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Description produit (*)</label>
                                                <textarea id="descProduit" name="descProduit" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Marque produit (*)</label>
                                                <input id="marqueProduit" name="marqueProduit" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Prix produit (*)</label>
                                                <div class="input-group">
                                                    <input id="prixProduit" name="prixProduit" type="text" class="form-control">
                                                    <span class="input-group-addon">Ar</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" onclick="updateProduitCatalogue()" class="catalogue-save-add btn btn-default btn-outline">
                                                    <span class="visible-lg hidden-sm hidden-xs">
                                                        {@entreprise~entreprise.enregistrer.la.catalogue@}
                                                    </span>
                                                    <span class="hidden-lg visible-sm visible-xs">
                                                        {@common~common.enregistrer@}
                                                    </span>
                                                </button>
                                                <button type="button" onclick="clearCatalogueForm();" class="btn btn-primary btn-outline">{@common~common.annuler@}</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row m-b-5">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="clearCatalogueForm();" class="btn btn-default">
                                                        Ajouter
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive" id="catalogue-list">
                                                <table class="table table-striped footable">
                                                    <thead>
                                                        <tr>
                                                            <th>Référence </th>
                                                            <th>Nom </th>
                                                            <th>Image </th>
                                                            <th>Prix </th>
                                                            <th>Actions </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {foreach($oCatalogueList as $oCatalogue)}
                                                        <tr class="catalogue {$oCatalogue->id}">
                                                            <td>{$oCatalogue->reference_produit}</td>
                                                            <td>{$oCatalogue->nom_produit}</td>
                                                            <td><img class="thumbnail" style="max-height: 90px; height: 90px" src="{$j_basepath}entreprise/produits/thumbnail/{$oCatalogue->image_produit}" alt="" /></td>
                                                            <td>{$oCatalogue->prix_produit}&nbsp;Ar</td>
                                                            <td>  
                                                                <button onclick="getProduitCatalogue({$oCatalogue->id});" type="button" class="btn btn-success btn-xs">Editer</button>
                                                                <button onclick="deleteProduitCatalogue({$oCatalogue->id});" type="button" class="btn btn-danger btn-xs">Supprimer</button>
                                                            </td>
                                                        </tr>
                                                        {/foreach}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                    </div>
                </div>
                <div class="btn-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="col-sm-6 btn-wrapper">
                                <input type="submit" onclick="validForm()" class="submit" value="ENVOYER"/>
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

    var form_validator = $('#form-edition').validate({
        rules: {
            raisonSociale: {
             required: true
            },
            descActivite: {
             required: true,
             minlength: 20
            },
            adresse: {
             required: true,
             minlength: 10
            }
        },
        messages: {
            raisonSociale: "Ce champ est obligatoire",
            descActivite: {
                required:"Ce champ est obligatoire",
                minlength:"Description trop courte"
            },
            adresse: {
                required:"Ce champ est obligatoire",
                minlength:"Adresse trop courte"
            } 
        }
    });
    $('.input-telephone').rules("add", {
        phone: true
    });
    $('.button-collapse').each(function(){
        target = $(this).attr('href');
        if ($(target).hasClass('in'))
        {
            $(this).find('.fa-plus-square').addClass('hide');
        }
        else
        {
            $(this).find('.fa-minus-square').addClass('hide');
        }
    });
    $(".collapse").on('shown.bs.collapse', function(){
        $(this).siblings('.panel-heading').find('.fa-plus-square').addClass('hide');
        $(this).siblings('.panel-heading').find('.fa-minus-square').removeClass('hide');
    });
    $(".collapse").on('hidden.bs.collapse', function(){
        $(this).siblings('.panel-heading').find('.fa-plus-square').removeClass('hide');
        $(this).siblings('.panel-heading').find('.fa-minus-square').addClass('hide');
    });

    //Telephones
    $('.btn-add-telephone').click(function(){
        var form = '<div class="removable-input telephone">'+
                        '<button onclick="remove_phone(this)" type="button" class="btn btn-default btn-remove btn-remove-telephone"><i class="fa fa-trash"></i></button>'+
                        '<input type="text" class="input-telephone form-control" name="telephones[]" value="" size="40" maxlength="15" data-rules="phone" required/>'+
                    '</div>';
        $(this).siblings('.input-list').append(form);
    });
    //Emails
    $('.btn-add-email').click(function(){
        var form = '<div class="removable-input email">'+
                        '<button type="button" onclick="remove_email(this)" class="btn btn-default btn-remove btn-remove-email"><i class="fa fa-trash"></i></button>'+
                        '<input type="email" class="form-control" name="emails[]" value="" size="40" maxlength="255"/>'+
                    '</div>';
        $(this).siblings('.input-list').append(form);
    });
    //Services
    $('.btn-add-service').click(function(){
        var form = '<div class="removable-input service">'+
                        '<button type="button" onclick="remove_service(this)" class="btn btn-default btn-remove btn-remove-service"><i class="fa fa-trash"></i></button>'+
                        '<input type="text" class="form-control" name="services[]" value="" size="40" maxlength="50"/>'+
                    '</div>';
        $(this).siblings('.input-list').append(form);
    });
    //Produits
    $('.btn-add-produit').click(function(){
        var form = '<div class="removable-input produit">'+
                        '<button type="button" onclick="remove_produit(this)" class="btn btn-default btn-remove btn-remove-produit"><i class="fa fa-trash"></i></button>'+
                        '<input type="text" class="form-control" name="produits[]" value="" size="40" maxlength="50"/>'+
                    '</div>';
        $(this).siblings('.input-list').append(form);
    });
    //Marques
    $('.btn-add-marque').click(function(){
        var form = '<div class="removable-input marque">'+
                        '<button type="button" onclick="remove_marque(this)" class="btn btn-default btn-remove btn-remove-marque"><i class="fa fa-trash"></i></button>'+
                        '<input type="text" class="form-control" name="marques[]" value="" size="40" maxlength="50"/>'+
                    '</div>';
        $(this).siblings('.input-list').append(form);
    });

});
function remove_phone(elem)
{
    if ($('.removable-input.telephone').length > 1)
    {        
        swal({
            title: '',
            text: "Êtes-vous sure de vouloir supprimer ce numéro ?",
            showCancelButton: true,
            confirmButtonColor: "#ffdd00",
            confirmButtonText: "oui",
            cancelButtonText: "non",
            closeOnConfirm: true
        }, function () {
            if ($(elem).siblings('input[type=hidden]').length)
            {
                var hdn = $(elem).siblings('input[type=hidden]');
                var hdnRmv = '<input type="hidden" name="hdn-rmv-telephone[]" value="'+hdn.val()+'"/>';
                $(elem).parents('.input-list').append(hdnRmv);
            }
            $(elem).parents('.removable-input').remove();
        });
    }
}
function remove_email(elem)
{
    if ($('.removable-input.email').length > 1)
    {        
        swal({
            title: '',
            text: "Êtes-vous sure de vouloir supprimer cet email ?",
            showCancelButton: true,
            confirmButtonColor: "#ffdd00",
            confirmButtonText: "oui",
            cancelButtonText: "non",
            closeOnConfirm: true
        }, function () {
            if ($(elem).siblings('input[type=hidden]').length)
            {
                var hdn = $(elem).siblings('input[type=hidden]');
                var hdnRmv = '<input type="hidden" name="hdn-rmv-email[]" value="'+hdn.val()+'"/>';
                $(elem).parents('.input-list').append(hdnRmv);
            }
            $(elem).parents('.removable-input').remove();
        });
    }
}
function remove_service(elem)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer ce service ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if ($(elem).siblings('input[type=hidden]').length)
        {
            var hdn = $(elem).siblings('input[type=hidden]');
            var hdnRmv = '<input type="hidden" name="hdn-rmv-service[]" value="'+hdn.val()+'"/>';
            $(elem).parents('.input-list').append(hdnRmv);
        }
        $(elem).parents('.removable-input').remove();
    });
}
function remove_produit(elem)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer ce produit ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if ($(elem).siblings('input[type=hidden]').length)
        {
            var hdn = $(elem).siblings('input[type=hidden]');
            var hdnRmv = '<input type="hidden" name="hdn-rmv-produit[]" value="'+hdn.val()+'"/>';
            $(elem).parents('.input-list').append(hdnRmv);
        }
        $(elem).parents('.removable-input').remove();
    });
}
function remove_marque(elem)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer cette marque ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if ($(elem).siblings('input[type=hidden]').length)
        {
            var hdn = $(elem).siblings('input[type=hidden]');
            var hdnRmv = '<input type="hidden" name="hdn-rmv-marque[]" value="'+hdn.val()+'"/>';
            $(elem).parents('.input-list').append(hdnRmv);
        }
        $(elem).parents('.removable-input').remove();
    });
}

{/literal}
{if ($oEntreprise->videos_active == 1)}
{literal}
// script vidéos youtube
function getVideosYoutube(id)
{
    if (id != '')
    {
        var formdata = new FormData();
        var img;
        formdata.append("id", id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jUrl "front_office~entreprise:getVideosYoutube"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                clearVideoForm()
                $('.video-form #url-youtube').val(data.url_youtube);
                $('.video-form #vignette-thumbnail').attr('src', '{/literal}{$j_basepath}entreprise/vignetteYoutube/{literal}'+data.vignette_video);
                if ($('.video-form #video-id').length > 0)
                {
                    $('.video-form #video-id').val(data.id);
                }
                else
                {
                    var inputHdn = '<input type="hidden" name="video-id" id="video-id"/>'
                    $('.video-form').append(inputHdn);
                    $('.video-form #video-id').val(data.id);
                }
            },
            error: function() {
               
            }
        });
    }
}
function clearVideoForm()
{    
    $('.video-form #url-youtube').val('');
    $('.video-form #vignette-thumbnail').attr('src', '');
    $('.vignette-fileupload').fileupload('reset');

    if ($('.video-form #video-id').length > 0)
    {
        $('.video-form #video-id').remove();
    }
}

function updateVideoYoutube()
{
    if ($('.video-form #video-id').length > 0)
    {
        var videoId = $('.video-form #video-id').val();
    }
    else
    {
        var videoId = '';
    }
    var urlVideo = $('.video-form #url-youtube').val();
    var vignetteVideo = '';
    if ($('#vignette').val() !='')
    {
        var vignetteVideo = $('#vignette')[0].files[0];
    }
    var entrepriseId = $('input[name="entreprise"]').val();
    if (urlVideo != '')
    {
        var formdata = new FormData();
        var img;
        formdata.append("vignette", vignetteVideo);
        formdata.append("id", videoId);
        formdata.append("url", urlVideo);
        formdata.append("entrepriseId", entrepriseId);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jUrl "front_office~entreprise:updateVideosYoutube"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                data;
                if (data.url_youtube != '')
                {
                    if (videoId != '')
                    {
                        var selector = 'tr#'+videoId;
                        var td = '<td width="150px">'+
                                    '<a href="'+data.url_youtube+'" class="video-th">'+
                                        '<img src="{/literal}{$j_basepath}{literal}entreprise/vignetteYoutube/'+data.vignette_video+'" height="75px">'+
                                    '</a>'+
                                '</td>'+
                                '<td>'+
                                    '<p class="desc">'+data.url_youtube+'</p>'+
                                '</td>'+
                                '<td>'+
                                    '<button onclick="getVideosYoutube('+data.id+');" type="button" class="btn btn-default btn-xs btn-block">Editer</button>'+
                                    '<button onclick="deleteVideoYoutube('+data.id+');" type="button" class="btn btn-default btn-xs btn-block">Supprimer</button>'+
                                '</td>';
                        $(selector).html(td);
                    }
                    else
                    {
                        var tr = '<tr id="'+data.id+'">'+
                                    '<td width="150px">'+
                                        '<a href="'+data.url_youtube+'" class="video-th">'+
                                            '<img src="{/literal}{$j_basepath}{literal}entreprise/vignetteYoutube/'+data.vignette_video+'" height="75px">'+
                                        '</a>'+
                                    '</td>'+
                                    '<td class="desc">'+data.url_youtube+
                                    '</td>'+
                                    '<td>'+
                                        '<button onclick="getVideosYoutube('+data.id+');" type="button" class="btn btn-default btn-xs btn-block">Editer</button>'+
                                        '<button onclick="deleteVideoYoutube('+data.id+');" type="button" class="btn btn-default btn-xs btn-block">Supprimer</button>'+
                                    '</td>'+
                                '</tr>';
                        $('.video-list tbody').append(tr);
                    }
                }
                clearVideoForm();
            },
            error: function() {
               
            }   // tell jQuery not to set contentType
        });
    }
}
function deleteVideoYoutube(id)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer cette vidéos ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if (id != '')
        {
            var formdata = new FormData();
            var img;
            formdata.append("id", id);
            $.ajax({
                type: 'POST',
                url: '{/literal}{jUrl "front_office~entreprise:deleteVideosYoutube"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    clearVideoForm();
                    var selector = 'tr#'+id;
                    $(selector).remove();
                },
                error: function() {
                   
                }
            });
        }
    });    
}
// fin script vidéos youtube
{/literal}
{/if}

{if ($oEntreprise->galerie_image_active == 1)}
{literal}
// Script gallery image
function addImageGallery()
{
    if ($('#image_gallery').val() !='')
    {
        var image_gallery = $('#image_gallery')[0].files[0];
        var entrepriseId = $('input[name="entreprise"]').val();
        var formdata = new FormData();
        var img;
        formdata.append("image_gallery", image_gallery);
        formdata.append("entrepriseId", entrepriseId);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jUrl "front_office~entreprise:addImageGallery"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                data;
                if (data.image != '')
                {
                    var item = '<div class="item '+data.id+'">'+
                                    '<a class="fancybox" rel="gallery1" href="{/literal}{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{literal}'+data.image+'">'+
                                        '<img src="{/literal}{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{literal}'+data.image+'" width="100px" height="100px">'+
                                    '</a>'+
                                    '<span class="bt-remove-image" onclick="deleteImageGallery('+data.image+')"><i class="fa fa-trash"></i>'+
                                    '</span>'+
                                '</div>';
                    $('.image-list').append(item);
                    clearImageForm();
                }
            }
        });
    }
}
function deleteImageGallery(id)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer cette image de la gallérie ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if (id != '')
        {
            var formdata = new FormData();
            formdata.append("id", id);
            $.ajax({
                type: 'POST',
                url: '{/literal}{jUrl "front_office~entreprise:deleteImageGallery"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    clearImageForm();
                    var selector = '.item.'+id;
                    $(selector).remove();
                },
                error: function() {
                   
                }
            });
        }
    });
}
function clearImageForm()
{
    $('.gallery-file').fileupload('reset');
}
// Fin script gallery image
{/literal}
{/if}

{if ($oEntreprise->catalogue_active == 1)}
{literal}
// Script catalogue
function clearCatalogueForm()
{    
    $('#refProduit').val('');
    $('#nomProduit').val('');

    $('.catalogue-file').fileupload('clear');
    $('.catalogue_image img').attr('src','');

    $('#descProduit').val('');
    $('#marqueProduit').val('');
    $('#prixProduit').val('');

    if ($('#catalogue-id').length > 0)
    {
        $('#catalogue-id').remove();
    }
}

function getProduitCatalogue(id)
{
    if (id != '')
    {
        var formdata = new FormData();
        formdata.append("id", id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jUrl "front_office~entreprise:getProduitCatalogue"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                clearCatalogueForm();

                $('#refProduit').val(data.reference_produit);
                $('#nomProduit').val(data.nom_produit);

                $('.catalogue_image img').attr('src','{/literal}{$j_basepath}entreprise/produits/thumbnail/{literal}'+data.image_produit);

                $('#descProduit').val(data.description_produit);
                $('#marqueProduit').val(data.marque_produit);
                $('#prixProduit').val(data.prix_produit);

                if ($('#catalogue-id').length > 0)
                {
                    $('#catalogue-id').val(data.id);
                }
                else
                {
                    var inputHdn = '<input type="hidden" name="catalogue-id" id="catalogue-id"/>'
                    $('#catalogue-form').append(inputHdn);
                    $('#catalogue-id').val(data.id);
                }
            },
            error: function() {
               
            }
        });
    }

}

function updateProduitCatalogue()
{
    if ($('#catalogue-id').length > 0)
    {
        var id = $('#catalogue-id').val();
    }
    else
    {
        var id = '';
    }
    var reference_produit   = $('#refProduit').val();
    var nom_produit         = $('#nomProduit').val();
    var description_produit = $('#descProduit').val();
    var marque_produit      = $('#marqueProduit').val();
    var prix_produit        = $('#prixProduit').val();
    var entrepriseId        = $('input[name="entreprise"]').val();

    if ($('#img_produit').val() !='')
    {
        var img_produit = $('#img_produit')[0].files[0];
    }
    if ((reference_produit != '') && (nom_produit != '') && (description_produit != '') && (prix_produit != ''))
    {
        var formdata = new FormData();

        formdata.append("id", id);
        formdata.append("reference_produit", reference_produit);
        formdata.append("nom_produit", nom_produit);
        formdata.append("img_produit", img_produit);
        formdata.append("description_produit", description_produit);
        formdata.append("marque_produit", marque_produit);
        formdata.append("prix_produit", prix_produit);
        formdata.append("entrepriseId", entrepriseId);

        $.ajax({
            type: 'POST',
            url: '{/literal}{jUrl "front_office~entreprise:updateProduitCatalogue"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.nom_produit != '')
                {
                    if (id == '')
                    {
                        var tr = '<tr class="catalogue '+data.id+'">'+
                                    '<td>'+data.reference_produit+'</td>'+
                                    '<td>'+data.nom_produit+'</td>'+
                                    '<td><img class="thumbnail" style="max-height: 90px; height: 90px" src="{/literal}{$j_basepath}{literal}entreprise/produits/thumbnail/'+data.image_produit+'" alt="" /></td>'+
                                    '<td>'+data.prix_produit+' Ar</td>'+
                                    '<td>'+
                                        '<button onclick="getProduitCatalogue('+data.id+');" type="button" class="btn btn-success btn-xs">Editer</button>'+
                                        '<button onclick="deleteProduitCatalogue('+data.id+');" type="button" class="btn btn-danger btn-xs">Supprimer</button>'+
                                    '</td>'+
                                 '</tr>';
                        $('#catalogue-list tbody').append(tr);
                    }
                    else
                    {
                        var selector    = '.catalogue.'+id;

                        var td          =   '<td>'+data.reference_produit+'</td>'+
                                            '<td>'+data.nom_produit+'</td>'+
                                            '<td><img class="thumbnail" style="max-height: 90px; height: 90px" src="{/literal}{$j_basepath}{literal}entreprise/produits/thumbnail/'+data.image_produit+'" alt="" /></td>'+
                                            '<td>'+data.prix_produit+' Ar</td>'+
                                            '<td>'+
                                                '<button onclick="getProduitCatalogue('+data.id+');" type="button" class="btn btn-success btn-xs">Editer</button>'+
                                                '<button onclick="deleteProduitCatalogue('+data.id+');" type="button" class="btn btn-danger btn-xs">Supprimer</button>'+
                                            '</td>';
                        $(selector).html(td);
                    }

                    clearCatalogueForm();

                }
            }
        });
    }
}

function deleteProduitCatalogue(id)
{
    swal({
        title: '',
        text: "Êtes-vous sure de vouloir supprimer ce produit ?",
        showCancelButton: true,
        confirmButtonColor: "#ffdd00",
        confirmButtonText: "oui",
        cancelButtonText: "non",
        closeOnConfirm: true
    }, function () {
        if (id != '')
        {
            var formdata = new FormData();
            formdata.append("id", id);
            $.ajax({
                type: 'POST',
                url: '{/literal}{jUrl "front_office~entreprise:deleteProduitCatalogue"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    clearCatalogueForm();
                    var selector    = '.catalogue.'+id;
                    $(selector).remove();
                },
                error: function() {
                   
                }
            });
        }
    });
}
{/literal}
{/if}
{literal}
</script>
{/literal}