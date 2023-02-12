<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/compania.modelo.php");
    /*TODO: inicializando clases*/
    $compania = new Compania(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["companiaid"])) {
                $compania->insertarCompania($_POST["companianombre"]);
            }else{
                $compania->actualizarCompania($_POST["companiaid"], $_POST["companianombre"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $compania->listarCompania($_POST["companiaid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
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
            $datos = $compania->listarCompania($_POST["companiaid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["companiaid"] = $row["companiaid"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $compania->eliminarCompania($_POST["companiaid"]);
                break;

    }