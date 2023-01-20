<?php
    class Categoria extends Conectar{
        /* TODO:Listar Registros */
        public function listarCategoriaSucurcal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaCategoriaSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarCategoria($categoriaid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaCategoria ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $categoriaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarCategoria($categoriaid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarCategoria ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $categoriaid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarCategoria($sucursalid,$nombrecategotria){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarCategoria ?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $nombrecategotria);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarCategoria($id,$sucursalid,$nombrecategotria){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateCategoria ?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $sucursalid);
            $query->bindParam(3, $nombrecategotria);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>