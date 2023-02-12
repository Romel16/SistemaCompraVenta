<?php
/*TODO: Llamando a clases*/
require_once("../config/conexion.php");
require_once("../modelos/producto.modelo.php");
    /*TODO: inicializando clases*/
    $producto = new Producto(); 

    switch($_GET["op"]){
       /* TODO: guardar y editar; guardar cuando el ID esté vacio, y Actualizar cuando se envie el ID*/
        case "guardaryeditar":
            if (empty($_POST["productoid"])) {
                $producto->insertarProducto($_POST["sucursalid"], $_POST["categoriaid"], $_POST["productonombre"], $_POST["productodescripcion"], $_POST["unidadid"], $_POST["monedaid"], $_POST["productocompra"], $_POST["productoventa"], $_POST["productostock"], $_POST["productofechavencimiento"], $_POST["imagen"]);
            }else{
                $producto->actualizarProducto($_POST["productoid"],$_POST["sucursalid"],$_POST["categoriaid"], $_POST["productonombre"], $_POST["productodescripcion"], $_POST["unidadid"], $_POST["monedaid"], $_POST["productocompra"], $_POST["productoventa"], $_POST["productostock"], $_POST["productofechavencimiento"], $_POST["imagen"]);
            }
            break;

            /* TODO: listado de registros formato JSON para DataTable JS*/
        case "listar":
            $datos = $producto->listarProductoSucursal($_POST["sucursalid"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["productonombre"];
                $sub_array = $row["productodescripcion"];
                $sub_array = $row["productocompra"];
                $sub_array = $row["productoventa"];
                $sub_array = $row["productostock"];
                $sub_array = $row["productofechavencimiento"];
                $sub_array = $row["imagen"];
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
            /* TODO: Mostrar informacion de registros segun su ID*/
        case "mostrar":
            $datos = $producto->listarProducto($_POST["productoid"]);
            if (is_array($datos)==true and count($datos)>0) {
                foreach($datos as $row){
                    $output["productoid"] = $row["productoid"];
                    $output["categoriaid"] = $row["sucursalid"];
                    $output["productonombre"] = $row["productonombre"];
                    $output["productodescripcion"] = $row["productodescripcion"];
                    $output["productocompra"] = $row["productocompra"];
                    $output["productoventa"] = $row["productoventa"];
                    $output["productostock"] = $row["productostock"];
                    $output["productofechavencimiento"] = $row["productofechavencimiento"];
                    $output["productoimagen"] = $row["productoimagen"];
                }
                echo json_encode($output);
            }
                break;
                /* TODO: cambio de estado a INACTIVO en el registro*/
        case "eliminar":
            $producto->eliminarProducto($_POST["productoid"]);
                break;

    }