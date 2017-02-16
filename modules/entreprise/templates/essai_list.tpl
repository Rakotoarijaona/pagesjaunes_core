<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gestion des <strong>Entreprises</strong></h2>
        
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper 
wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edition d'une Entreprise </h5>
                </div>
                <div class="ibox-content">
                    <form id="form" action="#" class="wizard">
                        <h1>Etape 1</h1>
                        <fieldset>
                            <h2>Informations générales</h2>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label>Raison sociale *</label>
                                        <input id="raisonSociale" name="raisonSociale" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description courte activité *</label>
                                        <input id="descActivite" name="descActivite" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo :</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail background-thumbnail" style="width: 100px; height: 100px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                <input type="file" class="default" name="usr_photo"/>
                                                </span>&nbsp;
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse *</label>
                                        <input id="adresse" name="adresse" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Région </label>
                                        <input id="region" name="region" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label>Catégorie / sous-catégorie *</label>
                                            <select class="form-control">
                                              <optgroup label="Catégorie 1">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                              </optgroup>
                                              <optgroup label="Categorie 2">
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                              </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Personne à contacter </label>
                                        <input id="personneContact" name="personneContact" type="text" class="form-control">
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Fonction personne à contacter </label>
                                        <input id="fonctionPersonneContact" name="fonctionPersonneContact" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group r-select-with-delete">
                                        <label>Contacts e-mails *</label>
                                        <div class="r-multi-text">
                                            <div class="input-group">
                                                <input type="email" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group r-select-with-delete">
                                        <label>Numéros téléphones *</label>
                                        <div class="r-multi-text">
                                           <div class="input-group">
                                                <input type="text" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group r-select-with-delete">
                                        <label>Mots clés / tags *</label>
                                        <p>Les mots clés sont séparés de comma ou virgule (,)</p>
                                            <input type="hidden" name="id" value="">
                                            <textarea id="contactsEmails" class="form-control" name="contactsEmails" style="min-height:150px"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>                                         
                        <h1>Etape 2</h1>
                        <fieldset>
                            <h2>Informations Complémentaires</h2>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group r-select-with-delete">
                                        <label>Liste des services</label>
                                        <div class="r-multi-text">
                                           <div class="input-group">
                                                <input type="text" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                                </span>
                                            </div>                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group r-select-with-delete">
                                        <label>Liste des produits</label>
                                        <div class="r-multi-text">
                                           <div class="input-group">
                                                <input type="text" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group r-select-with-delete">
                                        <label>Liste des marques</label>
                                        <div class="r-multi-text">
                                           <div class="input-group">
                                                <input type="text" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Google map</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom *</label>
                                        <input id="googleMapNom" name="googleMapNom" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse *</label>
                                        <input id="googleMapAdresse" name="googleMapAdresse" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude*</label>
                                        <input id="googleMapLatitude" name="googleMapLatitude" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude *</label>
                                        <input id="googleMapLongitude" name="googleMapLongitude" type="text" class="form-control">
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    
                                    <div class="google-map" id="map1"></div>

                                </div>
                            </div>
                        </fieldset>
                        <h1>Etape 3</h1>
                        <fieldset>
                            <h2>Informations payantes</h2>
                            <div class="row">
                                <div class="col-lg-6">                                        
                                    <div class="form-group">
                                        <label class="control-label">Activation visuel de présentation *</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioVisuelPres">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioVisuelPres">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label">video mp4 :</label>
                                        <div class="controls">
                                            <div class="r-fileupload r-fileupload-new">
                                                <div class="r-fileupload-preview"></div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="r-fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                    <span class="r-fileupload-exists col-md-6"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" accept="video/mp4" id="inputvideopresentation" class="default" name="fileupload"/>
                                                </span>
                                                <span class="btn btn-white btn-file btn-file-upload r-fileupload-exists">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="videopresentationplayer">
                                        <div class="alert alert-info">Upload video</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">                                        
                                    <div class="form-group">
                                        <label class="control-label">Activation rubrique nos services</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioNosServices">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioNosServices">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <textarea class="form-control ckeditor" disabled name="nosServices"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Activation rubrique Qui sommes nous</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioQuiSomNs">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioQuiSomNs">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <textarea class="form-control ckeditor" disabled name="quiSommesNous"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Activation rubrique nos références</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioNosRef">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioNosRef">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <textarea class="form-control ckeditor" disabled name="nosRef"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Etape 4</h1>
                        <fieldset>
                            <h2>Vidéos et gallery payants</h2>
                            <div class="row form-horizontal">
                                <div class="col-lg-8 rubrique" id="rubrique-videos">                                        
                                    <div class="form-group">
                                        <label class="control-label col-lg-6">Activation rubrique "videos" *</label>
                                        <div class="input-group col-lg-6">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioActivVideo">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioActivVideo">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group" id="urlyoutube">
                                        <div class="row">
                                            <label class="control-label col-lg-4">Url youtube :</label>
                                            <div class="input-group col-lg-8">
                                                <input type="text" id="url-video-youtube" name="url-video-youtube" class="form-control" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-lg-4">Vignette youtube:</label>
                                            <div class="fileupload fileupload-new col-lg-8 videoUpload" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail background-thumbnail" style="width: 150px; height: 70px;">
                                                    <img src="" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 70px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                        <input type="file" class="default" accept="image/*" id="vignette-video-youtube" name="vignette-video-youtube"/>
                                                    </span>&nbsp;
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i></a>
                                                    <span class="fileupload-exists btn-file btn btn-primary" id="bt-add-video-youtube"><i class="fa fa-upload"></i></span> 
                                                </div> 
                                            </div>                                      
                                        </div>
                                        <div class="dynamic-tab-list col-lg-offset-4 col-lg-8" style="padding: 0px 0px">
                                            <table style="max-width: 100%; clear:both; width: 100%" class="table-profil table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Url youtube</th>
                                                        <th>Vignette </th>
                                                        <th style="width: 50px">Actions </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="video-youtube-list" style="max-width: 460px; clear:both; width: 100%; min-height: 50px">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 rubrique" id="rubrique-image">                                        
                                    <div class="form-group">
                                        <label class="control-label col-lg-6">Activation rubrique galérie image *</label>
                                        <div class="input-group col-lg-6">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="true" name="radioVisuelPres">
                                                <label for="inlineRadio1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio2" value="false" name="radioVisuelPres">
                                                <label for="inlineRadio2"> non </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-lg-4">Image:</label>
                                            <div class="fileupload fileupload-new col-lg-8 imageUpload" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail background-thumbnail" style="width: 150px; height: 70px;">
                                                    <img src="" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 70px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                        <input type="file" class="default" id="galerie-image" accept="image/*" name="galerie-image"/>
                                                    </span>&nbsp;
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i></a>
                                                    <span class="fileupload-exists btn-file btn btn-primary" id="bt-add-image"><i class="fa fa-upload"></i></span> 
                                                </div> 
                                            </div>                                      
                                        </div>
                                        <div class="dynamic-tab-list col-lg-offset-4 col-lg-8" style="padding: 0px 0px">
                                            <table style="max-width: 100%; clear:both; width: 100%" class="table-profil table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th style="width: 50px">Actions </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="image-list" style="max-width: 460px; clear:both; width: 100%; min-height: 50px">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h1>Etape 5</h1>
                        <fieldset>
                            <h2>Nos catalogues</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Référence produit *</label>
                                        <input id="refProduit" name="refProduit" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nom produit *</label>
                                        <input id="nomProduit" name="nomProduit" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image produit *:</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                <input type="file" class="default" name="img_produit"/>
                                                </span>&nbsp;
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description produit *</label>
                                        <textarea id="descProduit" name="descProduit" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Marque produit *</label>
                                        <input id="marqueProduit" name="marqueProduit" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Prix produit *</label>
                                        <div class="input-group">
                                            <input id="prixProduit" name="prixProduit" type="text" class="form-control">
                                            <span class="input-group-addon">Ar</span>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <button class="btn btn-white">Enregistrer</button>
                                        <button class="btn btn-white">Annuler</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" placeholder="Filtre" id="produit-filter" class="input-sm form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jfullurl 'right~right:show_modal_add_profil'}" data-toggle="modal">
                                                <button class="btn btn-primary" type="button">Ajouter</i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table-profil table table-striped table-bordered" data-page-size="8" data-filter=#produit-filter>
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Référence </th>
                                                    <th>Nom </th>
                                                    <th>Prix </th>
                                                    <th>Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                                                    
                                                    <td>
                                                        <input type="checkbox" class="i-checks" name="groupedAction[]" value="">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>  
                                                        <a href="" class="btn btn-info btn-xs">Gérer</a> 
                                                        <a href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jfullurl 'right~right:show_modal_update_profil',array('id_profile'=>$rowProfile->iGroupId)}" data-toggle="modal">
                                                            <button type="button" class="btn btn-success btn-xs">Editer</button>
                                                        </a>

                                                        <a  href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jurl 'right~right:show_modal_delete_profil',array('id_profile'=>$rowProfile->iGroupId)}" data-toggle="modal">
                                                            <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <select class="form-control m-b" name="actionGroup">
                                                    <option value="0">Action groupées :</option>
                                                    <option value="delete">Supprimer</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-sm btn-white"> Appliquer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    
    $("#form").steps({
        bodyTag: "fieldset",
        onFinishing: function (event, currentIndex)
        {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            var form = $(this);

            // Submit form input
            form.submit();
        }
    }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
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
    CKEDITOR.replace( 'nosServices');
    CKEDITOR.replace( 'quiSommesNous');
    CKEDITOR.replace( 'nosRef');
});
</script>
<!-- rubrique table-list -->
<script src="{/literal}{$j_basepath}adminlibraries/js/rubrique.js{literal}"></script>

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

{$SCRIPT}
<!--Video-->
{literal}
<script src="{/literal}{$j_basepath}adminlibraries/js/rubrique.js{literal}"></script>
{/literal}