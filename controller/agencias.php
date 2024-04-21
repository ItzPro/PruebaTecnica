<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/Agencias.php");
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
                $html .= "<option value='" . $row['idCanalServicio'] . "'>" . $row['idCanalServicio'] . "</option>";
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
            $sub_array[] = $row["idAgencia"];
            $sub_array[] = $row["idCanalServicio"];
            $sub_array[] = $row["codigoAgencia"];
            $sub_array[] = $row["nombreAgencia"];
            $sub_array[] = $row["direccionAgencia"];
            $sub_array[] = $row["telefonoAgencia"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificado"];
            $sub_array[] = $row["idUsuario"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idAgencia"] . ');"  id="' . $row["idAgencia"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            /* $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idAgencia"] . ');"  id="' . $row["idAgencia"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        if (empty($_POST["idAgencia"])) {
            $general->insert_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoAgencia"],
                $_POST["nombreAgencia"],
                $_POST["direccionAgencia"],
                $_POST["telefonoAgencia"],
                $_POST["sidusuario"]

            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $general->update_datos(
                $_POST["tbl_combo_general"],
                $_POST["codigoAgencia"],
                $_POST["nombreAgencia"],
                $_POST["direccionAgencia"],
                $_POST["telefonoAgencia"],
                $_POST["sidusuario"],
                $_POST["idAgencia"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $general->get_lista_x_id($_POST["idAgencia"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idAgencia"] = $row["idAgencia"];
                $output["idCanalServicio"] = $row["idCanalServicio"];
                $output["codigoAgencia"] = $row["codigoAgencia"];
                $output["nombreAgencia"] = $row["nombreAgencia"];
                $output["direccionAgencia"] = $row["direccionAgencia"];
                $output["telefonoAgencia"] = $row["telefonoAgencia"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        /*     case "eliminar":
        $general->delete_elemento($_POST["idAgencia"]);
        break;
 */
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
