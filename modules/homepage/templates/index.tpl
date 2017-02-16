<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Homepage</h2>    
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Homepage</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins" id="homepage">
                <div class="ibox-title">
                    <h2>PARALLAX</h2>  {ifacl2 "homepage.update"}| <a class="edit-homepage" onclick="return setRemote(this);" data-remote-target="#homepage" data-load-remote="{jfullurl 'homepage~homepage:edit_homepage'}">Modifier</a>{/ifacl2}
                </div>
                <div class="ibox-content" id="parallax">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Background:</h4>
                            <div class="" style="width: 300px;">
                                <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->background_parallax}" style="width:300px" alt="aucun image" />
                            </div>
                            <h4>Titre:</h4>
                            <h3 class="r-well">{$oHomepage->titre_parallax}</h3>

                            <h4>Description:</h4>
                            <div class="r-well">{$oHomepage->description_parallax}</div>
                        </div>
                    </div>
                </div>
                <div class="ibox-title">
                    <h2>REFERENCE</h2> {ifacl2 "homepage.update"}| <a class="edit-homepage" onclick="return setRemote(this);" data-remote-target="#homepage" data-load-remote="{jfullurl 'homepage~homepage:edit_homepage'}">Modifier</a>{/ifacl2}
                </div>
                <div class="ibox-content" id="reference">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Titre:</h4>
                            <h3 class="r-well">{$oHomepage->titre_reference}</h3>
                            <h4>Description:</h4>
                            <div class="r-well">{$oHomepage->description_reference}</div>
                            <h4>Image:</h4>
                            <div class="" style="width: 300px;">
                                <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->image_reference}" style="width:300px" alt="aucun image" />
                            </div>
                            <h4>Position image:</h4>
                            {if $oHomepage->position_image_reference == 0}
                            <div class="r-well">Gauche</div>
                            {else}
                            <div class="r-well">Droite</div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="ibox-title">
                    <h2>MARKETING</h2> {ifacl2 "homepage.update"}| <a class="edit-homepage" onclick="return setRemote(this);" data-remote-target="#homepage" data-load-remote="{jfullurl 'homepage~homepage:edit_homepage'}">Modifier</a>{/ifacl2}
                </div>
                <div class="ibox-content" id="marketing">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="r-well">{$oHomepage->bloc_marketing}</div>
                            <br>
                            <div class="" style="width: 300px;">
                                <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_MEDIUM_FOLDER}/{$oHomepage->image_marketing}" style="width:300px" alt="aucun image" />
                            </div>
                            <h4>Position image:</h4>
                            {if $oHomepage->position_image_marketing == 0}
                            <div class="r-well">Gauche</div>
                            {else}
                            <div class="r-well">Droite</div>
                            {/if}
                        </div>
                    </div>
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
    };

    $("#download").click(function() {
        $image.cropper("done");
        alert ('vody');
        window.open($image.cropper("getDataURL"));
    });
    $('.edit-homepage').on('click', function (e){
        $('#parallax').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
        $('#marketing').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
        $('#reference').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
    });
});
</script>
{/literal}