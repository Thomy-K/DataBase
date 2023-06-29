<?php
	ob_start();
	session_start();
?>

<?php
    try {
        $msg = '';
        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            $msg = "Sesión iniciada correctamente";
            #header("Location: ../index.php?msg=$msg");

            // Realizar la verificación del tipo de usuario en la base de datos
            $query = "SELECT tipo FROM usuarios WHERE username = :username";
            $stmt = $db -> prepare($query);
            $stmt -> bindParam(':username', $_SESSION['username']);
            $stmt -> execute();
            $result = $stmt -> fetch();

            if ($result) {
                $tipo_usuario = $result['tipo'];

                if ($tipo_usuario == 'Admin') {
                    // El usuario es un administrador, redirigir a admin.php
                    header("Location: ../admin.php?msg=$msg");
                    exit();
                } else {
                    // El usuario es un cliente, redirigir a clientes.php
                    header("Location: ../cliente.php?msg=$msg");
                    exit();
                }
            } 
            else {
                // Las credenciales son válidas pero no se pudo obtener el tipo de usuario
                $msg = "Error al obtener el tipo de usuario";
                $_SESSION['msg'] = $msg;
                header("Location: ./login.php?msg=$msg");
                exit();
            }

        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>