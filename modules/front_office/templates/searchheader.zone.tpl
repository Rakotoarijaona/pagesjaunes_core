<div class="container clearfix">
    <form id="form-search" class="form-inline" method="post" action="{jurl 'front_office~search'}">
        <div class="form-group search-form">
            <select name="s[]" id="s" class="form-control" style="width:400px;" multiple>
                {if !empty($search)}
                    {foreach $search as $search_item}
                        <option value="{$search_item}" selected>{$search_item}</option>
                    {/foreach}
                {/if}
            </select>
        </div>
        <div class="form-group">
            <button type="submit" id="submit-search" class="btn btn-default white-hover"><i class="fa fa-search"></i> <span>Rechercher</span></button>
        </div>
    </form>
    <a href="#" class="btn btn-category" title="Voir les catégories"><i class="fa fa-folder"></i> <span class="">Parcourir les catégories</span> <i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
</div>