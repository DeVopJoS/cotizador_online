<?php
    require_once("../config/conexion.php");
    require_once("../models/Empresa.php");

    $empresa = new Empresa();
    switch($_GET['op']){
        case 'guardaryeditar':
            if(empty($_POST['emp_id'])){
                $empresa->insert_empresa($_POST['emp_nom'], $_POST['emp_porcen']);
            } else {
                $empresa->update_empresa($_POST['emp_nom'], $_POST['emp_porcen'], $_POST['emp_id']);
            }
            break;
        case 'listar':
            $datos = $empresa->get_empresa();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['emp_nom'];
                $sub_array[] = $row['emp_porcen'];
                $sub_array[] = '<button type="button" onClick="editar('.$row['emp_id'].')" id="'.$row['emp_id'].'" class="btn btn-success btn-icon btn-circle">
                                    <i class="fa fa-edit"></i>
                                </button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['emp_id'].')" id="'.$row['emp_id'].'" class="btn btn-danger btn-icon btn-circle">
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
            $datos = $empresa->get_empresa_x_id($_POST['emp_id']);
            if(is_array($datos) && count($datos) > 0){
                foreach($datos as $row){
                    $output['emp_id'] = $row['emp_id'];
                    $output['emp_nom'] = $row['emp_nom'];
                    $output['emp_porcen'] = $row['emp_porcen'];
                }

                echo json_encode($output);
            }
            break;
        case 'eliminar':
            $empresa->delete_empresa($_POST['emp_id']);
            break;
        case 'combo':
            $datos = $empresa->get_empresa();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['emp_id'] .'> '. $row['emp_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>