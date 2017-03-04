<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ajouter un utilisateur</h2> 
        <ol class="breadcrumb">
            <li>
                <a href="{jfullurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jfullurl 'user~user:index'}">Utilisateurs</a>
            </li>
            <li class="active">
                <a><strong>Ajout</strong></a>
            </li>
        </ol> 
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-11">
            <form role="form" id="form" class="form-horizontal" enctype="multipart/form-data" action="{jfullurl 'user~user:save_ajout'}" method="post">
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Identifiant *:</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="usr_login" id="usr_login">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Profil * :</label> 
                    <div class="col-sm-3">
                        <select class="form-control m-b" name="usr_typeLabel">
                            <option value="">Selection :</option>
                            {if sizeof($toListProfile)>0}
                            {foreach ($toListProfile as $profile)}
                            <option value="{$profile->iGroupId}">{$profile->zGroupName}</option>
                            {/foreach}
                            {/if}
                        </select>
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Nom :</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="name">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Prénom :</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="lastname">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">E-mail * :</label> 
                    <div class="col-sm-5">
                        <input type="email" class="form-control"  autocomplete="off" name="usr_email" id="usr_email">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Avatar :</label>
                    <div class="col-sm-5">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
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
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Mot de passe * :</label> 
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="usr_password" id="motdepasse">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Confirmez votre mot de passe * :</label> 
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="usr_password_confirm">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left"> </label>
                    <div class="col-sm-5"> 
                        <div class="checkbox" style="margin: 0px">
                            <input type="checkbox" name="send_password" value="">
                            <label>Envoyer le mot de passe à l'utilisateur </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <em>(*: Obligatoire)</em>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{jurl 'user~user:index'}" class="btn btn-white">Annuler</a>
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
    $('#form').validate({
        rules: {
            usr_login: {
                required: true,
                minlength: 3,
                alphanumeric: true,
                remote : {
                    url: "{/literal}{jfullurl 'user~user:insertLoginExist'}{literal}",
                    type: "post",
                    data: {
                        login: function () {
                            return $("#usr_login").val();
                        }
                    }
                }
            },
            usr_email: {
                required: true,
                email: true,
                remote : {
                    url: "{/literal}{jfullurl 'user~user:insertEmailExist'}{literal}",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#usr_email").val();
                        }
                    }
                }
            },
            usr_password: {
                required: true
            },
            usr_password_confirm: {
                required: true,
                equalTo: $('#motdepasse')
            },
            usr_typeLabel: {
                required: true
            }
        },
        messages: {
            usr_login: {
                required: "Champs obligatoire",
                minlength: "Veuillez entrer au moins 3 caractères",
                alphanumeric: "Caractères non autorisé",
                remote: "Cet identifiant est déjà utilisé"
            },
            usr_email: {
                required: "Champs obligatoire",
                email: "Veuillez entrer un email valide",
                remote: "Cet email est déjà utilisé"
            },
            usr_password: "Champs obligatoire",
            usr_password_confirm: {
                required:"Champs obligatoire",
                equalTo : "Les mots de passes ne sont pas conformes"
            },
            usr_typeLabel: "Veuillez choisir"
        }
    });
});
</script>
{/literal}