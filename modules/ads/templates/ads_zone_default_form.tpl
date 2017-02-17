<input type="hidden" name="ads_zone_default" value="{$oAdsZoneDefault->id}">
<h3>Pub N°: {$oAdsZoneDefault->rang}</h3>
<div class="form-group r-form">
    <label>Type</label>
    <select class="form-control" name="ad_type" id="ad_type">
        <option value="1" {if ($oAdsZoneDefault->type == 1)}selected{/if}>Image</option>
        <option value="2" {if ($oAdsZoneDefault->type == 2)}selected{/if}>Html</option>
    </select>
</div>
<div class="form-group r-form">
    <div>
        <label>Catégorie / sous-catégorie</label>
        <select class="form-control m-b chosen-select" tabindex="2" name="categorie_filtre">
            <option value="">Selection :</option>
            {foreach ($oListCategorie as $rowCategorie)}
            <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;" {if ($oAdsZoneDefault->categorie_id == $rowCategorie['categorie']->id)}selected{/if}>{$rowCategorie['categorie']->name}</option>
                {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}' {if ($oAdsZoneDefault->souscategorie_id == $souscategorie->id)}selected{/if}>{$souscategorie->name} </option>
                {/foreach}
            {/foreach}
        </select>
    </div>
</div>
<div class="form-group r-form" id="ad_image">
    <label>Image</label>
    <div class="fileupload fileupload-new" data-provides="fileupload">
        {if (!empty($oAdsZoneDefault->image))}
        <div class="fileupload-new thumbnail">
            <img src="{$j_basepath}publicites/thumbnail/{$oAdsZoneDefault->image}" style="max-width: 300px; max-height: 400px; line-height: 20px;" alt="">
        </div>
        {/if}
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 400px; line-height: 20px;"></div>
        <div>
            <span class="btn btn-white btn-file">
            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
            <input type="file" class="default" id="image" name="image"/>
            </span>&nbsp;
            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
        </div>
    </div>
</div>
<div class="form-group r-form" id="ad_html">
    <label class="control-label">Html</label> 
    <textarea class="form-control ckeditor" name="html" id="html">
        {$oAdsZoneDefault->html}
    </textarea>
</div>
<div class="form-group r-form">
    <label>Lien ad</label>
    <input type="text" id="lien_ad" name="lien_ad" class="form-control" value="{$oAdsZoneDefault->link}"/>
</div>
<div class="form-group">
    <a href="#" onclick="newAd()" class="btn btn-white" id="cancel">Annuler</a>
    <button type="button" onclick="saveEditAd({$oAdsZoneDefault->id})" class="btn btn-success btn-save-ad">Enregistrer</button>
</div>