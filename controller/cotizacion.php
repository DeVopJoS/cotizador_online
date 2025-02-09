<?php
require_once("../config/conexion.php");
require_once("../models/Cotizacion.php");

$cotizacion = new Cotizacion();
switch ($_GET['op']) {
    case 'guardar':
        if (empty($_POST['cot_id'])) {
            $datos = $cotizacion->insert_cotizacion(
                $_POST['cli_id'],
                $_POST['con_id'],
                $_POST['cli_ci'],
                $_POST['con_tel'],
                $_POST['con_email'],
                $_POST['cot_descrip']
            );

            if (is_array($datos) && count($datos) > 0) {
                foreach ($datos as $row) {
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
        if(is_array($datos) && count($datos) > 0){
            foreach($datos as $row){
                $output['cotd_id'] = $row['cotd_id'];
            }

            echo json_encode($output);
        }
        break;
    case 'listard':
        $datos = $cotizacion->get_dcotizacion($_POST['cot_id']);
        $data = Array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['cat_nom'];
            $sub_array[] = $row['prod_nom'];
            $sub_array[] = $row['cotd_precio'];
            $sub_array[] = $row['cotd_cantidad'];
            $sub_array[] = $row['cotd_profit'];
            $sub_array[] = $row['cotd_total'];
            $sub_array[] = '<button type="button" onClick="editar(' . $row['cotd_id'] . ')" id="' . $row['cotd_id'] . '" class="btn btn-success btn-icon btn-circle"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row['cotd_id'] . ')" id="' . $row['cotd_id'] . '" class="btn btn-danger btn-icon btn-circle"><i class="fa fa-trash"></i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            'sEcho' => 1,
            'iTotalRecords' => count($data),
            'iTotalDisplayRecords' => count($data),
            'aaData' => $data
        );
        echo json_encode($results);
        break;
}
