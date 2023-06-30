CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
disminuir (id_p int, id_t int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$



-- definimos nuestra función
BEGIN

    UPDATE stock SET cantidad = cantidad - 1 WHERE id_tienda = id_t AND id_producto = id_p;
    
    RETURN TRUE;

-- finalizamos la definición de la función y declaramos el lenguaje
END;
$$ language plpgsql