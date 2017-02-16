						<div class="row">	
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea id="description_marketing" class="form-control ckeditor" name="marketing" rows="6"></textarea>
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
    CKEDITOR.replace( 'description_marketing');
});
</script>
{/literal}