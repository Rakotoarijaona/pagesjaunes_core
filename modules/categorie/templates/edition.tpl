<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><strong>catégories / sous-catégories</strong></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'categorie~categorie:index'}">catégories & sous-catégories</a>
            </li>
            <li class="active">
                <a><strong>{$oRecord->name}</strong></a>
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
                                    <a {ifacl2 "categorie.update"} href="{jfullurl 'categorie~categorie:edition',array('categorieid'=>$row['categorie']->id)}"{/ifacl2}  class="categorie-link {if (($iscategorie == 1)&&($oRecord->id == $row['categorie']->id))}active{/if}"> {$row['categorie']->name} </a>
                                    {if (sizeof ($row['souscategorie'])>0)}
                                    <a data-toggle="collapse" href="#categorie{$row['categorie']->id}" class="pull-right bt-collapse" aria-expanded="false" aria-controls="categorie{$row['categorie']->id}"><i class="fa fa-caret-down"></i></a>
                                    {/if}
                                </div>
                                {if (sizeof ($row['souscategorie'])>0)}
                                <div class="collapse collapse-cible" id="categorie{$row['categorie']->id}">
                                    <ol class="categ-tree-list">
                                        {foreach ($row['souscategorie'] as $souscategorie)} 
                                        <li class="categ-tree-item  {if (($iscategorie == 0)&&($oRecord->id == $souscategorie->id))} active {/if}">
                                            <div class="categ-tree-handle sous-categorie">
                                                <a {ifacl2 "categorie.update"} href="{jfullurl 'categorie~categorie:edition',array('souscategorieid'=>$souscategorie->id)}"  class="categorie-link"{/ifacl2}>{$souscategorie->name} 
                                                </a>
                                                <a href="{jurl 'categorie~motscles:index',array('souscategorieId'=>$souscategorie->id)}" class="lien-mots-cles hide"> | <small>mots clés</small></a>
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
        {ifacl2 "categorie.update" }
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {if ($iscategorie == 0)}
                    <h5>Éditer la sous-catégorie "{$oRecord->name}"</h5>
                    {else}
                    <h5>Éditer la catégorie "{$oRecord->name}"</h5>
                    {/if}
                </div>
                <div class="ibox-content" id="edit-form">
                    <form id="form" name="form" class="form-horizontal" action="{jurl 'categorie~categorie:enregistrer_modif'}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$oRecord->id}">
                        <input type="hidden" name="iscategorie" value="{$iscategorie}">
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Nom *:</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="Nom" class="form-control" name="name" id="name" value="{$oRecord->name}">
                                <span class="help-block m-b-none"><em>Ce nom est visible partout sur le site.</em></span>
                            </div>
                        </div>

                        {if ($iscategorie == 0)}
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Parent :</label>
                            <div class="col-lg-9">
                                 <select class="form-control m-b" id="parent" name="parent" value="">
                                    <option value="">Sélection...</option>
                                    {if sizeof($oListCategorie)>0}
                                        {foreach($oListCategorie as $parent)}
                                        <option value="{$parent->id}" {if ($parent->id == $oRecord->categorieid)}selected{/if}>{$parent->name}</option>
                                        {/foreach}
                                    {/if}
                                </select>

                                <span class="help-block m-b-none"><em>{@categorie~categorie.select.parent.help.block@}</em></span>
                            </div>
                        </div>
                        {elseif (($iscategorie == 1)&&($oRecord->has_child() == 0))}
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Parent :</label>
                            <div class="col-lg-9">
                                 <select class="form-control m-b" id="parent" name="parent" value="">
                                    <option value="">Sélection...</option>
                                    {if sizeof($oListCategorie)>0}
                                        {foreach($oListCategorie as $parent)}
                                        {if ($parent->id != $oRecord->id)}
                                        <option value="{$parent->id}">{$parent->name}</option>
                                        {/if}
                                        {/foreach}
                                    {/if}
                                </select>

                                <span class="help-block m-b-none"><em>{@categorie~categorie.select.parent.help.block@}</em></span>
                            </div>
                        </div>
                        {else}
                        <div class="form-group r-form">
                            <label class="col-lg-3 control-label">Parent :</label>
                            <div class="col-lg-9">
                                <em>{@categorie~categorie.cant.change.parent.message@}</em>
                            </div>
                        </div>
                        {/if}

                        <div class="form-group" id="categories_icone">
                            <label class="col-lg-3 control-label">Icône :</label>
                            <div class="col-lg-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    {if ($iscategorie == 1)}
                                    <div class="fileupload-new thumbnail background-thumbnail" style="width: 100px; height: 100px;">
                                        <img src="{$j_basepath}icones/{$oRecord->vignette}" alt="" />
                                    </div>
                                    {/if}
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
                                        <input type="radio" id="inlineRadio1" {if ($oRecord->ispublie == '1')}checked{/if} value="1" name="ispublie">
                                        <label for="inlineRadio1"> oui </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio2" {if ($oRecord->ispublie == '0')}checked{/if} value="0" name="ispublie">
                                        <label for="inlineRadio2"> non </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a class="btn btn-white" href="{jurl 'categorie~categorie:index'}">Annuler</a>
                                {if ($oRecord->can_delete2() == 1)}
                                {ifacl2 "categorie.delete"}
                                <button type="button" onclick="submitDelete({$oRecord->id});" class="submit-delete btn btn-danger">Supprimer</button>
                                {/ifacl2}
                                {/if}
                                <button type="button" role="button" class="btn btn-primary btn-submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {/ifacl2}
    </div>
</div>
{$SCRIPT}
{literal}

<script>
$(document).ready(function(){
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1
    });
    $(".active").css('font-weight','bold');
    $('.categ-tree-item.active').parents('.collapse').addClass('in');
    $('.collapse.in').siblings('.categ-tree-handle').find('.bt-collapse i').toggleClass('fa-caret-down fa-caret-up');
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
    {   if ($('#parent').length > 0)
        {
            if ($('#parent').val()!='')
            {
                $('#categories_icone').addClass('hidden');
            }
            else
            {
                $('#categories_icone').removeClass('hidden');
            }
        }
    }

    toggle_icone_picker();

    $('#parent').change(function(){
        toggle_icone_picker();
    });

    $('#form').validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            ispublie: {
                required: true
            }
        },
        messages: {
            name: "Champs obligatoire",
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

    $('#parent').change(function(){
        changeVignetteRules()
    });

    //Form submit
    $('.btn-submit').click (function(){
        var formvalid = $('#form').valid();
        var nameExist;
        if (formvalid != false)
        {
            
            if ($('input[name="iscategorie"]').val() == 1)
            {
                $.post("{/literal}{jfullurl 'categorie~categorie:categorieUpdateNameExist'}{literal}",
                {
                    id: $('input[name="id"]').val(),
                    nom: $('#name').val()
                },
                function(data, status){
                    nameExist = data;
                    if(nameExist == 0)
                    {
                        $('#form').submit();
                    }
                    else
                    {
                        selector = '<label class="error" id="name-error">Ce nom éxiste déjà</label>'
                        $('#name-error').remove();
                        error = $(selector);
                        error.appendTo($('#name').parent());
                    }
                });
            }
            else if ($('input[name="iscategorie"]').val() == 0)
            {   
                $.post("{/literal}{jfullurl 'categorie~categorie:souscategorieUpdateNameExist'}{literal}",
                {
                    id: $('input[name="id"]').val(),
                    nom: $('#name').val()
                },
                function(data, status){
                    nameExist = data;
                    if(nameExist == 0)
                    {
                        $('#form').submit();
                    }
                    else
                    {
                        selector = '<label class="error" id="name-error">Ce nom éxiste déjà</label>'
                        $('#name-error').remove();
                        error = $(selector);
                        error.appendTo($('#name').parent());
                    }
                });
            }
        }
    });

    function changeVignetteRules() {
        if ($('#parent').val() == '')
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
    

    $('.sous-categorie').hover(function(){
            $(this).find('.lien-mots-cles').removeClass('hide');
        },
        function(){
            $(this).find('.lien-mots-cles').addClass('hide');
        }
    );
});

function submitDelete(id)
{
    if (($('input[name="iscategorie"]').val() != '')&&(id != ''))
    {        
        swal({
            title: "Suppression",
            text: "Vous êtes sure de vouloir supprimer cet élement?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false
        }, function () {
            if ($('input[name="iscategorie"]').val() == 1)
            {
                var url="{/literal}{jfullurl 'categorie~categorie:deleteCategorie'}{literal}?categorieid="+id;
                window.location.assign(url);
            }
            else if ($('input[name="iscategorie"]').val() == 0)
            {
                var url="{/literal}{jfullurl 'categorie~categorie:deleteSouscategorie'}{literal}?souscategorieid="+id;
                window.location.assign(url);
            }     
        });
        
    }
}
</script>
{/literal}