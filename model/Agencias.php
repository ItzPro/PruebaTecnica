<?php
class General extends Conectar
{

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox Zone--------------------------------------------------------------------------------------------------------------------------


    public function get_combo_info()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idCanalServicio
    FROM General.CanalServicio;";

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
        $sql = "SELECT idAgencia,
        idCanalServicio,
        codigoAgencia,
        nombreAgencia,
        direccionAgencia,
        telefonoAgencia,
        fechaRegistro,
        fechaModificado,
        idUsuario
    FROM General.Agencias;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_datos(
        $tbl_combo_general,
        $codigoAgencia,
        $nombreAgencia,
        $direccionAgencia,
        $telefonoAgencia,
        $sidusuario

    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO General.Agencias (
            idCanalServicio,
            codigoAgencia,
            nombreAgencia,
            direccionAgencia,
            telefonoAgencia,
            fechaRegistro,
            fechaModificado,
            idUsuario

        ) VALUES (
            ?,
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
        $sql->bindValue(2, $codigoAgencia);
        $sql->bindValue(3, $nombreAgencia);
        $sql->bindValue(4, $direccionAgencia);
        $sql->bindValue(5, $telefonoAgencia);
        $sql->bindValue(6, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_lista_x_id($idAgencia)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idAgencia,
        idCanalServicio,
        codigoAgencia,
        nombreAgencia,
        direccionAgencia,
        telefonoAgencia
    FROM General.Agencias
    WHERE 
    idAgencia = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idAgencia);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_datos(
        $tbl_combo_general,
        $codigoAgencia,
        $nombreAgencia,
        $direccionAgencia,
        $telefonoAgencia,
        $idUsuario,
        $idAgencia
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE General.Agencias SET 
                                                idCanalServicio = ?,
                                                codigoAgencia = ?,
                                                nombreAgencia = ?,
                                                direccionAgencia = ?,
                                                telefonoAgencia = ?,
                                                fechaModificado = GETDATE(),
                                                idUsuario = ?

                                                WHERE idAgencia = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tbl_combo_general);
        $sql->bindValue(2, $codigoAgencia);
        $sql->bindValue(3, $nombreAgencia);
        $sql->bindValue(4, $direccionAgencia);
        $sql->bindValue(5, $telefonoAgencia);
        $sql->bindValue(6, $idUsuario);
        $sql->bindValue(7, $idAgencia);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------
    /* 
    public function delete_elemento($idAgencia)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE General.Agencias SET isActivo = 0, fechaModificado = GETDATE() WHERE idAgencia = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idAgencia);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
