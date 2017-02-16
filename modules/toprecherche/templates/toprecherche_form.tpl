{if sizeof($toEntreprise)>0}
<div class="row">
	<div class="col-sm-5">
	<ul class="entreprise-list">	
		{foreach ($toEntreprise as $oEntreprise)}
		<li class="" data-value="{$oEntreprise->id}" id="li{$oEntreprise->id}">{$oEntreprise->raisonsociale}</li>
		{/foreach}
	</ul>
	</div>
	<div class="col-sm-7">
		<div class="row top-list">
			<label>Top 1</label>
			<button type="button" id="add-top1" class="btn-add btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></button>
			<button type="button" id="remove-top1"  class="btn-remove btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></button>
			{if ($oToprecherche != '')}
			<input type="hidden" id="toprecherche1" name="toprecherche1" value="{$oToprecherche->getTop1()->id}">
			<label class="top-item" id="toprecherche1Label">
				{$oToprecherche->getTop1()->raisonsociale}			
			</label>
			{else}
			<input type="hidden" id="toprecherche1" name="toprecherche1">
			<label class="top-item" id="toprecherche1Label">	
			</label>
			{/if}
		</div>
		<div class="row top-list">
			<label>Top 2</label>
			<button type="button" id="add-top2" class="btn-add btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></button>
			<button type="button" id="remove-top2" class="btn-remove btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></button>
			{if ($oToprecherche != '')}
			{if ($oToprecherche->getTop2() != '')}
			<input type="hidden" id="toprecherche2" name="toprecherche2" value="{$oToprecherche->getTop2()->id}">
			<label class="top-item" id="toprecherche2Label">
				{$oToprecherche->getTop2()->raisonsociale}			
			</label>
			{/if}
			{else}
			<input type="hidden" id="toprecherche2" name="toprecherche2">
			<label class="top-item" id="toprecherche2Label">	
			</label>
			{/if}
		</div>
		<div class="row top-list">
			<label>Top 3</label>
			<button type="button" id="add-top3" class=" btn-add btn btn-sm btn-success"><i class="fa fa-arrow-right"></i></button>
			<button type="button" id="remove-top3" class="btn-remove btn btn-sm btn-success"><i class="fa fa-arrow-left"></i></button>
			{if ($oToprecherche != '')}
			{if ($oToprecherche->getTop3() != '')}
			<input type="hidden" id="toprecherche3" name="toprecherche3" value="{$oToprecherche->getTop3()->id}">
			<label class="top-item" id="toprecherche3Label">
				{$oToprecherche->getTop3()->raisonsociale}			
			</label>
			{/if}
			{else}
			<input type="hidden" id="toprecherche3" name="toprecherche3">
			<label class="top-item" id="toprecherche3Label">	
			</label>
			{/if}
		</div>
	</div>
</div>
{else}
<div class="alert alert-info">Aucune entreprise n'est associée à cette sous-catégorie</div>
{/if}
{literal}
<script type="text/javascript">
$(document).ready(function()
{
	removeClassSelected();
	if ($('#toprecherche1').val() != '')
	{
		var value1 = $('#toprecherche1').val();
		var li_select1 = '#li'+value1;
	}
	$(".entreprise-list li").click(function()
	{
		removeClassSelected();
		$(this).addClass('selected');
	});
	$('#add-top1').click(function()
	{
		addTop1();
	});
	$('#remove-top1').click(function()
	{
		removeTop1();
	});
	$('#add-top2').click(function()
	{
		addTop2();
	});
	$('#remove-top2').click(function()
	{
		removeTop2();
	});
	$('#add-top3').click(function()
	{
		addTop3();
	});
	$('#remove-top3').click(function()
	{
		removeTop3();
	});
});
function removeClassSelected()
{
	$('.entreprise-list li').each(function()
	{
		$(this).removeClass('selected');
	});	
}
function addTop1()
{
	var value = $('.entreprise-list .selected').data('value');
	var text = $('.entreprise-list .selected').text();
	var elSelected = $('.entreprise-list .selected');
	removeTop1();
	if($("#toprecherche2").val() == value)
	{
		removeTop2();
	}
	if($("#toprecherche3").val() == value)
	{
		removeTop3();
	}
	$("#toprecherche1").val(value);
	$("#toprecherche1Label").text(text);
	elSelected.removeClass('selected');
}
function removeTop1()
{	
	var value = $('#toprecherche1').val();
	$("#toprecherche1").val('');
	$('#toprecherche1Label').text('');
	removeClassSelected();
}
function addTop2()
{
	value = $('.entreprise-list .selected').data('value');
	var text = $('.entreprise-list .selected').text();
	var elSelected = $('.entreprise-list .selected');
	removeTop2();
	if($("#toprecherche1").val() == value)
	{
		removeTop1();
	}
	if($("#toprecherche3").val() == value)
	{
		removeTop3();
	}
	$("#toprecherche2").val(value);
	$("#toprecherche2Label").text(text);
	elSelected.removeClass('selected');
}
function removeTop2()
{
	$("#toprecherche2").val('');
	$('#toprecherche2Label').text('');
	removeClassSelected();
}
function addTop3()
{
	var value = $('.entreprise-list .selected').data('value');
	var text = $('.entreprise-list .selected').text();
	var elSelected = $('.entreprise-list .selected');
	removeTop3();
	if($("#toprecherche2").val() == value)
	{
		removeTop2();
	}
	if($("#toprecherche1").val() == value)
	{
		removeTop1();
	}
	$("#toprecherche3").val(value);
	$("#toprecherche3Label").text(text);
	elSelected.removeClass('selected');
}
function removeTop3()
{
	$("#toprecherche3").val('');
	$('#toprecherche3Label').text('');
	removeClassSelected();
}
</script>
{/literal}