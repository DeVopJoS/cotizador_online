-- create cotizacion 
DELIMITER //

CREATE PROCEDURE sp_i_cotizacion_01(
    IN pcli_id INT,
    IN pcon_id INT,
    IN pcli_ci VARCHAR(50),
    IN pcon_telf VARCHAR(50),
    IN pcon_email VARCHAR(50),
    IN pcot_descrip VARCHAR(500)
)
BEGIN
    INSERT INTO tm_cotizacion(cot_id, cli_id, con_id, cli_ci, con_tel, con_email, cot_descrip)
    VALUES(NULL, pcli_id, pcon_id, pcli_ci, pcon_telf, pcon_email, pcot_descrip);

    SELECT LAST_INSERT_ID() AS 'cot_id';
END //

DELIMITER ;

-- detalle cotizacion 
CREATE PROCEDURE sp_i_cotizacion_02(
    IN pcot_id INT,
    in pcat_id INT,
    in pprod_id INT,
    in pcotd_precio DECIMAL(8,2),
    in pcotd_cant int
)
BEGIN
    declare pcotd_total DECIMAL(8,2);
   set pcotd_total = pcotd_precio * pcotd_cant;
  
  insert into td_cotizacion (cotd_id, cot_id, cat_id, prod_id, cotd_precio, cotd_cantidad, cotd_profit, cotd_total, fecha_modificacion, estado)
  values(null, pcot_id, pcat_id, pprod_id, pcotd_precio, pcotd_cant, 0, pcotd_total, NOW(), 1);

  SELECT LAST_INSERT_ID() AS 'cotd_id';
END;