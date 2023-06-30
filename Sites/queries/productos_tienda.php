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
        $id_tienda = $_GET['id'];
    ?>
            
    <div class='container'>
        <form action="./productos_tipo.php" method="POST">
        <div class='form-element'>
            <label for='tipo'>Tipo</label>
            <select name='tipo' id='tipo'>
            <?php #aqui envio tanto el tipo de producto como el id de su tienda, en productos_tipo los separo en variables independientes?>
                <option value='dormitorio-<?php echo $id_tienda; ?>'>Dormitorio</option>
                <option value='living'-<?php echo $id_tienda; ?>>Living</option>
                <option value='iluminacion-<?php echo $id_tienda; ?>'>Iluminación</option>
            </select>
            <input type="submit" value="Enviar">
        </div>
    </div>

    </body>

</html>