<?php

    class Conectar{
        protected $conn;

        protected function Conexion(){
            try{
                $conectar = $this->conn = new PDO("mysql:host=locahost;dbname=sistemCompraVenta", "root","");
                return $conectar;
            }catch(Exception $e){
                print "Error de conexion a la Base de Datos".$e->getMessage()."<br/>";
            }
        }
    }

?>
