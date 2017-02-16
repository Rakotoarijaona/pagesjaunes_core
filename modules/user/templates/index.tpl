<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Utilisateurs</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Utilisateurs</strong></a>
            </li>
        </ol> 
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        {jmessage}
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des Utilisateurs </h5>
                </div>
                <div class="ibox-content">
                    <div class="row m-b">
                        <div class="col-lg-4">
                            <input type="text" placeholder="Filtre" id="filter" class="input-sm form-control">
                        </div>
                        <div class="col-lg-8 text-right">
                            {ifacl2 "user.create"}   
                            <a href="{jfullurl 'user~user:ajout'}" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i></a>
                            {/ifacl2}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="footable table" data-page-size="10" data-filter="#filter">
                            <thead>
                                <tr>

                                    <th data-sort-ignore="true" width="33px">
                                        
                                    </th>
                                    <th>Identifiant </th>
                                    <th data-hide="phone">Nom & prénoms </th>
                                    <th data-hide="phone">E-mail </th>
                                    <th>Profil</th>
                                    <th data-sort-ignore="true">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            {if (sizeof($toList) > 0)}
                                {foreach($toList as $row)}
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" name="checkUser[]" value="{$row->usr_login}">
                                            <label></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$row->usr_photo}" style="width: 32px;height: 32px;line-height: 32px; border: 2px solid #fff;" alt="image">

                                        {ifacl2 "user.update"}   
                                        <a  href="{jfullurl 'user~user:edition',array('usr_login'=>$row->usr_login)}">
                                            <strong>{$row->usr_login}</strong>
                                        </a>
                                        {else}
                                            {$row->usr_login}
                                        {/ifacl2}
                                    </td>
                                    <td>{$row->usr_name} &nbsp; {$row->usr_lastname}</td>
                                    <td>{$row->usr_email}</td>
                                    <td>{$row->get_User_Group_name()}</td>
                                    <td>
                                        {ifacl2 "user.delete"} 
                                        <a  onclick="deleteUser('{$row->usr_login}');" class="btn btn-xs btn-danger">
                                        Supprimer</a>
                                        {/ifacl2}                                        
                                    </td>
                                </tr>
                                {/foreach}
                            {/if}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">                            
                            <div class="input-group" style="padding-right: 5px">
                                <form name="formForGroup" id="formForGroup" action="{jfullurl 'user~user:delete_user_group'}" method="POST">
                               </form>     
                                <select class="actionGroup form-control input-sm m-b" name="user_actionGroup">
                                    <option value="">Actions groupées :</option>
                                    {ifacl2 "user.delete"} 
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}     
                                </select>
                                <div class="input-group-btn" style="padding: 0px">
                                    <button type="button" class="btn btn-white btn-sm" onclick="deleteGroupUser();"> Appliquer</button>
                                </div>                           
                            </div>
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

function deleteUser(usr_login)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer cet utilisateur ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
    }, function () {
        window.location.assign('{/literal}{jfullurl "user~user:delete_user"}{literal}?usr_login='+usr_login)
    });
}
function deleteGroupUser()
{
    if ($('input[name="checkUser[]"]:checked').length > 0)
    {   
        if ($('select[name="user_actionGroup"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces utilisateurs?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler",
                    closeOnConfirm: false
                }, function () {
                    var groupUser = [];  
                    var formData = new FormData();
                    i = 0; 
                    dataarray = '{';
                    $('input[name="checkUser[]"]:checked').each(function()
                    {
                        
                        $('#formForGroup').append('<input type="hidden" name="groupUser[]" value="'+$(this).val()+'">');
                    });
                    $('#formForGroup').submit();
                    });
        }
    }
}
</script>
{/literal}