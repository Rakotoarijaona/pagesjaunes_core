<table class="footable table" data-page-size="8"  data-filter="#table-filter">
    <thead>
        <tr>
            <th data-sort-ignore="true" width="43px"></th>
            <th>Profil </th>
            <th data-sort-ignore="true" width="150px">Droit & accès </th>
            <th data-sort-ignore="true" width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
    {if (sizeof($toList) > 0)}
        {foreach($toList as $row)}
        <tr>
            <td>
            {if (($row->iGroupId != 'superadmin')&&($row->hasUser() == 0))}
                <div class="checkbox" style="margin: 0px">
                    <input type="checkbox" name="groupProfil[]" value="{$row->iGroupId}">             
                    <label></label>
                </div>
            {else}
                <div class="checkbox" style="margin: 0px">
                    <input type="checkbox" disabled name="groupProfil[]" value="{$row->iGroupId}">             
                    <label></label>
                </div>
            {/if}
            </td>
            <td>
                {ifacl2 "profile.update"}
                <a  href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jurl 'profile~profile:show_modal_update',array('id_profile'=>$row->iGroupId)}" data-toggle="modal">
                {$row->zGroupName}
                </a>
                {else}
                {$row->zGroupName}
                {/ifacl2}
            </td>
            <td>
                {ifacl2 "right.list"}
                {if ($row->iGroupId != 'superadmin')}
                <a href="{jurl 'right~right:index',array('id_profile'=>$row->iGroupId)}" class="btn btn-xs btn-primary">Gérer</a>
                {else}
                <button class="btn btn-xs btn-default" disabled>Gérer</a>
                {/if}
                {/ifacl2}
            </td>
            <td>
                {ifacl2 "profile.delete"}
                {if (($row->iGroupId != 'superadmin')&&($row->hasUser() == 0)) }
                <a  onclick="deleteProfile('{$row->iGroupId}');" class="btn btn-xs btn-danger">
                    Supprimer
                </a>
                {else}
                <button class="btn btn-xs btn-default" disabled>
                    Supprimer
                </button>
                {/if}
                {/ifacl2}
            </td>
        </tr>
        {/foreach}
    {/if}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">
                <div class="input-group" style="padding-right: 5px">
                    <select class="actionGroup form-control input-sm m-b" name="profil_actionGroup">
                        <option value="">Actions groupées :</option>
                        <option value="delete">Supprimer</option>
                    </select>
                    <div class="input-group-btn" style="padding: 0px">
                        <button type="button" class="btn btn-white btn-sm" onclick="deleteGroupProfil();"> Appliquer</button>
                    </div>                                
                </div>
            </td>
            <td colspan="3">
                <ul class="pagination pull-right"></ul>
            </td>
        </tr>
    </tfoot>
</table>
{literal}
<script type="text/javascript">
$(document).ready(function()
{    
    $('.footable').footable();
})
</script>
{/literal}