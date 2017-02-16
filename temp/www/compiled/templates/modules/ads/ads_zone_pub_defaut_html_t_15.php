<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_pub_defaut.tpl') > 1487134370){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_c9660f62864fa9e078b78a2e88dfc5ed($t){

}
function template_c9660f62864fa9e078b78a2e88dfc5ed($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:index');?>">Zone de publicité</a>
            </li>
            <li class="active">
                <a><strong>Pubs par défaut</strong></a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>Zone: <?php echo $t->_vars['oAdsZone']->name; ?></h2>
                    <form id="adzoneform" role="form" action="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:save_ajout');?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group r-form">
                                    <label>Nombre de pubs</label>
                                    <input type="text" id="nb_pub" name="nb_pub" class="form-control" style="width:200px" value=""/>
                                </div>
                                <div class="form-group r-form">
                                    <label>Méthode d'affichage</label>
                                    <select class="form-control" name="cost_model" id="cost_model" style="width:200px">
                                        <option value="1">Renseigner les éspaces vides</option>
                                        <option value="2">Weighted ad rotation</option>
                                        <option value="3">Rotate equally with purchases</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Formulaire
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group r-form">
                                            <label>Type</label>
                                            <select class="form-control" name="ad_type" id="ad_type" style="width:300px">
                                                <option value="1">Image</option>
                                                <option value="2">Html</option>
                                            </select>
                                        </div>
                                        <div class="form-group r-form">
                                            <div style="width:300px">
                                                <label>Catégorie / sous-catégorie</label>
                                                <select class="form-control m-b" name="categorie-filtre">
                                                    <option value="">Toutes les categories :</option>
                                                    <?php foreach($t->_vars['oListCategorie'] as $t->_vars['rowCategorie']):?>
                                                    <option value="categorie,<?php echo $t->_vars['rowCategorie']['categorie']->id; ?>" style="font-weight: bold;"><?php echo $t->_vars['rowCategorie']['categorie']->name; ?></option>
                                                        <?php foreach($t->_vars['rowCategorie']['souscategorie'] as $t->_vars['souscategorie']):?> 
                                                        <option style="padding-left: 10px" value='souscategorie,<?php echo $t->_vars['souscategorie']->id; ?>'><?php echo $t->_vars['souscategorie']->name; ?> </option>
                                                        <?php endforeach;?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group r-form">
                                            <label>Image</label>
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 400px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                                    <input type="file" class="default" id="image" name="image"/>
                                                    </span>&nbsp;
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group r-form">
                                            <label class="control-label">Html</label> 
                                            <textarea class="form-control ckeditor" name="html" id="html"></textarea>
                                        </div>
                                        <div class="form-group r-form">
                                            <label>Lien ad</label>
                                            <input type="text" id="lien_ad" name="lien_ad" class="form-control" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php jtpl_function_html_jurl( $t,'ads~ads:index');?>" class="btn btn-white" id="cancel">Annuler</a>
                                            <button type="submit" class="btn btn-success btn-save-ad">Enregistrer le pub par défaut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Liste des pubs par défauts
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-responsive">
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads:index');?>" class="btn btn-white" id="cancel">Annuler</a>
                                <button type="submit" class="btn btn-success btn-save">Enregistrer tous</button>
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
    var validator = $('#adzoneform').validate({
        rules: {
            zone_name: {
                required: true
            },
            width: {
                required: true,
                number: true
            },
            height: {
                required: true,
                number: true
            },
            column: {
                required: true,
                number: true
            },
            number_rotation: {
                required: true,
                number: true
            },
            number_client: {
                required: true,
                number: true
            },
            line_height: {
                required: true,
                number: true
            },
            row: {
                required: true,
                number: true
            },
            price: {
                number: true,
                number: true
            },
            number_price: {
                number: true,
                number: true
            },
        },
        messages: {
            zone_name: {
                required: "Veuillez renseigner le nom"
            },
            width: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            height: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            column: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            number_rotation: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            number_client: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            line_height: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            row: {
                required: "Veuillez renseigner ce champ",
                number: "Veuillez renseigner un nombre valide"
            },
            price: {
                required: "Veuillez renseigner un prix",
                number: "Veuillez renseigner un prix valide"
            },
            number_price: {
                required: "Veuillez renseigner un nombre",
                number: "Veuillez renseigner un nombre valide"
            }
        },
        errorPlacement: function(error, element) 
        {
            if ( element.is(".input-group > .form-control") ) 
            {
                error.insertAfter(element.parent());
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
        }
    });
    $('.chosen-select').chosen ({
        no_results_text:'Aucun resultat',

    });

    $('.btn-add-price').click(function() {
        $('#price').rules('add',{
            required: true,
            number: true
        });
        $('#number_price').rules('add',{
            required: true,
            number: true
        });
        if (validator.element('#price') && validator.element('#number_price')) {
            var el = '<tr class="price">'+
                        '<input type="hidden" name="hdnprice['+($('#price_list tr').length)+'][price]" value="'+$('#price').val()+'"/>'+
                        '<input type="hidden" name="hdnprice['+($('#price_list tr').length)+'][number]" value="'+$('#number_price').val()+'"/>'+
                        '<input type="hidden" name="hdnprice['+($('#price_list tr').length)+'][unity]" value="'+$('#cost_model').val()+'"/>'+
                        '<td>'+$('#price').val()+'</td>'+
                        '<td>'+$('#number_price').val()+'</td>'+
                        '<td>'+$('#cost_model').val()+'</td>'+
                        '<td><a class="link delete_price" onclick="delete_price(this);">Supprimer</a></td>'+
                     '</tr>';

            $('#price_list tbody').append(el);
            $('#price').val('');
            $('#number_price').val('');
            $('#price').rules('remove');
            $('#number_price').rules('remove');
        }
    });

    $('.btn-save').click(function(){
        if ($('tr.price').length <= 0)
        {
            $('#price').rules('add',{
                required: true,
                number: true
            });
            $('#number_price').rules('add',{
                required: true,
                number: true
            });
        }
        if ($('#adzoneform').valid())
        {
            $('#adzoneform').submit();
        }
    });
});
function delete_price(el)
{
    var r = confirm("Voulez vous supprimer le prix?");
    if (r == true) {
        $(el).parents('tr').remove();
    }
}
</script>
<?php 
}
return true;}
