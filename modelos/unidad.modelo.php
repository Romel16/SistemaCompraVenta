<?php
    class Unidad extends Conectar{
        /* TODO:Listar Registros */
        public function listarUnidadSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaUnidadSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarUnidad($unidadid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaUnidad ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $unidadid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarUnidad($unidadid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarUnidad ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $unidadid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarUnidad($sucursalid,$nombreunidad){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarUnidad ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $nombreunidad);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarUnidad($id,$sucursalid,$nombreunidad){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateUnidad ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $sucursalid);
            $query->bindParam(3, $nombreunidad);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>