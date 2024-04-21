<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/Usuario.php");
//Modifique el link a la ubicacion del model usuariosSure XXX

/* Declara la clase */
$usuario = new Usuario();

switch ($_GET["op"]) {

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Listar---------------------------------------------------------------------------------------------------------------------------------

    case "listar_Usuario":
        /* Crear un listado para mostrar en el datatable */
        $datos = $usuario->get_usuario();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["idUsuario"];
            $sub_array[] = $row["codigoUsuario"];
            $sub_array[] = $row["nombreUsuario"];
            $sub_array[] = $row["passwordUsuario"];
            $sub_array[] = $row["isActivo"];
            $sub_array[] = $row["ultimaConexion"];
            $sub_array[] = $row["fechaRegistro"];
            $sub_array[] = $row["fechaModificado"];
            $sub_array[] = $row["idUsuarioRegistro"];

            //-----XXX ESTA PARTE ES LO QUE VA EN LA TABLA------------------------------------------------------------------------------------

            $sub_array[] = '<button type="button" onClick="editar(' . $row["idUsuario"] . ');"  id="' . $row["idUsuario"] . '" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idUsuario"] . ');"  id="' . $row["idUsuario"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

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

        if (empty($_POST["idUsuario"])) {
            $usuario->insert_Usuario(
                $_POST["codigoUsuario"],
                $_POST["nombreUsuario"],
                $_POST["passwordUsuario"],
                $_POST["sidusuario"]
            );
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------

        else {
            $usuario->update_rolUsuario(
                $_POST["codigoUsuario"],
                $_POST["nombreUsuario"],
                $_POST["passwordUsuario"],
                $_POST["isActivo"],
                $_POST["idUsuario"]
            );
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------

    case "mostrar":
        $datos = $usuario->get_usuario_x_id($_POST["idUsuario"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["idUsuario"] = $row["idUsuario"];
                $output["codigoUsuario"] = $row["codigoUsuario"];
                $output["nombreUsuario"] = $row["nombreUsuario"];
                $output["passwordUsuario"] = $row["passwordUsuario"];
                $output["isActivo"] = $row["isActivo"];
            }

            echo json_encode($output);
        }
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

    case "eliminar":
        $usuario->delete_Rolusuario($_POST["idUsuario"]);
        break;

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
