<div class="form-group r-form">
    <label>Type</label>
    <select class="form-control" name="ad_type" id="ad_type" style="width:300px">
        <option value="1">Image</option>
        <option value="2">Html</option>
    </select>
</div>
<div class="form-group r-form">
    <div style="width:300px">
        <label>Catégorie / sous-catégorie</label>
        <select class="form-control m-b" name="categorie_filtre">
            <option value="">Selection :</option>
            {foreach ($oListCategorie as $rowCategorie)}
            <option value="categorie,{$rowCategorie['categorie']->id}" style="font-weight: bold;">{$rowCategorie['categorie']->name}</option>
                {foreach ($rowCategorie['souscategorie'] as $souscategorie)} 
                <option style="padding-left: 10px" value='souscategorie,{$souscategorie->id}'>{$souscategorie->name} </option>
                {/foreach}
            {/foreach}
        </select>
    </div>
</div>
<div class="form-group r-form" id="ad_image">
    <label>Image</label>
    <div class="fileupload fileupload-new" data-provides="fileupload">
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
    <textarea class="form-control ckeditor" name="html" id="html"></textarea>
</div>
<div class="form-group r-form">
    <label>Lien ad</label>
    <input type="text" id="lien_ad" name="lien_ad" class="form-control" value=""/>
</div>
<div class="form-group">
    <a href="{jurl 'ads~ads:index'}" class="btn btn-white" id="cancel">Annuler</a>
    <button type="button" onclick="saveNewAd()" class="btn btn-success btn-save-ad">Enregistrer le pub par défaut</button>
</div>