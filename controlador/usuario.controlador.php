<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/usuario.modelo.php");
    /*TODO: inicializando clases*/
    $usuario = new Usuario(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["usuarioid"])) {
                $usuario->insertarUsuario($_POST["sucursalid"], $_POST["usuariocorreo"], $_POST["usuarionombre"], $_POST["usuarioapellido"], $_POST["usuariodni"], $_POST["usuariotelefono"], $_POST["usuariopassword"], $_POST["rolid"]);
            }else{
                $usuario->actualizarUsuario($_POST["usuarioid"],$_POST["sucursalid"], $_POST["usuarionombre"], $_POST["usuariocorreo"], $_POST["usuarioapellido"], $_POST["usuariodni"], $_POST["usuariotelefono"], $_POST["usuariopassword"], $_POST["rolid"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $usuario->listarUsuarioSucursal($_POST["sucursalid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["usuarionombre"];
                $sub_array = $row["usuarioapellido"];
                $sub_array = $row["usuariodni"];
                $sub_array = $row["usuariopassword"];
                $sub_array = $row["rolid"];
                $sub_array = "Editar";
                $sub_array = "Eliminar";
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords" =>count($data),
                "iTotalDisplayRecords" =>count($data),
                "aaData" =>$data);
            echo json_encode($results);
            break;
            /* TODO: Mostrar informacion de registrossegun su ID*/
        case "mostrar":
            $datos = $usuario->listarUsuario($_POST["usuarioid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["usuarioid"] = $row["usuarioid"];
                    $output["sucursalid"] = $row["sucursalid"];
                    $output["usuarionombre"] = $row["usuarionombre"];
                    $output["usuarioapellido"] = $row["usuarioapellido"];
                    $output["usuariodni"] = $row["usuariodni"];
                    $output["usuariotelefono"] = $row["usuariotelefono"];
                    $output["usuariopassword"] = $row["usuariopassword"];
                    $output["rolid"] = $row["rolid"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $usuario->eliminarUsuario($_POST["usuarioid"]);
                break;

    }