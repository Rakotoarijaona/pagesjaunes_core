<table class="table table-hover">
    <thead>
        <th>email</th>
        <th width="70px"></th>
    </thead>
    <tbody>
        {foreach ($oEntreprise->emails as $email)}
        <tr class="rMultiItem">
            <td class="value">
                <input type="hidden" class="emails" name="email_list[]" value="{$email->id}">
                {$email->email}
            </td>
            <td class="text-right">
                <a class="btn btn-success btn-xs" onclick="return setRemote(this);" data-remote-target="#email-form-input" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateEmailForm', array('entrepriseId'=>$oEntreprise->id, 'emailId'=>$email->id)}"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger btn-xs" onclick="deleteEmail(this);" data-remote-target="#emailList" data-load-remote="{jfullurl 'entreprise~entreprise:updateEmails',array('entrepriseId'=>$oEntreprise->id, 'operation'=>'delete', 'emailId'=>$email->id)}" class="btn btn-xs btn-danger" href="#"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>