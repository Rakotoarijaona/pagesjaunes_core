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
{literal}
<script type="text/javascript">
$(document).ready(function()
{
    $('.footable').footable();
});
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
</script>
{/literal}