<div id="email-add-form" class="input-group hidden">
    <input type="email" class="input-text form-control"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-add-email" data-email-id="{$oEmail->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-plus"></i></button>
    </span>
</div>
<div id="email-update-form" class="input-group">
	<input type="email" class="input-text form-control" value="{$oEmail->email}"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-update-email" data-email-id="{$oEmail->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="button" id="btn-undo-update-email" class="btn btn-success btn-outline"><i class="fa fa-reply"></i></button>
    </span>
</div>
{literal}
<script>
$(document).ready(function() {
    $('#btn-update-email').click(function()
    {
        var emailId = $(this).data('email-id');
        var emailText = $('#email-update-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "update";
        console.log(emailId, emailText, entrepriseId);
        if (isValidEmailAddress(emailText))
        {
            $.post('{/literal}{jfullurl "entreprise~entreprise:updateEmails"}{literal}', {'emailId':emailId, 'emailText':emailText, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
                $('#emailList').html(data);
                $('#email-update-form').remove();
                $('#email-add-form').removeClass('hidden');
                });
        }
    });
    $('#btn-undo-update-email').click(function()
    {
        $('#email-update-form').remove();
        $('#email-add-form').removeClass('hidden');
    });
    $('#btn-add-email').click(function(){
        var emailText = $('#email-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        if (isValidEmailAddress(emailText))
        {
            $.post('{/literal}{jfullurl "entreprise~entreprise:updateEmails"}{literal}', {'emailText':emailText, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
                $('#emailList').html(data);
                });
        }
    });

    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    };
});
</script>
{/literal}