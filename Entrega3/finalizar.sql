CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
finalizar (fecha date, cliente varchar(60), precio int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

DECLARE
idmax_compra int;
r record;
u int;


-- definimos nuestra función
BEGIN

    SELECT INTO idmax_compra
    MAX(id)
    FROM compras;

    INSERT INTO compras values(idmax_compra + 1, CURRENT_DATE, precio);

    SELECT INTO u
    id 
    FROM usuarios WHERE username = cliente;

    INSERT INTO ordena values(idmax_compra + 1, u);

    FOR r IN
        (SELECT * FROM nueva_compra)
    LOOP
        BEGIN
        -- can do some processing here
        INSERT INTO contiene values (idmax_compra + 1, r.id_producto ,r.cantidad, r.id_tienda);
        --RETURN NEXT r; -- return current row of SELECT
        END;
    END LOOP;
    RETURN TRUE;

-- finalizamos la definición de la función y declaramos el lenguaje
END;
$$ language plpgsql