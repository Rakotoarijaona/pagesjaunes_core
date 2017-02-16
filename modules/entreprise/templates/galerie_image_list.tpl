<div class="lightBoxGallery col-lg-12">
    {if sizeof($oEntreprise->galerie_image)>0}
    {foreach $oEntreprise->galerie_image as $oGalerieImage}   
    <div class="item col-md-3">
        <a href="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_BIG_FOLDER}/{$oGalerieImage->image}" title="{$oGalerieImage->image}" data-gallery=""><img src="{$j_basepath}{$PHOTOS_FOLDER}/{$PHOTOS_THUMBNAIL_FOLDER}/{$oGalerieImage->image}"></a>
        <a onclick="return setRemote(this);" data-remote-target="#galerie-image-list" data-load-remote="{jfullurl 'entreprise~entreprise:updateGalerieImage', array('id'=>$oGalerieImage->id, 'entrepriseId'=>$oEntreprise->id, 'operation'=>'delete')}" class="btn-delete"><i class="fa fa-trash"></i></a>
    </div>
    {/foreach}
    {/if}
</div>