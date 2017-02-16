<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gestion des contenus <strong>Homepage</strong></h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Parallax</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
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
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Titre parallax *:</label>
                                <div>
                                    <input type="text" placeholder="titre parallax" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Description parallax *:</label>
                                <div>
                                    <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Reférence</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Titre :</label>
                                <div>
                                    <input type="text" placeholder="titre" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Description :</label>
                                <div>
                                    <textarea class="form-control ckeditor" name="reference" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">image :</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 240px; height: 140px;">
                                        <img src="" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 240px; max-height: 140px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                       <input type="file" class="default" name="imageToUpload"/>
                                       </span>&nbsp;
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Position image : </label>
                                <div class="input-group">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="option1" name="radioposition">
                                        <label for="inlineRadio1"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio2" value="option2" name="radioposition">
                                        <label for="inlineRadio2"> Droite </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Bloc marketing</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class="form-control ckeditor" name="marketing" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                            <button type="button" class="btn btn-primary">Enregistrer</button>
                            <a href="{jurl 'slideshow~slideshow:index'}"><button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button></a>   
                    </div>
                </div>
            </form>
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
    var $image = $(".image-crop > img");
    $($image).cropper({
        aspectRatio: 1.618,
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
        }

        $("#download").click(function() {
            $image.cropper("done");
            window.open($image.cropper("getDataURL"));
        });
});
</script>
{/literal}