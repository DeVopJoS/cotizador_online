<?php
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");

    $producto = new Producto();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['prod_id']) && $_POST['prod_id'] > 0){
                $producto->insert_producto($_POST['cat_id'], $_POST['prod_nom'], $_POST['prod_desc'], $_POST['prod_precio']);
            } else {
                $producto->update_producto($_POST['cat_id'], $_POST['prod_nom'], $_POST['prod_desc'], $_POST['prod_precio'], $_POST['prod_id']);
            }
            break;
        case 'listar':
            $datos = $producto->get_producto();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['cat_id'];
                $sub_array[] = $row['prod_nom'];
                $sub_array[] = $row['prod_desc'];
                $sub_array[] = $row['prod_precio'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['prod_id'].')" id="'.$row['prod_id'].'"></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['prod_id'].')" id="'.$row['prod_id'].'"></button>';
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
            $datos = $producto->get_producto_x_id($_POST['prod_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['cat_id']      = $row['cat_id'];
                    $output['prod_nom']    = $row['prod_nom'];
                    $output['prod_desc']   = $row['prod_desc'];
                    $output['prod_precio'] = $row['prod_precio'];
                    $output['prod_id']     = $row['prod_id'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $producto->delete_producto($_POST['prod_id']);
            break;
        case 'combo':
            $datos = $producto->get_producto();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['prod_id'] .'> '. $row['prod_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>