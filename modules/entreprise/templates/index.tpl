<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Entreprises</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Entreprises</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-sm-2">
        <div class="title-action">
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            {jmessage}
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="GET" action="{jurl 'entreprise~entreprise:index'}" id="formSearch">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group r-form">
                                    <label class="control-label m-b">Filtre par infos</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline" style="min-width: 90px">
                                            <input type="radio" id="radioAll" value="" name="filtreInfo" {if $filtreInfo == ''}checked{/if}>
                                            <label for="radioAll"> Tous </label>
                                        </div>
                                        <div class="radio radio-info radio-inline" style="min-width: 137px">
                                            <input type="radio" id="infoPayant" value="3" name="filtreInfo" {if $filtreInfo == 3}checked{/if}>
                                            <label for="infoPayant"> Avec Infos payants </label>
                                        </div>
                                        <div class="radio radio-info radio-inline" style="min-width: 245px">
                                            <input type="radio" id="infoComplementaire" value="2" name="filtreInfo" {if $filtreInfo == 2}checked{/if}>
                                            <label for="infoComplementaire"> Au moins les infos complémentaires </label>
                                        </div>
                                        <div class="radio radio-info radio-inline" style="min-width: 245px">
                                            <input type="radio" id="infoSimple" value="1" name="filtreInfo" {if $filtreInfo == 1}checked{/if}>
                                            <label for="infoSimple"> Infos simples </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group r-form">
                                    <label class="control-label m-b">Filtre par status</label>
                                    <div class="input-group">
                                        <div class="checkbox checkbox-warning checkbox-inline" style="min-width: 90px">
                                            <input type="checkbox" id="filtrePublie" value="1" name="filtrePublication[]" {$filtrePublie}>
                                            <label for="filtrePublie"> Publié </label>
                                        </div>
                                        <div class="checkbox checkbox-warning checkbox-inline" style="min-width: 137px">
                                            <input type="checkbox" id="filtreNonPublie" value="0" name="filtrePublication[]" {$filtreNonPublie}>
                                            <label for="filtreNonPublie"> Non publié </label>
                                        </div>
                                        <div class="checkbox checkbox-warning checkbox-inline" style="min-width: 245px">
                                            <input type="checkbox" id="filtreEnAttente" value="2" name="filtrePublication[]" {$filtreEnAttente}>
                                            <label for="filtreEnAttente"> En attente </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group r-form" style="max-width: 307px">
                                    <label class="control-label m-b">Filtre par catégorie</label>
                                    <div class="input-group">
                                        <select class="chosen-select form-control m-b" id="filtreCategorie" name="filtreCategorie" data-placeholder="Selectionnez une catégorie" tabindex="2">
                                            <option value="">Toutes les categories :</option>
                                            {foreach ($oListCategorie as $rowCategorie)}
                                                <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;" {if ($filtreCategorie == 'categorie,'.$rowCategorie['categorie']->id)}selected{/if}>{$rowCategorie['categorie']->name}</option>
                                                {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                                    <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}' {if ($filtreCategorie == 'souscategorie,'.$souscategorie->id)}selected{/if}>{$souscategorie->name} </option>
                                                {/foreach}
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group r-form" style="max-width: 307px">
                                    <label class="control-label">Recherche</label>
                                    <input type="text" placeholder="Rechercher" name="filtreRecherche" id="filtreRecherche" class="form-control" value="{$filtreRecherche}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group r-form">
                                    <button type="button" onclick="filterEntreprise();" class="btn btn-white"><i class="fa fa-refresh"></i> Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Liste des entreprises</h2>
                </div>
                <div class="ibox-content">
                    <div class="row m-b">
                        {ifacl2 "entreprise.create"}
                            <div class="col-lg-12">
                                <a href="{jurl 'entreprise~entreprise:ajout'}" class="btn btn-success">Ajouter&nbsp;<i class="fa fa-plus"></i></a>
                            </div>
                        {/ifacl2}
                    </div>
                    <div id="entreprise-list">
                        <div class="table-responsive custom-footable">
                            <input type="hidden" id="sortfield" value="{$sortfield}">
                            <input type="hidden" id="sortsens" value="{$sortsens}">
                            <input type="hidden" id="page" value="{$page}">
                            <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                                <thead>
                                    <tr>
                                        <th data-sort-ignore="true" width="45px"></th>
                                        <th style="width: 30%;" class="footable-sortable 
                                            {if $sortfield == 'raisonsociale'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="entrepriseCustomTri('raisonsociale',this);">
                                            Entreprise<span class="footable-sort-indicator"> </span>
                                        </th>
                                        <th style="width: 20%;">Statut </th>
                                        <th style="width: 30%;">Catégorie / Sous catégorie </th>
                                        <th style="width: 20%;" class="footable-sortable 
                                            {if $sortfield == 'date_creation'}{if $sortsens == 'ASC'}footable-sorted{else}footable-sorted-desc{/if}{/if}" onclick="entrepriseCustomTri('date_creation',this);">Date de création <span class="footable-sort-indicator"> </span></th>
                                        <th data-sort-ignore="true" style="width: 100px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if sizeof($toListEntreprise)}
                                        {foreach ($toListEntreprise as $oEntreprise)}
                                            <tr>
                                                <td>
                                                    <div class="checkbox" style="margin: 0px">
                                                        <input type="checkbox" class="" id="entrepriseCheck{$oEntreprise->id}" name="entrepriseCheck[]" value="{$oEntreprise->id}">
                                                        <label for="entrepriseCheck{$oEntreprise->id}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {ifacl2 "entreprise.update"}
                                                        <a href="{jurl 'entreprise~entreprise:edition',array('id'=>$oEntreprise->id)}"><strong>{$oEntreprise->raisonsociale|upper}</strong></a>
                                                    {else}
                                                        <a href="#"><strong>{$oEntreprise->raisonsociale|upper}</strong></a>
                                                    {/ifacl2}
                                                </td>
                                                <td>
                                                    {if ($oEntreprise->is_publie == 1)}
                                                        <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                                    {elseif ($oEntreprise->is_publie == 0)}
                                                        <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                                    {elseif ($oEntreprise->is_publie == 2)}
                                                        <strong><span class="text-warning"><i class="fa fa-check"></i>&nbsp;En attente</span></strong>
                                                    {/if}
                                                </td>
                                                <td>
                                                    {$oEntreprise->souscategoriesListToString()}
                                                </td>
                                                <td>{$oEntreprise->getDateCreation()}</td>
                                                <td>
                                                    {ifacl2 "entreprise.delete"}
                                                        <a onclick="submitDelete({$oEntreprise->id});" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                                    {/ifacl2}
                                                </td>
                                            </tr>
                                        {/foreach}
                                    {else}
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-info text-center">Aucun résultat</div>
                                            </td>
                                        </tr>
                                    {/if}
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <select class="form-control m-b" name="actionGroup">
                                        <option value="">Action groupées :</option>
                                        {ifacl2 "entreprise.delete"}
                                        <option value="delete">Supprimer</option>
                                        {/ifacl2}
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-white" onclick="deleteGroupEntreprise();"> Appliquer</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {if $nbRecs > $NB_DATA_PER_PAGE}
                                    <ul class="pagination pull-right" style="margin-top:6px;">
                                        {$pagination}
                                    </ul>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $('.chosen-select').chosen({
        no_results_text: "Aucun résultat"
    });
});

// filtre
function filterEntreprise()
{
    var sortsens = $("#sortsens").val();
    var sortfield = $("#sortfield").val();
    var formdata = new FormData();
    i = 0;
    $('input[name="filtrePublication[]"]:checked').each(function()
    {
        formdata.append("filtrePublication[]",$(this).val());
    });
    formdata.append("filtreInfo",$('input[name="filtreInfo"]:checked').val());
    formdata.append("filtreRecherche", $('#filtreRecherche').val());
    formdata.append("filtreCategorie", $("#filtreCategorie").val());
    formdata.append("sortsens", sortsens);
    formdata.append("sortfield", sortfield);
    $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
    $.ajax({
        type: 'POST',
        url: '{/literal}{jfullurl "entreprise~entreprise:index"}{literal}',
        data: formdata,
        processData: false,
        contentType: false,
        success: function(resp) {
          $('#entreprise-list').html(resp);
        },
        error: function() {
        }
    });
}

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
                var sortsens = $("#sortsens").val();
                var sortfield = $("#sortfield").val();
                       
                var formdata = new FormData();
                i = 0;
                $('input[name="filtrePublication[]"]:checked').each(function()
                {
                    formdata.append("filtrePublication[]",$(this).val());
                });
                formdata.append("filtreInfo",$('input[name="filtreInfo"]:checked').val());
                formdata.append("filtreRecherche", $('#filtreRecherche').val());
                formdata.append("filtreCategorie", $("#filtreCategorie").val());
                formdata.append("sortsens", sortsens);
                formdata.append("sortfield", sortfield);
                $('input[name="entrepriseCheck[]"]:checked').each(function()
                {
                    formdata.append("entrepriseGroup[]",$(this).val());
                });
                $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
                $.ajax({
                        type: 'POST',
                        url: '{/literal}{jfullurl "entreprise~entreprise:deleteGroupEntreprise"}{literal}',
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
            var sortsens = $("#sortsens").val();
            var sortfield = $("#sortfield").val();
            var formdata = new FormData();
            i = 0;
            $('input[name="filtrePublication[]"]:checked').each(function()
            {
                formdata.append("filtrePublication[]",$(this).val());
            });
            formdata.append("filtreInfo",$('input[name="filtreInfo"]:checked').val());
            formdata.append("filtreRecherche", $('#filtreRecherche').val());
            formdata.append("filtreCategorie", $("#filtreCategorie").val());
            formdata.append("sortsens", sortsens);
            formdata.append("sortfield", sortfield);
            formdata.append("id", id);
            $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: '{/literal}{jfullurl "entreprise~entreprise:deleteEntreprise"}{literal}',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(resp) {
                    $('#entreprise-list').html(resp);
                    swal("Supprimé!", "L'entreprise a été supprimée", "success");
                },
                error: function() {
                }
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
                url: '{/literal}{jfullurl "entreprise~entreprise:filterByCategorieEntreprise"}{literal}',
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
                url: '{/literal}{jfullurl "entreprise~entreprise:filterBySouscategorieEntreprise"}{literal}',
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
        $('#entreprise-list').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>').load('{/literal}{jfullurl "entreprise~entreprise:getEntrepriseList"}{literal}');
    }
}
</script>
{/literal}