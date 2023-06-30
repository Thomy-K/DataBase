<?php
	ob_start();
	session_start();
    require("../config/conexion.php");
    $id_tienda = $_POST['id_tienda'];
    $id_producto = $_POST['id_producto'];
    $tipo = $_POST['tipo'];
?>

<?php
    try {
        $msg = '';
        if (isset($_POST['actualizar']) && !empty($_POST['n_cantidad']) && $_POST['n_cantidad'] >= 0)
        {
            $n_cantidad = $_POST['n_cantidad'];

            $query = "SELECT update_stock($n_cantidad, $id_tienda, $id_producto);";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $result -> fetchAll();
            header("Location: ./productos_tipo.php?msg=$msg&tipo={$tipo}&id_tienda={$id_tienda}");
            exit();
        }
        else {
            $msg = "Datos no validos";
            $_SESSION['msg'] = $msg;
            header("Location: ./form_actualizar_stock.php?msg=$msg&id_producto={$id_producto}&id_tienda={$id_tienda}");
            exit();
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>