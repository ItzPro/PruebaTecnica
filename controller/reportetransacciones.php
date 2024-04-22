<?php
/* Requerir la cadena de conexion */
require_once("../config/conexion.php");
/* Requerir el model */
require_once("../model/ReporteTransacciones.php");
//Modifique el link a la ubicacion del model usuariosSure XXX

/* Declara la clase */
$general = new General();

switch ($_GET["op"]) {
        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Combo-box------------------------------------------------------------------------------------------------------------------------------


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
            $sub_array[] = $row["ID De La Transaccion"];
            $sub_array[] = $row["Fecha Transacción"];
            $sub_array[] = $row["Tipo de Cliente"];
            $sub_array[] = $row["Identidad del Cliente"];
            $sub_array[] = $row["Nombre del Cliente"];
            $sub_array[] = $row["Código Agencia"];
            $sub_array[] = $row["Nombre Agencia"];
            $sub_array[] = $row["Canal de Servicio"];
            $sub_array[] = $row["Código Transacción"];
            $sub_array[] = $row["Nombre Transacción"];
            $sub_array[] = $row["Código Motivo Transacción"];
            $sub_array[] = $row["Nombre Motivo Transacción"];
            $sub_array[] = $row["Monto de Transacción"];

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

        //--Listar por Semana---------------------------------------------------------------------------------------------------------------------------------------


    case "listar_Generalsemana":
        /* Crear un listado para mostrar en el datatable */
        $datos = $general->get_listaSemana();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID De La Transaccion"];
            $sub_array[] = $row["Fecha Transacción"];
            $sub_array[] = $row["Tipo de Cliente"];
            $sub_array[] = $row["Identidad del Cliente"];
            $sub_array[] = $row["Nombre del Cliente"];
            $sub_array[] = $row["Código Agencia"];
            $sub_array[] = $row["Nombre Agencia"];
            $sub_array[] = $row["Canal de Servicio"];
            $sub_array[] = $row["Código Transacción"];
            $sub_array[] = $row["Nombre Transacción"];
            $sub_array[] = $row["Código Motivo Transacción"];
            $sub_array[] = $row["Nombre Motivo Transacción"];
            $sub_array[] = $row["Monto de Transacción"];

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
        //--Listar por Mes---------------------------------------------------------------------------------------------------------------------------------------
    case "listar_Generalmes":
        /* Crear un listado para mostrar en el datatable */
        $datos = $general->get_listaMes();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID De La Transaccion"];
            $sub_array[] = $row["Fecha Transacción"];
            $sub_array[] = $row["Tipo de Cliente"];
            $sub_array[] = $row["Identidad del Cliente"];
            $sub_array[] = $row["Nombre del Cliente"];
            $sub_array[] = $row["Código Agencia"];
            $sub_array[] = $row["Nombre Agencia"];
            $sub_array[] = $row["Canal de Servicio"];
            $sub_array[] = $row["Código Transacción"];
            $sub_array[] = $row["Nombre Transacción"];
            $sub_array[] = $row["Código Motivo Transacción"];
            $sub_array[] = $row["Nombre Motivo Transacción"];
            $sub_array[] = $row["Monto de Transacción"];

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
        //--Listar por Año---------------------------------------------------------------------------------------------------------------------------------------
    case "listar_Generalano":
        /* Crear un listado para mostrar en el datatable */
        $datos = $general->get_listaAno();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID De La Transaccion"];
            $sub_array[] = $row["Fecha Transacción"];
            $sub_array[] = $row["Tipo de Cliente"];
            $sub_array[] = $row["Identidad del Cliente"];
            $sub_array[] = $row["Nombre del Cliente"];
            $sub_array[] = $row["Código Agencia"];
            $sub_array[] = $row["Nombre Agencia"];
            $sub_array[] = $row["Canal de Servicio"];
            $sub_array[] = $row["Código Transacción"];
            $sub_array[] = $row["Nombre Transacción"];
            $sub_array[] = $row["Código Motivo Transacción"];
            $sub_array[] = $row["Nombre Motivo Transacción"];
            $sub_array[] = $row["Monto de Transacción"];

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

        //--Listar por Semana---------------------------------------------------------------------------------------------------------------------------------------


    case "listar_Generalcompleto":
        /* Crear un listado para mostrar en el datatable */
        $datos = $general->get_listacompleta();

        /* Crear un array  */
        $data = array();
        /* Recorrer los datos  */
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID De La Transaccion"];
            $sub_array[] = $row["Fecha Transacción"];
            $sub_array[] = $row["Tipo de Cliente"];
            $sub_array[] = $row["Identidad del Cliente"];
            $sub_array[] = $row["Nombre del Cliente"];
            $sub_array[] = $row["Código Agencia"];
            $sub_array[] = $row["Nombre Agencia"];
            $sub_array[] = $row["Canal de Servicio"];
            $sub_array[] = $row["Código Transacción"];
            $sub_array[] = $row["Nombre Transacción"];
            $sub_array[] = $row["Código Motivo Transacción"];
            $sub_array[] = $row["Nombre Motivo Transacción"];
            $sub_array[] = $row["Monto de Transacción"];

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


        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Editar---------------------------------------------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Mostrar--------------------------------------------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------------------------------------------------
        //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

        //-----------------------------------------------------------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------------------------------
}
