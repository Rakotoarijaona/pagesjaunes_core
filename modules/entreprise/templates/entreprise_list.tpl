<div class="table-responsive custom-footable">
    <input type="hidden" id="sortfield" value="{$sortfield}">
    <input type="hidden" id="sortsens" value="{$sortsens}">
    <input type="hidden" id="page" value="{$page}">
    <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
        <thead>
            <tr>
                <th data-sort-ignore="true" width="45px"></th>
                <th style="width: 30%;" class="footable-sortable 
                    {if $sortfield == 'raisonsociale'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="entrepriseCustomTri('raisonsociale',this);">
                    Entreprise<span class="footable-sort-indicator"> </span>
                </th>
                <th style="width: 20%;">Statut </th>
                <th style="width: 30%;">Catégorie / Sous catégorie </th>
                <th style="width: 20%;" class="footable-sortable 
                    {if $sortfield == 'date_creation'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="entrepriseCustomTri('date_creation',this);">Date de création <span class="footable-sort-indicator"> </span></th>
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
            {else}
                <tr>
                    <td colspan="6">
                        <div class="alert alert-info text-center">Aucun résultat</div>
                    </td>
                </tr>
            {/if}
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="input-group action-group">
            <select class="form-control m-b input-sm" name="actionGroup">
                <option value="">Action groupée :</option>
                {ifacl2 "abonnement.delete"}
                <option value="delete">Supprimer</option>
                {/ifacl2}
            </select>
            <span class="input-group-btn">
                <button type="button" class="btn btn-white input-sm" onclick="deleteGroupEntreprise();"> Appliquer</button>
            </span>
        </div>
    </div>
    <div class="col-md-8">
        {if $nbRecs > $NB_DATA_PER_PAGE}
            <ul class="pagination pull-right" style="margin-top:6px;">
                {$pagination}
            </ul>
        {/if}
    </div>
</div>