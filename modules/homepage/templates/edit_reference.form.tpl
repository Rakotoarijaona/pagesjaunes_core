                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="control-label">Titre :</label>
                                <div>
                                    <input type="text" placeholder="titre" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Description :</label>
                                <div>
                                    <textarea class="form-control ckeditor" name="description_reference" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">image :</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 240px; height: 140px;">
                                        <img src="" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 240px; max-height: 140px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Parcourir</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i></span>
                                       <input type="file" class="default" name="imageToUpload"/>
                                       </span>&nbsp;
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label">Position image : </label>
                                <div class="input-group">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="option1" name="radioposition">
                                        <label for="inlineRadio1"> Gauche </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio2" value="option2" name="radioposition">
                                        <label for="inlineRadio2"> Droite </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 hr-line-dashed"></div>
                            <div class="col-lg-12 text-left">
                                <a href=""><button type="button" class="btn btn-white" data-dismiss="modal">Annuler</button></a>
                                <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
{literal}

<script>
$(document).ready(function(){
    

    CKEDITOR.replace( 'description_reference');
});
</script>
{/literal}