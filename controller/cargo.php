<?php
    require_once("../config/conexion.php");
    require_once("../models/Cargo.php");

    $cargo = new Cargo();
    switch($_GET['op']){
        case 'combo':
            $datos = $cargo->get_cargo();
            if(is_array($datos) && count($datos)>0){
                $html = '';
                $html .= '<option selected> Seleccionar </option>';
                foreach($datos as $row){
                    $html .= '<option value='. $row['car_id'] .'> '. $row['car_nom'] .' </option>';
                }
                echo $html;
            }
            break;
    }
?>