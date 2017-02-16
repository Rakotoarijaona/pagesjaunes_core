<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('G:\wamp\pagesjaunes_core/modules/ads/templates/ads_zone_default_form.tpl') > 1487151153){ return false;
} else {
 require_once('G:\wamp\jelix\lib_1_6_10_dev\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_ba7cf0eb3f3120bcc0e2604b495c8579($t){

}
function template_ba7cf0eb3f3120bcc0e2604b495c8579($t){
?><div class="form-group r-form">
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
            <?php foreach($t->_vars['oListCategorie'] as $t->_vars['rowCategorie']):?>
            <option value="categorie,<?php echo $t->_vars['rowCategorie']['categorie']->id; ?>" style="font-weight: bold;"><?php echo $t->_vars['rowCategorie']['categorie']->name; ?></option>
                <?php foreach($t->_vars['rowCategorie']['souscategorie'] as $t->_vars['souscategorie']):?> 
                <option style="padding-left: 10px" value='souscategorie,<?php echo $t->_vars['souscategorie']->id; ?>'><?php echo $t->_vars['souscategorie']->name; ?> </option>
                <?php endforeach;?>
            <?php endforeach;?>
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
    <a href="<?php jtpl_function_html_jurl( $t,'ads~ads:index');?>" class="btn btn-white" id="cancel">Annuler</a>
    <button type="button" onclick="saveNewAd()" class="btn btn-success btn-save-ad">Enregistrer le pub par défaut</button>
</div><?php 
}
return true;}
