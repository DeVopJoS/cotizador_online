<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="con_id" id="con_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="cli_id">Cliente</label>
                            <select class="default-select2 form-control" id="cli_id" name="cli_id"></select>
                        </div>

                        <div class="form-group">
                            <label for="car_id">Cargo</label>
                            <select class="default-select2 form-control" id="car_id" name="car_id"></select>
                        </div>

                        <div class="form-group">
                            <label for="con_nom">Nombre</label>
                            <input type="text" class="form-control" id="con_nom" name="con_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="con_correo">Email</label>
                            <input type="text" class="form-control" id="con_correo" name="con_correo" placeholder="Ingrese su correo Electrónico" required> 
                        </div>

                        <div class="form-group">
                            <label for="con_tel">Teléfono</label>
                            <input type="text" class="form-control" id="con_tel" name="con_tel" placeholder="Ingrese su numero de teléfono" required> 
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