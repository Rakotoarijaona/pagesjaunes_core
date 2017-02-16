<div class="container clearfix">
    <form id="form-search" class="form-inline" method="GET" action="{jurl 'front_office~search'}">
        <div class="form-group search-form hidden-sm">
            <input type="text" style="width: 200px" value="{$search_one}" name="search_one" id="search_one" class="form-control search-text" placeholder="nom entreprise, produit, marque, service">
        </div>
        <div class="form-group search-form hidden-sm">
            <input type="text" style="width: 200px" value="{$search_two}" name="search_two" id="search_two" class="form-control search-text" placeholder="région, province, adresse">
        </div>
        <div class="form-group search-form">
            <input type="text" style="width: 200px" value="{$search_three}" name="search_three" id="search_three" class="form-control search-text" placeholder="numéro de téléphone">
        </div>
        <div class="form-group">
            <button type="submit" id="submit-search" class="btn btn-default white-hover"><i class="fa fa-search"></i> <span>Rechercher</span></button>
        </div>
    </form>
    <a href="#" class="btn btn-category" title="Voir les catégories"><i class="fa fa-folder"></i> <span class="">Parcourir les catégories</span> <i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
</div>