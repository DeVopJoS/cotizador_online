<?php
    class Usuario extends Conectar{
        public function get_usuario(){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_usuario WHERE estado = 1";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_usuario_x_id($usu_id){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_usuario WHERE usu_id = ? AND estado = 1";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $usu_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_usuario($usu_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_usuario SET estado = 0 WHERE usu_id = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $usu_id);
            $query->execute();
        }

        public function insert_usuario($usu_nom, $usu_ape, $usu_correo, $usu_pass){
            $conectar = parent::conexion();
            $sql = "INSERT INTO tm_usuario (usu_nom, usu_ape, usu_correo, usu_pass) VALUES(?,?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $usu_nom);
            $query->bindValue(2, $usu_ape);
            $query->bindValue(3, $usu_correo);
            $query->bindValue(4, $usu_pass);
            $query->execute();
        }

        public function update_usuario($usu_nom, $usu_ape, $usu_correo, $usu_pass, $usu_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_usuario SET usu_nom=?, usu_ape=?, usu_correo=?, usu_pass=? WHERE usu_id=?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $usu_nom);
            $query->bindValue(2, $usu_ape);
            $query->bindValue(3, $usu_correo);
            $query->bindValue(4, $usu_pass);
            $query->bindValue(5, $usu_id);
            $query->execute();
        }
    }
?>