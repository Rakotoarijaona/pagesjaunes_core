<div id="marque-add-form" class="input-group hidden">
    <input type="text" id="marque-input" class="input-text form-control"> 
    <span class="input-group-btn">
        <input type="hidden" name="new-marque" value=""/>
        <button type="button" id="btn-add-marque" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-plus"></i></button>
    </span>
</div>
<div id="marque-update-form" class="input-group">
	<input type="text" class="input-text form-control" value="{$oMarque->name}"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-update-marque" data-marque-id="{$oMarque->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="button" id="btn-undo-update-marque" class="btn btn-success btn-outline"><i class="fa fa-reply"></i></button>
    </span>
</div>
{literal}
<script>
$(document).ready(function() {
    $('#btn-update-marque').click(function()
    {
        var marqueId = $(this).data('marque-id');
        var name = $('#marque-update-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "update";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateMarques"}{literal}', {'marqueId':marqueId, 'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#marqueList').html(data);
            $('#marque-update-form').remove();
            $('#marque-add-form').removeClass('hidden');
            });
    });
    $('#btn-undo-update-marque').click(function()
    {
        $('#marque-update-form').remove();
        $('#marque-add-form').removeClass('hidden');
    });
    $('#btn-add-marque').click(function(){
        var name = $('#marque-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateMarques"}{literal}', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#marqueList').html(data);
            });
    });
});
</script>
{/literal}