
/*==================
EMPRESA
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarEmpresaporSucursal( in compania_id INT)
BEGIN
	SELECT * FROM empresa
	WHERE
	empresaCompaniaId = compania_id
	AND empresaEstado=1;
END$$

--Obtener registro por ID
delimiter $$
create PROCEDURE sp_listarEmpresa(in empresaId INT)
BEGIN
	SELECT * FROM empresa
	WHERE
	empresaId = empresaId;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarEmpresa(in empresaId INT)
BEGIN
	UPDATE empresa
	SET
		empresaEstado= 'I'
	WHERE
		empresaId = empresaId;
END$$

delimiter $$
CREATE PROCEDURE sp_InsertarEmpresa( in compania_id INT, in empresa_nombre VARCHAR(150), in empresa_ruc VARCHAR(150))
BEGIN
	INSERT INTO empresa
	(empresaCompaniaId,empresaNombre,empresaNombre,empresaFechaCreacion,empresaEstado)
	VALUES
	(compania_id,empresa_nombre,empresa_ruc,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateEmpresa(in empresaId INT, in compania_id INT, in empresa_nombre VARCHAR(150),in empresa_ruc VARCHAR(150))
BEGIN
	UPDATE empresa
	SET
		empresaCompaniaId = compania_id,
		empresaNombre = empresa_nombre,
		empresaNombre = empresa_ruc
	WHERE
		empresaId = empresaId;
END$$
