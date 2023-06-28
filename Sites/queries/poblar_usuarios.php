<?php

    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT id, nombre FROM clientes ORDER BY id;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();
    
    $rol = 'Cliente';
    foreach ($usuarios as $usuario){

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo
        // Hacemos una verificacion para ver si el pokemon es legendario porque ese parámetro no se comporta muy bien entre php y sql
        // asi que lo agregamos manualmente al final (por eso los FALSE o TRUE)
        $query = "SELECT rellenar_usuarios_2($usuario[0], '$usuario[1]'::varchar, '$rol'::varchar);";

        // Ejecutamos las querys para efectivamente insertar los datos
        $result = $db -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
        
    }

    $query = "SELECT MAX(id) AS max_id FROM usuarios;";
    $result = $db -> prepare($query);
    $result -> execute();
    $idmax = $result -> fetchColumn();
    $nombre_admin = 'ADMIN';
    $rol = 'Admin';

    $query = "SELECT rellenar_usuarios_2(($idmax+1), '$nombre_admin'::varchar, '$rol'::varchar);";    
    $result = $db -> prepare($query);
    $result -> execute();
    $result -> fetchAll();

    // Mostramos los cambios en una nueva tabla
    $query = "SELECT * FROM usuarios ORDER BY id DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

?>

<html>
    <body>
        <table class='table'>
            <thead>
                <tr>
                <th>Id</th>
                <th>Contraseña</th>
                <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    for ($i = 0; $i < 3; $i++) {
                        echo "<td>$usuario[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
