<?php
  require("../config/conexion.php");
  $fecha = $_POST["fecha"];
  $usuario =$_POST["usuario"];

  $query1 = "SELECT COUNT(DISTINCT id_tienda), SUM(cantidad*precio) FROM nueva_compra;";
  $result1 = $db -> prepare($query1);
  $result1 -> execute();
  $tiendas = $result1 -> fetchAll();

  $x = 1;


?>
  <body>
    <br>
    <br>
    <h1 align="center">Has terminado con éxito </h1>
    <br>
    <br>
    <h2 align="center">El total es: </h2>
    <br><h2 align="center">
    <?php foreach ($tiendas as $tienda) {
  		echo max(($tienda[0] - 1)*3000 + 2000 + $tienda[1],0);
        $x = max(($tienda[0] - 1)*3000 + 2000 + $tienda[1],0);
	}?></h2>
    
    <br>
    <br>
    <h2 align="center">Gracias por tu compra! </h2>
    <br>
    <form align="center" action="../cliente.php" method="get">
        <input class='btn' type='submit' value='Volver'>
    </form>
 
  </body>
<?php

  $query = "SELECT finalizar('$fecha', '$usuario', $x);";
  $result = $db -> prepare($query);
  $result -> execute();



  $query3 = "SELECT eliminar_productos();";
  $result3 = $db -> prepare($query3);
  $result3 -> execute();
  
?>

  </html>
  
