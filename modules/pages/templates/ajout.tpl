<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pages</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li>
                <a href="{jurl 'pages~pages:index'}">Pages</a>
            </li>
            <li class="active">
                <a><strong>Ajouter</strong></a>
            </li>
        </ol>       
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="updatepagesform" role="form" action="{jurl 'pages~pages:save_add'}" method="POST">
                        <div class="form-group r-form">
                            <label class="control-label">Nom de la page *</label> 
                            <input type="text" class="form-control" placeholder="" name="name" id="name">
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Titre *</label> 
                            <input type="text" class="form-control" placeholder="" name="title" id="title">
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Contenu</label> 
                            <textarea id="pagescontent" name="pagescontent" class="pagescontent" style="display:none"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Publié * </label>
                            <div class="input-group" id="cible">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="radioispublie1" value="1" name="ispublie">
                                    <label for="radioispublie1"> oui </label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" checked id="radioispublie2" value="0" name="ispublie">
                                    <label for="radioispublie2"> non </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Titre seo</label> 
                            <input type="text" class="form-control" placeholder="" name="titleseo" id="titleseo">
                        </div>
                        <div class="form-group r-form">
                            <label class="control-label">Meta déscription</label> 
                            <textarea id="metadescription" name="metadescription" class="metadescription form-control"></textarea>
                        </div>
                        <div class="col-lg-12 hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                              <button type="submit" class="btn btn-primary btn-save">Enregistrer</button>            
                              <a href="{jurl 'pages~pages:index'}" class="btn btn-white" id="cancel">Annuler</a>
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
    CKEDITOR.replace('pagescontent');  
    CKEDITOR.config.contentsCss = '{/literal}{$j_basepath}{literal}frontlibraries/stylesheets/styles_pagesjaunes.css' ; 
    $('#pagescontent').removeClass('hide');
    $('#updatepagesform').validate({        
        rules: {
            name: {
                required: true,
                remote: {
                    url: "{/literal}{jurl 'pages~pages:insertNameExist'}{literal}",
                    type: "post",
                    data: {
                        name: function () {
                            return $("#name").val();
                        }
                    }
                }
            },
            title: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            name: {
                required: "Ce champ est obligatoire",
                remote: "Le nom est déjà utilisé"
            },
            title: {
                required: "Ce champ est obligatoire",
                minlength: "Veuillez entrer au moins 6 caractères"
            }
        }
    });
});
</script>
{/literal}