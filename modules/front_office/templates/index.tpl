{$COMMONSCRIPT}

<!-- SLIDER -->
<section class="slider">
    <div class="owl-carousel">
        {if (sizeof ($toListSlideshow)>0)}
        {foreach ($toListSlideshow as $slide)}
        <div class="item  layout-{$slide->zSlideshow_contentposition}" style="background-image: url('{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$slide->zSlideshow_visuelbackground}')">
            <div class="pattern-overlay"></div>
            {if ($slide->iSlideshow_imageonly == 0)}
            <div class="carousel-table">
                <div class="carousel-cell layout-left">
                    <div class="container">
                        <!--<p class="item-category"><span>Industries agro-alimentaire</span></p>-->
                        <h2>{$slide->zSlideshow_titre}</h2>
                        <div class="descritpion">{$slide->zSlideshow_introductiontext}</div>
                        {if (($slide->zSlideshow_urlpage != '')&&($slide->zSlideshow_urlpage != '[fiche]')) }
                        <p class="button"><a href="$slide->slideshow_urlpage" title="Découvir" class="btn-default">{$slide->zSlideshow_buttontitle}</a></p>
                        {elseif (($slide->zSlideshow_urlpage == '[fiche]')&&($slide->iSlideshow_entrepriseId != '')) }
                        <p class="button"><a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $slide->iSlideshow_entrepriseId)}" title="Découvir" class="btn-default">{$slide->zSlideshow_buttontitle}</a></p>
                        {/if}
                    </div>
                </div>
            </div>
            {/if}
        </div>
        {/foreach}
        {/if}
    </div>
</section>
<main>
    <section class="sticky-annonce">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="sticky-box"><!-- ['#ff0000','#ff9900','#2200cc','#00CC00','#8800cc','#0099cc'] -->
                        <h2>Les plus consultés</h2>
                        <ul>
                            {if sizeof($toEntreprisePlusConsulte)>0}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntreprisePlusConsulte[0]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom1[0]]};" title="{$toEntreprisePlusConsulte[0]->raisonsociale}">
                                    {if ($toEntreprisePlusConsulte[0]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntreprisePlusConsulte[0]->logo}" alt="{$toEntreprisePlusConsulte[0]->logo}" title="{$toEntreprisePlusConsulte[0]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntreprisePlusConsulte[0]->getCategorieIcon()}" alt="{$toEntreprisePlusConsulte[0]->getCategorieIcon()}" title="{$toEntreprisePlusConsulte[0]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntreprisePlusConsulte[0]->raisonsociale}</h3>
                                    <p>{$toEntreprisePlusConsulte[0]->souscategoriesListToStringHome()} {$toEntreprisePlusConsulte[0]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}

                            {if sizeof($toEntreprisePlusConsulte)>1}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntreprisePlusConsulte[1]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom1[1]]};" title="{$toEntreprisePlusConsulte[1]->raisonsociale}">
                                    {if ($toEntreprisePlusConsulte[1]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntreprisePlusConsulte[1]->logo}" alt="{$toEntreprisePlusConsulte[1]->logo}" title="{$toEntreprisePlusConsulte[1]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntreprisePlusConsulte[1]->getCategorieIcon()}" alt="{$toEntreprisePlusConsulte[1]->getCategorieIcon()}" title="{$toEntreprisePlusConsulte[1]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntreprisePlusConsulte[1]->raisonsociale}</h3>
                                    <p>{$toEntreprisePlusConsulte[1]->souscategoriesListToStringHome()} {$toEntreprisePlusConsulte[1]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}

                            {if sizeof($toEntreprisePlusConsulte)>2}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntreprisePlusConsulte[2]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom1[2]]};" title="{$toEntreprisePlusConsulte[2]->raisonsociale}">
                                    {if ($toEntreprisePlusConsulte[2]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntreprisePlusConsulte[2]->logo}" alt="{$toEntreprisePlusConsulte[2]->logo}" title="{$toEntreprisePlusConsulte[2]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntreprisePlusConsulte[2]->getCategorieIcon()}" alt="{$toEntreprisePlusConsulte[2]->getCategorieIcon()}" title="{$toEntreprisePlusConsulte[2]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntreprisePlusConsulte[2]->raisonsociale}</h3>
                                    <p>{$toEntreprisePlusConsulte[2]->souscategoriesListToStringHome()} {$toEntreprisePlusConsulte[2]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="sticky-box">
                        <h2>LES DERNIERS AJOUTS</h2>
                        <ul>
                            {if sizeof($toEntreprisePlusConsulte)>0}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntrepriseDernierAjoute[0]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom2[0]]};" title="{$toEntrepriseDernierAjoute[0]->raisonsociale}">
                                    {if ($toEntrepriseDernierAjoute[0]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntrepriseDernierAjoute[0]->logo}" alt="{$toEntrepriseDernierAjoute[0]->logo}" title="{$toEntrepriseDernierAjoute[0]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntrepriseDernierAjoute[0]->getCategorieIcon()}" alt="{$toEntrepriseDernierAjoute[0]->getCategorieIcon()}" title="{$toEntrepriseDernierAjoute[0]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntrepriseDernierAjoute[0]->raisonsociale}</h3>
                                    <p>{$toEntrepriseDernierAjoute[0]->souscategoriesListToStringHome()} {$toEntrepriseDernierAjoute[0]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}

                            {if sizeof($toEntreprisePlusConsulte)>1}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntrepriseDernierAjoute[1]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom2[1]]};" title="{$toEntrepriseDernierAjoute[1]->raisonsociale}">
                                    {if ($toEntrepriseDernierAjoute[1]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntrepriseDernierAjoute[1]->logo}" alt="{$toEntrepriseDernierAjoute[1]->logo}" title="{$toEntrepriseDernierAjoute[1]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntrepriseDernierAjoute[1]->getCategorieIcon()}" alt="{$toEntrepriseDernierAjoute[1]->getCategorieIcon()}" title="{$toEntrepriseDernierAjoute[1]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntrepriseDernierAjoute[1]->raisonsociale}</h3>
                                    <p>{$toEntrepriseDernierAjoute[1]->souscategoriesListToStringHome()} {$toEntrepriseDernierAjoute[1]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}

                            {if sizeof($toEntreprisePlusConsulte)>2}
                            <li>
                                <a href="{jurl 'front_office~default:fiche_details', array('entreprise' => $toEntrepriseDernierAjoute[2]->id)}" class="clearfix" style="border-left-color: {$stickycolor[$stickyrandom2[2]]};" title="{$toEntrepriseDernierAjoute[2]->raisonsociale}">
                                    {if ($toEntrepriseDernierAjoute[2]->logo != '')}
                                    <figure><img src="{$j_basepath}entreprise/images/{$toEntrepriseDernierAjoute[2]->logo}" alt="{$toEntrepriseDernierAjoute[2]->logo}" title="{$toEntrepriseDernierAjoute[2]->logo}"></figure>
                                    {else}
                                    <figure><img src="{$j_basepath}icones/{$toEntrepriseDernierAjoute[2]->getCategorieIcon()}" alt="{$toEntrepriseDernierAjoute[2]->getCategorieIcon()}" title="{$toEntrepriseDernierAjoute[2]->getCategorieIcon()}"></figure>
                                    {/if}
                                    <h3>{$toEntrepriseDernierAjoute[2]->raisonsociale}</h3>
                                    <p>{$toEntrepriseDernierAjoute[2]->souscategoriesListToStringHome()} {$toEntrepriseDernierAjoute[2]->activite|lower|ufirst}</p>
                                </a>
                            </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-parallax" style="background-image: url('{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oHomepageContent->background_parallax}')">
        <div class="pattern-overlay"></div>
        <div class="parallax-inner">
            <div class="container">
                <h3>{$oHomepageContent->titre_parallax}</h3>
                <hr>
                {$oHomepageContent->description_parallax}
            </div>
        </div>
    </section>
    {if $oHomepageContent->position_image_reference == 0}
    <section class="two-col">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1"><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oHomepageContent->image_reference}" alt="{$oHomepageContent->image_reference}" title="{$oHomepageContent->image_reference}"></div>
                <div class="col-sm-4">
                    <h3>{$oHomepageContent->titre_reference}</h3>
                    {$oHomepageContent->description_reference}
                </div>
            </div>
        </div>
    </section>
    {else}
    <section class="two-col">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <h3>{$oHomepageContent->titre_reference}</h3>
                    {$oHomepageContent->description_reference}
                </div>
                <div class="col-sm-6 col-sm-offset-1"><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oHomepageContent->image_reference}" alt="{$oHomepageContent->image_reference}" title="{$oHomepageContent->image_reference}"></div>
            </div>
        </div>
    </section>
    {/if}
    <section class="bloc-marketing">
        <div class="container">
            <div class="row">
                {if $oHomepageContent->position_image_marketing == 0}
                    <div class="col-sm-6 col-sm-offset-1">
                        <figure class="marketing-fig" ><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oHomepageContent->image_marketing}" alt="{$oHomepageContent->image_marketing}" title="{$oHomepageContent->image_marketing}" width="605" height="411" /></figure>
                        <figure class="marketing-fig" ></figure>
                        <figure class="marketing-fig" ></figure>
                    </div>
                {/if}
                <div class="col-sm-4 col-sm-offset-1">
                    {$oHomepageContent->bloc_marketing}
                </div>
                {if $oHomepageContent->position_image_marketing == 1}
                    <div class="col-sm-6 col-sm-offset-1">
                        <figure class="marketing-fig" ><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oHomepageContent->image_marketing}" alt="{$oHomepageContent->image_marketing}" title="{$oHomepageContent->image_marketing}" width="605" height="411" /></figure>
                        <figure class="marketing-fig" ></figure>
                        <figure class="marketing-fig" ></figure>
                    </div>
                {/if}
            </div>
        </div>
    </section>
</main>