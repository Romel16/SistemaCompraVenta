<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/cliente.modelo.php");
    /*TODO: inicializando clases*/
    $cliente = new Cliente(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["clienteid"])) {
                $cliente->insertarCliente($_POST["empresaid"], $_POST["clientenombre"], $_POST["clienteruc"], $_POST["clientetelefono"], $_POST["clientedireccion"], $_POST["clientecorreo"]);
            }else{
                $cliente->actualizarCliente($_POST["clienteid"],$_POST["empresaid"], $_POST["clientenombre"], $_POST["clienteruc"], $_POST["clientetelefono"], $_POST["clientedireccion"], $_POST["clientecorreo"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $cliente->listarCliente($_POST["empresaid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["clientenombre"];
                $sub_array = $row["clienteruc"];
                $sub_array = $row["clientetelefono"];
                $sub_array = $row["clientedireccion"];
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
            $datos = $cliente->listarCliente($_POST["clienteid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["clienteid"] = $row["clienteid"];
                    $output["empresaid"] = $row["empresaid"];
                    $output["clientenombre"] = $row["clientenombre"];
                    $output["clienteruc"] = $row["clienteruc"];
                    $output["clientetelefono"] = $row["clientetelefono"];
                    $output["clientedireccion"] = $row["clientedireccion"];
                    $output["clientecorreo"] = $row["clientecorreo"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $cliente->eliminarCliente($_POST["clienteid"]);
                break;

    }