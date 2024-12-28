<?php
    class Contacto extends Conectar{
        public function get_contacto(){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_contacto WHERE estado = 1";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_contacto_x_id($con_id){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_contacto WHERE con_id = ? AND estado = 1";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $con_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_contacto($con_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_contacto SET estado = 0 WHERE con_id = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $con_id);
            $query->execute();
        }

        public function insert_contacto($cli_id, $car_id, $con_nom, $con_correo, $con_tel){
            $conectar = parent::conexion();
            $sql = "INSERT INTO tm_contacto (con_nom, con_ruc, con_correo) 
            VALUES(?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->bindValue(2, $car_id);
            $query->bindValue(3, $con_nom);
            $query->bindValue(4, $con_correo);
            $query->bindValue(5, $con_tel);
            $query->execute();
        }

        public function update_contacto($cli_id, $car_id, $con_nom, $con_correo, $con_tel, $con_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_contacto SET cli_id=?, car_id=?, con_nom=?, con_correo=?, con_correo=? WHERE con_id=?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->bindValue(2, $car_id);
            $query->bindValue(3, $con_nom);
            $query->bindValue(4, $con_correo);
            $query->bindValue(5, $con_tel);
            $query->bindValue(6, $con_id);
            $query->execute();
        }
    }
?>