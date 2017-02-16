<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Edition d'un profil</h4>
        </div>
        <form role="form" id="formAjoutProfil" action="{jurl $action}" method="get">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Nom profil *</label> 
                    <input type="text" class="form-control" placeholder="" id="nom_profil" name="nom_profil">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-submit" onclick="ajoutProfil()" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
{literal}
<script>
 $(document).ready(function(){

    $('#formAjoutProfil').validate({
        rules: {
            nom_profil: {
                required: true,
                minlength: 5,
                remote:{
                    url: "{/literal}{jurl 'profile~profile:insertNameExist'}{literal}",
                    type: "post",
                    data: {
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
    /*
    $('#btn-submit').click(function(data)
    {
        alert($('#list_profile').html());
        if ($('#formAjout').valid())
        {
            var formdata = new FormData();
            formdata.append('nom_profil', $('#nom_profil').val());
            $.ajax({
                type: 'POST',
                url: '{/literal}{jfullurl "profile~profile:new_profile"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#list_profile').html('data');
                    swal("Ajouté!", "Profil ajouté!");
                },
                error: function() {
                }   // tell jQuery not to set contentType
            });
        }
        
    });*/
});


</script>
{/literal}
