/*==================
MONEDA
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_listarMonedaporSucursal(in sucursal_id INT)
BEGIN
	SELECT * FROM moneda
	WHERE
	monedaSucursalId = sucursal_id
	AND monedaEstado='A';
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarMoneda(in moneda_id INT)
BEGIN
	SELECT * FROM moneda
	WHERE
	monedaId = moneda_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarMoneda(in moneda_id INT)
BEGIN
	UPDATE moneda
	SET
		monedaEstado= 'I'
	WHERE
		monedaId = moneda_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarMoneda(in sucursal_id INT,in moneda_nombre VARCHAR(150))
BEGIN
	INSERT INTO moneda
	(monedaSucursalId,monedaNombre,monedaFechaCreacion,monedaEstado)
	VALUES
	(sucursal_id,moneda_nombre,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateMoneda(in moneda_id INT,in sucursal_id INT,in moneda_nombre VARCHAR(150))
BEGIN
	UPDATE moneda
	SET
		monedaSucursalId = sucursal_id,
		monedaNombre = moneda_nombre
	WHERE
		monedaId = moneda_id;
END$$
