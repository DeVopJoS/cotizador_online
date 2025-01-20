<?php
    require_once("../config/conexion.php");
    require_once("../models/Cotizacion.php");

    $cotizacion = new Cotizacion();
    switch($_GET['op']){
        case 'guardar':
            if( empty($_POST['cot_id']) ){  
                $datos = $cotizacion->insert_cotizacion(
                    $_POST['cli_id'],
                    $_POST['con_id'],
                    $_POST['cli_ci'],
                    $_POST['con_tel'],
                    $_POST['con_email'],
                    $_POST['cot_descrip']
                );
 
                if(is_array($datos) && count($datos) > 0){
                    foreach($datos as $row){
                        $output['cot_id'] = $row['cot_id']; 
                    }
                }
                echo json_encode($output);
            }
        break;
        case 'dguardar': 
            $datos = $cotizacion->insert_dcotizacion(
                $_POST['cot_id'],
                $_POST['cat_id'],
                $_POST['prod_id'],
                $_POST['cotd_precio'],
                $_POST['cotd_cant']
            );
            break;
    }
?>