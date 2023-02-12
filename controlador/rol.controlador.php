<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/rol.modelo.php");
    /*TODO: inicializando clases*/
    $rol = new Rol();

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["rolid"])) {
                $rol->insertarRol($_POST["sucursalid"], $_POST["rolnombre"]);
            }else{
                $rol->actualizarRol($_POST["rolid"],$_POST["sucursalid"], $_POST["rolnombre"]);
            }

            break;
            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $rol->listarRolSucursal($_POST["sucursalid"]);
            $data = array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["rolnombre"];
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
            $datos = $rol->listarRol($_POST["rolid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["rolid"] = $row["rolid"];
                    $output["sucursalid"] = $row["sucursalid"];
                    $output["rolnombre"] = $row["rolnombre"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $rol->eliminarRol($_POST["rolid"]);
                break;

    }