<div class="passwordBox animated fadeInDown">
        <div class="row">
            <div>
                <h1 class="logo-name">
                    <a href="">
                        <img src="{$j_basepath}commonlibraries/images/logo_pagesjaunes.mg.svg" class="img-responsive" />
                    </a>
                </h1>
            </div>

            <div class="col-md-12">
                <div class="ibox-content">
                    

                    <h2 class="font-bold">Réinitialiser mot de passe</h2>
                    <div class="row">

                        <div class="col-lg-12">
                            {jmessage 'danger'}
                            <form class="m-t" role="form" id="form" action="{jurl 'user~auth:save_new_password'}" method="POST">
                                <input type="hidden" name="token" value="{$token}"/>
                                <div class="form-group">
                                    <label>Nouveau mot de passe</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="******" required="">
                                </div>
                                <div class="form-group">
                                    <label>Confirmer le nouveau mot de passe</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="******" required="">
                                </div>
                                <button type="submit" class="btn btn-primary m-b">Envoyer</button>
                                <a href="{jurl 'jauth~login:form'}" class="btn btn-white m-b">
                                    Annuler
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
{$SCRIPT}

{literal}
<script>
$(document).ready(function(){
	$('#form').validate({
        rules: {
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: $('#password')
            }
        },
        messages: {
            password: "Champs obligatoire",
            confirm_password: {
                required:"Champs obligatoire",
                equalTo : "Les mots de passes ne sont pas conformes"
            }
        }});
});
</script>
{/literal}