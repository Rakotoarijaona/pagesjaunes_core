<div id="num-add-form" class="input-group hidden">
    <input type="text" id="num-input" class="input-text form-control"> 
    <span class="input-group-btn">
    <input type="hidden" name="new-tel" value=""/>
        <button type="button" id="btn-add-num" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-plus"></i></button>
    </span>
</div>
<div id="num-update-form" class="input-group">
	<input type="text" class="input-text form-control" value="{$oTelephone->numero}"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-update-num" data-telephone-id="{$oTelephone->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="button" id="btn-undo-update-num" class="btn btn-success btn-outline"><i class="fa fa-reply"></i></button>
    </span>
</div>
{literal}
<script>
$(document).ready(function() {
    $('#btn-update-num').click(function()
    {
        var telephoneId = $(this).data('telephone-id');
        var numero = $('#num-update-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "update";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateTelephones"}{literal}', {'telephoneId':telephoneId, 'numero':numero, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#telephoneList').html(data);
            $('#num-update-form').remove();
            $('#num-add-form').removeClass('hidden');
            });
    });
    $('#btn-undo-update-num').click(function()
    {
        $('#num-update-form').remove();
        $('#num-add-form').removeClass('hidden');
    });
    $('#btn-add-num').click(function(){
        var numero = $('#num-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateTelephones"}{literal}', {'numero':numero, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#telephoneList').html(data);
            });
    });
});
</script>
{/literal}