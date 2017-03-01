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
                    <form method="GET" action="{jurl 'ads~ads:statistiques'}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group r-form">
                                    <label class="control-label">Date début</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control required pointer" name="filtre_datedebut" id="filtre_datedebut" data-msg-required="Veuillez renseigner la date début" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="{if !empty($dateDebut)}{$dateDebut}{/if}">
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
                                        <input type="text" class="form-control required pointer" name="filtre_datefin" id="filtre_datefin" data-msg-required="Veuillez renseigner la date fin" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="{if !empty($dateFin)}{$dateFin}{/if}">
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
                                        {if !empty($idAnnonce)}
                                            <option value="{$idAnnonce}" selected >{$idAnnonce}</option>
                                        {/if}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group r-form">
                                    <button type="submit" class="btn btn-white" style="width: 30%; min-width:150px"><span class="text-success">Filtrer les résultats</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12 hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>LISTE DES STATISTIQUES</h3>
                            {if (isset($oAdsPurchase))}
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <div class="form-group r-form">
                                            <strong>Id de l'annonce:</strong> {$oAdsPurchase->id}<br/>
                                            <strong>Type:</strong> {$oAdsPurchase->getZone()->name} <br/>
                                            {if ($oAdsPurchase->website_url != '')}
                                                <strong>Url :</strong> {$oAdsPurchase->website_url}<br/>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            {/if}
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
                                        {if sizeof($toStat['item']) > 0}
                                            {foreach ($toStat['item'] as $id=>$oStat)}
                                                <tr>
                                                    <td>
                                                        {$id}
                                                    </td>
                                                    <td>
                                                        {$oStat['tc']}
                                                    </td>
                                                    <td>
                                                        {$oStat['tv']}
                                                    </td>
                                                    <td>
                                                        {$oStat['ctr']}
                                                    </td>
                                                    <td>
                                                        {$oStat['cpm']}
                                                    </td>
                                                    <td>
                                                        {$oStat['cpc']}
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
                                        {if sizeof($toStat['total']) > 0}
                                            <tr>
                                                <td>Totals</td>
                                                <td>{$toStat['total']['tc']}</td>
                                                <td>{$toStat['total']['tv']}</td>
                                                <td>{$toStat['total']['ctr']}</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        {else}
                                            <tr>
                                                <td>Totals</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0,00%</td>
                                                <td>0,00%</td>
                                                <td>0,00%</td>
                                            </tr>
                                        {/if}
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