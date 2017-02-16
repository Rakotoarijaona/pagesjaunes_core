<table class="table table-hover">
    <thead>
        <th>Marques</th>
        <th width="70px"></th>
    </thead>
    <tbody>
        {foreach ($oEntreprise->marques as $marque)}
        <tr class="rMultiItem">
            <td class="value">
                <input type="hidden" class="marques" name="marque_list[]" value="{$marque->id}">
                {$marque->name}
            </td>
            <td class="text-right">
                <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#marque-form-input" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateMarqueForm', array('entrepriseId'=>$oEntreprise->id, 'marqueId'=>$marque->id)}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-xs" onclick="deleteMarque(this);" data-remote-target="#marqueList" data-load-remote="{jfullurl 'entreprise~entreprise:updateMarques',array('entrepriseId'=>$oEntreprise->id, 'operation'=>'delete', 'marqueId'=>$marque->id)}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>