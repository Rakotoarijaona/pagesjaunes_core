<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Total</span>
                    <h5>Entreprise</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$nbTotalEntreprise}</h1>
                    <div class="stat-percent font-bold text-success"></div>
                    <small>Entreprises inscrites sur pages jaunes</small>
                    <a target="_blank" href="{jurl 'entreprise~entreprise:index'}" class="stat-view-more"><small>En savoir plus</small></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Payants</span>
                    <h5>Entreprise</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$nbAvecInfoPayant}</h1>
                    <div class="stat-percent font-bold text-success">{$pAvecInfoPayant}%</div>
                    <small>Avec au moins un info payante </small>
                    <a target="_blank" href="{jurl 'entreprise~entreprise:index'}" class="stat-view-more"><small>En savoir plus</small></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">Complémentaires</span>
                    <h5>Entreprise</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$nbAvecInfoComp}</h1>
                    <div class="stat-percent font-bold text-success">{$pAvecInfoComp}%</div>
                    <small>Avec au moins un info complémentaire </small>
                    <a target="_blank" href="{jurl 'entreprise~entreprise:index'}" class="stat-view-more"><small>En savoir plus</small></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Simple</span>
                    <h5>Entreprise</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$nbAvecInfoSimple}</h1>
                    <div class="stat-percent font-bold text-success">{$pAvecInfoSimple}%</div>
                    <small>Avec seulement des infos simples </small>
                    <a target="_blank" href="{jurl 'entreprise~entreprise:index'}" class="stat-view-more"><small>En savoir plus</small></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des 10 dernières entreprises inscrites et validées</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>Nom entreprise</th>
                            <th>Catégorie / sous catégories</th>
                            <th>Date de création</th>
                            <th>Classification</th>
                        </tr>
                        </thead>
                        <tbody>
                        {if sizeof($toLastInserted)}
                        {foreach ($toLastInserted as $oEntreprise)}
                        <tr>
                            <td><strong>{$oEntreprise->raisonsociale|upper}</strong></td>
                            <td>{$oEntreprise->souscategoriesListToString()}</td>
                            <td>{$oEntreprise->getDateCreation()}</td>
                            {if ($oEntreprise->video_presentation_active == 1) || ($oEntreprise->qui_sommes_nous_active == 1) || ($oEntreprise->nos_services_active == 1) || ($oEntreprise->nos_references_active == 1) || ($oEntreprise->videos_active == 1) || ($oEntreprise->galerie_image_active == 1) || ($oEntreprise->catalogue_active == 1)}
                            <td class="text-success">infos payantes</td>
                            {elseif (sizeof($oEntreprise->getServiceList()>0) || sizeof($oEntreprise->getProduitList()>0) || sizeof($oEntreprise->getMarqueList()>0))}
                            <td class="text-info">infos complémentaires</td>
                            {else}
                            <td class="text-warning">infos simples</td>
                            {/if}
                        </tr>
                        {/foreach}
                        {else}
                            <tr>
                                <td colspan="4" class="text-center"><div class="alert alert-info">Aucun résultat</div></td>
                            </tr>
                        {/if}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des 10 derniers annonceurs </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="footable table table-hover" data-page-size="18" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Type zone</th>
                                    <th>Catégorie / sous catégorie</th>
                                    <th>Durée</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toLastAdsPurchase) > 0}
                                    {foreach ($toLastAdsPurchase as $oAds)}
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
                                                <strong>Début:</strong> {$oAds->getPublicationStart()} <br/>
                                                <strong>Fin:</strong> {$oAds->getPublicationEnd()}
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
                                    <td colspan="8">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>


  {$SCRIPT}

  <script>
        {literal}
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 2, 2), 6], [gd(2012, 3, 3), 4], [gd(2012, 4, 4), 8],
                [gd(2012, 5, 5), 9], [gd(2012, 6, 6), 7], [gd(2012, 7, 7), 5], [gd(2012, 8, 8), 4],
                [gd(2012, 9, 9), 7], [gd(2012, 10, 10), 8], [gd(2012, 11, 11), 9], [gd(2012, 11, 11), 9]
            ];
            var jsonEntreprise = {/literal}{$jSonchartEntreprise}{literal};
            var dataChartEntreprise = [];
            var lastmonth = 0;
            var nbmonth = 0;
            for (var i=0; i<jsonEntreprise.length; i++)
            {
                if (lastmonth != jsonEntreprise[i].month)
                {
                    nbmonth++;
                    lastmonth = jsonEntreprise[i].month;
                }
                dataChartEntreprise.push([gd(jsonEntreprise[i].year, jsonEntreprise[i].month, jsonEntreprise[i].day), jsonEntreprise[i].value]);
            }
            var dataset = [
                {
                    label: "Inscription",
                    data: dataChartEntreprise,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];
            if (nbmonth <= 2)
            {
                var options = {
                    xaxis: {
                        mode: "time",
                        tickSize: [1, "day"],
                        tickLength: 12,
                        axisLabel: "Date",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Arial',
                        axisLabelPadding: 10,
                        color: "#d5d5d5"
                    },
                    yaxes: [
                    {
                        position: "left",
                        clolor: "#d5d5d5",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: ' Arial',
                        axisLabelPadding: 67
                    }
                    ],
                    legend: {
                        noColumns: 1,
                        labelBoxBorderColor: "#000000",
                        position: "nw"
                    },
                    grid: {
                        hoverable: false,
                        borderWidth: 0
                    }
                };
            }
            else
            {
                var options = {
                    xaxis: {
                        mode: "time",
                        tickSize: [1, "month"],
                        tickLength: 12,
                        axisLabel: "Date",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Arial',
                        axisLabelPadding: 10,
                        color: "#d5d5d5"
                    },
                    yaxes: [
                    {
                        position: "left",
                        clolor: "#d5d5d5",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: ' Arial',
                        axisLabelPadding: 67
                    }
                    ],
                    legend: {
                        noColumns: 1,
                        labelBoxBorderColor: "#000000",
                        position: "nw"
                    },
                    grid: {
                        hoverable: false,
                        borderWidth: 0
                    }
                };
            }

            $.plot($("#flot-dashboard-chart"), dataset, options);

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;


            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    {/literal}
</script>