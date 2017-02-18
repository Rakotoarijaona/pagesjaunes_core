<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
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
            {jmessage}
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>Liste des zones de publicités</h2>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12 m-b">
                            <div class="btn-group">
                                <a href="{jurl 'ads~ads_zone:index', array('status'=>'all')}" class="btn btn-white {if $status == 'all'}active{/if}" type="button">Tous ({$nbAll})</a>
                                <a href="{jurl 'ads~ads_zone:index', array('status'=>'publie')}" class="btn btn-white {if $status == 'publie'}active{/if}" type="button">Publié ({$nbPublie})</a>
                                <a href="{jurl 'ads~ads_zone:index', array('status'=>'notpublie')}" class="btn btn-white {if $status == 'notpublie'}active{/if}" type="button">Non publié ({$nbNotPublie})</a>
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
                            {ifacl2 "ads.type.create"}
                            <a href="{jurl 'ads~ads_zone:ajout'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
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
                                {if sizeof($toAdsZones) > 0}
                                    {foreach ($toAdsZones as $oAdsZone)}
                                        <tr>
                                            <td>
                                                <div class="checkbox" style="margin: 0px">
                                                    <input type="checkbox" class="" 
                                                    {ifacl2 "ads.delete"} id="check{$oAdsZone->id}" name="check[]" value="{$oAdsZone->id}"{else} disabled {/ifacl2} >
                                                    <label for="check{$oAdsZone->id}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                {$oAdsZone->name}
                                            </td>
                                            <td>
                                                {if ($oAdsZone->is_publie == 1)}
                                                    <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                                {elseif ($oAdsZone->is_publie == 0)}
                                                    <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                                {/if}
                                            </td>
                                            <td>
                                                {if ($oAdsZone->date_creation != '')}
                                                <strong>Créé le :</strong> {$oAdsZone->date_creation}<br/>
                                                {/if}
                                            </td>
                                            <td>
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads_zone:edition', array('id'=>$oAdsZone->id)}" class="btn btn-primary btn-xs btn-block">Modifier</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads_zone:pubs_par_defaut', array('id'=>$oAdsZone->id)}" class="btn btn-warning btn-xs btn-block">Pubs par défaut</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.delete"}
                                                <a href="{jurl 'ads~ads_zone:suppression', array('id'=>$oAdsZone->id)}" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                                {/ifacl2}
                                            </td>
                                        </tr>
                                    {/foreach}
                                {/if}
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
                                    {ifacl2 "ads.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'ads~ads_zone:delete_group'}" method="POST">
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