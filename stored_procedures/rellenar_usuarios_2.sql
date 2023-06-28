CREATE OR REPLACE FUNCTION
rellenar_usuarios_2(id_cliente int, nombre_cliente varchar(60), rol varchar(7))

RETURNS BOOLEAN AS $$

DECLARE
contra VARCHAR;

BEGIN
    
    -- si el id en el argumento no está en la tabla, agregamos el pokemon
    -- notar que ahora debemos agregar el dato de la columna generation en el values a insertar
    IF id_cliente NOT IN (SELECT id from usuarios) THEN

        IF rol = 'Cliente' THEN
            SET contra = CONCAT(nombre_cliente, '_', CAST(id_cliente AS VARCHAR));
        ELSE
            SET contra = 'admin';
        END IF;

        INSERT INTO usuarios values(id_cliente, contra, rol);

        -- retornamos true si se agregó el valor
        RETURN TRUE;
        
    ELSE
        -- y false si no se agregó
        RETURN FALSE;

    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql