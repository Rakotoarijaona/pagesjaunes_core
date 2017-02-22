    {*<!--<a class="owl-print" target="_blank" href="{jurl 'front_office~default:adsprint',array('print'=>$oAds->id,'default' => 0, $oAds->banner)}"><i class="fa fa-print"></i>imprimer</a>-->*}
    {if (!empty($bottom_target))}
    <div class="ads" id="carouselAds1">
        <div class="owl-carousel" style="width: 300px; height:600px">
            {foreach ($bottom_target as $oAds)}
                <div class="item" style="width: 300px; height:600px">
                    {if isset($oAds->banner)}
                        <a target="_blank"  class="item_link" id="{$oAds->id},0"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 0)}">
                            <img src="{$j_basepath}publicites/big/{$oAds->banner}" style="width: 300px; height:600px">
                        </a>
                    {else}
                        {if ($oAds->type==1)}
                            <a target="_blank"  class="item_link" id="{$oAds->id},1"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 1)}">
                                <img src="{$j_basepath}publicites/big/{$oAds->image}" style="width: 300px; height:600px">
                            </a>
                        {else}
                            <a target="_blank"  class="item_link" id="{$oAds->id},1"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 1)}">
                            </a>
                        {/if}
                    {/if}
                </div>
            {/foreach}
        </div>
    </div>
    {/if}
    <br/>
    {if (!empty($bottom_standard))}
    <div class="ads" id="carouselAds2">
        <div class="owl-carousel" style="width: 300px; height:300px">
            {foreach ($bottom_standard as $oAds)}
                <div class="item" style="width: 300px; height:300px">
                    {if isset($oAds->banner)}
                        <a target="_blank"  class="item_link" id="{$oAds->id},0"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 0)}">
                            <img src="{$j_basepath}publicites/big/{$oAds->banner}" style="width: 300px; height:300px">
                        </a>
                    {else}
                        {if ($oAds->type==1)}
                            <a target="_blank" class="item_link" id="{$oAds->id},1"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 1)}">
                                <img src="{$j_basepath}publicites/big/{$oAds->image}" style="width: 300px; height:300px">
                            </a>
                        {else}
                            <a target="_blank"  class="item_link" id="{$oAds->id},1"  href="{jurl 'front_office~default:tracker',array('click' => $oAds->id, 'default' => 1)}">
                            </a>
                        {/if}
                    {/if}
                </div>
            {/foreach}
        </div>
    </div>
    {/if}

    <br/>
    <script type="text/javascript">
    {literal}
    $(document).ready(function()
    {

        $('.owl-carousel', '#carouselAds1').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            freeDrag: false,
            items:100,
            dots:false,
            navText : false,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true
        });
        $('.owl-carousel', '#carouselAds2').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            freeDrag: false,
            items:1,
            dots:false,
            navText : false,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true
        });
    });
    {/literal}
    </script>