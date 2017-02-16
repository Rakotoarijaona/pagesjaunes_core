	{if (isset($toAds) && (isset ($toAds['300x600'])))}
	<div id="carouselAds1">
	    <div class="owl-carousel" style="width: 300px; height:600px">
			{foreach ($toAds['300x600'] as $oAds)}
	        <div class="item" style="width: 300px; height:600px">
	        	<img src="{$j_basepath}publicites/big/{$oAds->images}" style="width: 300px; height:600px">
	        </div>
	        {/foreach}
	    </div>
    </div>
	{elseif (!empty($toAdsDefault))}
		{if null != $toAdsDefault['300x600']}
		<figure>
			<img src="{$j_basepath}publicites/big/{$toAdsDefault['300x600']->images}">
		</figure>
		{/if}
    {/if}
	<br/>	
	{if (isset($toAds) && (isset($toAds['300x300'])))}
	<div id="carouselAds2">
	    <div class="owl-carousel" style="width: 300px; height:600px">
			{foreach ($toAds['300x300'] as $oAds)}
	        <div class="item" style="width: 300px; height:300px" >
	        	<img src="{$j_basepath}publicites/big/{$oAds->images}" style="width: 300px; height:300px">
	        </div>
	        {/foreach}
	    </div>
    </div>
	{elseif (!empty($toAdsDefault))}
		{if null != $toAdsDefault['300x300']}
		<figure>
			<img src="{$j_basepath}publicites/big/{$toAdsDefault['300x300']->images}">
		</figure>
		{/if}
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