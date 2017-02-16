<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Publicités</strong></a>
            </li>
        </ol>       
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            {jmessage}
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white"> <i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-8 text-left">
                            {ifacl2 "ads.create"}
                            <a href="{jurl 'ads~ads:ajout'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>

                    <div class="table-responsive" id="pages-list">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th data-sort-ignore="true" style="width: 50px;"></th>
                                    <th data-sort-ignore="true">Images </th>
                                    <th>Noms</th>
                                    <th>Types</th>
                                    <th>Durée</th>
                                    <th>Annonceurs</th>
                                    <th>Catégories / Sous-catégories </th>
                                    <th>Par défaut</th>
                                    <th>Statut</th>
                                    <th>Dates</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toListAds) > 0}
                                {foreach ($toListAds as $oAds)}
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" class="" 
                                            {ifacl2 "ads.delete"} id="check{$oAds->id}" name="check[]" value="{$oAds->id}"{else} disabled {/ifacl2} >
                                            <label for="check{$oAds->id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{$j_basepath}publicites/thumbnail/{$oAds->images}" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image">
                                    </td>
                                    <td>
                                        {$oAds->name}
                                    </td>
                                    <td>
                                        {$oAds->getAdd_type()->name}<br/>{$oAds->getAdd_type()->format}
                                    </td>
                                    <td>
                                        {if $oAds->duree <= 1}
                                        {$oAds->duree} seconde
                                        {else}
                                        {$oAds->duree} secondes
                                        {/if}
                                    </td>
                                    <td>
                                        {if (($oAds->annonceur != 0)&&($oAds->annonceur != ''))}
                                        {$oAds->getAnnonceur()->raisonsociale}
                                        {/if}
                                    </td>
                                    <td>
                                        {if (($oAds->souscategorie != 0)&&($oAds->souscategorie != ''))}
                                        {$oAds->getSouscategorieString()}
                                        {/if}
                                    </td>
                                    <td class="text-center">                                        
                                        {if ($oAds->is_default == 1)}
                                            <i class="fa fa-check"></i>
                                        {/if}
                                    </td>
                                    <td>                                        
                                        {if ($oAds->is_publie == 1)}
                                            <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                        {elseif ($oAds->is_publie == 0)}
                                            <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                        {/if}
                                    </td>
                                    <td>
                                        {if (($oAds->date_creation != ''))}
                                        <strong>Créé le :</strong> {$oAds->date_creation}<br/>
                                        {/if}
                                        {if (($oAds->date_modification != ''))}
                                        <strong>Modifié le :</strong> {$oAds->date_modification}<br/>
                                        {/if}
                                        {if (($oAds->date_publication != '')&&($oAds->is_publie == 1))}
                                        <strong>Publié le :</strong> {$oAds->date_publication}
                                        {/if}
                                    </td>
                                    <td>
                                        {ifacl2 "ads.update"}
                                        <a href="{jurl 'ads~ads:update', array('id'=>$oAds->id)}" class="btn btn-primary btn-xs btn-block">Modifier</a>
                                        {/ifacl2}
                                        {ifacl2 "ads.delete"}
                                        <a href="{jurl 'ads~ads:delete', array('id'=>$oAds->id)}" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                        {/ifacl2}
                                    </td>
                                </tr>
                                {/foreach}
                                {/if}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="11">
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
                                    {ifacl2 "ads.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'ads~ads:delete_group'}" method="POST">
                            </form>
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
{/literal}