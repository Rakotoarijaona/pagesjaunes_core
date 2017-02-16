<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editer un utilisateur</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'user~user:index'}">Utilisateurs</a>
            </li>
            <li class="active">
                <a><strong>{$oUser->usr_login}</strong></a>
            </li>
        </ol>  
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-11">
        	<form role="form" id="form" class="form-horizontal" enctype="multipart/form-data" action="{jurl 'user~user:save_edition'}" method="post">
                <input type="hidden" name="usr_id" id="usr_id" value="{$oUser->usr_id}">
                <input type="hidden" name="usr_login" id="usr_login" value="{$oUser->usr_login}">
	            <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Identifiant *:</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="new_usr_login" id="new_usr_login" value="{$oUser->usr_login}">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Profil * :</label> 
                    <div class="col-sm-3">
                        <select class="form-control m-b" name="usr_typeLabel">
                            <option value="{$oUserProfile->iGroupId}">{$oUserProfile->zGroupName}</option>
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
                        <input type="text" class="form-control"  name="usr_name" value="{$oUser->usr_name}">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Prénom :</label> 
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="usr_lastname" value="{$oUser->usr_lastname}">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">E-mail * :</label> 
                    <div class="col-sm-5">
                        <input type="email" class="form-control"  name="usr_email" id="usr_email" value="{$oUser->usr_email}">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Avatar :</label>
                    <div class="col-sm-5">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                <img class="personnel_list_img" alt="" src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$oUser->usr_photo}">
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
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Mot de passe * :</label> 
                    <div class="col-sm-5">
                        <input type="password" class="form-control" placeholder="********" name="usr_password" id="motdepasse">
                    </div>
                </div>
                <div class="form-group r-form">
                    <label class="col-sm-3 text-left control-label">Confirmez votre mot de passe * :</label> 
                    <div class="col-sm-5">
                        <input type="password" class="form-control" placeholder="********" name="usr_password_confirm">
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
            new_usr_login: {
                required: true,
                minlength: 3,
                remote : {                    
                    url: "{/literal}{jurl 'user~user:updateLoginExist'}{literal}",
                    type: "post",
                    data: {
                        id: function () {
                            return $("#usr_id").val();
                        },
                        login: function () {
                            return $("#new_usr_login").val();
                        }
                    }
                }
            },
            usr_email: {
                required: true,
                email: true,
                remote : {                    
                    url: "{/literal}{jurl 'user~user:updateEmailExist'}{literal}",
                    type: "post",
                    data: {
                        id: function () {
                            return $("#usr_id").val();
                        },
                        email: function () {
                            return $("#usr_email").val();
                        }
                    }
                }
            }
            usr_password_confirm: {
                required: true,
                equalTo: $('#motdepasse')
            },
            usr_typeLabel: {
                required: true
            }
        },
        messages: {
            new_usr_login: 
            {                
                required: "Champs obligatoire",
                minlength: "Veuillez entrer au moins 3 caractères",
                remote: "Cet identifiant est déjà utilisé"
            },
            usr_email: {
                required: "Champs obligatoire",
                email: "Veuillez entrer un email valide",
                remote: "Cet email est déjà utilisé"
            },
            usr_password_confirm: {
                required:"Champs obligatoire",
                equalTo : "Les mots de passes ne sont pas conformes"
            },
            usr_typeLabel: "Veuillez choisir"
        }});
});
</script>
{/literal}