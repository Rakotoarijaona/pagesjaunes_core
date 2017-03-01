                
                <form action="{jurl 'homepage~homepage:save_edit'}" method="POST" enctype="multipart/form-data">
                    
                    <div class="ibox-content">
                        <div class="row">   
                            <div class="col-lg-12 text-left">
                                <a href="{jurl 'homepage~homepage:index'}"><button type="button" class="btn btn-white" >Annuler</button></a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-title">
                        <h2>PARALLAX</h2>
                    </div>
                    <div class="ibox-content" id="parallax">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Background :</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 240px; height: 140px;">
                                        <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->background_parallax}" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 240px; max-height: 140px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                       <input type="file" class="default" name="background_parallax"/>
                                       </span>&nbsp;
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="form-group col-lg-12">
                                <label class="control-label">Background parallax * :</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="image-crop">
                                            <img src="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Preview image</h4>
                                        <div class="img-preview img-preview-sm"></div>
                                        
                                        <div class="btn-group">
                                            <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                                Upload new image
                                            </label>
                                            <label title="Donload image" id="download" class="btn btn-primary">Download</label>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="form-group col-lg-12">
                                <label class="control-label">Titre parallax *:</label>
                                <div>
                                    <input type="text" placeholder="titre parallax" name="titre_parallax" value="{$oHomepage->titre_parallax}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Description parallax *:</label>
                                <div>
                                    <textarea class="form-control ckeditor" name="description_parallax" rows="6">{$oHomepage->description_parallax}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-title">
                        <h2>REFERENCE</h2>
                    </div>
                    <div class="ibox-content" id="reference">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Titre :</label>
                                <div>
                                    <input type="text" placeholder="titre" name="titre_reference" value="{$oHomepage->titre_reference}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Description :</label>
                                <div>
                                    <textarea class="form-control ckeditor" name="description_reference" rows="6">{$oHomepage->description_reference}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">image :</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 240px; height: 140px;">
                                        <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->image_reference}" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 240px; max-height: 140px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                       <input type="file" class="default" name="image_reference"/>
                                       </span>&nbsp;
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Position image : </label>
                                <div class="input-group">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="0" {if ($oHomepage->position_image_reference == '0')}checked{/if} name="position_image_reference">
                                        <label for="inlineRadio1"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio2" value="1" {if ($oHomepage->position_image_reference == '1')}checked{/if} name="position_image_reference">
                                        <label for="inlineRadio2"> Droite </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-title">
                        <h2>MARKETING</h2>
                    </div>
                    <div class="ibox-content" id="marketing">
                        <div class="row">   
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea id="description_marketing" class="form-control ckeditor" name="description_marketing" rows="6">{$oHomepage->bloc_marketing}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">image :</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 240px; height: 140px;">
                                        <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->image_marketing}" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 240px; max-height: 140px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                       <input type="file" class="default" name="image_marketing"/>
                                       </span>&nbsp;
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Position image : </label>
                                <div class="input-group">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="positionImageMarketingLeft" value="0" {if ($oHomepage->position_image_marketing == '0')}checked{/if} name="position_image_marketing">
                                        <label for="positionImageMarketingLeft"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="positionImageMarketingRight" value="1" {if ($oHomepage->position_image_marketing == '1')}checked{/if} name="position_image_marketing">
                                        <label for="positionImageMarketingRight"> Droite </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 hr-line-dashed"></div>
                            <div class="col-lg-12 text-left">
                                <a href="{jurl 'homepage~homepage:index'}"><button type="button" class="btn btn-white" >Annuler</button></a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
{literal}

<script>
$(document).ready(function(){
    var $image = $(".image-crop > img");
    $($image).cropper({
        aspectRatio: 16/9,
        modal: true,
        preview: ".img-preview",
        done: function(data) {
            // Output the result data for cropping image.
        }
    });

    var $inputImage = $("#inputImage");
    if (window.FileReader) {
        $inputImage.change(function() {
            var fileReader = new FileReader(),
                    files = this.files,
                    file;

            if (!files.length) {
                return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function () {
                    $inputImage.val("");
                    $image.cropper("reset", true).cropper("replace", this.result);
                };
            } else {
                showMessage("Please choose an image file.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    };
    $("#download").click(function() {
        $image.cropper("done");
        alert ('vody');
        window.open($image.cropper("getDataURL"));
    });

    CKEDITOR.replace( 'description_parallax');
    CKEDITOR.replace( 'description_reference');

    CKEDITOR.replace( 'description_marketing');
    CKEDITOR.config.contentsCss = '{/literal}{$j_basepath}{literal}frontlibraries/stylesheets/styles_pagesjaunes.css' ; 
});
</script>
{/literal}