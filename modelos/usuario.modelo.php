<?php
    class Usuario extends Conectar{
        /* TODO:Listar Registros */
        public function listarUsuarioSucursal($sucursalid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaUsuarioSucursal ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listar Registro por ID en Especifico */
        public function listarUsuario($usuarioid){
            $conectar = parent::Conexion();
            $mysql = "sp_ListaUsuario ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $usuarioid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Eliminar o cambiar estado a eliminado */
        public function eliminarUsuario($usuarioid){
            $conectar = parent::Conexion();
            $mysql = "sp_EliminarUsuario ?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $usuarioid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Registro de Datos */
        public function insertarUsuario($sucursalid,$usuariocorreo,$usuarionombre,$usuarioapellido,$usuariodni,
                                $usuariotelefono,$usuariopassword,$rolid){
            $conectar = parent::Conexion();
            $mysql = "sp_InsertarUsuario ?,?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $usuariocorreo);
            $query->bindParam(3, $usuarionombre);
            $query->bindParam(4, $usuarioapellido);
            $query->bindParam(5, $usuariodni);
            $query->bindParam(6, $usuariotelefono);
            $query->bindParam(7, $usuariopassword);
            $query->bindParam(8, $rolid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Actualizar Registro */
        public function actualizarUsuario($sucursalid,$usuarioid,$usuariocorreo,$usuarionombre,$usuarioapellido,$usuariodni,
                $usuariotelefono,$usuariopassword,$rolid){
            $conectar = parent::Conexion();
            $mysql = "sp_UpdateUsuario ?,?,?,?,?,?,?,?,?";
            $query = $conectar->prepare($mysql);
            $query->bindParam(1, $sucursalid);
            $query->bindParam(2, $usuarioid);
            $query->bindParam(3, $usuariocorreo);
            $query->bindParam(4, $usuarionombre);
            $query->bindParam(5, $usuarioapellido);
            $query->bindParam(6, $usuariodni);
            $query->bindParam(7, $usuariotelefono);
            $query->bindParam(8, $usuariopassword);
            $query->bindParam(9, $rolid);
            $query->execute();
            //return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        /* TODO: acceso al sistema */
        public function login(){
            $conectar = parent::Conexion();
            if (isset($_POST["enviar"])) {
                $sucursal= $_POST["sucursal_id"];
                $correo= $_POST["correo"];
                $pass= $_POST["password"];

                if (empty($sucursal) and empty($correo) and empty($pass)) {
                    exit();
                }else{
                    $mysql = "sp_listarAccesoUsuario ?,?,?";
                    $query = $conectar->prepare($mysql);
                    $query->bindParam(1, $sucursal);
                    $query->bindParam(2, $correo);
                    $query->bindParam(3, $pass);
                    $query->execute();
                    $resultado = $query->fetch();
                    if (is_array($resultado) and count($resultado)>0) {
                        $_SESSION["usuario_id"]= $resultado["usuarioId"];
                        $_SESSION["sucursal_id"]= $resultado["usuarioSucursalId"];

                        header("Location:".Conectar::ruta()."vista/home/");
                    }else{
                        exit();
                    }
                }
            }else{
                exit();
            }
        }
    }

?>