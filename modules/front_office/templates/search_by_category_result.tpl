{$COMMONSCRIPT}

<main>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Résultat de la recherche</a></li>
            <li class="active"><strong>Pour la sous catégorie {$oSouscategorie->name}, {$iNbTotalResult} résultat(s) trouvé(s)</strong></li>
        </ol>
        {if sizeof($toEntreprise)>0}
        <div class="filter-wrapper">
            <div class="row">
                <div class="col-lg-12 m-b">
                    <div class="btn-group layout-result hidden-xs" data-toggle="buttons">
                        <label>Affichage : </label>
                        <label class="btn btn-primary active">
                            <input type="radio" name="layout-option" checked id="layout-list" autocomplete="off" value="1"><i class="fa fa-th-list"></i>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="layout-option" id="layout-thumb" autocomplete="off" value="0"><i class="fa fa-th-large"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {/if}
        <div class="row">
            <div class="col-md-8">
                <div class="result-wrapper layout-list">
                    {if sizeof($toEntreprise)>0}
                    <ul class="row result-list">
                        {foreach $toEntreprise as $oEntreprise}
                        <li>
                            <div class="result-item clearfix">
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $oEntreprise->id)}">
                                    {if $oEntreprise->logo != ''}
                                    <figure><img src="{$j_basepath}entreprise/images/{$oEntreprise->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$oEntreprise->getCategorieIcon()}"></figure>
                                    {/if}
                                    <div class="infos">
                                        <h3>{$oEntreprise->raisonsociale|upper}</h3>
                                        <p class="desc ellipsis">{$oEntreprise->activite|upper}</p>
                                        {if ($oEntreprise->getServiceListText(', ') != '')}
                                            <p class="services"><strong>Services : </strong> {$oEntreprise->getServiceListText(', ')}</p>
                                        {/if}
                                        {if ($oEntreprise->getProduitListText(', ') != '')}
                                            <p class="produits"><strong>Produits : </strong>{$oEntreprise->getProduitListText(', ')}</p>
                                        {/if}
                                    </div>
                                </a>
                                <p class="icons">
                                    {if $oEntreprise->galerie_image_active}
                                    <i class="fa fa-camera-retro"></i> 
                                    {/if}
                                    {if $oEntreprise->videos_active}
                                    <i class="fa fa-film"></i> 
                                    {/if}
                                    {if $oEntreprise->url_website != ''}
                                    <i class="fa fa-globe"></i>
                                    {/if}
                                </p>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $oEntreprise->id)}" class="btn btn-default"><i class="fa fa-phone"></i> Contactez</a>
                            </div>
                        </li>
                        {/foreach}
                    </ul>
                    <!-- Pagination -->
                    {if ($inbPagination > 1)}
                        {$pagination}
                    {/if}
                    <!-- Fin Pagination -->

                    {else}
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title">Pas de résultat trouvé</h1>
                        </header><!-- .page-header -->

                        <div class="page-content">

                            <p>Désolé, aucun résultat correspondant à votre recherche.</p>
                        </div><!-- .page-content -->
                    </section><!-- .no-results -->
                    {/if}
                </div>
            </div>
            <div class="col-md-4">                
                <aside>
                    <div id="the-ad-box" class="ads-panel">
                        {$ADS_ZONE}
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>