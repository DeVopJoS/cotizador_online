<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");

    $usuario = new Usuario();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['usu_id'])){
                $usuario->insert_usuario($_POST['usu_nom'], $_POST['usu_ape'], $_POST['usu_correo'], $_POST['usu_pass']);
            } else {
                $usuario->update_usuario($_POST['usu_nom'], $_POST['usu_ape'], $_POST['usu_correo'], $_POST['usu_pass'], $_POST['usu_id']);
            }
            break;
        case 'listar':
            $datos = $usuario->get_usuario();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['usu_nom']. ' '. $row['usu_ape'];
                $sub_array[] = $row['usu_correo'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['usu_id'].')" id="'.$row['usu_id'].'" class="btn btn-success btn-icon btn-circle">
                <i class="fa fa-edit"></i>
                </button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['usu_id'].')" id="'.$row['usu_id'].'" class="btn btn-danger btn-icon btn-circle">
                <i class="fa fa-trash"></i>
                </button>';
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
            $datos = $usuario->get_usuario_x_id($_POST['usu_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['usu_id'] = $row['usu_id'];
                    $output['usu_nom'] = $row['usu_nom'];
                    $output['usu_ape'] = $row['usu_ape'];
                    $output['usu_correo'] = $row['usu_correo'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $usuario->delete_usuario($_POST['usu_id']);
            break;
        case 'combo':
            $datos = $usuario->get_usuario();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['usu_id'] .'> '. $row['usu_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>