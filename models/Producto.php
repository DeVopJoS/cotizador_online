<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_producto WHERE estado = 1";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_producto_x_id($prod_id){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM tm_producto WHERE prod_id = ? AND estado = 1";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_producto($prod_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_producto SET estado = 0 WHERE prod_id = ?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $prod_id);
            $query->execute();
        }

        public function insert_producto($cat_id, $prod_nom, $prod_desc, $prod_precio){
            $conectar = parent::conexion();
            $sql = "INSERT INTO tm_producto (cat_id, prod_nom, prod_desc, prod_precio) VALUES(?,?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->bindValue(2, $prod_nom);
            $query->bindValue(3, $prod_desc);
            $query->bindValue(4, $prod_precio);
            $query->execute();
        }

        public function update_producto($cat_id, $prod_nom, $prod_desc, $prod_precio, $prod_id){
            $conectar = parent::conexion();
            $sql = "UPDATE tm_producto SET cat_id=?, prod_nom=?, prod_desc=?, prod_desc=? WHERE prod_id=?";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $cat_id);
            $query->bindValue(2, $prod_nom);
            $query->bindValue(3, $prod_desc);
            $query->bindValue(4, $prod_precio);
            $query->bindValue(5, $prod_id);
            $query->execute();
        }
    }
?>