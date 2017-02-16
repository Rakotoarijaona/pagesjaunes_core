<table class="table table-hover">
    <thead>
        <th>Services</th>
        <th width="70px"></th>
    </thead>
    <tbody>
        {foreach ($oEntreprise->services as $service)}
        <tr class="rMultiItem">
            <td class="value">
                <input type="hidden" class="services" name="service_list[]" value="{$service->id}">
                {$service->name}
            </td>
            <td class="text-right">
                <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#service-form-input" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateServiceForm', array('entrepriseId'=>$oEntreprise->id, 'serviceId'=>$service->id)}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-xs" onclick="deleteService(this);" data-remote-target="#serviceList" data-load-remote="{jfullurl 'entreprise~entreprise:updateServices',array('entrepriseId'=>$oEntreprise->id, 'operation'=>'delete', 'serviceId'=>$service->id)}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>