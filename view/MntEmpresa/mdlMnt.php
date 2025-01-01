<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="emp_id" id="emp_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="emp_nom">Nombre</label>
                            <input type="text" class="form-control" id="emp_nom" name="emp_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="emp_porcen">Porcentaje</label>
                            <input type="number" class="form-control" id="emp_porcen" name="emp_porcen" placeholder="Porcentaje" required>
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