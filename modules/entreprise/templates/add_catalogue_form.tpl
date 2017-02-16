<div class="form-group">
    <label>Référence produit *</label>
    <input id="refProduit" name="refProduit" type="text" class="form-control">
</div>
<div class="form-group">
    <label>Nom produit *</label>
    <input id="nomProduit" name="nomProduit" type="text" class="form-control">
</div>
<div class="form-group">
    <label>Image produit *:</label>
    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
        <div>
            <span class="btn btn-default btn-file">
            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
            <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
            <input type="file" class="default" id="img_produit" name="img_produit"/>
            </span>&nbsp;
            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Description produit *</label>
    <textarea id="descProduit" name="descProduit" class="form-control"></textarea>
</div>
<div class="form-group">
    <label>Marque produit *</label>
    <input id="marqueProduit" name="marqueProduit" type="text" class="form-control required">
</div>
<div class="form-group">
    <label>Prix produit *</label>
    <div class="input-group">
        <input id="prixProduit" name="prixProduit" type="text" class="form-control">
        <span class="input-group-addon">Ar</span>
    </div>
</div>
<div class="form-group">
    <label>Publié</label>
    <div class="input-group">
        <div class="radio radio-info radio-inline">
            <input type="radio" id="radioCatalogueIsPublie1" value="1" name="radioCatalogueIsPublie">
            <label for="radioCatalogueIsPublie1"> oui </label>
        </div>
        <div class="radio radio-info radio-inline">
            <input type="radio" id="radioCatalogueIsPublie2" value="0" name="radioCatalogueIsPublie" checked >
            <label for="radioCatalogueIsPublie2"> non </label>
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" onclick="addCatalogue();" class="catalogue-save-add btn btn-success btn-outline">Enregistrer</button>
    <button type="button" onclick="return setRemote(this);" data-remote-target="#catalogue-form" data-load-remote="{jfullurl 'entreprise~entreprise:getAddCatalogueForm'}" class="catalogue-clear-add-form btn btn-default btn-outline">Annuler</button>
</div>