{$COMMONSCRIPT}

<main>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{jurl 'front_office~default:index'}">Accueil</a></li>
            <li class="active">Nous contacter</li>
        </ol>

        <div class="page-header">
            <div class="row">
                <div class="col-md-8"><h1>Nous contacter</h1></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-wrapper">
                    <p>
                        <p><br/>Vous avez des questions, ou des demandes? N'hésitez pas à nous contacter. Nous vous répondrons dans les meilleurs délais</p>						
                        <div role="form" lang="fr-FR" dir="ltr">
                            <div class="screen-reader-response" style="display:none;"></div>
                            <form name="contactForm" id="contactForm" action="" method="post" class="form">
                                <p>Votre nom (*)<br />
                                    <span class="your-name">
                                        <input type="text" name="your-name" value="" size="40" maxlength="200"/>
                                    </span> 
                                </p>
                                <p>Votre email (*)<br />
                                    <span class="your-email">
                                        <input type="email" name="your-email" value="" size="40" maxlength="255"/>
                                    </span> 
                                </p>
                                <p>Votre téléphone (*)<br />
                                    <span class="your-phone">
                                        <input type="tel" name="your-phone" value="" size="40" maxlength="12"/>
                                    </span>
                                </p>
                                <p>Sujet (*)<br />
                                    <span class="your-subject">
                                        <input type="text" name="your-subject" value="" size="40" maxlength="200"/>
                                    </span> 
                                </p>
                                <p>Votre message (*)<br />
                                    <span class="your-message">
                                        <textarea name="your-message" cols="40" rows="10" maxlength="500" minlength="10"></textarea>
                                    </span> 
                                </p>
                                <br/>
                                <p>
                                    <div class="container">
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
                                </p>
                                <p>
                                    <input type="submit" value="Envoyer" class="submit" />
                                </p>
                                <div class=""></div>
                            </form>
                        </div>
                    </p>
                </div>
            </div>
            <!-- Ici emplacement right panel -->
            <div class="col-md-4">
                <aside>
                    <div id="the-ad-box" class="ads-panel">    
                        {$ADS_ZONE}
                    </div>
               </aside>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript">
    {literal}

        $(document).ready(function()
        {
            $('#contactForm').validate({
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
                messages: {
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

    {/literal}
</script>