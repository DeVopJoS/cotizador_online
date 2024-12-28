<?php
    class Cliente extends Conectar{
        public function get_cliente(){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_cliente WHERE estado = 1";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cliente_x_id($cli_id){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_cliente WHERE cli_id = ? AND estado = 1";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cliente($cli_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_cliente SET estado = 0 WHERE cli_id = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_id);
            $query->execute();
        }

        public function insert_cliente($cli_nom, $cli_ruc, $cli_correo){
            $conectar = parent::conexion();
            $sql = "INSERT INTO tm_cliente (cli_nom, cli_ruc, cli_correo) 
            VALUES(?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_nom);
            $query->bindValue(2, $cli_ruc);
            $query->bindValue(3, $cli_correo);
            $query->execute();
        }

        public function update_cliente($cli_nom, $cli_ruc, $cli_correo,$cli_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_cliente SET cli_nom=?, cli_ruc=?, cli_correo=? WHERE cli_id=?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cli_nom);
            $query->bindValue(2, $cli_ruc);
            $query->bindValue(3, $cli_correo);
            $query->bindValue(4, $cli_id);
            $query->execute();
        }
    }
?>