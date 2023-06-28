<html>

    <body>
    <?php


        require("../config/conexion.php");
        include('../templates/header.html');
        
        try {
            $query = "SELECT id, nombre FROM clientes WHERE id NOT IN (SELECT id FROM usuarios);";
            $result = $db -> prepare($query);
            $result -> execute();
            $clientes = $result -> fetchAll();
            $tipo_cliente = 'Cliente';
            foreach ($clientes as $cliente) {
                $id_cliente = $cliente['id'];
                $username = $cliente['nombre'];
                $password = 'clave' . $id_cliente; 

                $query = "INSERT INTO usuarios (id, username, contrasena, tipo) VALUES ($id_cliente, '$username', '$password', '$tipo_cliente');";
                $result = $db -> prepare($query);
                $result -> execute();
            }

            $query = "SELECT MAX(id) AS max_id FROM clientes;";
            $result = $db -> prepare($query);
            $result -> execute();
            $idmax = $result -> fetchColumn();

            $query = "SELECT COUNT(*) FROM usuarios WHERE tipo = 'Admin';";
            $result = $db -> prepare($query);
            $result -> execute();
            $count = $result -> fetchColumn();

            $nombre_admin = 'ADMIN';
            $tipo_admin = 'Admin';
            $password_admin =  'admin';

            if ($count == 0) {
                $query = "INSERT INTO usuarios (id, username, contrasena, tipo) VALUES ($id_max+1, '$nombre_admin', '$password_admin', '$tipo_admin');";
                $result = $db -> prepare($query);
                $result -> execute();
            }


            $query = "SELECT * FROM usuarios ORDER BY id DESC;";
            $result = $db -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

    
    <table class='table'>
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre de usuario</th>
            <th>Contraseña</th>
            <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($usuarios as $usuario) { 
                echo "<tr>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>$usuario[$i]</td> ";
                }
                echo "</tr>";
            } 
            ?>
        </tbody>
    </table>
    </body>

</html>