{$COMMONSCRIPT}

<main>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{jurl 'front_office~default:index'}">Accueil</a></li>
            <li><a href="#">Fiche détail entreprise</a></li>
            <li><a href="{jurl 'front_office~fiche_details', array('entreprise'=>$oEntreprise->id)}">{$oEntreprise->raisonsociale|upper}</a></li>
            <li class="active"><strong>Catalogue</strong></li>
        </ol>

        <div class="row">
            <div class="col-md-8">
	            <div class="result-wrapper catalog-result">
		            <ul class="row result-list">
                		{foreach $oEntreprise->getCataloguesList() as $oCatalogue}

						<li>
				            <div class="result-item clearfix">
					            <figure><img src="{$j_basepath}entreprise/produits/{$oCatalogue->image_produit}"></figure>
					            <div class="infos">
						            <h3>{$oCatalogue->nom_produit|upper}</h3>
							        <p class="marque"><strong>Marque : </strong> {$oCatalogue->description_produit}</p>
					            </div>
					            <p class="prix">AR {$oCatalogue->prix_produit}</p>
                                <a href="#product_detail{$oCatalogue->id}" class="btn btn-default fancybox-detail">+ détail produit</a>
				            	<div style="display: none;">
                                    <div style="display: none;">
                                        <div class="catalog-detail" id="product_detail{$oCatalogue->id}">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <figure><img src="{$j_basepath}entreprise/produits/{$oCatalogue->image_produit}"></figure>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h3>{$oCatalogue->nom_produit|upper}</h3>
                                                    <span class="reference">(Réf: {$oCatalogue->reference_produit})</span>
                                                    <p>
                                                        <strong>MARQUE : </strong> {$oCatalogue->marque_produit}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="prix">AR {$oCatalogue->prix_produit}</div>
                                            <div class="description">
                                               {$oCatalogue->description_produit}
                                            </div>
                                        </div>
                                    </div>
                                </div>
					        </div>
			            </li>
			            {/foreach}
			            <!-- ici fin iteration produit  -->
		            </ul>


					<!-- Pagination -->
                    <nav>
						<!--
                        <ul class="pagination">
                            <li>
                                <?php 
									//if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $oResultSearch)); 
									//wp_reset_postdata();
								?>
                            </li>
                        </ul>
						-->						
                    </nav>
	            </div>
                
            </div>
        </div>
    </div>
</main>