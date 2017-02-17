<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Droits d'accès</h2>
         
        <ol class="breadcrumb">
            <li>
                <a href="{jurl 'dashboard~dashboard:index'}">Accueil</a>
            </li>
            <li class="active">
                <a><strong>Droits d'accès</strong></a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            {jmessage}
        </div>
        <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Menu administration </h5>
                </div>
                <div class="ibox-content">
                    <div class="panel-body">
                        {if isset($oProfile)}
                            <h1>Rôle <strong>{$oProfile->zGroupName}</strong></h1>
                            <div class="alert alert-info hide" id="alert_save">
                                Veuillez cliquer le bouton <strong> sauvegarder </strong> pour enregistrer les modifications.
                            </div>
                            <form action="{jurl 'right~right:update_right'}" method="POST">
                                <input type="hidden" name="groupId" value="{$oProfile->iGroupId}"/>
                                <div class="panel-group" id="accordion">
                                    {ifnotacl2 "admin.right.restrictall"}
                                    {ifacl2 "admin.right.list"}
                                    {ifacl2 "admin.right.update"}
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseProfil">Gestion des profils</a>
                                            </h5>
                                        </div>
                                        <div id="collapseProfil" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.create]" id="checkbox1" type="checkbox" value="y" {if isset($right['profile.create'])} {$right['profile.create']}{/if}>
                                                        <label for="checkbox1">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.list]" id="checkbox2" type="checkbox" value="y" {if isset($right['profile.list'])} {$right['profile.list']}{/if}>
                                                        <label for="checkbox2">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.update]" id="checkbox3" type="checkbox" value="y" {if isset($right['profile.update'])} {$right['profile.update']}{/if}>
                                                        <label for="checkbox3">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.menu]" id="checkbox4" type="checkbox" value="y" {if isset($right['profile.menu'])} {$right['profile.menu']}{/if}>
                                                        <label for="checkbox4">
                                                            Menu
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.delete]" id="checkbox5" type="checkbox" value="y" {if isset($right['profile.delete'])} {$right['profile.delete']}{/if}>
                                                        <label for="checkbox5">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[profile.restrictall]" id="checkbox6" type="checkbox" value="y" {if isset($right['profile.restrictall'])} {$right['profile.restrictall']}{/if}>
                                                        <label for="checkbox6">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseUser">Gestion des utilisateurs</a>
                                            </h5>
                                        </div>
                                        <div id="collapseUser" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.create]" id="checkbox21" type="checkbox" value="y" {if isset($right['user.create'])} {$right['user.create']}{/if}>
                                                        <label for="checkbox21">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.list]" id="checkbox22" type="checkbox" value="y" {if isset($right['user.list'])} {$right['user.list']}{/if}>
                                                        <label for="checkbox22">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.update]" id="checkbox23" type="checkbox" value="y" {if isset($right['user.update'])} {$right['user.update']}{/if}>
                                                        <label for="checkbox23">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.menu]" id="checkbox24" type="checkbox" value="y" {if isset($right['user.menu'])} {$right['user.menu']}{/if}>
                                                        <label for="checkbox24">
                                                            Menu
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.delete]" id="checkbox25" type="checkbox" value="y" {if isset($right['user.delete'])} {$right['user.delete']}{/if}>
                                                        <label for="checkbox25">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[user.restrictall]" id="checkbox26" type="checkbox" value="y" {if isset($right['user.restrictall'])} {$right['user.restrictall']}{/if}>
                                                        <label for="checkbox26">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseRightAdmin">Gestion des droits administrateur</a>
                                            </h5>
                                        </div>
                                        <div id="collapseRightAdmin" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[admin.right.list]" id="checkbox31" type="checkbox" value="y" {if isset($right['admin.right.list'])} {$right['admin.right.list']}{/if}>
                                                        <label for="checkbox31">
                                                            Lister
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[admin.right.update]" id="checkbox32" type="checkbox" value="y" {if isset($right['admin.right.update'])} {$right['admin.right.update']}{/if}>
                                                        <label for="checkbox32">
                                                            Modifier
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[admin.right.restrictall]" id="checkbox33" type="checkbox" value="y" {if isset($right['admin.right.restrictall'])} {$right['admin.right.restrictall']}{/if}>
                                                        <label for="checkbox33">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseRight">Gestion des droits</a>
                                            </h5>
                                        </div>
                                        <div id="collapseRight" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[right.list]" id="checkbox41" type="checkbox" value="y" {if isset($right['right.list'])} {$right['right.list']}{/if}>
                                                        <label for="checkbox41">
                                                            Lister
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[right.update]" id="checkbox42" type="checkbox" value="y" {if isset($right['right.update'])} {$right['right.update']}{/if}>
                                                        <label for="checkbox42">
                                                            Modifier
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[right.restrictall]" id="checkbox43" type="checkbox" value="y" {if isset($right['right.restrictall'])} {$right['right.restrictall']}{/if}>
                                                        <label for="checkbox43">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/ifacl2}
                                    {/ifacl2}
                                    {/ifnotacl2}
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#tableaudebord">Tableau de bord</a>
                                            </h5>
                                        </div>
                                        <div id="tableaudebord" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-12">
                                                        <input class="check_list" name="right[dashboard.menu]" id="checkbox51" type="checkbox" value="y" {if isset($right['dashboard.menu'])} {$right['dashboard.menu']}{/if}>
                                                        <label for="checkbox51">
                                                            Menu tableau de bord
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-12">
                                                        <input class="check_list" name="right[dashboard.restrictall]" id="checkbox52" type="checkbox" value="y" {if isset($right['dashboard.restrictall'])} {$right['dashboard.restrictall']}{/if}>
                                                        <label for="checkbox52">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Gestion des entreprises</a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[entreprise.create]" id="checkbox61" type="checkbox" value="y" {if isset($right['entreprise.create'])} {$right['entreprise.create']}{/if}>
                                                        <label for="checkbox61">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[entreprise.list]" id="checkbox62" type="checkbox" value="y" {if isset($right['entreprise.list'])} {$right['entreprise.list']}{/if}>
                                                        <label for="checkbox62">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[entreprise.update]" id="checkbox63" type="checkbox" value="y" {if isset($right['entreprise.update'])} {$right['entreprise.update']}{/if}>
                                                        <label for="checkbox63">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[entreprise.restrictall]" id="checkbox64" type="checkbox" value="y" {if isset($right['entreprise.restrictall'])} {$right['entreprise.restrictall']}{/if}>
                                                        <label for="checkbox64">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[entreprise.delete]" id="checkbox65" type="checkbox" value="y" {if isset($right['entreprise.delete'])} {$right['entreprise.delete']}{/if}>
                                                        <label for="checkbox65">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Gestion slideshow</a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[slideshow.create]" id="checkbox71" type="checkbox" value="y" {if isset($right['slideshow.create'])} {$right['slideshow.create']}{/if}>
                                                        <label for="checkbox71">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[slideshow.list]" id="checkbox72" type="checkbox" value="y" {if isset($right['slideshow.list'])} {$right['slideshow.list']}{/if}>
                                                        <label for="checkbox72">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[slideshow.update]" id="checkbox73" type="checkbox" value="y" {if isset($right['slideshow.update'])} {$right['slideshow.update']}{/if}>
                                                        <label for="checkbox73">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[slideshow.restrictall]" id="checkbox74" type="checkbox" value="y" {if isset($right['slideshow.restrictall'])} {$right['slideshow.restrictall']}{/if}>
                                                        <label for="checkbox74">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[slideshow.delete]" id="checkbox75" type="checkbox" value="y" {if isset($right['slideshow.delete'])} {$right['slideshow.delete']}{/if}>
                                                        <label for="checkbox75">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Gestion catégories / sous catégories</a>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[categorie.create]" id="checkbox81" type="checkbox" value="y" {if isset($right['categorie.create'])} {$right['categorie.create']}{/if}>
                                                        <label for="checkbox81">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[categorie.list]" id="checkbox82" type="checkbox" value="y" {if isset($right['categorie.list'])} {$right['categorie.list']}{/if}>
                                                        <label for="checkbox82">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[categorie.update]" id="checkbox83" type="checkbox" value="y" {if isset($right['categorie.update'])} {$right['categorie.update']}{/if}>
                                                        <label for="checkbox83">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[categorie.restrictall]" id="checkbox84" type="checkbox" value="y" {if isset($right['categorie.restrictall'])} {$right['categorie.restrictall']}{/if}>
                                                        <label for="checkbox84">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[categorie.delete]" id="checkbox85" type="checkbox" value="y" {if isset($right['categorie.delete'])} {$right['categorie.delete']}{/if}>
                                                        <label for="checkbox85">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Gestion mots clés par sous catégories</a>
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[keywords.create]" id="checkbox91" type="checkbox" value="y" {if isset($right['keywords.create'])} {$right['keywords.create']}{/if}>
                                                        <label for="checkbox91">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[keywords.list]" id="checkbox92" type="checkbox" value="y" {if isset($right['keywords.list'])} {$right['keywords.list']}{/if}>
                                                        <label for="checkbox92">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[keywords.update]" id="checkbox93" type="checkbox" value="y" {if isset($right['keywords.update'])} {$right['keywords.update']}{/if}>
                                                        <label for="checkbox93">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[keywords.restrictall]" id="checkbox94" type="checkbox" value="y" {if isset($right['keywords.restrictall'])} {$right['keywords.restrictall']}{/if}>
                                                        <label for="checkbox94">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[keywords.delete]" id="checkbox95" type="checkbox" value="y" {if isset($right['keywords.delete'])} {$right['keywords.delete']}{/if}>
                                                        <label for="checkbox95">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Gestion top recherche par sous catégories</a>
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[topsrecherche.create]" id="checkbox101" type="checkbox" value="y" {if isset($right['topsrecherche.create'])} {$right['topsrecherche.create']}{/if}>
                                                        <label for="checkbox101">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[topsrecherche.list]" id="checkbox102" type="checkbox" value="y" {if isset($right['topsrecherche.list'])} {$right['topsrecherche.list']}{/if}>
                                                        <label for="checkbox102">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[topsrecherche.update]" id="checkbox103" type="checkbox" value="y" {if isset($right['topsrecherche.update'])} {$right['topsrecherche.update']}{/if}>
                                                        <label for="checkbox103">
                                                            Editer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[topsrecherche.restrictall]" id="checkbox104" type="checkbox" value="y" {if isset($right['topsrecherche.restrictall'])} {$right['topsrecherche.restrictall']}{/if}>
                                                        <label for="checkbox104">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[topsrecherche.delete]" id="checkbox105" type="checkbox" value="y" {if isset($right['topsrecherche.delete'])} {$right['topsrecherche.delete']}{/if}>
                                                        <label for="checkbox105">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Homepage</a>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[homepage.menu]" id="checkbox111" type="checkbox" value="y" {if isset($right['homepage.menu'])} {$right['homepage.menu']}{/if}>
                                                        <label for="checkbox111">
                                                            Menu Homepage
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[homepage.update]" id="checkbox112" type="checkbox" value="y" {if isset($right['homepage.update'])} {$right['homepage.update']}{/if}>
                                                        <label for="checkbox112">
                                                            Update
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[homepage.restrictall]" id="checkbox113" type="checkbox" value="y" {if isset($right['homepage.restrictall'])} {$right['homepage.restrictall']}{/if}>
                                                        <label for="checkbox113">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Gestion des pages statiques</a>
                                            </h5>
                                        </div>
                                        <div id="collapse8" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[pages.create]" id="checkboxPagesCreate" type="checkbox" value="y" {if isset($right['pages.create'])} {$right['pages.create']}{/if}>
                                                        <label for="checkboxPagesCreate">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[pages.list]" id="checkboxPagesList" type="checkbox" value="y" {if isset($right['pages.list'])} {$right['pages.list']}{/if}>
                                                        <label for="checkboxPagesList">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[pages.update]" id="checkboxPagesUpdate" type="checkbox" value="y" {if isset($right['pages.update'])} {$right['pages.update']}{/if}>
                                                        <label for="checkboxPagesUpdate">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[pages.delete]" id="checkboxPagesDelete" type="checkbox" value="y" {if isset($right['pages.delete'])} {$right['pages.delete']}{/if}>
                                                        <label for="checkboxPagesDelete">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[pages.restrictall]" id="checkboxPagesRestrictall" type="checkbox" value="y" {if isset($right['pages.restrictall'])} {$right['pages.restrictall']}{/if}>
                                                        <label for="checkboxPagesRestrictall">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse20">Gestion des publicités</a>
                                            </h5>
                                        </div>
                                        <div id="collapse20" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.create]" id="checkboxAdsCreate" type="checkbox" value="y" {if isset($right['ads.create'])} {$right['ads.create']}{/if}>
                                                        <label for="checkboxAdsCreate">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.list]" id="checkboxAdsList" type="checkbox" value="y" {if isset($right['ads.list'])} {$right['ads.list']}{/if}>
                                                        <label for="checkboxAdsList">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.update]" id="checkboxAdsUpdate" type="checkbox" value="y" {if isset($right['ads.update'])} {$right['ads.update']}{/if}>
                                                        <label for="checkboxAdsUpdate">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.delete]" id="checkboxAdsDelete" type="checkbox" value="y" {if isset($right['ads.delete'])} {$right['ads.delete']}{/if}>
                                                        <label for="checkboxAdsDelete">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.restrictall]" id="checkboxAdsRestrictall" type="checkbox" value="y" {if isset($right['ads.restrictall'])} {$right['ads.restrictall']}{/if}>
                                                        <label for="checkboxAdsRestrictall">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse21">Gestion des types de publicités</a>
                                            </h5>
                                        </div>
                                        <div id="collapse21" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.type.create]" id="checkboxAdsTypeCreate" type="checkbox" value="y" {if isset($right['ads.type.create'])} {$right['ads.type.create']}{/if}>
                                                        <label for="checkboxAdsTypeCreate">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.type.list]" id="checkboxAdsTypeList" type="checkbox" value="y" {if isset($right['ads.type.list'])} {$right['ads.type.list']}{/if}>
                                                        <label for="checkboxAdsTypeList">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.type.update]" id="checkboxAdsTypeUpdate" type="checkbox" value="y" {if isset($right['ads.type.update'])} {$right['ads.type.update']}{/if}>
                                                        <label for="checkboxAdsTypeUpdate">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.type.delete]" id="checkboxAdsTypeDelete" type="checkbox" value="y" {if isset($right['ads.type.delete'])} {$right['ads.type.delete']}{/if}>
                                                        <label for="checkboxAdsTypeDelete">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[ads.type.restrictall]" id="checkboxAdsTypeRestrictall" type="checkbox" value="y" {if isset($right['ads.type.restrictall'])} {$right['ads.type.restrictall']}{/if}>
                                                        <label for="checkboxAdsTypeRestrictall">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse22">Gestion des abonnements</a>
                                            </h5>
                                        </div>
                                        <div id="collapse22" class="panel-collapse collapse">
                                            <div class="panel-body ibox-content">
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[abonnement.create]" id="checkboxAbonnementTypeCreate" type="checkbox" value="y" {if isset($right['abonnement.create'])} {$right['abonnement.create']}{/if}>
                                                        <label for="checkboxAbonnementTypeCreate">
                                                            Ajouter
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[abonnement.list]" id="checkboxAbonnementTypeList" type="checkbox" value="y" {if isset($right['abonnement.list'])} {$right['abonnement.list']}{/if}>
                                                        <label for="checkboxAbonnementTypeList">
                                                            Lister
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[abonnement.update]" id="checkboxAbonnementTypeUpdate" type="checkbox" value="y" {if isset($right['abonnement.update'])} {$right['abonnement.update']}{/if}>
                                                        <label for="checkboxAbonnementTypeUpdate">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[abonnement.delete]" id="checkboxAbonnementTypeDelete" type="checkbox" value="y" {if isset($right['abonnement.delete'])} {$right['abonnement.delete']}{/if}>
                                                        <label for="checkboxAbonnementTypeDelete">
                                                            Supprimer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox checkbox-danger checkbox-inline col-md-4">
                                                        <input class="check_list" name="right[abonnement.restrictall]" id="checkboxAbonnementTypeRestrictall" type="checkbox" value="y" {if isset($right['abonnement.restrictall'])} {$right['abonnement.restrictall']}{/if}>
                                                        <label for="checkboxAbonnementTypeRestrictall">
                                                            Restrict all
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hide" id="bt_save">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </div>
                            </form>
                        {else}
                            <div class="alert alert-info" id="">
                                Veuillez choisir un profil à gérer.
                            </div>
                        {/if}        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Control manager</h5>
                </div>
                <div class="ibox-content">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> ¨Profil</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Utilisateur</a></li>
                        </ul>
                        <div class="tab-content">
                            {ifacl2 "profile.list"}
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" placeholder="Filtre" id="profil-filter" class="input-sm form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jfullurl 'profile~profile:show_modal_add'}" data-toggle="modal" class="btn btn-success">
                                                Ajouter&nbsp;<i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive" id="list_profile">
                                        <table class="footable table" data-page-size="8"  data-filter="#profil-filter">
                                            <thead>
                                                <tr>
                                                    <th data-sort-ignore="true" width="43px"></th>
                                                    <th>Profil </th>
                                                    <th data-sort-ignore="true" width="150px">Droit & accès </th>
                                                    <th data-sort-ignore="true" width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {if (sizeof($toListProfile) > 0)}
                                                {foreach($toListProfile as $rowProfile)}
                                                <tr>
                                                    <td>
                                                    {if (($rowProfile->iGroupId != 'superadmin')&&($rowProfile->hasUser() == 0))}
                                                        <div class="checkbox" style="margin: 0px">
                                                            <input type="checkbox" name="groupProfil[]" value="{$rowProfile->iGroupId}">             
                                                            <label></label>
                                                        </div>
                                                    {else}
                                                        <div class="checkbox" style="margin: 0px">
                                                            <input type="checkbox" disabled name="groupedAction[]" value="{$rowProfile->iGroupId}">             
                                                            <label></label>
                                                        </div>
                                                    {/if}
                                                    </td>
                                                    <td>
                                                        {ifacl2 "profile.update"}
                                                        <a  href="#remoteModal" onclick="return setRemote(this);" data-remote-target="#remoteModal" data-load-remote="{jurl 'profile~profile:show_modal_update',array('id_profile'=>$rowProfile->iGroupId)}" data-toggle="modal">
                                                        {$rowProfile->zGroupName}
                                                        </a>
                                                        {else}
                                                        {$rowProfile->zGroupName}
                                                        {/ifacl2}
                                                    </td>
                                                    <td>
                                                        {ifacl2 "right.list"}
                                                        {if ($rowProfile->iGroupId != 'superadmin')}
                                                        <a href="{jurl 'right~right:index',array('id_profile'=>$rowProfile->iGroupId)}" class="btn btn-xs btn-primary">Gérer</a>
                                                        {else}
                                                        <button class="btn btn-xs btn-default" disabled>Gérer</a>
                                                        {/if}
                                                        {/ifacl2}
                                                    </td>
                                                    <td>
                                                        {ifacl2 "profile.delete"}
                                                        {if (($rowProfile->iGroupId != 'superadmin')&&($rowProfile->hasUser() == 0))}
                                                        <a  onclick="deleteProfile('{$rowProfile->iGroupId}');" class="btn btn-xs btn-danger">
                                                            Supprimer
                                                        </a>
                                                        {else}
                                                        <button class="btn btn-xs btn-default" disabled>
                                                            Supprimer
                                                        </button>
                                                        {/if}
                                                        {/ifacl2}
                                                    </td>
                                                </tr>
                                                {/foreach}
                                            {else}
                                                <tr>
                                                    <td colspan="5">Aucuns résultats</td>
                                                </tr>
                                            {/if}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="input-group" style="padding-right: 5px">

                                                            <form name="formForProfilGroup" id="formForProfilGroup" action="{jfullurl 'right~right:grouped_action_profil'}" method="POST">
                                                           </form>     
                                                            <select class="actionGroup form-control input-sm m-b" name="profil_actionGroup">
                                                                <option value="">Actions groupées :</option>
                                                                {ifacl2 "profile.delete"}
                                                                <option value="delete">Supprimer</option>
                                                                {/ifacl2}
                                                            </select>
                                                            <div class="input-group-btn" style="padding: 0px">
                                                                <button type="button" class="btn btn-white btn-sm" onclick="deleteGroupProfil();"> Appliquer</button>
                                                            </div>                                
                                                        </div>
                                                    </td>
                                                    <td colspan="3">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {/ifacl2}

                            {ifacl2 "user.list"}
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" placeholder="Filtre" id="user-filter" class="input-sm form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="{jfullurl 'user~user:ajout'}" class="btn btn-success">
                                                Ajouter&nbsp;<i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="footable table" data-page-size="10" data-filter="#filter">
                                            <thead>
                                                <tr>

                                                    <th data-sort-ignore="true" width="33px">
                                                        
                                                    </th>
                                                    <th>Identifiant </th>
                                                    <th>Profil</th>
                                                    <th>Droits&accès</th>
                                                    <th data-sort-ignore="true">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {if (sizeof($toListUser) > 0)}
                                                {foreach($toListUser as $rowUser)}
                                                <tr>
                                                    <td>
                                                        <div class="checkbox" style="margin: 0px">
                                                            <input type="checkbox" name="checkUser[]" value="{$rowUser->usr_login}">
                                                            <label></label>
                                                        </div>
                                                    </td>
                                                    <td>                                                       
                                                        {ifacl2 "user.create"}
                                                        <a  href="{jfullurl 'user~user:edition',array('usr_login'=>$rowUser->usr_login)}">
                                                            <strong>{$rowUser->usr_login}</strong>
                                                        </a>
                                                        {else}
                                                        <a  href="#"><strong>{$rowUser->usr_login}</strong></a>
                                                        {/ifacl2}

                                                    </td>
                                                    <td>{$rowUser->usr_typeLabel}</td>
                                                    <td>
                                                        {ifacl2 "right.list"}
                                                            {ifacl2 "right.update"}
                                                                {if ($rowUser->usr_typeLabel != 'superadmin')}
                                                                <a href="{jurl 'right~right:index',array('id_profile'=>$rowUser->usr_typeLabel)}" class="btn btn-xs btn-primary">Gérer</a>
                                                                {else}
                                                                <button class="btn btn-xs btn-default" disabled>Gérer</a>
                                                                {/if}
                                                            {/ifacl2}
                                                        {/ifacl2}
                                                    </td>
                                                    <td>                                                        
                                                        {ifacl2 "user.delete"}
                                                        <a  onclick="deleteUser('{$rowUser->usr_login}');" class="btn btn-xs btn-danger">
                                                        Supprimer</a>
                                                        {/ifacl2}                                                        
                                                    </td>
                                                </tr>
                                                {/foreach}
                                            {/if}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                            <form name="formForUserGroup" id="formForUserGroup" action="{jfullurl 'right~right:grouped_action_user'}" method="POST">
                                           </form>     
                                                <select class="form-control m-b" name="user_action_group">
                                                    <option>Action groupées :</option>                                                  
                                                    {ifacl2 "user.delete"}
                                                    <option value="delete">Supprimer</option>
                                                    {/ifacl2}     
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-white" onclick="deleteUserGroup();" >Appliquer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/ifacl2}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{$SCRIPT}
{literal}
<script>
$(document).ready(function(){
    $('.footable').footable();
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $(".check_list").change(function() {
        $('#bt_save').removeClass('hide');
        $('#alert_save').removeClass('hide');
    });
    $('.table-profil').footable();
    $('.table-user').footable();
});
function gerer()
{}
function ajoutProfil()
{
    if ($('#formAjoutProfil').valid())
    {
        var formdata = new FormData();
        formdata.append('nom_profil', $('#nom_profil').val());
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "profile~profile:new_profile"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#list_profile').html(data);
                swal("Ajouté!", "Profil ajouté!");
                $('#remoteModal').modal('toggle');
            },
            error: function() {
                swal("Erreur!", "Veuillez modifier le nom!", "warning");
            }
        });
    }
    
}
function modifierProfil(id)
{
    if ($('#formModifierProfil').valid())
    {
        var formdata = new FormData();
        formdata.append('nom_profil', $('#nom_profil').val());
        formdata.append('id_profile', id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "profile~profile:update_profile"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#list_profile').html(data);
                swal("Modifié!", "Profil modifié!");
                $('#remoteModal').modal('toggle');
            },
            error: function() {
                swal("Erreur!", "Veuillez modifier le nom!", "warning");
            }
        });
    }
}
function deleteProfile(id)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer ce profil ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
    }, function () {
        var formdata = new FormData();
        formdata.append('id_profile', id);
        $.ajax({
            type: 'POST',
            url: '{/literal}{jfullurl "profile~profile:delete_profile"}{literal}',
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#list_profile').html(data);
                swal("Supprimé!", "Profil supprimé!");
            },
            error: function() {
                swal("Erreur!", "", "warning");
            }
        });
    });
}

function deleteGroupProfil()
{
    if ($('input[name="groupProfil[]"]:checked').length > 0)
    {   
        if ($('select[name="profil_actionGroup"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces profils?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler"
                }, function () {
                    var groupUser = [];  
                    var formData = new FormData();
                    i = 0; 
                    dataarray = '{';
                    $('input[name="groupProfil[]"]:checked').each(function()
                    {
                        
                        $('#formForProfilGroup').append('<input type="hidden" name="groupProfil[]" value="'+$(this).val()+'">');
                    });
                    $('#formForProfilGroup').submit();
                });
        }
    }
}
function deleteUser(usr_login)
{
    swal({
        title: "Suppression",
        text: "Vous êtes sure de vouloir supprimer cet utilisateur ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false
    }, function () {
        window.location.assign('{/literal}{jfullurl "user~user:delete_user"}{literal}?usr_login='+usr_login)
    });
}

function deleteUserGroup()
{
    if ($('input[name="checkUser[]"]:checked').length > 0)
    {   
        if ($('select[name="user_action_group"]').val() == 'delete')
        {
            swal({
                    title: "Suppression",
                    text: "Vous êtes sure de vouloir supprimer ces utilisateurs?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "supprimer",
                    cancelButtonText: "Annuler"
                }, function () {
                    var groupUser = [];  
                    var formData = new FormData();
                    i = 0; 
                    dataarray = '{';
                    $('input[name="checkUser[]"]:checked').each(function()
                    {
                        
                        $('#formForUserGroup').append('<input type="hidden" name="groupUser[]" value="'+$(this).val()+'">');
                    });
                    $('#formForUserGroup').submit();
                    });
        }
    }
}
</script>
{/literal}