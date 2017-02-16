<table class="table-profil table table-striped footable" data-page-size="6" data-filter="#produit-filter">
    <thead>
        <tr>
            <th></th>
            <th>Référence </th>
            <th>Nom </th>
            <th>Image </th>
            <th>Prix </th>
            <th>Actions </th>
        </tr>
    </thead>
    <tbody>
        {foreach($oCatalogueList as $oCatalogue)}
        <tr>                                                    
            <td>
                <input type="checkbox" name="catalogueGroup[]" value="{$oCatalogue->id}">
            </td>
            <td>{$oCatalogue->reference_produit}</td>
            <td>{$oCatalogue->nom_produit}</td>
            <td><img class="thumbnail" style="max-height: 50px; height: 50px" src="{$j_basepath}entreprise/produits/thumbnail/{$oCatalogue->image_produit}" alt="" /></td>
            <td>{$oCatalogue->prix_produit}</td>
            <td>  
                <a onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateCatalogueForm', array('id'=>$oCatalogue->id)}">
                    <button type="button" class="btn btn-success btn-xs">Editer</button>
                </a>                
                <a onclick="return setRemote(this);" data-remote-target="#catalogue-list" data-load-remote="{jfullurl 'entreprise~entreprise:updateCatalogueProduit', array('id'=>$oCatalogue->id, 'operation'=>'delete')}">
                    <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                </a>
            </td>
        </tr>
        {/foreach}
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
<script>
$(document).ready(function() {
    $('.footable').footable();
});
</script>
{/literal}