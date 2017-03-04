{$COMMONSCRIPT}
<script src="{$j_basepath}adminlibraries/js/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- contenus -->
<main>
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-8"><h1>Formulaire d'inscription</h1></div>
            </div>
        </div>
    </div>
    <div class="form-wrapper">
        <div role="form">
            <div class="screen-reader-response" style="display:none;"></div>
            <form action="{jurl 'front_office~default:save_inscription'}" method="post" id="formInscription" name="formInscription" class="form" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <p>Veuillez remplir les champs ci-dessous, les champs marqués par (*) sont obligatoires</p>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Nom ou raison sociale (*)</label>
                                        <span>
                                            <input autocomplete="off" type="text" name="raisonsociale" id="raisonsociale" value="" size="40" maxlength="200" required data-msg-required="Veuillez renseigner la raison sociale" />
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Description courte de votre activité (*)</label>
                                        <span class="your-activite">
                                            <input autocomplete="off" autocomplete="off" type="text" name="activite" id="activite" value="" size="40" maxlength="200" required data-msg-required="Vuillez renseigner votre activité" />
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse (*)</label>
                                        <span class="your-adresse">
                                            <textarea name="adresse" id="adresse" cols="40" rows="3" maxlength="500" minlength="10" required data-msg-required="Veuillez renseigner l'adresse"></textarea>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Région</label>
                                        <input id="region" name="region" id="region" type="text" class="form-control" value="" maxlength="50" />
                                    </div>
                                    <div class="form-group">
                                        <label>Site web </label>
                                        <span class="your-website">
                                            <input autocomplete="off" type="text" name="website" id="website" value="" size="40" data-rule-url="true" data-msg-url="Veuillez renseigner un lien valide" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group r-form">
                                        <label>Logo :</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer</span>
                                                    <input type="file" class="default" name="filelogo" id="filelogo" accept="image/*"/>
                                                </span>&nbsp;
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group r-form">
                                        <label>
                                            Contacts téléphoniques au format international <b>261(0)...</b> (*) <br/>
                                            Veuillez remplir au moins le premier champ
                                        </label><br />
                                        <span class="tel-phone1">
                                            <input autocomplete="off" type="tel" name="phone1" id="phone1" value="" size="40" maxlength="15" required data-msg-required="Veuillez renseigner le numéro de téléphone" data-rule-phone="true" data-msg-phone="Veuillez renseigner un numéro de téléphone valide" />
                                        </span><br />
                                        <span class="tel-phone2">
                                            <input autocomplete="off" type="tel" name="phone2" id="phone2" value="" size="40" maxlength="15" data-rule-phone="true" data-msg-phone="Veuillez renseigner un numéro de téléphone valide" />
                                        </span><br />
                                        <span class="tel-phone3">
                                            <input autocomplete="off" type="tel" name="phone3" id="phone3" value="" size="40" maxlength="15" data-rule-phone="true" data-msg-phone="Veuillez renseigner un numéro de téléphone valide" />
                                        </span>
                                    </div>
                                    <div class="form-group r-form">
                                        <label>Contact email (*)</label>
                                        <span class="your-email">
                                            <input autocomplete="off" type="email" name="email" id="email" value="" size="40" maxlength="255" required data-msg-required="Veuillez renseigner le contact email" data-rule-email="true" data-msg-email="Veuillez renseigner un adresse email valide" />
                                        </span>
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
                            <p>
                                <span class="service1">
                                    <input autocomplete="off" type="text" name="service1" id="service1" value="" size="40" />
                                </span>
                                <span class="service2">
                                    <input autocomplete="off" type="text" name="service2" id="service2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" />
                                </span>
                                <span class="service3">
                                    <input autocomplete="off" type="text" name="service3" id="service3" value="" size="40" />
                                </span>
                                <span class="service4">
                                    <input autocomplete="off" type="text" name="service4" id="service4" value="" size="40" />
                                </span>
                                <span class="service5">
                                    <input autocomplete="off" type="text" name="service5" id="service5" value="" size="40" />
                                </span>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Produits</h3>
                            <p class="info">Vos produits</p>
                            <p>
                                <span class="product1">
                                    <input autocomplete="off" type="text" name="product1" id="product1" value="" size="40" />
                                </span>
                                <span class="product2">
                                    <input autocomplete="off" type="text" name="product2" id="product2" value="" size="40" />
                                </span>
                                <span class="product3">
                                    <input autocomplete="off" type="text" name="product3" id="product3" value="" size="40" />
                                </span>
                                <span class="product4">
                                    <input autocomplete="off" type="text" name="product4" id="product4" value="" size="40" />
                                </span>
                                <span class="product5">
                                    <input autocomplete="off" type="text" name="product5" id="product5" value="" size="40" />
                                </span>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Marques</h3>
                            <p class="info">Les marques que vous representez</p>
                            <p>
                                <span class="marque1">
                                    <input autocomplete="off" type="text" name="marque1" id="marque1" value="" size="40" />
                                </span>
                                <span class="marque2">
                                    <input autocomplete="off" type="text" name="marque2" id="marque2" value="" size="40" />
                                </span>
                                <span class="marque3">
                                    <input autocomplete="off" type="text" name="marque3" id="marque3" value="" size="40" />
                                </span>
                                <span class="marque4">
                                    <input autocomplete="off" type="text" name="marque4" id="marque4" value="" size="40" />
                                </span>
                                <span class="marque5">
                                    <input autocomplete="off" type="text" name="marque5" id="marque5" value="" size="40" />
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
                                    <a href="javascript:;" onclick="reGenerateCaptcha();" class="btn btn-default text-complete"><i class="fs-14 fa fa-repeat"></i></a>
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
$(document).ready(function()
{
    $("#formInscription").validate({
        rules: {
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
        messages: 
        {
            code:
            {
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