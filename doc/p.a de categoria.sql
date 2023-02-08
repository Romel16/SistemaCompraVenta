/*==================
CATEGORIA
====================*/

--Listar todos los registros por Sucursal
CREATE PROCEDURE sp_ListaCategoriaporSucursal(in sucursal_id int) 
BEGIN  
 SELECT 
	 categoriaId,
	 categoriaSucursalId,
	 categoriaNombre,
	 CONVERT(VARCHAR,categoriaFechaCreacion,103) AS categoriaFechaCreacion,
	 categoriaEstado 
 FROM 
	categoria  
 WHERE  
	 categoriaSucursalId = sucursal_id  
	 AND categoriaEstado='A'

--Obtener registro por ID
CREATE PROCEDURE sp_listarCategoriaporId(in categoria_id int)
BEGIN
	SELECT * FROM categoria
	WHERE
	categoriaId = categoria_id
END

--Eliminar Registro
CREATE PROCEDURE sp_EliminarCategoria(in categoria_id INT)
BEGIN
	UPDATE categoria
	SET
		categoriaEstado= 'I'
	WHERE
		categoriaId = categoria_id
END

--REGISTRAR NUEVO REGISTRO
CREATE PROCEDURE sp_InsertarCategoria(in sucursal_id int, in categoria_nombre VARCHAR(150))
BEGIN
	INSERT INTO categoria
	(categoriaSucursalId,categoriaNombre,categoriaFechaCreacion,categoriaEstado)
	VALUES
	(sucursal_id,categoria_nombre,GETDATE(),'A')
END

--ACTUALIZAR REGISTRO
CREATE PROCEDURE sp_UpdateCategoria(in categoria_id int, in sucursal_id int, in categoria_nombre VARCHAR(150))
BEGIN
	UPDATE categoria
	SET
		categoriaSucursalId = sucursal_id,
		categoriaNombre = categoria_nombre
	WHERE
		categoriaId = categoria_id
END
/*==================
CATEGORIA
====================*/

--Listar todos los registros por Sucursal
delimiter $$
CREATE PROCEDURE sp_ListarCategoriaporSucursal(in sucursal_id int) 
BEGIN  
 SELECT 
	 categoriaId,
	 categoriaSucursalId,
	 categoriaNombre,
	 CONVERT(VARCHAR,categoriaFechaCreacion,103) AS categoriaFechaCreacion,
	 categoriaEstado 
 FROM 
	categoria  
 WHERE  
	 categoriaSucursalId = sucursal_id  
	 AND categoriaEstado='A';
end$$
--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarCategoriaporId(in categoria_id int)
BEGIN
	SELECT * FROM categoria
	WHERE
	categoriaId = categoria_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarCategoria(in categoria_id INT)
BEGIN
	UPDATE categoria
	SET
		categoriaEstado= 'I'
	WHERE
		categoriaId = categoria_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarCategoria(in sucursal_id int, in categoria_nombre VARCHAR(150))
BEGIN
	INSERT INTO categoria
	(categoriaSucursalId,categoriaNombre,categoriaFechaCreacion,categoriaEstado)
	VALUES
	(sucursal_id,categoria_nombre,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateCategoria(in categoria_id int, in sucursal_id int, in categoria_nombre VARCHAR(150))
BEGIN
	UPDATE categoria
	SET
		categoriaSucursalId = sucursal_id,
		categoriaNombre = categoria_nombre
	WHERE
		categoriaId = categoria_id;
END$$
