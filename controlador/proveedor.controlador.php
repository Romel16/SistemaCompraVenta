<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/proveedor.modelo.php");
    /*TODO: inicializando clases*/
    $proveedor = new Proveedor(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["proveedorid"])) {
                $proveedor->insertarProveedor($_POST["empresaid"], $_POST["proveedornombre"], $_POST["proveedoruc"], $_POST["proveedortelefono"], $_POST["proveedordireccion"], $_POST["proveedorcorreo"]);
            }else{
                $proveedor->actualizarProveedor($_POST["proveedorid"],$_POST["empresaid"], $_POST["proveedornombre"], $_POST["proveedoruc"], $_POST["proveedortelefono"], $_POST["proveedordireccion"], $_POST["proveedorcorreo"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $proveedor->listarProveedorSucursal($_POST["sucursalid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["proveedornombre"];
                $sub_array = $row["proveedorruc"];
                $sub_array = $row["proveedortelefono"];
                $sub_array = $row["proveedorcorreo"];
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
            $datos = $proveedor->listarProveedor($_POST["proveedorid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["proveedorid"] = $row["proveedorid"];
                    $output["empresaid"] = $row["empresaid"];
                    $output["proveedornombre"] = $row["proveedornombre"];
                    $output["proveedorruc"] = $row["proveedorruc"];
                    $output["proveedortelefono"] = $row["proveedortelefono"];
                    $output["proveedordireccion"] = $row["proveedordireccion"];
                    $output["proveedorcorreo"] = $row["proveedorcorreo"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $proveedor->eliminarProveedor($_POST["proveedorid"]);
                break;

    }