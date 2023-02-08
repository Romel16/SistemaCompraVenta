/*==================
CLIENTE
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarClienteporSucursal(in empresa_id int)
BEGIN
	SELECT * FROM cliente
	WHERE
	clienteEmpresaId = empresa_id
	AND clienteEstado='A';
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarCliente(in cliente_id int)
BEGIN
	SELECT * FROM cliente
	WHERE
	clienteId = cliente_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarCliente(in cliente_id int)
BEGIN
	UPDATE cliente
	SET
		clienteEstado= 'I'
	WHERE
		clienteId = cliente_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
create PROCEDURE sp_InsertarCliente(in empresa_id int, in cliente_nombre varchar(150), in cliente_ruc varchar(150),in cliente_telefono varchar(150),in cliente_direccion varchar(150),in cliente_correo varchar(150))
BEGIN  
 INSERT INTO cliente  
 (clienteNombre,clienteEmpresaId,clienteRuc,clienteTelefono,clienteDireccion,clienteCorreo,clienteFechaCreacion,clienteEstado)  
 VALUES  
 (cliente_nombre,empresa_id,cliente_ruc,cliente_telefono,cliente_direccion,cliente_correo,GETDATE(),'A') ;
END$$

--ACTUALIZAR REGISTRO
delimiter $$
create PROCEDURE sp_UpdateCliente(in cliente_id INT, in cliente_nombre VARCHAR(150),  in empresa_id INT, in cliente_ruc VARCHAR(150), in cliente_telefono VARCHAR(150), in cliente_direccion VARCHAR(150), in cliente_correo VARCHAR(100) ) 
BEGIN  
 UPDATE cliente  
 SET  
  clienteNombre = cliente_nombre,  
  clienteEmpresaId = empresa_id,  
  clienteRuc = cliente_ruc,  
  clientetelefono = cliente_telefono,  
  clienteDireccion = cliente_direccion,  
  clienteCorreo = cliente_correo  
 WHERE  
  clienteId = cliente_id;
END$$
