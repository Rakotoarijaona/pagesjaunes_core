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
                    <h2>Statistiques</h2>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group r-form">
                                <label class="control-label">Date début</label>
                                <div class="input-group">
                                    <input type="text" class="form-control required pointer" name="filtre_datedebut" id="filtre_datedebut" data-msg-required="Veuillez renseigner la date début" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" onclick="return clearDate(this);" class="btn btn-white">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group r-form">
                                <label class="control-label">Date fin</label>
                                <div class="input-group">
                                    <input type="text" class="form-control required pointer" name="filtre_datefin" id="filtre_datefin" data-msg-required="Veuillez renseigner la date fin" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" onclick="return clearDate(this);" class="btn btn-white">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group r-form">
                                <label class="control-label">ID Annonce</label>
                                <select name="annonce_id" id="annonce_id" class="form-control required" data-msg-required="Veuillez choisir une ID">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group r-form">
                                <button class="btn btn-white" style="width: 30%; min-width:150px"><span class="text-success">Filtrer les résultats</span></button>
                            </div>
                        </div>                        
                    </div>                          
                    <div class="col-lg-12 hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>LISTE DES STATISTIQUES</h3>
                            <div class="table-responsive" id="stats-list">
                                <table class="footable table table-hover" data-page-size="18" data-filter="#table-filter">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>CLic</th>
                                            <th>Impréssion</th>
                                            <th>CTR</th>
                                            <th>eCPM</th>
                                            <th>eCPC</th>
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
                                                        {$oAds->advertiser_name}
                                                        {if $oAds->advertiser_mail != ''}
                                                            <br/><small>{$oAds->advertiser_mail}</small>
                                                        {/if}
                                                    </td>
                                                    <td>
                                                        {$oAds->getZone()->name}
                                                        <br/><small>{$oAds->getZone()->width} x {$oAds->getZone()->height}</small>
                                                    </td>
                                                    <td>
                                                        <strong>Début:</strong> {$oAds->getPublicationStart()} <br/>
                                                        <strong>Fin:</strong> {$oAds->getPublicationEnd()}
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
                                                        <a href="{jurl 'ads~ads:stats_info', array('id'=>$oAds->id)}" class="btn btn-info btn-xs btn-block">Stats</a>
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
                                            <td colspan ="8">
                                                <div class="alert alert-info text-center">Aucuns résultats</div>
                                            </td>
                                        </tr>
                                        {/if}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Totals</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0,00%</td>
                                            <td>0,00%</td>
                                            <td>0,00%</td>
                                        </tr>
                                    </tfoot>
                                </table>
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
<script type="text/javascript">
$(document).ready(function()
{
    // entreprise list
    $("#annonce_id").select2({
        allowClear: true,
        placeholder: "Veuillez taper içi l'id de l'annonce",
        ajax: {
            url: {/literal}{urljsstring 'ads~ads:autoCompletIdAnnonce'}{literal},
            minimumInputLength: 1,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {q: params.term};
            },
            processResults: function (data) {
            return {
              results: data
            };
        },
        cache: true
      }
    });

    // date picker
    $('#filtre_datedebut').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "dd/mm/yyyy",
        language: 'fr'
    });

    $('#filtre_datefin').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "dd/mm/yyyy",
        language: 'fr'
    });
});
</script>
{/literal}