<?php
class Usuario extends Conectar
{
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function get_usuario()
    {
        $conectar = parent::conexion();
        $sql = "SELECT idUsuario,
        codigoUsuario,
        nombreUsuario,
        passwordUsuario,
        isActivo,
        ultimaConexion,
        fechaRegistro,
        fechaModificado,
        idUsuarioRegistro
    FROM Seguridad.Usuarios
    WHERE 
    isActivo = 1;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    public function insert_Usuario(
        $codigoUsuario,
        $nombreUsuario,
        $passwordUsuario,
        $sidusuario
    ) {
        $conectar = parent::conexion();

        $sql = "INSERT INTO Seguridad.Usuarios (
            codigoUsuario,
            nombreUsuario,
            passwordUsuario,
            isActivo,
            ultimaConexion,
            fechaRegistro,
            fechaModificado,
            idUsuarioRegistro
        ) VALUES (
            ?,
            ?,
            ?,
            1,
            NULL,
            GETDATE(),
            NULL,
            ?
        );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoUsuario);
        $sql->bindValue(2, $nombreUsuario);
        $sql->bindValue(3, $passwordUsuario);
        $sql->bindValue(4, $sidusuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    public function get_usuario_x_id($idUsuario)
    {
        $conectar = parent::conexion();
        $sql = "SELECT idUsuario,
        codigoUsuario,
        nombreUsuario,
        passwordUsuario,
        isActivo,
        ultimaConexion,
        fechaRegistro,
        fechaModificado,
        idUsuarioRegistro
    FROM Seguridad.Usuarios
    WHERE 
    idUsuario = ?;";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    public function update_rolUsuario(
        $codigoUsuario,
        $nombreUsuario,
        $passwordUsuario,
        $isActivo,
        $idUsuario
    ) {
        $conectar = parent::conexion();

        $sql = "UPDATE Seguridad.Usuarios SET codigoUsuario = ?,
                                                nombreUsuario = ?,
                                                passwordUsuario = ?,
                                                isActivo = ?,
                                                fechaModificado = GETDATE()

                                                WHERE idUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigoUsuario);
        $sql->bindValue(2, $nombreUsuario);
        $sql->bindValue(3, $passwordUsuario);
        $sql->bindValue(4, $isActivo);
        $sql->bindValue(5, $idUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

    public function delete_Rolusuario($idUsuario)
    {
        $conectar = parent::conexion();

        $sql = "UPDATE Seguridad.Usuarios SET isActivo = 0, fechaModificado = GETDATE() WHERE idUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idUsuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
