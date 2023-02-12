<?php
    class Cliente extends Conectar{
        /* TODO:Listar Registros */
        public function listarClienteSucursal($empresaid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarClienteporSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarCliente($clienteid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarCliente ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $clienteid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarCliente($clienteid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarCliente ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $clienteid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarCliente($empresaid,$nombrecliente,$clienteRuc,$clienteTelefono,$clienteDireccion,$clienteCorreo){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarCliente ?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $empresaid);
            $query->bindParam(2, $nombrecliente);
            $query->bindParam(3, $clienteRuc);
            $query->bindParam(4, $clienteTelefono);
            $query->bindParam(5, $clienteDireccion);
            $query->bindParam(6, $clienteCorreo);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarCliente($clienteid,$empresaid,$nombrecliente,$clienteRuc,$clienteTelefono,$clienteDireccion,$clienteCorreo){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateCliente ?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $clienteid);
            $query->bindParam(2, $empresaid);
            $query->bindParam(3, $nombrecliente);
            $query->bindParam(4, $clienteRuc);
            $query->bindParam(5, $clienteTelefono);
            $query->bindParam(6, $clienteDireccion);
            $query->bindParam(7, $clienteCorreo);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>