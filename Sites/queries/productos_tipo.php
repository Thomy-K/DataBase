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
        #Aqui hay que mostrar todos los productos segun el tipo que se recibio y agregar la opcion de cambiar la oferta y el stock

        try {
            if (!empty($_POST['tipo'])) {
                $opcion_seleccionada = $_POST['tipo'];
                $opcion_separada = explode('-', $opcion_seleccionada);
                $tipo_producto = $opcion_separada[0];
                $id_tienda = intval($opcion_separada[1]);
            }
            else {
                $tipo_producto = $_GET['tipo'];
                $id_tienda = intval($_GET['id_tienda']);
            }
            $query = "SELECT productos.id, productos.nombre, stock.descuento, productos.precio, (productos.precio*((100-stock.descuento)*0.01)) as nuevo_precio,
            productos.numero_cajas, productos.tipo, stock.id_tienda
            FROM productos, stock
            WHERE productos.id = stock.id_producto AND productos.tipo = '$tipo_producto' AND stock.id_tienda = '$id_tienda';";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $dataCollected = $result -> fetchAll();
        }
        catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>

    <table class='table'>
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descuento (%)</th>
            <th>Precio Original</th>
            <th>Precio En tienda</th>
            <th>Número Cajas</th>
            <th>Tipo</th>
            <th>Id Tienda</th>
            <th> </th>
            <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dataCollected as $producto) {
                echo "<tr>";
                for ($i = 0; $i < 8; $i++) {
                    echo "<td>$producto[$i]</td> ";
                }
                echo "<td><a href='form_actualizar_stock.php?id_producto={$producto[0]}&id_tienda={$producto[7]}&tipo={$producto[6]}' class='button'>Actualizar Stock</a></td>";
                echo "<td><a href='form_actualizar_stock.php?id_producto={$producto[0]}&id_tienda={$producto[7]}&tipo={$producto[6]}' class='button'>Actualizar Oferta</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </body>
</html>
