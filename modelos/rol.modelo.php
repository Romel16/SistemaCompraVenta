<?php
    class Rol extends Conectar{
        /* TODO:Listar Registros */
        public function listarRolSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaRolSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarRol($rolid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaRol ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $rolid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarRol($rolid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarRol ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $rolid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarRol($sucursalid,$nombrerol){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarRol ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $nombrerol);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarRol($id,$sucursalid,$nombrerol){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateRol ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $sucursalid);
            $query->bindParam(3, $nombrerol);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>