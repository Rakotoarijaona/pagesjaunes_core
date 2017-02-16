<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Mots clés des sous-catégories</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Mots clés</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            {jmessage}

            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="categ-tree">
                                {if (sizeof($oList)>0)}
                                <ol class="categ-tree-list" id="accordion">
                                    {foreach ($oList as $row)}
                                    <li class="categ-tree-item">
                                        <div class="categ-tree-handle">
                                            <!--<img src="{$j_basepath}icones/{$row['categorie']->vignette}" style="width:40px; height:40px; border: 5px solid #fff"/>-->
                                            <span style="margin-left: 20px"> {$row['categorie']->name} </span>
                                            {if (sizeof ($row['souscategorie'])>0)}
                                            <a data-toggle="collapse" href="#categorie{$row['categorie']->id}" class="pull-left bt-collapse" aria-expanded="false" aria-controls="categorie{$row['categorie']->id}"><i class="fa fa-caret-down" data-parent="#accordion"></i></a>
                                            {/if}
                                        </div>
                                        {if (sizeof ($row['souscategorie'])>0)}
                                        <div class="collapse collapse-cible {if ($iCategorieParent == $row['categorie']->id)} in {/if}" id="categorie{$row['categorie']->id}">
                                            <ol class="categ-tree-list">
                                                {foreach ($row['souscategorie'] as $souscategorie)} 
                                                <li class="categ-tree-item" {if isset ($oSouscategorie)}{if ($oSouscategorie->id == $souscategorie->id)} style="font-weight:bold" {/if}{/if}>
                                                    <div class="categ-tree-handle">
                                                        <a href="{jurl 'categorie~motscles:index',array('souscategorieId'=>$souscategorie->id)}">{$souscategorie->name} 
                                                        </a>
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
                        </div>
                        {ifacl2 "keywords.list"}
                        <div class="col-sm-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Liste des mots clés
                                </div>

                                <div class="panel-body">
                                    <form class="" id="form_mots_cles" action="{jurl 'categorie~motscles:updateTags'}">                     
                                    {if isset ($oSouscategorie)}
                                        <div class="form-group">
                                            <h3><strong>{$oSouscategorie->name}:</strong></h3>
                                            <!--<input id="tags_2" type="text" class="tags" value="" />-->
                                            <p>Les mots clés sont séparés de comma ou virgule (,)</p>
                                            <input type="hidden" name="id" value="{$oSouscategorie->id}">
                                            <textarea class="form-control" name="tags" style="min-height:150px">{$oSouscategorie->getMotsCles()}</textarea>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                {ifacl2 "keywords.update"}{ifacl2 "keywords.create"}{ifnotacl2 "keywords.restrictall"}
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                <a class="btn btn-white" href="{jurl 'categorie~motscles:index'}">Annuler</a>
                                                {/ifnotacl2}{/ifacl2}{/ifacl2}
                                            </div>
                                        </div>
                                    {else}
                                        <div class="alert alert-info">Veuillez choisir une sous-catégorie.</div>
                                    {/if}
                                    </form>
                                </div>
                            </div>
                        </div>
                        {/ifacl2}
                    </div>
                </div>
            </div>
        </div>
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
    $('.categorie-link').on('click', function (e){
        $('#edit-form').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
    });
    $('.collapse-cible').on('hidden.bs.collapse', function (e) {
        $(this).prev("div").children().children("i").toggleClass('fa-caret-down fa-caret-up');
    }).on('show.bs.collapse', function (e) {
        $(this).prev("div").children().children("i").toggleClass('fa-caret-down fa-caret-up');
    });
    $('.refreshform').on('click', function (e){
        $('#form_mots_cles').html('<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>');
    });
});
</script>
{/literal}