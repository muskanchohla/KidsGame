<?php
require $_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php';

function LogOut() {
    session_start();

    // Verificar si el logout ha sido confirmado
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Limpiar datos de sesión
        $_SESSION['username'] = "";
        $_SESSION['user_id'] = "";
        $_SESSION['game'] = ""; 
        $_SESSION['lives'] = "";

        // Destruir la sesión
        session_destroy();

        // Redireccionar al formulario de inicio de sesión
        echo "<script>window.location.href='" . ROOT_PATH . "public/form/signin-form.php';</script>";
        exit();
    } else {
        // Pedir confirmación para el logout
        echo "<script>
                var confirmLogout = confirm('Are you sure you want to logout?');
                if (confirmLogout) {
                    window.location.href = '?confirm=true';
                } else {
                    window.location.href = '" . ROOT_PATH . "/index.php'; // Redirigir al index si cancela
                }
              </script>";
        exit();
    }
}

LogOut();
?>
