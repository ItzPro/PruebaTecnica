<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/TipoTransaccion.php");
//Modifique el link a la ubicacion del model usuariosSure XXX

/* Declara la clase */
$general = new General();

switch ($_GET["op"]) {

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Listar---------------------------------------------------------------------------------------------------------------------------------

    case "listar_General":
        /* Crear un listado para mostrar en el datatable */
        $datos = $general->get_lista();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["idTipoTransaccion"];
            $sub_array[] = $row["codigoTipoMovimiento"];
            $sub_array[] = $row["codigoTipoTransaccion"];
            $sub_array[] = $row["nombreTipoTransaccion"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificacion"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idTipoTransaccion"] . ');"  id="' . $row["idTipoTransaccion"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idTipoTransaccion"] . ');"  id="' . $row["idTipoTransaccion"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
 */
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);

        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    case "guardaryeditar":

        if (empty($_POST["idTipoTransaccion"])) {
            $general->insert_datos(
                $_POST["codigoTipoMovimiento"],
                $_POST["codigoTipoTransaccion"],
                $_POST["nombreTipoTransaccion"],
                $_POST["sidusuario"]
            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["codigoTipoMovimiento"],
                $_POST["codigoTipoTransaccion"],
                $_POST["nombreTipoTransaccion"],
                $_POST["sidusuario"],
                $_POST["idTipoTransaccion"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idTipoTransaccion"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idTipoTransaccion"] = $row["idTipoTransaccion"];
                $output["codigoTipoMovimiento"] = $row["codigoTipoMovimiento"];
                $output["codigoTipoTransaccion"] = $row["codigoTipoTransaccion"];
                $output["nombreTipoTransaccion"] = $row["nombreTipoTransaccion"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idTipoTransaccion"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
