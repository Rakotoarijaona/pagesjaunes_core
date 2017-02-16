<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/entreprise/templates/index.tpl') > 1487160443){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
 require_once('G:\wamp\pagesjaunes_core/plugins/tpl/html/function.jmessage.php');
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jfullurl.php');
function template_meta_78f32298f1e136298ea59f069e1e5312($t){

}
function template_78f32298f1e136298ea59f069e1e5312($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Entreprises</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Entreprises</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-sm-2">
        <div class="title-action">
            <?php  if(jAcl2::check("entreprise.create")):?>
            <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:ajout');?>" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i></a>
            <?php  endif; ?>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <?php jtpl_function_html_jmessage( $t);?>

            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row m-b">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white"> <i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="categorie-filtre">
                                    <option value="">Toutes les categories :</option>
                                    <?php foreach($t->_vars['oListCategorie'] as $t->_vars['rowCategorie']):?>
                                    <option value="categorie,<?php echo $t->_vars['rowCategorie']['categorie']->id; ?>" style="font-weight: bold;"><?php echo $t->_vars['rowCategorie']['categorie']->name; ?></option>
                                        <?php foreach($t->_vars['rowCategorie']['souscategorie'] as $t->_vars['souscategorie']):?> 
                                        <option style="padding-left: 10px" value='souscategorie,<?php echo $t->_vars['souscategorie']->id; ?>'><?php echo $t->_vars['souscategorie']->name; ?> </option>
                                        <?php endforeach;?>
                                    <?php endforeach;?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="filterByCategorie();"> Appliquer</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" id="entreprise-list">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th data-sort-ignore="true" width="45px"></th>
                                    <th style="width: 30%;">Entreprise </th>
                                    <th style="width: 20%;">Statut </th>
                                    <th style="width: 30%;">Catégorie / Sous catégorie </th>
                                    <th style="width: 20%;">Date de création </th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(sizeof($t->_vars['toListEntreprise'])):?>
                                <?php foreach($t->_vars['toListEntreprise'] as $t->_vars['oEntreprise']):?>
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" class="" id="entrepriseCheck<?php echo $t->_vars['oEntreprise']->id; ?>" name="entrepriseCheck[]" value="<?php echo $t->_vars['oEntreprise']->id; ?>">
                                            <label for="entrepriseCheck<?php echo $t->_vars['oEntreprise']->id; ?>"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <?php  if(jAcl2::check("entreprise.update")):?>
                                        <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:edition',array('id'=>$t->_vars['oEntreprise']->id));?>"><strong><?php echo strtoupper($t->_vars['oEntreprise']->raisonsociale); ?></strong></a>
                                        <?php else:?>
                                        <a href="#"><strong><?php echo strtoupper($t->_vars['oEntreprise']->raisonsociale); ?></strong></a>
                                        <?php  endif; ?>
                                    </td>
                                    <td>
                                        <?php if(($t->_vars['oEntreprise']->is_publie == 1)):?>
                                            <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                        <?php elseif(($t->_vars['oEntreprise']->is_publie == 0)):?>
                                            <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                        <?php elseif(($t->_vars['oEntreprise']->is_publie == 2)):?>
                                            <strong><span class="text-warning"><i class="fa fa-check"></i>&nbsp;En attente</span></strong>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <?php echo $t->_vars['oEntreprise']->souscategoriesListToString(); ?>
                                    </td>
                                    <td><?php echo $t->_vars['oEntreprise']->getDateCreation(); ?></td>
                                    <td>
                                        <?php  if(jAcl2::check("entreprise.delete")):?>
                                        <a onclick="submitDelete(<?php echo $t->_vars['oEntreprise']->id; ?>);" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                        <?php  endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <?php endif;?>
                            </tbody>                            
                            <tfoot>
                                <tr>
                                    <td colspan="6">
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
                                    <?php  if(jAcl2::check("entreprise.delete")):?>
                                    <option value="delete">Supprimer</option>
                                    <?php  endif; ?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroupEntreprise();"> Appliquer</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $t->_vars['SCRIPT']; ?>

<script>
$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $('.footable').footable();
});
function deleteGroupEntreprise()
{
    if ($('input[name="entrepriseCheck[]"]:checked').length > 0)
    {
        if ($('select[name="actionGroup"]').val() == 'delete')
        {
            swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer ces entreprises ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
            }, function () {
                var entrepriseGroup = [];
                       
                var formdata = new FormData();
                i = 0; 
                $('input[name="entrepriseCheck[]"]:checked').each(function()
                {
                    formdata.append("entrepriseGroup[]",$(this).val());
                });
                $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
                $.ajax({
                        type: 'POST',
                        url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:deleteGroupEntreprise");?>',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                          $('#entreprise-list').html(data);
                          swal("Supprimé!", "L'entreprise a été supprimée", "success");
                        },
                        error: function() {
                        }   // tell jQuery not to set contentType
                    });
                }); 
        }
    }
}
function submitDelete(id)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer cette entreprise ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            var param = 'id='+id;
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>').load('deleteEntreprise',param, function(){
                    swal("Supprimé!", "L'entreprise a été supprimée", "success");
                });         
        });
}
function filterByCategorie()
{
    if ($('select[name="categorie-filtre"]').val() != '')
    {
        var filtre = $('select[name="categorie-filtre"]').val().split(",");

        if (filtre[0] == 'categorie')
        {
            var categorieId = filtre[1];
            var formdata = new FormData();
            formdata.append("categorieId", categorieId);
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:filterByCategorieEntreprise");?>',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#entreprise-list').html(data);
                },
                error: function() {
                }   // tell jQuery not to set contentType
            });
        }
        else
        {
            var souscategorieId = filtre[1];
            var formdata = new FormData();
            formdata.append("souscategorieId", souscategorieId);
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:filterBySouscategorieEntreprise");?>',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#entreprise-list').html(data);
                },
                error: function() {
                }   // tell jQuery not to set contentType
            });
        }
    }
    else
    {
        $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>').load('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:getEntrepriseList");?>');
    }
}
</script>
<?php 
}
return true;}
