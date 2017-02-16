<div id="service-add-form" class="input-group hidden">
    <input type="text" id="service-input" class="input-text form-control"> 
    <span class="input-group-btn">
        <input type="hidden" name="new-service" value=""/>
        <button type="button" id="btn-add-service" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-plus"></i></button>
    </span>
</div>
<div id="service-update-form" class="input-group">
	<input type="text" class="input-text form-control" value="{$oService->name}"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-update-service" data-service-id="{$oService->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="button" id="btn-undo-update-service" class="btn btn-success btn-outline"><i class="fa fa-reply"></i></button>
    </span>
</div>
{literal}
<script>
$(document).ready(function() {
    $('#btn-update-service').click(function()
    {
        var serviceId = $(this).data('service-id');
        var name = $('#service-update-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "update";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateServices"}{literal}', {'serviceId':serviceId, 'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#serviceList').html(data);
            $('#service-update-form').remove();
            $('#service-add-form').removeClass('hidden');
            });
    });
    $('#btn-undo-update-service').click(function()
    {
        $('#service-update-form').remove();
        $('#service-add-form').removeClass('hidden');
    });
    $('#btn-add-service').click(function(){
        var name = $('#service-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateServices"}{literal}', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#serviceList').html(data);
            });
    });
});
</script>
{/literal}