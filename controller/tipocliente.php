<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/TipoCliente.php");
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
            $sub_array[] = $row["idTipoCliente"];
            $sub_array[] = $row["codigoTipoCliente"];
            $sub_array[] = $row["nombreTipoCliente"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificado"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idTipoCliente"] . ');"  id="' . $row["idTipoCliente"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idTipoCliente"] . ');"  id="' . $row["idTipoCliente"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        if (empty($_POST["idTipoCliente"])) {
            $general->insert_datos(
                $_POST["codigoTipoCliente"],
                $_POST["nombreTipoCliente"],
                $_POST["sidusuario"]
            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["codigoTipoCliente"],
                $_POST["nombreTipoCliente"],
                $_POST["sidusuario"],
                $_POST["idTipoCliente"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idTipoCliente"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idTipoCliente"] = $row["idTipoCliente"];
                $output["codigoTipoCliente"] = $row["codigoTipoCliente"];
                $output["nombreTipoCliente"] = $row["nombreTipoCliente"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idTipoCliente"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
