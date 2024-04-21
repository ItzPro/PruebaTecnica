<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/MotivoTransaccion.php");
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
                $html .= "<option value='" . $row['idTipoTransaccion'] . "'>" . $row['idTipoTransaccion'] . "</option>";
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
            $sub_array[] = $row["idMotivoTransaccion"];
            $sub_array[] = $row["idTipoTransaccion"];
            $sub_array[] = $row["codigoMotivoTransaccion"];
            $sub_array[] = $row["nombreMotivoTransaccion"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificado"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idMotivoTransaccion"] . ');"  id="' . $row["idMotivoTransaccion"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idMotivoTransaccion"] . ');"  id="' . $row["idMotivoTransaccion"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        if (empty($_POST["idMotivoTransaccion"])) {
            $general->insert_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoMotivoTransaccion"],
                $_POST["nombreMotivoTransaccion"],
                $_POST["sidusuario"]
            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoMotivoTransaccion"],
                $_POST["nombreMotivoTransaccion"],
                $_POST["sidusuario"],
                $_POST["idMotivoTransaccion"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idMotivoTransaccion"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idMotivoTransaccion"] = $row["idMotivoTransaccion"];
                $output["idTipoTransaccion"] = $row["idTipoTransaccion"];
                $output["codigoMotivoTransaccion"] = $row["codigoMotivoTransaccion"];
                $output["nombreMotivoTransaccion"] = $row["nombreMotivoTransaccion"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idMotivoTransaccion"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
