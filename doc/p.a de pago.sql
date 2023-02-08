
/*==================
PAGO
====================*/
delimiter $$
CREATE PROCEDURE sp_listarPago(in pago_id int)
begin
	SELECT * FROM pago 
    WHERE pagoId = pago_id
    and pagoEstado='A';
END$$