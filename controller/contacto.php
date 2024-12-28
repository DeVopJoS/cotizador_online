<?php
    require_once("../config/conexion.php");
    require_once("../models/Contacto.php");

    $contacto = new Contacto();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['con_id']) && $_POST['con_id'] > 0){
                $contacto->insert_contacto($_POST['cli_id'], $_POST['car_id'], $_POST['con_nom'], $_POST['con_correo'], $_POST['con_tel']);
            } else {
                $contacto->update_contacto($_POST['cli_id'], $_POST['car_id'], $_POST['con_nom'], $_POST['con_correo'], $_POST['con_tel'], $_POST['con_id']);
            }
            break;
        case 'listar':
            $datos = $contacto->get_contacto();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['cli_id'];
                $sub_array[] = $row['car_id'];
                $sub_array[] = $row['con_nom'];
                $sub_array[] = $row['con_correo'];
                $sub_array[] = $row['con_tel'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['con_id'].')" id="'.$row['con_id'].'"></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['con_id'].')" id="'.$row['con_id'].'"></button>';
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
            $datos = $contacto->get_contacto_x_id($_POST['con_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['cli_id'] = $row['cli_id'];
                    $output['car_id'] = $row['car_id'];
                    $output['con_nom'] = $row['con_nom'];
                    $output['con_correo'] = $row['con_correo'];
                    $output['con_tel'] = $row['con_tel'];
                    $output['con_id'] = $row['con_id'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $contacto->delete_contacto($_POST['con_id']);
            break;
        case 'combo':
            $datos = $contacto->get_contacto();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['con_id'] .'> '. $row['con_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>