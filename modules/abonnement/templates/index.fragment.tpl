<input type="hidden" id="sortfield" value="{$sortfield}">
<input type="hidden" id="sortsens" value="{$sortsens}">
<input type="hidden" id="page" value="{$page}">

<div class="table-responsive custom-footable" id="abonnement-list" style="margin-top:30px;">
    <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter" width="100%">
        <thead>
            <tr>
                <th width="4%">#</th>
                <th width="19%" class="footable-sortable 
                {if $sortfield == 'abonnement_nomoffre'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('abonnement_nomoffre',this);">
                    Nom offre<span class="footable-sort-indicator"></span>
                </th>
                <th width="13%" class="footable-sortable {if $sortfield == 'raisonsociale'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('raisonsociale',this);">
                    Entreprise<span class="footable-sort-indicator"></span>
                </th>
                <th width="13%" class="footable-sortable {if $sortfield == 'abonnement_datedebut'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('abonnement_datedebut',this);">
                    Date début<span class="footable-sort-indicator"></span>
                </th>
                <th width="13%" class="footable-sortable {if $sortfield == 'abonnement_datefin'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('abonnement_datefin',this);">
                    Date fin<span class="footable-sort-indicator"></span>
                </th>
                <th width="13%" class="footable-sortable {if $sortfield == 'abonnement_dureeval'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('abonnement_dureeval',this);">
                    Durée<span class="footable-sort-indicator"></span>
                </th>
                <th width="13%" class="footable-sortable {if $sortfield == 'abonnement_montant'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="customTri('abonnement_montant',this);">
                    Montant<span class="footable-sort-indicator"></span>
                </th>
                <th width="10%" data-sort-ignore="true"></th>
            </tr>
        </thead>
        <tbody>
            {if $nbRecs > 0}
                {foreach $list as $abonnement}
                    <tr>
                        <td>
                            <div class="checkbox" style="margin: 0px">
                                <input type="checkbox" class="" name="abonnementCheck[]" value="{$abonnement->abonnement_id}">
                                <label for="abonnementCheck{$abonnement->abonnement_id}"></label>
                            </div>
                        </td>
                        <td>
                            {ifacl2 "entreprise.update"}
                                <a href="{jurl 'abonnement~abonnement:edit',array('id'=>$abonnement->abonnement_id)}"><strong>{$abonnement->abonnement_nomoffre}</strong></a>
                            {else}
                                <a href="javascript:void(0);"><strong>{$abonnement->abonnement_nomoffre}</strong></a>
                            {/ifacl2}
                        </td>
                        <td>{$abonnement->entreprise->raisonsociale}</td>
                        <td>{$abonnement->abonnement_datedebut|jdatetime}</td>
                        <td>{$abonnement->abonnement_datefin|jdatetime}</td>
                        <td>
                            {$abonnement->abonnement_dureeval} 
                            {if $abonnement->abonnement_dureetype == $DELAY_TYPE_DAY}
                                Jour{if $abonnement->abonnement_dureeval > 1}s{/if}
                            {/if}
                            {if $abonnement->abonnement_dureetype == $DELAY_TYPE_WEEK}
                                Semaine{if $abonnement->abonnement_dureeval > 1}s{/if}
                            {/if}
                            {if $abonnement->abonnement_dureetype == $DELAY_TYPE_MONTH}
                                Mois
                            {/if}
                            {if $abonnement->abonnement_dureetype == $DELAY_TYPE_YEAR}
                                Année{if $abonnement->abonnement_dureeval > 1}s{/if}
                            {/if}
                        </td>
                        <td>{$abonnement->abonnement_montant} Ariary</td>
                        <td>
                            {ifacl2 "abonnement.delete"}
                            <a href="javascript:;" onclick="removeAbonnement({$abonnement->abonnement_id});" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                            {/ifacl2}
                        </td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="8">
                        <div class="alert alert-info" role="alert">
                            <p class="text-center">Aucun abonnement trouvé</p>
                        </div>
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
                <button type="button" class="btn btn-white input-sm" onclick="deleteGroup();"> Appliquer</button>
            </span>
        </div>
        <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'pages~pages:delete_group'}" method="POST"></form>
    </div>
    <div class="col-md-8">
        {if $nbRecs > $NB_DATA_PER_PAGE}
            <ul class="pagination pull-right" style="margin-top:6px;">
                {$pagination}
            </ul>
        {/if}
    </div>
</div>