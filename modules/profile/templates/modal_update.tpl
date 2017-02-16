<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Edition d'un profil</h4>
        </div>
        <form role="form" id="formModifierProfil" action="{jurl $action}" method="get">
            <input type="hidden" name="id_profile" id="id_profile" value="{$oProfile->iGroupId}">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Nom profil *</label> 
                    <input type="text" class="form-control" placeholder="" id="nom_profil" name="nom_profil" value="{$oProfile->zGroupName}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="modifierProfil('{$oProfile->iGroupId}');" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
{literal}
<script>
 $(document).ready(function(){

    $('#formModifierProfil').validate({
        rules: {
            nom_profil: {
                required: true,
                minlength: 5,
                remote:{
                    url: "{/literal}{jurl 'profile~profile:updateNameExist'}{literal}",
                    type: "post",
                    data: {
                        id: function () {
                            return $("#id_profile").val();                            
                        },
                        name: function () {
                            return $("#nom_profil").val();
                        }
                    }
                }
            }
        },
        messages: {
            nom_profil: {
                required: "Veuillez entrer un nom",
                minlength: "Veuillez entrer un nom plus long",
                remote: "Ce nom éxiste déjà",
            }
        }
    });
});
</script>
{/literal}
