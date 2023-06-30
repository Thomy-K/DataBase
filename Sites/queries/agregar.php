<?php
  require("../config/conexion.php");
  include('../templates/header.html');
  $id_prod = $_GET["id_producto"];
  $id_tien = $_GET["id_tienda"];
  $precio = $_GET["precio"];

  $query = "SELECT agregar_prod($id_prod, $id_tien, $precio);";
  $result = $db -> prepare($query);
  $result -> execute();

  $query2 = "SELECT disminuir($id_prod, $id_tien);";
  $result2 = $db2 -> prepare($query2);
  $result2 -> execute();

?>
  <body>
    <br>
    <br>
    <h1 align="center">PRODUCTO AGREGADO </h1>
    <br>
    <br>
    <form align="center" action="../cliente.php" method="get">
        <input class='btn' type='submit' value='SEGUIR COMPRANDO'>
    </form>
  </body>
  </html>
  
