CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
update_stock (n_cantidad int, id_tienda int, id_producto int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN
    -- si el id en el argumento no está en la tabla, agregamos el pokemon
    -- notar que ahora debemos agregar el dato de la columna generation en el values a insertar
    IF id_producto IN (SELECT id_producto from stock) THEN
        IF id_tienda IN (SELECT id_tienda from stock) THEN
            UPDATE stock SET cantidad = n_cantidad WHERE id_tienda = id_tienda AND id_producto = id_producto;
        -- retornamos true si se agregó el valor
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql
