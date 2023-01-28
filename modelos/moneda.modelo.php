<?php
    class Moneda extends Conectar{
        /* TODO:Listar Registros */
        public function listarMonedaSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaMonedaSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarMoneda($monedaid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaMoneda ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $monedaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarMoneda($monedaid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarMoneda ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $monedaid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarMoneda($sucursalid,$nombrecategotria){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarMoneda ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $nombrecategotria);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarMoneda($id,$sucursalid,$nombrecategotria){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateMoneda ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $sucursalid);
            $query->bindParam(3, $nombrecategotria);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>