<?php
class General extends Conectar
{

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox Zone--------------------------------------------------------------------------------------------------------------------------


    public function get_combo_info()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTipoCliente
    FROM General.TipoCliente;";

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
        $sql = "SELECT idCliente,
        idTipoCliente,
        codigoCliente,
        numeroIdentidad,
        nombreCliente,
        fechaRegistro,
        fechaModificado,
        idUsuario
    FROM General.Clientes;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $tbl_combo_general,
        $codigoCliente,
        $numeroIdentidad,
        $nombreCliente,
        $sidusuario

    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO General.Clientes (
            idTipoCliente,
            codigoCliente,
            numeroIdentidad,
            nombreCliente,
            fechaRegistro,
            fechaModificado,
            idUsuario

        ) VALUES (
            ?,
            ?,
            ?,
            ?,
            GETDATE(),
            NULL,
            ?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $codigoCliente);
        $sql->bindValue(3, $numeroIdentidad);
        $sql->bindValue(4, $nombreCliente);
        $sql->bindValue(5, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idCliente)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idCliente,
        idTipoCliente,
        codigoCliente,
        numeroIdentidad,
        nombreCliente
    FROM General.Clientes
    WHERE 
    idCliente = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $tbl_combo_general,
        $codigoCliente,
        $numeroIdentidad,
        $nombreCliente,
        $sidusuario,
        $idCliente
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE General.Clientes SET 
                                                idTipoCliente = ?,
                                                codigoCliente = ?,
                                                numeroIdentidad = ?,
                                                nombreCliente = ?,
                                                fechaModificado = GETDATE(),
                                                idUsuario = ?

                                                WHERE idCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $codigoCliente);
        $sql->bindValue(3, $numeroIdentidad);
        $sql->bindValue(4, $nombreCliente);
        $sql->bindValue(5, $sidusuario);
        $sql->bindValue(6, $idCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idCliente)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE General.Clientes SET isActivo = 0, fechaModificado = GETDATE() WHERE idCliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCliente);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
