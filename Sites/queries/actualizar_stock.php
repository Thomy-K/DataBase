<html>
<!-- Conectar procedimiento almacenado actualizar_stock (n_cantidad int, id_tienda int, id_producto int) -->
    <body>
        <h3> Ingrese el nuevo stock del producto </h3>
        <br>
        <form class="form-signin" role="form" action="CAMBIO.php" method="post">
            <input type="number" name="n_cantidad" placeholder="Cantidad Actualizada" required autofocus>
            <button type="submit">Establecer Stock</button>
        </form>

    </body>
</html>
