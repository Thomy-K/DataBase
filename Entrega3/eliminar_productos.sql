CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
eliminar_productos ()

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN

    TRUNCATE TABLE nueva_compra;

    RETURN TRUE;

-- finalizamos la definición de la función y declaramos el lenguaje
END;
$$ language plpgsql