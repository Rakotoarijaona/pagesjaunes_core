<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Slideshow</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Slideshow</strong></a>
            </li>
        </ol>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    {if (isset ($messageError))}
    <div class="alert alert-danger col-lg-12">
        {foreach ($messageError as $message)}
            {$message}
        {/foreach}
    </div>
    {/if}
    {if (isset ($messageSuccess))}
    <div class="alert alert-success col-lg-12">
        {foreach ($messageSuccess as $message)}
            {$message}
        {/foreach}
    </div>
    {/if}
    <div class="row">
        <div class="col-lg-12">
            {jmessage}
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" placeholder="Filtre" id="search" class="input-sm form-control">
                        </div>
                        <div class="col-sm-8 text-right">
                            {ifacl2 "slideshow.create"}
                            <a href="{jurl 'slideshow~slideshow:add'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>
                    <form action="{jurl 'slideshow~slideshow:grouped_action'}" name="groupform" id="groupform" method = "GET">
                        <div class="table-responsive">
                            <table class="footable table" data-page-size="20" data-filter=#search>
                                <thead>
                                    <tr>
                                        <th data-sort-ignore="true" width="45px"></th>
                                        <th data-sort-ignore="true" width="50px"></th>
                                        <th>Identifiant </th>
                                        <th>Statut publication </th>
                                        <th>Entreprise</th>
                                        <th>Date de création </th>
                                        <th data-sort-ignore="true"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if sizeof($list) > 0}
                                    {foreach ($list as $row )}
                                    <tr>
                                        <td>                                            
                                            <div class="checkbox" style="margin: 0px">
                                                <input type="checkbox" name="actionGroup[]" id="actionGroup{$row->iSlideshow_id}" value="{$row->iSlideshow_id}">
                                                <label for="actionGroup{$row->iSlideshow_id}"></label>
                                            </div>
                                        </td>
                                        <td><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$row->zSlideshow_visuelbackground}" style="width: 45px;height: 45px;line-height: 45px; border: 2px solid #fff;" alt="image"></td>
                                        <td>{$row->zSlideshow_identifiant}</td>
                                        <td>
                                            {if (($row->iSlideshow_publicationstatus) == 1)}
                                            publié
                                            {else}
                                            non publié
                                            {/if}
                                        </td>
                                        <td>{$row->getEntreprise()->raisonsociale}</td>
                                        <td>{$row->dSlideshow_creationdate}</td>
                                        <td>
                                            {ifacl2 "slideshow.update"}
                                            <a href="{jurl 'slideshow~slideshow:edit', array('slideshowId'=>$row->iSlideshow_id)}">
                                                <button type="button" class="btn btn-success btn-xs">Editer</button>
                                            </a>
                                            {/ifacl2}
                                            {ifacl2 "slideshow.delete"}
                                            <a onclick="deleteSlideshow({$row->iSlideshow_id})">
                                                <button type="button" class="btn btn-danger btn-xs">Supprimer</button>
                                            </a>
                                            {/ifacl2}
                                        </td>
                                    </tr>
                                    {/foreach}
                                    {/if}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="input-group pull-left">
                                                <select class="form-control" name="todo">
                                                    <option value="0">Action groupées :</option>
                                                    {ifacl2 "slideshow.delete"}
                                                    <option value="delete" >Supprimer</option>
                                                    {/ifacl2}
                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="deleteGroupSlideshow()" class="btn btn-white" id="group-action">Appliquer</button>
                                                </span>
                                            </div>
                                        </td>
                                        <td colspan="4">
                                            <ul class="pagination pull-right"></ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
    $('.footable').footable();
    //$('#group-action').click(function(){alert('vody be')});
});

function deleteSlideshow(id)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer ce slideshow ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: true
    }, function () {
        window.location.assign('{/literal}{jurl "slideshow~slideshow:delete", array("slideshowId"=>$row->iSlideshow_id)}{literal}')
    });
}

function deleteGroupSlideshow()
{
    if ($('input[name="actionGroup[]"]:checked').length > 0)
    {   
        if ($('select[name="todo"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces slideshows?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler",
                    closeOnConfirm: false
                }, function () {
                    $("#groupform").submit();
                });
        }
    }
}
</script>
{/literal}