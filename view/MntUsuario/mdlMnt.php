<div class="modal modal-message fade" id="mdlMnt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdlTitulo"></h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="mnt_form" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="usu_id" id="usu_id" value="">
                    <fieldset>
                        <div class="form-group">
                            <label for="usu_nom">Nombre</label>
                            <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Nombre" required> 
                        </div>

                        <div class="form-group">
                            <label for="usu_ape">Apellido</label>
                            <input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="Apellido" required> 
                        </div>
                        
                        <div class="form-group">
                            <label for="usu_correo">Correo</label>
                            <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Correo Electrónico" required> 
                        </div>

                        <div class="form-group">
                            <label for="usu_pass">Password</label>
                            <input type="password" class="form-control" id="usu_pass" name="usu_pass" placeholder="Cotraseña" required> 
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