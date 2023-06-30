<?php
session_start();
$msg = $_GET['msg'];
include('../templates/header.html');
?>

<body>
	<h1 class='title'> Ingrese nombre de usuario y contraseña </h1>
	<br>
    <div class='container'>
        <form class="form-signin" role="form" action="login_validation.php" method="post">
            <?php echo $msg; ?>
            <input type="text" name="username" placeholder="nombre de usuario" required autofocus>
            <input type="password" name="password" placeholder="contraseña" required>
            <button type="submit" name="login"> Iniciar sesión </button>
        </form>
    </div>
</body>
