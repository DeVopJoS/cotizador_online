<?php
    class Cargo extends Conectar {
        public function get_cargo(){
            $conectar=parent::conexion();
            $sql="SELECT * FROM tm_cargo WHERE estado=1";
            $query=$conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>