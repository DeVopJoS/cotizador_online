<?php
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");

    $categoria = new Categoria();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['cat_id'])){
                $categoria->insert_categoria($_POST['cat_nom'], $_POST['cat_desc']);
            } else {
                $categoria->update_categoria($_POST['cat_nom'], $_POST['cat_desc'], $_POST['cat_id']);
            }
            break;
        case 'listar':
            $datos = $categoria->get_categoria();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['cat_nom'];
                $sub_array[] = $row['cat_desc'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['cat_id'].')" id="'.$row['cat_id'].'" class="btn btn-success btn-icon btn-circle">
                                    <i class="fa fa-edit"></i>
                                </button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['cat_id'].')" id="'.$row['cat_id'].'" class="btn btn-danger btn-icon btn-circle">
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
            $datos = $categoria->get_categoria_x_id($_POST['cat_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['cat_id'] = $row['cat_id'];
                    $output['cat_nom'] = $row['cat_nom'];
                    $output['cat_desc'] = $row['cat_desc'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $categoria->delete_categoria($_POST['cat_id']);
            break;
        case 'combo':
            $datos = $categoria->get_categoria();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['cat_id'] .'> '. $row['cat_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>