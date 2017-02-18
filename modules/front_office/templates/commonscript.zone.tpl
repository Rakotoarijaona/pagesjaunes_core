<script src="{$j_basepath}frontlibraries/javascripts/jquery-2.1.1.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/jquery-ui.custom.min.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/jquery-ui-1.10.4.min.js"></script>
<!-- Jquery Validate -->
<script src="{$j_basepath}adminlibraries/js/plugins/validate/jquery.validate.min.js"></script>
<script src="{$j_basepath}adminlibraries/js/plugins/validate/additional-methods.js"></script>

<script src="{$j_basepath}frontlibraries/javascripts/owl.carousel.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/jquery.fancybox.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/jquery.fancybox-media.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/tinymce/js/tinymce/plugins/codesample/plugin.dev.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/pjm_tinyMce.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/bootstrap.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/bootstrap-select.min.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/sweetalert/sweetalert.min.js"></script> 

<!-- select2 -->
<script src="{$j_basepath}frontlibraries/javascripts/select2/dist/js/select2.full.min.js"></script>
<script src="{$j_basepath}frontlibraries/javascripts/select2/dist/js/i18n/fr.js"></script>

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
        items:1,
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

    $("#s").select2({
        tags: true,
        placeholder: "Entreprise, produit, marque, service, region ...",
        tokenSeparators: [',']
    });

    $('#s').select2({
        placeholder: 'Entreprise, produit, marque, région, adresse, téléphone',
        tags: true,
        tokenSeparators: [','],
        minimumInputLength: 3,
        ajax: {
            dataType: 'json',
            url: {/literal}{urljsstring 'front_office~default:autoComplSearch'}{literal},
            delay:250,
            data: function (params) {
                return {q: params.term, selected: $('#s').val()}
            },
            processResults: function (data) {
                return {results: data}
            }
        },
    });

});

{/literal}
</script>
<script src="{$j_basepath}frontlibraries/javascripts/common.js"></script>