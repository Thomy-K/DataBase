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
        <h1 class='title'> Ingrese la nueva oferta del producto </h1>
        <br>
        <form class="form-signin" role="form" action="./cambiar_oferta.php" method="POST">
            <input type="number" name="oferta" placeholder="Oferta" required autofocus>
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <input type="hidden" name="id_tienda" value="<?php echo $id_tienda; ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
            <button type="submit" name="Actualizar">Nueva oferta</button>
        </form>
    </body>
</html>
