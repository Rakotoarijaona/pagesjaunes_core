{$COMMONSCRIPT}

<main>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{jurl 'front_office~default:index'}">Accueil</a></li>
            <li><a href="#">Fiche détail entreprise</a></li>
            <li class="active"><strong>{$oEntreprise->raisonsociale|upper}</strong></li>
        </ol>
        <div class="detail-wrapper">
            <div class="detail-description clearfix">
                <div class="row">
                    <div class="col-md-8">
                        <div class="desc-long">
                            {if ($oEntreprise->video_presentation_active == '1' && $oEntreprise->video_presentation != '')}
                            <h1>{$oEntreprise->raisonsociale|upper}
                                <span>{$oEntreprise->souscategoriesListToStringFiche()}</span>
                            </h1>
                            <figure class="animation">
                                <div class="flowplayer minimal" data-ratio="0.42" data-autoplay="true">
                                    <video id="videopresentation" width="600" height="250" controls="false" autoplay="autoplay" loop="loop">
                                        <source src="{$j_basepath}entreprise/videos/{$oEntreprise->video_presentation}" type="video/mp4">
                                    </video>
                                </div>
                            </figure>
                            <p>{$oEntreprise->activite|upper}</p>
                            {elseif ($oEntreprise->logo != '')}
                            <div class="clearfix">
                                <figure class="logo"><img style="max-width: 240px; max-height: 240px" src="{$j_basepath}entreprise/images/{$oEntreprise->logo}" alt="{$oEntreprise->logo}" title="{$oEntreprise->logo}"></figure>
                                <h1>{$oEntreprise->raisonsociale|upper}
                                    <span>{$oEntreprise->souscategoriesListToStringFiche()}</span>
                                </h1>
                                <p>{$oEntreprise->activite|upper}</p>
                            </div>
                            {else}
                            <div class="clearfix">
                                <figure class="logo"><img src="{$j_basepath}icones/{$oEntreprise->getCategorieIcon()}" alt="{$oEntreprise->getCategorieIcon()}" title="{$oEntreprise->getCategorieIcon()}"></figure>
                                <h1>{$oEntreprise->raisonsociale|upper}
                                    <span>{$oEntreprise->souscategoriesListToStringFiche()}</span>
                                </h1>
                                <p>{$oEntreprise->activite|upper}</p>
                            </div>
                            {/if}
                            <div class="clearfix">
                                <div class="share-wrapper">
                                </div>
                            </div>
                            {if ((sizeof ($oEntreprise->getServiceList())>0)||(sizeof ($oEntreprise->getProduitList())>0)||(sizeof ($oEntreprise->getMarqueList())>0))}
                            <hr>
                            {/if}
                            {if sizeof ($oEntreprise->getServiceList())>0}
                                {assign $servicesList = $oEntreprise->getServiceList()}
                                <div class="service-wrapper">
                                    <h3>Services</h3>
                                    <ul>
                                    {foreach $servicesList as $indexService => $service}
                                        {if ($indexService != 0 && $indexService%3 == 0)}
                                            </ul>
                                            <ul>
                                        {/if}
                                        <li class="col-sm-4">
                                            {$service}
                                        </li>
                                    {/foreach}
                                </div>
                            {/if}
                            {if sizeof ($oEntreprise->getProduitList())>0}
                                {assign $productsList = $oEntreprise->getProduitList()}
                                <div class="service-wrapper">
                                    <h3>Produits</h3>
                                    <ul>
                                    {foreach $productsList as $indexProduct => $product}
                                        {if ($indexProduct != 0 && $indexProduct%3 == 0)}
                                        </ul>
                                        <ul>
                                        {/if}
                                        <li class="col-sm-4">
                                            {$product}
                                        </li>
                                    {/foreach}
                                </div>
                            {/if}
                            {if sizeof ($oEntreprise->getMarqueList())>0}
                                {assign $entreprisesList = $oEntreprise->getMarqueList()}
                                <div class="service-wrapper">
                                    <h3>Marques</h3>
                                    <ul>
                                    {foreach $entreprisesList as $indexEntreprise => $entreprise}
                                        {if ($indexEntreprise != 0 && $indexEntreprise%3 == 0)}
                                        </ul>
                                        <ul>
                                        {/if}
                                        <li class="col-sm-4">
                                            {$entreprise}
                                        </li>
                                    {/foreach}
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="col-md-4 float-right">
                        <div class="contact-infos">
                            {if ($oEntreprise->adresse != '')}
                            <p class="info-item">
                                <i class="fa fa-home"></i>
                                <span>{$oEntreprise->adresse}</span>
                            </p>
                            {/if}
                            {if sizeof ($oEntreprise->getTelephones()) > 0}
                            <p class="info-item">
                                <i class="fa fa-phone"></i>
                                <span>
                                    {foreach $oEntreprise->getTelephones() as $telephone}
                                        {$telephone}<br> 
                                    {/foreach} 
                                </span>
                            </p>
                            {/if}
                            {if sizeof ($oEntreprise->getEmails()) > 0}
                            <p class="info-item">
                                <i class="fa fa-envelope"></i>
                                <span>
                                    {foreach $oEntreprise->getEmails() as $email}
                                        <a href="mailto:{$email}">{$email}</a><br> 
                                    {/foreach} 
                                </span>
                            </p>
                            {/if}
                            {if ($oEntreprise->url_website != '')}
                            <p class="info-item">
                                <i class="fa fa-globe"></i>
                                <span><a href="http://{$oEntreprise->url_website}" target="_blank" title="{$oEntreprise->url_website}">Visiter notre site web</a></span>
                            </p>
                            {/if}
                        </div>
                        {if ($oEntreprise->latitude != '' && $oEntreprise->longitude != '')}
                        <!-- google map -->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGufa7f5AmTVVgdiEiwWclJzry3CYKw_k"></script>
                        <div class="google-map" id="map" style="height:310px"></div>
                        {/if}
                    </div>
                </div>
            </div> 
            <!-- fin div description-->
            <!-- accordion -->
            <!-- Qui sommes-nous -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                {if(($oEntreprise->qui_sommes_nous_active == 1) &&  ($oEntreprise->qui_sommes_nous != ''))}
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h2 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-plus-square"></i><i class="fa fa-minus-square"></i>
                                Qui sommes-nous ?
                            </a>
                        </h2>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            {$oEntreprise->qui_sommes_nous}
                        </div>
                    </div>
                </div>
                {/if}

                <!-- Nos services -->
                {if(($oEntreprise->nos_services_active == 1) &&  ($oEntreprise->nos_services != ''))}
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h2 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-plus-square"></i><i class="fa fa-minus-square"></i>
                                Nos services
                            </a>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            {$oEntreprise->nos_services}
                        </div>
                    </div>
                </div>
                {/if}

                <!-- Nos réference -->
                {if(($oEntreprise->nos_references_active == 1) &&  ($oEntreprise->nos_references != ''))}
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h2 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa fa-plus-square"></i><i class="fa fa-minus-square"></i>
                                Nos références
                            </a>
                        </h2>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            {$oEntreprise->nos_references}
                        </div>
                    </div>
                </div>
                {/if}
                {if(($oEntreprise->catalogue_active == 1) &&  (sizeof($oEntreprise->getCataloguesList())>0))}
                <!-- catalogue -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h2 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fa fa-plus-square"></i><i class="fa fa-minus-square"></i>
                                Notre catalogue
                            </a>
                        </h2>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="result-wrapper layout-list catalogue-list">

                                <!-- debut boucle -->
                                {foreach $oEntreprise->getCataloguesListLast(3) as $oCatalogue}
                                <ul class="row result-list">
                                    <li>
                                        <div class="result-item">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="clearfix">
                                                        <figure>
                                                            <img src="{$j_basepath}entreprise/produits/{$oCatalogue->image_produit}" alt="{$oCatalogue->image_produit}" title="{$oCatalogue->image_produit}">
                                                        </figure>
                                                        <div class="infos">
                                                            <h3>{$oCatalogue->nom_produit|upper}</h3>
                                                            <p class="desc">{$oCatalogue->description_produit}</p>
                                                            <div><strong>MARQUE : </strong> {$oCatalogue->marque_produit}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2 actions">
                                                    <p class="prix">AR {$oCatalogue->prix_produit}</p>
                                                    <a href="#product_detail{$oCatalogue->id}" class="btn btn-default fancybox-detail">+ détail produit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: none;">
                                            <div class="catalog-detail" id="product_detail{$oCatalogue->id}">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <figure><img src="{$j_basepath}entreprise/produits/{$oCatalogue->image_produit}" alt="{$oCatalogue->image_produit}" title="{$oCatalogue->image_produit}"></figure>
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

                                    </li>
                                </ul>
                                {/foreach}

                                <div class="btn-wrapper"><a href="{jurl 'front_office~catalogue', array('entreprise'=>$oEntreprise->id)}" class="btn btn-default btn-catalogue">Acceder à notre catalogue complet</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                {/if}
                <!-- fin catalogue --> 
            </div>
            <!-- /accordion -->
            <!-- Media -->
            {if(($oEntreprise->videos_active == 1) && (sizeof($oEntreprise->getVideosYoutubeList()) > 0))}
            <!-- Media video -->
            <div class="bloc-media">
                <h2><i class="fa fa-film"></i> Vidéos</h2>
                <div class="owl-carousel owl-theme video-list owl-loaded owl-drag">
                    {foreach($oEntreprise->getVideosYoutubeList() as  $video)}
                    <div class="item"><a href="{$video->url_youtube}" class="video-th"><img src="{$j_basepath}entreprise/vignetteYoutube/{$video->vignette_video}" width="200" height="145" alt="{$video->vignette_video}" title="{$video->vignette_video}"></a></div>
                    {/foreach}
                </div>
            </div>
            {/if}
            {if(($oEntreprise->galerie_image_active == 1) && (sizeof($oEntreprise->getImagesGalerieList()) > 0))} 
            <!-- Media photo -->
            <div class="bloc-media">
                <h2><i class="fa fa-camera-retro"></i> Galérie photos</h2>
                <div class="owl-carousel owl-theme">
                    {foreach($oEntreprise->getImagesGalerieList() as  $image)}
                        <div class="item"><a class="fancybox" rel="gallery1" href="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$image->image}"><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$image->image}" width="145" height="145" alt="{$image->image}" title="{$image->image}"></a></div>
                    {/foreach}
                </div>
            </div>
            {/if}
            <!-- /Media -->
        </div>
    </div>
</main>
<div id="produit" style="width:"></div>
{literal}

<script type="text/javascript">
    
    var latitude = "{/literal}{$oEntreprise->latitude}{literal}";
    var longitude = "{/literal}{$oEntreprise->longitude}{literal}";
    google.maps.event.addDomListener(window, 'load', initMap(latitude,longitude));
    var map;
    function initMap(latitude, longitude) {
        var myLatLng;
        if (latitude != "" && longitude !="")
        {
            myLatLng = new google.maps.LatLng(latitude, longitude);
            $('#mapLatitude').text(latitude);
            $('#mapLongitude').text(longitude);
            $('#googleMapLatitude').val(latitude);
            $('#googleMapLongitude').val(longitude);
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: myLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: "{/literal}{$j_basepath}{literal}frontlibraries/images/map-pin.png"
            });
        }
    }
</script>
<script type="text/javascript">
    function product_detail(id)
    {
        $.ajax({
            type: 'POST',
            url: '{/literal}{jurl "front_office~default:produit_detail"}{literal}?id='+id,
            processData: false,
            contentType: false,
            success: function(data) { 
                $('.fancybox-inner').html(data);
            },
            error: function() {
            }   // tell jQuery not to set contentType
        });
    }
</script>
{/literal}