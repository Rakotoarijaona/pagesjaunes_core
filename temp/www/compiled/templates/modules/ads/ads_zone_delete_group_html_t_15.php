<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_delete_group.tpl') > 1487082399){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_dacf84e90a9d946b9dacef8fb3b664f2($t){

}
function template_dacf84e90a9d946b9dacef8fb3b664f2($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index');?>">Zone de publicités</a>
            </li>
            <li class="active">
                <a><strong>Supprimer</strong></a>
            </li>
        </ol>       
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adsform" role="form" action="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:save_delete_group');?>" method="POST">
                        <div class="form-group r-form">
                            <p>Êtes-vous sure de vouloir supprimer le(s) zone(s): <br />
                                <?php foreach($t->_vars['toListAdsZone'] as $t->_vars['oAds_zone']):?>
                                    - <?php echo $t->_vars['oAds_zone']->name; ?><br />
                                    <input type="hidden" name="id[]" value="<?php echo $t->_vars['oAds_zone']->id; ?>"/>
                                <?php endforeach;?></p>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <button type="submit" class="btn btn-primary btn-save">Oui</button>
                              <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index');?>" class="btn btn-white" id="cancel">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $t->_vars['SCRIPT']; ?>

<script type="text/javascript">
$(document).ready(function()
{
    
    
});
</script>
<?php 
}
return true;}
