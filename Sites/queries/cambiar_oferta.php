<?php
	ob_start();
	session_start();
    require("../config/conexion.php");
    $id_tienda = intval($_POST['id_tienda']);
    $id_producto = intval($_POST['id_producto']);
    $tipo = $_POST['tipo'];
?>

<?php
    try {
        $msg = '';
        if (!empty($_POST['oferta']) && intval($_POST['oferta']) >= 0 && intval($_POST['oferta']) <= 100)
        {
            $oferta = intval($_POST['oferta']);

            $query = "SELECT update_oferta($oferta, $id_tienda, $id_producto);";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $result -> fetchAll();
            header("Location: ./productos_tipo.php?msg=$msg&tipo={$tipo}&id_tienda={$id_tienda}");
            exit();
        }
        else {
            $msg = "Datos no validos";
            $_SESSION['msg'] = $msg;
            header("Location: ./form_actualizar_oferta.php?msg=$msg&id_producto={$id_producto}&id_tienda={$id_tienda}");
            exit();
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
