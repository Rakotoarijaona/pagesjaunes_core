{$COMMONSCRIPT}

<!-- contenus -->
<main>
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-8"><h1>Formulaire d’inscription</h1></div>
            </div>
        </div>
    </div>
    <div class="form-wrapper">        
        <div role="form">
            <div class="screen-reader-response" style="display:none;"></div>
            <form action="{jurl 'front_office~default:save_insription'}" method="post" id="form" class="form" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <p>Veuillez remplir les champs ci-dessous, les champs marqués par (*) sont obligatoires</p>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10">
                                    <p>
                                        <label>Nom ou raison sociale (*)</label>
                                        <span>
                                            <input type="text" name="raisonsociale" value="" size="40" maxlength="200"/>
                                        </span>
                                    </p>
                                    <p>
                                        <label>Description courte de votre activité (*)</label>
                                        <span class="your-activite">
                                            <input type="text" name="activite" value="" size="40" maxlength="200"/>
                                        </span>
                                    </p>
                                    <p>
                                        <label>Adresse (*)</label>
                                        <span class="your-adresse">
                                            <textarea name="adresse" cols="40" rows="3" maxlength="500" minlength="10"></textarea>
                                        </span>
                                    </p>
                                    <p>
                                        <label>Site web </label>
                                        <span class="your-website">
                                            <input type="text" name="website" value="" size="40"/>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <p>
                                        <label>Logo</label>
                                        <span class="filelogo">
                                            <input type="file" class="file" name="filelogo" value="1" size="40"/>
                                        </span>
                                    </p>
                                    <p>
                                        <label>
                                            Contacts téléphoniques au format international <b>261(0)...</b> (*) <br/>
                                            Veuillez remplir au moins le premier champ
                                        </label><br />
                                        <span class="tel-phone1">
                                            <input type="tel" name="phone1" value="" size="40" maxlength="15"/>
                                        </span><br />
                                        <span class="tel-phone2">
                                            <input type="tel" name="phone2" value="" size="40" maxlength="15"/>
                                        </span><br />
                                        <span class="tel-phone3">
                                            <input type="tel" name="phone3" value="" size="40" maxlength="15"/>
                                        </span>
                                    </p>
                                    <p>
                                        <label>Contact email (*)</label>
                                        <span class="your-email">
                                            <input type="email" name="email" value="" size="40" maxlength="255"/>
                                        </span>
                                    </p>
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
                            <p>
                                <span class="service1">
                                    <input type="text" name="service1" value="" size="40"/>
                                </span>
                                <span class="service2">
                                    <input type="text" name="service2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" />
                                </span>
                                <span class="service3">
                                    <input type="text" name="service3" value="" size="40"/>
                                </span>
                                <span class="service4">
                                    <input type="text" name="service4" value="" size="40"/>
                                </span>
                                <span class="service5">
                                    <input type="text" name="service5" value="" size="40"/>
                                </span>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Produits</h3>
                            <p class="info">Vos produits</p>
                            <p>
                                <span class="product1">
                                    <input type="text" name="product1" value="" size="40"/>
                                </span>
                                <span class="product2">
                                    <input type="text" name="product2" value="" size="40"/>
                                </span>
                                <span class="product3">
                                    <input type="text" name="product3" value="" size="40"/>
                                </span>
                                <span class="product4">
                                    <input type="text" name="product4" value="" size="40"/>
                                </span>
                                <span class="product5">
                                    <input type="text" name="product5" value="" size="40"/>
                                </span>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Marques</h3>
                            <p class="info">Les marques que vous representez</p>
                            <p>
                                <span class="marque1">
                                    <input type="text" name="marque1" value="" size="40"/>
                                </span>
                                <span class="marque2">
                                    <input type="text" name="marque2" value="" size="40"/>
                                </span>
                                <span class="marque3">
                                    <input type="text" name="marque3" value="" size="40"/>
                                </span>
                                <span class="marque4">
                                    <input type="text" name="marque4" value="" size="40"/>
                                </span>
                                <span class="marque5">
                                    <input type="text" name="marque5" value="" size="40"/>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-group-default input-group">
                                <div class="controls">
                                    <img src="{jurl 'common~common:generateCaptcha'}" id="captcha" style="margin-top:6px;" />
                                </div>
                                <span class="input-group-addon">
                                    <a href="javascript:;" onclick="reGenerateCaptcha();" class="btn btn-primary btn-sm text-complete"><i class="fs-14 fa fa-repeat"></i></a>
                                </span>
                            </div>

                            <div class="form-group form-group-default">
                                <label>Veuillez saisir le code sur l'image</label>
                                <div class="controls">
                                    <input autocomplete="off" type="text" class="form-control" name="code" id="code" required maxlength="5" required data-msg-required="Veuillez saisir le code sur l'image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
                <div class="btn-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">&nbsp;</div>
                            <div class="col-sm-6 btn-wrapper">
                                <input type="submit" class="submit" value="ENVOYER"/>
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
var $input = $('input.file[type=file]');
if ($input.length) {
    $input.fileinput({
        language: 'fr',
        browseClass: "btn btn-default",
        showUpload: false,
        showRemove: false,
        allowedFileExtensions : ['jpg', 'png','gif']
    });
}

$(document).ready(function()
{
    $('#form').validate({
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
            phone1: {
             required: true
            },
            email: {
             required: true,
             email:true
            },
            code: {
                remote: {
                    url: {/literal}{urljsstring 'common~common:isValidCaptcha', array()}{literal},
                    type: "post",
                    data: {
                        code: function () {
                            return $("#code").val();
                        }
                    }
                }
            }
        },
        messages: {
            raisonsociale: "Ce champ est obligatoire",
            activite: "Ce champ est obligatoire",
            adresse: {
                required:"Ce champ est obligatoire",
                minlength:"Veuillez entrer une adresse valide"
            },
            phone1: "Ce champ est obligatoire",
            email: {
                required:"Ce champ est obligatoire",
                email:"Veuillez entrer un email valide"
            },
            code: {
                    remote: "Code incorrect, veuillez saisir de nouveau"
                }
        }
    });
});

// regenerate captcha
function reGenerateCaptcha() {
    $("#captcha").attr("src", j_schemedomain + j_basepath + "index.php?t=" + new Date().getTime() + "&module=common&action=common:generateCaptcha");
}

</script>

{/literal}