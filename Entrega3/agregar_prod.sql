CREATE OR REPLACE FUNCTION

agregar_prod (id_p int, id_t int, precio_f int)

-- declaramos lo que retorna 
RETURNS BOOLEAN AS $$


BEGIN
    IF id_p IN (SELECT id_producto from nueva_compra where id_tienda = id_t) THEN
        UPDATE nueva_compra SET cantidad = cantidad + 1 WHERE id_tienda = id_t AND id_producto = id_p; 
        RETURN TRUE;
    ELSE
        insert into nueva_compra values(id_p, id_t, 1, precio_f);
        RETURN TRUE;

    END IF;

END
$$ language plpgsql