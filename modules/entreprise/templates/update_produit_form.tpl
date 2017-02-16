<div id="produit-add-form" class="input-group hidden">
    <input type="text" id="produit-input" class="input-text form-control"> 
    <span class="input-group-btn">
        <input type="hidden" name="new-produit" value=""/>
        <button type="button" id="btn-add-produit" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-plus"></i></button>
    </span>
</div>
<div id="produit-update-form" class="input-group">
	<input type="text" class="input-text form-control" value="{$oProduit->name}"> 
    <span class="input-group-btn"> 
        <button type="button" id="btn-update-produit" data-produit-id="{$oProduit->id}" data-entreprise-id="{$entrepriseId}" class="btn btn-success"><i class="fa fa-check"></i></button>
        <button type="button" id="btn-undo-update-produit" class="btn btn-success btn-outline"><i class="fa fa-reply"></i></button>
    </span>
</div>
{literal}
<script>
$(document).ready(function() {
    $('#btn-update-produit').click(function()
    {
        var produitId = $(this).data('produit-id');
        var name = $('#produit-update-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "update";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateProduits"}{literal}', {'produitId':produitId, 'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#produitList').html(data);
            $('#produit-update-form').remove();
            $('#produit-add-form').removeClass('hidden');
            });
    });
    $('#btn-undo-update-produit').click(function()
    {
        $('#produit-update-form').remove();
        $('#produit-add-form').removeClass('hidden');
    });
    $('#btn-add-produit').click(function(){
        var name = $('#produit-add-form .input-text').val();
        var entrepriseId = $(this).data('entreprise-id');
        var operation = "insert";
        $.post('{/literal}{jfullurl "entreprise~entreprise:updateProduits"}{literal}', {'name':name, 'entrepriseId': entrepriseId, 'operation': operation}, function(data) {
            $('#produitList').html(data);
            });
    });
});
</script>
{/literal}