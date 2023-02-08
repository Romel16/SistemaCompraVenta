/*==================
PROVEEDOR
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarProveedor(in empresa_id INT)
BEGIN
	SELECT * FROM proveedor
	WHERE
	proveedorEmpresaId = empresa_id
	AND proveedorEstado='A';
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarProveedor(in proveedor_id INT)
BEGIN
	SELECT * FROM proveedor
	WHERE
	proveedorId = proveedor_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarProveedor(in proveedor_id INT)
BEGIN
	UPDATE proveedor
	SET
		proveedorEstado= 'I'
	WHERE
		proveedorId = proveedor_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
create PROCEDURE sp_InsertarProveedor(in empresa_id INT,in proveedor_nombre VARCHAR(150),in proveedor_ruc VARCHAR(15), in proveedor_telefono VARCHAR(150),in proveedor_direccion VARCHAR(150), in proveedor_correo VARCHAR(150))
BEGIN  
 INSERT INTO proveedor  
 (proveedorEmpresaId,proveedorNombre,proveedorRuc,proveedorTelefono,proveedorDireccion,proveedorCorreo,proveedorFechaCreacion,proveedorEstado)  
 VALUES  
 (empresa_id,proveedor_nombre,proveedor_ruc,proveedor_telefono,proveedor_direccion,proveedor_correo,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
create PROCEDURE sp_UpdateProveedor(in proveedor_id INT, in empresa_id INT, in proveedor_nombre VARCHAR(150),in proveedor_ruc VARCHAR(50),in proveedor_telefono VARCHAR(150),in proveedor_direccion VARCHAR(150),in proveedor_correo VARCHAR(100))
BEGIN
	UPDATE proveedor
	SET
		proveedorEmpresaId = empresa_id,
		proveedorNombre = proveedor_nombre,
		proveedorRuc = proveedor_ruc,
		proveedorTelefono = proveedor_telefono,
		proveedorDireccion = proveedor_direccion,
		proveedorCorreo = proveedor_correo
	WHERE
		proveedorId = proveedor_id;
END$$
