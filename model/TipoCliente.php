<?php
class General extends Conectar
{
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function get_lista()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoCliente,
        codigoTipoCliente,
        nombreTipoCliente,
        fechaRegistro,
        fechaModificado,
        idUsuario
    FROM General.TipoCliente;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $codigoTipoCliente,
        $nombreTipoCliente,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO General.TipoCliente (
            codigoTipoCliente,
            nombreTipoCliente,
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
        $sql->bindValue(1, $codigoTipoCliente);
        $sql->bindValue(2, $nombreTipoCliente);
        $sql->bindValue(3, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idTipoCliente)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoCliente,
        codigoTipoCliente,
        nombreTipoCliente
    FROM General.TipoCliente
    WHERE 
    idTipoCliente = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTipoCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $codigoTipoCliente,
        $nombreTipoCliente,
        $sidusuario,
        $idTipoCliente
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE General.TipoCliente SET codigoTipoCliente = ?,
                                                nombreTipoCliente = ?,
                                                idUsuario = ?,
                                                fechaModificado = GETDATE()

                                                WHERE idTipoCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoTipoCliente);
        $sql->bindValue(2, $nombreTipoCliente);
        $sql->bindValue(3, $sidusuario);
        $sql->bindValue(4, $idTipoCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idTipoCliente)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE General.TipoCliente SET isActivo = 0, fechaModificado = GETDATE() WHERE idTipoCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTipoCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
