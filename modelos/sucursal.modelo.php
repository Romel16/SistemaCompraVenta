<?php
    class Sucursal extends Conectar{
        /* TODO:Listar Registros */
        public function listarSucursalCompaniaId($empresaid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarSucursalId($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarSucursal($empresaid,$sucursalNombre){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarSucursal ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->bindParam(2, $sucursalNombre); 
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarSucursal($empresaid,$sucursalid,$sucursalNombre){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateSucursal ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->bindParam(2, $sucursalid);
            $query->bindParam(3, $sucursalNombre);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>