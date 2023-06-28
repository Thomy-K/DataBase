<?php

    require("../config/conexion.php");
    include('../templates/header.html');
    
    // Mostramos los cambios en una nueva tabla
    $query = "SELECT rellenar_usuarios();";    
    $result = $db -> prepare($query);
    $result -> execute();
    #$result -> fetchAll();
    

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