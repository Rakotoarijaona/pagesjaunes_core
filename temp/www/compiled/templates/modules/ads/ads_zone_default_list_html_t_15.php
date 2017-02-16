<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_default_list.tpl') > 1487171300){ return false;
} else {
function template_meta_b985e681966a1b668838834580c67b5f($t){

}
function template_b985e681966a1b668838834580c67b5f($t){
?><table class="table table-hover table-responsive">
    <thead>
        <th>#</th>
        <th>Type</th>
        <th>Contenu</th>
        <th>Info</th>
        <th></th>
    </thead>
    <tbody>
        <?php if((sizeof($t->_vars['toAdsZoneDefault'])>0)):?>
            <?php foreach($t->_vars['toAdsZoneDefault'] as $t->_vars['oAdsZoneDefault']):?>
                <tr>
                    <td>#<?php echo $t->_vars['i']++; ?></td>
                    <td>
                        <?php if(($t->_vars['oAdsZoneDefault']->type == 1)):?>
                        image
                        <?php elseif(($t->_vars['oAdsZoneDefault']->type == 2)):?>
                        html
                        <?php endif;?>
                    </td>
                    <td>
                        <?php if(($t->_vars['oAdsZoneDefault']->type == 1)):?>
                            <img src="<?php echo $t->_vars['j_basepath']; ?>publicites/thumbnail/<?php echo $t->_vars['oAdsZoneDefault']->image; ?>" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image">
                        <?php elseif(($t->_vars['oAdsZoneDefault']->type == 2)):?>
                            <i class="fa fa-file-code-o"></i>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php if((!empty($t->_vars['oAdsZoneDefault']->souscategorie_id))):?>
                            Sous catégorie: <?php echo $t->_vars['oAdsZoneDefault']->getSouscategorie()->name; ?>
                        <?php elseif((!empty($t->_vars['oAdsZoneDefault']->categorie))):?>
                            Catégorie : <?php echo $t->_vars['oAdsZoneDefault']->getCategorie()->name; ?>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else:?>
            <tr>
                <td colspan="5"><div class="alert alert-info">Aucunne donnée</div></td>
            </tr>
        <?php endif;?>
    </tbody>
</table><?php 
}
return true;}
