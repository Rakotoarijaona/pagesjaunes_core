<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Slideshow</h2>      
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'slideshow~slideshow:index'}">Slideshow</a>
            </li>
            <li class="active">
                <a><strong>{$slideshow->zSlideshow_identifiant}</strong></a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edition d'un bandeau </h5>
                </div>
                <div class="ibox-content">
                    <form role="form" id="form" enctype="multipart/form-data" action="{jurl 'slideshow~slideshow:save_edit'}" method="POST">
                        <input type="hidden" name="slideshowId" id="slideshowId" value="{$slideshow->iSlideshow_id}" />
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <div class="form-group r-form">
                                    <label class="control-label">Nom bandeau *</label> 
                                    <input type="text" class="form-control" placeholder="" id="slidename" name="slidename" value="{$slideshow->zSlideshow_identifiant}">
                                </div>
                                <div class="form-group r-form">
                                    <label class="control-label">Entreprise</label>
                                    <div class="input-group">
                                        <select data-placeholder="Selectionnez une entreprise" style="width:250px" name="entrepriseId" id="entrepriseId" class="chosen-select" tabindex="6">
                                            <option value="">Selectionnez une entreprise</option>
                                            {foreach ($toEntreprise as $rowEntreprise)}
                                            <option value="{$rowEntreprise->id}" {if($rowEntreprise->id == $slideshow->iSlideshow_entrepriseId)}selected{/if}>{$rowEntreprise->raisonsociale}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Afficher image seulement sans contenus *</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" {if (($slideshow->iSlideshow_imageonly) == 1)} checked {/if} value="1" name="radioimageseul">
                                            <label for="inlineRadio1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio2" {if (($slideshow->iSlideshow_imageonly) == 0)} checked {/if} value="0" name="radioimageseul">
                                            <label for="inlineRadio2"> non </label>
                                        </div>
                                    </div>
                                </div>                                 
                                <div class="form-group">
                                    <label class="control-label">Visuel background</label>
                                    <div class="fileupload fileupload-new col-md-12 row" data-provides="fileupload">
                                        <div class="fileupload-preview fileupload-new thumbnail col-lg-12">
                                            <img src="{$j_basepath}{$photosFolderPath}{$slideshow->zSlideshow_visuelbackground}" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail col-lg-12"></div>
                                        <div class="">
                                           <span class="btn btn-white btn-file">
                                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                           <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                           <input type="file" class="default" name="imageToUpload" accept="image/*"/>
                                           </span>&nbsp;
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <div class="errorPlace">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group r-form">
                                    <label class="control-label">Url page </label> 
                                    <input type="text" class="form-control" placeholder="" name="urlpage" value="{$slideshow->zSlideshow_urlpage}" id="urlpage">
                                    <span class="help-block m-b-none"><em>ex: </em>http://www.... <em>ou "</em><strong>[fiche]</strong>"<em> si c'est pour un lien vers la fiche entreprise</em></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Publié *</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio1" value="1" {if (($slideshow->iSlideshow_publicationstatus) == '1')} checked {/if} name="radiopublie">
                                            <label for="inlineRadio1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="inlineRadio2" value="0" {if (($slideshow->iSlideshow_publicationstatus) == '0')} checked {/if} name="radiopublie">
                                            <label for="inlineRadio2"> non </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 hide" id="slide-content">
                                <h3>
                                    Contenus bandeau
                                </h3>
                                <div class="form-group r-form">
                                    <label class="control-label r-form">Titre </label> 
                                    <input type="text" disabled class="form-control" value="{$slideshow->zSlideshow_titre}" placeholder="" name="titre">
                                </div>
                                <div class="form-group r-form">
                                    <label class="control-label r-form">Texte d'introduction</label> 
                                    <textarea class="form-control ckeditor" name="introduction_text">{$slideshow->zSlideshow_introductiontext}</textarea>
                                </div>

                                <div class="form-group r-form">
                                    <label class="control-label r-form">Titre du bouton </label> 
                                    <input type="text" disabled class="form-control" placeholder="" name="titrebouton" value="{$slideshow->zSlideshow_buttontitle}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Position contenu</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                        <input type="radio" disabled id="inlineRadio1" value="left" {if (($slideshow->zSlideshow_contentposition) == 'left')} checked {/if} name="radioposition">
                                        <label for="inlineRadio1"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio"  disabled id="inlineRadio2" value="center" {if (($slideshow->zSlideshow_contentposition) == 'center')} checked {/if} name="radioposition">
                                        <label for="inlineRadio2"> Centre </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" disabled id="inlineRadio3" value="right" {if (($slideshow->zSlideshow_contentposition) == 'right')} checked {/if} name="radioposition">
                                        <label for="inlineRadio3"> Droite </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="col-lg-12 text-left">
                            <button type="button" role="button" class="btn btn-primary btn-submit">Enregistrer</button>
                            <a href="{jurl 'slideshow~slideshow:index'}"><button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button></a>
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
    
$(document).ready(function(){

    CKEDITOR.replace( 'introduction_text');

    $('#entrepriseId').change(function(){
        if ($(this).val() != '')
        {
            if ($('#urlpage').val() == '')
            {
                $('#urlpage').val('[fiche]');
            }
        }
        else
        {
            if ($('#urlpage').val() == '[fiche]')
            {
                $('#urlpage').val('');
            }
        }
    });

    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"100%"}
        }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    $(':radio').change(function(){
        $(this).parent().parent().find('.errorPlace').html('');
    });
    testImageOnly();
    $('input[name="radioimageseul"]').change (function(){
        
        testImageOnly();
    });
    function testImageOnly()
    {
        if ($('input[name="radioimageseul"]:checked').val() == 0)
        {        
            
            $('#slide-content textarea').each (function () {
                $(this).removeAttr('disabled');  
            });
            $('#slide-content input').each (function () {
                $(this).removeAttr('disabled');
            });
            $('#slide-content').removeClass('hide');
        }
        else
        {   
            
            $('#slide-content input').each (function () {
                $(this).attr('disabled','true');
            });
            $('#slide-content').addClass('hide');
        }
    }

    $('#form').validate({
    rules: {
        slidename: {
            required: true,
            minlength: 5,
            remote: {
                url: "{/literal}{jurl 'slideshow~slideshow:updateNameExist'}{literal}",
                type: "post",
                data: {
                    id: function () {
                        return $("#slideshowId").val();
                    },
                    name: function () {
                        return $("#slidename").val();
                    }
                }
            },
        },
        entrepriseId: {
            required: true
        },
        radioimageseul: {
            required: true
        },
        radiopublie: {
            required: true
        }
    },
    messages: {
        slidename: {
            required: "Champs obligatoire",
            minlength: "Veuillez entrer au moins 5 caractères",
            remote: "Le nom éxiste déjà." 
        },
        entrepriseId: "Veuillez choisir",
        radioimageseul: "Champs obligatoire",
        imageToUpload: "Champs obligatoire",
        radiopublie: "Champs obligatoire"
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

    $('.btn-submit').click(function(){
        if(($('#urlpage').val() != '') && ($('#urlpage').val() != '[fiche]'))
        {
            /*$('#urlpage').rules('add',{
                url: true,
                messages: 
                {
                    url:"Veuillez entrer un url valide"
                }
            });*/
        }
        else
        {
            $('#urlpage').rules('remove'); 
        }

        if ($('#form').valid())
        {
            $('#form').submit();
        } 
    });
    $('#urlpage').change(function(){
        if(($('#urlpage').val() != '') && ($('#urlpage').val() != '[fiche]'))
        {
            /*$('#urlpage').rules('add',{
                url: true,
                messages: 
                {
                    url:"Veuillez entrer un url valide"
                }
            });*/
        }
        else
        {
            $('#urlpage').rules('remove'); 
        }
    });
});
</script>
{/literal}