<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Catégories / Sous-catégories</h2>
        
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>catégories & sous-catégories</strong></a>
            </li>
        </ol>

    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
                      
    {jmessage}
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste des catégories / sous catégories</h5>
                </div>
                <div class="ibox-content">
                    {ifacl2 "categorie.create"}
                    <a class="btn btn-success categorie-link" href="{jfullurl 'categorie~categorie:index'}"> Ajouter&nbsp;<i class="fa fa-plus"></i></a>
                    {/ifacl2}
                    {ifacl2 "categorie.list"}
                    <div class="categ-tree" id="categorie-list">
                        {if (sizeof($oList)>0)}
                        <ol class="categ-tree-list" >
                            {foreach ($oList as $row)}
                            <li class="categ-tree-item">
                                <div class="categ-tree-handle">
                                    <img src="{$j_basepath}icones/{$row['categorie']->vignette}" style="width:25px; height:25px; border: 5px solid #fff;"/>
                                    <a {ifacl2 "categorie.update"} href="{jfullurl 'categorie~categorie:edition',array('categorieid'=>$row['categorie']->id)}" class="categorie-link"{/ifacl2} > {$row['categorie']->name} </a>
                                    {if (sizeof ($row['souscategorie'])>0)}
                                    <a data-toggle="collapse" href="#categorie{$row['categorie']->id}" class="pull-right bt-collapse" aria-expanded="false" aria-controls="categorie{$row['categorie']->id}"><i class="fa fa-caret-down"></i></a>
                                    {/if}
                                </div>
                                {if (sizeof ($row['souscategorie'])>0)}
                                <div class="collapse collapse-cible" id="categorie{$row['categorie']->id}">
                                    <ol class="categ-tree-list">
                                        {foreach ($row['souscategorie'] as $souscategorie)} 
                                        <li class="categ-tree-item">
                                            <div class="categ-tree-handle sous-categorie">
                                                <a {ifacl2 "categorie.update"} href="{jfullurl 'categorie~categorie:edition',array('souscategorieid'=>$souscategorie->id)}"  class="categorie-link"{/ifacl2}>{$souscategorie->name} 
                                                </a>
                                                {ifacl2 "keywords.update"}
                                                <a href="{jurl 'categorie~motscles:index',array('souscategorieId'=>$souscategorie->id)}" class="lien-mots-cles hide">| <small>mots clés</small></a>
                                                {/ifacl2}
                                            </div>
                                        </li>
                                        {/foreach}
                                    </ol>
                                </div>
                                {/if}
                            </li>
                            {/foreach}
                        </ol>
                        {/if}
                    </div>                    
                    {/ifacl2}
                </div>
            </div>
        </div>
        {ifacl2 "categorie.create" }
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Ajouter Catégories / sous catégories</h5>
                </div>
                <div class="ibox-content" id="edit-form">
                    <form id="form" name="form" class="form-horizontal" action="{jurl 'categorie~categorie:save_ajout'}" method="POST" enctype="multipart/form-data">
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Nom *:</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="Nom" class="form-control" name="nom" id="nom">
                                <span class="help-block m-b-none"><em>Ce nom est visible partout sur le site.</em></span>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Parent :</label>
                            <div class="col-lg-9">
                                 <select class="form-control m-b" id="categorie_parent" name="categorie_parent">
                                    <option value="">Aucun...</option>
                                    {if sizeof($oListCategorie)>0}
                                    {foreach($oListCategorie as $parent)}
                                    <option value="{$parent->id}">{$parent->name}</option>
                                    {/foreach}
                                    {/if}
                                </select>

                                <span class="help-block m-b-none"><em>Si le champ Parent est renseigné, il s’agit d’un sous catégorie.</em></span>
                            </div>
                        </div>
                        <div class="form-group" id="categories_icone">
                            <label class="col-lg-3 control-label">Icône :</label>
                            <div class="col-lg-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                    <div>
                                           <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer</span>
                                                <input type="file" class="default" accept="image/*" id="vignette" name="vignette"/>
                                           </span>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Publié *: </label>
                            <div class="col-lg-9">
                                <div class="input-group" id="cible">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="ispublie">
                                        <label for="inlineRadio1"> oui </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" checked id="inlineRadio2" value="0" name="ispublie">
                                        <label for="inlineRadio2"> non </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a class="btn btn-white" href="{jurl 'categorie~categorie:index'}">Annuler</a>
                                <button type="button" class="btn btn-primary submit-ajout">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {else} {ifacl2 "categorie.update"}
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edition Catégories / sous catégories</h5>
                </div>
                <div class="ibox-content" id="edit-form">
                    <div class="alert alert-info">Veuillez choisir</div>
                </div>
            </div>
        </div>
        {/ifacl2}
        {/ifacl2}
    </div>
</div>
{$SCRIPT}
{literal}

<script>
$(document).ready(function(){
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    // activate Nestable for list 2
     $('#nestable2').nestable({
         group: 1
     });

    $('#nestable-menu').on('click', function (e) {
         var target = $(e.target),
                 action = target.data('action');
         if (action === 'expand-all') {
             $('.dd').nestable('expandAll');
         }
         if (action === 'collapse-all') {
             $('.dd').nestable('collapseAll');
         }
     });

    $('.collapse-cible').on('hidden.bs.collapse', function (e) {
        $(this).prev("div").children().children("i").toggleClass('fa-caret-down fa-caret-up');
    }).on('show.bs.collapse', function (e) {
        $(this).prev("div").children().children("i").toggleClass('fa-caret-down fa-caret-up');
    });

    function toggle_icone_picker()
    {   if ($('#categorie_parent').val()!='')
        {
            $('#categories_icone').addClass('hidden');
        }
        else
        {
            $('#categories_icone').removeClass('hidden');
        } 
    }
    toggle_icone_picker();

    $('#categorie_parent').change(function(){        
        toggle_icone_picker();
    });


    $('#form').validate({
        rules: {
            nom: {
                required: true,
                minlength: 5
            },
            ispublie: {
                required: true
            }
        },
        messages: {
            nom: {
                required:"Champs obligatoire",
                minlength:"Veuillez entrer au moin 5 caractères"
            },
            ispublie: "Champs obligatoire"
        },        
        errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                selector = '<label class="error" id="'+element.attr("name")+'-error"">Veuillez choisir</label>'
                error = $(selector);
                error.appendTo(element.parent().parent().find('.errorPlace').html('') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
        }
    });

    //Form submit
    $('.submit-ajout').click (function(){
        var formvalid = $('#form').valid();
        var nameExist;
        if (formvalid != false)
        {
            $.post("{/literal}{jurl 'categorie~categorie:insertNameExist'}{literal}",
            {
                nom: $('#nom').val()
            },
            function(data, status){
                nameExist = data;
                if(nameExist == 0)
                {
                    $('#form').submit();
                }
                else
                {
                    selector = '<label class="error" id="nom-error">Ce nom éxiste déjà</label>'
                    $('#nom-error').remove();
                    error = $(selector);
                    error.appendTo($('#nom').parent());

                }
            });            
        }
    });

    function changeVignetteRules() {
        if ($('#categorie_parent').val() == '')
        {
            $('#vignette').rules('add',{
                required: true,
                messages: 
                {
                    required:"Il faut choisir une icône"
                }
            });
        }
        else
        {
            $('#vignette').rules('remove');
        }
    }

    changeVignetteRules();
    
    $('#categorie_parent').change(function(){
        changeVignetteRules()
    });

    $('.sous-categorie').hover(function(){
        $(this).find('.lien-mots-cles').removeClass('hide');
    },
    function(){
        $(this).find('.lien-mots-cles').addClass('hide');
    });
});
</script>
{/literal}