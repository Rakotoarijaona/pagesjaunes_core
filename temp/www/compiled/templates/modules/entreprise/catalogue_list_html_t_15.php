<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/entreprise/templates/catalogue_list.tpl') > 1486743383){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jfullurl.php');
function template_meta_a8e9056abc18f19005df2a8d31a053e0($t){

}
function template_a8e9056abc18f19005df2a8d31a053e0($t){
?><table class="table-profil table table-striped footable" data-page-size="6" data-filter="#produit-filter">
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
        <?php foreach($t->_vars['oCatalogueList'] as $t->_vars['oCatalogue']):?>
        <tr>                                                    
            <td>
                <input type="checkbox" name="catalogueGroup[]" value="<?php echo $t->_vars['oCatalogue']->id; ?>">
            </td>
            <td><?php echo $t->_vars['oCatalogue']->reference_produit; ?></td>
            <td><?php echo $t->_vars['oCatalogue']->nom_produit; ?></td>
            <td><img class="thumbnail" style="max-height: 50px; height: 50px" src="<?php echo $t->_vars['j_basepath']; ?>entreprise/produits/thumbnail/<?php echo $t->_vars['oCatalogue']->image_produit; ?>" alt="" /></td>
            <td><?php echo $t->_vars['oCatalogue']->prix_produit; ?></td>
            <td>  
                <a onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateCatalogueForm', array('id'=>$t->_vars['oCatalogue']->id));?>">
                    <button type="button" class="btn btn-success btn-xs">Editer</button>
                </a>                
                <a onclick="return setRemote(this);" data-remote-target="#catalogue-list" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateCatalogueProduit', array('id'=>$t->_vars['oCatalogue']->id, 'operation'=>'delete'));?>">
                    <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                </a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">
                <ul class="pagination pull-right"></ul>
            </td>
        </tr>
    </tfoot>
</table>


<script>
$(document).ready(function() {
    $('.footable').footable();
});
</script>
<?php 
}
return true;}
