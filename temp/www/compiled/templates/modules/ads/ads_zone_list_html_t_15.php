<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_list.tpl') > 1487098849){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
 require_once('G:\wamp\pagesjaunes_core/plugins/tpl/html/function.jmessage.php');
function template_meta_21315580bbb4446f78b9ce1100b81536($t){

}
function template_21315580bbb4446f78b9ce1100b81536($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Zone de publicité</strong></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php jtpl_function_html_jmessage( $t);?>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Liste des zones de publicités</h2>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index', array('status'=>'all'));?>" class="btn btn-white <?php if($t->_vars['status'] == 'all'):?>active<?php endif;?>" type="button">Tous (<?php echo $t->_vars['nbAll']; ?>)</a>
                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index', array('status'=>'publie'));?>" class="btn btn-white <?php if($t->_vars['status'] == 'publie'):?>active<?php endif;?>" type="button">Publié (<?php echo $t->_vars['nbPublie']; ?>)</a>
                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index', array('status'=>'notpublie'));?>" class="btn btn-white <?php if($t->_vars['status'] == 'notpublie'):?>active<?php endif;?>" type="button">Non publié (<?php echo $t->_vars['nbNotPublie']; ?>)</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white"> <i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-8 text-left">
                            <?php  if(jAcl2::check("ads.type.create")):?>
                            <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:ajout');?>">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            <?php  endif; ?>
                        </div>
                    </div>

                    <div class="table-responsive" id="pages-list">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th data-sort-ignore="true"></th>
                                    <th>Zones</th>
                                    <th>Statut</th>
                                    <th>Date création</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(sizeof($t->_vars['toAdsZones']) > 0):?>
                                    <?php foreach($t->_vars['toAdsZones'] as $t->_vars['oAdsZone']):?>
                                        <tr>
                                            <td>
                                                <div class="checkbox" style="margin: 0px">
                                                    <input type="checkbox" class="" 
                                                    <?php  if(jAcl2::check("ads.delete")):?> id="check<?php echo $t->_vars['oAdsZone']->id; ?>" name="check[]" value="<?php echo $t->_vars['oAdsZone']->id; ?>"<?php else:?> disabled <?php  endif; ?> >
                                                    <label for="check<?php echo $t->_vars['oAdsZone']->id; ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $t->_vars['oAdsZone']->name; ?>
                                            </td>
                                            <td>
                                                <?php if(($t->_vars['oAdsZone']->is_publie == 1)):?>
                                                    <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                                <?php elseif(($t->_vars['oAdsZone']->is_publie == 0)):?>
                                                    <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php if(($t->_vars['oAdsZone']->date_creation != '')):?>
                                                <strong>Créé le :</strong> <?php echo $t->_vars['oAdsZone']->date_creation; ?><br/>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php  if(jAcl2::check("ads.update")):?>
                                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:edition', array('id'=>$t->_vars['oAdsZone']->id));?>" class="btn btn-primary btn-xs btn-block">Modifier</a>
                                                <?php  endif; ?>
                                                <?php  if(jAcl2::check("ads.update")):?>
                                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:pubs_par_defaut', array('id'=>$t->_vars['oAdsZone']->id));?>" class="btn btn-warning btn-xs btn-block">Pubs par défaut</a>
                                                <?php  endif; ?>
                                                <?php  if(jAcl2::check("ads.delete")):?>
                                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:suppression', array('id'=>$t->_vars['oAdsZone']->id));?>" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                                <?php  endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Action groupées :</option>
                                    <?php  if(jAcl2::check("ads.delete")):?>
                                    <option value="delete">Supprimer</option>
                                    <?php  endif; ?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:delete_group');?>" method="POST">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $t->_vars['SCRIPT']; ?>

<script type="text/javascript">
$(document).ready(function()
{
    $('.footable').footable();
    
});
function deleteGroup()
{
    if ($('input[name="check[]"]:checked').length > 0)
    {
        if ($('select[name="actionGroup"]').val() == 'delete')
        {
            $('input[name="check[]"]:checked').each(function(){
                $inputHdn = $('<input type="hidden" name="check[]"/>');
                $inputHdn.val($(this).val());
                $("#formGroupDelete").append($inputHdn);
            });
            $("#formGroupDelete").submit(); 
        }
    }
}
</script>
<?php 
}
return true;}
