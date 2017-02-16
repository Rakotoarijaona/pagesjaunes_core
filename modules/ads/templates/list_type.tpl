<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Types de publicités</strong></a>
            </li>
        </ol>       
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            {jmessage}
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Types de publicités</h2>
                </div>
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
                            {ifacl2 "ads.type.create"}
                            <a href="{jurl 'ads~ads:ajout_type'}">
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
                                    <th>Nom</th>
                                    <th>Format</th>
                                    <th>Types de fichier</th>
                                    <th>Statut</th>
                                    <th>Dates</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toListAdsType) > 0}
                                {foreach ($toListAdsType as $oAdstype)}
                                {if $oAdstype->is_removed != 1}
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" class="" 
                                            {ifacl2 "ads.type.delete"} id="check{$oAdstype->id}" name="check[]" value="{$oAdstype->id}"{else} disabled {/ifacl2} >
                                            <label for="check{$oAdstype->id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        {$oAdstype->name}
                                    </td>
                                    <td>
                                        {$oAdstype->format}&nbsp;pixels
                                    </td>
                                    <td>
                                        {$oAdstype->type_fichier}
                                    </td>
                                    <td>                                        
                                        {if ($oAdstype->is_publie == 1)}
                                            <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                        {elseif ($oAdstype->is_publie == 0)}
                                            <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                        {/if}
                                    </td>
                                    <td>
                                        {if ($oAdstype->date_creation != '')}
                                        <strong>Créé le :</strong> {$oAdstype->date_creation}<br/>
                                        {/if}
                                        {if ($oAdstype->date_modification != '')}
                                        <strong>Modifié le :</strong> {$oAdstype->date_modification}<br/>
                                        {/if}
                                        {if ($oAdstype->date_publication != '')}
                                            {if ($oAdstype->is_publie == 1)}
                                            <strong>Publié le :</strong> {$oAdstype->date_publication}
                                            {else}
                                            <strong>Dépublié le :</strong> {$oAdstype->date_publication}
                                            {/if}
                                        {/if}
                                    </td>
                                    <td>
                                        {ifacl2 "ads.type.update"}
                                        <a href="{jurl 'ads~ads:update_type', array('id'=>$oAdstype->id)}" class="btn btn-primary btn-xs btn-block">Modifier</a>
                                        {/ifacl2}
                                        {ifacl2 "ads.type.delete"}
                                        <a href="{jurl 'ads~ads:delete_type', array('id'=>$oAdstype->id)}" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                        {/ifacl2}
                                    </td>
                                </tr>
                                {/if}
                                {/foreach}
                                {/if}
                            </tbody> 
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Action groupées :</option>
                                    {ifacl2 "ads.type.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'ads~ads:delete_group_type'}" method="POST">
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