<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Abonnements</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Abonnements</strong></a>
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
                            {ifacl2 "abonnement.create"}
                            <a href="{jurl 'abonnement~abonnement:add'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>

                    <div class="table-responsive" id="abonnement-list" style="margin-top:30px;">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom offre</th>
                                    <th>Entreprise</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Durée</th>
                                    <th>Montant</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if $nbRecs > 0}
                                    {foreach $list as $abonnement}
                                        <tr>
                                            <td>
                                                <div class="checkbox" style="margin: 0px">
                                                    <input type="checkbox" class="" name="abonnementCheck[]" value="{$abonnement->abonnement_id}">
                                                    <label for="abonnementCheck{$abonnement->abonnement_id}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                {ifacl2 "entreprise.update"}
                                                    <a href="{jurl 'abonnement~abonnement:edit',array('id'=>$abonnement->abonnement_id)}"><strong>{$abonnement->abonnement_nomoffre}</strong></a>
                                                {else}
                                                    <a href="javascript:void(0);"><strong>{$abonnement->abonnement_nomoffre}</strong></a>
                                                {/ifacl2}
                                            </td>
                                            <td>{$abonnement->entreprise->raisonsociale}</td>
                                            <td>{$abonnement->abonnement_datedebut|jdatetime}</td>
                                            <td>{$abonnement->abonnement_datefin|jdatetime}</td>
                                            <td>
                                                {$abonnement->abonnement_dureeval} 
                                                {if $abonnement->abonnement_dureetype == $DELAY_TYPE_DAY}
                                                    Jour{if $abonnement->abonnement_dureeval > 1}s{/if}
                                                {/if}
                                                {if $abonnement->abonnement_dureetype == $DELAY_TYPE_WEEK}
                                                    Semaine{if $abonnement->abonnement_dureeval > 1}s{/if}
                                                {/if}
                                                {if $abonnement->abonnement_dureetype == $DELAY_TYPE_MONTH}
                                                    Mois
                                                {/if}
                                                {if $abonnement->abonnement_dureetype == $DELAY_TYPE_YEAR}
                                                    Année{if $abonnement->abonnement_dureeval > 1}s{/if}
                                                {/if}
                                            </td>
                                            <td>{$abonnement->abonnement_montant} Ariary</td>
                                            <td>
                                                {ifacl2 "abonnement.delete"}
                                                <a href="javascript:;" onclick="removeAbonnement({$abonnement->abonnement_id});" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                                {/ifacl2}
                                            </td>
                                        </tr>
                                    {/foreach}
                                {else}
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-info" role="alert">
                                                <p class="text-center">Aucun abonnement trouvé</p>
                                            </div>
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Action groupées :</option>
                                    {ifacl2 "abonnement.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'pages~pages:delete_group'}" method="POST">
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
            $('.footable').footable({
                "filtering": {
                    "enabled": false
                }
            });
        });

        // remove one abonnement
        function removeAbonnement(id)
        {
            swal({
                title: "Suppression",
                text: "Êtes-vous sur de vouloir supprimer cet abonnement ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "supprimer",
                cancelButtonText: "Annuler",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    type: "post",
                    url:{/literal}{urljsstring 'abonnement~abonnement:remove'}{literal},
                    data : {
                        id: id
                    },
                    async: false,
                    success: function (_resp) {
                        if (_resp.success == {/literal}{$YES}{literal}) {
                            swal({
                                title: "Supprimé",
                                text: "L'abonnement a été supprimé",
                                type: "success"
                            }, function () {
                                location.reload();
                            });
                        }
                    },
                    async: false
                });
            });
        }

        // remove abonnement group
        function deleteGroup()
        {
            if ($('input[name="abonnementCheck[]"]:checked').length > 0)
            {
                if ($('select[name="actionGroup"]').val() == 'delete')
                {

                    var abonnementsToRemove = [];
                    $('input[name="abonnementCheck[]"]:checked').each(function () {
                        abonnementsToRemove.push($(this).val());
                    });

                    var id = abonnementsToRemove.length > 1 ? abonnementsToRemove.join(",") : abonnementsToRemove[0];
                    var removeConfirmMsg = abonnementsToRemove.length > 1 ? "Êtes-vous sur de vouloir supprimer ces abonnements ?" : "Êtes-vous sur de vouloir supprimer cet abonnement ?";
                    var removeSuccessMsg = abonnementsToRemove.length > 1 ? "Les abonnements ont été supprimés avec succès" : "L'abonnement a été supprimé avec succès";

                    swal({
                        title: "Suppression",
                        text: removeConfirmMsg,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "supprimer",
                        cancelButtonText: "Annuler",
                        closeOnConfirm: false
                    }, function () {

                        $.ajax({
                            type: "post",
                            url:{/literal}{urljsstring 'abonnement~abonnement:remove'}{literal},
                            data : {
                                id: id
                            },
                            async: false,
                            success: function (_resp) {
                                if (_resp.success == {/literal}{$YES}{literal}) {
                                    swal({
                                        title: "Supprimé",
                                        text: removeSuccessMsg,
                                        type: "success"
                                    }, function () {
                                        location.reload();
                                    });
                                }
                            },
                            async: false
                        });

                    });
                }
            }
        }

    </script>
{/literal}