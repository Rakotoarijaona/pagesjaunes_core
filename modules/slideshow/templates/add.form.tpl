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
                <a><strong>Ajout</strong></a>
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
                    <form role="form" id="form" enctype="multipart/form-data" action="{jurl 'slideshow~slideshow:save_add'}" method="POST">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <div class="form-group r-form">
                                    <label class="control-label">Nom bandeau *</label> 
                                    <input type="text" class="form-control" placeholder="" name="slidename" id="slidename">
                                </div>
                                <div class="form-group r-form">
                                    <label class="control-label">Entreprise</label>
                                    <div class="input-group">
                                        <select data-placeholder="Selectionnez une entreprise" style="width:250px" name="entrepriseId" id="entrepriseId" class="chosen-select" tabindex="2">
                                            <option value="">Selectionnez une entreprise</option>
                                            {foreach ($toEntreprise as $rowEntreprise)}
                                            <option value="{$rowEntreprise->id}">{$rowEntreprise->raisonsociale}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Afficher image seulement sans contenus *</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioimageseul1" value="1" checked name="radioimageseul">
                                            <label for="radioimageseul1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radioimageseul2" value="0" name="radioimageseul">
                                            <label for="radioimageseul2"> non </label>
                                        </div>
                                        <div class="errorPlace">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Visuel background *</label>
                                    <div class="fileupload fileupload-new col-md-12 row" data-provides="fileupload">
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
                                    <input type="text" class="form-control" placeholder="" name="urlpage" id="urlpage">
                                    <span class="help-block m-b-none"><em>ex: </em>http://www.... <em>ou </em>"<strong>[fiche]</strong><em>"" si c'est pour un lien vers la fiche entreprise</em></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Publié *</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiopublie1" checked value="1" name="radiopublie">
                                            <label for="radiopublie1"> oui </label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="radiopublie2"  value="0" name="radiopublie">
                                            <label for="radiopublie2"> non </label>
                                        </div>
                                        <div class="errorPlace">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <em>(* Obligatoire)</em>
                                </div>
                            </div>
                            <div class="col-sm-6 hide" id="slide-content">
                                <h3>
                                    Contenus bandeau
                                </h3>
                                <div class="form-group r-form">
                                    <label class="control-label">Titre </label> 
                                    <input type="text" disabled class="form-control" placeholder="" name="titre">
                                </div>
                                <div class="form-group r-form">
                                    <label class="control-label">Texte d'introduction</label> 
                                    <textarea class="form-control ckeditor" name="introduction_text" id="introduction_text"></textarea>
                                </div>

                                <div class="form-group r-form">
                                    <label class="control-label">Titre du bouton </label> 
                                    <input type="text" disabled class="form-control" placeholder="" name="titrebouton">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Position contenu</label>
                                    <div class="input-group">
                                        <div class="radio radio-info radio-inline">
                                        <input type="radio" disabled id="inlineRadio1" value="left" name="radioposition" checked>
                                        <label for="inlineRadio1"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio"  disabled id="inlineRadio2" value="center" name="radioposition">
                                        <label for="inlineRadio2"> Centre </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" disabled id="inlineRadio3" value="right" name="radioposition">
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
    $('input[name="radioimageseul"]').change (function(){
        
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
            $('#slide-content textarea').each (function () {
                $(this).attr('disabled','true');   
            });
            $('#slide-content input').each (function () {
                $(this).attr('disabled','true');
            });
            $('#slide-content').addClass('hide');
        }
    });
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

    $('#form').validate({
    rules: {
        slidename: {
            required: true,
            minlength: 3,
            remote: {
                url: "{/literal}{jurl 'slideshow~slideshow:insertNameExist'}{literal}",
                type: "post",
                data: {
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
        imageToUpload: {
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
            //alert (insertNameExist('{/literal}{jurl "slideshow~slideshow:insertNameExist"}{literal}', $('#slidename').val()));
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