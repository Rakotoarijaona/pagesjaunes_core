<table class="table table-striped table-bordered footable" data-page-size="25" data-filter="#table-filter">
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
            </td>
            <td>{$oToprecherche->getTitle()}</td>
            <td>
                {$oToprecherche->getEntrepriseListString()}
            </td>
            <td>{$oToprecherche->getDateCreation()}</td>
            <td>
                {ifacl2 "topsrecherche.update"}
                <a href="{jfullurl 'toprecherche~toprecherche:edition', array('id'=>$oToprecherche->souscategorie_id)}" class="btn btn-success btn-xs">Editer</a>
                {/ifacl2}
                {ifacl2 "topsrecherche.delete"}
                <a onclick="deleteTop({$oToprecherche->id});" class="btn btn-danger btn-xs">Supprimer</a>
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

{literal}
<script type="text/javascript">
$(document).ready(function()
{
    $('.footable').footable();
});
</script>
{/literal}