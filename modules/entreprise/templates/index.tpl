<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Entreprises</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Entreprises</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-sm-2">
        <div class="title-action">
            {ifacl2 "entreprise.create"}
            <a href="{jurl 'entreprise~entreprise:ajout'}" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i></a>
            {/ifacl2}
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            {jmessage}

            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row m-b">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white"> <i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="categorie-filtre">
                                    <option value="">Toutes les categories :</option>
                                    {foreach ($oListCategorie as $rowCategorie)}
                                    <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;">{$rowCategorie['categorie']->name}</option>
                                        {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                        <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}'>{$souscategorie->name} </option>
                                        {/foreach}
                                    {/foreach}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="filterByCategorie();"> Appliquer</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="entreprise-list">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th data-sort-ignore="true" width="45px"></th>
                                    <th style="width: 30%;">Entreprise </th>
                                    <th style="width: 20%;">Statut </th>
                                    <th style="width: 30%;">Catégorie / Sous catégorie </th>
                                    <th style="width: 20%;">Date de création </th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toListEntreprise)}
                                {foreach ($toListEntreprise as $oEntreprise)}
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" class="" id="entrepriseCheck{$oEntreprise->id}" name="entrepriseCheck[]" value="{$oEntreprise->id}">
                                            <label for="entrepriseCheck{$oEntreprise->id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        {ifacl2 "entreprise.update"}
                                        <a href="{jurl 'entreprise~entreprise:edition',array('id'=>$oEntreprise->id)}"><strong>{$oEntreprise->raisonsociale|upper}</strong></a>
                                        {else}
                                        <a href="#"><strong>{$oEntreprise->raisonsociale|upper}</strong></a>
                                        {/ifacl2}
                                    </td>
                                    <td>
                                        {if ($oEntreprise->is_publie == 1)}
                                            <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                        {elseif ($oEntreprise->is_publie == 0)}
                                            <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                        {elseif ($oEntreprise->is_publie == 2)}
                                            <strong><span class="text-warning"><i class="fa fa-check"></i>&nbsp;En attente</span></strong>
                                        {/if}
                                    </td>
                                    <td>
                                        {$oEntreprise->souscategoriesListToString()}
                                    </td>
                                    <td>{$oEntreprise->getDateCreation()}</td>
                                    <td>
                                        {ifacl2 "entreprise.delete"}
                                        <a onclick="submitDelete({$oEntreprise->id});" class="btn btn-danger btn-xs btn-block">Supprimer</a>
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
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Action groupées :</option>
                                    {ifacl2 "entreprise.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroupEntreprise();"> Appliquer</button>
                                </span>
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
function deleteGroupEntreprise()
{
    if ($('input[name="entrepriseCheck[]"]:checked').length > 0)
    {
        if ($('select[name="actionGroup"]').val() == 'delete')
        {
            swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer ces entreprises ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
            }, function () {
                var entrepriseGroup = [];
                       
                var formdata = new FormData();
                i = 0; 
                $('input[name="entrepriseCheck[]"]:checked').each(function()
                {
                    formdata.append("entrepriseGroup[]",$(this).val());
                });
                $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
                $.ajax({
                        type: 'POST',
                        url: '{/literal}{jfullurl "entreprise~entreprise:deleteGroupEntreprise"}{literal}',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                          $('#entreprise-list').html(data);
                          swal("Supprimé!", "L'entreprise a été supprimée", "success");
                        },
                        error: function() {
                        }   // tell jQuery not to set contentType
                    });
                }); 
        }
    }
}
function submitDelete(id)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer cette entreprise ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            var param = 'id='+id;
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>').load('deleteEntreprise',param, function(){
                    swal("Supprimé!", "L'entreprise a été supprimée", "success");
                });         
        });
}
function filterByCategorie()
{
    if ($('select[name="categorie-filtre"]').val() != '')
    {
        var filtre = $('select[name="categorie-filtre"]').val().split(",");

        if (filtre[0] == 'categorie')
        {
            var categorieId = filtre[1];
            var formdata = new FormData();
            formdata.append("categorieId", categorieId);
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: '{/literal}{jfullurl "entreprise~entreprise:filterByCategorieEntreprise"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#entreprise-list').html(data);
                },
                error: function() {
                }   // tell jQuery not to set contentType
            });
        }
        else
        {
            var souscategorieId = filtre[1];
            var formdata = new FormData();
            formdata.append("souscategorieId", souscategorieId);
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: '{/literal}{jfullurl "entreprise~entreprise:filterBySouscategorieEntreprise"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#entreprise-list').html(data);
                },
                error: function() {
                }   // tell jQuery not to set contentType
            });
        }
    }
    else
    {
        $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>').load('{/literal}{jfullurl "entreprise~entreprise:getEntrepriseList"}{literal}');
    }
}
</script>
{/literal}