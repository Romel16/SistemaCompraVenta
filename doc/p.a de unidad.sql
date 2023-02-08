/*==================
UNIDAD
====================*/
--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_ListaUnidadporSucursal(in unidadsucursal_id int)
BEGIN
	SELECT * from unidad
	WHERE unidadSucursalId = unidadsucursal_id
	and unidadEstado = 'A';
end$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_ListarUnidad(in unidad_id int)
BEGIN
	SELECT * from unidad
	WHERE unidadId = unidad_id;
end$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarUnidad(in unidad_id int)
BEGIN
	UPDATE unidad
	SET
		unidadEstado = 'I'
	WHERE unidadId = unidad_id;
end$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarUnidad(in unidadsucursal_id int, in unidad_nombre varchar(150))
BEGIN
	INSERT into unidad 
	(unidadSucursalId,unidadNombre,unidadFecha_creacion,unidadEstado)
	VALUES
	(unidadsucursal_id,unidad_nombre,GetDate(),'A');
end$$

--ACTUALIZAR REGISTRO
delimiter $$
		CREATE PROCEDURE sp_UpdateUnidad(in unidad_id int, in unidadsucursal_id int,in unidad_nombre varchar(150))
		BEGIN
			UPDATE unidad
			set
				unidadSucursalId = unidadsucursal_id,
				unidadNombre = unidad_nombre
			WHERE
				unidadId = unidad_id;
		end$$