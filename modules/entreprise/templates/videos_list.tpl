<table style="max-width: 100%; clear:both; width: 100%" class="table-profil table table-hover table-bordered">
    <thead>
        <tr>
            <th>Url youtube</th>
            <th>Vignette </th>
            <th style="width: 50px">Actions </th>
        </tr>
    </thead>
    <tbody id="video-youtube-list" style="max-width: 460px; clear:both; width: 100%; min-height: 50px">
        {if (sizeof ($oEntreprise->videos_youtube) > 0)}
        {foreach ($oEntreprise->videos_youtube as $videos)}
        <tr class="video-item">
            <input type="hidden" name="youtube-video[]" value="{$videos->id}"/>
            <td style="max-width:50%">{$videos->url_youtube}</td>
            <td><img class="tab-img-thumbnail" src="{$j_basepath}entreprise/vignetteYoutube/{$videos->vignette_video}"></td>
            <td>                 
                <a onclick="return setRemote(this);" data-remote-target="#videos-form" data-load-remote="{jfullurl 'entreprise~entreprise:getUpdateVideosForm', array('id'=>$videos->id)}" class="btn btn-success btn-xs btn-block">
                    Editer
                </a>                
                <a onclick="return setRemote(this);" data-remote-target="#video-youtube-list" data-load-remote="{jfullurl 'entreprise~entreprise:updateVignetteYoutube', array('id'=>$videos->id, 'entrepriseId'=>$oEntreprise->id, 'operation'=>'delete')}"  class="btn btn-danger btn-xs btn-block">
                    Supprimer
                </a>
            </td>
        </tr>
        {/foreach}
        {else}
        <tr><td colspan="3">Aucune vidéo</td></tr>
        {/if}
    </tbody>
</table>