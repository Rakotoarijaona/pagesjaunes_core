<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Publicités</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a>Publicité</a>
            </li>
            <li class="active">
                <a><strong>Configuration</strong></a>
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
                    <form id="configform" role="form" action="{jurl 'ads~ads_config:save_config'}" method="POST">
                        <div class="form-group r-form">
                            <label>Nom du site</label>
                            <div>
                                <input type="text" id="website_name" name="website_name" class="form-control" style="max-width:350px;" value="{$oAdsConfig->website_name}"/>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label>Contact e-mail</label>
                            <div>
                                <input type="email" id="contact_mail" name="contact_mail" class="form-control" style="max-width:350px;" value="{$oAdsConfig->contact_mail}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mode de paiement</label>
                            <div class="input-group">
                                <div class="radio radio-info">
                                    <input type="radio" id="radiopayment1" value="{$CASH}" name="payment_methods" {if ($oAdsConfig->payment_methods == $CASH)} checked {/if}>
                                    <label for="radiopayment1"> Paiement cash </label>
                                </div>
                                <div class="radio radio-info">
                                    <input type="radio" id="radiopayment2" value="{$CHEQUE}" name="payment_methods" {if ($oAdsConfig->payment_methods == $CHEQUE)} checked {/if}>
                                    <label for="radiopayment2"> Paiement par chèque </label>
                                </div>
                                <div class="radio radio-info">
                                    <input type="radio" id="radiopayment3" value="{$MOBILE}" name="payment_methods" {if ($oAdsConfig->payment_methods == $MOBILE)} checked {/if}>
                                    <label for="radiopayment3"> Paiement par mobile </label>
                                </div>
                                <div class="radio radio-info">
                                    <input type="radio" id="radiopayment4" value="{$PAYPAL}" name="payment_methods" {if ($oAdsConfig->payment_methods == $PAYPAL)} checked {/if}>
                                    <label for="radiopayment4"> Paypal </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Configuration avancée</label>
                            <div class="input-group">
                                <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" class="" id="edit_ads" name="edit_ads" value="1" {if ($oAdsConfig->edit_ads == 1)}checked{/if}>
                                    <label for="edit_ads">Autorise les annonceurs à modifier leur pubs</label>
                                </div>
                                <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" class="" id="payment_after_moderate" name="payment_after_moderate" value="1" {if ($oAdsConfig->payment_after_moderate == 1)}checked{/if}>
                                    <label for="payment_after_moderate">Seulement autorise le paiement après modération du pub</label>
                                </div>
                                <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" class="" id="new_window" name="new_window" value="1" {if ($oAdsConfig->new_window == 1)}checked{/if}>
                                    <label for="new_window">Affiche le pub dans une nouvelle fenêtre</label>
                                </div>
                                <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" class="" id="upload_image" name="upload_image" value="1" {if ($oAdsConfig->upload_image == 1)}checked{/if}>
                                    <label for="upload_image">Autorise les annonceurs à uploader les images sur le serveur</label>
                                </div>
                                <div class="checkbox" style="margin: 0px">
                                    <input type="checkbox" class="" id="security_question" name="security_question" value="1" {if ($oAdsConfig->security_question == 1)}checked{/if}>
                                    <label for="security_question">Les annonceurs doivent répondre à une question de sécurité lors de création / édition d’un pub</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>
                              <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
                            </div>
                        </div>
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
    $('#configform').validate({
        rules: {
            contact_mail: {
                email: true
            }
        },
        messages: {
            contact_mail: {
                email: "Veuillez entrer un email valide"
            }
        }
    });
    
});
</script>
{/literal}