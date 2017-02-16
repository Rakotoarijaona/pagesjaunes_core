<div class="modal-dialog">
    <div class="modal-content animated fadeInDown">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Edition d'un utilisateur</h4>
        </div>
        <form role="form" id="form" class="form-horizontal" enctype="multipart/form-data" action="{jurl $action}" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Identifiant *:</label> 
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="usr_login">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nom :</label> 
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Prénom :</label> 
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">E-mail * :</label> 
                    <div class="col-sm-6">
                        <input type="email" class="form-control"  name="usr_email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Avatar :</label>
                    <div class="col-sm-6">
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
                <div class="form-group">
                    <label class="col-sm-4 control-label">Mot de passe * :</label> 
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="usr_password" id="motdepasse">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Confirmez votre mot de passe * :</label> 
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="usr_password_confirm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4"> </label>
                    <div class="col-sm-6"> 
                        <div class="checkbox" style="margin: 0px">
                            <input type="checkbox" name="send_password" value="{$row->usr_login}">
                            <label>Envoyer le mot de passe à l'utilisateur </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Profil * :</label> 
                    <div class="col-sm-6">
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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
{literal}
<script>
 $(document).ready(function(){

    $('#form').validate({
        rules: {
            usr_login: {
                required: true,
                minlength: 3
            },
            usr_email: {
                required: true
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
            usr_login: "Champs obligatoire",
            usr_email: "Champs obligatoire",
            usr_password: "Champs obligatoire",
            usr_password_confirm: "Champs obligatoire",
            usr_typeLabel: "Veuillez choisir"
        }
    });
});
</script>
{/literal}
