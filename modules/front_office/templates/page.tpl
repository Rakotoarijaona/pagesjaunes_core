<div class="container">
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>
            <a href="{jurl 'front_office~default:index'}">Accueil</a>
        </li>
        <li class="active">
            <strong>{$page->title}</strong>
        </li>
    </ol>
    <h1>{$page->title}</h1>
    <!-- title -->
</div>
<main class="pro-about">
    {if $page->has_pub == $YES}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {$page->content}
                </div>
                <div class="col-md-4">
                    {$RIGHTPANEL}
                </div>
            </div>
        </div>
    {else}
        {$page->content}
    {/if}

    </div>
</main>
{$COMMONSCRIPT}