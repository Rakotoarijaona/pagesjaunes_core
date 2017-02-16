<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" width="48px" class="img-circle" src="{$j_basepath}photos/thumbnail/{$oUser->usr_photo}" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{$oUser->usr_name}</strong>
                            </span>
                            <span class="text-muted text-xs block">{$oUser->get_User_Group_name()}</span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    PJ
                </div>
            </li>
            {foreach $toMenu as $item}
                {if (sizeof($item->childItems) <= 0)}
                    <li {if $item->zMenuId == $selectedMenuItem} class="active"{/if}>
                        <a href="{jurl $item->zMenuContent}">
                            <i class="fa {$item->zMenuIcon}"></i><span class="nav-label">{$item->zMenuLabel}</span>
                        </a>
                    </li>
                {else}
                    <li {if $item->zMenuId == $selectedMenuItem} class="active"{/if}>
                        <a href="#"><i class="fa {$item->zMenuIcon}"></i> <span class="nav-label">{$item->zMenuLabel}</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            {foreach $item->childItems as $childItems}
                                <li {if $childItems->zMenuId == $selectedMenuChildItem} class="active"{/if}><a href="{jurl $childItems->zMenuContent}">{$childItems->zMenuLabel}</a></li>
                            {/foreach}
                        </ul>
                    </li>
                {/if}
            {/foreach}
        </ul>
    </div>
</nav>