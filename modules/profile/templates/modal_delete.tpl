<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Suppression d'un profil</h4>
        </div>
        <form role="form" id="form" action="{jurl $action}" method="get">
            <input type="hidden" name="id_profile" value="{$oProfile->iGroupId}">
            <div class="modal-body">
                <p>Voulez-vous supprimer le profil <strong>{$oProfile->zGroupName}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Oui</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Non</button>
            </div>
        </form>
    </div>
</div>