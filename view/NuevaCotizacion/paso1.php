<div class="panel panel-inverse" id="panel1">
    <div class="panel-heading">
        <h4 class="panel-title">Paso 1 - Datos generales</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <input type="hidden" id="cot_id" name="cot_id">
        <fieldset>
            <div class="form-group">
                <label for="cli_id">Cliente</label>
                <select class="default-select2 form-control" id="cli_id" name="cli_id"></select>
            </div>

            <div class="form-group">
                <label for="con_id">Contacto</label>
                <select class="default-select2 form-control" id="con_id" name="con_id"></select>
            </div>

            <div class="form-group">
                <label for="cli_ci">CI</label>
                <input type="text" class="form-control" id="cli_ci" name="cli_ci" placeholder="CI" required>
            </div>

            <div class="form-group">
                <label for="con_tel">Telefono Contacto</label>
                <input type="text" class="form-control" id="con_tel" name="con_tel" placeholder="Telefono" required>
            </div>

            <div class="form-group">
                <label for="con_email">Email Contacto</label>
                <input type="text" class="form-control" id="con_email" name="con_email" placeholder="Correo Electrónico" required>
            </div>

            <div class="form-group">
                <label for="cot_descrip">Descripción</label>
                <textarea type="text" class="form-control" id="cot_descrip" name="cot_descrip" placeholder="Descripción" rows="3" required> </textarea>
            </div>
        </fieldset>
        <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
            <div class="btn-group mr-2 sw-btn-group" role="group">
                <button id="btncancelar" class="btn btn-danger sw-btn-prev" type="button">Cancelar</button>
                <button id="btnsiguiente1" class="btn btn-primary sw-btn-next" type="button">Siguiente</button>
            </div>
        </div>
    </div>
</div>