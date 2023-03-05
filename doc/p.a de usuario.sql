/*==================
USUARIO
====================*/
--Listar todos los registros por USUARIO  
delimiter $$
create PROCEDURE sp_listarUsuarioporSucursal(in sucursal_id INT)  
BEGIN  
SELECT        
usuario.usuarioId, 
usuario.usuarioSucursarlId, 
usuario.usuarioCorreo, 
usuario.usuarioNombre, 
usuario.usuarioApellido, 
usuario.usuarioDni, 
usuario.usuarioTelefono, 
usuario.usuarioPassword, 
usuario.usuarioRolId, 
usuario.usuarioFechaCreacion,
rol.ROlistarNOM, 
usuario.usuarioEstado
FROM            
usuario INNER JOIN
rol ON usuario.ROlistarID = rol.ROlistarID
WHERE  
usuario.usuarioSucursarlId = sucursal_id  
AND usuario.usuarioEstado='A';
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarUsuario(in usuario_id INT)
BEGIN
	SELECT * FROM usuario
	WHERE
	usuarioId = usuario_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarUsuario( in usuario_id INT)
BEGIN
	UPDATE usuario
	SET
		usuarioEstado= 'I'
	WHERE
		usuarioId = usuario_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarUsuario(in sucursal_id INT, in usuario_correo VARCHAR(150), in usuario_nombre VARCHAR(150), in usuario_apellido VARCHAR(150), in usuario_dni VARCHAR(150), in usuario_telefono VARCHAR(150),in usuario_password VARCHAR(150),in rol_id INT)
BEGIN
	INSERT INTO usuario
	(usuarioSucursarlId,usuarioCorreo,usuarioNombre,usuarioApellido,usuarioDni,usuarioTelefono,usuarioPassword,ROlistarID,FECH_CREA,usuarioEstado)
	VALUES
	(sucursal_id,usuario_correo,usuario_nombre,usuario_apellido,usuario_dni,usuario_telefono,usuario_password,rol_id,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateUsuario( in usuario_id INT, in sucursal_id INT, in usuario_correo VARCHAR(150), in usuario_nombre VARCHAR(150), in usuario_apellido VARCHAR(150), in usuario_dni VARCHAR(150),in usuario_telefono VARCHAR(150), in usuario_password VARCHAR(150),in rol_id INT)
BEGIN
	UPDATE usuario
	SET
		usuarioSucursarlId = sucursal_id,
		usuarioCorreo = usuario_correo,
		usuarioNombre = usuario_nombre,
		usuarioApellido = usuario_apellido,
		usuarioDni = usuario_dni,
		usuarioTelefono = usuario_telefono,
		usuarioPassword = usuario_password,
		ROlistarID = rol_id
	WHERE
		usuarioId = usuario_id;
END$$

--ACCESO DE USUARIO
delimiter $$
CREATE PROCEDURE sp_listarAccesoUsuario(in usuario_correo VARCHAR(150), in usuario_password VARCHAR(50))
BEGIN
	SELECT * FROM usuario
	WHERE
	usuarioCorreo = usuario_correo
	AND usuarioPassword = usuario_password
	AND usuarioEstado='A';
END$$

--CAMBIO DE CONTRASEÑA
delimiter $$
CREATE PROCEDURE sp_UpdateContraseniaUsuario( in usuario_id INT, in usuario_password VARCHAR(50))
BEGIN
	UPDATE usuario
	SET
		usuarioPassword = usuario_password
	WHERE
		usuarioId = usuario_id;
END$$