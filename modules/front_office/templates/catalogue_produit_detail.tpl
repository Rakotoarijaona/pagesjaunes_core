<div class="catalogue-produit" style="width: 100%">
	<div class="row">
		<div class="col-sm-7">
			<figure>
                <img src="{$j_basepath}entreprise/produits/{$oCatalogue->image_produit}">
            </figure>
		</div>
		<div class="col-sm-5">
			<h3>{$oCatalogue->nom_produit|upper}</h3>
			<div class="ref">(Réf: {$oCatalogue->reference_produit})</div>
			<div><strong>MARQUE : </strong> {$oCatalogue->marque_produit}</div>
            <p class="prix">AR {$oCatalogue->prix_produit}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			{$oCatalogue->description_produit}
		</div>
	</div>
</div>