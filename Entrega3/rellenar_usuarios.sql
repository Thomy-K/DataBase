CREATE OR REPLACE FUNCTION
rellenar_usuarios(id_cliente int, nombre_cliente varchar(60))

DECLARE
idmax int;

BEGIN

    -- Cursor para recorrer los registros de la tabla Clientes
    DECLARE curClientes CURSOR FOR SELECT id, nombre FROM clientes;
    
    -- Abrir el cursor
    OPEN curClientes;
    
    -- Leer el primer registro
    FETCH curClientes INTO id_cliente, nombre_cliente;

    -- Loop para procesar los registros
    WHILE (FOUND_ROWS() > 0) DO
        -- Asignar valores a los parámetros adicionales
        SET contra = CONCAT(nombre_cliente, '_', CAST(id_cliente AS VARCHAR));
        SET tipo_usuario = 'Cliente';

        -- Insertar en la tabla Usuarios
        INSERT INTO usuarios (id, contrasena, tipo_usuario) VALUES (id_cliente, contra, tipo_usuario);
        
        -- Leer el siguiente registro
        FETCH curClientes INTO id_cliente, nombre_cliente;
    END WHILE;

    SELECT INTO idmax
    MAX(id)
    FROM usuarios;

    SET contra = 'admin';
    SET tipo_usuario = 'Admin';
    INSERT INTO usuarios (id, contrasena, tipo_usuario) VALUES ((idmax + 1), contra, tipo_usuario);


    -- Cerrar el cursor
    CLOSE curClientes;

END;
$$ language plpgsql
