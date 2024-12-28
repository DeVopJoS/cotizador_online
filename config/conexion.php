<?php
    // TODO Inicia la sesión si no esta iniciada
    session_start();

    class Conectar{
        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=personal_cotizador", "root", "");
                return $conectar;
            }catch(Exception $e){
                print "Error BD: ".$e->getMessage()."<br>";
                die();
            }
        }

        public function set_name(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
            return "http://localhost/personales/PERSONAL-Cotizador/cotizador_online";
        }
    }
?>