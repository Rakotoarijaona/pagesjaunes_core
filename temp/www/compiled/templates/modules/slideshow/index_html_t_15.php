<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/slideshow/templates/index.tpl') > 1486088900){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
 require_once('G:\wamp\pagesjaunes_core/plugins/tpl/html/function.jmessage.php');
function template_meta_fa888a678a188efbfcb93c18ca9791fa($t){

}
function template_fa888a678a188efbfcb93c18ca9791fa($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Slideshow</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Slideshow</strong></a>
            </li>
        </ol>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <?php if((isset ($t->_vars['messageError']))):?>
    <div class="alert alert-danger col-lg-12">
        <?php foreach($t->_vars['messageError'] as $t->_vars['message']):?>
            <?php echo $t->_vars['message']; ?>
        <?php endforeach;?>
    </div>
    <?php endif;?>
    <?php if((isset ($t->_vars['messageSuccess']))):?>
    <div class="alert alert-success col-lg-12">
        <?php foreach($t->_vars['messageSuccess'] as $t->_vars['message']):?>
            <?php echo $t->_vars['message']; ?>
        <?php endforeach;?>
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-12">
            <?php jtpl_function_html_jmessage( $t);?>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" placeholder="Filtre" id="search" class="input-sm form-control">
                        </div>
                        <div class="col-sm-8 text-right">
                            <?php  if(jAcl2::check("slideshow.create")):?>
                            <a href="<?php jtpl_function_html_jurl( $t,'slideshow~slideshow:add');?>">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            <?php  endif; ?>
                        </div>
                    </div>
                    <form action="<?php jtpl_function_html_jurl( $t,'slideshow~slideshow:grouped_action');?>" name="groupform" id="groupform" method = "GET">
                        <div class="table-responsive">
                            <table class="footable table" data-page-size="20" data-filter=#search>
                                <thead>
                                    <tr>
                                        <th data-sort-ignore="true" width="45px"></th>
                                        <th data-sort-ignore="true" width="50px"></th>
                                        <th>Identifiant </th>
                                        <th>Statut publication </th>
                                        <th>Entreprise</th>
                                        <th>Date de création </th>
                                        <th data-sort-ignore="true"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(sizeof($t->_vars['list']) > 0):?>
                                    <?php foreach($t->_vars['list'] as $t->_vars['row'] ):?>
                                    <tr>
                                        <td>                                            
                                            <div class="checkbox" style="margin: 0px">
                                                <input type="checkbox" name="actionGroup[]" id="actionGroup<?php echo $t->_vars['row']->iSlideshow_id; ?>" value="<?php echo $t->_vars['row']->iSlideshow_id; ?>">
                                                <label for="actionGroup<?php echo $t->_vars['row']->iSlideshow_id; ?>"></label>
                                            </div>
                                        </td>
                                        <td><img src="<?php echo $t->_vars['j_basepath']; ?><?php echo $t->_vars['PHOTOS_FOLDER']; ?>/<?php echo $t->_vars['PHOTOS_THUMBNAIL_FOLDER']; ?>/<?php echo $t->_vars['row']->zSlideshow_visuelbackground; ?>" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image"></td>
                                        <td><?php echo $t->_vars['row']->zSlideshow_identifiant; ?></td>
                                        <td>
                                            <?php if((($t->_vars['row']->iSlideshow_publicationstatus) == 1)):?>
                                            publié
                                            <?php else:?>
                                            non publié
                                            <?php endif;?>
                                        </td>
                                        <td><?php echo $t->_vars['row']->getEntreprise()->raisonsociale; ?></td>
                                        <td><?php echo $t->_vars['row']->dSlideshow_creationdate; ?></td>
                                        <td>
                                            <?php  if(jAcl2::check("slideshow.update")):?>
                                            <a href="<?php jtpl_function_html_jurl( $t,'slideshow~slideshow:edit', array('slideshowId'=>$t->_vars['row']->iSlideshow_id));?>">
                                                <button type="button" class="btn btn-success btn-xs">Editer</button>
                                            </a>
                                            <?php  endif; ?>
                                            <?php  if(jAcl2::check("slideshow.delete")):?>
                                            <a onclick="deleteSlideshow(<?php echo $t->_vars['row']->iSlideshow_id; ?>)">
                                                <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                                            </a>
                                            <?php  endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="input-group pull-left">
                                                <select class="form-control" name="todo">
                                                    <option value="0">Action groupées :</option>
                                                    <?php  if(jAcl2::check("slideshow.delete")):?>
                                                    <option value="delete" >Supprimer</option>
                                                    <?php  endif; ?>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="deleteGroupSlideshow()" class="btn btn-white" id="group-action">Appliquer</button>
                                                </span>
                                            </div>
                                        </td>
                                        <td colspan="4">
                                            <ul class="pagination pull-right"></ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $t->_vars['SCRIPT']; ?>

<script>
$(document).ready(function(){
    $('.footable').footable();
    //$('#group-action').click(function(){alert('vody be')});
});

function deleteSlideshow(id)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer ce slideshow ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: true
    }, function () {
        window.location.assign('<?php jtpl_function_html_jurl( $t,"slideshow~slideshow:delete", array("slideshowId"=>$t->_vars['row']->iSlideshow_id));?>')
    });
}

function deleteGroupSlideshow()
{
    if ($('input[name="actionGroup[]"]:checked').length > 0)
    {   
        if ($('select[name="todo"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces slideshows?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler",
                    closeOnConfirm: false
                }, function () {
                    $("#groupform").submit();
                });
        }
    }
}
</script>
<?php 
}
return true;}
