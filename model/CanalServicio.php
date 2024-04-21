<?php
class General extends Conectar
{
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function get_lista()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idCanalServicio,
        codigoCanalServicio,
        nombreCanalServicio,
        fechaRegistro,
        fechaModificado,
        idUsuario
    FROM General.CanalServicio;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $codigoCanalServicio,
        $nombreCanalServicio,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO General.CanalServicio (
            codigoCanalServicio,
            nombreCanalServicio,
            fechaRegistro,
            fechaModificado,
            idUsuario
        ) VALUES (
            ?,
            ?,
            GETDATE(),
            NULL,
            ?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoCanalServicio);
        $sql->bindValue(2, $nombreCanalServicio);
        $sql->bindValue(3, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idCanalServicio)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idCanalServicio,
        codigoCanalServicio,
        nombreCanalServicio
    FROM General.CanalServicio
    WHERE 
    idCanalServicio = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCanalServicio);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $codigoCanalServicio,
        $nombreCanalServicio,
        $sidusuario,
        $idCanalServicio
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE General.CanalServicio SET codigoCanalServicio = ?,
                                                nombreCanalServicio = ?,
                                                idUsuario = ?,
                                                fechaModificado = GETDATE()

                                                WHERE idCanalServicio = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoCanalServicio);
        $sql->bindValue(2, $nombreCanalServicio);
        $sql->bindValue(3, $sidusuario);
        $sql->bindValue(4, $idCanalServicio);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idCanalServicio)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE General.CanalServicio SET isActivo = 0, fechaModificado = GETDATE() WHERE idCanalServicio = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCanalServicio);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
