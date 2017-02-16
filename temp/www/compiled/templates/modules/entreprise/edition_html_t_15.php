<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/entreprise/templates/edition.tpl') > 1486643376){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
 require_once('G:\wamp\pagesjaunes_core/plugins/tpl/html/function.jmessage.php');
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jfullurl.php');
function template_meta_b0be1dffbed0e28d5464dabda2c83bf5($t){

}
function template_b0be1dffbed0e28d5464dabda2c83bf5($t){
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editer l'Entreprise <?php echo $t->_vars['oEntreprise']->raisonsociale; ?></h2>        
        <ol class="breadcrumb">
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'dashboard~dashboard:index');?>">Accueil</a>
            </li>
            <li>
                <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:index');?>">Entreprise</a>
            </li>
            <li class="active">
                <a><strong><?php echo $t->_vars['oEntreprise']->raisonsociale; ?></strong></a>
            </li>
        </ol>             
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <form id="edit-form" name="edit-form" action="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:updateEntreprise');?>" method="POST" enctype="multipart/form-data" role="form">
            <input type="hidden" name="entrepriseId" value="<?php echo $t->_vars['oEntreprise']->id; ?>"/>                       
            <div class="col-lg-12">
                <?php jtpl_function_html_jmessage( $t);?>
                <div class="ibox float-e-margins">
                    <div class="ibox-title panel-heading">
                        <h2>INFORMATIONS GENERALES</h2>
                        <div class="ibox-tools">
                            <a class="collapse-link" style="color:#fff">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group r-form">
                                    <label>Raison sociale *</label>
                                    <input id="raisonSociale" name="raisonSociale" type="text" value="<?php echo $t->_vars['oEntreprise']->raisonsociale; ?>" class="form-control" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Description courte activité *</label>
                                    <input id="descActivite" name="descActivite" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->activite; ?>" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Logo :</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <?php if(($t->_vars['oEntreprise']->logo != '')):?>
                                        <div class="fileupload-new thumbnail" style="max-width: 100px;">
                                            <img src="<?php echo $t->_vars['j_basepath']; ?>entreprise/images/<?php echo $t->_vars['oEntreprise']->logo; ?>" alt="" />
                                        </div>
                                        <?php endif;?>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                            <input type="file" class="default" name="logo" id="logo"/>
                                            </span>&nbsp;
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>                                       
                                <div class="form-group">
                                    <label class="control-label">Publié</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie1" value="1" name="radioIsPublie" <?php if(($t->_vars['oEntreprise']->is_publie == '1')):?>checked<?php endif;?> >
                                            <label for="radioIsPublie1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie2" value="0" name="radioIsPublie" <?php if(($t->_vars['oEntreprise']->is_publie == '0')):?>checked<?php endif;?> >
                                            <label for="radioIsPublie2"> non </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioIsPublie3" value="2" name="radioIsPublie" <?php if(($t->_vars['oEntreprise']->is_publie == '2')):?>checked<?php endif;?> >
                                            <label for="radioIsPublie3"> en attente </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Adresse *</label>
                                    <input id="adresse" name="adresse" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->adresse; ?>" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Région</label>
                                    <input id="region" name="region" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->region; ?>">
                                </div>
                                <div class="form-group r-form">
                                    <label>Site web </label>
                                    <input id="siteweb" name="siteweb" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->url_website; ?>">
                                </div>
                                <div class="form-group r-form">
                                    <div>
                                        <label>Catégorie / sous-catégorie *</label>
                                        <select id="souscategorie" name="souscategorie[]" data-placeholder="Selection..." class="souscategorie chosen-select form-control" multiple style="width:100%;" tabindex="4">
                                            <option value=''>Selection...</option>
                                            <?php if((sizeof($t->_vars['oListCategorie'])>0)):?>
                                            <?php foreach($t->_vars['oListCategorie'] as $t->_vars['rowCategorie']):?>
                                            <optgroup label="<?php echo $t->_vars['rowCategorie']['categorie']->name; ?>">
                                                <?php foreach($t->_vars['rowCategorie']['souscategorie'] as $t->_vars['souscategorie']):?> 
                                                <option value='<?php echo $t->_vars['souscategorie']->id; ?>'><?php echo $t->_vars['souscategorie']->name; ?> </option>
                                                <?php endforeach;?>
                                            </optgroup>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label>Personne à contacter </label>
                                    <input id="personneContact" name="personneContact" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->contact_interne; ?>" required>
                                </div>
                                <div class="form-group r-form">
                                    <label>Fonction personne à contacter </label>
                                    <input id="fonctionPersonneContact" name="fonctionPersonneContact" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->fonction_contact; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Contacts e-mails *</label>
                                    <div class="r-multi-text" id="email-list-form">
                                        <div id="email-form-input">
                                            <div id="email-add-form" class="input-group">
                                                <input type="email" id="email-input" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <span class="input-group-btn"> 
                                                        <button type="button" id="btn-add-email" data-entreprise-id="<?php echo $t->_vars['oEntreprise']->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="emailList">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>email</th>
                                                    <th width="70px"></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($t->_vars['oEntreprise']->emails as $t->_vars['email']):?>
                                                    <tr class="rMultiItem">
                                                        <td class="value">
                                                            <input type="hidden" class="emails" name="email_list[]" value="<?php echo $t->_vars['email']->id; ?>">
                                                            <?php echo $t->_vars['email']->email; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#email-form-input" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateEmailForm', array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'emailId'=>$t->_vars['email']->id));?>"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs" onclick="deleteEmail(this);" data-remote-target="#emailList" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateEmails',array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete', 'emailId'=>$t->_vars['email']->id));?>" href="#"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Numéros téléphones *</label>
                                    <div class="r-multi-text" id="num-list-form">
                                        <div id="num-form-input">
                                            <div id="num-add-form" class="input-group">
                                                <input type="text" id="num-input" class="input-text form-control"> 
                                                <span class="input-group-btn">
                                                <input type="hidden" name="new-tel" value=""/>
                                                    <button type="button" id="btn-add-num" data-entreprise-id="<?php echo $t->_vars['oEntreprise']->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive"  id="telephoneList">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>Telephone</th>
                                                    <th width="100px"></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($t->_vars['oEntreprise']->telephones as $t->_vars['telephone']):?>
                                                    <tr class="rMultiItem">
                                                        <td class="value">
                                                            <input type="hidden" class="telephones" name="telephones_list[]" value="<?php echo $t->_vars['telephone']->id; ?>">
                                                            <?php echo $t->_vars['telephone']->numero; ?>
                                                        </td>
                                                        <td class="text-right">                                                            
                                                            <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#num-form-input" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateTelephoneForm', array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'telephoneId'=>$t->_vars['telephone']->id));?>"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs" onclick="deleteTelephone(this);" data-remote-target="#telephoneList" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateTelephones',array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete', 'telephoneId'=>$t->_vars['telephone']->id));?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Mots clés / tags *</label>
                                    <p>Les mots clés sont séparés de comma ou virgule (,)</p>
                                    <input type="hidden" name="id" value="">
                                    <textarea required id="motscles" class="form-control" name="motscles" id="motscles" style="min-height:150px"><?php echo $t->_vars['oEntreprise']->getMotsCles(); ?></textarea>
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Front-office
                                    </div>
                                    <div class="panel-body">                
                                        <div class="form-group">
                                            <label class="control-label">Editer information</label>
                                            <div class="input-group">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioEdit1" value="1" name="radioEdit" <?php if(($t->_vars['oEntreprise']->editer_front_active == '1')):?>checked<?php endif;?>>
                                                    <label for="radioEdit1"> oui </label>
                                                </div>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioEdit2" value="0" name="radioEdit" <?php if(($t->_vars['oEntreprise']->editer_front_active == '0')):?>checked<?php endif;?> >
                                                    <label for="radioEdit2"> non </label>
                                                </div>
                                            </div>
                                        </div>.
                                        <div class="form-group r-form">
                                            <label>Login </label>
                                            <input id="loginEntreprise" name="loginEntreprise" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->login; ?>">
                                        </div>
                                        <div class="form-group r-form">
                                            <label>Mot de passe </label>
                                            <input id="pwdEntreprise" name="pwdEntreprise" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->clear_password; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-success btn-save btn-outline">
                                    <span class="visible-lg hidden-sm hidden-xs">
                                        <?php echo jLocale::get('entreprise~entreprise.enregistrer.les.informations.generales'); ?>
                                    </span>
                                    <span class="hidden-lg visible-sm visible-xs">
                                        <?php echo jLocale::get('common~common.enregistrer'); ?>
                                    </span>
                                </button> 
                                <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:index');?>" class="btn btn-white" id="btn-cancel"><?php echo jLocale::get('common~common.annuler'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>INFORMATIONS COMPLEMENTAIRES</h2>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Liste des services</label>
                                    <div class="r-multi-text" id="service-list-form">
                                        <div id="service-form-input">
                                            <div id="service-add-form" class="input-group">
                                                <input type="text" id="service-input" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" id="btn-add-service" data-entreprise-id="<?php echo $t->_vars['oEntreprise']->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="serviceList">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>Services</th>
                                                    <th width="70px"></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($t->_vars['oEntreprise']->services as $t->_vars['service']):?>
                                                    <tr class="rMultiItem">
                                                        <td class="value">
                                                            <input type="hidden" class="services" name="service_list[]" value="<?php echo $t->_vars['service']->id; ?>">
                                                            <?php echo $t->_vars['service']->name; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#service-form-input" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateServiceForm', array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'serviceId'=>$t->_vars['service']->id));?>"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs" onclick="deleteService(this);" data-remote-target="#serviceList" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateServices',array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete', 'serviceId'=>$t->_vars['service']->id));?>"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Liste des produits</label>
                                    <div class="r-multi-text" id="produit-list-form">
                                        <div id="produit-form-input">
                                            <div id="produit-add-form" class="input-group">
                                                <input type="text" id="produit-input" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" id="btn-add-produit" data-entreprise-id="<?php echo $t->_vars['oEntreprise']->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="produitList">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>Produits</th>
                                                    <th width="70px"></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($t->_vars['oEntreprise']->produits as $t->_vars['produit']):?>
                                                    <tr class="rMultiItem">
                                                        <td class="value">
                                                            <input type="hidden" class="produits" name="produit_list[]" value="<?php echo $t->_vars['produit']->id; ?>">
                                                            <?php echo $t->_vars['produit']->name; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#produit-form-input" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateProduitForm', array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'produitId'=>$t->_vars['produit']->id));?>"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs" onclick="deleteProduit(this);" data-remote-target="#produitList" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateProduits',array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete', 'produitId'=>$t->_vars['produit']->id));?>" ><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group r-select-with-delete r-form">
                                    <label>Liste des marques</label>
                                    <div class="r-multi-text" id="marque-list-form">
                                        <div id="marque-form-input">
                                            <div id="marque-add-form" class="input-group">
                                                <input type="text" id="marque-input" class="input-text form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button type="button" id="btn-add-marque" data-entreprise-id="<?php echo $t->_vars['oEntreprise']->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="marqueList">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>Marques</th>
                                                    <th width="70px"></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($t->_vars['oEntreprise']->marques as $t->_vars['marque']):?>
                                                    <tr class="rMultiItem">
                                                        <td class="value">
                                                            <input type="hidden" class="marques" name="marque_list[]" value="<?php echo $t->_vars['marque']->id; ?>">
                                                            <?php echo $t->_vars['marque']->name; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#marque-form-input" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateMarqueForm', array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'marqueId'=>$t->_vars['marque']->id));?>"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs" onclick="deleteMarque(this);" data-remote-target="#marqueList" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateMarques',array('entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete', 'marqueId'=>$t->_vars['marque']->id));?>" ><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Google map</h2>
                        <div class="row">
                            <div class="col-lg-6 r-form">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input id="googleMapLatitude" name="googleMapLatitude" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->latitude; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input id="googleMapLongitude" name="googleMapLongitude" type="text" class="form-control" value="<?php echo $t->_vars['oEntreprise']->longitude; ?>">
                                </div>
                                <button type="button" class="btn btn-success" id="BtlatLngFind">Voir sur la carte</button>
                                <button type="button" class="btn btn-white" id="BtlatLngReset">Réinitialiser</button>
                                <div class="text-right">
                                    <div>latitude: <span id="mapLatitude"></span></div>
                                    <div>longitude: <span id="mapLongitude"></span></div>
                                    <button type="button" class="btn btn-info btn-xs m-t" id="BtlatLngChange">Récupérer</button>
                                </div>
                            </div> 
                            <div class="col-lg-6">
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGufa7f5AmTVVgdiEiwWclJzry3CYKw_k"></script>
                                <div class="google-map" id="map1"></div>
                            </div>
                        </div>                    
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-success btn-save btn-outline">
                                    <span class="visible-lg hidden-sm hidden-xs">
                                        <?php echo jLocale::get('entreprise~entreprise.enregistrer.les.informations.complementaires'); ?>
                                    </span>
                                    <span class="hidden-lg visible-sm visible-xs">
                                        <?php echo jLocale::get('common~common.enregistrer'); ?>
                                    </span>
                                </button>
                                <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:index');?>" class="btn btn-white" id="btn-cancel"><?php echo jLocale::get('common~common.annuler'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>INFORMATIONS PAYANTES</h2>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Activation visuel de présentation</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioVisuelPres1" value="1" name="radioVisuelPres" <?php if(($t->_vars['oEntreprise']->video_presentation_active == '1')):?>checked<?php endif;?>>
                                            <label for="radioVisuelPres1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioVisuelPres2" value="0" name="radioVisuelPres" <?php if(($t->_vars['oEntreprise']->video_presentation_active == '0')):?>checked<?php endif;?>>
                                            <label for="radioVisuelPres2"> non </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label">video mp4 :</label>
                                    <div class="controls">
                                        <input type="hidden" id="videopresentationUrl" name="videopresentationUrl"/>
                                        <div class="r-fileupload r-fileupload-new">
                                            <div class="r-fileupload-preview"></div>
                                            <span class="btn btn-white btn-file">
                                                <span class="r-fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="r-fileupload-exists col-md-6"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" accept="video/mp4" id="inputvideopresentation" class="default" name="fileupload"/>
                                            </span>
                                            <span class="btn btn-white btn-file btn-file-upload r-fileupload-exists">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="videopresentationplayer">
                                    <?php if(($t->_vars['oEntreprise']->video_presentation == '')):?>
                                    <div class="alert alert-info">Upload video</div>
                                    <?php else:?>
                                    <video controls style="width:100%" src="<?php echo $t->_vars['j_basepath']; ?>entreprise/videos/<?php echo $t->_vars['oEntreprise']->video_presentation; ?>"></video>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-lg-6">                                        
                                <div class="form-group">
                                    <label class="control-label">Activation rubrique nos services</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioNosServices1" value="1" name="radioNosServices" <?php if(($t->_vars['oEntreprise']->nos_services_active == '1')):?>checked<?php endif;?>>
                                            <label for="radioNosServices1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioNosServices2" value="0" name="radioNosServices" <?php if(($t->_vars['oEntreprise']->nos_services_active == '0')):?>checked<?php endif;?>>
                                            <label for="radioNosServices2"> non </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <textarea class="form-control ckeditor" name="nosServices"><?php echo $t->_vars['oEntreprise']->nos_services; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Activation rubrique Qui sommes nous</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioQuiSomNs1" value="1" name="radioQuiSomNs" <?php if(($t->_vars['oEntreprise']->qui_sommes_nous_active == '1')):?>checked<?php endif;?>>
                                            <label for="radioQuiSomNs1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioQuiSomNs2" value="0" name="radioQuiSomNs" <?php if(($t->_vars['oEntreprise']->qui_sommes_nous_active == '0')):?>checked<?php endif;?>>
                                            <label for="radioQuiSomNs2"> non </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <textarea class="form-control ckeditor" name="quiSommesNous"><?php echo $t->_vars['oEntreprise']->qui_sommes_nous; ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Activation rubrique nos références</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioNosRef1" value="1" name="radioNosRef" <?php if(($t->_vars['oEntreprise']->nos_references_active == '1')):?>checked<?php endif;?>>
                                            <label for="radioNosRef1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioNosRef2" value="0" name="radioNosRef" <?php if(($t->_vars['oEntreprise']->nos_references_active == '0')):?>checked<?php endif;?>>
                                            <label for="radioNosRef2"> non </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <textarea class="form-control ckeditor" name="nosRef"><?php echo $t->_vars['oEntreprise']->nos_references; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-success btn-save btn-outline">
                                    <span class="visible-lg hidden-sm hidden-xs">
                                        <?php echo jLocale::get('entreprise~entreprise.enregistrer.les.informations.payantes'); ?>
                                    </span>
                                    <span class="hidden-lg visible-sm visible-xs">
                                        <?php echo jLocale::get('common~common.enregistrer'); ?>
                                    </span>
                                </button> 
                                <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:index');?>" class="btn btn-white" id="btn-cancel"><?php echo jLocale::get('common~common.annuler'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>VIDEOS ET GALLERY PAYANTS</h2>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-6 rubrique" id="rubrique-videos">
                                    <div class="form-group">
                                        <label class="control-label">Activation rubrique "videos" *</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="radioActivVideo1" value="1" name="radioActivVideo" <?php if(($t->_vars['oEntreprise']->videos_active == '1')):?>checked<?php endif;?>>
                                                <label for="radioActivVideo1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="radioActivVideo2" value="0" name="radioActivVideo" <?php if(($t->_vars['oEntreprise']->videos_active == '0')):?>checked<?php endif;?>>
                                                <label for="radioActivVideo2"> non </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div id="videos-form" class="r-form">
                                        <div class="form-group" id="urlyoutube">
                                            <label class="control-label">Url youtube :</label>
                                            <input type="text" id="url-video-youtube" name="url-video-youtube" class="form-control" value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Vignette youtube:</label>
                                            <div class="fileupload fileupload-new videoUpload" data-provides="fileupload">
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                        <span class="fileupload-exists">Changer</span>
                                                        <input type="file" class="default" accept="image/*" id="vignette-video-youtube" name="vignette-video-youtube"/>
                                                    </span>&nbsp;
                                                    <span class="fileupload-exists btn-file btn btn-primary" onclick="addVideoYoutube()" id="bt-add-video-youtube">Ajouter</span> 
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i></a>
                                                </div> 
                                            </div> 
                                        </div>                                
                                    </div>
                                    <div class="col-lg-12" style="padding: 0px 0px" id="video-youtube-list">                                        
                                        <table class="table-profil table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Url youtube</th>
                                                    <th>Vignette </th>
                                                    <th>Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody id="video-youtube-list">
                                                <?php if((sizeof ($t->_vars['oEntreprise']->videos_youtube) > 0)):?>
                                                <?php foreach($t->_vars['oEntreprise']->videos_youtube as $t->_vars['videos']):?>
                                                <tr class="video-item">
                                                    <input type="hidden" name="youtube-video[]" value="<?php echo $t->_vars['videos']->id; ?>"/>
                                                    <td style="max-width: 200px"><?php echo $t->_vars['videos']->url_youtube; ?></td>
                                                    <td><img class="tab-img-thumbnail" src="<?php echo $t->_vars['j_basepath']; ?>entreprise/vignetteYoutube/<?php echo $t->_vars['videos']->vignette_video; ?>"></td>
                                                    <td>                 
                                                        <a onclick="return setRemote(this);" data-remote-target="#videos-form" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateVideosForm', array('id'=>$t->_vars['videos']->id));?>" class="btn btn-success btn-xs btn-block btn-edit-videos">
                                                            Editer
                                                        </a>                
                                                        <a onclick="return setRemote(this);" data-remote-target="#video-youtube-list" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateVignetteYoutube', array('id'=>$t->_vars['videos']->id, 'entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete'));?>" class="btn btn-danger btn-xs btn-block">
                                                            Supprimer
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                                <?php else:?>
                                                <tr><td colspan="3">Aucune vidéo</td></tr>
                                                <?php endif;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-6 rubrique" id="rubrique-image">                                        
                                    <div class="form-group">
                                        <label class="control-label">Activation rubrique galérie image *</label>
                                        <div class="input-group">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="radioGalerieImage1" value="1" name="radioGalerieImage" <?php if(($t->_vars['oEntreprise']->galerie_image_active == '1')):?>checked<?php endif;?>>
                                                <label for="radioGalerieImage1"> oui </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="radioGalerieImage2" value="0" name="radioGalerieImage" <?php if(($t->_vars['oEntreprise']->galerie_image_active == '0')):?>checked<?php endif;?>>
                                                <label for="radioGalerieImage2"> non </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="galerie-image-form">
                                        <label class="control-label">Image:</label>
                                        <div class="fileupload fileupload-new imageUpload" data-provides="fileupload">
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                    <span class="fileupload-exists">Changer</span>
                                                    <input type="file" class="default" id="galerie-image" accept="image/*" name="galerie-image"/>
                                                </span>&nbsp;
                                                <span onclick="addGalerieImage();" class="fileupload-exists btn-file btn btn-primary" id="bt-add-image">Ajouter</span> 
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i></a>
                                            </div> 
                                        </div>                                      
                                    </div>
                                    <div id="galerie-image-list">
                                        <div class="lightBoxGallery col-lg-12">
                                            <?php if(sizeof($t->_vars['oEntreprise']->galerie_image)>0):?>
                                            <?php foreach($t->_vars['oEntreprise']->galerie_image as $t->_vars['oGalerieImage']):?>   
                                            <div class="item col-md-3">
                                                <a href="<?php echo $t->_vars['j_basepath']; ?><?php echo $t->_vars['PHOTOS_FOLDER']; ?>/<?php echo $t->_vars['PHOTOS_BIG_FOLDER']; ?>/<?php echo $t->_vars['oGalerieImage']->image; ?>" title="<?php echo $t->_vars['oGalerieImage']->image; ?>" data-gallery=""><img src="<?php echo $t->_vars['j_basepath']; ?><?php echo $t->_vars['PHOTOS_FOLDER']; ?>/<?php echo $t->_vars['PHOTOS_THUMBNAIL_FOLDER']; ?>/<?php echo $t->_vars['oGalerieImage']->image; ?>"></a>
                                                <a onclick="return setRemote(this);" data-remote-target="#galerie-image-list" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateGalerieImage', array('id'=>$t->_vars['oGalerieImage']->id, 'entrepriseId'=>$t->_vars['oEntreprise']->id, 'operation'=>'delete'));?>" class="btn-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                            </div>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 hr-line-dashed"></div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="button" class="btn btn-success btn-save btn-outline">
                                            <span class="visible-lg hidden-sm hidden-xs">
                                                <?php echo jLocale::get('entreprise~entreprise.enregistrer.les.videos.et.la.galerie.payants'); ?>
                                            </span>
                                            <span class="hidden-lg visible-sm visible-xs">
                                                <?php echo jLocale::get('common~common.enregistrer'); ?>
                                            </span>
                                        </button> 
                                        <a href="<?php jtpl_function_html_jurl( $t,'entreprise~entreprise:index');?>" class="btn btn-white" id="btn-cancel"><?php echo jLocale::get('common~common.annuler'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2>NOTRE CATALOGUE</h2>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-5 r-form" id="catalogue-form">
                                <div class="form-group">
                                    <label>Référence produit *</label>
                                    <input id="refProduit" name="refProduit" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nom produit *</label>
                                    <input id="nomProduit" name="nomProduit" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image produit *:</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                            <input type="file" class="default" id="img_produit" name="img_produit"/>
                                            </span>&nbsp;
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description produit *</label>
                                    <textarea id="descProduit" name="descProduit" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Marque produit *</label>
                                    <input id="marqueProduit" name="marqueProduit" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Prix produit *</label>
                                    <div class="input-group">
                                        <input id="prixProduit" name="prixProduit" type="text" class="form-control">
                                        <span class="input-group-addon">Ar</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Publié</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioCatalogueIsPublie1" value="1" name="radioCatalogueIsPublie">
                                            <label for="radioCatalogueIsPublie1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioCatalogueIsPublie2" value="0" name="radioCatalogueIsPublie" checked >
                                            <label for="radioCatalogueIsPublie2"> non </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="addCatalogue()" class="catalogue-save-add btn btn-success btn-outline">
                                        <span class="visible-lg hidden-sm hidden-xs">
                                            <?php echo jLocale::get('entreprise~entreprise.enregistrer.la.catalogue'); ?>
                                        </span>
                                        <span class="hidden-lg visible-sm visible-xs">
                                            <?php echo jLocale::get('common~common.enregistrer'); ?>
                                        </span>
                                    </button>
                                    <button type="button" onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getAddCatalogueForm');?>" class="catalogue-clear-add-form btn btn-default btn-outline"><?php echo jLocale::get('common~common.annuler'); ?></button>
                                </div>
                            </div>
                            <div class="col-lg-7">

                                <div class="form-group">
                                    <label class="control-label">Activation "Nos catalogue" *</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioActivCatalogue1" value="1" name="radioActivCatalogue" <?php if(($t->_vars['oEntreprise']->catalogue_active == '1')):?>checked<?php endif;?>>
                                            <label for="radioActivCatalogue1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioActivCatalogue2" value="0" name="radioActivCatalogue" <?php if(($t->_vars['oEntreprise']->catalogue_active == '0')):?>checked<?php endif;?>>
                                            <label for="radioActivCatalogue2"> non </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row m-b-5">
                                    <div class="col-lg-9 form-horizontal">
                                        <div class="row">
                                            <label class="control-label col-lg-2  text-left">Filtre:</label>
                                            <div class="input-group col-lg-8">
                                                <input type="text" placeholder="Filtre" id="produit-filter" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-right">
                                        <a onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getAddCatalogueForm');?>" class="btn btn-primary">
                                            Ajouter
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive" id="catalogue-list">
                                    <table class="table-profil table footable" data-page-size="6" data-filter="#produit-filter">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Référence </th>
                                                <th>Nom </th>
                                                <th>Image </th>
                                                <th>Prix </th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($t->_vars['oCatalogueList'] as $t->_vars['oCatalogue']):?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="catalogueGroup[]" value="<?php echo $t->_vars['oCatalogue']->id; ?>">
                                                </td>
                                                <td><?php echo $t->_vars['oCatalogue']->reference_produit; ?></td>
                                                <td><?php echo $t->_vars['oCatalogue']->nom_produit; ?></td>
                                                <td><img class="thumbnail" style="max-height: 50px; height: 50px" src="<?php echo $t->_vars['j_basepath']; ?>entreprise/produits/thumbnail/<?php echo $t->_vars['oCatalogue']->image_produit; ?>" alt="" /></td>
                                                <td><?php echo $t->_vars['oCatalogue']->prix_produit; ?></td>
                                                <td>  
                                                    <a onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:getUpdateCatalogueForm', array('id'=>$t->_vars['oCatalogue']->id));?>">
                                                        <button type="button" class="btn btn-success btn-xs">Editer</button>
                                                    </a>
                                                    <a onclick="return setRemote(this);" data-remote-target="#catalogue-list" data-load-remote="<?php jtpl_function_html_jfullurl( $t,'entreprise~entreprise:updateCatalogueProduit', array('id'=>$t->_vars['oCatalogue']->id, 'operation'=>'delete'));?>">
                                                        <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <ul class="pagination pull-right"></ul>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <select class="form-control m-b" name="catalogueAction">
                                                <option value="0">Action groupées :</option>
                                                <option value="delete">Supprimer</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" onclick="catalogueActionGroup()" class="btn btn-white"> Appliquer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<?php echo $t->_vars['SCRIPT']; ?>

<script>
$(document).ready(function(){
    $("#sortable-catalogue").sortable();
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $('#btn-add-email').click(function(){
        var emailText = $('#email-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        if (isValidEmailAddress(emailText))
        {
            $.post('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateEmails");?>', {'emailText':emailText, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
                $('#emailList').html(data);
                });
        }
    });    
    $('#btn-add-num').click(function(){
        var numero = $('#num-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateTelephones");?>', {'numero':numero, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#telephoneList').html(data);
            });
    });
    $('#btn-add-service').click(function(){
        var name = $('#service-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateServices");?>', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#serviceList').html(data);
            });
    });
    $('#btn-add-produit').click(function(){
        var name = $('#produit-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateProduits");?>', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#produitList').html(data);
            });
    });
    $('#btn-add-marque').click(function(){
        var name = $('#marque-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateMarques");?>', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#marqueList').html(data);
            });
    });

    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    };
    $('.btn-save').click(function()
    {
        var entrepriseId = $('input[name="entrepriseId"]').val();
        //info generale
        var raisonSociale = $('#raisonSociale').val();
        var descActivite = $('#descActivite').val();
        var logo = $('#logo')[0].files[0];
        var adresse = $('#adresse').val();
        var siteweb = $('#siteweb').val();
        var souscategorie = $('#souscategorie').val();
        var personnecontact = $('#personneContact').val();
        var fonctionPersonneContact = $('#fonctionPersonneContact').val();        
        var motscles = $('#motscles').val();
        //info complementaire
        var googleMapNom = $('#googleMapNom').val();
        var googleMapAdresse = $('#googleMapAdresse').val();
        var googleMapLatitude = $('#googleMapLatitude').val();
        var googleMapLongitude = $('#googleMapLongitude').val();
        //info payante
        var radioVisuelPres = $('input[name="radioVisuelPres"]:checked').val();
        var radioNosServices = $('input[name="radioNosServices"]:checked').val();
        var nosServices = $('#nosServices').val();
        var radioQuiSomNs = $('input[name="radioQuiSomNs"]:checked').val();
        var quiSommesNous = $('#quiSommesNous').val();
        var radioNosRef = $('input[name="radioNosRef    "]:checked').val();;
        var nosRef = $('#nosRef').val();
        //video et galerie payant

        $('#edit-form').submit();

    });
    
    $('.r-fileupload').RFileUploader();
    $('.r-fileupload').find('.btn-file-upload').click(function()
    {
        var file = $('#inputvideopresentation')[0].files[0];
        var formdata = new FormData();
        formdata.append("videosfile", file);
        $.ajax({
            type: 'POST',
            url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:uploadVideo");?>',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              $('#videopresentationplayer').html('<video controls style="width:100%" src="<?php echo $t->_vars['j_basepath']; ?>entreprise/videos/'+data+'"></video>');
              $('#videopresentationUrl').val(data);
            },
            error: function() {
              $('#videopresentationplayer').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); }   // tell jQuery not to set contentType
        });
    });

    $('.footable').footable();
    CKEDITOR.replace( 'nosServices');
    
    CKEDITOR.replace( 'quiSommesNous');
    CKEDITOR.replace( 'nosRef');
    var souscategoriesJSON = <?php echo $t->_vars['souscategoriesJSON']; ?>;
    $("#souscategorie option").each(function(){
        for (i=0; i<souscategoriesJSON.length; i++)
        {
            if ($(this).val() == souscategoriesJSON[i].id)
            {
                $(this).attr('selected', 'selected');
            }
        }
    });

    var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Aucun resultat'},
            '.chosen-select-width'     : {width:"95%"}
            }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
});
function addCatalogue()
{
    var img_produit = $('#img_produit')[0].files[0];
    var entrepriseId = $('input[name="entrepriseId"]').val();
    var refProduit = $('#refProduit').val();
    var nomProduit = $('#nomProduit').val();
    var descProduit = $('#descProduit').val();
    var marqueProduit = $('#marqueProduit').val();
    var prixProduit = $('#prixProduit').val();
    var radioCatalogueIsPublie = $('input[name="radioCatalogueIsPublie"]:checked').val();
    if((refProduit != '') && (nomProduit != '') && (descProduit != '') && (marqueProduit != '') && (prixProduit != ''))
    {
        var formdata = new FormData();
        formdata.append("img_produit",img_produit);
        formdata.append("entrepriseId",entrepriseId);
        formdata.append("refProduit",refProduit);
        formdata.append("nomProduit",nomProduit);
        formdata.append("descProduit",descProduit);
        formdata.append("marqueProduit",marqueProduit);
        formdata.append("prixProduit",prixProduit);
        formdata.append("radioCatalogueIsPublie",radioCatalogueIsPublie);
        formdata.append("operation","insert");
        $.ajax({
            type: 'POST',
            url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateCatalogueProduit");?>',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              $('#catalogue-list').html(data);
              $('#catalogue-form').load('getAddCatalogueForm');
            },
            error: function() {
              $('#catalogue-list').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); }   // tell jQuery not to set contentType
        });
    }
}

function updateCatalogue()
{
    var id_produit = $('#catalogueId').val();
    var img_produit = $('#img_produit')[0].files[0];
    var entrepriseId = $('input[name="entrepriseId"]').val();
    var refProduit = $('#refProduit').val();
    var nomProduit = $('#nomProduit').val();
    var descProduit = $('#descProduit').val();
    var marqueProduit = $('#marqueProduit').val();
    var prixProduit = $('#prixProduit').val();
    var radioCatalogueIsPublie = $('input[name="radioCatalogueIsPublie"]:checked').val();
    if((refProduit != '') && (nomProduit != '') && (descProduit != '') && (marqueProduit != '') && (prixProduit != ''))
    {
        var formdata = new FormData();
        formdata.append("id_produit",id_produit);
        formdata.append("img_produit",img_produit);
        formdata.append("entrepriseId",entrepriseId);
        formdata.append("refProduit",refProduit);
        formdata.append("nomProduit",nomProduit);
        formdata.append("descProduit",descProduit);
        formdata.append("marqueProduit",marqueProduit);
        formdata.append("prixProduit",prixProduit);
        formdata.append("radioCatalogueIsPublie",radioCatalogueIsPublie);
        formdata.append("operation","update");
        $.ajax({
            type: 'POST',
            url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateCatalogueProduit");?>',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              $('#catalogue-list').html(data);
              $('#catalogue-form').load('getAddCatalogueForm');
            },
            error: function() {
              $('#catalogue-list').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); }   // tell jQuery not to set contentType
        });
    }
}

function catalogueActionGroup()
{
    if ($('input[name="catalogueGroup[]"]:checked').length > 0)
    {
        if ($('select[name="catalogueAction"]').val() == 'delete')
        {
            var catalogueGroup = [];
                       
            var entrepriseId = $('input[name="entrepriseId"]').val();
            var formdata = new FormData();
            i = 0; 
            $('input[name="catalogueGroup[]"]:checked').each(function()
            {
                formdata.append("catalogueGroup[]",$(this).val());
            }); 
            formdata.append("entrepriseId",entrepriseId);
            formdata.append("operation","deleteGroup");
            $.ajax({
                type: 'POST',
                url: '<?php jtpl_function_html_jfullurl( $t,"entreprise~entreprise:updateCatalogueProduit");?>',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#catalogue-list').html(data);
                  $('#catalogue-form').load('getAddCatalogueForm');
                },
                error: function() {
                  $('#catalogue-list').html('<div class="alert alert-warning>La requête n\'a pas abouti</div>'); }   // tell jQuery not to set contentType
            });
        }
    }
}
</script>
<script type="text/javascript">
function addVideoYoutube()
{
    var urlVideo = $('#url-video-youtube').val();
    var vignetteVideo = $('#vignette-video-youtube')[0].files[0];
    var entrepriseId = $('input[name="entrepriseId"]').val();
    if (urlVideo != '' && vignetteVideo != '')
    {
    
        var formdata = new FormData();
        var img;
        formdata.append("videosfile", vignetteVideo);
        formdata.append("urlVideo", urlVideo);
        formdata.append("entrepriseId", entrepriseId);
        formdata.append("operation", "insert");
        $.ajax({
            type: 'POST',
            url: 'updateVignetteYoutube',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              img = data; 
              $('#video-youtube-list').html(data);
              resetVideosForm();
            },
            error: function() {
               
            }   // tell jQuery not to set contentType
        });
    }
}
function updateVideoYoutube()
{
    var videoId = $('#videos-youtube-id').val();
    var urlVideo = $('#url-video-youtube').val();
    var vignetteVideo = $('#vignette-video-youtube')[0].files[0];
    var entrepriseId = $('input[name="entrepriseId"]').val();
    if (urlVideo != '' && vignetteVideo != '')
    {

        var formdata = new FormData();
        var img;
        formdata.append("videosfile", vignetteVideo);
        formdata.append("videoId", videoId);
        formdata.append("urlVideo", urlVideo);
        formdata.append("entrepriseId", entrepriseId);
        formdata.append("operation", "update");
        $.ajax({
            type: 'POST',
            url: 'updateVignetteYoutube',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
              img = data; 
              $('#video-youtube-list').html(data);
              resetVideosForm();
            },
            error: function() {
               
            }   // tell jQuery not to set contentType
        });
    }
}
function resetVideosForm()
{
  $('#videos-form').load('getAddVideosForm');
}
function deleteEmail(el)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer l'email ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            if ($('#emailList .rMultiItem').length > 1)
            {
                res = setRemote(el);                
                swal("Supprimé!", "L'email a été supprimée", "success");   
            }
            else
            {
                swal("Echecs", "il faut au moins un email", "warning");   
            }
        });
}
function deleteTelephone(el)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer le numéro ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            if ($('#telephoneList .rMultiItem').length > 1)
            {
                res = setRemote(el);                
                swal("Supprimé!", "Le numéro a été supprimée", "success");   
            }
            else
            {
                swal("Echecs", "il faut au moins un numéro", "warning");   
            }
        });
}

function deleteService(el)
{
   swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer le service ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            es = setRemote(el);                
            swal("Supprimé!", "Le service a été supprimée", "success"); 
        }); 
}
function deleteProduit(el)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer le produit ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            es = setRemote(el);                
            swal("Supprimé!", "Le produit a été supprimée", "success"); 
        }); 
}
function deleteMarque(el)
{
    swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer la marque ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            es = setRemote(el);                
            swal("Supprimé!", "La marque a été supprimée", "success"); 
        }); 
}
function addGalerieImage()
{
    var galerie_image_file = $('#galerie-image')[0].files[0];

    if (galerie_image_file != '')
    {
        var entrepriseId = $('input[name="entrepriseId"]').val();
        var formdata = new FormData();
        var img;
        formdata.append("imagefile", galerie_image_file);
        formdata.append("entrepriseId", entrepriseId);
        formdata.append("operation", "insert");
        $.ajax({
            type: 'POST',
            url: 'updateGalerieImage',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {                  
               $('#galerie-image-list').html(data);
               $('#galerie-image').val(''); 
               $('.tr-delete').click(function()
                {
                    $(this).parents('.image-item').remove();
                });
               $('.imageUpload').fileupload('reset');
            },
            error: function() {
              img = data; }   // tell jQuery not to set contentType
        });
    }
}
</script>
<script type="text/javascript">
    
    var latitude = "<?php echo $t->_vars['oEntreprise']->latitude; ?>";
    var longitude = "<?php echo $t->_vars['oEntreprise']->longitude; ?>";

    if (typeof google != "undefined") {
        google.maps.event.addDomListener(window, 'load', initMap(latitude,longitude));
        var map1;
        function initMap(latitude, longitude) {
            var myLatLng;
            if (latitude != "" && longitude !="")
            {
                myLatLng = new google.maps.LatLng(latitude, longitude);
                $('#mapLatitude').text(latitude);
                $('#mapLongitude').text(longitude);
                $('#googleMapLatitude').val(latitude);
                $('#googleMapLongitude').val(longitude);
            }
            else
            {
                myLatLng = new google.maps.LatLng(-18.91875024787322, 47.52159833908081);
                $('#mapLatitude').text(-18.91875024787322);
                $('#mapLongitude').text(47.52159833908081);
            }
            map1 = new google.maps.Map(document.getElementById('map1'), {
                zoom: 17,
                center: myLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map1,
                icon: "<?php echo $t->_vars['j_basepath']; ?>adminlibraries/img/map-pin.png"
            });

            google.maps.event.addListener(map1, "click", function(event) {
                //var latLng = map1.getCenter();
                // get lat/lon of click
                $('#mapLatitude').text(event.latLng.lat());
                $('#mapLongitude').text(event.latLng.lng());
                marker.setPosition(event.latLng);
            });
        }

        $("#BtlatLngChange").click(function(){
            $('#googleMapLatitude').val($('#mapLatitude').text());
            $('#googleMapLongitude').val($('#mapLongitude').text());
        });
        $("#BtlatLngReset").click(function(){
            initMap(latitude, longitude);
            $('#googleMapLatitude').val(latitude);
            $('#googleMapLongitude').val(longitude);
        });
        $("#BtlatLngFind").click(function(){
            initMap($('#googleMapLatitude').val(), $('#googleMapLongitude').val());
        });
    }
</script>

<?php 
}
return true;}
