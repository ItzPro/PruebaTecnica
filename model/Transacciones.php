<?php
class General extends Conectar
{

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox Zone--------------------------------------------------------------------------------------------------------------------------


    public function get_combo_info()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoTransaccion
    FROM Parametros.TipoTransaccion;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function get_lista()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idMotivoTransaccion,
        idTipoTransaccion,
        codigoMotivoTransaccion,
        nombreMotivoTransaccion,
        fechaRegistro,
        fechaModificado,
        idUsuario
    FROM Parametros.MotivoTransaccion;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $idTipoTransaccion,
        $codigoMotivoTransaccion,
        $nombreMotivoTransaccion,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO Parametros.MotivoTransaccion (
            idTipoTransaccion,
            codigoMotivoTransaccion,
            nombreMotivoTransaccion,
            fechaRegistro,
            fechaModificado,
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
        $sql->bindValue(1, $idTipoTransaccion);
        $sql->bindValue(2, $codigoMotivoTransaccion);
        $sql->bindValue(3, $nombreMotivoTransaccion);
        $sql->bindValue(4, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idMotivoTransaccion)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idMotivoTransaccion,
        idTipoTransaccion,
        codigoMotivoTransaccion,
        nombreMotivoTransaccion
    FROM Parametros.MotivoTransaccion
    WHERE 
    idMotivoTransaccion = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idMotivoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $tbl_combo_general,
        $codigoMotivoTransaccion,
        $nombreMotivoTransaccion,
        $sidusuario,
        $idMotivoTransaccion
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE Parametros.MotivoTransaccion SET 
                                                idTipoTransaccion = ?,
                                                codigoMotivoTransaccion = ?,
                                                nombreMotivoTransaccion = ?,
                                                idUsuario = ?,
                                                fechaModificado = GETDATE()

                                                WHERE idMotivoTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $codigoMotivoTransaccion);
        $sql->bindValue(3, $nombreMotivoTransaccion);
        $sql->bindValue(4, $sidusuario);
        $sql->bindValue(5, $idMotivoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idMotivoTransaccion)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE Parametros.MotivoTransaccion SET isActivo = 0, fechaModificado = GETDATE() WHERE idMotivoTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idMotivoTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
