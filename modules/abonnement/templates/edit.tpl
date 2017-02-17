<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Abonnements</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'abonnement~abonnement:index'}">Abonnements</a>
            </li>
            <li class="active">
                <a><strong>{if !empty($abonnement->abonnement_id)}{else}Création{/if}</strong></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2>{if !empty($abonnement->abonnement_id)}{else}Création{/if}</h2>
                </div>
                <div class="ibox-content">

                    <form name="formAbonnement" id="formAbonnement" role="form" action="{if !empty($abonnement->abonnement_id)}{jurl 'abonnement~abonnement:update'}{else}{jurl 'abonnement~abonnement:create'}{/if}" method="post">

                        <input type="hidden" name="id" id="id" value="{$abonnement->abonnement_id}" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Entreprise *</label>
                                    <select name="abonnement_entrepriseid" id="abonnement_entrepriseid" class="form-control required" data-msg-required="Veuillez choisir une entreprise">
                                        {if !empty($abonnement->entreprise->id)}
                                            <option value="{$abonnement->entreprise->id}" selected>{$abonnement->entreprise->raisonsociale} {if !empty($abonnement->entreprise->region)}({$abonnement->entreprise->region}){/if}</option>
                                        {/if}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Nom offre *</label> 
                                    <input type="text" class="form-control required" name="abonnement_nomoffre" id="abonnement_nomoffre" data-msg-required="Veuillez renseigner le nom offre" value="{$abonnement->abonnement_nomoffre}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Date début *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control required pointer" name="abonnement_datedebut" id="abonnement_datedebut" data-msg-required="Veuillez renseigner la date début" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="{$abonnement->abonnement_datedebut}">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" onclick="return clearDate(this);" class="btn btn-white">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Date fin *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control required pointer" name="abonnement_datefin" id="abonnement_datefin" data-msg-required="Veuillez renseigner la date fin" readonly placeholder="Veuillez cliquez içi pour choisir la date" value="{$abonnement->abonnement_datefin}">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" onclick="return clearDate(this);" class="btn btn-white">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Durée *</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="abonnement_dureeval" id="abonnement_dureeval" data-msg-required="Veuillez renseigner la durée" maxlength="4" data-rule-number="true" data-msg-number="Veuillez renseigner une durée valide" value="{$abonnement->abonnement_dureeval}">
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="abonnement_dureetype" id="abonnement_dureetype" data-msg-required="Veuillez renseigner la date début">
                                                <option value="{$DELAY_TYPE_DAY}" {if $abonnement->abonnement_dureetype == $DELAY_TYPE_DAY}selected{/if}>Jour(s)</option>
                                                <option value="{$DELAY_TYPE_WEEK}" {if $abonnement->abonnement_dureetype == $DELAY_TYPE_WEEK}selected{/if}>Semaine(s)</option>
                                                <option value="{$DELAY_TYPE_MONTH}" {if $abonnement->abonnement_dureetype == $DELAY_TYPE_MONTH}selected{/if}>Mois</option>
                                                <option value="{$DELAY_TYPE_YEAR}" {if $abonnement->abonnement_dureetype == $DELAY_TYPE_YEAR}selected{/if}>Année(s)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group r-form">
                                    <label class="control-label">Montant *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control required" name="abonnement_montant" id="abonnement_montant" data-msg-required="Veuillez renseigner le montant" data-rule-money="true" data-msg-money="Veuillez renseigner un montant valide" maxlength="18" value="{$abonnement->abonnement_montant}">
                                        <span class="input-group-addon">Ariary</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {if !empty($abonnement->abonnement_id)}
                            {ifacl2 "abonnement.update"}
                                <div class="col-lg-12 hr-line-dashed"></div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                      <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
                                      <a href="{jurl 'abonnement~abonnement:index'}" class="btn btn-white" id="cancel">Annuler</a>
                                    </div>
                                </div>
                            {/ifacl2}
                        {else}
                            {ifacl2 "abonnement.create"}
                                <div class="col-lg-12 hr-line-dashed"></div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                      <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
                                      <a href="{jurl 'abonnement~abonnement:index'}" class="btn btn-white" id="cancel">Annuler</a>
                                    </div>
                                </div>
                            {/ifacl2}
                        {/if}

                    </form>
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
            // validate form
            $('#formAbonnement').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function (error, element) {
                    $(element).closest(".form-group").append(error);
                },
                errorElement: "label"
            });

            // entreprise list
            $("#abonnement_entrepriseid").select2({
                allowClear: true,
                placeholder: "Veuillez taper içi le nom d'une entreprise ou une region",
                ajax: {
                    url: {/literal}{urljsstring 'entreprise~entreprise:autoComplet'}{literal},
                    minimumInputLength: 3,
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

            // durée type
            $("#abonnement_dureetype").select2();

            // date picker
            $('#abonnement_datedebut').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy",
                language: 'fr'
            });

            $('#abonnement_datefin').datepicker({
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