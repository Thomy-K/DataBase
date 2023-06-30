<html>

    <body>

    <style>
        td, th {
            text-align: center;
        }
    </style>

    <?php
        session_start();
        require("../config/conexion.php");
        include('../templates/header.html');
        #Aqui hay que mostrar todos los productos segun el tipo que se recibio y agregar la opcion de cambiar la oferta y el stock
        
        try {
            $opcion_seleccionada = $_POST['tipo'];
            $opcion_separada = explode('-', $opcion_seleccionada);
            $tipo_producto = $opcion_separada[0];
            $id_tienda = intval($opcion_separada[1]);
        } 
        catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>
</html>