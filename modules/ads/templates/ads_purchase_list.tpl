<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <strong>Annonceur</strong>
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
                    <h2>Liste des pubs</h2>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12 m-b">
                            <div class="btn-group">
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'all')}" class="btn btn-white {if $status == 'all' || $status == ''}active{/if}" type="button">Tous ({$nbAll})</a>
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'en_attente')}" class="btn btn-white {if $status == 'en_attente'}active{/if}" type="button">En attente ({$nbEnAttente})</a>
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'approuve')}" class="btn btn-white {if $status == 'approuve'}active{/if}" type="button">Approuvé ({$nbApprouve})</a>
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'rejete')}" class="btn btn-white {if $status == 'rejete'}active{/if}" type="button">Rejeté ({$nbRejete})</a>
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'expire')}" class="btn btn-white {if $status == 'expire'}active{/if}" type="button">Expiré ({$nbExpire})</a>
                                <a href="{jurl 'ads~ads:liste_annonce', array('status'=>'reserve')}" class="btn btn-white {if $status == 'reserve'}active{/if}" type="button">Réservé ({$nbReserve})</a>
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
                            {ifacl2 "ads.create"}
                            <a href="{jurl 'ads~ads:ajout_annonceur'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>
                    <div class="table-responsive" id="pages-list">
                        <table class="footable table table-hover" data-page-size="18" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Type zone</th>
                                    <th>Catégorie / sous catégorie</th>
                                    <th>Durée</th>
                                    <th>Coût</th>
                                    <th>Banner</th>
                                    <th>Statut</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toListAds) > 0}
                                    {foreach ($toListAds as $oAds)}
                                        <tr>
                                            <td>
                                                {$oAds->id}
                                            </td>
                                            <td>
                                                {$oAds->getEntreprise()->raisonsociale}
                                                {foreach $oAds->getEntreprise()->getEmails() as $email}
                                                    <br/><small>{$email}</small>
                                                {/foreach}
                                            </td>
                                            <td>
                                                {$oAds->getZone()->name}
                                                <br/><small>{$oAds->getZone()->width} x {$oAds->getZone()->height}</small>
                                            </td>
                                            <td>
                                                {if (null != $oAds->souscategorie_id)}
                                                <strong>Sous catégorie:</strong><br/>
                                                {$oAds->getSouscategorie()->name}
                                                {/if}
                                            </td>
                                            <td>
                                                {if !empty($oAds->getPublicationStart())}
                                                <strong>Début:</strong> {$oAds->getPublicationStart()} <br/>
                                                <strong>Fin:</strong> {$oAds->getPublicationEnd()}
                                                {else}
                                                Permanent
                                                {/if}
                                            </td>
                                            <td>
                                                {$oAds->price}
                                                {$oAds->currency}
                                                <br/>
                                                {if ($oAds->payment_status == 1)}
                                                    <strong><span class="text-success">Payé</span></strong>
                                                {elseif ($oAds->payment_status == 2)}
                                                    <strong><span class="text-warning">Non payé</span></strong>
                                                {elseif ($oAds->payment_status == 3)}
                                                    <strong><span class="text-danger">Invalide</span></strong>
                                                {/if}

                                            </td>
                                            <td>
                                                <a href="{$j_basepath}publicites/big/{$oAds->banner}" title="{$oAds->banner}" target="_blank"><img src="{$j_basepath}publicites/thumbnail/{$oAds->banner}" alt="image"></a>
                                            </td>
                                            <td>
                                                {if ($oAds->status == 1)}
                                                    <strong><span class="text-warning">En attente</span></strong>
                                                {elseif ($oAds->status == 2)}
                                                    <strong><span class="text-success">Approuvé</span></strong>
                                                {elseif ($oAds->status == 3)}
                                                    <strong><span class="text-danger">Rejeté</span></strong>
                                                {elseif ($oAds->status == 4)}
                                                    <strong><span class="text-danger">Expiré</span></strong>
                                                {elseif ($oAds->status == 5)}
                                                    <strong><span class="text-info">Réservé</span></strong>
                                                {/if}
                                            </td>
                                            <td>
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads:set_expired', array('id'=>$oAds->id)}" class="btn btn-warning btn-xs btn-block">Expiré</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads:statistiques', array('annonce_id'=>$oAds->id)}" class="btn btn-info btn-xs btn-block">Stats</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads:copier_annonceur', array('id'=>$oAds->id)}" class="btn btn-success btn-xs btn-block">Copier</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.update"}
                                                <a href="{jurl 'ads~ads:editer_annonceur', array('id'=>$oAds->id)}" class="btn btn-warning btn-xs btn-block">Editer</a>
                                                {/ifacl2}
                                                {ifacl2 "ads.delete"}
                                                <a href="{jurl 'ads~ads:supprimer_annonce', array('id'=>$oAds->id)}" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                                {/ifacl2}
                                            </td>
                                        </tr>
                                    {/foreach}
                                {else}
                                <tr>
                                    <td colspan ="9">
                                        <div class="alert alert-info text-center">Aucuns résultats</div>
                                    </td>
                                </tr>
                                {/if}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9">
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