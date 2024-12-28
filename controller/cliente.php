<?php
    require_once("../config/conexion.php");
    require_once("../models/Cliente.php");

    $cliente = new Cliente();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['cli_id']) && $_POST['cli_id'] > 0){
                $cliente->insert_cliente($_POST['cli_nom'], $_POST['cli_ruc'], $_POST['cli_correo']);
            } else {
                $cliente->update_cliente($_POST['cli_nom'], $_POST['cli_ruc'], $_POST['cli_correo'], $_POST['cli_id']);
            }
            break;
        case 'listar':
            $datos = $cliente->get_cliente();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['cli_nom'];
                $sub_array[] = $row['cli_ruc'];
                $sub_array[] = $row['cli_correo'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['cli_id'].')" id="'.$row['cli_id'].'"></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['cli_id'].')" id="'.$row['cli_id'].'"></button>';
                $data[] = $sub_array;
            }

            $results = array(
                'sEcho'=>1,
                'iTotalRecords'=>count($data),
                'iTotalDisplayRecords'=>count($data),
                'aaData'=>$data
            );
            echo json_encode($results);
            break;
        case 'mostrar':
            $datos = $cliente->get_cliente_x_id($_POST['cli_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['cli_id'] = $row['cli_id'];
                    $output['cli_nom'] = $row['cli_nom'];
                    $output['cli_ruc'] = $row['cli_ruc'];
                    $output['cli_email'] = $row['cli_email'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $cliente->delete_cliente($_POST['cli_id']);
            break;
        case 'combo':
            $datos = $cliente->get_cliente();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['cli_id'] .'> '. $row['cli_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>