<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/Clientes.php");
//Modifique el link a la ubicacion del model usuariosSure XXX

/* Declara la clase */
$general = new General();

switch ($_GET["op"]) {
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Combo-box------------------------------------------------------------------------------------------------------------------------------

    case "combo":
        $datos = $general->get_combo_info();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value='0'>Escoger...</option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['idTipoCliente'] . "'>" . $row['idTipoCliente'] . "</option>";
            }

            //retorna el htm;
            echo $html;
        }
        break;


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
            $sub_array[] = $row["idCliente"];
            $sub_array[] = $row["idTipoCliente"];
            $sub_array[] = $row["codigoCliente"];
            $sub_array[] = $row["numeroIdentidad"];
            $sub_array[] = $row["nombreCliente"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificado"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idCliente"] . ');"  id="' . $row["idCliente"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idCliente"] . ');"  id="' . $row["idCliente"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        if (empty($_POST["idCliente"])) {
            $general->insert_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoCliente"],
                $_POST["numeroIdentidad"],
                $_POST["nombreCliente"],
                $_POST["sidusuario"]

            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoCliente"],
                $_POST["numeroIdentidad"],
                $_POST["nombreCliente"],
                $_POST["sidusuario"],
                $_POST["idCliente"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idCliente"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idCliente"] = $row["idCliente"];
                $output["idTipoCliente"] = $row["idTipoCliente"];
                $output["codigoCliente"] = $row["codigoCliente"];
                $output["numeroIdentidad"] = $row["numeroIdentidad"];
                $output["nombreCliente"] = $row["nombreCliente"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idCliente"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
