/*==================
COMPAÑIA
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarcompaniaporSucursal( in sucursal_id int)
BEGIN
	SELECT * FROM compania
	WHERE 
	companiaEstado='A';
END$$
select * from compania
--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarcompania(in compania_id INT)

BEGIN
	SELECT * FROM compania
	WHERE
	companiaId = compania_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_Eliminarcompania1( in compania_id INT)
BEGIN
	UPDATE compania
	SET
		companiaEstado= 'I'
	WHERE
		companiaId = compania_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_Insertarcompania1( in compania_nombre VARCHAR(150))
BEGIN
	INSERT INTO compania
	(companiaNombre,conpaniaFechaCreacion,companiaEstado)
	VALUES
	(compania_nombre,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_Updatecompania(in compania_id INT, in compania_nombre VARCHAR(150))
BEGIN
	UPDATE compania
	SET
		companiaNombre = compania_nombre
	WHERE
		companiaId = compania_id;
END$$
