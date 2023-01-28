<?php
    class Proveedor extends Conectar{
        /* TODO:Listar Registros */
        public function listarProveedorSucursal($empresaid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaProveedorSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarProveedor($proveedorid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaProveedor ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $proveedorid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarProveedor($proveedorid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarProveedor ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $proveedorid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarProveedor($empresaid,$nombreproveedor,$proveedorRuc,$proveedorTelefono,$proveedorDireccion,$proveedorCorreo){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarProveedor ?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->bindParam(2, $nombreproveedor);
            $query->bindParam(3, $proveedorRuc);
            $query->bindParam(4, $proveedorTelefono);
            $query->bindParam(5, $proveedorDireccion);
            $query->bindParam(6, $proveedorCorreo);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarProveedor($proveedorid,$empresaid,$nombreproveedor,$proveedorRuc,$proveedorTelefono,$proveedorDireccion,$proveedorCorreo){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateProveedor ?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $proveedorid);
            $query->bindParam(2, $empresaid);
            $query->bindParam(3, $nombreproveedor);
            $query->bindParam(4, $proveedorRuc);
            $query->bindParam(5, $proveedorTelefono);
            $query->bindParam(6, $proveedorDireccion);
            $query->bindParam(7, $proveedorCorreo);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>