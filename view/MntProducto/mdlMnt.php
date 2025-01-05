<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="prod_id" id="prod_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="cat_id">Categoría</label>
                            <select class="default-select2 form-control" id="cat_id" name="cat_id"></select>
                        </div>

                        <div class="form-group">
                            <label for="prod_nom">Nombre</label>
                            <input type="text" class="form-control" id="prod_nom" name="prod_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="prod_desc">Descripción</label>
                            <textarea type="text" class="form-control" id="prod_desc" name="prod_desc" placeholder="Descripción" rows="3" required> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="prod_precio">Precio</label>
                            <input type="number" class="form-control" id="prod_precio" name="prod_precio" placeholder="Precio" required> 
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