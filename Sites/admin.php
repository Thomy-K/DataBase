<?php
session_start();
include('./templates/header.html');
require("../config/conexion.php");
?>

    <body>
        
        <h1 class='title'> Ofertas y stock </h1>

        <br>
        <div class='container'>
            <form action="./queries/tiendas_region.php" method="POST">
                <?php
                $query = "SELECT DISTINCT region FROM regiones;";
                $result = $db2 -> prepare($query);
                $result -> execute();
                $regiones = $result -> fetchAll();
                ?>
                <?php if ($regiones) { ?>
                    <div class='form-element'>
                        <label for='region'>Región de la tienda</label>
                        <select name='region' id='region'>
                            <?php foreach ($regiones as $fila) {  
                                $opcion = $fila['region'];
                                echo "<option value='$opcion'>$opcion</option>";
                            } ?>
                        </select>
                        <input type="submit" value="Enviar">
                    </div>
                <?php } 
                 else {
                    echo 'No hay regiones disponibles.';
                } ?>
            </form>
        </div>


    </body>

</html>