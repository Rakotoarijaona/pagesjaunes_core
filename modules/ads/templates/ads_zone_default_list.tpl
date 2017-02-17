<table class="table table-hover table-responsive">
    <thead>
        <th>#</th>
        <th>Type</th>
        <th>Contenu</th>
        <th>Info</th>
        <th></th>
    </thead>
    <tbody>
        {if (sizeof($toAdsZoneDefault)>0)}
            {foreach ($toAdsZoneDefault as $oAdsZoneDefault)}
                <tr>
                    <td>{$oAdsZoneDefault->rang}</td>
                    {if !empty($oAdsZoneDefault->type)}
                    <td>
                        {if ($oAdsZoneDefault->type == 1)}
                        image
                        {elseif ($oAdsZoneDefault->type == 2)}
                        html
                        {/if}
                    </td>
                    <td>
                        {if ($oAdsZoneDefault->type == 1)}
                            <img src="{$j_basepath}publicites/thumbnail/{$oAdsZoneDefault->image}" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image">
                        {elseif ($oAdsZoneDefault->type == 2)}
                            <i class="fa fa-file-code-o"></i>
                        {/if}
                    </td>
                    <td>
                        {if (!empty($oAdsZoneDefault->souscategorie_id))}
                            <strong>- Sous catégorie:</strong> {$oAdsZoneDefault->getSouscategorie()->name}<br/>
                        {elseif (!empty($oAdsZoneDefault->categorie_id))}
                            <strong>- Catégorie :</strong> {$oAdsZoneDefault->getCategorie()->name}<br/>
                        {/if}
                    </td>
                    {else}
                    <td colspan=3>
                        <span class="text-danger">Aucun contenu</span>
                    </td>
                    {/if}
                    <td>
                        <button type="button" onclick="editAd({$oAdsZoneDefault->id})" class="btn btn-info btn-xs btn-block">Modifier</button>
                    </td>
                </tr>
            {/foreach}
        {else}
            <tr>
                <td colspan="5"><div class="alert alert-info">Aucunne donnée</div></td>
            </tr>
        {/if}
    </tbody>
</table>