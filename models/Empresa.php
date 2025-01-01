<?php
    class Empresa extends Conectar {
        public function get_empresa(){
            $conectar=parent::conexion();
            $sql="SELECT * FROM tm_empresa WHERE estado=1";
            $query=$conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_empresa_x_id($emp_id){
            $conectar=parent::conexion();
            $sql="SELECT * FROM tm_empresa WHERE emp_id=?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_empresa($emp_id){
            $conectar=parent::conexion();
            $sql="UPDATE tm_empresa SET estado=0 WHERE emp_id=?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_id);
            $query->execute();
        }

        public function insert_empresa($emp_nom, $emp_porcen){
            $conectar=parent::conexion();
            $sql="INSERT INTO tm_empresa (emp_id, emp_nom, emp_porcen, estado) 
            VALUES (NULL, ?, ?, 1);";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_nom);
            $query->bindValue(2,$emp_porcen);
            $query->execute();
        }

        public function update_empresa($emp_nom, $emp_porcen,$emp_id){
            $conectar=parent::conexion();
            $sql="UPDATE tm_empresa SET emp_nom=?, emp_porcen=? WHERE emp_id = ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$emp_nom);
            $query->bindValue(2,$emp_porcen);
            $query->bindValue(3,$emp_id);
            $query->execute();
        }
    }
?>