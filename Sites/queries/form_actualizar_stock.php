<html>
<?php
session_start();
require("../config/conexion.php");
include('../templates/header.html');
$id_producto = intval($_GET['id_producto']);
$id_tienda = intval($_GET['id_tienda']);
$tipo = $_GET['tipo'];
?>
<!-- Conectar procedimiento almacenado actualizar_stock (n_cantidad int, id_tienda int, id_producto int) -->
    <body>
        <h3> Ingrese el nuevo stock del producto </h3>
        <br>
        <form class="form-signin" role="form" action="./cambiar_stock.php" method="POST">
            <input type="number" name="n_cantidad" placeholder="Cantidad Actualizada" required autofocus>
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <input type="hidden" name="id_tienda" value="<?php echo $id_tienda; ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
            <button type="submit" name="Actualizar">Establecer Stock</button>
        </form>
    </body>
</html>
