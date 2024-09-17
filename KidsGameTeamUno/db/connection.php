<?php
//connection with db 



 $hostName="localhost";
 $userName="root";
 $password="";

// Función para conectar con la base de datos
function ConnectDb() {
    $hostName="localhost";
    $userName="root";
    $password="";


    try {
        $connection = new mysqli($hostName, $userName, $password);
       // echo "conexion success"."<br>";
        return $connection;
    } catch (mysqli_sql_exception $error) {
        // Si la conexión falla, muestra el mensaje de error y detiene el script
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




//$connection=ConnectDb();
?>