<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/categoria.modelo.php");
    /*TODO: inicializando clases*/
    $categoria = new Categoria(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["categoriaid"])) {
                $categoria->insertarCategoria($_POST["sucursalid"], $_POST["categorianombre"]);
            }else{
                $categoria->actualizarCategoria($_POST["categoriaid"],$_POST["sucursalid"], $_POST["categorianombre"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $categoria->listarCategoria($_POST["sucursalid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["categorianombre"];
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
            $datos = $categoria->listarCategoria($_POST["categoriaid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["categoriaid"] = $row["categoriaid"];
                    $output["sucursalid"] = $row["sucursalid"];
                    $output["categorianombre"] = $row["categorianombre"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $categoria->eliminarCategoria($_POST["categoriaid"]);
                break;

    }