<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profils</h2>    
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Profils</strong></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row m-b">
                        <div class="col-md-3">
                            <input type="text" placeholder="Filtre" id="table-filter" class="input-sm form-control">
                        </div>
                        <div class="col-sm-9 text-right">
                            {ifacl2 "profile.create"}
                            <a href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jfullurl 'profile~profile:show_modal_add'}" data-toggle="modal" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive col-lg-6" id="list_profile">
                            <table class="footable table" data-page-size="8"  data-filter="#table-filter">
                                <thead>
                                    <tr>
                                        <th data-sort-ignore="true" width="43px"></th>
                                        <th>Profil </th>
                                        <th data-sort-ignore="true" width="150px">Droit & accès </th>
                                        <th data-sort-ignore="true" width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {if (sizeof($toList) > 0)}
                                    {foreach($toList as $row)}
                                    <tr>
                                        <td>
                                        {if (($row->iGroupId != 'superadmin')&&($row->hasUser() == 0))}
                                            <div class="checkbox" style="margin: 0px">
                                                <input type="checkbox" name="groupProfil[]" value="{$row->iGroupId}">             
                                                <label></label>
                                            </div>
                                        {else}
                                            <div class="checkbox" style="margin: 0px">
                                                <input type="checkbox" disabled name="groupProfil[]" value="{$row->iGroupId}">             
                                                <label></label>
                                            </div>
                                        {/if}
                                        </td>
                                        <td>
                                            {ifacl2 "profile.update"}
                                            <a  href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jurl 'profile~profile:show_modal_update',array('id_profile'=>$row->iGroupId)}" data-toggle="modal">
                                            {$row->zGroupName}
                                            </a>
                                            {else}
                                            {$row->zGroupName}
                                            {/ifacl2}
                                        </td>
                                        <td>
                                            {ifacl2 "right.list"}
                                            {if ($row->iGroupId != 'superadmin')}
                                            <a href="{jurl 'right~right:index',array('id_profile'=>$row->iGroupId)}" class="btn btn-xs btn-primary">Gérer</a>
                                            {else}
                                            <button class="btn btn-xs btn-default" disabled>Gérer</a>
                                            {/if}
                                            {/ifacl2}
                                        </td>
                                        <td>
                                            {ifacl2 "profile.delete"}
                                            {if (($row->iGroupId != 'superadmin')&&($row->hasUser() == 0)) }
                                            <a  onclick="deleteProfile('{$row->iGroupId}');" class="btn btn-xs btn-danger">
                                                Supprimer
                                            </a>
                                            {else}
                                            <button class="btn btn-xs btn-default" disabled>
                                                Supprimer
                                            </button>
                                            {/if}
                                            {/ifacl2}
                                        </td>
                                    </tr>
                                    {/foreach}
                                {/if}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <div class="input-group" style="padding-right: 5px">
                                                <select class="actionGroup form-control input-sm m-b" name="profil_actionGroup">
                                                    <option value="">Actions groupées :</option>
                                                    {ifacl2 "profile.delete"}
                                                    <option value="delete">Supprimer</option>
                                                    {/ifacl2}
                                                </select>
                                                <div class="input-group-btn" style="padding: 0px">
                                                    <button type="button" class="btn btn-white btn-sm" onclick="deleteGroupProfil();"> Appliquer</button>
                                                </div>                                
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <ul class="pagination pull-right"></ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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
    $('.footable').footable();
});
function ajoutProfil()
{
    if ($('#formAjoutProfil').valid())
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
                $('#list_profile').html(data);
                swal("Ajouté!", "Profil ajouté!");
                $('#remoteModal').modal('toggle');
            },
            error: function() {
                swal("Erreur!", "Veuillez modifier le nom!", "warning");
            }
        });
    }
    
}
function modifierProfil(id)
{
    if ($('#formModifierProfil').valid())
    {
        var formdata = new FormData();
        formdata.append('nom_profil', $('#nom_profil').val());
        formdata.append('id_profile', id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "profile~profile:update_profile"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#list_profile').html(data);
                swal("Modifié!", "Profil modifié!");
                $('#remoteModal').modal('toggle');
            },
            error: function() {
                swal("Erreur!", "Veuillez modifier le nom!", "warning");
            }
        });
    }
}
function deleteProfile(id)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer ce profil ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
    }, function () {
        var formdata = new FormData();
        formdata.append('id_profile', id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "profile~profile:delete_profile"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#list_profile').html(data);
                swal("Supprimé!", "Profil supprimé!");
            },
            error: function() {
                swal("Erreur!", "", "warning");
            }
        });
    });
}
function deleteGroupProfil()
{
    if ($('input[name="groupProfil[]"]:checked').length > 0)
    {   
        if ($('select[name="profil_actionGroup"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces profils?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler",
                    closeOnConfirm: false
                }, function () {
                    var groupProfil = [];                       
                    var formdata = new FormData();
                    i = 0; 
                    $('input[name="groupProfil[]"]:checked').each(function()
                    {
                        formdata.append("groupProfil[]",$(this).val());
                    });
                    $.ajax({
                        type: 'POST',
                        url: '{/literal}{jfullurl "profile~profile:delete_profil_group"}{literal}',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                          $('#list_profile').html(data);
                            swal("Supprimés!", "Les profils ont été supprimés", "success");
                        },
                        error: function() {
                        }
                    });
                });
        }
    }
}
</script>
{/literal}