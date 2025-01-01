<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="cli_nom">Nombre</label>
                            <input type="text" class="form-control" id="cli_nom" name="cli_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="cli_ruc">RUC</label>
                            <input type="text" class="form-control" id="cli_ruc" name="cli_ruc" placeholder="RUC" required> 
                        </div>

                        <div class="form-group">
                            <label for="cli_tel">Telefono</label>
                            <input type="text" class="form-control" id="cli_tel" name="cli_tel" placeholder="Telefono" required> 
                        </div>

                        <div class="form-group">
                            <label for="cli_correo">Email</label>
                            <input type="email" class="form-control" id="cli_correo" name="cli_correo" placeholder="Email" required> 
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