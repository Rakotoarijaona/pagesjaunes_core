<table class="table table-hover">
    <thead>
        <th>Produits</th>
        <th width="70px"></th>
    </thead>
    <tbody>
        {foreach ($oEntreprise->produits as $produit)}
        <tr class="rMultiItem">
            <td class="value">
                <input type="hidden" class="produits" name="produit_list[]" value="{$produit->id}">
                {$produit->name}
            </td>
            <td class="text-right">
                <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#produit-form-input" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateProduitForm', array('entrepriseId'=>$oEntreprise->id, 'produitId'=>$produit->id)}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-xs" onclick="deleteProduit(this);" data-remote-target="#produitList" data-load-remote="{jfullurl 'entreprise~entreprise:updateProduits',array('entrepriseId'=>$oEntreprise->id, 'operation'=>'delete', 'produitId'=>$produit->id)}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>