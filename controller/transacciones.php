<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/Transacciones.php");
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
                $html .= "<option value='" . $row['idMotivoTransaccion'] . "'>" . $row['idMotivoTransaccion'] . "</option>";
            }

            //retorna el htm;
            echo $html;
        }
        break;

    case "comouno":
        $datos = $general->get_combo_infouno();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value='0'>Escoger...</option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['idAgencia'] . "'>" . $row['idAgencia'] . "</option>";
            }

            //retorna el htm;
            echo $html;
        }
        break;

    case "combo2":
        $datos = $general->get_combo_info2();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value='0'>Escoger...</option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['idCliente'] . "'>" . $row['idCliente'] . "</option>";
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
            $sub_array[] = $row["idTransaccion"];
            $sub_array[] = $row["idMotivoTransaccion"];
            $sub_array[] = $row["idAgencia"];
            $sub_array[] = $row["idCliente"];
            $sub_array[] = $row["fechaTransaccion"];
            $sub_array[] = $row["montoTransaccion"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idTransaccion"] . ');"  id="' . $row["idTransaccion"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idTransaccion"] . ');"  id="' . $row["idTransaccion"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        if (empty($_POST["idTransaccion"])) {
            $general->insert_datos(
                $_POST["tbl_combo_general"],
                $_POST["tbl_combo_generaluno"],
                $_POST["tbl_combo_general2"],
                $_POST["montoTransaccion"],
                $_POST["sidusuario"]
            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["tbl_combo_general"],
                $_POST["tbl_combo_generaluno"],
                $_POST["tbl_combo_general2"],
                $_POST["montoTransaccion"],
                $_POST["sidusuario"],
                $_POST["idTransaccion"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idTransaccion"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idTransaccion"] = $row["idTransaccion"];
                $output["idMotivoTransaccion"] = $row["idMotivoTransaccion"];
                $output["idAgencia"] = $row["idAgencia"];
                $output["idCliente"] = $row["idCliente"];
                $output["montoTransaccion"] = $row["montoTransaccion"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idTransaccion"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
