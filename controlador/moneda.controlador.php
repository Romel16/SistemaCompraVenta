<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/moneda.modelo.php");
    /*TODO: inicializando clases*/
    $moneda = new Moneda();

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["monedaid"])) {
                $moneda->insertarMoneda($_POST["sucursalid"], $_POST["monedanombre"]);
            }else{
                $moneda->actualizarMoneda($_POST["monedaid"],$_POST["sucursalid"], $_POST["monedanombre"]);
            }

            break;
            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $moneda->listarMonedaSucursal($_POST["sucursalid"]);
            $data = array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["monedanombre"];
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
            $datos = $moneda->listarMoneda($_POST["monedaid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["monedaid"] = $row["monedaid"];
                    $output["sucursalid"] = $row["sucursalid"];
                    $output["monedanombre"] = $row["monedanombre"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $moneda->eliminarMoneda($_POST["monedaid"]);
                break;

    }