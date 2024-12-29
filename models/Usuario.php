<?php
    class Usuario extends Conectar{
        public function login(){
            $conectar = parent::conexion();
            parent::set_name();
            if(isset($_POST['enviar'])){
                $correo = $_POST['usu_correo'];
                $pass = $_POST['usu_pass'];

                if(empty($correo) && empty($pass)){
                    header('Location:'.Conectar::ruta());
                    exit();
                } else {
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? AND usu_pass=? and estado=1";
                    $query = $conectar->prepare($sql);
                    $query->bindValue(1, $correo);
                    $query->bindValue(2, $pass);
                    $query->execute();
                    $resultado = $query->fetch();
                    if(is_array($resultado) && count($resultado) > 0){
                        $_SESSION['usu_id'] = $resultado['usu_id'];
                        $_SESSION['usu_nom'] = $resultado['usu_nom'];
                        $_SESSION['usu_ape'] = $resultado['usu_ape'];
                        header('Location:'.Conectar::ruta().'/view');
                        exit();
                    }else {
                        header('Location:'.Conectar::ruta().'?m=1');
                    }
                }
            } else {
                exit();
            }
        }

        public function get_usuario(){
            $conectar = parent::conexion();
            parent::set_name();
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