<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_add.tpl') > 1487075867){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_1b56c42c9073b194c70baf4244db0f4c($t){

}
function template_1b56c42c9073b194c70baf4244db0f4c($t){
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
                <a><strong>Ajouter</strong></a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="adzoneform" role="form" action="<?php jtpl_function_html_jurl( $t,'ads~ads_zone:save_ajout');?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label>Nom zone</label>
                                    <input type="text" id="zone_name" name="zone_name" class="form-control" value=""/>
                                </div>
                                <div class="form-group r-form">
                                    <label>Coût estimatif modèle</label>
                                    <select class="form-control" name="cost_model" id="cost_model">
                                        <option value="jour">Coût journalier</option>
                                        <option value="clic">Coût par clic</option>
                                        <option value="impression">Coût par impression</option>
                                    </select>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Modèle de prix choisi
                                    </div>
                                    <div class="panel-body">
                                        <div id="price_form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Prix</label>
                                                <div class="col-md-10">
                                                    <div class="input-group m-b">
                                                        <input type="text" class="form-control" name="price" id="price"> <span class="input-group-addon">Ar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Nombre</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="number_price" id="number_price">
                                                    <span class="help-block m-b-none">(ex: nombre jour ou clic ou impression)</span>
                                                </div>
                                            </div>
                                            <div class="form-group r-form">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <button type="button" class="btn btn-primary btn-add-price">Ajouter</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="price_list">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <th style="width:40%">Prix</th>
                                                    <th>Nombre</th>
                                                    <th>Unité</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group r-form col-sm-6">
                                        <label>Largeur</label>
                                        <div class="input-group m-b">
                                            <input type="text" class="form-control" name="width"> <span class="input-group-addon">px</span>
                                        </div>
                                    </div>
                                    <div class="form-group r-form col-sm-6">
                                        <label>Hauteur</label>
                                        <div class="input-group m-b">
                                            <input type="text" class="form-control" name="height"> <span class="input-group-addon">px</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Nombre slots encart pub à afficher</label>
                                </div>
                                <div class="row">
                                    <div class="form-group r-form col-sm-6">
                                        <label>Colonne</label>
                                        <input type="text" class="form-control" name="column">
                                    </div>
                                    <div class="form-group r-form col-sm-6">
                                        <label>Ligne</label>
                                        <input type="text" class="form-control" name="row">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Configuration avancée
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group r-form">
                                            <label>Type bannière</label>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="form-group r-form m-b">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="number_rotation">
                                                </div>
                                                <div class="col-md-7">Nombre de rotation par slot, minimum 2 pubs par slot</div>
                                            </div>
                                            <div class="form-group r-form m-b">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="number_client">
                                                </div>
                                                <div class="col-md-7">Nombre des clients autorisé à créer des pubs, 0 par défaut</div>
                                            </div>
                                            <div class="form-group r-form m-b">
                                                <div class="col-md-5">
                                                    <div class="input-group m-b">
                                                        <input type="text" class="form-control" name="line_height"><span class="input-group-addon">px</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">line-height entre les pubs</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Status
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label">Publié</label>
                                            <div class="input-group">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radiopublie1" checked value="1" name="is_publie">
                                                    <label for="radiopublie1"> oui </label>
                                                </div>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radiopublie2"  value="0" name="is_publie">
                                                    <label for="radiopublie2"> non </label>
                                                </div>
                                                <div class="errorPlace">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="<?php jtpl_function_html_jurl( $t,'ads~ads:index');?>" class="btn btn-white" id="cancel">Annuler</a>
                                <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
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
