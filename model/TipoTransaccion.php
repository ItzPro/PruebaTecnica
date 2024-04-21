<?php
class General extends Conectar
{
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function get_lista()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoTransaccion,
        codigoTipoMovimiento,
        codigoTipoTransaccion,
        nombreTipoTransaccion,
        fechaRegistro,
        fechaModificacion,
        idUsuario
    FROM Parametros.TipoTransaccion;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $codigoTipoMovimiento,
        $codigoTipoTransaccion,
        $nombreTipoTransaccion,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO Parametros.TipoTransaccion (
            codigoTipoMovimiento,
            codigoTipoTransaccion,
            nombreTipoTransaccion,
            fechaRegistro,
            fechaModificacion,
            idUsuario
        ) VALUES (
            ?,
            ?,
            ?,
            GETDATE(),
            NULL,
            ?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoTipoMovimiento);
        $sql->bindValue(2, $codigoTipoTransaccion);
        $sql->bindValue(3, $nombreTipoTransaccion);
        $sql->bindValue(4, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idTipoTransaccion)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoTransaccion,
        codigoTipoMovimiento,
        codigoTipoTransaccion,
        nombreTipoTransaccion
    FROM Parametros.TipoTransaccion
    WHERE 
    idTipoTransaccion = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTipoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $codigoTipoMovimiento,
        $codigoTipoTransaccion,
        $nombreTipoTransaccion,
        $sidusuario,
        $idTipoTransaccion
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE Parametros.TipoTransaccion SET 
                                                codigoTipoMovimiento = ?,
                                                codigoTipoTransaccion = ?,
                                                nombreTipoTransaccion = ?,
                                                idUsuario = ?,
                                                fechaModificacion = GETDATE()

                                                WHERE idTipoTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoTipoMovimiento);
        $sql->bindValue(2, $codigoTipoTransaccion);
        $sql->bindValue(3, $nombreTipoTransaccion);
        $sql->bindValue(4, $sidusuario);
        $sql->bindValue(5, $idTipoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idTipoTransaccion)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE Parametros.TipoTransaccion SET isActivo = 0, fechaModificacion = GETDATE() WHERE idTipoTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTipoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
