<html>

    <body>

    <style>
        td, th {
            text-align: center;
        }
    </style>

    <?php
        session_start();
        require("../config/conexion.php");
        include('../templates/header.html');
        #se buscan todas las tiendas de la region luego abajo en la tabla se
        #listan sus datos junto a un boton que es pa enviar el id de la tienda a productos_tienda.php
        #y ahi de nuevo desplegar un menu de opciones para elegir el tipo de producto
        try {
            $region_seleccionada = $_POST['region'];
            $query = "SELECT tiendas.id, tiendas.telefono, tiendas.calle,
            tiendas.numero, tiendas.comuna, tiendas.capacidad_estacionamiento FROM tiendas, regiones
            WHERE regiones.region = '$region_seleccionada' AND tiendas.comuna = regiones.comuna;";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $tiendas_region = $result -> fetchAll();
        }
        catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

    <?php echo "<h1 class='title'> Tiendas de la región: $region_seleccionada </h1>" ?>

    <table class='table'>
        <thead>
            <tr>
            <th>Id</th>
            <th>Telefono</th>
            <th>Calle</th>
            <th>Número</th>
            <th>Comuna</th>
            <th>Capacidad del estacionamiento</th>
            <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tiendas_region as $tienda) {
                echo "<tr>";
                for ($i = 0; $i < 6; $i++) {
                    echo "<td>$tienda[$i]</td> ";
                }
                echo "<td><a href='productos_tienda.php?id={$tienda['id']}' class='button'>Ver Productos</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </body>

</html>
