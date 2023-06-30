<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $nombre = $_POST["nombre"];

  $query = "SELECT productos.id, productos.nombre, productos.precio - (stock.descuento * productos.precio/100), stock.id_tienda 
  FROM productos, stock 
  WHERE Lower(productos.nombre) LIKE Translate(Lower('%$nombre%'),'áéíóú','aeiou') and productos.id = stock.id_producto and stock.cantidad > 0 LIMIT 10;";
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
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $producto) {
                    echo "<tr> 
                        <td>$producto[0]</td> 
                        <td>$producto[1]</td> 
                        <td>$producto[2]</td> 
                        <td><a href = 'agregar.php?
                            id_producto= $producto[0] &
                            id_tienda= $producto[3] &
                            precio= $producto[2]'>
                            <button type='button' class = 'btn btn-success'>AGREGAR</button> </a> </td> 
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

