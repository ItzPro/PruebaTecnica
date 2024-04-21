USE [PruebaDesarrollo]
GO
ALTER TABLE [Transaccional].[Transacciones] DROP CONSTRAINT [FK_MotivoTransaccion]
GO
ALTER TABLE [Transaccional].[Transacciones] DROP CONSTRAINT [FK_Cliente]
GO
ALTER TABLE [Transaccional].[Transacciones] DROP CONSTRAINT [FK_Agencia]
GO
ALTER TABLE [Parametros].[MotivoTransaccion] DROP CONSTRAINT [FK_TipoTransaccion]
GO
ALTER TABLE [General].[Clientes] DROP CONSTRAINT [FK_TipoCliente]
GO
ALTER TABLE [General].[Agencias] DROP CONSTRAINT [FK_CanalServicio]
GO
ALTER TABLE [Parametros].[TipoTransaccion] DROP CONSTRAINT [DF__TipoTrans__idUsu__3D5E1FD2]
GO
ALTER TABLE [Parametros].[MotivoTransaccion] DROP CONSTRAINT [DF__MotivoTra__idUsu__3A81B327]
GO
ALTER TABLE [General].[TipoCliente] DROP CONSTRAINT [DF__TipoClien__idUsu__239E4DCF]
GO
ALTER TABLE [General].[Clientes] DROP CONSTRAINT [DF__Clientes__idUsua__267ABA7A]
GO
ALTER TABLE [General].[Agencias] DROP CONSTRAINT [DF__Agencias__idUsua__2B3F6F97]
GO
/****** Object:  Table [Transaccional].[Transacciones]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [Transaccional].[Transacciones]
GO
/****** Object:  Table [Seguridad].[Usuarios]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [Seguridad].[Usuarios]
GO
/****** Object:  Table [Parametros].[TipoTransaccion]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [Parametros].[TipoTransaccion]
GO
/****** Object:  Table [Parametros].[MotivoTransaccion]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [Parametros].[MotivoTransaccion]
GO
/****** Object:  Table [General].[TipoCliente]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [General].[TipoCliente]
GO
/****** Object:  Table [General].[Clientes]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [General].[Clientes]
GO
/****** Object:  Table [General].[CanalServicio]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [General].[CanalServicio]
GO
/****** Object:  Table [General].[Agencias]    Script Date: 28/10/2021 12:25:14 ******/
DROP TABLE [General].[Agencias]
GO
/****** Object:  Schema [Transaccional]    Script Date: 28/10/2021 12:25:14 ******/
DROP SCHEMA [Transaccional]
GO
/****** Object:  Schema [Seguridad]    Script Date: 28/10/2021 12:25:14 ******/
DROP SCHEMA [Seguridad]
GO
/****** Object:  Schema [Parametros]    Script Date: 28/10/2021 12:25:14 ******/
DROP SCHEMA [Parametros]
GO
/****** Object:  Schema [General]    Script Date: 28/10/2021 12:25:14 ******/
DROP SCHEMA [General]
GO
/****** Object:  Schema [General]    Script Date: 28/10/2021 12:25:14 ******/
CREATE SCHEMA [General]
GO
/****** Object:  Schema [Parametros]    Script Date: 28/10/2021 12:25:14 ******/
CREATE SCHEMA [Parametros]
GO
/****** Object:  Schema [Seguridad]    Script Date: 28/10/2021 12:25:14 ******/
CREATE SCHEMA [Seguridad]
GO
/****** Object:  Schema [Transaccional]    Script Date: 28/10/2021 12:25:14 ******/
CREATE SCHEMA [Transaccional]
GO
/****** Object:  Table [General].[Agencias]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [General].[Agencias](
	[idAgencia] [int] IDENTITY(1,1) NOT NULL,
	[idCanalServicio] [int] NULL,
	[codigoAgencia] [varchar](6) NULL,
	[nombreAgencia] [varchar](100) NULL,
	[direccionAgencia] [varchar](255) NULL,
	[telefonoAgencia] [varchar](20) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuario] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idAgencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [General].[CanalServicio]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [General].[CanalServicio](
	[idCanalServicio] [int] IDENTITY(1,1) NOT NULL,
	[codigoCanalServicio] [varchar](5) NULL,
	[nombreCanalServicio] [varchar](100) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuario] [int] NULL,
PRIMARY KEY CLUSTERED 

(
	[idCanalServicio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [General].[Clientes]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [General].[Clientes](
	[idCliente] [int] IDENTITY(1,1) NOT NULL,
	[idTipoCliente] [int] NULL,
	[codigoCliente] [varchar](20) NULL,
	[numeroIdentidad] [varchar](40) NULL,
	[nombreCliente] [varchar](100) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuario] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [General].[TipoCliente]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [General].[TipoCliente](
	[idTipoCliente] [int] IDENTITY(1,1) NOT NULL,
	[codigoTipoCliente] [varchar](5) NULL,
	[nombreTipoCliente] [varchar](100) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuario] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idTipoCliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [Parametros].[MotivoTransaccion]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Parametros].[MotivoTransaccion](
	[idMotivoTransaccion] [int] IDENTITY(1,1) NOT NULL,
	[idTipoTransaccion] [int] NULL,
	[codigoMotivoTransaccion] [varchar](5) NULL,
	[nombreMotivoTransaccion] [varchar](100) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuario] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idMotivoTransaccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [Parametros].[TipoTransaccion]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Parametros].[TipoTransaccion](
	[idTipoTransaccion] [int] IDENTITY(1,1) NOT NULL,
	[codigoTipoMovimiento] [varchar](2) NULL,
	[codigoTipoTransaccion] [int] NULL,
	[nombreTipoTransaccion] [varchar](100) NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificacion] [datetime] NULL,
	[idUsuario] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idTipoTransaccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [Seguridad].[Usuarios]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Seguridad].[Usuarios](
	[idUsuario] [int] IDENTITY(1,1) NOT NULL,
	[codigoUsuario] [varchar](40) NULL,
	[nombreUsuario] [varchar](100) NULL,
	[passwordUsuario] [varchar](80) NULL,
	[isActivo] [bit] NULL,
	[ultimaConexion] [datetime] NULL,
	[fechaRegistro] [datetime] NULL,
	[fechaModificado] [datetime] NULL,
	[idUsuarioRegistro] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [Transaccional].[Transacciones]    Script Date: 28/10/2021 12:25:14 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [Transaccional].[Transacciones](
	[idTransaccion] [int] IDENTITY(1,1) NOT NULL,
	[idMotivoTransaccion] [int] NULL,
	[idAgencia] [int] NULL,
	[idCliente] [int] NULL,
	[fechaTransaccion] [datetime] NULL,
	[montoTransaccion] [numeric](12, 4) NULL,
	[idUsuario] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[idTransaccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [General].[Agencias] ON 
GO
INSERT [General].[Agencias] ([idAgencia], [idCanalServicio], [codigoAgencia], [nombreAgencia], [direccionAgencia], [telefonoAgencia], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (1, 1, N'401', N'Principal', N'Tegucigalpa', N'504 2290-4100', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
SET IDENTITY_INSERT [General].[Agencias] OFF
GO
SET IDENTITY_INSERT [General].[CanalServicio] ON 
GO
INSERT [General].[CanalServicio] ([idCanalServicio], [codigoCanalServicio], [nombreCanalServicio], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (1, N'CAJ', N'Caja', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
INSERT [General].[CanalServicio] ([idCanalServicio], [codigoCanalServicio], [nombreCanalServicio], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (2, N'VEN', N'Ventanilla', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
INSERT [General].[CanalServicio] ([idCanalServicio], [codigoCanalServicio], [nombreCanalServicio], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (3, N'BI', N'Banca Internet', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
INSERT [General].[CanalServicio] ([idCanalServicio], [codigoCanalServicio], [nombreCanalServicio], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (4, N'BM', N'Banca M�vil', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
SET IDENTITY_INSERT [General].[CanalServicio] OFF
GO
SET IDENTITY_INSERT [General].[TipoCliente] ON 
GO
INSERT [General].[TipoCliente] ([idTipoCliente], [codigoTipoCliente], [nombreTipoCliente], [fechaRegistro], [fechaModificado], [idUsuario]) VALUES (1, N'N', N'Persona Natural', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
SET IDENTITY_INSERT [General].[TipoCliente] OFF
GO
SET IDENTITY_INSERT [Parametros].[TipoTransaccion] ON 
GO
INSERT [Parametros].[TipoTransaccion] ([idTipoTransaccion], [codigoTipoMovimiento], [codigoTipoTransaccion], [nombreTipoTransaccion], [fechaRegistro], [fechaModificacion], [idUsuario]) VALUES (1, N'CR', 1600, N'Nota de Cr�dito', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
INSERT [Parametros].[TipoTransaccion] ([idTipoTransaccion], [codigoTipoMovimiento], [codigoTipoTransaccion], [nombreTipoTransaccion], [fechaRegistro], [fechaModificacion], [idUsuario]) VALUES (2, N'DB', 600, N'Nota de D�bito', CAST(N'2021-10-01T00:00:00.000' AS DateTime), NULL, 1)
GO
SET IDENTITY_INSERT [Parametros].[TipoTransaccion] OFF
GO
ALTER TABLE [General].[Agencias] ADD  DEFAULT ((0)) FOR [idUsuario]
GO
ALTER TABLE [General].[Clientes] ADD  DEFAULT ((0)) FOR [idUsuario]
GO
ALTER TABLE [General].[TipoCliente] ADD  DEFAULT ((0)) FOR [idUsuario]
GO
ALTER TABLE [Parametros].[MotivoTransaccion] ADD  DEFAULT ((0)) FOR [idUsuario]
GO
ALTER TABLE [Parametros].[TipoTransaccion] ADD  DEFAULT ((0)) FOR [idUsuario]
GO
ALTER TABLE [General].[Agencias]  WITH CHECK ADD  CONSTRAINT [FK_CanalServicio] FOREIGN KEY([idCanalServicio])
REFERENCES [General].[CanalServicio] ([idCanalServicio])
GO
ALTER TABLE [General].[Agencias] CHECK CONSTRAINT [FK_CanalServicio]
GO
ALTER TABLE [General].[Clientes]  WITH CHECK ADD  CONSTRAINT [FK_TipoCliente] FOREIGN KEY([idTipoCliente])
REFERENCES [General].[TipoCliente] ([idTipoCliente])
GO
ALTER TABLE [General].[Clientes] CHECK CONSTRAINT [FK_TipoCliente]
GO
ALTER TABLE [Parametros].[MotivoTransaccion]  WITH CHECK ADD  CONSTRAINT [FK_TipoTransaccion] FOREIGN KEY([idTipoTransaccion])
REFERENCES [Parametros].[TipoTransaccion] ([idTipoTransaccion])
GO
ALTER TABLE [Parametros].[MotivoTransaccion] CHECK CONSTRAINT [FK_TipoTransaccion]
GO
ALTER TABLE [Transaccional].[Transacciones]  WITH CHECK ADD  CONSTRAINT [FK_Agencia] FOREIGN KEY([idAgencia])
REFERENCES [General].[Agencias] ([idAgencia])
GO
ALTER TABLE [Transaccional].[Transacciones] CHECK CONSTRAINT [FK_Agencia]
GO
ALTER TABLE [Transaccional].[Transacciones]  WITH CHECK ADD  CONSTRAINT [FK_Cliente] FOREIGN KEY([idCliente])
REFERENCES [General].[Clientes] ([idCliente])
GO
ALTER TABLE [Transaccional].[Transacciones] CHECK CONSTRAINT [FK_Cliente]
GO
ALTER TABLE [Transaccional].[Transacciones]  WITH CHECK ADD  CONSTRAINT [FK_MotivoTransaccion] FOREIGN KEY([idMotivoTransaccion])
REFERENCES [Parametros].[MotivoTransaccion] ([idMotivoTransaccion])
GO
ALTER TABLE [Transaccional].[Transacciones] CHECK CONSTRAINT [FK_MotivoTransaccion]
GO
