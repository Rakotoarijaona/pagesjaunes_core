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
                    <td>#{$i++}</td>
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
                            Sous catégorie: {$oAdsZoneDefault->getSouscategorie()->name}
                        {elseif (!empty($oAdsZoneDefault->categorie))}
                            Catégorie : {$oAdsZoneDefault->getCategorie()->name}
                        {/if}
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