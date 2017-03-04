<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tops recherches</h2>  
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Tops recherches</strong></a>
            </li>
        </ol>        
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div>
            {jmessage}
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row m-b">
                        <div class="col-md-4">
                            <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                        </div>
                        <div class="col-md-8">
                            {ifacl2 "topsrecherche.create"}<a href="{jurl 'toprecherche~toprecherche:edition'}" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i></a>{/ifacl2}
                        </div>
                    </div>
                    <div class="table-responsive" id="toprecherche-list">
                        <table class="table footable table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th data-sort-ignore="true" width="45px"></th>
                                    <th>Titre </th>
                                    <th>Entreprise(s) </th>
                                    <th>Date de création </th>
                                    <th data-sort-ignore="true"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toToprecherche)}
                                    {foreach ($toToprecherche as $oToprecherche)}
                                        {if (!empty($oToprecherche->getTitle()))}
                                        <tr>
                                            <td>
                                                <div class="checkbox" style="margin: 0px">
                                                    <input type="checkbox" class="" name="topCheck[]" id="topCheck{$oToprecherche->id}" value="{$oToprecherche->id}">
                                                    <label for="topCheck{$oToprecherche->id}"></label>
                                                </div>
                                            <td>{$oToprecherche->getTitle()}</td>
                                            <td>
                                                <div>Top 1:&nbsp;&nbsp;{$oToprecherche->getTop1()->raisonsociale}</div>
                                                <div>Top 2:&nbsp;&nbsp;{$oToprecherche->getTop2()->raisonsociale}</div>
                                                <div>Top 3:&nbsp;&nbsp;{$oToprecherche->getTop3()->raisonsociale}</div>
                                            </td>
                                            <td>{$oToprecherche->getDateCreation()}</td>
                                            <td>
                                                {ifacl2 "topsrecherche.update"}
                                                <a href="{jfullurl 'toprecherche~toprecherche:edition', array('id'=>$oToprecherche->souscategorie_id)}" class="btn btn-success btn-block btn-xs">Editer</a>
                                                {/ifacl2}
                                                {ifacl2 "topsrecherche.delete"}
                                                <a onclick="deleteTop({$oToprecherche->id});" class="btn btn-danger btn-block btn-xs">Supprimer</a>
                                                {/ifacl2}
                                            </td>
                                        </tr>
                                        {/if}
                                    {/foreach}
                                {else}
                                <tr><td colspan="5"><div class="alert alert-info">Aucuns résultats</div></td></tr>
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
                        <div class="col-sm-6">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Actions groupées :</option>
                                    {ifacl2 "topsrecherche.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroupTopRecherche();"> Appliquer</button>
                                </span>
                                <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'toprecherche~toprecherche:deleteGroupTopRecherche'}" method="POST">
                                </form>
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
function deleteTop(topId)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer ce top recherche ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler"
        }, function () {
            var param = 'id='+topId;
            window.location.assign ('{/literal}{jurl "toprecherche~toprecherche:suppression"}{literal}?'+param);         
        });
}

function deleteGroupTopRecherche()
{
    if ($('input[name="topCheck[]"]:checked').length > 0)
    {   
        if ($('select[name="actionGroup"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces tops recherches ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler",
                    closeOnConfirm: false
                }, function () {
                    $('input[name="topCheck[]"]:checked').each(function(){
                        $inputHdn = $('<input type="hidden" name="topGroup[]"/>');
                        $inputHdn.val($(this).val());
                        $("#formGroupDelete").append($inputHdn);
                    });
                    $("#formGroupDelete").submit(); 
                });
        }
    }
}
</script>
{/literal}