<?php
    class Compania extends Conectar{
        /* TODO:Listar Registros */
        public function listarCompaniaSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarcompaniaporSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarCompania($companiaid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarcompania ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $companiaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarCompania($companiaid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarCompania ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $companiaid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarCompania($nombrecompania){
            $conectar = parent::Conexion();
            $mysql = "sp_Insertarcompania ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $nombrecompania);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarCompania($companiaid,$companianombre){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateCompania ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $companianombre);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>