<?php
session_start();
include('./templates/header.html');
$user = $_SESSION["username"];
?>

<body>
  <h1 align="center">Consultas y Compras </h1>
  <br>

  <h3 align="center"> Ingresa una fecha para buscar los clientes que recibirán sus productos ese día</h3>

  <form align="center" action="consultas/consulta_despachos.php" method="post">
    Fecha:
    <input type="date" name="fecha">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Realizar compra</h3>

  <form align="center" action="queries/prod_compra.php" method="post">
    Producto:
    <input type="text" name="nombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <h4 align="center"> Ingresar fecha despacho</h3>

  <form align="center" action="queries/fin_compra.php" method="post">
    Fecha:
    <input type="date" name="fecha">
    <input type="hidden" name="usuario" value="<?php echo $user;?>">
    <br/><br/>
    <input type="submit" value="Finalizar compra">
  </form>
  
  <br>
  <br>
  <br>

  <br>
  <br>
  <br>
  <br>
</body>
</html>