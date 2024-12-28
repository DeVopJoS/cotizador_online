<?php
    class Categoria extends Conectar {
        public function get_categoria(){
            $conectar=parent::conexion();
            $sql="SELECT * FROM tm_categoria WHERE estado=1";
            $query=$conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_x_id($cat_id){
            $conectar=parent::conexion();
            $sql="SELECT * FROM tm_categoria WHERE cat_id=?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$cat_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_categoria($cat_id){
            $conectar=parent::conexion();
            $sql="UPDATE tm_categoria SET estado=0 WHERE cat_id=?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$cat_id);
            $query->execute();
        }

        public function insert_categoria($cat_nom, $cat_desc){
            $conectar=parent::conexion();
            $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_desc, estado) 
            VALUES (NULL, ?, ?, '1');";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$cat_nom);
            $query->bindValue(2,$cat_desc);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($cat_nom, $cat_desc,$cat_id){
            $conectar=parent::conexion();
            $sql="UPDATE tm_categoria SET cat_nom=?, cat_desc=? WHERE cat_id = ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$cat_nom);
            $query->bindValue(2,$cat_desc);
            $query->bindValue(3,$cat_id);
            $query->execute();
        }
    }
?>