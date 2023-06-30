<?php

session_start();
include('./templates/header.html');

?>
    <body>
        <div class='main'>

            <h1 class='title'>Entrega 3</h1>


            <div class='container'>
                <h3>Importar usuarios</h3>
                <form  action='./queries/poblar_usuarios.php' method='GET'>
                    <input class='btn' type='submit' value='Importar'>
                </form>
            </div>

            <br><br>
            <div class='container'>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <form  action='./queries/login.php' method='GET'>
                        <input class='btn' type='submit' value='Iniciar sesión'>
                    </form>

                <?php } else { ?>
                    <form action='./queries/logout.php' method="post">
                        <input class='btn' type="submit" value="Cerrar sesión">
                    </form>
                <?php } ?>
            </div>

            <div class='container'>
                <?php if (isset($_SESSION['rol'])) { ?>
                    <?php if ($_SESSION['rol'] == "Admin") { ?>
                        <a href="./admin.php" class="btn">Administrar tiendas y productos</a>
                    <?php }
                    else { ?>
                        <a href="./cliente.php" class="btn">Administrar tiendas y productos</a>
                    <?php } ?>

                <?php } ?>
            </div>

        </div>
        <br><br><br><br><br><br><br>
    </body>
</html>
