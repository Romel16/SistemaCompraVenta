<?php
    class Empresa extends Conectar{
        /* TODO:Listar Registros */
        public function listarEmpresaSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaEmpresaSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarEmpresa($empresaid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaEmpresa ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarEmpresa($empresaid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarEmpresa ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarEmpresa($companiaid,$empresaid,$empresaRuc){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarEmpresa ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $companiaid);
            $query->bindParam(2, $empresaid);            
            $query->bindParam(3, $empresaRuc);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarEmpresa($companiaid,$empresaid,$empresaNombre,$empresaRuc){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateEmpresa ?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $companiaid);
            $query->bindParam(2, $empresaid);
            $query->bindParam(3, $empresaNombre);
            $query->bindParam(4, $empresaRuc);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>