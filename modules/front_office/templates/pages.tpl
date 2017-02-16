{$COMMONSCRIPT}
<main class="pro-about">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="{jurl 'front_office~default:index'}">Accueil</a></li>
			<li class="active"><strong>{$oPage->title}</strong></li>
		</ol>
		{$oPage->content}
		{if ($oPage->ads_zone == 0)}
		<div class="col-md-4">
			{$ADS_ZONE}
		</div>
		{/if}
	</div>
</main>
