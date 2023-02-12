<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/unidad.modelo.php");
    /*TODO: inicializando clases*/
    $unidad = new Unidad();

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["unidadid"])) {
                $unidad->insertarUnidad($_POST["sucursalid"], $_POST["unidadnombre"]);
            }else{
                $unidad->actualizarUnidad($_POST["unidadid"],$_POST["sucursalid"], $_POST["unidadnombre"]);
            }

            break;
            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $unidad->listarUnidadSucursal($_POST["sucursalid"]);
            $data = array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["unidadnombre"];
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
            $datos = $unidad->listarUnidad($_POST["unidadid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["unidadid"] = $row["unidadid"];
                    $output["sucursalid"] = $row["sucursalid"];
                    $output["unidadnombre"] = $row["unidadnombre"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $unidad->eliminarUnidad($_POST["unidadid"]);
                break;

    }