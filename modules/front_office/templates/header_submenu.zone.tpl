<div class="container">
            <ul class="categories-list row">
                {for ($i=0; $i<sizeof($toListCategorie);$i++)}
                    
                    {if (($i!=0) && ($i%4 == 0))}
                    </ul>
                    <hr> <!-- separator -->
                    <ul class="categories-list row">
                    {/if}
                    <li class="col-sm-3">
                        <h3><a href="javascript:void(0);" title="{$toListCategorie[$i]['categorie']->name}">{$toListCategorie[$i]['categorie']->name}</a></h3>
                        <ul class="category-list-item">
                            {foreach ($toListCategorie[$i]['souscategorie'] as $souscategorie)} 
                            <li><a href="{jurl 'front_office~default:liste',array('soucategorie'=>$souscategorie->id)}" title="{$souscategorie->name}">{$souscategorie->name}</a></li>
                            {/foreach}
                        </ul>
                    </li>
                {/for}
            </ul>
        </div>