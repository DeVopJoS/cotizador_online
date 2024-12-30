<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="cat_id" id="cat_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="cat_nom">Nombre</label>
                            <input type="text" class="form-control" id="cat_nom" name="cat_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="cat_desc">Descripción</label>
                            <textarea type="text" class="form-control" id="cat_desc" name="cat_desc" placeholder="Descripción" rows="3" required> </textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>