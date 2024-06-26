<?php
class General extends Conectar
{

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox Zone--------------------------------------------------------------------------------------------------------------------------


    public function get_combo_info()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idMotivoTransaccion
    FROM Parametros.MotivoTransaccion;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_combo_infouno()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idAgencia
    FROM General.Agencias;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_combo_info2()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idCliente
    FROM General.Clientes;";

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
        $sql = "SELECT idTransaccion,
        idMotivoTransaccion,
        idAgencia,
        idCliente,
        fechaTransaccion,
        montoTransaccion,
        idUsuario
    FROM Transaccional.Transacciones;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $tbl_combo_general,
        $tbl_combo_generaluno,
        $tbl_combo_general2,
        $montoTransaccion,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO Transaccional.Transacciones (
            idMotivoTransaccion,
            idAgencia,
            idCliente,
            fechaTransaccion,
            montoTransaccion,
            idUsuario
        ) VALUES (
            ?,
            ?,
            ?,
            GETDATE(),
            ?,
            ?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $tbl_combo_generaluno);
        $sql->bindValue(3, $tbl_combo_general2);
        $sql->bindValue(4, $montoTransaccion);
        $sql->bindValue(5, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idTransaccion)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idTransaccion,
        idMotivoTransaccion,
        idAgencia,
        idCliente,
        montoTransaccion
    FROM Transaccional.Transacciones
    WHERE 
    idTransaccion = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $tbl_combo_general,
        $tbl_combo_generaluno,
        $tbl_combo_general2,
        $montoTransaccion,
        $sidusuario,
        $idTransaccion
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE Transaccional.Transacciones SET 
                                                idMotivoTransaccion = ?,
                                                idAgencia = ?,
                                                idCliente = ?,
                                                montoTransaccion = ?,
                                                idUsuario = ?

                                                WHERE idTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $tbl_combo_generaluno);
        $sql->bindValue(3, $tbl_combo_general2);
        $sql->bindValue(4, $montoTransaccion);
        $sql->bindValue(5, $sidusuario);
        $sql->bindValue(6, $idTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idTransaccion)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE Transaccional.Transacciones SET isActivo = 0, fechaModificado = GETDATE() WHERE idTransaccion = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idTransaccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
