<input type="hidden" id="videos-youtube-id" value="{$oVideos->id}"/>
<div class="form-group" id="urlyoutube">
    <label class="control-label">Url youtube :</label>
    <input type="text" id="url-video-youtube" name="url-video-youtube" class="form-control" value="{$oVideos->url_youtube}"/>
</div>
<div class="form-group">
    <label class="control-label">Vignette youtube:</label>
    <div class="fileupload fileupload-new videoUpload" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="max-width: 100px; max-height: 100px;">
            <img src="{$j_basepath}entreprise/vignetteYoutube/{$oVideos->vignette_video}" alt="" />
        </div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
        <div>
            <span class="btn btn-white btn-file">
                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                <span class="fileupload-exists">Changer</span>
                <input type="file" class="default" accept="image/*" id="vignette-video-youtube" name="vignette-video-youtube"/>
            </span>&nbsp;
            <span class="btn-file btn btn-primary" onclick="updateVideoYoutube()" id="bt-add-video-youtube">Enregistrer</span> 
            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i></a>
        </div> 
    </div>
</div>