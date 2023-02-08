/*==================
PRODUCTO
====================*/
--Listar todos los registros por Sucursal
delimiter $$
create PROCEDURE sp_listarProductoporSucursal(in sucursal_id INT)  
BEGIN  
SELECT        
producto.productoId, 
producto.productoSucursalId, 
producto.productoCategoriaId, 
producto.productoNombre, 
producto.productoDescripcion, 
producto.productoUnidadId, 
producto.productoMonedaId, 
producto.productoPrecioCompra, 
producto.productoPrecioVenta, 
producto.productoStock, 
producto.productoFechaVencimiento, 
producto.productoImagen, 
producto.productoFechaCreacion, 
producto.productoEstadoado, 
categoria.categoriaNombre, 
moneda.monedaNombre, 
unidad.unidadNombre
FROM            
producto INNER JOIN
categoria ON producto.productoCategoriaId = categoria.categoriaId INNER JOIN
moneda ON producto.productoMonedaId = moneda.monedaId INNER JOIN
unidad ON producto.productoUnidadId = unidad.unidadId
 WHERE  
 producto.productoSucursalId = sucursal_id  
 AND producto.productoEstado='A';  
END$$

--Obtener registro por ID
delimiter $$
CREATE PROCEDURE sp_listarProducto(in producto_id INT)
BEGIN
	SELECT * FROM producto
	WHERE
	productoId = producto_id;
END$$

--Eliminar Registro
delimiter $$
CREATE PROCEDURE sp_EliminarProducto(in producto_id INT)
BEGIN
	UPDATE producto
	SET
		productoEstado= 'I'
	WHERE
		productoId = producto_id;
END$$

--REGISTRAR NUEVO REGISTRO
delimiter $$
CREATE PROCEDURE sp_InsertarProducto(in sucursal_id INT,in categoria_id INT,in producto_nombre VARCHAR(150),in producto_descripcion VARCHAR(150),in unidad_id INT,in moneda_id INT,in precio_compra NUMERIC(18,2),in precio_venta NUMERIC(18,2),in producto_stock INT,in fecha_vencimiento DATE,in imagen VARCHAR(150))
BEGIN
	INSERT INTO producto
	(productoSucursalId,productoCategoriaId,productoNombre,productoDescripcion,productoUnidadId,productoMonedaId,productoPrecioCompra,productoPrecioVenta,productoStock,productoFechaVencimiento,productoImagen,productoFechaCreacion,productoEstado)
	VALUES
	(sucursal_id,categoria_id,producto_nombre,producto_descripcion,unidad_id,moneda_id,precio_compra,precio_venta,producto_stock,fecha_vencimiento,imagen,GETDATE(),'A');
END$$

--ACTUALIZAR REGISTRO
delimiter $$
CREATE PROCEDURE sp_UpdateProducto(in producto_id INT,in sucursal_id INT,in categoria_id INT,in producto_nombre VARCHAR(150),in producto_descripcion VARCHAR(150),in unidad_id INT,in moneda_id INT,in precio_compra NUMERIC(18,2),in precio_venta NUMERIC(18,2),in producto_stock INT,in fecha_vencimiento DATE,in imagen VARCHAR(150))
BEGIN
	UPDATE producto
	SET
		productoSucursalId = sucursal_id,
		productoCategoriaId = categoria_id,
		productoNombre = producto_nombre,
		productoDescripcion = producto_descripcion,
		productoUnidadId = unidad_id,
		productoMonedaId = moneda_id,
		productoPrecioCompra = precio_compra,
		productoPrecioVenta = precio_venta,
		productoStock = producto_stock,
		productoFechaVencimiento = fecha_vencimiento,
		productoImagen = imagen
	WHERE
		productoId = producto_id;
END$$


delimiter $$
CREATE PROCEDURE sp_listarProducto(in categoria_id INT)
BEGIN    
SELECT          
producto.productoId,   
producto.productoSucursalId,   
producto.productoCategoriaId,   
producto.productoNombre,   
producto.productoDescripcion,   
producto.productoUnidadId,   
producto.productoMonedaId,   
producto.productoPrecioCompra,   
producto.productoPrecioVenta,   
producto.productoStock,   
producto.productoFechaVencimiento,   
producto.productoImagen,   
producto.productoFechaCreacion,   
producto.productoEstado,   
categoria.categoriaNombre,   
moneda.monedaNombre,   
unidad.unidadNombre  
FROM              
producto INNER JOIN  
categoria ON producto.productoCategoriaId = categoria.categoriaId INNER JOIN  
moneda ON producto.productoMonedaId = moneda.monedaId INNER JOIN  
unidad ON producto.productoUnidadId = unidad.unidadId  
 WHERE    
 producto. productoCategoriaId = categoria_id    
 AND producto.productoEstado='A';
END$$ 


--Obtener registro por ID  
delimiter $$
ALTER PROCEDURE sp_listarProducto(in producto_id INT )  
BEGIN  
 SELECT          
producto.productoId,   
producto.productoSucursalId,   
producto.productoCategoriaId,   
producto.productoNombre,   
producto.productoDescripcion,   
producto.productoUnidadId,   
producto.productoMonedaId,   
producto.productoPrecioCompra,   
producto.productoPrecioVenta,   
producto.productoStock,   
producto.productoFechaVencimiento,   
producto.productoImagen,   
producto.productoFechaCreacion,   
producto.productoEstado,   
categoria.categoriaNombre,   
moneda.monedaNombre,   
unidad.unidadNombre  
FROM              
producto INNER JOIN  
categoria ON producto.productoCategoriaId = categoria.categoriaId INNER JOIN  
moneda ON producto.productoMonedaId = moneda.monedaId INNER JOIN  
unidad ON producto.productoUnidadId = unidad.unidadId  
 WHERE  
 producto.productoId = producto_id;  
END$$
