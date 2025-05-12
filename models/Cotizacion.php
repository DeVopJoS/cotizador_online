<?php
    class Cotizacion extends Conectar {
        
        public function insert_cotizacion($cli_id, $con_id, $cli_ci, $con_tel, $con_email, $cot_descrip){
            $conectar=parent::conexion();
            parent::set_name();
            $sql="CALL sp_i_cotizacion_01(?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cli_id);
            $sql->bindValue(2,$con_id);
            $sql->bindValue(3,$cli_ci);
            $sql->bindValue(4,$con_tel);
            $sql->bindValue(5,$con_email);
            $sql->bindValue(6,$cot_descrip);
            $sql->execute();

            return $sql->fetchAll();
        }

        public function insert_dcotizacion($cot_id, $cat_id, $prod_id, $cotd_precio, $cotd_cantidad){
            $conectar=parent::conexion();
            $sql="CALL sp_i_cotizacion_02(?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cot_id);
            $sql->bindValue(2,$cat_id);
            $sql->bindValue(3,$prod_id);
            $sql->bindValue(4,$cotd_precio);
            $sql->bindValue(5,$cotd_cantidad);
            $sql->execute();

            return $sql->fetchAll();
        }

        public function get_dcotizacion($cot_id){
            $conectar=parent::conexion();
            $sql="SELECT
                td_cotizacion.cotd_id,
                td_cotizacion.cot_id,
                tm_categoria.cat_nom,
                tm_producto.prod_nom,
                td_cotizacion.cotd_precio,
                td_cotizacion.cotd_cantidad,
                td_cotizacion.cotd_profit,
                td_cotizacion.cotd_total
                FROM td_cotizacion
                INNER JOIN tm_categoria ON td_cotizacion.cat_id = tm_categoria.cat_id
                INNER JOIN tm_producto ON td_cotizacion.prod_id = tm_producto.prod_id
                WHERE td_cotizacion.cot_id = ? AND td_cotizacion.estado = 1;";
            $query=$conectar->prepare($sql);
            $query->bindValue(1, $cot_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_dcotizacion_x_cotd_id($cotd_id) {
            $conectar=parent::conexion();
            $sql="SELECT
                td_cotizacion.cotd_id,
                td_cotizacion.cot_id,
                tm_categoria.cat_nom,
                tm_producto.prod_nom,
                td_cotizacion.cotd_precio,
                td_cotizacion.cotd_cantidad,
                td_cotizacion.cotd_profit,
                td_cotizacion.cotd_total
                FROM td_cotizacion
                INNER JOIN tm_categoria ON td_cotizacion.cat_id = tm_categoria.cat_id
                INNER JOIN tm_producto ON td_cotizacion.prod_id = tm_producto.prod_id
                WHERE td_cotizacion.cotd_id = ? AND td_cotizacion.estado = 1;";
            $query=$conectar->prepare($sql);
            $query->bindValue(1, $cotd_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function eliminar_detalle($cotd_id){
            $conectar=parent::conexion();
            $sql="CALL sp_d_dcotizacion_01(?)";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$cotd_id);
            $query->execute();

            return $query->fetchAll();
        }

        public function update_dcotizacion($pcotd_id, $pcotd_cantidad, $pcotd_profit, $cotd_precio){
            $conectar = parent::conexion();
            $sql = "CALL sp_u_dcotizacion_01(?,?,?,?)";
            $query=$conectar->prepare($sql);
            $query->bindValue(1, $pcotd_id);
            $query->bindValue(2, $pcotd_cantidad);
            $query->bindValue(3, $cotd_precio);
            $query->bindValue(4, $pcotd_profit);
            $query->execute();

            return $query->fetchAll();
        }
    }
?>