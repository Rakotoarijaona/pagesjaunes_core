<div class="main-footer">
    <div class="container">            
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-10 footer-about">
                        <div class="widget">
                            <h3 class="widget-title">A propos</h3>
                            <div class="textwidget">
                                <p><a href="{jurl 'front_office~default:index'}" title="Pages Jaunes Madagascar"><img src="{$j_basepath}frontlibraries/images/logo_pagesjaunes_white.png"></a></p>
                                <p><a href="{jurl 'front_office~default:index'}" style="color:#ffdd00;">www.pagesjaunes.mg</a> est un portail web qui permet aux utilisateurs de chercher des produits et services précis auprès des professionnels inscrits. Pagesjaunes.mg c'est + de 5000 entreprises répertoriées sur 240 domaines d’activités. Informations exactes, à jour et vérifiées auprès des entreprises répértoriées</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 footer-menu">
                <div class="widget">
                    <h3 class="widget-title">Pages jaunes.mg</h3>
                    <div class="textwidget">
                        <ul>
                            <li>
                                <a href="{jurl 'front_office~default:pages',array('p'=>'a-propos')}" title="A Propos">A Propos</a>
                            </li>
                            <li>
                                <a href="{jurl 'front_office~default:pages',array('p'=>'plan-du-site')}" title="Plan du site">Plan du site</a>
                            </li>
                            <li>
                                <a href="{jurl 'front_office~default:pages',array('p'=>'condition-d-utilisation')}" title="Conditions d'utilisations">Conditions d'utilisations</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <h3 class="widget-title">Professionnels</h3>
                    <div class="textwidget">
                        <ul>
                            <li>
                                <a href="{jurl 'front_office~default:inscription'}" title="Souscription pagesjaunes.mg">Souscription pagesjaunes.mg</a>
                            </li>
                            <li>
                                <a href="{jurl 'front_office~default:pages',array('p'=>'annonces-et-publicites')}" title="Annonces et publicités">Annonces et publicités</a>
                            </li>
                            <li>
                                <a href="{jurl 'front_office~default:pages',array('p'=>'espace-pro')}" title="Espace Pro">Espace Pro</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 footer-contact">
                 <div class="widget">
                    <h3 class="widget-title">Contact pagesjaunes.mg</h3>
                    <div class="textwidget">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i>IVJ 96 Ankadifotsy, <br>Antananarivo 101
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i><a href="mailto:contact@pagesjaunes.mg" title="contact.pagesjaunes.mg@gmail.com">contact.pagesjaunes.mg@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <h3 class="widget-title">Suivez nous</h3>
                    <div class="textwidget">
                        <p>
                            <a href="https://www.facebook.com/pagesjaunes.mg/" target="_blank">
                                <img class="alignnone size-full wp-image-51564" src="{$j_basepath}frontlibraries/images/icon-fb.png" alt="icon-fb" width="34" height="34">
                            </a>
                            <a href="https://twitter.com/Pagesjaunes_Mg" target="_blank">
                                <img class="alignnone size-full wp-image-51566" src="{$j_basepath}frontlibraries/images/icon-tw.png" alt="icon-tw" width="34" height="34">
                            </a>
                            <a href="https://www.linkedin.com/company/contact-pagesjaunes-mg?trk=biz-companies-cym" target="_blank">
                                <img class="alignnone size-full wp-image-51565" src="{$j_basepath}frontlibraries/images/icon-in.png" alt="icon-in" width="34" height="34">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container super-footer">
    <p class="nav-footer"><a href="{jurl 'front_office~default:conditions_utilisations'}" title="Conditions d'utilisations" title="Conditions d'utilisations">Conditions d'utilisations</a></p>
    <p class="copyright">© PAGESJAUNES.MG - 2016</p>
</div>
{literal}
<script type="javascript">
if ( $('.bloc-media').length > 0 ) {
    $('.owl-carousel', '.bloc-media').owlCarousel({
        loop:false,
        margin:20,
        nav:false,
        dots:true,
        responsive : {
            0 : {
                items:1
            },

            640 : {
                items:2
            },

            768 : {
                items:3
            },

            1024 : {
                items:4
            }
        }
    });

    if ( $('.video-th').length > 0 ) {
        $(".video-th").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            padding : 0,
            autoHeight : true,
            helpers : {
                media : {}
            }
        });
    }

    if ( $('.fancybox').length > 0 ) {
        $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            padding : 0
        });
    }
}
</script>
{/literal}