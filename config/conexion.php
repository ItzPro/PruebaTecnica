<?php
/* 
Proyecto Programacion Quirurgica

@Autor: Gabriel Cruz
@Fecha Creacion: 23/01/2024

*/
session_start();
class Conectar
{
    protected function Conexion()
    {
        $serverName = "DESKTOP-V683HQU\\SQLEXPRESS";
        $database = "PruebaDesarrollo";
        $username = "sqlserver";
        $password = "root";

        try {
            $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; // Devuelve la conexión establecida
        } catch (PDOException $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function ruta()
    {
        return "http://localhost:/PruebaTecnica/";
    }
}
