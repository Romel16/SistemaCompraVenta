create DATABASE sistemaCompraVenta;
CREATE TABLE compania( 
  companiaId int not null auto_increment,
  companiaNombre VARCHAR(200),
  companiaFechaCreacion datetime,
  companiaEstado int (1),
  Primary key (companiaId),
  constraint companiaEstadoCK Check (companiaEstado = 'A' or companiaEstado ='I')
)ENGINE = INNODB;
	
CREATE TABLE empresa( 
  empresaId int not null auto_increment,
  empresaCompaniaId int,
  empresaNombre VARCHAR(200),
  empresaRuc VARCHAR(50),
  empresaFechaCreacion datetime,
  empresaEstado int (1)  not null,
  Primary key (empresaId),
  Check (empresaEstado = 'A' or empresaEstado = 'I'),
  Foreign key (empresaCompaniaId)  references compania(companiaId)
)ENGINE = INNODB;

CREATE TABLE sucursal( 
  sucursalId int not null auto_increment,
  sucursalEmpresaId int,
  sucursalNombre VARCHAR(150),
  sucursalFechaCreacion datetime,
  sucursalEstado int (1),
  Primary key (sucursalId),
  Check (sucursalEstado = 'A' or sucursalEstado = 'I'),
  Foreign key (sucursalEmpresaId)  references empresa(empresaId)
)ENGINE = INNODB;

CREATE TABLE usuario( 
  usuarioId int not null auto_increment,
  usuarioSucursalId int,
  usuarioCorreo VARCHAR(150),
  usuarioNombre VARCHAR(150),
  usuarioApellido VARCHAR(150),
  usuarioDni VARCHAR(8),
  usuarioTelefono VARCHAR(15),
  usuarioPassword VARCHAR(50),
  usuarioRolId int,
  usuarioFechaCreacion datetime,
  usuarioEstado int (1),
  Primary key (usuarioId),
  Check (usuarioEstado = 'A' or usuarioEstado = 'I'),
  Foreign key (usuarioSucursalId) references sucursal(sucursalId),
  Foreign key (usuarioRolId) REFERENCES rol(rolId)
)ENGINE = INNODB;

CREATE TABLE rol( 
  rolId int not null auto_increment,
  rolSucursalId int,
  rolNombre VARCHAR(150),
  rolFechaCreacion datetime,
  rolEstado int (1),
  Primary key (rolId),
  Check (rolEstado = 'A' or rolEstado = 'I'),
  Foreign key (rolSucursalId)  references sucursal(sucursalId)
)ENGINE = INNODB;

CREATE TABLE categoria( 
  categoriaId int not null auto_increment,
  categoriaSucursalId int,
  categoriaNombre VARCHAR(150),
  categoriaFechaCreacion datetime,
  categoriaEstado int (1),
  Primary key (categoriaId),
  Check (categoriaEstado = 'A' or categoriaEstado = 'I'),
  Foreign key (categoriaSucursalId) references sucursal(sucursalId)
)ENGINE = INNODB;

CREATE TABLE moneda( 
  monedaId int not null auto_increment,
  monedaSucursalId int,
  monedaNombre VARCHAR(150),
  monedaFechaCreacion datetime,
  monedaEstado int (1),
  Primary key (monedaId),
  Check (monedaEstado = 'A' or monedaEstado = 'I'),
  Foreign key (monedaSucursalId)  references sucursal(sucursalId) 
)ENGINE = INNODB;

CREATE TABLE unidad( 
unidadId int not null auto_increment,
  unidadSucursalId int,
  unidadNombre VARCHAR(150),
  unidadFecha_creacion datetime,
  unidadEstado int (1),
  Primary key (unidadId),
  Check (unidadEstado = 'A' or unidadEstado = 'I'),
  Foreign key (unidadSucursalId) references sucursal(sucursalId) 
)ENGINE = INNODB;

CREATE TABLE producto( 
  productoId int not null auto_increment,
  productoSucursalId int,
  productoCategoriaId int,
  productoNombre VARCHAR(150),
  productoDescripcion VARCHAR(200),
  productoUnidadId int,
  productoMonedaId int,
  productoPrecioCompra numeric(9,2),
  productoPrecioVenta NUMERIC(9,2),
  productoStock int,
  productoFechaVencimiento date,
  productoImagen VARCHAR(250),
  productoFechaCreacion datetime,
  productoEstado int (1),
  Primary key (productoId),
  Check (productoEstado = 'A' or productoEstado = 'I'),
  Foreign key (productoSucursalId) references sucursal(sucursalId),
  Foreign key (productoCategoriaId) references categoria(categoriaId),
  Foreign key (productoUnidadId) references unidad(unidadId),
  Foreign key (productoMonedaId) references moneda(monedaId)
)ENGINE = INNODB;

CREATE TABLE cliente( 
  clienteId int not null auto_increment ,
  clienteEmpresaId int,
  clienteNombre VARCHAR(200),
  clienteRuc VARCHAR(12),
  clienteTelefono varchar(50),
  clienteDireccion varchar(150),
  clienteCorreo VARCHAR(150),
  clienteFechaCreacion datetime,
  clienteEstado int (1),
  Primary key (clienteId),
  Check (clienteEstado = 'A' or clienteEstado = 'I’'),
  Foreign key (clienteEmpresaId) references empresa(empresaId)
)ENGINE = INNODB;

CREATE TABLE proveedor( 
  proveedorId int not null auto_increment ,
  proveedorEmpresaId int,
  proveedorRuc VARCHAR(50),
  proveedorTelefono varchar(50),
  proveedorDireccion varchar(150),
  proveedorCorreo VARCHAR(150),
  proveedorFechaCeacion datetime,
  proveedorEstado int (1),
  Primary key (proveedorId),
  Check (proveedorEstado = 'A' or proveedorEstado = 'I'),
  Foreign key (proveedorEmpresaId) references empresa(empresaId)
)ENGINE = INNODB;

create table compra(
compraId INTEGER,
compraSucursalId int,
compraPagoId int,
compraProveedorId int,
compraProveedorRuc VARCHAR(150),
compraProveedorDireccion VARCHAR(150),
compraProveedorCorreo VARCHAR(150),
compraSubtotal NUMERIC(9,2),
compraIgv NUMERIC(9,2),
compraTotal NUMERIC(9,2),
compraComentario VARCHAR(250),
compraUsuarioId int,
compraMonedaId int,
compraDocumentoId int,
compraFechaCreacion datetime,
compraEstado int 
)

create table pago(
pagoId INT NOT null auto_increment,
pagoNombre VARCHAR(150),
pagoFechaCreacion datetime,
pagoEstado int(1)
Primary key (pagoId),
constraint pagoEstadoCK Check (pagoEstado = 'A' or pagoEstado ='I')
)ENGINE = INNODB;

create table compra_detalle(
detalleCompraId int not null auto_increment,
detalleCompraCompraId int,
detalleCompraProductoId int,
detalleCompraProductoPrecioCompra NUMERIC(9,2)
detalleCompraCantidad int,
detalleCompraTotal NUMERIC(9,2),
detalleCompraFechaCreacion datetime,
detalleCompraEstado int (1),
Primary key (detalleCompraId),
constraint detalleCompraEstadoCK Check (detalleCompraEstado = 'A' or detalleCompraEstado ='I'),
FOREIGN KEY(detalleCompraCompraId) REFERENCES compra(compraId) 
)ENGINE = INNODB;

create table menu(
menuId int not null auto_increment,
menuNombre VARCHAR(150),
menuRuta varchar(250),
menuIdentidad VARCHAR(150),
menuGrupo VARCHAR(150),
menuFechaCreacion datetime,
menuEstado int (1),
Primary key (menuId),
constraint menuEstadoCK Check (menuEstado = 'A' or menuEstado ='I')
)ENGINE = INNODB;

create table documento(
documentoId int,
documentoNombre VARCHAR(150),
documentoTipo VARCHAR(150),
documentoFechaCreacion datetime,
documentoEstado VARCHAR(1)

)

create table venta_detalle(
detalleVentaId int,
detalleVentaVentaId int,
detalleVentaProductoId int,
detalleVentaCantidad int,
detalleVentaTotal NUMERIC(0,2),
detalleVentaFechaCreacion datetime,
detalleVentaEstado int =1
)

create table venta(
	ventaId int,
	ventaSucursalId int,
	ventaPagoId int,
	ventaUsuarioId int,
	ventaMonedaId int,
	ventaDocumentoId int,
	ventaClienteId int,
	ventaClienteRuc varchar(20),
	ventaClienteDireccion varchar(250),
	ventaClienteCorreo varchar(150),
	ventaSubTotal numeric(9,2),
	ventaIgv numeric(9,2),
	ventaTotal NUMERIC(9,2),
	ventaComentario varchar(250),
	ventaFechaCreacion datetime,
	ventaEstado int(1),
)