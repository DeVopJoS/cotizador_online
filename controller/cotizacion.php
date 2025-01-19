<?php
    require_once("../config/conexion.php");
    require_once("../models/Cotizacion.php");

    $cotizacion = new Cotizacion();
    switch($_GET['op']){
        case 'guardar':
            $datos = $cotizacion->insert_cotizacion(
                $_POST['cli_id'],
                $_POST['con_id'],
                $_POST['cli_ci'],
                $_POST['con_tel'],
                $_POST['con_email'],
                $_POST['cot_descrip']
            );
            echo json_encode($datos);
            break;
    }
?>