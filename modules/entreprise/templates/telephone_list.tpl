<table class="table table-hover">
    <thead>
        <th>Telephone</th>
        <th width="100px"></th>
    </thead>
    <tbody>
        {foreach ($oEntreprise->telephones as $telephone)}
        <tr class="rMultiItem">
            <td class="value">
                <input type="hidden" class="telephones" name="telephones_list[]" value="{$telephone->id}">
                {$telephone->numero}
            </td>
            <td class="text-right">                                                            
                <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#num-form-input" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateTelephoneForm', array('entrepriseId'=>$oEntreprise->id, 'telephoneId'=>$telephone->id)}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-xs" onclick="deleteTelephone(this);" data-remote-target="#telephoneList" data-load-remote="{jfullurl 'entreprise~entreprise:updateTelephones',array('entrepriseId'=>$oEntreprise->id, 'operation'=>'delete', 'telephoneId'=>$telephone->id)}" class="btn btn-xs btn-danger" href="#"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>