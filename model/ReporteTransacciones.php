<?php
class General extends Conectar
{

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Combobox Zone--------------------------------------------------------------------------------------------------------------------------


    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Listar por dia---------------------------------------------------------------------------------------------------------------------------------------

    public function get_lista()
    {
        $conectar = parent::conexion();
        $sql = "SELECT 
        T.idTransaccion AS 'ID De La Transaccion',
        T.fechaTransaccion AS 'Fecha Transacción',
        TC.nombreTipoCliente AS 'Tipo de Cliente',
        C.numeroIdentidad AS 'Identidad del Cliente',
        C.nombreCliente AS 'Nombre del Cliente',
        A.codigoAgencia AS 'Código Agencia',
        A.nombreAgencia AS 'Nombre Agencia',
        CS.nombreCanalServicio AS 'Canal de Servicio',
        TT.codigoTipoTransaccion AS 'Código Transacción',
        TT.nombreTipoTransaccion AS 'Nombre Transacción',
        MT.codigoMotivoTransaccion AS 'Código Motivo Transacción',
        MT.nombreMotivoTransaccion AS 'Nombre Motivo Transacción',
        T.montoTransaccion AS 'Monto de Transacción'
    FROM 
        Transaccional.Transacciones T
    INNER JOIN 
        General.Clientes C ON T.idCliente = C.idCliente
    INNER JOIN 
        General.TipoCliente TC ON C.idTipoCliente = TC.idTipoCliente
    INNER JOIN 
        General.Agencias A ON T.idAgencia = A.idAgencia
    INNER JOIN 
        General.CanalServicio CS ON A.idCanalServicio = CS.idCanalServicio
    INNER JOIN 
        Parametros.MotivoTransaccion MT ON T.idMotivoTransaccion = MT.idMotivoTransaccion
    INNER JOIN
        Parametros.TipoTransaccion TT ON MT.idTipoTransaccion = TT.idTipoTransaccion
    WHERE 
        CONVERT(date, T.fechaTransaccion) = CONVERT(date, GETDATE())
    ORDER BY 
        T.fechaTransaccion;";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //--Listar por Semana---------------------------------------------------------------------------------------------------------------------------------------

    public function get_listaSemana()
    {
        $conectar = parent::conexion();
        $sql = "SELECT 
        T.idTransaccion AS 'ID De La Transaccion',
        T.fechaTransaccion AS 'Fecha Transacción',
        TC.nombreTipoCliente AS 'Tipo de Cliente',
        C.numeroIdentidad AS 'Identidad del Cliente',
        C.nombreCliente AS 'Nombre del Cliente',
        A.codigoAgencia AS 'Código Agencia',
        A.nombreAgencia AS 'Nombre Agencia',
        CS.nombreCanalServicio AS 'Canal de Servicio',
        TT.codigoTipoTransaccion AS 'Código Transacción',
        TT.nombreTipoTransaccion AS 'Nombre Transacción',
        MT.codigoMotivoTransaccion AS 'Código Motivo Transacción',
        MT.nombreMotivoTransaccion AS 'Nombre Motivo Transacción',
        T.montoTransaccion AS 'Monto de Transacción'
    FROM 
        Transaccional.Transacciones T
    INNER JOIN 
        General.Clientes C ON T.idCliente = C.idCliente
    INNER JOIN 
        General.TipoCliente TC ON C.idTipoCliente = TC.idTipoCliente
    INNER JOIN 
        General.Agencias A ON T.idAgencia = A.idAgencia
    INNER JOIN 
        General.CanalServicio CS ON A.idCanalServicio = CS.idCanalServicio
    INNER JOIN 
        Parametros.MotivoTransaccion MT ON T.idMotivoTransaccion = MT.idMotivoTransaccion
    INNER JOIN
        Parametros.TipoTransaccion TT ON MT.idTipoTransaccion = TT.idTipoTransaccion
    WHERE 
        DATEPART(ISO_WEEK, T.fechaTransaccion) = DATEPART(ISO_WEEK, GETDATE()) -- Filtrar por semana actual
        AND YEAR(T.fechaTransaccion) = YEAR(GETDATE()) -- Asegurar que estemos en el mismo año
    ORDER BY 
        T.fechaTransaccion;
    ";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //--Listar por Mes---------------------------------------------------------------------------------------------------------------------------------------


    public function get_listaMes()
    {
        $conectar = parent::conexion();
        $sql = "SELECT 
        T.idTransaccion AS 'ID De La Transaccion',
        T.fechaTransaccion AS 'Fecha Transacción',
        TC.nombreTipoCliente AS 'Tipo de Cliente',
        C.numeroIdentidad AS 'Identidad del Cliente',
        C.nombreCliente AS 'Nombre del Cliente',
        A.codigoAgencia AS 'Código Agencia',
        A.nombreAgencia AS 'Nombre Agencia',
        CS.nombreCanalServicio AS 'Canal de Servicio',
        TT.codigoTipoTransaccion AS 'Código Transacción',
        TT.nombreTipoTransaccion AS 'Nombre Transacción',
        MT.codigoMotivoTransaccion AS 'Código Motivo Transacción',
        MT.nombreMotivoTransaccion AS 'Nombre Motivo Transacción',
        T.montoTransaccion AS 'Monto de Transacción'
    FROM 
        Transaccional.Transacciones T
    INNER JOIN 
        General.Clientes C ON T.idCliente = C.idCliente
    INNER JOIN 
        General.TipoCliente TC ON C.idTipoCliente = TC.idTipoCliente
    INNER JOIN 
        General.Agencias A ON T.idAgencia = A.idAgencia
    INNER JOIN 
        General.CanalServicio CS ON A.idCanalServicio = CS.idCanalServicio
    INNER JOIN 
        Parametros.MotivoTransaccion MT ON T.idMotivoTransaccion = MT.idMotivoTransaccion
    INNER JOIN
        Parametros.TipoTransaccion TT ON MT.idTipoTransaccion = TT.idTipoTransaccion
    WHERE 
        MONTH(T.fechaTransaccion) = MONTH(GETDATE()) -- Filtrar por mes actual
        AND YEAR(T.fechaTransaccion) = YEAR(GETDATE()) -- Asegurar que estemos en el mismo año
    ORDER BY 
        T.fechaTransaccion;
    
    ";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //--Listar por Año---------------------------------------------------------------------------------------------------------------------------------------


    public function get_listaAno()
    {
        $conectar = parent::conexion();
        $sql = "SELECT 
        T.idTransaccion AS 'ID De La Transaccion',
        T.fechaTransaccion AS 'Fecha Transacción',
        TC.nombreTipoCliente AS 'Tipo de Cliente',
        C.numeroIdentidad AS 'Identidad del Cliente',
        C.nombreCliente AS 'Nombre del Cliente',
        A.codigoAgencia AS 'Código Agencia',
        A.nombreAgencia AS 'Nombre Agencia',
        CS.nombreCanalServicio AS 'Canal de Servicio',
        TT.codigoTipoTransaccion AS 'Código Transacción',
        TT.nombreTipoTransaccion AS 'Nombre Transacción',
        MT.codigoMotivoTransaccion AS 'Código Motivo Transacción',
        MT.nombreMotivoTransaccion AS 'Nombre Motivo Transacción',
        T.montoTransaccion AS 'Monto de Transacción'
    FROM 
        Transaccional.Transacciones T
    INNER JOIN 
        General.Clientes C ON T.idCliente = C.idCliente
    INNER JOIN 
        General.TipoCliente TC ON C.idTipoCliente = TC.idTipoCliente
    INNER JOIN 
        General.Agencias A ON T.idAgencia = A.idAgencia
    INNER JOIN 
        General.CanalServicio CS ON A.idCanalServicio = CS.idCanalServicio
    INNER JOIN 
        Parametros.MotivoTransaccion MT ON T.idMotivoTransaccion = MT.idMotivoTransaccion
    INNER JOIN
        Parametros.TipoTransaccion TT ON MT.idTipoTransaccion = TT.idTipoTransaccion
    WHERE 
        YEAR(T.fechaTransaccion) = YEAR(GETDATE()) -- Filtrar por año actual
    ORDER BY 
        T.fechaTransaccion;
    ";

        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Guardar--------------------------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Get X ID (para el editar)--------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Actualizar-----------------------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //--Eliminar-------------------------------------------------------------------------------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------
}
