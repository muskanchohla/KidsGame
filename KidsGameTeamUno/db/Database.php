<?php
//connection with db 
require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');

// Función para conectar con la base de datos
function ConnectDb() {
   
    try {
        $connection = new mysqli(HOST_NAME, USER_NAME, DB_PASSWORD);
        return $connection;
    } catch (mysqli_sql_exception $error) {
        // Si la conexión falla, muestra el mensaje de error y detiene el script
        echo"<script>console.log('DB Selected  $error')</script>";
        die("Connection to MySQL failed! <br>" . $error);
    }
}


// Función para desconectar de la base de datos
function DisconnectDB($connection) {
    try {
        $connection->close();
      
    } catch (mysqli_sql_exception $error) {
        die("Disconnection from MySQL failed!<br/>" . $error);
    }
}

function selectDb($connection) {
    try {
        mysqli_select_db($connection, "Kidsgames");
    } catch(mysqli_sql_exception $error) {
        echo $error;
    }
}


?>