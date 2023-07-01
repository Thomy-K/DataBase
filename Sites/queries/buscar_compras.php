<?php include('../templates/header.html');   ?>

<body>
<?php
  require("../config/conexion.php");

  $usuario =$_POST["usuario"];

  $query = "SELECT productos.id, productos.nombre, productos.precio, productos.n_cajas, compras.total, despachos.fecha
  FROM productos, contiene, compras, clientes, despachos, ordena
  WHERE clientes.nombre = '$usuario'
    and clientes.id = ordena.id_cliente
    and ordena.id_compra = compras.id
    and compras.id = contiene.id_compra
    and contiene.id_producto = productos.id
    and compras.id = despachos.id_compras;";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $productos = $result -> fetchAll();
  ?>

  <body>
        <table class='table'>
            <thead>
                <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Número cajas</th>
                <th>Total</th>
                <th>Fecha despacho</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $producto) {
                    echo "<tr> 
                        <td>$producto[0]</td> 
                        <td>$producto[1]</td> 
                        <td>$producto[2]</td> 
                        <td>$producto[3]</td> 
                        <td>$producto[4]</td> 
                        <td>$producto[5]</td> 
                         </tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
<br>
<form action="../cliente.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>

