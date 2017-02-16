<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pages</h2>         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Pages</strong></a>
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" placeholder="Filtre" id="table-filter" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white"> <i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-8 text-left">
                            {ifacl2 "pages.create"}
                            <a href="{jurl 'pages~pages:ajout'}">
                                <button class="btn btn-success" type="button">Ajouter&nbsp;<i class="fa fa-plus"></i></button>
                            </a>
                            {/ifacl2}
                        </div>
                    </div>

                    <div class="table-responsive" id="pages-list">
                        <table class="footable table table-hover" data-page-size="25" data-filter="#table-filter">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>Pages </th>
                                    <th>Titre </th>
                                    <th>Alias</th>
                                    <th>Statut</th>
                                    <th data-sort-ignore="true" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if sizeof($toPages) > 0}
                                {foreach ($toPages as $oPages)}
                                <tr>
                                    <td>
                                        <div class="checkbox" style="margin: 0px">
                                            <input type="checkbox" class="" 
                                            {ifacl2 "pages.update"} id="check{$oPages->id}" name="check[]" value="{$oPages->id}"{else} disabled {/ifacl2} >
                                            <label for="check{$oPages->id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{jurl 'front_office~default:pages', array('p'=>$oPages->label)}"><strong>{$oPages->name}</strong></a>
                                    </td>
                                    <td>
                                        {$oPages->title|upper}
                                    </td>
                                    <td>
                                        {$oPages->label}
                                    </td>
                                    <td>                                        
                                        {if ($oPages->is_publie == 1)}
                                            <strong><span class="text-success"><i class="fa fa-check"></i>&nbsp;Publié</span></strong>
                                        {elseif ($oPages->is_publie == 0)}
                                            <strong><span class="text-danger"><i class="fa fa-times"></i>&nbsp;Non publié</span></strong>
                                        {/if}
                                    </td>
                                    <td>
                                        {ifacl2 "pages.update"}
                                        <a href="{jurl 'pages~pages:edition', array('id'=>$oPages->id)}" class="btn btn-primary btn-xs btn-block">Modifier</a>
                                        {/ifacl2}
                                        {ifacl2 "pages.delete"}
                                        <a href="{jurl 'pages~pages:delete', array('id'=>$oPages->id)}" class="btn btn-danger btn-xs btn-block">Supprimer</a>
                                        {/ifacl2}
                                    </td>
                                </tr>
                                {/foreach}
                                {/if}
                            </tbody> 
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot> 
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <select class="form-control m-b" name="actionGroup">
                                    <option value="">Action groupées :</option>
                                    {ifacl2 "pages.delete"}
                                    <option value="delete">Supprimer</option>
                                    {/ifacl2}
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-white" onclick="deleteGroup();"> Appliquer</button>
                                </span>
                            </div>
                            <form name="formGroupDelete" id="formGroupDelete" action="{jurl 'pages~pages:delete_group'}" method="POST">
                            </form>
                        </div>
                    </div>
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
    $('.footable').footable();
    
});
function deleteGroup()
{
    if ($('input[name="check[]"]:checked').length > 0)
    {
        if ($('select[name="actionGroup"]').val() == 'delete')
        {
            $('input[name="check[]"]:checked').each(function(){
                $inputHdn = $('<input type="hidden" name="check[]"/>');
                $inputHdn.val($(this).val());
                $("#formGroupDelete").append($inputHdn);
            });
            $("#formGroupDelete").submit(); 
        }
    }
}
</script>
{/literal}