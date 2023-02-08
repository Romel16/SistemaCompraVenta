<?php
    class Producto extends Conectar{
        /* TODO:Listar Registros */
        public function listarProductoSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarProductoporSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarProducto($productoid){
            $conectar = parent::Conexion();
            $mysql = "sp_listarProducto ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $productoid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarProducto($productoid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarProducto ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $productoid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarProducto($sucursalid,$categoriaid,$productonombre,$productodescripcion,
                        $unidadid,$monedaid,$preciocompra,$precioventa,$productostock,$fechavencimiento,$imagen){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarProducto ?,?,?,?,?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $categoriaid);
            $query->bindParam(3, $productonombre);
            $query->bindParam(4, $productodescripcion);
            $query->bindParam(5, $unidadid);
            $query->bindParam(6, $preciocompra);
            $query->bindParam(7, $monedaid);
            $query->bindParam(8, $precioventa);
            $query->bindParam(9, $productostock);
            $query->bindParam(10, $fechavencimiento);
            $query->bindParam(11, $imagen);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarProducto($sucursalid,$categoriaid,$productonombre,$productodescripcion,
        $unidadid,$monedaid,$preciocompra,$precioventa,$productostock,$fechavencimiento,$imagen){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateProducto ?,?,?,?,?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $categoriaid);
            $query->bindParam(3, $productonombre);
            $query->bindParam(4, $productodescripcion);
            $query->bindParam(5, $unidadid);
            $query->bindParam(6, $preciocompra);
            $query->bindParam(7, $monedaid);
            $query->bindParam(8, $precioventa);
            $query->bindParam(9, $productostock);
            $query->bindParam(10, $fechavencimiento);
            $query->bindParam(11, $imagen);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>