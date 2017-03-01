<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><strong>Editer top recherche</strong></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'toprecherche~toprecherche:index'}">Tops recherches</a>
            </li>
            <li class="active">
                <a><strong>Edition</strong></a>
            </li>
        </ol>          
    </div>
</div>
<div class="wrapper wrapper-content animated bouceIn">
    <div class="row">
        <div class="col-lg-12 toprecherche-wrapper">
            <div class="ibox float-e-margins panel-info">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group r-form">
                                <label>Titre *</label>
                                <input id="titre" name="titre" disabled type="text" class="form-control" required>
                            </div>
                            <div class="form-group r-form">
                                <label class="control-label">Sous-catégorie *</label>
                                <div class="input-group">
                                    <select data-placeholder="Selectionnez une entreprise" onchange="getToprechercheForm()" id="souscategorieId" name="souscategorieId[]" class="form-control chosen-select" style="width:100%;" tabindex="2">
                                        <option value="">Selectionnez une entreprise</option>
                                        {if (sizeof($oListCategorie)>0)}
                                            {foreach ($oListCategorie as $rowCategorie)}
                                            <optgroup label="{$rowCategorie['categorie']->name}">
                                                {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                                                    <option value='{$souscategorie->id}'{if ($selected == $souscategorie->id)}selected{/if}>{$souscategorie->name} </option>
                                                {/foreach}
                                            </optgroup>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row" id="toprecherche-form">
                                <div class="alert alert-info">Veuillez choisir une sous-catégorie </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="button" onclick="saveTopRecherche()" class="btn-save btn btn-primary">Enregistrer</button>
                            <button type="button" onclick="backToIndex()" class="btn btn-white">Revenir à la liste</button>
                            <button type="button" onclick="backToIndex()" class="btn-cancel btn btn-white">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{$SCRIPT}
{literal}
<script type="text/javascript">
$(document).ready(function()
{
    if ($('#souscategorieId').val() != '')
    {
        getToprechercheForm();
    }
    $('.chosen-select').chosen();

}
);
function getToprechercheForm()
{
    var souscategorieId = $('#souscategorieId').val();
    if (souscategorieId != '')
    {
        var formdata = new FormData();
        formdata.append("souscategorieId", souscategorieId);
        $('#toprecherche-form').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
        $.ajax({
            type: 'POST',
            url: 'getTopRechercheForm',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {                  
               $('#toprecherche-form').html(data);
               selector = 'option[value="'+souscategorieId+'"]';
               $('#titre').val($(selector).text());
            },
            error: function() {
              $('#toprecherche-form').html('<div class="alert alert-info">Une erreur s\'est produite</div>'); }   // tell jQuery not to set contentType
        });
    }
}
function saveTopRecherche()
{
    if ($('#toprecherche1').length > 0)
    {
        var souscategorieId = $('#souscategorieId').val();
        toprecherche1 = $('#toprecherche1').val();
        toprecherche2 = $('#toprecherche2').val();
        toprecherche3 = $('#toprecherche3').val();
        var formdata = new FormData();
        formdata.append("souscategorieId", souscategorieId);
        formdata.append("toprecherche1", toprecherche1);
        formdata.append("toprecherche2", toprecherche2);
        formdata.append("toprecherche3", toprecherche3);
        $.ajax({
            type: 'POST',
            url: 'addTopRecherche',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                swal('',data);  
                $('option:selected').removeAttr('selected');
                $('.chosen-select').chosen('destroy');
                $('.chosen-select').chosen();
                $('#titre').val('');               
                $('#toprecherche-form').html('<div class="alert alert-info text-center">'+data+'</div>');
            }
        });
    }
}
function saveAndBackToIndex()
{
    var souscategorieId = $('#souscategorieId').val();
    if (souscategorieId != '')
    {  
        if ($('#toprecherche1').val() != '') { 
            toprecherche1 = $('#toprecherche1').val();
            toprecherche2 = $('#toprecherche2').val();
            toprecherche3 = $('#toprecherche3').val();
            formdata.append("souscategorieId", souscategorieId);
            formdata.append("toprecherche1", toprecherche1);
            formdata.append("toprecherche2", toprecherche2);
            formdata.append("toprecherche3", toprecherche3);
            $.ajax({
                type: 'POST',
                url: 'addTopRecherche',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {                  
                   window.location.assign("index");
                },
                error: function() {
                  $('#toprecherche-form').html('<div class="alert alert-info">Une erreur s\'est produite</div>'); }   // tell jQuery not to set contentType
            });
        }
        else
        {
            swal("Veuillez ajouter au moin un top 1 avant d'enregistrer!", "", "success");
        }
    }
    else
    {
        swal("Veuillez selectionner une sous-categorie et ajouter au moin un top 1 avant d'enregistrer!", "", "success");
    }
}
function backToIndex()
{
    window.location.assign("index");
}
</script>
{/literal}
