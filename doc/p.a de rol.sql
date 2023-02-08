/*==================
ROL
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarRolporSucursal( in sucursal_id INT)
BEGIN
	SELECT * FROM rol
	WHERE
	rolSucursalId = sucursal_id
	AND rolEstado='A';
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarRol( in rol_id INT)
BEGIN
	SELECT * FROM rol
	WHERE
	rolId = rol_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarRol(in rol_id INT)
BEGIN
	UPDATE rol
	SET
		rolEstado= 'I'
	WHERE
		rolId = rol_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarRol( in sucursal_id INT, in rol_nombre VARCHAR(150))
BEGIN
	INSERT INTO rol
	(rolSucursalId,rolNombre,rolFechaCreacion,rolEstado)
	VALUES
	(sucursal_id,rol_nombre,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateRol(in rol_id INT, in sucursal_id INT, in rol_nombre VARCHAR(150))
BEGIN
	UPDATE rol
	SET
		rolSucursalId = sucursal_id,
		rolNombre = rol_nombre
	WHERE
		rolId = rol_id;
END$$